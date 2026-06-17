<?php
$host     = "localhost";
$username = "root";
$password = "";
$database = "DB_SIMULASI_PBO_TI-1C_GERY PUTRA SETIAWAN"; // Pastikan nama DB sesuai dengan yang Anda buat di phpMyAdmin

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
