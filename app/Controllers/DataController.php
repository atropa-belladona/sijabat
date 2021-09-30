<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\DataModel;
use App\Models\PegawaiModel;
use App\Models\UserModel;

use Myth\Auth\Password;

use Config\Database;
use Config\Services;
use Exception;

class DataController extends BaseController
{
	protected $userModel;
	protected $pegawaiModel;
	protected $dataModel;
	protected $db;

	protected $validation;
	protected $uuid;

	public function __construct()
	{
		helper('cookie');

		if (get_cookie('sister_token') == null) {
			helper('sisterws');
			sister_authorize();
		}

		$this->validation = Services::validation();

		$this->uuid = service('uuid');

		// User Model
		$this->userModel = new UserModel();

		// Dosen Model
		$this->pegawaiModel = new PegawaiModel();

		// Data Model
		$this->dataModel = new DataModel();

		$this->db = Database::connect();
	}

	// Index Menu Pegawai
	public function pegawai_index()
	{
		// Page Information Data
		$data['titlePage'] = 'Pegawai';
		$data['menu'] = 'data-pegawai';
		$data['content_title'] = 'Data Pegawai';


		// get all pegawai data
		$pegawai = $this->pegawaiModel->orderBy('nama_sdm', 'asc')->findAll();
		$status_aktif = $this->pegawaiModel->groupBy('status_aktif')
			->select('status_aktif, count(id) as jumlah')
			->get()
			->getResult();

		$data['pegawai'] = $pegawai;
		$data['status_aktif'] = $status_aktif;

		return view('data/pegawai_index', $data);
	}

	// Function to synchronize pegawai data with SISTER
	public function pegawai_sinkronisasi()
	{
		ini_set('max_execution_time', 300);

		try {
			helper('sister_ws');

			$response = sister_getDataPegawai();

			if ($response->getStatusCode() == 200) {
				$pegawai = json_decode($response->getBody());

				foreach ($pegawai as $dos) {
					// insert data into table pegawai
					$this->pegawaiModel->ignore(true)->insert([
						'id_sdm' => $dos->id_sdm,
						'nama_sdm' => $dos->nama_sdm,
						'nidn' => $dos->nidn,
						'nip' => $dos->nip,
						'status_aktif' => $dos->nama_status_aktif,
						'status_pegawai' => $dos->nama_status_pegawai,
						'jenis_sdm' => $dos->jenis_sdm,
						'password_hash' => Password::hash($dos->nidn)
					]);
				}
			}

			return redirect()->back()->with('app_success', 'Data berhasil disinkronisasi');
		} catch (Exception $ex) {
			return redirect()->back()->with('app_error', $ex->getMessage());
		}
	}

	public function import_data_sdm_sister($id_sdm)
	{
		$pegawai = $this->pegawaiModel->where('id_sdm', $id_sdm)->first();

		// prevent unauthorized access
		if (in_groups('dosen')) {
			if ($pegawai->nidn != user()->username) {
				return redirect()->back()->with('app_error', 'Anda tidak punya akses untuk data ini');
			}
		}

		// start import process
		try {
			ini_set('max_execution_time', 300);

			$data['import'] = $this->pegawaiModel->importDataSisterBySDM($pegawai->id_sdm);

			return redirect()->back()->with('app_success', 'Data berhasil diimport');
		} catch (Exception $ex) {
			return redirect()->back()->with('app_error', $ex->getMessage());
		}
	}

	public function pegawai_detail($id_sdm)
	{
		// Page Information Data
		$data['titlePage'] = 'Pegawai';
		$data['menu'] = 'data-pegawai';
		$data['content_title'] = 'Data Pegawai';

		$data_pegawai = $this->pegawaiModel->getDetailSDM($id_sdm);

		return view('data/pegawai_detail', array_merge($data, $data_pegawai));
	}

	// Index view Menu Referensi
	public function referensi_index()
	{
		// Page Information Data
		$data['titlePage'] = 'Referensi';
		$data['menu'] = 'data-referensi';
		$data['content_title'] = 'Data Referensi';

		$data['unit_kerja'] = $this->dataModel->getReferensiUnitKerja();

		return view('data/referensi_index', $data);
	}

	// Functions to synchronize data Referensi with SISTER
	protected function _sync_unitkerja($id_perguruantinggi)
	{
		try {
			$response = sister_getReferensiUnitKerja($id_perguruantinggi);

			if ($response->getStatusCode() == 200) {
				$unit_kerja = json_decode($response->getBody());

				foreach ($unit_kerja as $unit) {
					$this->db->table('r_unitkerja')->ignore(true)->insert([
						'id_unit' => $unit->id,
						'nama' => $unit->nama,
						'id_jenis_unit' => $unit->id_jenis_unit
					]);
				}

				return true;
			}

			return false;
		} catch (Exception $ex) {
			return false;
		}
	}

	public function referensi_sinkronisasi()
	{
		$pt = $this->dataModel->getProfilePerguruanTinggi();

		$sync_unit = $this->_sync_unitkerja($pt->id);

		if ($sync_unit) {
			return redirect()->back()->with('app_success', 'Data berhasil disinkronisasi');
		}

		return redirect()->back()->with('app_error', 'Sinkronisasi Gagal');
	}


	// Periode Penilaian
	public function periode_penilaian_index()
	{
		// Page Information Data
		$data['titlePage'] = 'Periode Penilaian';
		$data['menu'] = 'periode-penilaian';
		$data['content_title'] = 'Periode Penilaian';

		$data['periode_penilaian'] = $this->dataModel->getListPeriodePenilaian();

		return view('data/periode_penilaian_index', $data);
	}

	// Store Periode Penilaian
	public function periode_penilaian_store()
	{
		$rules = $this->validation->setRules(
			[
				'tgl-mulai' => 'required|valid_date',
				'tgl-selesai' => 'required|valid_date',
				'periode-keterangan' => 'string'
			],
			[
				'tgl-mulai' => [
					'required' => 'Tanggal mulai harus diisi',
					'valid_date' => 'Bukan format tanggal yang valid'
				],
				'tgl-selesai' => [
					'required' => 'Tanggal selesai harus diisi',
					'valid_date' => 'Bukan format tanggal yang valid'
				],
				'periode-keterangan' => [
					'string' => 'Hanya bisa berisi string',
				],
			]
		);

		// run input validation
		if (!$this->validation->withRequest($this->request)->run()) {
			return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
		}

		$tgl_mulai = $this->request->getPost('tgl-mulai');
		$tgl_selesai = $this->request->getPost('tgl-selesai');
		$keterangan = trim($this->request->getPost('periode-keterangan'));

		// check if Tanggal Mulai tidak melebihi tanggal selesai
		if (strtotime($tgl_mulai) > strtotime($tgl_selesai)) {
			return redirect()->back()->withInput()->with('errors', [
				'tgl-mulai' => 'Tanggal Mulai tidak boleh melebihi Tanggal Selesai',
				'tgl-selesai' => 'Tanggal Selesai tidak boleh sebelum Tanggal Selesai'
			]);
		}

		try {

			$this->db->transBegin();

			$periode = $this->db->table('t_periode_penilaian');

			$periode->set('id', $this->uuid->uuid4()->toString());
			$periode->set('tgl_mulai', $tgl_mulai);
			$periode->set('tgl_selesai', $tgl_selesai);
			$periode->set('keterangan', $keterangan);
			$periode->set('created_by', user()->id);

			$periode->insert();

			$this->db->transCommit();

			return redirect()->back()->with('app_success', 'Data Periode Penilaian telah ditambahkan.');
		} catch (Exception $ex) {
			$this->db->transRollback();
			return redirect()->back()->with('app_error', $ex->getMessage());
		}
	}


	public function download_dokumen($id_dokumen, $jenis_file, $nama_file)
	{

		// $dokumen = $this->db->table('t_sdm_dokumen')
		// 	->where('id', $id_dokumen)
		// 	->get()
		// 	->getRowObject();

		helper('sisterws');

		$dokumen_content = sister_getUnduhDokumen($id_dokumen);

		header('Content-length: ' . strlen($dokumen_content));
		header('Content-type: ' . $jenis_file);
		header('Content-Disposition: inline; filename="' . $nama_file . '"');
		ob_clean();
		flush();
		echo $dokumen_content;
		exit;
	}
}
