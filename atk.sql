-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2016 at 06:47 PM
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
(1, 'Kertas HVS', 42),
(2, 'Pulpen', 5),
(3, 'Spidol', 2),
(4, 'Pensil', 2),
(5, 'Amplop', 60),
(6, 'Kertas Buram', 42),
(7, 'Klip', 35),
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
) ENGINE=InnoDB AUTO_INCREMENT=1525 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pemakaian`
--

INSERT INTO `t_pemakaian` (`ID_Pemakaian`, `Tgl_Pemakaian`, `Jumlah`, `ID_ATK`, `ID_User`) VALUES
(1, '2016-01-01 00:01:00', 8, 1, 1),
(2, '2016-01-02 00:02:00', 7, 2, 1),
(3, '2016-01-03 00:03:00', 6, 3, 1),
(4, '2016-01-04 00:04:00', 5, 4, 1),
(5, '2016-01-05 00:05:00', 4, 5, 1),
(6, '2016-01-06 00:06:00', 3, 6, 1),
(7, '2016-01-07 00:07:00', 2, 7, 1),
(8, '2016-01-08 00:08:00', 1, 8, 1),
(9, '2016-01-09 00:09:00', 1, 1, 2),
(10, '2016-01-10 00:10:00', 2, 2, 2),
(11, '2016-01-11 00:11:00', 3, 3, 2),
(12, '2016-01-12 00:12:00', 4, 4, 2),
(13, '2016-01-13 00:13:00', 5, 5, 2),
(14, '2016-01-14 00:14:00', 6, 6, 2),
(15, '2016-01-15 00:15:00', 7, 7, 2),
(16, '2016-01-16 00:16:00', 8, 8, 2),
(17, '2016-01-17 00:17:00', 8, 1, 3),
(18, '2016-01-18 00:18:00', 7, 2, 3),
(19, '2016-01-19 00:19:00', 6, 3, 3),
(20, '2016-01-20 00:20:00', 5, 4, 3),
(21, '2016-01-21 00:21:00', 4, 5, 3),
(22, '2016-01-22 00:22:00', 3, 6, 3),
(23, '2016-01-23 00:23:00', 2, 7, 3),
(24, '2016-01-24 00:01:00', 1, 8, 3),
(25, '2016-01-25 00:02:00', 1, 1, 4),
(26, '2016-01-26 00:03:00', 2, 2, 4),
(27, '2016-01-27 00:04:00', 3, 3, 4),
(28, '2016-01-28 00:05:00', 4, 4, 4),
(29, '2016-01-29 00:06:00', 5, 5, 4),
(30, '2016-01-30 00:07:00', 6, 6, 4),
(1493, '2016-02-16 00:12:00', 2, 3, 5),
(1494, '2016-02-16 00:12:00', 1, 2, 6),
(1495, '2016-02-16 00:13:26', 3, 4, 7),
(1496, '2016-02-16 00:14:16', 1, 6, 8),
(1497, '2016-02-16 00:14:16', 3, 1, 9),
(1498, '2016-02-16 00:20:42', 3, 3, 10),
(1499, '2016-02-16 00:20:42', 10, 6, 11),
(1500, '2016-02-16 09:24:12', 2, 2, 12),
(1501, '2016-02-16 09:24:43', 2, 1, 13),
(1502, '2016-02-16 09:24:43', 1, 6, 14),
(1503, '2016-02-16 09:26:17', 3, 4, 15),
(1504, '2016-02-16 09:26:17', 3, 1, 16),
(1505, '2016-02-16 09:42:31', 2, 1, 17),
(1506, '2016-02-16 09:42:31', 3, 1, 18),
(1507, '2016-02-16 09:47:41', 3, 3, 19),
(1515, '2016-02-17 20:20:00', 1, 1, 20),
(1516, '2016-02-17 20:23:31', 1, 6, 30),
(1517, '2016-02-17 22:14:20', 2, 4, 40),
(1518, '2016-02-17 22:14:20', 1, 1, 50),
(1519, '2016-02-17 22:15:53', 2, 4, 60),
(1520, '2016-02-18 00:29:39', 5, 1, 44),
(1521, '2016-02-18 00:29:39', 1, 7, 44),
(1522, '2016-02-18 00:29:39', 2, 2, 44),
(1523, '2016-02-18 00:29:39', 2, 4, 44),
(1524, '2016-02-18 00:37:31', 7, 3, 80);

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan`
--

CREATE TABLE IF NOT EXISTS `t_pemesanan` (
  `ID_Pemesanan` int(11) NOT NULL,
  `Tgl_Pemesanan` date NOT NULL,
  `Tgl_Pengambilan` date NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

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
(65, '2016-02-18', '2016-02-26', 44),
(66, '2016-02-18', '2016-02-24', 80),
(68, '2016-02-18', '2016-02-23', 3),
(69, '2016-02-18', '2016-02-29', 56),
(70, '2016-02-18', '2016-02-22', 18),
(71, '2016-02-18', '2016-02-28', 52),
(72, '2016-02-18', '2016-02-25', 30),
(73, '2016-02-18', '2016-02-22', 30),
(74, '2016-02-18', '2016-02-27', 48),
(75, '2016-02-18', '2016-02-28', 84),
(76, '2016-02-18', '2016-02-19', 2),
(77, '2016-02-18', '2016-02-22', 47),
(78, '2016-02-18', '2016-02-29', 86),
(79, '2016-02-18', '2016-02-28', 80);

-- --------------------------------------------------------

--
-- Table structure for table `t_pesanan`
--

CREATE TABLE IF NOT EXISTS `t_pesanan` (
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
(65, 3, 3),
(65, 7, 2),
(66, 3, 7),
(68, 1, 2),
(69, 4, 2),
(70, 5, 5),
(71, 6, 3),
(73, 6, 1),
(74, 1, 1),
(74, 2, 1),
(74, 3, 1),
(74, 4, 1),
(75, 5, 2),
(75, 7, 2),
(75, 2, 1),
(76, 1, 1),
(77, 6, 2),
(78, 4, 5),
(79, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `ID_User` int(11) NOT NULL,
  `Nama_User` varchar(50) NOT NULL,
  `SID` int(11) NOT NULL,
  `Telephone` bigint(20) NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`ID_User`, `Nama_User`, `SID`, `Telephone`, `Email`) VALUES
(1, 'Pratama Nugraha Damanik', 13513001, 0, '13513001@std.stei.itb.ac.id'),
(2, 'Irene Wiliudarsan', 13513002, 0, '13513002@std.stei.itb.ac.id'),
(3, 'Jonathan Benedict', 13513003, 0, '13513003@std.stei.itb.ac.id'),
(4, 'Afrizal Fikri', 13513004, 0, '13513004@std.stei.itb.ac.id'),
(5, 'Vincent Theophilus Ciputra', 13513005, 0, '13513005@std.stei.itb.ac.id'),
(6, 'Rahman Adianto', 13513006, 0, '13513006@std.stei.itb.ac.id'),
(7, 'Freddy Isman', 13513007, 0, '13513007@std.stei.itb.ac.id'),
(8, 'Muhammad Ridwan', 13513008, 0, '13513008@std.stei.itb.ac.id'),
(9, 'Muhamad Fikri Alhawarizmi', 13513009, 0, '13513009@std.stei.itb.ac.id'),
(10, 'Zulva Fachrina', 13513010, 0, '13513010@std.stei.itb.ac.id'),
(11, 'Gerry Kastogi', 13513011, 0, '13513011@std.stei.itb.ac.id'),
(12, 'Muhammad Azam Iszuhri', 13513012, 0, '13513012@std.stei.itb.ac.id'),
(13, 'Juan Anton', 13513013, 0, '13513013@std.stei.itb.ac.id'),
(14, 'Paulus Berliz', 13513014, 0, '13513014@std.stei.itb.ac.id'),
(15, 'Aufar Gilbran', 13513015, 0, '13513015@std.stei.itb.ac.id'),
(16, 'Raka Nurul Fikri', 13513016, 0, '13513016@std.stei.itb.ac.id'),
(17, 'Miftahul Mahfuzh', 13513017, 0, '13513017@std.stei.itb.ac.id'),
(18, 'Steven Andianto', 13513018, 0, '13513018@std.stei.itb.ac.id'),
(19, 'David', 13513019, 0, '13513019@std.stei.itb.ac.id'),
(20, 'Ahmad Aidin', 13513020, 0, '13513020@std.stei.itb.ac.id'),
(21, 'Erick Chandra', 13513021, 0, '13513021@std.stei.itb.ac.id'),
(22, 'Husni Munaya', 13513022, 0, '13513022@std.stei.itb.ac.id'),
(23, 'Alexander Sukono', 13513023, 0, '13513023@std.stei.itb.ac.id'),
(24, 'Luqman Arifin Siswanto', 13513024, 0, '13513024@std.stei.itb.ac.id'),
(25, 'Venny Larasati Ayudiani', 13513025, 0, '13513025@std.stei.itb.ac.id'),
(26, 'William Sentosa', 13513026, 0, '13513026@std.stei.itb.ac.id'),
(27, 'Ahmad Rizdaputra', 13513027, 0, '13513027@std.stei.itb.ac.id'),
(28, 'Heri Fauzan', 13513028, 0, '13513028@std.stei.itb.ac.id'),
(29, 'Wisnu', 13513029, 0, '13513029@std.stei.itb.ac.id'),
(30, 'Yoga Adrian Saputra', 13513030, 0, '13513030@std.stei.itb.ac.id'),
(31, 'Candy Olivia Mawalim', 13513031, 0, '13513031@std.stei.itb.ac.id'),
(32, 'Angela Lynn', 13513032, 0, '13513032@std.stei.itb.ac.id'),
(33, 'Muhammad Hanif Edoardo', 13513033, 0, '13513033@std.stei.itb.ac.id'),
(34, 'Satria Priambada', 13513034, 0, '13513034@std.stei.itb.ac.id'),
(35, 'Vanya Deasy Safrina', 13513035, 0, '13513035@std.stei.itb.ac.id'),
(36, 'Kevin Yauris', 13513036, 0, '13513036@std.stei.itb.ac.id'),
(37, 'Muhamad Visat Sutarno', 13513037, 0, '13513037@std.stei.itb.ac.id'),
(38, 'Tjan Marco Orlando', 13513038, 0, '13513038@std.stei.itb.ac.id'),
(39, 'Ivan Andrianto', 13513039, 0, '13513039@std.stei.itb.ac.id'),
(40, 'Edwin Wijaya', 13513040, 0, '13513040@std.stei.itb.ac.id'),
(41, 'Moch Ginanjar Busiri', 13513041, 0, '13513041@std.stei.itb.ac.id'),
(42, 'Feryandi Nurdiantoro', 13513042, 0, '13513042@std.stei.itb.ac.id'),
(43, 'Agung Baptiso Sorlawan', 13513043, 0, '13513043@std.stei.itb.ac.id'),
(44, 'Cliff Jonathan', 13513044, 0, '13513044@std.stei.itb.ac.id'),
(45, 'Ghazwan Sihamudin Muhammad', 13513045, 0, '13513045@std.stei.itb.ac.id'),
(46, 'Bayu Rasyadi Putrautama', 13513046, 0, '13513046@std.stei.itb.ac.id'),
(47, 'Hans Christian', 13513047, 0, '13513047@std.stei.itb.ac.id'),
(48, 'Ben Lemuel Tanasale', 13513048, 0, '13513048@std.stei.itb.ac.id'),
(49, 'Ahmad Naufal Farhan', 13513049, 0, '13513049@std.stei.itb.ac.id'),
(50, 'Fikri Aulia', 13513050, 0, '13513050@std.stei.itb.ac.id'),
(51, 'Ignatius Alriana Haryadi Moel', 13513051, 0, '13513051@std.stei.itb.ac.id'),
(52, 'Levanji Prahyudy', 13513052, 0, '13513052@std.stei.itb.ac.id'),
(53, 'Yudhi Septiadi', 13513053, 0, '13513053@std.stei.itb.ac.id'),
(54, 'Chairuni Aulia Nusapati', 13513054, 0, '13513054@std.stei.itb.ac.id'),
(55, 'Tifani Warnita', 13513055, 0, '13513055@std.stei.itb.ac.id'),
(56, 'Octavianus Marcel Harjono', 13513056, 0, '13513056@std.stei.itb.ac.id'),
(57, 'Vincent Sebastian The', 13513057, 0, '13513057@std.stei.itb.ac.id'),
(58, 'Adin Baskoro Pratomo', 13513058, 0, '13513058@std.stei.itb.ac.id'),
(59, 'Ahmad Fauzul Yogiandra', 13513059, 0, '13513059@std.stei.itb.ac.id'),
(60, 'Nursyahrina', 13513060, 0, '13513060@std.stei.itb.ac.id'),
(61, 'Lucky Cahyadi Kurniawan', 13513061, 0, '13513061@std.stei.itb.ac.id'),
(62, 'Muhammad Fauzan Naufan', 13513062, 0, '13513062@std.stei.itb.ac.id'),
(63, 'Muhammad Aodyra Khaidir', 13513063, 0, '13513063@std.stei.itb.ac.id'),
(64, 'Raihannur Reztaputra', 13513064, 0, '13513064@std.stei.itb.ac.id'),
(65, 'Riezqo Denawa Soprach', 13513065, 0, '13513065@std.stei.itb.ac.id'),
(66, 'Dininta Annisa', 13513066, 0, '13513066@std.stei.itb.ac.id'),
(67, 'Mochamad Try Yulyanto', 13513067, 0, '13513067@std.stei.itb.ac.id'),
(68, 'Muhtar Hartopo', 13513068, 0, '13513068@std.stei.itb.ac.id'),
(69, 'Jessica Handayani', 13513069, 0, '13513069@std.stei.itb.ac.id'),
(70, 'Natan', 13513070, 0, '13513070@std.stei.itb.ac.id'),
(71, 'Wilhelmus Andrian T', 13513071, 0, '13513071@std.stei.itb.ac.id'),
(72, 'Nitho Alif Ibadurrahman', 13513072, 0, '13513072@std.stei.itb.ac.id'),
(73, 'Wiwit Rifai', 13513073, 0, '13513073@std.stei.itb.ac.id'),
(74, 'Ryan Yonata', 13513074, 0, '13513074@std.stei.itb.ac.id'),
(75, 'Bimo Aryo Tyasono', 13513075, 0, '13513075@std.stei.itb.ac.id'),
(76, 'Lie Albert Tri Adrian', 13513076, 0, '13513076@std.stei.itb.ac.id'),
(77, 'Calvin Aditya Jonathan', 13513077, 0, '13513077@std.stei.itb.ac.id'),
(78, 'Gazandi Cahyadarma', 13513078, 0, '13513078@std.stei.itb.ac.id'),
(79, 'Asanilta Fahda', 13513079, 0, '13513079@std.stei.itb.ac.id'),
(80, 'Luminto', 13513080, 0, '13513080@std.stei.itb.ac.id'),
(81, 'Fauzan Muhammad Rifqy', 13513081, 0, '13513081@std.stei.itb.ac.id'),
(82, 'Elvan Owen', 13513082, 0, '13513082@std.stei.itb.ac.id'),
(83, 'Dimpos Arie Ginarta Sitorus', 13513083, 0, '13513083@std.stei.itb.ac.id'),
(84, 'Julio Savigny', 13513084, 0, '13513084@std.stei.itb.ac.id'),
(85, 'Muhammad Farhan Kemal', 13513085, 0, '13513085@std.stei.itb.ac.id'),
(86, 'Jessica Andjani', 13513086, 0, '13513086@std.stei.itb.ac.id'),
(87, 'Randi Chilyon Alfianto', 13513087, 0, '13513087@std.stei.itb.ac.id'),
(88, 'Devina Ekawati', 13513088, 0, '13513088@std.stei.itb.ac.id'),
(89, 'Pipin Kurnia Wati', 13513089, 0, '13513089@std.stei.itb.ac.id'),
(90, 'Ibrohim Kholilul Islam', 13513090, 0, '13513090@std.stei.itb.ac.id'),
(91, 'Mahesa Gandakusuma', 13513091, 0, '13513091@std.stei.itb.ac.id'),
(92, 'Vicko Novianto', 13513092, 0, '13513092@std.stei.itb.ac.id'),
(93, 'Khalil Ambiya', 13513093, 0, '13513093@std.stei.itb.ac.id'),
(94, 'Faisal Prabowo', 13513094, 0, '13513094@std.stei.itb.ac.id'),
(95, 'Fitra Rahmamuliani', 13513095, 0, '13513095@std.stei.itb.ac.id'),
(96, 'Ahmad Darmawan', 13513096, 0, '13513096@std.stei.itb.ac.id');

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
  MODIFY `ID_ATK` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_pemakaian`
--
ALTER TABLE `t_pemakaian`
  MODIFY `ID_Pemakaian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1525;
--
-- AUTO_INCREMENT for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `ID_Pemesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
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
