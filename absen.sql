-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 01:38 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gurpiket`
--

CREATE TABLE `gurpiket` (
  `id_gurpik` varchar(100) NOT NULL,
  `nama_gurpik` varchar(100) NOT NULL,
  `status` enum('PNS','NON PNS','','') NOT NULL,
  `pikethari` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gurpiket`
--

INSERT INTO `gurpiket` (`id_gurpik`, `nama_gurpik`, `status`, `pikethari`, `username`, `password`) VALUES
('212', 'Jeni', 'NON PNS', 'Senin', 'SiAbSis123', '0975315653221'),
('P-001', 'kl', 'NON PNS', 'Senin', 'SiAbSis123', '0975315653221'),
('P-003', 'Juanda', 'PNS', 'Selasa', 'SiAbSis123', '0975315653221'),
('P-012', 'Dewa', 'NON PNS', 'Selasa', 'SiAbSis123', '0975315653221');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_absen` int(11) NOT NULL,
  `NIS` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  `Hadir` varchar(10) NOT NULL,
  `Alfa` int(10) NOT NULL,
  `Izin` int(10) NOT NULL,
  `Sakit` int(10) NOT NULL,
  `status` enum('Terkirim','Tidak Terkirim','Tidak Perlu Dikirim','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_absen`, `NIS`, `nama_siswa`, `tgl`, `id_kelas`, `Hadir`, `Alfa`, `Izin`, `Sakit`, `status`) VALUES
(71, '12', 'Dede', '2019-02-03', 'K-002', '0', 1, 0, 0, 'Tidak Terkirim'),
(72, '1200211', 'Mall', '2019-02-03', 'K-002', '0', 1, 0, 0, 'Tidak Terkirim'),
(73, '123', 'Wanda', '2019-02-03', 'K-002', '0', 1, 0, 0, 'Tidak Terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `nama_walikel` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan`, `nama_walikel`, `username`, `password`) VALUES
('K-001', 'X RPL 1', 'RPL', 'Sis', 'user', '231'),
('K-002', 'XI RPL 1', 'TKJ', 'das', 'RPLR', '990993');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` int(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `nama_siswa`, `jk`, `alamat`, `nama_ortu`, `no_hp`, `id_kelas`, `jurusan`) VALUES
(12, 'Dede', 'L', '12', '21', '21', 'K-002', 'TKJ'),
(123, 'Wanda', 'L', '12', '21', '21', 'K-002', 'TKJ'),
(902903, 'Annisa', 'L', '90', '90', '99', 'K-001', 'RPL'),
(1200211, 'Mall', 'P', 'Kp. Mkk', 'Sule', '08991829912', 'K-002', 'TKJ'),
(12211221, 'Kmal', 'L', 'Kp. Cmp', 'Saswi', '08311009292', 'K-001', 'RPL'),
(23232323, 'Osama', 'L', '0', 'koakso', '909899', 'K-001', 'RPL'),
(90293928, 'Titi', 'P', '00122910', 'k', '0909092829', 'K-001', 'RPL'),
(992029881, 'Putri', 'P', '092jj', 'iak', '998877', 'K-001', 'RPL'),
(2147483647, 'Azura', 'P', 'kokp', 'kjouu', '998989', 'K-001', 'RPL');

-- --------------------------------------------------------

--
-- Table structure for table `walikel`
--

CREATE TABLE `walikel` (
  `id_wali` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `walikel`
--

INSERT INTO `walikel` (`id_wali`, `nama_guru`, `jk`, `username`, `password`, `id_kelas`) VALUES
('W-001', 'das', 'Laki-Laki', 'user', '13', 'K-002'),
('W-002', 'Sis', 'Perempuan', 'user', '2123', 'K-001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gurpiket`
--
ALTER TABLE `gurpiket`
  ADD PRIMARY KEY (`id_gurpik`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `walikel`
--
ALTER TABLE `walikel`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
