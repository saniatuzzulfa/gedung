<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelnya;


class Login extends BaseController
{

    public function __construct(){
        $this->db = db_connect();
        $this->mod = new Modelnya();
    }


    public function index()
    {
        $mod = $this->mod;

        $data = [
        ];
        return view('login',$data);
    }


    public function proses_login()
    {
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $cek = $this->mod->getwhere('pengguna','*',['username' => $username,'password' => $password])->getRow();
        if(!$cek){
            $sess = [
                'pesan' => 'Username Atau Password Salah',
                'status'    => 'gagal'
            ];
            session()->set($sess);
            return redirect()->to('/Login');
        }else{
            $sess = [
                'id_pengguna' => $cek->id_pengguna,
                'nama_lengkap'  => $cek->nama_lengkap,
                'jenis_kelamin' => $cek->jenis_kelamin,
                'alamat'        => $cek->alamat,
                'no_hp'         => $cek->no_hp,
                'username'      => $cek->username,
                'hak_akses'     => $cek->hak_akses
            ];
            session()->set($sess);
            return redirect()->to('/Dashboard');
        }
    }

    public function logout()
    {
        $array_items = ['id_pengguna', 'nama_lengkap', 'jenis_kelamin', 'alamat', 'no_hp', 'username','hak_akses'];
        session()->remove($array_items);
        return redirect()->to('/Login');
    }


    

}
