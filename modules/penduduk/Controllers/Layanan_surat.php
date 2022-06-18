<?php

namespace Penduduk\Controllers;

use App\Controllers\BaseController;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_surat_kelahiran;
use Penduduk\Models\Tbl_surat_kematian;
use Penduduk\Models\Tbl_surat_pengantar_nikah;
use Penduduk\Models\Tbl_surat_pemakaman;
use Penduduk\Models\Tbl_surat_catatan_kepolisian;
use Penduduk\Models\Tbl_surat_pencari_kerja;
use Penduduk\Models\Tbl_surat_belum_memiliki_rumah;
use Penduduk\Models\Tbl_surat_ket_tidak_mampu;
use Config\Paths;

class Layanan_surat extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_surat_kelahiran;
    public $tbl_surat_kematian;
    public $tbl_surat_pengantar_nikah;
    public $tbl_surat_pemakaman;
    public $tbl_surat_catatan_kepolisian;
    public $tbl_surat_pencari_kerja;
    public $tbl_surat_belum_memiliki_rumah;
    public $tbl_surat_ket_tidak_mampu;

    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_surat_kematian = new Tbl_surat_kematian();
        $this->tbl_surat_pemakaman = new Tbl_surat_pemakaman();
        $this->tbl_surat_catatan_kepolisian = new Tbl_surat_catatan_kepolisian();
        $this->tbl_surat_pengantar_nikah = new Tbl_surat_pengantar_nikah();
        $this->tbl_surat_pencari_kerja = new Tbl_surat_pencari_kerja();
        $this->tbl_surat_belum_memiliki_rumah = new Tbl_surat_belum_memiliki_rumah();
        $this->tbl_surat_ket_tidak_mampu = new Tbl_surat_ket_tidak_mampu();

        $this->cek_login([
            'tipe_user' => 3,
            'status_user' => 2,
            'email_verified' => 2
        ]);
    }

    public function index()
    {
        $id_user = 0;
        if (isset($this->session->get('login_session')['id_user'])) {
            $id_user = $this->session->get('login_session')['id_user'];
        }

        $query_surat_kelahiran = $this->tbl_surat_kelahiran->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_kelahiran = $query_surat_kelahiran->getNumRows();
        $this->data['badge_notif']['surat_kelahiran'] = number_format(($jml_surat_kelahiran), 0, ",", ".");

        $query_surat_pengantar_nikah = $this->tbl_surat_pengantar_nikah->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_pengantar_nikah = $query_surat_pengantar_nikah->getNumRows();
        $this->data['badge_notif']['surat_pengantar_nikah'] = number_format(($query_surat_pengantar_nikah->getNumRows()), 0, ",", ".");

        $query_surat_pemakaman = $this->tbl_surat_pemakaman->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_pemakaman = $query_surat_pemakaman->getNumRows();
        $this->data['badge_notif']['surat_pemakaman'] = number_format(($query_surat_pemakaman->getNumRows()), 0, ",", ".");

        $query_surat_catatan_kepolisian = $this->tbl_surat_catatan_kepolisian->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_catatan_kepolisian = $query_surat_catatan_kepolisian->getNumRows();
        $this->data['badge_notif']['surat_catatan_kepolisian'] = number_format(($query_surat_catatan_kepolisian->getNumRows()), 0, ",", ".");

        $query_surat_pencari_kerja = $this->tbl_surat_pencari_kerja->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_pencari_kerja = $query_surat_pencari_kerja->getNumRows();
        $this->data['badge_notif']['surat_pencari_kerja'] = number_format(($query_surat_pencari_kerja->getNumRows()), 0, ",", ".");


        $query_surat_belum_memiliki_rumah = $this->tbl_surat_belum_memiliki_rumah->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_belum_memiliki_rumah = $query_surat_belum_memiliki_rumah->getNumRows();
        $this->data['badge_notif']['surat_belum_memiliki_rumah'] = number_format(($query_surat_belum_memiliki_rumah->getNumRows()), 0, ",", ".");

        $query_surat_ket_tidak_mampu = $this->tbl_surat_ket_tidak_mampu->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_ket_tidak_mampu = $query_surat_ket_tidak_mampu->getNumRows();
        $this->data['badge_notif']['surat_ket_tidak_mampu'] = number_format(($jml_surat_ket_tidak_mampu), 0, ",", ".");

        $query_surat_kematian = $this->tbl_surat_kematian->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_kematian = $query_surat_kematian->getNumRows();
        $this->data['badge_notif']['surat_kematian'] = number_format(($query_surat_kematian->getNumRows()), 0, ",", ".");


        $this->data['v']['page'] = 'layanan_surat';
        $this->data['v']['script'] = 'layanan_surat';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
    }
}
