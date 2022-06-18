<?php
namespace Penduduk\Models;
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

    protected $tbl_template_email;
    protected $db_connect;
    /*
    public function __construct()
    {
        $this->db  = \Config\Database::connect();
        $this->tbl_template_email = $this->db->table('tbl_user');
        helper('Date_helper');
    }*/

    public function get_wilayah($kode_wilayah){
        return $this->where(['kode_wilayah' => $kode_wilayah])->first();
    }

    public function get_provinsi(){
        return $this->where(['CHAR_LENGTH(kode_wilayah)' => 2])->findAll();
    }

    public function get_kab_kota($kode_wilayah){
        return $this->where(['LEFT(kode_wilayah,2)' => $kode_wilayah, 'CHAR_LENGTH(kode_wilayah)' => 5 ])->findAll();
    }

    public function get_kecamatan($kode_wilayah){
        return $this->where(['LEFT(kode_wilayah,5)' => $kode_wilayah, 'CHAR_LENGTH(kode_wilayah)' => 8 ])->findAll();
    }

    public function get_kel_desa($kode_wilayah){
        return $this->where(['LEFT(kode_wilayah,8)' => $kode_wilayah, 'CHAR_LENGTH(kode_wilayah)' => 13 ])->findAll();
    }
}

