-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2026 at 07:44 AM
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
-- Database: `spk_prioritas`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` int(11) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `lokasi_tanah` varchar(255) NOT NULL,
  `luas_tanah` double NOT NULL,
  `status_tanah` varchar(50) NOT NULL,
  `tanggal_pengajuan` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `nama_pemohon`, `nik`, `lokasi_tanah`, `luas_tanah`, `status_tanah`, `tanggal_pengajuan`) VALUES
(8, 'ADEL', '8132', 'WATANPONE', 3344, 'SHGB', '2025-06-28'),
(2, 'WAH', '72312', 'TOMPOE', 23, 'SHM', '2025-06-27'),
(3, 'SULTANN', '723122', 'TAKALALA', 6777, 'SHM', '2025-06-27'),
(4, 'SULTANN', '3456', 'TAKALALA', 456, 'SHGB', '2025-06-27'),
(7, 'wafiq', '77312', 'cogki', 234, 'SHGB', '2025-06-28'),
(9, 'wafiq', '7344', 'TOMPOE', 987, 'Girik', '2025-06-28'),
(10, 'YESIKA SYARIF', '731223457', 'LOMPULLE', 2876, 'SHGB', '2025-06-28'),
(11, 'AVRILIA QAUDY CYNDY', '72312456543', 'KAYANGAN', 8755, 'SHM', '2025-06-28'),
(12, 'SULTAN', '7312', 'WATANPONE', 1234, 'SHM', '2025-06-28'),
(13, 'RISKI AMELIA', '7231233444', 'CANGADI', 4645, 'SHM', '2025-06-28'),
(14, 'AFDAL', '7231278987', 'BALUBU', 243, 'SHGB', '2025-06-28'),
(15, 'ASNI', '723128896', 'LABAE', 5643, 'SHM', '2025-06-28'),
(16, 'NURWIDYA', '723129956', 'LEWORENG', 7654, 'SHM', '2025-06-28'),
(17, 'SULTANN', '', '', 0, '', '0000-00-00'),
(18, 'WAHYU ARYA', '723123434', 'TOMPOE', 345, 'SHGB', '2025-06-29'),
(19, 'RINA ANDRIYANI', '72312347788', 'GANRA', 19877, 'SHM', '2025-06-29'),
(20, 'WINDAH VEDINA', '72312', 'BELO', 345, 'SHM', '2025-06-30'),
(21, 'MUH. AJWA SUHAIL', '7231255889', 'CABBENGE', 582, 'SHGB', '2025-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(8) NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `kelengkapan_berkas` int(10) NOT NULL,
  `luas_tanah` decimal(10,2) NOT NULL,
  `status_tanah` varchar(100) NOT NULL,
  `lokasi_strategis` enum('Ya','Tidak') NOT NULL,
  `urgensi_pemohon` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_pemohon`, `nama_pemohon`, `kelengkapan_berkas`, `luas_tanah`, `status_tanah`, `lokasi_strategis`, `urgensi_pemohon`) VALUES
(1, 8, 'ADEL', 2, 3344.00, 'SHGB', 'Ya', 5),
(9, 14, 'AFDAL', 0, 243.00, 'SHGB', 'Ya', 2),
(8, 13, 'RISKI AMELIA', 4, 4645.00, 'SHM', 'Ya', 3),
(5, 10, 'YESIKA SYARIF', 4, 2876.00, 'SHGB', 'Tidak', 4),
(6, 11, 'AVRILIA QAUDY CYNDY', 4, 8755.00, 'SHM', 'Ya', 3),
(7, 12, 'SULTAN', 3, 1234.00, 'SHM', 'Tidak', 3),
(10, 15, 'ASNI', 4, 5643.00, 'SHM', 'Tidak', 3),
(11, 16, 'NURWIDYA', 4, 7654.00, 'SHM', 'Ya', 3),
(14, 18, 'WAHYU ARYA', 2, 345.00, 'SHGB', 'Ya', 2),
(15, 19, 'RINA ANDRIYANI', 5, 19877.00, 'SHM', 'Ya', 4),
(16, 20, 'WINDAH VEDINA', 4, 345.00, 'SHM', 'Ya', 3),
(17, 20, 'WINDAH VEDINA', 5, 345.00, 'SHM', 'Ya', 5),
(18, 21, 'MUH. AJWA SUHAIL', 3, 582.00, 'SHGB', 'Ya', 3),
(19, 8, 'ADEL', 2, 3344.00, 'SHGB', 'Ya', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
