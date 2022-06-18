<?php
namespace Operator\Models;
use CodeIgniter\Model;

class Tbl_perubahan_kk extends Model
{
    protected $table = 'tbl_perubahan_kk';
    protected $primaryKey = 'id_perubahan_kk';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        	'id_perubahan_kk', 'id_user', 'nkk', 'kel_desa', 'nama_kepala_keluarga', 'alamat',
            'rt', 'rw', 'kode_pos', 'tanggal_dikeluarkan', 'link_foto_kk', 'file_foto_kk',
            'id_user_operator', 'keterangan_operator', 'status_perubahan_kk', 'belum_dilihat', 'create_time', 'update_time'
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
    public function ambil_kk($id){
        return $this->where(['id_perubahan_kk'=> $id])->first();
    }
    
}

