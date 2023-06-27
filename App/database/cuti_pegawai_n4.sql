-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 08:12 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(4) NOT NULL,
  `user_admin` varchar(20) NOT NULL,
  `pass_admin` varchar(20) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `telp_admin` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user_admin`, `pass_admin`, `nip`, `nama`, `telp_admin`, `jenis_kelamin`) VALUES
(1, 'admin_cornelius', 'admin_cornelius', '23943450042023', 'Cornelius de Houtman', '089993939', 'laki-laki'),
(2, 'admin_alphonso', 'admin_alphonso', '2209000002023', 'Alphonso de Albuquerque', '08746611132', 'Perempuan'),
(5, 'admin_stepanus', 'admin_stepanus', '87487418924789', 'Stepanus', '0809830232', 'laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `id_jeniscuti` int(5) NOT NULL,
  `jenis_cuti` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`id_jeniscuti`, `jenis_cuti`) VALUES
(1, 'Cuti Melahirkan'),
(2, 'Cuti Sakit'),
(3, 'Cuti Tahunan'),
(4, 'Cuti Liburan'),
(8, 'cuti lembur');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_dinas`
--

CREATE TABLE `kepala_dinas` (
  `id_kpldinas` int(5) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala_dinas`
--

INSERT INTO `kepala_dinas` (`id_kpldinas`, `nip`, `nama`, `username`, `password`) VALUES
(1, '1083721452022', 'Prof. Dr. H. Christopher Khan O Columbus, Ph.D', 'super_admin', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `jumlah_cuti` int(11) NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `username`, `password`, `telp`, `jumlah_cuti`, `foto`) VALUES
(1, '9983823632023', 'Maria Yuryevna Sharapova', 'mariasharapova', 'mariasharapova', '9999923201022', 12, ''),
(2, '238446530012023', 'Lewis Hammilton', 'lewishammilton', 'lewishammilton', '09375757213', 12, ''),
(3, '23885013572023', 'Alexander Zyelinsky', 'alexander', 'alexander', '0774284881000', 12, ''),
(4, '8000000000000', 'Emilia Clarke', 'emiliaclarke', 'emiliaclarke', '0998212121', 12, ''),
(6, '232347379002020', 'Squwilliam Percycents', 'william', 'william', '06463829939012', 12, 'f1685769460.jpg'),
(7, '9933322211', 'Alejandro Garnacho', 'alejandro', 'alejandro', '0823333333', 12, ''),
(8, '873882138', 'Presnell Kimpembe', 'kimpembe', 'kimpembe', '08233312333', 12, 'f1685769140.png'),
(9, '337491292039', 'Facyuu Ezequiel', 'ezequiel', 'ezequiel', '08948398942', 12, 'f1687530896.png');

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
(41, '3', '6', '25-06-2023', '2023-06-26', '2023-06-30', 'capek', 'ditolak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`id_jeniscuti`);

--
-- Indexes for table `kepala_dinas`
--
ALTER TABLE `kepala_dinas`
  ADD PRIMARY KEY (`id_kpldinas`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  MODIFY `id_jeniscuti` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kepala_dinas`
--
ALTER TABLE `kepala_dinas`
  MODIFY `id_kpldinas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
