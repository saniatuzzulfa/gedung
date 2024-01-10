<?= $this->extend('data/template') ?>
<?= $this->section('content') ?>
<?php
$this->db = db_connect();
?>

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Transaksi Kas Keluar</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Biaya </a></li>
                <li class="breadcrumb-item"><a href="#">Form</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kas Lain</li>
            </ol>
        </div>

    </div>
</div>

<?php
if (session()->get('hak_akses') != 'admin') :
?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="javascript:void(0)" id="form_lain" method="POST">
                        <h4 class="card-title">Transaksi Kas Lain</h4>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">No Bukti</label>
                            <div class="col-sm-10">
                                <input class="form-control" required="" type="text" placeholder="No Bukti" id="no_bukti" readonly name="no_bukti" value="<?= $kode ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" placeholder="Tanggal Transaksi" id="tgl_transaksi" value="<?= date("Y-m-d") ?>" name="tgl_transaksi" required="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Jenis Kas</label>
                            <div class="col-sm-10">
                                <select name="kas" id="kas" class="form-control" required="">
                                    <option value="">Pilih Jenis</option>
                                    <?php
                                    foreach ($kas as $a) :
                                    ?>
                                        <option value="<?= $a->kode_kas ?>"><?= $a->nama_kas ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Nominal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Nominal" required="" id="nominale" name="nominale">
                                <input class="form-control" type="hidden" placeholder="Nominal" required="" id="nominal" name="nominal">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Catatan</label>
                            <div class="col-sm-10">
                                <textarea name="catatan" id="catatan" class="form-control"></textarea>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light"><i class="fas fa-save"></i>&nbsp;Simpan Transaksi</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php endif; ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Data Pengeluaran Kas</h4>
                <br>
                <form action="<?= base_url('admin/pengeluaran') ?>" method="POST">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Awal</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" placeholder="Nama Lengkap" id="tgl_awal" name="tgl_awal" required="">
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" placeholder="Username" id="tgl_akhir" name="tgl_akhir" required="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button type="submit" name="tamp" class="btn btn-info waves-effect waves-light"><i class="fas fa-eye"></i>&nbsp;Tampilkan</button>

                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['tamp'])) {
                    $tgl_awal = $_POST['tgl_awal'];
                    $tgl_akhir = $_POST['tgl_akhir'];
                ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="<?= base_url('admin/pengeluaran/cetak_pengeluaran/'); ?><?= $tgl_awal ?>/<?= $tgl_akhir ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i>&nbsp;Cetak</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="<?= base_url('admin/pengeluaran/cetak_pengeluaran/'); ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i>&nbsp;Cetak</a>
                        </div>
                    </div>
                <?php } ?>

                <table id="datatables" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Jenis Pengeluaran</th>
                            <th>Nominal</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        if (isset($_POST['tamp'])) {
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];

                            $data = $this->db->query("SELECT * FROM tr_keluar WHERE tgl_transaksi BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' ORDER BY tgl_transaksi")->getResult();
                        } else {
                            $data = $this->db->table('tr_keluar')->select('*')->get()->getResult();
                        }


                        $no = 1;
                        foreach ($data as $d) :
                            $nm_kas = $this->db->table('kas')->select('*')->where(['kode_kas' => $d->kode_kas])->get()->getRow();
                            $kode_rekap = $this->db->table('rekap_header')->select('*')->where(['no_bukti' => $d->no_bukti])->get()->getRow();
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= tgl_indo($d->tgl_transaksi) ?></td>
                                <td><?= $nm_kas->nama_kas ?></td>
                                <td><?= rupiah($d->nominal) ?></td>
                                <td><?= $d->catatan ?></td>
                            </tr>

                        <?php endforeach; ?>


                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<script type="text/javascript">
    $("#form_lain").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('admin/Pengeluaran/simpan_pengeluaran') ?>",
            type: "POST",
            data: $("#form_lain").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status == true) {
                    Swal.fire(
                        'Berhasil!',
                        `${data.pesan}`,
                        'success'
                    )
                    setTimeout(function() {
                        location.reload()

                    }, 1000)
                } else {
                    Swal.fire(
                        'Gagal!',
                        `${data.pesan}`,
                        'error'
                    )
                }
            },
            error: function(er) {
                Swal.fire(
                    'berhasil',
                    'BERHASIL',
                    'success'
                )
            }
        })
    })

    $("#nominale").on('keyup', function() {
        $("#nominal").val(removeDots(this.value))
        $("#nominale").val(formatRupiah(this.value, " "))
    })
</script>
<?= $this->endSection(); ?>