<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function __construct()
	{
	}

	public function index()
	{
		$data['titlePage'] = 'Home';
		$data['menu'] = 'home';

		return view('index', $data);
	}
}
