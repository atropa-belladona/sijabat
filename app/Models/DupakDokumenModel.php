<?php

namespace App\Models;

use CodeIgniter\Model;

class DupakDokumenModel extends Model
{
    protected $table                = 't_dupak_dokumen';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'object';
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id', 'id_dupak', 'nama_dokumen', 'tautan', 'created_by'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    public function getDokumenByDupakId($id_dupak)
    {
        return $this->where('id_dupak', $id_dupak)->get()->getResult();
    }
}
