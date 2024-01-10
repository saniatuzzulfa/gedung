<?php
$this->db = db_connect();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Pengeluaran</title>
    <!-- <script src="<?= base_url() ?>assets/js/vendor.min.js"></script> -->

    <!-- App js -->
    <script src="<?= base_url() ?>/assets/js/app.min.js"></script>
    <style type="text/css">
        .htw_light_off {
            background: #000 !important;
            position: absolute !important;
            margin: 0 !important;
            padding: 0 !important;
            z-index: 2147483640 !important;
        }

        .htw_loff_flash_above {
            z-index: 2147483648 !important;
        }

        #htw_switcher {
            position: fixed !important;
            float: left !important;
            z-index: 21474836 !important;
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

        <table class="container" style="width: 100%; padding: 20px;" width="790" cellspacing="0" cellpadding="0">
            <tbody>
                <tr">
                    <td>
                        <table style="width: 100%; padding-bottom: 20px;" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr style="margin-top: 8px; margin-bottom: 8px; ">
                                    <td>
                                        <img style="width: 80px; height: 80px; float: left;" src="<?= site_url() ?>assets/logo.png">
                                        <p style="font-size: 20px; font-weight: 600; padding-left: 100px; margin-top:0px; margin-bottom: 0px;">GEDUNG ASWAJA PEKALONGAN</p>
                                        <p style="margin-left: 100px; font-size: 10px; padding-right: 15px; margin-bottom: 0px; vertical-align: middle;">Jl. Sriwijaya No.2, Medono, Pekalongan</p>
                                        <!--        <p style="margin-left: 100px; font-size: 10px; padding-right: 15px; margin-bottom: 0px; vertical-align: middle;">Kota Pekalongan, Jawa Tengah</p> -->
                                        <p style="margin-left: 100px; font-size: 10px; padding-right: 15px; margin-bottom: 0px;">Telp : 081555888350</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <center>
                            <h5>Laporan Pengeluaran</h5>
                            <h4>Periode : <?= @$tgl_awal ? tgl_indo($tgl_awal) . " - " . tgl_indo($tgl_akhir) : tgl_indo(date("Y-m-d")) ?></h4>
                        </center>

                        <!-- border: 1px solid rgba(0,0,0,0.1); border-bottom: 1px solid rgba(0,0,0,0.1); -->
                        <table style="width: 100%; text-align: center;  padding: 15px 0;" width="100%" cellspacing="0" cellpadding="0" border="1">
                            <thead style="font-size: 14px; ">
                                <tr style="border-bottom: 1px solid rgba(0,0,0,0.1);">
                                    <!-- <th style="font-weight: 600;  text-align: left; padding: 0 5px 15px 15px;">Nama Produk</th> -->
                                    <th style="font-weight: 600;  text-align: left; padding: 0 5px 15px 15px;">No</th>
                                    <th style="font-weight: 600;  text-align: left; padding: 0 5px 15px 15px;">Tanggal Transaksi</th>

                                    <th style=" font-weight: 600; padding: 0 5px 15px;">Jenis Pengeluaran</th>
                                    <th style="font-weight: 600; padding: 0 5px 15px;">Catatan</th>
                                    <th style="font-weight: 600; text-align: center; padding: 0 30px 15px 5px;">Nominal</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($tgl_awal != null) {
                                    $data = $this->db->query("SELECT * FROM tr_keluar WHERE tgl_transaksi BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' ORDER BY tgl_transaksi")->getResult();
                                } else {
                                    $data = $this->db->table('tr_keluar')->select('*')->get()->getResult();
                                }

                                $no = 1;
                                foreach ($data as $d) :
                                    $nm_kas = $this->db->table('kas')->select('*')->where(['kode_kas' => $d->kode_kas])->get()->getRow();
                                ?>
                                    <tr style="font-size: 13px;">
                                        <td style="text-align: left; padding: 8px 5px 8px 15px;" width="5%"><?= $no++ ?></td>
                                        <td style="text-align: left; padding: 8px 5px 8px 15px;" width="12%"><?= tgl_indo($d->tgl_transaksi) ?></td>
                                        <td style="width: 120px; padding: 8px 5px;" width="30%" align="left"><?= $nm_kas->nama_kas ?></td>
                                        <td style="width: 115px; padding: 8px 5px;" width="115" align="left"><?= $d->catatan ?></td>
                                        <td style="width: 115px; padding: 8px 5px;" width="115" align="right"><?= rupiah($d->nominal) ?></td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table> <br>

                    </td>
                    </tr>
            </tbody>
        </table>
        <table width="100%">
            <tr>
                <td colspan="3" align="center">Mengetahui <br>Pekalongan, <?= tgl_indo(date("Y-m-d")) ?></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td align="center">Bendahara</td>
                <td align="center">Manajer</td>
                <td align="center">Admin</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td align="center">(H. Noor Hamid)</td>
                <td align="center">(M. Salman Barizi)</td>
                <td align="center">(<?= session()->get('nama_lengkap') ?>)</td>
            </tr>

        </table>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>