<?php
   session_start();
   $hidden = "";
   $petugassHidden = "";
   $default = "";
   switch($_SESSION['Status']){
        case 'Admin':
        $hidden = "";
        $petugassHidden = "";
        break;
        case 'Petugas':
        $hidden = "";
        break;
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index1.css">
    <title>Document</title>
</head>
<body>
<div class="nav-container">
      <H2 class="nav-judul">DigiPerpus</H2>
      <h3 class="nav-username">Hallo! <?php echo $_SESSION['Username']?></h3>
      <div class="nav-item"><a href="index.php" class="nav-link">Katalog Buku</a></div>
      <div class="nav-item"><a href="koleksi.php" class="nav-link">Koleksi Pribadi</a></div>
      <div class="nav-item"  <?php echo $hidden ?>><a href="addProduk.php" class="nav-link">Tambah Buku</a></div>
      <div class="nav-item"  <?php echo $hidden ?>><a href="peminjaman.php" class="nav-link">Data Peminjaman</a></div>
      <div class="nav-item"  <?php echo $hidden ?>><a href="index1.php" class="nav-link">Data Petugas</a></div>
      <div class="nav-item"  <?php echo $petugassHidden ?>><a href="registration.php" class="nav-link">Registrasi</a></div>
      <div class="nav-item"><a href="v1/logout.php" class="nav-link">Logout</a></div>
  </div>
  <div class="main-container">
    <h3>Tambah Buku</h3>
    <form action="v1/edit.php" method="POST" class="main-form">
    <?php
        include "connection.php";
        $db = new dbObj();
        $connection = $db->getConnString();
        $id = $_GET["id"];
        $sql = "SELECT 
                tb_buku.BukuID,
                tb_buku.Judul,
                tb_buku.Penulis,
                tb_buku.Penerbit,
                tb_buku.TahunTerbit,
                tb_kategori.NamaKategori
                FROM tb_buku
                JOIN tb_kategoribuku_relasi
                ON tb_kategoribuku_relasi.BukuID =tb_buku.BukuID
                JOIN tb_kategori
                ON tb_kategori.KategoriID = tb_kategoribuku_relasi.KatergoriID
                WHERE tb_buku.BukuID = '$id'";
        $query = mysqli_query($connection, $sql);
        $katSql = "SELECT * FROM tb_kategori";
        $queryKat =  mysqli_query($connection, $katSql);
        $result = mysqli_fetch_assoc($query);

    ?>
        <input type="text" value="<?php echo $id ?>" name="id" hidden>
        <div class="input-container">
            <label for="judul" class="input-label">Judul Buku :</label>
            <input type="text" value="<?php echo $result['Judul'] ?>" name="judul" class="input">
        </div>
        <div class="input-container">
            <label for="penulis" class="input-label">Penulis :</label>
            <input type="text" value="<?php echo $result['Penulis'] ?>" name="penulis"  class="input">
        </div>
        <div class="input-container">
            <label for="penerbit" class="input-label">Penerbit :</label>
            <input type="text" value="<?php echo $result['Penerbit'] ?>" name="penerbit"  class="input">
        </div>
        <div class="input-container">
            <label for="tahun" class="input-label">Tahun Terbit:</label>
            <input type="text" value="<?php echo $result['TahunTerbit'] ?>" name="tahun"  class="input">
        </div>
        <div class="input-container">
            <label for="katagori" class="input-label">Kategori </label>
            <select name="katagori" class="input-select">

                <?php
                    foreach ($queryKat as $data) {
                ?>
                    <option value="<?php echo $data["KategoriID"] ?>" <?php if($data["NamaKategori"] == $result["NamaKategori"]){echo("selected");}?>><?php echo $data["NamaKategori"] ?></option>
                <?php
                     }
                ?>
            </select>
        </div>x
        <div class="input-container">
            <input type="submit" value="Submit">
            <a href="index1.php">View Table</a>
        </div>
   
    </form>
    </div>
</body>
</html>