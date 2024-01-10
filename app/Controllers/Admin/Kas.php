<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Modelnya;


class Kas extends BaseController
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
			'kas'		=> $mod->getAll('kas')->getResult()
		];
		return view('admin/kas',$data);
	}


	public function save_kas($metode){
		$kirim = [
			'kode_kas' 		=> $this->request->getPost('kode_kas'),
			'nama_kas'		 	=> $this->request->getPost('nama_kas'),
			'tipe_kas'				 => $this->request->getPost('tipe_kas')
		];


		if($metode=='add'){

			$simpan=$this->mod->insData('kas',$kirim);
			if($simpan){
				echo json_encode(['status'=>true,'pesan'=>'data kas berhasil disimpan']);
			}else {
				echo json_encode(['status'=>false,'pesan'=>'data kas gagal disimpan']);
			}
		}else {
			$simpan=$this->mod->upData('kas', $kirim, ['kode_kas' => $this->request->getPost('kode_kas')]);
			if($simpan){
				echo json_encode(['status'=>true,'pesan'=>'data kas berhasil diedit']);
			}else {
				echo json_encode(['status'=>false,'pesan'=>'data kas gagal diedit']);
			}
		}
	}

	public function edit_kas($kode_kas)
	{
		$data=$this->mod->getwhere('kas', '*', ['kode_kas' => $kode_kas])->getRow();
		echo json_encode($data);
	}

	public function hapus($kode_kas) 
	{
		$hapus=$this->mod->delData('kas', ['kode_kas'=> $kode_kas]);
		if($hapus){
			echo json_encode(['status'=>true,'pesan'=>'data kas berhasil dihapus']);
		}else {
			echo json_encode(['status'=>false,'pesan'=>'data kas gagal dihapus']);
		}
	}


}
