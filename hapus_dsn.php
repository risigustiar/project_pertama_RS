<?php
// include database connection file
include 'koneksi.php';
$nidn = $_GET['nidn'];
$result = mysqli_query($koneksi, "DELETE FROM dosen WHERE nidn='$nidn'");
header("Location:index_dsn.php");
?>