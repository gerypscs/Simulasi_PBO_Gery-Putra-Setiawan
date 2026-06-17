<?php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    private $jenis_prestasi;
    private $tingkat_prestasi;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $jenis_prestasi, $tingkat_prestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->jenis_prestasi = $jenis_prestasi;
        $this->tingkat_prestasi = $tingkat_prestasi;
    }

    // Method Overriding Perhitungan Biaya dengan Potongan Prestasi
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoSpesifik() {
        echo "=== FASILITAS JALUR PRESTASI ===<br>";
        echo "Jenis Prestasi: " . $this->jenis_prestasi . "<br>";
        echo "Tingkat Prestasi: " . $this->tingkat_prestasi . "<br>";
        echo "---------------------------------<br>";
    }

    // Metode Query database untuk menarik data Jalur Prestasi
    public static function ambilDataPrestasi($koneksi) {
        $daftar = [];
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $result = mysqli_query($koneksi, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $daftar[] = new PendaftaranPrestasi(
                    $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'],
                    $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'],
                    $row['jenis_prestasi'], $row['tingkat_prestasi']
                );
            }
        }
        return $daftar;
    }
}
?>
