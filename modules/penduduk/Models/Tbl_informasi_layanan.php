<?php
namespace Penduduk\Models;
use CodeIgniter\Model;

class Tbl_informasi_layanan extends Model
{
    protected $table = 'tbl_informasi_layanan';
    protected $primaryKey = 'id_informasi_layanan';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        	'id_informasi_layanan', 'id_user_operator', 'nama_informasi', 'jenis_informasi', 'default_informasi', 'informasi_layanan', 'create_time', 'update_time'
    ];

    protected $tbl_informasi_email;
    protected $db_connect;
    /*
    public function __construct()
    {
        $this->db  = \Config\Database::connect();
        $this->tbl_informasi_email = $this->db->table('tbl_user');
        helper('Date_helper');
    }*/
    public function ambil($id){
        return $this->where(['id_informasi_layanan'=> $id])->first();
    }
    
}

