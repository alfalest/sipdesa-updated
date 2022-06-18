<?php
namespace App\Models;
use CodeIgniter\Model;
class Tbl_kode_kata extends Model

{

    protected $table = 'tbl_kode_kata';
    protected $primaryKey = 'id_kode_kata';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_kode_kata', 'nomor_kode', 'grup_kata', 'tampilan_kata', 'create_time', 'update_time'
];
    protected $tbl_default;
    protected $db_connect;
    public $tbl;
    /*
    public function __construct()
    {
        $this->db  = \Config\Database::connect();
        $this->tbl_default = $this->db->table('tbl_user');
        helper('Date_helper');
    }*/

    public function konek(){
        $this->db_connect  = \Config\Database::connect();
        $this->tbl_default = $this->db_connect->table('tbl_kode_kata');
        $this->table('tbl_kode_kata');
        helper('Date_helper');
        return $this;
    }
    public function hitung_semua(){
        $tbl = $this->table('tbl_kode_kata');
        return $tbl->countAll();
    }

    public function ambil($config = []){
        $tbl = $this->table('tbl_kode_kata');
        if(isset($config['like'])){
            $tbl->like($config['like']);
        }

        if(isset($config['limit'])){
            if(isset($config['offset'])){
                $tbl->limit($config['limit'], $config['offset']);
            } else {
                $tbl->limit($config['limit']);
            }
        }

        if(isset($config['order_by'])){
            if(count($config['order_by'])){
                foreach ($config['order_by'] as $key => $value) {
                    if($value == 'DESC'){
                        $tbl->orderBy($key, 'DESC');
                    } else {
                        $tbl->orderBy($key, 'ASC');
                    }
                }
            }
        }

        if(isset($config['data'])){
            $tbl->where($config['data']);
        }
        return $tbl;
    }

    public function ambil_semua($param = []){
        if(count($param)){
            $data = $this->tbl_default->getWhere($param)->getResultArray();
        } else {
            $data = $this->tbl_default->get()->getResultArray();
        }
        return $data;
    }

    public function ambil_satu($param = []){
        if(count($param)){
            $data = $this->tbl_default->getWhere($param)->getRowArray();
        } else {
            $data = $this->tbl_default->get()->getRowArray();
        }
        return $data;
    }

    public function membuat($param){
        $status = 0;
        if($this->tbl_default->insert($param)){
            $status =  $this->db->insertID();
        }
        return $status;
    }

    public function mengubah($param, $id){
        $this->tbl_default->set($param);
        $this->tbl_default->where('id_kode_kata', $id);
        return $this->tbl_default->update();
    }

    public function menghapus($id){
        $this->tbl_default->where('id_kode_kata', $id);
        return $this->tbl_default->delete();
    }
}

