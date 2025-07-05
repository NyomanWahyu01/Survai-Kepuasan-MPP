<?php
session_start();

if (isset($_POST['login'])) {
    include('koneksi.php');

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validasi input kosong
    if (empty($username) || empty($password)) {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <style>
                .swal2-popup {
                    background: linear-gradient(145deg, #ffffff, #f8f9fa);
                    border-radius: 20px;
                    padding: 2rem;
                }
                .swal2-title {
                    color: #f39c12 !important;
                    font-size: 24px !important;
                    font-weight: 600 !important;
                }
                .swal2-html-container {
                    color: #2c3e50 !important;
                    font-size: 16px !important;
                }
                .swal2-icon {
                    border-color: #f39c12 !important;
                    color: #f39c12 !important;
                }
            </style>
            <script>
                Swal.fire({
                    title: 'Data Tidak Lengkap',
                    text: 'Username dan Password harus diisi!',
                    icon: 'warning',
                    showConfirmButton: false, // Menghilangkan tombol OK
                    timer: 2000, // Menutup otomatis dalam 2 detik
                    allowOutsideClick: false,
                    customClass: {
                        popup: 'animated fadeInDown faster'
                    }
                }).then(() => {
                    window.location.href = 'login.php';
                });
            </script>


        </head>
        </html>";
        exit();
    }

    $query = mysqli_query($conn, "SELECT * FROM data_admin WHERE username_admin='$username' AND password_admin='$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username_admin'];
        $_SESSION['id_admin'] = $data['id_admin'];

        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <style>
                .swal2-popup {
                    background: linear-gradient(145deg, #ffffff, #f8f9fa);
                    border-radius: 20px;
                    padding: 2rem;
                }
                .swal2-title {
                    color: #2ecc71 !important;
                    font-size: 24px !important;
                    font-weight: 600 !important;
                }
                .swal2-html-container {
                    color: #2c3e50 !important;
                    font-size: 16px !important;
                }
                .swal2-icon.swal2-success {
                    border-color: #2ecc71;
                    color: #2ecc71;
                }
            </style>
            <script>
                Swal.fire({
                    title: 'Login Berhasil',
                    text: 'Selamat datang di Dashboard Admin',
                    icon: 'success',
                    showConfirmButton: false, // Menghilangkan tombol
                    timer: 1500, // Menutup otomatis dalam 1.5 detik
                    allowOutsideClick: false,
                    didClose: () => {
                        window.location.href = 'index.php';
                    }
                });
            </script>

        </head>
        </html>";
        exit();
    } else {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <style>
                .swal2-popup {
                    background: linear-gradient(145deg, #ffffff, #f8f9fa);
                    border-radius: 20px;
                    padding: 2rem;
                }
                .swal2-title {
                    color: #e74c3c !important;
                    font-size: 24px !important;
                    font-weight: 600 !important;
                }
                .swal2-html-container {
                    color: #2c3e50 !important;
                    font-size: 16px !important;
                }
                .swal2-icon.swal2-error {
                    border-color: #e74c3c;
                    color: #e74c3c;
                }
            </style>
            <script>
                Swal.fire({
                    title: 'Login Gagal',
                    text: 'Username atau Password salah!',
                    icon: 'error',
                    showConfirmButton: false, // Menghilangkan tombol
                    timer: 2000, // Menutup otomatis dalam 2 detik
                    allowOutsideClick: false
                }).then(() => {
                    window.location.href = 'login.php';
                });
            </script>

        </head>
        </html>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>ADMIN SKM</title>
    <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />


    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-8">
            <div class="text-center mb-8">
                <a href="#">
                    <img src="images/logo.png" width='100' alt="Survey Kepuasan Masayarakat" class="mx-auto">
                    <h3 class="text-lg font-bold mt-4">SURVEI KEPUASAN MASYARAKAT</h3>
                </a>
                <h4 class="text-gray-600 mt-2">Login Admin</h4>
            </div>
            <form action="" method="post" onsubmit="return validateForm()">
                <div class="mb-4">
                    <label class="block text-gray-700">Username</label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                        type="text" name="username" id="username" placeholder="Username">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                        type="password" name="password" id="password" placeholder="Password">
                </div>
                <button class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                    type="submit" name="login" id="login" onclick="validateForm()">
                    Sign In
                </button>
            </form>
        </div>
        <div class="text-center mt-8 text-gray-500">
            <p>Copyright © 2024 Mal Pelayanan Publik Pangkep</p>
        </div>
    </div>

    <script>
        // Fungsi untuk validasi form
        function validateForm(event) {
            event.preventDefault(); // Mencegah form submit default

            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            // Validasi input kosong
            if (username === '' || password === '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Tidak Lengkap',
                    text: 'Username dan Password harus diisi!',
                    showConfirmButton: false, // Menghilangkan tombol OK
                    timer: 2000, // Menutup otomatis dalam 2 detik

                });
                return false;
            }


            // Jika validasi berhasil, lakukan login
            loginProcess(username, password);
        }

        // Fungsi untuk proses login
        function loginProcess(username, password) {
            // Buat form data
            const formData = new FormData();
            formData.append('username', username);
            formData.append('password', password);
            formData.append('login', true);

            // Kirim request dengan fetch API
            fetch('login.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(html => {
                    // Cek jika response mengandung script SweetAlert
                    if (html.includes('Login Berhasil')) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Berhasil',
                            text: 'Selamat datang di Dashboard Admin',
                            showConfirmButton: false,
                            timer: 1500,

                        }).then(() => {
                            window.location.href = 'index.php';
                        });
                    } else if (html.includes('Login Gagal')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal',
                            text: 'Username atau Password salah!',
                            showConfirmButton: false, // Menghilangkan tombol
                            timer: 2000 // Menutup otomatis dalam 2 detik
                        });
                    }

                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan pada server',
                        confirmButtonColor: '#dc3545'
                    });
                });
        }

        // Event listener untuk form submit
        document.querySelector('form').addEventListener('submit', validateForm);

        // Event listener untuk tombol login
        document.getElementById('login').addEventListener('click', function(event) {
            validateForm(event);
        });

        // Tambahkan event listener untuk enter key pada input password
        document.getElementById('password').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                validateForm(event);
            }
        });

        // Reset form saat halaman dimuat
        window.onload = function() {
            document.querySelector('form').reset();
            document.getElementById('username').focus();
        };
    </script>

    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>

</html>