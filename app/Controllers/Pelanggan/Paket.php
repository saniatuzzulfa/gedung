<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Modelnya;


class Paket extends BaseController
{

	public function __construct(){
		$this->db = db_connect();
		$this->mod = new Modelnya();
		$hak_akses = session()->get('hak_akses');
		if($hak_akses=='' || $hak_akses == null){
			return redirect()->to('/Login');
		}
	}


	public function index()
	{
		$mod = $this->mod;

		$data = [
			'paket'		=> $mod->getAll('pakett')->getResult()
		];
		return view('pelanggan/paket',$data);
	}

}
