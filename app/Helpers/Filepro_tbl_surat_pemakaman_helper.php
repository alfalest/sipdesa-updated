<?php

function funcpro_tbl_surat_pemakaman()
{
    $data = [
        'tbl_surat_pemakaman'   => [
            'id_surat_pemakaman'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'status_surat_pemakaman' => [
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
            'nama_pemakaman'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150',
            ],
            'jenis_kelamin_pemakaman'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'umur_pemakaman'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'kewarganegaraan_pemakaman'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'agama_pemakaman'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'pekerjaan_pemakaman'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'tempat_dimakamkan'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150',
            ],
            'alamat_pemakaman'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150',
            ],
            'hari_wafat'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '100',
            ],
            'tanggal_wafat_pemakaman'          => [
                'type'           => 'DATE',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'jam_wafat'          => [
                'type'           => 'TIME',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'tempat_wafat'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '100',
            ],
            'penyebab_wafat'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '100',
            ],

        ]
    ];
    return $data;
}
