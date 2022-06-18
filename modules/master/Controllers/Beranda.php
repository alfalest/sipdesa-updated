<?php

namespace Master\Controllers;
use App\Controllers\BaseController;

class Beranda extends BaseController
{
    public function __construct()
    {
        $this->cek_login(['tipe_user' => 1, 'status_user' => 2, 'email_verified' => 2]);
        
    }
    public function index()
    {
        
        $this->data['v']['page'] = 'beranda';
        $this->data['v']['script'] = 'beranda';
        $this->data['v']['footer'] = '';
        return view('Master\Views\dashboard_sidebar', $this->data);
    }
}
