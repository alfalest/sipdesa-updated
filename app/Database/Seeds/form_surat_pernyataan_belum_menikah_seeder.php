<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class form_surat_pernyataan_belum_menikah_seeder extends Seeder
{
    public function run()
    {
        $tbl_name = 'tbl_template_dokumen';
        $data = [
            [
                'id_user_operator'          => '2',
                'nama_template'             => 'Surat Pernyataan Belum Menikah - Main Template',
                'jenis_template'            => 'surat_pernyataan_belum_menikah',
                'default_template'          => '1',
                'template_dokumen'          => '<p style="text-align: right; line-height: 0.5;"><span style="font-size: 14px;"></span><b><span style="font-size: 16px;"><u><br></u></span></b></p><p style="text-align: center; line-height: 1;"><span style="font-size: 16px;"><b><u>PERNYATAAN BELUM MENIKAH</u></b></span></p><p style="text-align: center; line-height: 0.5;"></p><div style="text-align: left;"><br></div><span style="font-size: 14px;">Yang bertanda tangan di bawah ini menerangkan dengan sesungguhnya bahwa :</span><p></p><p></p><table class="table table-bordered"><tbody><tr><td style="width:60mm;">Nama Lengkap dan Alias</td><td style="width:5mm;">:</td><td style="width:150mm;">[##]</td></tr><tr><td style="width:60mm;">Tempat dan Tanggal Lahir</td><td style="width:5mm;">:</td><td style="width:150mm;">[##]</td></tr><tr><td>Jenis Kelamin</td><td>:</td><td>[##]</td></tr><tr><td>Kewarganegaraan</td><td>:</td><td>[##]</td></tr><tr><td>Agama</td><td>:</td><td>[##]</td></tr><tr><td>Pekerjaan</td><td>:</td><td>[##]</td></tr><tr><td>Alamat</td><td>:</td><td>[##]</td></tr></tbody></table>
                <p>Saya menyatakan dengan sebenarnya bahwa saya belum pernah menikah dengan siapapun, dan pada saat ini saya tidak ada hubungan nikah dengan Laki-Laki manapun, dan status saya adalah [##]</p><p>Pernyataan ini akan saya pertanggungjawabkan bila dikemudian hari ada pihak lain yang menggungat, dengan tidak akan melibatkan siapapun serta pihak manapun.</p><p>Pernyataan ini dibuat dengan keadaan sadar, sehat jasmani dan rohani tanpa paksaan dari siapapun serta pihak manapun dan disaksikan oleh kedua saksi.</p><p><br></p>
                <table class="table table-bordered" style="text-align: center; background-color: rgb(255, 255, 255); color: rgb(33, 37, 41); font-size: 0.875rem;"><tbody><tr><td style="width:20mm;"><p>Saksi-saksi</p><p style="text-align: left; ">1. ................................. (&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;)</p><p style="text-align: left; ">2. ................................. (&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;)</p><div><br></div></td><td style="width:150mm;"><br></td><td style="text-align: right; width: 15mm;"><p style="text-align: center; ">[#nama_desa#], [#tanggal_dicetak#]</p><p style="text-align: center; ">a.n. [#jabatan_penanda_tangan#]</p><p><br></p><p><br></p><p style="text-align: center; "><b>[#nama_penanda_tangan#]</b></p></td></tr></tbody></table><p></p>',
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
