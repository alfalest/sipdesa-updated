<?php
namespace App\Models;
use CodeIgniter\Model;
class Tbl_user extends Model

{

    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_user', 'nama_alias', 'email', 'password', 'status_user', 'email_verified', 'tipe_user', 'token', 'create_time', 'update_time'
    ];
    protected $tbl_template_email;
    protected $db_connect;
    /*
    public function __construct()
    {
        $this->db  = \Config\Database::connect();
        $this->tbl_template_email = $this->db->table('tbl_user');
        helper('Date_helper');
    }*/

    public function ambil($id){
        return $this->where(['id_user'=> $id])->first();
    }
}

