<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_data_diri;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_master_kk;
use Config\Paths;
class Kartu_keluarga_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_master_kk;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_master_kk = new Tbl_master_kk();
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
        $insert_user_id = 0;
        $message_info = ['status' => 0,  'text' => ''];
        $id_perubahan_kk = 0;

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        if(isset($this->post['id_perubahan_kk']) && $this->post['id_perubahan_kk'] != '' ){
            $data_perubahan_kk = $this->tbl_perubahan_kk->where(['id_perubahan_kk' => $this->post['id_perubahan_kk'], 'status_perubahan_kk' => 1])->first();
            if($data_perubahan_kk){
                $id_perubahan_kk = $this->post['id_perubahan_kk'];
            } else {
                $valid = false;
                $message_info['text'] .= 'Id permohonan tidak ditemukan<br>';
            }
        }

        //setup array key data insert
        $set_data = [
            'id_user_operator' => $insert_user_id,
            'keterangan_operator' => '',
            'belum_dilihat' => 1,
            'status_perubahan_kk' => 1
        ];

        $set_master_data = [
            'nkk' => '',
            'kel_desa' => '',
            'nama_kepala_keluarga' => '',
            'alamat' => '',
            'rt' => '',
            'rw' => '',
            'kode_pos' => '',
            'tanggal_dikeluarkan' => ''
        ];

        if(isset($this->post['keterangan_operator']) && $this->post['keterangan_operator'] != '' && mb_strlen($this->post['keterangan_operator'] , "UTF-8") <= 100 ){
            $set_data['keterangan_operator'] = $this->post['keterangan_operator'];
        } else {
            unset($set_data['keterangan_operator']);
        }

        if(isset($this->post['status_perubahan_kk']) && in_array($this->post['status_perubahan_kk'], [2,3]) ){
            $set_data['status_perubahan_kk'] = $this->post['status_perubahan_kk'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Pilih salah satu jenis verifikasi : Terima atau Tolak<br>';
        }

                // simpan ke basis data
                if($valid && $set_data['status_perubahan_kk'] == 2){
                            $db_perubahan_kk = $this->tbl_perubahan_kk->where(['id_perubahan_kk' => $this->post['id_perubahan_kk']])->first();
                            if($db_perubahan_kk){
                                foreach ($set_master_data as $key => $value) {
                                    if(isset($db_perubahan_kk[$key])){
                                        $set_master_data[$key] = $db_perubahan_kk[$key];
                                    }
                                }

                                if($db_perubahan_kk['file_foto_kk'] != '' ){
                                    $path_foto = pathinfo(WRITEPATH.$db_perubahan_kk['file_foto_kk']);
                                    $copy_from = WRITEPATH.$db_perubahan_kk['file_foto_kk'];
                                    $copy_to = WRITEPATH.'master_kk/'.$db_perubahan_kk['nkk'].'/'.$path_foto['basename'];

                                    if($this->salin_foto($copy_from, $copy_to)){
                                        $set_master_data['link_foto_kk'] = urlencode(base64_encode('master_kk/'.$db_perubahan_kk['nkk'].'/'.$path_foto['basename']));
                                        $set_master_data['file_foto_kk'] = 'master_kk/'.$db_perubahan_kk['nkk'].'/'.$path_foto['basename'];
                                        $set_master_data['id_user_operator'] = $insert_user_id;
                                        $db_master_kk = $this->tbl_master_kk->where(['nkk' => $db_perubahan_kk['nkk']])->first();
                                        if($db_master_kk){
                                            if($this->tbl_master_kk->where(['id_master_kk' => $db_master_kk['id_master_kk']])->set($set_master_data)->update()){

                                            } else {
                                                $valid = false;
                                                $message_info['text'] .= 'Error: gagal mengubah master data<br>';
                                            }
                                        } else {
                                            if($this->tbl_master_kk->insert($set_master_data)){

                                            } else {
                                                $valid = false;
                                                $message_info['text'] .= 'Error: gagal menyimpan master data<br>';
                                            }
                                        }
                                    }  else {
                                        $valid = false;
                                        $message_info['text'] .= 'Error: foto kk tidak tersalin<br>';
                                    }
                                } else {
                                    $valid = false;
                                    $message_info['text'] .= 'Error: foto kk tidak ditemukan<br>';
                                }
                            } else {
                                $valid = false;
                                $message_info['text'] .= 'Error: tidak bisa mengambil data<br>';
                            }
                }

                if($valid && in_array($this->post['status_perubahan_kk'], [2,3])){

                            if($this->tbl_perubahan_kk->set($set_data)->where(['id_perubahan_kk' => $this->post['id_perubahan_kk']])->update()){
                               
                                $message_info['status'] = 1;
                                $message_info['text'] .= 'Data kartu keluarga telah berhasi diverifikasi<br>';
                            } else {
                                $message_info['text'] .= 'Data kartu keluarga gagal diverifikasi<br>';
                                $insert_user_id = 0;
                            }
                } 

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $message_info);
        if($id_perubahan_kk != ''){
            return redirect()->to( base_url().'/operator/kartu-keluarga-lihat/'.$id_perubahan_kk);
        } else {
            return redirect()->to( base_url().'/operator/kartu-keluarga');
        }
        exit;
    }

    public function salin_foto($from, $to) {
        $result = false;
        $path_to = pathinfo($to);

        if (!file_exists($path_to['dirname'])) {
            mkdir($path_to['dirname'], 0777, true);
        }

        if(file_exists($to)) {
            unlink($to);
        }

        if (copy($from, $to)) {
            $result = true;
        }

        return $result;
    }
}
