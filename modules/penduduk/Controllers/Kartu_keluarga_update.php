<?php

namespace Penduduk\Controllers;
use App\Controllers\BaseController;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_perubahan_kk;
use Config\Paths;
class Kartu_keluarga_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
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
        $id_perubahan_kk = 0;

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        if(isset($this->post['id_perubahan_kk']) && $this->post['id_perubahan_kk'] != '' ){
            $data_perubahan_kk = $this->tbl_perubahan_kk->where(['id_perubahan_kk' => $this->post['id_perubahan_kk'], 'status_perubahan_kk' => 1, 'id_user' => $insert_user_id])->first();
            if($data_perubahan_kk){
                $id_perubahan_kk = $this->post['id_perubahan_kk'];
                $new_data = false;
            }
        }

        //setup array key data insert
        $set_data = [
            'id_user' => $insert_user_id,
            'nkk' => '',
            'kel_desa' => '',
            'nama_kepala_keluarga' => '',
            'alamat' => '',
            'rt' => '',
            'rw' => '',
            'kode_pos' => '',
            'tanggal_dikeluarkan' => '',
            'status_perubahan_kk' => 1
        ];

        if(isset($this->post['nkk']) && mb_strlen($this->post['nkk'] , "UTF-8") == 16 ){
            $set_data['nkk'] = $this->post['nkk'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Nomor Kartu Keluarga tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['nama_kepala_keluarga']) && $this->post['nama_kepala_keluarga'] != '' && mb_strlen($this->post['nama_kepala_keluarga'] , "UTF-8") <= 150 ){
            $set_data['nama_kepala_keluarga'] = $this->post['nama_kepala_keluarga'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Nama kepala Keluarga tidak sesuai ketentuan<br>';
        }


        if(isset($this->post['tanggal_dikeluarkan']) && $this->post['tanggal_dikeluarkan'] != '' ){
            $set_data['tanggal_dikeluarkan'] = $this->post['tanggal_dikeluarkan'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Tanggal dikeluarkan kartu keluarga belum diisi<br>';
        }

        if(isset($this->post['kel_desa']) && mb_strlen($this->post['kel_desa'] , "UTF-8") == 13 ){
            $set_data['kel_desa'] = $this->post['kel_desa'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Periksa kembali kolom provinsi, kabupate/kota, kecamatan dan desa/kelurahan<br>';
        }

        if(isset($this->post['alamat']) && mb_strlen($this->post['alamat'] , "UTF-8") <= 150 ){
            $set_data['alamat'] = $this->post['alamat'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Alamat tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['rt']) && mb_strlen($this->post['rt'] , "UTF-8") <= 3 ){
            $set_data['rt'] = intval($this->post['rt']);
        } else {
            $valid = false;
            $message_info['text'] .= 'rt tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['rw']) && mb_strlen($this->post['rw'] , "UTF-8") <= 3 ){
            $set_data['rw'] = intval($this->post['rw']);
        } else {
            $valid = false;
            $message_info['text'] .= 'rw tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['kode_pos']) && mb_strlen($this->post['kode_pos'] , "UTF-8") <= 5 ){
            $set_data['kode_pos'] = intval($this->post['kode_pos']);
        }

                // simpan ke basis data
                if($valid){
                    if($new_data){
                        //$set_data['create_time'] = get_now();
                        //$set_data['update_time'] = get_now();
                        if(!empty($_FILES['foto_kk']['tmp_name'])){
                             
                            if($this->tbl_perubahan_kk->insert($set_data)){
                                $id_perubahan_kk = $this->tbl_perubahan_kk->db->insertID();
                                $message_info['status'] = 1;
                                $message_info['text'] .= 'Data kartu keluarga berhasil simpan<br>';
                            } else {
                                $message_info['text'] .= 'Data kartu keluarga gagal simpan<br>';
                                $insert_user_id = 0;
                            }
                        } else {
                            $insert_user_id = 0;
                            $message_info['text'] .= 'Lengkapi foto Kartu Keluarga';
                        }
                        
                    } else {
                        //$set_data['update_time'] = get_now();
                        //$this->tbl_perubahan_kk->set($set_data);
                        //$this->tbl_perubahan_kk->where('id_user', $insert_user_id);
                        
                        if($this->tbl_perubahan_kk->set($set_data)->where('id_perubahan_kk', $id_perubahan_kk)->update()){
                            $message_info['status'] = 1;
                            $message_info['text'] .= 'Data kartu keluarga berhasil diubah<br>';
                        } else {
                            $message_info['text'] .= 'Data kartu keluarga gagal diubah<br>';
                            $insert_user_id = 0;
                        }
                    }
                }

        if($id_perubahan_kk && $insert_user_id && $valid){
            if(!empty($_FILES['foto_kk']['tmp_name'])){

                $foto_kk = $this->request->getFile('foto_kk');

                if ($foto_kk->isValid() && ! $foto_kk->hasMoved()){
                    $new_name_foto_kk = $foto_kk->getRandomName();
                    $foto_kk->move(WRITEPATH ."user_upload/".$insert_user_id.'/foto_kk','kk_'.$new_name_foto_kk);
                    try {
                        $image = \Config\Services::image()
                            ->withFile(WRITEPATH ."user_upload/".$insert_user_id.'/foto_kk/kk_'.$new_name_foto_kk)
                            ->resize(1040, 1040, true, 'width')
                            ->save(WRITEPATH ."user_upload/".$insert_user_id.'/foto_kk/kk_'.$new_name_foto_kk);
                    } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
                        $message_info['text'] .= 'Foto kartu keluarga failed resize. :'.$e->getMessage().'<br>';
                    }
                    
                    $file_foto_kk =  'user_upload/'.$insert_user_id.'/foto_kk/kk_'.$new_name_foto_kk;
                    $link_foto_kk = urlencode(base64_encode($file_foto_kk));
                    $foto_kk_insert = array( 'link_foto_kk' => $link_foto_kk, 'file_foto_kk' => $file_foto_kk);
                    if($this->tbl_perubahan_kk->set($foto_kk_insert)->where(['id_user' => $insert_user_id, 'id_perubahan_kk' => $id_perubahan_kk])->update()){
                        $message_info['text'] .= 'Foto kartu keluarga berhasil di tambahkan.<br>';
                    } else {
                        $message_info['text'] .= 'Gagal membuat link foto kartu keluarga.<br>';
                    }
                } else {
                    $message_info['text'] .= 'Foto kartu keluarga gagal diunggah.<br>';
                }
            }
        }

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $message_info);
        if($id_perubahan_kk != ''){
            return redirect()->to( base_url().'/penduduk/kartu-keluarga-edit/'.$id_perubahan_kk);
        } else {
            return redirect()->to( base_url().'/penduduk/kartu-keluarga-edit');
        }
        
        exit;
    }
}
