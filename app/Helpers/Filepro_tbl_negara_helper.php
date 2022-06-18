<?php

function funcpro_tbl_negara()
{
    $data = [
        'tbl_negara'    => [
            'id_negara'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'iso'          => [
                'type'           => 'CHAR',
                'constraint'     => '2'
            ],
            'name'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '80'
            ],
            'nicename'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '80'
            ],
            'iso3'          => [
                'type'           => 'CHAR',
                'constraint'     => '3'
            ],
            'numcode'          => [
                'type'           => 'SMALLINT',
                'unsigned'       => true,
                'constraint'     => 6
            ],
            'phonecode'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 5
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
