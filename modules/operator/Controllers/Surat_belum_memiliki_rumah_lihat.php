<?php

namespace Operator\Controllers;

use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_kode_kata;
use Operator\Models\Tbl_wilayah;
use Operator\Models\Tbl_negara;
use Operator\Models\Tbl_user;
use Operator\Models\Tbl_data_diri;
use Operator\Models\Tbl_surat_belum_memiliki_rumah;
use Config\Paths;

class Surat_belum_memiliki_rumah_lihat extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_wilayah;
    public $tbl_negara;
    public $tbl_user;
    public $tbl_data_diri;
    public $tbl_surat_belum_memiliki_rumah;
    public $tbl_kode_kata;
    public $list_kode_kata;
    public $arr_postfix;
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
        $this->tbl_user = new Tbl_user();
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_surat_belum_memiliki_rumah = new Tbl_surat_belum_memiliki_rumah();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->list_kode_kata = [
            'jenis_kelamin',
            'agama',
            'jenis_pekerjaan',
            'status_perkawinan',
            'gol_darah'
        ];
        $this->arr_postfix = ['_anak' => 'Anak', '_ayah' => 'Ayah', '_ibu' => 'Ibu', '_belum_memiliki_rumah' => 'Belum Memiliki Rumah'];
    }

    public function index($param = '')
    {

        //ambil kode kata untuk membuat option
        //ambil kode kata untuk membuat option

        //ambil data id user dari session
        $id_user = 0;
        if (isset($this->session->get('login_session')['id_user'])) {
            $id_user = $this->session->get('login_session')['id_user'];
        }

        //ambil data user dari database
        $data_surat_belum_memiliki_rumah = [];

        if ($param != '' && $id_user) {
            $data_surat_belum_memiliki_rumah = $this->tbl_surat_belum_memiliki_rumah->where(['id_surat_belum_memiliki_rumah' => intval($param)])->first();
        }

        if ($data_surat_belum_memiliki_rumah) {
            $this->data['data_surat_belum_memiliki_rumah'] = $data_surat_belum_memiliki_rumah;

            if (isset($this->data['data_surat_belum_memiliki_rumah']['id_user'])) {
                $this->data['data_user_pemohon'] = $this->tbl_user->where(['id_user' => $this->data['data_surat_belum_memiliki_rumah']['id_user']])->first();
                $this->data['data_diri_pemohon'] = $this->tbl_data_diri->where(['id_user' => $this->data['data_surat_belum_memiliki_rumah']['id_user']])->first();

                if ($this->data['data_diri_pemohon']) {
                    $this->data['data_diri_pemohon'] = $this->kode_kata($this->data['data_diri_pemohon']);
                    $this->data['data_diri_pemohon'] = $this->negara($this->data['data_diri_pemohon']);
                    $this->data['data_diri_pemohon'] = $this->wilayah($this->data['data_diri_pemohon']);
                }
            }
        } else {
            return redirect()->to(base_url() . '/operator/surat-belum-memiliki-rumah');
        }

        if (!isset($this->data['data_surat_belum_memiliki_rumah']['link_foto_kk']) || $this->data['data_surat_belum_memiliki_rumah']['link_foto_kk'] == '') {
            if (isset($data_surat_belum_memiliki_rumah['link_foto_kk'])) {
                $this->data['data_surat_belum_memiliki_rumah']['link_foto_kk'] = $data_surat_belum_memiliki_rumah['link_foto_kk'];
            }
        }

        //ambil data wilayah untuk membuat option
        if (isset($this->data['data_surat_belum_memiliki_rumah'])) {
            foreach ($this->arr_postfix as $key => $value) {
                $this->data['data_surat_belum_memiliki_rumah'] = $this->wilayah($this->data['data_surat_belum_memiliki_rumah'], $key);
                $this->data['data_surat_belum_memiliki_rumah'] = $this->kode_kata($this->data['data_surat_belum_memiliki_rumah'], $key);
                $this->data['data_surat_belum_memiliki_rumah'] = $this->negara($this->data['data_surat_belum_memiliki_rumah'], $key);
                $this->data['data_surat_belum_memiliki_rumah'] = $this->kode_kata($this->data['data_surat_belum_memiliki_rumah']);
            }
        }

        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info');
        }

        $this->data['v']['page'] = 'surat_belum_memiliki_rumah_lihat';
        $this->data['v']['script'] = 'surat_belum_memiliki_rumah_lihat';
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
}
