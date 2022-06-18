<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Email_lib;
use App\Models\Tbl_template_email;
use App\Models\Tbl_setup_phpmailer;
use App\Models\Tbl_user;
class Register_simpan extends BaseController
{
    public $tbl_user;
    public $tbl_template_email;
    public $tbl_setup_phpmailer;
    public $email;
    public function __construct()
    {
        $this->email = new Email_lib();
        $this->tbl_user = new Tbl_user();
        $this->tbl_template_email = new Tbl_template_email();
        $this->tbl_setup_phpmailer = new Tbl_setup_phpmailer(); 
        helper('Date_helper'); 
        helper('text');
    }
    public function index()
    {        
        $compose_email = [
            'email_pesan' => '',
            'email_judul' => 'Verifikasi Email Anda',
            'email_penerima' => '',
            'nama_penerima' => '',
        ];

        $compose_email['email_pesan'] = 'Hi, [#nama_alias#]. Silahkan klik link berikut untuk melakukan verifikasi email<br><a href="[#link_verifikasi#]">Klik disini Link Verifikasi</a><br> Username Anda : [#email#]';
        
        $db_template = $this->tbl_template_email->where(['jenis_template_email' => 'template_verifikasi_email', 'default_email' => 1])->first();
        if($db_template){
            $db_template = $this->tbl_template_email->where(['jenis_template_email' => 'template_verifikasi_email'])->first(); 
        }
        if($db_template){
            $compose_email['email_pesan'] = $db_template['isi_email'];
            $compose_email['email_judul'] = $db_template['judul_email'];
        }

        $token = random_string('alnum', 16);
        $update = false;
        //$this->post = $this->request->getPost();
        // baris initial state

        $set_data = [
            'nama_alias' => '',
            'email' => '',
            'password' => '',
            'status_user' => 2,
            'email_verified' => 1,
            'tipe_user' => 3,
            'token' => $token
        ];

        
        if($this->tbl_user->where(['tipe_user' => 1])->first()){
            $set_data['tipe_user'] = 3;
        } else {
            $set_data['tipe_user'] = 1;
        }

        $message_info = ['status' => 0,  'text' => ''];
        $valid = true;
        // baris proses
        if(isset($this->post['nama_alias']) && $this->post['nama_alias'] != ''){
            if(mb_strlen($this->post['nama_alias'], "UTF-8") >= 3 && mb_strlen($this->post['nama_alias'], "UTF-8") <= 50 ){
                $set_data['nama_alias'] = $this->post['nama_alias'];
            } else {
                $valid = false;
                $message_info['text'] .= 'Jumlah karakter Nama tidak sesuai ketentuan. <br>';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Nama tidak boleh kosong. <br>';
        }
        if(isset($this->post['email']) && $this->post['email'] != '' && mb_strlen($this->post['email'], "UTF-8") <= 50 ){
            if(filter_var($this->post['email'], FILTER_VALIDATE_EMAIL)){
                $db_user = $this->tbl_user->where(['email' => strtolower($this->post['email'])])->first();
                if($db_user == null ){
                    $set_data['email'] = strtolower($this->post['email']);
                } else {
                    if($db_user['email_verified'] != 2){
                        $update = true;
                        $set_data['email'] = strtolower($this->post['email']);
                    } else {
                        $valid = false;
                        $message_info['text'] .= 'Gunakan email lain yang belum terdaftar. <br>';
                    }
                }
            } else {
                $valid = false;
                $message_info['text'] .= 'Email tidak valid. <br>';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Email tidak boleh kosong. <br>';
        }
        if(isset($this->post['password']) && $this->post['password'] != ''){
            if(mb_strlen($this->post['password'], "UTF-8") >= 8 && mb_strlen($this->post['password'], "UTF-8") <= 25){
                $set_data['password'] = $this->post['password'];
            } else {
                $valid = false;
                $message_info['text'] .= 'Jumlah karakter password tidak sesuai ketentuan <br>';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Password tidak boleh kosong. <br>';
        }
        if($valid){
            if($update){
                if($this->tbl_user->where(['id_user' => $db_user['id_user']])->set($set_data)->update()){
                    $insert_id = $db_user['id_user'];
                } else {
                    $insert_id = 0;
                }
            } else {
                if($this->tbl_user->insert($set_data)){
                   $insert_id = $this->tbl_user->db->insertID(); 
                } else {
                    $insert_id = 0;
                }
            }
            if($insert_id){
                $this->post = [];
                if(isset($compose_email['email_pesan'])){
                    $compose_email['email_pesan'] = str_replace( '[#nama_alias#]', $set_data['nama_alias'], $compose_email['email_pesan']);
                    $compose_email['email_pesan'] = str_replace( '[#email#]', $set_data['email'], $compose_email['email_pesan']);
                    $compose_email['email_pesan'] = str_replace( '[#link_verifikasi#]', base_url().'/register-verifikasi/'.$token, $compose_email['email_pesan']);
                }
                
                $compose_email['email_penerima'] = $set_data['email'];
                $compose_email['nama_penerima'] =  $set_data['nama_alias'];
                $email_status = $this->email->kirim_email($compose_email);
                if($email_status['status']){
                    $message_info['status'] = 1;
                    $message_info['text'] .= 'Selamat, Anda telah berhasil melakukan pendaftaran. <br>Periksa kotak masuk email Anda dan lakukan verifikasi email untuk bisa login. <br>Kami telah mengirim link ke email <b>'.$set_data['email'].'</b><br>';    
                } else {
                    if($this->tbl_user->where(['id_user' => $insert_id])->set([ 'email_verified' => 2])->update()){
                        $message_info['status'] = 1;
                        $message_info['text'] .= 'Selamat, Anda telah berhasil melakukan pendaftaran. <br> Silahkan login</b><br>';
                    } else {
                        $message_info['text'] .= 'Email verifikasi gagal dikirim<br>';
                    }
                }
            } else {
                $message_info['text'] .= 'Gagal menyimpan informasi pendaftaran<br>';
            }
        }
        //baris hasil
        $this->session->setFlashdata($this->post);
        $this->session->setFlashdata('message_info', $message_info);
        return redirect()->to( base_url().'/register');
        exit;
    }
}