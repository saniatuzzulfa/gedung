<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Modelnya;
use Dompdf\Dompdf;


class Pemasukan extends BaseController
{

	public function __construct(){
		$this->db = db_connect();
		$this->mod = new Modelnya();
		$hak_akses = session()->get('hak_akses');
		if($hak_akses=='' && $hak_akses == null){
			return redirect()->to('/Login');
		}
		if(!$hak_akses){
			return redirect()->to('/Login');	
		}
	}


	public function index()
	{
		$mod = $this->mod;
		$cek = $this->db->table('tr_masuk')->select('no_bukti')->orderBy('no_bukti','DESC')->limit(1)->get()->getRow();
		if($cek){
			$kode = substr($cek->no_bukti, 6,9);
			$kodene = sprintf("PN-%04s",++$kode);
		}else{
			$kodene = "PN-0001";
		}

		$data = [
			'kode'		=> $kodene,
			'kas'		=> $this->mod->getWhere('kas', '*', ['tipe_kas' => 'pemasukan'])->getResult()
		];

		return view('admin/pemasukan',$data);
	}


	public function simpan_pemasukan(){
		$kirim = [
			'no_bukti'			=> $this->request->getPost('no_bukti'),
			'tgl_transaksi'		=> $this->request->getPost('tgl_transaksi'),
			'kode_kas'			=> $this->request->getPost('kas'),
			'nominal'			=> $this->request->getPost('nominal'),
			'catatan'			=> $this->request->getPost('catatan')
		];

		if($this->mod->insData('tr_masuk', $kirim)){
			$cek = $this->db->table('rekap_header')->select('id_rekap')->orderBy('id_rekap','DESC')->limit(1)->get()->getRow();

			if($cek){
				$kode =substr($cek->id_rekap,6,9);
				$kodene = sprintf("JH-%04s",++$kode);
			}else{
				$kodene="JH-0001";	
			}

			$jurnal_h = [
				'id_rekap'		=> $kodene,
                'tanggal'		=> $this->request->getPost('tanggal'),
				'no_bukti'		=> $this->request->getPost('no_bukti'),
				'keterangan'    => $this->request->getPost('keterangan')
			];

			if($this->mod->insData('rekap_header', $jurnal_h)){
				$jurnal_d = [
					'id_rekap'	=> $kodene,
					'kode_kas'	=> '101',
					'debit'		=> $this->request->getPost('nominal'),
					'kredit'     => 0
				];
				$this->mod->insData('rekap_detail', $jurnal_d);

				$kas = $this->mod->getWhere('kas', '*', ['kode_kas' => '101'])->getRow();

				$akhir['saldo_akhir'] = $this->request->getPost('nominal') + $kas->saldo_akhir;
				$this->mod->upData('kas', $akhir, ['kode_kas' => '101']);

				$jurnal_d2 = [
					'id_rekap'	=> $kodene,
					'kode_kas'	=> $this->request->getPost('kas'),
					'debit'     => 0,
					'kredit'    => $this->request->getPost('nominal'),
				];

				$this->mod->insData('rekap_detail', $jurnal_d2);

				$kas2 = $this->mod->getWhere('kas', '*', ['kode_kas' => $this->request->getPost('kas')])->getRow();

				$akhir2['saldo_akhir'] = $this->request->getPost('nominal') + $kas2->saldo_akhir;
				$this->mod->upData('kas', $akhir2, ['kode_kas' => $this->request->getPost('kas')]);

			}else{
				echo json_encode(['status' => FALSE,'pesan' => 'DATA GAGAL DISIMPAN 1']);
			}

			echo json_encode(['status' => TRUE,'pesan' => 'DATA BERHASIL DISIMPAN']);
		}else{
			echo json_encode(['status' => FALSE,'pesan' => 'DATA GAGAL DISIMPAN']);
		}
	}

	public function cetak_pemasukan($tgl_awal=null,$tgl_akhir=null){
		
		$data['saldo'] = $this->db->query("SELECT * FROM kas")->getResult();
		$data['tgl_awal'] = $tgl_awal;
		$data['tgl_akhir'] = $tgl_akhir;
		return view('admin/cetak_pemasukan',$data);
		// $filename = date('y-m-d-H-i-s'). '-pemasukan';

  //       // instantiate and use the dompdf class
		// $dompdf = new Dompdf();

  //       // load HTML content
		// $dompdf->loadHtml(view('admin/cetak_pemasukan',$data));

  //       // (optional) setup the paper size and orientation
		// $dompdf->setPaper('A4', 'landscape');

  //       // render html as PDF
		// $dompdf->render();

  //       // output the generated pdf
		// $dompdf->stream($filename,['Attachment' => false]);

		//return view('admin/cetak_jurnal',$data);;
	}



}
