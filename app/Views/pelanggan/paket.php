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
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
</div>


<?= $this->endSection(); ?>