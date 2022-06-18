<?php

namespace Operator\Controllers;

use App\Controllers\BaseController;
use Operator\Models\Tbl_data_diri;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_surat_kematian;
use Operator\Models\Tbl_tiket;
use Operator\Models\Tbl_data_surat;
use Config\Paths;

class Surat_kematian_editor_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_kematian;
    public $tbl_tiket;
    public $tbl_data_surat;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kematian = new Tbl_surat_kematian();
        $this->tbl_tiket = new Tbl_tiket();
        $this->tbl_data_surat = new Tbl_data_surat();
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
        $id_surat_kematian = 0;

        //evaluasi data untuk insert atau update
        if (isset($this->session->get('login_session')['id_user'])) {
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        //setup array key data insert
        $set_data = [
            'id_operator' => $insert_user_id,
            'id_surat' => '',
            'filename_surat' => 'surat-kematian-lihat',
            'jenis_surat' => 'surat_keterangan_kematian',
            'teks_isi_surat' => '',
            'nomor_surat' => '',
            'nama_penanda_tangan' => '',
            'jabatan_penanda_tangan' => '',
            'keterangan_pembuatan_surat' => ''
        ];

        if (isset($this->post['id_surat']) && $this->post['id_surat'] != '') {
            $data_surat_kematian = $this->tbl_surat_kematian->where(['id_surat_kematian' => $this->post['id_surat'], 'status_surat_kematian' => 2])->first();
            if ($data_surat_kematian) {
                $id_surat_kematian =  $data_surat_kematian['id_surat_kematian'];
                $set_data['id_surat'] = $data_surat_kematian['id_surat_kematian'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Surat kematian tidak ditemukan<br>';
            }
        }


        if (isset($this->post['teks_isi_surat']) &&  $this->post['teks_isi_surat'] != '') {
            $set_data['teks_isi_surat'] = $this->post['teks_isi_surat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Isi surat tidak boleh kosong<br>';
            $this->invalid_info['teks_isi_surat'] = 'Isi surat tidak boleh kosong';
        }


        if (isset($this->post['nomor_surat']) &&  $this->post['nomor_surat'] != '' && str_replace(" ", "", $this->post['nomor_surat']) != '') {
            if (mb_strlen($this->post['nomor_surat'], "UTF-8") <= 100) {
                $db_data_surat = $this->tbl_data_surat->where(['nomor_surat' => $this->post['nomor_surat']])->first();
                if ($db_data_surat) {
                    $valid = false;
                    $this->message_info['text'] .= 'Nomor surat tidak bisa digunakan karena sudah terdaftar<br>';
                    $this->invalid_info['nomor_surat'] = 'Nomor surat tidak bisa digunakan karena sudah terdaftar';
                } else {
                    $set_data['nomor_surat'] = str_replace(" ", "", $this->post['nomor_surat']);
                }
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Nomor surat melebihi 100 karakter<br>';
                $this->invalid_info['nomor_surat'] = 'Nomor surat melebihi 100 karakter';
            }
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Nomor Surat harus di isi<br>';
            $this->invalid_info['nomor_surat'] = 'Nomor Surat harus di isi';
        }

        if (isset($this->post['nama_penanda_tangan']) &&  $this->post['nama_penanda_tangan'] != '') {
            if (mb_strlen($this->post['nama_penanda_tangan'], "UTF-8") <= 100) {
                $set_data['nama_penanda_tangan'] = $this->post['nama_penanda_tangan'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Nama penanda tangan melebihi 100 karakter<br>';
                $this->invalid_info['nama_penanda_tangan'] = 'Nama penanda tangan melebihi 100 karakter';
            }
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Nama penanda tangan harus di isi<br>';
            $this->invalid_info['nama_penanda_tangan'] = 'Nama penanda tangan harus di isi';
        }

        if (isset($this->post['jabatan_penanda_tangan']) &&  $this->post['jabatan_penanda_tangan'] != '') {
            if (mb_strlen($this->post['jabatan_penanda_tangan'], "UTF-8") <= 100) {
                $set_data['jabatan_penanda_tangan'] = $this->post['jabatan_penanda_tangan'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Jabatan penanda tangan melebihi 100 karakter<br>';
                $this->invalid_info['jabatan_penanda_tangan'] = 'Jabatan penanda tangan melebihi 100 karakter';
            }
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Jabatan penanda tangan harus di isi<br>';
            $this->invalid_info['jabatan_penanda_tangan'] = 'Jabatan penanda tangan harus di isi';
        }


        if (isset($this->post['keterangan_pembuatan_surat']) &&  $this->post['keterangan_pembuatan_surat'] != '') {
            if (mb_strlen($this->post['keterangan_pembuatan_surat'], "UTF-8") <= 100) {
                $set_data['keterangan_pembuatan_surat'] = $this->post['keterangan_pembuatan_surat'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Keterangan melebihi 100 karakter<br>';
                $this->invalid_info['keterangan_pembuatan_surat'] = 'Keterangan melebihi 100 karakter';
            }
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Keterangan harus diisi<br>';
            $this->invalid_info['keterangan_pembuatan_surat'] = 'Keterangan harus diisi';
        }
        // simpan ke basis data
        if ($valid) {

            $key_replacer = ['nomor_surat', 'nama_penanda_tangan', 'jabatan_penanda_tangan', 'keterangan_pembuatan_surat'];

            foreach ($key_replacer as $key => $value) {
                if (isset($set_data[$value])) {
                    $set_data['teks_isi_surat'] = str_replace('[#' . $value . '#]', $set_data[$value],  $set_data['teks_isi_surat']);
                }
            }

            if ($this->tbl_data_surat->insert($set_data)) {
                $id_data_surat = $this->tbl_data_surat->db->insertID();
                $this->message_info['status'] = 1;
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Gagal Membuat tiket undangan<br>';
            }
        }


        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        if ($id_surat_kematian != '' && $id_surat_kematian > 0) {
            if (isset($id_data_surat) && $id_data_surat != '' && $this->message_info['status']) {
                return redirect()->to(base_url() . '/operator/data-surat-lihat/' . $id_data_surat);
                // return redirect()->to( base_url().'/operator/data-surat-lihat/'.$id_data_surat);
            } else {
                return redirect()->to(base_url() . '/operator/surat-kematian-editor/' . $id_surat_kematian);
            }
        } else {
            //return redirect()->to( base_url().'/operator/surat-kematian/diterima');
            return redirect()->to(base_url() . '/operator/surat-kematian/diterima');
        }
        exit;
    }

    protected function upload_lampiran_picture($attr_name, $id_surat_kematian, $insert_user_id)
    {
        if (!empty($_FILES[$attr_name]['tmp_name'])) {

            $arr_title_info = explode("_", $attr_name);
            $title_info = '';
            foreach ($arr_title_info as $key => $value) {
                $title_info .= ucwords($value) . ' ';
            }

            $foto = $this->request->getFile($attr_name);

            if ($foto->isValid() && !$foto->hasMoved()) {
                $new_name_foto_kk = $foto->getRandomName();
                $foto->move(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_kematian', $attr_name . '_' . $new_name_foto_kk);
                try {
                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_kematian/' . $attr_name . '_' . $new_name_foto_kk)
                        ->resize(1040, 1040, true, 'width')
                        ->save(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_kematian/' . $attr_name . '_' . $new_name_foto_kk);
                } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
                    $this->message_info['text'] .= $title_info . ' failed resize. :' . $e->getMessage() . '<br>';
                    $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
                }

                $file_foto_kk =  'user_upload/' . $insert_user_id . '/lampiran_surat_kematian/' . $attr_name . '_' . $new_name_foto_kk;
                $link_foto_kk = urlencode(base64_encode($file_foto_kk));
                $foto_insert = array('link_' . $attr_name => $link_foto_kk, 'file_' . $attr_name => $file_foto_kk);
                if ($this->tbl_surat_kematian->set($foto_insert)->where(['id_user' => $insert_user_id, 'id_surat_kematian' => $id_surat_kematian])->update()) {
                    $this->message_info['text'] .= $title_info . 'berhasil di tambahkan.<br>';
                } else {
                    $this->message_info['text'] .= 'Gagal membuat link ' . $title_info . '.<br>';
                    $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
                }
            } else {
                $this->message_info['text'] .= $title_info . ' gagal diunggah.<br>';
                $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
            }
        }
    }
}
