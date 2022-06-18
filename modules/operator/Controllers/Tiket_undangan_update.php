<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_data_diri;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_surat_kelahiran;
use Operator\Models\Tbl_tiket;
use Config\Paths;
class Tiket_undangan_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_kelahiran;
    public $tbl_tiket;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_tiket = new Tbl_tiket();
        $this->message_info = ['status' => 0,  'text' => ''];
        $this->invalid_info = [];
        $this->cek_login([
            'tipe_user' => 2, 
            'status_user' => 2, 
            'email_verified' => 2
            ]);
        helper('Date_helper');
        helper('text');
    }

    public function index()
    {
        $this->post = $this->request->getPost();
        //init
        $valid = true;
        $insert_user_id = 0;
        $id_tiket = 0;

        //evaluasi data untuk insert atau update
        if(isset($this->session->get('login_session')['id_user'])){
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        $set_data = [
            'status_tiket' => 1,
            'id_operator_confirm' => $insert_user_id,
            'waktu_kehadiran' => get_now()
        ];
        
        if(isset($this->post['id_tiket']) && $this->post['id_tiket'] != '' ){
            $data_tiket = $this->tbl_tiket->where(['id_tiket' => $this->post['id_tiket'] , 'status_tiket' => 1])->first();
            if($data_tiket){
                $id_tiket = $this->post['id_tiket'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Tiket tidak ditemukan<br>';
            }
        }
 
        //validation
        if(isset($this->post['status_tiket']) && in_array($this->post['status_tiket'], [2,3]) ){
            $set_data['status_tiket'] = $this->post['status_tiket'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Pilih salah satu jenis kehadiran : Hadir atau Tidak Hadir<br>';
            $this->invalid_info['status_tiket'] = 'Pilih salah satu jenis kehadiran : Hadir atau Tidak Hadir';
        }

        if($valid){
            if($this->tbl_tiket->set($set_data)->where('id_tiket', $id_tiket)->update()){
                $this->message_info['status'] = 1;
                $this->message_info['text'] .= 'Tiket berhasil di update<br>';
            } else {
                $this->message_info['text'] .= 'Gagal update tiket<br>';
            }
        }
                
        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        if($id_tiket != '' && $id_tiket > 0){
            return redirect()->to( base_url().'/operator/tiket-undangan-edit/'.$id_tiket);
        } else {
            return redirect()->to( base_url().'/operator/tiket-undangan');
        }
        exit;
    }

    protected function upload_lampiran_picture($attr_name, $id_surat_kelahiran, $insert_user_id){
        if(!empty($_FILES[$attr_name]['tmp_name'])){

            $arr_title_info = explode("_",$attr_name);
            $title_info = '';
            foreach ($arr_title_info as $key => $value) {
               $title_info .= ucwords($value).' ';
            }

            $foto = $this->request->getFile($attr_name);

            if ($foto->isValid() && ! $foto->hasMoved()){
                $new_name_foto_kk = $foto->getRandomName();
                $foto->move(WRITEPATH ."user_upload/".$insert_user_id.'/lampiran_surat_kelahiran',$attr_name.'_'.$new_name_foto_kk);
                try {
                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH ."user_upload/".$insert_user_id.'/lampiran_surat_kelahiran/'.$attr_name.'_'.$new_name_foto_kk)
                        ->resize(1040, 1040, true, 'width')
                        ->save(WRITEPATH ."user_upload/".$insert_user_id.'/lampiran_surat_kelahiran/'.$attr_name.'_'.$new_name_foto_kk);
                } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
                   $this->message_info['text'] .= $title_info.' failed resize. :'.$e->getMessage().'<br>';
                   $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
                }
                
                $file_foto_kk =  'user_upload/'.$insert_user_id.'/lampiran_surat_kelahiran/'.$attr_name.'_'.$new_name_foto_kk;
                $link_foto_kk = urlencode(base64_encode($file_foto_kk));
                $foto_insert = array( 'link_'.$attr_name => $link_foto_kk, 'file_'.$attr_name => $file_foto_kk);
                if($this->tbl_surat_kelahiran->set($foto_insert)->where(['id_user' => $insert_user_id, 'id_surat_kelahiran' => $id_surat_kelahiran])->update()){
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
