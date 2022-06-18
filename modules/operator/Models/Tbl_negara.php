<?php
namespace Operator\Models;
use CodeIgniter\Model;

class Tbl_negara extends Model
{
    protected $table = 'tbl_negara';
    protected $primaryKey = 'id_negara';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        	'id_negara', 'iso', 'name', 'nicename', 'iso3', 'numcode', 'phonecode', 'create_time', 'update_time'
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
        return $this->where(['id_negara'=> $id])->first();
    }

    public function ambil_semua(){
        return $this->findAll();
    }
    
}

