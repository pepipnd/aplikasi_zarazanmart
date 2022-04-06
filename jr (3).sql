-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 08:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jr`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori_id` int(3) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `tahun_pembelian` year(4) NOT NULL,
  `keadaan_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori_id`, `gambar`, `jumlah_barang`, `tahun_pembelian`, `keadaan_barang`, `harga`, `sumber_dana`, `id_lokasi`) VALUES
(1, 'Mouse GENIUS', 2, '', 12, 2021, 'Baik', 200000, 'Dana BOS', 2),
(2, 'Keyboard LOGITECH', 3, '', 15, 2021, 'Rusak Ringan', 280000, 'Dana Komite', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(5) NOT NULL,
  `jumlah_keluar` int(4) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `tanggal`, `id_barang`, `jumlah_keluar`, `status`) VALUES
(1, '2021-10-20', 1, 2, 0),
(2, '2021-10-19', 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(5) NOT NULL,
  `jumlah_masuk` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `tanggal`, `id_barang`, `jumlah_masuk`) VALUES
(1, '2021-10-19', 1, 2),
(2, '2021-10-19', 1, 2),
(3, '2021-10-20', 2, 1),
(4, '2021-10-20', 2, 1),
(5, '2021-10-19', 1, 3),
(6, '2021-10-20', 2, 2),
(7, '2021-10-19', 1, 2),
(8, '2021-10-20', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Monitor'),
(2, 'Mouse'),
(3, 'Keyboard'),
(4, 'CPU'),
(5, 'Laptop'),
(6, 'TV'),
(7, 'Proyektor'),
(8, 'CCTV'),
(9, 'AC'),
(10, 'Alat-alat'),
(12, 'Kursi'),
(13, 'Meja');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruang` int(3) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruang`, `nama_ruang`) VALUES
(1, 'Lab 1'),
(2, 'Lab 2'),
(4, 'jsdjdj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `nama_lengkap`, `no_hp`, `alamat_lengkap`, `email`, `password`, `level`, `foto`) VALUES
(1, 'Pepi', '08996335548', 'jalan argasari tasikmalaya', 'pepi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'pg.jpg'),
(15, 'caca', '08996335548', 'tasik', 'caca@gmail.com', '1f32aa4c9a1d2ea010adcf2348166a04', 'admin', 'pg3.jpg'),
(43, 'sahla', '089877654433', 'tasikmalaya', 'sahla@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'user2.png'),
(47, 'lala nur', '0856237837474', 'Tasikmalaya', 'lala@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_trs`
--

CREATE TABLE `tmp_trs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `status` enum('Y','N','P') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `customer_id`, `tanggal`, `kode_transaksi`, `status`) VALUES
(1, 9, '2021-07-30', 'INV/20210730/001', 'P'),
(2, 9, '2021-07-30', 'INV/20210730/002', 'P'),
(3, 8, '2021-07-30', 'INV/20210730/003', 'P'),
(4, 8, '2021-07-31', 'INV/20210731/004', 'P'),
(5, 8, '2021-07-31', 'INV/20210731/005', 'P'),
(6, 13, '2021-07-31', 'INV/20210731/006', 'Y'),
(7, 16, '2021-08-18', 'INV/20210818/007', 'P'),
(8, 20, '2021-08-18', 'INV/20210818/008', 'P'),
(9, 20, '2021-08-20', 'INV/20210820/009', 'P'),
(10, 20, '2021-08-23', 'INV/20210823/010', 'P'),
(11, 20, '2021-08-23', 'INV/20210823/011', 'P'),
(12, 20, '2021-08-23', 'INV/20210823/012', 'P'),
(13, 20, '2021-08-24', 'INV/20210824/013', 'P'),
(14, 20, '2021-08-25', 'INV/20210825/014', 'P'),
(15, 20, '2021-08-25', 'INV/20210825/015', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `produk_id`, `jumlah`, `transaksi_id`) VALUES
(1, 3, 1, 1),
(2, 3, 2, 2),
(3, 2, 3, 3),
(4, 2, 1, 4),
(5, 1, 2, 4),
(6, 3, 3, 4),
(7, 3, 1, 5),
(8, 2, 4, 6),
(9, 3, 1, 6),
(10, 1, 2, 7),
(11, 3, 1, 8),
(12, 5, 1, 9),
(13, 15, 1, 10),
(14, 15, 1, 11),
(15, 17, 9, 12),
(16, 15, 1, 13),
(17, 17, 2, 14),
(18, 18, 1, 15),
(19, 16, 2, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_trs`
--
ALTER TABLE `tmp_trs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_keluar` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tmp_trs`
--
ALTER TABLE `tmp_trs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
