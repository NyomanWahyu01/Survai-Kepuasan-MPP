<?php   
session_start();

// Cek apakah id_responden ada di session
if (!isset($_SESSION['id_responden'])) {
    // Redirect ke halaman index jika tidak ada session
    header('Location: index.php');
    exit();
}

$id_responden = $_SESSION['id_responden'];
include("koneksi.php");

if(isset($_POST['lanjut'])) {
    $no = $_POST['lanjut'];
    $jum = $_POST['jum'];
    
    // Validasi data yang diterima
    for($i=1; $i<=$jum; $i++) {
        if(isset($_POST['pilih'.$i])) {
            $data = $_POST['pilih'.$i];
            $datas = explode(",", $data);
            if(count($datas) == 2) {
                $id_pertanyaan = (int)$datas[0];
                $jawaban = (int)$datas[1];
                
                $query = mysqli_prepare($conn, 
                    "INSERT INTO `data_jawaban` 
                    (`id_jawaban`, `id_responden`, `id_pertanyaan`, `point_jawaban`, `status`) 
                    VALUES (NULL, ?, ?, ?, 'mulai')"
                );
                
                mysqli_stmt_bind_param($query, "iii", $id_responden, $id_pertanyaan, $jawaban);
                mysqli_stmt_execute($query);
                mysqli_stmt_close($query);
            }
        }
    }
    
    $_SESSION['no'] = $no;
    header('Location: survai.php');
    exit();
}

if(isset($_POST['kirim'])) {
    $saran = isset($_POST['saran']) ? $_POST['saran'] : '';
    $saran = mysqli_real_escape_string($conn, $saran);
    
    // Update data responden
    $update_responden = mysqli_query($conn, 
        "UPDATE data_responden 
        SET saran = '$saran', 
            status_responden = 'selesai' 
        WHERE id_responden = $id_responden"
    );
    
    // Update status jawaban
    $update_jawaban = mysqli_query($conn,
        "UPDATE data_jawaban 
        SET status = 'selesai' 
        WHERE id_responden = $id_responden"
    );

    // Hapus session
    session_unset();
    session_destroy();
    
    // Tampilkan alert cantik dan redirect
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <style>
            .swal2-popup {
                background: linear-gradient(145deg, #ffffff, #f8f9fa);
                border-radius: 20px;
            }
            .swal2-title {
                color: #2C8709 !important;
                font-size: 24px !important;
            }
            .swal2-html-container {
                color: #2c3e50 !important;
                font-size: 16px !important;
            }
        </style>
    </head>
    <body>
        <script>
            Swal.fire({
                title: 'Terima Kasih',
                html: 'Telah Mengisi Survei Pelayanan Masyarakat<br>Pada Kantor MPP Pangkep',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: false,
                allowOutsideClick: false,
                didClose: () => {
                    window.location.replace('index.php');
                }
            });
        </script>
    </body>
    </html>";
    exit();
}
?>
