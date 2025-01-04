<?php
// Meminta jembatan koneksi ke database
include "koneksi.php";

// Menerima inputan dari form
$angkatan = $_POST['angkatan'];
$nama     = $_POST['nama'];
$nim      = $_POST['nim'];
$jurusan  = $_POST['jurusan'];
$photo    = $_FILES['photo']['name'];

// Pemeriksaan jika ada data inputan kosong
if($angkatan=="" || $nama=="" || $nim=="" || $jurusan=="" || $photo=="" )
{
    ?>
    <script language="javascript">
    alert("Masih ada data yang kosong!");
    document.location.href="data_add.php";
    </script>
    <?php
} else {
    //input ke tabel db
    if($photo != "") {
        $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $photo); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['photo']['tmp_name'];
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$photo; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru); //memindah file gambar ke folder img
            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
            $query = "INSERT INTO m_siswa VALUES (null, '$angkatan', '$nama', '$nim', '$jurusan','$nama_gambar_baru')";
            $result = mysqli_query($koneksi, $query);
            // periksa query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
            } else {
              //tampilkan alert dan akan redirect ke halaman index.php
              //silahkan ganti index.php sesuai halaman yang akan dituju
              echo "<script>alert('Data berhasil ditambah.');window.location='index1.php';</script>";
            }
        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='data_add.php';</script>";
        }
    }

    if($koneksi->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah "Perintah SQL Salah"
        trigger_error('Perintah SQL Salah: ' . $koneksi->error, E_USER_ERROR);
    } else { // jika berhasil akan ke halaman tampil.php
        ?>
        <script language="javascript">
        alert("Berhasil");
        document.location.href="index1.php";
        </script>
        <?php
    }
}
?>
