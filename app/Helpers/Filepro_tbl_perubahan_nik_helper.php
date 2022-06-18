<?php

function funcpro_tbl_perubahan_nik()
{
    $data = [
        'tbl_perubahan_nik'     => [
            'id_perubahan_nik'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_user'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'nkk'       => [
                'type'       => 'VARCHAR',
                'constraint' => '16'
            ],
            'nama_lengkap'       => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'nik'       => [
                'type'       => 'VARCHAR',
                'constraint' => '16'
            ],
            'jenis_kelamin'       => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'gol_darah'       => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'tempat_lahir'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
            'tanggal_lahir'       => [
                'type'       => 'DATE'
            ],
            'agama'       => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'pendidikan_terakhir'       => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'jenis_pekerjaan'       => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'status perkawinan'       => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'status_hubungan_dalam_keluarga'       => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'kewarganegaraan'       => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'no_pasport'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20'
            ],
            'no_kitap'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20'
            ],
            'nama_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
            'nama_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
            'id_user_operator'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'keterangan_operator' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'status_perubahan_nik' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'create_time'          => [
                'type'           => 'DATETIME'
            ],
            'update_time'          => [
                'type'           => 'DATETIME'
            ]
        ]
    ];
    return $data;
}
