<?php

namespace Master\Controllers;
use App\Controllers\BaseController;
use Master\Models\Tbl_data_diri;
use Master\Models\Tbl_perubahan_kk;
use Master\Models\Tbl_surat_kelahiran;
use Master\Models\Tbl_template_email;
use Master\Models\Tbl_tiket;
use Config\Paths;
class Template_email_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_kelahiran;
    public $tbl_template_email;
    public $tbl_tiket;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_template_email = new Tbl_template_email();
        $this->tbl_tiket = new Tbl_tiket();
        $this->message_info = ['status' => 0,  'text' => ''];
        $this->invalid_info = [];
        $this->cek_login([
            'tipe_user' => 1, 
            'status_user' => 2, 
            'email_verified' => 2
            ]);
        helper('Date_helper');
        helper('Ganti_teks_helper');
        helper('Jenis_template_email_helper');
        helper('text');
    }

    public function index()
    {
        $this->post = $this->request->getPost();
        //init
        $valid = true;
        $new_data = true;
        $insert_user_id = 0;
        $id_template_email = 0;

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }
        
        //setup array key data insert
        $set_data = [
            'id_user' => $insert_user_id,
            'judul_email' => '',
            'jenis_template_email' => '',
            'default_email' => 0,
            'isi_email' => ''
        ];
        
        if(isset($this->post['id_template_email']) && $this->post['id_template_email'] != '' ){
            $data_template_email = $this->tbl_template_email->where(['id_template_email' => $this->post['id_template_email'] ])->first();
            if($data_template_email){
                $id_template_email = $this->post['id_template_email'];
                $new_data = false;
            }
        }
       
        $arr_postfix = [ '_anak' => 'Anak', '_ayah' => 'Ayah', '_ibu' => 'Ibu' ];

        if(isset($this->post['isi_email']) &&  $this->post['isi_email'] != '' ){
            $set_data['isi_email'] = $this->post['isi_email'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Email template tidak boleh kosong<br>';
            $this->invalid_info['isi_email'] = 'Email template tidak boleh kosong';
        }

        if(isset($this->post['default_email']) &&  $this->post['default_email'] == 1 ){
            $set_data['default_email'] = $this->post['default_email'];
        }

        if(isset($this->post['judul_email']) && $this->post['judul_email'] !=  ''  ){
            if( mb_strlen($this->post['judul_email'] , "UTF-8") <= 100 ){
                $set_data['judul_email'] = $this->post['judul_email'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Judul Email melebihi 100 karakter<br>';
                $this->invalid_info['judul_email'] = 'Judul Email melebihi 100 karakter';
            }
        } else  {
            $valid = false;
            $this->message_info['text'] .= 'Judul Email tidak boleh kosong<br>';
            $this->invalid_info['judul_email'] = 'Judul Email tidak boleh kosong';
        }

        if(isset($this->post['jenis_template_email']) && $this->post['jenis_template_email'] != '' && isset(jenis_template_email()[$this->post['jenis_template_email']]) ){
            $set_data['jenis_template_email'] = $this->post['jenis_template_email'];
            $jenis_template_email = str_replace('_', '-', $this->post['jenis_template_email']);
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Jenis template tidak diketahui, kembali ke halaman utama dan coba lagi<br>';
            $this->invalid_info['jenis_template_email'] = 'Jenis template tidak diketahui, kembali ke halaman utama dan coba lagi';
        }
                // simpan ke basis data
                if($valid){
                    if($new_data){
                        if($this->tbl_template_email->insert($set_data)){
                            $this->message_info['status'] = 1;
                            $this->message_info['text'] .= 'Template email berhasi dibuat<br>';
                            $id_template_email = $this->tbl_template_email->db->insertID();
                        } else {
                            $valid = false;
                            $this->message_info['text'] .= 'Gagal Membuat template email<br>';
                        }
                    } else {
                        if($this->tbl_template_email->set($set_data)->where('id_template_email', $id_template_email)->update()){
                            $this->message_info['status'] = 1;
                            $this->message_info['text'] .= 'Template email berhasil diubah<br>';
                        } else {
                            $valid = false;
                            $this->message_info['text'] .= 'Template email gagal diubah<br>';
                        }
                    }


                    if($valid && $set_data['default_email'] == 1){
                        $this->tbl_template_email
                        ->set(['default_email' => 0])
                        ->where(['jenis_template_email' => $set_data['jenis_template_email'], 'id_template_email !=' => $id_template_email])
                        ->update();
                    }
                }


        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        if($id_template_email != '' && $id_template_email > 0 && isset($jenis_template_email)){
            if($this->message_info['status']){
                return redirect()->to( base_url().'/master/template-email/'.$jenis_template_email);
            } else {
                return redirect()->to( base_url().'/master/template-email-edit/'.$jenis_template_email.'/'.$id_template_email);
            }
        } else {
            return redirect()->to( base_url().'/master/template-email');
        }
        
        exit;
    }
}
