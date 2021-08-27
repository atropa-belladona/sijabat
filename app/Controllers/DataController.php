<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\DataModel;
use App\Models\PegawaiModel;
use App\Models\UserModel;

use Myth\Auth\Password;

use Config\Database;
use Exception;

class DataController extends BaseController
{
	protected $userModel;
	protected $pegawaiModel;
	protected $dataModel;
	protected $db;

	public function __construct()
	{
		helper('cookie');

		if (!has_cookie('sister_token')) {
			helper('sisterws');
			sister_authorize();
		}

		// User Model
		$this->userModel = new UserModel();

		// Dosen Model
		$this->pegawaiModel = new PegawaiModel();

		// Data Model
		$this->dataModel = new DataModel();

		$this->db = Database::connect();
	}

	// Index Menu Dosen
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
			$response = sister_getDataPegawai();

			// $this->db->transBegin();

			// empty table pegawai
			// $this->pegawaiModel->truncate();

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

					// create account to login


					// get data penugasan pegawai
					// $res_tugas = sister_getDataPenugasanPegawai($dos->id_sdm);

					// if ($res_tugas->getStatusCode() == 200) {
					// 	$penugasan = json_decode($res_tugas->getBody());

					// 	// empty table penugasan
					// 	$this->db->table('t_pegawai_penugasan')->truncate();

					// 	// insert data penugasan
					// 	foreach ($penugasan as $tugas) {
					// 		// get data detail penugasan
					// 		$res_detail = sister_getDataPenugasanDetail($tugas->id);

					// 		if ($res_detail->getStatusCode() == 200) {
					// 			$detail = json_decode($res_detail->getBody());

					// 			$this->db->table('t_pegawai_penugasan')->insert([
					// 				'id' => $detail->id,
					// 				'id_sdm' => $detail->id_sdm,
					// 				'id_unitkerja' => $detail->id_unit_kerja,
					// 				'status_kepegawaian' => $detail->status_kepegawaian,
					// 				'ikatan_kerja' => $detail->ikatan_kerja,
					// 				'no_st' => $detail->surat_tugas,
					// 				'tgl_st' => $detail->tanggal_surat_tugas,
					// 				'tgl_mulai' => $detail->tanggal_mulai,
					// 				'tgl_keluar' => $detail->tanggal_keluar,
					// 				'jenis_keluar' => $detail->jenis_keluar
					// 			]);
					// 		}
					// 	}
					// }



				}
			}

			// $this->db->transCommit();

			return redirect()->back()->with('app_success', 'Data berhasil disinkronisasi');
		} catch (Exception $ex) {
			// $this->db->transRollback();
			return redirect()->back()->with('app_error', $ex->getMessage());
		}
	}


	public function pegawai_detail($id_sdm)
	{
		// Page Information Data
		$data['titlePage'] = 'Pegawai';
		$data['menu'] = 'data-pegawai';
		$data['content_title'] = 'Data Pegawai';

		$data_pegawai = $this->pegawaiModel->getDetailPegawai($id_sdm);

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
}
