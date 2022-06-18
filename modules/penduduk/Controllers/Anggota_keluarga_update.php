<?php

namespace Penduduk\Controllers;
use App\Controllers\BaseController;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_perubahan_nik;
use Config\Paths;
class Anggota_keluarga_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_nik;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->cek_login([
            'tipe_user' => 3, 
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
        $new_data = true;
        $insert_user_id = 0;
        $message_info = ['status' => 0,  'text' => ''];
        $id_perubahan_nik = 0;

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        if(isset($this->post['id_perubahan_nik']) && $this->post['id_perubahan_nik'] != '' ){
            $data_perubahan_nik = $this->tbl_perubahan_nik->where(['id_perubahan_nik' => $this->post['id_perubahan_nik'], 'status_perubahan_nik' => 1, 'id_user' => $insert_user_id])->first();
            if($data_perubahan_nik){
                $id_perubahan_nik = $this->post['id_perubahan_nik'];
                $new_data = false;
            }
        }

        //setup array key data insert
        $set_data = [
            'id_user' => $insert_user_id,
            'nkk' => '',
            'nama_lengkap' => '',
            'nik' => '',
            'jenis_kelamin' => '',
            'gol_darah' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'agama' => '',
            'pendidikan_terakhir' => '',
            'jenis_pekerjaan' => '',
            'status_perkawinan' => '',
            'status_hubungan_dalam_keluarga' => '',
            'kewarganegaraan' => '',
            'no_paspor' => '',
            'no_kitap' => '',
            'nama_ayah' => '',
            'nama_ibu' => '',
            'status_perubahan_nik' => 1
        ];

        if(isset($this->post['nkk']) && mb_strlen($this->post['nkk'] , "UTF-8") == 16 ){
            $set_data['nkk'] = $this->post['nkk'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Nomor Kartu Keluarga tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['nik']) && mb_strlen($this->post['nik'] , "UTF-8") == 16 ){
            $set_data['nik'] = $this->post['nik'];
        } else {
            $valid = false;
            $message_info['text'] .= 'NIK tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['nama_lengkap']) && $this->post['nama_lengkap'] != '' && mb_strlen($this->post['nama_lengkap'] , "UTF-8") <= 150 ){
            $set_data['nama_lengkap'] = $this->post['nama_lengkap'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Nama kepala Keluarga tidak sesuai ketentuan<br>';
        }

        
        if(isset($this->post['tempat_lahir']) && $this->post['tempat_lahir'] != '' && mb_strlen($this->post['tempat_lahir'] , "UTF-8") <= 100 ){
            $set_data['tempat_lahir'] = $this->post['tempat_lahir'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Tempat lahir tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['tanggal_lahir']) && $this->post['tanggal_lahir'] != '' ){
            $set_data['tanggal_lahir'] = $this->post['tanggal_lahir'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Tanggal lahir belum diisi<br>';
        }

        
        if(isset($this->post['agama']) && $this->post['agama'] != '' ){
            $set_data['agama'] = $this->post['agama'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Agama belum diisi<br>';
        }

        if(isset($this->post['pendidikan_terakhir']) && $this->post['pendidikan_terakhir'] != '' ){
            $set_data['pendidikan_terakhir'] = $this->post['pendidikan_terakhir'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Pendidikan belum diisi<br>';
        }

        if(isset($this->post['jenis_kelamin']) && $this->post['jenis_kelamin'] != '' ){
            $set_data['jenis_kelamin'] = $this->post['jenis_kelamin'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Jenis Kelamin belum diisi<br>';
        }

        if(isset($this->post['gol_darah']) && $this->post['gol_darah'] != '' ){
            $set_data['gol_darah'] = $this->post['gol_darah'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Gol. Darah belum diisi<br>';
        }

        if(isset($this->post['jenis_pekerjaan']) && $this->post['jenis_pekerjaan'] != '' ){
            $set_data['jenis_pekerjaan'] = $this->post['jenis_pekerjaan'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Jenis Pekerjaan belum diisi<br>';
        }

        if(isset($this->post['status_perkawinan']) && $this->post['status_perkawinan'] != '' ){
            $set_data['status_perkawinan'] = $this->post['status_perkawinan'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Status perkawinan belum diisi<br>';
        }

        if(isset($this->post['status_hubungan_dalam_keluarga']) && $this->post['status_hubungan_dalam_keluarga'] != ''  ){
            $set_data['status_hubungan_dalam_keluarga'] = $this->post['status_hubungan_dalam_keluarga'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Status Hubungan dalam keluarga belum diisi<br>';
        }

        if(isset($this->post['kewarganegaraan']) && $this->post['kewarganegaraan'] != '' && mb_strlen($this->post['kewarganegaraan'] , "UTF-8") <= 100 ){
            $set_data['kewarganegaraan'] = $this->post['kewarganegaraan'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Kewarganegaraan tidak sesuai belum diisi<br>';
        }

        if(isset($this->post['no_paspor']) && $this->post['no_paspor'] != '' && mb_strlen($this->post['no_paspor'] , "UTF-8") <= 20 ){
            $set_data['no_paspor'] = $this->post['no_paspor'];
        } 

        if(isset($this->post['no_kitap']) && $this->post['no_kitap'] != '' && mb_strlen($this->post['no_kitap'] , "UTF-8") <= 20 ){
            $set_data['no_kitap'] = $this->post['no_kitap'];
        }

        if(isset($this->post['nama_ayah']) && $this->post['nama_ayah'] != '' && mb_strlen($this->post['nama_ayah'] , "UTF-8") <= 100 ){
            $set_data['nama_ayah'] = $this->post['nama_ayah'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Nama ayah tidak sesuai belum diisi<br>';
        }

        if(isset($this->post['nama_ibu']) && $this->post['nama_ibu'] != '' && mb_strlen($this->post['nama_ibu'] , "UTF-8") <= 100 ){
            $set_data['nama_ibu'] = $this->post['nama_ibu'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Nama ibu tidak sesuai belum diisi<br>';
        }







                // simpan ke basis data
                if($valid){
                    if($new_data){
                        //$set_data['create_time'] = get_now();
                        //$set_data['update_time'] = get_now();
     
                             
                            if($this->tbl_perubahan_nik->insert($set_data)){
                                $id_perubahan_nik = $this->tbl_perubahan_nik->db->insertID();
                                $message_info['status'] = 1;
                                $message_info['text'] .= $insert_user_id.'Data Anggota keluarga berhasil simpan<br>';
                            } else {
                                $message_info['text'] .= 'Data Anggota keluarga gagal simpan<br>';
                                $insert_user_id = 0;
                            }
                    
                        
                    } else {
                        //$set_data['update_time'] = get_now();
                        //$this->tbl_perubahan_nik->set($set_data);
                        //$this->tbl_perubahan_nik->where('id_user', $insert_user_id);
                        
                        if($this->tbl_perubahan_nik->set($set_data)->where('id_perubahan_nik', $id_perubahan_nik)->update()){
                            $message_info['status'] = 1;
                            $message_info['text'] .= 'Data Anggota keluarga berhasil diubah<br>';
                        } else {
                            $message_info['text'] .= 'Data Anggota keluarga gagal diubah<br>';
                            $insert_user_id = 0;
                        }
                    }
                }

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $message_info);
        if($id_perubahan_nik != ''){
            return redirect()->to( base_url().'/penduduk/anggota-keluarga-edit/'.$id_perubahan_nik);
        } else {
            return redirect()->to( base_url().'/penduduk/anggota-keluarga-edit');
        }
        
        exit;
    }
}
