<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_perubahan_nik;
use Config\Paths;
class Kependudukan extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_perubahan_nik;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->cek_login(['tipe_user' => 2,
        'status_user' => 2,
        'email_verified' => 2]);
    }

    public function index()
    {
        $query_kk = $this->tbl_perubahan_kk->where(['status_perubahan_kk' => 1])->get();
        $this->data['badge_notif']['kk_proses'] = number_format(($query_kk->getNumRows()),0,",",".");

        $query_nik = $this->tbl_perubahan_nik->where(['status_perubahan_nik' => 1])->get();
        $this->data['badge_notif']['nik_proses'] = number_format(($query_nik->getNumRows()),0,",",".");

        $this->data['v']['page'] = 'kependudukan';
        $this->data['v']['script'] = 'kependudukan';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }
}
