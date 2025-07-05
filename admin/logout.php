<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Logout</title>
    <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Terima Kasih!',
                text: 'Terima kasih telah menggunakan layanan kami!',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000,
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
                window.location.href = 'index.php';
            });
        });
    </script>
</body>

</html>