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
  <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">-->

  <title>Survei Kepuasan Masyarakat</title>
  <link rel="icon" href="./assetss/images/logo-pemda.ico" type="image/x-icon" />


  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="assetss/css/templatemo-chain-app-dev.css">
  <link rel="stylesheet" href="assetss/css/animated.css">
  <link rel="stylesheet" href="assetss/css/owl.css">

  <style>
    /* Container styling */
    .about-us.section {
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      min-height: 100vh;
      display: flex;
      align-items: flex-start;
      margin-top: 80px;
      padding-top: 40px;
    }

    /* Form styling */
    .form-container {
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      padding: 40px;
      margin-top: 10px;
    }

    /* Heading styling */
    .section-heading {
      margin-top: 0 !important;
      margin-bottom: 25px !important;
    }

    .section-heading h4 {
      margin-top: 10px;
      margin-bottom: 20px;
      color: #2c3e50;
      font-weight: 700;
      position: relative;
      display: inline-block;
    }

    .section-heading h4 em {
      color: #2196F3;
      font-style: normal;
    }

    .section-heading h4:after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      width: 50%;
      height: 3px;
      background: linear-gradient(to right, #2196F3, transparent);
    }

    /* Form controls styling */
    .form-control {
      border: 2px solid #e9ecef;
      border-radius: 12px;
      padding: 12px 15px;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      background: #f8f9fa;
    }

    .form-control:focus {
      border-color: #2196F3;
      box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
      background: white;
    }

    /* Label styling */
    .form-group label {
      color: #2c3e50;
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 0.95rem;
    }

    /* Select styling */
    select.form-control {
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23333' viewBox='0 0 16 16'%3E%3Cpath d='M8 11.5l-5-5h10l-5 5z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 15px center;
      padding-right: 40px;
    }

    /* Button styling */
    .btn-primary {
      background: linear-gradient(135deg, #28a745, #218838) !important;
      border: none;
      border-radius: 50px;
      padding: 12px 35px;
      font-weight: 600;
      letter-spacing: 0.5px;
      box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #218838, #1e7e34) !important;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
    }

    .btn-primary:active,
    .btn-primary:focus {
      background: linear-gradient(135deg, #28a745, #218838) !important;
      box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2) !important;
    }

    /* Logo styling */
    .right-image img {
      max-width: 100%;
      height: auto;
      filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.1));
      transition: transform 0.3s ease;
      animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-10px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .form-container {
        padding: 25px;
      }

      .right-image img {
        max-width: 80%;
        margin: 30px auto;
        display: block;
      }
    }

    /* Animation */
    .form-group {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.5s ease forwards;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .form-group:nth-child(1) {
      animation-delay: 0.1s;
    }

    .form-group:nth-child(2) {
      animation-delay: 0.2s;
    }

    .form-group:nth-child(3) {
      animation-delay: 0.3s;
    }

    .form-group:nth-child(4) {
      animation-delay: 0.4s;
    }

    .form-group:nth-child(5) {
      animation-delay: 0.5s;
    }

    /* Header styling */
    .header-area {
      background-color: white;
      padding: 10px 0;
      position: fixed;
      width: 100%;
      top: 0;
      left: 0;
      z-index: 999;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header-area .logo {
      display: flex;
      align-items: center;
      padding: 5px 0;
    }

    .header-area .logo img {
      height: 45px;
      width: auto;
      transition: all 0.3s ease;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .header-area {
        padding: 5px 0;
      }

      .header-area .logo img {
        height: 40px;
      }
    }

    @media (max-width: 480px) {
      .header-area .logo img {
        height: 35px;
      }
    }
  </style>

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
              <img src="assetss/images/logo1.png" alt="Logo Pemda">
            </div>
          </nav>
        </div>
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

    // Validasi form sebelum submit
    document.querySelector("form").addEventListener("submit", function(e) {
      const instansi = document.getElementById("id_instansi").value;
      const nama = document.querySelector("input[name='nama']").value;
      const jk = document.querySelector("select[name='jk']").value;
      const pekerjaan = document.querySelector("select[name='pekerjaan']").value;
      const pendidikan = document.querySelector("select[name='pendidikan']").value;

      if (!instansi || !nama || !jk || !pekerjaan || !pendidikan) {
        e.preventDefault();

        // Tampilkan custom alert
        const alertBox = document.createElement("div");
        alertBox.className = "custom-alert";
        alertBox.innerHTML = `
        <div class="custom-alert-content">
          <div class="custom-alert-icon">
            <i class="fas fa-exclamation-circle"></i>
          </div>
          <p class="custom-alert-message">Harap Lengkapi Semua Data Terlebih Dahulu</p>
        </div>
      `;

        document.body.appendChild(alertBox);

        // Hilangkan alert setelah 2 detik
        setTimeout(() => {
          alertBox.remove();
        }, 2000);
      }
    });
  </script>

  <!-- Tambahkan style untuk custom alert -->
  <style>
    .custom-alert {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: linear-gradient(145deg, #ffffff, #f8f9fa);
      border-radius: 15px;
      padding: 20px 30px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
      z-index: 9999;
      min-width: 320px;
      max-width: 450px;
      border-left: 5px solid #dc3545;
      animation: slideIn 0.3s ease-out;
    }

    .custom-alert-content {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .custom-alert-icon {
      background: rgba(220, 53, 69, 0.1);
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #dc3545;
      font-size: 1.2rem;
    }

    .custom-alert-message {
      color: #2c3e50;
      font-size: 1rem;
      font-weight: 500;
      margin: 0;
      flex: 1;
    }

    @keyframes slideIn {
      from {
        transform: translate(-50%, -60%);
        opacity: 0;
      }

      to {
        transform: translate(-50%, -50%);
        opacity: 1;
      }
    }
  </style>
</body>

</html>