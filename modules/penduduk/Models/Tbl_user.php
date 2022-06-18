<?php
namespace Penduduk\Models;
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

    public function konek(){
        $this->db_connect  = \Config\Database::connect();
        $this->tbl_template_email = $this->db_connect->table('tbl_user');
        helper('Date_helper');
        return $this;
    }

    public function ambil($data = [], $config = []){
        if(count($data)){
            $data = $this->tbl_template_email->getWhere($data)->getResultArray();
        } else {
            $data = $this->tbl_template_email->get()->getResultArray();
        }
        return $data;
    }

    public function ambil_semua($data = []){
        if(count($data)){
            $data = $this->tbl_template_email->getWhere($data)->getResultArray();
        } else {
            $data = $this->tbl_template_email->get()->getResultArray();
        }
        return $data;
    }

    public function ambil_satu($data = []){
        if(count($data)){
            $data = $this->tbl_template_email->getWhere($data)->getRowArray();
        } else {
            $data = $this->tbl_template_email->get()->getRowArray();
        }
        return $data;
    }

    public function membuat($data){
        $status = 0;
        if($this->tbl_template_email->insert($data)){
            $status =  $this->db->insertID();
        }
        return $status;
    }

    public function mengubah($data, $id){
        $this->tbl_template_email->set($data);
        $this->tbl_template_email->where('id_user', $id);
        return $this->tbl_template_email->update();
    }

    public function menghapus($id){
        $this->tbl_template_email->where('id_user', $id);
        return $this->tbl_template_email->delete();
    }
}

