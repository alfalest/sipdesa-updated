<?php

namespace Master\Controllers;
use Master\Models\Tbl_data_diri;
use Master\Models\Tbl_user;
use App\Controllers\BaseController;
use Master\Models\Tbl_kode_kata;
use Master\Models\Tbl_wilayah;
use Master\Models\Tbl_negara;

class User_update extends BaseController
{

    public $tbl_data_diri;
    public $tbl_user;
    public $tbl_kode_kata;
    public $tbl_wilayah;
    public $tbl_negara;
    public $list_kode_kata;
    public $post;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_user = new Tbl_user();
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_negara = new Tbl_negara();
        $this->cek_login(['tipe_user' => 1, 'status_user' => 2, 'email_verified' => 2]);
        $this->list_kode_kata = ['jenis_kelamin', 'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah'];

    }
    public function index()
    {
        $this->post = $this->request->getPost();
        $message_info = ['status' => 0,  'text' => ''];
        $invalid_info = [];
        $valid = true;


        $set_data = [
            'tipe_user' => 3
        ];

        $id_user = 0;
        if(isset($this->post['id_user']) && !empty($this->post['id_user'])){
            $id_user = $this->post['id_user'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Id user tidak ada<br>';
        }

        $this->data['data_diri'] = [];
        $data_diri = $this->tbl_data_diri->where(['tbl_user.id_user' => $id_user])->join('tbl_user', 'tbl_user.id_user = tbl_data_diri.id_user', 'right')->first();
        if($data_diri && $id_user){
            $this->data['data_diri'] = $data_diri;
        }  else {
            $valid = false;
            $message_info['text'] .= 'Data user tidak ditemukan<br>';
        }

        if(isset($this->post['tipe_user']) && in_array($this->post['tipe_user'], [1, 2, 3]) ){
            $set_data['tipe_user'] = $this->post['tipe_user'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Pilih salah satu tipe user<br>';
            $invalid_info['tipe_user'] = 'Pilih salah satu tipe user';
        }
        
        
        if($valid && $id_user && $data_diri){
            if($this->tbl_user->set($set_data)->where(['id_user' => $id_user])->update()){
                $message_info['status'] = 1;
                $message_info['text'] .= 'Data user berhasil diubah<br>';
            } else {
                $message_info['text'] .= 'Data user gagal diubah<br>';
            }
        }
        

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info',$message_info);
        $this->session->setFlashdata('invalid_info', $invalid_info);
        if($id_user != '' && $id_user > 0){
            return redirect()->to( base_url().'/master/user-edit/'.$id_user);
        } else {
            return redirect()->to( base_url().'/master/user-edit');
        }
        
        exit;
    }

    
    protected function wilayah($arr_data, $postfix = ''){
        //ambil data wilayah untuk membuat option
        if(isset($arr_data)){
            if(isset($arr_data['kel_desa'.$postfix]) && $arr_data['kel_desa'.$postfix] != ''){
                $arr_kode = explode(".",$arr_data['kel_desa'.$postfix]);
                if(count($arr_kode) == 4){
                    $provinsi = $this->tbl_wilayah->get_wilayah($arr_kode[0]);
                    $kab_kota = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1]);
                    $kecamatan = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2]);
                    $kel_desa = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2].'.'.$arr_kode[3]);
                    
                    $arr_data['provinsi'.$postfix] = '';
                    if($provinsi){
                        $arr_data['provinsi'.$postfix] = strtoupper($provinsi['nama_wilayah']);
                    }

                    $arr_data['kab_kota'.$postfix] = '';
                    if($kab_kota){
                        $arr_data['kab_kota'.$postfix] = strtoupper($kab_kota['nama_wilayah']);
                    }

                    $arr_data['kecamatan'.$postfix] = '';
                    if($kecamatan){
                        $arr_data['kecamatan'.$postfix] = strtoupper($kecamatan['nama_wilayah']);
                    }

                    $arr_data['kel_desa'.$postfix] = '';
                    if($kel_desa){
                        $arr_data['kel_desa'.$postfix] = strtoupper($kel_desa['nama_wilayah']);
                    }
                }
            }
        }
        return $arr_data;
    }

    protected function arr_wilayah($arr_data, $postfix = ''){
        if(isset($arr_data['kel_desa'.$postfix]) && $arr_data['kel_desa'.$postfix] != ''){
            $arr_kode = explode(".",$arr_data['kel_desa'.$postfix]);
            if(count($arr_kode) == 4){
                $arr_data['provinsi'.$postfix] = $arr_kode[0];
                $arr_data['kab_kota'.$postfix] = $arr_kode[0].'.'.$arr_kode[1];
                $arr_data['kecamatan'.$postfix] = $arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2];
                $arr_data['kel_desa'.$postfix] = $arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2].'.'.$arr_kode[3];

                $this->data['arr_wilayah']['provinsi'.$postfix] = $this->tbl_wilayah->get_provinsi();
                $this->data['arr_wilayah']['kab_kota'.$postfix] = $this->tbl_wilayah->get_kab_kota($arr_data['provinsi'.$postfix]);
                $this->data['arr_wilayah']['kecamatan'.$postfix] = $this->tbl_wilayah->get_kecamatan($arr_data['kab_kota'.$postfix]);
                $this->data['arr_wilayah']['kel_desa'.$postfix] = $this->tbl_wilayah->get_kel_desa($arr_data['kecamatan'.$postfix]);
            }
        }
        return $arr_data;
    }

    protected function kode_kata($arr_data, $postfix = ''){
        foreach ($this->list_kode_kata as $key => $value) {
            if(isset($arr_data[$value.$postfix])){
                $ambil_kata = $this->tbl_kode_kata->ambil($arr_data[$value.$postfix] , $value);
                if($ambil_kata){
                    $arr_data[$value.$postfix] = strtoupper($ambil_kata);
                }
            }
        }
        return $arr_data;
    }


    protected function arr_kode_kata($postfix = '') {
        foreach ($this->list_kode_kata as $key => $value) {
            $ambil_kata = $this->tbl_kode_kata->ambil_arr($value);
            if($ambil_kata){
                $this->data['arr_kode_kata'][$value.$postfix] = $ambil_kata;
            }
        }
    }

    // mengubah kode negara menjadi tampilan kata
    protected function negara($arr_data, $postfix = ''){
        if(isset($arr_data['kewarganegaraan'.$postfix])){
            $ambil_negara = $this->tbl_negara->where(['id_negara' => $arr_data['kewarganegaraan'.$postfix]])->first();
            if($ambil_negara){
                $arr_data['kewarganegaraan'.$postfix] = strtoupper($ambil_negara['name']);
            }
        }
        return $arr_data;
    }

    // mengambil list id negara dan nama negara
    protected function arr_negara($postfix = '') {
        $ambil_negara = $this->tbl_negara->findAll();
        if($ambil_negara){
            foreach ($ambil_negara as $key => $value) {
                $this->data['arr_kode_kata']['kewarganegaraan'.$postfix][] = ['nomor_kode' => $value['id_negara'] , 'tampilan_kata' => $value['name']];
            }
        }
    }
}
