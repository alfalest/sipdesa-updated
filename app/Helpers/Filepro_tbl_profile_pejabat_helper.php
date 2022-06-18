<?php

function funcpro_tbl_profile_pejabat()
{
    $data = [
        'tbl_profile_pejabat'   => [
            'id_profile_pejabat'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_pejabat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'jabatan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'nip'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'link_foto'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'file_foto'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
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
