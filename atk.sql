-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2016 at 01:02 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atk`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_atk`
--

CREATE TABLE IF NOT EXISTS `t_atk` (
  `ID_ATK` int(11) NOT NULL,
  `Jenis_ATK` varchar(50) NOT NULL,
  `Stok_ATK` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_atk`
--

INSERT INTO `t_atk` (`ID_ATK`, `Jenis_ATK`, `Stok_ATK`) VALUES
(1, 'Kertas HVS', 80),
(2, 'Pulpen', 30),
(3, 'Spdiol', 35),
(4, 'Pensil', 20),
(5, 'Amplop', 70),
(6, 'Kertas Buram', 50),
(7, 'Klip', 40),
(8, 'Lakban', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_pemakaian`
--

CREATE TABLE IF NOT EXISTS `t_pemakaian` (
  `ID_Pemakaian` int(11) NOT NULL,
  `Tgl_Pemakaian` datetime NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `ID_ATK` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan`
--

CREATE TABLE IF NOT EXISTS `t_pemesanan` (
  `ID_Pemesanan` int(11) NOT NULL,
  `Tgl_Pemesanan` date NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Tgl_Pengambilan` date NOT NULL,
  `ID_ATK` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pemesanan`
--

INSERT INTO `t_pemesanan` (`ID_Pemesanan`, `Tgl_Pemesanan`, `Jumlah`, `Tgl_Pengambilan`, `ID_ATK`, `ID_User`) VALUES
(1, '2016-02-14', 12, '0000-00-00', 1, 4),
(2, '2016-02-14', 12, '0000-00-00', 3, 1),
(3, '2016-02-14', 1, '0000-00-00', 4, 2),
(4, '2016-02-14', 3, '0000-00-00', 5, 3),
(5, '2016-02-14', 20, '0000-00-00', 1, 4),
(6, '2016-02-14', 19, '0000-00-00', 1, 2),
(7, '2016-02-14', 20, '0000-00-00', 2, 4),
(8, '2016-02-14', 2, '0000-00-00', 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `ID_User` int(11) NOT NULL,
  `Nama_User` varchar(50) NOT NULL,
  `Kategori_User` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`ID_User`, `Nama_User`, `Kategori_User`) VALUES
(1, 'Cliff', 'Mahasiswa'),
(2, 'Ben', 'Mahasiswa'),
(3, 'Luminto', 'Mahasiswa'),
(4, 'Jessica', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_atk`
--
ALTER TABLE `t_atk`
  ADD PRIMARY KEY (`ID_ATK`),
  ADD KEY `ID_ATK` (`ID_ATK`);

--
-- Indexes for table `t_pemakaian`
--
ALTER TABLE `t_pemakaian`
  ADD PRIMARY KEY (`ID_Pemakaian`),
  ADD KEY `ID_Pemakaian` (`ID_Pemakaian`),
  ADD KEY `ID_ATK` (`ID_ATK`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indexes for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD PRIMARY KEY (`ID_Pemesanan`),
  ADD KEY `ID_ATK` (`ID_ATK`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `ID_User` (`ID_User`),
  ADD KEY `ID_User_2` (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_atk`
--
ALTER TABLE `t_atk`
  MODIFY `ID_ATK` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_pemakaian`
--
ALTER TABLE `t_pemakaian`
  MODIFY `ID_Pemakaian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `ID_Pemesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_pemakaian`
--
ALTER TABLE `t_pemakaian`
  ADD CONSTRAINT `t_pemakaian_ibfk_1` FOREIGN KEY (`ID_ATK`) REFERENCES `t_atk` (`ID_ATK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pemakaian_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `t_user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD CONSTRAINT `t_pemesanan_ibfk_1` FOREIGN KEY (`ID_ATK`) REFERENCES `t_atk` (`ID_ATK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pemesanan_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `t_user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
