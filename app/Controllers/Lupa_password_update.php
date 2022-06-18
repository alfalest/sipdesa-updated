<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Libraries\Email_lib;
use App\Models\Tbl_template_email;
use App\Models\Tbl_setup_phpmailer;
use App\Models\Tbl_user;
use App\Models\Tbl_wilayah;
class Lupa_password_update extends BaseController
{
    public $tbl_wilayah;
    public $tbl_user;
    public $post;
    public $email;

    public function __construct()
    {
        $this->email = new Email_lib();
        $this->tbl_user = new Tbl_user();
        $this->tbl_template_email = new Tbl_template_email();
        helper('Date_helper'); 
        helper('text');
    }

    public function index()
    {

        $valid = true;
        $message_info = ['status' => 0,  'text' => ''];
        $invalid_info = [];

        $set_data = [
            'email' => ''
        ];

        $compose_email = [
            'email_pesan' => '',
            'email_judul' => 'Lupa kata sandi',
            'email_penerima' => '',
            'nama_penerima' => '',
        ];

        $compose_email['email_pesan'] = 'Hi, [#nama_alias#]. Silahkan klik link berikut untuk mengganti password <br><a href="[#link_lupa_password#]">Klik disini Link Ganti kata sandi</a><br> Username Anda : [#email#]';
        
        $db_template = $this->tbl_template_email->where(['jenis_template_email' => 'template_lupa_password', 'default_email' => 1])->first();
        if($db_template){
            $db_template = $this->tbl_template_email->where(['jenis_template_email' => 'template_lupa_password'])->first(); 
        }
        if($db_template){
            $compose_email['email_pesan'] = $db_template['isi_email'];
            $compose_email['email_judul'] = $db_template['judul_email'];
        }

        $token = random_string('alnum', 16);

        $set_data = [
            'token' => $token
        ];

        $this->post = $this->request->getPost();
        $db_user = [];
        if(isset($this->post['email']) && $this->post['email'] != '' && mb_strlen($this->post['email'], "UTF-8") <= 50 ){
            if(filter_var($this->post['email'], FILTER_VALIDATE_EMAIL)){
                $db_user = $this->tbl_user->where(['email' => strtolower($this->post['email'])])->first();
                if($db_user){
                    if($db_user['email_verified'] == 2){
                        $set_data['email'] = strtolower($this->post['email']);
                        $compose_email['email_penerima'] = $db_user['email'];
                        $compose_email['nama_penerima'] = $db_user['nama_alias'];
                    } else {
                        $valid = false;
                        $message_info['text'] .= 'Anda belum melakukan verifikasi email sebelumnya, silahkan mendaftar ulang. <br>';
                    }
                } else {
                    $valid = false;
                    $message_info['text'] .= 'Email Anda belum terdaftar. <br>';
                }
            } else {
                $valid = false;
                $message_info['text'] .= 'Email tidak valid. <br>';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Email tidak boleh kosong atau melebihi 50 karakter. <br>';
        }

        if($valid && isset($db_user['id_user'])){
        
                if($this->tbl_user->where(['id_user' => $db_user['id_user']])->set($set_data)->update()){
                    $insert_id = $db_user['id_user'];
                } else {
                    $insert_id = 0;
                }
            
            if($insert_id && $db_user){
                $this->post = [];
                if(isset($compose_email['email_pesan'])){
                    $compose_email['email_pesan'] = str_replace( '[#nama_alias#]', $db_user['nama_alias'], $compose_email['email_pesan']);
                    $compose_email['email_pesan'] = str_replace( '[#email#]', $db_user['email'], $compose_email['email_pesan']);
                    $compose_email['email_pesan'] = str_replace( '[#link_lupa_password#]', base_url().'/ganti-password/'.$token, $compose_email['email_pesan']);
                }
                
                $compose_email['email_penerima'] = $db_user['email'];
                $compose_email['nama_penerima'] =  $db_user['nama_alias'];
                $email_status = $this->email->kirim_email($compose_email);
                if($email_status['status']){
                    $message_info['status'] = 1;
                    $message_info['text'] .= 'Link ganti password telah kami kirim. <br>Periksa kotak masuk email Anda. <br>Kami telah mengirim link ke email <b>'.$set_data['email'].'</b><br>';    
                } else {
                    $message_info['text'] .= 'Belum bisa mengirimkan link untuk mengganti password. coba lagi nanti<br>';
                }
            } else {
                $message_info['text'] .= 'Gagal membuat link ganti password<br>';
            }
        }

        $this->session->setFlashdata('invalid_info', $invalid_info);
        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $message_info);

   
        return redirect()->to( base_url().'/lupa-password');
        
    }
}
