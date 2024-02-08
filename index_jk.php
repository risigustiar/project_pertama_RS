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
    

</head>

<body>

<a href="tambah_jk.php" class="btn btn-primary mb-2">
    <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA JADWAL KULIAH
</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">HARI</th>
                <th scope="col">JAM</th>
                <th scope="col">MATKUL</th>
                <th scope="col">DOSEN</th>
                <th scope="col">RUANG</th>
                <th colspan="3" scope="col">AKSI</th>
            </tr>
        </thead>
        <?php

        include 'koneksi.php';

        $query_jk = mysqli_query($koneksi, "SELECT * FROM jadwal_kuliah ");
        $no = 1;
        while ($data = mysqli_fetch_assoc($query_jk)) {
            ?>
            <tr>
            <td><?php echo isset($data['hari']) ? $data['hari'] : ''; ?></td>
            <td><?php echo isset($data['jam']) ? $data['jam'] : ''; ?></td>
            <td><?php echo isset($data['matkul']) ? $data['matkul'] : ''; ?></td>
            <td><?php echo isset($data['dosen']) ? $data['dosen'] : ''; ?></td>
            <td><?php echo isset($data['ruang']) ? $data['ruang'] : ''; ?></td>

            <td>
                    <i class="fa fa-edit bg-success p-2 text-white rounded"></i>
                    <a href="ubah_jk.php" data-toggle="modal" data-target="#editjk<?php echo $data['hari']; ?>">Edit</a>|
                    <i class="fa fa-trash-alt bg-danger p-2 text-white rounded"></i>
                    <a href="hapus_jk.php" data-toggle="modal" data-target="#deletejk<?php echo $data['hari']; ?>">Delete</a>|

                </td>
            </tr>
            <!-- simpan modal -->
            <div class="example-modal">
                <div id="tambahjk" class="modal fade" role="dialog" style="display:none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Tambah Data Baru</h3>
                            </div>
                            <div class="modal-body">
                                <form action="simpan_jk.php" method="post" role="form">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">HARI</label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="hari"
                                                    placeholder="hari" value=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">JAM</label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="jam"
                                                    placeholder="jam" value=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">MATKUL</label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="matkul"
                                                    placeholder="matkul" id="matkul" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">DOSEN</label>
                                            <div class="col-sm-8"><input type="text" name="dosen" class="form-control"
                                                    placeholder="dosen">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">RUANG</label>
                                            <div class="col-sm-8"><input type="text" name="ruang" class="form-control"
                                                    placeholder="ruang">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nosave" type="button" class="btn btn-danger pull-left"
                                            data-dismiss="modal">Batal</button>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Update Modal -->

            <div class="example-modal">
                <div class="modal fade" id="editjk<?php echo $data['hari']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Edit Data Jadwal Kuliah</h3>
                            </div>
                            <div class="modal-body">
                                <form action="update_jk.php" method="post" role="form">
                                    <?php
                                    $hari = $data['hari'];
                                    $query1 = mysqli_query($koneksi, "SELECT * FROM jadwal_kuliah WHERE hari='$hari'");
                                    while ($data1 = mysqli_fetch_assoc($query1)) {
                                        ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">HARI </label>
                                                <div class="col-sm-8"><input type="text" class="form-control" name="hari" value="<?php echo
                                                    $data1['hari']; ?>"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">JAM</label>
                                                <div class="col-sm-8"><input type="text" class="form-control" name="jam" value="<?php echo
                                                    $data1['jam']; ?>"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">MATKUL</label>
                                                <div class="col-sm-8"><input type="text" class="form-control" name="matkul"
                                                        value="<?php echo
                                                            $data1['matkul']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">DOSEN</label>
                                                <div class="col-sm-8"><input type="text" name="dosen" class="form-control"
                                                        value="<?php echo
                                                            $data1['dosen']; ?>">
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">RUANG</label>
                                                <div class="col-sm-8"><input type="text" name="ruang" class="form-control"
                                                        value="<?php echo
                                                            $data1['ruang']; ?>">
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="noedit" type="button" class="btn btn-danger pull-left"
                                                data-dismiss="modal">Batal</button>
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
            <!-- modal delete -->

            <div class="example-modal">
                <div id="deletejk<?php echo $data['hari']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                            </div>
                            <div class="modal-body">
                                <h5 align="center">Apakah anda yakin ingin menghapus jadwal kuliah
                                    <?php echo
                                        $data['hari']; ?><strong><span class="grt"></span></strong> ?
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Cancle</button>
                                <a href="hapus_jk.php?hari=<?php echo $data['hari']; ?>"
                                    class="btn btn-primary">Delete</a>
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
        <script src="js/bootstrap.min.js"></script>
</body>

</html>