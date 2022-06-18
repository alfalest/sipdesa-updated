<?php

namespace Penduduk\Controllers;
use App\Controllers\BaseController;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_perubahan_nik;
use Config\Paths;
class Kependudukan extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_perubahan_nik;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->cek_login(['tipe_user' => 3,
        'status_user' => 2,
        'email_verified' => 2]);
    }

    public function index()
    {
        $id_user = 0;
        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

        $query_perubahan_kk = $this->tbl_perubahan_kk->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_perubahan_kk = $query_perubahan_kk->getNumRows();
        $this->data['badge_notif']['perubahan_kk'] = number_format(($jml_perubahan_kk),0,",",".");

        $query_perubahan_nik = $this->tbl_perubahan_nik->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_perubahan_nik = $query_perubahan_nik->getNumRows();
        $this->data['badge_notif']['perubahan_nik'] = number_format(($jml_perubahan_nik),0,",",".");

        $this->data['v']['page'] = 'kependudukan';
        $this->data['v']['script'] = 'kependudukan';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
    }
}
