<?php
include("connection.php");
session_start();
$db = new dbObj();
$conn = $db->getConnString();
$sql = "SELECT * From tb_kategori";
$hidden = "hidden";
$petugassHidden = "hidden";
      
$query = mysqli_query($conn, $sql);

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
    <link rel="stylesheet" href="css/index.css">
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
    <h3 class="main-judul">Add Book</h3>
    <form action="v1/add.php" method="POST" class="main-form">
        <div class="input-container">
            <label for="judul" class="input-label">Judul</label>
            <input type="text" name="judul" class="input">
        </div>
        <div class="input-container">
            <label for="penulis" class="input-label">Penulis</label>
            <input type="text" name="penulis" class="input">
        </div>
        <div class="input-container">
            <label for="penerbit" class="input-label">Penerbit</label>
            <input type="text" name="penerbit" class="input">
        </div>
        <div class="input-container">
            <label for="tahun" class="input-label">Tahun Terbit</label>
            <input type="text" name="tahun" class="input">
        </div>
        <div class="input-container">
            <label for="katagori" class="input-label">Kategori </label>
            <select name="katagori" class="input-select">
                <?php
                    foreach ($query as $data) { 
                ?>
                    <option value="<?php echo $data["KategoriID"] ?>"><?php echo $data["NamaKategori"] ?></option>
                <?php
                     }
                ?>
            </select>
        </div>
        <div class="input-container">
            <input type="submit" value="Submit" class="button-submit">
        </div>
    </form>
    </div>
</body>
</html>

