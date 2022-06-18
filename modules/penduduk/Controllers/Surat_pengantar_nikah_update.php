<?php

namespace Penduduk\Controllers;
use App\Controllers\BaseController;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_surat_pengantar_nikah;
use Config\Paths;
class Surat_pengantar_nikah_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_pengantar_nikah;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_pengantar_nikah = new Tbl_surat_pengantar_nikah();
        $this->message_info = ['status' => 0,  'text' => ''];
        $this->invalid_info = [];
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
        $id_surat_pengantar_nikah = 0;

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        if(isset($this->post['id_surat_pengantar_nikah']) && $this->post['id_surat_pengantar_nikah'] != '' ){
            $data_perubahan_kk = $this->tbl_surat_pengantar_nikah->where(['id_surat_pengantar_nikah' => $this->post['id_surat_pengantar_nikah'], 'status_surat_pengantar_nikah' => 1, 'id_user' => $insert_user_id])->first();
            if($data_perubahan_kk){
                $id_surat_pengantar_nikah = $this->post['id_surat_pengantar_nikah'];
                $new_data = false;
            }
        }

        //setup array key data insert
        $set_data = [
            'status_surat_pengantar_nikah' => 1,
            'id_user_operator' => '',
            'keterangan_operator' => '',
            'belum_dilihat' => '',
            
            'id_user' => $insert_user_id,
            'nama_pemohon' => '',
            'nama_pasangan' => '',
            'nama_ayah_pasangan' => '',
            'nama_ayah' => '',
            'nama_ibu' => '',
            'nik_pemohon' => '',
            'nik_pasangan' => '',
            'nik_ayah' => '',
            'nik_ibu' => '',
            'jenis_kelamin_pemohon' => '',
            'jenis_kelamin_pasangan' => '',
            'jenis_kelamin_ayah' => 1,
            'jenis_kelamin_ibu' => 2,
            'tempat_lahir_pemohon' => '',
            'tempat_lahir_pasangan' => '',
            'tempat_lahir_ayah' => '',
            'tempat_lahir_ibu' => '',
            'tanggal_lahir_pemohon' => '',
            'tanggal_lahir_pasangan' => '',
            'tanggal_lahir_ayah' => '',
            'tanggal_lahir_ibu' => '',
            'agama_pemohon' => '',
            'agama_pasangan' => '',
            'agama_ayah' => '',
            'agama_ibu' => '',
            'jenis_pekerjaan_pemohon' => '',
            'jenis_pekerjaan_pasangan' => '',
            'jenis_pekerjaan_ayah' => '',
            'jenis_pekerjaan_ibu' => '',
            'alamat_pemohon' => '',
            'alamat_pasangan' => '',
            'alamat_ayah' => '',
            'alamat_ibu' => '',
            'rt_pemohon' => '',
            'rt_pasangan' => '',
            'rt_ayah' => '',
            'rt_ibu' => '',
            'rw_pemohon' => '',
            'rw_pasangan' => '',
            'rw_ayah' => '',
            'rw_ibu' => '',
            'kel_desa_pemohon' => '',
            'kel_desa_pasangan' => '',
            'kel_desa_ayah' => '',
            'kel_desa_ibu' => '',
            'kode_pos_pemohon' => '',
            'kode_pos_pasangan' => '',
            'kode_pos_ayah' => '',
            'kode_pos_ibu' => '',
            'kewarganegaraan_pemohon' => '',
            'kewarganegaraan_pasangan' => '',
            'kewarganegaraan_ayah' => '',
            'kewarganegaraan_ibu' => '',
            'status_pernikahan_pemohon' => '',
            'beristri_ke' => ''

        ];

        $arr_postfix = [ '_akad' => 'Akad', '_pemohon' => 'Pemohon', '_pasangan' => 'Pasangan', '_ayah' => 'Ayah', '_ibu' => 'Ibu' ];

        //validation
        foreach ($arr_postfix as $key => $value) {
            if($key == '_akad'){
                if(isset($this->post['alamat'.$key]) &&  $this->post['alamat'.$key] != '' && mb_strlen($this->post['alamat'.$key] , "UTF-8") <= 150 ){
                    $set_data['alamat'.$key] = $this->post['alamat'.$key];
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'Alamat '.$value.' tidak sesuai ketentuan<br>';
                $this->invalid_info['alamat'.$key] = 'Alamat '.$value.' tidak sesuai ketentuan';
                }

                
                if(isset($this->post['rt'.$key]) &&  $this->post['rt'.$key] != '' && mb_strlen($this->post['rt'.$key] , "UTF-8") <= 3 ){
                    $set_data['rt'.$key] = intval($this->post['rt'.$key]);
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'RT '.$value.' tidak sesuai ketentuan<br>';
                $this->invalid_info['rt'.$key] = 'RT '.$value.' tidak sesuai ketentuan';
                }
                
                if(isset($this->post['rw'.$key]) &&  $this->post['rw'.$key] != '' && mb_strlen($this->post['rw'.$key] , "UTF-8") <= 3 ){
                    $set_data['rw'.$key] = intval($this->post['rw'.$key]);
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'RW '.$value.' tidak sesuai ketentuan<br>';
                $this->invalid_info['rw'.$key] = 'RW '.$value.' tidak sesuai ketentuan';
                }
                
                if(isset($this->post['kel_desa'.$key])  &&  $this->post['kel_desa'.$key] != '' && mb_strlen($this->post['kel_desa'.$key] , "UTF-8") == 13 ){
                    $set_data['kel_desa'.$key] = $this->post['kel_desa'.$key];
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'Periksa kembali kolom provinsi, kabupate/kota, kecamatan dan desa/kelurahan '.$value.'<br>';
                $this->invalid_info['kel_desa'.$key] = 'Periksa kembali kolom provinsi, kabupate/kota, kecamatan dan desa/kelurahan '.$value;
                }

                if(isset($this->post['kode_pos'.$key]) &&  $this->post['kode_pos'.$key] != '' &&  mb_strlen($this->post['kode_pos'.$key] , "UTF-8") == 5 ){
                    $set_data['kode_pos'.$key] = intval($this->post['kode_pos'.$key]);
                }
            } else {

                if(isset($this->post['nama'.$key]) && $this->post['nama'.$key] != '' && mb_strlen($this->post['nama'.$key] , "UTF-8") <= 150 ){
                $set_data['nama'.$key] = $this->post['nama'.$key];
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'Nama '.$value.' tidak sesuai ketentuan<br>';
                $this->invalid_info['nama'.$key] = 'Nama '.$value.' tidak sesuai ketentuan';
                }

                if(isset($this->post['nik'.$key]) &&  $this->post['nik'.$key] != '' &&  mb_strlen($this->post['nik'.$key] , "UTF-8") == 16 ){
                    foreach ($arr_postfix as $keys => $values) {
                        if(isset($this->post['nik'.$keys]) &&  $this->post['nik'.$keys] != '' &&  mb_strlen($this->post['nik'.$keys] , "UTF-8") == 16 ){
                            if($key != $keys){
                                if($this->post['nik'.$keys] == $this->post['nik'.$key]){
                                    $valid = false;
                                    $this->message_info['text'] .= 'NIK '.$value.' tidak boleh sama<br>';
                                    $this->invalid_info['nik'.$key] = 'NIK '.$value.' tidak boleh sama';
                                }
                            }
                        }
                    }
                    $set_data['nik'.$key] = $this->post['nik'.$key];
                } else {
                    $valid = false;
                    $this->message_info['text'] .= 'NIK '.$value.' tidak sesuai ketentuan<br>';
                    $this->invalid_info['nik'.$key] = 'NIK '.$value.' tidak sesuai ketentuan';
                } 
        
                if($key == '_pemohon' || $key == '_pasangan'){
                    $key_2 = '_pasangan';
                    $value_2 = 'Pasangan';
                    if($key == '_pasangan'){
                        $key_2 = '_pemohon';
                        $value_2 = 'Pemohon';
                    }
                    if(isset($this->post['jenis_kelamin'.$key]) && $this->post['jenis_kelamin'.$key] != '' ){
                        if(isset($this->post['jenis_kelamin'.$key_2]) && $this->post['jenis_kelamin'.$key_2] == $this->post['jenis_kelamin'.$key]){
                            $this->message_info['text'] .= 'Jenis kelamin '.$value.' dan '.$value_2.' tidak bisa sama<br>';
                            $this->invalid_info['jenis_kelamin'.$key] = 'Jenis kelamin '.$value.' dan '.$value_2.' tidak bisa sama';
                        } else {
                            $set_data['jenis_kelamin'.$key] = $this->post['jenis_kelamin'.$key];
                        }
                    } else {
                        $valid = false;
                    $this->message_info['text'] .= 'Jenis kelamin '.$value.' belum diisi<br>';
                    $this->invalid_info['jenis_kelamin'.$key] = 'Jenis kelamin '.$value.' belum diisi';
                    }
                }

                if($key == '_pemohon'){
                    if(isset($this->post['status_pernikahan'.$key]) && $this->post['status_pernikahan'.$key] != '' ) {

                        if(isset($this->post['jenis_kelamin'.$key]) && $this->post['jenis_kelamin'.$key] != '' ){
                            if($this->post['jenis_kelamin'.$key] == 2 && in_array($this->post['status_pernikahan'.$key], [1,2])){
                                $set_data['status_pernikahan'.$key] = $this->post['status_pernikahan'.$key];
                            } else if($this->post['jenis_kelamin'.$key] == 1 && in_array($this->post['status_pernikahan'.$key], [3,4,5])){

                                $set_data['status_pernikahan'.$key] = $this->post['status_pernikahan'.$key];

                                if(intval($this->post['status_pernikahan'.$key]) == 5){
                                    if(isset($this->post['beristri_ke']) && $this->post['beristri_ke'] != '' ){
                                        $set_data['beristri_ke'] = intval( $this->post['beristri_ke']);
                                    } else {
                                        $valid = false;
                                        $this->message_info['text'] .= 'Jumlah istri '.$value.' belum diisi<br>';
                                        $this->invalid_info['beristri_ke'] = 'Jumlah istri '.$value.' belum diisi';
                                    }
                                }

                            } else {
                                $valid = false;
                                $this->message_info['text'] .= 'Status Pernikahan '.$value.' tidak valid dengan jenis kelamin<br>';
                                $this->invalid_info['status_pernikahan'.$key] = 'Status Pernikahan '.$value.' tidak valid dengan jenis kelamin';
                            }
                        } else {
                            $set_data['status_pernikahan'.$key] = $this->post['status_pernikahan'.$key];
                        }
                    } else {
                        $valid = false;
                        $this->message_info['text'] .= 'Status Pernikahan '.$value.' belum diisi<br>';
                        $this->invalid_info['status_pernikahan'.$key] = 'Status Pernikahan '.$value.' belum diisi';
                    }

                    
                }
                

                if(isset($this->post['tempat_lahir'.$key]) && $this->post['tempat_lahir'.$key] != '' ){
                    $set_data['tempat_lahir'.$key] = $this->post['tempat_lahir'.$key];
                } else {
                    $valid = false;
                    $this->message_info['text'] .= 'Tempat lahir '.$value.' belum diisi<br>';
                    $this->invalid_info['tempat_lahir'.$key] = 'Tempat lahir '.$value.' belum diisi';
                }


                if(isset($this->post['tanggal_lahir'.$key]) && $this->post['tanggal_lahir'.$key] != '' ){
                    $set_data['tanggal_lahir'.$key] = $this->post['tanggal_lahir'.$key];
                } else {
                    $valid = false;
                    $this->message_info['text'] .= 'Tanggal lahir '.$value.' belum diisi<br>';
                    $this->invalid_info['tanggal_lahir'.$key] = 'Tanggal lahir '.$value.' belum diisi';
                }

                if(isset($this->post['agama'.$key]) && $this->post['agama'.$key] != '' ){
                    $set_data['agama'.$key] = $this->post['agama'.$key];
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'Agama '.$value.' belum diisi<br>';
                $this->invalid_info['agama'.$key] = 'Agama '.$value.' belum diisi';
                }

                if(isset($this->post['jenis_pekerjaan'.$key]) && $this->post['jenis_pekerjaan'.$key] != '' ){
                    $set_data['jenis_pekerjaan'.$key] = $this->post['jenis_pekerjaan'.$key];
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'Pekerjaan '.$value.' belum diisi<br>';
                $this->invalid_info['jenis_pekerjaan'.$key] = 'Pekerjaan '.$value.' belum diisi';
                }


                if(isset($this->post['alamat'.$key]) &&  $this->post['alamat'.$key] != '' && mb_strlen($this->post['alamat'.$key] , "UTF-8") <= 150 ){
                    $set_data['alamat'.$key] = $this->post['alamat'.$key];
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'Alamat '.$value.' tidak sesuai ketentuan<br>';
                $this->invalid_info['alamat'.$key] = 'Alamat '.$value.' tidak sesuai ketentuan';
                }

                
                if(isset($this->post['rt'.$key]) &&  $this->post['rt'.$key] != '' && mb_strlen($this->post['rt'.$key] , "UTF-8") <= 3 ){
                    $set_data['rt'.$key] = intval($this->post['rt'.$key]);
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'RT '.$value.' tidak sesuai ketentuan<br>';
                $this->invalid_info['rt'.$key] = 'RT '.$value.' tidak sesuai ketentuan';
                }
                
                if(isset($this->post['rw'.$key]) &&  $this->post['rw'.$key] != '' && mb_strlen($this->post['rw'.$key] , "UTF-8") <= 3 ){
                    $set_data['rw'.$key] = intval($this->post['rw'.$key]);
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'RW '.$value.' tidak sesuai ketentuan<br>';
                $this->invalid_info['rw'.$key] = 'RW '.$value.' tidak sesuai ketentuan';
                }
                
                if(isset($this->post['kel_desa'.$key])  &&  $this->post['kel_desa'.$key] != '' && mb_strlen($this->post['kel_desa'.$key] , "UTF-8") == 13 ){
                    $set_data['kel_desa'.$key] = $this->post['kel_desa'.$key];
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'Periksa kembali kolom provinsi, kabupate/kota, kecamatan dan desa/kelurahan '.$value.'<br>';
                $this->invalid_info['kel_desa'.$key] = 'Periksa kembali kolom provinsi, kabupate/kota, kecamatan dan desa/kelurahan '.$value;
                }

                if(isset($this->post['kode_pos'.$key]) &&  $this->post['kode_pos'.$key] != '' &&  mb_strlen($this->post['kode_pos'.$key] , "UTF-8") == 5 ){
                    $set_data['kode_pos'.$key] = intval($this->post['kode_pos'.$key]);
                }

                if(isset($this->post['kewarganegaraan'.$key]) && $this->post['kewarganegaraan'.$key] != '' ){
                    $set_data['kewarganegaraan'.$key] = $this->post['kewarganegaraan'.$key];
                } else {
                    $valid = false;
                $this->message_info['text'] .= 'Kewarganegaraan '.$value.' belum diisi<br>';
                $this->invalid_info['kewarganegaraan'.$key] = 'Kewarganegaraan '.$value.' belum diisi<br>';
                }
            }
        }

        if(isset($this->post['kantor_pengadilan_agama']) && $this->post['kantor_pengadilan_agama'] != '' && mb_strlen($this->post['kantor_pengadilan_agama'] , "UTF-8") <= 150 ){
            $set_data['kantor_pengadilan_agama'] = $this->post['kantor_pengadilan_agama'];
            } else {
                $valid = false;
            $this->message_info['text'] .= 'Nama kantor pengadilan agama tidak sesuai ketentuan<br>';
            $this->invalid_info['kantor_pengadilan_agama'] = 'Nama kantor pengadilan agama tidak sesuai ketentuan';
        }

        if(isset($this->post['nama_ayah_pasangan']) && $this->post['nama_ayah_pasangan'] != '' && mb_strlen($this->post['nama_ayah_pasangan'] , "UTF-8") <= 150 ){
            $set_data['nama_ayah_pasangan'] = $this->post['nama_ayah_pasangan'];
            } else {
                $valid = false;
            $this->message_info['text'] .= 'Nama ayah pasangan tidak sesuai ketentuan<br>';
            $this->invalid_info['nama_ayah_pasangan'] = 'Nama ayah pasangan tidak sesuai ketentuan';
        }
     

      
/*
foto_ktp_ayah
foto_ktp_ibu
foto_kartu_keluarga
foto_buku_nikah
foto_akta_perkawinan
*/
$arr_post_photo = [ 'foto_ktp_ayah', 'foto_ktp_ibu', 'foto_kartu_keluarga', 'foto_kartu_keluarga_pasangan', 'foto_ktp_pemohon', 'foto_ktp_pasangan' ];
$cek_upload_files = false;
if($new_data){
    foreach ($arr_post_photo as $key => $value) {
        if(empty($_FILES[$value]['tmp_name'])){
            $cek_upload_files = true;
        }
    }
    if($cek_upload_files){
        foreach ($arr_post_photo as $key => $value) {
            $valid = false;
            $this->message_info['text'] .= 'Bidang lampiran '.str_replace('_', ' ', $value ).', belum diisi<br>';
            $this->invalid_info[$value] = 'Lengkapi bidang '.str_replace('_', ' ', $value );
        }
    }
} else {
    if(isset($data_perubahan_kk) && count($data_perubahan_kk)){
        foreach ($arr_post_photo as $key => $value) {
            if(isset($data_perubahan_kk['link_'.$value]) && $data_perubahan_kk['link_'.$value] == ''){
                if(empty($_FILES[$value]['tmp_name'])){
                   $valid = false;
                    $this->message_info['text'] .= 'Bidang lampiran '.str_replace('_', ' ', $value ).', belum diisi<br>';
                    $this->invalid_info[$value] = 'Lengkapi bidang '.str_replace('_', ' ', $value ); 
                }
            }
        }
    }
}
                // simpan ke basis data
                if($valid){
                    if($new_data){
                            if($this->tbl_surat_pengantar_nikah->insert($set_data)){
                                $id_surat_pengantar_nikah = $this->tbl_surat_pengantar_nikah->db->insertID();
                               $this->message_info['status'] = 1;
                               $this->message_info['text'] .= 'Data surat pengantar nikah berhasil simpan<br>';
                            } else {
                               $this->message_info['text'] .= 'Data surat pengantar nikah gagal simpan<br>';
                                $insert_user_id = 0;
                            }
                    } else {
                        
                        if($this->tbl_surat_pengantar_nikah->set($set_data)->where('id_surat_pengantar_nikah', $id_surat_pengantar_nikah)->update()){
                           $this->message_info['status'] = 1;
                           $this->message_info['text'] .= 'Data surat pengantar nikah berhasil diubah<br>';
                        } else {
                           $this->message_info['text'] .= 'Data surat pengantar nikah gagal diubah<br>';
                            $insert_user_id = 0;
                        }
                    }
                }

        if($id_surat_pengantar_nikah && $insert_user_id && $valid){
            foreach ($arr_post_photo as $key => $value) {
                if(!empty($_FILES[$value]['tmp_name'])){
                   $this->upload_lampiran_picture($value, $id_surat_pengantar_nikah, $insert_user_id);
                }
            }
        }

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info',$this->message_info);
        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        if($id_surat_pengantar_nikah != '' && $id_surat_pengantar_nikah > 0){
            return redirect()->to( base_url().'/penduduk/surat-pengantar-nikah-edit/'.$id_surat_pengantar_nikah);
        } else {
            return redirect()->to( base_url().'/penduduk/surat-pengantar-nikah-edit');
        }
        
        exit;
    }

    protected function upload_lampiran_picture($attr_name, $id_surat_pengantar_nikah, $insert_user_id){
        if(!empty($_FILES[$attr_name]['tmp_name'])){

            $arr_title_info = explode("_",$attr_name);
            $title_info = '';
            foreach ($arr_title_info as $key => $value) {
               $title_info .= ucwords($value).' ';
            }

            $foto = $this->request->getFile($attr_name);

            if ($foto->isValid() && ! $foto->hasMoved()){
                $new_name_foto_kk = $foto->getRandomName();
                $foto->move(WRITEPATH ."user_upload/".$insert_user_id.'/lampiran_surat_pengantar_nikah',$attr_name.'_'.$new_name_foto_kk);
                try {
                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH ."user_upload/".$insert_user_id.'/lampiran_surat_pengantar_nikah/'.$attr_name.'_'.$new_name_foto_kk)
                        ->resize(1040, 1040, true, 'width')
                        ->save(WRITEPATH ."user_upload/".$insert_user_id.'/lampiran_surat_pengantar_nikah/'.$attr_name.'_'.$new_name_foto_kk);
                } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
                   $this->message_info['text'] .= $title_info.' failed resize. :'.$e->getMessage().'<br>';
                   $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
                }
                
                $file_foto_kk =  'user_upload/'.$insert_user_id.'/lampiran_surat_pengantar_nikah/'.$attr_name.'_'.$new_name_foto_kk;
                $link_foto_kk = urlencode(base64_encode($file_foto_kk));
                $foto_insert = array( 'link_'.$attr_name => $link_foto_kk, 'file_'.$attr_name => $file_foto_kk);
                if($this->tbl_surat_pengantar_nikah->set($foto_insert)->where(['id_user' => $insert_user_id, 'id_surat_pengantar_nikah' => $id_surat_pengantar_nikah])->update()){
                   $this->message_info['text'] .= $title_info.'berhasil di tambahkan.<br>';
                } else {
                   $this->message_info['text'] .= 'Gagal membuat link '.$title_info.'.<br>';
                   $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
                }
            } else {
               $this->message_info['text'] .= $title_info.' gagal diunggah.<br>';
               $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
            }
        }
    }
}
