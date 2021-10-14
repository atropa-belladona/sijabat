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
            $data['dupak'] = $this->dupakModel->getListUsulanPegawai(user()->username);
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

        $data['periode_penilaian'] = $this->dataModel->getOpenPeriodePenilaian();

        if ($data['periode_penilaian']) {
            // if role is dosen then nidn = username
            if (in_groups('dosen')) {
                $nidn = user()->username;
            }

            $data['sdm'] = $this->pegawaiModel->getProfileSDMByNIDN($nidn);
            $data['pendidikan'] = $this->pegawaiModel->getPendidikanTerakhirSDM($data['sdm']->id_sdm);
            $data['kepangkatan'] = $this->pegawaiModel->getGolonganTerakhir($data['sdm']->id_sdm);
        }

        return view('dupak/create', $data);
    }

    public function operator_request($id_sdm)
    {
        $data['titlePage'] = 'Buat Usulan';
        $data['menu'] = 'dupak-buat';
        $data['content_title'] = 'Buat Usulan';

        $data['periode_penilaian'] = $this->dataModel->getOpenPeriodePenilaian();

        if ($data['periode_penilaian']) {
            $data['sdm'] = $this->pegawaiModel->getInfoPegawaiByIdSDM($id_sdm);
            $data['pendidikan'] = $this->pegawaiModel->getPendidikanTerakhirSDM($id_sdm);
            $data['kepangkatan'] = $this->pegawaiModel->getGolonganTerakhir($id_sdm);
        }

        if (!$data['sdm'] or !$data['pendidikan']) {
            return redirect()->back()->with('app_error', 'Harap import data pegawai terlebih dahulu. Terima kasih');
        }

        return view('dupak/create', $data);
    }

    public function store()
    {
        $rules = $this->validation->setRules(
            [
                'periode_penilaian' => 'required',
                'id_sdm' => 'required',
                'nama' => 'required',
                'nidn' => 'required',
            ]
        );

        // run input validation
        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        $id_periode = $this->request->getPost('periode_penilaian');
        $masa_awal = $this->request->getPost('masa_awal');
        $masa_akhir = $this->request->getPost('masa_akhir');
        $id_sdm = $this->request->getPost('id_sdm');
        $nama_sdm = $this->request->getPost('nama');
        $nip = $this->request->getPost('nip');
        $nidn = $this->request->getPost('nidn');
        $no_karpeg = $this->request->getPost('no_karpeg');
        $pendidikan_terakhir = $this->request->getPost('pendidikan_terakhir');
        $jabfung = $this->request->getPost('jab_fung');
        $tmt_jabfung = $this->request->getPost('tmt_jab_fung');
        $mk_lama_thn = $this->request->getPost('mk_lama_thn');
        $mk_lama_bln = $this->request->getPost('mk_lama_bln');
        $mk_baru_thn = $this->request->getPost('mk_baru_thn');
        $mk_baru_bln = $this->request->getPost('mk_baru_bln');

        // store code here
        try {

            $this->dupakModel->transBegin();

            // check if pegawai already has pak request
            $check = $this->dupakModel->where('id_periode', $id_periode)
                ->where('id_sdm', $id_sdm)
                ->where('active', '1')
                ->get()
                ->getResult();

            if (count($check)) {
                return redirect()->route('dupak_index')->with('app_error', 'Pegawai memiliki pengajuan aktif pada periode ini');
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
                'id_periode' => $id_periode,
                'id_sdm' => $id_sdm,
                'masa_awal' => $masa_awal,
                'masa_akhir' => $masa_akhir,
                'nama_sdm' => $nama_sdm,
                'nip' => $nip,
                'nidn' => $nidn,
                'no_karpeg' => $no_karpeg,
                'pendidikan_terakhir' => $pendidikan_terakhir,
                'jabfung' => $jabfung,
                'tmt_jabfung' => $tmt_jabfung,
                'mk_lama_thn' => $mk_lama_thn,
                'mk_lama_bln' => $mk_lama_bln,
                'mk_baru_thn' => $mk_baru_thn,
                'mk_baru_bln' => $mk_baru_bln,
                'tahap_id' => $tahap_id,
                'created_by' => user()->id,
            ]);

            // record logs
            $this->setDupakLogs($id_dupak, $tahap_id);

            $this->dupakModel->transCommit();

            return redirect()->route('dupak_index')->with('app_success', 'Data Usulan berhasil disimpan');
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

        return redirect()->back()->with('app_success', 'Data berhasil dihapus');
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

        // else do below

        $pangkat = $this->pegawaiModel->getGolonganTerakhir($data['dupak']->id_sdm);

        helper('sisterws');
        $data['kepangkatan'] = sister_getDetailKepangkatan($pangkat->id);

        $data_sdm = $this->pegawaiModel->getProfile($data['dupak']->id_sdm);
        $data_pendidikan = $this->pegawaiModel->getKualifikasi($data['dupak']->id_sdm);

        $data['bidang_kegiatan'] = $this->db->table('r_kegiatan')->where('active', '1')->get()->getResult();

        $data['dupak_detail'] = $this->dupakDetailModel->getListDetailDupak($id_dupak);

        $data['total_ak_usulan'] = $this->dupakDetailModel->getSumUsulanAngkaKredit($id_dupak);

        $data['dokumen_pengantar'] = $this->dupakDokumenModel->getDokumenByDupakId($id_dupak);

        $data['dupak_logs'] = $this->dupakLogModel->getLogsById($id_dupak)->getResult();

        return view('dupak/detail', array_merge($data, $data_sdm, $data_pendidikan));
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

            return redirect()->route('dupak_detail', [$id_dupak])->with('app_success', 'Angka kredit telah ditambahkan');
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

        return redirect()->route('dupak_detail', [$dupak->id])->with('app_success', 'Hasil evaluasi telah disimpan');
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

            return redirect()->route('dupak_index')->with('app_success', $next_process['pesan']);
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

            return redirect()->route('dupak_index')->with('app_success', $return_process['pesan']);
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

            return redirect()->route('dupak_index')->with('app_success', $reject['pesan']);
        } catch (Exception $ex) {
            return redirect()->back()->with('app_error', $ex->getMessage());
        }
    }

    public function getDokumenPengantar($id_dupak)
    {
        return \Irsyadulibad\DataTables\DataTables::use('t_dupak_dokumen')
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
            $tahap_id = 20;

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
