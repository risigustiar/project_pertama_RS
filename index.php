<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>ADMINISTRATOR</title>


<body>


<a href="tambah_mhs.php" class="btn btn-primary mb-2">
    <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA MAHASISWA
</a>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NIM</th>
            <th scope="col">NAMA MAHASISWA</th>
            <th scope="col">ALAMAT</th>
            <th scope="col">JURUSAN</th>
            <th colspan="3" scope="col">AKSI</th>
        </tr>
    </thead>

    <?php
    include 'koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo isset($data['NIM']) ? $data['NIM'] : ''; ?></td>
            <td><?php echo isset($data['Nama']) ? $data['Nama'] : ''; ?></td>
            <td><?php echo isset($data['Alamat']) ? $data['Alamat'] : ''; ?></td>
            <td><?php echo isset($data['Jurusan']) ? $data['Jurusan'] : ''; ?></td>
            <td>
                <i class="fa fa-edit bg-success p-2 text-white rounded"></i>
                <a href="ubah_mhs.php?NIM=<?php echo $data['NIM']; ?>" data-toggle="modal" data-target="#editmhs<?php echo $data['NIM']; ?>">EDIT</a>|
                <i class="fa fa-trash-alt bg-danger p-2 text-white rounded"></i>
                <a href="hapus_mhs.php?NIM=<?php echo $data['NIM']; ?>" data-toggle="modal" data-target="#deletemhs<?php echo $data['NIM']; ?>">Delete</a>|
            </td>

        </tr>
        <!--simpan modal-->

        <div class="example-modal">
            <div id="tambahmhs" class="modal fade" role="dialog" style="display:none;">
            
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Tambah Data Baru</h3>
                        </div>
                        <div class="modal-body">
                            <form action="simpan_mhs.php" method="post" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">NIM</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="NIM" placeholder="NIM" value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="Nama" placeholder="NamaMahasiswa" value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Alamat</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="Alamat" placeholder="Alamat" id="Alamat" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Jurusan </label>
                                        <div class="col-sm-8"><input type="text" name="Jurusan" class="form-control" placeholder="Jurusan">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--update modal-->
        <div class="example-modal">
            <div class="modal fade" id="editmhs<?php echo $data['NIM']; ?>" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Data Mahasiswa</h3>
                        </div>
                        <div class="modal-body">
                            <form action="update_mhs.php" method="post" role="form">
                                <?php
                                $nim = $data['NIM'];
                                $query1 = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE NIM='$nim'");
                                while ($data1 = mysqli_fetch_assoc($query1)) {
                                ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">NIM </label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="NIM" value="<?php echo
                                            $data1['NIM']; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="Nama" value="<?php echo
                                            $data1['Nama']; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Alamat </label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="Alamat" value="<?php echo
                                            $data1['Alamat']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Jurusan </label>
                                            <div class="col-sm-8"><input type="text" name="Jurusan" class="form-control" value="<?php echo
                                                $data1['Jurusan']; ?>">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                    </div>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--modal delete-->

        <div class="example-modal">
        <div id="deletemhs<?php echo $data['NIM']; ?>" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                        </div>
                        <div class="modal-body">
                            <h5 align="center">Apakah anda yakin ingin menghapus NIM <?php echo
                            $data['NIM']; ?><strong><span class="grt"></span></strong> ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                            <a href="hapus_mhs.php?NIM=<?php echo $data['NIM']; ?>" class="btn btn-primary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<title></title>

    <?php
    }
    ?>
</table>
</body>