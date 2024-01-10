<?=$this->extend('data/template')?>
 <?=$this->section('content')?>
 <?php 
 $this->db = db_connect();
 ?>
 <div class="page-title-box">
  <div class="row align-items-center">
    <div class="col-md-8">
      <h6 class="page-title">Laporan</h6>
      <ol class="breadcrumb m-0">
       <!--      <li class="breadcrumb-item"><a href="#">Jurnal </a></li> -->
       <li class="breadcrumb-item"><a href="#">Laporan</a></li>
       <li class="breadcrumb-item active" aria-current="page">Jurnal Umum</li>
     </ol>
   </div>

 </div>
</div>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <!--   <form action="<?=base_url('admin/Jurnal/cetak_jurnal');?>" id="form_lain" method="POST" target="_blank"> -->
          <form action="<?=base_url('admin/Jurnal/');?>" id="form_lain" method="POST" >
            <h4 class="card-title">Laporan Jurnal Umum</h4>

            <div class="row mb-3">
              <div class="col-6">
                <label for="example-search-input" class="col-sm-2 col-form-label">Bulan</label>
                <div class="col-sm-10">
                  <select class="form-control  basic" name="bulan" id="bulan" required>
                    <option value="">Pilih Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>

                  </select>
                </div>
              </div>
              <div class="col-6">
                <label for="example-search-input" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                  <select class="form-control  basic" name="tahun" id="tahun" required>
                   <option value="">Pilih Tahun</option>
                   <?php   
                   foreach($th as $tahun):
                    $tk = explode('-',$tahun->tanggal);
                    ?>
                    <option value="<?=$tk[0];?>"><?=$tk[0];?></option>
                    <?php  
                  endforeach;
                  ?>



                </select>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light"  ><i class="fas fa-print" ></i>&nbsp;Tampilkan</button>

            </div>
          </div>
        </form>


        <?php 
        if(isset($_POST['submit'])):
          $bulan = $_POST['bulan'];
          $tahun = $_POST['tahun'];
          $bulane = array('','Janurari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
          $jurnal =$this->db->query("SELECT * FROM rekap_header WHERE month(tanggal)='".$bulan."' AND year(tanggal)='".$tahun."'")->getResult()
          ?>
          <div class="row">
            <div class="col-md-3">
            <a href="<?=base_url('admin/Jurnal/cetak_jurnal/');?><?=$bulan?>/<?=$tahun?>" target="_blank" class="btn btn-primary"><i class="fas fa-print" ></i>&nbsp;Cetak</a>
            </div>
           <table style="padding: 0px; width: 100%;" cellspacing="0" cellpadding="0" >
            <tbody>

              <tr >

                <td>
                  <table style="width: 100%; " width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td>
                          <table border="1" style="padding-bottom: 10px;" width="100%" cellspacing="0" cellpadding="0">
                            <tr align="center" style="margin-top: 8px; margin-bottom: 8px;">
                              <td valign="middle" style="width: 5%;">

                              </td>
                              <td align="center">   <p style="font-size: 18pt; font-weight: 600; "><b>GEDUNG ASWAJA PEKALONGAN</b></p></td>                                    

                            </tr>
                            <tr>
                              <td colspan="2" align="center">Jl. Sriwijaya No.2, Medono, Pekalongan</td>
                            </tr>

                          </table>
                        </td>
                      </tr>
                      <tr align="center">
                        <td style="color: #2C89B5;">
                          <p style="font-weight: bold; font-size: 15pt; font-family: Arial;">Jurnal Umum</p>
                        </td>                                    
                      </tr>   
                      <tr align="center">
                        <td style="color: #461622;">
                          <p style="font-weight: bold; font-size: 10pt; font-family: Arial;">Periode: <?=$bulan<=9 ? $bulane[substr($bulan,1,2)] : $bulane[$bulan]; ?> - <?=$tahun;?></p> 
                        </td>                                    
                      </tr>  
                      <tr>
                        <td>
                          <table style="padding: 0px; border-collapse: initial;" cellspacing="0" cellpadding="0" width="100%">
                            <tbody style="font-size: 13pt; font-weight: bold;" width="100%">
                              <tr style="background-color: #EEEEEE; font-weight: bold; font-family: Arial; border:bolder;" align="center" valign="middle">
                                <td style="font-weight: 600; ">Tanggal</td>
                                <td style="font-weight: 600; padding: 5px;" >Keterangan</td>                                       

                                <td style="font-weight: 600; padding: 5px;" >Debet</td>
                                <td style="font-weight: 600; padding: 5px;" >Kredit</td>        

                              </tr>

                              <?php foreach($jurnal as $jh): ?>
                                <tr style="background:lightblue;">
                                  <td style="padding: 8px;"><?=tgl_indo($jh->tanggal);?></td>
                                  <td style="padding: 8px"><b><?=$jh->keterangan;?></b></td>

                                  <td style="padding: 8px"></td>
                                  <td style="padding: 8px"></td>

                                </tr>
                                <?php 
                                $jurnal_detail = $this->db->query("SELECT * FROM rekap_detail,kas WHERE kas.kode_kas=rekap_detail.kode_kas AND rekap_detail.id_rekap='".$jh->id_rekap."'"."ORDER BY rekap_detail.id_rekap_detail")->getResult();
                                foreach($jurnal_detail as $jd):
                                  ?>
                                  <tr>
                                    <td style="padding: 8px;"></td>
                                    <td style="padding: 8px;"><?=$jd->nama_kas;?></td>

                                    <td style="padding: 8px;" align="right"><?=rupiah($jd->debit);?></td>
                                    <td style="padding: 8px;" align="right"><?=rupiah($jd->kredit);?></td>
                                  </tr>                                   

                                <?php endforeach; ?>                                   

                              <?php endforeach; ?>

                            </tbody>                            
                          </table>
                        </td>

                      </tr> 
                    </tbody>
                  </table>
                </td>
              </tr> 

            </tbody>
          </table>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div> <!-- end col -->
</div> <!-- end row -->
<?=$this->endSection();?>
