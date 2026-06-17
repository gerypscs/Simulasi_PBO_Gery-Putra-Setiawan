<?php
require_once 'koneksi.php';
require_once 'Pendaftaran.php'; // WAJIB DIPANGGIL SEBELUM KELAS ANAK NYA!
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

$dataReguler   = PendaftaranReguler::ambilDataReguler($koneksi);
$dataPrestasi  = PendaftaranPrestasi::ambilDataPrestasi($koneksi);
$dataKedinasan = PendaftaranKedinasan::ambilDataKedinasan($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi PMB Jalur Spesifik</title>
    <style>
        body { font-family: sans-serif; margin: 30px; background-color: #f8f9fa; }
        h1 { text-align: center; color: #2c3e50; }
        h2 { color: #2980b9; margin-top: 30px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; background: #fff; }
        th { background-color: #2c3e50; color: white; padding: 10px; text-align: left; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        .badge { background-color: #e8f4fd; color: #2b6cb0; padding: 5px; border-radius: 4px; display: inline-block; }
    </style>
</head>
<body>

    <h1>Daftar Pendaftaran Mahasiswa Baru (PMB)</h1>

    <h2>1. Jalur Reguler</h2>
    <table>
        <tr>
            <th>ID Daftar</th><th>Nama Calon</th><th>Asal Sekolah</th><th>Nilai</th><th>Atribut Unik</th><th>Total Biaya</th>
        </tr>
        <?php foreach ($dataReguler as $reg): ?>
        <tr>
            <td><?= $reg->getIdPendaftaran(); ?></td>
            <td><?= $reg->getNamaCalon(); ?></td>
            <td><?= $reg->getAsalSekolah(); ?></td>
            <td><?= $reg->getNilaiUjian(); ?></td>
            <td><div class="badge"><?php $reg->tampilkanInfoJalur(); ?></div></td>
            <td><b>Rp <?= number_format($reg->hitungTotalBiaya(), 0, ',', '.'); ?></b></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>2. Jalur Prestasi</h2>
    <table>
        <tr>
            <th>ID Daftar</th><th>Nama Calon</th><th>Asal Sekolah</th><th>Nilai</th><th>Atribut Unik</th><th>Total Biaya</th>
        </tr>
        <?php foreach ($dataPrestasi as $prs): ?>
        <tr>
            <td><?= $prs->getIdPendaftaran(); ?></td>
            <td><?= $prs->getNamaCalon(); ?></td>
            <td><?= $prs->getAsalSekolah(); ?></td>
            <td><?= $prs->getNilaiUjian(); ?></td>
            <td><div class="badge"><?php $prs->tampilkanInfoJalur(); ?></div></td>
            <td><b>Rp <?= number_format($prs->hitungTotalBiaya(), 0, ',', '.'); ?></b></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>3. Jalur Kedinasan</h2>
    <table>
        <tr>
            <th>ID Daftar</th><th>Nama Calon</th><th>Asal Sekolah</th><th>Nilai</th><th>Atribut Unik</th><th>Total Biaya</th>
        </tr>
        <?php foreach ($dataKedinasan as $kdn): ?>
        <tr>
            <td><?= $kdn->getIdPendaftaran(); ?></td>
            <td><?= $kdn->getNamaCalon(); ?></td>
            <td><?= $kdn->getAsalSekolah(); ?></td>
            <td><?= $kdn->getNilaiUjian(); ?></td>
            <td><div class="badge"><?php $kdn->tampilkanInfoJalur(); ?></div></td>
            <td><b>Rp <?= number_format($kdn->hitungTotalBiaya(), 0, ',', '.'); ?></b></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
