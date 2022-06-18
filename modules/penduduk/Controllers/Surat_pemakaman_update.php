<?php

namespace Penduduk\Controllers;

use App\Controllers\BaseController;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_surat_pemakaman;
use Config\Paths;

class Surat_pemakaman_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_pemakaman;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_pemakaman = new Tbl_surat_pemakaman();
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
        $id_surat_pemakaman = 0;

        //evaluasi data untuk insert atau update
        if (isset($this->session->get('login_session')['id_user'])) {
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        if (isset($this->post['id_surat_pemakaman']) && $this->post['id_surat_pemakaman'] != '') {
            $data_perubahan_kk = $this->tbl_surat_pemakaman->where(['id_surat_pemakaman' => $this->post['id_surat_pemakaman'], 'status_surat_pemakaman' => 1, 'id_user' => $insert_user_id])->first();
            if ($data_perubahan_kk) {
                $id_surat_pemakaman = $this->post['id_surat_pemakaman'];
                $new_data = false;
            }
        }

        //setup array key data insert
        $set_data = [
            'id_user' => $insert_user_id,
            'status_surat_pemakaman' => 1,
            'nama_pemakaman' => '',
            'jenis_kelamin_pemakaman' => '',
            'umur_pemakaman' => '',
            'kewarganegaraan_pemakaman' => '',
            'agama_pemakaman' => '',
            'pekerjaan_pemakaman' => '',
            'tempat_dimakamkan' => '',
            'alamat_pemakaman' => '',
            'hari_wafat' => '',
            'tanggal_wafat_pemakaman' => '',
            'jam_wafat' => '',
            'tempat_wafat' => '',
            'penyebab_wafat' => ''
        ];

        $arr_postfix = ['_pemakaman' => 'Pemakaman'];

        //validation
        foreach ($arr_postfix as $key => $value) {
            // $this->post['nama_pemakaman_wafat]
            if (isset($this->post['nama_pemakaman']) && $this->post['nama_pemakaman'] != '' && mb_strlen($this->post['nama_pemakaman'], "UTF-8") <= 150) {
                $set_data['nama_pemakaman'] = $this->post['nama_pemakaman'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Nama tidak sesuai ketentuan<br>';
                $this->invalid_info['nama_pemakaman'] = 'Nama tidak sesuai ketentuan';
            }

            if (isset($this->post['jenis_kelamin_pemakaman']) && $this->post['jenis_kelamin_pemakaman'] != '') {
                $set_data['jenis_kelamin_pemakaman'] = $this->post['jenis_kelamin_pemakaman'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Jenis kelamin belum diisi<br>';
                $this->invalid_info['jenis_kelamin_pemakaman'] = 'Jenis kelamin belum diisi';
            }

            if (isset($this->post['umur_pemakaman']) && $this->post['umur_pemakaman'] != '') {
                $set_data['umur_pemakaman'] = $this->post['umur_pemakaman'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Bidang umur belum diisi<br>';
                $this->invalid_info['umur_pemakaman'] = 'Bidang umur belum diisi';
            }

            if (isset($this->post['agama']) && $this->post['agama'] != '') {
                $set_data['agama_pemakaman'] = $this->post['agama'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Agama belum diisi<br>';
                $this->invalid_info['agama'] = 'Agama belum diisi';
            }

            if (isset($this->post['pekerjaan_pemakaman']) && $this->post['pekerjaan_pemakaman'] != '') {
                $set_data['pekerjaan_pemakaman'] = $this->post['pekerjaan_pemakaman'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Pekerjaan belum diisi<br>';
                $this->invalid_info['pekerjaan_pemakaman'] = 'Pekerjaan belum diisi';
            }

            if (isset($this->post['tempat_dimakamkan']) &&  $this->post['tempat_dimakamkan'] != '' && mb_strlen($this->post['tempat_dimakamkan'], "UTF-8") <= 150) {
                $set_data['tempat_dimakamkan'] = $this->post['tempat_dimakamkan'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'TPU tidak sesuai ketentuan<br>';
                $this->invalid_info['tempat_dimakamkan'] = ' tidak sesuai ketentuan';
            }

            if (isset($this->post['alamat_pemakaman']) && $this->post['alamat_pemakaman'] != '') {
                $set_data['alamat_pemakaman'] = $this->post['alamat_pemakaman'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Alamat TPU belum diisi<br>';
                $this->invalid_info['alamat_pemakaman'] = 'Alamat TPU belum diisi';
            }

            if (isset($this->post['kewarganegaraan']) && $this->post['kewarganegaraan'] != '') {
                $set_data['kewarganegaraan_pemakaman'] = $this->post['kewarganegaraan'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Kewarganegaraan belum diisi<br>';
                $this->invalid_info['kewarganegaraan_pemakaman'] = 'Kewarganegaraan belum diisi<br>';
            }
        }
        if (isset($this->post['hari_wafat']) && $this->post['hari_wafat'] != '') {
            $set_data['hari_wafat'] = $this->post['hari_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Bidang hari wafat, belum diisi<br>';
            $this->invalid_info['hari_wafat'] = 'Bidang hari wafat, belum diisi';
        }

        if (isset($this->post['tanggal_wafat_pemakaman']) && $this->post['tanggal_wafat_pemakaman'] != '') {
            $set_data['tanggal_wafat_pemakaman'] = $this->post['tanggal_wafat_pemakaman'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Tanggal wafat belum diisi<br>';
            $this->invalid_info['tanggal_wafat_pemakaman'] = 'Tanggal wafat belum diisi';
        }

        if (isset($this->post['jam_wafat']) && $this->post['jam_wafat'] != '') {
            $set_data['jam_wafat'] = $this->post['jam_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Bidang jam wafat, belum diisi<br>';
            $this->invalid_info['jam_wafat'] = 'Bidang jam wafat, belum diisi';
        }

        if (isset($this->post['tempat_wafat']) && $this->post['tempat_wafat'] != '') {
            $set_data['tempat_wafat'] = $this->post['tempat_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Tempat wafat belum diisi<br>';
            $this->invalid_info['tempat_wafat'] = 'Tempat wafat belum diisi';
        }

        if (isset($this->post['penyebab_wafat']) && $this->post['penyebab_wafat'] != '') {
            $set_data['penyebab_wafat'] = $this->post['penyebab_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Penyebab wafat belum diisi<br>';
            $this->invalid_info['penyebab_wafat'] = 'Penyebab Wafat belum diisi';
        }

        // simpan ke basis data
        if ($valid) {
            print_r($new_data);
            if ($new_data) {
                if ($this->tbl_surat_pemakaman->insert($set_data)) {
                    $id_surat_pemakaman = $this->tbl_surat_pemakaman->db->insertID();
                    $this->message_info['status'] = 1;
                    $this->message_info['text'] .= 'Data surat pemakaman berhasil simpan<br>';
                } else {
                    $this->message_info['text'] .= 'Data surat pemakaman gagal simpan<br>';
                    $insert_user_id = 0;
                }
            } else {
                if ($this->tbl_surat_pemakaman->set($set_data)->where('id_surat_pemakaman', $id_surat_pemakaman)->update()) {
                    $this->message_info['status'] = 1;
                    $this->message_info['text'] .= 'Data surat pemakaman berhasil diubah<br>';
                } else {
                    $this->message_info['text'] .= 'Data surat pemakaman gagal diubah<br>';
                    $insert_user_id = 0;
                }
            }
        }

        // if ($id_surat_pemakaman && $insert_user_id && $valid) {
        //     foreach ($arr_post_photo as $key => $value) {
        //         if (!empty($_FILES[$value]['tmp_name'])) {
        //             $this->upload_lampiran_picture($value, $id_surat_pemakaman, $insert_user_id);
        //         }
        //     }
        // }

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        if ($id_surat_pemakaman != '' && $id_surat_pemakaman > 0) {
            return redirect()->to(base_url() . '/penduduk/surat-pemakaman-edit/' . $id_surat_pemakaman);
        } else {
            return redirect()->to(base_url() . '/penduduk/surat-pemakaman-edit');
        }

        exit;
    }

    // protected function upload_lampiran_picture($attr_name, $id_surat_pemakaman, $insert_user_id)
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
    //             $foto->move(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_pemakaman', $attr_name . '_' . $new_name_foto_kk);
    //             try {
    //                 $image = \Config\Services::image()
    //                     ->withFile(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_pemakaman/' . $attr_name . '_' . $new_name_foto_kk)
    //                     ->resize(1040, 1040, true, 'width')
    //                     ->save(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_pemakaman/' . $attr_name . '_' . $new_name_foto_kk);
    //             } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
    //                 $this->message_info['text'] .= $title_info . ' failed resize. :' . $e->getMessage() . '<br>';
    //                 $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
    //             }

    //             $file_foto_kk =  'user_upload/' . $insert_user_id . '/lampiran_surat_pemakaman/' . $attr_name . '_' . $new_name_foto_kk;
    //             $link_foto_kk = urlencode(base64_encode($file_foto_kk));
    //             $foto_insert = array('link_' . $attr_name => $link_foto_kk, 'file_' . $attr_name => $file_foto_kk);
    //             if ($this->tbl_surat_pemakaman->set($foto_insert)->where(['id_user' => $insert_user_id, 'id_surat_pemakaman' => $id_surat_pemakaman])->update()) {
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
