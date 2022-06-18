<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_user;
use Config\Paths;
class Ganti_password_update extends BaseController
{
    public $post;
    public $tbl_user;
    public function __construct()
    {
        $this->tbl_user = new Tbl_user();
        $this->cek_login([
            'tipe_user' => 2, 
            'status_user' => 2, 
            'email_verified' => 2
            ]);
        helper('Date_helper');
    }

    public function index()
    {
        $this->post = $this->request->getPost();
        //init
        $valid = true;
        $id_user = 0;
        $message_info = ['status' => 0,  'text' => ''];
        $invalid_info = [];
        $data_user = [];
        $password_lama = '';
        $password_baru = '';
        $konfirmasi_password_baru = '';

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
            if($id_user){
                //ambil data user dari database
                $data_user = $this->tbl_user->where(['id_user' => $id_user])->first();
                if($data_user){
                    $password_lama = $data_user['password'];
                } else {
                    $valid = false;
                    $message_info['text'] .= 'Data user tidak ditemukan<br>';
                }
            } else {
                $valid = false;
                $message_info['text'] .= 'Data user session tidak ditemukan<br>';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Data user session tidak ditemukan<br>';
        }

        //setup array key data insert
        $set_data = [
            'password' => ''
        ];


        if(isset($this->post['password_lama']) && $this->post['password_lama'] != '' && mb_strlen($this->post['password_lama'] , "UTF-8") >= 8 && mb_strlen($this->post['password_lama'] , "UTF-8") <= 25 ){
            if($password_lama != $this->post['password_lama']){
                $valid = false;
                $message_info['text'] .= 'Password lama salah<br>';
                $invalid_info['password_lama'] = 'Password lama salah';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Password lama tidak sesuai ketentuan<br>';
            $invalid_info['password_lama'] = 'Password lama salah';
        }

        if(isset($this->post['password_baru']) && $this->post['password_baru'] != '' && mb_strlen($this->post['password_baru'] , "UTF-8") >= 8 && mb_strlen($this->post['password_baru'] , "UTF-8") <= 25 ){
            $set_data['password'] = $this->post['password_baru'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Password baru tidak sesuai ketentuan<br>';
            $invalid_info['password_baru'] = 'Password baru tidak sesuai ketentuan';
        }

        if(isset($this->post['konfirmasi_password_baru']) && $this->post['konfirmasi_password_baru'] != '' && mb_strlen($this->post['konfirmasi_password_baru'] , "UTF-8") >= 8 && mb_strlen($this->post['konfirmasi_password_baru'] , "UTF-8") <= 25 ){
            if($this->post['konfirmasi_password_baru'] != $this->post['password_baru']){
                $valid = false;
                $message_info['text'] .= 'Konfirmasi password tidak sama<br>';
                $invalid_info['konfirmasi_password_baru'] = 'Konfirmasi password tidak sama';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Konfirmasi Password baru tidak sesuai ketentuan<br>';
            $invalid_info['konfirmasi_password_baru'] = 'Konfirmasi Password baru tidak sesuai ketentuan';
        }

      

        // simpan ke basis data
        if($valid &&  $set_data['password'] != ''){
                
                if($this->tbl_user->set($set_data)->where('id_user', $id_user)->update()){
                    $message_info['status'] = 1;
                    $message_info['text'] .= 'Password berhasil diubah<br>';
                } else {
                    $message_info['text'] .= 'Password gagal diubah<br>';
                }
            
        }

        $this->session->setFlashdata('invalid_info', $invalid_info);
        if( $message_info['status'] == 0 ){
            $this->session->setFlashdata('inp_val', $this->post);
        }
        $this->session->setFlashdata('message_info', $message_info);
        return redirect()->to( base_url().'/operator/ganti-password-edit');
        exit;
    }
}
