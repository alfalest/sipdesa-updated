<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_data_diri;
use Config\Paths;
class Data_diri_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
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



        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
            $data_diri = [];
            if($insert_user_id){
                //ambil data user dari database
                $data_diri = $this->tbl_data_diri->where(['id_user' => $insert_user_id])->first();
                if($data_diri){
                    $new_data = false;
                }
            }
        }

        //setup array key data insert
        $set_data = [
            'id_user' => $insert_user_id,
            'nama_lengkap' => '',
            'nik' => '',
            'jenis_kelamin' => '',
            'gol_darah' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'agama' => '',
            'jenis_pekerjaan' => '',
            'status_perkawinan' => '',
            'kewarganegaraan' => '',
            'kel_desa' => '',
            'alamat' => '',
            'rt' => '',
            'rw' => '',
            'kode_pos' => '',
            'telepon' => ''
        ];

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
            $message_info['text'] .= 'Nama tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['jenis_kelamin']) && $this->post['jenis_kelamin'] != ''){
            $set_data['jenis_kelamin'] = $this->post['jenis_kelamin'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Jenis kelamin tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['gol_darah']) && $this->post['gol_darah'] != ''){
            $set_data['gol_darah'] = $this->post['gol_darah'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Golongan darah tidak sesuai ketentuan<br>';
        }

        if(isset($this->post['tempat_lahir']) && mb_strlen($this->post['tempat_lahir'] , "UTF-8") <= 100 ){
            $set_data['tempat_lahir'] = $this->post['tempat_lahir'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Tempat Lahir tidak sesuai ketentuan<br>';
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
            $message_info['text'] .= 'agama belum diisi<br>';
        }

        if(isset($this->post['jenis_pekerjaan']) && $this->post['jenis_pekerjaan'] != '' ){
            $set_data['jenis_pekerjaan'] = $this->post['jenis_pekerjaan'];
        } else {
            $valid = false;
            $message_info['text'] .= 'jenis pekerjaan belum diisi<br>';
        }

        if(isset($this->post['status_perkawinan']) && $this->post['status_perkawinan'] != '' ){
            $set_data['status_perkawinan'] = $this->post['status_perkawinan'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Status perkawinan belum diisi<br>';
        }

        if(isset($this->post['kewarganegaraan']) && $this->post['kewarganegaraan'] != '' ){
            $set_data['kewarganegaraan'] = $this->post['kewarganegaraan'];
        } else {
            $valid = false;
            $message_info['text'] .= 'Kewarganegaraan tidak sesuai ketentuan<br>';
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

        if(isset($this->post['telepon']) && mb_strlen($this->post['telepon'] , "UTF-8") <= 13 ){
            $set_data['telepon'] = $this->post['telepon'];
        } else {
            $valid = false;
            $message_info['text'] .= 'telepon tidak sesuai ketentuan<br>';
        }

        // simpan ke basis data
        if($valid){
            if($new_data){
                //$set_data['create_time'] = get_now();
                //$set_data['update_time'] = get_now();
                if(!empty($_FILES['foto_ktp']['tmp_name']) && !empty($_FILES['foto_diri']['tmp_name'])){
                    if($this->tbl_data_diri->insert($set_data)){
                        $message_info['status'] = 1;
                        $message_info['text'] .= $insert_user_id.'Data diri berhasil simpan<br>';
                    } else {
                        $message_info['text'] .= 'Data diri gagal simpan<br>';
                        $insert_user_id = 0;
                    }
                } else {
                    $insert_user_id = 0;
                    $message_info['text'] .= 'Lengkapi foto ktp dan foto diri';
                }
                
            } else {
                //$set_data['update_time'] = get_now();
                //$this->tbl_data_diri->set($set_data);
                //$this->tbl_data_diri->where('id_user', $insert_user_id);
                
                if($this->tbl_data_diri->set($set_data)->where('id_user', $insert_user_id)->update()){
                    $message_info['status'] = 1;
                    $message_info['text'] .= 'Data diri berhasil diubah<br>';
                } else {
                    $message_info['text'] .= 'Data diri gagal diubah<br>';
                    $insert_user_id = 0;
                }
            }
        }

        if($insert_user_id && $valid){
            if(!empty($_FILES['foto_ktp']['tmp_name'])){

                $foto_ktp = $this->request->getFile('foto_ktp');

                if ($foto_ktp->isValid() && ! $foto_ktp->hasMoved()){
                    $new_name_foto_ktp = $foto_ktp->getRandomName();
                    $foto_ktp->move(WRITEPATH ."user_upload/".$insert_user_id.'/foto_ktp','ktp_'.$new_name_foto_ktp);
                    try {
                        $image = \Config\Services::image()
                            ->withFile(WRITEPATH ."user_upload/".$insert_user_id.'/foto_ktp/ktp_'.$new_name_foto_ktp)
                            ->resize(1040, 1040, true, 'width')
                            ->save(WRITEPATH ."user_upload/".$insert_user_id.'/foto_ktp/ktp_'.$new_name_foto_ktp);
                    } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
                        $message_info['text'] .= 'Foto ktp failed resize. :'.$e->getMessage().'<br>';
                    }
                    
                    $file_foto_ktp =  'user_upload/'.$insert_user_id.'/foto_ktp/ktp_'.$new_name_foto_ktp;
                    $link_foto_ktp = urlencode(base64_encode($file_foto_ktp));
                    $foto_ktp_insert = array( 'link_foto_ktp' => $link_foto_ktp, 'file_foto_ktp' => $file_foto_ktp);
                    if($this->tbl_data_diri->set($foto_ktp_insert)->where('id_user', $insert_user_id)->update()){
                        $message_info['text'] .= 'Foto ktp berhasil di tambahkan.<br>';
                    } else {
                        $message_info['text'] .= 'Gagal membuat link foto ktp.<br>';
                    }
                } else {
                    $message_info['text'] .= 'Foto ktp gagal diunggah.<br>';
                }
            }

            if(!empty($_FILES['foto_diri']['tmp_name'])){

                $foto_diri = $this->request->getFile('foto_diri');

                if ($foto_diri->isValid() && ! $foto_diri->hasMoved()){
                    $new_name_foto_diri = $foto_diri->getRandomName();
                    $foto_diri->move(WRITEPATH ."user_upload/".$insert_user_id.'/foto_diri','diri_'.$new_name_foto_diri);
                    try {
                        $image = \Config\Services::image()
                            ->withFile(WRITEPATH ."user_upload/".$insert_user_id.'/foto_diri/diri_'.$new_name_foto_diri)
                            ->resize(1040, 1040, true, 'width')
                            ->save(WRITEPATH ."user_upload/".$insert_user_id.'/foto_diri/diri_'.$new_name_foto_diri);
                    } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
                        $message_info['text'] .= WRITEPATH ."user_upload/".$insert_user_id.'/foto_diri/diri_'.$new_name_foto_diri.' Foto ktp failed resize. :'.$e->getMessage().'<br>';
                    }
                    
                    
                    $file_foto_diri =  'user_upload/'.$insert_user_id.'/foto_diri/diri_'.$new_name_foto_diri;
                    $link_foto_diri = urlencode(base64_encode($file_foto_diri));
                    $foto_diri_insert = array( 'link_foto_diri' => $link_foto_diri, 'file_foto_diri' => $file_foto_diri);
                    if($this->tbl_data_diri->set($foto_diri_insert)->where('id_user', $insert_user_id)->update()){
                        $message_info['text'] .= 'Foto diri berhasil di tambahkan.<br>';
                    } else {
                        $message_info['text'] .= 'Gagal membuat link foto diri.<br>';
                    }
                } else {
                    $message_info['text'] .= 'Foto diri gagal diunggah.<br>';
                }
            }
        }

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $message_info);
        return redirect()->to( base_url().'/operator/data-diri-edit');
        exit;
    }
}
