<?php
// index.php

// 1. Load semua file yang dibutuhkan
require_once 'koneksi.php';
require_once 'PendaftaranRegular.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 2. Inisialisasi koneksi database
$koneksi = new Database();
$db = $koneksi->getConnection();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Pendaftaran Mahasiswa Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        h2 { color: #2980b9; border-bottom: 2px solid #2980b9; padding-bottom: 5px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #2980b9; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .info-jalur { font-style: italic; color: #555; }
        .harga { font-weight: bold; color: #27ae60; }
    </style>
</head>
<body>

    <h1>Sistem Manajemen Pendaftaran Mahasiswa Baru (PMB)</h1>

    <h2>Daftar Pendaftaran - Jalur Reguler</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Info Spesifik Jalur</th>
                <th>Total Biaya Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mengambil data menggunakan metode query spesifik Tahap 4
            $dataReguler = PendaftaranReguler::getDaftarReguler($db);
            
            if (count($dataReguler) > 0) {
                foreach ($dataReguler as $row) {
                    // Instansiasi objek secara dinamis untuk memanfaatkan polimorfisme
                    $objek = new PendaftaranReguler(
                        $row['id_pendaftaran'],
                        $row['nama_calon'],
                        $row['asal_sekolah'],
                        $row['nilai_ujian'],
                        $row['biaya_pendaftaran_dasar'],
                        $row['pilihan_prodi'],
                        $row['lokasi_kampus']
                    );
                    ?>
                    <tr>
                        <td><?= $row['id_pendaftaran']; ?></td>
                        <td><?= htmlspecialchars($row['nama_calon']); ?></td>
                        <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                        <td><?= $row['nilai_ujian']; ?></td>
                        <td>Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                        <td class="info-jalur"><?php $objek->tampilkanInfoJalur(); ?></td>
                        <td class="harga">Rp <?= number_format($objek->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Tidak ada data jalur Reguler.</td></tr>";
            }
            ?>
        </tbody>
    </table>


    <h2>Daftar Pendaftaran - Jalur Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Info Spesifik Jalur</th>
                <th>Total Biaya Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
            
            if (count($dataPrestasi) > 0) {
                foreach ($dataPrestasi as $row) {
                    $objek = new PendaftaranPrestasi(
                        $row['id_pendaftaran'],
                        $row['nama_calon'],
                        $row['asal_sekolah'],
                        $row['nilai_ujian'],
                        $row['biaya_pendaftaran_dasar'],
                        $row['jenis_prestasi'],
                        $row['tingkat_prestasi']
                    );
                    ?>
                    <tr>
                        <td><?= $row['id_pendaftaran']; ?></td>
                        <td><?= htmlspecialchars($row['nama_calon']); ?></td>
                        <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                        <td><?= $row['nilai_ujian']; ?></td>
                        <td>Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                        <td class="info-jalur"><?php $objek->tampilkanInfoJalur(); ?></td>
                        <td class="harga">Rp <?= number_format($objek->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Tidak ada data jalur Prestasi.</td></tr>";
            }
            ?>
        </tbody>
    </table>


    <h2>Daftar Pendaftaran - Jalur Kedinasan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Info Spesifik Jalur</th>
                <th>Total Biaya Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
            
            if (count($dataKedinasan) > 0) {
                foreach ($dataKedinasan as $row) {
                    $objek = new PendaftaranKedinasan(
                        $row['id_pendaftaran'],
                        $row['nama_calon'],
                        $row['asal_sekolah'],
                        $row['nilai_ujian'],
                        $row['biaya_pendaftaran_dasar'],
                        $row['sk_ikatan_dinas'],
                        $row['instansi_sponsor']
                    );
                    ?>
                    <tr>
                        <td><?= $row['id_pendaftaran']; ?></td>
                        <td><?= htmlspecialchars($row['nama_calon']); ?></td>
                        <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                        <td><?= $row['nilai_ujian']; ?></td>
                        <td>Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                        <td class="info-jalur"><?php $objek->tampilkanInfoJalur(); ?></td>
                        <td class="harga">Rp <?= number_format($objek->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Tidak ada data jalur Kedinasan.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
