<?php

namespace Penduduk\Models;

use CodeIgniter\Model;

class Tbl_surat_catatan_kepolisian extends Model
{
    protected $table = 'tbl_surat_catatan_kepolisian';
    protected $primaryKey = 'id_surat_catatan_kepolisian';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_surat_catatan_kepolisian',
        'status_surat_catatan_kepolisian',
        'belum_dilihat',
        'create_time',
        'update_time',
        'id_user',

        'nama_catatan_kepolisian',
        'jenis_kelamin_catatan_kepolisian',
        'tempat_lahir_catatan_kepolisian',
        'tanggal_lahir_catatan_kepolisian',
        'kewarganegaraan_catatan_kepolisian',
        'agama_catatan_kepolisian',
        'pekerjaan_catatan_kepolisian',
        'alamat_catatan_kepolisian',
        'tujuan_membuat_surat_catatan_kepolisian'
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
        return $this->where(['id_surat_catatan_kepolisian' => $id])->first();
    }
}
