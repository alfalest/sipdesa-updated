<?php

namespace Penduduk\Models;

use CodeIgniter\Model;

class Tbl_surat_belum_memiliki_rumah extends Model
{
    protected $table = 'tbl_surat_belum_memiliki_rumah';
    protected $primaryKey = 'id_surat_belum_memiliki_rumah';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_surat_belum_memiliki_rumah',
        'status_surat_belum_memiliki_rumah',
        'belum_dilihat',
        'create_time',
        'update_time',
        'id_user',

        'nama_belum_memiliki_rumah',
        'jenis_kelamin_belum_memiliki_rumah',
        'tempat_lahir_belum_memiliki_rumah',
        'tanggal_lahir_belum_memiliki_rumah',
        'kewarganegaraan_belum_memiliki_rumah',
        'agama_belum_memiliki_rumah',
        'pekerjaan_belum_memiliki_rumah',
        'alamat_belum_memiliki_rumah',
        'tujuan_membuat_surat_belum_memiliki_rumah'
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
        return $this->where(['id_surat_belum_memiliki_rumah' => $id])->first();
    }
}
