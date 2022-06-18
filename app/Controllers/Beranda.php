<?php

namespace App\Controllers;
use App\Models\Tbl_wilayah;
use Config\Paths;
class Beranda extends BaseController
{
    public $tbl_wilayah;

    public function __construct()
    {
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_wilayah = $this->tbl_wilayah->konek();
    }

    public function index()
    {
        if($this->session->get('login_session') && $this->session->get('login_session')['tipe_user']){
            switch ($this->session->get('login_session')['tipe_user']) {
                case 1:
                    header("Location: " . base_url().'/master');
                    exit;
                    break;
                case 2:
                    header("Location: " . base_url().'/operator');
                    exit;
                    break;
                case 3:
                    header("Location: " . base_url().'/penduduk');
                    exit;
                    break;
                default:
                    header("Location: " . base_url().'/login');
                    exit;
                    break;
            }
        } else {
            header("Location: " . base_url().'/login');
            exit;
        }
    }
}
