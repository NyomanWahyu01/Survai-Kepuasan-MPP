 <!-- HEADER LIST INSTANSI -->
 <section class="au-breadcrumb m-t-75">
     <div class="section__content section__content--p30">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12">
                     <div class="au-breadcrumb-content">
                         <div class="au-breadcrumb-left">
                             <ul class="list-unstyled list-inline au-breadcrumb__list">
                                 <h3 class="text-xl font-bold text-bold">List Instansi</h3>
                             </ul>
                         </div>
                         <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal" onclick='add(this)'>
                             <i class="zmdi zmdi-plus"></i>TAMBAH INSTANSI</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- END INSTANSI -->
 <section>
     <div class="section__content section__content--p30">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12">
                     <!-- DATA TABLE -->
                     <br>

                     <div class="table-responsive table-responsive-data2">
                         <table class="table table-data2">
                             <thead>
                                 <tr>
                                     <th>No.</th>
                                     <th>Instansi</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <!-- Edit -->
                             <?php
                                include("koneksi.php");

                                $query = mysqli_query($conn, "select * from data_instansi");
                                $nomor = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                 <tr class='tr-shadow'>
                                     <td><?php echo $nomor; ?></td>
                                     <td>
                                         <?php echo $data['nama_instansi']; ?>
                                     </td>
                                     <td>
                                         <div class='table-data-feature'>
                                             <!-- Edit BUTTON -->
                                             <button class='item' data-toggle='modal' data-target='#mediumModal'
                                                 onclick='myFunction(this)'
                                                 data-id='<?php echo $data['id_instansi']; ?>'
                                                 data-nama='<?php echo $data['nama_instansi']; ?>'>
                                                 <i class='zmdi zmdi-edit'></i>
                                                 <small class='text-danger' style='display: none;'>
                                                     Harap lengkapi data instansi sebelum menyimpan!
                                                 </small>
                                             </button>

                                             <!-- DELETE BUTTON -->
                                             <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                 <a href='hapus_instansi.php?id_instansi=<?php echo $data['id_instansi']; ?>' class='delete-btn'>
                                                     <i class='zmdi zmdi-delete'></i>
                                                 </a>
                                             </button>
                                             <!-- END DELETE -->
                                         </div>
                                     </td>
                                 </tr>
                                 <tr class='spacer'></tr>
                             <?php
                                    $nomor++;
                                }
                                ?>
                             </tbody>
                         </table>
                     </div>
                     <!-- END DATA TABLE -->
                 </div>
             </div>
         </div>
     </div>
 </section>




 <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="mediumModalLabel">Tambah Instansi</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="simpan_instansi.php" method="post" id="formInstansi">
                     <input type="hidden" id="id_instansi" name="id_instansi">
                     <div class="form-group">
                         <label for="nama_instansi" class="control-label mb-1">Nama Instansi</label>
                         <input id="nama_instansi" name="nama_instansi" type="text" class="form-control" required>
                     </div>
                     <div>
                         <button type="submit" name="simpan" class="btn btn-lg btn-info btn-block">
                             <span>Submit</span>
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
     // Script untuk edit instansi
     function myFunction(e) {
         // Changes modal title to "Edit Instansi"
         document.getElementById("mediumModalLabel").innerHTML = "Edit Instansi";

         // Gets id and name from data attributes
         var id_instansi = $(e).attr("data-id");
         var nama_instansi = $(e).attr("data-nama");

         // Sets the form field values
         $("#id_instansi").val(id_instansi);
         $("#nama_instansi").val(nama_instansi);

         // Add form submit handler for edit
         $('#formInstansi').off('submit').on('submit', function(event) {
             const new_nama_instansi = $('#nama_instansi').val().trim();
             const id_instansi = $('#id_instansi').val();
             
             // Validate empty field
             if (new_nama_instansi === '') {
                 event.preventDefault();
                 Swal.fire({
                     title: 'Peringatan!',
                     text: 'Lengkapi Data Nama Instansi!',
                     icon: 'warning',
                     confirmButtonColor: '#f39c12',
                     showConfirmButton: false,
                     timer: 1500
                 });
                 return false;
             }

             // For edit mode only
             if (id_instansi) {
                 // Check if data was changed
                 if (new_nama_instansi === nama_instansi) {
                     event.preventDefault();
                     Swal.fire({
                         title: 'Peringatan!', 
                         text: 'Data Instansi Tidak Ada Perubahan!',
                         icon: 'warning',
                         confirmButtonColor: '#f39c12',
                         showConfirmButton: false,
                         timer: 1500
                     });
                     return false;
                 }

                 // Submit form via AJAX
                 event.preventDefault();
                 $.post('simpan_instansi.php', $(this).serialize(), function(response) {
                     Swal.fire({
                         title: 'Berhasil!',
                         text: 'Instansi Berhasil Diupdate Menjadi: ' + new_nama_instansi,
                         icon: 'success',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(() => {
                         location.reload();
                     });
                 });
             }
         });
     }


     // Script untuk tambah instansi
     function add(e) {
         document.getElementById("mediumModalLabel").innerHTML = "Input Instansi";
         $("#id_instansi").val("");
         $("#nama_instansi").val("");
     }

     // Script untuk validasi form
     $('#formInstansi').on('submit', function(e) {
         const nama_instansi = $('#nama_instansi').val().trim();

         if (nama_instansi === '') {
             e.preventDefault();
             Swal.fire({
                 title: 'Peringatan!',
                 text: 'Lengkapi Data Nama Instansi!',
                 icon: 'warning',
                 confirmButtonColor: '#f39c12',
                 showConfirmButton: false, // Menghilangkan tombol OK
                 timer: 1500, // Alert otomatis menghilang tanpa progress bar
                 showClass: {
                     popup: 'animate__animated animate__fadeInDown'
                 },
                 hideClass: {
                     popup: 'animate__animated animate__fadeOutUp'
                 }
             });
             return false;
         }
     });
 </script>