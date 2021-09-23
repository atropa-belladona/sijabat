<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

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


	// Get SDM Profile by NIDN
	public function getProfileSDMByNIDN($nidn)
	{
		$sdm = $this->db->table('v_pegawai')
			->where('nidn', $nidn)
			->get();

		return $sdm->getRow();
	}

	public function getPendidikanTerakhirSDM($id_sdm)
	{
		$pendidikan = $this->db->table('t_sdm_pendidikan')
			->where('id_sdm', $id_sdm)
			->orderBy('tahun_lulus', 'desc')
			->get();

		return $pendidikan->getRow();
	}

	public function getGolonganTerakhir($id_sdm)
	{
		$gol = $this->db->table('t_sdm_kepangkatan')
			->where('id_sdm', $id_sdm)
			->orderBy('tanggal_mulai', 'desc')
			->get();

		return $gol->getRow();
	}

	public function getPenugasanTerakhir($id_sdm)
	{
		$penugasan = $this->db->table('t_sdm_penugasan')
			->where('id_sdm', $id_sdm)
			->orderBy('tanggal_mulai', 'desc')
			->get();

		return $penugasan->getRow();
	}

	public function getListPegawaiAktif()
	{
		$list = $this->db->table('v_pegawai')
			->where('status_aktif', 'Aktif')
			->get();

		return $list->getResult();
	}

	public function getInfoPegawaiByIdSDM($id_sdm)
	{
		$data = $this->db->table('v_pegawai')
			->where('id_sdm', $id_sdm)
			->get();

		return $data->getRow();
	}

	// get detail sdm
	public function getDetailSDM($id_sdm)
	{
		$pegawai = $this->db->table('t_pegawai')->where('id_sdm', $id_sdm)->get();
		$data['pegawai'] = $pegawai->getRow();

		// about me
		$data_profile = $this->getProfile($id_sdm);

		// pendidikan & diklat
		$data_kualifikasi = $this->getKualifikasi($id_sdm);

		// pelaksanaan pendidikan
		$data_pela_pendidikan = $this->getPelaksanaanPendidikan($id_sdm);

		// pelaksanaan penelitian
		$data_pela_penelitian = $this->getPelaksanaanPenelitian($id_sdm);

		// pelaksanaan pengabdian
		$data_pela_pengabdian = $this->getPelaksanaanPengabdian($id_sdm);

		// penunjang lain
		$data_penunjang = $this->getPenunjangLain($id_sdm);

		// dokumen
		$data_dokumen = $this->getDokumen($id_sdm);

		// log
		$data_importlogs = $this->getImportLogs($id_sdm);

		$data = array_merge($data, $data_profile, $data_kualifikasi, $data_pela_pendidikan, $data_pela_penelitian, $data_pela_pengabdian, $data_penunjang, $data_dokumen, $data_importlogs);

		return $data;
	}

	public function getProfile($id_sdm)
	{
		$sdm_profile = $this->db->table('t_sdm_profile')->where('id_sdm', $id_sdm)->get()->getRow();

		if (isset($sdm_profile->foto)) {
			$data['foto'] = 'data:image/png;base64,' . base64_encode($sdm_profile->foto);
		}

		$data['about_me'] = $sdm_profile;

		$penugasan = $this->db->table('t_sdm_penugasan')
			->where('id_sdm', $id_sdm)
			->orderBy('tanggal_mulai', 'desc')
			->get();

		$data['penugasan'] = $penugasan->getRow();

		return $data;
	}

	public function getKualifikasi($id_sdm)
	{
		$pendidikan = $this->db->table('t_sdm_pendidikan')->where('id_sdm', $id_sdm)->orderBy('tahun_lulus', 'desc')->get();
		$data['pendidikan'] = $pendidikan->getResult();

		return $data;
	}

	public function getPelaksanaanPendidikan($id_sdm)
	{
		$data['pengajaran'] = $this->db->table('t_sdm_pengajaran')->where('id_sdm', $id_sdm)->orderBy('semester', 'desc')->get()->getResult();
		$data['visiting_scientist'] =  $this->db->table('t_sdm_visitingscientist')->where('id_sdm', $id_sdm)->orderBy('tanggal', 'desc')->get()->getResult();
		$data['bahan_ajar'] =  $this->db->table('t_sdm_bahanajar')->where('id_sdm', $id_sdm)->orderBy('tanggal_terbit', 'desc')->get()->getResult();
		$data['detasering'] =  $this->db->table('t_sdm_detasering')->where('id_sdm', $id_sdm)->orderBy('tanggal_sk_penugasan', 'desc')->get()->getResult();
		$data['orasi_ilmiah'] =  $this->db->table('t_sdm_orasi')->where('id_sdm', $id_sdm)->orderBy('tanggal_pelaksanaan', 'desc')->get()->getResult();
		$data['pembimbing_dosen'] =  $this->db->table('t_sdm_pembimbingdosen')->where('id_sdm', $id_sdm)->orderBy('tanggal_mulai', 'desc')->get()->getResult();
		$data['tugas_tambahan'] =  $this->db->table('t_sdm_tugastambahan')->where('id_sdm', $id_sdm)->orderBy('tanggal_mulai_tugas', 'desc')->get()->getResult();

		return $data;
	}

	public function getPelaksanaanPenelitian($id_sdm)
	{
		$data['penelitian'] = $this->db->table('t_sdm_penelitian')->where('id_sdm', $id_sdm)->orderBy('tahun_pelaksanaan', 'desc')->get()->getResult();
		$data['publikasi'] = $this->db->table('t_sdm_publikasi')->where('id_sdm', $id_sdm)->orderBy('tanggal', 'desc')->get()->getResult();
		$data['haki'] =  $this->db->table('t_sdm_hkipaten')->where('id_sdm', $id_sdm)->orderBy('tanggal', 'desc')->get()->getResult();

		return $data;
	}

	public function getPelaksanaanPengabdian($id_sdm)
	{
		$data['pengabdian'] = $this->db->table('t_sdm_pengabdian')->where('id_sdm', $id_sdm)->orderBy('tahun_pelaksanaan', 'desc')->get()->getResult();
		$data['pengelola_jurnal'] =  $this->db->table('t_sdm_pengelolajurnal')->where('id_sdm', $id_sdm)->orderBy('tanggal_mulai', 'desc')->get()->getResult();
		$data['pembicara'] = $this->db->table('t_sdm_pembicara')->where('id_sdm', $id_sdm)->orderBy('tanggal_pelaksanaan', 'desc')->get()->getResult();
		$data['jabstruk'] = $this->db->table('t_sdm_jabstruk')->where('id_sdm', $id_sdm)->orderBy('tanggal_mulai_jabatan', 'desc')->get()->getResult();

		return $data;
	}

	public function getPenunjangLain($id_sdm)
	{
		$data['anggota_profesi'] =  $this->db->table('t_sdm_anggotaprofesi')->where('id_sdm', $id_sdm)->orderBy('tanggal_mulai_keanggotaan', 'desc')->get()->getResult();
		$data['penghargaan'] =  $this->db->table('t_sdm_penghargaan')->where('id_sdm', $id_sdm)->orderBy('tahun', 'desc')->get()->getResult();
		$data['penunjang_lain'] = $this->db->table('t_sdm_penunjanglain')->where('id_sdm', $id_sdm)->orderBy('tanggal_mulai', 'desc')->get()->getResult();

		return $data;
	}

	public function getDokumen($id_sdm)
	{
		$data['dokumen'] = $this->db->table('t_sdm_dokumen')->where('id_sdm', $id_sdm)
			->orderBy('id_jenis_dokumen', 'asc')
			->orderBy('tanggal_upload', 'desc')
			->get()->getResult();

		return $data;
	}

	public function getImportLogs($id_sdm)
	{
		$data['import_logs'] = $this->db->table('t_sdm_importlogs as a')->where('id_sdm', $id_sdm)
			->join('users', 'users.id = a.created_by')
			->orderBy('created_at', 'desc')
			->limit(5)
			->select('a.id, a.ip, a.created_at, users.name')
			->get()
			->getResult();

		return $data;
	}

	// Function to import sdm data from sister unj
	public function importDataSisterBySDM($id_sdm)
	{
		$data['sdm_profile'] =  $this->setSDMProfile($id_sdm);

		// check if import sdm profile succeed
		if ($data['sdm_profile']) {
			// get additional data
			$data['penugasan'] = $this->setSDMPenugasan($id_sdm);
			$data['pendidikan'] = $this->setSDMPendidikanFormal($id_sdm);
			$data['jabfung'] = $this->setSDMJabatanFungsional($id_sdm);
			$data['kepangkatan'] = $this->setSDMKepangkatan($id_sdm);

			// get pelaksanaan pendidikan data
			$data['pengajaran'] = $this->setSDMPengajaran($id_sdm);
			$data['visiting'] = $this->setSDMVisitingScientist($id_sdm);
			$data['bahan_ajar'] = $this->setSDMBahanAjar($id_sdm);
			$data['detasering'] = $this->setSDMDetasering($id_sdm);
			$data['orasi_ilmiah'] = $this->setSDMOrasiIlmiah($id_sdm);
			$data['pembimbing_dosen'] = $this->setSDMPembimbingDosen($id_sdm);
			$data['tugas_tambahan'] = $this->setSDMTugasTambahan($id_sdm);

			// get pelaksanaan penelitian data
			$data['penelitian'] = $this->setSDMPenelitian($id_sdm);
			$data['publikasi'] = $this->setSDMPublikasi($id_sdm);
			$data['haki'] = $this->setSDMHakiPaten($id_sdm);

			// get pelaksanaan pengabdian
			$data['pengabdian'] = $this->setSDMPengabdian($id_sdm);
			$data['pengelola_jurnal'] = $this->setSDMPengelolaJurnal($id_sdm);
			$data['pembicara'] = $this->setSDMPembicara($id_sdm);
			$data['jabatan_struktural'] = $this->setSDMJabatanStruktural($id_sdm);

			// get penunjang kegiatan
			$data['anggota_profesi'] = $this->setSDMAnggotaProfesi($id_sdm);
			$data['penghargaan'] = $this->setSDMPenghargaan($id_sdm);
			$data['penunjang_lain'] = $this->setSDMPenunjangLain($id_sdm);

			// get data dokumen SDM
			$data['dokumen'] = $this->setSDMDokumen($id_sdm);

			$data['logs'] = $this->setImportLog($id_sdm);
		}

		return $data;
	}

	protected function _insertInto($table, $data)
	{
		$builder = $this->db->table($table);

		$builder->replace($data);
	}

	protected function setSDMProfile($id_sdm)
	{
		try {
			helper('sisterws');

			$pegawai = $this->db->table('t_pegawai')->where('id_sdm', $id_sdm)->get()->getRow();

			$sister_profile = sister_getDataProfileSDM($id_sdm);
			$sister_alamat = sister_getDataAlamatSDM($id_sdm);

			$alamat = $sister_alamat->alamat . ', RT ' . $sister_alamat->rt . ' RW ' . $sister_alamat->rw . ', ' . $sister_alamat->kelurahan . ', ' . $sister_alamat->kota_kabupaten . ', ' . $sister_alamat->kode_pos;

			$foto = sister_getDataFotoSDM($id_sdm);

			$data = [
				'id_sdm' => $pegawai->id_sdm,
				'nama' => ucwords(strtolower($pegawai->nama_sdm)),
				'nidn' => $pegawai->nidn,
				'nip' => $pegawai->nip,
				'jenis_kelamin' => $sister_profile->jenis_kelamin,
				'tempat_lahir' => $sister_profile->tempat_lahir,
				'tanggal_lahir' => $sister_profile->tanggal_lahir,
				'alamat' => $alamat,
				'email' => $sister_alamat->email,
				'telepon_hp' => $sister_alamat->telepon_hp,
				'foto' => $foto
			];

			$this->_insertInto('t_sdm_profile', $data);

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setImportLog($id_sdm)
	{
		try {

			$ip_addr = $this->_getClientIpAddress();

			$data = [
				'id_sdm' => $id_sdm,
				'ip' => $ip_addr,
				'created_by' => user()->id
			];

			$this->_insertInto('t_sdm_importlogs', $data);

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPenugasan($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPenugasanSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'status_kepegawaian' => $item->status_kepegawaian,
					'ikatan_kerja' => $item->ikatan_kerja,
					'unit_kerja' => $item->unit_kerja,
					'jenjang_pendidikan' => $item->jenjang_pendidikan,
					'perguruan_tinggi' => $item->perguruan_tinggi,
					'tanggal_mulai' => $item->tanggal_mulai,
					'tanggal_keluar' => $item->tanggal_keluar,
				];

				$this->_insertInto('t_sdm_penugasan', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMJabatanFungsional($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getListDataJabatanFungsional($id_sdm);

			foreach ($info as $item) {

				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'jabatan_fungsional' => $item->jabatan_fungsional,
					'sk' => $item->sk,
					'tanggal_mulai' => $item->tanggal_mulai,
				];

				$this->_insertInto('t_sdm_jabfung', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMKepangkatan($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getListDataKepangkatan($id_sdm);

			foreach ($info as $item) {

				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'sk' => $item->sk,
					'tanggal_mulai' => $item->tanggal_mulai,
					'pangkat_golongan' => $item->pangkat_golongan,
				];

				$this->_insertInto('t_sdm_kepangkatan', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPendidikanFormal($id_sdm)
	{
		try {
			helper('sisterws');

			$pendidikan = sister_getListDataPendidikanFormal($id_sdm);

			foreach ($pendidikan as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'jenjang_pendidikan' => $item->jenjang_pendidikan,
					'gelar_akademik' => $item->gelar_akademik,
					'bidang_studi' => $item->bidang_studi,
					'nama_perguruan_tinggi' => $item->nama_perguruan_tinggi,
					'tahun_lulus' => $item->tahun_lulus,
				];

				$this->_insertInto('t_sdm_pendidikan', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPengajaran($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPengajaran($id_sdm);

			foreach ($info as $item) {

				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'jumlah_mahasiswa' => $item->jumlah_mahasiswa,
					'kelas' => $item->kelas,
					'sks' => $item->sks,
					'semester' => $item->semester,
					'mata_kuliah' => $item->mata_kuliah,
				];

				$this->_insertInto('t_sdm_pengajaran', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMVisitingScientist($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListVisitingScientist($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'perguruan_tinggi' => $item->perguruan_tinggi,
					'lama_kegiatan' => $item->lama_kegiatan,
					'tanggal' => $item->tanggal,
				];

				$this->_insertInto('t_sdm_visitingscientist', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}


	protected function setSDMBahanAjar($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListBahanAjar($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'judul' => $item->judul,
					'isbn' => $item->isbn,
					'nama_jenis' => $item->nama_jenis,
					'nama_penerbit' => $item->nama_penerbit,
					'tanggal_terbit' => $item->tanggal_terbit,
				];

				$this->_insertInto('t_sdm_bahanajar', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMDetasering($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListDetasering($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'kategori_kegiatan' => $item->kategori_kegiatan,
					'perguruan_tinggi' => $item->perguruan_tinggi,
					'bidang_tugas' => $item->bidang_tugas,
					'sk_penugasan' => $item->sk_penugasan,
					'tanggal_sk_penugasan' => $item->tanggal_sk_penugasan,
				];

				$this->_insertInto('t_sdm_detasering', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMOrasiIlmiah($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListOrasiIlmiah($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'judul_makalah' => $item->judul_makalah,
					'nama_pertemuan' => $item->nama_pertemuan,
					'penyelenggara' => $item->penyelenggara,
					'tanggal_pelaksanaan' => $item->tanggal_pelaksanaan,
				];

				$this->_insertInto('t_sdm_orasi', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPembimbingDosen($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPembimbingDosen($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'nama_pembimbing' => $item->nama_pembimbing,
					'nama_bimbingan' => $item->nama_bimbingan,
					'tanggal_mulai' => $item->tanggal_mulai,
					'tanggal_selesai' => $item->tanggal_selesai,
				];

				$this->_insertInto('t_sdm_pembimbingdosen', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMTugasTambahan($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListTugasTambahan($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'jenis_tugas' => $item->jenis_tugas,
					'unit_kerja' => $item->unit_kerja,
					'perguruan_tinggi' => $item->perguruan_tinggi,
					'tanggal_mulai_tugas' => $item->tanggal_mulai_tugas,
					'tanggal_selesai_tugas' => $item->tanggal_selesai_tugas,
				];

				$this->_insertInto('t_sdm_tugastambahan', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPenelitian($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPenelitianSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'judul' => $item->judul,
					'bidang_keilmuan' => implode('|', $item->bidang_keilmuan),
					'tahun_pelaksanaan' => $item->tahun_pelaksanaan,
					'lama_kegiatan' => $item->lama_kegiatan,
				];

				$this->_insertInto('t_sdm_penelitian', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPublikasi($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPublikasiSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'kategori_kegiatan' => $item->kategori_kegiatan,
					'judul' => $item->judul,
					'quartile' => $item->quartile,
					'bidang_keilmuan' => implode('|', $item->bidang_keilmuan),
					'jenis_publikasi' => $item->jenis_publikasi,
					'tanggal' => $item->tanggal,
					'asal_data' => $item->asal_data,
				];

				$this->_insertInto('t_sdm_publikasi', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMHakiPaten($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListHakiSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'kategori_kegiatan' => $item->kategori_kegiatan,
					'judul' => $item->judul,
					'quartile' => $item->quartile,
					'bidang_keilmuan' => implode('|', $item->bidang_keilmuan),
					'jenis_publikasi' => $item->jenis_publikasi,
					'tanggal' => $item->tanggal,
				];

				$this->_insertInto('t_sdm_hkipaten', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPengabdian($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPengabdianSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'judul' => $item->judul,
					'bidang_keilmuan' => implode('|', $item->bidang_keilmuan),
					'tahun_pelaksanaan' => $item->tahun_pelaksanaan,
					'lama_kegiatan' => $item->lama_kegiatan,
				];

				$this->_insertInto('t_sdm_pengabdian', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPengelolaJurnal($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPengelolaJurnalSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'kategori_kegiatan' => $item->kategori_kegiatan,
					'media_publikasi' => $item->media_publikasi,
					'sk_penugasan' => $item->sk_penugasan,
					'tanggal_mulai' => $item->tanggal_mulai,
					'tanggal_selesai' => $item->tanggal_selesai,
					'peran' => $item->peran,
					'aktif' => $item->aktif,
				];

				$this->_insertInto('t_sdm_pengelolajurnal', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPembicara($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPembicaraSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'judul_makalah' => $item->judul_makalah,
					'nama_pertemuan' => $item->nama_pertemuan,
					'penyelenggara' => $item->penyelenggara,
					'tanggal_pelaksanaan' => $item->tanggal_pelaksanaan,
				];

				$this->_insertInto('t_sdm_pembicara', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMJabatanStruktural($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListJabstrukSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'jabatan' => $item->jabatan,
					'sk_jabatan' => $item->sk_jabatan,
					'tanggal_mulai_jabatan' => $item->tanggal_mulai_jabatan,
					'tanggal_selesai_jabatan' => $item->tanggal_selesai_jabatan,
				];

				$this->_insertInto('t_sdm_jabstruk', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMAnggotaProfesi($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListAnggotaProfesiSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'nama_organisasi' => $item->nama_organisasi,
					'peran' => $item->peran,
					'tanggal_mulai_keanggotaan' => $item->tanggal_mulai_keanggotaan,
					'tanggal_selesai_keanggotaan' => $item->tanggal_selesai_keanggotaan,
					'instansi_profesi' => $item->instansi_profesi,
				];

				$this->_insertInto('t_sdm_anggotaprofesi', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}


	protected function setSDMPenghargaan($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPenghargaanSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'jenis_penghargaan' => $item->jenis_penghargaan,
					'nama' => $item->nama,
					'tahun' => $item->tahun,
					'instansi_pemberi' => $item->instansi_pemberi,
				];

				$this->_insertInto('t_sdm_penghargaan', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	protected function setSDMPenunjangLain($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListPenunjangLainSDM($id_sdm);

			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'nama' => $item->nama,
					'instansi' => $item->instansi,
					'sk_penugasan' => $item->sk_penugasan,
					'tanggal_mulai' => $item->tanggal_mulai,
					'tanggal_selesai' => $item->tanggal_selesai,
					'peran' => $item->peran,
				];

				$this->_insertInto('t_sdm_penunjanglain', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}

	// SET Dokumen SDM
	protected function setSDMDokumen($id_sdm)
	{
		try {
			helper('sisterws');

			$info = sister_getDataListDokumenSDM($id_sdm);

			// insert into database
			foreach ($info as $item) {
				$data = [
					'id' => $item->id,
					'id_sdm' => $id_sdm,
					'id_jenis_dokumen' => $item->id_jenis_dokumen,
					'jenis_dokumen' => $item->jenis_dokumen,
					'nama' => $item->nama,
					'keterangan' => $item->keterangan,
					'tautan' => $item->tautan,
					'tanggal_upload' => $item->tanggal_upload,
					'nama_file' => $item->nama_file,
					'jenis_file' => $item->jenis_file,
				];

				$this->_insertInto('t_sdm_dokumen', $data);
			}

			return true;
		} catch (Exception $ex) {
			log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
			return false;
		}
	}


	// Misc Function
	protected function _getClientIpAddress()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //Checking IP From Shared Internet
		{
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //To Check IP is Pass From Proxy
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		return $ip;
	}

	// ----------------------------------------------------------------------------------------------------------------------------------------------

	// it will deprecated when detail pegawai get from database
	public function getDetailPegawai($id_sdm)
	{
		$pegawai = $this->db->table('t_pegawai')->where('id_sdm', $id_sdm)->get();
		$data['pegawai'] = $pegawai->getRow();

		helper('sisterws');

		$pendidikan = sister_getListDataPendidikanFormal($id_sdm);
		$data['pendidikan'] = $pendidikan;

		$kelahiran = sister_getDataProfileSDM($id_sdm);
		$data['kelahiran'] = $kelahiran;

		$alamat = sister_getDataAlamatSDM($id_sdm);
		$data['alamat'] = $alamat;

		$data['penugasan'] = sister_getDataPenugasanSDM($id_sdm);

		$data['foto'] = 'data:image/png;base64,' . base64_encode(sister_getDataFotoSDM($id_sdm));

		// pelaksanaan pendidikan
		$data['pengajaran'] = sister_getDataListPengajaran($id_sdm);
		$data['visiting_scientist'] = sister_getDataListVisitingScientist($id_sdm);
		$data['bahan_ajar'] = sister_getDataListBahanAjar($id_sdm);
		$data['detasering'] = sister_getDataListDetasering($id_sdm);
		$data['orasi_ilmiah'] = sister_getDataListOrasiIlmiah($id_sdm);
		$data['pembimbing_dosen'] = sister_getDataListPembimbingDosen($id_sdm);
		$data['tugas_tambahan'] = sister_getDataListTugasTambahan($id_sdm);


		// pelaksanaan penelitian
		$data['penelitian'] = sister_getDataListPenelitianSDM($id_sdm);
		$data['publikasi'] = sister_getDataListPublikasiSDM($id_sdm);
		$data['haki'] = sister_getDataListHakiSDM($id_sdm);

		// pelaksanaan pengabdian
		$data['pengabdian'] = sister_getDataListPengabdianSDM($id_sdm);
		$data['pengelola_jurnal'] = sister_getDataListPengelolaJurnalSDM($id_sdm);
		$data['pembicara'] = sister_getDataListPembicaraSDM($id_sdm);
		$data['jabstruk'] = sister_getDataListJabstrukSDM($id_sdm);

		// penunjang lain
		$data['anggota_profesi'] = sister_getDataListAnggotaProfesiSDM($id_sdm);
		$data['penghargaan'] = sister_getDataListPenghargaanSDM($id_sdm);
		$data['penunjang_lain'] = sister_getDataListPenunjangLainSDM($id_sdm);

		return $data;
	}
}
