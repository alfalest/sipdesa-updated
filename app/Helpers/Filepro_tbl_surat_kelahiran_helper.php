<?php

function funcpro_tbl_surat_kelahiran()
{
    $data = [
        'tbl_surat_kelahiran'   => [
            'id_surat_kelahiran'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'status_surat_kelahiran' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11,
            ],
            'create_time'          => [
                'type'           => 'DATETIME',
            ],
            'update_time'          => [
                'type'           => 'DATETIME',
            ],
            'id_user'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'tempat_dilahirkan' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11,
            ],
            'jenis_kelahiran' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11,
            ],
            'penolong_kelahiran' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11,
            ],
            'jam_lahir' => [
                'type' => 'TIME',
            ],
            'kelahiran_anak_ke' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11,
            ],
            'link_foto_ktp_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'link_foto_ktp_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'link_foto_kartu_keluarga' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'link_foto_buku_nikah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'link_foto_akta_perkawinan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_foto_ktp_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_foto_ktp_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_foto_kartu_keluarga' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_foto_buku_nikah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_foto_akta_perkawinan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_anak' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'nama_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'nama_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'nik_anak' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
            ],
            'nik_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
            ],
            'nik_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
            ],
            'jenis_kelamin_anak' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11,
            ],
            'tanggal_lahir_anak' => [
                'type' => 'DATE',
            ],
            'tanggal_lahir_ayah' => [
                'type' => 'DATE',
            ],
            'tanggal_lahir_ibu' => [
                'type' => 'DATE',
            ],
            'agama_anak' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'agama_ayah' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'agama_ibu' => [
                'unsigned'       => true,
                'constraint' => 11
            ],
            'jenis_pekerjaan_anak' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'jenis_pekerjaan_ayah' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'jenis_pekerjaan_ibu' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'alamat_anak' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'alamat_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'alamat_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'rt_anak' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'rt_ayah' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'rt_ibu' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'rw_anak' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'rw_ayah' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'rw_ibu' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'kel_desa_anak' => [
                'type' => 'VARCHAR',
                'constraint' => '13'
            ],
            'kel_desa_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '13'
            ],
            'kel_desa_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '13'
            ],
            'kode_pos_anak' => [
                'type' => 'VARCHAR',
                'constraint' => '5'
            ],
            'kode_pos_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '5'
            ],
            'kode_pos_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '5'
            ],
            'kewarganegaraan_anak' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'kewarganegaraan_ayah' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'kewarganegaraan_ibu' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
        ]
    ];
    return $data;
}
