<?php
require_once 'Pendaftaran.php';
require_once 'koneksi.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik kelas anak (Tahap 4)
    private $pilihan_prodi;
    private $lokasi_kampus;

    // Constructor Kelas Anak
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $pilihan_prodi, $lokasi_kampus) {
        // Memanggil constructor dari class induk (Pendaftaran)
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->pilihan_prodi = $pilihan_prodi;
        $this->lokasi_kampus = $lokasi_kampus;
    }

    // Tahap 5: Method Overriding Perhitungan Biaya Jalur Reguler
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    // Implementasi menampilkan info spesifik (Tahap 3 & 4)
    public function tampilkanInfoSpesifik() {
        echo "=== FASILITAS JALUR REGULER ===<br>";
        echo "Pilihan Prodi: " . $this->pilihan_prodi . "<br>";
        echo "Lokasi Kampus: " . $this->lokasi_kampus . "<br>";
        echo "--------------------------------<br>";
    }

    // Metode Tambahan: Mengambil data khusus jalur Reguler dari database
    public static function ambilDataReguler($koneksi) {
        $daftar = [];
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $result = mysqli_query($koneksi, $query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $daftar[] = new PendaftaranReguler(
                    $row['id_pendaftaran'],
                    $row['nama_calon'],
                    $row['asal_sekolah'],
                    $row['nilai_ujian'],
                    $row['biaya_pendaftaran_dasar'],
                    $row['pilihan_prodi'],
                    $row['lokasi_kampus']
                );
            }
        }
        return $daftar;
    }
}
?>
