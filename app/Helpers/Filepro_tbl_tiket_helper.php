<?php

function funcpro_tbl_tiket()
{
    $data = [
        'tbl_tiket'             => [
            'id_tiket'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nomor_tiket'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '16'
            ],
            'jenis_tiket'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'filename_surat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'id_surat'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'status_tiket'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'id_user'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'id_operator'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'id_operator_confirm'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 11
            ],
            'keterangan_tiket'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'tanggal_kunjungan_tiket'          => [
                'type'           => 'DATE'
            ],
            'waktu_mulai_tiket'          => [
                'type'           => 'TIME'
            ],
            'waktu_selesai_tiket'          => [
                'type'           => 'TIME'
            ],
            'waktu_kehadiran'          => [
                'type'           => 'DATETIME'
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
