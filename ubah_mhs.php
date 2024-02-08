<?php
include 'koneksi.php';

$nim = isset($_GET['NIM']) ? $_GET['NIM'] : '';
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE NIM='$nim'");
while ($user_data = mysqli_fetch_array($result)) {
$nama = $user_data['Nama'];
$alamat = $user_data['Alamat'];
$jurusan = $user_data['Jurusan'];
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>ADMINISTRATOR</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
        <a class="navbar-brand" href="#">SELAMAT DATANG ADMIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="icon ml-4">
                <h5>
                    <i class="fas fa-envelope-square mr-3"></i>
                    <i class="fas fa-bell-slash mr-3"></i>
                    <i class="fas fa-sign-out-alt mr-3"></i>
                </h5>
            </div>
        </div>
    </nav>
    <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" href=""><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href=""><i class="fas fa-user-graduate mr-2"></i>Daftar
                        Mahasiswa</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index_dsn.php"><i class="fas fa-chalkboard-teacher mr-2"></i>Daftar
                        Dosen</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index_pgw.php"><i class="fas fa-users mr-2"></i>Daftar Pegawai</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index_jk.php"><i class="far fa-calendar-alt mr-2"></i>Jadwal Kuliah</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-user-graduate mr-2"></i> Ubah Data Mahasiswa</h3>
    <hr>
    <form action="update_mhs.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>NIM</label>
                <input type="text" name="NIM" class="form-control" id="NIM" value="<?php echo $nim; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label>NAMA</label>
                <input type="text" name="Nama" class="form-control" id="Nama" value="<?php echo isset($nama) ? $nama : ''; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>ALAMAT</label>
                <input type="text" name="Alamat" class="form-control" id="Alamat" value="<?php echo isset($alamat) ? $alamat : ''; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>JURUSAN</label>
                <input type="text" name="Jurusan" class="form-control" id="Jurusan" value="<?php echo isset($jurusan) ? htmlspecialchars($jurusan, ENT_QUOTES, 'UTF-8') : ''; ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>
</div>

            </form>
        </div>
    </div>
</body>

</html>