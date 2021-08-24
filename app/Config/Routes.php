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

$routes->group('', ['filter' => 'login'], function ($routes) {
	$routes->get('/', 'Home::index');
	$routes->get('/home', 'Home::index', ['as' => 'home']);

	// Route Pengaturan Pengguna (Group Administrator)
	$routes->group('users', ['filter' => 'role:administrator'], function ($routes) {
		$routes->get('/', 'UserController::index', ['as' => 'user_list']);
		$routes->get('create', 'UserController::create', ['as' => 'user_create']);
		$routes->post('create', 'UserController::store', ['as' => 'user_store']);
	});

	// Routes in Administrator which related to synchronization with sister
	$routes->group('data', ['filter' => 'role:administrator'], function ($routes) {
		$routes->get('pegawai', 'DataController::pegawai_index', ['as' => 'data_pegawai']);
		$routes->post('pegawai', 'DataController::pegawai_sinkronisasi', ['as' => 'sinkronisasi_pegawai']);
		$routes->get('pegawai/(:segment)', 'DataController::pegawai_detail/$1', ['as' => 'detail_pegawai']);

		$routes->get('referensi', 'DataController::referensi_index', ['as' => 'data_referensi']);
		$routes->post('referensi', 'DataController::referensi_sinkronisasi', ['as' => 'sinkronisasi_referensi']);
	});

	// Route detail pegawai
	$routes->group('pegawai', function ($routes) {
	});

	// Route Dosen
	$routes->group('dosen', ['filter' => 'role:dosen'], function ($routes) {
		$routes->get('/', 'UserController::indexdosen', ['as' => 'dosen_list']);
		$routes->get('dokumen', 'UserController::dokumen', ['as' => 'dosen-dokumen']);
		$routes->get('rekap', 'UserController::rekap', ['as' => 'dosen-rekap']);
	});
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
