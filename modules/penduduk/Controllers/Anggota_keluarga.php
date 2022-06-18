<?php

namespace Penduduk\Controllers;
use App\Controllers\BaseController;
use Penduduk\Models\Tbl_perubahan_nik;
use Penduduk\Models\Tbl_kode_kata;
use Config\Paths;
class Anggota_keluarga extends BaseController
{
    public $tbl_perubahan_nik;
    public $tbl_kode_kata;
    public function __construct()
    {
        $this->tbl_perubahan_nik = new Tbl_perubahan_nik();
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->cek_login(['tipe_user' => 3, 
        'status_user' => 2, 
        'email_verified' => 2]);
    }

    public function index($param = '')
    {
        $data_nik = [];
        $id_user = 0;

        switch ($param) {
            case 'diproses':
                $status_perubahan = 1;
                $this->data['status_anggota_keluarga_state'] = 1;
                break;
            case 'diterima':
                $status_perubahan = 2;
                $this->data['status_anggota_keluarga_state'] = 2;
                break;
            case 'ditolak':
                $status_perubahan = 3;
                $this->data['status_anggota_keluarga_state'] = 3;
                break;
            default:
                $status_perubahan = 1;
                $this->data['status_anggota_keluarga_state'] = 1;
                break;
        }

        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

                //ambil kode kata untuk membuat option
                $list_kode_kata = ['jenis_kelamin', 'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah', 'pendidikan_terakhir', 'status_hubungan_dalam_keluarga'];
                foreach ($list_kode_kata as $key => $value) {
                    $arr_kode_kata = $this->tbl_kode_kata->ambil_grup_kata($value);
                    if($arr_kode_kata){
                        foreach ($arr_kode_kata as $keys => $values) {
                            $this->data['arr_kode_kata'][$value][$values['nomor_kode']] = $values['tampilan_kata'];
                        }
                    } 
                }
        

        $this->data['nik_proses'] = $this->tbl_perubahan_nik->where(['status_perubahan_nik' => $status_perubahan, 'id_user' => $id_user])->orderBy("update_time", "DESC")->paginate(5, 'nik_proses');
       // $this->data['kk_diterima'] = $this->tbl_perubahan_nik->where(['status_perubahan_nik' => 2, 'id_user' => $id_user])->paginate(1, 'kk_diterima');
       // $this->data['kk_ditolak'] = $this->tbl_perubahan_nik->where(['status_perubahan_nik' => 3, 'id_user' => $id_user])->paginate(1, 'kk_ditolak');

        $this->data['tipedata_session'] = 'No Data';
        if($this->session->get('tipedata_session')){
            $tipedata_session = $this->session->get('tipedata_session');
            if(is_array($tipedata_session)){
                $this->data['tipedata_session'] = 'Is Array Data';
            } else {
                $this->data['tipedata_session'] = 'Not Array Data';
            }
        }
        $this->data['pager'] = $this->tbl_perubahan_nik->pager;

        $this->data['v']['page'] = 'anggota_keluarga';
        $this->data['v']['script'] = 'anggota_keluarga';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
    }
}
