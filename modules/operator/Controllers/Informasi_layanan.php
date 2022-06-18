<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_perubahan_nik;
use Operator\Models\Tbl_informasi_layanan;
use Config\Paths;
class Informasi_layanan extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_perubahan_nik;
    public $tbl_informasi_layanan;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->tbl_informasi_layanan = new Tbl_informasi_layanan();
        $this->cek_login(['tipe_user' => 2,
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
                $this->data['link_edit'] = 'informasi-layanan-edit/'.$param;
                $this->data['link_back'] = 'informasi-layanan/'.$param;
                $this->data['link_lihat'] = 'informasi-layanan-lihat/'.$param;
            } else {
                return redirect()->to( base_url().'/operator/informasi-layanan');
                exit;
            }
        }
    //ambil data id user dari session
    $id_user = 0;
    if(isset($this->session->get('login_session')['id_user'])){
        $id_user = $this->session->get('login_session')['id_user'];
    }

    //ambil data user dari database
    $this->data['informasi_layanan'] = [];

    $this->data['arr_key_template'] = nama_teks();
    $per_page = 5;
    $urutan = 'DESC';
    if($param != '' && isset(nama_teks()[str_replace('-', '_', $param)])){

        if(isset($this->get['cari']) && $this->get['cari'] != ''){
            $this->data['inp_val']['cari'] = $this->get['cari'];
            $this->data['informasi_layanan'] = $this->tbl_informasi_layanan->like('nama_template', $this->get['cari'])
                ->orLike('informasi_layanan', $this->get['cari'])
                ->where(['jenis_informasi' => str_replace('-', '_', $param)])
                ->orderBy("update_time", $urutan)
                ->paginate($per_page, 'informasi_layanan');
        } else {
            $this->data['informasi_layanan'] = $this->tbl_informasi_layanan->where(['jenis_informasi' => str_replace('-', '_', $param)])->orderBy("create_time", $urutan)->paginate($per_page, 'informasi_layanan');
        }

        if($this->data['informasi_layanan']){
            $this->data['pager'] = $this->tbl_informasi_layanan->pager;
        }
    }

        $this->data['v']['page'] = 'informasi_layanan';
        $this->data['v']['script'] = 'informasi_layanan';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }
}
