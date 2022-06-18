<?php 
namespace App\Libraries;

use App\Models\Tbl_setup_phpmailer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 class Email_lib
 {
    public $tbl_setup_phpmailer;
    protected $mail;
    public $param;
    public $setup_phpmailer;

    public function __construct()
    {
        $this->tbl_setup_phpmailer = new Tbl_setup_phpmailer();
        $this->mail = new PHPMailer(true);
        //Server settings
        //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        //$this->mail->isSMTP();                                            //Send using SMTP
        //$this->mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        //$this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //$this->mail->Username   = 'user@example.com';                     //SMTP username
        //$this->mail->Password   = 'secret';                               //SMTP password
        //$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        //$this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $this->setup_email();
    }

    public function setup_email(){

        $this->setup_phpmailer = [
            'smtp_host' => ((getenv('emailphpmailer.Host')) ? getenv('emailphpmailer.Host') : '' ),
            'smtp_auth' => ((getenv('emailphpmailer.SMTPAuth')) ? getenv('emailphpmailer.SMTPAuth') : '' ),
            'smtp_port' => ((getenv('emailphpmailer.Port')) ? getenv('emailphpmailer.Port') : '' ),
            'name_alias' => ((getenv('emailphpmailer.Alias')) ? getenv('emailphpmailer.Alias') : '' ),
            'username_email' => ((getenv('emailphpmailer.Username')) ? getenv('emailphpmailer.Username') : '' ),
            'password_email' => ((getenv('emailphpmailer.Password')) ? getenv('emailphpmailer.Password') : '' ),
            'is_html' => 1
        ];

        $db_setup = $this->tbl_setup_phpmailer->where(['default_setup' => 1])->first();
        if($db_setup){
            foreach ($this->setup_phpmailer as $key => $value) {
                $this->setup_phpmailer[$key] = $db_setup[$key];
            }
        } else {
            $db_setup = $this->tbl_setup_phpmailer->first();
            if($db_setup){
                foreach ($this->setup_phpmailer as $key => $value) {
                    $this->setup_phpmailer[$key] = $db_setup[$key];
                }
            }
        }

        //Content
        if($this->setup_phpmailer['is_html'] == 1){   
            $this->mail->isHTML(true); 
        }

        //Server settings
        $this->mail->isSMTP();   

                                          //Send using SMTP
        $this->mail->Host = $this->setup_phpmailer['smtp_host'];         //Set the SMTP server to send through

        if($this->setup_phpmailer['smtp_auth'] == 1 || $this->setup_phpmailer['smtp_auth'] == true){
            $this->mail->SMTPAuth = true;     //Enable SMTP authentication
        } else {
            $this->mail->SMTPAuth = false;     //Enable SMTP authentication
        }

        $this->mail->Username = $this->setup_phpmailer['username_email'];     //SMTP username
        $this->mail->Password = $this->setup_phpmailer['password_email'];     //SMTP password

        if($this->setup_phpmailer['smtp_port'] == 1){
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     //Enable implicit TLS encryption
            $this->mail->Port = 465;         //TCP port to c
        } else {
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;         //TCP port to c
        }
    }
   
    public function kirim_email($param = [])
    {
        $result = [
            'status' => 0,
            'message' => ''
        ];
        $valid = true;

        if(isset($this->setup_phpmailer['username_email']) && filter_var($this->setup_phpmailer['username_email'], FILTER_VALIDATE_EMAIL)){
            if(isset($this->setup_phpmailer['name_alias'])){
                $this->mail->setFrom($this->setup_phpmailer['username_email'], $this->setup_phpmailer['name_alias']);     //Add a recipient Name is optional
            } else {
                $this->mail->setFrom($this->setup_phpmailer['username_email']);
            }
        } else {
            $result['message'] .= 'Alamat email pengirim tidak sesuai ketentuan. ';
            $valid = false;
        }

        if(isset($param['email_penerima']) && filter_var($param['email_penerima'], FILTER_VALIDATE_EMAIL)){
            if(isset($param['nama_penerima'])){
                $this->mail->addAddress($param['email_penerima'], $param['nama_penerima']);     //Add a recipient Name is optional
            } else {
                $this->mail->addAddress($param['email_penerima']);
            }
        } else {
            $result['message'] .= 'Alamat email tujuan tidak sesuai ketentuan. ';
            $valid = false;
        }

        if(isset($param['email_judul']) && $param['email_judul'] != ''){
            $this->mail->Subject = $param['email_judul'];     //Add a recipient Name is optional  
        } else {
            $result['message'] .= 'Judul email tidak boleh kosong. ';
            $valid = false;
        }

        if(isset($param['email_pesan']) && $param['email_pesan'] != ''){
            $this->mail->Body = $param['email_pesan'];     //Add a recipient Name is optional  
        } else {
            $result['message'] .= 'Isi email tidak boleh kosong. ';
            $valid = false;
        }
                        
        $this->mail->AltBody = 'Gunakan client email html untuk membuka email';
        

        if(isset($param['email_balasan'])){
            if(filter_var($param['email_balasan'], FILTER_VALIDATE_EMAIL)){
                if(isset($param['nama_balasan'])){
                    $this->mail->addReplyTo($param['email_balasan'], $param['nama_balasan']);     //Add a recipient Name is optional
                } else {
                    $this->mail->addReplyTo($param['email_balasan']);
                }
            } else {
                $result['message'] .= 'Alamat email balasan tidak sesuai ketentuan. ';
                $valid = false;
            }
        }

        if(isset($param['email_cc'])){
            if(filter_var($param['email_cc'], FILTER_VALIDATE_EMAIL)){
                if(isset($param['nama_cc'])){
                    $this->mail->addCC($param['email_cc'], $param['nama_cc']);     //Add a recipient Name is optional
                } else {
                    $this->mail->addCC($param['email_cc']);
                }
            } else {
                $result['message'] .= 'Alamat email cc tidak sesuai ketentuan. ';
                $valid = false;
            }
        }

        if(isset($param['email_bcc'])){
            if(filter_var($param['email_bcc'], FILTER_VALIDATE_EMAIL)){
                if(isset($param['nama_bcc'])){
                    $this->mail->addBCC($param['email_bcc'], $param['nama_bcc']);     //Add a recipient Name is optional
                } else {
                    $this->mail->addBCC($param['email_bcc']);
                }
            } else {
                $result['message'] .= 'Alamat email bcc tidak sesuai ketentuan. ';
                $valid = false;
            }
        }

        if( $this->setup_phpmailer['smtp_host'] != '' && $this->setup_phpmailer['smtp_auth'] != '' &&  $this->setup_phpmailer['smtp_port'] != '' 
        &&  $this->setup_phpmailer['name_alias'] != '' &&  $this->setup_phpmailer['username_email'] != '' &&  $this->setup_phpmailer['password_email'] != '' ){
            if($valid){
                try {
                    $this->mail->send();
                    $result['message'] .= 'Pesan Berhasil dikirim';
                    $result['status'] = 1;
                } catch ( Exception $e ) {
                    $result['message'] .= "Pesan tidak dapat dikirim. Mailer Error: {$this->mail->ErrorInfo}";
                }
            }
        } else {
            $result['message'] .= 'Tidak mengirim pesan email';
        }

        return $result;
    }

 }