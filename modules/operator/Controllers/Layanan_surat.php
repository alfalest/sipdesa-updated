<?php

namespace Operator\Controllers;

use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_surat_kelahiran;
use Operator\Models\Tbl_surat_kematian;
use Operator\Models\Tbl_surat_pengantar_nikah;
use Operator\Models\Tbl_surat_pemakaman;
use Operator\Models\Tbl_surat_catatan_kepolisian;
use Operator\Models\Tbl_surat_pencari_kerja;
use Operator\Models\Tbl_surat_belum_memiliki_rumah;
use Operator\Models\Tbl_surat_ket_tidak_mampu;
use Operator\Models\Tbl_surat_ket_janda;

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
    public $tbl_surat_ket_janda;

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
        $this->tbl_surat_ket_janda = new Tbl_surat_ket_janda();

        $this->cek_login([
            'tipe_user' => 2,
            'status_user' => 2,
            'email_verified' => 2
        ]);
    }
    public function index()
    {
        $query_surat_kelahiran = $this->tbl_surat_kelahiran->where(['status_surat_kelahiran' => 1])->get();
        $query_surat_pengantar_nikah = $this->tbl_surat_pengantar_nikah->where(['status_surat_pengantar_nikah' => 1])->get();
        $query_surat_kematian = $this->tbl_surat_kematian->where(['status_surat_kematian' => 1])->get();
        $query_surat_pemakaman = $this->tbl_surat_pemakaman->where(['status_surat_pemakaman' => 1])->get();
        $query_surat_catatan_kepolisian = $this->tbl_surat_catatan_kepolisian->where(['status_surat_catatan_kepolisian' => 1])->get();
        $query_surat_pencari_kerja = $this->tbl_surat_pencari_kerja->where(['status_surat_pencari_kerja' => 1])->get();
        $query_surat_belum_memiliki_rumah = $this->tbl_surat_belum_memiliki_rumah->where(['status_surat_belum_memiliki_rumah' => 1])->get();
        $query_surat_ket_tidak_mampu = $this->tbl_surat_ket_tidak_mampu->where(['status_surat_ket_tidak_mampu' => 1])->get();
        $query_surat_ket_janda = $this->tbl_surat_ket_janda->where(['status_surat_ket_janda' => 1])->get();

        $this->data['badge_notif']['surat_kelahiran'] = number_format(($query_surat_kelahiran->getNumRows()), 0, ",", ".");
        $this->data['badge_notif']['surat_pengantar_nikah'] = number_format(($query_surat_pengantar_nikah->getNumRows()), 0, ",", ".");
        $this->data['badge_notif']['surat_kematian'] = number_format(($query_surat_kematian->getNumRows()), 0, ",", ".");
        $this->data['badge_notif']['surat_pemakaman'] = number_format(($query_surat_pemakaman->getNumRows()), 0, ",", ".");
        $this->data['badge_notif']['surat_catatan_kepolisian'] = number_format(($query_surat_catatan_kepolisian->getNumRows()), 0, ",", ".");
        $this->data['badge_notif']['surat_pencari_kerja'] = number_format(($query_surat_pencari_kerja->getNumRows()), 0, ",", ".");
        $this->data['badge_notif']['surat_belum_memiliki_rumah'] = number_format(($query_surat_belum_memiliki_rumah->getNumRows()), 0, ",", ".");
        $this->data['badge_notif']['surat_ket_tidak_mampu'] = number_format(($query_surat_ket_tidak_mampu->getNumRows()), 0, ",", ".");
        $this->data['badge_notif']['surat_ket_janda'] = number_format(($query_surat_ket_janda->getNumRows()), 0, ",", ".");

        $this->data['v']['page'] = 'layanan_surat';
        $this->data['v']['script'] = 'layanan_surat';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }
}
