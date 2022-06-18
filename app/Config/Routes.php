<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Beranda::index');
$routes->get('wilayah', 'Wilayah::index');

$routes->get('install-table', 'Install_table::index');
$routes->get('install-table/(:segment)', 'Install_table::index/$1');
$routes->get('install-table/(:segment)/(:segment)', 'Install_table::index/$1/$2');

$routes->get('install-table-seeder', 'Install_table::index_seeder');
$routes->get('install-table-seeder/(:segment)', 'Install_table::index_seeder/$1');
$routes->get('install-table-seeder/(:segment)/(:segment)', 'Install_table::index_seeder/$1/$2');

$routes->get('register', 'Register::index');
$routes->post('register-simpan', 'Register_simpan::index');
$routes->get('register-verifikasi', 'Register_verifikasi::index');
$routes->get('register-verifikasi/(:segment)', 'Register_verifikasi::index/$1');

$routes->get('lupa-password', 'Lupa_password::index');
$routes->post('lupa-password-update', 'Lupa_password_update::index');
$routes->get('lupa-password-verifikasi', 'Lupa_password_verifikasi::index');
$routes->get('lupa-password-verifikasi/(:segment)', 'Lupa_password_verifikasi::index/$1');

$routes->get('ganti-password', 'Ganti_password::index');
$routes->get('ganti-password/(:segment)', 'Ganti_password::index/$1');
$routes->post('ganti-password-update', 'Ganti_password_update::index');

$routes->get('login', 'Login::index');
$routes->post('login-auth', 'Login_auth::index');
$routes->get('logout', 'Logout::index');


$routes->get('image-content', 'Image_content::index');
$routes->get('image-content/(:segment)', 'Image_content::index/$1');
$routes->post('data-wilayah', 'Data_wilayah::index');
$routes->get('data-wilayah', 'Data_wilayah::index');

$routes->group('master', ['namespace' => 'Master\Controllers'], function ($routes) {
	$routes->get('/', 'Beranda::index');
	$routes->get('beranda', 'Beranda::index');

	$routes->get('data-diri', 'Data_diri::index');
	$routes->get('data-diri-edit', 'Data_diri_edit::index');
	$routes->post('data-diri-update', 'Data_diri_update::index');

	$routes->get('setting-akun', 'Setting_akun::index');

	$routes->get('ganti-password-edit', 'Ganti_password_edit::index');
	$routes->post('ganti-password-update', 'Ganti_password_update::index');

	$routes->get('setting-email', 'Setting_email::index');

	$routes->get('setup-email', 'Setup_email::index');
	$routes->get('setup-email-edit', 'Setup_email_edit::index');
	$routes->get('setup-email-edit/(:segment)', 'Setup_email_edit::index/$1');
	$routes->get('setup-email-lihat', 'Setup_email_lihat::index');
	$routes->get('setup-email-lihat/(:segment)', 'Setup_email_lihat::index/$1');
	$routes->post('setup-email-update', 'Setup_email_update::index');

	$routes->get('template-email', 'Template_email::index');
	$routes->get('template-email/(:segment)', 'Template_email::index/$1');
	$routes->get('template-email-edit', 'Template_email::index');
	$routes->get('template-email-edit/(:segment)', 'Template_email_edit::index/$1');
	$routes->get('template-email-edit/(:segment)/(:segment)', 'Template_email_edit::index/$1/$2');
	$routes->get('template-email-lihat', 'Template_email_lihat::index');
	$routes->get('template-email-lihat/(:segment)', 'Template_email_lihat::index/$1');
	$routes->get('template-email-lihat/(:segment)/(:segment)', 'Template_email_lihat::index/$1/$2');

	$routes->get('template-email-print', 'Template_email_print::index');
	$routes->get('template-email-print/(:segment)', 'Template_email_print::index/$1');
	$routes->get('template-email-print/(:segment)/(:segment)', 'Template_email_print::index/$1/$2');

	$routes->get('template-dokumen', 'Template_dokumen::index');
	$routes->get('template-dokumen/(:segment)', 'Template_dokumen::index/$1');
	$routes->get('template-dokumen-edit', 'Template_dokumen::index');
	$routes->get('template-dokumen-edit/(:segment)', 'Template_dokumen_edit::index/$1');
	$routes->get('template-dokumen-edit/(:segment)/(:segment)', 'Template_dokumen_edit::index/$1/$2');
	$routes->get('template-dokumen-lihat', 'Template_dokumen_lihat::index');
	$routes->get('template-dokumen-lihat/(:segment)', 'Template_dokumen_lihat::index/$1');
	$routes->get('template-dokumen-lihat/(:segment)/(:segment)', 'Template_dokumen_lihat::index/$1/$2');

	$routes->get('template-dokumen-print', 'Template_dokumen_print::index');
	$routes->get('template-dokumen-print/(:segment)', 'Template_dokumen_print::index/$1');
	$routes->get('template-dokumen-print/(:segment)/(:segment)', 'Template_dokumen_print::index/$1/$2');

	$routes->post('template-dokumen-update', 'Template_dokumen_update::index');

	$routes->get('template-email-list', 'Template_email_list::index');
	$routes->get('template-email-edit', 'Template_email_edit::index');
	$routes->get('template-email-edit/(:segment)', 'Template_email_edit::index/$1');
	$routes->post('template-email-update', 'Template_email_update::index');
	$routes->get('template-email-print', 'Template_email_print::index');
	$routes->get('template-email-print/(:segment)', 'Template_email_print::index/$1');

	$routes->get('kode-kata', 'Kode_kata::index');
	$routes->get('kode-kata/(:segment)', 'Kode_kata::index/$1');
	$routes->post('kode-kata', 'Kode_kata::index');
	$routes->get('kode-kata-edit', 'Kode_kata_edit::index');
	$routes->get('kode-kata-edit/(:segment)', 'Kode_kata_edit::index/$1');
	$routes->post('kode-kata-update', 'Kode_kata_update::index');

	$routes->get('user', 'User::index');
	$routes->get('user/(:segment)', 'User::index/$1');
	$routes->get('user-lihat', 'User_lihat::index');
	$routes->get('user-lihat/(:segment)', 'User_lihat::index/$1');
	$routes->get('user-edit', 'User_edit::index');
	$routes->get('user-edit/(:segment)', 'User_edit::index/$1');
	$routes->post('user-update', 'User_update::index');
});

$routes->group('operator', ['namespace' => 'Operator\Controllers'], function ($routes) {
	$routes->get('/', 'Beranda::index');
	$routes->get('beranda', 'Beranda::index');
	$routes->get('kependudukan', 'Kependudukan::index');
	$routes->get('dalam-pengembangan', 'Dalam_pengembangan::index');

	$routes->get('data-diri', 'Data_diri::index');
	$routes->get('data-diri-edit', 'Data_diri_edit::index');
	$routes->post('data-diri-update', 'Data_diri_update::index');

	$routes->get('setting-akun', 'Setting_akun::index');

	$routes->get('ganti-password-edit', 'Ganti_password_edit::index');
	$routes->post('ganti-password-update', 'Ganti_password_update::index');

	$routes->get('template-dokumen', 'Template_dokumen::index');
	$routes->get('template-dokumen/(:segment)', 'Template_dokumen::index/$1');
	$routes->get('template-dokumen-edit', 'Template_dokumen::index');
	$routes->get('template-dokumen-edit/(:segment)', 'Template_dokumen_edit::index/$1');
	$routes->get('template-dokumen-edit/(:segment)/(:segment)', 'Template_dokumen_edit::index/$1/$2');
	$routes->get('template-dokumen-lihat', 'Template_dokumen_lihat::index');
	$routes->get('template-dokumen-lihat/(:segment)', 'Template_dokumen_lihat::index/$1');
	$routes->get('template-dokumen-lihat/(:segment)/(:segment)', 'Template_dokumen_lihat::index/$1/$2');

	$routes->get('template-dokumen-print', 'Template_dokumen_print::index');
	$routes->get('template-dokumen-print/(:segment)', 'Template_dokumen_print::index/$1');
	$routes->get('template-dokumen-print/(:segment)/(:segment)', 'Template_dokumen_print::index/$1/$2');

	$routes->post('template-dokumen-update', 'Template_dokumen_update::index');

	$routes->get('informasi-layanan', 'Informasi_layanan::index');
	$routes->get('informasi-layanan/(:segment)', 'Informasi_layanan::index/$1');
	$routes->get('informasi-layanan-edit', 'Informasi_layanan::index');
	$routes->get('informasi-layanan-edit/(:segment)', 'Informasi_layanan_edit::index/$1');
	$routes->get('informasi-layanan-edit/(:segment)/(:segment)', 'Informasi_layanan_edit::index/$1/$2');
	$routes->get('informasi-layanan-lihat', 'Informasi_layanan_lihat::index');
	$routes->get('informasi-layanan-lihat/(:segment)', 'Informasi_layanan_lihat::index/$1');
	$routes->get('informasi-layanan-lihat/(:segment)/(:segment)', 'Informasi_layanan_lihat::index/$1/$2');

	$routes->get('informasi-layanan-print', 'Informasi_layanan_print::index');
	$routes->get('informasi-layanan-print/(:segment)', 'Informasi_layanan_print::index/$1');
	$routes->get('informasi-layanan-print/(:segment)/(:segment)', 'Informasi_layanan_print::index/$1/$2');

	$routes->post('informasi-layanan-update', 'Informasi_layanan_update::index');

	$routes->get('layanan-surat', 'Layanan_surat::index');

	$routes->get('data-surat', 'Data_surat::index');
	$routes->get('data-surat/(:segment)', 'Data_surat::index/$1');

	$routes->get('data-surat-preview', 'Data_surat_preview::index');
	$routes->get('data-surat-preview/(:segment)', 'Data_surat_preview::index/$1');

	$routes->get('data-surat-print', 'Data_surat_print::index');
	$routes->get('data-surat-print/(:segment)', 'Data_surat_print::index/$1');

	$routes->get('data-surat-lihat', 'Data_surat_lihat::index');
	$routes->get('data-surat-lihat/(:segment)', 'Data_surat_lihat::index/$1');

	$routes->get('tiket-undangan', 'Tiket_undangan::index');
	$routes->get('tiket-undangan/(:segment)', 'Tiket_undangan::index/$1');

	$routes->get('tiket-undangan-edit', 'Tiket_undangan_edit::index');
	$routes->get('tiket-undangan-edit/(:segment)', 'Tiket_undangan_edit::index/$1');
	$routes->post('tiket-undangan-update', 'Tiket_undangan_update::index');

	//SURAT KETERANGAN KELAHIRAN
	$routes->get('surat-kelahiran', 'Surat_kelahiran::index');
	$routes->get('surat-kelahiran/(:segment)', 'Surat_kelahiran::index/$1');

	$routes->get('surat-kelahiran-lihat', 'Surat_kelahiran_lihat::index');
	$routes->get('surat-kelahiran-lihat/(:segment)', 'Surat_kelahiran_lihat::index/$1');
	$routes->get('surat-kelahiran-editor', 'Surat_kelahiran_editor::index');
	$routes->get('surat-kelahiran-editor/(:segment)', 'Surat_kelahiran_editor::index/$1');
	$routes->post('surat-kelahiran-editor-update', 'Surat_kelahiran_editor_update::index');
	$routes->get('surat-kelahiran-edit', 'Surat_kelahiran_edit::index');
	$routes->get('surat-kelahiran-edit/(:segment)', 'Surat_kelahiran_edit::index/$1');
	$routes->post('surat-kelahiran-update', 'Surat_kelahiran_update::index');

	//SURAT KETERANGAN KEMATIAN
	$routes->get('surat-kematian', 'Surat_kematian::index');
	$routes->get('surat-kematian/(:segment)', 'Surat_kematian::index/$1');

	$routes->get('surat-kematian-lihat', 'Surat_kematian_lihat::index');
	$routes->get('surat-kematian-lihat/(:segment)', 'Surat_kematian_lihat::index/$1');
	$routes->get('surat-kematian-editor', 'Surat_kematian_editor::index');
	$routes->get('surat-kematian-editor/(:segment)', 'Surat_kematian_editor::index/$1');
	$routes->post('surat-kematian-editor-update', 'Surat_kematian_editor_update::index');
	$routes->get('surat-kematian-edit', 'Surat_kematian_edit::index');
	$routes->get('surat-kematian-edit/(:segment)', 'Surat_kematian_edit::index/$1');
	$routes->post('surat-kematian-update', 'Surat_kematian_update::index');

	//SURAT KETERANGAN PEMAKAMAN
	$routes->get('surat-pemakaman', 'Surat_pemakaman::index');
	$routes->get('surat-pemakamans', 'Surat_pemakamans::index');
	$routes->get('surat-pemakaman/(:segment)', 'Surat_pemakaman::index/$1');

	$routes->get('surat-pemakaman-lihat', 'Surat_pemakaman_lihat::index');
	$routes->get('surat-pemakaman-lihat/(:segment)', 'Surat_pemakaman_lihat::index/$1');
	$routes->get('surat-pemakaman-editor', 'Surat_pemakaman_editor::index');
	$routes->get('surat-pemakaman-editor/(:segment)', 'Surat_pemakaman_editor::index/$1');
	$routes->post('surat-pemakaman-editor-update', 'Surat_pemakaman_editor_update::index');
	$routes->get('surat-pemakaman-edit', 'Surat_pemakaman_edit::index');
	$routes->get('surat-pemakaman-edit/(:segment)', 'Surat_pemakaman_edit::index/$1');
	$routes->post('surat-pemakaman-update', 'Surat_pemakaman_update::index');

	//SURAT PENGANTAR KETERANGAN CATATAN KEPOLISIAN
	$routes->get('surat-catatan-kepolisian', 'Surat_catatan_kepolisian::index');
	$routes->get('surat-catatan-kepolisian/(:segment)', 'Surat_catatan_kepolisian::index/$1');

	$routes->get('surat-catatan-kepolisian-lihat', 'Surat_catatan_kepolisian_lihat::index');
	$routes->get('surat-catatan-kepolisian-lihat/(:segment)', 'Surat_catatan_kepolisian_lihat::index/$1');
	$routes->get('surat-catatan-kepolisian-editor', 'Surat_catatan_kepolisian_editor::index');
	$routes->get('surat-catatan-kepolisian-editor/(:segment)', 'Surat_catatan_kepolisian_editor::index/$1');
	$routes->post('surat-catatan-kepolisian-editor-update', 'Surat_catatan_kepolisian_editor_update::index');
	$routes->get('surat-catatan-kepolisian-edit', 'Surat_catatan_kepolisian_edit::index');
	$routes->get('surat-catatan-kepolisian-edit/(:segment)', 'Surat_catatan_kepolisian_edit::index/$1');
	$routes->post('surat-catatan-kepolisian-update', 'Surat_catatan_kepolisian_update::index');

	//SURAT PENGANTAR PENCARI KERJA
	$routes->get('surat-pencari-kerja', 'Surat_pencari_kerja::index');
	$routes->get('surat-pencari-kerja/(:segment)', 'Surat_pencari_kerja::index/$1');

	$routes->get('surat-pencari-kerja-lihat', 'Surat_pencari_kerja_lihat::index');
	$routes->get('surat-pencari-kerja-lihat/(:segment)', 'Surat_pencari_kerja_lihat::index/$1');
	$routes->get('surat-pencari-kerja-editor', 'Surat_pencari_kerja_editor::index');
	$routes->get('surat-pencari-kerja-editor/(:segment)', 'Surat_pencari_kerja_editor::index/$1');
	$routes->post('surat-pencari-kerja-editor-update', 'Surat_pencari_kerja_editor_update::index');
	$routes->get('surat-pencari-kerja-edit', 'Surat_pencari_kerja_edit::index');
	$routes->get('surat-pencari-kerja-edit/(:segment)', 'Surat_pencari_kerja_edit::index/$1');
	$routes->post('surat-pencari-kerja-update', 'Surat_pencari_kerja_update::index');

	//SURAT PENGANTAR NIKAH
	$routes->get('surat-pengantar-nikah', 'Surat_pengantar_nikah::index');
	$routes->get('surat-pengantar-nikah/(:segment)', 'Surat_pengantar_nikah::index/$1');

	$routes->get('surat-pengantar-nikah-lihat', 'Surat_pengantar_nikah_lihat::index');
	$routes->get('surat-pengantar-nikah-lihat/(:segment)', 'Surat_pengantar_nikah_lihat::index/$1');
	$routes->get('surat-pengantar-nikah-editor', 'Surat_pengantar_nikah_editor::index');
	$routes->get('surat-pengantar-nikah-editor/(:segment)', 'Surat_pengantar_nikah_editor::index/$1');
	$routes->post('surat-pengantar-nikah-editor-update', 'Surat_pengantar_nikah_editor_update::index');
	$routes->get('surat-pengantar-nikah-edit', 'Surat_pengantar_nikah_edit::index');
	$routes->get('surat-pengantar-nikah-edit/(:segment)', 'Surat_pengantar_nikah_edit::index/$1');
	$routes->post('surat-pengantar-nikah-update', 'Surat_pengantar_nikah_update::index');

	//SURAT KETERANGAN BELUM MEMILIKI RUMAH
	$routes->get('surat-belum-memiliki-rumah', 'Surat_belum_memiliki_rumah::index');
	$routes->get('surat-belum-memiliki-rumah/(:segment)', 'Surat_belum_memiliki_rumah::index/$1');

	$routes->get('surat-belum-memiliki-rumah-lihat', 'Surat_belum_memiliki_rumah_lihat::index');
	$routes->get('surat-belum-memiliki-rumah-lihat/(:segment)', 'Surat_belum_memiliki_rumah_lihat::index/$1');
	$routes->get('surat-belum-memiliki-rumah-editor', 'Surat_belum_memiliki_rumah_editor::index');
	$routes->get('surat-belum-memiliki-rumah-editor/(:segment)', 'Surat_belum_memiliki_rumah_editor::index/$1');
	$routes->post('surat-belum-memiliki-rumah-editor-update', 'Surat_belum_memiliki_rumah_editor_update::index');
	$routes->get('surat-belum-memiliki-rumah-edit', 'Surat_belum_memiliki_rumah_edit::index');
	$routes->get('surat-belum-memiliki-rumah-edit/(:segment)', 'Surat_belum_memiliki_rumah_edit::index/$1');
	$routes->post('surat-belum-memiliki-rumah-update', 'Surat_belum_memiliki_rumah_update::index');

	//SURAT KETERANGAN TIDAK MAMPU
	$routes->get('surat-ket-tidak-mampu', 'Surat_ket_tidak_mampu::index');
	$routes->get('surat-ket-tidak-mampu/(:segment)', 'Surat_ket_tidak_mampu::index/$1');

	$routes->get('surat-ket-tidak-mampu-lihat', 'Surat_ket_tidak_mampu_lihat::index');
	$routes->get('surat-ket-tidak-mampu-lihat/(:segment)', 'Surat_ket_tidak_mampu_lihat::index/$1');
	$routes->get('surat-ket-tidak-mampu-editor', 'Surat_ket_tidak_mampu_editor::index');
	$routes->get('surat-ket-tidak-mampu-editor/(:segment)', 'Surat_ket_tidak_mampu_editor::index/$1');
	$routes->post('surat-ket-tidak-mampu-editor-update', 'Surat_ket_tidak_mampu_editor_update::index');
	$routes->get('surat-ket-tidak-mampu-edit', 'Surat_ket_tidak_mampu_edit::index');
	$routes->get('surat-ket-tidak-mampu-edit/(:segment)', 'Surat_ket_tidak_mampu_edit::index/$1');
	$routes->post('surat-ket-tidak-mampu-update', 'Surat_ket_tidak_mampu_update::index');

	//SURAT KETERANGAN STATUS JANDA
	$routes->get('surat-ket-janda', 'Surat_ket_janda::index');
	$routes->get('surat-ket-janda/(:segment)', 'Surat_ket_janda::index/$1');

	$routes->get('surat-ket-janda-lihat', 'Surat_ket_janda_lihat::index');
	$routes->get('surat-ket-janda-lihat/(:segment)', 'Surat_ket_janda_lihat::index/$1');
	$routes->get('surat-ket-janda-editor', 'Surat_ket_janda_editor::index');
	$routes->get('surat-ket-janda-editor/(:segment)', 'Surat_ket_janda_editor::index/$1');
	$routes->post('surat-ket-janda-editor-update', 'Surat_ket_janda_editor_update::index');
	$routes->get('surat-ket-janda-edit', 'Surat_ket_janda_edit::index');
	$routes->get('surat-ket-janda-edit/(:segment)', 'Surat_ket_janda_edit::index/$1');
	$routes->post('surat-ket-janda-update', 'Surat_ket_janda_update::index');

	$routes->get('data-penduduk', 'Data_penduduk::index');
	$routes->get('data-penduduk-lihat', 'Data_penduduk_lihat::index');
	$routes->get('data-penduduk-lihat/(:segment)', 'Data_penduduk_lihat::index/$1');

	$routes->get('data-kartu-keluarga', 'Data_kartu_keluarga::index');
	$routes->get('data-kartu-keluarga-lihat', 'Data_kartu_keluarga_lihat::index');
	$routes->get('data-kartu-keluarga-lihat/(:segment)', 'Data_kartu_keluarga_lihat::index/$1');

	$routes->get('anggota-keluarga', 'Anggota_keluarga::index');
	$routes->get('anggota-keluarga/(:segment)', 'Anggota_keluarga::index/$1');

	$routes->get('anggota-keluarga-lihat', 'Anggota_keluarga_lihat::index');
	$routes->get('anggota-keluarga-lihat/(:segment)', 'Anggota_keluarga_lihat::index/$1');
	$routes->get('anggota-keluarga-edit', 'Anggota_keluarga_edit::index');
	$routes->get('anggota-keluarga-edit/(:segment)', 'Anggota_keluarga_edit::index/$1');
	$routes->post('anggota-keluarga-update', 'Anggota_keluarga_update::index');

	$routes->get('kartu-keluarga', 'Kartu_keluarga::index');
	$routes->get('kartu-keluarga/(:segment)', 'Kartu_keluarga::index/$1');

	$routes->get('kartu-keluarga-lihat', 'Kartu_keluarga_lihat::index');
	$routes->get('kartu-keluarga-lihat/(:segment)', 'Kartu_keluarga_lihat::index/$1');
	$routes->get('kartu-keluarga-edit', 'Kartu_keluarga_edit::index');
	$routes->get('kartu-keluarga-edit/(:segment)', 'Kartu_keluarga_edit::index/$1');
	$routes->post('kartu-keluarga-update', 'Kartu_keluarga_update::index');
});

$routes->group('penduduk', ['namespace' => 'Penduduk\Controllers'], function ($routes) {
	$routes->get('/', 'Beranda::index');
	$routes->get('beranda', 'Beranda::index');
	$routes->get('dalam-pengembangan', 'Dalam_pengembangan::index');

	$routes->get('data-diri', 'Data_diri::index');
	$routes->get('data-diri-edit', 'Data_diri_edit::index');
	$routes->post('data-diri-update', 'Data_diri_update::index');

	$routes->get('setting-akun', 'Setting_akun::index');

	$routes->get('ganti-password-edit', 'Ganti_password_edit::index');
	$routes->post('ganti-password-update', 'Ganti_password_update::index');

	$routes->get('kependudukan', 'Kependudukan::index');

	$routes->get('layanan-surat', 'Layanan_surat::index');

	$routes->get('tiket-undangan', 'Tiket_undangan::index');
	$routes->get('tiket-undangan/(:segment)', 'Tiket_undangan::index/$1');

	$routes->get('tiket-undangan-lihat', 'Tiket_undangan_lihat::index');
	$routes->get('tiket-undangan-lihat/(:segment)', 'Tiket_undangan_lihat::index/$1');

	//SURAT KETERANGAN KELAHIRAN
	$routes->get('surat-kelahiran', 'Surat_kelahiran::index');
	$routes->get('surat-kelahiran/(:segment)', 'Surat_kelahiran::index/$1');

	$routes->get('surat-kelahiran-lihat', 'Surat_kelahiran_lihat::index');
	$routes->get('surat-kelahiran-lihat/(:segment)', 'Surat_kelahiran_lihat::index/$1');
	$routes->get('surat-kelahiran-edit', 'Surat_kelahiran_edit::index');
	$routes->get('surat-kelahiran-edit/(:segment)', 'Surat_kelahiran_edit::index/$1');
	$routes->post('surat-kelahiran-update', 'Surat_kelahiran_update::index');

	//SURAT PENGANTAR NIKAH
	$routes->get('surat-pengantar-nikah', 'Surat_pengantar_nikah::index');
	$routes->get('surat-pengantar-nikah/(:segment)', 'Surat_pengantar_nikah::index/$1');

	$routes->get('surat-pengantar-nikah-lihat', 'Surat_pengantar_nikah_lihat::index');
	$routes->get('surat-pengantar-nikah-lihat/(:segment)', 'Surat_pengantar_nikah_lihat::index/$1');
	$routes->get('surat-pengantar-nikah-edit', 'Surat_pengantar_nikah_edit::index');
	$routes->get('surat-pengantar-nikah-edit/(:segment)', 'Surat_pengantar_nikah_edit::index/$1');
	$routes->post('surat-pengantar-nikah-update', 'Surat_pengantar_nikah_update::index');

	//SURAT KETERANGAN KEMATIAN
	$routes->get('surat-kematian', 'Surat_kematian::index');
	$routes->get('surat-kematian/(:segment)', 'Surat_kematian::index/$1');

	$routes->get('surat-kematian-lihat', 'Surat_kematian_lihat::index');
	$routes->get('surat-kematian-lihat/(:segment)', 'Surat_kematian_lihat::index/$1');
	$routes->get('surat-kematian-edit', 'Surat_kematian_edit::index');
	$routes->get('surat-kematian-edit/(:segment)', 'Surat_kematian_edit::index/$1');
	$routes->post('surat-kematian-update', 'Surat_kematian_update::index');

	//SURAT KETERANGAN PEMAKAMAN
	$routes->get('surat-pemakaman', 'Surat_pemakaman::index');
	$routes->get('surat-pemakaman/(:segment)', 'Surat_pemakaman::index/$1');

	$routes->get('surat-pemakaman-lihat', 'Surat_pemakaman_lihat::index');
	$routes->get('surat-pemakaman-lihat/(:segment)', 'Surat_pemakaman_lihat::index/$1');
	$routes->get('surat-pemakaman-edit', 'Surat_pemakaman_edit::index');
	$routes->get('surat-pemakaman-edit/(:segment)', 'Surat_pemakaman_edit::index/$1');
	$routes->post('surat-pemakaman-update', 'Surat_pemakaman_update::index');

	//SURAT KETERANGAN CATATAN KEPOLISIAN
	$routes->get('surat-catatan-kepolisian', 'Surat_catatan_kepolisian::index');
	$routes->get('surat-catatan-kepolisian/(:segment)', 'Surat_catatan_kepolisian::index/$1');

	$routes->get('surat-catatan-kepolisian-lihat', 'Surat_catatan_kepolisian_lihat::index');
	$routes->get('surat-catatan-kepolisian-lihat/(:segment)', 'Surat_catatan_kepolisian_lihat::index/$1');
	$routes->get('surat-catatan-kepolisian-edit', 'Surat_catatan_kepolisian_edit::index');
	$routes->get('surat-catatan-kepolisian-edit/(:segment)', 'Surat_catatan_kepolisian_edit::index/$1');
	$routes->post('surat-catatan-kepolisian-update', 'Surat_catatan_kepolisian_update::index');

	//SURAT PENGANTAR PENCARI KERJA
	$routes->get('surat-pencari-kerja', 'Surat_pencari_kerja::index');
	$routes->get('surat-pencari-kerja/(:segment)', 'Surat_pencari_kerja::index/$1');

	$routes->get('surat-pencari-kerja-lihat', 'Surat_pencari_kerja_lihat::index');
	$routes->get('surat-pencari-kerja-lihat/(:segment)', 'Surat_pencari_kerja_lihat::index/$1');
	$routes->get('surat-pencari-kerja-edit', 'Surat_pencari_kerja_edit::index');
	$routes->get('surat-pencari-kerja-edit/(:segment)', 'Surat_pencari_kerja_edit::index/$1');
	$routes->post('surat-pencari-kerja-update', 'Surat_pencari_kerja_update::index');

	//SURAT KETERANGAN BELUM MEMILIKI RUMAH
	$routes->get('surat-belum-memiliki-rumah', 'Surat_belum_memiliki_rumah::index');
	$routes->get('surat-belum-memiliki-rumah/(:segment)', 'Surat_belum_memiliki_rumah::index/$1');

	$routes->get('surat-belum-memiliki-rumah-lihat', 'Surat_belum_memiliki_rumah_lihat::index');
	$routes->get('surat-belum-memiliki-rumah-lihat/(:segment)', 'Surat_belum_memiliki_rumah_lihat::index/$1');
	$routes->get('surat-belum-memiliki-rumah-edit', 'Surat_belum_memiliki_rumah_edit::index');
	$routes->get('surat-belum-memiliki-rumah-edit/(:segment)', 'Surat_belum_memiliki_rumah_edit::index/$1');
	$routes->post('surat-belum-memiliki-rumah-update', 'Surat_belum_memiliki_rumah_update::index');

	//SURAT KETERANGAN TIDAK MAMPU
	$routes->get('surat-ket-tidak-mampu', 'Surat_ket_tidak_mampu::index');
	$routes->get('surat-ket-tidak-mampu/(:segment)', 'Surat_ket_tidak_mampu::index/$1');

	$routes->get('surat-ket-tidak-mampu-lihat', 'Surat_ket_tidak_mampu_lihat::index');
	$routes->get('surat-ket-tidak-mampu-lihat/(:segment)', 'Surat_ket_tidak_mampu_lihat::index/$1');
	$routes->get('surat-ket-tidak-mampu-edit', 'Surat_ket_tidak_mampu_edit::index');
	$routes->get('surat-ket-tidak-mampu-edit/(:segment)', 'Surat_ket_tidak_mampu_edit::index/$1');
	$routes->post('surat-ket-tidak-mampu-update', 'Surat_ket_tidak_mampu_update::index');

	//SURAT KETERANGAN STATUS JANDA
	$routes->get('surat-ket-janda', 'Surat_ket_janda::index');
	$routes->get('surat-ket-janda/(:segment)', 'Surat_ket_janda::index/$1');

	$routes->get('surat-ket-janda-lihat', 'Surat_ket_janda_lihat::index');
	$routes->get('surat-ket-janda-lihat/(:segment)', 'Surat_ket_janda_lihat::index/$1');
	$routes->get('surat-ket-janda-edit', 'Surat_ket_janda_edit::index');
	$routes->get('surat-ket-janda-edit/(:segment)', 'Surat_ket_janda_edit::index/$1');
	$routes->post('surat-ket-janda-update', 'Surat_ket_janda_update::index');

	$routes->get('kartu-keluarga', 'Kartu_keluarga::index');
	$routes->get('kartu-keluarga/(:segment)', 'Kartu_keluarga::index/$1');

	$routes->get('kartu-keluarga-lihat', 'Kartu_keluarga_lihat::index');
	$routes->get('kartu-keluarga-lihat/(:segment)', 'Kartu_keluarga_lihat::index/$1');
	$routes->get('kartu-keluarga-edit', 'Kartu_keluarga_edit::index');
	$routes->get('kartu-keluarga-edit/(:segment)', 'Kartu_keluarga_edit::index/$1');
	$routes->post('kartu-keluarga-update', 'Kartu_keluarga_update::index');

	$routes->get('anggota-keluarga', 'Anggota_keluarga::index');
	$routes->get('anggota-keluarga/(:segment)', 'Anggota_keluarga::index/$1');

	$routes->get('anggota-keluarga-lihat', 'Anggota_keluarga_lihat::index');
	$routes->get('anggota-keluarga-lihat/(:segment)', 'Anggota_keluarga_lihat::index/$1');
	$routes->get('anggota-keluarga-edit', 'Anggota_keluarga_edit::index');
	$routes->get('anggota-keluarga-edit/(:segment)', 'Anggota_keluarga_edit::index/$1');
	$routes->post('anggota-keluarga-update', 'Anggota_keluarga_update::index');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
