<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_kode_kata;
use Operator\Models\Tbl_wilayah;
use Operator\Models\Tbl_negara;
use Operator\Models\Tbl_surat_kelahiran;
use Operator\Models\Tbl_informasi_layanan;
use Config\Paths;
class Informasi_layanan_edit extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_wilayah;
    public $tbl_negara;
    public $tbl_kode_kata;
    public $tbl_surat_kelahiran;
    public $tbl_informasi_layanan;
    public $list_kode_kata;
    public $available_template = [
        'surat-keterangan-kelahiran' => 'surat_keterangan_kelahiran' 
    ];

    public function __construct()
    {
        $this->cek_login(['tipe_user' => 2, 
        'status_user' => 2, 
        'email_verified' => 2]);
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_negara = new Tbl_negara();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_informasi_layanan = new Tbl_informasi_layanan();
        helper('Date_helper');
        helper('Ganti_teks_helper');
        helper('form');
    }

    public function index($param = '', $id_param = '')
    {
        $this->data['tanggal_sekarang'] = get_date();

        
        $arr_replacer = [
            'surat_keterangan_kelahiran' => [
                'nama_ayah', 'nama_anak', 'nama_ibu', 'nama_pelapor'
            ]
        ];

        //ambil data id user dari session
        $id_user = 0;
        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

        //ambil data user dari database
        $data_informasi_layanan = [];
        $jenis_informasi = '';
        if( $param != '' && isset(nama_teks()[str_replace('-', '_', $param)])){
            $jenis_informasi = str_replace('-', '_', $param) ; 
            $this->data['data_informasi_layanan']['jenis_informasi'] = str_replace('-', '_', $param) ; 
            $this->data['replacer_alias'] = nama_teks()[str_replace('-', '_', $param)];
        } else {
            return redirect()->to( base_url().'/operator/informasi-layanan/');
            exit;
        }

        if($id_param != '' && $id_user){
            $data_informasi_layanan = $this->tbl_informasi_layanan->where([ 'jenis_informasi' =>  $jenis_informasi, 'id_informasi_layanan' => intval($id_param)])->first();
            if($data_informasi_layanan){
                $this->data['data_informasi_layanan'] = $data_informasi_layanan;
            } else {
                return redirect()->to( base_url().'/operator/informasi-layanan-edit/'.$param);
                exit;
            }
        }


        $this->data['title_page'] = ucwords(str_replace( '-' , ' ',  $param));
        $this->data['link_back'] = 'informasi-layanan/'.$param;

        //cek jika ada session inp_val
        if($this->session->getFlashdata('inp_val')){
            foreach ($this->session->getFlashdata('inp_val') as $key => $value) {
                if($key != 'id_informasi_layanan'){
                    $this->data['data_informasi_layanan'][$key] = $value;
                }
            }
        }
        
        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        if ($this->session->getFlashdata('invalid_info')) {
            $this->data['invalid_info'] = $this->session->getFlashdata('invalid_info') ;
        }

        $this->data['v']['page'] = 'informasi_layanan_edit';
        $this->data['v']['script'] = 'informasi_layanan_edit';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }

    protected function wilayah($arr_data, $postfix = ''){
        //ambil data wilayah untuk membuat option
        if(isset($arr_data)){
            if(isset($arr_data['kel_desa'.$postfix]) && $arr_data['kel_desa'.$postfix] != ''){
                $arr_kode = explode(".",$arr_data['kel_desa']);
                if(count($arr_kode) == 4){
                    $provinsi = $this->tbl_wilayah->get_wilayah($arr_kode[0]);
                    $kab_kota = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1]);
                    $kecamatan = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2]);
                    $kel_desa = $this->tbl_wilayah->get_wilayah($arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2].'.'.$arr_kode[3]);
                    
                    $arr_data['provinsi'.$postfix] = '';
                    if($provinsi){
                        $arr_data['provinsi'.$postfix] = strtoupper($provinsi['nama_wilayah']);
                    }

                    $arr_data['kab_kota'.$postfix] = '';
                    if($kab_kota){
                        $arr_data['kab_kota'.$postfix] = strtoupper($kab_kota['nama_wilayah']);
                    }

                    $arr_data['kecamatan'.$postfix] = '';
                    if($kecamatan){
                        $arr_data['kecamatan'.$postfix] = strtoupper($kecamatan['nama_wilayah']);
                    }

                    $arr_data['kel_desa'.$postfix] = '';
                    if($kel_desa){
                        $arr_data['kel_desa'.$postfix] = strtoupper($kel_desa['nama_wilayah']);
                    }
                }
            }
        }
        return $arr_data;
    }

    protected function arr_wilayah($arr_data, $postfix = ''){
        if(isset($arr_data['kel_desa'.$postfix]) && $arr_data['kel_desa'.$postfix] != ''){
            $arr_kode = explode(".",$arr_data['kel_desa'.$postfix]);
            if(count($arr_kode) == 4){
                $arr_data['provinsi'.$postfix] = $arr_kode[0];
                $arr_data['kab_kota'.$postfix] = $arr_kode[0].'.'.$arr_kode[1];
                $arr_data['kecamatan'.$postfix] = $arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2];
                $arr_data['kel_desa'.$postfix] = $arr_kode[0].'.'.$arr_kode[1].'.'.$arr_kode[2].'.'.$arr_kode[3];

                $this->data['arr_wilayah']['provinsi'.$postfix] = $this->tbl_wilayah->get_provinsi();
                $this->data['arr_wilayah']['kab_kota'.$postfix] = $this->tbl_wilayah->get_kab_kota($arr_data['provinsi'.$postfix]);
                $this->data['arr_wilayah']['kecamatan'.$postfix] = $this->tbl_wilayah->get_kecamatan($arr_data['kab_kota'.$postfix]);
                $this->data['arr_wilayah']['kel_desa'.$postfix] = $this->tbl_wilayah->get_kel_desa($arr_data['kecamatan'.$postfix]);
            }
        }
        return $arr_data;
    }

    protected function kode_kata($arr_data, $postfix = ''){
        foreach ($this->list_kode_kata as $key => $value) {
            if(isset($arr_data[$value.$postfix])){
                $ambil_kata = $this->tbl_kode_kata->ambil_kata($arr_data[$value] , $value);
                if($ambil_kata){
                    $arr_data[$value.$postfix] = strtoupper($ambil_kata);
                }
            }
        }
        return $arr_data;
    }


    protected function arr_kode_kata($postfix = '') {
        foreach ($this->list_kode_kata as $key => $value) {
            $ambil_kata = $this->tbl_kode_kata->ambil_grup_kata($value);
            if($ambil_kata){
                $this->data['arr_kode_kata'][$value.$postfix] = $ambil_kata;
            }
        }
    }

    // mengubah kode negara menjadi tampilan kata
    protected function negara($arr_data, $postfix = ''){
        if(isset($arr_data['kewarganegaraan'.$postfix])){
            $ambil_negara = $this->tbl_negara->where(['id_negara' => $arr_data['kewarganegaraan'.$postfix]])->first();
            if($ambil_negara){
                $arr_data['kewarganegaraan'.$postfix] = strtoupper($ambil_negara['name']);
            }
        }
        return $arr_data;
    }

    // mengambil list id negara dan nama negara
    protected function arr_negara($postfix = '') {
        $ambil_negara = $this->tbl_negara->findAll();
        if($ambil_negara){
            foreach ($ambil_negara as $key => $value) {
                $this->data['arr_kode_kata']['kewarganegaraan'.$postfix][] = ['nomor_kode' => $value['id_negara'] , 'tampilan_kata' => $value['name']];
            }
        }
    }
}
