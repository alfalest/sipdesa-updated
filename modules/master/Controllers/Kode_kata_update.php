<?php

namespace Master\Controllers;
use App\Controllers\BaseController;
use App\models\Tbl_kode_kata;

class Kode_kata_update extends BaseController
{
    public $tbl_kode_kata;
    public function __construct()
    {
        $this->cek_login(['tipe_user' => 1, 'status_user' => 2, 'email_verified' => 2]);
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_kode_kata = $this->tbl_kode_kata->konek();
    }
    public function index()
    {
        $url_id_kode_kata = '';
        $valid = true;
        $new_kode_kata = true;
        $can_delete = false;
        $set_data = [
            'id_kode_kata' => '',
            'nomor_kode' => '',
            'grup_kata' => '',
            'tampilan_kata' => ''
        ];

        $message_info = ['status' => 0,  'text' => ''];

        if(isset($this->post['id_kode_kata']) && $this->post['id_kode_kata'] != ''){
            $db_kode_kata = $this->tbl_kode_kata->ambil_satu(['id_kode_kata' =>$this->post['id_kode_kata']]);
            if($db_kode_kata){
                if(isset($this->post['delete']) && $this->post['delete'] = 'delete'){
                    $can_delete = true;
                }
                $new_kode_kata = false;
                $url_id_kode_kata = '/'.$db_kode_kata['id_kode_kata'];
            }
        }

        if(isset($this->post['nomor_kode']) && $this->post['nomor_kode'] != ''){
            $set_data['nomor_kode'] = intval($this->post['nomor_kode']);
        }  else {
            $valid = false;
            $message_info['text'] .= 'Kode kata tidak boleh kosong';
        }
        
        if(isset($this->post['grup_kata']) && $this->post['grup_kata'] != ''){
            if(mb_strlen($this->post['grup_kata'] , "UTF-8") <= 50 ){
                $set_data['grup_kata'] = $this->post['grup_kata'];
            } else {
                $valid = false;
                $message_info['text'] .= 'Grup Kata tidak boleh lebih dari 50 karakter';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Grup Kata tidak boleh kosong';
        }

        if(isset($this->post['tampilan_kata']) && $this->post['tampilan_kata'] != ''){
            if(mb_strlen($this->post['tampilan_kata'] , "UTF-8") <= 100 ){
                $set_data['tampilan_kata'] = $this->post['tampilan_kata'];
            } else {
                $valid = false;
                $message_info['text'] .= 'Tampilan Kata tidak boleh lebih dari 100 karakter';
            }
        } else {
            $valid = false;
            $message_info['text'] .= 'Tampilan Kata tidak boleh kosong';
        }

        if($new_kode_kata){
            $db_grup_kata = $this->tbl_kode_kata->ambil_satu(['nomor_kode' => $set_data['nomor_kode'], 'grup_kata' => $set_data['grup_kata']]);
            if($db_grup_kata){
                $valid = false;
                $message_info['text'] .= 'Grup kata dengan nomor kode yang sama sudah ada';
            }
        }

        if($valid){
            if(isset($this->post['delete']) && $this->post['delete'] = 'delete' && $can_delete){
                if($this->tbl_kode_kata->menghapus($db_kode_kata['id_kode_kata'])){
                    $this->session->setFlashdata('message_info', $message_info);
                    return redirect()->to( base_url().'/master/kode-kata');
                    exit;
                } else {
                    $message_info['text'] .= 'Gagal menghapus kode kata';
                }
            } else if (isset($this->post['simpan']) && $this->post['simpan'] = 'simpan'){
                if($new_kode_kata){
                    $set_data['create_time'] = get_now();
                    $set_data['update_time'] = get_now();
                    $insert_id = $this->tbl_kode_kata->membuat($set_data); 

                    if($insert_id){
                        $message_info['status'] = 1;
                        $message_info['text'] .= 'Kode kata baru berhasil disimpan';
                        $url_id_kode_kata = '/'.$insert_id;
                    } else {
                        $message_info['text'] .= 'Gagal menyimpan kode kata';
                    }   
                } else {
                    $set_data['update_time'] = get_now();
                    unset($set_data['id_kode_kata']);
                    if($this->tbl_kode_kata->mengubah($set_data , $db_kode_kata['id_kode_kata'])){
                        $message_info['status'] = 1;
                        $message_info['text'] .= 'Kode kata berhasil ubah';
                    } else {
                        $message_info['text'] .= 'Gagal mengubah kode kata';
                    }
                }
            }
        }
        $message_info['text'] .= 'Kode Kata Adalah : '.$url_id_kode_kata;
        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $message_info);
        return redirect()->to( base_url().'/master/kode-kata-edit'.$url_id_kode_kata);
        exit;
    }
}
