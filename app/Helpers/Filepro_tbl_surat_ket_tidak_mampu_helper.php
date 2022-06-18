<?php

function funcpro_tbl_surat_ket_tidak_mampu()
{
    $data = [
        'tbl_surat_ket_tidak_mampu'   => [
            'id_surat_ket_tidak_mampu'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'status_surat_ket_tidak_mampu' => [
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
            'nama_ket_tidak_mampu'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150',
            ],
            'jenis_kelamin_ket_tidak_mampu'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'tempat_lahir_ket_tidak_mampu'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '200',
            ],
            'tanggal_lahir_ket_tidak_mampu'          => [
                'type'           => 'DATE',
                'unsigned'       => true
            ],
            'kewarganegaraan_ket_tidak_mampu'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'agama_ket_tidak_mampu'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'pekerjaan_ket_tidak_mampu'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11,
            ],
            'alamat_ket_tidak_mampu'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150'
            ],
            'tujuan_membuat_surat_ket_tidak_mampu'          => [
                'type'           => 'VARCHAR',
                'unsigned'       => true,
                'constraint'     => '150'
            ]
        ]
    ];
    return $data;
}
