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
}
