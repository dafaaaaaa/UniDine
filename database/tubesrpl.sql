-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 12:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubesrpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `no_meja` varchar(5) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(11) DEFAULT 'Kosong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`no_meja`, `kapasitas`, `deskripsi`, `status`) VALUES
('A01', 5, 'lt1', 'Terisi'),
('A02', 7, 'lt1', 'Terisi'),
('A03', 7, 'lt1', 'Terisi'),
('A10', 10, 'ajdoasjdsada', 'Terisi'),
('B01', 7, 'lt 1 tengah', 'Terisi'),
('B02', 7, 'lt 1 tengah', 'Terisi');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(7) NOT NULL,
  `no_meja` varchar(11) NOT NULL,
  `jumlah_tamu` int(3) NOT NULL,
  `tanggal_pesan` varchar(50) NOT NULL,
  `total` int(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `no_meja`, `jumlah_tamu`, `tanggal_pesan`, `total`, `status`) VALUES
(1, 'A01  ', 5, '2023-08-11 18:45:56', 88000, 'Selesai'),
(2, 'A02  ', 6, '2023-08-11 18:46:47', 63000, 'Selesai'),
(3, 'A03  ', 4, '2023-08-11 19:19:27', 20000, 'Pending'),
(4, 'B02  ', 5, '2023-08-12 04:44:02', 55000, 'Pending'),
(6, 'B01  ', 10, '2023-08-12 04:45:57', 20000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(5) NOT NULL,
  `kd_menu` varchar(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deks` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `kd_menu`, `nama`, `deks`, `kategori`, `harga`, `pic`, `status`) VALUES
(1, 'MA01', 'Nasi Goreng', 'Cabe Ijo', 'Makanan', 20000, 'Nasi.jpeg', 'Tersedia'),
(2, 'MA02', 'Mie Kocok', 'Mie Kocok Bandung', 'Makanan', 15000, 'Kentang.jpeg', 'Tersedia'),
(3, 'MA03', 'Bakso', 'Bakso Malang', 'Makanan', 15000, 'mie_bakso.jpeg', 'Tersedia'),
(4, 'MI01', 'Es Jeruk', 'Es Jeruk Purut', 'Minuman', 10000, 'Jus.jpeg', 'Tersedia'),
(5, 'MI02', 'Es Teh', 'Teh manis dingin', 'Minuman', 8000, 'esteh.jpg', 'Tersedia'),
(6, 'CE01', 'Cireng Isi', 'Isi Ayam', 'Cemilan', 10000, 'cireng.jpeg', 'Tersedia'),
(7, 'CE2', 'Batagor', 'Kuah / Kering', 'Cemilan', 8000, 'batagor.jpeg', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_pesanan`
--

CREATE TABLE `tbl_temp_pesanan` (
  `id_order` int(7) NOT NULL,
  `id_pesanan` varchar(55) NOT NULL,
  `id_menu` varchar(11) NOT NULL,
  `qt` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_temp_pesanan`
--

INSERT INTO `tbl_temp_pesanan` (`id_order`, `id_pesanan`, `id_menu`, `qt`) VALUES
(1, '1', '1', 2),
(2, '1', '2', 3),
(3, '1', '4', 2),
(4, '1', '5', 1),
(5, '2', '2', 5),
(6, '2', '3', 1),
(8, '2', '5', 1),
(9, '3', '1', 1),
(10, '4', '1', 2),
(11, '4', '3', 1),
(12, '6', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'pelayan', '511cc40443f2a1ab03ab373b77d28091', '1'),
(2, 'koki', 'c38be0f1f87d0e77a0cd2fe6941253eb', '2'),
(3, 'kasir', 'c7911af3adbd12a035b289556d96470a', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_temp_pesanan`
--
ALTER TABLE `tbl_temp_pesanan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_temp_pesanan`
--
ALTER TABLE `tbl_temp_pesanan`
  MODIFY `id_order` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
