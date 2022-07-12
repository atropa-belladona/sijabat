<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DupakDetailModel;
use App\Models\DupakModel;
use Config\Database;
use Dompdf\Dompdf;

class PrintController extends BaseController
{
    protected $dompdf;

    protected $dupakModel;
    protected $dupakDetailModel;

    protected $db;

    public function __construct()
    {
        $this->dompdf = new Dompdf();

        $this->dupakModel = new DupakModel();
        $this->dupakDetailModel = new DupakDetailModel();

        $this->db = Database::connect();
    }

    public function pdf_rekapdupak($id_dupak)
    {
        $data['dupak'] = $data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);
        $data['kepangkatan'] = $this->db->table('r_golongan')->where('nama', $data['dupak']->gol_lama)->get()->getRowObject();

        $this->dompdf->loadHtml(view('print/rekap_dupak', $data));

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('8.5x14', 'portrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        $filename = 'Rekap_Dupak_' . date('Ymhis');
        // Output the generated PDF to Browser
        $this->dompdf->stream($filename, array('Attachment' => 0));
    }

    public function pdf_kartukendali($id_dupak)
    {
        $data['dupak'] = $data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);
        $data['kepangkatan'] = $this->db->table('r_golongan')->where('nama', $data['dupak']->gol_lama)->get()->getRowObject();

        $data['total_ak_bidang_a'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '10');
        $data['total_ak_bidang_b'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '11');
        $data['total_ak_bidang_c'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '12');
        $data['total_ak_bidang_d'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '13');
        $data['total_ak_bidang_e'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '14');

        $this->dompdf->loadHtml(view('print/kartu_kendali', $data));

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('8.5x14', 'portrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        $filename = 'Rekap_Dupak_' . date('Ymhis');
        // Output the generated PDF to Browser
        $this->dompdf->stream($filename, array('Attachment' => 0));
    }

    public function pdf_sp_pendidikan($id_dupak)
    {
        $data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);

        $data['sp'] = $this->db->table('t_dupak_cetak_sp')->where('id_dupak', $id_dupak)->get()->getRowObject();

        $data['pangkat_penandatangan'] = $this->db->table('r_golongan')->where('nama', $data['sp']->penandatangan_golongan)->get()->getRowObject();

        $data['pangkat_pengaju'] = $this->db->table('r_golongan')->where('nama', $data['dupak']->gol_lama)->get()->getRowObject();

        $this->dompdf->loadHtml(view('print/sp_pendidikan', $data));

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('8.5x14', 'portrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        $filename = 'Surat_Pernyataan_' . date('Ymhis');
        // Output the generated PDF to Browser
        $this->dompdf->stream($filename, array('Attachment' => 0));
    }

    public function pdf_sp_penelitian($id_dupak)
    {
        $data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);

        $data['sp'] = $this->db->table('t_dupak_cetak_sp')->where('id_dupak', $id_dupak)->get()->getRowObject();

        $data['pangkat_penandatangan'] = $this->db->table('r_golongan')->where('nama', $data['sp']->penandatangan_golongan)->get()->getRowObject();

        $data['pangkat_pengaju'] = $this->db->table('r_golongan')->where('nama', $data['dupak']->gol_lama)->get()->getRowObject();

        $this->dompdf->loadHtml(view('print/sp_penelitian', $data));

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('8.5x14', 'portrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        $filename = 'Surat_Pernyataan_' . date('Ymhis');
        // Output the generated PDF to Browser
        $this->dompdf->stream($filename, array('Attachment' => 0));
    }

    public function pdf_sp_pengabdian($id_dupak)
    {
        $data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);

        $data['sp'] = $this->db->table('t_dupak_cetak_sp')->where('id_dupak', $id_dupak)->get()->getRowObject();

        $data['pangkat_penandatangan'] = $this->db->table('r_golongan')->where('nama', $data['sp']->penandatangan_golongan)->get()->getRowObject();

        $data['pangkat_pengaju'] = $this->db->table('r_golongan')->where('nama', $data['dupak']->gol_lama)->get()->getRowObject();

        $this->dompdf->loadHtml(view('print/sp_pengabdian', $data));

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('8.5x14', 'portrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        $filename = 'Surat_Pernyataan_' . date('Ymhis');
        // Output the generated PDF to Browser
        $this->dompdf->stream($filename, array('Attachment' => 0));
    }

    public function pdf_sp_penunjang($id_dupak)
    {
        $data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);

        $data['sp'] = $this->db->table('t_dupak_cetak_sp')->where('id_dupak', $id_dupak)->get()->getRowObject();

        $data['pangkat_penandatangan'] = $this->db->table('r_golongan')->where('nama', $data['sp']->penandatangan_golongan)->get()->getRowObject();

        $data['pangkat_pengaju'] = $this->db->table('r_golongan')->where('nama', $data['dupak']->gol_lama)->get()->getRowObject();

        $this->dompdf->loadHtml(view('print/sp_penunjang', $data));

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('8.5x14', 'portrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        $filename = 'Surat_Pernyataan_' . date('Ymhis');
        // Output the generated PDF to Browser
        $this->dompdf->stream($filename, array('Attachment' => 0));
    }
}
