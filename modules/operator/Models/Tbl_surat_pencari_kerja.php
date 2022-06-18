<?php

namespace Operator\Models;

use CodeIgniter\Model;

class Tbl_surat_pencari_kerja extends Model
{
    protected $table = 'tbl_surat_pencari_kerja';
    protected $primaryKey = 'id_surat_pencari_kerja';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_surat_pencari_kerja',
        'status_surat_pencari_kerja',
        'belum_dilihat',
        'create_time',
        'update_time',
        'id_user',

        'nama_pencari_kerja',
        'jenis_kelamin_pencari_kerja',
        'tempat_lahir_pencari_kerja',
        'tanggal_lahir_pencari_kerja',
        'kewarganegaraan_pencari_kerja',
        'agama_pencari_kerja',
        'pekerjaan_pencari_kerja',
        'gol_darah_pencari_kerja',
        'nomor_ktp_pencari_kerja',
        'alamat_pencari_kerja',
        'tujuan_membuat_surat_pencari_kerja'
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
        return $this->where(['id_surat_pencari_kerja' => $id])->first();
    }
}
