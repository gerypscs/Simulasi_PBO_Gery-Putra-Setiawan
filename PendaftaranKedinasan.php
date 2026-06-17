<?php
require_once 'Pendaftaran.php';
require_once 'koneksi.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik kelas anak (Tahap 4)
    private $sk_ikatan_dinas;
    private $instansi_sponsor;

    // Constructor Kelas Anak
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $sk_ikatan_dinas, $instansi_sponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->sk_ikatan_dinas = $sk_ikatan_dinas;
        $this->instansi_sponsor = $instansi_sponsor;
    }

    // Tahap 5: Method Overriding Perhitungan Biaya Jalur Kedinasan (Surcharge 25%)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    // Implementasi menampilkan info spesifik (Tahap 3 & 4)
    public function tampilkanInfoSpesifik() {
        echo "=== FASILITAS JALUR KEDINASAN ===<br>";
        echo "SK Ikatan Dinas: " . $this->sk_ikatan_dinas . "<br>";
        echo "Instansi Sponsor: " . $this->instansi_sponsor . "<br>";
        echo "----------------------------------<br>";
    }

    // Metode Tambahan: Mengambil data khusus jalur Kedinasan dari database
    public static function ambilDataKedinasan($koneksi) {
        $daftar = [];
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $result = mysqli_query($koneksi, $query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $daftar[] = new PendaftaranKedinasan(
                    $row['id_pendaftaran'],
                    $row['nama_calon'],
                    $row['asal_sekolah'],
                    $row['nilai_ujian'],
                    $row['biaya_pendaftaran_dasar'],
                    $row['sk_ikatan_dinas'],
                    $row['instansi_sponsor']
                );
            }
        }
        return $daftar;
    }
}
?>
