<?php

namespace Master\Controllers;
use App\Controllers\BaseController;
use Master\Models\Tbl_kode_kata;
use Config\Autoload;

class Kode_kata extends BaseController
{
    public $tbl_kode_kata;
    public $autoload;
    public $config;
    public function __construct()
    {
        $this->autoload = new Autoload();
        $this->cek_login(['tipe_user' => 1, 'status_user' => 2, 'email_verified' => 2]);
        $this->tbl_kode_kata = new Tbl_kode_kata();
        //$this->tbl_kode_kata = $this->tbl_kode_kata->konek();
        
    }
    public function index($param = '')
    {
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $query_param = [];
        $this->data['inp_val'] = [];
        $start_page = false;
   
        if(isset($this->get['page_kode_kata']) && $this->get['page_kode_kata'] != ''){
            $this->data['halaman_ini'] = intval($this->get['page_kode_kata']);
        } else {
            $this->data['halaman_ini'] = 1;
        }


        $this->get = $this->request->getGet();

        $per_page = 5;
        $this->data['item_per_page'] = $per_page;
        if(isset($this->get['cari']) && $this->get['cari'] != ''){
            $this->data['inp_val']['cari'] = $this->get['cari'];
            $query_kode_kata = $this->tbl_kode_kata->like('tampilan_kata', $this->get['cari'])
                ->orLike('grup_kata', $this->get['cari'])
                ->orLike('nomor_kode', $this->get['cari'])
                ->get();

            $this->data['kode_kata'] = $this->tbl_kode_kata->like('tampilan_kata', $this->get['cari'])
                ->orLike('grup_kata', $this->get['cari'])
                ->orLike('nomor_kode', $this->get['cari'])
                ->paginate($per_page, 'kode_kata');
                
        } else {
            $query_kode_kata = $this->tbl_kode_kata->get();
            $this->data['kode_kata'] = $this->tbl_kode_kata->paginate($per_page, 'kode_kata');
        }

        if(count($this->data['kode_kata']) != 0){
            $this->data['pager'] = $this->tbl_kode_kata->pager;
        }

        //$this->data['kode_kata'] = $this->tbl_kode_kata->ambil($query_param);

        $this->data['jml_ditemukan'] = $query_kode_kata->getNumRows();
        $query_ditermukan_kode_kata = $this->tbl_kode_kata->get();
        $this->data['jml_semua'] = $query_ditermukan_kode_kata->getNumRows();

        //$this->tbl_kode_kata->pager->links('default', 'sipdesa_pager');
        $this->data['config_pager'] = json_encode($this->config);
        
        $this->data['v']['page'] = 'kode_kata';
        $this->data['v']['script'] = 'kode_kata';
        $this->data['v']['footer'] = '';
        return view('Master\Views\dashboard_sidebar', $this->data);
    }
}
