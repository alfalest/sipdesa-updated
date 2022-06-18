<?php

namespace Penduduk\Controllers;
use App\Controllers\BaseController;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_perubahan_nik;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_surat_kelahiran;   
use Penduduk\Models\Tbl_tiket;             
class Dalam_pengembangan extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_perubahan_nik;
    public $tbl_data_diri;
    public $tbl_surat_kelahiran;
    public $tbl_tiket;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_tiket = new Tbl_tiket();
        $this->cek_login(['tipe_user' => 3, 'status_user' => 2, 'email_verified' => 2]);
    }
    public function index()
    {

        $id_user = 0;
        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

        $query_perubahan_kk = $this->tbl_perubahan_kk->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_perubahan_kk = $query_perubahan_kk->getNumRows();
        $query_perubahan_nik = $this->tbl_perubahan_nik->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_perubahan_nik = $query_perubahan_nik->getNumRows();
        $this->data['badge_notif']['kependudukan'] = number_format(($jml_perubahan_kk + $jml_perubahan_nik),0,",",".");
        
        $query_surat_kelahiran = $this->tbl_surat_kelahiran->where(['belum_dilihat' => 1])->get();
        $jml_surat_kelahiran = $query_surat_kelahiran->getNumRows();
        $this->data['badge_notif']['layanan_surat'] = number_format(($jml_surat_kelahiran),0,",",".");

        $query_tiket_undangan = $this->tbl_tiket->where(['status_tiket' =>  1])->get();
        $jml_tiket_undangan = $query_tiket_undangan->getNumRows();
        $this->data['badge_notif']['tiket_undangan'] = number_format(($jml_tiket_undangan),0,",",".");

        $query_data_diri = $this->tbl_data_diri->where(['id_user' =>  $id_user])->get();
        $jml_data_diri = $query_data_diri->getNumRows();
        $this->data['badge_notif']['data_diri'] = number_format(($jml_data_diri),0,",",".");


        $this->data['v']['page'] = 'dalam_pengembangan';
        $this->data['v']['script'] = 'dalam_pengembangan';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
    }
}
