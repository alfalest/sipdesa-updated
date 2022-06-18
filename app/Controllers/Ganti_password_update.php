<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Libraries\Email_lib;
use App\Models\Tbl_template_email;
use App\Models\Tbl_setup_phpmailer;
use App\Models\Tbl_user;
use App\Models\Tbl_wilayah;
class Ganti_password_update extends BaseController
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
            'password' => '',
            'token' => ''
        ];

        $this->post = $this->request->getPost();

        $db_user = [];
        if(isset($this->post['token']) && $this->post['token'] != ''){
            $db_user = $this->tbl_user->where(['token' => $this->post['token']])->first();
            if($db_user){

            } else {
                return redirect()->to( base_url());
                exit;
            }
        } else {
            return redirect()->to( base_url());
            exit;
        }

        if(isset($this->post['password']) && $this->post['password'] != '' && mb_strlen($this->post['password'], "UTF-8") <= 25 ){
            $set_data['password'] = $this->post['password'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Password tidak boleh kosong atau melebihi 25 karakter. <br>';
        }

        if(isset($this->post['konfirmasi_password']) && $this->post['konfirmasi_password'] != '' && mb_strlen($this->post['konfirmasi_password'], "UTF-8") <= 25 ){
            if(isset($this->post['password']) && $this->post['password'] != $this->post['konfirmasi_password']){
                $set_data['password'] = '';
                $valid = false;
                $message_info['text'] .= 'Konfirmasi Password tidak sama<br>';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Konfirmasi password tidak boleh kosong atau melebihi 25 karakter. <br>';
        }

        if($valid && isset($db_user['id_user'])){
        
            if($this->tbl_user->where(['id_user' => $db_user['id_user']])->set($set_data)->update()){
                $insert_id = $db_user['id_user'];
                $message_info['status'] = 1;
                $message_info['text'] .= 'Password berhasil diganti. silahkan login dengan password baru<br>';    
                $this->post = ['password' => $set_data['password'], 'email' => $db_user['email']];
            } else {
                $valid = false;
                $message_info['text'] .= 'Gagal mengganti password<br>';    
                $insert_id = 0;
            }
        }

        $this->session->setFlashdata('invalid_info', $invalid_info);
        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $message_info);

        if($valid && $insert_id){
            return redirect()->to( base_url().'/login');
        } else {
            return redirect()->to( base_url().'/ganti-password');
        }
    }
}
