<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;

class Image_content extends BaseController
{

    protected $di_izinkan;
    public function __construct()
    {
        
        $this->di_izinkan = $this->cek_login([
            'tipe_user' => [1,2,3], 
            'status_user' => 2, 
            'email_verified' => 2,
            '_return' => true
        ]);
    }

    public function index($param = false)
    {
        if($this->di_izinkan){
            if($param == false){
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                } else {

                    $url =  base64_decode(urldecode($param));

                    if(($image = file_get_contents( WRITEPATH . $url )) === FALSE){
                        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                    } else {
                        $image = file_get_contents( WRITEPATH . $url );
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $mime_type = finfo_buffer($finfo, $image);
                        finfo_close($finfo);
                        $this->response
                            ->setStatusCode(200)
                            ->setContentType($mime_type)
                            ->setBody($image)
                            ->send();
                    }
                }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
 
    }

    public function image_encrypt($file_path, $state = 'private'){
        if($state!='private'){
            $state = 'public';
        }
        $encrypted_string = $this->img_encrypt($file_path.'#separator#'.$state);
        return urlencode($encrypted_string);
    }

    public function image_decrypt($encrypted_string){
        $arr = explode('#separator#', base64_decode($encrypted_string));
        return $arr;
    }

    public function img_encrypt($ciphertext)
    {
        //$config         = new \Config\Encryption();
        //$config->key    = base64_decode(getenv("register.encrypt_key"));
        //$config->driver = 'OpenSSL';
        //$encrypter = \Config\Services::encrypter($config);
        //$ciphertext = $encrypter->encrypt($ciphertext);
        $ciphertext = base64_encode($ciphertext);
        return $ciphertext;
    }
}