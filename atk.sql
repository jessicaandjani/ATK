-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2016 at 05:16 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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

CREATE TABLE `t_atk` (
  `ID_ATK` int(11) NOT NULL,
  `Jenis_ATK` varchar(50) NOT NULL,
  `Stok_ATK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_atk`
--

INSERT INTO `t_atk` (`ID_ATK`, `Jenis_ATK`, `Stok_ATK`) VALUES
(1, 'Kertas HVS', 63),
(2, 'Pulpen', 10),
(3, 'Spidol', 21),
(4, 'Pensil', 10),
(5, 'Amplop', 70),
(6, 'Kertas Buram', 49),
(7, 'Klip', 40),
(8, 'Lakban', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_pemakaian`
--

CREATE TABLE `t_pemakaian` (
  `ID_Pemakaian` int(11) NOT NULL,
  `Tgl_Pemakaian` datetime NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `ID_ATK` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pemakaian`
--

INSERT INTO `t_pemakaian` (`ID_Pemakaian`, `Tgl_Pemakaian`, `Jumlah`, `ID_ATK`, `ID_User`) VALUES
(1493, '2016-02-16 00:12:00', 2, 3, 2),
(1494, '2016-02-16 00:12:00', 1, 2, 2),
(1495, '2016-02-16 00:13:26', 3, 4, 2),
(1496, '2016-02-16 00:14:16', 1, 6, 2),
(1497, '2016-02-16 00:14:16', 3, 1, 2),
(1498, '2016-02-16 00:20:42', 3, 3, 3),
(1499, '2016-02-16 00:20:42', 10, 6, 3),
(1500, '2016-02-16 09:24:12', 2, 2, 1),
(1501, '2016-02-16 09:24:43', 2, 1, 5),
(1502, '2016-02-16 09:24:43', 1, 6, 5),
(1503, '2016-02-16 09:26:17', 3, 4, 1),
(1504, '2016-02-16 09:26:17', 3, 1, 1),
(1505, '2016-02-16 09:42:31', 2, 1, 5),
(1506, '2016-02-16 09:42:31', 3, 1, 5),
(1507, '2016-02-16 09:47:41', 3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan`
--

CREATE TABLE `t_pemesanan` (
  `ID_Pemesanan` int(11) NOT NULL,
  `Tgl_Pemesanan` date NOT NULL,
  `Tgl_Pengambilan` date NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pemesanan`
--

INSERT INTO `t_pemesanan` (`ID_Pemesanan`, `Tgl_Pemesanan`, `Tgl_Pengambilan`, `ID_User`) VALUES
(1, '2016-02-14', '0000-00-00', 4),
(2, '2016-02-14', '0000-00-00', 1),
(3, '2016-02-14', '0000-00-00', 2),
(7, '2016-02-14', '0000-00-00', 4),
(9, '2016-02-15', '2016-02-15', 5),
(12, '2016-02-15', '2016-02-15', 2),
(13, '2016-02-15', '2016-02-15', 2),
(15, '2016-02-15', '2016-02-15', 2),
(16, '2016-02-15', '2016-02-15', 2),
(17, '2016-02-15', '2016-02-15', 2),
(18, '2016-02-15', '2016-02-26', 5),
(42, '2016-02-15', '2016-02-25', 4),
(43, '2016-02-15', '2016-02-25', 4),
(47, '2016-02-16', '2016-02-04', 5),
(48, '2016-02-16', '2016-02-04', 5),
(49, '2016-02-16', '2016-02-10', 2),
(50, '2016-02-16', '2016-02-05', 2),
(52, '2016-02-16', '2016-02-03', 4),
(53, '2016-02-16', '2016-02-03', 5),
(56, '2016-02-16', '2016-02-20', 11),
(57, '2016-02-16', '2016-02-19', 16),
(58, '2016-02-16', '2016-02-17', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `ID_Pemesanan` int(11) NOT NULL,
  `ID_ATK` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pesanan`
--

INSERT INTO `t_pesanan` (`ID_Pemesanan`, `ID_ATK`, `Jumlah`) VALUES
(3, 5, 2),
(2, 5, 5),
(15, 2, 1),
(47, 2, 2),
(48, 2, 3),
(49, 3, 2),
(50, 2, 1),
(52, 4, 2),
(53, 4, 2),
(56, 3, 2),
(57, 1, 2),
(58, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `ID_User` int(11) NOT NULL,
  `Nama_User` varchar(50) NOT NULL,
  `SID` int(11) NOT NULL,
  `Telephone` bigint(20) NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`ID_User`, `Nama_User`, `SID`, `Telephone`, `Email`) VALUES
(1, 'Cliff Jonathan', 13513044, 0, ''),
(2, 'Ben Lemuel Tanasale', 13513048, 0, ''),
(3, 'Luminto', 13513080, 81809670384, '13513080@std.stei.itb.ac.id'),
(4, 'Jessica Andjani', 13513086, 0, ''),
(5, 'Yoga Adrian', 13513030, 0, ''),
(11, 'Sukuanto Tanoto', 12113030, 0, 'sukuanto@gmail.com'),
(16, 'Angela Lynn', 13513032, 0, 'angela@gmail.com'),
(17, 'ABC DEF', 13513040, 0, 'okdoqqpdpqdp@gmail.com');

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
  ADD KEY `ID_User` (`ID_User`);

--
-- Indexes for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD KEY `ID_Pemesanan` (`ID_Pemesanan`),
  ADD KEY `ID_ATK` (`ID_ATK`);

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
  MODIFY `ID_ATK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_pemakaian`
--
ALTER TABLE `t_pemakaian`
  MODIFY `ID_Pemakaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1511;
--
-- AUTO_INCREMENT for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `ID_Pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
  ADD CONSTRAINT `t_pemesanan_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `t_user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD CONSTRAINT `t_pesanan_ibfk_1` FOREIGN KEY (`ID_Pemesanan`) REFERENCES `t_pemesanan` (`ID_Pemesanan`),
  ADD CONSTRAINT `t_pesanan_ibfk_2` FOREIGN KEY (`ID_ATK`) REFERENCES `t_atk` (`ID_ATK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
