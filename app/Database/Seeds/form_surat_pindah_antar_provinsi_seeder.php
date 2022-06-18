<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class form_surat_pindah_antar_provinsi_seeder extends Seeder
{
    public function run()
    {
        $tbl_name = 'tbl_template_dokumen';
        $data = [
            [
                'id_user_operator'          => '2',
                'nama_template'             => 'Surat Keterangan Pindah Antar Provinsi - Main Template',
                'jenis_template'            => 'surat_keterangan_pindah_antar_provinsi',
                'default_template'          => '1',
                'template_dokumen'          => '<p style="text-align: right; ">[#kode_surat#]</p><p style="text-align: center; line-height: 1;"><b><span style="font-size: 16px;"><u>SURAT KETERANGAN PINDAH</u></span></b></p><p style="text-align: center; line-height: 1;"><span style="font-size: 12px;">PINDAH ANTAR PROVINSI</span><b><span style="font-size: 16px;"><u><br></u></span></b></p><p style="text-align: center; line-height: 0.5;"><span style="font-size: 12px;">﻿Nomor : [#nomor_surat#]</span></p><p style="text-align: center; line-height: 0.5;"></p><div style="text-align: left;"><br></div><span style="font-size: 14px;">Yang bertanda tangan di bawah ini, menerangkan Permohonan Pindah Penduduk WNI dengan data sebagai berikut :</span><p></p><p></p><table class="table table-bordered"><tbody><tr><td style="width:60mm;">NIK Pemohon</td><td style="width:5mm;">:</td><td style="width:150mm;">[#nik#]<br></td></tr><tr><td>Nama Lengkap</td><td>:</td><td>[#nama_lengkap#]<br></td></tr><tr><td>Nomor Kartu Keluarga</td><td>:</td><td>[#nomor_kk#]<br></td></tr><tr><td>Nama Kepala Keluarga</td><td>:</td><td>[#nama_kepala_keluarga#]<br></td></tr><tr><td>Alamat Asal</td><td>:</td><td>[#alamat_asal#]<br></td></tr><tr><td>Alama Tujuan Pindah</td><td>:</td><td>[#alamat_tujuan#]</td></tr><tr><td>Jumlah Keluarga Yang Pindah</td><td>:</td><td>[#keluarga_yang_pindah#]</td></tr></tbody></table>
                <p><br></p><p>Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir. Demikian Surat Pengantar Pindah ini agar dapat dipergunakan sebagaimana mestinya.</p><p><span style="font-size: 0.875rem;"><br></span></p><p><span style="font-size: 0.875rem;"><br></span></p><table class="table table-bordered" style="background-color: rgb(255, 255, 255); color: rgb(33, 37, 41); font-size: 0.875rem;"><tbody><tr><td style="width:150mm;"><br></td><td style="text-align: right; width: 15mm;"><p style="text-align: center; ">[#nama_desa#], [#tanggal_dicetak#]</p><p style="text-align: center; "><br></p><p style="text-align: center; "><i>camat</i></p></td></tr></tbody></table>',
                'create_time'               => '',
                'update_time'               => ''
            ]
        ];
        $builder = $this->db->table($tbl_name);
        if (count($data) == 1) {
            $builder->insert($data[0]);
        } else if (count($data) > 100) {
            $builder->insertBatch($data);
        } else {
            foreach ($data as $value) {
                $builder->insert($value);
            }
        }
    }
}
