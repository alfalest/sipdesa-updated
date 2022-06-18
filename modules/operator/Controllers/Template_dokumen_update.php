<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_data_diri;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_surat_kelahiran;
use Operator\Models\Tbl_template_dokumen;
use Operator\Models\Tbl_tiket;
use Config\Paths;
class Template_dokumen_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_kelahiran;
    public $tbl_template_dokumen;
    public $tbl_tiket;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_template_dokumen = new Tbl_template_dokumen();
        $this->tbl_tiket = new Tbl_tiket();
        $this->message_info = ['status' => 0,  'text' => ''];
        $this->invalid_info = [];
        $this->cek_login([
            'tipe_user' => 2, 
            'status_user' => 2, 
            'email_verified' => 2
            ]);
        helper('Date_helper');
        helper('Ganti_teks_helper');
        helper('text');
    }

    public function index()
    {
        $this->post = $this->request->getPost();
        //init
        $valid = true;
        $new_data = true;
        $insert_user_id = 0;
        $id_template_dokumen = 0;

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }
        
        //setup array key data insert
        $set_data = [
            'id_user_operator' => $insert_user_id,
            'nama_template' => '',
            'jenis_template' => '',
            'default_template' => 0,
            'template_dokumen' => ''
        ];
        
        if(isset($this->post['id_template_dokumen']) && $this->post['id_template_dokumen'] != '' ){
            $data_template_dokumen = $this->tbl_template_dokumen->where(['id_template_dokumen' => $this->post['id_template_dokumen'] ])->first();
            if($data_template_dokumen){
                $id_template_dokumen = $this->post['id_template_dokumen'];
                $new_data = false;
            }
        }
       
        $arr_postfix = [ '_anak' => 'Anak', '_ayah' => 'Ayah', '_ibu' => 'Ibu' ];

        if(isset($this->post['template_dokumen']) &&  $this->post['template_dokumen'] != '' ){
            $set_data['template_dokumen'] = $this->post['template_dokumen'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Dokumen template tidak boleh kosong<br>';
            $this->invalid_info['template_dokumen'] = 'Dokumen template tidak boleh kosong';
        }

        if(isset($this->post['default_template']) &&  $this->post['default_template'] == 1 ){
            $set_data['default_template'] = $this->post['default_template'];
        }

        if(isset($this->post['nama_template']) && $this->post['nama_template'] !=  ''  ){
            if( mb_strlen($this->post['nama_template'] , "UTF-8") <= 100 ){
                $set_data['nama_template'] = $this->post['nama_template'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Nama template melebihi 100 karakter<br>';
                $this->invalid_info['nama_template'] = 'Nama template melebihi 100 karakter';
            }
        } else  {
            $valid = false;
            $this->message_info['text'] .= 'Nama template tidak boleh kosong<br>';
            $this->invalid_info['nama_template'] = 'Nama template tidak boleh kosong';
        }

        if(isset($this->post['jenis_template']) && $this->post['jenis_template'] != '' && isset(nama_teks()[$this->post['jenis_template']]) ){
            $set_data['jenis_template'] = $this->post['jenis_template'];
            $jenis_template = str_replace('_', '-', $this->post['jenis_template']);
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Jenis template tidak diketahui, kembali ke halaman utama dan coba lagi<br>';
            $this->invalid_info['jenis_template'] = 'Jenis template tidak diketahui, kembali ke halaman utama dan coba lagi';
        }
                // simpan ke basis data
                if($valid){
                    if($new_data){
                        if($this->tbl_template_dokumen->insert($set_data)){
                            $this->message_info['status'] = 1;
                            $this->message_info['text'] .= 'Template dokumen berhasi dibuat<br>';
                            $id_template_dokumen = $this->tbl_template_dokumen->db->insertID();
                        } else {
                            $valid = false;
                            $this->message_info['text'] .= 'Gagal Membuat tiket undangan<br>';
                        }
                    } else {
                        if($this->tbl_template_dokumen->set($set_data)->where('id_template_dokumen', $id_template_dokumen)->update()){
                            $this->message_info['status'] = 1;
                            $this->message_info['text'] .= 'Template dokumen berhasil diubah<br>';
                        } else {
                            $valid = false;
                            $this->message_info['text'] .= 'Template dokumen gagal diubah<br>';
                        }
                    }

                    if($valid && $set_data['default_template'] == 1){
                        $this->tbl_template_dokumen
                        ->set(['default_template' => 0])
                        ->where(['jenis_template' => $set_data['jenis_template'], 'id_template_dokumen !=' => $id_template_dokumen])
                        ->update();
                    }
                }


        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        if($id_template_dokumen != '' && $id_template_dokumen > 0 && isset($jenis_template)){
            if($this->message_info['status']){
                return redirect()->to( base_url().'/operator/template-dokumen/'.$jenis_template);
            } else {
                return redirect()->to( base_url().'/operator/template-dokumen-edit/'.$jenis_template.'/'.$id_template_dokumen);
            }
        } else {
            return redirect()->to( base_url().'/operator/template-dokumen');
        }
        
        exit;
    }
}
