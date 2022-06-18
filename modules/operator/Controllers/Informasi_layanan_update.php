<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_data_diri;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_surat_kelahiran;
use Operator\Models\Tbl_informasi_layanan;
use Operator\Models\Tbl_tiket;
use Config\Paths;
class Informasi_layanan_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_kelahiran;
    public $tbl_informasi_layanan;
    public $tbl_tiket;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_informasi_layanan = new Tbl_informasi_layanan();
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
        $id_informasi_layanan = 0;

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }
        
        //setup array key data insert
        $set_data = [
            'id_user_operator' => $insert_user_id,
            'nama_informasi' => '',
            'jenis_informasi' => '',
            'default_informasi' => 0,
            'informasi_layanan' => ''
        ];
        
        if(isset($this->post['id_informasi_layanan']) && $this->post['id_informasi_layanan'] != '' ){
            $data_informasi_layanan = $this->tbl_informasi_layanan->where(['id_informasi_layanan' => $this->post['id_informasi_layanan'] ])->first();
            if($data_informasi_layanan){
                $id_informasi_layanan = $this->post['id_informasi_layanan'];
                $new_data = false;
            }
        }
       
        $arr_postfix = [ '_anak' => 'Anak', '_ayah' => 'Ayah', '_ibu' => 'Ibu' ];

        if(isset($this->post['informasi_layanan']) &&  $this->post['informasi_layanan'] != '' ){
            $set_data['informasi_layanan'] = $this->post['informasi_layanan'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Dokumen informasi tidak boleh kosong<br>';
            $this->invalid_info['informasi_layanan'] = 'Dokumen informasi tidak boleh kosong';
        }

        if(isset($this->post['default_informasi']) &&  $this->post['default_informasi'] == 1 ){
            $set_data['default_informasi'] = $this->post['default_informasi'];
        }

        if(isset($this->post['nama_informasi']) && $this->post['nama_informasi'] !=  ''  ){
            if( mb_strlen($this->post['nama_informasi'] , "UTF-8") <= 100 ){
                $set_data['nama_informasi'] = $this->post['nama_informasi'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Nama informasi melebihi 100 karakter<br>';
                $this->invalid_info['nama_informasi'] = 'Nama informasi melebihi 100 karakter';
            }
        } else  {
            $valid = false;
            $this->message_info['text'] .= 'Nama informasi tidak boleh kosong<br>';
            $this->invalid_info['nama_informasi'] = 'Nama informasi tidak boleh kosong';
        }

        if(isset($this->post['jenis_informasi']) && $this->post['jenis_informasi'] != '' && isset(nama_teks()[$this->post['jenis_informasi']]) ){
            $set_data['jenis_informasi'] = $this->post['jenis_informasi'];
            $jenis_informasi = str_replace('_', '-', $this->post['jenis_informasi']);
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Jenis informasi tidak diketahui, kembali ke halaman utama dan coba lagi<br>';
            $this->invalid_info['jenis_informasi'] = 'Jenis informasi tidak diketahui, kembali ke halaman utama dan coba lagi';
        }
                // simpan ke basis data
                if($valid){
                    if($new_data){
                        if($this->tbl_informasi_layanan->insert($set_data)){
                            $this->message_info['status'] = 1;
                            $this->message_info['text'] .= 'Template dokumen berhasi dibuat<br>';
                            $id_informasi_layanan = $this->tbl_informasi_layanan->db->insertID();
                        } else {
                            $valid = false;
                            $this->message_info['text'] .= 'Gagal Membuat tiket undangan<br>';
                        }
                    } else {
                        if($this->tbl_informasi_layanan->set($set_data)->where('id_informasi_layanan', $id_informasi_layanan)->update()){
                            $this->message_info['status'] = 1;
                            $this->message_info['text'] .= 'Template dokumen berhasil diubah<br>';
                        } else {
                            $valid = false;
                            $this->message_info['text'] .= 'Template dokumen gagal diubah<br>';
                        }
                    }

                    if($valid && $set_data['default_informasi'] == 1){
                        $this->tbl_informasi_layanan
                        ->set(['default_informasi' => 0])
                        ->where(['jenis_informasi' => $set_data['jenis_informasi'], 'id_informasi_layanan !=' => $id_informasi_layanan])
                        ->update();
                    }
                }


        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        if($id_informasi_layanan != '' && $id_informasi_layanan > 0 && isset($jenis_informasi)){
            if($this->message_info['status']){
                return redirect()->to( base_url().'/operator/informasi-layanan/'.$jenis_informasi);
            } else {
                return redirect()->to( base_url().'/operator/informasi-layanan-edit/'.$jenis_informasi.'/'.$id_informasi_layanan);
            }
        } else {
            return redirect()->to( base_url().'/operator/informasi-layanan');
        }
        
        exit;
    }
}
