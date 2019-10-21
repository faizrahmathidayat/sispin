-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Okt 2019 pada 16.25
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fr_soft`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_brg`
--

CREATE TABLE `dt_brg` (
  `ID_BRG` int(11) NOT NULL,
  `CD_BRG` varchar(30) NOT NULL,
  `NAMA_BRG` varchar(50) NOT NULL,
  `ID_GRP` int(11) NOT NULL,
  `KET_BRG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_brg`
--

INSERT INTO `dt_brg` (`ID_BRG`, `CD_BRG`, `NAMA_BRG`, `ID_GRP`, `KET_BRG`) VALUES
(1, '', 'SAMSUNG A1', 82, ''),
(2, '', 'SAMSUNG A2', 82, 'test'),
(3, '', 'EPSON 1', 73, ''),
(4, '', 'EPSON 2', 103, ''),
(5, '', 'OPPO V1', 98, ''),
(6, '', 'OPPO V2', 98, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_grp`
--

CREATE TABLE `dt_grp` (
  `ID_GRP` int(11) NOT NULL,
  `NAMA_GRP` varchar(50) NOT NULL,
  `PARENT_ID` int(11) NOT NULL,
  `KET_GRP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_grp`
--

INSERT INTO `dt_grp` (`ID_GRP`, `NAMA_GRP`, `PARENT_ID`, `KET_GRP`) VALUES
(1, 'HP', 0, '0'),
(2, 'PRINTER', 0, '0'),
(69, 'LAPTOP', 0, ''),
(71, 'XIAOMI', 1, ''),
(72, 'ASUS 3-100', 69, ''),
(73, 'EPSON', 2, ''),
(82, 'SAMASUNG', 71, ''),
(84, 'OPPO', 1, ''),
(85, 'VIVO', 1, ''),
(86, 'DELL', 69, ''),
(87, 'LENOVO', 69, ''),
(88, 'PC', 90, ''),
(89, 'MONITOR', 90, ''),
(90, 'KOMPUTER', 0, ''),
(97, 'TEST', 0, 'test'),
(98, 'OPPO 1', 84, ''),
(99, 'TESTt', 0, 'test'),
(100, 'TEST2', 0, 'test'),
(101, 'ASDASd', 0, 'asdasd'),
(102, 'DDDD', 0, 'dddd'),
(103, 'SSSSSSS', 0, 'sssssss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_user`
--

CREATE TABLE `dt_user` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `STATUS_LOG` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_user`
--

INSERT INTO `dt_user` (`ID_USER`, `USERNAME`, `PASSWORD`, `STATUS_LOG`) VALUES
(1, 'romi', 'romi', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_brg`
--
ALTER TABLE `dt_brg`
  ADD PRIMARY KEY (`ID_BRG`);

--
-- Indexes for table `dt_grp`
--
ALTER TABLE `dt_grp`
  ADD PRIMARY KEY (`ID_GRP`);

--
-- Indexes for table `dt_user`
--
ALTER TABLE `dt_user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_brg`
--
ALTER TABLE `dt_brg`
  MODIFY `ID_BRG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dt_grp`
--
ALTER TABLE `dt_grp`
  MODIFY `ID_GRP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `dt_user`
--
ALTER TABLE `dt_user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
