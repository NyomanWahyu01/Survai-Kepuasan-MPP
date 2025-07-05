<?php
session_start();
include("koneksi.php");

$id_pertanyaan = isset($_POST['id_pertanyaan']) ? trim($_POST['id_pertanyaan']) : "";
$kategori = isset($_POST['kategori']) ? trim($_POST['kategori']) : "";
$pertanyaan = isset($_POST['pertanyaan']) ? trim($_POST['pertanyaan']) : "";
$opsi1 = isset($_POST['opsi1']) ? trim($_POST['opsi1']) : "";
$opsi2 = isset($_POST['opsi2']) ? trim($_POST['opsi2']) : "";
$opsi3 = isset($_POST['opsi3']) ? trim($_POST['opsi3']) : "";
$opsi4 = isset($_POST['opsi4']) ? trim($_POST['opsi4']) : "";
$id_admin = isset($_SESSION['id_admin']) ? $_SESSION['id_admin'] : null;

// Cek apakah ada input yang kosong
if (empty($kategori) || empty($pertanyaan) || empty($opsi1) || empty($opsi2) || empty($opsi3) || empty($opsi4)) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
            Swal.fire({
                title: 'Data Tidak Lengkap!',
                text: 'Harap lengkapi semua data sebelum submit.',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then(() => {
                history.back();
            });
          </script>";
    exit();
}

// Mencegah SQL Injection
$kategori = mysqli_real_escape_string($conn, $kategori);
$pertanyaan = mysqli_real_escape_string($conn, $pertanyaan);
$opsi1 = mysqli_real_escape_string($conn, $opsi1);
$opsi2 = mysqli_real_escape_string($conn, $opsi2);
$opsi3 = mysqli_real_escape_string($conn, $opsi3);
$opsi4 = mysqli_real_escape_string($conn, $opsi4);

if (empty($id_pertanyaan)) {
    // Simpan data baru
    $simpan_pertanyaan = mysqli_query($conn, "INSERT INTO data_pertanyaan (kategori, pertanyaan, opsi1, opsi2, opsi3, opsi4, id_admin) 
                                              VALUES ('$kategori', '$pertanyaan', '$opsi1', '$opsi2', '$opsi3', '$opsi4', '$id_admin')");

    $pesan = $simpan_pertanyaan ? ["success", "Data pertanyaan berhasil disimpan"] : ["error", "Gagal menyimpan data pertanyaan"];
} else {
    // Update data
    $simpan_pertanyaan = mysqli_query($conn, "UPDATE data_pertanyaan SET 
                                              kategori = '$kategori', 
                                              pertanyaan = '$pertanyaan', 
                                              opsi1 = '$opsi1', 
                                              opsi2 = '$opsi2', 
                                              opsi3 = '$opsi3', 
                                              opsi4 = '$opsi4' 
                                              WHERE id_pertanyaan = '$id_pertanyaan'");

    $pesan = $simpan_pertanyaan ? ["success", "Data pertanyaan berhasil diperbarui"] : ["error", "Gagal memperbarui data pertanyaan"];
}

?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />
    
    <style>
        .swal2-popup {
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            border-radius: 20px;
            padding: 2rem;
        }

        .swal2-title {
            color: <?= $pesan[0] == "success" ? "#2ecc71" : "#e74c3c" ?> !important;
            font-size: 24px !important;
            font-weight: 600 !important;
        }

        .swal2-html-container {
            color: #2c3e50 !important;
            font-size: 16px !important;
        }

        .swal2-icon {
            border-color: <?= $pesan[0] == "success" ? "#2ecc71" : "#e74c3c" ?>;
            color: <?= $pesan[0] == "success" ? "#2ecc71" : "#e74c3c" ?>;
        }
    </style>
</head>

<body>
    <script>
        Swal.fire({
            title: "<?= $pesan[0] == 'success' ? 'Berhasil' : 'Gagal' ?>",
            text: "<?= $pesan[1] ?>",
            icon: "<?= $pesan[0] ?>",
            showConfirmButton: <?= $pesan[0] == "success" ? "false" : "true" ?>,
            timer: <?= $pesan[0] == "success" ? "1500" : "null" ?>,
            timerProgressBar: true,
            allowOutsideClick: false
        }).then(() => {
            window.location.href = "index.php?page=pertanyaan.php";
        });
    </script>
</body>

</html>