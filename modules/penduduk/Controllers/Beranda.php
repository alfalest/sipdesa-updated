<?php

namespace Penduduk\Controllers;

use App\Controllers\BaseController;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_perubahan_nik;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_surat_kelahiran;
use Penduduk\Models\Tbl_surat_kematian;
use Penduduk\Models\Tbl_surat_pengantar_nikah;
use Penduduk\Models\Tbl_surat_pemakaman;
use Penduduk\Models\Tbl_surat_catatan_kepolisian;
use Penduduk\Models\Tbl_surat_pencari_kerja;
use Penduduk\Models\Tbl_surat_belum_memiliki_rumah;
use Penduduk\Models\Tbl_surat_ket_tidak_mampu;
use Penduduk\Models\Tbl_surat_ket_janda;

use Penduduk\Models\Tbl_tiket;

class Beranda extends BaseController
{

    public $tbl_perubahan_kk;
    public $tbl_perubahan_nik;
    public $tbl_data_diri;
    public $tbl_surat_kelahiran;
    public $tbl_surat_kematian;
    public $tbl_surat_pengantar_nikah;
    public $tbl_surat_pemakaman;
    public $tbl_surat_pencari_kerja;
    public $tbl_surat_belum_memiliki_rumah;
    public $tbl_surat_catatan_kepolisian;
    public $tbl_surat_ket_tidak_mampu;
    public $tbl_surat_ket_janda;

    public $tbl_tiket;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_surat_kematian = new Tbl_surat_kematian();
        $this->tbl_surat_pemakaman = new Tbl_surat_pemakaman();
        $this->tbl_surat_catatan_kepolisian = new Tbl_surat_catatan_kepolisian();
        $this->tbl_surat_pengantar_nikah = new Tbl_surat_pengantar_nikah();
        $this->tbl_surat_pencari_kerja = new Tbl_surat_pencari_kerja();
        $this->tbl_surat_belum_memiliki_rumah = new Tbl_surat_belum_memiliki_rumah();
        $this->tbl_surat_ket_tidak_mampu = new Tbl_surat_ket_tidak_mampu();
        $this->tbl_surat_ket_janda = new Tbl_surat_ket_janda();

        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_tiket = new Tbl_tiket();
        $this->cek_login(['tipe_user' => 3, 'status_user' => 2, 'email_verified' => 2]);
    }
    public function index()
    {

        $id_user = 0;
        if (isset($this->session->get('login_session')['id_user'])) {
            $id_user = $this->session->get('login_session')['id_user'];
        }

        $query_perubahan_kk = $this->tbl_perubahan_kk->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_perubahan_kk = $query_perubahan_kk->getNumRows();

        $query_perubahan_nik = $this->tbl_perubahan_nik->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_perubahan_nik = $query_perubahan_nik->getNumRows();
        $this->data['badge_notif']['kependudukan'] = number_format(($jml_perubahan_kk + $jml_perubahan_nik), 0, ",", ".");

        // START LAYANAN SURAT

        $query_surat_kelahiran = $this->tbl_surat_kelahiran->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_kelahiran = $query_surat_kelahiran->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_kelahiran), 0, ",", ".");

        $query_surat_pengantar_nikah = $this->tbl_surat_pengantar_nikah->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_pengantar_nikah = $query_surat_pengantar_nikah->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_pengantar_nikah), 0, ",", ".");

        $query_surat_kematian = $this->tbl_surat_kematian->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_kematian = $query_surat_kematian->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_kematian), 0, ",", ".");

        $query_surat_pemakaman = $this->tbl_surat_pemakaman->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_pemakaman = $query_surat_pemakaman->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_pemakaman), 0, ",", ".");

        $query_surat_catatan_kepolisian = $this->tbl_surat_catatan_kepolisian->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_catatan_kepolisian = $query_surat_catatan_kepolisian->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_catatan_kepolisian), 0, ",", ".");

        $query_surat_belum_memiliki_rumah = $this->tbl_surat_belum_memiliki_rumah->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_belum_memiliki_rumah = $query_surat_belum_memiliki_rumah->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_belum_memiliki_rumah), 0, ",", ".");

        $query_surat_pencari_kerja = $this->tbl_surat_pencari_kerja->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_pencari_kerja = $query_surat_pencari_kerja->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_pencari_kerja), 0, ",", ".");

        $query_surat_ket_tidak_mampu = $this->tbl_surat_ket_tidak_mampu->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_ket_tidak_mampu = $query_surat_ket_tidak_mampu->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_ket_tidak_mampu), 0, ",", ".");

        $query_surat_ket_janda = $this->tbl_surat_ket_janda->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_ket_janda = $query_surat_ket_janda->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_ket_janda), 0, ",", ".");

        // END LAYANAN SURAT

        $query_tiket_undangan = $this->tbl_tiket->where(['status_tiket' =>  1, 'id_user' => $id_user])->get();
        $jml_tiket_undangan = $query_tiket_undangan->getNumRows();
        $this->data['badge_notif']['tiket_undangan'] = number_format(($jml_tiket_undangan), 0, ",", ".");

        $query_data_diri = $this->tbl_data_diri->where(['id_user' =>  $id_user])->get();
        $jml_data_diri = $query_data_diri->getNumRows();
        $this->data['badge_notif']['data_diri'] = number_format(($jml_data_diri), 0, ",", ".");

        $this->data['v']['page'] = 'beranda';
        $this->data['v']['script'] = 'beranda';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
    }
}
