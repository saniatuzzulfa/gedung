<?= $this->extend('data/template') ?>
<?= $this->section('content') ?>
<style type="text/css">
    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ccc;
    }

    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #e0e0e0;
    }
</style>

<?php
$this->db = db_connect();
?>

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Rekapitulasi Kas</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rekapitulasi Kas</li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="float-end d-none d-md-block">
                <div class="dropdown">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Rekapitulasi Kas</h4>

                <form action="<?= base_url('admin/Rekapitulasi'); ?>" id="form_lain" method="POST">
                    <h4 class="card-title">Laporan Rekapitulasi Kas</h4>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <select class="form-control  basic" name="tahun" id="tahun" required>
                                    <option value="">Pilih Tahun</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light"><i class="fas fa-print"></i>&nbsp;Tampilkan</button>

                        </div>
                    </div>
                </form>
                <br />

                <?php
                if (isset($_POST['submit'])) :
                    $tahun = $_POST['tahun'];
                    $tahun_1 = $_POST['tahun'] - 1;
                ?>

                    <p class="card-title-desc">
                        <a href="<?= base_url('admin/Rekapitulasi/cetak_rekap/'); ?><?= $tahun ?>" class="btn btn-primary waves-effect waves-light" target="_blank"><i class="fas fa-print"></i>&nbsp;Cetak Rekapitulasi</a>

                    </p>


                    <table id="neraca" class="table" style=" width: 100%;height: 50%;color: black" border="1">
                        <thead>
                            <tr>
                                <th colspan="6" class="text-center">GEDUNG ASWAJA PEKALONGAN</th>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-center">Rekapitulasi Kas Periode <?= $tahun; ?></th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Uraian</th>
                                <th style="text-align: right!important;">
                                    Penerimaan (DEBIT)

                                </th>
                                <th style="text-align: right!important;">Pengeluaran (KREDIT)</th>
                                <th style="text-align: right!important;">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $cek = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun_1 . "'")->getResult();

                            $jml_saldo_db_sblm = 0;
                            $jml_saldo_kr_sblm = 0;

                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $c->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_sblm += $cd->debit;
                                $jml_saldo_kr_sblm += $cd->kredit;
                            endforeach;
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Saldo Tahun <?= $tahun_1 ?></td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_sblm) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_sblm) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_sblm - $jml_saldo_kr_sblm) ?></td>
                            </tr>
                            <?php
                            $cek_jan = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='01'")->getResult();

                            $jml_saldo_db_jan = 0;
                            $jml_saldo_kr_jan = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_jan += $cd->debit;
                                $jml_saldo_kr_jan += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>1</td>
                                <td>Januari</td>
                                <td>Rekap Bulan Januari</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_jan) ?>
                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_jan) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_jan - $jml_saldo_kr_jan) ?></td>
                            </tr>

                            <?php
                            $cek_feb = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='02'")->getResult();

                            $jml_saldo_db_feb = 0;
                            $jml_saldo_kr_feb = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_feb += $cd->debit;
                                $jml_saldo_kr_feb += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>2</td>
                                <td>Februari</td>
                                <td>Rekap Bulan Februari</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_feb) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_feb) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_feb - $jml_saldo_kr_feb) ?></td>
                            </tr>


                            <?php
                            $cek_mar = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='03'")->getResult();

                            $jml_saldo_db_mar = 0;
                            $jml_saldo_kr_mar = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_mar += $cd->debit;
                                $jml_saldo_kr_mar += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>3</td>
                                <td>Maret</td>
                                <td>Rekap Bulan Maret</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_mar) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_mar) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_mar - $jml_saldo_kr_mar) ?></td>
                            </tr>

                            <?php
                            $cek_apr = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='04'")->getResult();
                            $jml_saldo_db_apr = 0;
                            $jml_saldo_kr_apr = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_apr += $cd->debit;
                                $jml_saldo_kr_apr += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>4</td>
                                <td>April</td>
                                <td>Rekap Bulan April</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_apr) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_apr) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_apr - $jml_saldo_kr_apr) ?></td>
                            </tr>

                            <?php
                            $cek_mei = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='05'")->getResult();
                            $jml_saldo_db_mei = 0;
                            $jml_saldo_kr_mei = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_mei += $cd->debit;
                                $jml_saldo_kr_mei += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>5</td>
                                <td>Mei</td>
                                <td>Rekap Bulan Mei</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_mei) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_mei) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_mei - $jml_saldo_kr_mei) ?></td>
                            </tr>

                            <?php
                            $cek_juni = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='06'")->getResult();
                            $jml_saldo_db_juni = 0;
                            $jml_saldo_kr_juni = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_juni += $cd->debit;
                                $jml_saldo_kr_juni += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>6</td>
                                <td>Juni</td>
                                <td>Rekap Bulan Juni</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_juni) ?>


                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_juni) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_juni - $jml_saldo_kr_juni) ?></td>
                            </tr>


                            <?php
                            $cek_juli = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='07'")->getResult();
                            $jml_saldo_db_juli = 0;
                            $jml_saldo_kr_juli = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_juli += $cd->debit;
                                $jml_saldo_kr_juli += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>7</td>
                                <td>Juli</td>
                                <td>Rekap Bulan Juli</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_juli) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_juli) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_juli - $jml_saldo_kr_juli) ?></td>
                            </tr>

                            <?php
                            $cek_agustus = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='08'")->getResult();
                            $jml_saldo_db_agustus = 0;
                            $jml_saldo_kr_agustus = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_agustus += $cd->debit;
                                $jml_saldo_kr_agustus += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>8</td>
                                <td>Agustus</td>
                                <td>Rekap Bulan Agustus</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_agustus) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_agustus) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_agustus - $jml_saldo_kr_agustus) ?></td>
                            </tr>


                            <?php
                            $cek_sep = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='09'")->getResult();
                            $jml_saldo_db_sep = 0;
                            $jml_saldo_kr_sep = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_sep += $cd->debit;
                                $jml_saldo_kr_sep += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>9</td>
                                <td>September</td>
                                <td>Rekap Bulan September</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_sep) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_sep) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_sep - $jml_saldo_kr_sep) ?></td>
                            </tr>

                            <?php
                            $cek_okt = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='10'")->getResult();
                            $jml_saldo_db_okt = 0;
                            $jml_saldo_kr_okt = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_okt += $cd->debit;
                                $jml_saldo_kr_okt += $cd->kredit;
                            endforeach;
                            ?>
                            <tr>
                                <td>10</td>
                                <td>Oktober</td>
                                <td>Rekap Bulan Oktober</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_okt) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_okt) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_okt - $jml_saldo_kr_okt) ?></td>
                            </tr>

                            <?php
                            $cek_nov = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='11'")->getResult();
                            $jml_saldo_db_nov = 0;
                            $jml_saldo_kr_nov = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_nov += $cd->debit;
                                $jml_saldo_kr_nov += $cd->kredit;
                            endforeach;

                            ?>
                            <tr>
                                <td>11</td>
                                <td>November</td>
                                <td>Rekap Bulan November</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_nov) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_nov) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_nov - $jml_saldo_kr_nov) ?></td>
                            </tr>

                            <?php
                            $cek_des = $this->db->query("SELECT * FROM rekap_header WHERE YEAR(tanggal)='" . $tahun . "' AND MONTH(tanggal)='12'")->getResult();
                            $jml_saldo_db_des = 0;
                            $jml_saldo_kr_des = 0;
                            $cek_dt = $this->db->query("SELECT * FROM rekap_detail WHERE id_rekap='" . $cj->id_rekap . "' AND kode_kas='101'")->getResult();
                            foreach ($cek_dt as $cd) :
                                $jml_saldo_db_des += $cd->debit;
                                $jml_saldo_kr_des += $cd->kredit;
                            endforeach;
                            ?>
                            <tr>
                                <td>12</td>
                                <td>Desember</td>
                                <td>Rekap Bulan Desember</td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_des) ?>

                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_des) ?></td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_db_des - $jml_saldo_kr_des) ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"> <b> TOTAL</b></td>
                                <td style="text-align: right!important;">
                                    <?= rupiah($jml_saldo_db_sblm + $jml_saldo_db_jan + $jml_saldo_db_feb + $jml_saldo_db_mar + $jml_saldo_db_apr + $jml_saldo_db_mei + $jml_saldo_db_juni + $jml_saldo_db_juli + $jml_saldo_db_agustus + $jml_saldo_db_sep + $jml_saldo_db_okt + $jml_saldo_db_nov + $jml_saldo_db_des) ?>




                                </td>
                                <td style="text-align: right!important;"><?= rupiah($jml_saldo_kr_sblm + $jml_saldo_kr_jan + $jml_saldo_kr_feb + $jml_saldo_kr_mar + $jml_saldo_kr_apr + $jml_saldo_kr_mei + $jml_saldo_kr_juni + $jml_saldo_kr_juli + $jml_saldo_kr_agustus + $jml_saldo_kr_sep + $jml_saldo_kr_okt + $jml_saldo_kr_nov + $jml_saldo_kr_des) ?></td>
                                <td style="text-align: right!important;"><?= rupiah(($jml_saldo_db_sblm - $jml_saldo_kr_sblm) + ($jml_saldo_db_jan - $jml_saldo_kr_jan) + ($jml_saldo_db_feb - $jml_saldo_kr_feb) + ($jml_saldo_db_mar - $jml_saldo_kr_mar) + ($jml_saldo_db_apr - $jml_saldo_kr_apr) + ($jml_saldo_db_mei - $jml_saldo_kr_mei) + ($jml_saldo_db_juni - $jml_saldo_kr_juni) + ($jml_saldo_db_juli - $jml_saldo_kr_juli) + ($jml_saldo_db_agustus - $jml_saldo_kr_agustus) + ($jml_saldo_db_sep - $jml_saldo_kr_sep) + ($jml_saldo_db_okt - $jml_saldo_kr_okt) + ($jml_saldo_db_nov - $jml_saldo_kr_nov) + ($jml_saldo_db_des - $jml_saldo_kr_des)) ?></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>

                <?php endif; ?>



            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

</div>

<?= $this->endSection(); ?>