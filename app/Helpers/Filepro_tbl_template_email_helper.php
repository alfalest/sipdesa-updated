<?php

function funcpro_tbl_template_email()
{
    $data = [
        'tbl_template_email'    => [
            'id_template_email'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'jenis_template_email'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'default_email'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'judul_email'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'isi_email'          => [
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
