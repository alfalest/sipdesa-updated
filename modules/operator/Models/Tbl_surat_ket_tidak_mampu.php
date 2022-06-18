<?php

namespace Operator\Models;

use CodeIgniter\Model;

class Tbl_surat_ket_tidak_mampu extends Model
{
    protected $table = 'tbl_surat_ket_tidak_mampu';
    protected $primaryKey = 'id_surat_ket_tidak_mampu';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_surat_ket_tidak_mampu',
        'status_surat_ket_tidak_mampu',
        'belum_dilihat',
        'create_time',
        'update_time',
        'id_user',

        'nama_ket_tidak_mampu',
        'jenis_kelamin_ket_tidak_mampu',
        'tempat_lahir_ket_tidak_mampu',
        'tanggal_lahir_ket_tidak_mampu',
        'kewarganegaraan_ket_tidak_mampu',
        'agama_ket_tidak_mampu',
        'pekerjaan_ket_tidak_mampu',
        'alamat_ket_tidak_mampu',
        'tujuan_membuat_surat_ket_tidak_mampu'
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
        return $this->where(['id_surat_ket_tidak_mampu' => $id])->first();
    }
}
