<?php

namespace App\Models;

use CodeIgniter\Model;

class DupakModel extends Model
{
	protected $table                = 't_dupak';
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id', 'id_periode', 'id_sdm', 'nama_sdm', 'nip', 'nidn', 'no_karpeg', 'pendidikan_terakhir',
		'jabfung', 'tmt_jabfung', 'mk_lama_thn', 'mk_lama_bln', 'mk_baru_thn', 'mk_baru_bln',
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

		$data = $this->join('t_periode_penilaian as tpp', 'tpp.id = t_dupak.id_periode')
			->join('r_tahap rt', 'rt.id = t_dupak.tahap_id')
			->where('t_dupak.active', '1')
			->where('t_dupak.tahap_id >=', $tahap_id)
			->orderBy('t_dupak.tahap_id', 'asc')
			->select('t_dupak.*, tpp.tgl_mulai, tpp.tgl_selesai, tpp.keterangan, tpp.lock, rt.ur_tahap, rt.bg_color')
			->get();

		return $data->getResult();
	}

	public function getListUsulanPegawai($nidn)
	{
		$data = $this->join('t_periode_penilaian as tpp', 'tpp.id = t_dupak.id_periode')
			->join('r_tahap as rt', 'rt.id = t_dupak.tahap_id')
			->where('t_dupak.nidn', $nidn)
			->where('t_dupak.active', '1')
			->orderBy('t_dupak.tahap_id', 'asc')
			->select('t_dupak.*, tpp.tgl_mulai, tpp.tgl_selesai, tpp.keterangan, tpp.lock, rt.ur_tahap, rt.bg_color')
			->get();

		return $data->getResult();
	}

	public function getDetailUsulan($id_dupak)
	{
		$data = $this->join('t_periode_penilaian as tpp', 'tpp.id = t_dupak.id_periode')
			->join('r_tahap as rt', 'rt.id = t_dupak.tahap_id')
			->where('t_dupak.id', $id_dupak)
			->where('t_dupak.active', '1')
			->select('t_dupak.*, tpp.tgl_mulai, tpp.tgl_selesai, tpp.keterangan, tpp.lock, rt.ur_tahap, rt.bg_color')
			->get();

		return $data->getRowObject();
	}
}
