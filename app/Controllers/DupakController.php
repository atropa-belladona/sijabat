<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DataModel;
use App\Models\DupakModel;
use App\Models\PegawaiModel;
use Config\Database;
use Config\Services;
use Exception;

class DupakController extends BaseController
{

	protected $db;

	protected $dataModel;
	protected $pegawaiModel;
	protected $dupakModel;

	protected $validation;

	public function __construct()
	{
		$this->db = Database::connect();

		$this->dataModel = new DataModel();
		$this->pegawaiModel = new PegawaiModel();
		$this->dupakModel = new DupakModel();

		$this->validation = Services::validation();

		$this->uuid = service('uuid');
	}

	public function index()
	{
		$data['titlePage'] = 'Daftar Usulan';
		$data['menu'] = 'dupak-daftar';
		$data['content_title'] = 'Daftar Usulan';

		if (in_groups('dosen')) {
			$data['dupak'] = $this->dupakModel->where('nidn', user()->username)
				->where('active', '1')
				->get()->getResult();
		} else {
			$data['dupak'] = $this->dupakModel->where('active', '1')->get()->getResult();
		}

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
		$rules = $this->validation->setRules(
			[
				'periode_penilaian' => 'required',
				'id_sdm' => 'required',
				'nama' => 'required',
				'nidn' => 'required',
			]
		);

		// run input validation
		if (!$this->validation->withRequest($this->request)->run()) {
			return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
		}

		$id_periode = $this->request->getPost('periode_penilaian');
		$id_sdm = $this->request->getPost('id_sdm');
		$nama_sdm = $this->request->getPost('nama');
		$nip = $this->request->getPost('nip');
		$nidn = $this->request->getPost('nidn');
		$no_karpeg = $this->request->getPost('no_karpeg');
		$pendidikan_terakhir = $this->request->getPost('pendidikan_terakhir');
		$jabfung = $this->request->getPost('jab_fung');
		$tmt_jabfung = $this->request->getPost('tmt_jab_fung');
		$mk_lama_thn = $this->request->getPost('mk_lama_thn');
		$mk_lama_bln = $this->request->getPost('mk_lama_bln');
		$mk_baru_thn = $this->request->getPost('mk_baru_thn');
		$mk_baru_bln = $this->request->getPost('mk_baru_bln');

		// store code here
		try {

			$this->dupakModel->insert([
				'id' => $this->uuid->uuid4()->toString(),
				'id_periode' => $id_periode,
				'id_sdm' => $id_sdm,
				'nama_sdm' => $nama_sdm,
				'nip' => $nip,
				'nidn' => $nidn,
				'no_karpeg' => $no_karpeg,
				'pendidikan_terakhir' => $pendidikan_terakhir,
				'jabfung' => $jabfung,
				'tmt_jabfung' => $tmt_jabfung,
				'mk_lama_thn' => $mk_lama_thn,
				'mk_lama_bln' => $mk_lama_bln,
				'mk_baru_thn' => $mk_baru_thn,
				'mk_baru_bln' => $mk_baru_bln,
				'created_by' => user()->id,
			]);

			return redirect()->back()->with('app_success', 'Data Usulan berhasil disimpan');
		} catch (Exception $ex) {
			return redirect()->back()->with('app_error', $ex->getMessage());
		}
	}
}
