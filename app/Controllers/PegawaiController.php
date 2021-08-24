<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class PegawaiController extends BaseController
{
	protected $pegawaiModel;

	public function __construct()
	{
		$this->pegawaiModel = new PegawaiModel();
	}

	public function index()
	{
		return redirect()->route('home');
	}

	public function detail($id_sdm)
	{

		return view('pegawai/detail');
	}
}
