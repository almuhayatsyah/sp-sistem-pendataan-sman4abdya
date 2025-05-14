-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 07:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sman4abdya`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `wali_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `wali_kelas`) VALUES
(5, 'XII IPA 1', NULL),
(6, 'XII IPA 2', NULL),
(7, 'XII E1', NULL),
(8, 'XII E2', NULL),
(9, 'XII IPS', NULL),
(10, 'XI IPA 1', NULL),
(11, 'XI IPA 2', NULL),
(12, 'XI E1', NULL),
(13, 'XI E2', NULL),
(14, 'XI IPS', NULL),
(15, 'X IPA 1', NULL),
(16, 'X IPA 2', NULL),
(17, 'X E1', NULL),
(18, 'X E2', NULL),
(19, 'X IPS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `aktivitas` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `nisn` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `alamat` text DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `gaji` decimal(10,2) NOT NULL DEFAULT 0.00,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL COMMENT 'ID unik untuk setiap siswa',
  `nisn` varchar(20) NOT NULL COMMENT 'Nomor Induk Siswa Nasional, harus unik',
  `kelas_id` int(11) DEFAULT NULL,
  `nama_siswa` varchar(100) NOT NULL COMMENT 'Nama lengkap siswa',
  `tanggal_lahir` varchar(200) DEFAULT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL COMMENT 'Jenis kelamin siswa (Laki-laki/Perempuan)',
  `alamat` text NOT NULL COMMENT 'Alamat tempat tinggal siswa',
  `agama` varchar(20) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `nomor_hp` int(11) DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL,
  `foto_rumah` varchar(255) NOT NULL,
  `status_kurang_mampu` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'jika 1 (kurang mampu), jika ) (tidak kurang mampu)\r\n',
  `ortu_id` int(11) DEFAULT NULL,
  `lokasi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `kelas_id`, `nama_siswa`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `alamat`, `agama`, `umur`, `nomor_hp`, `foto_siswa`, `foto_rumah`, `status_kurang_mampu`, `ortu_id`, `lokasi_id`) VALUES
(1, '3073556990', 17, 'ABDUL AZIS', '2007-03-13', '', 'Laki-laki', 'KAMPUNG TENGAH, SERBA GUNA,KAMPUNG TENGAH', 'Islam', 17, 2147483647, NULL, '', 0, NULL, NULL),
(2, '0069645076', 9, 'ADIRA PUTRI AGUSTIN PRATAMA', '2006-08-28', '', 'Perempuan', 'Kuala Terubu,KUALA TERUBUE, Kec. Kuala Batee', 'Islam', 17, 2147483647, NULL, '', 1, NULL, NULL),
(3, '0097102574', NULL, 'ADITHIA DWI SAPUTRA', '2009-11-24', '', 'Laki laki', 'Blang Panyang, Dusun SIngosari, Blang Panyang, Kec. Kuala Batee', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(4, '0099680609', NULL, 'AFDHALUL MUTAQIN', '2009-05-19', '', 'Laki laki', 'Alue Padee, Dusun Sukadamai, Alue Padee, Kec. Kuala Batee', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(5, '0094534447', NULL, 'AFIF HAWARI', '2009-11-04', '', 'Laki laki', 'Kampung Tengah, Alue Diwi, Kampung Tengah, Kec. Kuala Batee', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(6, '0081905080', NULL, 'AGUS WANDA', '2008-08-11', '', 'Laki laki', 'ALUE PADEE, Alue Diwi, Alue Padee, Kec, Kuala Batee', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(7, '3067541255', NULL, 'AHMAD GHAFFARIL AKBAR', '2006-09-15', '', 'Laki laki', 'Alue Padee, Alue Diwi, Alue Padee, Kec, Kuala Batee', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(8, '0071322991', NULL, 'AHMAD KHADAFI', '2007-07-28', '', 'Laki laki', 'Lhok Gajah, lhok gajah, Lhok gajah, Kec, Kuala Batee', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(9, '3083008665', NULL, 'AIDIL UMAMI', '2008-09-09', '', 'Laki laki', 'Kampung Tengah, Lhok Gajah, Kec, Kuala Batee', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(10, '0087669782', NULL, 'AKIL MUBARAQ BARUDDIN', '2008-10-03', '', 'Laki laki', 'Alue Padee, Suka Damai, Aluee Padee, Kec, Kuala Batee', 'Islam', NULL, NULL, NULL, '', 0, NULL, NULL),
(11, '0085657751', NULL, 'Aldi Magribi', '2008-04-22', '', 'Laki laki', 'Jalan Nasional Meulaboh-Blang Pidie', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(12, '0067608132', NULL, 'ALFILA JIHAT', '2007-10-20', '', 'Laki laki', 'Jalan Nasional Meulaboh-Blang Pidie', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(13, '0076603934', NULL, 'AMELIA RASYA', '2006-12-13', '', 'Perempuan', 'DUSUN ALUE DIWIE', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(14, '0093359626', NULL, 'Andi', '2009-06-01', '', 'Laki laki', 'Jalan Dusun Sukadamai', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(15, '0086480780', NULL, 'Andika Pratama', '2008-01-25', '', 'Laki laki', 'Irigasi', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(16, '0088652936', NULL, 'Andreo Reonaldi', '2008-10-11', '', 'Laki laki', 'Poriaha-Aloban', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(17, '3075438336', NULL, 'Andyka Pratama', '2007-06-16', '', 'Laki laki', 'Serba Guna', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(18, '0072008244', NULL, 'ANGGA AULIYA', '2007-08-03', '', 'Laki laki', 'Jalan Nasional Meulaboh-Blang Pidie', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(19, '0071885627', NULL, 'ANGGA TURRAHMAN', '2007-11-25', '', 'Laki laki', 'DUSUN TENGAH', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL),
(20, '0087446541', NULL, 'Arief Faudhan', '2008-09-12', '', 'Laki laki', 'Alue Padee', 'Islam', NULL, NULL, NULL, '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('operator','kesiswaan','pengunjung') NOT NULL DEFAULT 'operator',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(4, 'operator@gmail.com', '$2y$10$372WAXiETtUmRfFOeUtRgum9V41JZaOb50Qvpno5YhuY83er2w7mu', 'operator', '2025-05-03 12:48:56', '2025-05-03 12:54:17'),
(12, 'pengunjung1', '$2y$10$RivIf46zSsQi8eZ9fJH8JuK3ri.p17B26B/Db8FtFWnL2CXXH2.72', 'operator', '2025-05-03 17:55:34', '2025-05-03 17:55:34'),
(17, 'pengunjung2', '$2y$10$4uHe2t7fmVjpXppKgpRRmubVR4tU9x8br4.X/b.DKMYSjJNHhlahq', 'pengunjung', '2025-05-03 12:20:08', '2025-05-03 12:20:08'),
(18, 'kesiswaan', '$2y$10$JUWQBv2cT8AR/w3cxHFZhu1LIljhfl0tmz8XIkatoa0oBMMKbV.gS', 'kesiswaan', '2025-05-03 13:49:42', '2025-05-03 13:49:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nisn` (`nisn`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `fk_siswa_ortu` (`ortu_id`),
  ADD KEY `fk_siswa_lokasi` (`lokasi_id`),
  ADD KEY `fk_kelas` (`kelas_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID unik untuk setiap siswa', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_nisn` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `ortu`
--
ALTER TABLE `ortu`
  ADD CONSTRAINT `fk_id_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `fk_siswa_lokasi` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`),
  ADD CONSTRAINT `fk_siswa_ortu` FOREIGN KEY (`ortu_id`) REFERENCES `ortu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
