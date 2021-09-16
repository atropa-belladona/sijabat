<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{

	public function getProfilePerguruanTinggi()
	{
		$pt = $this->db->table('r_perguruantinggi')
			->where('kode_pt', '001037')
			->get();

		return $pt->getRow();
	}

	public function getReferensiUnitKerja()
	{
		$unit = $this->db->table('v_unitkerja')
			->orderBy('id_jenis_unit', 'asc')
			->get();

		return $unit->getResult();
	}

	public function getKategoriKegiatan()
	{
		$kegiatan = $this->db->table('r_kegiatan')
			->get();

		return $kegiatan->getResult();
	}

	public function getListPeriodePenilaian()
	{
		$data = $this->db->table('t_periode_penilaian')
			->where('active', '1')
			->get();

		return $data->getResult();
	}

	public function getOpenPeriodePenilaian()
	{
		$data = $this->db->table('t_periode_penilaian')
			->where('active', '1')
			->where('lock', '0')
			->get();

		return $data->getResult();
	}

	public function getDetailSisterMapping($id)
	{
		$data = $this->db->table('zz_sister_map_detail')
			->where('id', $id)
			->select("*, CONCAT('_',LPAD(id,2,'0'),'_',menu) AS page")
			->get();

		return $data->getRowObject();
	}
}
