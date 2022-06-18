<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_kode_kata;
use Operator\Models\Tbl_wilayah;
use Operator\Models\Tbl_negara;
use Operator\Models\Tbl_template_dokumen;
use Operator\Models\Tbl_surat_pengantar_nikah;
use Operator\Models\Tbl_data_surat;
use Operator\Models\Tbl_data_diri;
use DateTime;
use Config\Paths;
class Surat_pengantar_nikah_editor extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_wilayah;
    public $tbl_negara;
    public $tbl_template_dokumen;
    public $tbl_kode_kata;
    public $tbl_surat_pengantar_nikah;
    public $tbl_data_surat;
    public $tbl_data_diri;
    public $list_kode_kata;
    public $bidang_kolom = [];

    public function __construct()
    {
        $this->cek_login(['tipe_user' => 2, 
        'status_user' => 2, 
        'email_verified' => 2]);
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_negara = new Tbl_negara();
        $this->tbl_template_dokumen = new Tbl_template_dokumen();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_surat_pengantar_nikah = new Tbl_surat_pengantar_nikah();
        $this->tbl_data_surat = new Tbl_data_surat();
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->list_kode_kata = [
            'tempat_dilahirkan', 'jenis_kelahiran', 'penolong_kelahiran', 'jenis_kelamin',
            'agama', 'jenis_pekerjaan', 'status_perkawinan', 'status_pernikahan', 'gol_darah',
            'tempat_dilahirkan', 'jenis_kelahiran', 'penolong_kelahiran'];
        $this->arr_postfix = ['_pemohon' => 'Pemohon', '_pasangan' => 'Pasangan', '_ayah' => 'Ayah', '_ibu' => 'Ibu' ];
        helper('Date_helper');
        helper('form');
        helper('Ganti_teks_helper');
    }

    public function index($param = '')
    {
        $this->data['tanggal_sekarang'] = get_date();

        // foreach (nama_teks('surat_pengantar_nikah') as $key => $value) {
        //    $this->bidang_kolom[$value] = '(.....X.....)';
        // }
        
        //ambil kode kata untuk membuat option
        $this->list_kode_kata = [ 'tempat_dilahirkan', 'jenis_kelahiran', 'penolong_kelahiran', 'jenis_kelamin', 'agama', 'jenis_pekerjaan', 'status_perkawinan', 'status_pernikahan', 'gol_darah'];

        //ambil data id user dari session
        $id_user = 0;
        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

        //ambil data user dari database
        $data_diri = [];
        $data_surat_pengantar_nikah = [];
        if($param != '' && $id_user){
            $data_surat_pengantar_nikah = $this->tbl_surat_pengantar_nikah->where(['id_surat_pengantar_nikah' => intval($param), 'status_surat_pengantar_nikah' => 2])->first();
            if($data_surat_pengantar_nikah){
                $data_diri = $this->tbl_data_diri->where(['id_user' => $data_surat_pengantar_nikah['id_user']])->first();
            }
        }

    
        if($data_surat_pengantar_nikah && $data_diri){
            $data_perubahan = $data_surat_pengantar_nikah;
            $this->data['data_surat']['id_surat'] = $data_surat_pengantar_nikah['id_surat_pengantar_nikah'];
        } else {
          return redirect()->to( base_url().'/operator/surat-pengantar-nikah');
          exit;
        }

        if(isset($data_perubahan)){
            foreach ($this->arr_postfix as $key => $value) {
                $data_perubahan = $this->wilayah($data_perubahan, $key);
                $data_perubahan = $this->kode_kata($data_perubahan, $key);
                $data_perubahan = $this->negara($data_perubahan, $key);
                $data_perubahan = $this->kode_kata($data_perubahan);
            }
        }

        if(isset($data_diri)){
            foreach ($this->arr_postfix as $key => $value) {
                $data_diri = $this->wilayah($data_diri);
                $data_diri = $this->negara($data_diri);
                $data_diri = $this->kode_kata($data_diri);
            }
        }


         $template_dokumen = $this->tbl_template_dokumen->where(['jenis_template' => 'surat_pengantar_nikah', 'default_template' => 1])->first();
        if($template_dokumen){
            
        } else {
                $template_dokumen = $this->tbl_template_dokumen->where(['jenis_template' => 'surat_pengantar_nikah'])->first();
        }

            //Data Anak
        if(isset($data_perubahan) && count($data_perubahan) && isset($data_surat_pengantar_nikah) && count($data_surat_pengantar_nikah)){
            
            //Data Pemohon
            $this->bidang_kolom['nama_pemohon'] = strtoupper( $data_perubahan['nama_pemohon'] );
            $this->bidang_kolom['nik_pemohon'] = strtoupper( $data_perubahan['nik_pemohon'] );
            $this->bidang_kolom['jenis_kelamin_pemohon'] = strtoupper( $data_perubahan['jenis_kelamin_pemohon'] );
            $this->bidang_kolom['tempat_lahir_pemohon'] = strtoupper( $data_perubahan['tempat_lahir_pemohon'] );
            $this->bidang_kolom['tanggal_lahir_pemohon'] = date('d-m-Y', strtotime($data_perubahan['tanggal_lahir_pemohon']));
            if(strtoupper($data_perubahan['kewarganegaraan_pemohon']) == 'INDONESIA'){
                $this->bidang_kolom['kewarganegaraan_pemohon'] = 'WNI';
            } else {
                $this->bidang_kolom['kewarganegaraan_pemohon'] = strtoupper($data_perubahan['kewarganegaraan_pemohon']);
            }
            $this->bidang_kolom['agama_pemohon'] = strtoupper( $data_perubahan['agama_pemohon'] );
            $this->bidang_kolom['jenis_pekerjaan_pemohon'] = strtoupper( $data_perubahan['jenis_pekerjaan_pemohon'] );
            $this->bidang_kolom['alamat_pemohon'] = strtoupper( $data_perubahan['alamat_pemohon'].', RT '.$data_perubahan['rt_pemohon'].' / RW '.
                $data_perubahan['rw_pemohon'].', '.$data_perubahan['kel_desa_pemohon'].', KECAMATAN '.$data_perubahan['kecamatan_pemohon'].', '.$data_perubahan['kab_kota_pemohon'].', PROV. '.$data_perubahan['provinsi_pemohon'].' - '.$data_perubahan['kode_pos_pemohon']);

            //Data Pasangan
            $this->bidang_kolom['nama_pasangan'] = strtoupper( $data_perubahan['nama_pasangan'] );
            $this->bidang_kolom['nik_pasangan'] = strtoupper( $data_perubahan['nik_pasangan'] );
            $this->bidang_kolom['jenis_kelamin_pasangan'] = strtoupper( $data_perubahan['jenis_kelamin_pasangan'] );
            $this->bidang_kolom['tempat_lahir_pasangan'] = strtoupper( $data_perubahan['tempat_lahir_pasangan'] );
            $this->bidang_kolom['tanggal_lahir_pasangan'] = date('d-m-Y', strtotime($data_perubahan['tanggal_lahir_pasangan']));
            if(strtoupper($data_perubahan['kewarganegaraan_pasangan']) == 'INDONESIA'){
                $this->bidang_kolom['kewarganegaraan_pasangan'] = 'WNI';
            } else {
                $this->bidang_kolom['kewarganegaraan_pasangan'] = strtoupper($data_perubahan['kewarganegaraan_pasangan']);
            }
            $this->bidang_kolom['agama_pasangan'] = strtoupper( $data_perubahan['agama_pasangan'] );
            $this->bidang_kolom['jenis_pekerjaan_pasangan'] = strtoupper( $data_perubahan['jenis_pekerjaan_pasangan'] );
            $this->bidang_kolom['alamat_pasangan'] = strtoupper( $data_perubahan['alamat_pasangan'].', RT '.$data_perubahan['rt_pasangan'].' / RW '.
                $data_perubahan['rw_pasangan'].', '.$data_perubahan['kel_desa_pasangan'].', KECAMATAN '.$data_perubahan['kecamatan_pasangan'].', '.$data_perubahan['kab_kota_pasangan'].', PROV. '.$data_perubahan['provinsi_pasangan'].' - '.$data_perubahan['kode_pos_pasangan']);


            //Data Ayah
            $this->bidang_kolom['nama_ayah'] = strtoupper( $data_perubahan['nama_ayah'] );
            $this->bidang_kolom['nik_ayah'] = strtoupper( $data_perubahan['nik_ayah'] );
            $this->bidang_kolom['jenis_kelamin_ayah'] = strtoupper( $data_perubahan['jenis_kelamin_ayah'] );
            $this->bidang_kolom['tempat_lahir_ayah'] = strtoupper( $data_perubahan['tempat_lahir_ayah'] );
            $this->bidang_kolom['tanggal_lahir_ayah'] = date('d-m-Y', strtotime($data_perubahan['tanggal_lahir_ayah']));
            if(strtoupper($data_perubahan['kewarganegaraan_ayah']) == 'INDONESIA'){
                $this->bidang_kolom['kewarganegaraan_ayah'] = 'WNI';
            } else {
                $this->bidang_kolom['kewarganegaraan_ayah'] = strtoupper($data_perubahan['kewarganegaraan_ayah']);
            }
            $this->bidang_kolom['agama_ayah'] = strtoupper( $data_perubahan['agama_ayah'] );
            $this->bidang_kolom['jenis_pekerjaan_ayah'] = strtoupper( $data_perubahan['jenis_pekerjaan_ayah'] );
            $this->bidang_kolom['alamat_ayah'] = strtoupper( $data_perubahan['alamat_ayah'].', RT '.$data_perubahan['rt_ayah'].' / RW '.
                $data_perubahan['rw_ayah'].', '.$data_perubahan['kel_desa_ayah'].', KECAMATAN '.$data_perubahan['kecamatan_ayah'].', '.$data_perubahan['kab_kota_ayah'].', PROV. '.$data_perubahan['provinsi_ayah'].' - '.$data_perubahan['kode_pos_ayah']);


            //Data Ibu
            $this->bidang_kolom['nama_ibu'] = strtoupper( $data_perubahan['nama_ibu'] );
            $this->bidang_kolom['nik_ibu'] = strtoupper( $data_perubahan['nik_ibu'] );
            $this->bidang_kolom['jenis_kelamin_ibu'] = strtoupper( $data_perubahan['jenis_kelamin_ibu'] );
            $this->bidang_kolom['tempat_lahir_ibu'] = strtoupper( $data_perubahan['tempat_lahir_ibu'] );
            $this->bidang_kolom['tanggal_lahir_ibu'] = date('d-m-Y', strtotime($data_perubahan['tanggal_lahir_ibu']));
            if(strtoupper($data_perubahan['kewarganegaraan_ibu']) == 'INDONESIA'){
                $this->bidang_kolom['kewarganegaraan_ibu'] = 'WNI';
            } else {
                $this->bidang_kolom['kewarganegaraan_ibu'] = strtoupper($data_perubahan['kewarganegaraan_ibu']);
            }
            $this->bidang_kolom['agama_ibu'] = strtoupper( $data_perubahan['agama_ibu'] );
            $this->bidang_kolom['jenis_pekerjaan_ibu'] = strtoupper( $data_perubahan['jenis_pekerjaan_ibu'] );
            $this->bidang_kolom['alamat_ibu'] = strtoupper( $data_perubahan['alamat_ibu'].', RT '.$data_perubahan['rt_ibu'].' / RW '.
                $data_perubahan['rw_ibu'].', '.$data_perubahan['kel_desa_ibu'].', KECAMATAN '.$data_perubahan['kecamatan_ibu'].', '.$data_perubahan['kab_kota_ibu'].', PROV. '.$data_perubahan['provinsi_ibu'].' - '.$data_perubahan['kode_pos_ibu']);

            //data lampiran
            $this->bidang_kolom['beristri_ke'] = intval( $data_perubahan['beristri_ke'] );

            if($data_surat_pengantar_nikah['jenis_kelamin_pemohon'] == 1){
                if($data_surat_pengantar_nikah['status_pernikahan_pemohon'] == 5){
                    $this->bidang_kolom['beristri_ke'] = intval( $data_perubahan['beristri_ke'] );
                } else {
                    $this->bidang_kolom['beristri_ke'] = '-';
                }
                $this->bidang_kolom['status_pernikahan_laki_laki'] = $data_perubahan['status_pernikahan_pemohon'];
                $this->bidang_kolom['status_pernikahan_perempuan'] = '-' ;
            } else {
                $this->bidang_kolom['beristri_ke'] = '-';
                $this->bidang_kolom['status_pernikahan_laki_laki'] = '-' ;
                $this->bidang_kolom['status_pernikahan_perempuan'] = $data_perubahan['status_pernikahan_pemohon'] ;
            }
        }


        if(isset($template_dokumen['template_dokumen']) && $template_dokumen['template_dokumen'] != ''){
            foreach ($this->bidang_kolom as $key => $value) {
                    $template_dokumen['template_dokumen'] = str_replace( '[#'.$key.'#]', $value, $template_dokumen['template_dokumen']);
            }
        }

        $this->data['data_surat']['teks_isi_surat'] = $template_dokumen['template_dokumen'];
        $this->data['data_surat']['nama_template'] = $template_dokumen['nama_template'];
        
        //cek jika ada session inp_val
        if($this->session->getFlashdata('inp_val')){
            foreach ($this->session->getFlashdata('inp_val') as $key => $value) {
                if($key != 'id_surat'){
                    $this->data['data_surat'][$key] = $value;
                }
            }
        }
        
        
        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        if ($this->session->getFlashdata('invalid_info')) {
            $this->data['invalid_info'] = $this->session->getFlashdata('invalid_info') ;
        }

        $this->data['v']['page'] = 'surat_pengantar_nikah_editor';
        $this->data['v']['script'] = 'surat_pengantar_nikah_editor';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }

    protected function wilayah($arr_data, $postfix = ''){
        //ambil data wilayah untuk membuat option
        if(isset($arr_data)){
            if(isset($arr_data['kel_desa'.$postfix]) && $arr_data['kel_desa'.$postfix] != ''){
                $arr_kode = explode(".",$arr_data['kel_desa'.$postfix]);
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
                $ambil_kata = $this->tbl_kode_kata->ambil_kata($arr_data[$value.$postfix] , $value);
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
    public function umur($tanggal_lahir){
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) { 
            $y = 0;
            $m = 0;
            $d = 0;
        } else {
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
        }
        return array('tahun' => $y, 'bulan' => $m, 'hari' => $d);
    }
}
