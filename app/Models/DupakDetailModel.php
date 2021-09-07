<?php

namespace App\Models;

use CodeIgniter\Model;

class DupakDetailModel extends Model
{
	protected $table                = 't_dupak_detail';
	protected $returnType           = 'object';
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_dupak', 'id_subkegiatan', 'nama', 'volume', 'satuan_hasil', 'ak_usulan', 'ak_setujui', 'keterangan', 'created_by'
	];

	// Dates
	protected $useTimestamps        = true;
}
