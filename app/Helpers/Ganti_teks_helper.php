<?php

function nama_teks($param = '')
{
    $arr_replacer = [
        'surat_keterangan_kelahiran' => [
            //Common
            'nama_desa',
            'nomor_surat',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            //Data Anak
            'hari_lahir_anak',
            'tanggal_lahir_anak',
            'jam_lahir',
            'tempat_dilahirkan',
            'jenis_kelamin_anak',
            'nama_anak',
            //Data Ibu
            'nama_ibu',
            'umur_ibu',
            'pekerjaan_ibu',
            'alamat_ibu',
            //Data Ayah
            'nama_ayah',
            'umur_ayah',
            'pekerjaan_ayah',
            'alamat_ayah',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            'alamat_pelapor',
            'status_hubungan'
        ],
        'surat_keterangan_kematian' => [
            'desa_kel',
            'nomor_surat',
            //Data Kematian
            'nama_wafat',
            'jenis_kelamin_wafat',
            'tempat_lahir_wafat',
            'tanggal_lahir_wafat',
            'kewarganegaraan_wafat',
            'pekerjaan_wafat',
            'alamat_wafat',
            'hari_wafat',
            'tanggal_wafat',
            'jam_wafat',
            'tempat_wafat',
            'penyebab_wafat',
            'hubungan_pelapor_dengan_wafat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            'alamat_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        'surat_keterangan_pemakaman' => [
            'desa_kel',
            'nomor_surat',
            //Data Pemakaman
            'nama_yang_dimakamkan',
            'jenis_kelamin_yang_dimakamkan',
            'umur_yang_dimakamkan',
            'kewarganegaraan_yang_dimakamkan',
            'agama_yang_dimakamkabn',
            'pekerjaan_yang_dimakamkan',
            'tempat_dimakamkan',
            'alamat_dimakamkan',
            'hari_wafat',
            'tanggal_wafat',
            'jam_wafat',
            'tempat_wafat',
            'penyebab_wafat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        'surat_pengantar_keterangan_catatan_kepolisian' => [
            //Data Keterangan
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'alamat',
            'tujuan_membuat_surat',
            //Data Surat
            'desa_kel',
            'nomor_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        'surat_pengantar_pencari_kerja' => [
            //Data Keterangan
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'gol_darah',
            'nomor_ktp',
            'alamat',
            'tujuan_membuat_surat',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        'surat_keterangan_belum_memiliki_rumah' => [
            //Data Keterangan
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'alamat',
            'tujuan_membuat_surat',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_keterangan_beda_tempat_lahir' => [
            //Data Keterangan
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'alamat',
            'keterangan_surat',
            'jenis_dokumen',
            'tempat_lahir_salah',
            'tempat_lahir_benar',
            'nomor_keterangan_dokumen',
            'tanggal_dikeluarkan',
            'bulan_dikeluarkan',
            'tahun_dikeluarkan',
            'dikeluarkan_oleh',
            'tempat_dikeluarkan',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_keterangan_beda_nama' => [
            //Data Keterangan
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'alamat',
            'keterangan_surat',
            'jenis_dokumen',
            'nama_salah',
            'nama_benar',
            'nomor_keterangan_dokumen',
            'tanggal_dikeluarkan',
            'bulan_dikeluarkan',
            'tahun_dikeluarkan',
            'dikeluarkan_oleh',
            'tempat_dikeluarkan',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_keterangan_beda_tanggal_lahir' => [
            //Data Keterangan
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'alamat',
            'keterangan_surat',
            'jenis_dokumen',
            'tanggal_lahir_salah',
            'tanggal_lahir_benar',
            'nomor_keterangan_dokumen',
            'tanggal_dikeluarkan',
            'bulan_dikeluarkan',
            'tahun_dikeluarkan',
            'dikeluarkan_oleh',
            'tempat_dikeluarkan',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_keterangan_belum_menikah' => [
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'alamat',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_keterangan_suami_istri' => [
            //Data Suami
            'nama_suami',
            'jenis_kelamin_suami',
            'umur_suami',
            'pekerjaan_suami',
            'alamat_suami',
            //Data Istri
            'nama_istri',
            'jenis_kelamin_istri',
            'umur_istri',
            'pekerjaan_istri',
            'alamat_istri',
            'tujuan_membuat_surat',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_keterangan_status_janda' => [
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'alamat',
            'berstatus_janda_selama',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_keterangan_status_duda' => [
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'alamat',
            'berstatus_duda_selama',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],

        //Biodata Penduduk WNI
        'biodata_penduduk_wni' => [
            //Data Personal
            'nama_lengkap',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'gol_darah',
            'agama',
            'pendidikan_terakhir',
            'jenis_pekerjaan',
            'penyandang_cacat',
            'status_perkawinan',
            'status_hubungan_dalam_keluarga',
            'nik_ibu',
            'nama_ibu',
            'nik_ayah',
            'nama_ayah',
            'alamat_sebelumnya',
            'alamat_asal',
            'foto_pemohon',
            //Data Kepemilikan Dokumen
            'nomor_kk',
            'nomor_paspor',
            'tanggal_berakhir_paspor',
            'nomor_akte_surat_kenal_lahir',
            'nomor_akte_perkawinan_buku_nikah',
            'tanggal_perkawinan',
            'tanggal_perceraian',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],

        //SURAT PENGANTAR PINDAH DATANG ANTAR DESA/KELURAHAN DALAM SATU KECAMATAN
        'surat_pengantar_pindah_datang_antar_desa_kel_dalam_satu_kecamatan' => [
            'nik',
            'nama_lengkap',
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat_asal',
            'alamat_tujuan_pindah',
            'keluarga_yang_pindah',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        //END

        //SURAT KETERANGAN PINDAH DATANG ANTAR DESA/KELURAHAN DALAM SATU KECAMATAN
        'surat_keterangan_pindah_datang_antar_desa_kel_dalam_satu_kecamatan' => [
            'nik',
            'nama_lengkap',
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat_asal',
            'alamat_tujuan_pindah',
            'kode_provinsi',
            'kode_kab_kota',
            'kode_kecamatan',
            'kode_desa_kel',
            'provinsi',
            'kab_kota',
            'kecamatan',
            'desa_kel',
            //Data Daerah Asal
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat',
            'dusun_dukuh_kampung',
            'rt',
            'rw',
            'desa_kel',
            'kecamatan',
            'kab_kota',
            'provinsi',
            'kode_pos',
            'nomor_telpon',
            'nik_pemohon',
            'nama_pemohon',
            //Data Kepindahan
            'alasan_pindah',
            'alamat_tujuan',
            'dusun_dukuh_kampung_tujuan',
            'rt_tujuan',
            'rw_tujuan',
            'desa_kel_tujuan',
            'kecamatan_tujuan',
            'kab_kota_tujuan',
            'provinsi_tujuan',
            'kode_pos_tujuan',
            'nomor_telpon',
            'jenis_kepindahan',
            'status_kk_bagi_yang_tidak_pindah',
            'status_kk_bagi_yang_pindah',
            'kelarga_yang_pindah',
            //Tabel Keluarga Yang pindah
            'no',
            'nik',
            'nama',
            'shdk',
            'shdrt',
            'masa_berlaku_ktp',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        //END

        //SURAT PENGANTAR PINDAH KELUAR ANTAR DESA/KELURAHAN DALAM SATU KECAMATAN
        'surat_pengantar_pindah_keluar_antar_desa_kel_dalam_satu_kecamatan' => [
            'nik',
            'nama_lengkap',
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat_asal',
            'alamat_tujuan_pindah',
            'keluarga_yang_pindah',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        //SURAT PENGANTAR PINDAH ANTAR DESA ATAU KECAMATAN
        'surat_pengantar_pindah_antar_desa_atau_kecamatan' => [
            'nik',
            'nama_lengkap',
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat_asal',
            'alamat_tujuan_pindah',
            'keluarga_yang_pindah',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        //SURAT KETERANGAN PINDAH ANTAR KECAMATAN
        'surat_keterangan_pindah_antar_kecamatan' => [
            'kode_surat',
            'nik_pemohon',
            'nama_lengkap_pemohon',
            'nomor_kk_pemohon',
            'nama_kepala_keluarga_pemohon',
            'alamat_asal',
            'alamat_tujuan_pindah',
            'keluarga_yang_pindah',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        //SURAT KETERANGAN PINDAH DATANG WNI ANTAR KECAMATAN DALAM SATU KABUPATEN
        'surat_keterangan_pindah_datang_wni_antar_kecamatan_dalam_satu_kabupaten' => [
            'kode_provinsi',
            'kode_kab_kota',
            'kode_kecamatan',
            'kode_desa_kel',
            'provinsi',
            'kab_kota',
            'kecamatan',
            'desa_kel',
            //Data Daerah Asal
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat',
            'dusun_dukuh_kampung',
            'rt',
            'rw',
            'desa_kel',
            'kecamatan',
            'kab_kota',
            'provinsi',
            'kode_pos',
            'nomor_telpon',
            'nik_pemohon',
            'nama_pemohon',
            //Data Kepindahan
            'alasan_pindah',
            'alamat_tujuan',
            'dusun_dukuh_kampung_tujuan',
            'rt_tujuan',
            'rw_tujuan',
            'desa_kel_tujuan',
            'kecamatan_tujuan',
            'kab_kota_tujuan',
            'provinsi_tujuan',
            'kode_pos_tujuan',
            'nomor_telpon',
            'jenis_kepindahan',
            'status_kk_bagi_yang_tidak_pindah',
            'status_kk_bagi_yang_pindah',
            'kelarga_yang_pindah',
            //Tabel Keluarga Yang pindah
            'no',
            'nik',
            'nama',
            'shdk',
            'shdrt',
            'masa_berlaku_ktp',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        //SURAT PENGANTAR PINDAH KELUAR ANTAR KABUPATEN/KOTA DALAM SATU PROVINSI
        'surat_pengantar_pindah_keluar_antar_kab_kota_dalam_satu_provinsi' => [
            'nik',
            'nama_lengkap',
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat_asal',
            'alamat_tujuan_pindah',
            'keluarga_yang_pindah',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        //SURAT KETERANGAN PINDAH ANTAR KABUPATEN/KOTA DALAM SATU PROVINSI
        'surat_keterangan_pindah_antar_kab_kota_dalam_satu_provinsi' => [
            'kode_surat',
            'nik_pemohon',
            'nama_lengkap_pemohon',
            'nomor_kk_pemohon',
            'nama_kepala_keluarga_pemohon',
            'alamat_asal',
            'alamat_tujuan_pindah',
            'keluarga_yang_pindah',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        //SURAT KETERANGAN PINDAH DATANG WNI ANTAR KABUPATEN/KOTA DALAM SATU PROVINSI
        'surat_keterangan_pindah_datang_wni_antar_kab_kota_dalam_satu_provinsi' => [
            'kode_provinsi',
            'kode_kab_kota',
            'kode_kecamatan',
            'kode_desa_kel',
            'provinsi',
            'kab_kota',
            'kecamatan',
            'desa_kel',
            //Data Daerah Asal
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat',
            'dusun_dukuh_kampung',
            'rt',
            'rw',
            'desa_kel',
            'kecamatan',
            'kab_kota',
            'provinsi',
            'kode_pos',
            'nomor_telpon',
            'nik_pemohon',
            'nama_pemohon',
            //Data Kepindahan
            'alasan_pindah',
            'alamat_tujuan',
            'dusun_dukuh_kampung_tujuan',
            'rt_tujuan',
            'rw_tujuan',
            'desa_kel_tujuan',
            'kecamatan_tujuan',
            'kab_kota_tujuan',
            'provinsi_tujuan',
            'kode_pos_tujuan',
            'nomor_telpon',
            'jenis_kepindahan',
            'status_kk_bagi_yang_tidak_pindah',
            'status_kk_bagi_yang_pindah',
            'kelarga_yang_pindah',
            //Tabel Keluarga Yang pindah
            'no',
            'nik',
            'nama',
            'shdk',
            'shdrt',
            'masa_berlaku_ktp',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        //SURAT PENGANTAR PINDAH KELUAR ANTAR PROVINSI
        'surat_pengantar_pindah_keluar_antar_provinsi' => [
            'nik',
            'nama_lengkap',
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat_asal',
            'alamat_tujuan_pindah',
            'keluarga_yang_pindah',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        //SURAT KETERANGAN PINDAH ANTAR PROVINSI
        'surat_keterangan_pindah_antar_provinsi' => [
            'kode_surat',
            'nik_pemohon',
            'nama_lengkap_pemohon',
            'nomor_kk_pemohon',
            'nama_kepala_keluarga_pemohon',
            'alamat_asal',
            'alamat_tujuan_pindah',
            'keluarga_yang_pindah',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        //SURAT KETERANGAN PINDAH DATANG WNI PROVINSI
        'surat_keterangan_pindah_datang_wni_provinsi' => [
            'kode_provinsi',
            'kode_kab_kota',
            'kode_kecamatan',
            'kode_desa_kel',
            'provinsi',
            'kab_kota',
            'kecamatan',
            'desa_kel',
            //Data Daerah Asal
            'nomor_kk',
            'nama_kepala_keluarga',
            'alamat',
            'dusun_dukuh_kampung',
            'rt',
            'rw',
            'desa_kel',
            'kecamatan',
            'kab_kota',
            'provinsi',
            'kode_pos',
            'nomor_telpon',
            'nik_pemohon',
            'nama_pemohon',
            //Data Kepindahan
            'alasan_pindah',
            'alamat_tujuan',
            'dusun_dukuh_kampung_tujuan',
            'rt_tujuan',
            'rw_tujuan',
            'desa_kel_tujuan',
            'kecamatan_tujuan',
            'kab_kota_tujuan',
            'provinsi_tujuan',
            'kode_pos_tujuan',
            'nomor_telpon',
            'jenis_kepindahan',
            'status_kk_bagi_yang_tidak_pindah',
            'status_kk_bagi_yang_pindah',
            'kelarga_yang_pindah',
            //Tabel Keluarga Yang pindah
            'no',
            'nik',
            'nama',
            'shdk',
            'shdrt',
            'masa_berlaku_ktp',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        //END

        'surat_keterangan_domisili_sementara' => [
            'nama_lengkap',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'pekerjaan',
            'nomor_identitas',
            'alamat_asal',
            'alamat_sekarang',
            'tanggal_dibuat',
            'tanggal_hangus',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_keterangan_penduduk_sementara' => [
            'nomor_kk',
            'nik',
            'nama_lengkap',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'nomor_identitas',
            'alamat',
            'tanggal_dibuat',
            'tanggal_hangus',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        // 'surat_keterangan_tidak_mampu' => [
        //     'nama_lengkap',
        //     'jenis_kelamin',
        //     'tempat_lahir',
        //     'tanggal_lahir',
        //     'kewarganegaraan',
        //     'pekerjaan',
        //     'tujuan_membuat_surat',
        //     //Data Surat
        //     'nomor_surat',
        //     'desa_kel',
        //     'kode_surat',
        //     //Data Pelapor
        //     'nama_pelapor',
        //     'umur_pelapor',
        //     'pekerjaan_pelapor',
        //     //Common
        //     'nama_desa',
        //     'tanggal_sekarang',
        //     'jabatan_penanda_tangan',
        //     'nama_penanda_tangan',
        //     'nama_kecamatan'
        // ],
        'surat_keterangan_tidak_mampu' => [
            'nama_lengkap',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'pekerjaan',
            'tujuan_membuat_surat',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_keterangan_usaha' => [
            'nama_lengkap',
            'nik',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'pekerjaan',
            'alamat',
            'tanggal_dibuat',
            'tanggal_hangus',
            //Data Usaha
            'nama_usaha',
            'jenis_usaha',
            'alamat_usaha',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_rekomendasi_pembelian_bbm_jenis_tertentu' => [
            'nama_lengkap',
            'nama_usaha',
            'alamat_usaha',
            'konsumen_pengguna',
            'jenis_usaha_kegiatan',
            'jenis_alat',
            'jumlah_alat',
            'fungsi_alat',
            'bbm_jenis_tertentu',
            'kebutuhan_jenis_tertentu',
            'jam_hari_operasional',
            'konsumsi_bbm_jenis_tertentu', //Jam/Hari/Minggu/Bulan
            'jumlah_bbm',
            'tempat_pengambilan_bbm',
            'nomor_lembaga_penyalur',
            'lokasi',
            'masa_berlaku_surat',
            //Data Usaha
            'nama_usaha',
            'jenis_usaha',
            'alamat_usaha',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'nama_desa',
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan'
        ],
        'surat_pengantar_nikah' => [
            //Data Pemohon
            'nama_pemohon',
            'nik_pemohon',
            'jenis_kelamin_pemohon',
            'tempat_lahir_pemohon',
            'tanggal_lahir_pemohon',
            'kewarganegaraan_pemohon',
            'agama_pemohon',
            'jenis_pekerjaan_pemohon',
            'alamat_pemohon',
            'status_pernikahan_pemohon',
            //Data Ayah Pemohon
            'nama_ayah',
            'nik_ayah',
            'kewarganegaraan_ayah',
            'agama_ayah',
            'jenis_pekerjaan_ayah',
            'alamat_ayah',
            //Data Ibu Pemohon
            'nama_ibu',
            'nik_ibu',
            'kewarganegaraan_ibu',
            'agama_ibu',
            'jenis_pekerjaan_ibu',
            'alamat_ibu',
            //Data Formulir Permohonan Kehendak Nikah
            'nama_calon_pasangan',
            'tempat_akad',
            //Data Formulir Permohonan Kepencatatan Isbat
            'tanggal_penepatan',
            'lokasi_pengadilan_agama',
            //Data Formulir Persetujuan Calon Pengantin
            //Data Calon Suami
            'nama_calon_suami',
            'bin_calon_suami',
            'nik_calon_suami',
            'tempat_lahir_calon_suami',
            'tanggal_lahir_calon_suami',
            'kewarganegaraan_calon_suami',
            'agama_calon_suami',
            'jenis_pekerjaan_calon_suami',
            'alamat_calon_suami',
            //Data Calon Istri
            'nama_calon_istri',
            'binti_calon_istri',
            'nik_calon_istri',
            'tempat_lahir_calon_istri',
            'tanggal_lahir_calon_istri',
            'kewarganegaraan_calon_istri',
            'agama_calon_istri',
            'jenis_pekerjaan_calon_istri',
            'alamat_calon_istri',
          
            'tanggal_sekarang',
            'jabatan_penanda_tangan',
            'nama_penanda_tangan',
            'nama_kecamatan',
        ],
        'surat_pernyataan_belum_menikah' => [
            //Data Ayah
            'nama_lengkap',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'kewarganegaraan',
            'agama',
            'pekerjaan',
            'alamat',
            //Data Surat
            'nomor_surat',
            'desa_kel',
            'kode_surat',
            //Data Pelapor
            'nama_pelapor',
            'umur_pelapor',
            'pekerjaan_pelapor',
            //Common
            'kab_kota0',
            'tanggal_sekarang',
            'saksi'
        ],

    ];
    $data = $arr_replacer;
    if (isset($arr_replacer[$param])) {
        $data = $arr_replacer[$param];
    }
    return $data;
}
