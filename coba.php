<?php
include('koneksi.php');
$label_instansi="";
$sangat_setuju="";
$setuju="";
$kurang_setuju="";
$tidak_setuju="";


$query=mysqli_query($conn,"select * from data_instansi");
while($data=mysqli_fetch_array($query))
{
  $label_instansi.='"'.$data['nama_instansi'].'",';
  $id_instansi=$data['id_instansi'];
  
  $query2=mysqli_query($conn,"SELECT * FROM data_responden,data_instansi,data_jawaban where data_instansi.id_instansi='$id_instansi' and data_instansi.id_instansi=data_responden.id_instansi and data_responden.id_responden=data_jawaban.id_responden and data_jawaban.point_jawaban='4';");
  $jum2=mysqli_num_rows($query2);
  $sangat_setuju.=''.$jum2.',';
  
  $query3=mysqli_query($conn,"SELECT * FROM data_responden,data_instansi,data_jawaban where data_instansi.id_instansi='$id_instansi' and data_instansi.id_instansi=data_responden.id_instansi and data_responden.id_responden=data_jawaban.id_responden and data_jawaban.point_jawaban='3';");
  $jum3=mysqli_num_rows($query3);
  $setuju.=''.$jum3.',';
  
  $query4=mysqli_query($conn,"SELECT * FROM data_responden,data_instansi,data_jawaban where data_instansi.id_instansi='$id_instansi' and data_instansi.id_instansi=data_responden.id_instansi and data_responden.id_responden=data_jawaban.id_responden and data_jawaban.point_jawaban='2';");
  $jum4=mysqli_num_rows($query4);
  $kurang_setuju.=''.$jum4.',';
  
  $query5=mysqli_query($conn,"SELECT * FROM data_responden,data_instansi,data_jawaban where data_instansi.id_instansi='$id_instansi' and data_instansi.id_instansi=data_responden.id_instansi and data_responden.id_responden=data_jawaban.id_responden and data_jawaban.point_jawaban='1';");
  $jum5=mysqli_num_rows($query5);
  $tidak_setuju.=''.$jum5.',';
  
}

echo"$label_instansi<br><br>";
echo"$sangat_setuju<br>";
echo"$setuju<br>";
echo"$kurang_setuju<br>";
echo"$tidak_setuju<br>";

?>