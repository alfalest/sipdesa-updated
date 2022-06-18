<?php

namespace Penduduk\Models;

use CodeIgniter\Model;

class Tbl_surat_pemakaman extends Model
{
    protected $table = 'tbl_surat_pemakaman';
    protected $primaryKey = 'id_surat_pemakaman';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_surat_pemakaman',
        'status_surat_pemakaman',
        'belum_dilihat',
        'create_time',
        'update_time',
        'id_user',
        'nama_pemakaman',
        'jenis_kelamin_pemakaman',
        'umur_pemakaman',
        'kewarganegaraan_pemakaman',
        'agama_pemakaman',
        'pekerjaan_pemakaman',
        'tempat_dimakamkan',
        'alamat_pemakaman',
        'hari_wafat',
        'tanggal_wafat_pemakaman',
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
        return $this->where(['id_surat_pemakaman' => $id])->first();
    }
}
