<?= $this->extend('data/template') ?>
<?= $this->section('content') ?>
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Data Paket</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                <li class="breadcrumb-item"><a href="#">Paket</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Paket</li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="float-end d-none d-md-block">
                <div class="dropdown">
                    <!--     <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti-settings me-1"></i> Settings <i class="mdi mdi-chevron-down"></i>
                      </button> -->
                    <!--     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">No</a>
                        <a class="dropdown-item" href="#">Nama Lengkap</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                      </div> -->
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Data Paket</h4>
                <p class="card-title-desc">
                    <button type="button" onclick="tambah()" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-book-open"></i>&nbsp;Tambah Data paket</button>

                </p>
                <div class="table-responsive mb-0">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Paket</th>
                                <th>Jenis Paket</th>
                                <th>Bentuk Paket</th>
                                <th>Nama Paket</th>
                                <th>Harga Per Pax</th>
                                <th>Jumlah Pax</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($paket as $u) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u->kode_paket ?></td>
                                    <td><?= $u->jenis_paket ?></td>
                                    <td><?= $u->bentuk_paket ?></td>
                                    <td><?= $u->nama_paket ?></td>
                                    <td><?= $u->harga_perpax ?></td>
                                    <td><?= $u->jumlah_pax ?></td>
                                    <td><?= $u->harga ?></td>
                                    <td><?= $u->deskripsi ?></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="edit(`<?= $u->kode_paket ?>`)" class="btn btn-success waves-effect waves-light"><i class="fas fa-pencil-ruler"></i>&nbsp;Edit</button>&nbsp;<button type="button" class="btn btn-danger waves-effect waves-light" onclick="hapus(`<?= $u->kode_paket ?>`)"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</button></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" method="POST" id="form_paket">

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Kode Paket</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" placeholder="Kode paket" id="kode_paket" name="kode_paket" required="">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Paket</label>
                        <div class="col-sm-4">
                            <select name="jenis_paket" id="jenis_paket" class="form-control" required="">
                                <option value="">Pilih Jenis Paket</option>
                                <option value="pernikahan">Pernikahan</option>
                                <option value="non pernikahan">Non Pernikahan</option>
                                <option value="hiburan">Hiburan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Paket</label>
                        <div class="col-sm-4">
                            <select name="bentuk_paket" id="bentuk_paket" class="form-control" required="">
                                <option value="">Pilih Paket</option>
                                <option value="paket a">Paket A</option>
                                <option value="paket b">Paket B</option>
                                <option value="paket c">Paket C</option>
                                <option value="reguler">Paket Reguler</option>
                                <option value="paket hiburan">Paket Hiburan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Paket Pilihan</label>
                        <div class="col-sm-4">
                            <select name="nama_paket" id="nama_paket" class="form-control" required="">
                                <option value="">Paket Pilihan</option>
                                <option value="silver">Silver</option>
                                <option value="diamond">Diamond</option>
                                <option value="platinum">Platinum</option>
                                <option value="paket hiburan">Paket Hiburan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Harga Per Pax</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" placeholder="Harga Per Pax" id="harga_perpax" name="harga_perpax" required="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Jumlah Pax</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" placeholder="Jumlah Pax" id="jumlah_pax" name="jumlah_pax" required="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" placeholder="Harga" id="harga" name="harga" required="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" placeholder="Deskripsi" id="deskripsi" name="deskripsi" required="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit"><i class="fas fa-save"></i>&nbsp;Simpan Data paket</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<script>
    var link;
    var metode = "add";

    function tambah() {
        $("#form_paket")[0].reset();
        metode = "add";
        $("#submit").html("&nbsp;Simpan Data paket")
    }

    function edit(kd_paket) {
        $("#form_paket")[0].reset();
        $("#submit").html("&nbsp;Update Data paket")
        metode = "edit";
        $.ajax({
            url: "<?= base_url('admin/paket/edit_paket') ?>/" + kd_paket,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $("#kode_paket").val(`${data.kode_paket}`);
                $("#jenis_paket").val(`${data.jenis_paket}`);
                $("#bentuk_paket").val(`${data.bentuk_paket}`);
                $("#nama_paket").val(`${data.nama_paket}`);
                $("#harga_perpax").val(`${data.harga_perpax}`);
                $("#jumlah_pax").val(`${data.jumlah_pax}`);
                $("#harga").val(`${data.harga}`);
                $("#deskripsi").val(`${data.deskripsi}`);
                $("#kode_paket").val(kd_paket)
                // $("#drprojecttype option[value='Adhoc']").attr("selected", "selected");

                $(`#tipe option[value='${data.jenis_paket}']`).attr('selected', 'selected', 'selected');
                $(`#tipe option[value='${data.bentuk_paket}']`).attr('selected', 'selected', 'selected', 'selected', 'selected');
                $(`#tipe option[value='${data.nama_paket}']`).attr('selected', 'selected', 'selected', 'selected', 'selected');

            },
            error: function(jqXHR, textStatus, errorThrow) {
                Swal.fire(
                    'Gagal!',
                    `GAGAL MENGAMBIL DATA`,
                    'error'
                )
            }
        });
    }


    $("#form_paket").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('admin/paket/save_paket/') ?>" + metode,
            type: "POST",
            data: $("#form_paket").serialize(),
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
                        $(".bs-example-modal-lg").modal('hide');
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
                    'Gagal!',
                    'API GAGAL',
                    'error'
                )
            }
        })
    })

    function hapus(kd_paket) {
        Swal.fire({
            title: 'Apakah Data Akan Dihapus?',
            text: "Data Akan Terhapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('admin/paket/hapus'); ?>/" +
                        kd_paket,
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    success: function(a) {
                        if (a.status == true) {
                            Swal.fire(
                                'Deleted!',
                                `${a.pesan}`,
                                'success'
                            )
                            setTimeout(function() {
                                location.reload()
                            }, 1000)
                        } else {
                            Swal.fire(
                                'GAGAL!',
                                `${a.pesan}`,
                                'error'
                            )
                        }
                    }
                })

            }
        })
    }
</script>

<?= $this->endSection(); ?>