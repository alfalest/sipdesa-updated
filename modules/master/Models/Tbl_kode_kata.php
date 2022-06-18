<?php
namespace Master\Models;
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
        'id_kode_kata',
        'nomor_kode',
        'grup_kata',
        'tampilan_kata',
        'create_time',
        'update_time'
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

    public function ambil_arr($grup_kata){
        return $this->where(['grup_kata'=> $grup_kata])->findAll();
    }

    public function ambil($kode, $grup_kata){
        $kata = '';
        $db_kata = $this->where(['nomor_kode' => $kode, 'grup_kata'=> $grup_kata])->first();
        if(isset($db_kata['tampilan_kata']) && $db_kata['tampilan_kata'] != ''){
            $kata = $db_kata['tampilan_kata'];
        }
        return $kata;
    }

    public function ambil_grup_kata($grup_kata){
        return $this->where(['grup_kata'=> $grup_kata])->findAll();
    }

    public function ambil_kata($kode, $grup_kata){
        $kata = '';
        $db_kata = $this->where(['nomor_kode' => $kode, 'grup_kata'=> $grup_kata])->first();
        if(isset($db_kata['tampilan_kata']) && $db_kata['tampilan_kata'] != ''){
            $kata = $db_kata['tampilan_kata'];
        }
        return $kata;
    }
    
}

