<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_perubahan_nik;
use Operator\Models\Tbl_surat_kelahiran;   
use Operator\Models\Tbl_tiket;             
class Dalam_pengembangan extends BaseController
{

    public $tbl_perubahan_kk;
    public $tbl_perubahan_nik;
    public $tbl_surat_kelahiran;
    public $tbl_tiket;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_tiket = new Tbl_tiket();
        $this->cek_login(['tipe_user' => 2, 'status_user' => 2, 'email_verified' => 2]);
    }
    public function index()
    {
        $query_perubahan_kk = $this->tbl_perubahan_kk->where(['status_perubahan_kk' => 1])->get();
        $jml_perubahan_kk = $query_perubahan_kk->getNumRows();

        $query_perubahan_nik = $this->tbl_perubahan_nik->where(['status_perubahan_nik' => 1])->get();
        $jml_perubahan_nik = $query_perubahan_nik->getNumRows();
        
        $query_surat_kelahiran = $this->tbl_surat_kelahiran->where(['status_surat_kelahiran' => 1])->get();
        $jml_surat_kelahiran = $query_surat_kelahiran->getNumRows();

        $query_tiket_undangan = $this->tbl_tiket->where(['status_tiket' =>  1 , 'tanggal_kunjungan_tiket' => date('Y-m-d')])->get();
        $jml_tiket_undangan = $query_tiket_undangan->getNumRows();

        $this->data['badge_notif']['kependudukan'] = number_format(($jml_perubahan_kk + $jml_perubahan_nik),0,",",".");
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_kelahiran),0,",",".");
        $this->data['badge_notif']['tiket_undangan'] = number_format(($jml_tiket_undangan),0,",",".");

        $this->data['v']['page'] = 'dalam_pengembangan';
        $this->data['v']['script'] = 'dalam_pengembangan';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }
}
