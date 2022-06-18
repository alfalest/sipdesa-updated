<?php
namespace Master\Models;
use CodeIgniter\Model;

class Tbl_data_surat extends Model
{
    protected $table = 'tbl_data_surat';
    protected $primaryKey = 'id_template_dokumen';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        'id_data_surat',
        'id_operator',
        'id_surat',
        'filename_surat',
        'jenis_surat',
        'teks_isi_surat',
        'nomor_surat',
        'nama_penanda_tangan',
        'jabatan_penanda_tangan',
        'keterangan_pembuatan_surat',
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
        return $this->where(['id_template_dokumen'=> $id])->first();
    }
    
}

