-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 01:21 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penilaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_mata_pelajaran`
--

CREATE TABLE `tm_mata_pelajaran` (
  `id_mata_pelajaran` int(11) NOT NULL,
  `nama` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_mata_pelajaran`
--

INSERT INTO `tm_mata_pelajaran` (`id_mata_pelajaran`, `nama`) VALUES
(6, 'Tembak Dekat'),
(7, 'Tembak Jauh');

-- --------------------------------------------------------

--
-- Table structure for table `tm_pengguna`
--

CREATE TABLE `tm_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `alamat` varchar(254) NOT NULL,
  `telp` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_pengguna`
--

INSERT INTO `tm_pengguna` (`id_pengguna`, `nama`, `email`, `alamat`, `telp`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Admin', '0987654321', 'f45731e3d39a1b2330bbf93e9b3de59e'),
(6, 'Subagyo', 'hardi.subagyo@gmail.com', 'Bogor barat ', '123123123', '7488e331b8b64e5794da3fa4eb10ad5d');

-- --------------------------------------------------------

--
-- Table structure for table `tm_siswa`
--

CREATE TABLE `tm_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(254) DEFAULT NULL,
  `nomor` varchar(254) DEFAULT NULL,
  `nrp` varchar(254) DEFAULT NULL,
  `asal_satuan` varchar(254) DEFAULT NULL,
  `nsl_panjang` varchar(254) DEFAULT NULL,
  `nsl_pendek` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_siswa`
--

INSERT INTO `tm_siswa` (`id_siswa`, `nama`, `nomor`, `nrp`, `asal_satuan`, `nsl_panjang`, `nsl_pendek`, `kelas`) VALUES
(5, 'Abi', '001', '539173', 'Kopassus', '001', '001', 'A'),
(6, 'Bambang', '002', '516502', 'Non Kopassus', '002', '002', 'A'),
(7, 'Imran', '003', '531930', 'Kopassus', '003', '003', 'A'),
(8, 'Sugeng', '004', '530401', 'Non Kopassus', '004', '004', 'A'),
(9, 'Widodo', '005', '530402', 'Non Kopassus', '005', '005', 'B'),
(10, 'Cipto', '006', '530403', 'Kopassus', '006', '006', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tm_slide`
--

CREATE TABLE `tm_slide` (
  `id_slide` int(11) NOT NULL,
  `nama` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_slide`
--

INSERT INTO `tm_slide` (`id_slide`, `nama`) VALUES
(8, '200705082211-OP.jpg'),
(9, '200705082216-OP1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tr_nilai`
--

CREATE TABLE `tr_nilai` (
  `id_nilai` int(32) NOT NULL,
  `id_siswa` int(32) DEFAULT NULL,
  `id_mata_pelajaran` int(32) DEFAULT NULL,
  `nilai` int(32) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_nilai`
--

INSERT INTO `tr_nilai` (`id_nilai`, `id_siswa`, `id_mata_pelajaran`, `nilai`, `tanggal`) VALUES
(23, 9, 6, 70, '2020-07-30'),
(24, 10, 6, 77, '2020-07-30'),
(25, 9, 6, -10, '2020-07-19'),
(26, 10, 6, 80, '2020-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tr_nilai_sikap`
--

CREATE TABLE `tr_nilai_sikap` (
  `id_nilai` int(32) NOT NULL,
  `id_siswa` int(32) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nilai` int(32) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tr_pemasukan`
--

CREATE TABLE `tr_pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nominal` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_pemasukan`
--

INSERT INTO `tr_pemasukan` (`id_pemasukan`, `tanggal`, `keterangan`, `nominal`) VALUES
(10, '2020-07-04', 'dari bank', 9000000),
(11, '2020-07-16', 'asd', 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `tr_pengeluaran`
--

CREATE TABLE `tr_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nominal` int(20) DEFAULT NULL,
  `struk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_pengeluaran`
--

INSERT INTO `tr_pengeluaran` (`id_pengeluaran`, `tanggal`, `keterangan`, `nominal`, `struk`) VALUES
(9, '2020-07-29', 'terbaik', 1000000, '200705074333-OP.jpg'),
(12, '2020-07-09', 'asdas', 9000000, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_mata_pelajaran`
--
ALTER TABLE `tm_mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`) USING BTREE;

--
-- Indexes for table `tm_pengguna`
--
ALTER TABLE `tm_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tm_siswa`
--
ALTER TABLE `tm_siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- Indexes for table `tm_slide`
--
ALTER TABLE `tm_slide`
  ADD PRIMARY KEY (`id_slide`) USING BTREE;

--
-- Indexes for table `tr_nilai`
--
ALTER TABLE `tr_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tr_nilai_sikap`
--
ALTER TABLE `tr_nilai_sikap`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tr_pemasukan`
--
ALTER TABLE `tr_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`) USING BTREE;

--
-- Indexes for table `tr_pengeluaran`
--
ALTER TABLE `tr_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_mata_pelajaran`
--
ALTER TABLE `tm_mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tm_pengguna`
--
ALTER TABLE `tm_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_siswa`
--
ALTER TABLE `tm_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tm_slide`
--
ALTER TABLE `tm_slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tr_nilai`
--
ALTER TABLE `tr_nilai`
  MODIFY `id_nilai` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tr_nilai_sikap`
--
ALTER TABLE `tr_nilai_sikap`
  MODIFY `id_nilai` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tr_pemasukan`
--
ALTER TABLE `tr_pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tr_pengeluaran`
--
ALTER TABLE `tr_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
