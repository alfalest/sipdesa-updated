<?php

function funcpro_tbl_wilayah()
{
    $data = [
        'tbl_wilayah'           => [
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'kode_wilayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '13',
            ],
            'nama_wilayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
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
