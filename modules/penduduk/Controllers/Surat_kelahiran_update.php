<?php

namespace Penduduk\Controllers;

use App\Controllers\BaseController;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_surat_kelahiran;
use Config\Paths;

class Surat_kelahiran_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_kelahiran;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
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
        $id_surat_kelahiran = 0;

        //evaluasi data untuk insert atau update
        if (isset($this->session->get('login_session')['id_user'])) {
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }

        if (isset($this->post['id_surat_kelahiran']) && $this->post['id_surat_kelahiran'] != '') {
            $data_perubahan_kk = $this->tbl_surat_kelahiran->where(['id_surat_kelahiran' => $this->post['id_surat_kelahiran'], 'status_surat_kelahiran' => 1, 'id_user' => $insert_user_id])->first();
            if ($data_perubahan_kk) {
                $id_surat_kelahiran = $this->post['id_surat_kelahiran'];
                $new_data = false;
            }
        }

        //setup array key data insert
        $set_data = [
            'id_user' => $insert_user_id,
            'tempat_dilahirkan' => '',
            'jenis_kelahiran' => '',
            'penolong_kelahiran' => '',
            'jam_lahir' => '',
            'kelahiran_anak_ke' => '',
            'status_surat_kelahiran' => 1,

            'nama_anak' => '',
            'nama_ayah' => '',
            'nama_ibu' => '',
            'nik_anak' => '',
            'nik_ayah' => '',
            'nik_ibu' => '',
            'jenis_kelamin_anak' => '',
            'jenis_kelamin_ayah' => 1,
            'jenis_kelamin_ibu' => 2,
            'tempat_lahir_anak' => '',
            'tempat_lahir_ayah' => '',
            'tempat_lahir_ibu' => '',
            'tanggal_lahir_anak' => '',
            'tanggal_lahir_ayah' => '',
            'tanggal_lahir_ibu' => '',
            'agama_anak' => '',
            'agama_ayah' => '',
            'agama_ibu' => '',
            'jenis_pekerjaan_anak' => '',
            'jenis_pekerjaan_ayah' => '',
            'jenis_pekerjaan_ibu' => '',
            'alamat_anak' => '',
            'alamat_ayah' => '',
            'alamat_ibu' => '',
            'rt_anak' => '',
            'rt_ayah' => '',
            'rt_ibu' => '',
            'rw_anak' => '',
            'rw_ayah' => '',
            'rw_ibu' => '',
            'kel_desa_anak' => '',
            'kel_desa_ayah' => '',
            'kel_desa_ibu' => '',
            'kode_pos_anak' => '',
            'kode_pos_ayah' => '',
            'kode_pos_ibu' => '',
            'kewarganegaraan_anak' => '',
            'kewarganegaraan_ayah' => '',
            'kewarganegaraan_ibu' => '',
            'hubungan_pelapor_dengan_anak' => ''

        ];

        $arr_postfix = ['_anak' => 'Anak', '_ayah' => 'Ayah', '_ibu' => 'Ibu'];

        //validation
        foreach ($arr_postfix as $key => $value) {

            if (isset($this->post['nama' . $key]) && $this->post['nama' . $key] != '' && mb_strlen($this->post['nama' . $key], "UTF-8") <= 150) {
                $set_data['nama' . $key] = $this->post['nama' . $key];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Nama ' . $value . ' tidak sesuai ketentuan<br>';
                $this->invalid_info['nama' . $key] = 'Nama ' . $value . ' tidak sesuai ketentuan';
            }

            if ($key == '_anak') {
                if (isset($this->post['nik' . $key]) &&  $this->post['nik' . $key] != '' &&  mb_strlen($this->post['nik' . $key], "UTF-8") == 16) {
                    $set_data['nik' . $key] = $this->post['nik' . $key];
                }
            } else {
                if (isset($this->post['nik' . $key]) &&  $this->post['nik' . $key] != '' &&  mb_strlen($this->post['nik' . $key], "UTF-8") == 16) {
                    $set_data['nik' . $key] = $this->post['nik' . $key];
                } else {
                    $valid = false;
                    $this->message_info['text'] .= 'NIK ' . $value . ' tidak sesuai ketentuan<br>';
                    $this->invalid_info['nik' . $key] = 'NIK ' . $value . ' tidak sesuai ketentuan';
                }
            }

            if ($key == '_anak') {
                if (isset($this->post['jenis_kelamin' . $key]) && $this->post['jenis_kelamin' . $key] != '') {
                    $set_data['jenis_kelamin' . $key] = $this->post['jenis_kelamin' . $key];
                } else {
                    $valid = false;
                    $this->message_info['text'] .= 'Jenis kelamin ' . $value . ' belum diisi<br>';
                    $this->invalid_info['jenis_kelamin' . $key] = 'Jenis kelamin ' . $value . ' belum diisi';
                }
            }


            if (isset($this->post['tempat_lahir' . $key]) && $this->post['tempat_lahir' . $key] != '') {
                $set_data['tempat_lahir' . $key] = $this->post['tempat_lahir' . $key];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Tempat lahir ' . $value . ' belum diisi<br>';
                $this->invalid_info['tempat_lahir' . $key] = 'Tempat lahir ' . $value . ' belum diisi';
            }


            if (isset($this->post['tanggal_lahir' . $key]) && $this->post['tanggal_lahir' . $key] != '') {
                $set_data['tanggal_lahir' . $key] = $this->post['tanggal_lahir' . $key];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Tanggal lahir ' . $value . ' belum diisi<br>';
                $this->invalid_info['tanggal_lahir' . $key] = 'Tanggal lahir ' . $value . ' belum diisi';
            }

            if (isset($this->post['agama' . $key]) && $this->post['agama' . $key] != '') {
                $set_data['agama' . $key] = $this->post['agama' . $key];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Agama ' . $value . ' belum diisi<br>';
                $this->invalid_info['agama' . $key] = 'Agama ' . $value . ' belum diisi';
            }

            if (isset($this->post['jenis_pekerjaan' . $key]) && $this->post['jenis_pekerjaan' . $key] != '') {
                $set_data['jenis_pekerjaan' . $key] = $this->post['jenis_pekerjaan' . $key];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Pekerjaan ' . $value . ' belum diisi<br>';
                $this->invalid_info['jenis_pekerjaan' . $key] = 'Pekerjaan ' . $value . ' belum diisi';
            }

            if (isset($this->post['alamat' . $key]) &&  $this->post['alamat' . $key] != '' && mb_strlen($this->post['alamat' . $key], "UTF-8") <= 150) {
                $set_data['alamat' . $key] = $this->post['alamat' . $key];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Alamat ' . $value . ' tidak sesuai ketentuan<br>';
                $this->invalid_info['alamat' . $key] = 'Alamat ' . $value . ' tidak sesuai ketentuan';
            }


            if (isset($this->post['rt' . $key]) &&  $this->post['rt' . $key] != '' && mb_strlen($this->post['rt' . $key], "UTF-8") <= 3) {
                $set_data['rt' . $key] = intval($this->post['rt' . $key]);
            } else {
                $valid = false;
                $this->message_info['text'] .= 'RT ' . $value . ' tidak sesuai ketentuan<br>';
                $this->invalid_info['rt' . $key] = 'RT ' . $value . ' tidak sesuai ketentuan';
            }

            if (isset($this->post['rw' . $key]) &&  $this->post['rw' . $key] != '' && mb_strlen($this->post['rw' . $key], "UTF-8") <= 3) {
                $set_data['rw' . $key] = intval($this->post['rw' . $key]);
            } else {
                $valid = false;
                $this->message_info['text'] .= 'RW ' . $value . ' tidak sesuai ketentuan<br>';
                $this->invalid_info['rw' . $key] = 'RW ' . $value . ' tidak sesuai ketentuan';
            }

            if (isset($this->post['kel_desa' . $key])  &&  $this->post['kel_desa' . $key] != '' && mb_strlen($this->post['kel_desa' . $key], "UTF-8") == 13) {
                $set_data['kel_desa' . $key] = $this->post['kel_desa' . $key];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Periksa kembali kolom provinsi, kabupate/kota, kecamatan dan desa/kelurahan ' . $value . '<br>';
                $this->invalid_info['kel_desa' . $key] = 'Periksa kembali kolom provinsi, kabupate/kota, kecamatan dan desa/kelurahan ' . $value;
            }

            if (isset($this->post['kode_pos' . $key]) &&  $this->post['kode_pos' . $key] != '' &&  mb_strlen($this->post['kode_pos' . $key], "UTF-8") == 5) {
                $set_data['kode_pos' . $key] = intval($this->post['kode_pos' . $key]);
            }

            if (isset($this->post['kewarganegaraan' . $key]) && $this->post['kewarganegaraan' . $key] != '') {
                $set_data['kewarganegaraan' . $key] = $this->post['kewarganegaraan' . $key];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Kewarganegaraan ' . $value . ' belum diisi<br>';
                $this->invalid_info['kewarganegaraan' . $key] = 'Kewarganegaraan ' . $value . ' belum diisi<br>';
            }
        }

        if (isset($this->post['tempat_dilahirkan']) && $this->post['tempat_dilahirkan'] != '') {
            $set_data['tempat_dilahirkan'] = intval($this->post['tempat_dilahirkan']);
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Bidang tempat dilahirkan, belum diisi<br>';
            $this->invalid_info['tempat_dilahirkan'] = 'Bidang tempat dilahirkan, belum diisi';
        }

        if (isset($this->post['jenis_kelahiran']) && $this->post['jenis_kelahiran'] != '') {
            $set_data['jenis_kelahiran'] = intval($this->post['jenis_kelahiran']);
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Bidang jenis kelahiran, belum diisi<br>';
            $this->invalid_info['jenis_kelahiran'] = 'Bidang jenis kelahiran, belum diisi';
        }

        if (isset($this->post['penolong_kelahiran']) && $this->post['penolong_kelahiran'] != '') {
            $set_data['penolong_kelahiran'] = intval($this->post['penolong_kelahiran']);
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Bidang penolong kelahiran, belum diisi<br>';
            $this->invalid_info['penolong_kelahiran'] = 'Bidang penolong kelahiran, belum diisi';
        }

        if (isset($this->post['jam_lahir']) && $this->post['jam_lahir'] != '') {
            $set_data['jam_lahir'] = $this->post['jam_lahir'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Bidang jam kelahiran, belum diisi<br>';
            $this->invalid_info['jam_lahir'] = 'Bidang jam kelahiran, belum diisi';
        }

        if (isset($this->post['kelahiran_anak_ke']) && $this->post['kelahiran_anak_ke'] != '') {
            $set_data['kelahiran_anak_ke'] = intval($this->post['kelahiran_anak_ke']);
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Bidang kelahiran anak ke berapa, belum diisi<br>';
            $this->invalid_info['kelahiran_anak_ke'] = 'Bidang kelahiran anak ke berapa, belum diisi';
        }

        if (isset($this->post['hubungan_pelapor_dengan_anak']) &&  $this->post['hubungan_pelapor_dengan_anak'] != '' && mb_strlen($this->post['hubungan_pelapor_dengan_anak'], "UTF-8") <= 150) {
            $set_data['hubungan_pelapor_dengan_anak'] = $this->post['hubungan_pelapor_dengan_anak'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Hubungan dengan anak belum diisi<br>';
            $this->invalid_info['hubungan_pelapor_dengan_anak'] = 'Hubungan dengan anak belum diisi';
        }
        /*
foto_ktp_ayah
foto_ktp_ibu
foto_kartu_keluarga
foto_buku_nikah
foto_akta_perkawinan
*/
        $arr_post_photo = ['foto_ktp_ayah', 'foto_ktp_ibu', 'foto_kartu_keluarga', 'foto_buku_nikah', 'foto_akta_perkawinan'];
        $cek_upload_files = false;
        if ($new_data) {
            foreach ($arr_post_photo as $key => $value) {
                if (empty($_FILES[$value]['tmp_name'])) {
                    $cek_upload_files = true;
                }
            }
            if ($cek_upload_files) {
                foreach ($arr_post_photo as $key => $value) {
                    $valid = false;
                    $this->message_info['text'] .= 'Bidang lampiran ' . str_replace('_', ' ', $value) . ', belum diisi<br>';
                    $this->invalid_info[$value] = 'Lengkapi bidang ' . str_replace('_', ' ', $value);
                }
            }
        }
        // simpan ke basis data
        if ($valid) {
            if ($new_data) {
                if ($this->tbl_surat_kelahiran->insert($set_data)) {
                    $id_surat_kelahiran = $this->tbl_surat_kelahiran->db->insertID();
                    $this->message_info['status'] = 1;
                    $this->message_info['text'] .= 'Data surat kelahiran berhasil simpan<br>';
                } else {
                    $this->message_info['text'] .= 'Data surat kelahiran gagal simpan<br>';
                    $insert_user_id = 0;
                }
            } else {

                if ($this->tbl_surat_kelahiran->set($set_data)->where('id_surat_kelahiran', $id_surat_kelahiran)->update()) {
                    $this->message_info['status'] = 1;
                    $this->message_info['text'] .= 'Data surat kelahiran berhasil diubah<br>';
                } else {
                    $this->message_info['text'] .= 'Data surat kelahiran gagal diubah<br>';
                    $insert_user_id = 0;
                }
            }
        }

        if ($id_surat_kelahiran && $insert_user_id && $valid) {
            foreach ($arr_post_photo as $key => $value) {
                if (!empty($_FILES[$value]['tmp_name'])) {
                    $this->upload_lampiran_picture($value, $id_surat_kelahiran, $insert_user_id);
                }
            }
        }

        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        if ($id_surat_kelahiran != '' && $id_surat_kelahiran > 0) {
            return redirect()->to(base_url() . '/penduduk/surat-kelahiran-edit/' . $id_surat_kelahiran);
        } else {
            return redirect()->to(base_url() . '/penduduk/surat-kelahiran-edit');
        }

        exit;
    }

    protected function upload_lampiran_picture($attr_name, $id_surat_kelahiran, $insert_user_id)
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
                $foto->move(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_kelahiran', $attr_name . '_' . $new_name_foto_kk);
                try {
                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_kelahiran/' . $attr_name . '_' . $new_name_foto_kk)
                        ->resize(1040, 1040, true, 'width')
                        ->save(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_kelahiran/' . $attr_name . '_' . $new_name_foto_kk);
                } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
                    $this->message_info['text'] .= $title_info . ' failed resize. :' . $e->getMessage() . '<br>';
                    $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
                }

                $file_foto_kk =  'user_upload/' . $insert_user_id . '/lampiran_surat_kelahiran/' . $attr_name . '_' . $new_name_foto_kk;
                $link_foto_kk = urlencode(base64_encode($file_foto_kk));
                $foto_insert = array('link_' . $attr_name => $link_foto_kk, 'file_' . $attr_name => $file_foto_kk);
                if ($this->tbl_surat_kelahiran->set($foto_insert)->where(['id_user' => $insert_user_id, 'id_surat_kelahiran' => $id_surat_kelahiran])->update()) {
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
