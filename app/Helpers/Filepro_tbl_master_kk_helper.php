<?php

function funcpro_tbl_master_kk()
{
    $data = [
        'tbl_master_kk'         => [
            'id_master_kk'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nkk'       => [
                'type'       => 'VARCHAR',
                'constraint' => '16'
            ],
            'kel_desa'       => [
                'type'       => 'VARCHAR',
                'constraint' => '13'
            ],
            'nama_kepala_desa' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'rt' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'rw' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => '5'
            ],
            'tanggal_dikeluarkan' => [
                'type' => 'DATE',
            ],
            'link_foto_kk' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'file_foto_kk' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'id_user_operator'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
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
