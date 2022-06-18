<?php
// memberikan list nama table kepada system untuk untuk di cek keberadaannya di database. 
// jika salah satu nama table dari list array tidak ada pada database maka akan menampilkan halaman Install.

// seeder pada halaman Install dibagi menjadi dua cara. pertama hanya membutuhkan nama table
// dengan kondisi nama table berada dalam array pada file 'Array_filepro_install_helper.php' yaitu file ini,
// kondisi selanjutnya file seeder harus ada pada folder Seeds dengan nama table yang dimodifikasi
// contoh nama table yang dimodifikasi untuk menamai file pada folder Seed seperti nama 'tbl_wilayah' 
// maka penulisan untuk filenya 'Tbl_wilayah_seeder.php' dan nama class nya adalah 'Tbl_wilayah_seeder'
// jika file tidak ada pada folder Seed maka tombol seeder tidak akan ditampilkan di halaman install

function filepro_install()
{
    $data = [
        'tbl_template_dokumen',
        'tbl_template_email',
        'tbl_setup_phpmailer',
        'tbl_wilayah',
        'tbl_kode_kata',
        'tbl_negara',
        'tbl_data_diri',
        'tbl_user'
    ];
    return $data;
}
