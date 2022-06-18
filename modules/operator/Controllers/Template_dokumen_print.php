<?php

namespace Operator\Controllers;
use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_kode_kata;
use Operator\Models\Tbl_wilayah;
use Operator\Models\Tbl_negara;
use Operator\Models\Tbl_user;
use Operator\Models\Tbl_data_diri;
use Operator\Models\Tbl_data_surat;
use Operator\Models\Tbl_surat_kelahiran;
use Operator\Models\Tbl_template_dokumen;
use Dompdf\Dompdf;
use Dompdf\Options;

class Template_dokumen_print extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_wilayah;
    public $tbl_negara;
    public $tbl_user;
    public $tbl_data_diri;
    public $tbl_data_surat;
    public $tbl_surat_kelahiran;
    public $tbl_kode_kata;
    public $tbl_template_dokumen;
    public $list_kode_kata;
    public $arr_postfix;
    public $get;
    public function __construct()
    {
        $this->cek_login(['tipe_user' => 2, 
        'status_user' => 2, 
        'email_verified' => 2]);
        $this->tbl_kode_kata = new Tbl_kode_kata();
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_negara = new Tbl_negara();
        $this->tbl_user = new Tbl_user();
        $this->tbl_data_diri = new Tbl_data_diri();
        $this->tbl_data_surat = new Tbl_data_surat();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_template_dokumen = new Tbl_template_dokumen();
        $this->list_kode_kata = [
            'tempat_dilahirkan', 'jenis_kelahiran', 'penolong_kelahiran', 'jenis_kelamin',
            'agama', 'jenis_pekerjaan', 'status_perkawinan', 'gol_darah',
            'tempat_dilahirkan', 'jenis_kelahiran', 'penolong_kelahiran'];
        $this->arr_postfix = [ '_anak' => 'Anak', '_ayah' => 'Ayah', '_ibu' => 'Ibu' ];
    }

    public function index($param = '', $id_param = '')
    {
        $this->get = $this->request->getGet();

        $arr_paper = ['folio', 'a4'];
        $this->data['paper'] = 'folio';
        $this->data['oreintation'] = 'potrait';

        $this->data['size_width'] = '216mm';
        $this->data['size_height'] = '330mm';
        $this->data['size_orientation'] = 'potrait';

        $this->data['margin_body'] = '0mm !important';

        $this->data['margin_top_first'] = '0mm !important';
        $this->data['margin_right_first'] = '10mm !important';
        $this->data['margin_bottom_first'] = '10mm !important';
        $this->data['margin_left_first'] = '10mm !important';

        $this->data['margin_top'] = '10mm !important';
        $this->data['margin_right'] = '10mm !important';
        $this->data['margin_bottom'] = '10mm !important';
        $this->data['margin_left'] = '10mm !important';

        $this->data['print_preview'] = '<p>Tidak Ada Data untuk di print</p>';
        $id_user = 0;
        if(isset($this->session->get('login_session')['id_user'])){
            $id_user = $this->session->get('login_session')['id_user'];
        }

        //ambil data user dari database
        $data_template = [];

        if($param != '' && $id_param != '' && $id_user){
            $data_template = $this->tbl_template_dokumen->where([ 'jenis_template' => str_replace('-', '_', $param) ,'id_template_dokumen' => intval($id_param)])->first();
        }

        if($data_template){
            $this->data['data_surat'] = $data_template;
            $this->data['print_preview'] = $data_template['template_dokumen'];
        }


        //$dompdf_options = new Options();
        
        //$dompdf_options->setIsRemoteEnabled(true);
    
        $filename = 'Template_'.$data_template['jenis_template'].'_'.$data_template['id_template_dokumen'].'_'.str_replace('-', '', date('Y-m-d')).'.pdf';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('Operator\Views\print_preview', $this->data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper($this->data['paper'], $this->data['oreintation']);

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        //$this->response->setContentType('application/json')->send();
        $dompdf->stream($filename);
        exit();
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
}
