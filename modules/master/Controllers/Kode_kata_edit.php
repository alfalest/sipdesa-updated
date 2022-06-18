<?php

namespace Master\Controllers;
use App\Controllers\BaseController;
use App\models\Tbl_kode_kata;

class Kode_kata_edit extends BaseController
{
    public $tbl_kode_kata;
    public function __construct()
    {
        $this->cek_login(['tipe_user' => 1, 'status_user' => 2, 'email_verified' => 2]);
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_kode_kata = $this->tbl_kode_kata->konek();
        helper('Date_helper');
    }
    public function index($param = '')
    {
        $kode_kata = [
            'id_kode_kata' => '',
            'nomor_kode' => '',
            'grup_kata' => '',
            'tampilan_kata' => ''
        ];
        $db_kode_kata = [];
        $this->data['inp_val'] = [];
        if(isset($param) && $param != ''){
            $db_kode_kata = $this->tbl_kode_kata->ambil_satu(['id_kode_kata' => $param]);
            if($db_kode_kata != null){
                $this->data['inp_val'] = $db_kode_kata;
                foreach ($kode_kata as $key => $value) {
                    $kode_kata[$key] = $db_kode_kata[$key];
                }
                $this->data['show']['delete_button'] = 'delete_button';
            } else {
                return redirect()->to( base_url().'/master/kode-kata');
                exit;
            }
        }

        
        $inp_val = $this->session->getFlashdata('inp_val');
        if($inp_val){
            foreach ($kode_kata as $key => $value) {
                $this->data['inp_val'][$key] = (isset($inp_val[$key])) ? $inp_val[$key] : $value ;
            }
        }
        
        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        
        $this->data['v']['page'] = 'kode_kata_edit';
        $this->data['v']['script'] = 'kode_kata_edit';
        $this->data['v']['footer'] = '';
        return view('Master\Views\dashboard_sidebar', $this->data);
    }
}
