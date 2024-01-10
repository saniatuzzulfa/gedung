<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelnya;


class Dashboard extends BaseController
{

	public function __construct(){
		$this->db = db_connect();
		$this->mod = new Modelnya();
	}


	public function index()
	{

		return view('data/dashboard');
	}


	
}
