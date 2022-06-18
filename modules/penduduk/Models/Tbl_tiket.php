<?php
namespace Penduduk\Models;
use CodeIgniter\Model;

class Tbl_tiket extends Model
{
    protected $table = 'tbl_tiket';
    protected $primaryKey = 'id_tiket';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        'id_tiket',
        'nomor_tiket',
        'jenis_tiket',
        'filename_surat',
        'id_surat',
        'status_tiket',
        'id_user',
        'id_operator',
        'id_operator_confirm',
        'keterangan_tiket',
        'tanggal_kunjungan_tiket',
        'waktu_mulai_tiket',
        'waktu_selesai_tiket',
        'waktu_kehadiran',
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
    public function ambil($id){
        return $this->where(['id_tiket'=> $id])->first();
    }
    
}

