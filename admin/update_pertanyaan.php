<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pertanyaan = $_POST["id_pertanyaan"];
    $kategori = trim($_POST["kategori"]);
    $pertanyaan = trim($_POST["pertanyaan"]);
    $opsi1 = trim($_POST["opsi1"]);
    $opsi2 = trim($_POST["opsi2"]);
    $opsi3 = trim($_POST["opsi3"]);
    $opsi4 = trim($_POST["opsi4"]);

    // Cek apakah data berubah dari yang sebelumnya
    $query_check = "SELECT * FROM data_pertanyaan WHERE id_pertanyaan = '$id_pertanyaan'";
    $result_check = mysqli_query($conn, $query_check);
    $data_lama = mysqli_fetch_assoc($result_check);

    if (
        $data_lama["kategori"] == $kategori &&
        $data_lama["pertanyaan"] == $pertanyaan &&
        $data_lama["opsi1"] == $opsi1 &&
        $data_lama["opsi2"] == $opsi2 &&
        $data_lama["opsi3"] == $opsi3 &&
        $data_lama["opsi4"] == $opsi4
    ) {
        echo "<script>
            alert('Tidak Ada Perubahan Pada Data. Silakan Ubah Data Sebelum Menyimpan!');
            window.location.href = 'pertanyaan.php';
        </script>";
        exit();
    }

    // Update data jika ada perubahan
    $query_update = "UPDATE data_pertanyaan SET 
                    kategori = '$kategori', 
                    pertanyaan = '$pertanyaan', 
                    opsi1 = '$opsi1', 
                    opsi2 = '$opsi2', 
                    opsi3 = '$opsi3', 
                    opsi4 = '$opsi4'
                    WHERE id_pertanyaan = '$id_pertanyaan'";

    if (mysqli_query($conn, $query_update)) {
        echo "<script>
            alert('Data Brhasil Diperbarui!');
            window.location.href = 'pertanyaan.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal Memperbarui Data. Coba Lagi!');
            window.history.back();
        </script>";
    }
}
?>
