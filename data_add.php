<!DOCTYPE html>
<html>
<head>
    <title>Judul Halaman</title>
    <link href="css/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div class="col-md-3 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="alert alert-warning">
                    </div>
                <a href="index1.php" class="btn btn-danger"><i class="glyphicon glyphicon-file"></i> Lihat Data</a>
            </div>
            <div class="panel-body">
                <form method="post" action="data_add_s.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="angkatan" placeholder="Ini contoh input text dengan placeholder" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input class="form-control" name="jurusan" required>
                    </div>
                    <div class="form-group">
                        <label>photo</label>
                        <input type="file" class="form-control" name='photo' required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-file-text"></i> Bersih</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
</body>
</html>