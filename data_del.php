<?php
// HAPUS DATA
// Sambungkan ke database
include "koneksi.php";

// Ambil ID data yang akan dihapus dari URL
$id = $_GET['id'];

// Query untuk menghapus data
$sql = "DELETE FROM m_siswa WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);

// Cek hasil eksekusi query
if ($result) {
    // Jika berhasil, tampilkan pesan sukses dan alihkan ke halaman index.php
?>
    <script language="javascript">
        alert("Berhasil Dihapus");
        document.location.href="index1.php";
    </script>
<?php
} else {
    // Jika gagal, tampilkan pesan error
    trigger_error("Perintah SQL Salah: $sql - Error: " . $koneksi->error, E_USER_ERROR);
}
?>