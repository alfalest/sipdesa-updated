<?php

namespace Penduduk\Controllers;
use App\Controllers\BaseController;
use Penduduk\Models\Tbl_perubahan_kk;
use Config\Paths;
class Kartu_keluarga extends BaseController
{
    public $tbl_perubahan_kk;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->cek_login(['tipe_user' => 3, 
        'status_user' => 2, 
        'email_verified' => 2]);
    }

    public function index($param = '')
    {
        $data_kk = [];
        $id_user = 0;

        switch ($param) {
            case 'diproses':
                $status_perubahan = 1;
                $this->data['status_kartu_keluarga_state'] = 1;
                break;
            case 'diterima':
                $status_perubahan = 2;
                $this->data['status_kartu_keluarga_state'] = 2;
                break;
            case 'ditolak':
                $status_perubahan = 3;
                $this->data['status_kartu_keluarga_state'] = 3;
                break;
            default:
                $status_perubahan = 1;
                $this->data['status_kartu_keluarga_state'] = 1;
                break;
        }

        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

        $this->data['kk_proses'] = $this->tbl_perubahan_kk->where(['status_perubahan_kk' => $status_perubahan, 'id_user' => $id_user])->orderBy("belum_dilihat", "DESC")->orderBy("update_time", "DESC")->paginate(5, 'kk_proses');
       // $this->data['kk_diterima'] = $this->tbl_perubahan_kk->where(['status_perubahan_kk' => 2, 'id_user' => $id_user])->paginate(1, 'kk_diterima');
       // $this->data['kk_ditolak'] = $this->tbl_perubahan_kk->where(['status_perubahan_kk' => 3, 'id_user' => $id_user])->paginate(1, 'kk_ditolak');

        $this->data['tipedata_session'] = 'No Data';
        if($this->session->get('tipedata_session')){
            $tipedata_session = $this->session->get('tipedata_session');
            if(is_array($tipedata_session)){
                $this->data['tipedata_session'] = 'Is Array Data';
            } else {
                $this->data['tipedata_session'] = 'Not Array Data';
            }
        }
        $this->data['pager'] = $this->tbl_perubahan_kk->pager;

        $this->data['v']['page'] = 'kartu_keluarga';
        $this->data['v']['script'] = 'kartu_keluarga';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
    }
}
