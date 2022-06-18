<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Tbl_wilayah;
class Logout extends BaseController
{
    public $tbl_wilayah;

    public function __construct()
    {
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_wilayah = $this->tbl_wilayah->konek();
    }

    public function index()
    {    
        if($this->session->get('login_session')){
            $this->session->remove('login_session');
        }
        return redirect()->to( base_url().'/login');    
    }

    public function logout()
    {    
        $session = \Config\Services::session();
        if($session->get('login_session')){
            $session->remove('login_session');
        }
    }
}
