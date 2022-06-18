<?php

namespace Master\Controllers;
use Master\Models\Tbl_data_diri;
use Master\Models\Tbl_user;
use App\Controllers\BaseController;
use Master\Models\Tbl_kode_kata;
use Master\Models\Tbl_wilayah;
use Master\Models\Tbl_negara;
use Master\Models\Tbl_setup_phpmailer;

class Setup_email_update extends BaseController
{

    public $tbl_data_diri;
    public $tbl_user;
    public $tbl_kode_kata;
    public $tbl_wilayah;
    public $tbl_negara;
    public $list_kode_kata;
    public $tbl_setup_phpmailer;
    public $post;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_user = new Tbl_user();
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_negara = new Tbl_negara();
        $this->tbl_setup_phpmailer = new Tbl_setup_phpmailer();
        $this->cek_login(['tipe_user' => 1, 'status_user' => 2, 'email_verified' => 2]);
        $this->list_kode_kata = ['jenis_kelamin', 'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah'];

    }
    public function index()
    {
        $new_data = true;
        $this->post = $this->request->getPost();
        $message_info = ['status' => 0,  'text' => ''];
        $invalid_info = [];
        $valid = true;


        $set_data = [
            'smtp_host' => '',
            'smtp_auth' => 1,
            'smtp_port' => 1,
            'name_alias' => '',
            'username_email' => '',
            'password_email' => '',
            'is_html' => 1
        ];

        $id_setup_phpmailer = 0;
        if(isset($this->post['id_setup_phpmailer']) && !empty($this->post['id_setup_phpmailer'])){
            $db_setup_phpmailer = $this->tbl_setup_phpmailer->where(['id_setup_phpmailer' => intval($this->post['id_setup_phpmailer']) ])->first();
            if( $db_setup_phpmailer){
                $id_setup_phpmailer = $this->post['id_setup_phpmailer'];
                $new_data = false;
            }
        }

        if(isset($this->post['smtp_host']) && $this->post['smtp_host'] != '' && mb_strlen($this->post['smtp_host'] , "UTF-8") <= 100 ){
            $set_data['smtp_host'] = $this->post['smtp_host'];
        } else {
            $valid = false;
            $message_info['text'] .= 'SMTP Host tidak sesuai ketentuan<br>';
            $invalid_info['smtp_host'] = 'SMTP Host tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['smtp_auth']) && in_array($this->post['smtp_auth'], [0, 1]) ){
            $set_data['smtp_auth'] = $this->post['smtp_auth'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Pilih salah satu smtp auth<br>';
            $invalid_info['smtp_auth'] = 'Pilih salah satu smtp auth';
        }

        if(isset($this->post['smtp_port']) && in_array($this->post['smtp_port'], [0, 1]) ){
            $set_data['smtp_port'] = $this->post['smtp_port'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Pilih salah satu smtp port<br>';
            $invalid_info['smtp_port'] = 'Pilih salah satu smtp port';
        }

        if(isset($this->post['name_alias']) && $this->post['name_alias'] != '' && mb_strlen($this->post['name_alias'] , "UTF-8") <= 100 ){
            $set_data['name_alias'] = $this->post['name_alias'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Nama Alias tidak sesuai ketentuan<br>';
            $invalid_info['name_alias'] = 'Nama Alias tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['username_email']) && $this->post['username_email'] != '' && mb_strlen($this->post['username_email'] , "UTF-8") <= 100 ){
            $set_data['username_email'] = $this->post['username_email'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Username Email tidak sesuai ketentuan<br>';
            $invalid_info['username_email'] = 'Username Email tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['password_email']) && $this->post['password_email'] != '' && mb_strlen($this->post['password_email'] , "UTF-8") <= 100 ){
            $set_data['password_email'] = $this->post['password_email'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Password Email tidak sesuai ketentuan<br>';
            $invalid_info['password_email'] = 'Password Email tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['is_html']) && in_array($this->post['is_html'], [0, 1]) ){
            $set_data['is_html'] = $this->post['is_html'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Pilih salah satu is HTML<br>';
            $invalid_info['is_html'] = 'Pilih salah satu is HTML';
        }

        if(isset($this->post['default_setup']) &&  $this->post['default_setup'] == 1 ){
            $set_data['default_setup'] = $this->post['default_setup'];
        }
        
        
        if($valid){
            if($new_data){
                if($this->tbl_setup_phpmailer->insert($set_data)){
                    $message_info['status'] = 1;
                    $message_info['text'] .= 'Template dokumen berhasi dibuat<br>';
                    $id_setup_phpmailer = $this->tbl_setup_phpmailer->db->insertID();
                } else {
                    $valid = false;
                    $message_info['text'] .= 'Gagal Membuat setup phpmailer<br>';
                }
            } else {
                if($this->tbl_setup_phpmailer->set($set_data)->where(['id_setup_phpmailer' => $id_setup_phpmailer])->update()){
                    $message_info['status'] = 1;
                    $message_info['text'] .= 'Setup PHPMailer berhasil diubah<br>';
                } else {
                    $valid = false;
                    $message_info['text'] .= 'Setup PHPMailer gagal diubah<br>';
                }
            }

            if($valid && isset($set_data['default_setup']) && $set_data['default_setup'] == 1){
                $this->tbl_setup_phpmailer
                ->set(['default_setup' => 0])
                ->where(['id_setup_phpmailer !=' => $id_setup_phpmailer])
                ->update();
            }
        }

        

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info',$message_info);
        $this->session->setFlashdata('invalid_info', $invalid_info);
        if($id_setup_phpmailer != '' && $id_setup_phpmailer > 0){
            return redirect()->to( base_url().'/master/setup-email-edit/'.$id_setup_phpmailer);
        } else {
            return redirect()->to( base_url().'/master/setup-email-edit');
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
