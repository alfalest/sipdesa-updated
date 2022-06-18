<?php

function funcpro_tbl_surat_catatan_kepolisian()
{
    $data = [
        'tbl_surat_catatan_kepolisian'   => [
            'id_surat_catatan_kepolisian'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'status_surat_catatan_kepolisian' => [
                'type' => 'INT',
                'unsigned'       => true,
                'constraint' => 11,
            ],
            'belum_dilihat'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'create_time'          => [
                'type'           => 'DATETIME',
            ],
            'update_time'          => [
                'type'           => 'DATETIME',
            ],
            'id_user'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'nama_catatan_kepolisian'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150',
            ],
            'jenis_kelamin_catatan_kepolisian'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'tempat_lahir_catatan_kepolisian'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '200',
            ],
            'tanggal_lahir_catatan_kepolisian'          => [
                'type'           => 'DATE',
                'unsigned'       => true
            ],
            'kewarganegaraan_catatan_kepolisian'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'agama_catatan_kepolisian'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'pekerjaan_catatan_kepolisian'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'alamat_catatan_kepolisian'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150'
            ],
            'tujuan_membuat_surat_catatan_kepolisian'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150'
            ]
        ]
    ];
    return $data;
}
