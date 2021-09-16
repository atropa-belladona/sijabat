<?php

namespace App\Models;

use CodeIgniter\Model;

class BidangKegiatanModel extends Model
{
    protected $table = 'v_ref_kegiatan';
    protected $primaryKey = 'kegiatan_id';
    protected $returnType = 'object';
    protected $protectFields = true;
    protected $allowedFields = [];

}
