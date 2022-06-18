<?php

namespace Operator\Models;

use CodeIgniter\Model;

class Tbl_surat_ket_janda extends Model
{
    protected $table = 'tbl_surat_ket_janda';
    protected $primaryKey = 'id_surat_ket_janda';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_surat_ket_janda',
        'status_surat_ket_janda',
        'belum_dilihat',
        'create_time',
        'update_time',
        'id_user',

        'nama_ket_janda',
        'jenis_kelamin_ket_janda',
        'tempat_lahir_ket_janda',
        'tanggal_lahir_ket_janda',
        'kewarganegaraan_ket_janda',
        'agama_ket_janda',
        'pekerjaan_ket_janda',
        'alamat_ket_janda',
        'berstatus_janda_selama'
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
        return $this->where(['id_surat_ket_janda' => $id])->first();
    }
}
