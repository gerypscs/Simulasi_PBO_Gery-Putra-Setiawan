<?php
require_once 'Pendaftaran.php';
require_once 'koneksi.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik kelas anak (Tahap 4)
    private $jenis_prestasi;
    private $tingkat_prestasi;

    // Constructor Kelas Anak
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $jenis_prestasi, $tingkat_prestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->jenis_prestasi = $jenis_prestasi;
        $this->tingkat_prestasi = $tingkat_prestasi;
    }

    // Tahap 5: Method Overriding Perhitungan Biaya Jalur Prestasi (Potongan Rp50.000)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    // Implementasi menampilkan info spesifik (Tahap 3 & 4)
    public function tampilkanInfoSpesifik() {
        echo "=== FASILITAS JALUR PRESTASI ===<br>";
        echo "Jenis Prestasi: " . $this->jenis_prestasi . "<br>";
        echo "Tingkat Prestasi: " . $this->tingkat_prestasi . "<br>";
        echo "---------------------------------<br>";
    }

    // Metode Tambahan: Mengambil data khusus jalur Prestasi dari database
    public static function ambilDataPrestasi($koneksi) {
        $daftar = [];
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $result = mysqli_query($koneksi, $query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $daftar[] = new PendaftaranPrestasi(
                    $row['id_pendaftaran'],
                    $row['nama_calon'],
                    $row['asal_sekolah'],
                    $row['nilai_ujian'],
                    $row['biaya_pendaftaran_dasar'],
                    $row['jenis_prestasi'],
                    $row['tingkat_prestasi']
                );
            }
        }
        return $daftar;
    }
}
?>
