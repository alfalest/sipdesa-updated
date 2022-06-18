<?php

function funcpro_tbl_surat_belum_memiliki_rumah()
{
    $data = [
        'tbl_surat_belum_memiliki_rumah'   => [
            'id_surat_belum_memiliki_rumah'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'status_surat_belum_memiliki_rumah' => [
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
            'nama_belum_memiliki_rumah'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150',
            ],
            'jenis_kelamin_belum_memiliki_rumah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'tempat_lahir_belum_memiliki_rumah'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '200',
            ],
            'tanggal_lahir_belum_memiliki_rumah'          => [
                'type'           => 'DATE',
                'unsigned'       => true
            ],
            'kewarganegaraan_belum_memiliki_rumah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'agama_belum_memiliki_rumah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'pekerjaan_belum_memiliki_rumah'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'alamat_belum_memiliki_rumah'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150'
            ],
            'tujuan_membuat_surat_belum_memiliki_rumah'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150'
            ]
        ]
    ];
    return $data;
}
