<?php

namespace Penduduk\Controllers;

use App\Controllers\BaseController;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_surat_catatan_kepolisian;
use Config\Paths;

class Surat_catatan_kepolisian_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_catatan_kepolisian;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_catatan_kepolisian = new Tbl_surat_catatan_kepolisian();
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
        $id_surat_catatan_kepolisian = 0;

        //evaluasi data untuk insert atau update
        if (isset($this->session->get('login_session')['id_user'])) {
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        if (isset($this->post['id_surat_catatan_kepolisian']) && $this->post['id_surat_catatan_kepolisian'] != '') {
            $data_perubahan_kk = $this->tbl_surat_catatan_kepolisian->where(['id_surat_catatan_kepolisian' => $this->post['id_surat_catatan_kepolisian'], 'status_surat_catatan_kepolisian' => 1, 'id_user' => $insert_user_id])->first();
            if ($data_perubahan_kk) {
                $id_surat_catatan_kepolisian = $this->post['id_surat_catatan_kepolisian'];
                $new_data = false;
            }
        }

        //setup array key data insert
        $set_data = [
            'id_user' => $insert_user_id,
            'status_surat_catatan_kepolisian' => 1,
            'nama_catatan_kepolisian' => '',
            'jenis_kelamin_catatan_kepolisian' => '',
            'tempat_lahir_catatan_kepolisian' => '',
            'tanggal_lahir_catatan_kepolisian' => '',
            'kewarganegaraan_catatan_kepolisian' => '',
            'agama_catatan_kepolisian' => '',
            'pekerjaan_catatan_kepolisian' => '',
            'alamat_catatan_kepolisian' => '',
            'tujuan_membuat_surat_catatan_kepolisian' => ''
        ];

        $arr_postfix = ['_catatan_kepolisian' => 'catatan_kepolisian'];

        //validation
        foreach ($arr_postfix as $key => $value) {
            if (isset($this->post['nama_catatan_kepolisian']) && $this->post['nama_catatan_kepolisian'] != '' && mb_strlen($this->post['nama_catatan_kepolisian'], "UTF-8") <= 150) {
                $set_data['nama_catatan_kepolisian'] = $this->post['nama_catatan_kepolisian'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Nama tidak sesuai ketentuan<br>';
                $this->invalid_info['nama_catatan_kepolisian'] = 'Nama tidak sesuai ketentuan';
            }

            if (isset($this->post['jenis_kelamin_catatan_kepolisian']) && $this->post['jenis_kelamin_catatan_kepolisian'] != '') {
                $set_data['jenis_kelamin_catatan_kepolisian'] = $this->post['jenis_kelamin_catatan_kepolisian'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Jenis kelamin belum diisi<br>';
                $this->invalid_info['jenis_kelamin_catatan_kepolisian'] = 'Jenis kelamin belum diisi';
            }

            if (isset($this->post['tempat_lahir_catatan_kepolisian']) && $this->post['tempat_lahir_catatan_kepolisian'] != '') {
                $set_data['tempat_lahir_catatan_kepolisian'] = $this->post['tempat_lahir_catatan_kepolisian'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Bidang tempat lahir belum diisi<br>';
                $this->invalid_info['tempat_lahir_catatan_kepolisian'] = 'Bidang tempat lahir belum diisi';
            }

            if (isset($this->post['tanggal_lahir_catatan_kepolisian']) && $this->post['tanggal_lahir_catatan_kepolisian'] != '') {
                $set_data['tanggal_lahir_catatan_kepolisian'] = $this->post['tanggal_lahir_catatan_kepolisian'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Tanggal lahir belum diisi<br>';
                $this->invalid_info['tanggal_lahir_catatan_kepolisian'] = 'Tanggal lahir belum diisi';
            }

            if (isset($this->post['agama']) && $this->post['agama'] != '') {
                $set_data['agama_catatan_kepolisian'] = $this->post['agama'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Agama belum diisi<br>';
                $this->invalid_info['agama'] = 'Agama belum diisi';
            }

            if (isset($this->post['pekerjaan_catatan_kepolisian']) && $this->post['pekerjaan_catatan_kepolisian'] != '') {
                $set_data['pekerjaan_catatan_kepolisian'] = $this->post['pekerjaan_catatan_kepolisian'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Pekerjaan belum diisi<br>';
                $this->invalid_info['pekerjaan_catatan_kepolisian'] = 'Pekerjaan belum diisi';
            }

            if (isset($this->post['alamat_catatan_kepolisian']) && $this->post['alamat_catatan_kepolisian'] != '') {
                $set_data['alamat_catatan_kepolisian'] = $this->post['alamat_catatan_kepolisian'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Alamat TPU belum diisi<br>';
                $this->invalid_info['alamat_catatan_kepolisian'] = 'Alamat TPU belum diisi';
            }

            if (isset($this->post['kewarganegaraan']) && $this->post['kewarganegaraan'] != '') {
                $set_data['kewarganegaraan_catatan_kepolisian'] = $this->post['kewarganegaraan'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Kewarganegaraan belum diisi<br>';
                $this->invalid_info['kewarganegaraan_catatan_kepolisian'] = 'Kewarganegaraan belum diisi<br>';
            }
            if (isset($this->post['tujuan_membuat_surat_catatan_kepolisian']) && $this->post['tujuan_membuat_surat_catatan_kepolisian'] != '') {
                $set_data['tujuan_membuat_surat_catatan_kepolisian'] = $this->post['tujuan_membuat_surat_catatan_kepolisian'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Tujuan membuat surat belum diisi<br>';
                $this->invalid_info['tujuan_membuat_surat_catatan_kepolisian'] = 'Tujuan membuat surat belum diisi';
            }
        }

        // simpan ke basis data
        if ($valid) {
            if ($new_data) {
                if ($this->tbl_surat_catatan_kepolisian->insert($set_data)) {
                    $id_surat_catatan_kepolisian = $this->tbl_surat_catatan_kepolisian->db->insertID();
                    $this->message_info['status'] = 1;
                    $this->message_info['text'] .= 'Data surat catatan kepolisian berhasil simpan<br>';
                } else {
                    $this->message_info['text'] .= 'Data surat catatan kepolisian gagal simpan<br>';
                    $insert_user_id = 0;
                }
            } else {

                if ($this->tbl_surat_catatan_kepolisian->set($set_data)->where('id_surat_catatan_kepolisian', $id_surat_catatan_kepolisian)->update()) {
                    $this->message_info['status'] = 1;
                    $this->message_info['text'] .= 'Data surat catatan kepolisian berhasil diubah<br>';
                } else {
                    $this->message_info['text'] .= 'Data surat catatan kepolisian gagal diubah<br>';
                    $insert_user_id = 0;
                }
            }
        }

        // if ($valid) {
        //     if ($new_data) {
        //         if ($this->tbl_surat_kelahiran->insert($set_data)) {
        //             $id_surat_kelahiran = $this->tbl_surat_kelahiran->db->insertID();
        //             $this->message_info['status'] = 1;
        //             $this->message_info['text'] .= 'Data surat kelahiran berhasil simpan<br>';
        //         } else {
        //             $this->message_info['text'] .= 'Data surat kelahiran gagal simpan<br>';
        //             $insert_user_id = 0;
        //         }
        //     } else {

        //         if ($this->tbl_surat_kelahiran->set($set_data)->where('id_surat_kelahiran', $id_surat_kelahiran)->update()) {
        //             $this->message_info['status'] = 1;
        //             $this->message_info['text'] .= 'Data surat kelahiran berhasil diubah<br>';
        //         } else {
        //             $this->message_info['text'] .= 'Data surat kelahiran gagal diubah<br>';
        //             $insert_user_id = 0;
        //         }
        //     }
        // }

        // if ($id_surat_catatan_kepolisian && $insert_user_id && $valid) {
        //     foreach ($arr_post_photo as $key => $value) {
        //         if (!empty($_FILES[$value]['tmp_name'])) {
        //             $this->upload_lampiran_picture($value, $id_surat_catatan_kepolisian, $insert_user_id);
        //         }
        //     }
        // }

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        if ($id_surat_catatan_kepolisian != '' && $id_surat_catatan_kepolisian > 0) {
            return redirect()->to(base_url() . '/penduduk/surat-catatan-kepolisian-edit/' . $id_surat_catatan_kepolisian);
        } else {
            return redirect()->to(base_url() . '/penduduk/surat-catatan-kepolisian-edit');
        }

        exit;
    }

    // protected function upload_lampiran_picture($attr_name, $id_surat_catatan_kepolisian, $insert_user_id)
    // {
    //     if (!empty($_FILES[$attr_name]['tmp_name'])) {

    //         $arr_title_info = explode("_", $attr_name);
    //         $title_info = '';
    //         foreach ($arr_title_info as $key => $value) {
    //             $title_info .= ucwords($value) . ' ';
    //         }

    //         $foto = $this->request->getFile($attr_name);

    //         if ($foto->isValid() && !$foto->hasMoved()) {
    //             $new_name_foto_kk = $foto->getRandomName();
    //             $foto->move(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_catatan_kepolisian', $attr_name . '_' . $new_name_foto_kk);
    //             try {
    //                 $image = \Config\Services::image()
    //                     ->withFile(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_catatan_kepolisian/' . $attr_name . '_' . $new_name_foto_kk)
    //                     ->resize(1040, 1040, true, 'width')
    //                     ->save(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_catatan_kepolisian/' . $attr_name . '_' . $new_name_foto_kk);
    //             } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
    //                 $this->message_info['text'] .= $title_info . ' failed resize. :' . $e->getMessage() . '<br>';
    //                 $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
    //             }

    //             $file_foto_kk =  'user_upload/' . $insert_user_id . '/lampiran_surat_catatan_kepolisian/' . $attr_name . '_' . $new_name_foto_kk;
    //             $link_foto_kk = urlencode(base64_encode($file_foto_kk));
    //             $foto_insert = array('link_' . $attr_name => $link_foto_kk, 'file_' . $attr_name => $file_foto_kk);
    //             if ($this->tbl_surat_catatan_kepolisian->set($foto_insert)->where(['id_user' => $insert_user_id, 'id_surat_catatan_kepolisian' => $id_surat_catatan_kepolisian])->update()) {
    //                 $this->message_info['text'] .= $title_info . 'berhasil di tambahkan.<br>';
    //             } else {
    //                 $this->message_info['text'] .= 'Gagal membuat link ' . $title_info . '.<br>';
    //                 $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
    //             }
    //         } else {
    //             $this->message_info['text'] .= $title_info . ' gagal diunggah.<br>';
    //             $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
    //         }
    //     }
    // }
}
