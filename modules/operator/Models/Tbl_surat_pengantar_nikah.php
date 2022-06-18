<?php
namespace Operator\Models;
use CodeIgniter\Model;

class Tbl_surat_pengantar_nikah extends Model
{
    protected $table = 'tbl_surat_pengantar_nikah';
    protected $primaryKey = 'id_surat_pengantar_nikah';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_time';
    protected $allowedFields = [
        'id_surat_pengantar_nikah',
        'status_surat_pengantar_nikah',
        'id_user_operator',
        'keterangan_operator',
        'belum_dilihat',
        'create_time',
        'update_time',
        'id_user',
        'link_foto_ktp_pemohon',
        'link_foto_ktp_pasangan',
        'link_foto_ktp_ayah',
        'link_foto_ktp_ibu',
        'link_foto_kartu_keluarga',
        'link_foto_kartu_keluarga_pasangan',
        'file_foto_ktp_pemohon',
        'file_foto_ktp_pasangan',
        'file_foto_ktp_ayah',
        'file_foto_ktp_ibu',
        'file_foto_kartu_keluarga',
        'file_foto_kartu_keluarga_pasangan',
        'nama_pemohon',
        'nama_pasangan',
        'nama_ayah_pasangan',
        'nama_ayah',
        'nama_ibu',
        'nik_pemohon',
        'nik_pasangan',
        'nik_ayah',
        'nik_ibu',
        'jenis_kelamin_pemohon',
        'jenis_kelamin_pasangan',
        'jenis_kelamin_ayah',
        'jenis_kelamin_ibu',
        'tempat_lahir_pemohon',
        'tempat_lahir_pasangan',
        'tempat_lahir_ayah',
        'tempat_lahir_ibu',
        'tanggal_lahir_pemohon',
        'tanggal_lahir_pasangan',
        'tanggal_lahir_ayah',
        'tanggal_lahir_ibu',
        'agama_pemohon',
        'agama_pasangan',
        'agama_ayah',
        'agama_ibu',
        'jenis_pekerjaan_pemohon',
        'jenis_pekerjaan_pasangan',
        'jenis_pekerjaan_ayah',
        'jenis_pekerjaan_ibu',
        'alamat_pemohon',
        'alamat_pasangan',
        'alamat_ayah',
        'alamat_ibu',
        'alamat_akad',
        'rt_pemohon',
        'rt_pasangan',
        'rt_ayah',
        'rt_ibu',
        'rt_akad',
        'rw_pemohon',
        'rw_pasangan',
        'rw_ayah',
        'rw_ibu',
        'rw_akad',
        'kel_desa_pemohon',
        'kel_desa_pasangan',
        'kel_desa_ayah',
        'kel_desa_ibu',
        'kel_desa_akad',
        'kode_pos_pemohon',
        'kode_pos_pasangan',
        'kode_pos_ayah',
        'kode_pos_ibu',
        'kode_pos_akad',
        'kewarganegaraan_pemohon',
        'kewarganegaraan_pasangan',
        'kewarganegaraan_ayah',
        'kewarganegaraan_ibu',
        'kantor_pengadilan_agama',
        'status_pernikahan_pemohon',
        'beristri_ke'
    ];

    protected $tbl_template_email;
    protected $db_connect;

    public function ambil($id){
        return $this->where(['id_surat_pengantar_nikah'=> $id])->first();
    }
    
}

