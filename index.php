<?php 
  include ("connection.php");
  session_start();
  if (!isset ($_SESSION["Username"])) {
    echo "<script>
            location.href = 'login.php';
          </script>";
  }
  $db = new dbObj();
  $connection = $db->getConnString();
  $userid = $_SESSION["UserID"];
  $petugassHidden = "hidden";
  $hidden = "hidden";
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
          ORDER BY tb_buku.BukuID";
  $query = mysqli_query($connection, $sql);
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
      <div class="nav-item"  <?php echo $hidden ?>><a href="peminjaman.php" class="nav-link">Data Peminjamas</a></div>
      <div class="nav-item"  <?php echo $hidden ?>><a href="index1.php" class="nav-link">Data Petugas</a></div>
      <div class="nav-item"  <?php echo $petugassHidden ?>><a href="registration.php" class="nav-link">Registrasi</a></div>
      <div class="nav-item"><a href="v1/logout.php" class="nav-link">Logout</a></div>
  </div>
  <div class="main-container">
    <h1>LIST BUKU</h1>
    <table class="table">
      <tr class="table-row">
        <th class="table-header">Buku Id </th>
        <th class="table-header">Judul</th>
        <th class="table-header">Penulis</th>
        <th class="table-header">Penerbir</th>
        <th class="table-header">Tahun Terbit</th>
        <th class="table-header">Kategori</th>
        <th class="table-header">Tools</th>
      </tr>
      <?php

        foreach($query as $data) {
      ?>
        <tr class="table-row">
          <td class="table-item"><?php echo $data["BukuID"] ?></td>
          <td class="table-item"><?php echo $data["Judul"] ?></td>
          <td class="table-item"><?php echo $data["Penulis"] ?></td>
          <td class="table-item"><?php echo $data["Penerbit"] ?></td>
          <td class="table-item"><?php echo $data["TahunTerbit"] ?></td>
          <td class="table-item"><?php echo $data["NamaKategori"] ?></td>
          <td class="table-item">
            <a href="book.php?id=<?php echo $data['BukuID'] ?>" class="inspect">Lihat</a>
            <a href="editProduk.php?id=<?php echo $data['BukuID'] ?>" class="edit" <?php echo $hidden ?>>Edit</a>
            <a href="v1/delete.php?id=<?php echo $data['BukuID'] ?>" class="delete" <?php echo $hidden ?>>Delete</a>
          </td>
        </tr>

      <?php

        }
      ?>
    </table>
  </div>
</body>
</html>