<?php

namespace Penduduk\Controllers;
use App\Controllers\BaseController;
use Penduduk\Models\Tbl_perubahan_kk;
use Penduduk\Models\Tbl_surat_kelahiran;
use Config\Paths;
class Setting_akun extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_surat_kelahiran;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
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

        $query_surat_kelahiran = $this->tbl_surat_kelahiran->where(['belum_dilihat' => 1, 'id_user' => $id_user])->get();
        $jml_surat_kelahiran = $query_surat_kelahiran->getNumRows();
        $this->data['badge_notif']['surat_kelahiran'] = number_format(($jml_surat_kelahiran),0,",",".");

        $this->data['v']['page'] = 'setting_akun';
        $this->data['v']['script'] = 'setting_akun';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
    }
}

