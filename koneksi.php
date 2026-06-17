<?php
$host     = "localhost";
$username = "root";
$password = "";
$database = "simulasi_pbo_ti-1c_gery putra setiawan"; // Pastikan nama DB sesuai dengan yang Anda buat di phpMyAdmin

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
