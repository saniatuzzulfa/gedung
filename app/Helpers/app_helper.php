<?php 


function tgl_indo($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
}

function rupiah($d)
{
	return 'Rp.' . number_format($d, 0, ',', '.');
}

function format_indo($tgl)
{
	$pecahka = explode('-', $tgl);
	return $pecahka[2] . ' ' . $pecahka[1] . ' ' . $pecahka[0];
}

 function bulane($bulan){
   	$data_bulan = array(
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'Mei',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Agu',
            '09' => 'Sep',
            '10' => 'Okt',
            '11' => 'Nov',
            '12' => 'Des',
    );
    return $data_bulan[$bulan];
   }

   function random_color_part(){
  return str_pad(dechex(mt_rand(0,255)), 2, '0',STR_PAD_LEFT);
}

function random_color(){
 return random_color_part().random_color_part().random_color_part();
}
