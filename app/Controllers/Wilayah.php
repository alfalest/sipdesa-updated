<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Tbl_wilayah;
use Config\Paths;
class Wilayah extends BaseController
{
    public $tbl_wilayah;

    public function __construct()
    {
        $this->tbl_wilayah = new Tbl_wilayah();
        $this->tbl_wilayah = $this->tbl_wilayah->konek();
    }

    public function index()
    {
        $this->data['data_wilayah'] = $this->tbl_wilayah->get();
        $paths = new Paths();

        $this->data['page'] = "<h1>THIS PAGE Beranda</h1>";
        $this->data['jalur']['systemDirectory'] = $paths->systemDirectory ;
        $this->data['jalur']['appDirectory'] = $paths->appDirectory ;
        $this->data['jalur']['writableDirectory'] = $paths->writableDirectory ;
        $this->data['jalur']['testsDirectory'] = $paths->testsDirectory ;
        $this->data['jalur']['viewDirectory'] = $paths->viewDirectory ;
        $this->data['jalur']['APPPATH'] = ((defined(APPPATH)) ? APPPATH : APPPATH) ;     
        $this->data['jalur']['WRITEPATH'] = ((defined(WRITEPATH)) ? WRITEPATH : WRITEPATH) ;    
        $this->data['jalur']['SYSTEMPATH'] = ((defined(SYSTEMPATH)) ? SYSTEMPATH : SYSTEMPATH) ;  
        $this->data['jalur']['ROOTPATH'] = ((defined(ROOTPATH)) ? ROOTPATH : ROOTPATH) ;    
        //$this->data['jalur']['CIPATH'] = ((defined(CIPATH)) ? CIPATH : 'no') ;   
        $this->data['jalur']['FCPATH'] = ((defined(FCPATH)) ? FCPATH : FCPATH) ;        
        $this->data['jalur']['TESTPATH'] = ((defined(TESTPATH)) ? TESTPATH : TESTPATH) ;   
        //$this->data['jalur']['SUPPORTPATH'] = ((defined(SUPPORTPATH)) ? SUPPORTPATH : 'no') ;  
        $this->data['jalur']['COMPOSER_PATH'] = ((defined(COMPOSER_PATH)) ? COMPOSER_PATH : COMPOSER_PATH) ;
        //$this->data['jalur']['VENDORPATH'] = ((defined(VENDORPATH)) ? VENDORPATH : 'no') ;
        $this->data['v']['page'] = 'wilayah';
        return view('App\Views\dashboard_sidebar', $this->data);
    }
}
