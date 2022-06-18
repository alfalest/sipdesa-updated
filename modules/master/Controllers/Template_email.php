<?php

namespace Master\Controllers;
use App\Controllers\BaseController;
use Master\Models\Tbl_perubahan_kk;
use Master\Models\Tbl_perubahan_nik;
use Master\Models\Tbl_template_email;
use Config\Paths;
class Template_email extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_perubahan_nik;
    public $tbl_template_email;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->tbl_template_email = new Tbl_template_email();
        $this->cek_login(['tipe_user' => 1,
        'status_user' => 2,
        'email_verified' => 2]);
        helper('Ganti_teks_helper');
        helper('Jenis_template_email_helper');

    }

    public function index($param = '')
    {
        $this->get = $this->request->getGet();
        $available_template = [
            'surat-keterangan-kelahiran' => 'surat_keterangan_kelahiran'
        ];


        if($param != '' ){
            if(isset(jenis_template_email()[str_replace('-', '_', $param)])){
                $this->data['title_page'] = ucwords(str_replace( '-' , ' ',  $param));
                $this->data['link_edit'] = 'template-email-edit/'.$param;
                $this->data['link_back'] = 'template-email/'.$param;
                $this->data['link_lihat'] = 'template-email-lihat/'.$param;
            } else {
                return redirect()->to( base_url().'/master/template-email');
                exit;
            }
        }
    //ambil data id user dari session
    $id_user = 0;
    if(isset($this->session->get('login_session')['id_user'])){
        $id_user = $this->session->get('login_session')['id_user'];
    }

    //ambil data user dari database
    $this->data['template_email'] = [];

    $this->data['arr_key_template'] = jenis_template_email();
    $per_page = 5;
    $urutan = 'DESC';
    if($param != '' && isset(jenis_template_email()[str_replace('-', '_', $param)])){

        if(isset($this->get['cari']) && $this->get['cari'] != ''){
            $this->data['inp_val']['cari'] = $this->get['cari'];
            $this->data['template_email'] = $this->tbl_template_email
            ->where(['jenis_template_email' => str_replace('-', '_', $param)])
            ->like('judul_email', $this->get['cari'])
            ->orLike('isi_email', $this->get['cari'])
            ->orderBy("update_time", $urutan)
            ->paginate($per_page, 'template_email');
        } else {
            $this->data['template_email'] = $this->tbl_template_email->where(['jenis_template_email' => str_replace('-', '_', $param)])->orderBy("create_time", $urutan)->paginate($per_page, 'template_email');
        }

        if($this->data['template_email']){
            $this->data['pager'] = $this->tbl_template_email->pager;
        }
    }

        $this->data['v']['page'] = 'template_email';
        $this->data['v']['script'] = 'template_email';
        return view('Master\Views\dashboard_sidebar', $this->data);
    }
}
