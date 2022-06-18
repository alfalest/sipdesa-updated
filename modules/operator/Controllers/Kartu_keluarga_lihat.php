<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_kode_kata;
use Operator\Models\Tbl_wilayah;
use Operator\Models\Tbl_data_diri;
use Sipdesa\Models\Tbl_user;
use Config\Paths;
class Kartu_keluarga_lihat extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_wilayah;
    public $tbl_kode_kata;
    public $tbl_data_diri;
    public $tbl_user;
    public $list_kode_kata;
    public function __construct()
    {
        $this->cek_login(['tipe_user' => 2, 
        'status_user' => 2, 
        'email_verified' => 2]);
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_user = new Tbl_user();
        $this->list_kode_kata = ['jenis_kelamin', 'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah'];
    }

    public function index($param = '')
    {

        //ambil kode kata untuk membuat option
        //ambil kode kata untuk membuat option
        $this->list_kode_kata = ['jenis_kelamin', 'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah'];
        foreach ($this->list_kode_kata as $key => $value) {
            $arr_kode_kata = $this->tbl_kode_kata->ambil_grup_kata($value);
            if($arr_kode_kata){
                $this->data['arr_kode_kata'][$value] = $arr_kode_kata;
            } 
        }

        //ambil data id user dari session
        $id_user = 0;
        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

        //ambil data user dari database
        $data_kk = [];

        if($param != '' && $id_user){
            $data_kk = $this->tbl_perubahan_kk->where(['id_perubahan_kk' => intval($param)])->first();
        }

        if($data_kk){
            $this->data['data_kk'] = $data_kk;
            if(isset($this->data['data_kk']['id_user'])){
                $this->data['data_user_pemohon'] = $this->tbl_user->where(['id_user' => $this->data['data_kk']['id_user']])->first();
                $this->data['data_diri_pemohon'] = $this->tbl_data_diri->where(['id_user' => $this->data['data_kk']['id_user']])->first();

                if($this->data['data_diri_pemohon']){
                    $this->data['data_diri_pemohon'] = $this->kode_kata($this->data['data_diri_pemohon']);
                    $this->data['data_diri_pemohon'] = $this->wilayah($this->data['data_diri_pemohon']);
                }


            }
        } else {
            return redirect()->to( base_url().'/operator/kartu-keluarga');
        }
 

        if(!isset($this->data['data_kk']['link_foto_kk']) || $this->data['data_kk']['link_foto_kk'] == ''){
            if(isset($data_kk['link_foto_kk'])){
                $this->data['data_kk']['link_foto_kk'] = $data_kk['link_foto_kk'];
            }
        }

        //ambil data wilayah untuk membuat option
        if(isset($this->data['data_kk'])){
            $this->data['data_kk'] = $this->wilayah($this->data['data_kk']);
        }

        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        $this->data['v']['page'] = 'kartu_keluarga_lihat';
        $this->data['v']['script'] = 'kartu_keluarga_lihat';
        return view('Operator\Views\dashboard_sidebar', $this->data);        
    }

    protected function wilayah($arr_data){
        //ambil data wilayah untuk membuat option
        if(isset($arr_data)){
            if(isset($arr_data['kel_desa']) && $arr_data['kel_desa'] != ''){
                $arr_kode = explode(".",$arr_data['kel_desa']);
                if(count($arr_kode) == 4){
                    $provinsi = $this->tbl_wilayah->get_wilayah($arr_kode[0]);
                    $kab_kota = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1]);
                    $kecamatan = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2]);
                    $kel_desa = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2].'.'.$arr_kode[3]);
                    
                    $arr_data['provinsi'] = '';
                    if($provinsi){
                        $arr_data['provinsi'] = strtoupper($provinsi['nama_wilayah']);
                    }

                    $arr_data['kab_kota'] = '';
                    if($kab_kota){
                        $arr_data['kab_kota'] = strtoupper($kab_kota['nama_wilayah']);
                    }

                    $arr_data['kecamatan'] = '';
                    if($kecamatan){
                        $arr_data['kecamatan'] = strtoupper($kecamatan['nama_wilayah']);
                    }

                    $arr_data['kel_desa'] = '';
                    if($kel_desa){
                        $arr_data['kel_desa'] = strtoupper($kel_desa['nama_wilayah']);
                    }
                }
            }
        }
        return $arr_data;
    }

    protected function kode_kata($arr_kode){
        foreach ($this->list_kode_kata as $key => $value) {
            if(isset($arr_kode[$value])){
                $ambil_kata = $this->tbl_kode_kata->ambil_kata($arr_kode[$value] , $value);
                if($ambil_kata){
                    $arr_kode[$value] = strtoupper($ambil_kata);
                }
            }
        }
        return $arr_kode;
    }
}
