<?php

namespace Master\Controllers;
use App\Controllers\BaseController;
use Master\Models\Tbl_perubahan_kk;
use Master\Models\Tbl_perubahan_nik;
use Master\Models\Tbl_template_dokumen;
use Config\Paths;
class Template_dokumen extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_perubahan_nik;
    public $tbl_template_dokumen;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->tbl_template_dokumen = new Tbl_template_dokumen();
        $this->cek_login(['tipe_user' => 1,
        'status_user' => 2,
        'email_verified' => 2]);
        helper('Ganti_teks_helper');

    }

    public function index($param = '')
    {
        $this->get = $this->request->getGet();
        $available_template = [
            'surat-keterangan-kelahiran' => 'surat_keterangan_kelahiran'
        ];

        if($param != '' ){
            if(isset(nama_teks()[str_replace('-', '_', $param)])){
                $this->data['title_page'] = ucwords(str_replace( '-' , ' ',  $param));
                $this->data['link_edit'] = 'template-dokumen-edit/'.$param;
                $this->data['link_back'] = 'template-dokumen/'.$param;
                $this->data['link_lihat'] = 'template-dokumen-lihat/'.$param;
            } else {
                return redirect()->to( base_url().'/master/template-dokumen');
                exit;
            }
        }
    //ambil data id user dari session
    $id_user = 0;
    if(isset($this->session->get('login_session')['id_user'])){
        $id_user = $this->session->get('login_session')['id_user'];
    }

    //ambil data user dari database
    $this->data['template_dokumen'] = [];

    $this->data['arr_key_template'] = nama_teks();
    $per_page = 5;
    $urutan = 'DESC';
    if($param != '' && isset(nama_teks()[str_replace('-', '_', $param)])){

        if(isset($this->get['cari']) && $this->get['cari'] != ''){
            $this->data['inp_val']['cari'] = $this->get['cari'];
            $this->data['template_dokumen'] = $this->tbl_template_dokumen->like('nama_template', $this->get['cari'])
                ->orLike('template_dokumen', $this->get['cari'])
                ->where(['jenis_template' => str_replace('-', '_', $param)])
                ->orderBy("update_time", $urutan)
                ->paginate($per_page, 'template_dokumen');
        } else {
            $this->data['template_dokumen'] = $this->tbl_template_dokumen->where(['jenis_template' => str_replace('-', '_', $param)])->orderBy("create_time", $urutan)->paginate($per_page, 'template_dokumen');
        }

        if($this->data['template_dokumen']){
            $this->data['pager'] = $this->tbl_template_dokumen->pager;
        }
    }

        $this->data['v']['page'] = 'template_dokumen';
        $this->data['v']['script'] = 'template_dokumen';
        return view('Master\Views\dashboard_sidebar', $this->data);
    }
}
