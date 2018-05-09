-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 08:11 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(50) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `nama`, `password`, `salt`) VALUES
('adi', 'Hutama', 'ad890906de5865f40af07b53efb6ede3', 'GAro'),
('breezy', 'kevin', '6ad03a897f5cc42f37450e8e566cfdc5', 'EZPZLEMONSQUEEZY'),
('daewqe', 'aaa', 'ee79981e647620bab800233db188e9b0', 'adi'),
('ddd', 'aaa', '40764849dde72e451e3557aabb090293', 'Hutama'),
('localhost', 'vxcv', 'ec6a6536ca304edf844d1d248a4f08dc', '');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `idmerk` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`idmerk`, `nama`) VALUES
(1, 'Daihatsu'),
(2, 'Toyota');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `idmobil` int(11) NOT NULL,
  `idmerk` int(11) NOT NULL,
  `tipe` varchar(45) DEFAULT NULL,
  `panjang` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `jarak_sumbu_roda` int(11) DEFAULT NULL,
  `radius_putar` int(11) DEFAULT NULL,
  `harga_min` double DEFAULT NULL,
  `harga_max` double DEFAULT NULL,
  `kapasitas_mesin` int(11) DEFAULT NULL,
  `kapasitas_tangki` int(11) DEFAULT NULL,
  `ukuran_velg` int(11) DEFAULT NULL,
  `ukuran_roda` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`idmobil`, `idmerk`, `tipe`, `panjang`, `lebar`, `tinggi`, `jarak_sumbu_roda`, `radius_putar`, `harga_min`, `harga_max`, `kapasitas_mesin`, `kapasitas_tangki`, `ukuran_velg`, `ukuran_roda`) VALUES
(1, 1, 'Xenia', 200, 100, 27, 2, 3, 100000, 10000000000000, 2, 2, 2, '12'),
(2, 2, 'Avanza', 200, 100, 23, 2, 2, 2, 2, 2, 2, 2, '11'),
(3, 1, 'Xenia', 200, 100, 27, 2, 3, 100000, 10000000000000, 2, 2, 2, '12'),
(4, 2, 'Avanza', 200, 100, 23, 2, 2, 2, 2, 2, 2, 2, '11'),
(5, 1, 'Xenia', 200, 100, 27, 2, 3, 100000, 10000000000000, 2, 2, 2, '12'),
(6, 2, 'Avanza', 200, 100, 23, 2, 2, 2, 2, 2, 2, 2, '11'),
(7, 1, 'Xenia', 200, 100, 27, 2, 3, 100000, 10000000000000, 2, 2, 2, '12'),
(8, 2, 'Avanza', 200, 100, 23, 2, 2, 2, 2, 2, 2, 2, '11'),
(9, 1, 'Xenia', 200, 100, 27, 2, 3, 100000, 10000000000000, 2, 2, 2, '12'),
(10, 2, 'Avanza', 200, 100, 23, 2, 2, 2, 2, 2, 2, 2, '11'),
(11, 1, 'Xenia', 200, 100, 27, 2, 3, 100000, 10000000000000, 2, 2, 2, '12'),
(12, 2, 'Avanza', 200, 100, 23, 2, 2, 2, 2, 2, 2, 2, '11'),
(13, 1, 'Xenia', 200, 100, 27, 2, 3, 100000, 10000000000000, 2, 2, 2, '12'),
(14, 2, 'Avanza', 200, 100, 23, 2, 2, 2, 2, 2, 2, 2, '11'),
(15, 1, 'Xenia', 200, 100, 27, 2, 3, 100000, 10000000000000, 2, 2, 2, '12'),
(16, 2, 'Avanza', 200, 100, 23, 2, 2, 2, 2, 2, 2, 2, '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`idmerk`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`idmobil`),
  ADD KEY `fk_mobil_merk_idx` (`idmerk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `idmerk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `idmobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `fk_mobil_merk` FOREIGN KEY (`idmerk`) REFERENCES `merk` (`idmerk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
