-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 05:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(20) NOT NULL,
  `kode_menu` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL,
  `tipe` varchar(225) NOT NULL,
  `statuss` varchar(255) NOT NULL,
  `quantity` int(20) NOT NULL,
  `nama_berkas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `kode_menu`, `menu`, `harga`, `tipe`, `statuss`, `quantity`, `nama_berkas`) VALUES
(1, '', 'Sushi Omakase', 50000, 'Food', 'Available', 0, 'upload/Sushi Omakase.png'),
(2, '', 'Wagyu Steak', 150000, 'Food', 'Available', 0, 'upload/Wagyu Steak.png'),
(3, '', 'Tempura Moriawase', 60000, 'Food', 'Available', 0, 'upload/image 5-2.png'),
(4, '', 'Sashimi Moriawase', 90000, 'Food', 'Available', 0, 'upload/sashimi.png'),
(5, '', 'Matcha Tiramisu', 30000, 'Food', 'Available', 0, 'upload/Matcha Tiramisu.png'),
(6, '', 'Kaiseki Ryori', 50000, 'Food', 'Available', 0, 'upload/Kaiseki Ryori.png'),
(7, '', 'Yakitori Assortment', 30000, 'Food', 'Available', 0, 'upload/Yakitori.png'),
(8, '', 'Gindara Teriyaki', 50000, 'Food', 'Available', 0, 'upload/Gindara Teriyaki.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `statuss` varchar(255) NOT NULL,
  `order_time` datetime NOT NULL,
  `stats` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12312325;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
