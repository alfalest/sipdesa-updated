<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Tbl_user;
use App\Models\Tbl_data_diri;
class Login_auth extends BaseController
{
    public $tbl_user;
    public $tbl_data_diri;

    public function __construct()
    {
        
        $this->tbl_user = new Tbl_user();
        $this->tbl_data_diri = new Tbl_data_diri();
    }

    public function index()
    {
        $message_info = ['status' => 0,  'text' => ''];
        $valid = true;
        $set_arr_session = [ 'login_session' => [] ];
        $valid_password = false;
        if(isset($this->post['password']) && $this->post['password'] != ''){
            if(mb_strlen($this->post['password'], "UTF-8") >= 8 && mb_strlen($this->post['password'], "UTF-8") <= 25){
                $valid_password = true;
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Password tidak boleh kosong. <br>';
        }
        if(isset($this->post['email']) && $this->post['email'] != '' && mb_strlen($this->post['email'], "UTF-8") <= 50 ){
            if(filter_var($this->post['email'], FILTER_VALIDATE_EMAIL)){
                if($valid_password){
                    $db_user = $this->tbl_user->where(['email' => strtolower($this->post['email'])])->first();
                    if($db_user != null ){
                        if($db_user['password'] == $this->post['password']){
                            if($db_user['email_verified'] == 2){
                                if($db_user['status_user'] == 2){
                                    
                                    $set_arr_session = [
                                        'id_user' => $db_user['id_user'],
                                        'nama_alias' => $db_user['nama_alias'],
                                        'email' => $db_user['email'],
                                        'status_user' => $db_user['status_user'],
                                        'email_verified' => $db_user['email_verified'],
                                        'tipe_user' => $db_user['tipe_user'],
                                        'link_foto_diri' => ''
                                    ];

                                    $db_data_diri = $this->tbl_data_diri->where(['id_user' => $db_user['id_user']])->first();
                                    if($db_data_diri){
                                        $set_arr_session['link_foto_diri'] = $db_data_diri['link_foto_diri'];
                                    }

                                } else {
                                    $valid = false;
                                    $message_info['text'] .= 'Akun Anda dalam penangguhan, silahkan hubungi admin operator <br>'; 
                                }
                            } else {
                                $valid = false;
                                $message_info['text'] .= 'Anda belum melakukan verifikasi email. silahkan buka email yang telah kami kirim saat proses registrasi <br>'; 
                            }
                        } else {
                            $valid = false;
                            $message_info['text'] .= 'Kata sandi salah!. coba lagi <br>'; 
                        }
                    } else {
                        $valid = false;
                        $message_info['text'] .= 'Akun Anda belum terdaftar <br>';
                    }
                } else {
                    $valid = false;
                    $message_info['text'] .= 'Jumlah karakter password tidak sesuai ketentuan <br>';
                }
            } else {
                $valid = false;
                $message_info['text'] .= 'Email tidak valid. <br>';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Email tidak boleh kosong. <br>';
        }

        if($valid){
            if(count($set_arr_session) == 6 || count($set_arr_session) == 7 ){
                $this->session->set('login_session', $set_arr_session);
                return redirect()->to( base_url().'/');
                exit;
            } else {
                $this->session->setFlashdata('inp_val', $this->post);
                $this->session->setFlashdata($this->post);
                $this->session->setFlashdata('message_info', $message_info);
                return redirect()->to( base_url().'/login');
                exit;
            }
        } else {
            $this->session->setFlashdata('inp_val', $this->post);
            $this->session->setFlashdata($this->post);
            $this->session->setFlashdata('message_info', $message_info);
            return redirect()->to( base_url().'/login');
            exit;
        }
        
    }
}