<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Tbl_user;
use App\Models\Tbl_wilayah;
class Ganti_password extends BaseController
{
    public $tbl_wilayah;
    public $tbl_user;

    public function __construct()
    {
        $this->tbl_user = new Tbl_user();
    }

    public function index($param = '')
    {

        $db_user =  []; 
        if($param != ''){
            $db_user = $this->tbl_user->where(['token' => $param])->first();
            if($db_user){
                $this->data['data_input']['token'] = $param;
            } else {
                return redirect()->to( base_url());
                exit;
            }
        } else {
            return redirect()->to( base_url());
            exit;
        }

        if($this->session->getFlashdata('inp_val')){
            $this->data['data_input'] = $this->session->getFlashdata('inp_val');
        }

        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        if ($this->session->getFlashdata('invalid_info')) {
            $this->data['invalid_info'] = $this->session->getFlashdata('invalid_info') ;
        }

        $this->data['v']['page'] = 'ganti_password';
        $this->data['v']['script'] = 'ganti_password';
        return view('App\Views\login_register', $this->data);
    }
}
