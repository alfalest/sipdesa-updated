<?php

function funcpro_tbl_surat_pengantar_nikah()
{
    $data = [
        'tbl_surat_pengantar_nikah' => [
            'id_surat_pengantar_nikah'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'status_surat_pengantar_nikah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'id_user_operator'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'keterangan_operator'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'belum_dilihat'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'create_time'          => [
                'type'           => 'DATETIME'
            ],
            'update_time'          => [
                'type'           => 'DATETIME'
            ],
            'link_foto_ktp_pemohon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'link_foto_ktp_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'link_foto_ktp_ayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'link_foto_ktp_ibu'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'link_foto_kartu_keluarga'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'link_foto_kartu_keluarga_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'file_foto_ktp_pemohon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'file_foto_ktp_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'file_foto_ktp_ayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'file_foto_ktp_ibu'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'file_foto_kartu_keluarga'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'file_foto_kartu_keluarga_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'nama_pemohon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'nama_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'nama_ayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'nama_ibu'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'nama_ayah_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'nik_pemohon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '16'
                // 'null'           => false,
            ],
            'nik_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '16'
                // 'null'           => false,
            ],
            'nik_ayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '16'
                // 'null'           => false,
            ],
            'jenis_kelamin_pemohon'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'jenis_kelamin_pasangan'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'jenis_kelamin_ayah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'jenis_kelamin_ibu'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'tempat_lahir_pemohon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'tempat_lahir_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'tempat_lahir_ayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'tempat_lahir_ibu'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'tanggal_lahir_pemohon'          => [
                'type'           => 'DATE',
                // 'null'           => false,
            ],
            'tanggal_lahir_pasangan'          => [
                'type'           => 'DATE',
                // 'null'           => false,
            ],
            'tanggal_lahir_ayah'          => [
                'type'           => 'DATE',
                // 'null'           => false,
            ],
            'tanggal_lahir_ibu'          => [
                'type'           => 'DATE',
                // 'null'           => false,
            ],
            'agama_pemohon'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'agama_pasangan'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'agama_ayah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'agama_ibu'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'jenis_pekerjaan_pemohon'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'jenis_pekerjaan_pasangan'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'jenis_pekerjaan_ayah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'jenis_pekerjaan_ibu'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'alamat_pemohon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'alamat_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'alamat_ayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'alamat_ibu'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'alamat_akad'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ],
            'rt_pemohon'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'rt_pasangan'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'rt_ayah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'rt_ibu'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'rt_akad'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'rw_pemohon'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'rw_pasangan'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'rw_ayah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'rw_ibu'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'rw_akad'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'kel_desa_pemohon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '13'
                // 'null'           => false,
            ],
            'kel_desa_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '13'
                // 'null'           => false,
            ],
            'kel_desa_ayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '13'
                // 'null'           => false,
            ],
            'kel_desa_ibu'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '13'
                // 'null'           => false,
            ],
            'kel_desa_akad'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '13'
                // 'null'           => false,
            ],
            'kode_pos_pemohon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '5'
                // 'null'           => false,
            ],
            'kode_pos_pasangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '5'
                // 'null'           => false,
            ],
            'kewarganegaraan_ayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '5'
                // 'null'           => false,
            ],
            'kewarganegaraan_ibu'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '5'
                // 'null'           => false,
            ],
            'status_perkawinan_pemohon'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'beristri_ke'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
                // 'null'           => false,
            ],
            'kantor_pengadilan_agama'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
                // 'null'           => false,
            ]
        ]
    ];
    return $data;
}
