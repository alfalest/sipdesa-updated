<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_kode_kata;
use Operator\Models\Tbl_wilayah;
use Operator\Models\Tbl_master_nik;
use Operator\Models\Tbl_master_kk;
class Data_kartu_keluarga extends BaseController
{
    public $tbl_kode_kata;
    public $tbl_wilayah;
    public $tbl_master_nik;
    public $tbl_master_kk;
    public $list_kode_kata;
    public $get;

    public function __construct()
    {
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_master_nik = new Tbl_master_nik();
        $this->tbl_master_kk = new Tbl_master_kk();
        $this->list_kode_kata = ['jenis_kelamin', 'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah', 'pendidikan_terakhir', 'status_hubungan_dalam_keluarga'];

        $this->cek_login(['tipe_user' => 2, 'status_user' => 2, 'email_verified' => 2]);
    }
    public function index()
    {

        $this->get = $this->request->getGet();

        $per_page = 5;
        if(isset($this->get['cari']) && $this->get['cari'] != ''){
            $this->data['inp_val']['cari'] = $this->get['cari'];
            $this->data['data_kk'] = $this->tbl_master_kk->like('tbl_master_kk.nkk', $this->get['cari'])
                ->orLike('tbl_master_kk.nama_kepala_keluarga', $this->get['cari'])
                ->orLike('tbl_master_kk.alamat', $this->get['cari'])
                ->paginate($per_page, 'data_kk');
        } else {
            $this->data['data_kk'] = $this->tbl_master_kk->paginate($per_page, 'data_kk');
        }
        
        if(count($this->data['data_kk']) != 0){
            foreach ($this->data['data_kk'] as $key => $value) {
                $this->data['data_kk'][$key] = $this->kode_kata($value);
                $this->data['data_kk'][$key] = $this->wilayah($value);
            }
            $this->data['pager'] = $this->tbl_master_kk->pager;
        }

        $this->data['jml_jenis_kelamin']['laki_laki'] = $this->tbl_master_nik->where(['jenis_kelamin' => 1])->get()->getNumRows();
        $this->data['jml_jenis_kelamin']['perempuan'] = $this->tbl_master_nik->where(['jenis_kelamin' => 2])->get()->getNumRows();

        $this->data['v']['page'] = 'data_kartu_keluarga';
        $this->data['v']['script'] = 'data_kartu_keluarga';
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
