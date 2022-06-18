<?php

namespace Operator\Models;

use CodeIgniter\Model;

class Tbl_surat_kematian extends Model
{
    protected $table = 'tbl_surat_kematian';
    protected $primaryKey = 'id_surat_kematian';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_surat_kematian',
        'status_surat_kematian',
        'belum_dilihat',
        'create_time',
        'update_time',
        'id_user',
        'nama_wafat',
        'jenis_kelamin_wafat',
        'tempat_lahir_wafat',
        'tanggal_lahir_wafat',
        'kewarganegaraan_wafat',
        'agama_wafat',
        'pekerjaan_wafat',
        'alamat_wafat',
        'hari_wafat',
        'tanggal_wafat',
        'jam_wafat',
        'tempat_wafat',
        'penyebab_wafat'
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
    public function ambil($id)
    {
        return $this->where(['id_surat_kematian' => $id])->first();
    }
}
