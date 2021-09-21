<?php

namespace App\Models;

use CodeIgniter\Model;

class BidangKegiatanModel extends Model
{

    public function getKlasifikasiKegiatan($id_kegiatan)
    {
        $data = $this->db->table('v_ref_kegiatan')
            ->where('kegiatan_id', $id_kegiatan)
            ->groupBy('sub_kegiatan_id')
            ->get()
            ->getResultObject();

        foreach ($data as $item) {
            $item->child = $this->db->table('v_ref_kegiatan')
                ->where('sub_kegiatan_id', $item->sub_kegiatan_id)
                ->get()
                ->getResultObject();
        }


        return $data;
    }
}
