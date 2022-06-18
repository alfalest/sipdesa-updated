<?php

namespace Master\Controllers;

use Master\Models\Tbl_user;
use Master\Models\Tbl_kode_kata;
use Master\Models\Tbl_wilayah;
use Master\Models\Tbl_negara;
use Master\Models\Tbl_data_diri;
use App\Controllers\BaseController;

class User extends BaseController
{

    public $tbl_user;
    public $tbl_kode_kata;
    public $tbl_wilayah;
    public $tbl_negara;
    public $tbl_data_diri;

    public $list_kode_kata;
    public function __construct()
    {
        $this->cek_login(['tipe_user' => 1, 'status_user' => 2, 'email_verified' => 2]);

        $this->tbl_user = new Tbl_user();
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_negara = new Tbl_negara();
        $this->tbl_data_diri = new Tbl_data_diri();

        $this->list_kode_kata = [
            'tempat_dilahirkan', 'jenis_kelahiran', 'penolong_kelahiran', 'jenis_kelamin',
            'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah',
            'tempat_dilahirkan', 'jenis_kelahiran', 'penolong_kelahiran'];
    }
    public function index($param = '')
    {
        $this->get = $this->request->getGet();

     
        switch ($param) {
            case 'master':
                $this->data['tipe_user_state'] = 1;
                $tipe_user_state = 1;
                break;
            case 'operator':
                $this->data['tipe_user_state'] = 2;
                $tipe_user_state = 2;
                break;
            case 'penduduk':
                $this->data['tipe_user_state'] = 3;
                $tipe_user_state = 3;
                break;
            default:
                $this->data['tipe_user_state'] = 3;
                $tipe_user_state = 3;
                break;
        }

        $this->data['data_user'] = [];

        if(isset($this->get['page_user']) && $this->get['page_user'] != ''){
            $this->data['halaman_ini'] = intval($this->get['page_user']);
        } else {
            $this->data['halaman_ini'] = 1;
        }

        $per_page = 5;
        $this->data['item_per_page'] = $per_page;
        if(isset($this->get['cari']) && $this->get['cari'] != ''){
            $this->data['inp_val']['cari'] = $this->get['cari'];

            $query_data_user = $this->tbl_data_diri
            ->where(['tbl_user.tipe_user' => $tipe_user_state])
            ->like('tbl_user.nama_alias', $this->get['cari'])
            ->orLike('tbl_user.email', $this->get['cari'])
            ->orLike('tbl_user.status_user', $this->get['cari'])
            ->orLike('tbl_data_diri.nama_lengkap', $this->get['cari'])
            ->orLike('tbl_data_diri.nik', $this->get['cari'])
            ->join('tbl_user', 'tbl_data_diri.id_user = tbl_user.id_user', 'right')
                ->get()
                ->getNumRows();

            $this->data['data_user'] = $this->tbl_data_diri
            ->where(['tbl_user.tipe_user' => $tipe_user_state])
            ->like('tbl_user.nama_alias', $this->get['cari'])
            ->orLike('tbl_user.email', $this->get['cari'])
            ->orLike('tbl_user.status_user', $this->get['cari'])
            ->orLike('tbl_data_diri.nama_lengkap', $this->get['cari'])
            ->orLike('tbl_data_diri.nik', $this->get['cari'])
            ->join('tbl_user', 'tbl_data_diri.id_user = tbl_user.id_user', 'right')
                ->paginate($per_page, 'user');
                
        } else {
            $query_data_user = $this->tbl_data_diri->where(['tbl_user.tipe_user' => $tipe_user_state])->join('tbl_user', 'tbl_data_diri.id_user = tbl_user.id_user', 'right')->get()->getNumRows();
            $this->data['data_user'] = $this->tbl_data_diri->where(['tbl_user.tipe_user' => $tipe_user_state])->join('tbl_user', 'tbl_data_diri.id_user = tbl_user.id_user', 'right')->paginate($per_page, 'user');
        }
        if(count($this->data['data_user']) != 0){
            $this->data['pager'] = $this->tbl_data_diri->pager;
        }

        $jml_semua = $this->tbl_data_diri->join('tbl_user', 'tbl_data_diri.id_user = tbl_user.id_user' , 'right')->get()->getNumRows();
        $this->data['jml_semua'] = number_format(($jml_semua),0,",",".");

        $jml_ditemukan = $query_data_user;
        $this->data['jml_ditemukan'] = number_format(($jml_ditemukan),0,",",".");
        
        $this->data['v']['page'] = 'user';
        $this->data['v']['script'] = 'user';
        return view('Master\Views\dashboard_sidebar', $this->data);
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
                $ambil_kata = $this->tbl_kode_kata->ambil_kata($arr_data[$value.$postfix] , $value);
                if($ambil_kata){
                    $arr_data[$value.$postfix] = strtoupper($ambil_kata);
                }
            }
        }
        return $arr_data;
    }


    protected function arr_kode_kata($postfix = '') {
        foreach ($this->list_kode_kata as $key => $value) {
            $ambil_kata = $this->tbl_kode_kata->ambil_grup_kata($value);
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
