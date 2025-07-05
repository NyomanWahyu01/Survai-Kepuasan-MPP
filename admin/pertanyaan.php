<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


 <section class="au-breadcrumb m-t-75">
     <div class="section__content section__content--p30">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12">
                     <div class="au-breadcrumb-content">
                         <div class="au-breadcrumb-left">
                             <ul class="list-unstyled list-inline au-breadcrumb__list">
                                 <h3 class="text-xl font-bold text-bold">List Pertanyaan</h3>
                             </ul>
                         </div>
                         <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#tambahModal" onclick='add(this)'>
                             <i class="zmdi zmdi-plus"></i>TAMBAH PERTANYAAN</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

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
                                     <th>Kategori</th>
                                     <th>Pertanyaan</th>
                                     <th>Opsi 1</th>
                                     <th>Opsi 2</th>
                                     <th>Opsi 3</th>
                                     <th>Opsi 4</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    include 'koneksi.php';

                                    $query = mysqli_query(
                                        $conn,
                                        'select * from data_pertanyaan'
                                    );
                                    $nomor = 1;
                                    while (
                                        $data = mysqli_fetch_array(
                                            $query
                                        )
                                    ) {
                                    ?>
                                     <tr class='tr-shadow'>
                                         <td><?php echo $nomor; ?></td>
                                         <td>
                                             <?php echo $data['kategori']; ?>
                                         </td>
                                         <td>
                                             <?php echo $data['pertanyaan']; ?>
                                         </td>
                                         <td>
                                             <?php echo $data['opsi1']; ?><br>
                                             <span>
                                                 Point = 1
                                             </span>
                                         </td>
                                         <td>
                                             <?php echo $data['opsi2']; ?><br>
                                             <span>
                                                 Point = 2
                                             </span>
                                         </td>
                                         <td>
                                             <?php echo $data['opsi3']; ?><br>
                                             <span>
                                                 Point = 3
                                             </span>
                                         </td>
                                         <td>
                                             <?php echo $data['opsi4']; ?><br>
                                             <span>
                                                 Point = 4
                                             </span>
                                         </td>
                                         <td>
                                         <div class='table-data-feature'>
                                           <!-- Tombol Edit (Modal) -->
                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'
                                            data-id='<?php echo $data['id_pertanyaan']; ?>'
                                            data-kategori='<?php echo $data['kategori']; ?>'
                                            data-soal='<?php echo $data['pertanyaan']; ?>'
                                            data-opsi1='<?php echo $data['opsi1']; ?>'
                                            data-opsi2='<?php echo $data['opsi2']; ?>'
                                            data-opsi3='<?php echo $data['opsi3']; ?>'
                                            data-opsi4='<?php echo $data['opsi4']; ?>'
                                            onclick='myFunction(this)'>
                                            <i class='zmdi zmdi-edit'></i>
                                        </button>

                                        <!-- Tombol Hapus -->
                                       <!-- Tombol Hapus Langsung -->
                                    <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                        <a href='hapus_pertanyaan.php?id_pertanyaan=<?php echo $data['id_pertanyaan']; ?>'>
                                            <i class='zmdi zmdi-delete'></i>
                                        </a>
                                    </button>

                                    </div>

                                         </td>
                                     </tr>
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




 <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="tambahModalLabel">Tambah Pertanyaan</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card-body card-block">
                     <form action="simpan_pertanyaan.php" method="post" id="formTambah">
                         <div class="form-group">
                             <label for="kategori" class="control-label mb-1">Kategori</label>
                             <select id="kategori" name="kategori" class="form-control" required>
                                 <option value="">Pilih Kategori</option>
                                 <option value="PERSYARATAN PELAYANAN">PERSYARATAN PELAYANAN</option>
                                 <option value="PROSEDUR PELAYANAN"> PROSEDUR PELAYANAN</option>
                                 <option value="WAKTU PELAYANAN"> WAKTU PELAYANAN</option>
                                 <option value="BIAYA PELAYANAN"> BIAYA/TARIF PELAYANAN</option>
                                 <option value="PRODUK SPESIFIKASI JENIS PELAYANAN"> PRODUK SPESIFIKASI JENIS PELAYANAN</option>
                                 <option value="KOMPETENSI PELAKSANA PELAYANAN"> KOMPETENSI PELAKSANA PELAYANAN</option>
                                 <option value="PERILAKU PELAKSANA PELAYANAN"> PERILAKU PELAKSANA PELAYANAN </option>
                                 <option value="MATLUMAN PELAYANAN">MATLUMAN PELAYANAN</option>
                                 <option value="PENANGANAN PENGADUAN, SARAN, DAN MASUKAN"> PENANGANAN PENGADUAN, SARAN, DAN MASUKAN</option>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="pertanyaan" class="control-label mb-1">Pertanyaan</label>
                             <textarea id="pertanyaan" name="pertanyaan" type="text" class="form-control" placeholder="Masukkan Pertanyaan" required></textarea>
                         </div>
                         <div class="row">
                             <div class="col-6">
                                 <div class="form-group">
                                     <label for="opsi1" class="control-label mb-1">Jawaban Opsi 1</label>
                                     <input id="opsi1" name="opsi1" type="text" class="form-control" placeholder="contoh : Tidak Sesuai" required>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div class="form-group">
                                     <label for="opsi2" class="control-label mb-1">Jawaban Opsi 2</label>
                                     <input id="opsi2" name="opsi2" type="text" class="form-control" placeholder="contoh : Kurang Sesuai" required>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div class="form-group">
                                     <label for="opsi3" class="control-label mb-1">Jawaban Opsi 3</label>
                                     <input id="opsi3" name="opsi3" type="text" class="form-control" placeholder="contoh : Sesuai" required>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div class="form-group">
                                     <label for="opsi4" class="control-label mb-1">Jawaban Opsi 4</label>
                                     <input id="opsi4" name="opsi4" type="text" class="form-control" placeholder="contoh : Sangat Sesuai" required>
                                 </div>
                             </div>
                         </div>
                         <div>
                             <button type="submit" class="btn btn-lg btn-info btn-block">
                                 <span>Submit</span>
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>

<!-- Modal Edit Pertanyaan -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body card-block">
                    <form action="update_pertanyaan.php" method="post" id="formEdit">
                        <input id="edit_id_pertanyaan" name="id_pertanyaan" type="hidden">
                        <div class="form-group">
                            <label for="edit_kategori" class="control-label mb-1">Kategori</label>
                            <select id="edit_kategori" name="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="PERSYARATAN PELAYANAN">PERSYARATAN PELAYANAN</option>
                                <option value="PROSEDUR PELAYANAN"> PROSEDUR PELAYANAN</option>
                                <option value="WAKTU PELAYANAN"> WAKTU PELAYANAN</option>
                                <option value="BIAYA PELAYANAN"> BIAYA/TARIF PELAYANAN</option>
                                <option value="PRODUK SPESIFIKASI JENIS PELAYANAN"> PRODUK SPESIFIKASI JENIS PELAYANAN</option>
                                <option value="KOMPETENSI PELAKSANA PELAYANAN"> KOMPETENSI PELAKSANA PELAYANAN</option>
                                <option value="PERILAKU PELAKSANA PELAYANAN"> PERILAKU PELAKSANA PELAYANAN </option>
                                <option value="MATLUMAN PELAYANAN">MATLUMAN PELAYANAN</option>
                                <option value="PENANGANAN PENGADUAN, SARAN, DAN MASUKAN"> PENANGANAN PENGADUAN, SARAN, DAN MASUKAN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_pertanyaan" class="control-label mb-1">Pertanyaan</label>
                            <textarea id="edit_pertanyaan" name="pertanyaan" class="form-control" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_opsi1" class="control-label mb-1">Jawaban Opsi 1</label>
                                    <input id="edit_opsi1" name="opsi1" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_opsi2" class="control-label mb-1">Jawaban Opsi 2</label>
                                    <input id="edit_opsi2" name="opsi2" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_opsi3" class="control-label mb-1">Jawaban Opsi 3</label>
                                    <input id="edit_opsi3" name="opsi3" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_opsi4" class="control-label mb-1">Jawaban Opsi 4</label>
                                    <input id="edit_opsi4" name="opsi4" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                <span>Update</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
let originalData = {}; // Menyimpan data awal sebelum perubahan

function add() {
    $('#tambahModal').modal('show');
}

function myFunction(e) {
    console.log("Edit button clicked");

    document.getElementById("editModalLabel").innerHTML = "Edit Pertanyaan";
    
    // Ambil data dari tombol yang diklik
    let id_pertanyaan = e.getAttribute("data-id");
    let kategori = e.getAttribute("data-kategori");
    let pertanyaan = e.getAttribute("data-soal");
    let opsi1 = e.getAttribute("data-opsi1");
    let opsi2 = e.getAttribute("data-opsi2");
    let opsi3 = e.getAttribute("data-opsi3");
    let opsi4 = e.getAttribute("data-opsi4");

    // Set nilai input dalam modal
    document.getElementById("edit_id_pertanyaan").value = id_pertanyaan;
    document.getElementById("edit_kategori").value = kategori;
    document.getElementById("edit_pertanyaan").value = pertanyaan;
    document.getElementById("edit_opsi1").value = opsi1;
    document.getElementById("edit_opsi2").value = opsi2;
    document.getElementById("edit_opsi3").value = opsi3;
    document.getElementById("edit_opsi4").value = opsi4;

    // Simpan data awal
    originalData = { kategori, pertanyaan, opsi1, opsi2, opsi3, opsi4 };

    // Buka modal
    $('#editModal').modal('show');
}

// Validasi form edit
$('#formEdit').on('submit', function(event) {
    event.preventDefault();
    
    if (!isDataChanged()) {
        Swal.fire({
            title: "Peringatan!",
            text: "Tidak Ada Perubahan Data!",
            icon: "warning",
            confirmButtonColor: '#f39c12',
            showConfirmButton: false,
            timer: 1500
        });
        return false;
    }

    // Kirim form jika ada perubahan
    $.post('update_pertanyaan.php', $(this).serialize(), function(response) {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Pertanyaan Berhasil Diupdate',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            location.reload();
        });
    });
});

// Fungsi untuk mengecek perubahan data
function isDataChanged() {
    return (
        originalData.kategori !== document.getElementById("edit_kategori").value ||
        originalData.pertanyaan !== document.getElementById("edit_pertanyaan").value ||
        originalData.opsi1 !== document.getElementById("edit_opsi1").value ||
        originalData.opsi2 !== document.getElementById("edit_opsi2").value ||
        originalData.opsi3 !== document.getElementById("edit_opsi3").value ||
        originalData.opsi4 !== document.getElementById("edit_opsi4").value
    );
}

// Validasi form tambah
$('#formTambah').on('submit', function(event) {
    event.preventDefault();
    
    // Validasi form kosong
    const kategori = $('#kategori').val();
    const pertanyaan = $('#pertanyaan').val().trim();
    const opsi1 = $('#opsi1').val().trim();
    const opsi2 = $('#opsi2').val().trim();
    const opsi3 = $('#opsi3').val().trim();
    const opsi4 = $('#opsi4').val().trim();
    
    if (!kategori || !pertanyaan || !opsi1 || !opsi2 || !opsi3 || !opsi4) {
        Swal.fire({
            title: 'Peringatan!',
            text: 'Semua Field Harus Diisi!',
            icon: 'warning',
            confirmButtonColor: '#f39c12',
            showConfirmButton: false,
            timer: 1500
        });
        return false;
    }

    // Kirim form jika semua valid
    $.post('simpan_pertanyaan.php', $(this).serialize(), function(response) {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Pertanyaan Berhasil Disimpan',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            location.reload();
        });
    });
});
</script>


</body>
</html>

<?php



