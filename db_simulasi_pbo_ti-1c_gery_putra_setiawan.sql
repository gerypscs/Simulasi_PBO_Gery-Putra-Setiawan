-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2026 at 04:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti-1c_gery putra setiawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` varchar(50) NOT NULL,
  `nama_calon` varchar(255) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
('PMB-KDN-001', 'Oki Setiana', 'SMAN 1 Balikpapan', 88.00, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KED-2026-01', 'Kementerian Kominfo'),
('PMB-KDN-002', 'Prabowo Subianto', 'SMA Taruna Nusantara', 84.50, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KED-2026-02', 'Kementerian Pertahanan'),
('PMB-KDN-003', 'Rini Soemarno', 'SMAN 7 Jakarta', 87.00, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KED-2026-03', 'Kementerian BUMN'),
('PMB-KDN-004', 'Sandiaga Uno', 'SMA Pangudi Luhur', 90.50, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KED-2026-04', 'Kemenparekraf'),
('PMB-KDN-005', 'Tito Karnavian', 'SMA 2 Palembang', 82.30, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KED-2026-05', 'Kementerian Dalam Negeri'),
('PMB-KDN-006', 'Umar Lubis', 'MAN 2 Makassar', 86.00, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KED-2026-06', 'Kementerian Agama'),
('PMB-PRS-001', 'Hendra Setiawan', 'SMAN 10 Medan', 95.00, 200000.00, 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
('PMB-PRS-002', 'Indah Permata', 'SMA 2 Padang', 90.00, 200000.00, 'Prestasi', NULL, NULL, 'Bulutangkis Tunggal', 'Provinsi', NULL, NULL),
('PMB-PRS-003', 'Joko Widodo', 'SMK 1 Solo', 93.50, 200000.00, 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Nasional', NULL, NULL),
('PMB-PRS-004', 'Kevin Sanjaya', 'SMA Nusantara', 89.00, 200000.00, 'Prestasi', NULL, NULL, 'Tenis Meja', 'Nasional', NULL, NULL),
('PMB-PRS-005', 'Lesti Kejora', 'SMAN 1 Cianjur', 86.50, 200000.00, 'Prestasi', NULL, NULL, 'Menyanyi Solo', 'Nasional', NULL, NULL),
('PMB-PRS-006', 'Megawati', 'SMA 1 Denpasar', 91.00, 200000.00, 'Prestasi', NULL, NULL, 'Debat Bahasa Inggris', 'Provinsi', NULL, NULL),
('PMB-PRS-007', 'Nadiem Makarim', 'SMA Internasional', 96.00, 200000.00, 'Prestasi', NULL, NULL, 'Startup Hackathon', 'Internasional', NULL, NULL),
('PMB-REG-001', 'Andi Wijaya', 'SMAN 1 Jakarta', 85.50, 300000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
('PMB-REG-002', 'Budi Santoso', 'SMK 2 Bandung', 78.00, 300000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
('PMB-REG-003', 'Citra Lestari', 'SMA 3 Yogyakarta', 92.10, 300000.00, 'Reguler', 'Ilmu Komputer', 'Kampus Cabang', NULL, NULL, NULL, NULL),
('PMB-REG-004', 'Dedi Kurniawan', 'SMAN 5 Surabaya', 80.00, 300000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
('PMB-REG-005', 'Eka Putri', 'SMA Terpadu', 88.45, 300000.00, 'Reguler', 'Sistem Informasi', 'Kampus Cabang', NULL, NULL, NULL, NULL),
('PMB-REG-006', 'Fahri Hamzah', 'MAN 1 Semarang', 75.20, 300000.00, 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
('PMB-REG-007', 'Gita Gutawa', 'SMA Taruna', 83.00, 300000.00, 'Reguler', 'Ilmu Komputer', 'Kampus Utama', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
