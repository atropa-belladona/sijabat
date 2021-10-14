<?php

namespace App\Models;

use CodeIgniter\Model;

class DupakLogModel extends Model
{
    protected $table                = 't_dupak_logs';
    protected $returnType           = 'object';
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id_dupak', 'tahap_id', 'keterangan', 'created_by'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';


    public function getLogsById($id_dupak)
    {
        return $this->join('r_tahap as t', 't.id = t_dupak_logs.tahap_id')
            ->join('users as u', 'u.id = t_dupak_logs.created_by')
            ->where('id_dupak', $id_dupak)
            ->orderBy('created_at')
            ->select('t.ur_tahap, t_dupak_logs.keterangan, u.name as created_by, t_dupak_logs.created_at')
            ->get();
    }
}
