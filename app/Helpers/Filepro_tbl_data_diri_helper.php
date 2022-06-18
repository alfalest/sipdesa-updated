<?php

function funcpro_tbl_data_diri()
{
    $data = [
        'tbl_data_diri' => [
            'id_data_diri'       => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_user'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'nama_lengkap'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
                // 'null'           => false,
            ],
            'gol_darah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
                // 'null'           => false,
            ],
            'nik'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '17',
                // 'null'           => false,
            ],
            'jenis_kelamin'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
                // 'null'           => false,
            ],
            'tempat_lahir'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                // 'null'           => false,
            ],
            'tanggal_lahir'          => [
                'type'           => 'DATE',
                // 'null'           => false,
            ],
            'agama'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
                // 'null'           => false,
            ],
            'jenis_pekerjaan'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
                // 'null'           => false,
            ],
            'status_perkawinan'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
                // 'null'           => false,
            ],
            'jenis_pekerjaan'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
                // 'null'           => false,
            ],
            'kewarganegaraan'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
                // 'null'           => false,
            ],
            'kel_desa'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '13',
                // 'null'           => false,
            ],
            'alamat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
                // 'null'           => false,
            ],
            'rt'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true
                // 'null'           => false,
            ],
            'rw'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true
                // 'null'           => false,
            ],
            'kode_pos'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '5',
                // 'null'           => false,
            ],
            'telepon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '13',
                // 'null'           => false,
            ],
            'link_foto_ktp'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                // 'null'           => false,
            ],
            'file_foto_ktp'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                // 'null'           => false,
            ],
            'link_foto_diri'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                // 'null'           => false,
            ],
            'file_foto_diri'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                // 'null'           => false,
            ],
            'create_time'          => [
                'type'           => 'DATETIME',
            ],
            'update_time'          => [
                'type'           => 'DATETIME',
            ]
        ]
    ];
    return $data;
}
