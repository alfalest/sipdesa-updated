<?php

namespace Penduduk\Controllers;

use App\Controllers\BaseController;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_surat_ket_tidak_mampu;
use Penduduk\Models\Tbl_informasi_layanan;
use Config\Paths;

class Surat_ket_tidak_mampu extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_surat_ket_tidak_mampu;
    public $tbl_informasi_layanan;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_ket_tidak_mampu = new Tbl_surat_ket_tidak_mampu();
        $this->tbl_informasi_layanan = new Tbl_informasi_layanan();
        $this->cek_login([
            'tipe_user' => 3,
            'status_user' => 2,
            'email_verified' => 2
        ]);
    }

    public function index($param = '')
    {
        $data_kk = [];
        $id_user = 0;

        switch ($param) {
            case 'diproses':
                $status_perubahan = 1;
                $this->data['status_state'] = 1;
                break;
            case 'diterima':
                $status_perubahan = 2;
                $this->data['status_state'] = 2;
                break;
            case 'ditolak':
                $status_perubahan = 3;
                $this->data['status_state'] = 3;
                break;
            default:
                $status_perubahan = 1;
                $this->data['status_state'] = 1;
                break;
        }

        if (isset($this->session->get('login_session')['id_user'])) {
            $id_user = $this->session->get('login_session')['id_user'];
        }

        $this->data['kk_proses'] = $this->tbl_surat_ket_tidak_mampu->where(['status_surat_ket_tidak_mampu' => $status_perubahan, 'id_user' => $id_user])->orderBy("update_time", "DESC")->paginate(5, 'sk');

        $data_informasi_layanan = $this->tbl_informasi_layanan->where(['jenis_informasi' => 'surat_keterangan_tidak_mampu', 'default_informasi' => 1])->first();
        if ($data_informasi_layanan) {
            $this->data['data_informasi_layanan'] = $data_informasi_layanan;
        } else {
            $data_informasi_layanan = $this->tbl_informasi_layanan->where(['jenis_informasi' => 'surat_keterangan_tidak_mampu'])->first();
            if ($data_informasi_layanan) {
                $this->data['data_informasi_layanan'] = $data_informasi_layanan;
            }
        }

        // $this->data['kk_diterima'] = $this->Tbl_surat_ket_tidak_mampu->where(['status_perubahan_kk' => 2, 'id_user' => $id_user])->paginate(1, 'kk_diterima');
        // $this->data['kk_ditolak'] = $this->Tbl_surat_ket_tidak_mampu->where(['status_perubahan_kk' => 3, 'id_user' => $id_user])->paginate(1, 'kk_ditolak');

        $this->data['tipedata_session'] = 'No Data';
        if ($this->session->get('tipedata_session')) {
            $tipedata_session = $this->session->get('tipedata_session');
            if (is_array($tipedata_session)) {
                $this->data['tipedata_session'] = 'Is Array Data';
            } else {
                $this->data['tipedata_session'] = 'Not Array Data';
            }
        }
        $this->data['pager'] = $this->tbl_surat_ket_tidak_mampu->pager;

        $this->data['v']['page'] = 'surat_ket_tidak_mampu';
        $this->data['v']['script'] = 'surat_ket_tidak_mampu';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
    }
}
