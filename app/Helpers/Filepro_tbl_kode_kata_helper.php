<?php

function funcpro_tbl_kode_kata()
{
    $data = [
        'tbl_kode_kata'     => [
            'id_kode_kata'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nomor_kode'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'grup_kata'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'tampilan_kata'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
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
