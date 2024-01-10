
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>GEDUNG ASWAJA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    
    <!-- Bootstrap Css -->
    <link href="<?=base_url()?>/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="<?=base_url()?>/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="<?=base_url()?>/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <script src="<?=base_url()?>/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/sweetalert2/sweetalert2.min.js"></script>
</head>

<script type="text/javascript">
    $(document).ready(function(){
     <?php 
     $session = session()->get('status');

     if($session == 'gagal'){
        ?>
        Swal.fire({
           title: 'Perhatian!',
           text: `<?=session()->get('pesan')?>`,
           icon: 'warning',
           customClass: {
              confirmButton: 'btn btn-primary'
          },
          buttonsStyling: false
      })

        <?php 
        $array_items = ['status', 'pesan'];
        session()->remove($array_items);
    }

    ?>
})
</script>

<body>

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="account-pages mt-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5 col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex p-3">
                                <div>
                                    <a href="index.html" class="">
                                        <img src="<?=base_url()?>/assets/logo.png" alt="" height="100" class="auth-logo logo-dark">
                                        <img src="<?=base_url()?>/assets/logo.png" alt="" height="100" class="auth-logo logo-light">
                                    </a>
                                </div>
                                <div class="ms-auto text-end">
                                    <h4 class="font-size-18">Selamat Datang !</h4>
                                    <p class="text-muted mb-0">Silahkan Login.</p>
                                </div>
                            </div>
                            <div class="p-3">

                                <form class="form-horizontal" action="<?=base_url('Login/proses_login')?>" method="POST">

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="row mt-4">
                                            <!-- <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="customControlInline">
                                                    <label class="form-check-label" for="customControlInline">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-6 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" name="submit" type="submit">Login</button>
                                            </div>
                                        </div>

                                       <!--  <div class="mb-0 row">
                                            <div class="col-12 mt-4 text-center">
                                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                        </div> -->
                                    </form>

                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center position-relative">
                            <p class="text-white-50">Don't have an account ? <a href="\register" class="fw-bold text-white"> Daftar! </a> </p>
                            <p class="text-white-50">©<script>document.write(new Date().getFullYear())</script> GEDUNG ASWAJA
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- JAVASCRIPT -->
        <script src="<?=base_url()?>/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?=base_url()?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url()?>/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?=base_url()?>/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?=base_url()?>/assets/libs/node-waves/waves.min.js"></script>

        <script src="<?=base_url()?>/assets/js/app.js"></script>

    </body>
    </html>
