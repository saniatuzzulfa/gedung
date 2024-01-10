
<?php 
$this->db=db_connect();
?>
<!DOCTYPE html>
<html lang="id"><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Rekapitulasi Kas</title>      
  <!-- <script src="<?=base_url()?>assets/js/vendor.min.js"></script> -->

  <!-- App js -->
  <script src="<?=base_url()?>assets/js/app.min.js"></script>  
  <style type="text/css">
  .htw_light_off
  {
    background:#000 !important;
    position:absolute !important;
    margin:0 !important;
    padding:0 !important;
    z-index:2147483640 !important;
  }
  .htw_loff_flash_above
  {
   z-index:2147483648 !important;
 }

 #htw_switcher
 {
  position: fixed !important;
  float: left !important; 
  z-index:21474836 !important;
}
.label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 75%;
  font-weight: bold;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25em;
}
.label-default {
  background-color: #777;
}
</style>
<body style="font-family: open sans, tahoma, sans-serif; margin: 0; -webkit-print-color-adjust: exact;  ">

  <div style="

  background-size: contain;
  width: 100%;
  border: 1px #BEDED3 solid;
  padding: 2px;
  margin: 5px;
  background-color: #F3F7F6;">

  <table class="container" style="width: 100%; padding: 20px; " width="790" cellspacing="0" cellpadding="0" >
    <tbody><tr">
      <td>
        <table style="width: 100%; padding-bottom: 20px;" width="100%" cellspacing="0" cellpadding="0">
          <tbody>
            <tr style="margin-top: 8px; margin-bottom: 8px; ">
              <td>
               <img style="width: 80px; height: 80px; float: left;" src="<?=site_url()?>assets/logo.png">

               <p style="font-size: 20px; font-weight: 600; padding-left: 100px; margin-top:0px; margin-bottom: 0px;">BALAI DESA KLIDANG LOR</p>                                       
               <p style="margin-left: 100px; font-size: 10px; padding-right: 15px; margin-bottom: 0px; vertical-align: middle;">Pemerintah Kab Batang</p> 
               <!--        <p style="margin-left: 100px; font-size: 10px; padding-right: 15px; margin-bottom: 0px; vertical-align: middle;">Kota Pekalongan, Jawa Tengah</p> -->
               <p style="margin-left: 100px; font-size: 10px; padding-right: 15px; margin-bottom: 0px;">Jl. Klidang Lor Kabupaten Batang</p>
             </td>

           </tr>
         </tbody>
       </table>

       <center>
        <h4>Rekapitulasi Kas Periode <?=$tahun?></h4>

      </center>
       <!--  <table style="width: 100%; padding-bottom: 20px;" width="100%" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td style="padding-right: 10px;">
                <table style="width: 100%; border-collapse: collapse; border-top: 1px #BCDDD2 solid; background-color: #F1F7F5;" width="100%" cellspacing="0" cellpadding="0">
                  <tbody><tr style="font-size: 13px;">
                    <td>
                      <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td style="width: 62px; font-weight: 600;" width="80">Rekapitulasi Kas Periode <?=$tahun?></td>
                            <td style="width:400px;vertical-align: text-top;"></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>   
          </tr>
        </tbody>
      </table> -->
      <!-- border: 1px solid rgba(0,0,0,0.1); border-bottom: 1px solid rgba(0,0,0,0.1); -->
      <table style="width: 100%; text-align: center;  padding: 15px 0;" width="100%" cellspacing="0" cellpadding="0" border="1">
        <thead style="font-size: 14px; ">
          <tr style="border-bottom: 1px solid rgba(0,0,0,0.1);">
            <th style="font-weight: 600;  text-align: left; padding: 0 5px 15px 15px;" width="5%">No</th>
            <th style="font-weight: 600;  text-align: left; padding: 0 5px 15px 15px;">Bulan</th>
            <th style="font-weight: 600;  text-align: left; padding: 0 5px 15px 15px;">Uraian</th>

            <th style=" font-weight: 600; padding: 0 5px 15px;" align="right">
              Penerimaan (Debit)

            </th>                                       
            <th style="font-weight: 600; padding: 0 5px 15px;" align="right">Pengeluaran (Kredit)</th> 
            <th style="font-weight: 600; text-align: right; padding: 0 30px 15px 5px;" >Saldo</th>
          </tr></thead>

          <tbody border="1">
            <?php 

            $cek = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun_1."'")->getResult();

            $jml_saldo_db_sblm =0;
            $jml_saldo_kr_sblm =0;
                $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$c->id_jurnal."' AND kode_akun='101'")->getResult();
                foreach($cek_dt as$cd):
                  $jml_saldo_db_sblm+=$cd->debit;
                  $jml_saldo_kr_sblm+=$cd->kredit;
                endforeach; 
            ?>

            <tr style="font-size: 13px;">                                      
              <td style="text-align: left; padding: 8px 5px 8px 15px;"></td>
              <td style="text-align: left; padding: 8px 5px 8px 15px;"></td>
              <td style="text-align: left; padding: 8px 5px 8px 15px;">Saldo Tahun <?=$tahun_1?></td>
              <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
                <?=rupiah($jml_saldo_db_sblm)?>


              </td>
              <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_sblm)?></td> 
              <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
                <?=rupiah($jml_saldo_db_sblm - $jml_saldo_kr_sblm)?>
              </td>
            </tr>

            <?php 
            $cek_jan = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='01'")->getResult();

            $jml_saldo_db_jan =0;
            $jml_saldo_kr_jan =0;
              $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
              foreach($cek_dt as$cd):
                $jml_saldo_db_jan+=$cd->debit;
                $jml_saldo_kr_jan+=$cd->kredit;
              endforeach;
          ?>
          <tr style="font-size: 13px;">                                      
            <td style="text-align: left; padding: 8px 5px 8px 15px;">1</td>
            <td style="text-align: left; padding: 8px 5px 8px 15px;">Januari</td>
            <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan Januari</td>
            <td style="width: 120px; padding: 8px 5px;" width="120" >
              <?=rupiah($jml_saldo_db_jan)?>
              

            </td>
            <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_jan)?></td>
            <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
              <?=rupiah($jml_saldo_db_jan - $jml_saldo_kr_jan)?>
            </td>
          </tr>

          <?php 
          $cek_feb = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='02'")->getResult();

          $jml_saldo_db_feb =0;
          $jml_saldo_kr_feb =0;
            $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
            foreach($cek_dt as$cd):
              $jml_saldo_db_feb+=$cd->debit;
              $jml_saldo_kr_feb+=$cd->kredit;
            endforeach;
        ?>

        <tr style="font-size: 13px;">                                      
          <td style="text-align: left; padding: 8px 5px 8px 15px;">2</td>
          <td style="text-align: left; padding: 8px 5px 8px 15px;">Februari</td>
          <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan Februari</td>
          <td style="width: 120px; padding: 8px 5px;" width="120">
            <?=rupiah($jml_saldo_db_feb)?>

          </td>
          <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_feb)?></td> 
          <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
            <?=rupiah($jml_saldo_db_feb - $jml_saldo_kr_feb)?>
          </td>
        </tr>

        <?php 
          $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
          foreach($cek_dt as$cd):
            $jml_saldo_db_mar+=$cd->debit;
            $jml_saldo_kr_mar+=$cd->kredit;
          endforeach;
      ?>

      <tr style="font-size: 13px;">                                      
        <td style="text-align: left; padding: 8px 5px 8px 15px;">3</td>
        <td style="text-align: left; padding: 8px 5px 8px 15px;">Maret</td>
        <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan Maret</td>
        <td style="width: 120px; padding: 8px 5px;" width="120">
          <?=rupiah($jml_saldo_db_mar)?>

        </td>
        <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_mar)?></td> 
        <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
          <?=rupiah($jml_saldo_db_mar - $jml_saldo_kr_mar)?>
        </td>
      </tr>

      <?php 
      $cek_apr = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='04'")->getResult();
      $jml_saldo_db_apr =0;
      $jml_saldo_kr_apr =0;
          $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
          foreach($cek_dt as$cd):
            $jml_saldo_db_apr+=$cd->debit;
            $jml_saldo_kr_apr+=$cd->kredit;
          endforeach;
      ?>

      <tr style="font-size: 13px;">                                      
        <td style="text-align: left; padding: 8px 5px 8px 15px;">4</td>
        <td style="text-align: left; padding: 8px 5px 8px 15px;">April</td>
        <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan April</td>
        <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
          <?=rupiah($jml_saldo_db_apr)?>


        </td>
        <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_apr)?></td>
        <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
          <?=rupiah($jml_saldo_db_apr - $jml_saldo_kr_apr)?>
        </td>
      </tr>

      <?php 
      $cek_mei = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='05'")->getResult();
      $jml_saldo_db_mei =0;
      $jml_saldo_kr_mei =0;
        $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
        foreach($cek_dt as$cd):
          $jml_saldo_db_mei+=$cd->debit;
          $jml_saldo_kr_mei+=$cd->kredit;
        endforeach;
    ?>

    <tr style="font-size: 13px;">                                      
      <td style="text-align: left; padding: 8px 5px 8px 15px;">5</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Mei</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan Mei</td>
      <td style="width: 120px; padding: 8px 5px;" width="120"  align="right">
        <?=rupiah($jml_saldo_db_mei)?>

      </td>
      <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_mei)?></td> 
      <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
        <?=rupiah($jml_saldo_db_mei - $jml_saldo_kr_mei)?>
      </td>
    </tr>

    <?php 
    $cek_juni = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='06'")->getResult();
    $jml_saldo_db_juni =0;
    $jml_saldo_kr_juni =0;
        $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
        foreach($cek_dt as$cd):
          $jml_saldo_db_juni+=$cd->debit;
          $jml_saldo_kr_juni+=$cd->kredit;
        endforeach;
    ?>

    <tr style="font-size: 13px;">                                      
      <td style="text-align: left; padding: 8px 5px 8px 15px;">6</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Juni</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan Juni</td>
      <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
        <?=rupiah($jml_saldo_db_juni)?>

      </td>
      <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_juni)?></td>
      <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
        <?=rupiah($jml_saldo_db_juni - $jml_saldo_kr_juni)?>
      </td>
    </tr>

    <?php 
    $cek_juli = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='07'")->getResult();
    $jml_saldo_db_juli =0;
    $jml_saldo_kr_juli =0;
        $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
        foreach($cek_dt as $cd):
          $jml_saldo_db_juli+=$cd->debit;
          $jml_saldo_kr_juli+=$cd->kredit;
        endforeach;
    ?>

    <tr style="font-size: 13px;">                                      
      <td style="text-align: left; padding: 8px 5px 8px 15px;">7</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Juli</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan Juli</td>
      <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
        <?=rupiah($jml_saldo_db_juli)?>

      </td>
      <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_juli)?></td>
      <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
        <?=rupiah($jml_saldo_db_juli - $jml_saldo_kr_juli)?>
      </td>
    </tr>

    <?php 
    $cek_agustus = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='08'")->getResult();
    $jml_saldo_db_agustus =0;
    $jml_saldo_kr_agustus =0;
        $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
        foreach($cek_dt as$cd):
          $jml_saldo_db_agustus+=$cd->debit;
          $jml_saldo_kr_agustus+=$cd->kredit;
        endforeach;
    ?>

    <tr style="font-size: 13px;">                                      
      <td style="text-align: left; padding: 8px 5px 8px 15px;">8</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Agustus</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan Agustus</td>
      <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
        <?=rupiah($jml_saldo_db_agustus)?>

      </td>
      <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_agustus)?></td> 
      <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
        <?=rupiah($jml_saldo_db_agustus - $jml_saldo_kr_agustus)?>
      </td>
    </tr>

    <?php 
    $cek_sep = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='09'")->getResult();
    $jml_saldo_db_sep =0;
    $jml_saldo_kr_sep =0;
        $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
        foreach($cek_dt as$cd):
          $jml_saldo_db_sep+=$cd->debit;
          $jml_saldo_kr_sep+=$cd->kredit;
        endforeach;
    ?>
    <tr style="font-size: 13px;">                                      
      <td style="text-align: left; padding: 8px 5px 8px 15px;">9</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">September</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan September</td>
      <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
        <?=rupiah($jml_saldo_db_sep)?>

      </td>
      <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_sep)?></td>
      <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
        <?=rupiah($jml_saldo_db_sep - $jml_saldo_kr_sep)?>
      </td>
    </tr>
    <?php 
    $cek_okt = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='10'")->getResult();
    $jml_saldo_db_okt =0;
    $jml_saldo_kr_okt =0;
    foreach($cek_okt as $cj):
      $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
      foreach($cek_dt as$cd):
        $jml_saldo_db_okt+=$cd->debit;
        $jml_saldo_kr_okt+=$cd->kredit;
      endforeach;
    endforeach;
    ?>
    <tr style="font-size: 13px;">                                      
      <td style="text-align: left; padding: 8px 5px 8px 15px;">10</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Oktober</td>
      <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan Oktober</td>
      <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
        <?=rupiah($jml_saldo_db_okt)?>

      </td>
      <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_okt)?></td> 
      <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
        <?=rupiah($jml_saldo_db_okt - $jml_saldo_kr_okt)?>
      </td>
    </tr>

    <?php 
    $cek_nov = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='11'")->getResult();
    $jml_saldo_db_nov =0;
    $jml_saldo_kr_nov =0;
      $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
      foreach($cek_dt as$cd):
        $jml_saldo_db_nov+=$cd->debit;
        $jml_saldo_kr_nov+=$cd->kredit;
      endforeach;
  ?>
  <tr style="font-size: 13px;">                                      
    <td style="text-align: left; padding: 8px 5px 8px 15px;">11</td>
    <td style="text-align: left; padding: 8px 5px 8px 15px;">November</td>
    <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan November</td>
    <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
      <?=rupiah($jml_saldo_db_nov)?>
    
    </td>
   <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_nov)?></td>
    <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
      <?=rupiah($jml_saldo_db_nov - $jml_saldo_kr_nov)?>
    </td>
  </tr>
  <?php 
  $cek_des = $this->db->query("SELECT * FROM tb_jurnal_header WHERE YEAR(tanggal)='".$tahun."' AND MONTH(tanggal)='12'")->getResult();
  $jml_saldo_db_des =0;
  $jml_saldo_kr_des =0;
    $cek_dt = $this->db->query("SELECT * FROM tb_jurnal_detail WHERE id_jurnal='".$cj->id_jurnal."' AND kode_akun='101'")->getResult();
    foreach($cek_dt as$cd):
      $jml_saldo_db_des+=$cd->debit;
      $jml_saldo_kr_des+=$cd->kredit;
    endforeach;
?>
<tr style="font-size: 13px;">                                      
  <td style="text-align: left; padding: 8px 5px 8px 15px;">12</td>
  <td style="text-align: left; padding: 8px 5px 8px 15px;">Desember</td>
  <td style="text-align: left; padding: 8px 5px 8px 15px;">Rekap Bulan Desember</td>
  <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
    <?=rupiah($jml_saldo_db_des)?>
  
  </td>
  <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?=rupiah($jml_saldo_kr_des)?></td>
  <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
    <?=rupiah($jml_saldo_db_des - $jml_saldo_kr_des)?>
  </td>
</tr>

<tr style="font-size: 13px;">                                      
  <td align="center" style="text-align: center; padding: 8px 5px 8px 15px;" colspan="3"><b> TOTAL</b></td>
  <td style="width: 120px; padding: 8px 5px;" width="120" align="right">
                 <?=rupiah($jml_saldo_db_sblm + $jml_saldo_db_jan + $jml_saldo_db_feb + $jml_saldo_db_mar + $jml_saldo_db_apr + $jml_saldo_db_mei + $jml_saldo_db_juni + $jml_saldo_db_juli + $jml_saldo_db_agustus + $jml_saldo_db_sep + $jml_saldo_db_okt + $jml_saldo_db_nov + $jml_saldo_db_des)?>
       </td> 
               <td style="width: 115px; padding: 8px 5px;" width="115" align="right">
                <?=rupiah($jml_saldo_kr_sblm + $jml_saldo_kr_jan + $jml_saldo_kr_feb + $jml_saldo_kr_mar + $jml_saldo_kr_apr + $jml_saldo_kr_mei + $jml_saldo_kr_juni + $jml_saldo_kr_juli + $jml_saldo_kr_agustus + $jml_saldo_kr_sep + $jml_saldo_kr_okt + $jml_saldo_kr_nov + $jml_saldo_kr_des)?>
              </td> 

              <!-- <?=rupiah($jml_saldo_db_sblm + $jml_saldo_db_jan + $jml_saldo_db_feb + $jml_saldo_db_mar + $jml_saldo_db_apr + $jml_saldo_db_mei + $jml_saldo_db_juni + $jml_saldo_db_juli + $jml_saldo_db_agustus + $jml_saldo_db_sep + $jml_saldo_db_okt + $jml_saldo_db_nov + $jml_saldo_db_des)?>
              <br />

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?=rupiah($jml_saldo_kr_sblm + $jml_saldo_kr_jan + $jml_saldo_kr_feb + $jml_saldo_kr_mar + $jml_saldo_kr_apr + $jml_saldo_kr_mei + $jml_saldo_kr_juni + $jml_saldo_kr_juli + $jml_saldo_kr_agustus + $jml_saldo_kr_sep + $jml_saldo_kr_okt + $jml_saldo_kr_nov + $jml_saldo_kr_des)?>

            </td> -->
            <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115" align="right">
              <?=rupiah(($jml_saldo_db_sblm - $jml_saldo_kr_sblm) + ($jml_saldo_db_jan - $jml_saldo_kr_jan) + ($jml_saldo_db_feb - $jml_saldo_kr_feb) + ($jml_saldo_db_mar - $jml_saldo_kr_mar) + ($jml_saldo_db_apr - $jml_saldo_kr_apr) + ($jml_saldo_db_mei - $jml_saldo_kr_mei) + ($jml_saldo_db_juni - $jml_saldo_kr_juni) + ($jml_saldo_db_juli - $jml_saldo_kr_juli) + ($jml_saldo_db_agustus - $jml_saldo_kr_agustus) + ($jml_saldo_db_sep - $jml_saldo_kr_sep) + ($jml_saldo_db_okt - $jml_saldo_kr_okt) + ($jml_saldo_db_nov - $jml_saldo_kr_nov) + ($jml_saldo_db_des - $jml_saldo_kr_des))?>
            </td>
          </tr>


        </tbody>
      </table>  <br>


    </td>
  </tr>
</tbody></table>
<table  width="100%" >
  <tr>

    <td colspan="2" align="center">Mengetahui <br>Batang, <?=tgl_indo(date("Y-m-d"))?></td>
  </tr>
  <tr>
   <td align="center">Kepala Desa</td>
   <td align="center">Perangkat Desa</td>
 </tr>
 <tr>
   <td></td>
   <td></td>
 </tr>
 <tr>
   <td></td>
   <td></td>
 </tr>
 <tr>
   <td></td>
   <td></td>
 </tr>
 <tr>
   <td></td>
   <td></td>
 </tr>
 <tr>
   <td></td>
   <td></td>
 </tr>
 <tr>
   <td></td>
   <td></td>
 </tr>
 <tr>
   <td></td>
   <td></td>
 </tr>
 <tr>
   <td align="center">(witdiyarso)</td>
   <td align="center">(<?=session()->get('nama_lengkap')?>)</td>
 </tr>

</table>
</div>

<script>
  window.onload = function() {
    window.print();
  };
</script>  

</body></html>
