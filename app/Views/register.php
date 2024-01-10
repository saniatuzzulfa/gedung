<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DAFTAR SEKARANG</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="/vendor/jquery/jquery.min.js"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">DAFTAR SEKARANG!
                                        </h1>
                                    </div>
                                    <form class="user" method="POST" id="formregister" action="javascript:void(0)">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="nama1" placeholder="Nama" name="nama1" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="jeniskelamin1" placeholder="Jenis Kelamin" name="jeniskelamin1" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="alamat1" placeholder="Alamat" name="alamat1" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="noHp1" placeholder="No Hp" name="noHp1" required>
                                            </div>  
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="username1" placeholder="Username" name="username1" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1" required>
                                            </div>
                                        </div>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Daftar
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="\login">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        var metode = "add";
        $('#formregister').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('Register/save/') ?>/" + metode,
                type: "POST",
                data: $("#formregister").serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status == true) {
                        alert("Data Berhasil Disimpan");
                        window.location.href = "<?= base_url('Login') ?>";
                    } else {
                        alert("Data Gagal Disimpan");
                    }
                },
                error: function(er) {
                    alert("Data Gagal Disimpan");
                }
            })
        })
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>