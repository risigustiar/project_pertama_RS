<?php
// include database connection file
include 'koneksi.php';
$hari= $_POST['hari'];
$jam=$_POST['jam'];
$matkul=$_POST['matkul'];
$dosen=$_POST['dosen'];
$ruang=$_POST['ruang'];
$result = mysqli_query($koneksi, "UPDATE jadwal_kuliah SET jam='$jam',matkul='$matkul',dosen='$dosen',ruang='$ruang' WHERE hari='$hari'");
// Redirect to homepage to display updated user in list
header("Location: index_jk.php");$hari= $_POST['hari'];


?>