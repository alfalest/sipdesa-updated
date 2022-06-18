<?php

function funcpro_tbl_informasi_pelayanan()
{
    $data = [
        'tbl_informasi_pelayanan'   => [
            'id_informasi_layanan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_operator'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'nama_informasi'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'jenis_informasi'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'default_informasi'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'informasi_layanan'          => [
                'type'           => 'LONGTEXT',
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
