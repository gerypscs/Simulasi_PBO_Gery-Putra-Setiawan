<?php
require_once 'koneksi.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// Mengambil data dari database menggunakan metode statis
$dataReguler   = PendaftaranReguler::ambilDataReguler($koneksi);
$dataPrestasi  = PendaftaranPrestasi::ambilDataPrestasi($koneksi);
$dataKedinasan = PendaftaranKedinasan::ambilDataKedinasan($koneksi);

// Gabungkan seluruh objek ke dalam satu array untuk membuktikan Polimorfisme
$semuapendaftaran = array_merge($dataReguler, $dataPrestasi, $dataKedinasan);

echo "<h1>SISTEM MANAJEMEN PENDAFTARAN MAHASISWA BARU (PMB)</h1>";

foreach ($semuapendaftaran as $maba) {
    echo "ID Daftar: " . $maba->getIdPendaftaran() . "<br>";
    echo "Nama Calon: " . $maba->getNamaCalon() . "<br>";
    echo "Asal Sekolah: " . $maba->getAsalSekolah() . "<br>";
    echo "Nilai Ujian: " . $maba->getNilaiUjian() . "<br>";
    echo "Biaya Dasar: Rp " . number_format($maba->getBiayaPendaftaranDasar(), 0, ',', '.') . "<br>";
    echo "Total Biaya (Setelah Aturan Jalur): Rp " . number_format($maba->hitungTotalBiaya(), 0, ',', '.') . "<br>";
    
    // Memanggil info unik masing-masing subclass (Polimorfisme)
    $maba->tampilkanInfoSpesifik();
    echo "<br>";
}
?>