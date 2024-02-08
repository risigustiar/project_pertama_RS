<?php
// include database connection file
include 'koneksi.php';
$hari = $_GET['hari'];
$result = mysqli_query($koneksi, "DELETE FROM jadwal_kuliah WHERE hari='$hari'");
header("Location:index_jk.php");
?>