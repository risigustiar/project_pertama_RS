<?php
// include database connection file
include 'koneksi.php';
$nim= $_POST['NIM'];
$nama=$_POST['Nama'];
$alamat=$_POST['Alamat'];
$jurusan=$_POST['Jurusan'];
$result = mysqli_query($koneksi, "UPDATE mahasiswa SET
Nama='$nama',Alamat='$alamat',Jurusan='$jurusan' WHERE NIM='$nim'");
// Redirect to homepage to display updated user in list
header("Location: index.php");$nim= $_POST['NIM'];


?>
