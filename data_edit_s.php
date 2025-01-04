<?php
// Meminta jembatan koneksi ke database
include "koneksi.php";

// Menerima inputan dari form
$id       = $_POST['id'];
$angkatan = $_POST['Angkatan'];
$nama     = $_POST['Nama'];
$nim      = $_POST['Nim'];
$jurusan  = $_POST['Jurusan'];
$photo    = $_FILES['photo']['name'];

// Pemeriksaan jika ada data inputan kosong
if($angkatan=="" || $nama=="" || $nim=="" || $jurusan=="" || $photo=="" )
{
    ?>
    <script language="javascript">
    alert("Masih ada data yang kosong!");
    document.location.href="data_edit.php?id=<?php echo $id; ?>";
    </script>
    <?php
} else {
    if($photo != "") {
        $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $photo); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['photo']['tmp_name'];
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$photo; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru); //memindah file gambar ke folder img
            // jalankan query UPDATE berdasarkan ID yang produknya kita edit
            $query = "UPDATE m_siswa SET angkatan='$angkatan', nama='$nama', nim='$nim', jurusan='$jurusan', photo='$nama_gambar_baru' WHERE id='$id'";
            $result = mysqli_query($koneksi, $query);
            // periska query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
            } else {
              //tampilkan alert dan akan redirect ke halaman index.php
              //silahkan ganti index.php sesuai halaman yang akan dituju
              echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
            }
        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='index.php';</script>";
        }
    } else {
        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query = "UPDATE m_siswa SET angkatan='$angkatan', nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id='$id'";
        $result = mysqli_query($koneksi, $query);
        // periska query apakah ada error
        if(!$result){
              die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                 " - ".mysqli_error($koneksi));
        } else {
          //tampilkan alert dan akan redirect ke halaman index.php
          //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='index1.php';</script>";
        }
    }
}
?>
