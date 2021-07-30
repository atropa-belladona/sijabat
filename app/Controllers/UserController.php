<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
	public function index()
	{
		$data['titlePage'] = 'Pengaturan Pengguna';
		$data['menu'] = 'setting-user';

		return view('users/index', $data);
	}
}
