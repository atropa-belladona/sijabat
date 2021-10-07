<?php

namespace App\Models;

use CodeIgniter\Model;

class DupakPenilaianModel extends Model
{
    protected $table                = 't_dupak_detail_penilaian';
    protected $returnType           = 'object';
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id_usulan', 'sesuai', 'catatan', 'active', 'created_by'
    ];

    // Dates
    protected $useTimestamps        = true;


    public function getListPenilaian($id_usulan)
    {
        return $this->where('id_usulan', $id_usulan)
            ->join('users as u', 'u.id = t_dupak_detail_penilaian.created_by')
            ->select('t_dupak_detail_penilaian.sesuai, t_dupak_detail_penilaian.catatan, t_dupak_detail_penilaian.created_at, u.name')
            ->get();
    }
}
