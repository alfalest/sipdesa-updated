<?php

namespace App\Controllers;

use App\Libraries\Email_lib;
use App\Controllers\logout;
use App\Controllers\BaseController;
use App\Models\Tbl_user;

class Register_verifikasi extends BaseController
{
    public $logout;
    public $tbl_user;
    public $email;

    public function __construct()
    {
        $this->logout = new Logout();
        $this->email = new Email_lib();
        $this->tbl_user = new Tbl_user();
        helper('Date_helper'); 
        helper('text');
    }

    public function index($param = '')
    {
        $message_info = ['status' => 0,  'text' => ''];
        if($param != '') {
            $this->logout->logout();
            if(mb_strlen($param, "UTF-8") == 16 ){
                $db_user = $this->tbl_user->where(['token' => $param])->first();
                if($db_user != null && $db_user['email_verified'] == 1){
                    $set_data = [
                        'email_verified' => 2,
                        'token' => ''
                    ];
                    if($this->tbl_user->where([ 'id_user' => $db_user['id_user']])->set($set_data)->update()){
                        $message_info['status'] = 1;
                        $message_info['text'] .= 'Selamat datang '.$db_user['nama_alias'].'. Terima kasih telah melakukan verifikasi email. Sekarang Anda dapat melakukan login';
                    } else{
                        $message_info['text'] .= 'Token tidak valid. err: update<br> ';
                    }
                } else {
                    $message_info['text'] .= 'Token tidak valid. err: exist<br> ';
                }
            } else {
                $message_info['text'] .= 'Token tidak valid. err: length<br> ';
            }
        }

        //baris hasil
        $this->session->setFlashdata('message_info', $message_info);
        return redirect()->to( base_url().'/login');
        exit;
    }
}
