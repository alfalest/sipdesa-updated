<?php

function funcpro_tbl_user()
{
    $data = [
        'tbl_user'              => [
            'id_user'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_alias'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'email'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'password'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '25'
            ],
            'status_user'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'email_verified'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'tipe_user'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'token'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '16'
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
