<?php
namespace Penduduk\Models;
use CodeIgniter\Model;

class Tbl_perubahan_nik extends Model
{
    protected $table = 'tbl_perubahan_nik';
    protected $primaryKey = 'id_perubahan_nik';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        	'id_perubahan_nik', 'id_user', 'nkk', 'nama_lengkap', 'nik', 'jenis_kelamin', 'gol_darah', 'tempat_lahir', 'tanggal_lahir', 'agama', 'pendidikan_terakhir',
            'jenis_pekerjaan', 'status_perkawinan', 'status_hubungan_dalam_keluarga', 'kewarganegaraan', 'no_paspor', 'no_kitap', 'nama_ayah', 'nama_ibu', 'id_user_operator',
            'keterangan_operator', 'status_perubahan_nik', 'belum_dilihat', 'create_time', 'update_time'
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
    public function ambil_nik($id){
        return $this->where(['id_perubahan_nik'=> $id])->first();
    }
    
}

