<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_surat_kelahiran;
use Operator\Models\Tbl_data_surat;
use Config\Paths;
class Data_surat extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_surat_kelahiran;
    public $tbl_data_surat;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_data_surat = new Tbl_data_surat();
        $this->cek_login(['tipe_user' => 2, 
        'status_user' => 2, 
        'email_verified' => 2]);
    }

    public function index($param = '')
    {
        $data_kk = [];
        $id_user = 0;

        $this->get = $this->request->getGet();
        $urutan = "DESC";
        switch ($param) {
            case 'diproses':
                $status_perubahan = 1;
                break;
            case 'diterima':
                $status_perubahan = 2;
                $urutan = "ASC";
                break;
            case 'ditolak':
                $status_perubahan = 3;
                $urutan = "ASC";
                break;
            default:
                $status_perubahan = 1;
                break;
        }

        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

        $per_page = 5;
        if(isset($this->get['cari']) && $this->get['cari'] != ''){
            $this->data['inp_val']['cari'] = $this->get['cari'];

            $this->data['data_surat'] = $this->tbl_data_surat
                ->like('nomor_surat', $this->get['cari'])
                ->orLike('teks_isi_surat', $this->get['cari'])
                ->orLike('nama_penanda_tangan', $this->get['cari'])
                ->orLike('jabatan_penanda_tangan', $this->get['cari'])
                ->orLike('keterangan_pembuatan_surat', $this->get['cari'])
                ->orderBy("update_time", "ASC")
                ->paginate($per_page, 'data_surat');
        } else {
            $this->data['data_surat'] = $this->tbl_data_surat->orderBy("update_time", $urutan)->paginate($per_page, 'data_surat');
        }

       // $this->data['kk_diterima'] = $this->tbl_data_surat->where(['status_perubahan_kk' => 2, 'id_user' => $id_user])->paginate(1, 'kk_diterima');
       // $this->data['kk_ditolak'] = $this->tbl_data_surat->where(['status_perubahan_kk' => 3, 'id_user' => $id_user])->paginate(1, 'kk_ditolak');

        $this->data['tipedata_session'] = 'No Data';
        if($this->session->get('tipedata_session')){
            $tipedata_session = $this->session->get('tipedata_session');
            if(is_array($tipedata_session)){
                $this->data['tipedata_session'] = 'Is Array Data';
            } else {
                $this->data['tipedata_session'] = 'Not Array Data';
            }
        }
        $this->data['pager'] = $this->tbl_data_surat->pager;

        $this->data['v']['page'] = 'data_surat';
        $this->data['v']['script'] = 'data_surat';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }
}
