<?php
namespace Master\Models;
use CodeIgniter\Model;

class Tbl_template_dokumen extends Model
{
    protected $table = 'tbl_template_dokumen';
    protected $primaryKey = 'id_template_dokumen';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        	'id_template_dokumen', 'id_user_operator', 'nama_template', 'jenis_template', 'default_template', 'template_dokumen', 'create_time', 'update_time'
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
        return $this->where(['id_template_dokumen'=> $id])->first();
    }
    
}

