<?php
namespace Operator\Models;
use CodeIgniter\Model;

class Tbl_data_diri extends Model
{
    protected $table = 'tbl_data_diri';
    protected $primaryKey = 'id_data_diri';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        	'id_data_diri', 'id_user', 'nama_lengkap', 'nik', 'jenis_kelamin', 'gol_darah', 'tempat_lahir', 'tanggal_lahir',
            'agama', 'jenis_pekerjaan', 'status_perkawinan', 'kewarganegaraan', 'kel_desa',
            'alamat', 'rt', 'rw', 'kode_pos', 'telepon', 'link_foto_ktp', 'file_foto_ktp',
            'link_foto_diri', 'file_foto_diri', 'create_time', 'update_time'
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
    public function ambil_user($id){
        return $this->where(['id_user'=> $id])->first();
    }
    
}

