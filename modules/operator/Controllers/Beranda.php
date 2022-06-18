<?php

namespace Operator\Controllers;

use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_perubahan_nik;
use Operator\Models\Tbl_surat_kelahiran;
use Operator\Models\Tbl_surat_kematian;
use Operator\Models\Tbl_surat_pengantar_nikah;
use Operator\Models\Tbl_surat_pemakaman;
use Operator\Models\Tbl_surat_catatan_kepolisian;
use Operator\Models\Tbl_surat_pencari_kerja;
use Operator\Models\Tbl_surat_belum_memiliki_rumah;
use Operator\Models\Tbl_surat_ket_tidak_mampu;
use Operator\Models\Tbl_surat_ket_janda;

use Operator\Models\Tbl_tiket;

class Beranda extends BaseController
{

    public $tbl_perubahan_kk;
    public $tbl_perubahan_nik;
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


        $this->tbl_tiket = new Tbl_tiket();
        $this->cek_login(['tipe_user' => 2, 'status_user' => 2, 'email_verified' => 2]);
    }
    public function index()
    {
        $jml_layanan_surat = 0;
        $jml_kependudukan = 0;

        $query_perubahan_kk = $this->tbl_perubahan_kk->where(['status_perubahan_kk' => 1])->get();
        $jml_kependudukan += $query_perubahan_kk->getNumRows();

        $query_perubahan_nik = $this->tbl_perubahan_nik->where(['status_perubahan_nik' => 1])->get();
        $jml_kependudukan += $query_perubahan_nik->getNumRows();

        // START LAYANAN SURAT
        $query_surat_kelahiran = $this->tbl_surat_kelahiran->where(['status_surat_kelahiran' => 1])->get();
        $jml_layanan_surat += $query_surat_kelahiran->getNumRows();

        $query_surat_pengantar_nikah = $this->tbl_surat_pengantar_nikah->where(['status_surat_pengantar_nikah' => 1])->get();
        $jml_layanan_surat += $query_surat_pengantar_nikah->getNumRows();

        $query_surat_kematian = $this->tbl_surat_kematian->where(['status_surat_kematian' => 1])->get();
        $jml_layanan_surat += $query_surat_kematian->getNumRows();

        $query_surat_pemakaman = $this->tbl_surat_pemakaman->where(['status_surat_pemakaman' => 1])->get();
        $jml_layanan_surat += $query_surat_pemakaman->getNumRows();

        $query_surat_catatan_kepolisian = $this->tbl_surat_catatan_kepolisian->where(['status_surat_catatan_kepolisian' => 1])->get();
        $jml_layanan_surat += $query_surat_catatan_kepolisian->getNumRows();

        $query_surat_belum_memiliki_rumah = $this->tbl_surat_belum_memiliki_rumah->where(['status_surat_belum_memiliki_rumah' => 1])->get();
        $jml_layanan_surat += $query_surat_belum_memiliki_rumah->getNumRows();

        $query_surat_pencari_kerja = $this->tbl_surat_pencari_kerja->where(['status_surat_pencari_kerja' => 1])->get();
        $jml_layanan_surat += $query_surat_pencari_kerja->getNumRows();

        $query_surat_ket_tidak_mampu = $this->tbl_surat_ket_tidak_mampu->where(['status_surat_ket_tidak_mampu' => 1])->get();
        $jml_layanan_surat += $query_surat_ket_tidak_mampu->getNumRows();

        $query_surat_ket_janda = $this->tbl_surat_ket_janda->where(['status_surat_ket_janda' => 1])->get();
        $jml_layanan_surat += $query_surat_ket_janda->getNumRows();

        //END LAYANAN SURAT

        $query_tiket_undangan = $this->tbl_tiket->where(['status_tiket' =>  1, 'tanggal_kunjungan_tiket' => date('Y-m-d')])->get();
        $jml_tiket_undangan = $query_tiket_undangan->getNumRows();

        $this->data['badge_notif']['kependudukan'] = number_format(($jml_kependudukan), 0, ",", ".");
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_layanan_surat), 0, ",", ".");
        $this->data['badge_notif']['tiket_undangan'] = number_format(($jml_tiket_undangan), 0, ",", ".");

        $this->data['v']['page'] = 'beranda';
        $this->data['v']['script'] = 'beranda';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }
}
