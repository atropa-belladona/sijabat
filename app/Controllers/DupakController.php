<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BidangKegiatanModel;
use App\Models\DataModel;
use App\Models\DupakDetailModel;
use App\Models\DupakDokumenModel;
use App\Models\DupakLogModel;
use App\Models\DupakModel;
use App\Models\DupakPenilaianModel;
use App\Models\DupakVerifikasiModel;
use App\Models\PegawaiModel;
use Config\Database;
use Config\Services;
use Exception;
use Irsyadulibad\DataTables\DataTables;

class DupakController extends BaseController
{

    protected $db;

    protected $dataModel;
    protected $pegawaiModel;
    protected $dupakModel;
    protected $dupakDetailModel;
    protected $dupakDokumenModel;
    protected $dupakLogModel;
    protected $dupakVerifikasiModel;
    protected $dupakPenilaianModel;

    protected $bidangKegiatanModel;

    protected $validation;

    protected $uuid;

    public function __construct()
    {
        $this->db = Database::connect();

        $this->dataModel = new DataModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->dupakModel = new DupakModel();
        $this->dupakDetailModel = new DupakDetailModel();
        $this->dupakDokumenModel = new DupakDokumenModel();
        $this->dupakLogModel = new DupakLogModel();
        $this->dupakVerifikasiModel = new DupakVerifikasiModel();
        $this->dupakPenilaianModel = new DupakPenilaianModel();

        $this->bidangKegiatanModel = new BidangKegiatanModel();

        $this->validation = Services::validation();

        $this->uuid = service('uuid');
    }

    public function index()
    {
        $data['titlePage'] = 'Daftar Usulan';
        $data['menu'] = 'dupak-daftar';
        $data['content_title'] = 'Daftar Usulan';

        if (in_groups('dosen')) {
            $data['dupak'] = $this->dupakModel->getListUsulanPegawai(session('siakad_username'));
        } else {
            $data['dupak'] = $this->dupakModel->getListUsulan();
        }


        return view('dupak/index', $data);
    }

    public function create()
    {
        $data['titlePage'] = 'Buat Usulan';
        $data['menu'] = 'dupak-buat';
        $data['content_title'] = 'Buat Usulan';

        if (in_groups('dosen')) {
            $nidn = session('siakad_username');
        }

        $data['sdm'] = $this->pegawaiModel->getProfileSDMByNIDN($nidn);
        $data['info'] = $this->pegawaiModel->getProfileTambahanByNIDN($nidn);
        $data['pendidikan'] = $this->pegawaiModel->getPendidikanTerakhirSDM($data['sdm']->id_sdm);
        $data['kepangkatan'] = $this->pegawaiModel->getGolonganTerakhir($data['sdm']->id_sdm);
        $data['jabfung'] = $this->pegawaiModel->getJabfungTerakhir($data['sdm']->id_sdm);
        $data['penugasan'] = $this->pegawaiModel->getPenugasanTerakhir($data['sdm']->id_sdm);

        // referensi golongan
        $data['list_golongan'] = $this->db->table('r_golongan')->get()->getResult();


        if (!$data['sdm'] or !$data['pendidikan']) {
            return redirect()->route('home')->with('app_error', 'Harap import data pegawai terlebih dahulu. Terima kasih');
        }


        return view('dupak/create', $data);
    }

    public function operator_request($id_sdm)
    {
        $data['titlePage'] = 'Buat Usulan';
        $data['menu'] = 'dupak-buat';
        $data['content_title'] = 'Buat Usulan';

        $data['sdm'] = $this->pegawaiModel->getInfoPegawaiByIdSDM($id_sdm);
        $data['info'] = $this->pegawaiModel->getProfileTambahanByNIDN($data['sdm']->nidn);
        $data['pendidikan'] = $this->pegawaiModel->getPendidikanTerakhirSDM($id_sdm);
        $data['kepangkatan'] = $this->pegawaiModel->getGolonganTerakhir($id_sdm);
        $data['jabfung'] = $this->pegawaiModel->getJabfungTerakhir($id_sdm);
        $data['penugasan'] = $this->pegawaiModel->getPenugasanTerakhir($data['sdm']->id_sdm);

        // referensi golongan
        $data['list_golongan'] = $this->db->table('r_golongan')->get()->getResult();

        if (!$data['sdm'] or !$data['pendidikan']) {
            return redirect()->back()->with('app_error', 'Harap import data pegawai terlebih dahulu. Terima kasih');
        }

        return view('dupak/create', $data);
    }

    public function store()
    {
        $rules = $this->validation->setRules(
            [
                'id_sdm' => 'required',
                'nama' => 'required',
                'nidn' => 'required',
            ]
        );

        // run input validation
        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        // $id_periode = $this->request->getPost('periode_penilaian');
        $masa_awal = $this->request->getPost('masa_awal');
        $masa_akhir = $this->request->getPost('masa_akhir');
        $id_sdm = $this->request->getPost('id_sdm');
        $nama_sdm = $this->request->getPost('nama');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');

        $nip = $this->request->getPost('nip');
        $nidn = $this->request->getPost('nidn');
        $no_karpeg = $this->request->getPost('no_karpeg');
        $fakultas = $this->request->getPost('fakultas');
        $unit_kerja = $this->request->getPost('unit_kerja');
        $pendidikan_terakhir = $this->request->getPost('pendidikan_terakhir');

        $jabfung_1 = $this->request->getPost('jabfung_1');
        $tmt_jabfung_1 = $this->request->getPost('tmt_jabfung_1');
        $kum_jabfung_1 = $this->request->getPost('kum_jabfung_1');
        $jabfung_2 = $this->request->getPost('jabfung_2');
        $kum_jabfung_2 = $this->request->getPost('kum_jabfung_2');

        $gol_1 = $this->request->getPost('gol_1');
        $tmt_gol_1 = $this->request->getPost('tmt_gol_1');
        $gol_2 = $this->request->getPost('gol_2');

        $mk_lama_thn = $this->request->getPost('mk_lama_thn');
        $mk_lama_bln = $this->request->getPost('mk_lama_bln');
        $mk_baru_thn = $this->request->getPost('mk_baru_thn');
        $mk_baru_bln = $this->request->getPost('mk_baru_bln');

        $mata_kuliah = $this->request->getPost('mata_kuliah');
        $bidang_ilmu = $this->request->getPost('bidang_ilmu');

        // store code here
        try {

            $this->dupakModel->transBegin();

            // check if pegawai already has pak request
            $check = $this->dupakModel->where('tahap_id !=', 60)
                ->where('id_sdm', $id_sdm)
                ->where('active', '1')
                ->get()
                ->getResult();

            if (count($check) > 0) {
                return redirect()->route('dupak_index')->with('app_error', 'Pegawai memiliki pengajuan aktif yang belum selesai');
            }

            // draft as default process
            $tahap_id = 1;

            // if operator request pak process skip to 10
            if (in_groups('operator')) {
                $tahap_id = 10;
            }

            $id_dupak = $this->uuid->uuid4()->toString();
            // if not insert data
            $store = $this->dupakModel->insert([
                'id' => $id_dupak,
                'id_sdm' => $id_sdm,
                'masa_awal' => $masa_awal,
                'masa_akhir' => $masa_akhir,
                'nama_sdm' => $nama_sdm,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'nip' => $nip,
                'nidn' => $nidn,
                'no_karpeg' => $no_karpeg,
                'fakultas' => $fakultas,
                'unit_kerja' => $unit_kerja,
                'pendidikan_terakhir' => $pendidikan_terakhir,
                'jabfung' => $jabfung_1,
                'tmt_jabfung' => $tmt_jabfung_1,
                'kum_lama' => $kum_jabfung_1,
                'jabfung_baru' => $jabfung_2,
                'kum_baru' => $kum_jabfung_2,
                'gol_lama' => $gol_1,
                'tmt_gol_lama' => $tmt_gol_1,
                'gol_baru' => $gol_2,
                'mk_lama_thn' => $mk_lama_thn,
                'mk_lama_bln' => $mk_lama_bln,
                'mk_baru_thn' => $mk_baru_thn,
                'mk_baru_bln' => $mk_baru_bln,
                'tahap_id' => $tahap_id,
                'mata_kuliah' => $mata_kuliah,
                'bidang_ilmu' => $bidang_ilmu,
                'created_by' => user()->id,
            ]);

            // record logs
            $this->setDupakLogs($id_dupak, $tahap_id);

            $this->dupakModel->transCommit();

            return redirect()->route('dupak_index')->with('toast_success', 'Data Usulan berhasil disimpan');
        } catch (Exception $ex) {
            $this->dupakModel->transRollback();
            return redirect()->back()->with('app_error', $ex->getMessage());
        }
    }


    public function update($id_dupak)
    {
        $rules = $this->validation->setRules(
            [
                'id_sdm' => 'required',
                'nama' => 'required',
                'nidn' => 'required',
            ]
        );

        // run input validation
        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        // $id_periode = $this->request->getPost('periode_penilaian');
        $masa_awal = $this->request->getPost('masa_awal');
        $masa_akhir = $this->request->getPost('masa_akhir');
        $id_sdm = $this->request->getPost('id_sdm');
        $nama_sdm = $this->request->getPost('nama');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');

        $nip = $this->request->getPost('nip');
        $nidn = $this->request->getPost('nidn');
        $no_karpeg = $this->request->getPost('no_karpeg');
        $fakultas = $this->request->getPost('fakultas');
        $unit_kerja = $this->request->getPost('unit_kerja');
        $pendidikan_terakhir = $this->request->getPost('pendidikan_terakhir');

        $jabfung_1 = $this->request->getPost('jabfung_1');
        $tmt_jabfung_1 = $this->request->getPost('tmt_jabfung_1');
        $kum_jabfung_1 = $this->request->getPost('kum_jabfung_1');
        $jabfung_2 = $this->request->getPost('jabfung_2');
        $kum_jabfung_2 = $this->request->getPost('kum_jabfung_2');

        $gol_1 = $this->request->getPost('gol_1');
        $tmt_gol_1 = $this->request->getPost('tmt_gol_1');
        $gol_2 = $this->request->getPost('gol_2');

        $mk_lama_thn = $this->request->getPost('mk_lama_thn');
        $mk_lama_bln = $this->request->getPost('mk_lama_bln');
        $mk_baru_thn = $this->request->getPost('mk_baru_thn');
        $mk_baru_bln = $this->request->getPost('mk_baru_bln');

        $mata_kuliah = $this->request->getPost('mata_kuliah');
        $bidang_ilmu = $this->request->getPost('bidang_ilmu');

        // store code here
        try {

            $this->dupakModel->transBegin();

            $record = [
                'masa_awal' => $masa_awal,
                'masa_akhir' => $masa_akhir,
                'nama_sdm' => $nama_sdm,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'nip' => $nip,
                'nidn' => $nidn,
                'no_karpeg' => $no_karpeg,
                'fakultas' => $fakultas,
                'unit_kerja' => $unit_kerja,
                'pendidikan_terakhir' => $pendidikan_terakhir,
                'jabfung' => $jabfung_1,
                'tmt_jabfung' => $tmt_jabfung_1,
                'kum_lama' => $kum_jabfung_1,
                'jabfung_baru' => $jabfung_2,
                'kum_baru' => $kum_jabfung_2,
                'gol_lama' => $gol_1,
                'tmt_gol_lama' => $tmt_gol_1,
                'gol_baru' => $gol_2,
                'mk_lama_thn' => $mk_lama_thn,
                'mk_lama_bln' => $mk_lama_bln,
                'mk_baru_thn' => $mk_baru_thn,
                'mk_baru_bln' => $mk_baru_bln,
                'mata_kuliah' => $mata_kuliah,
                'bidang_ilmu' => $bidang_ilmu,
            ];

            $store = $this->dupakModel->where('id', $id_dupak)
                ->where('id_sdm', $id_sdm)
                ->set($record)
                ->update();

            $this->dupakModel->transCommit();

            return redirect()->back()->with('toast_success', 'Data Usulan berhasil diperbaharui');
        } catch (Exception $ex) {
            $this->dupakModel->transRollback();
            return redirect()->back()->with('app_error', $ex->getMessage());
        }
    }

    public function delete($id)
    {

        $dupak = $this->dupakModel->update($id, [
            'active' => '0',
        ]);

        return redirect()->back()->with('toast_success', 'Data berhasil dihapus');
    }

    public function show($id_dupak)
    {
        $data['titlePage'] = 'Detail Usulan';
        $data['menu'] = 'dupak-daftar';
        $data['content_title'] = 'Detail Usulan';

        $data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);

        // If Dupak data not found return to home with error message
        if (!$data['dupak']) {
            return redirect()->route('home')->with('app_error', 'Data tidak ditemukan');
        }

        helper('sisterws');
        $foto = sister_getDataFotoSDM($data['dupak']->id_sdm);

        $data['foto'] = 'data:image/png;base64,' . base64_encode($foto);

        // else do below

        // $pangkat = $this->pegawaiModel->getGolonganTerakhir($data['dupak']->id_sdm);

        // $data['kepangkatan'] = sister_getDetailKepangkatan($pangkat->id);
        $data['kepangkatan'] = $this->db->table('r_golongan')->where('nama', $data['dupak']->gol_lama)->get()->getRowObject();

        // $data_sdm = $this->pegawaiModel->getProfile($data['dupak']->id_sdm);
        // $data_pendidikan = $this->pegawaiModel->getKualifikasi($data['dupak']->id_sdm);

        $data['bidang_kegiatan'] = $this->db->table('r_kegiatan')->where('active', '1')->get()->getResult();

        $data['dupak_detail'] = $this->dupakDetailModel->getListDetailDupak($id_dupak);

        $data['total_ak_bidang_a'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '10');
        $data['total_ak_bidang_b'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '11');
        $data['total_ak_bidang_c'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '12');
        $data['total_ak_bidang_d'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '13');
        $data['total_ak_bidang_e'] = $this->dupakDetailModel->getSumUsulanBidangPerBidang($id_dupak, '14');

        $data['total_ak_usulan'] = $this->dupakDetailModel->getSumUsulanAngkaKredit($id_dupak);

        $data['dokumen_pengantar'] = $this->dupakDokumenModel->getDokumenByDupakId($id_dupak);

        $data['dupak_logs'] = $this->dupakLogModel->getLogsById($id_dupak)->getResult();

        // referensi golongan
        $data['list_golongan'] = $this->db->table('r_golongan')->get()->getResult();

        // referensi penilai
        $data['list_penilai'] = $this->db->table('v_users')->where('role_id', 5)->where('active', 1)->get()->getResult();

        // get penilai
        $data['penilai'] = $this->db->table('v_dupak_penilai')->where('id_dupak', $id_dupak)->get()->getResult();



        return view('dupak/detail', array_merge($data));
    }

    public function view_cetak_sp()
    {
        $id_dupak = $this->request->getGet('id_dupak');

        $dupak = $this->dupakModel->getDetailUsulan($id_dupak);

        // get info penandatangan surat pernyataan
        $penandatangan_sp = $this->db->table('t_dupak_cetak_sp')->where('id_dupak', $id_dupak)->get()->getRowObject();

        if (!isset($penandatangan_sp->id_dupak)) {
            $dosen_info = $this->db->table('r_dosen_unj')->where('nidn', $dupak->nidn)->get()->getRowObject();

            $penandatangan_sp = $this->db->table('v_ref_koorprodi')->where('kode', $dosen_info->prodi)->get()->getRowObject();

            if (isset($penandatangan_sp->nama_lengkap)) {
                $penandatangan_sp->penandatangan_nama = $penandatangan_sp->gelar_depan . ' ' . $penandatangan_sp->nama_lengkap . ' ' . $penandatangan_sp->gelar_belakang;
                $penandatangan_sp->penandatangan_nip = $penandatangan_sp->nip_koord;
            }
        }

        $data['penandatangan_sp'] = $penandatangan_sp;

        // referensi golongan
        $data['list_golongan'] = $this->db->table('r_golongan')->get()->getResult();
        $data['dupak_info'] = $dupak;

        return view('dupak/parts/modal-content/_95_cetak_sp', $data);
    }

    public function store_cetak_sp()
    {
        try {
            $id_dupak = $this->request->getPost('id_dupak');
            $penandatangan_nama = $this->request->getPost('penandatangan_nama');
            $penandatangan_nip = $this->request->getPost('penandatangan_nip');
            $penandatangan_gol = $this->request->getPost('penandatangan_gol');
            $penandatangan_tmt_gol = $this->request->getPost('penandatangan_tmt_gol');
            $penandatangan_jabfung = $this->request->getPost('penandatangan_jabfung');
            $penandatangan_jabstruk = $this->request->getPost('penandatangan_jabstruk');
            $tanggal_sp = $this->request->getPost('tanggal_sp');

            // save data to db
            $record = [
                'id_dupak' => $id_dupak,
                'penandatangan_nama' => $penandatangan_nama,
                'penandatangan_nip' => $penandatangan_nip,
                'penandatangan_golongan' => $penandatangan_gol,
                'penandatangan_tmt_golongan' => $penandatangan_tmt_gol,
                'jabfung' => $penandatangan_jabfung,
                'jabstruk' => $penandatangan_jabstruk,
                'tanggal_surat' => $tanggal_sp,
            ];

            $this->db->table('t_dupak_cetak_sp')->replace($record);

            // show form again
            $dupak = $this->dupakModel->getDetailUsulan($id_dupak);

            // get info penandatangan surat pernyataan
            $penandatangan_sp = $this->db->table('t_dupak_cetak_sp')->where('id_dupak', $id_dupak)->get()->getRowObject();

            if (!isset($penandatangan_sp->id_dupak)) {
                $dosen_info = $this->db->table('r_dosen_unj')->where('nidn', $dupak->nidn)->get()->getRowObject();

                $penandatangan_sp = $this->db->table('v_ref_koorprodi')->where('kode', $dosen_info->prodi)->get()->getRowObject();

                if (isset($penandatangan_sp->nama_lengkap)) {
                    $penandatangan_sp->penandatangan_nama = $penandatangan_sp->gelar_depan . ' ' . $penandatangan_sp->nama_lengkap . ' ' . $penandatangan_sp->gelar_belakang;
                    $penandatangan_sp->penandatangan_nip = $penandatangan_sp->nip_koord;
                }
            }

            $data['penandatangan_sp'] = $penandatangan_sp;

            // referensi golongan
            $data['list_golongan'] = $this->db->table('r_golongan')->get()->getResult();
            $data['dupak_info'] = $dupak;

            return view('dupak/parts/modal-content/_95_cetak_sp', $data);
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function store_penilai($id_dupak)
    {
        $penilai_id = $this->request->getPost('penilai');
        $sebagai = $this->request->getPost('sebagai');

        $record = [
            'id_dupak' => $id_dupak,
            'user_id' => $penilai_id,
            'sebagai' => $sebagai
        ];

        if ($sebagai == 'ketua') {
            $cek_ketua = $this->db->table('t_dupak_penilai')->where('id_dupak', $id_dupak)->where('sebagai', 'ketua')->get()->getRowObject();

            if ($cek_ketua) {
                return redirect()->back()->with('toast_error', 'Sudah ada penilai yang berstatus sebagai Ketua');
            }
        }

        $cek_double = $this->db->table('t_dupak_penilai')->where('id_dupak', $id_dupak)->where('user_id', $penilai_id)->get()->getRowObject();

        if ($cek_double) {
            return redirect()->back()->with('toast_error', 'Penilai sudah terdaftar');
        }

        $this->db->table('t_dupak_penilai')->insert($record);

        return redirect()->back()->with('toast_success', 'Penilai berhasil ditambahkan');
    }

    public function delete_penilai($penilai_id)
    {
        $this->db->table('t_dupak_penilai')->where('id', $penilai_id)->delete();

        return redirect()->back()->with('toast_success', 'Penilai berhasil dihapus');
    }


    public function list_usulan($id_dupak)
    {
        $data['titlePage'] = 'Tambah Data';
        $data['menu'] = 'dupak-daftar';
        $data['content_title'] = 'Tambah Data';

        $id_kegiatan = $this->request->getGet('id_kegiatan');

        // get detail dupak
        $data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);

        // get activity references
        $data['kegiatan'] = $this->db->table('r_kegiatan')->where('id', $id_kegiatan)->get()->getRowObject();

        if ($id_kegiatan == 100000) {
            $data['id_kegiatan'] = $id_kegiatan;
            $data_kualifikasi = $this->pegawaiModel->getKualifikasi($data['dupak']->id_sdm);

            $data = array_merge($data, $data_kualifikasi);

            return view('dupak/parts/modal-content/_01_pendidikan', $data);
        }

        if ($id_kegiatan == 110000) {
            $data['id_kegiatan'] = $id_kegiatan;
            $data_pela_pendidikan = $this->pegawaiModel->getPelaksanaanPendidikan($data['dupak']->id_sdm);

            $data = array_merge($data, $data_pela_pendidikan);

            return view('dupak/parts/modal-content/_02_pelaksanaan_pendidikan', $data);
        }

        if ($id_kegiatan == 120000) {
            $data['id_kegiatan'] = $id_kegiatan;
            $data_pela_penelitian = $this->pegawaiModel->getPelaksanaanPenelitian($data['dupak']->id_sdm);

            $data = array_merge($data, $data_pela_penelitian);

            return view('dupak/parts/modal-content/_03_pelaksanaan_penelitian', $data);
        }

        if ($id_kegiatan == 130000) {
            $data['id_kegiatan'] = $id_kegiatan;
            $data_pela_pengabdian = $this->pegawaiModel->getPelaksanaanPengabdian($data['dupak']->id_sdm);

            $data = array_merge($data, $data_pela_pengabdian);

            return view('dupak/parts/modal-content/_04_pelaksanaan_pengabdian', $data);
        }

        if ($id_kegiatan == 140000) {
            $data['id_kegiatan'] = $id_kegiatan;
            $data_penunjang = $this->pegawaiModel->getPenunjangLain($data['dupak']->id_sdm);

            $data = array_merge($data, $data_penunjang);

            return view('dupak/parts/modal-content/_05_penunjang', $data);
        }

        return '<span class="font-weight-bold text-danger">Data tidak ditemukan</span>';
    }

    public function add_ak($id_dupak, $id_detail)
    {
        $data['titlePage'] = 'Tambah Data';
        $data['menu'] = 'dupak-daftar';

        if (!$this->request->getGet('id') and !$this->request->getGet('map')) {
            return redirect()->route('home');
        }

        $id_kegiatan = $this->request->getGet('id');
        $id_map = $this->request->getGet('map');

        // get detail dupak
        $data['dupak'] = $this->dupakModel->getDetailUsulan($id_dupak);

        // get activity references
        $data['kegiatan'] = $this->db->table('r_kegiatan')->where('id', $id_kegiatan)->get()->getRowObject();

        if (!$data['kegiatan']) {
            return redirect()->back()->with('app_error', 'Kegiatan tidak ditemukan');
        }

        // set card title
        $data['content_title'] = 'Tambah Data Usulan Bidang ' . $data['kegiatan']->nama;

        // main process
        $sister_map = $this->dataModel->getDetailSisterMapping($id_map);
        $data['sister_map'] = $sister_map;

        helper('sisterws');

        if ($sister_map->parameter_type == 'path') {
            $sister_response = sister_path_getDataByID($sister_map->api_uri, $id_detail);
        }

        if ($sister_response->getStatusCode() != 200) {
            return redirect()->back()->with('app_error', $sister_response->getReason());
        }

        $sister_detail = json_decode($sister_response->getBody());
        $data['sister_detail'] = $sister_detail;


        $ref_kegiatan = $this->bidangKegiatanModel->getKlasifikasiKegiatan($id_kegiatan);
        $data['ref_kegiatan'] = $ref_kegiatan;


        return view('dupak/add_ak', $data);
    }

    public function store_add_ak($id_dupak, $id_detail, $id_map)
    {
        $rules = $this->validation->setRules(
            [
                'klasifikasi' => 'required',
                'volume' => 'required',
                'satuan' => 'required',
                'angka-kredit' => 'required',
                'jumlah-angka-kredit' => 'required',
            ],
            [
                'klasifikasi' => [
                    'required' => 'Silahkan pilih klasifikasi kegiatan diatas'
                ],
                'volume' => [
                    'required' => 'Jumlah volume kegiatan harus diisi'
                ],
                'satuan' => [
                    'required' => 'Jenis Satuan Hasil harus diisi'
                ],
                'angka-kredit' => [
                    'required' => 'Nilai Angka Kredit harus diisi'
                ],
                'jumlah-angka-kredit' => [
                    'required' => 'Jumlah Angka Kredit tidak boleh kosong'
                ]
            ]
        );

        // run input validation
        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        // store process
        $id_kegiatan = $this->request->getPost('klasifikasi');
        $volume = str_to_int($this->request->getPost('volume'));
        $satuan = trim($this->request->getPost('satuan'));
        $angka_kredit = str_to_int($this->request->getPost('angka-kredit'));
        $jumlah_angka_kredit = str_to_int($this->request->getPost('jumlah-angka-kredit'));

        try {
            $data = [
                'id_dupak' => $id_dupak,
                'id_detail' => $id_detail,
                'id_sistermap' => $id_map,
                'id_subkegiatan' => $id_kegiatan,
                'volume' => $volume,
                'ak_nilai' => $angka_kredit,
                'satuan_hasil' => $satuan,
                'ak_usulan' => $jumlah_angka_kredit,
                'created_by' => user_id()
            ];

            $this->dupakDetailModel->insert($data);

            return redirect()->route('dupak_detail', [$id_dupak])->with('toast_success', 'Angka kredit telah ditambahkan');
        } catch (Exception $ex) {
            $err_msg = $ex->getMessage();

            if ($ex->getCode() == '1062') {
                $err_msg = 'Kegiatan sudah masuk dalam pengajuan.';
            }

            return redirect()->back()->with('app_error', $err_msg);
        }
    }

    public function show_add_ak($id_dupak)
    {
        $id_usulan = $this->request->getGet('id_usulan');

        $usulan = $this->dupakDetailModel->where('id', $id_usulan)->get()->getRow();

        // main process
        $sister_map = $this->dataModel->getDetailSisterMapping($usulan->id_sistermap);
        $data['sister_map'] = $sister_map;

        helper('sisterws');

        if ($sister_map->parameter_type == 'path') {
            $sister_response = sister_path_getDataByID($sister_map->api_uri, $usulan->id_detail);
        }

        if ($sister_response->getStatusCode() != 200) {
            return redirect()->back()->with('app_error', $sister_response->getReason());
        }

        $sister_detail = json_decode($sister_response->getBody());
        $data['sister_detail'] = $sister_detail;

        $data['detail_usulan'] = $this->dupakDetailModel->getDetailById($id_usulan)->getRow();

        $data['evaluasi_verifikasi'] = $this->dupakVerifikasiModel->getListVerifikasi($id_usulan)->getResult();
        $data['evaluasi_penilaian'] = $this->dupakPenilaianModel->getListPenilaian($id_usulan)->getResult();

        return view('dupak/parts/modal-content/_99_detail_usulan', $data);
    }

    public function delete_ak($id_dupak, $id_detail)
    {
        $detail = $this->dupakDetailModel->where('id_dupak', $id_dupak)->where('id_detail', $id_detail);
        $detail->delete();

        return redirect()->back();
    }

    public function acc_fakultas_yes($id_dupak)
    {
        $this->dupakModel->where('id', $id_dupak)
            ->set(['acc_fakultas' => '1'])
            ->update();

        return redirect()->back()->with('toast_success', 'Pengajuan Usulan Angka Kredit telah disetujui Tim Penilai PAK Fakultas');
    }

    public function acc_fakultas_no($id_dupak)
    {
        $this->dupakModel->where('id', $id_dupak)
            ->set(['acc_fakultas' => '2'])
            ->update();

        return redirect()->back()->with('toast_warning', 'Pengajuan Usulan Angka Kredit tidak disetujui Tim Penilai PAK Fakultas');
    }


    public function dupak_evaluasi()
    {
        // id in table "t_dupak_detail"
        $id_usulan = $this->request->getGet('id_usulan');

        $data['detail_usulan'] = $this->dupakDetailModel->getDetailById($id_usulan)->getRow();

        return view('dupak/parts/modal-content/_98_form_evaluasi', $data);
    }

    public function dupak_evaluasi_store($id_usulan)
    {
        $usulan     = $this->dupakDetailModel->getDetailById($id_usulan)->getRow();

        if (!$usulan) {
            return 'Usulan tidak ditemukan';
        }

        $dupak      = $this->dupakModel->getDetailUsulan($usulan->id_dupak);

        $sesuai     = $this->request->getPost('sesuai');
        $catatan    = $this->request->getPost('catatan');

        $data = [
            'id_usulan' => $usulan->id,
            'sesuai' => $sesuai,
            'catatan' => trim($catatan),
            'created_by' => user()->id
        ];

        if ($dupak->tahap_id == 20) {
            $this->dupakVerifikasiModel->insert($data);
        } else if ($dupak->tahap_id == 40) {
            $this->dupakPenilaianModel->insert($data);
        } else {
            return redirect()->route('dupak_detail', [$dupak->id])->with('app_error', 'Evaluasi tidak bisa dilakukan');
        }

        return redirect()->route('dupak_detail', [$dupak->id])->with('toast_success', 'Hasil evaluasi telah disimpan');
    }


    public function store_dupak_dokumen($id_dupak)
    {
        $file = $this->request->getFile('file');

        $orig_name = $file->getName();
        $name = seo_friendly_url($orig_name);
        $ext = $file->guessExtension();

        $file_name = 'f_01_' . rand(0, 9999) . '_' . date('YmdHis') . '_' . $name . '.' . $ext;

        $path = 'dokumen_pengantar/' . $id_dupak . '/';

        $path = $file->store($path, $file_name);


        $data = [
            'id' => $this->uuid->uuid4()->toString(),
            'id_dupak' => $id_dupak,
            'nama_dokumen' => $orig_name,
            'tautan' => $path,
            'created_by' => user()->id
        ];

        $this->dupakDokumenModel->insert($data);
    }

    public function send_dupak($id_dupak)
    {
        // $uri = explode("id=", previous_url());

        // $id_dupak = $uri[1];

        try {
            $next_process = $this->getNextProcess($id_dupak);

            $this->dupakModel->update($id_dupak, [
                'tahap_id' => $next_process['tahap'],
            ]);

            // logs
            $this->setDupakLogs($id_dupak, $next_process['tahap']);

            return redirect()->route('dupak_index')->with('toast_success', $next_process['pesan']);
        } catch (Exception $ex) {

            return redirect()->back()->with('app_error', $ex->getMessage());
        }
    }

    public function return_dupak($id_dupak)
    {
        // $uri = explode("id=", previous_url());

        // $id_dupak = $uri[1];

        $catatan = $this->request->getPost('catatan');

        try {
            $return_process = $this->getReturnProcess();

            $this->dupakModel->update($id_dupak, [
                'tahap_id' => $return_process['tahap'],
            ]);

            // logs
            $this->setDupakLogs($id_dupak, $return_process['tahap'], $catatan);

            return redirect()->route('dupak_index')->with('toast_success', $return_process['pesan']);
        } catch (Exception $ex) {
            return redirect()->back()->with('app_error', $ex->getMessage());
        }
    }

    public function reject_dupak($id_dupak)
    {
        // $uri = explode("id=", previous_url());

        // $id_dupak = $uri[1];

        $alasan = $this->request->getPost('alasan');

        try {
            $reject = $this->getRejectProcess();

            $this->dupakModel->update($id_dupak, [
                'tahap_id' => $reject['tahap'],
            ]);

            // logs
            $this->setDupakLogs($id_dupak, $reject['tahap'], $alasan);

            return redirect()->route('dupak_index')->with('toast_success', $reject['pesan']);
        } catch (Exception $ex) {
            return redirect()->back()->with('app_error', $ex->getMessage());
        }
    }

    public function getDokumenPengantar($id_dupak)
    {
        return DataTables::use('t_dupak_dokumen')
            ->where(['id_dupak' => $id_dupak])
            ->addColumn('action', function ($data) {
                if ($data->created_by == user()->id) {
                    return '<button type="button" class="btn btn-xs btn-outline-danger btn-delete-dokumen" data-id="' . $data->id . '"><i class="fas fa-fw fa-trash"></i></button>';
                }

                return '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function deleteDokumenPengantar($id_dok)
    {
        define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
        define('PUBPATH', str_replace(SELF, '', FCPATH)); // added

        $dokumen = $this->dupakDokumenModel->where('id', $id_dok);

        $dok = $dokumen->get()->getRow();

        $path = PUBPATH . '/uploads/' . $dok->tautan;

        unlink($path);

        $dok2 = $this->dupakDokumenModel->where('id', $id_dok);
        $dok2->delete();
    }


    // protected function
    protected function getNextProcess($id_dupak)
    {
        $dupak = $this->dupakModel->where('id', $id_dupak)->get()->getRow();

        // first process as default
        $tahap_id = 1;
        $pesan = '';

        if (in_groups('dosen')) {
            // usulan masuk ke operator unit
            $tahap_id = 10;
            $pesan = 'Data usulan telah berhasil dikirim ke Operator Fakultas';
        }

        if (in_groups('operator')) {
            // usulan masuk ke verifikator untuk diverifikasi
            // $tahap_id = 20;

            // usulan langsung masuk ke kepegawaian
            $tahap_id = 30;

            $pesan = 'Data usulan telah berhasil dikirim ke Verifikator Fakultas';

            if ($dupak->tahap_id == 45) {
                $tahap_id = 40;
                $pesan = 'Data usulan telah dikirimkan kembali ke Tim Penilai PAK';
            }
        }

        if (in_groups('verifikator')) {
            // usulan di kirim ke koordinator BUK untuk direkap
            $tahap_id = 30;
            $pesan = 'Data usulan telah berhasil dikirim ke Bagian Kepegawaian';
        }

        if (in_groups('koordinator')) {
            // usulan diteruskan ke tim penilai pak
            $tahap_id = 40;
            $pesan = 'Data usulan telah berhasil dikirim ke Tim Penilai PAK';
        }

        if (in_groups('reviewer')) {
            // usulan di setujui untuk dibuatkan SK
            $tahap_id = 50;
            $pesan = 'Data usulan telah disetujui dan dikirimkan ke Bagian Kepegawaian';
        }

        $next_process['tahap'] = $tahap_id;
        $next_process['pesan'] = $pesan;

        return $next_process;
    }

    protected function getReturnProcess()
    {
        // perbaikan unit as default
        $tahap_id = 25;
        $pesan = 'Data usulan telah dikembalikan ke pegawai untuk diperbaiki';

        if (in_groups('koordinator')) {
            $tahap_id = 35;
            $pesan = 'Data usulan telah dikembalikan ke Admin Fakultas untuk diperbaiki';
        }

        if (in_groups('reviewer')) {
            $tahap_id = 45;
            $pesan = 'Data usulan telah dikembalikan ke pegawai untuk diperbaiki';
        }

        $return_process['tahap'] = $tahap_id;
        $return_process['pesan'] = $pesan;

        return $return_process;
    }

    protected function getRejectProcess()
    {
        // perbaikan unit as default
        $tahap_id = 26;
        $pesan = 'Data usulan telah ditolak';

        if (in_groups('reviewer')) {
            $tahap_id = 46;
            $pesan = 'Data usulan telah ditolak';
        }

        $reject['tahap'] = $tahap_id;
        $reject['pesan'] = $pesan;

        return $reject;
    }

    protected function setDupakLogs($id_dupak, $tahap_id, $keterangan = null)
    {
        $this->db->table('t_dupak_logs')->insert([
            'id_dupak' => $id_dupak,
            'tahap_id' => $tahap_id,
            'keterangan' => $keterangan,
            'created_by' => user()->id,
        ]);

        return true;
    }
}
