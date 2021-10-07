<?php

namespace App\Models;

use CodeIgniter\Model;

class DupakVerifikasiModel extends Model
{
    protected $table                = 't_dupak_detail_verifikasi';
    protected $returnType           = 'object';
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id_usulan', 'sesuai', 'catatan', 'active', 'created_by'
    ];

    // Dates
    protected $useTimestamps        = true;

    public function getListVerifikasi($id_usulan)
    {
        return $this->where('id_usulan', $id_usulan)
            ->join('users as u', 'u.id = t_dupak_detail_verifikasi.created_by')
            ->select('t_dupak_detail_verifikasi.sesuai, t_dupak_detail_verifikasi.catatan, t_dupak_detail_verifikasi.created_at, u.name')
            ->get();
    }
}
