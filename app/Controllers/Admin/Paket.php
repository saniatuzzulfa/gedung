<?php

namespace App\Controllers\Admin;

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
		return view('admin/paket',$data);
	}


	public function save_paket($metode){
		$kirim = [
			'kode_paket' 		 => $this->request->getPost('kode_paket'),
			'jenis_paket'		 => $this->request->getPost('jenis_paket'),
            'bentuk_paket'		 => $this->request->getPost('bentuk_paket'),
			'nama_paket'		 => $this->request->getPost('nama_paket'),
			'harga_perpax'		 => $this->request->getPost('harga_perpax'),
			'jumlah_pax'		 => $this->request->getPost('jumlah_pax'),
            'harga'              => $this->request->getPost('harga'),
            'deskripsi'          => $this->request->getPost('deskripsi'),
		];


		if($metode=='add'){

			$simpan=$this->mod->insData('pakett',$kirim);
			if($simpan){
				echo json_encode(['status'=>true,'pesan'=>'data paket berhasil disimpan']);
			}else {
				echo json_encode(['status'=>false,'pesan'=>'data paket gagal disimpan']);
			}
		}else {
			$simpan=$this->mod->upData('pakett', $kirim, ['kode_paket' => $this->request->getPost('kode_paket')]);
			if($simpan){
				echo json_encode(['status'=>true,'pesan'=>'data paket berhasil diedit']);
			}else {
				echo json_encode(['status'=>false,'pesan'=>'data paket gagal diedit']);
			}
		}
	}

	public function edit_paket($kode_paket)
	{
		$data=$this->mod->getwhere('pakett', '*', ['kode_paket' => $kode_paket])->getRow();
		echo json_encode($data);
	}

	public function hapus($kode_paket) 
	{
		$hapus=$this->mod->delData('pakett', ['kode_paket'=> $kode_paket]);
		if($hapus){
			echo json_encode(['status'=>true,'pesan'=>'data paket berhasil dihapus']);
		}else {
			echo json_encode(['status'=>false,'pesan'=>'data paket gagal dihapus']);
		}
	}


}
