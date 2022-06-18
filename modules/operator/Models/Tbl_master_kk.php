<?php
namespace Operator\Models;
use CodeIgniter\Model;

class Tbl_master_kk extends Model
{
    protected $table = 'tbl_master_kk';
    protected $primaryKey = 'id_master_kk';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        	'id_master_kk', 'nkk', 'kel_desa', 'nama_kepala_keluarga', 'alamat', 'rt', 'rw', 'kode_pos', 'tanggal_dikeluarkan',
            'link_foto_kk', 'file_foto_kk', 'id_user_operator', 'create_time', 'update_time'

    ];

    public function ambil_kk($id){
        return $this->where(['id_master_kk'=> $id])->first();
    }
    
}

