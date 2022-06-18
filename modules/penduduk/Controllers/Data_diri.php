<?php

namespace Penduduk\Controllers;
use App\Controllers\BaseController;
use Penduduk\Models\Tbl_data_diri;
use Penduduk\Models\Tbl_kode_kata;
use Penduduk\Models\Tbl_wilayah;

class Data_diri extends BaseController
{
    public $tbl_data_diri;
    public $tbl_wilayah;
    public $tbl_kode_kata;
    public function __construct()
    {
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->cek_login(['tipe_user' => 3, 
        'status_user' => 2, 
        'email_verified' => 2]);
    }

    public function index()
    {
        $this->data['tipedata_session'] = 'No Data';
        if($this->session->get('tipedata_session')){
            $tipedata_session = $this->session->get('tipedata_session');
            if(is_array($tipedata_session)){
                $this->data['tipedata_session'] = 'Is Array Data';
            } else {
                $this->data['tipedata_session'] = 'Not Array Data';
            }
        }


        //ambil kode kata untuk membuat option
        $arr_text = [];
        $list_kode_kata = ['jenis_kelamin', 'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah'];
        foreach ($list_kode_kata as $key => $value) {
            $arr_kode_kata = $this->tbl_kode_kata->ambil_grup_kata($value);
            if($arr_kode_kata){
                foreach ($arr_kode_kata as $keys => $values) {
                   $arr_text[$value][$values['nomor_kode']] = $values['tampilan_kata'];
                }
            } 
        }

        //ambil data id user dari session
        $id_user = 0;
        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

        //ambil data user dari database
        $data_diri = [];
        if($id_user){
            $data_diri = $this->tbl_data_diri->where(['id_user' => $id_user])->first();
        }

        if($data_diri){
            $this->data['data_diri'] = $data_diri;
        }

        foreach ($list_kode_kata as $key => $value) {
            if(isset($this->data['data_diri'][$value])){
                if(isset($arr_text[$value][$this->data['data_diri'][$value]])){
                    $this->data['data_diri'][$value] = strtoupper($arr_text[$value][$this->data['data_diri'][$value]]);
                }
            }
        }

        if(isset($this->data['data_diri']['kel_desa']) && $this->data['data_diri']['kel_desa'] != ''){
            $arr_kode = explode('.', $this->data['data_diri']['kel_desa']);
            $provinsi = $this->tbl_wilayah->get_wilayah($arr_kode[0]);
            $kab_kota = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1]);
            $kecamatan = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2]);
            $kel_desa = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2].'.'.$arr_kode[3]);

            if($provinsi){
                $this->data['data_diri']['provinsi'] = $provinsi['nama_wilayah'];
            }
            if($kab_kota){
                $this->data['data_diri']['kab_kota'] = $kab_kota['nama_wilayah'];
            }
            if($kecamatan){
                $this->data['data_diri']['kecamatan'] = $kecamatan['nama_wilayah'];
            }
            if($kel_desa){
                $this->data['data_diri']['kel_desa'] = $kel_desa['nama_wilayah'];
            }
        }


        $this->data['v']['page'] = 'data_diri';
        $this->data['v']['script'] = 'data_diri';
        return view('Penduduk\Views\dashboard_sidebar', $this->data);
    }
}
