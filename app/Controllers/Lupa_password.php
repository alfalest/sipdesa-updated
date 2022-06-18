<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Tbl_user;
use App\Models\Tbl_wilayah;
class Lupa_password extends BaseController
{
    public $tbl_wilayah;
    public $tbl_user;

    public function __construct()
    {
        $this->tbl_user = new Tbl_user();
    }

    public function index()
    {


        if($this->session->getFlashdata('inp_val')){
            $this->data['data_input'] = $this->session->getFlashdata('inp_val');
        }

        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        if ($this->session->getFlashdata('invalid_info')) {
            $this->data['invalid_info'] = $this->session->getFlashdata('invalid_info') ;
        }

        $this->data['v']['page'] = 'lupa_password';
        $this->data['v']['script'] = 'lupa_password';
        return view('App\Views\login_register', $this->data);
    }
}
