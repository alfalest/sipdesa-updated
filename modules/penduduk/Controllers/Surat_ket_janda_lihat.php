<?php

namespace Penduduk\Controllers;

use App\Controllers\BaseController;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_kode_kata;
use Penduduk\Models\Tbl_wilayah;
use Penduduk\Models\Tbl_negara;
use Penduduk\Models\Tbl_surat_ket_janda;
use Config\Paths;

class Surat_ket_janda_lihat extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_wilayah;
    public $tbl_negara;
    public $tbl_surat_ket_janda;
    public $tbl_kode_kata;
    public $list_kode_kata;
    public $arr_postfix;
    public function __construct()
    {
        $this->cek_login([
            'tipe_user' => 3,
            'status_user' => 2,
            'email_verified' => 2
        ]);
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_negara = new Tbl_negara();
        $this->tbl_surat_ket_janda = new Tbl_surat_ket_janda();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->list_kode_kata = [
            'jenis_kelamin',
            'agama',
            'jenis_pekerjaan',
            'gol_darah'
        ];
        $this->arr_postfix = ['_wafat' => 'Wafat'];
    }

    public function index($param = '')
    {

        //ambil kode kata untuk membuat option
        //ambil data id user dari session
        $id_user = 0;
        if (isset($this->session->get('login_session')['id_user'])) {
            $id_user = $this->session->get('login_session')['id_user'];
        }

        //ambil data user dari database
        $data_surat_ket_janda = [];
        if ($param != '' && $id_user) {
            $data_surat_ket_janda = $this->tbl_surat_ket_janda->where(['id_surat_ket_janda' => intval($param), 'id_user' => $id_user])->first();
        }

        if ($data_surat_ket_janda) {

            if (isset($data_surat_ket_janda['belum_dilihat']) && $data_surat_ket_janda['belum_dilihat'] == 1) {
                if ($this->tbl_surat_ket_janda->set(['belum_dilihat' => null])->where(['id_surat_ket_janda' => intval($param), 'id_user' => $id_user])->update()) {
                    $data_surat_ket_janda['belum_dilihat'] = null;
                }
            }
            $this->data['data_surat_ket_janda'] = $data_surat_ket_janda;
        }

        //cek jika ada session inp_val
        if ($this->session->getFlashdata('inp_val')) {
            $this->data['data_surat_ket_janda'] = $this->session->getFlashdata('inp_val');
            if (isset($data_surat_ket_janda['id_perubahan_kk']) && $data_surat_ket_janda['id_perubahan_kk'] != '') {
                $this->data['data_surat_ket_janda']['id_perubahan_kk'] = $data_surat_ket_janda['id_perubahan_kk'];
            }
        }

        //ambil data wilayah untuk membuat option
        if (isset($this->data['data_surat_ket_janda'])) {
            // die($this->arr_postfix);
            foreach ($this->arr_postfix as $key => $value) {
                $this->data['data_surat_ket_janda'] = $this->wilayah($this->data['data_surat_ket_janda'], $key);
                $this->data['data_surat_ket_janda'] = $this->kode_kata($this->data['data_surat_ket_janda'], $key);
                $this->data['data_surat_ket_janda'] = $this->negara($this->data['data_surat_ket_janda'], $key);
                $this->data['data_surat_ket_janda'] = $this->kode_kata($this->data['data_surat_ket_janda']);
            }
        }

        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info');
        }

        $this->data['v']['page'] = 'surat_ket_janda_lihat';
        $this->data['v']['script'] = 'surat_ket_janda_lihat';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
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
}
