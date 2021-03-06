<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;
use Exception;

use Config\Database;

class UserController extends BaseController
{

	protected $userModel;
	protected $db;

	public function __construct()
	{
		$this->userModel = new UserModel();

		$this->db = Database::connect();
	}

	public function index()
	{
		// Page Information Data
		$data['titlePage'] = 'Pengaturan Pengguna';
		$data['menu'] = 'setting-user';
		$data['content_title'] = 'Daftar Pengguna';

		// get all users
		$data['users'] = $this->userModel->getAllUser();

		foreach ($data['users'] as $user) {
			$fakultas = $this->db->table('r_fakultas')->where('id', $user->kd_fakultas)->get()->getRow();

			if (isset($fakultas->nama)) {
				$user->fakultas = $fakultas->nama;
			} else {
				$user->fakultas = '';
			}
		}

		return view('users/index', $data);
	}

	public function create()
	{
		// Page Information Data
		$data['titlePage'] = 'Tambah Pengguna';
		$data['menu'] = 'setting-user';
		$data['content_title'] = 'Buat Pengguna Baru';

		// get user role list
		$data['roles'] = $this->userModel->getUserRoles();

		$result = $this->db->table('r_fakultas')->where('active', '1')->get();

		$data['fakultas'] = $result->getResult();

		return view('users/create', $data);
	}

	public function indexdosen()
	{
		// Page Information Data
		$data['titlePage'] = 'Profil Dosen';
		$data['menu'] = 'profil-dosen';
		$data['content_title'] = 'Data Dosen';

		return view('users/indexdosen', $data);
	}

	public function dokumen()
	{
		// Page Information Data
		$data['titlePage'] = 'Tambah Dokumen';
		$data['menu'] = 'dokumen-dosen';
		$data['content_title'] = 'Dokumen Persyaratan Kenaikan Pangkat';

		// get user role list
		// $data['roles'] = $this->userModel->getUserDok();

		return view('users/dokumen', $data);
	}

	public function rekap()
	{

		// Page Information Data
		$data['titlePage'] = 'Rekap Dosen';
		$data['menu'] = 'rekap-dosen';
		$data['content_title'] = 'Rekap DUPAK';

		return view('users/rekap', $data);
	}


	// store data when create user
	public function store()
	{
		$rules = [
			'nama' => 'required',
			'username' => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[users.username]',
			'password1' => 'required|matches[password2]',
			'password2' => 'required|matches[password1]',
			'role' => 'required'
		];

		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$nama = $this->request->getPost('nama');
		$nip = $this->request->getPost('nip');
		$email = $this->request->getPost('email');
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password1');
		$role = $this->request->getPost('role');
		$fakultas = $this->request->getPost('fakultas');

		if (($role == 'verifikator' or $role == 'operator') and $fakultas == '') {
			return redirect()->back()->withInput()->with('app_error', 'Fakultas harus diisi untuk role Dosen atau Operator');
		}

		try {
			$user = new User();

			$user->name = $nama;
			$user->nip = $nip;
			$user->kd_fakultas = $fakultas;
			$user->email = $email;
			$user->username = $username;
			$user->setPassword($password);
			$user->activate();

			$this->userModel->withGroup($role)->insert($user);

			return redirect('user_list')->with('app_success', 'Data berhasil direkam');
		} catch (Exception $ex) {
			return redirect()->back()->with('app_error', 'Error : ' . $ex->getMessage());
		}
	}
}
