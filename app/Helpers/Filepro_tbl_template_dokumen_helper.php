<?php

function funcpro_tbl_template_dokumen()
{
    $data = [
        'tbl_template_dokumen'  => [
            'id_template_dokumen'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_user_operator'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'nama_template'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'jenis_template'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'default_template'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'template_dokumen'          => [
                'type'           => 'LONGTEXT'
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
