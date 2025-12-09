
<?php
$nowa=$_POST['nowa'];
$id_instansi=$_POST['id_instansi'];
$nama=$_POST['nama'];
$jkel=$_POST['jk'];
$pekerjaan=$_POST['pekerjaan'];
$pendidikan=$_POST['pendidikan'];
$saran=$_POST['saran'];



if( $id_instansi=="" || $nama=="" || $jkel=="" || $pekerjaan==""|| $pendidikan=="")
{
    
        echo"
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            icon: 'warning',
            title: 'Data Belum Lengkap',
            text: 'Lengkapi semua data responden!',
            timer: 1500,
            showConfirmButton: false
        }).then(() => {
            history.back();
        });
        </script>
        ";

}
else
{
    include("koneksi.php");
    
    $cek=mysqli_num_rows(mysqli_query($conn,"select * from data_responden where id_instansi='$id_instansi' and no_wa='$nowa'"));
  
    if($cek>0)
    {
        echo"
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Instansi Sudah Terisi',
                text: 'Silahkan memilih instansi lainnya!',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                history.back();
            });
            </script>
            ";

    }else
    {
        $simpan=mysqli_query($conn,"INSERT INTO `data_responden` (`id_responden`, `no_wa`, `id_instansi`, `nama_responden`, `jkel`, `pekerjaan`, `pendidikan`, `saran`, `status_responden`, `tgl_responden`) VALUES (NULL, '$nowa', '$id_instansi', '$nama', '$jkel', '$pekerjaan', '$pendidikan', '$saran', 'belum', current_timestamp());");
        
        if($simpan)
        {
            $query=mysqli_query($conn,"SELECT * FROM `data_responden` order by id_responden desc");
            $data=mysqli_fetch_array($query);
            
            session_start();
            $_SESSION['nowa']=$data['no_wa'];
            $_SESSION['id_responden']=$data['id_responden'];
            $_SESSION['no']="0";

            echo"
                <script> 
                // alert('Berhasil menyimpan data responden'); 
                location.href='survai.php'; 
                </script> 
            ";
            
        }else
        {
            echo"
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal menyimpan data responden!',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                history.back();
            });
            </script>
            ";

        }
    }  
}
?>