<?php

namespace App\Controllers;

use App\Models\Modelnya;

class Register extends BaseController
{
    public $daf = '';
    public function __construct()
    {
        $this->daf = new Modelnya();
    }



    public function index()
    {
        $nasah = $this->daf;

        $data = [
            'user'  => $nasah->getWhere('pengguna', '*', ['hak_akses' =>  'pelanggan'])->getResult()
        ];

        return view('register', $data);
    }

    public function save($metode)
    {
        $send = [
            'nama_lengkap'  => $this->request->getPost('nama1'),
            'jenis_kelamin'  => $this->request->getPost('jeniskelamin1'),
            'alamat'  => $this->request->getPost('alamat1'),
            'no_hp'  => $this->request->getPost('noHp1'),
            'username'  => $this->request->getPost('username1'),
            'hak_akses'  => 'pelanggan',

        ];


        if ($metode == 'add') {

            $send['password'] = md5($this->request->getPost('password1'));
            $simpan = $this->daf->insData('pengguna', $send);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data User berhasil Disimpan']);
            } else {
                echo json_encode(['status' => false, 'pesan' => 'Data User gagal Disimpan']);
            }
        } else {
            $cek = $this->daf->getWhere('pengguna', '*', ['id_pengguna' => $this->request->getPost('id_pengguna')])->getRow();
            if ($this->request->getPost('password1') != $cek->password) {
                $send['password'] = md5($this->request->getPost('password1'));
            }
            $simpan = $this->daf->upData('pengguna', $send, ['id_pengguna' => $this->request->getPost('id_pengguna')]);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data User Berhasil Diedit']);
            } else {
                echo json_encode(['status' => true, 'pesan' => 'Data User Gagal Diedit']);
            }
        }
    }
}
