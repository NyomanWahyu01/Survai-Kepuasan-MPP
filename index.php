<?php
session_start();
error_reporting(0);
if ($_SESSION['nowa'] != '') {
  header('Location: survey.php');
  exit();
}
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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <title>Survei Kepuasan Masyarakat</title>
  <link rel="icon" href="./assetss/images/logo-pemda.ico" type="image/x-icon" />


  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- tailwind -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="assetss/css/templatemo-chain-app-dev.css">
  <link rel="stylesheet" href="assetss/css/animated.css">
  <link rel="stylesheet" href="assetss/css/owl.css">
  <link rel="stylesheet" href="vendor/bootstrap/css/index.css">

  <!-- Tambahkan style berikut di dalam tag head -->

</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div class="wrapper">
  <div class="content">
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- NAVBAR MENU -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky bg-white fixed top-0 left-0 w-full z-50 shadow-md">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <!-- Logo -->
        <a href="index.php" class="logo flex items-center space-x-2">
          <img src="assetss/images/logo1.png" alt="Kantor MPP Pangkep" class="h-15">
        </a>

        <!-- Hamburger Icon -->
        <button id="menu-toggle" class="lg:hidden text-blue-500 hover:text-yellow-400 transition duration-300 focus:outline-none">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>

        <!-- Navbar Menu -->
        <ul id="nav-menu" class="hidden lg:flex lg:space-x-6 text-lg font-medium">
          <li class="scroll-to-section">
            <a href="#top" class="text-gray-800 hover:text-yellow-500 transition duration-300">Home</a>
          </li>
          <li class="scroll-to-section">
            <a href="#Statistik" class="text-gray-800 hover:text-yellow-500 transition duration-300">Statistik</a>
          </li>
          <li class="scroll-to-section">
            <a href="#Kontak" class="text-gray-800 hover:text-yellow-500 transition duration-300">Contact</a>
          </li>
        </ul>
      </div>

      <!-- Dropdown Mobile Menu -->
      <div id="mobile-menu" class="hidden lg:hidden bg-blue-50 py-4">
        <ul class="space-y-4 text-center">
          <li><a href="#top" class="block text-gray-800 hover:text-yellow-500 transition duration-300">Home</a></li>
          <li><a href="#Statistik" class="block text-gray-800 hover:text-yellow-500 transition duration-300">Statistik</a></li>
          <li><a href="#Kontak" class="block text-gray-800 hover:text-yellow-500 transition duration-300">Contact</a></li>
        </ul>
      </div>
    </div>
  </header>

  <!-- JavaScript untuk Menu Toggle -->
  <script>
    const menuToggle = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");

    menuToggle.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });
  </script>




  <!-- ***** Header Area End ***** -->

  <!-- HEADER MENU -->
  <!-- Tambahkan Tailwind CSS CDN di dalam tag <head> -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- HEADER -->

  <head>
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6 align-self-center">
                <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                  <div class="row">
                    <div class="col-lg-6">
                      <h2 class="text-3xl font-bold text-gray-800 mb-4">IKUTI SURVEI</h2>
                      <form id="form1" action="responden.php" method="post" class="space-y-4" onsubmit="return validateForm()">
                        <div class="form-group">
                          <label for="nowa" class="text-lg text-gray-700"></label>
                          <input
                            type="text"
                            class="form-control p-3 rounded-lg border border-gray-300 w-full"
                            name="nowa"
                            id="nowa"
                            placeholder="No. Whatsapp"
                            required
                            onkeyup="enableSubmit()"
                            oninput="validatePhoneNumber()" />
                          <p id="nowa-error" class="text-red-500 text-sm hidden">Nomor Whatsapp wajib diisi!</p>
                        </div>
                        <h4 class="text-xl font-bold text-bold">* Hanya 5 Menit</h4>
                        <div class="col-lg-6 col-sm-6">
                          <div class="gradient-button mt-4">
                            <a
                              id="modal_trigger"
                              href="javascript:;"
                              onclick="submitForm()"
                              class="px-8 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-300"
                              id="submitButton"
                              disabled>
                              <i class="fa fa-sign-in-alt mr-2"></i> Mulai
                            </a>
                          </div>

                          <script>
                            // Fungsi untuk memvalidasi dan mengirimkan form
                            function submitForm() {
                              var nowa = document.getElementById("nowa").value;

                              if (nowa === "") {
                                // Tampilkan custom alert
                                const overlay = document.querySelector('.alert-overlay');
                                const alertBox = document.querySelector('.custom-alert');

                                overlay.style.display = 'block';
                                alertBox.style.display = 'block';

                                // Otomatis hilangkan alert setelah 2 detik
                                setTimeout(() => {
                                  overlay.style.display = 'none';
                                  alertBox.style.display = 'none';
                                }, 2000);

                                return false;
                              }

                              document.getElementById('form1').submit();
                            }

                            // Fungsi untuk mengaktifkan tombol 'Mulai' saat input tidak kosong
                            function enableSubmit() {
                              var nowa = document.getElementById("nowa").value;
                              var submitButton = document.getElementById("submitButton");

                              if (nowa !== "") {
                                submitButton.removeAttribute("disabled");
                              } else {
                                submitButton.setAttribute("disabled", "true");
                              }
                            }

                            // Fungsi untuk validasi hanya angka pada input No. Whatsapp
                            function validatePhoneNumber() {
                              var nowaInput = document.getElementById("nowa");
                              var nowaValue = nowaInput.value;

                              // Hapus semua karakter non-numerik
                              nowaInput.value = nowaValue.replace(/[^0-9]/g, '');
                            }

                            // Memanggil fungsi enableSubmit() setiap kali pengguna mengetik
                            document.getElementById("nowa").addEventListener("keyup", enableSubmit);
                          </script>

                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                  <img src="assetss/images/slider-dec.png" alt="" class="w-full h-auto rounded-lg shadow-lg">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- END HEADER MENU-->

    <script>
      // Fungsi untuk memvalidasi form dan mengaktifkan tombol jika input valid
      function validateForm() {
        var nowa = document.getElementById("nowa").value;
        var errorMessage = document.getElementById("nowa-error");

        // Cek apakah input No. Whatsapp kosong
        if (nowa == "") {
          errorMessage.classList.remove("hidden");
          return false; // Menghentikan pengiriman form jika kosong
        } else {
          errorMessage.classList.add("hidden");
          return true; // Mengizinkan pengiriman form jika input valid
        }
      }

      // Fungsi untuk mengaktifkan tombol 'Mulai' saat input tidak kosong
      function enableSubmit() {
        var nowa = document.getElementById("nowa").value;
        var submitButton = document.getElementById("submitButton");

        // Aktifkan tombol jika input tidak kosong
        if (nowa != "") {
          submitButton.removeAttribute("disabled");
        } else {
          submitButton.setAttribute("disabled", "true");
        }
      }
    </script>

    <!-- END HEADER -->

    <script>
      // Fungsi untuk memvalidasi form
      function validateForm() {
        var nowa = document.getElementById("nowa").value;
        var errorMessage = document.getElementById("nowa-error");

        // Cek apakah input No. Whatsapp kosong
        if (nowa == "") {
          errorMessage.classList.remove("hidden");
          return false; // Menghentikan pengiriman form jika kosong
        } else {
          errorMessage.classList.add("hidden");
          return true; // Mengizinkan pengiriman form jika input valid
        }
      }
    </script>

    <!-- END HEADER -->


    <!-- STATISTIK PELAYANAN -->
    <!-- Tambahkan Tailwind CSS CDN di dalam tag <head> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <?php
    include 'koneksi.php';
    $tot_responden = mysqli_num_rows(
      mysqli_query(
        $conn,
        "SELECT * FROM data_responden WHERE status_responden!='belum' "
      )
    );
    $tot_instansi = mysqli_num_rows(
      mysqli_query($conn, 'SELECT * FROM data_instansi')
    );
    $tot_pertanyaan = mysqli_num_rows(
      mysqli_query($conn, 'SELECT * FROM data_pertanyaan')
    );
    ?>

    <!-- Bagian Statistik -->
    <div id="Statistik" class="py-12 bg-gray-100">
      <div class="container mx-auto px-4">
        <!-- Section Heading -->
        <div class="text-center mb-10">
          <h4 class="text-3xl font-bold text-gray-800">Statistik <em class="text-blue-500">Pelayanan</em></h4>
          <img src="assetss/images/heading-line-dec.png" alt="" class="mx-auto my-4">
          <p class="text-gray-600 text-lg">Ini Merupakan Statistik Kantor Mal Pelayanan Publik</p>
        </div>

        <!-- Card Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Total Pertanyaan -->
          <div class="bg-blue-500 text-white rounded-lg shadow-lg p-6 flex flex-col items-center">
            <img src="img/1.png" alt="Avatar" class="w-12 h-12 mb-4 rounded-full border-2 border-white">
            <h1 class="text-5xl font-bold"><?= $tot_pertanyaan ?></h1>
            <h4 class="text-lg mt-2">Total Pertanyaan</h4>
          </div>

          <!-- Total Responden -->
          <div class="bg-green-500 text-white rounded-lg shadow-lg p-6 flex flex-col items-center">
            <img src="img/2.png" alt="Avatar" class="w-12 h-12 mb-4 rounded-full border-2 border-white">
            <h1 class="text-5xl font-bold"><?= $tot_responden ?></h1>
            <h4 class="text-lg mt-2">Total Responden</h4>
          </div>

          <!-- Total Instansi -->
          <div class="bg-yellow-500 text-white rounded-lg shadow-lg p-6 flex flex-col items-center">
            <img src="img/3.png" alt="Avatar" class="w-12 h-12 mb-4 rounded-full border-2 border-white">
            <h1 class="text-5xl font-bold"><?= $tot_instansi ?></h1>
            <h4 class="text-lg mt-2">Total Instansi</h4>
          </div>
        </div>
      </div>
    </div>
    <!-- END STATISTIK PELAYANAN -->

    <!-- GRAFIK KEPUSAN -->
    <!-- Tambahkan Tailwind CSS CDN di dalam tag <head> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
    // Query untuk menghitung jumlah berdasarkan point jawaban
    $tot_sangatpuas = mysqli_num_rows(
      mysqli_query(
        $conn,
        "SELECT * FROM data_jawaban WHERE point_jawaban='4' AND status='selesai'"
      )
    );
    $tot_puas = mysqli_num_rows(
      mysqli_query(
        $conn,
        "SELECT * FROM data_jawaban WHERE point_jawaban='3' AND status='selesai'"
      )
    );
    $tot_tidakpuas = mysqli_num_rows(
      mysqli_query(
        $conn,
        "SELECT * FROM data_jawaban WHERE point_jawaban='2' AND status='selesai'"
      )
    );
    $tot_kecewa = mysqli_num_rows(
      mysqli_query(
        $conn,
        "SELECT * FROM data_jawaban WHERE point_jawaban='1' AND status='selesai'"
      )
    );
    ?>

    <!-- Bagian Konten -->
    <div id="clients" class="py-12 bg-gray-100">
      <div class="container mx-auto px-4">
        <!-- Section Heading -->
        <div class="text-center mb-10">
          <h4 class="text-3xl font-bold text-gray-800">Persentase <em class="text-blue-500">Kepuasan</em></h4>
          <img src="assetss/images/heading-line-dec.png" alt="" class="mx-auto my-4">
          <p class="text-gray-600 text-lg">Ini Merupakan Rangkuman Persentase Berdasarkan Jawaban Responden</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-lg shadow-lg p-4"> <!-- dari p-6 atau p-1 ke p-4 -->
          <div class="flex flex-wrap items-center">
            <!-- Kriteria Penilaian -->
            <div class="w-full md:w-1/2 mb-2 md:mb-1"> <!-- dari mb-5 ke mb-2 -->
              <h2 class="text-xl font-semibold text-blue-600 mb-2">Kriteria Penilaian</h2> <!-- dari text-2xl ke text-xl -->
              <ol class="list-decimal pl-4 text-gray-700 space-y-1"> <!-- dari pl-5 ke pl-4, space-y-2 ke space-y-1 -->
                <li>Sangat Sesuai, dengan point <strong class="text-blue-600"><?= $tot_sangatpuas ?></strong></li>
                <li>Sesuai, dengan point <strong class="text-blue-600"><?= $tot_puas ?></strong></li>
                <li>Kurang Sesuai, dengan point <strong class="text-blue-600"><?= $tot_tidakpuas ?></strong></li>
                <li>Tidak Sesuai, dengan point <strong class="text-blue-600"><?= $tot_kecewa ?></strong></li>
              </ol>
            </div>

            <!-- Grafik Pie -->
            <div class="w-full md:w-1/2 flex justify-center">
              <div style="width: 400px; height: 400px;"> <!-- dari 600x500 ke 350x300 -->
                <canvas id="piechart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Script Chart.js untuk Grafik Pie -->
    <!-- Pastikan sudah ada elemen canvas untuk chart -->
<canvas id="piechart"></canvas>

<!-- Tambahkan Chart.js Datalabels Plugin -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
const ctx = document.getElementById('piechart').getContext('2d');

// Hitung total untuk persentase (pastikan tidak terjadi pembagian dengan nol)
const total = <?= ($tot_sangatpuas + $tot_puas + $tot_tidakpuas + $tot_kecewa) ?: 1 ?>;

// Hitung persentase
const persenSangatPuas = ((<?= $tot_sangatpuas ?> / total) * 100).toFixed(1);
const persenPuas = ((<?= $tot_puas ?> / total) * 100).toFixed(1);
const persenTidakPuas = ((<?= $tot_tidakpuas ?> / total) * 100).toFixed(1);
const persenKecewa = ((<?= $tot_kecewa ?> / total) * 100).toFixed(1);

const data = {
  labels: ["Sangat Puas", "Puas", "Tidak Puas", "Kecewa"],
  datasets: [{
    data: [<?= $tot_sangatpuas ?>, <?= $tot_puas ?>, <?= $tot_tidakpuas ?>, <?= $tot_kecewa ?>],
    backgroundColor: ['#4CAF50', '#2196F3', '#FFC107', '#F44336'],
    hoverOffset: 10
  }]
};

const config = {
  type: 'pie',
  data: data,
  options: {
    responsive: true,
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 20,
        right: 20
      }
    },
    plugins: {
      legend: {
        position: 'right',
        align: 'center',
        labels: {
          padding: 20,
          font: {
            size: 14,
            weight: 'bold'
          }
        }
      },
      tooltip: {
        callbacks: {
          label: function(context) {
            const value = context.raw;
            const percentage = ((value / total) * 100).toFixed(1);
            return `Total: ${value} (${percentage}%)`;
          }
        }
      },
      datalabels: {
        color: '#fff', // Warna teks dalam chart
        anchor: 'center', // Posisi teks
        align: 'center',
        font: {
          size: 14,
          weight: 'bold'
        },
        formatter: (value, ctx) => {
          let percentage = ((value / total) * 100).toFixed(1);
          return `${percentage}%`; // Menampilkan persentase
        }
      }
    }
  },
  plugins: [ChartDataLabels] // Aktifkan plugin datalabels
};

new Chart(ctx, config);
</script>

    <!-- END GRAFIK KEPUSAN -->

    <!-- GRAFIK INSTANSI -->
    <!-- Tambahkan Tailwind CSS CDN di dalam tag <head> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <div id="clients" class="py-12">
      <div class="container mx-auto px-0">
        <div class="row">
          <!-- Judul -->
          <div class="col-lg-12 text-center mb-7 ">
            <div class="text-center mb-6">
              <h4 class="text-3xl font-bold text-gray-800">
                Grafik <em class="text-blue-500">Instansi</em>
              </h4>
              <img src="assetss/images/heading-line-dec.png" alt="" class="mx-auto my-4">
              <p class="text-gray-600 text-lg">Merupakan Grafik Tingkat Kepuasan Setiap Instansi</p>
            </div>
          </div>
          <!-- Grafik Bar -->
          <div class="col-lg-12">
            <div class="bg-drak rounded-lg shadow-md p-6">
              <canvas id="bar" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Query PHP untuk Data Grafik -->
    <?php
    //PHP PENDIDIKAN
    $tot_sd = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pendidikan='SD Kebawah' and status_responden!='belum'"
      )
    );
    $tot_smp = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pendidikan='SMP' and status_responden!='belum'"
      )
    );
    $tot_sma = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pendidikan='SMA' and status_responden!='belum'"
      )
    );
    $tot_d3d4 = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pendidikan='D3/D4' and status_responden!='belum'"
      )
    );
    $tot_s1 = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pendidikan='S1' and status_responden!='belum'"
      )
    );
    $tot_s2 = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pendidikan='S2 Keatas' and status_responden!='belum'"
      )
    );
//END PENDIDIKAN
    
//PHP PEKERJAAN
    $tot_pns = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pekerjaan='PNS/TNI/POLRI' and status_responden!='belum'"
      )
    );
    $tot_pegawai = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pekerjaan='Pegawai Swasta' and status_responden!='belum'"
      )
    );
    $tot_swasta = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pekerjaan='Wiraswasta/Wirausaha' and status_responden!='belum'"
      )
    );
    $tot_pelajar = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pekerjaan='Pelajar/Mahasiswa' and status_responden!='belum'"
      )
    );
    $tot_irt = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pekerjaan='Ibu Rumah Tangga' and status_responden!='belum'"
      )
    );
    $tot_belum_bekerja = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pekerjaan='Belum Bekerja/Tidak Bekerja' and status_responden!='belum'"
      )
    );
    $tot_pensiunan = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pekerjaan='Pensiunan' and status_responden!='belum'"
      )
    );
    $tot_lainnya = mysqli_num_rows(
      mysqli_query(
        $conn,
        "select * from data_responden where pekerjaan='Lainnya' and status_responden!='belum'"
      )
    );
    ?>

    <!-- Bagian Grafik Card -->
    <div id="pricing" class="pricing-tables py-8">
      <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Grafik Pendidikan -->
          <div class="card bg-white rounded-lg shadow-lg hover:shadow-xl p-4">
            <h5 class="text-lg font-bold text-center text-gray-700 mb-4">Grafik Pendidikan</h5>
            <div id="pendidikan" class="w-full h-96">
              <!-- PHP untuk Data Grafik Pendidikan -->
              <?php echo "
            <script>
              const pendidikanData = {
                labels: ['SD Kebawah', 'SMP', 'SMA', 'D3/D4', 'S1', 'S2 Keatas'],
                datasets: [{
                  label: 'Jumlah Responden',
                  data: [$tot_sd, $tot_smp, $tot_sma, $tot_d3d4, $tot_s1, $tot_s2],
                  backgroundColor: ['#60a5fa', '#34d399', '#fbbf24', '#f87171', '#a78bfa' '#a43593'],
                }]
              };
              new Chart(document.getElementById('pendidikan'), { type: 'bar', data: pendidikanData });
            </script>
          "; ?>
            </div>
          </div>

          <!-- Grafik Pekerjaan -->
          <div class="card bg-white rounded-lg shadow-lg hover:shadow-xl p-4">
            <h5 class="text-lg font-bold text-center text-gray-700 mb-4">Grafik Pekerjaan</h5>
            <div id="pekerjaan" class="w-full h-96">
              <!-- PHP untuk Data Grafik Pekerjaan -->
              <?php echo "
            <script>
              const pekerjaanData = {
                labels: ['PNS/TNI/POLRI', 'Pegawai Swasta', 'Wiraswasta/Wirausaha', 'Pelajar/Mahasiswa', 'Ibu Rumah Tangga', 'Belum Bekerja/Tidak Bekerja','Pensiunan', 'Lainnya'],
                datasets: [{
                  label: 'Jumlah Responden',
                  data: [$tot_pns, $tot_pegawai, $tot_swasta, $tot_pelajar, $tot_irt, $tot_belum_bekerja, $tot_pensiunan, $tot_lainnya],
                  backgroundColor: ['#f87171', '#60a5fa', '#34d399', '#fbbf24', '#a78bfa', '#249384', '#ad9834', '#930245'],
                }]
              };
              new Chart(document.getElementById('pekerjaan'), { type: 'bar', data: pekerjaanData });
            </script>
          "; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- END GRAFIK INSTANSI -->

    <!-- TABEL DETAIL JAWABAN -->
    <div id="pricing" class="pricing-tables d-flex justify-content-center">
      <div class="card col-md-10" style="margin-top: 15px;">
        <div class="card-body">
          <h3 class="text-xl font-bold text-bold">Detil Jawaban Responden Per Pertanyaan</h3>
          <div class="table-responsive" style="margin-top: 10px;">
            <table class="w-full border border-gray-300 text-sm">
              <thead class="bg-blue-500 text-white">
                <tr>
                  <th class="text-center py-2 border border-gray-300" rowspan="2">No</th>
                  <th class="text-center py-2 border border-gray-300" width="50%" rowspan="2">Pertanyaan</th>
                  <th class="text-center py-2 border border-gray-300" colspan="4">Jumlah Responden Yang Menjawab (orang)</th>
                  <th class="text-center py-2 border border-gray-300" rowspan="2">Rata-Rata</th>
                  <!-- <th class="text-center" rowspan="2">Kategori Mutu</th> -->
                </tr>
                <tr>
                  <th class="text-center py-2 border border-gray-300">Sangat Sesuai</th>
                  <th class="text-center py-2 border border-gray-300">Sesuai</th>
                  <th class="text-center py-2 border border-gray-300">Kurang Sesuai</th>
                  <th class="text-center py-2 border border-gray-300">Tidak Sesuai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = mysqli_query($conn, 'select * from data_pertanyaan');
                $x = 1;
                while ($dt = mysqli_fetch_array($query)) {
                  $totx_sangatpuas = mysqli_num_rows(
                    mysqli_query(
                      $conn,
                      "select * from data_jawaban where point_jawaban='4' and status='selesai' and id_pertanyaan='$dt[id_pertanyaan]'"
                    )
                  );
                  $totx_puas = mysqli_num_rows(
                    mysqli_query(
                      $conn,
                      "select * from data_jawaban where point_jawaban='3' and status='selesai' and id_pertanyaan='$dt[id_pertanyaan]'"
                    )
                  );
                  $totx_tidakpuas = mysqli_num_rows(
                    mysqli_query(
                      $conn,
                      "select * from data_jawaban where point_jawaban='2' and status='selesai' and id_pertanyaan='$dt[id_pertanyaan]'"
                    )
                  );
                  $totx_kecewa = mysqli_num_rows(
                    mysqli_query(
                      $conn,
                      "select * from data_jawaban where point_jawaban='1' and status='selesai' and id_pertanyaan='$dt[id_pertanyaan]'"
                    )
                  );

                  $rata =
                    ($totx_sangatpuas * 4 +
                      $totx_puas * 3 +
                      $totx_tidakpuas * 2 +
                      $totx_kecewa * 1) /
                    4;
                  if ($rata == '4') {
                    $huruf = 'A';
                  } elseif ($rata == '3') {
                    $huruf = 'B';
                  } elseif ($rata == '2') {
                    $huruf = 'C';
                  } elseif ($rata == '1') {
                    $huruf = 'D';
                  } else {
                    $huruf = 'E';
                  }

                  echo "
                <tr class='odd:bg-gray-100 hover:bg-blue-100'>
                  <td class='text-center py-2 border border-gray-300 font-semibold'>P$x</td>
                  <td class='text-left py-2 border border-gray-300'>$dt[pertanyaan]</td>
                  <td class='text-center py-2 border border-gray-300 font-bold'>$totx_sangatpuas</td>
                  <td class='text-center py-2 border border-gray-300 font-bold'>$totx_puas</td>
                  <td class='text-center py-2 border border-gray-300 font-bold'>$totx_tidakpuas</td>
                  <td class='text-center py-2 border border-gray-300 font-bold'>$totx_kecewa</td>
                  <td class='text-center py-2 border border-gray-300 font-semibold'>$rata</td>
                </tr>
              ";
                  $x++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- END TABEL DETAIL JAWABAN -->

    <!-- FOOTER -->
    <footer id="Kontak" class="w-full" style="padding: 20px 0 0 0; margin: 0; border: 0; background: none;">
      <div class="container mx-auto px-4">
        <div class="text-center mb-8">
          <h4 class="text-3xl font-bold text-gray-800">
            Contact <em class="text-blue-500">Us</em>
          </h4>
          <img src="assetss/images/heading-line-dec.png" alt="" class="mx-auto my-4">
        </div>
        <!-- Google Map -->
        <div class="rounded-lg overflow-hidden shadow-lg mb-8">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1987.8025202298338!2d119.548576449205!3d-4.837681092567455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbe4f69cc82be2d%3A0xd029091681dc35ba!2sMal%20Pelayanan%20Publik%20(MPP)%20Pangkep!5e0!3m2!1sid!2sid!4v1734108371708!5m2!1sid!2sid"
            width="100%"
            height="300"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
        <!-- Info Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
          <!-- Jam Operasional -->
          <div class="bg-white rounded-2xl p-10 text-center flex flex-col items-center shadow-lg border border-blue-100">
            <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mb-6 shadow-lg">
              <i class="fa fa-clock text-4xl text-white"></i>
            </div>
            <h5 class="text-2xl font-extrabold text-blue-700 mb-2 tracking-wide">Jam Operasional</h5>
            <ul class="space-y-2 text-gray-700 text-lg font-medium">
              <li>Senin - Kamis: <span class="font-bold text-blue-600">07:30 - 15:30</span></li>
              <li>Jumat: <span class="font-bold text-blue-600">07:30 - 16:00</span></li>
              <li>Sabtu - Minggu: <span class="font-bold text-red-500">Tutup</span></li>
            </ul>
          </div>
          <!-- Social Media & Contact -->
          <div class="bg-white rounded-2xl p-10 text-center flex flex-col items-center shadow-lg border border-blue-100">
            <h5 class="text-2xl font-extrabold text-blue-700 mb-6 tracking-wide">Contact & Social Media</h5>
            <div class="flex justify-center items-center space-x-8 mb-8">
              <a href="https://www.facebook.com/profile.php?id=100088593757162" target="_blank" class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 shadow-lg transition duration-300">
                <i class="fab fa-facebook-f text-3xl text-white"></i>
              </a>
              <a href="https://www.instagram.com/mpp_pangkep/" target="_blank" class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center hover:opacity-90 shadow-lg transition duration-300">
                <i class="fab fa-instagram text-3xl text-white"></i>
              </a>
              <a href="mailto:ptsp.kab.pangkajene@gmail.com" class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center hover:bg-red-600 shadow-lg transition duration-300">
                <i class="fa fa-envelope text-3xl text-white"></i>
              </a>
            </div>
            <div class="mt-4">
              <a href="http://api.whatsapp.com/send?phone=6282193298136" target="_blank" class="inline-flex items-center justify-center px-10 py-4 bg-green-500 text-white font-bold text-lg rounded-xl shadow-md hover:bg-green-600 hover:shadow-lg transition duration-300">
                <i class="fab fa-whatsapp mr-3 text-2xl"></i>
                Contact via WhatsApp
              </a>
            </div>
          </div>
        </div>
        <!-- Copyright -->
        <div class="text-center mt-8 mb-0 pb-4">
          <h5 class="text-base font-bold text-gray-700">Copyright © 2024 Mal Pelayanan Publik Pangkep</h5>
        </div>
      </div>
    </footer>
    <!-- END FOOTER -->

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assetss/js/owl-carousel.js"></script>
    <script src="assetss/js/animation.js"></script>
    <script src="assetss/js/imagesloaded.js"></script>
    <script src="assetss/js/popup.js"></script>
    <script src="assetss/js/custom.js"></script>
    <!--tambahan-->

    <!-- Add SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      function submitForm() {
        var nowa = document.getElementById("nowa").value;

        if (nowa === "") {
          // Show SweetAlert warning
          Swal.fire({
            title: 'Peringatan!',
            text: 'Harap Masukkan No. Whatsapp Terlebih Dahulu.',
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500,
            showClass: {
              popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
            }
          });
          return false;
        }

        // Validate phone number format
        if (nowa) {
          // Remove any spaces, dashes, or other characters
          nowa = nowa.replace(/[- .]/g, '');

          // Check if number starts with +62 or 0
          if (!/^(\+62|62|0)[8][1-9][0-9]{8,11}$/.test(nowa)) {
            Swal.fire({
              title: 'Format Nomor Salah!',
              html: `
              <div class="text-left">
                Format yang benar: 081234567890<br>
              </div>
              `,
              icon: 'error',
              showConfirmButton: false,
              timer: 2000,
              background: '#fff',
              customClass: {
                popup: 'swal-wide',
                title: 'text-danger',
                htmlContainer: 'text-left'
              },
              showClass: {
                popup: 'animate__animated animate__fadeIn'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOut'
              }
            });
            return false;
          }

          // Convert to standardized format (+62)
          if (nowa.startsWith('0')) {
            nowa = '+62' + nowa.slice(1);
          } else if (nowa.startsWith('62')) {
            if (!/^(\+62|62|0)[8][1-9][0-9]{8,11}$/.test(nowa)) {
              Swal.fire({
                title: 'Format Nomor Salah!',
                html: `
                <div class="text-white">
                  Format yang benar: 081234567890<br>
                </div>
              `,
                icon: 'error',
                background: '#white',
              });
              return false;
            }
            nowa = '+' + nowa;
          }
        }

        document.getElementById('form1').submit();
      }


      // Only allow numbers in phone input 
      function validatePhoneNumber() {
        var nowaInput = document.getElementById("nowa");
        nowaInput.value = nowaInput.value.replace(/[^0-9]/g, '');
      }

      // Enable/disable submit button
      function enableSubmit() {
        var nowa = document.getElementById("nowa").value;
        var submitButton = document.getElementById("submitButton");
        submitButton.disabled = nowa === "";
      }

      // Initialize on page load
      document.addEventListener('DOMContentLoaded', function() {
        enableSubmit();
      });
    </script>

    <!-- Presentasi Kepuasan -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- 1 -->
    <script type="text/javascript">
      google.charts.load("current", {
        packages: ["corechart"]
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var sp = <?= $tot_sangatpuas ?>;
        var p = <?= $tot_puas ?>;
        var tp = <?= $tot_tidakpuas ?>;
        var k = <?= $tot_kecewa ?>;

        var data = google.visualization.arrayToDataTable([
          ["Task", "Hours per Day"],
          ["Sangat Sesuai 4", sp],
          ["Sesuai 3", p],
          ["Kurang Sesuai 2", tp],
          ["Tidak Sesuai 1", k],
        ]);

        var chart = new google.visualization.PieChart(
          document.getElementById("piechart")
        );

        chart.draw(data);
      }
    </script>
    <?php
    $label_instansi = '';
    $sangat_setuju = '';
    $setuju = '';
    $kurang_setuju = '';
    $tidak_setuju = '';

    $query = mysqli_query($conn, 'select * from data_instansi');
    while ($data = mysqli_fetch_array($query)) {
      $label_instansi .= '"' . $data['nama_instansi'] . '",';
      $id_instansi = $data['id_instansi'];

      $query2 = mysqli_query(
        $conn,
        "SELECT * FROM data_responden,data_instansi,data_jawaban where data_instansi.id_instansi='$id_instansi' and data_instansi.id_instansi=data_responden.id_instansi and data_responden.id_responden=data_jawaban.id_responden and data_jawaban.point_jawaban='4';"
      );
      $jum2 = mysqli_num_rows($query2);
      $sangat_setuju .= '' . $jum2 . ',';

      $query3 = mysqli_query(
        $conn,
        "SELECT * FROM data_responden,data_instansi,data_jawaban where data_instansi.id_instansi='$id_instansi' and data_instansi.id_instansi=data_responden.id_instansi and data_responden.id_responden=data_jawaban.id_responden and data_jawaban.point_jawaban='3';"
      );
      $jum3 = mysqli_num_rows($query3);
      $setuju .= '' . $jum3 . ',';

      $query4 = mysqli_query(
        $conn,
        "SELECT * FROM data_responden,data_instansi,data_jawaban where data_instansi.id_instansi='$id_instansi' and data_instansi.id_instansi=data_responden.id_instansi and data_responden.id_responden=data_jawaban.id_responden and data_jawaban.point_jawaban='2';"
      );
      $jum4 = mysqli_num_rows($query4);
      $kurang_setuju .= '' . $jum4 . ',';

      $query5 = mysqli_query(
        $conn,
        "SELECT * FROM data_responden,data_instansi,data_jawaban where data_instansi.id_instansi='$id_instansi' and data_instansi.id_instansi=data_responden.id_instansi and data_responden.id_responden=data_jawaban.id_responden and data_jawaban.point_jawaban='1';"
      );
      $jum5 = mysqli_num_rows($query5);
      $tidak_setuju .= '' . $jum5 . ',';
    }
    ?>

    <!--  -->
    <canvas id="bar"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
    var ctx2 = document.getElementById("bar").getContext("2d");

    var myChart = new Chart(ctx2, {
        type: "bar",
        data: {
            labels: [<?= $label_instansi ?>],
            datasets: [
                {
                    label: "Sangat Sesuai (4)",
                    data: [<?= $sangat_setuju ?>],
                    backgroundColor: "#252bbe",
                    borderColor: "#367de4",
                    borderWidth: 1,
                    borderRadius: 6,
                    barThickness: 20,
                    maxBarThickness: 25,
                },
                {
                    label: "Sesuai (3)", 
                    data: [<?= $setuju ?>],
                    backgroundColor: "#199819",
                    borderColor: "#dbe8fa",
                    borderWidth: 1,
                    borderRadius: 6,
                    barThickness: 20,
                    maxBarThickness: 25,
                },
                {
                    label: "Kurang Sesuai (2)",
                    data: [<?= $kurang_setuju ?>],
                    backgroundColor: "#F8e318",
                    borderColor: "#dbe8fa", 
                    borderWidth: 1,
                    borderRadius: 6,
                    barThickness: 20,
                    maxBarThickness: 25,
                },
                {
                    label: "Tidak Sesuai (1)",
                    data: [<?= $tidak_setuju ?>],
                    backgroundColor: "#B21a02",
                    borderColor: "#dbe8fa",
                    borderWidth: 1,
                    borderRadius: 6,
                    barThickness: 20,
                    maxBarThickness: 25,
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            layout: {
                padding: {
                    top: 20,
                    right: 25,
                    bottom: 20,
                    left: 25
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: "Kriteria Penilaian",
                    font: {
                        size: 18,
                        weight: "bold",
                        family: "'Roboto', sans-serif"
                    },
                    padding: {
                        top: 10,
                        bottom: 30
                    },
                    color: '#333'
                },
                legend: {
                    display: true,
                    position: "top",
                    align: "center",
                    labels: {
                        boxWidth: 15,
                        padding: 20,
                        font: {
                            size: 13,
                            family: "'Roboto', sans-serif"
                        },
                        usePointStyle: true,
                        pointStyle: 'circle'
                    },
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#333',
                    titleFont: {
                        size: 13,
                        weight: 'bold'
                    },
                    bodyColor: '#666',
                    bodyFont: {
                        size: 12
                    },
                    padding: 12,
                    borderColor: '#ddd',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            let value = context.raw || 0;
                            let total = 0;
                            
                            context.chart.data.datasets.forEach((dataset) => {
                                total += dataset.data[context.dataIndex] || 0;
                            });
                            
                            let percentage = ((value / total) * 100).toFixed(1);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                },
                datalabels: {
                    anchor: "end",
                    align: "top",
                    offset: 4,
                    color: "#333",
                    font: {
                        weight: "bold",
                        size: 11,
                        family: "'Roboto', sans-serif"
                    },
                    formatter: (value) => value > 0 ? value : ''
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Jumlah Penilaian",
                        font: {
                            size: 13,
                            weight: 'bold'
                        },
                        padding: {bottom: 10}
                    },
                    ticks: {
                        font: {
                            size: 12
                        },
                        callback: function(value) {
                            return Number.isInteger(value) ? value : '';
                        }
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 12
                        },
                        color: "#666",
                    },
                    grid: {
                        display: false,
                    },
                },
            },
        },
        plugins: [ChartDataLabels]
    });
    </script>

    <script type="text/javascript">
      google.charts.load("current", {
        packages: ["corechart"]
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var sd = <?= $tot_sd ?>;
        var smp = <?= $tot_smp ?>;
        var sma = <?= $tot_sma ?>;
        var d3d4 = <?= $tot_d3d4 ?>;
        var s1 = <?= $tot_s1 ?>;
        var s2 = <?= $tot_s2 ?>;

        var data = google.visualization.arrayToDataTable([
          ["Pendidikan", "Jumlah"],
          ["SD Kebawah", sd],
          ["SMP", smp],
          ["SMA", sma],
          ["D3/D4", d3d4],
          ["S1", s1],
          ["S2 Keatas", s2]
        ]);

        var options = {
          title: 'RESPONDEN BERDASARKAN PENDIDIKAN',
          width: '100%',
          height: 400,
          backgroundColor: 'transparent',
          is3D: true,
          colors: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#a43593'],
          legend: { position: 'right' }
        };

        var chart = new google.visualization.PieChart(
          document.getElementById("pendidikan")
        );

        chart.draw(data, options);
      }
    </script>
    <!-- /2 -->
    <!-- 3 -->
    <script type="text/javascript">
      google.charts.load("current", {
        packages: ["corechart"]
      });
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var pns = <?= $tot_pns ?>;
        var pegawai = <?= $tot_pegawai ?>;
        var swasta = <?= $tot_swasta ?>;
        var pelajar = <?= $tot_pelajar ?>;
        var irt = <?= $tot_irt ?>;
        var belum_kerja = <?= $tot_belum_bekerja ?>;
        var pensiunan = <?= $tot_pensiunan ?>;
        var lainnya = <?= $tot_lainnya ?>;

        var data = google.visualization.arrayToDataTable([
          ["Pekerjaan", "Jumlah"],
          ["PNS/TNI/POLRI", pns],
          ["Pegawai Swasta", pegawai], 
          ["Wiraswasta", swasta],
          ["Pelajar/mahasiswa", pelajar],
          ["Ibu Rumah Tangga", irt],
          ["Belum Bekerja/Tidak Bekerja", belum_kerja],
          ["Pensiunan", pensiunan],
          ["Lainnya", lainnya]
        ]);

        var options = {
          title: 'RESPONDEN BERDASARKAN PEKERJAAN',
          width: '100%',
          height: 400,
          backgroundColor: 'transparent',
          is3D: true,
          colors: [
            '#4e73df', // PNS
            '#1cc88a', // Pegawai Swasta
            '#36b9cc', // Wiraswasta
            '#f6c23e', // Pelajar
            '#e74a3b', // IRT
            '#858796', // Belum Bekerja
            '#5a5c69', // Pensiunan
            '#4e4f52'  // Lainnya
          ],
          legend: { position: 'right' }
        };

        var chart = new google.visualization.PieChart(
          document.getElementById("pekerjaan")
        );

        chart.draw(data, options);
      }
    </script>
    <!-- /3 -->
  </div>
</footer>
</body>

</html>