<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>GEDUNG ASWAJA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="<?= base_url() ?>/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Sweet Alert-->
    <link href="<?= base_url() ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url() ?>/assets/libs/jquery/jquery.min.js"></script>
    <!-- Required datatable js -->
    <script src="<?= base_url() ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="<?= base_url() ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="<?= base_url() ?>/assets/js/pages/datatables.init.js"></script>
    <!-- Sweet Alerts js -->
    <script src="<?= base_url() ?>/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>/chart-js/Chart.bundle.js"></script>
    <script type="text/javascript">
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
        }

        function removeDots(str) {
            return str.replace(/\./g, "");
        }
    </script>

</head>

<body data-sidebar="colored">

    <?php
    $hak_akses = session()->get('hak_akses');
    ?>


    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="d-flex">
                <div class="navbar-brand-box text-center">
                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?= base_url() ?>assets/logo.png" alt="" height="50">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url() ?>assets/logo.png" alt="" height="50">
                        </span>
                    </a>

                </div>

                <div class="navbar-header">
                    <button type="button" class="button-menu-mobile waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="d-flex ms-auto">
                        <!-- Search input -->
                        <div class="search-wrap" id="search-wrap">
                            <div class="search-bar">
                                <input class="search-input form-control" placeholder="Search">
                                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                    <i class="mdi mdi-close-circle"></i>
                                </a>
                            </div>
                        </div>




                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user me-2" src="<?= base_url() ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                <span class="d-none d-md-inline-block ms-1"><?= session()->get('nama_lengkap') ?>. <i class="mdi mdi-chevron-down"></i> </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <!--  <a class="dropdown-item" href="#"><i class="dripicons-user font-size-16 align-middle d-inline-block me-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="dripicons-wallet font-size-16 align-middle d-inline-block me-1"></i> My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="dripicons-gear font-size-16 align-middle me-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="dripicons-lock-open font-size-16 align-middle d-inline-block me-1"></i> Lock screen</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="javascript:;" onclick="logout()"><i class="dripicons-power-off font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-spin mdi-cog"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title text-uppercase">Main</li>

                        <li>
                            <a href="/Dashboard" class="waves-effect">
                                <!--  <span class="badge rounded-pill bg-info float-end">2</span> -->
                                <i class="dripicons-meter"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <?php
                        if ($hak_akses == 'admin') :
                        ?>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-message"></i>
                                    <span> Data Master </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="/Admin/pengguna" class="waves-effect">

                                            <i class="fas fa-users"></i>
                                            <span> Data User </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/Admin/paket" class="waves-effect">
                                            <!-- <span class="badge rounded-pill bg-info float-end">2</span> -->
                                            <i class="fas fa-book-open"></i>
                                            <span> Data Paket </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/Admin/reservasi" class="waves-effect">
                                            <!-- <span class="badge rounded-pill bg-info float-end">2</span> -->
                                            <i class="fas fa-book-open"></i>
                                            <span> Data Reservasi </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/Admin/kas" class="waves-effect">
                                            <!-- <span class="badge rounded-pill bg-info float-end">2</span> -->
                                            <i class="fas fa-book-open"></i>
                                            <span> Data Jenis Kas </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-message"></i>
                                    <span> Transaksi </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">


                                    <li>
                                        <a href="/Admin/pemasukan" class="waves-effect">
                                            <span> Pemasukan </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/Admin/pengeluaran" class="waves-effect">
                                            <span> Pengeluaran </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php
                        if ($hak_akses != 'pelanggan') :
                        ?>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-message"></i>
                                    <span> Laporan </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/Admin/jurnal">Jurnal Umum</a></li>
                                    <li><a href="/Admin/rekapitulasi">Rekapitulasi</a></li>
                                </ul>
                            </li>

                        <?php endif; ?>

                        <?php
                        if ($hak_akses == 'pelanggan') :
                        ?>
                            <li>
                                <a href="/Pelanggan/paket" class="waves-effect">
                                    <!--  <span class="badge rounded-pill bg-info float-end">2</span> -->
                                    <i class="dripicons-meter"></i>
                                    <span> Package </span>
                                </a>
                            </li>
                            <li>
                                <a href="/Pelanggan/reservasi" class="waves-effect">
                                    <!--  <span class="badge rounded-pill bg-info float-end">2</span> -->
                                    <i class="dripicons-meter"></i>
                                    <span> Reservasi </span>
                                </a>
                            </li>

                        <?php endif; ?>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->





        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>

                </div>
            </div>
            <!-- End Page-content -->



            <footer class="footer text-center">
                © <script>
                    document.write(new Date().getFullYear())
                </script> GEDUNG ASWAJA
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?= base_url() ?>/assets/libs/morris.js/morris.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/raphael/raphael.min.js"></script>


    <script src="<?= base_url() ?>/assets/libs/peity/jquery.peity.min.js"></script>

    <script src="<?= base_url() ?>/assets/js/pages/dashboard.init.js"></script>

    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <script>
        function logout() {
            Swal.fire({
                title: 'Apakah Anda ingin keluar dari sistem?',
                text: "Anda akan keluar dari sistem",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('Login/logout') ?>";

                }
            })
        }
    </script>

</body>

</html>