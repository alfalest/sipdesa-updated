<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Tbl_wilayah;
class Login extends BaseController
{
    public $tbl_wilayah;

    public function __construct()
    {
        
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_wilayah = $this->tbl_wilayah->konek();
    }

    public function index()
    {
        if($this->session->get('login_session') && isset($this->session->get('login_session')['id_user'])){
            return redirect()->to( base_url() );
            exit;
        }
        $input_name = [
            'email' => '',
            'password' => ''
        ];
        
        foreach ($input_name as $key => $value) {
            $this->data[$key] = ($this->session->getFlashdata($key)) ? $this->session->getFlashdata($key) : $value ;
        }

        if($this->session->getFlashdata('inp_val')){
            $this->data['inp_val'] = $this->session->getFlashdata('inp_val');
        }

        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        if ($this->session->getFlashdata('invalid_info')) {
            $this->data['invalid_info'] = $this->session->getFlashdata('invalid_info') ;
        }

        $this->data['v']['script'] = 'login';
        $this->data['v']['page'] = 'login';
        return view('App\Views\login_register', $this->data);
    }
}
