-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2021 at 03:04 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs-pemkot`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_pasien`
--

CREATE TABLE `ms_pasien` (
  `ID` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tarif_biaya` int(11) NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_pasien`
--

INSERT INTO `ms_pasien` (`ID`, `nik`, `nama_lengkap`, `jenis_kelamin`, `kelas`, `tarif_biaya`, `jumlah_hari`, `total_tagihan`) VALUES
(5, 2147483647, 'Rudy Raharjo', 'Laki - Laki', 2, 234000, 4, 936000),
(7, 2147483647, 'Raharjo', 'Laki - Laki', 2, 450000, 3, 1350000);

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE `ms_user` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `provinsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`id`, `email`, `password`, `role_id`, `name`, `created_date`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `is_deleted`) VALUES
(1, 'rraharjo.rudy@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 'admin', '2021-01-11 12:22:50', '', 'KOTA AMBON', '', '', 0),
(4, 'tono@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 'tono', '2020-07-11 16:07:44', 'MALUKU', 'KOTA AMBON', 'LEITIMUR SELATAN', 'NAKU', 0),
(5, 'test@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 'tedt', '2020-07-19 17:00:00', 'JAWA TIMUR', 'KABUPATEN MAGETAN', 'SIDOREJO', 'SUMBERSAWIT', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_pasien`
--
ALTER TABLE `ms_pasien`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_pasien`
--
ALTER TABLE `ms_pasien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ms_user`
--
ALTER TABLE `ms_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
