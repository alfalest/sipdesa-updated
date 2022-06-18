<?php

function funcpro_tbl_surat_kematian()
{
    $data = [
        'tbl_surat_kematian'   => [
            'id_surat_kematian'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'status_surat_kematian' => [
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
            'nama_wafat'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150',
            ],
            'jenis_kelamin_wafat'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'tempat_lahir_wafat'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150',
            ],
            'tanggal_lahir_wafat'          => [
                'type'           => 'DATE',
                'unsigned'       => true,
            ],
            'kewarganegaraan_wafat'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'agama_wafat'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'pekerjaan_wafat'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'alamat_wafat'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '200',
            ],
            'hari_wafat'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '100',
            ],
            'tanggal_wafat'          => [
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
