<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

// Login/out
$routes->get('login', 'AuthController::login', ['as' => 'login']);
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');

// Registration
$routes->get('register', 'AuthController::register', ['as' => 'register']);
$routes->post('register', 'AuthController::attemptRegister');

// Activation
$routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
$routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

// Forgot/Resets
$routes->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
$routes->post('forgot', 'AuthController::attemptForgot');
$routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
$routes->post('reset-password', 'AuthController::attemptReset');



// Apps Routes
$routes->group('', ['filter' => 'login'], function ($routes) {
	$routes->get('/', 'Home::index');
	$routes->get('/home', 'Home::index', ['as' => 'home']);

	// Route Pengaturan Pengguna (Group Administrator)
	$routes->group('users', ['filter' => 'role:administrator'], function ($routes) {
		$routes->get('/', 'UserController::index', ['as' => 'user_list']);
		$routes->get('create', 'UserController::create', ['as' => 'user_create']);
		$routes->post('create', 'UserController::store', ['as' => 'user_store']);
	});

	// Routes for Koordinator and Administrator
	$routes->group('data', ['filter' => 'role:koordinator,administrator'], function ($routes) {
		// pegawai related routes
		$routes->get('pegawai', 'DataController::pegawai_index', ['as' => 'data_pegawai']);
		$routes->post('pegawai', 'DataController::pegawai_sinkronisasi', ['as' => 'sinkronisasi_pegawai']);
		$routes->get('pegawai/(:segment)', 'DataController::pegawai_detail/$1', ['as' => 'detail_pegawai']);

		$routes->get('sinkronalldata', 'DataController::sinkronisasi_all_data', ['as' => 'sinkron_all_data']);

		// referensi related routes
		$routes->get('referensi', 'DataController::referensi_index', ['as' => 'data_referensi']);
		$routes->post('referensi', 'DataController::referensi_sinkronisasi', ['as' => 'sinkronisasi_referensi']);

		// periode penilaian related routes
		$routes->get('periode-penilaian', 'DataController::periode_penilaian_index', ['as' => 'periode_penilaian']);
		$routes->post('periode-penilaian', 'DataController::periode_penilaian_store', ['as' => 'periode_penilaian_store']);
	});

	// Route detail pegawai
	$routes->group('pegawai', function ($routes) {
		$routes->get('/', 'PegawaiController::index', ['as' => 'pegawai_index']);
		// $routes->get('(:segment)', 'PegawaiController::detail/$1', ['as' => 'pegawai_detail']);
	});

	// Route Dosen
	$routes->group('dosen', ['filter' => 'role:dosen'], function ($routes) {
		$routes->get('/', 'UserController::indexdosen', ['as' => 'dosen_list']);
		$routes->get('dokumen', 'UserController::dokumen', ['as' => 'dosen-dokumen']);
		$routes->get('rekap', 'UserController::rekap', ['as' => 'dosen-rekap']);
	});

	// DUPAK Routes
	// DUPAK List Index route
	$routes->get('dupak', 'DupakController::index', ['as' => 'dupak_index']);

	$routes->group('dupak', function ($routes) {
		// delete dupak route
		$routes->delete('(:segment)', 'DupakController::delete/$1', ['as' => 'dupak_delete', 'filter' => 'role:operator,dosen']);

		// create dupak route
		$routes->get('create', 'DupakController::create', ['as' => 'dupak_create', 'filter' => 'role:dosen']);
		$routes->get('create/(:segment)', 'DupakController::operator_request/$1', ['as' => 'operator_request', 'filter' => 'role:operator']);
		$routes->post('create', 'DupakController::store', ['as' => 'dupak_store', 'filter' => 'role:dosen,operator']);

		// detail dupak route
		$routes->get('detail/(:segment)', 'DupakController::show/$1', ['as' => 'dupak_detail']);
		$routes->post('detail/(:segment)', 'DupakController::update/$1', ['as' => 'dupak_update', 'filter' => 'role:dosen,operator,koordinator']);

		// list usulan by kategori kegiatan route
		$routes->get('detail/(:segment)/list', 'DupakController::list_usulan/$1', ['as' => 'dupak_list', 'filter' => 'role:dosen,operator']);
		$routes->get('detail/(:segment)/kegiatan', 'DupakController::show_add_ak/$1', ['as' => 'dupak_detail_kegiatan']);
		$routes->post('detail/(:segment)/kegiatan/delete/(:any)', 'DupakController::delete_ak/$1/$2', ['as' => 'dupak_detail_delete']);

		$routes->get('evaluasi', 'DupakController::dupak_evaluasi', ['as' => 'dupak_evaluasi']);
		$routes->post('evaluasi/(:any)/store', 'DupakController::dupak_evaluasi_store/$1', ['as' => 'dupak_evaluasi_store']);

		$routes->get('cetak_sp', 'DupakController::view_cetak_sp', ['as' => 'view_cetak_sp']);
		$routes->post('cetak_sp', 'DupakController::store_cetak_sp', ['as' => 'store_cetak_sp']);

		// add dupak component
		$routes->get('detail/(:any)/(:any)/kategori', 'DupakController::add_ak/$1/$2', ['as' => 'dupak_addak']);
		$routes->post('detail/(:any)/(:any)/(:any)/store', 'DupakController::store_add_ak/$1/$2/$3', ['as' => 'dupak_store_addak']);


		$routes->post('detail/(:any)/upload_dokumen', 'DupakController::store_dupak_dokumen/$1', ['as' => 'dupak_store_dokumen']);
		$routes->get('detail/(:any)/dokumen', 'DupakController::getDokumenPengantar/$1', ['as' => 'dupak_get_dokumen']);
		$routes->post('detail/dokumen/delete/(:any)', 'DupakController::deleteDokumenPengantar/$1', ['as' => 'dupak_delete_dokumen']);

		// acc fakultas
		$routes->post('acc_fakultas_yes/(:segment)', 'DupakController::acc_fakultas_yes/$1', ['as' => 'acc_fakultas_yes']);
		$routes->post('acc_fakultas_no/(:segment)', 'DupakController::acc_fakultas_no/$1', ['as' => 'acc_fakultas_no']);

		// tambah penilai
		$routes->post('store_penilai/(:segment)', 'DupakController::store_penilai/$1', ['as' => 'store_penilai']);
		$routes->post('delete_penilai/(:segment)', 'DupakController::delete_penilai/$1', ['as' => 'delete_penilai']);


		// send dupak
		$routes->post('detail/(:segment)/kirim', 'DupakController::send_dupak/$1', ['as' => 'dupak_send']);

		// return dupak
		$routes->post('detail/(:segment)/return', 'DupakController::return_dupak/$1', ['as' => 'dupak_return']);

		// reject dupak
		$routes->post('detail/(:segment)/reject', 'DupakController::reject_dupak/$1', ['as' => 'dupak_reject']);
	});


	// Import data by id_sdm from sister unj
	$routes->post('data/pegawai/(:segment)', 'DataController::import_data_sdm_sister/$1', ['as' => 'import_data_sdm_sister']);
});

$routes->get('print/rekap-dupak/(:segment)', 'PrintController::pdf_rekapdupak/$1', ['as' => 'pdf_rekapdupak']);
$routes->get('print/kartu-kendali/(:segment)', 'PrintController::pdf_kartukendali/$1', ['as' => 'pdf_kartukendali']);
$routes->get('print/sp-pendidikan/(:segment)', 'PrintController::pdf_sp_pendidikan/$1', ['as' => 'pdf_sp_pendidikan']);
$routes->get('print/sp-penelitian/(:segment)', 'PrintController::pdf_sp_penelitian/$1', ['as' => 'pdf_sp_penelitian']);
$routes->get('print/sp-pengabdian/(:segment)', 'PrintController::pdf_sp_pengabdian/$1', ['as' => 'pdf_sp_pengabdian']);
$routes->get('print/sp-penunjang/(:segment)', 'PrintController::pdf_sp_penunjang/$1', ['as' => 'pdf_sp_penunjang']);

$routes->get('dokumen/(:any)/(:any)/(:any)/download', 'DataController::download_dokumen/$1/$2/$3', ['as' => 'download_dokumen']);

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
