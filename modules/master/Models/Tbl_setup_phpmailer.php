<?php
namespace Master\Models;
use CodeIgniter\Model;

class Tbl_setup_phpmailer extends Model
{

    protected $table = 'tbl_setup_phpmailer';
    protected $primaryKey = 'id_setup_phpmailer';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_setup_phpmailer', 'smtp_host', 'smtp_auth', 'smtp_port', 'name_alias', 'username_email',
        'password_email', 'is_html',  'default_setup', 
        'create_time', 'update_time'
    ];
    /*
	1	id_setup_phpmailer      Primary	int(11)
	2	smtp_host	            varchar(100)	
	3	smtp_auth	            int(11)	
	4	smtp_port	            varchar(50)	
	5	name_alias	            varchar(100)	
	6	username_email	        varchar(100)	
	7	password_email	        varchar(100)	
	8	is_smtp	                int(11)	
	9	is_html	                int(11)
    10	smtp_secure	            int(11)	
	11	default_setup	        int(11)	
	12	create_time	            datetime	
	13	update_time	            datetime	
    */

    public function ambil($id){
        return $this->where(['id_setup_phpmailer'=> $id])->first();
    }
}

