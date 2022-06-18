<?php

function funcpro_tbl_setup_phpmailer()
{
    $data = [
        'tbl_setup_phpmailer'   => [
            'id_setup_phpmailer'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'smtp_host'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'smtp_auth'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'smtp_port'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'name_alias'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'username_email'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'password_email'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'is_html'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'default_setup'          => [
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
        ],
    ];
    return $data;
}
