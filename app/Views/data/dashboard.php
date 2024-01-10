<?= $this->extend('data/template') ?>
<?= $this->section('content') ?>

<?php
$this->db = db_connect();
?>

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Dashboard</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">
                <div class="mb-4">
                    <div class="float-end text-end">
                        <!-- <span class="badge bg-light text-info my-2"> - 89% </span>  -->
                        <p class="text-white-50">Jumlah User</p>
                    </div>
                    <!-- <span class="peity-donut" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"], "innerRadius": 18, "radius": 32 }' data-width="54" data-height="54">3/5</span> -->
                    <span><i class="fas fa-user" style="color: white;size:100px"></i></span>
                </div>
            </div>
            <div class="mx-3">
                <?php
                $user = $this->db->query("SELECT * FROM pengguna");
                ?>
                <div class="card mb-0 border p-3 mini-stats-desc">
                    <div class="d-flex">
                        <h6 class="mt-0 mb-3">Jumlah User</h6>
                        <h5 class="ms-auto mt-0"><?= $user->resultID->num_rows ?></h5>
                    </div>
                    <p class="text-muted mb-0">Jumlah Pengguna</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">
                <div class="mb-4">
                    <div class="float-end text-end">
                        <!-- <span class="badge bg-light text-info my-2"> - 89% </span>  -->
                        <p class="text-white-50">Jumlah Paket</p>
                    </div>
                    <!-- <span class="peity-donut" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"], "innerRadius": 18, "radius": 32 }' data-width="54" data-height="54">3/5</span> -->
                    <span><i class="fas fa-user" style="color: white;size:100px"></i></span>
                </div>
            </div>
            <div class="mx-3">
                <?php
                $user = $this->db->query("SELECT * FROM pakett");
                ?>
                <div class="card mb-0 border p-3 mini-stats-desc">
                    <div class="d-flex">
                        <h6 class="mt-0 mb-3">Jumlah Paket</h6>
                        <h5 class="ms-auto mt-0"></h5>
                    </div>
                    <p class="text-muted mb-0">Total</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">
                <div class="mb-4">
                    <div class="float-end text-end">
                        <!-- <span class="badge bg-light text-info my-2"> - 89% </span>  -->
                        <p class="text-white-50">Total</p>
                    </div>
                    <!-- <span class="peity-donut" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"], "innerRadius": 18, "radius": 32 }' data-width="54" data-height="54">3/5</span> -->
                    <span><i class="fas fa-user" style="color: white;size:100px"></i></span>
                </div>
            </div>
            <div class="mx-3">
                <?php
                $user = $this->db->query("SELECT * FROM reservasi");
                ?>
                <div class="card mb-0 border p-3 mini-stats-desc">
                    <div class="d-flex">
                        <h6 class="mt-0 mb-3">Jumlah Paket</h6>
                        <h5 class="ms-auto mt-0"></h5>
                    </div>
                    <p class="text-muted mb-0">Total</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row">
  <div class="col-md-12">
    <div class="card m-b-30">
      <div class="card-body">
        <h5>Grafik Pengeluaran dan Pemasukan</h5>
        <canvas id="pieChart"></canvas>
    </div>
</div>
</div>
</div>  -->


<?= $this->endSection(); ?>