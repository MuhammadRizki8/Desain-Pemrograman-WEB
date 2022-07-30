<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'BOOKLIB'
		];
		return view('pages/v_home', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About BOOKLIB'
		];
		return view('pages/v_about', $data);
	}

	public function contact()
	{
		$data = [
			'title' => 'Contact BOOKLIB'
		];
		return view('pages/v_contact', $data);
	}
}
