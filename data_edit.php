<!DOCTYPE html>
<html>
<head>
    <title>Judul Halaman</title>
    <link href="css/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="alert alert-warning">
                    <a href="index1.php" class="btn btn-danger"><i class="glyphicon glyphicon-file"></i> Lihat Data</a>
                </div>
            </div>
            <div class="panel-body">
                <?php
                // Koneksi ke database
                include 'koneksi.php';

                // Ambil data berdasarkan ID
                $id = $_GET['id'];
                $result = mysqli_query($koneksi, "SELECT * FROM m_siswa WHERE id='$id'");
                $row = mysqli_fetch_assoc($result);
                ?>
                <form method="post" action="data_edit_s.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="Angkatan" value="<?php echo $row['Angkatan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="Nama" value="<?php echo $row['Nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Emaiil</label>
                        <input class="form-control" name="Nim" value="<?php echo $row['Nim']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input class="form-control" name="Jurusan" value="<?php echo $row['Jurusan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>photo</label>
                        <img src="img/<?php echo $row['photo']; ?>" style="width: 120px;">
                        <input type="file" class="form-control" name='photo'>
                        <i style="float: left;font-size: 11px;color: red">Abaikannjika tidak merubah gambar produk</i>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-file-text"></i> Bersih</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>