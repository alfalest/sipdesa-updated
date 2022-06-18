<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_data_diri;
use Operator\Models\Tbl_perubahan_nik;
use Operator\Models\Tbl_master_nik;
use Config\Paths;
class Anggota_keluarga_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_nik;
    public $tbl_master_nik;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->tbl_master_nik = new Tbl_master_nik();
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
        $new_data = true;
        $insert_user_id = 0;
        $message_info = ['status' => 0,  'text' => ''];
        $id_perubahan_nik = 0;

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        if(isset($this->post['id_perubahan_nik']) && $this->post['id_perubahan_nik'] != '' ){
            $data_perubahan_nik = $this->tbl_perubahan_nik->where(['id_perubahan_nik' => $this->post['id_perubahan_nik'], 'status_perubahan_nik' => 1])->first();
            if($data_perubahan_nik){
                $id_perubahan_nik = $this->post['id_perubahan_nik'];
                $new_data = false;
            }
        }

        //setup array key data insert
        $set_data = [
            'keterangan_operator' => '',
            'belum_dilihat' => 1,
            'status_perubahan_nik' => 1
        ];

        $set_master_data = [
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
            'nama_ibu' => ''
        ];

        if(isset($this->post['keterangan_operator']) && $this->post['keterangan_operator'] != '' ){
            if( mb_strlen($this->post['keterangan_operator'] , "UTF-8") <= 150 ){
                $set_data['keterangan_operator'] = $this->post['keterangan_operator'];
            } else {
                $valid = false;
                $message_info['text'] .= 'Keterangan melebihi 150 karakter<br>';
            }
        }

        if(isset($this->post['status_perubahan_nik']) && in_array($this->post['status_perubahan_nik'], [2,3]) ){
            $set_data['status_perubahan_nik'] = $this->post['status_perubahan_nik'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Pilih salah satu jenis verifikasi : Terima atau Tolak<br>';
        }


              // simpan ke basis data
            if($valid && $set_data['status_perubahan_nik'] == 2){
              
                $db_perubahan_nik = $this->tbl_perubahan_nik->where(['id_perubahan_nik' => $this->post['id_perubahan_nik']])->first();
                if($db_perubahan_nik){
                    foreach ($set_master_data as $key => $value) {
                        if(isset($db_perubahan_nik[$key])){
                            $set_master_data[$key] = $db_perubahan_nik[$key];
                        }
                    }
                            $db_master_nik = $this->tbl_master_nik->where(['nik' => $db_perubahan_nik['nik']])->first();
                            if($db_master_nik){
                                $set_master_data['id_user_operator'] = $insert_user_id;
                                if($this->tbl_master_nik->where(['id_master_nik' => $db_master_nik['id_master_nik']])->set($set_master_data)->update()){

                                } else {
                                    $valid = false;
                                    $message_info['text'] .= 'Error: gagal mengubah master data<br>';
                                }
                            } else {
                                $set_master_data['id_user_operator'] = $insert_user_id;
                                if($this->tbl_master_nik->insert($set_master_data)){

                                } else {
                                    $valid = false;
                                    $message_info['text'] .= 'Error: gagal menyimpan master data<br>';
                                }
                            }

                } else {
                    $valid = false;
                    $message_info['text'] .= 'Error: tidak bisa mengambil data<br>';
                }
            }


    if($valid && in_array($this->post['status_perubahan_nik'], [2,3])){
                $set_data['id_user_operator'] = $insert_user_id;
                if($this->tbl_perubahan_nik->set($set_data)->where(['id_perubahan_nik' => $this->post['id_perubahan_nik']])->update()){
                    $message_info['status'] = 1;
                    $message_info['text'] .= 'Data kartu keluarga telah berhasi diverifikasi<br>';
                } else {
                    $message_info['text'] .= 'Data kartu keluarga gagal diverifikasi<br>';
                    $insert_user_id = 0;
                }
    } 

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $message_info);

        if($id_perubahan_nik != ''){
            if($message_info['status']){
                return redirect()->to( base_url().'/operator/anggota-keluarga-lihat/'.$id_perubahan_nik);
            } else {
                return redirect()->to( base_url().'/operator/anggota-keluarga-edit/'.$id_perubahan_nik);
            }
        } else {
            return redirect()->to( base_url().'/operator/anggota-keluarga');
        }
        
        exit;
    }
}
