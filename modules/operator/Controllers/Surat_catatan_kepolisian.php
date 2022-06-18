<?php

namespace Operator\Controllers;

use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_surat_catatan_kepolisian;
use Operator\Models\Tbl_informasi_layanan;
use Config\Paths;

class Surat_catatan_kepolisian extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_surat_catatan_kepolisian;
    public $tbl_informasi_layanan;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_catatan_kepolisian = new Tbl_surat_catatan_kepolisian();
        $this->tbl_informasi_layanan = new Tbl_informasi_layanan();
        $this->cek_login([
            'tipe_user' => 2,
            'status_user' => 2,
            'email_verified' => 2
        ]);
    }

    public function index($param = '')
    {
        $data_kk = [];
        $id_user = 0;

        $this->get = $this->request->getGet();
        $urutan = "ASC";
        switch ($param) {
            case 'diproses':
                $status_perubahan = 1;
                break;
            case 'diterima':
                $status_perubahan = 2;
                $urutan = "DESC";
                break;
            case 'ditolak':
                $status_perubahan = 3;
                $urutan = "DESC";
                break;
            default:
                $status_perubahan = 1;
                break;
        }

        if (isset($this->session->get('login_session')['id_user'])) {
            $id_user = $this->session->get('login_session')['id_user'];
        }

        $per_page = 5;
        if (isset($this->get['cari']) && $this->get['cari'] != '') {
            $this->data['inp_val']['cari'] = $this->get['cari'];

            $this->data['kk_proses'] = $this->tbl_surat_catatan_kepolisian->where(['status_surat_catatan_kepolisian' => $status_perubahan])
                ->like('nama_catatan_kepolisian', $this->get['cari'])
                ->orderBy("update_time", "ASC")
                ->paginate($per_page, 'sk');
        } else {
            $this->data['kk_proses'] = $this->tbl_surat_catatan_kepolisian->where(['status_surat_catatan_kepolisian' => $status_perubahan])->orderBy("update_time", $urutan)->paginate($per_page, 'sk');
        }

        $data_informasi_layanan = $this->tbl_informasi_layanan->where(['jenis_informasi' => 'surat_keterangan_catatan_kepolisian', 'default_informasi' => 1])->first();
        if ($data_informasi_layanan) {
            $this->data['data_informasi_layanan'] = $data_informasi_layanan;
        } else {
            $data_informasi_layanan = $this->tbl_informasi_layanan->where(['jenis_informasi' => 'surat_keterangan_catatan_kepolisian'])->first();
            if ($data_informasi_layanan) {
                $this->data['data_informasi_layanan'] = $data_informasi_layanan;
            }
        }

        // $this->data['kk_diterima'] = $this->tbl_surat_catatan_kepolisian->where(['status_perubahan_kk' => 2, 'id_user' => $id_user])->paginate(1, 'kk_diterima');
        // $this->data['kk_ditolak'] = $this->tbl_surat_catatan_kepolisian->where(['status_perubahan_kk' => 3, 'id_user' => $id_user])->paginate(1, 'kk_ditolak');

        $this->data['tipedata_session'] = 'No Data';
        if ($this->session->get('tipedata_session')) {
            $tipedata_session = $this->session->get('tipedata_session');
            if (is_array($tipedata_session)) {
                $this->data['tipedata_session'] = 'Is Array Data';
            } else {
                $this->data['tipedata_session'] = 'Not Array Data';
            }
        }
        $this->data['pager'] = $this->tbl_surat_catatan_kepolisian->pager;

        $this->data['v']['page'] = 'surat_catatan_kepolisian';
        $this->data['v']['script'] = 'surat_catatan_kepolisian';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }
}
