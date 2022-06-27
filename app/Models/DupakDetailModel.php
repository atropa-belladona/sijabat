<?php

namespace App\Models;

use CodeIgniter\Model;

class DupakDetailModel extends Model
{
	protected $table                = 't_dupak_detail';
	protected $returnType           = 'object';
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_dupak', 'id_detail', 'id_sistermap', 'id_subkegiatan', 'nama', 'volume', 'ak_nilai', 'satuan_hasil', 'ak_usulan', 'ak_setujui', 'keterangan', 'created_by'
	];

	// Dates
	protected $useTimestamps        = true;

	public function getListDetailDupak($id_dupak)
	{
		$data = $this->db->table('v_dupakdetail')
			->where('id_dupak', $id_dupak)
			->get();

		return $data->getResult();
	}

	public function getSumUsulanAngkaKredit($id_dupak)
	{
		$data = $this->where('id_dupak', $id_dupak)->selectSum('ak_usulan')->get();

		return $data->getRow()->ak_usulan;
	}

	public function getSumUsulanBidangPerBidang($id_dupak, $kode_bidang)
	{
		$data = $this->where('id_dupak', $id_dupak)->like('id_subkegiatan', $kode_bidang, 'after')->selectSum('ak_usulan')->get();

		return $data->getRow()->ak_usulan;
	}

	public function getSumSetujuiAngkaKredit($id_dupak)
	{
		$data = $this->where('id_dupak', $id_dupak)->selectSum('ak_setujui')->get();

		return $data->getRow()->ak_setujui;
	}

	public function getDetailById($id_usulan)
	{
		return $this->db->table('v_dupakdetail')->where('id', $id_usulan)->get();
	}
}
