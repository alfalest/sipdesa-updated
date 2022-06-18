<?php

namespace Penduduk\Controllers;

use App\Controllers\BaseController;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_surat_kematian;
use Config\Paths;

class Surat_kematian_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_kematian;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kematian = new Tbl_surat_kematian();
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
        $id_surat_kematian = 0;

        //evaluasi data untuk insert atau update
        if (isset($this->session->get('login_session')['id_user'])) {
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        if (isset($this->post['id_surat_kematian']) && $this->post['id_surat_kematian'] != '') {
            $data_perubahan_kk = $this->tbl_surat_kematian->where(['id_surat_kematian' => $this->post['id_surat_kematian'], 'status_surat_kematian' => 1, 'id_user' => $insert_user_id])->first();
            if ($data_perubahan_kk) {
                $id_surat_kematian = $this->post['id_surat_kematian'];
                $new_data = false;
            }
        }

        //setup array key data insert
        $set_data = [
            'id_user' => $insert_user_id,
            'nama_wafat' => '',
            'jenis_kelamin_wafat' => '',
            'tempat_lahir_wafat' => '',
            'tanggal_lahir_wafat' => '',
            'kewarganegaraan_wafat' => '',
            'agama_wafat' => '',
            'pekerjaan_wafat' => '',
            'alamat_wafat' => '',

            'hari_wafat' => '',
            'tanggal_wafat' => '',
            'jam_wafat' => '',
            'tempat_wafat' => '',
            'penyebab_wafat' => '',
            'status_surat_kematian' => 1,
        ];

        $arr_postfix = ['_wafat' => 'Wafat'];

        //validation
        foreach ($arr_postfix as $key => $value) {
            // $this->post['nama_wafat_wafat]
            if (isset($this->post['nama_wafat']) && $this->post['nama_wafat'] != '' && mb_strlen($this->post['nama_wafat'], "UTF-8") <= 150) {
                $set_data['nama_wafat'] = $this->post['nama_wafat'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Nama ' . $value . ' tidak sesuai ketentuan<br>';
                $this->invalid_info['nama_wafat'] = 'Nama ' . $value . ' tidak sesuai ketentuan';
            }

            if (isset($this->post['jenis_kelamin_wafat']) && $this->post['jenis_kelamin_wafat'] != '') {
                $set_data['jenis_kelamin_wafat'] = $this->post['jenis_kelamin_wafat'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Jenis kelamin ' . $value . ' belum diisi<br>';
                $this->invalid_info['jenis_kelamin_wafat'] = 'Jenis kelamin ' . $value . ' belum diisi';
            }

            if (isset($this->post['agama']) && $this->post['agama'] != '') {
                $set_data['agama_wafat'] = $this->post['agama'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Agama ' . $value . ' belum diisi<br>';
                $this->invalid_info['agama'] = 'Agama ' . $value . ' belum diisi';
            }

            if (isset($this->post['pekerjaan_wafat']) && $this->post['pekerjaan_wafat'] != '') {
                $set_data['pekerjaan_wafat'] = $this->post['pekerjaan_wafat'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Pekerjaan ' . $value . ' belum diisi<br>';
                $this->invalid_info['pekerjaan_wafat'] = 'Pekerjaan ' . $value . ' belum diisi';
            }

            if (isset($this->post['alamat_wafat']) &&  $this->post['alamat_wafat'] != '' && mb_strlen($this->post['alamat_wafat'], "UTF-8") <= 150) {
                $set_data['alamat_wafat'] = $this->post['alamat_wafat'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Alamat ' . $value . ' tidak sesuai ketentuan<br>';
                $this->invalid_info['alamat_wafat'] = 'Alamat ' . $value . ' tidak sesuai ketentuan';
            }

            // if (isset($this->post['rt']) &&  $this->post['rt' . $key] != '' && mb_strlen($this->post['rt' . $key], "UTF-8") <= 3) {
            //     $set_data['rt' . $key] = intval($this->post['rt' . $key]);
            // } else {
            //     $valid = false;
            //     $this->message_info['text'] .= 'RT ' . $value . ' tidak sesuai ketentuan<br>';
            //     $this->invalid_info['rt' . $key] = 'RT ' . $value . ' tidak sesuai ketentuan';
            // }

            // if (isset($this->post['rw' . $key]) &&  $this->post['rw' . $key] != '' && mb_strlen($this->post['rw' . $key], "UTF-8") <= 3) {
            //     $set_data['rw' . $key] = intval($this->post['rw' . $key]);
            // } else {
            //     $valid = false;
            //     $this->message_info['text'] .= 'RW ' . $value . ' tidak sesuai ketentuan<br>';
            //     $this->invalid_info['rw' . $key] = 'RW ' . $value . ' tidak sesuai ketentuan';
            // }

            // if (isset($this->post['kel_desa' . $key])  &&  $this->post['kel_desa' . $key] != '' && mb_strlen($this->post['kel_desa' . $key], "UTF-8") == 13) {
            //     $set_data['kel_desa' . $key] = $this->post['kel_desa' . $key];
            // } else {
            //     $valid = false;
            //     $this->message_info['text'] .= 'Periksa kembali kolom provinsi, kabupate/kota, kecamatan dan desa/kelurahan ' . $value . '<br>';
            //     $this->invalid_info['kel_desa' . $key] = 'Periksa kembali kolom provinsi, kabupate/kota, kecamatan dan desa/kelurahan ' . $value;
            // }

            // if (isset($this->post['kode_pos' . $key]) &&  $this->post['kode_pos' . $key] != '' &&  mb_strlen($this->post['kode_pos' . $key], "UTF-8") == 5) {
            //     $set_data['kode_pos' . $key] = intval($this->post['kode_pos' . $key]);
            // }

            if (isset($this->post['kewarganegaraan']) && $this->post['kewarganegaraan'] != '') {
                $set_data['kewarganegaraan_wafat'] = $this->post['kewarganegaraan'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Kewarganegaraan ' . $value . ' belum diisi<br>';
                $this->invalid_info['kewarganegaraan_wafat'] = 'Kewarganegaraan ' . $value . ' belum diisi<br>';
            }
        }
        if (isset($this->post['hari_wafat']) && $this->post['hari_wafat'] != '') {
            $set_data['hari_wafat'] = $this->post['hari_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Bidang jam kematian, belum diisi<br>';
            $this->invalid_info['hari_wafat'] = 'Bidang jam kematian, belum diisi';
        }

        if (isset($this->post['tanggal_lahir_wafat']) && $this->post['tanggal_lahir_wafat'] != '') {
            $set_data['tanggal_lahir_wafat'] = $this->post['tanggal_lahir_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Tanggal lahir ' . $value . ' belum diisi<br>';
            $this->invalid_info['tanggal_lahir_wafat'] = 'Tanggal wafat ' . $value . ' belum diisi';
        }

        if (isset($this->post['tanggal_wafat']) && $this->post['tanggal_wafat'] != '') {
            $set_data['tanggal_wafat'] = $this->post['tanggal_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Tanggal wafat ' . $value . ' belum diisi<br>';
            $this->invalid_info['tanggal_wafat'] = 'Tanggal wafat ' . $value . ' belum diisi';
        }

        if (isset($this->post['jam_wafat']) && $this->post['jam_wafat'] != '') {
            $set_data['jam_wafat'] = $this->post['jam_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Bidang jam wafat, belum diisi<br>';
            $this->invalid_info['jam_wafat'] = 'Bidang jam wafat, belum diisi';
        }

        if (isset($this->post['tempat_lahir_wafat']) && $this->post['tempat_lahir_wafat'] != '') {
            $set_data['tempat_lahir_wafat'] = $this->post['tempat_lahir_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Tempat wafat ' . $value . ' belum diisi<br>';
            $this->invalid_info['tempat_lahir_wafat'] = 'Tempat wafat ' . $value . ' belum diisi';
        }

        if (isset($this->post['tempat_wafat']) && $this->post['tempat_wafat'] != '') {
            $set_data['tempat_wafat'] = $this->post['tempat_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Tempat wafat ' . $value . ' belum diisi<br>';
            $this->invalid_info['tempat_wafat'] = 'Tempat wafat ' . $value . ' belum diisi';
        }

        if (isset($this->post['penyebab_wafat']) && $this->post['penyebab_wafat'] != '') {
            $set_data['penyebab_wafat'] = $this->post['penyebab_wafat'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Penyebab wafat ' . $value . ' belum diisi<br>';
            $this->invalid_info['penyebab_wafat'] = 'Penyebab Wafat ' . $value . ' belum diisi';
        }

        // simpan ke basis data
        if ($valid) {
            if ($new_data) {
                if ($this->tbl_surat_kematian->insert($set_data)) {
                    $id_surat_kematian = $this->tbl_surat_kematian->db->insertID();
                    $this->message_info['status'] = 1;
                    $this->message_info['text'] .= 'Data surat kematian berhasil simpan<br>';
                } else {
                    $this->message_info['text'] .= 'Data surat kematian gagal simpan<br>';
                    $insert_user_id = 0;
                }
            } else {
                if ($this->tbl_surat_kematian->set($set_data)->where('id_surat_kematian', $id_surat_kematian)->update()) {
                    $this->message_info['status'] = 1;
                    $this->message_info['text'] .= 'Data surat kematian berhasil diubah<br>';
                } else {
                    $this->message_info['text'] .= 'Data surat kematian gagal diubah<br>';
                    $insert_user_id = 0;
                }
            }
        }

        // if ($id_surat_kematian && $insert_user_id && $valid) {
        //     foreach ($arr_post_photo as $key => $value) {
        //         if (!empty($_FILES[$value]['tmp_name'])) {
        //             $this->upload_lampiran_picture($value, $id_surat_kematian, $insert_user_id);
        //         }
        //     }
        // }

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        if ($id_surat_kematian != '' && $id_surat_kematian > 0) {
            return redirect()->to(base_url() . '/penduduk/surat-kematian-edit/' . $id_surat_kematian);
        } else {
            return redirect()->to(base_url() . '/penduduk/surat-kematian-edit');
        }

        exit;
    }

    // protected function upload_lampiran_picture($attr_name, $id_surat_kematian, $insert_user_id)
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
    //             $foto->move(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_kematian', $attr_name . '_' . $new_name_foto_kk);
    //             try {
    //                 $image = \Config\Services::image()
    //                     ->withFile(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_kematian/' . $attr_name . '_' . $new_name_foto_kk)
    //                     ->resize(1040, 1040, true, 'width')
    //                     ->save(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_kematian/' . $attr_name . '_' . $new_name_foto_kk);
    //             } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
    //                 $this->message_info['text'] .= $title_info . ' failed resize. :' . $e->getMessage() . '<br>';
    //                 $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
    //             }

    //             $file_foto_kk =  'user_upload/' . $insert_user_id . '/lampiran_surat_kematian/' . $attr_name . '_' . $new_name_foto_kk;
    //             $link_foto_kk = urlencode(base64_encode($file_foto_kk));
    //             $foto_insert = array('link_' . $attr_name => $link_foto_kk, 'file_' . $attr_name => $file_foto_kk);
    //             if ($this->tbl_surat_kematian->set($foto_insert)->where(['id_user' => $insert_user_id, 'id_surat_kematian' => $id_surat_kematian])->update()) {
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
