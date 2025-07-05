<!-- CSS FORM UBAH PASSWORD -->
<style>
    .form-group {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin-bottom: 15px;
    }

    .form-group label {
        width: 25%;
        /* Menentukan lebar label */
        margin-right: 10px;
    }

    .form-group .col-md-6,
    .form-group .col-sm-6 {
        flex-grow: 1;
    }

    .form-group input {
        width: 100%;
        /* Mengatur lebar input agar memenuhi ruang yang tersedia */
    }
</style>
<!-- END CSS -->

<!-- HEADER UBAH PASSWORD -->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <h3 class="text-xl font-bold text-bold">Ubah Password</h3>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HEADER -->

<!-- FORM UBAH PASSWORD -->
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <br>
                    <form action='' method='POST' class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password_user">
                                <h5 class="text-xl font-bold text-bold">Password Baru</h5>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="password" name="password_baru" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="konfirmasi_password">
                                <h5 class="text-xl font-bold text-bold">Konfirmasi Password</h5>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="password" name="konfirmasi" class="form-control">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success" name="simpan">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END FORM UBAH PASSWORD -->


<?php
$id_admin = $_SESSION['id_admin'];
if (isset($_POST['simpan'])) {
    $pass_baru = $_POST['password_baru'];
    $konfir = $_POST['konfirmasi'];

    // Validasi jika form kosong
    if (empty($pass_baru) || empty($konfir)) {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

        </head>

        <body>
            <script>
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Password Baru dan Konfirmasi Password Baru Harus Sama',
                    icon: 'warning',
                    showConfirmButton: false, // Menghilangkan tombol OK
                    timer: 3000, // Menutup otomatis dalam 2 detik
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            </script>

        </body>

        </html>
    <?php
    }
    // Validasi jika password baru dan konfirmasi tidak sama
    elseif ($pass_baru != $konfir) {
    ?>
        <!DOCTYPE html>
        <html>

        <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

        </head>

        <body>
            <script>
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Password Baru dan Konfirmasi Password baru harus sama',
                    icon: 'warning',
                    showConfirmButton: false, // Menghilangkan tombol OK
                    timer: 2000, // Menutup otomatis dalam 2 detik
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            </script>

        </body>

        </html>
        <?php
    } else {
        // Proses jika password sudah valid
        include('koneksi.php');
        $simpan = mysqli_query($conn, "UPDATE `data_admin` SET `password_admin` = '$pass_baru' WHERE `data_admin`.`id_admin` = '$id_admin'");

        if ($simpan) {
        ?>
            <!DOCTYPE html>
            <html>

            <head>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>

            <body>
                <script>
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Password Berhasil Diubah, Silahkan Login Kembali',
                        icon: 'success',
                        showConfirmButton: false, // Menghilangkan tombol OK
                        timer: 1500, // Menutup otomatis dalam 1.5 detik
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    }).then(() => {
                        window.location.href = 'logout.php';
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
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>

            <body>
                <script>
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Maaf, Gagal Mengubah Password',
                        icon: 'error',
                        showConfirmButton: false, // Menghilangkan tombol OK
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
                </script>
            </body>

            </html>
<?php
        }
    }
}
