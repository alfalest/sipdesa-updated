<?php

function funcpro_tbl_data_surat()
{
    $data = [
        'tbl_data_surat'    => [
            'id_data_surat'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_operator'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'id_surat'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'filename_surat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'jenis_surat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'teks_isi_surat'          => [
                'type'           => 'LONGTEXT',
            ],
            'nomor_surat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nama_penanda_tangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'jabatan_penanda_tangan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'keterangan_pembuatan)surat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'create_time'          => [
                'type'           => 'DATETIME',
            ],
            'update_time'          => [
                'type'           => 'DATETIME',
            ]
        ]
    ];
    return $data;
}
