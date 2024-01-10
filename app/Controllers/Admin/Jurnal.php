<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Modelnya;
use Dompdf\Dompdf;



class Jurnal extends BaseController
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
		$data['th'] = $this->db->query("SELECT * FROM rekap_header GROUP BY year(tanggal)")->getResult();
		return view('admin/jurnal',$data);
	}

	public function cetak_jurnal($bulan,$tahun){
		$data = [
			'bulan'		=> $bulan,
			'tahun'		=> $tahun,
			'jurnal'	=> $this->db->query("SELECT * FROM rekap_header WHERE month(tanggal)='".$bulan."' AND year(tanggal)='".$tahun."'")->getResult()
		];

		return view('admin/cetak_jurnal',$data);
		// $mpdf = new \Mpdf\Mpdf([ 'format' => 'A4-L']);
		// $html = view('admin/cetak_jurnal',$data);
		// $mpdf->WriteHTML($html);
		// $this->response->setHeader('Content-Type', 'application/pdf');
		// $mpdf->Output('arjun.pdf','I'); // opens in browser
		// $filename = date('y-m-d-H-i-s'). '-qadr-labs-report';

  //       // instantiate and use the dompdf class
		// $dompdf = new Dompdf();

  //       // load HTML content
		// $dompdf->loadHtml(view('admin/cetak_jurnal',$data));

  //       // (optional) setup the paper size and orientation
		// $dompdf->setPaper('A4', 'landscape');

  //       // render html as PDF
		// $dompdf->render();

  //       // output the generated pdf
		// $dompdf->stream($filename,['Attachment' => false]);

		//return view('admin/cetak_jurnal',$data);;
	}


	



}
