<?php
namespace App\Controllers;
use App\Models\Tbl_wilayah;
use Config\Paths;
class Data_wilayah extends BaseController
{
    public $tbl_wilayah;
    //public $post;

    public function __construct()
    {
        $this->tbl_wilayah = new Tbl_wilayah();
    }

    public function index()
    {
        $this->post = $this->request->getGet();
        //$this->post = $this->request->getPost();
        //init response_json
        $response_json = ['no_data' => $this->post];

        if(isset($this->post['list_wilayah'])){
            switch ($this->post['list_wilayah']) {
                case 'provinsi':
                    $list_data = $this->get_provinsi();
                    break;
                case 'kab_kota':
                    $list_data = $this->get_kab_kota();
                    break;
                    break;
                case 'kecamatan':
                    $list_data = $this->get_kecamatan();
                    break;
                    break;
                case 'kel_desa':
                    $list_data = $this->get_kel_desa();
                    break;
                    break;
                default:
                    # code...
                    break;
            }

            if($list_data){
                $response_json = $list_data;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($response_json);
    }

    public function get_provinsi(){
        return $this->tbl_wilayah->select('id, kode_wilayah, nama_wilayah')->where(['CHAR_LENGTH(kode_wilayah)' => 2])->findAll();
    }

    public function get_kab_kota(){
        if(isset($this->post['provinsi']) && $this->post['provinsi'] != ''){
            return $this->tbl_wilayah->where(['LEFT(kode_wilayah,2)' => $this->post['provinsi'], 'CHAR_LENGTH(kode_wilayah)' => 5 ])->findAll();
        }
    }

    public function get_kecamatan(){
        if(isset($this->post['kab_kota']) && $this->post['kab_kota'] != ''){
            return $this->tbl_wilayah->where(['LEFT(kode_wilayah,5)' => $this->post['kab_kota'], 'CHAR_LENGTH(kode_wilayah)' => 8 ])->findAll();
        }
    }

    public function get_kel_desa(){
        if(isset($this->post['kecamatan']) && $this->post['kecamatan'] != ''){
            return $this->tbl_wilayah->where(['LEFT(kode_wilayah,8)' => $this->post['kecamatan'], 'CHAR_LENGTH(kode_wilayah)' => 13 ])->findAll();
        }
    }
}
