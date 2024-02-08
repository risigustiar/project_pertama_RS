<?php
include 'koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$bagian = $_POST['bagian'];
$input = mysqli_query($koneksi, "INSERT INTO pegawai VALUES('$nik','$nama','$bagian')") or die(mysqli_connect_error());
if ($input) {
    echo "Data Berhasil Disimpan";
    header("location:index_pgw.php");
} else {
    echo "Gagal Disimpan";
}
