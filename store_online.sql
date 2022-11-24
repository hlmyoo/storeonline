-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2022 at 04:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `harga` text NOT NULL,
  `foto_produk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `foto_produk`) VALUES
(47, 'lifeboy', 'pp', '56.000', '4317download (10).jfif'),
(48, 'chisato', 'istri ales', '90.000', '2280chisato.jfif'),
(49, 'rubik', '3x3', '33.000', '6795rubik.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(100) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status` enum('Proses','Dikirim','Sampai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `id_user`, `nama_produk`, `foto_produk`, `jumlah`, `tgl_beli`, `tgl_selesai`, `status`) VALUES
(9, 48, 21, 'chisato', '2280chisato.jfif', 1, '2022-11-24', '0000-00-00', 'Sampai'),
(10, 48, 21, 'chisato', '2280chisato.jfif', 1, '2022-11-24', '2022-11-24', 'Sampai'),
(11, 48, 21, 'chisato', '2280chisato.jfif', 1, '2022-11-24', '0000-00-00', 'Dikirim'),
(12, 49, 21, 'rubik', '6795rubik.jfif', 1, '2022-11-24', '0000-00-00', 'Dikirim'),
(13, 49, 21, 'rubik', '6795rubik.jfif', 1, '2022-11-24', '0000-00-00', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_tlp` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('user','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `gender`, `alamat`, `no_tlp`, `username`, `password`, `status`) VALUES
(20, 'hilmy', 'Laki-Laki', 'lmjg', '081931995771', 'hilmy', 'd41d8cd98f00b204e9800998ecf8427e', 'petugas'),
(21, 'radya', 'Laki-Laki', 'mataram', '954843882', 'radya', 'd41d8cd98f00b204e9800998ecf8427e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
