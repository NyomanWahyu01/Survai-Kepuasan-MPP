 <?php
session_start();
$id_user=$_POST['id_user'];
$nama_user=$_POST['nama_user'];
$status=$_POST['status'];

$id_admin=$_SESSION['id_admin'];

if( $nama_user=="" )
{
    echo"
        <script>
            alert('Lengkapi Nama user');
            history.back();
        </script>
        ";    
}
else
{
    include("koneksi.php");
    
        $simpan_user=mysqli_query($conn,"UPDATE `user` SET `nama_user` = '$nama_user', `status` = '$status' WHERE `user`.`id_user` = $id_user;");
        
        if($simpan_user)
        {
            echo"
                <script>
                    alert('Berhasil mengupdate data user');
                    location.href='index.php?page=view_user.php';
                </script>
                ";
        }else
        {
            echo"
                <script>
                    alert('Gagal menyimpan data user');
                    history.back();
                </script>
                ";
        } 
}










?>