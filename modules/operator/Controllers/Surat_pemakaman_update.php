<?php

namespace Operator\Controllers;

use App\Controllers\BaseController;
use Operator\Models\Tbl_data_diri;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_surat_pemakaman;
use Operator\Models\Tbl_tiket;
use Config\Paths;

class Surat_pemakaman_update extends BaseController
{
    public $post;
    public $tbl_data_diri;
    public $tbl_perubahan_kk;
    public $tbl_surat_pemakaman;
    public $tbl_tiket;
    public $message_info;
    public $invalid_info;
    public function __construct()
    {
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_pemakaman = new Tbl_surat_pemakaman();
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
        $id_surat_pemakaman = 0;

        //evaluasi data untuk insert atau update
        if (isset($this->session->get('login_session')['id_user'])) {
            $insert_user_id = $this->session->get('login_session')['id_user'];
        }


        //setup array key data insert
        $set_data = [
            'status_surat_pemakaman' => '',
            'id_user_operator' => $insert_user_id,
            'keterangan_operator' => '',
            'belum_dilihat' => 1
        ];

        $set_tiket = [
            'nomor_tiket' => '',
            'jenis_tiket' => 'surat_keterangan_pemakaman',
            'filename_surat' => 'surat-pemakaman-lihat',
            'id_surat' => '',
            'status_tiket' => 1,
            'id_user' => '',
            'id_operator' => $insert_user_id,
            'id_operator_confirm' => 0,
            'keterangan_tiket' => '',
            'tanggal_kunjungan_tiket' => null,
            'waktu_mulai_tiket' => null,
            'waktu_selesai_tiket' => null,
            'waktu_kehadiran' => null
        ];
        $data_surat_pemakaman = [];
        if (isset($this->post['id_surat_pemakaman']) && $this->post['id_surat_pemakaman'] != '') {
            $data_surat_pemakaman = $this->tbl_surat_pemakaman->where(['id_surat_pemakaman' => $this->post['id_surat_pemakaman'], 'status_surat_pemakaman' => 1])->first();
            if ($data_surat_pemakaman) {
                $id_surat_pemakaman = $this->post['id_surat_pemakaman'];
                $set_tiket['id_surat'] = $data_surat_pemakaman['id_surat_pemakaman'];
                $set_tiket['id_user'] = $data_surat_pemakaman['id_user'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Surat pemakaman tidak ditemukan<br>';
            }
        }

        $arr_postfix = ['_anak' => 'Anak', '_ayah' => 'Ayah', '_ibu' => 'Ibu'];

        //validation
        if (isset($this->post['status_surat_pemakaman']) && in_array($this->post['status_surat_pemakaman'], [2, 3])) {
            if ($this->post['status_surat_pemakaman'] == 2) {
                if (isset($data_surat_pemakaman['id_user']) && $data_surat_pemakaman['id_user'] != 0) {
                    $data_diri = $this->tbl_data_diri->where(['id_user' => $data_surat_pemakaman['id_user']])->first();
                } else {
                    $data_diri = [];
                }

                if (!$data_diri) {
                    $valid = false;
                    $this->message_info['text'] .= 'Pemohon sama sekali belum mengisi data diri<br>';
                }
            }
            $set_data['status_surat_pemakaman'] = $this->post['status_surat_pemakaman'];
        } else {
            $valid = false;
            $this->message_info['text'] .= 'Pilih salah satu jenis verifikasi : Terima atau Tolak<br>';
            $this->invalid_info['status_surat_pemakaman'] = 'Pilih salah satu jenis verifikasi : Terima atau Tolak';
        }

        if (isset($this->post['keterangan_operator']) &&  $this->post['keterangan_operator'] != '') {
            if (mb_strlen($this->post['keterangan_operator'], "UTF-8") <= 150) {
                $set_data['keterangan_operator'] = $this->post['keterangan_operator'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Catatan melebihi 150 karakter<br>';
                $this->invalid_info['status_surat_pemakaman'] = 'Catatan melebihi 150 karakter';
            }
        }


        if (isset($this->post['keterangan_tiket']) && $this->post['keterangan_tiket'] !=  '') {
            if (mb_strlen($this->post['keterangan_tiket'], "UTF-8") <= 150) {
                $set_tiket['keterangan_tiket'] = $this->post['keterangan_tiket'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Keterangan tiket melebihi 150 karakter<br>';
                $this->invalid_info['status_surat_pemakaman'] = 'Keterangan tiket melebihi 150 karakter';
            }
        }

        $tanggal_valid = true;

        if (isset($this->post['tanggal_kunjungan_tiket']) && $this->post['tanggal_kunjungan_tiket'] != '') {
            $hari_ini = date_create(date('Y-m-d'));
            $hari_tiket = date_create($this->post['tanggal_kunjungan_tiket']);
            $beda_hari = date_diff($hari_ini, $hari_tiket);
            $this->invalid_info['tanggal_kunjungan_tiket'] = '';
            if ($hari_ini > $hari_tiket) {
                $valid = false;
                $this->message_info['text'] .= 'Tanggal tidak boleh sebelum tanggal hari ini<br>';
                $this->invalid_info['tanggal_kunjungan_tiket']  .= 'Tanggal tidak boleh sebelum tanggal hari ini';
                $tanggal_valid = false;
            }

            if ($beda_hari->days >= 31) {
                $valid = false;
                $this->message_info['text'] .= 'Tanggal maksimal 30 hari kedepan dari tanggal hari ini<br>';
                $this->invalid_info['tanggal_kunjungan_tiket'] .= 'Tanggal maksimal 30 hari kedepan dari tanggal hari ini';
                $tanggal_valid = false;
            }

            if ($tanggal_valid) {
                $set_tiket['tanggal_kunjungan_tiket'] = $this->post['tanggal_kunjungan_tiket'];
                unset($this->invalid_info['tanggal_kunjungan_tiket']);
            }
        }

        if (isset($this->post['waktu_mulai_tiket']) && $this->post['waktu_mulai_tiket'] != '') {
            if (isset($this->post['tanggal_kunjungan_tiket']) && $this->post['tanggal_kunjungan_tiket'] != '') {
                $set_tiket['waktu_mulai_tiket'] = $this->post['waktu_mulai_tiket'];
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Waktu mulai dapat diisi jika tanggal pelayanan juga diisi<br>';
                $this->invalid_info['waktu_mulai_tiket'] = 'Waktu mulai dapat diisi jika tanggal pelayanan juga diisi';
            }
        }

        if (isset($this->post['waktu_selesai_tiket']) && $this->post['waktu_selesai_tiket'] != '') {
            if (isset($this->post['waktu_mulai_tiket']) && !empty($this->post['waktu_mulai_tiket'])) {
                if (strtotime($this->post['waktu_mulai_tiket']) < strtotime($this->post['waktu_selesai_tiket'])) {
                    $set_tiket['waktu_selesai_tiket'] = $this->post['waktu_selesai_tiket'];
                } else {
                    $valid = false;
                    $this->message_info['text'] .= 'waktu selesai harus diatas waktu mulai<br>';
                    $this->invalid_info['waktu_selesai_tiket'] = 'waktu selesai harus diatas waktu mulai';
                }
            } else {
                $valid = false;
                $this->message_info['text'] .= 'Waktu selesai dapat diisi jika waktu mulai juga diisi<br>';
                $this->invalid_info['waktu_selesai_tiket'] = 'Waktu selesai dapat diisi jika waktu mulai juga diisi';
            }
        }



        $arr_post_photo = ['foto_ktp_ayah', 'foto_ktp_ibu', 'foto_kartu_keluarga', 'foto_buku_nikah', 'foto_akta_perkawinan'];

        // simpan ke basis data
        if ($valid) {
            if ($set_data['status_surat_pemakaman'] == 2) {

                $nomor_tiket = strtoupper(random_string('alnum', 8)) . str_replace("-", "", date("Y-m-d"));
                $db_tiket = $this->tbl_tiket->where(['nomor_tiket' => $nomor_tiket])->first();
                if ($db_tiket) {
                    $valid = false;
                    $this->message_info['text'] .= 'Mohon maaf, silahkan tekan tombol simpan kembali<br>';
                } else {
                    $set_tiket['nomor_tiket'] = $nomor_tiket;
                    if ($this->tbl_tiket->insert($set_tiket)) {
                    } else {
                        $valid = false;
                        $this->message_info['text'] .= 'Gagal Membuat tiket undangan<br>';
                    }
                }
            }

            if ($valid) {
                if ($this->tbl_surat_pemakaman->set($set_data)->where('id_surat_pemakaman', $id_surat_pemakaman)->update()) {
                    $this->message_info['status'] = 1;
                    $this->message_info['text'] .= 'Data surat pemakaman berhasil diubah<br>';
                    return redirect()->to(base_url() . '/operator/surat-pemakaman-edit/' . $id_surat_pemakaman);
                } else {
                    $this->message_info['text'] .= 'Data surat pemakaman gagal diverifikasi, periksa jika ada tiket atas surat ini<br>';
                }
            }
        }


        $this->session->setFlashdata('invalid_info', $this->invalid_info);
        $this->session->setFlashdata('inp_val', $this->post);
        $this->session->setFlashdata('message_info', $this->message_info);
        if ($id_surat_pemakaman != '' && $id_surat_pemakaman > 0) {
            if ($this->message_info['status']) {
                return redirect()->to(base_url() . '/operator/surat-pemakaman-lihat/' . $id_surat_pemakaman);
            } else {
                return redirect()->to(base_url() . '/operator/surat-pemakaman-edit/' . $id_surat_pemakaman);
            }
        } else {
            return redirect()->to(base_url() . '/operator/surat-pemakaman');
        }

        exit;
    }

    protected function upload_lampiran_picture($attr_name, $id_surat_pemakaman, $insert_user_id)
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
                $foto->move(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_pemakaman', $attr_name . '_' . $new_name_foto_kk);
                try {
                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_pemakaman/' . $attr_name . '_' . $new_name_foto_kk)
                        ->resize(1040, 1040, true, 'width')
                        ->save(WRITEPATH . "user_upload/" . $insert_user_id . '/lampiran_surat_pemakaman/' . $attr_name . '_' . $new_name_foto_kk);
                } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
                    $this->message_info['text'] .= $title_info . ' failed resize. :' . $e->getMessage() . '<br>';
                    $this->invalid_info[$attr_name] = 'Lengkapi bidang foto<br>';
                }

                $file_foto_kk =  'user_upload/' . $insert_user_id . '/lampiran_surat_pemakaman/' . $attr_name . '_' . $new_name_foto_kk;
                $link_foto_kk = urlencode(base64_encode($file_foto_kk));
                $foto_insert = array('link_' . $attr_name => $link_foto_kk, 'file_' . $attr_name => $file_foto_kk);
                if ($this->tbl_surat_pemakaman->set($foto_insert)->where(['id_user' => $insert_user_id, 'id_surat_pemakaman' => $id_surat_pemakaman])->update()) {
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