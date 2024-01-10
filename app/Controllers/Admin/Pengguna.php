<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Modelnya;


class Pengguna extends BaseController
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
			'user'		=> $mod->getAll('pengguna')->getResult()
		];
		return view('admin/pengguna',$data);
	}


	public function save_pengguna($metode){
		$kirim = [
			'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
			'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
			'alamat'         => $this->request->getPost('alamat'),
			'no_hp'          => $this->request->getPost('no_hp'),
			'username'		 => $this->request->getPost('username'),
			'hak_akses'		 => $this->request->getPost('hak_akses'),
		];


		if($metode=='add'){
			$kirim['password'] = md5($this->request->getPost('password'));
			$simpan=$this->mod->insData('pengguna',$kirim);
			if($simpan){
				echo json_encode(['status'=>true,'pesan'=>'data pengguna berhasil disimpan']);
			}else {
				echo json_encode(['status'=>false,'pesan'=>'data pengguna gagal disimpan']);
			}
		}else {
			$cek=$this->mod->getwhere('pengguna', '*', ['id_pengguna' => $this->request->getPost('id_pengguna')])->getRow();
            if($this->request->getPost('password') != $cek->password){
                $kirim['password'] =md5($this->request->getPost('password'));
            }
			 $simpan=$this->mod->upData('pengguna', $kirim, ['id_pengguna' => $this->request->getPost('id_pengguna')]);
			if($simpan){
				echo json_encode(['status'=>true,'pesan'=>'data pengguna berhasil diedit']);
			}else {
				echo json_encode(['status'=>false,'pesan'=>'data pengguna gagal diedit']);
			}
		}
	}

	public function edit_pengguna($id_pengguna)
	{
		$data=$this->mod->getwhere('pengguna', '*', ['id_pengguna' => $id_pengguna])->getRow();
		echo json_encode($data);
	}

	public function hapus($id_pengguna) 
	{
		$hapus=$this->mod->delData('pengguna', ['id_pengguna'=> $id_pengguna]);
		if($hapus){
			echo json_encode(['status'=>true,'pesan'=>'data pengguna berhasil dihapus']);
		}else {
			echo json_encode(['status'=>false,'pesan'=>'data pengguna gagal dihapus']);
		}
	}


}
