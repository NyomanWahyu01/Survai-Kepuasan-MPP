<?php
session_start();

$id_instansi = isset($_POST['id_instansi']) ? $_POST['id_instansi'] : "";
$nama_instansi = $_POST['nama_instansi'];
$id_admin = $_SESSION['id_admin'];

if ($nama_instansi == "") {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Simpan Instansi</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

    </head>

    <body>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Lengkapi data nama instansi!',
                    icon: 'warning',
                    showConfirmButton: false, // Menghapus tombol OK
                    allowOutsideClick: false,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }).then(() => {
                    history.back();
                });
            });
        </script>

    </body>

    </html>
    <?php
} else {
    include("koneksi.php");

    if (empty($id_instansi)) {
        $simpan_instansi = mysqli_query($conn, "INSERT INTO data_instansi (nama_instansi, id_admin) VALUES ('$nama_instansi', '$id_admin')");

        if ($simpan_instansi) {
    ?>
            <!DOCTYPE html>
            <>

                <head>
                    <title>Simpan Instansi</title>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

                </head>

                <>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data instansi "<?php echo addslashes($nama_instansi); ?>" berhasil disimpan',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500,
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                },
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
                        <title>Simpan Instansi</title>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    </head>

                    <body>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: 'Gagal menyimpan data instansi',
                                    icon: 'error',
                                    showConfirmButton: false, // Menghapus tombol
                                    allowOutsideClick: false,
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    }
                                }).then(() => {
                                    history.back();
                                });
                            });
                        </script>

                    </body>

                    </html>
                <?php
            }
        } else {
            $simpan_instansi = mysqli_query($conn, "UPDATE data_instansi SET nama_instansi = '$nama_instansi' WHERE id_instansi = $id_instansi");

            if ($simpan_instansi) {
                ?>
                    <!DOCTYPE html>
                    <html>

                    <head>
                        <title>Update Instansi</title>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    </head>

                    <body>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: 'Gagal menyimpan data instansi',
                                    icon: 'error',
                                    showConfirmButton: false, // Menghapus tombol
                                    allowOutsideClick: false,
                                    timer: 2000, // Menutup otomatis dalam 2 detik
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    }
                                }).then(() => {
                                    history.back();
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
                        <title>Update Instansi</title>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    </head>

                    <body>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: 'Gagal mengupdate data instansi',
                                    icon: 'error',
                                    showConfirmButton: false, // Menghapus tombol
                                    allowOutsideClick: false, // Mencegah klik di luar
                                    timer: 2000, // Menutup otomatis dalam 2 detik
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    }
                                }).then(() => {
                                    history.back();
                                });
                            });
                        </script>

                    </body>

                    </html>
        <?php
            }
        }
    }
        ?>