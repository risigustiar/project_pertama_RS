<?php
// include database connection file
include 'koneksi.php';
$nim = $_GET['NIM'];
$result = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE NIM='$nim'");
header("Location:index.php");
?>

