<?php
// seeder pada halaman Install dibagi menjadi dua cara. pertama hanya membutuhkan nama table
// dengan kondisi nama table berada dalam array pada file 'Array_filepro_install_helper.php' yaitu file ini,
// kondisi selanjutnya file seeder harus ada pada folder Seeds dengan nama table yang dimodifikasi
// contoh nama table yang dimodifikasi untuk menamai file pada folder Seed seperti nama 'tbl_wilayah' 
// maka penulisan untuk filenya 'Tbl_wilayah_seeder.php' dan nama class nya adalah 'Tbl_wilayah_seeder'
// jika file tidak ada pada folder Seed maka tombol seeder tidak akan ditampilkan di halaman install

// Helper ini hadir sebagai pengecualiaan diatas
// jika metode diatas hanya membutuhkan nama table yang kemudian dimodifikasi agar sesuai dengan nama file
// berbeda dengan metode kedua dikarenakan nama file tidak sama dengan nama table.
// maka harus diberitahukan nama file yang akan dipanggil oleh seeder
// contoh, file seeder ditulis dengan nama 'Seed_surat_keterangan_kelahiran.php' dan memiliki class dengan nama 
// 'Seed_surat_keterangan_kelahiran.php', dan akan insert ke table 'tbl_template_dokumen'.
// maka tambahkan key nama table dan array value nama classnya.
// contoh: 'tbl_stemplate_dokumen' => ['Seed_surat_keterangan_kelahiran];
// jika salah satu nama table dari list array tidak ada pada database maka akan menampilkan halaman instal table.

function arr_seed_custom()
{
    $data = [
        'tbl_template_dokumen' => [
            'form_surat_kelahiran_seeder',
            'form_surat_kematian_seeder',
            'form_surat_pemakaman_seeder',
            'form_surat_beda_tanggal_lahir_seeder',
            'form_surat_beda_tempat_lahir_seeder',
            'form_surat_belum_memiliki_rumah_seeder',
            'form_surat_belum_menikah_seeder',
            'form_surat_domisili_seeder',
            'form_surat_ket_menikah_seeder',
            'form_surat_pindah_antar_kab_kota_dalam_satu_provinsi_seeder',
            'form_surat_pindah_antar_kecamatan_seeder',
            'form_surat_pindah_antar_provinsi_seeder',
            'form_surat_ket_duda_seeder',
            'form_surat_ket_janda_seeder',
            'form_surat_ket_tidak_mampu_seeder',
            'form_surat_ket_usaha_seeder',
            'form_surat_pengantar_catatan_kepolisian',
            'form_surat_pengantar_pencari_kerja_seeder',
            'form_surat_pindah_datang_antar_desa_kel_dalam_satu_kecamatan_seeder',
            'form_surat_pindah_keluar_antar_desa_kel_dalam_satu_kecamatan_seeder',
            'form_surat_pengantar_pindah_antar_kab_kota_dalam_satu_provinsi_seeder',
            'form_surat_pindah_keluar_antar_provinsi_seeder',
            'form_surat_belum_menikah_seeder',
            'form_surat_rek_pembelian_bbm_jenis_tertentu_seeder'
        ],
    ];
    return $data;
}
