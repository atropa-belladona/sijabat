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
}
