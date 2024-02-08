<?php
include 'koneksi.php';
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$matkul = $_POST['matkul'];
$dosen = $_POST['dosen'];
$ruang = $_POST['ruang'];
$input = mysqli_query($koneksi, "INSERT INTO jadwal_kuliah VALUES('$hari','$jam','$matkul','$dosen','$ruang' )") or die(mysqli_connect_error());
if ($input) {
    echo "Data Berhasil Disimpan";
    header("location:index_jk.php");
} else {
    echo "Gagal Disimpan";
}
