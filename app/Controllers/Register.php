<?php

namespace App\Controllers;

use Master\Models\Tbl_template_email;
use App\Controllers\BaseController;
use App\Models\Tbl_user;

class Register extends BaseController
{
    public $tbl_user;


    public function __construct()
    {
        $this->tbl_user = new Tbl_user();
    }

    public function index()
    {

        $this->data['post'] = $this->post;
        $input_name = [
            'nama_alias' => '',
            'email' => '',
            'password' => ''
        ];
        
        foreach ($input_name as $key => $value) {
            $this->data[$key] = ($this->session->getFlashdata($key)) ? $this->session->getFlashdata($key) : $value ;
        }


        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        $this->data['v']['page'] = 'register';
        $this->data['v']['script'] = 'register';
        return view('App\Views\login_register', $this->data);
    }
}
