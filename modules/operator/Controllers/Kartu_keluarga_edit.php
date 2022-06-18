<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_kode_kata;
use Operator\Models\Tbl_wilayah;
use Config\Paths;
class Kartu_keluarga_edit extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_wilayah;
    public $tbl_kode_kata;
    public function __construct()
    {
        $this->cek_login(['tipe_user' => 2, 
        'status_user' => 2, 
        'email_verified' => 2]);
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
    }

    public function index($param = '')
    {

        //ambil kode kata untuk membuat option
        $list_kode_kata = ['jenis_kelamin', 'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah'];
        foreach ($list_kode_kata as $key => $value) {
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
            $data_kk = $this->tbl_perubahan_kk->where(['id_perubahan_kk' => intval($param), 'status_perubahan_kk' => 1])->first();
        }

        if($data_kk){
            $this->data['data_kk'] = $data_kk;
        } else {
                return redirect()->to( base_url().'/operator/kartu-keluarga');
        }

        //cek jika ada session inp_val
        if($this->session->getFlashdata('inp_val')){
            $this->data['data_kk'] = $this->session->getFlashdata('inp_val');
            if(isset($data_kk['id_perubahan_kk']) && $data_kk['id_perubahan_kk'] != ''){
                $this->data['data_kk']['id_perubahan_kk'] = $data_kk['id_perubahan_kk'];
            }
        }

        if(!isset($this->data['data_kk']['link_foto_kk']) || $this->data['data_kk']['link_foto_kk'] == ''){
            if(isset($data_kk['link_foto_kk'])){
                $this->data['data_kk']['link_foto_kk'] = $data_kk['link_foto_kk'];
            }
        }

        //ambil data wilayah untuk membuat option
        if(isset($this->data['data_kk'])){
            if(isset($this->data['data_kk']['kel_desa']) && $this->data['data_kk']['kel_desa'] != ''){
                $arr_kode = explode(".",$this->data['data_kk']['kel_desa']);
                if(count($arr_kode) == 4){
                    $this->data['data_kk']['provinsi'] = $arr_kode[0];
                    $this->data['data_kk']['kab_kota'] = $arr_kode[0].'.'.$arr_kode[1];
                    $this->data['data_kk']['kecamatan'] = $arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2];
                    $this->data['data_kk']['kel_desa'] = $arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2].'.'.$arr_kode[3];

                    $this->data['arr_wilayah']['provinsi'] = $this->tbl_wilayah->get_provinsi();
                    $this->data['arr_wilayah']['kab_kota'] = $this->tbl_wilayah->get_kab_kota($this->data['data_kk']['provinsi']);
                    $this->data['arr_wilayah']['kecamatan'] = $this->tbl_wilayah->get_kecamatan($this->data['data_kk']['kab_kota']);
                    $this->data['arr_wilayah']['kel_desa'] = $this->tbl_wilayah->get_kel_desa($this->data['data_kk']['kecamatan']);
                }
            }
        }


        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        $this->data['v']['page'] = 'kartu_keluarga_edit';
        $this->data['v']['script'] = 'kartu_keluarga_edit';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }
}
