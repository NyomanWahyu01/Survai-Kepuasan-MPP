<?php

session_start();
error_reporting(0);

// Simpan nowa ke session jika ada POST data
if (isset($_POST['nowa'])) {
  $_SESSION['temp_nowa'] = $_POST['nowa'];
}

// Redirect ke index.php hanya jika tidak ada nowa di POST dan di session temporary
if (!isset($_POST['nowa']) && !isset($_SESSION['temp_nowa'])) {
  header('Location: index.php');
  exit();
}

// Ambil nowa dari POST atau session temporary
$nowa = isset($_POST['nowa']) ? $_POST['nowa'] : $_SESSION['temp_nowa'];
?>

<!DOCTYPE html>
<html lang="en">

<head>      

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <title>Survei Kepuasan Masyarakat</title>
  <link rel="icon" href="./assetss/images/logo-pemda.ico" type="image/x-icon"/>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" >

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="assetss/css/templatemo-chain-app-dev.css">
  <link rel="stylesheet" href="assetss/css/animated.css">
  <link rel="stylesheet" href="assetss/css/owl.css">
  <link rel="stylesheet" href="vendor/bootstrap/css/responden.css">

</head>

<body>
  <!-- ***** Header Area Start ***** -->
  <!-- <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s" style="background-color: white;"> -->
  <header class="header-area">
  <div class="container"> 
    <div class="row"> 
      <div class="col-12"> 
        <nav class="main-nav"> 
          <div class="logo"> 
            <img src="assetss/images/logo1.png" alt="Logo Pemda" class="exit-button"> 
          </div> 
        </nav> 
      </div> 
    </div> 


  </header>

  <!-- ***** FORM PENGISIAN DATA RESPONDEN ***** -->
  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading text-center">
            <h4>Data <em>Responden</em></h4>
          </div>
          <div class="form-container">
            <form method="post" action="simpan_responden.php">
              <div class="form-group mb-4">
                <label for="id_instansi">Pilih Instansi</label>
                <select class="form-control" name="id_instansi" id="id_instansi" required>
                  <option value="">--Pilih Instansi--</option>
                  <?php
                  include 'koneksi.php';
                  $query = mysqli_query($conn, 'select * from data_instansi');
                  while ($data = mysqli_fetch_array($query)) {
                    echo "<option value='$data[id_instansi]'>$data[nama_instansi]</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group mb-4">
                <input type="hidden" name="nowa" value="<?= $nowa ?>">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" required placeholder="Masukkan nama Anda">
              </div>

              <div class="form-group mb-4">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" required class="form-control">
                  <option value="">--Pilih--</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="form-group mb-4">
                <label for="pekerjaan">Pekerjaan</label>
                <select required name="pekerjaan" class="form-control">
                  <option value="">--Pilih--</option>
                  <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                  <option value="Pegawai Swasta">Pegawai Swasta</option>
                  <option value="Wiraswasta/Wirausaha">Wiraswasta/Wirausaha</option>
                  <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                  <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                  <option value="Belum Bekerja/Tidak Bekerja">Belum Bekerja/Tidak Bekerja</option>
                  <option value="Pensiunan">Pensiunan</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>

              <div class="form-group mb-4">
                <label for="pendidikan">Pendidikan</label>
                <select required name="pendidikan" class="form-control">
                  <option value="">--Pilih--</option>
                  <option value="SD Kebawah">SD Kebawah</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                  <option value="D3/D4">D3/D4</option>
                  <option value="S1">S1</option>
                  <option value="S2 Keatas">S2 Keatas</option>
                </select>
              </div>

              <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary">
                  Lanjutkan <i class="fa fa-arrow-circle-right ml-2"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image text-center">
            <img src="assetss/images/logo-pemda4.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** ENDFORM PENGISIAN DATA RESPONDEN ***** -->

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetss/js/owl-carousel.js"></script>
  <script src="assetss/js/animation.js"></script>
  <script src="assetss/js/imagesloaded.js"></script>
  <script src="assetss/js/popup.js"></script>
  <script src="assetss/js/custom.js"></script>

  <!-- Tambahkan script validasi form di bagian bawah sebelum closing body -->
  <script>
    // Tambahkan event listener untuk mencegah user kembali menggunakan tombol browser
    window.history.pushState(null, '', window.location.href);
    window.onpopstate = function() {
      window.history.pushState(null, '', window.location.href);
    };

    </script>
    <script>
      function validateForm() {
        const nowa = document.forms["myForm"]["nowa"].value;
        const id_instansi = document.forms["myForm"]["id_instansi"].value;
        const nama = document.forms["myForm"]["nama"].value;
        const jkel = document.forms["myForm"]["jk"].value;
        const pekerjaan = document.forms["myForm"]["pekerjaan"].value;
        const pendidikan = document.forms["myForm"]["pendidikan"].value;
      }
    </script>
    <script>
      function validateForm() {
        const nowa = document.forms["myForm"]["nowa"].value;
        const id_instansi = document.forms["myForm"]["id_instansi"].value;
        const nama = document.forms["myForm"]["nama"].value;
        const jkel = document.forms["myForm"]["jk"].value;
        const pekerjaan = document.forms["myForm"]["pekerjaan"].value;
        const pendidikan = document.forms["myForm"]["pendidikan"].value;
      }
    </script>
</body>

</html>