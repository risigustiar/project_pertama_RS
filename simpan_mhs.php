<?php
include 'koneksi.php';
$nim = $_POST['NIM'];
$nama = $_POST['Nama'];
$alamat= $_POST['Alamat'];
$jurusan = $_POST['Jurusan'];
$input = mysqli_query($koneksi,"INSERT INTO mahasiswa
VALUES('$nim','$nama','$alamat','$jurusan')") or die(mysqli_connect_error());
if($input){
echo "Data Berhasil Disimpan";
header("location:index.php");
}else{
echo "Gagal Disimpan";
}

?>

