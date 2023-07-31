-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 11:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuti_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(5) NOT NULL,
  `id_jeniscuti` varchar(5) NOT NULL,
  `id_pegawai` varchar(11) NOT NULL,
  `tgl_pengajuan` varchar(15) NOT NULL,
  `tgl_cuti` varchar(15) NOT NULL,
  `tgl_berakhir` varchar(25) NOT NULL,
  `alasan_cuti` varchar(111) NOT NULL,
  `status_cuti` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_jeniscuti`, `id_pegawai`, `tgl_pengajuan`, `tgl_cuti`, `tgl_berakhir`, `alasan_cuti`, `status_cuti`) VALUES
(42, '1', '9', '25-06-2023', '2023-06-26', '2023-06-30', 'hamil duluan', 'Disetujui'),
(44, '1', '10', '31-07-2023', '2023-07-31', '2023-08-02', 'FDSA', 'Disetujui'),
(45, '1', '10', '31-07-2023', '2023-08-01', '2023-08-05', 'nkjkjn', 'Menunggu Persetujuan'),
(46, '2', '10', '31-07-2023', '2023-08-01', '2023-08-04', 'gfhsf', 'Menunggu Persetujuan'),
(47, '3', '10', '31-07-2023', '2023-08-01', '2023-08-03', 'dsfafaf', 'Menunggu Persetujuan'),
(48, '1', '4', '31-07-2023', '2023-08-04', '2023-08-09', 'mau liburan', 'Menunggu Persetujuan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
