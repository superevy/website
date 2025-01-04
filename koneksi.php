<?php
// data server mysql
$db_host = 'localhost';  // --> server mysql
$db_user = 'root';       // --> username
$db_pass = '';           // --> password
$db_name = 'crud';       // --> nama database

// Fungsi untuk koneksi ke mysqli
$koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);

// cek koneksi
if ($koneksi->connect_error) {
    // jika salah. Bisa juga menggunakan exit();
    die('Koneksi Gagal : ' . $koneksi->connect_error);
}
?>
