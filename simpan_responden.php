<?php


$nowa=$_POST['nowa'];
$id_instansi=$_POST['id_instansi'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$no_telepon=$_POST['no_telepon'];
$umur=$_POST['umur'];
$jkel=$_POST['jk'];
$pekerjaan=$_POST['pekerjaan'];
$pendidikan=$_POST['pendidikan'];




if( $id_instansi=="" || $nama=="" || $email=="" || $no_telepon=="" || $umur=="" || $jkel=="" || $pekerjaan==""|| $pendidikan=="")
{
    echo"
        <script>
            alert('Lengkapi semua data responden');
            history.back();
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
        <script>
            alert('Silahkan Memilih Instansi Lainnya');
            location.href='index.php';
        </script>
        ";
    }else
    {
        $simpan=mysqli_query($conn,"INSERT INTO `data_responden` (`id_responden`, `no_wa`, `id_instansi`, `nama_responden`, `email`, `no_telepon`, `umur`, `jkel`, `pekerjaan`, `pendidikan`, `saran`, `status_responden`, `tgl_responden`) VALUES (NULL, '$nowa', '$id_instansi', '$nama', '$email', '$no_telepon', '$umur', '$jkel', '$pekerjaan', '$pendidikan', '', 'belum', current_timestamp());");
        
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
                <script>
                    alert('Gagal menyimpan data responden');
                    history.back();
                </script>
                ";
        }
    }

        
   
   
}










?>