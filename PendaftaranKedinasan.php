<?php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    private $sk_ikatan_dinas;
    private $instansi_sponsor;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $sk_ikatan_dinas, $instansi_sponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->sk_ikatan_dinas = $sk_ikatan_dinas;
        $this->instansi_sponsor = $instansi_sponsor;
    }

    // Method Overriding Perhitungan Biaya Surcharge 50%
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.50;
    }

    public function tampilkanInfoSpesifik() {
        echo "=== FASILITAS JALUR KEDINASAN ===<br>";
        echo "SK Ikatan Dinas: " . $this->sk_ikatan_dinas . "<br>";
        echo "Instansi Sponsor: " . $this->instansi_sponsor . "<br>";
        echo "----------------------------------<br>";
    }

    // Metode Query database untuk menarik data Jalur Kedinasan
    public static function ambilDataKedinasan($koneksi) {
        $daftar = [];
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $result = mysqli_query($koneksi, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $daftar[] = new PendaftaranKedinasan(
                    $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'],
                    $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'],
                    $row['sk_ikatan_dinas'], $row['instansi_sponsor']
                );
            }
        }
        return $daftar;
    }
}
?>