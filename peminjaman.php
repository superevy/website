<?php
session_start();
include("connection.php");
$db = new dbObj();
$conn = $db -> getConnString();
$hidden = "hidden";
$petugassHidden = "hidden";
$userid = $_SESSION["UserID"];
$sql = "SELECT 
        tb_buku.BukuID,
        tb_buku.Judul,
        tb_buku.Penulis,
        tb_buku.Penerbit,
        tb_buku.TahunTerbit,
        tb_kategori.NamaKategori,
        tb_peminjaman.TanggalPeminjaman,
        tb_peminjaman.TanggalPengembalian,
        tb_user.Username
        FROM tb_buku
        JOIN tb_koleksipribadi
        ON tb_koleksipribadi.BukuID = tb_buku.BukuID
        JOIN tb_kategoribuku_relasi
        ON tb_kategoribuku_relasi.BukuID =tb_buku.BukuID
        JOIN tb_kategori
        ON tb_kategori.KategoriID = tb_kategoribuku_relasi.KatergoriID
        JOIN tb_peminjaman
        ON tb_peminjaman.BukuID = tb_buku.BukuID
        JOIN tb_user
        ON tb_peminjaman.UserID = tb_user.UserID";
switch($_SESSION['Status']){
    case 'Admin':
      $hidden = "";
      $petugassHidden = "";
    break;
    case 'Petugas':
      $hidden = "";
    break;
  }
$query = mysqli_query($conn, $sql);
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
        <h1>KOLEKSI PRIBADI</h1>
        <table class="table">
            <tr class="table-row">
                <th class="table-header">Judul</th>
                <th class="table-header">Penulis</th>
                <th class="table-header">Penerbit</th>
                <th class="table-header">Tahun Terbit</th>
                <th class="table-header">Kategori</th>
                <th class="table-header">Tanggal Peminjaman</th>
                <th class="table-header">Tanggal Pengembalian</th>
                <th class="table-header">Peminjam</th>
            </tr>
            <?php
                foreach($query as $data){
            ?>
                <tr class="table-row">
                    <td class="table-item"><?php echo $data["Judul"] ?></td>
                    <td class="table-item"><?php echo $data["Penulis"] ?></td>
                    <td class="table-item"><?php echo $data["Penerbit"] ?></td>
                    <td class="table-item"><?php echo $data["TahunTerbit"] ?></td>
                    <td class="table-item"><?php echo $data["NamaKategori"] ?></td>
                    <td class="table-item"><?php echo $data["TanggalPeminjaman"] ?></td>
                    <td class="table-item"><?php echo $data["TanggalPengembalian"] ?></td>
                    <td class="table-item"><?php echo $data["Username"] ?></td>
                </tr>
            <?php
                }
            ?>
        </table>
        </div>
</body>
</html>