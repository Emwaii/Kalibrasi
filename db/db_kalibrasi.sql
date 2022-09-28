-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 12:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kalibrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_kalibrasi`
--

CREATE TABLE `alat_kalibrasi` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(128) NOT NULL,
  `merk_alat` varchar(128) NOT NULL,
  `tipe_alat` varchar(128) NOT NULL,
  `noseri_alat` varchar(128) NOT NULL,
  `lokasi_alat` varchar(128) NOT NULL,
  `tglpengadaan_alat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alat_kalibrasi`
--

INSERT INTO `alat_kalibrasi` (`id_alat`, `nama_alat`, `merk_alat`, `tipe_alat`, `noseri_alat`, `lokasi_alat`, `tglpengadaan_alat`) VALUES
(1, 'proslide123123', 'asd-123', '123123', '123123', 'Radiologi', '2022-09-07'),
(3, 'proslide 123', 'asr123', 'asb123', '123232', 'kantor', '0000-00-00'),
(4, 'proslid11', '223asd', '2123asd', '12312342', 'kepo', '2012-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `brosur`
--

CREATE TABLE `brosur` (
  `id` int(11) NOT NULL,
  `nama_brosur` varchar(30) NOT NULL,
  `deskripsi_brosur` text NOT NULL,
  `thumb_brosur` varchar(30) NOT NULL,
  `file_brosur` varchar(30) NOT NULL,
  `link_youtube` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brosur`
--

INSERT INTO `brosur` (`id`, `nama_brosur`, `deskripsi_brosur`, `thumb_brosur`, `file_brosur`, `link_youtube`) VALUES
(2, '123123', '123123', '123123.png', 'default.pdf', 'https://github.com/catacola199');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` char(30) NOT NULL,
  `email_pengguna` varchar(40) NOT NULL,
  `telepon_pengguna` char(12) NOT NULL,
  `id_role` int(2) NOT NULL,
  `username_pengguna` varchar(20) NOT NULL,
  `password_pengguna` varchar(50) NOT NULL,
  `foto_pengguna` varchar(50) NOT NULL DEFAULT 'default.png',
  `terverifikasi` int(2) NOT NULL DEFAULT 0,
  `last_login` date NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `email_pengguna`, `telepon_pengguna`, `id_role`, `username_pengguna`, `password_pengguna`, `foto_pengguna`, `terverifikasi`, `last_login`, `date_created`) VALUES
(1, 'Muhamad Yulianto', 'admin@admin.com', '00888089821', 1, 'admin', '7b2e9f54cdff413fcde01f330af6896c3cd7e6cd', 'default.png', 1, '2022-09-11', '2022-09-11'),
(9, 'delviro', 'delviro@gmail.com', '08123123', 1, 'delviro', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'default.jpg', 1, '0000-00-00', '2022-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `p_kalibrasi`
--

CREATE TABLE `p_kalibrasi` (
  `id_pemeliharaan` int(10) NOT NULL,
  `tgl_pemeliharaan` date NOT NULL,
  `id_alat` int(10) NOT NULL,
  `petugas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_kalibrasi`
--

INSERT INTO `p_kalibrasi` (`id_pemeliharaan`, `tgl_pemeliharaan`, `id_alat`, `petugas`) VALUES
(1, '2022-09-28', 3, 'Delviro');

-- --------------------------------------------------------

--
-- Table structure for table `role_pengguna`
--

CREATE TABLE `role_pengguna` (
  `id` int(2) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_pengguna`
--

INSERT INTO `role_pengguna` (`id`, `id_role`, `nama_role`) VALUES
(1, 1, 'Admin'),
(2, 2, 'Pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `token_pengguna`
--

CREATE TABLE `token_pengguna` (
  `id_token` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `token` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_kalibrasi`
--

CREATE TABLE `t_kalibrasi` (
  `id_kalibrasi` int(10) NOT NULL,
  `id_alat` int(10) NOT NULL,
  `tgl_kalibrasi` date NOT NULL,
  `lampiran` varchar(128) NOT NULL,
  `quality_pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kalibrasi`
--

INSERT INTO `t_kalibrasi` (`id_kalibrasi`, `id_alat`, `tgl_kalibrasi`, `lampiran`, `quality_pass`) VALUES
(1, 3, '2022-09-01', 'asdasda.pdf', 'layak'),
(2, 4, '2012-12-12', 'default.pdf', 'Layak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_kalibrasi`
--
ALTER TABLE `alat_kalibrasi`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `brosur`
--
ALTER TABLE `brosur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `p_kalibrasi`
--
ALTER TABLE `p_kalibrasi`
  ADD PRIMARY KEY (`id_pemeliharaan`);

--
-- Indexes for table `role_pengguna`
--
ALTER TABLE `role_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_pengguna`
--
ALTER TABLE `token_pengguna`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `t_kalibrasi`
--
ALTER TABLE `t_kalibrasi`
  ADD PRIMARY KEY (`id_kalibrasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_kalibrasi`
--
ALTER TABLE `alat_kalibrasi`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brosur`
--
ALTER TABLE `brosur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `p_kalibrasi`
--
ALTER TABLE `p_kalibrasi`
  MODIFY `id_pemeliharaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_pengguna`
--
ALTER TABLE `role_pengguna`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `token_pengguna`
--
ALTER TABLE `token_pengguna`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_kalibrasi`
--
ALTER TABLE `t_kalibrasi`
  MODIFY `id_kalibrasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
