<?php
namespace App\Models;
use CodeIgniter\Model;
class Tbl_wilayah extends Model
{
    
    protected $table = 'tbl_wilayah';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $tbl_wilayah;
    protected $db_connect;
    /*
    public function __construct()
    {
        $this->db  = \Config\Database::connect();
        $this->tbl_template_email = $this->db->table('tbl_user');
        helper('Date_helper');
    }*/

    public function konek(){
        $this->db_connect  = \Config\Database::connect();
        $this->tbl_template_email = $this->db_connect->table('tbl_wilayah');
        helper('Date_helper');
        return $this;
    }

    public function get(){
        return $this->tbl_wilayah->get()->getResultArray();
    }

}