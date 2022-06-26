<?php

namespace App\Models;

use CodeIgniter\Model;

class DupakModel extends Model
{
	protected $table                = 't_dupak';
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id', 'id_periode', 'id_sdm', 'masa_awal', 'masa_akhir', 'nama_sdm', 'nip', 'nidn', 'no_karpeg', 'pendidikan_terakhir',
		'jabfung', 'tmt_jabfung', 'mk_lama_thn', 'mk_lama_bln', 'mk_baru_thn', 'mk_baru_bln', 'unit_kerja', 'fakultas', 'mata_kuliah', 'acc_fakultas',
		'active', 'tahap_id'
	];

	// Dates
	protected $useTimestamps        = true;

	public function getListUsulan()
	{
		$tahap_id = 1;

		if (in_groups('verifikator')) {
			$tahap_id = 20;
		}

		if (in_groups('koordinator')) {
			$tahap_id = 30;
		}

		if (in_groups('reviewer')) {
			$tahap_id = 40;
		}

		$data = $this->join('r_tahap rt', 'rt.id = t_dupak.tahap_id')
			->where('t_dupak.active', '1')
			->where('t_dupak.tahap_id >=', $tahap_id)
			->orderBy('t_dupak.tahap_id', 'asc')
			->select('t_dupak.*, rt.ur_tahap, rt.bg_color')
			->get();

		return $data->getResult();
	}

	public function getListUsulanByTahapId($tahap_id = [])
	{
		return $this->join('r_tahap rt', 'rt.id = t_dupak.tahap_id')
			->where('t_dupak.active', '1')
			->whereIn('t_dupak.tahap_id', $tahap_id)
			->orderBy('t_dupak.tahap_id', 'asc')
			->select('t_dupak.*, rt.ur_tahap, rt.bg_color')
			->get();
	}

	public function getListUsulanPegawai($nidn)
	{
		$data = $this->join('r_tahap as rt', 'rt.id = t_dupak.tahap_id')
			->where('t_dupak.nidn', $nidn)
			->where('t_dupak.active', '1')
			->orderBy('t_dupak.tahap_id', 'asc')
			->select('t_dupak.*, rt.ur_tahap, rt.bg_color')
			->get();

		return $data->getResult();
	}

	public function getDetailUsulan($id_dupak)
	{
		$data = $this->join('r_tahap as rt', 'rt.id = t_dupak.tahap_id')
			->where('t_dupak.id', $id_dupak)
			->where('t_dupak.active', '1')
			->select('t_dupak.*, rt.ur_tahap, rt.bg_color')
			->get();

		return $data->getRowObject();
	}
}
