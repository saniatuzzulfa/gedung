<?=$this->extend('data/template')?>
<?=$this->section('content')?>
<div class="page-title-box">
  <div class="row align-items-center">
    <div class="col-md-8">
      <h6 class="page-title">Master Pengguna</h6>
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
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

                    <h4 class="card-title">Data Pengguna</h4>
                    <p class="card-title-desc">
                      <button type="button" onclick="tambah()" class="btn btn-primary waves-effect waves-light"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-user-plus" ></i>&nbsp;Tambah Data Pengguna</button>

                    </p>

                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Lengkap</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>No HP</th>
                          <th>Username</th>
                          <th>Hak Akses</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        $no=1;
                        foreach($user as $u):
                         ?>
                         <tr>
                          <td><?=$no++?></td>
                          <td><?=$u->nama_lengkap?></td>
                          <td><?=$u->jenis_kelamin?></td>
                          <td><?=$u->alamat?></td>
                          <td><?=$u->no_hp?></td>
                          <td><?=$u->username?></td>
                          <td><?=$u->hak_akses?></td>
                          <td><button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="edit(`<?=$u->id_pengguna?>`)" class="btn btn-success waves-effect waves-light"><i class="fas fa-user-edit"></i>&nbsp;Edit</button>&nbsp;<button type="button" class="btn btn-danger waves-effect waves-light" onclick="hapus(`<?=$u->id_pengguna?>`)"><i class="fas fa-user-times"></i>&nbsp;Hapus</button></td>
                        </tr>
                      <?php endforeach; ?>

                    </tbody>
                  </table>

                </div>
              </div>
            </div> <!-- end col -->
          </div> <!-- end row -->
          <!--  Modal content for the above example -->
          <div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Pengguna</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="javascript:void(0);" method="POST" id="form_pengguna">
                    <input type="hidden" name="id_pengguna" id="id_pengguna">
                    <div class="row mb-3">
                      <label for="example-text-input" class="col-sm-2 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" placeholder="Nama Lengkap" id="nama_lengkap" name="nama_lengkap" required="">
                      </div>
                      <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" placeholder="Jenis Kelamin" id="jenis_kelamin" name="jenis_kelamin" required="">
                      </div>
                      <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" placeholder="Alamat" id="alamat" name="alamat" required="">
                      </div>
                      <label for="example-text-input" class="col-sm-2 col-form-label">No HP</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" placeholder="No HP" id="no_hp" name="no_hp" required="">
                      </div>
                      <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" placeholder="Username" id="username" name="username" required="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="password" placeholder="Password" id="password" name="password" required="">
                      </div>
                      <label for="example-text-input" class="col-sm-2 col-form-label">Hak Akses</label>
                      <div class="col-sm-4">
                       <div class="form-check">
                        <input class="form-check-input" type="radio" value="admin" name="hak_akses" id="admin">
                        <label class="form-check-label" for="admin">
                          Admin
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="pelanggan" name="hak_akses" id="pelanggan">
                        <label class="form-check-label" for="pelanggan">
                          Pelanggan
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="pemilik" name="hak_akses" id="pemilik">
                        <label class="form-check-label" for="pemilik">
                          Pemilik
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                     <button type="submit"  class="btn btn-primary waves-effect waves-light"  id="submit"><i class="fas fa-save"></i>&nbsp;Simpan Data Pengguna</button>
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
      var metode="add";

      function tambah(){
        $("#form_pengguna")[0].reset();
        metode = "add";
        $("#submit").html("&nbsp;Simpan Data Pengguna")
      }

      function edit(kd_pengguna){
        $("#form_pengguna")[0].reset();
        $("#submit").html("&nbsp;Update Data Pengguna")
        $("#admin").removeAttr('checked','checked');
        $("#pemilik").removeAttr('checked','checked');
        $("#pelanggan").removeAttr('checked','checked');
        metode = "edit";
        $.ajax({
          url:"<?=base_url('admin/Pengguna/edit_pengguna')?>/"+kd_pengguna,
          type:"GET",
          dataType:"JSON",
          success: function(data){

            $("#username").val(`${data.username}`);
            $("#password").val(`${data.password}`);
            $("#id_pengguna").val(kd_pengguna);
            $("#nama_lengkap").val(`${data.nama_lengkap}`);
            $("#jenis_kelamin").val(`${data.jenis_kelamin}`);
            $("#alamat").val(`${data.alamat}`);
            $("#no_hp").val(`${data.no_hp}`);

            if(data.hak_akses == 'admin'){
              $("admin").attr('checked','checked');
            }else if(data.hak_akses == 'pemilik'){
              $("#pemilik").attr('checked','checked');
            }else{
              $("#pelanggan").attr('checked','checked');
            }

          },error: function(jqXHR, textStatus, errorThrow){
           Swal.fire(
            'Gagal!',
            `GAGAL MENGAMBIL DATA`,
            'error'
            )
         }
       });
      }


      $("#form_pengguna").submit(function(e){
       e.preventDefault();
       $.ajax({
        url:"<?=base_url('admin/Pengguna/save_pengguna/')?>"+metode,
        type:"POST",
        data:$("#form_pengguna").serialize(),
        dataType:"JSON",
        success:function(data){
          if(data.status == true){
           Swal.fire(
            'Berhasil!',
            `${data.pesan}`,
            'success'
            )
           setTimeout(function(){
            location.reload()
            $(".bs-example-modal-lg").modal('hide');
          },1000)                 
         }else{
          Swal.fire(
            'Gagal!',
            `${data.pesan}`,
            'error'
            )
        }
      },
      error:function(er){
       Swal.fire(
        'Gagal!',
        'API GAGAL',
        'error'
        )
     }
   })
     })

      function hapus(kode_pengugna){
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
            url:"<?=base_url('admin/Pengguna/hapus');?>/"
            +id_pengugna,
            type:"POST",
            dataType:"JSON",
            cache:false,
            success:function(a){
              if(a.status == true){
                Swal.fire(
                  'Deleted!',
                  `${a.pesan}`,
                  'success'
                  )
                setTimeout(function(){
                  location.reload()
                },1000)                 
              }else{
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
    <?=$this->endSection();?>