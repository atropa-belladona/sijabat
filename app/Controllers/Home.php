<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PegawaiModel;
use App\Models\DataModel;

use Config\Database;

class Home extends BaseController
{
	public function __construct()
	{
		// User Model
		$this->userModel = new UserModel();

		// Dosen Model
		$this->pegawaiModel = new PegawaiModel();

		// Data Model
		$this->dataModel = new DataModel();

		$this->db = Database::connect();
	}

	public function index()
	{
		$data['titlePage'] = 'Beranda';
		$data['menu'] = 'beranda';
		$data['content_title'] = 'Beranda';

		// home for pegawai
		if (in_groups('dosen')) {
			$pegawai = $this->pegawaiModel->where('nidn', user()->username)->get();
			$data['pegawai'] = $pegawai->getRow();

			$home_data = $this->pegawaiModel->getDetailSDM($data['pegawai']->id_sdm);

			return view('pegawai/profile', array_merge($data, $home_data));
		}

		return view('index', $data);
	}
}
