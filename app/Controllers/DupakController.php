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
			$data['dupak'] = $this->dupakModel->getListUsulanPegawai(user()->username);
		} else {
			$data['dupak'] = $this->dupakModel->getListUsulan();
		}

		return view('dupak/index', $data);
	}

	public function create()
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
			$data['kepangkatan'] = $this->pegawaiModel->getGolonganTerakhir($data['sdm']->id_sdm);
		}

		return view('dupak/create', $data);
	}

	public function operator_request($id_sdm)
	{
		$data['titlePage'] = 'Buat Usulan';
		$data['menu'] = 'dupak-buat';
		$data['content_title'] = 'Buat Usulan';

		$data['periode_penilaian'] = $this->dataModel->getOpenPeriodePenilaian();

		if ($data['periode_penilaian']) {
			$data['sdm'] = $this->pegawaiModel->getInfoPegawaiByIdSDM($id_sdm);
			$data['pendidikan'] = $this->pegawaiModel->getPendidikanTerakhirSDM($id_sdm);
			$data['kepangkatan'] = $this->pegawaiModel->getGolonganTerakhir($id_sdm);
		}

		if (!$data['sdm'] or !$data['pendidikan']) {
			return redirect()->back()->with('app_error', 'Harap import data pegawai terlebih dahulu. Terima kasih');
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

			$this->dupakModel->transBegin();

			// check if pegawai already has pak request
			$check = $this->dupakModel->where('id_periode', $id_periode)
				->where('id_sdm', $id_sdm)
				->where('active', '1')
				->get()
				->getResult();

			if (count($check)) {
				return redirect()->route('dupak_index')->with('app_error', 'Pegawai memiliki pengajuan aktif pada periode ini');
			}

			// draft as default process
			$tahap_id = 1;

			// if operator request pak process skip to 10
			if (in_groups('operator')) {
				$tahap_id = 10;
			}

			$id_dupak = $this->uuid->uuid4()->toString();
			// if not insert data
			$store = $this->dupakModel->insert([
				'id' => $id_dupak,
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
				'tahap_id' => $tahap_id,
				'created_by' => user()->id,
			]);

			// record logs
			$this->setDupakLogs($id_dupak, $tahap_id);

			$this->dupakModel->transCommit();

			return redirect()->route('dupak_index')->with('app_success', 'Data Usulan berhasil disimpan');
		} catch (Exception $ex) {
			$this->dupakModel->transRollback();
			return redirect()->back()->with('app_error', $ex->getMessage());
		}
	}

	public function delete($id)
	{

		$dupak = $this->dupakModel->update($id, [
			'active' => '0'
		]);

		return redirect()->back()->with('app_success', 'Data berhasil dihapus');
	}

	public function show()
	{
		$data['titlePage'] = 'Detail Usulan';
		$data['menu'] = 'dupak-daftar';
		$data['content_title'] = 'Detail Usulan';

		if (!$this->request->getGet('id')) {
			return redirect()->route('home')->with('app_error', 'Data tidak ditemukan');
		}

		$id_dupak = $this->request->getGet('id');

		$data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);

		$pangkat = $this->pegawaiModel->getGolonganTerakhir($data['dupak']->id_sdm);

		helper('sisterws');
		$data['kepangkatan'] = sister_getDetailKepangkatan($pangkat->id);

		// $data['profile'] = $this->pegawaiModel->getInfoPegawaiByIdSDM($data['dupak']->id_sdm);
		// $data['pendidikan'] = $this->pegawaiModel->getPendidikanTerakhirSDM($data['dupak']->id_sdm);
		// $data['penugasan'] = $this->pegawaiModel->getPenugasanTerakhir($data['dupak']->id_sdm);

		$data_sdm = $this->pegawaiModel->getDetailSDM($data['dupak']->id_sdm);

		$data = array_merge($data, $data_sdm);

		return view('dupak/detail', $data);
	}


	public function send_dupak()
	{
		$uri = explode("id=", previous_url());

		$id_dupak = $uri[1];

		try {
			$next_process = $this->getNextProcess();

			$this->dupakModel->update($id_dupak, [
				'tahap_id' => $next_process['tahap']
			]);

			// logs
			$this->setDupakLogs($id_dupak, $next_process['tahap']);

			return redirect()->route('dupak_index')->with('app_success', $next_process['pesan']);
		} catch (Exception $ex) {
			return redirect()->back()->with('app_error', $ex->getMessage());
		}
	}

	public function return_dupak()
	{
		$uri = explode("id=", previous_url());

		$id_dupak = $uri[1];

		$catatan = $this->request->getPost('catatan');

		try {
			$return_process = $this->getReturnProcess();

			$this->dupakModel->update($id_dupak, [
				'tahap_id' => $return_process['tahap']
			]);

			// logs
			$this->setDupakLogs($id_dupak, $return_process['tahap'], $catatan);

			return redirect()->route('dupak_index')->with('app_success', $return_process['pesan']);
		} catch (Exception $ex) {
			return redirect()->back()->with('app_error', $ex->getMessage());
		}
	}




	// protected function

	protected function getNextProcess()
	{
		// first process as default
		$tahap_id = 1;
		$pesan = '';

		if (in_groups('dosen')) {
			// usulan masuk ke operator unit
			$tahap_id = 10;
			$pesan = 'Data usulan telah berhasil dikirim ke Operator Fakultas';
		}

		if (in_groups('operator')) {
			// usulan masuk ke verifikator untuk diverifikasi
			$tahap_id = 20;
			$pesan = 'Data usulan telah berhasil dikirim ke Verifikator Fakultas';
		}

		if (in_groups('verifikator')) {
			// usulan di kirim ke koordinator BUK untuk direkap
			$tahap_id = 30;
			$pesan = 'Data usulan telah berhasil dikirim ke Bagian Kepegawaian';
		}

		if (in_groups('koordinator')) {
			// usulan diteruskan ke tim penilai pak
			$tahap_id = 40;
			$pesan = 'Data usulan telah berhasil dikirim ke Tim Penilai PAK';
		}

		if (in_groups('reviewer')) {
			// usulan di setujui untuk dibuatkan SK
			$tahap_id = 50;
			$pesan = 'Data usulan telah disetujui dan dikirimkan ke Bagian Kepegawaian';
		}

		$next_process['tahap'] = $tahap_id;
		$next_process['pesan'] = $pesan;

		return $next_process;
	}

	protected function getReturnProcess()
	{
		// perbaikan unit as default
		$tahap_id = 15;
		$pesan = 'Data usulan telah dikembalikan ke pegawai untuk diperbaiki';

		if (in_groups('reviewer')) {
			$tahap_id = 45;
			$pesan = 'Data usulan telah dikembalikan ke pegawai untuk diperbaiki';
		}

		$return_process['tahap'] = $tahap_id;
		$return_process['pesan'] = $pesan;

		return $return_process;
	}

	protected function setDupakLogs($id_dupak, $tahap_id, $keterangan = null)
	{
		$this->db->table('t_dupak_logs')->insert([
			'id_dupak' => $id_dupak,
			'tahap_id' => $tahap_id,
			'keterangan' => $keterangan,
			'created_by' => user()->id,
		]);

		return true;
	}
}
