<?php
 session_start();
 include("connection.php");
 $db = new dbObj();
 $conn = $db->getConnString();
 $id = $_GET["id"];
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
        WHERE tb_buku.BukuID = '$id'";
        
 $query = mysqli_query($conn, $sql);
 $result = mysqli_fetch_assoc($query);

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
      <div class="nav-item"  <?php echo $hidden ?>><a href="index1.php" class="nav-link">Data Petugas</a></div>
      <div class="nav-item"  <?php echo $petugassHidden ?>><a href="registration.php" class="nav-link">Registrasi</a></div>
      <div class="nav-item"><a href="v1/logout.php" class="nav-link">Logout</a></div>
  </div>
  <div class="main-container">
    <div class="buku-container">
      <h1 class="buku-judul"><?php echo $result["Judul"]  ?></h1>
        <div class="data-container">
          <p class="buku-item">Penulis       </p>
          <p class="buku-data"><?php echo $result["Penulis"]  ?></P>
        </div>
        <div class="data-container">
          <p class="buku-item">Penerbit      </p>
          <p class="buku-data"><?php echo $result["Penerbit"]  ?></p>
        </div>
        <div class="data-container">
          <p class="buku-item">Tahun Terbit </p>
          <p class="buku-data"><?php echo $result["TahunTerbit"]  ?></p>
        </div>
        <div class="data-container">
          <p class="buku-item">Kategori     </p>
          <p class="buku-data"><?php echo $result["NamaKategori"]  ?></p>
        </div>
          <form action="v1/pinjam.php" method="POST">
              <label for="submit">pinjam</label>
              <input type="submit" name="submit">
              <label for="days">Selama :</label>
              <input type="number" name="days" min="1" max="30">
              <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" hidden>
              <input type="text" name="bukuid" value="<?php echo $id ?>" hidden>
              <p>hari</p>
          </form>
    </div>

    <form action="v1/inputUlasan.php" method="POST">
      <label for="ulasan" class="input-label">Berikan Ulasan</label>
        <input type="text" name="ulasan" class="input">
      <label for="bintang" class="input-label">Berikan Rating</label>
        <input type="number" name="bintang" min="0" max="5" class="input">
        <input type="text" name="bukuid" value="<?php echo $id ?>" hidden>
        <input type="submit" name="submit">
    </form>

   <div class="comment-section">
    <?php 
    $sql ="SELECT tb_ulasanbuku.Ulasan,
                  tb_ulasanbuku.Rating,
                  tb_user.Username
            FROM tb_ulasanbuku
            JOIN tb_user
            ON tb_ulasanbuku.UserID = tb_user.UserID
            WHERE tb_ulasanbuku.BukuID = '$id'";
    $query = mysqli_query($conn, $sql);
    foreach($query as $data) {
        ?>
          <div class="comment-container">
            <div class="comment-header">
                <p class="comment-username"><?php echo $data["Username"] ?></p>
                <p class="comment-rating"><?php echo $data["Rating"] ?></p>
            </div>
            <div class="comment-body">
                <p class="comment-item"><?php echo $data["Ulasan"] ?></p>
            </div> 
            </td>
          </div>
  
     <?php
    }
   
    ?>
     </div>
  </div>
</body>
</html>
