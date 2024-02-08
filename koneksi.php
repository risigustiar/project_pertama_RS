<?php
$host = "localhost"; // 127.0,0.1
$user = "RS";
$pass = "rsh";
$db = "db_akademik" ; // Nama database
// melakukan koneksi ke db 
$koneksi = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($koneksi));
