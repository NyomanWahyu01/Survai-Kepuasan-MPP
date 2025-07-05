<?php

session_start();
include("koneksi.php");

if (isset($_GET['id_pertanyaan'])) {
    $id_pertanyaan = $_GET['id_pertanyaan'];

    // Hapus data pertanyaan
    $hapus = mysqli_query($conn, "DELETE FROM data_pertanyaan WHERE id_pertanyaan='$id_pertanyaan'");

    if ($hapus) {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Hapus Pertanyaan</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

        </head>

        <body>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data pertanyaan berhasil dihapus',
                        icon: 'success',
                        showConfirmButton: false, // Menghilangkan tombol
                        timer: 1500, // Menutup otomatis dalam 1.5 detik
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    }).then(() => {
                        window.location.href = 'index.php?page=pertanyaan.php';
                    });
                });
            </script>

        </body>

        </html>
    <?php
    } else {
    ?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Hapus Pertanyaan</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

        </head>

        <body>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Gagal menghapus data pertanyaan',
                        icon: 'error',
                        showConfirmButton: true,
                        confirmButtonText: 'Kembali',
                        confirmButtonColor: '#e74c3c',
                        allowOutsideClick: false
                    }).then((result) => {
                        window.location.href = 'index.php?page=pertanyaan.php';
                    });
                });
            </script>



            <?php
            session_start();
            include("koneksi.php");

            if (isset($_GET['id_pertanyaan'])) {
                $id_pertanyaan = $_GET['id_pertanyaan'];
                $query = mysqli_query($conn, "SELECT * FROM data_pertanyaan WHERE id_pertanyaan='$id_pertanyaan'");
                $data = mysqli_fetch_assoc($query);
            }

            if (isset($_POST['update'])) {
                $id_pertanyaan = $_POST['id_pertanyaan'];
                $pertanyaan = trim($_POST['pertanyaan']);

                if (!empty($pertanyaan)) {
                    $update = mysqli_query($conn, "UPDATE data_pertanyaan SET pertanyaan='$pertanyaan' WHERE id_pertanyaan='$id_pertanyaan'");
                    if ($update) {
                        echo "<script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data pertanyaan berhasil diperbarui',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                    allowOutsideClick: false
                }).then(() => {
                    window.location.href = 'index.php?page=pertanyaan.php';
                });
            </script>";
                    } else {
                        echo "<script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gagal memperbarui data pertanyaan',
                    icon: 'error',
                    confirmButtonText: 'Kembali'
                });
            </script>";
                    }
                } else {
                    echo "<script>
            Swal.fire({
                title: 'Peringatan!',
                text: 'Pertanyaan tidak boleh kosong',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        </script>";
                }
            }
            ?>

            <!DOCTYPE html>
            <html>

            <head>
                <title>Edit Pertanyaan</title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

            </head>

            <body>
                <form method="POST" onsubmit="return validateForm()">
                    <input type="hidden" name="id_pertanyaan" value="<?php echo $data['id_pertanyaan']; ?>">
                    <label for="pertanyaan">Pertanyaan:</label>
                    <input type="text" id="pertanyaan" name="pertanyaan" value="<?php echo htmlspecialchars($data['pertanyaan']); ?>">
                    <button type="submit" name="update">Simpan</button>
                </form>

                <script>
                    function validateForm() {
                        let pertanyaan = document.getElementById('pertanyaan').value.trim();
                        if (pertanyaan === '') {
                            Swal.fire({
                                title: 'Peringatan!',
                                text: 'Pertanyaan tidak boleh kosong',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });
                            return false;
                        }
                        return true;
                    }
                </script>
            </body>

            </html>
    <?php
    }
}
    ?>