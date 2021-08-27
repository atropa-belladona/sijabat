<?php

namespace App\Models;

use CodeIgniter\Model;

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

		$data['pengajaran'] = sister_getDataListPengajaran($id_sdm);

		$data['penelitian'] = sister_getDataListPenelitianSDM($id_sdm);
		$data['publikasi'] = sister_getDataListPublikasiSDM($id_sdm);
		$data['haki'] = sister_getDataListHakiSDM($id_sdm);

		$data['pengabdian'] = sister_getDataListPengabdianSDM($id_sdm);

		$data['anggota_profesi'] = sister_getDataListAnggotaProfesiSDM($id_sdm);
		$data['penghargaan'] = sister_getDataListPenghargaanSDM($id_sdm);
		$data['penunjang_lain'] = sister_getDataListPenunjangLainSDM($id_sdm);

		return $data;
	}
}
