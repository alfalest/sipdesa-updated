<?php

namespace Operator\Controllers;

use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_kode_kata;
use Operator\Models\Tbl_wilayah;
use Operator\Models\Tbl_negara;
use Operator\Models\Tbl_template_dokumen;
use Operator\Models\Tbl_surat_catatan_kepolisian;
use Operator\Models\Tbl_data_surat;
use Operator\Models\Tbl_data_diri;
use DateTime;
use Config\Paths;

class Surat_catatan_kepolisian_editor extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_wilayah;
    public $tbl_negara;
    public $tbl_template_dokumen;
    public $tbl_kode_kata;
    public $tbl_surat_catatan_kepolisian;
    public $tbl_data_surat;
    public $tbl_data_diri;
    public $list_kode_kata;
    public $bidang_kolom = [];

    public function __construct()
    {
        $this->cek_login([
            'tipe_user' => 2,
            'status_user' => 2,
            'email_verified' => 2
        ]);
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_negara = new Tbl_negara();
        $this->tbl_template_dokumen = new Tbl_template_dokumen();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_catatan_kepolisian = new Tbl_surat_catatan_kepolisian();
        $this->tbl_data_surat = new Tbl_data_surat();
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->list_kode_kata = [
            'jenis_kelamin',
            'agama', 'jenis_pekerjaan', 'gol_darah',

        ];
        $this->arr_postfix = ['_wafat' => 'Wafata'];
        helper('Date_helper');
        helper('form');
        helper('Ganti_teks_helper');
    }

    public function index($param = '')
    {
        $this->data['tanggal_sekarang'] = get_date();

        // foreach (nama_teks('surat_keterangan_catatan_kepolisian') as $key => $value) {
        //    $this->bidang_kolom[$value] = '(.....X.....)';
        // }

        //ambil kode kata untuk membuat option
        $this->list_kode_kata = ['jenis_catatan_kepolisian', 'jenis_kelamin', 'agama', 'jenis_pekerjaan', 'gol_darah'];

        //ambil data id user dari session
        $id_user = 0;
        if (isset($this->session->get('login_session')['id_user'])) {
            $id_user = $this->session->get('login_session')['id_user'];
        }

        //ambil data user dari database
        $data_diri = [];
        $data_surat_catatan_kepolisian = [];
        if ($param != '' && $id_user) {
            $data_surat_catatan_kepolisian = $this->tbl_surat_catatan_kepolisian->where(['id_surat_catatan_kepolisian' => intval($param), 'status_surat_catatan_kepolisian' => 2])->first();
            if ($data_surat_catatan_kepolisian) {
                $data_diri = $this->tbl_data_diri->where(['id_user' => $data_surat_catatan_kepolisian['id_user']])->first();
            }
        }


        if ($data_surat_catatan_kepolisian && $data_diri) {
            $data_perubahan = $data_surat_catatan_kepolisian;
            $this->data['data_surat']['id_surat'] = $data_surat_catatan_kepolisian['id_surat_catatan_kepolisian'];
        } else {
            return redirect()->to(base_url() . '/operator/surat-catatan-kepolisian');
            exit;
        }

        if (isset($data_perubahan)) {
            foreach ($this->arr_postfix as $key => $value) {
                $data_perubahan = $this->wilayah($data_perubahan, $key);
                $data_perubahan = $this->kode_kata($data_perubahan, $key);
                $data_perubahan = $this->negara($data_perubahan, $key);
                $data_perubahan = $this->kode_kata($data_perubahan);
            }
        }

        if (isset($data_diri)) {
            foreach ($this->arr_postfix as $key => $value) {
                $data_diri = $this->wilayah($data_diri);
                $data_diri = $this->negara($data_diri);
                $data_diri = $this->kode_kata($data_diri);
            }
        }


        $template_dokumen = $this->tbl_template_dokumen->where(['jenis_template' => 'surat_pengantar_keterangan_catatan_kepolisian', 'default_template' => 1])->first();
        if ($template_dokumen) {
        } else {
            $template_dokumen = $this->tbl_template_dokumen->where(['jenis_template' => 'surat_pengantar_keterangan_catatan_kepolisian'])->first();
        }

        if (isset($data_perubahan)) {
            //Data catatan_kepolisian
            $this->bidang_kolom['nama_catatan_kepolisian'] = $data_perubahan['nama_catatan_kepolisian'];
            $this->bidang_kolom['jenis_kelamin_catatan_kepolisian'] = $data_perubahan['jenis_kelamin_catatan_kepolisian'];
            $this->bidang_kolom['tanggal_lahir_catatan_kepolisian'] =  $data_perubahan['tanggal_lahir_catatan_kepolisian'];
            $this->bidang_kolom['tempat_lahir_catatan_kepolisian'] =  $data_perubahan['tempat_lahir_catatan_kepolisian'];
            $this->bidang_kolom['kewarganegaraan_catatan_kepolisian'] =  $data_perubahan['kewarganegaraan_catatan_kepolisian'];
            $this->bidang_kolom['agama_catatan_kepolisian'] =  $data_perubahan['agama_catatan_kepolisian'];
            $this->bidang_kolom['pekerjaan_catatan_kepolisian'] =  $data_perubahan['pekerjaan_catatan_kepolisian'];
            $this->bidang_kolom['alamat_catatan_kepolisian'] = $data_perubahan['alamat_catatan_kepolisian'];
            $this->bidang_kolom['tujuan_membuat_surat_catatan_kepolisian'] = $data_perubahan['tujuan_membuat_surat_catatan_kepolisian'];
        }
        if (isset($template_dokumen['template_dokumen']) && $template_dokumen['template_dokumen'] != '') {
            foreach ($this->bidang_kolom as $key => $value) {
                $data = $value;

                if ($key == 'jenis_kelamin_catatan_kepolisian') {
                    if ($value == 1) {
                        $data = "LAKI-LAKI";
                    } else {
                        $data = "PEREMPUAN";
                    }
                }

                if ($key == 'kewarganegaraan_catatan_kepolisian') {
                    $data = $this->tbl_negara->ambil($value)['name'];
                }

                if ($key == 'agama_catatan_kepolisian') {
                    $data = $this->tbl_kode_kata->ambil_kata($value, 'agama');
                }

                if ($key == 'pekerjaan_catatan_kepolisian') {
                    $data = $this->tbl_kode_kata->ambil_kata($value, 'jenis_pekerjaan');
                }

                $template_dokumen['template_dokumen'] = str_replace('[#' . $key . '#]', strtoupper($data), $template_dokumen['template_dokumen']);
            }
        }

        $this->data['data_surat']['teks_isi_surat'] = $template_dokumen['template_dokumen'];
        $this->data['data_surat']['nama_template'] = $template_dokumen['nama_template'];

        //cek jika ada session inp_val
        if ($this->session->getFlashdata('inp_val')) {
            foreach ($this->session->getFlashdata('inp_val') as $key => $value) {
                if ($key != 'id_surat') {
                    $this->data['data_surat'][$key] = $value;
                }
            }
        }


        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info');
        }

        if ($this->session->getFlashdata('invalid_info')) {
            $this->data['invalid_info'] = $this->session->getFlashdata('invalid_info');
        }

        $this->data['v']['page'] = 'surat_catatan_kepolisian_editor';
        $this->data['v']['script'] = 'surat_catatan_kepolisian_editor';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }

    protected function wilayah($arr_data, $postfix = '')
    {
        //ambil data wilayah untuk membuat option
        if (isset($arr_data)) {
            if (isset($arr_data['kel_desa' . $postfix]) && $arr_data['kel_desa' . $postfix] != '') {
                $arr_kode = explode(".", $arr_data['kel_desa' . $postfix]);
                if (count($arr_kode) == 4) {
                    $provinsi = $this->tbl_wilayah->get_wilayah($arr_kode[0]);
                    $kab_kota = $this->tbl_wilayah->get_wilayah($arr_kode[0] . '.' . $arr_kode[1]);
                    $kecamatan = $this->tbl_wilayah->get_wilayah($arr_kode[0] . '.' . $arr_kode[1] . '.' . $arr_kode[2]);
                    $kel_desa = $this->tbl_wilayah->get_wilayah($arr_kode[0] . '.' . $arr_kode[1] . '.' . $arr_kode[2] . '.' . $arr_kode[3]);

                    $arr_data['provinsi' . $postfix] = '';
                    if ($provinsi) {
                        $arr_data['provinsi' . $postfix] = strtoupper($provinsi['nama_wilayah']);
                    }

                    $arr_data['kab_kota' . $postfix] = '';
                    if ($kab_kota) {
                        $arr_data['kab_kota' . $postfix] = strtoupper($kab_kota['nama_wilayah']);
                    }

                    $arr_data['kecamatan' . $postfix] = '';
                    if ($kecamatan) {
                        $arr_data['kecamatan' . $postfix] = strtoupper($kecamatan['nama_wilayah']);
                    }

                    $arr_data['kel_desa' . $postfix] = '';
                    if ($kel_desa) {
                        $arr_data['kel_desa' . $postfix] = strtoupper($kel_desa['nama_wilayah']);
                    }
                }
            }
        }
        return $arr_data;
    }

    protected function arr_wilayah($arr_data, $postfix = '')
    {
        if (isset($arr_data['kel_desa' . $postfix]) && $arr_data['kel_desa' . $postfix] != '') {
            $arr_kode = explode(".", $arr_data['kel_desa' . $postfix]);
            if (count($arr_kode) == 4) {
                $arr_data['provinsi' . $postfix] = $arr_kode[0];
                $arr_data['kab_kota' . $postfix] = $arr_kode[0] . '.' . $arr_kode[1];
                $arr_data['kecamatan' . $postfix] = $arr_kode[0] . '.' . $arr_kode[1] . '.' . $arr_kode[2];
                $arr_data['kel_desa' . $postfix] = $arr_kode[0] . '.' . $arr_kode[1] . '.' . $arr_kode[2] . '.' . $arr_kode[3];

                $this->data['arr_wilayah']['provinsi' . $postfix] = $this->tbl_wilayah->get_provinsi();
                $this->data['arr_wilayah']['kab_kota' . $postfix] = $this->tbl_wilayah->get_kab_kota($arr_data['provinsi' . $postfix]);
                $this->data['arr_wilayah']['kecamatan' . $postfix] = $this->tbl_wilayah->get_kecamatan($arr_data['kab_kota' . $postfix]);
                $this->data['arr_wilayah']['kel_desa' . $postfix] = $this->tbl_wilayah->get_kel_desa($arr_data['kecamatan' . $postfix]);
            }
        }
        return $arr_data;
    }

    protected function kode_kata($arr_data, $postfix = '')
    {
        foreach ($this->list_kode_kata as $key => $value) {
            if (isset($arr_data[$value . $postfix])) {
                $ambil_kata = $this->tbl_kode_kata->ambil_kata($arr_data[$value . $postfix], $value);
                if ($ambil_kata) {
                    $arr_data[$value . $postfix] = strtoupper($ambil_kata);
                }
            }
        }
        return $arr_data;
    }


    protected function arr_kode_kata($postfix = '')
    {
        foreach ($this->list_kode_kata as $key => $value) {
            $ambil_kata = $this->tbl_kode_kata->ambil_grup_kata($value);
            if ($ambil_kata) {
                $this->data['arr_kode_kata'][$value . $postfix] = $ambil_kata;
            }
        }
    }

    // mengubah kode negara menjadi tampilan kata
    protected function negara($arr_data, $postfix = '')
    {
        if (isset($arr_data['kewarganegaraan' . $postfix])) {
            $ambil_negara = $this->tbl_negara->where(['id_negara' => $arr_data['kewarganegaraan' . $postfix]])->first();
            if ($ambil_negara) {
                $arr_data['kewarganegaraan' . $postfix] = strtoupper($ambil_negara['name']);
            }
        }
        return $arr_data;
    }

    // mengambil list id negara dan nama negara
    protected function arr_negara($postfix = '')
    {
        $ambil_negara = $this->tbl_negara->findAll();
        if ($ambil_negara) {
            foreach ($ambil_negara as $key => $value) {
                $this->data['arr_kode_kata']['kewarganegaraan' . $postfix][] = ['nomor_kode' => $value['id_negara'], 'tampilan_kata' => $value['name']];
            }
        }
    }
    public function umur($tanggal_lahir)
    {
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            $y = 0;
            $m = 0;
            $d = 0;
        } else {
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
        }
        return array('tahun' => $y, 'bulan' => $m, 'hari' => $d);
    }
}
