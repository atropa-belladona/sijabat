<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
	protected $table                = 't_pegawai';
	protected $returnType           = 'object';
	protected $allowedFields        = [
		'id_sdm', 'nama_sdm', 'nidn', 'nip', 'tempat_lahir', 'tgl_lahir', 'status_aktif', 'status_pegawai', 'jenis_sdm', 'password_hash'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}
