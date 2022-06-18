<?php

function funcpro_tbl_surat_pencari_kerja()
{
    $data = [
        'tbl_surat_pencari_kerja'   => [
            'id_surat_pencari_kerja'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'status_surat_pencari_kerja' => [
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
            'nama_pencari_kerja'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150',
            ],
            'jenis_kelamin_pencari_kerja'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'tempat_lahir_pencari_kerja'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '200',
            ],
            'tanggal_lahir_pencari_kerja'          => [
                'type'           => 'DATE',
                'unsigned'       => true
            ],
            'kewarganegaraan_pencari_kerja'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'agama_pencari_kerja'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'pekerjaan_pencari_kerja'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'gol_darah_pencari_kerja'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'nomor_ktp_pencari_kerja'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '16'
            ],
            'alamat_pencari_kerja'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150'
            ],
            'tujuan_membuat_surat_pencari_kerja'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150'
            ]
        ]
    ];
    return $data;
}
