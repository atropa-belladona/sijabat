<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class PegawaiController extends BaseController
{
	protected $pegawaiModel;

	public function __construct()
	{
		ini_set('memory_limit', '-1');

		$this->pegawaiModel = new PegawaiModel();
	}

	public function index()
	{
		$data['titlePage'] = 'Daftar Pegawai';
		$data['menu'] = 'pegawai-index';
		$data['content_title'] = 'Daftar Pegawai';

		$data['pegawai'] = $this->pegawaiModel->getListPegawaiAktif();

		$id_sdm = $this->request->getGet('id');

		// if pegawai selected, show detail
		if ($id_sdm) {
			$data_sdm =	$this->detail($id_sdm);

			// if pegawai valid then show detail page
			if ($data_sdm['pegawai'] != null) {
				return view('pegawai/detail', $data_sdm);
			}

			// else redirect to index page
			return redirect()->route('pegawai_index')->with('app_error', 'Data pegawai tidak ditemukan');
		}

		// if pegawai not selected show index 
		return view('pegawai/index', $data);
	}

	protected function detail($id_sdm)
	{
		$data['titlePage'] = 'Pegawai';
		$data['menu'] = 'pegawai-index';
		$data['content_title'] = 'Data Pegawai';

		$data_sdm = $this->pegawaiModel->getDetailSDM($id_sdm);

		if ($data_sdm) {
			return array_merge($data, $data_sdm);
		}

		return null;
	}
}
