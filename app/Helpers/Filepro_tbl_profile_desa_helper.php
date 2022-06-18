<?php

function funcpro_tbl_profile_desa()
{
    $data = [
        'tbl_profile_desa'       => [
            'id_desa_profile'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_desa'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'alamat_desa'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'telepon_desa'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'email_desa'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'kode_wilayah'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '13'
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
