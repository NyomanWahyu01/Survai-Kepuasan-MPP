<?php
session_start();
include("koneksi.php");

if (isset($_GET['id_instansi'])) {
    $id_instansi = $_GET['id_instansi'];

    // Ambil nama instansi sebelum dihapus
    $query = mysqli_query($conn, "SELECT nama_instansi FROM data_instansi WHERE id_instansi='$id_instansi'");
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $nama_instansi = $data['nama_instansi'];
        
        // Hapus data instansi
        $hapus = mysqli_query($conn, "DELETE FROM data_instansi WHERE id_instansi='$id_instansi'");

        if ($hapus) {
?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Hapus Instansi</title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

            </head>
            <body>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data Instansi "<?php echo $nama_instansi; ?>" Berhasil Dihapus',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        }).then(() => {
                            window.location.href = 'index.php?page=instansi.php';
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
                <title>Hapus Instansi</title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

            </head>
            <body>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Gagal Menghapus Data Instansi',
                            icon: 'error',
                            showConfirmButton: true,
                            confirmButtonText: 'Kembali',
                            confirmButtonColor: '#e74c3c',
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.href = 'index.php?page=instansi.php';
                        });
                    });
                </script>
            </body>
            </html>
<?php
        }
    } else {
?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Hapus Instansi</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

            </head>
        <body>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Data Instansi Tidak Ditemukan',
                        icon: 'error',
                        showConfirmButton: true,
                        confirmButtonText: 'Kembali',
                        confirmButtonColor: '#e74c3c',
                        allowOutsideClick: false
                    }).then(() => {
                        window.location.href = 'index.php?page=instansi.php';
                    });
                });
            </script>
        </body>
        </html>
<?php
    }
}
?>