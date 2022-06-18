<?php
namespace Operator\Models;
use CodeIgniter\Model;

class Tbl_master_nik extends Model
{
    protected $table = 'tbl_master_nik';
    protected $primaryKey = 'id_master_nik';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';

    protected $allowedFields = [
        	'id_master_nik', 'nkk', 'nama_lengkap', 'nik', 'jenis_kelamin', 'gol_darah', 'tempat_lahir', 'tanggal_lahir',
            'agama', 'pendidikan', 'jenis_pekerjaan', 'status_perkawinan', 'status_hubungan_dalam_keluarga', 'kewarganegaraan',
            'no_paspor', 'no_kitap', 'nama_ayah', 'nama_ibu', 'id_user_operator', 'create_time', 'update_time'
    ];

    public function ambil_nik($id){
        return $this->where(['id_master_nik'=> $id])->first();
    }
    
}

