<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DataModel;
use App\Models\PegawaiModel;
use Exception;

class DupakController extends BaseController
{

	protected $dataModel;
	protected $pegawaiModel;

	public function __construct()
	{
		$this->dataModel = new DataModel();
		$this->pegawaiModel = new PegawaiModel();
	}

	public function index()
	{
		$data['titlePage'] = 'Daftar Usulan';
		$data['menu'] = 'dupak-daftar';
		$data['content_title'] = 'Daftar Usulan';

		return view('dupak/index', $data);
	}

	public function create($nidn = null)
	{
		$data['titlePage'] = 'Buat Usulan';
		$data['menu'] = 'dupak-buat';
		$data['content_title'] = 'Buat Usulan';

		$data['periode_penilaian'] = $this->dataModel->getOpenPeriodePenilaian();

		if ($data['periode_penilaian']) {
			// if role is dosen then nidn = username
			if (in_groups('dosen')) {
				$nidn = user()->username;
			}

			$data['sdm'] = $this->pegawaiModel->getProfileSDMByNIDN($nidn);
			$data['pendidikan'] = $this->pegawaiModel->getPendidikanTerakhirSDM($data['sdm']->id_sdm);
		}

		return view('dupak/create', $data);
	}

	public function store()
	{
		try {
			// store code here

			return redirect()->back()->with('app_success', 'Data Usulan berhasil disimpan');
		} catch (Exception $ex) {
			return redirect()->back()->with('app_error', $ex->getMessage());
		}
	}
}
