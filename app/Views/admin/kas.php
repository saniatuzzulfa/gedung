<?=$this->extend('data/template')?>
 <?=$this->section('content')?>
<div class="page-title-box">
  <div class="row align-items-center">
    <div class="col-md-8">
      <h6 class="page-title">Data Master Kas</h6>
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
        <li class="breadcrumb-item"><a href="#">Kas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kas</li>
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

                    <h4 class="card-title">Data Kas</h4>
                    <p class="card-title-desc">
                      <button type="button" onclick="tambah()" class="btn btn-primary waves-effect waves-light"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-book-open" ></i>&nbsp;Tambah Data Kas</button>

                    </p>
                    <div class="table-responsive mb-0">
                      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode kas</th>
                            <th>Nama kas</th>
                            <th>Tipe kas</th>
                            <th>Action</th>
                          </tr>
                        </thead>


                        <tbody>
                          <?php 
                          $no=1;
                          foreach($kas as $u):
                           ?>
                           <tr>
                            <td><?=$no++?></td>
                            <td><?=$u->kode_kas?></td>
                            <td><?=$u->nama_kas?></td>
                            <td><?=$u->tipe_kas?></td>
                            <td><button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="edit(`<?=$u->kode_kas?>`)" class="btn btn-success waves-effect waves-light"><i class="fas fa-pencil-ruler"></i>&nbsp;Edit</button>&nbsp;<button type="button" class="btn btn-danger waves-effect waves-light" onclick="hapus(`<?=$u->kode_kas?>`)"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</button></td>
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
                  <h5 class="modal-title mt-0" id="myLargeModalLabel">Form kas</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="javascript:void(0);" method="POST" id="form_kas">

                    <div class="row mb-3">
                      <label for="example-text-input" class="col-sm-2 col-form-label">Kode kas</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" placeholder="Kode kas" id="kode_kas" name="kode_kas" required="">
                      </div>
                      <label for="example-text-input" class="col-sm-2 col-form-label">Nama kas</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" placeholder="Nama kas" id="nama_kas" name="nama_kas" required="">
                      </div>
                    </div>
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Tipe</label>
                    <div class="col-sm-4">
                      <select name="tipe_kas" id="tipe_kas" class="form-control" required="">
                        <option value="">Pilih Tipe</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                     <button type="submit"  class="btn btn-primary waves-effect waves-light"  id="submit"><i class="fas fa-save"></i>&nbsp;Simpan Data kas</button>
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
        $("#form_kas")[0].reset();
        metode = "add";
        $("#submit").html("&nbsp;Simpan Data Kas")
      }

      function edit(kd_kas){
        $("#form_kas")[0].reset();
        $("#submit").html("&nbsp;Update Data kas")
        metode = "edit";
        $.ajax({
          url:"<?=base_url('admin/kas/edit_kas')?>/"+kd_kas,
          type:"GET",
          dataType:"JSON",
          success: function(data){

            $("#kode_kas").val(`${data.kode_kas}`);
            $("#nama_kas").val(`${data.nama_kas}`);
            $("#kode_kas").val(kd_kas)
                         // $("#drprojecttype option[value='Adhoc']").attr("selected", "selected");
                         $(`#tipe_kas option[value='${data.tipe_kas}']`).attr('selected','selected');

                      },error: function(jqXHR, textStatus, errorThrow){
                       Swal.fire(
                        'Gagal!',
                        `GAGAL MENGAMBIL DATA`,
                        'error'
                        )
                     }
                   });
      }


      $("#form_kas").submit(function(e){
       e.preventDefault();
       $.ajax({
        url:"<?=base_url('admin/kas/save_kas/')?>"+metode,
        type:"POST",
        data:$("#form_kas").serialize(),
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

      function hapus(kd_kas){
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
            url:"<?=base_url('admin/kas/hapus');?>/"
            +kd_kas,
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