<?php
// memberikan list nama file helper yang akan di load menjadi array table dan column
// contoh 'tbl_data_diri' akan di load dengna helper('Filepro_tbl_data_diri_helper')

function filepro_tbl()
{
    $data = [
        'tbl_data_diri',
        'tbl_data_surat',
        'tbl_informasi_pelayanan',
        'tbl_kode_kata',
        'tbl_master_kk',
        'tbl_master_nik',
        'tbl_negara',
        'tbl_perubahan_kk',
        'tbl_perubahan_nik',
        'tbl_profile_pejabat',
        'tbl_setup_phpmailer',
        'tbl_surat_kelahiran',
        'tbl_surat_kematian',
        'tbl_surat_pemakaman',
        'tbl_surat_pengantar_nikah',
        'tbl_surat_belum_memiliki_rumah',
        'tbl_surat_catatan_kepolisian',
        'tbl_surat_ket_tidak_mampu',
        'tbl_surat_pencari_kerja',
        'tbl_template_dokumen',
        'tbl_template_email',
        'tbl_tiket',
        'tbl_user',
        'tbl_wilayah',
    ];
    return $data;
}
