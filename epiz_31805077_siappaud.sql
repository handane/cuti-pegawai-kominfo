-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql107.byetcluster.com
-- Generation Time: May 25, 2022 at 01:07 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31805077_siappaud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_peserta_didik`
--

CREATE TABLE `admin_peserta_didik` (
  `id_peserta` int(10) NOT NULL,
  `L12` int(5) NOT NULL,
  `P12` int(5) NOT NULL,
  `L3` int(5) NOT NULL,
  `P3` int(5) NOT NULL,
  `L4` int(5) NOT NULL,
  `P4` int(5) NOT NULL,
  `L56` int(5) NOT NULL,
  `P56` int(5) NOT NULL,
  `pindah_masuk` int(5) NOT NULL,
  `pindah_keluar` int(5) NOT NULL,
  `baru` int(5) NOT NULL,
  `berhenti` int(5) NOT NULL,
  `tanggal_kirim` datetime NOT NULL,
  `bulan` varchar(25) NOT NULL,
  `tahun` int(5) NOT NULL,
  `id_author` int(5) NOT NULL,
  `id_laporan` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_sarana_dan_prasarana`
--

CREATE TABLE `admin_sarana_dan_prasarana` (
  `id_prasarana` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `status_kepemilikan` varchar(110) NOT NULL,
  `kondisi` varchar(110) NOT NULL,
  `id_author` int(5) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(5) NOT NULL,
  `id_laporan` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tenaga_pendidik`
--

CREATE TABLE `admin_tenaga_pendidik` (
  `id` int(10) NOT NULL,
  `nama_pendidik` varchar(55) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` varchar(25) NOT NULL,
  `pendidikan_terakhir` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tanggal_mulai_tugas` varchar(50) NOT NULL,
  `jabatan` varchar(55) NOT NULL,
  `id_author` int(10) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(5) NOT NULL,
  `id_laporan` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_lainnya`
--

CREATE TABLE `kegiatan_lainnya` (
  `id_kegiatan_lainnya` int(10) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `foto_1` varchar(55) NOT NULL,
  `foto_2` varchar(55) NOT NULL,
  `foto_3` varchar(55) NOT NULL,
  `foto_4` varchar(55) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` int(5) NOT NULL,
  `id_author` int(10) NOT NULL,
  `id_laporan` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_pembelajaran`
--

CREATE TABLE `kegiatan_pembelajaran` (
  `id_pembelajaran` int(10) NOT NULL,
  `bentuk_kbm` varchar(55) NOT NULL,
  `jumlah_hari_kbm` varchar(25) NOT NULL,
  `jumlah_hari_kerja` varchar(25) NOT NULL,
  `kehadiran_peserta` varchar(25) NOT NULL,
  `kehadiran_pegawai` varchar(25) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` int(5) NOT NULL,
  `id_author` int(10) NOT NULL,
  `id_laporan` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegitan_pembelajaran_foto`
--

CREATE TABLE `kegitan_pembelajaran_foto` (
  `id_foto` int(11) NOT NULL,
  `foto_1` varchar(55) NOT NULL,
  `foto_2` varchar(55) NOT NULL,
  `foto_3` varchar(55) NOT NULL,
  `foto_4` varchar(55) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` int(5) NOT NULL,
  `id_author` int(10) NOT NULL,
  `id_laporan` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `koderegistrasi`
--

CREATE TABLE `koderegistrasi` (
  `koderegistrasi` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koderegistrasi`
--

INSERT INTO `koderegistrasi` (`koderegistrasi`) VALUES
('daftar2022');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_didik`
--

CREATE TABLE `peserta_didik` (
  `id_peserta` int(5) NOT NULL,
  `L12` int(25) NOT NULL,
  `P12` int(25) NOT NULL,
  `L3` int(25) NOT NULL,
  `P3` int(11) NOT NULL,
  `L4` int(11) NOT NULL,
  `P4` int(11) NOT NULL,
  `L56` int(25) NOT NULL,
  `P56` int(25) NOT NULL,
  `pindah_masuk` int(5) NOT NULL,
  `pindah_keluar` int(5) NOT NULL,
  `baru` int(5) NOT NULL,
  `berhenti` int(5) NOT NULL,
  `id_author` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sarana_dan_prasarana`
--

CREATE TABLE `sarana_dan_prasarana` (
  `id_prasarana` int(11) NOT NULL,
  `jenis` varchar(55) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `status_kepemilikan` varchar(110) NOT NULL,
  `kondisi` varchar(110) NOT NULL,
  `id_author` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_sarana`
--

CREATE TABLE `tabel_sarana` (
  `id` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_sarana`
--

INSERT INTO `tabel_sarana` (`id`, `jenis`) VALUES
(1, 'Ruang Kelas'),
(2, 'Ruang Guru'),
(3, 'Ruang Kepala'),
(4, 'Ruang UKS'),
(5, 'Toilet Murid'),
(6, 'Toilet Guru'),
(7, 'Toilet Kepala'),
(8, 'Ruang Gudang'),
(9, 'Ruang Bermain'),
(10, 'Ruang Sirkulasi/ Lobi'),
(11, 'Ruang Dapur'),
(12, 'Halaman'),
(13, 'Kebun'),
(14, 'Tiang Bendera'),
(15, 'Parkir/ Garasi'),
(16, 'APE Luar Ruangan');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_pendidik`
--

CREATE TABLE `tenaga_pendidik` (
  `id_tenaga_pendidik` int(10) NOT NULL,
  `nama_pendidik` varchar(55) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_mulai_tugas` varchar(50) NOT NULL,
  `jabatan` varchar(55) NOT NULL,
  `id_author` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_author` int(10) NOT NULL,
  `nama_paud` varchar(50) NOT NULL,
  `npsn` varchar(50) NOT NULL,
  `no_perijinan` varchar(55) NOT NULL,
  `dikeluarkan_tanggal` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `akreditasi` varchar(10) NOT NULL,
  `no_sk_akreditasi` varchar(25) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `atas_nama` varchar(55) NOT NULL,
  `pengelola` varchar(55) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `admin_peserta_didik`
--
ALTER TABLE `admin_peserta_didik`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `admin_sarana_dan_prasarana`
--
ALTER TABLE `admin_sarana_dan_prasarana`
  ADD PRIMARY KEY (`id_prasarana`);

--
-- Indexes for table `admin_tenaga_pendidik`
--
ALTER TABLE `admin_tenaga_pendidik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_lainnya`
--
ALTER TABLE `kegiatan_lainnya`
  ADD PRIMARY KEY (`id_kegiatan_lainnya`);

--
-- Indexes for table `kegiatan_pembelajaran`
--
ALTER TABLE `kegiatan_pembelajaran`
  ADD PRIMARY KEY (`id_pembelajaran`);

--
-- Indexes for table `kegitan_pembelajaran_foto`
--
ALTER TABLE `kegitan_pembelajaran_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `peserta_didik`
--
ALTER TABLE `peserta_didik`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `sarana_dan_prasarana`
--
ALTER TABLE `sarana_dan_prasarana`
  ADD PRIMARY KEY (`id_prasarana`);

--
-- Indexes for table `tabel_sarana`
--
ALTER TABLE `tabel_sarana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenaga_pendidik`
--
ALTER TABLE `tenaga_pendidik`
  ADD PRIMARY KEY (`id_tenaga_pendidik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_author`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_peserta_didik`
--
ALTER TABLE `admin_peserta_didik`
  MODIFY `id_peserta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `admin_sarana_dan_prasarana`
--
ALTER TABLE `admin_sarana_dan_prasarana`
  MODIFY `id_prasarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1245;

--
-- AUTO_INCREMENT for table `admin_tenaga_pendidik`
--
ALTER TABLE `admin_tenaga_pendidik`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;

--
-- AUTO_INCREMENT for table `kegiatan_lainnya`
--
ALTER TABLE `kegiatan_lainnya`
  MODIFY `id_kegiatan_lainnya` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `kegiatan_pembelajaran`
--
ALTER TABLE `kegiatan_pembelajaran`
  MODIFY `id_pembelajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `kegitan_pembelajaran_foto`
--
ALTER TABLE `kegitan_pembelajaran_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `peserta_didik`
--
ALTER TABLE `peserta_didik`
  MODIFY `id_peserta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sarana_dan_prasarana`
--
ALTER TABLE `sarana_dan_prasarana`
  MODIFY `id_prasarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tabel_sarana`
--
ALTER TABLE `tabel_sarana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tenaga_pendidik`
--
ALTER TABLE `tenaga_pendidik`
  MODIFY `id_tenaga_pendidik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_author` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
