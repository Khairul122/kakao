-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 09:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumnsn_db`
--
CREATE DATABASE IF NOT EXISTS `bumnsn_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bumnsn_db`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Alat Tulis', '2023-08-02 05:22:22', '2023-12-06 14:02:19'),
(2, 'Perlengkapan', '2023-08-02 05:22:28', '2023-12-06 14:04:00'),
(3, 'Lainnya', '2023-08-02 05:22:34', '2023-12-06 14:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `post_code` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `additional_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:active,0:nonactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `province`, `city`, `post_code`, `address`, `additional_note`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Bruh', '08979999999', 'Sulawesi Barat', 'padang', '25000', 'jln mangga kr putih', 'Nomor 11', '2023-12-12 14:58:05', '2023-12-12 14:58:05', 1),
(2, 'Bruh', '08979999999', 'Sulawesi Barat', 'padang', '25000', 'jln mangga kr putih', 'Nomor 11', '2023-12-12 15:00:13', '2023-12-12 15:00:13', 1),
(6, 'Tomi', '0812345678', 'Aceh', 'Depok', '1213', 'Jalan Pattimura ', 'No 12', '2023-12-15 08:46:47', '2023-12-15 08:46:47', 1),
(7, 'Tomi', '0812345678', 'Aceh', 'Depok', '1213', 'Jalan Pattimura ', 'No 12', '2023-12-15 08:47:32', '2023-12-15 08:47:32', 1),
(8, 'Tomi', '0812345678', 'Aceh', 'Depok', '1213', 'JL PARLA', 'No 12', '2023-12-15 13:53:21', '2023-12-15 13:53:21', 1),
(9, 'Bruh', '08979999999', 'Sulawesi Barat', 'padang', '25000', 'jln mangga kr putih', 'Nomor 11', '2023-12-15 14:12:31', '2023-12-15 14:12:31', 1),
(10, 'Bruh', '08979999999', 'Sulawesi Barat', 'padang', '25000', 'jln mangga kr putih', 'Nomor 11', '2023-12-15 14:15:27', '2023-12-15 14:15:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(150) NOT NULL,
  `no_resi` varchar(150) DEFAULT NULL,
  `amount` double NOT NULL,
  `phone` varchar(20) NOT NULL,
  `discount_promo` double DEFAULT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `required_date` date DEFAULT NULL,
  `shipped_date` date DEFAULT NULL,
  `ekspedisi` varchar(200) NOT NULL,
  `status_bayar` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:belum bayar, 1:sudah bayar',
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:failed,1:active,2:sending, 3:finished, 4:Done',
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `no_resi`, `amount`, `phone`, `discount_promo`, `order_date`, `required_date`, `shipped_date`, `ekspedisi`, `status_bayar`, `customer_id`, `created_at`, `updated_at`, `status`, `comments`) VALUES
(1, 'rhb20231212-1', NULL, 20600, '08979999999', 0, '2023-12-12', NULL, NULL, 'jne', 0, 1, '2023-12-12 14:58:05', '2023-12-12 14:58:05', 1, NULL),
(2, 'bumnag20231212-2', NULL, 20600, '08979999999', 0, '2023-12-12', NULL, NULL, 'jne', 0, 2, '2023-12-12 15:00:13', '2023-12-12 15:00:13', 1, NULL),
(6, 'cbsn20231215-3', 'JNE12121', 78900, '0812345678', 100, '2023-12-15', '2023-12-15', '2023-12-16', 'jne', 1, 6, '2023-12-15 08:46:47', '2023-12-15 13:49:20', 3, NULL),
(7, 'cbsn20231215-7', NULL, 78900, '0812345678', 100, '2023-12-15', NULL, NULL, 'jne', 0, 7, '2023-12-15 08:47:32', '2023-12-15 08:47:32', 1, NULL),
(8, 'cbsn20231215-8', 'JNE11111', 37900, '0812345678', 100, '2023-12-15', '2023-12-15', '2023-12-16', 'jne', 1, 8, '2023-12-15 13:53:21', '2023-12-15 13:56:52', 3, NULL),
(9, 'cbsn20231215-9', NULL, 63000, '08979999999', 0, '2023-12-15', NULL, NULL, 'jne', 0, 9, '2023-12-15 14:12:31', '2023-12-15 14:12:31', 1, NULL),
(10, 'cbsn20231215-10', NULL, 63000, '08979999999', 0, '2023-12-15', NULL, NULL, 'jne', 0, 10, '2023-12-15 14:15:27', '2023-12-15 14:15:27', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `order_number` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:failed,1:active,2:sending, 3:finished'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `variant_id`, `name`, `qty`, `sub_total`, `color`, `size`, `order_number`, `created_at`, `updated_at`, `status`) VALUES
(1, 20, 0, 'Amplop Putih Kecil Paperline', 10, 5600, 'Putih', 'Kecil', 'rhb20231212-1', '2023-12-12 14:58:05', '2023-12-12 14:58:05', 1),
(2, 20, 0, 'Amplop Putih Kecil Paperline', 10, 5600, 'Putih', 'Kecil', 'bumnag20231212-2', '2023-12-12 15:00:13', '2023-12-12 15:00:13', 1),
(12, 40, 0, 'Flasdisk Toshiba 16 GB', 1, 64000, 'Putih', '16 GB', 'cbsn20231215-3', '2023-12-15 08:46:47', '2023-12-15 08:46:47', 1),
(13, 40, 0, 'Flasdisk Toshiba 16 GB', 1, 64000, 'Putih', '16 GB', 'cbsn20231215-7', '2023-12-15 08:47:32', '2023-12-15 08:47:32', 1),
(14, 57, 0, 'Citroklin 780 ml', 1, 23000, 'HIjau', '780 ml', 'cbsn20231215-8', '2023-12-15 13:53:21', '2023-12-15 13:53:21', 1),
(15, 29, 0, 'Tinta Blue Print', 1, 48000, 'Biru', '-', 'cbsn20231215-9', '2023-12-15 14:12:31', '2023-12-15 14:12:31', 1),
(16, 29, 0, 'Tinta Blue Print', 1, 48000, 'Biru', '-', 'cbsn20231215-10', '2023-12-15 14:15:27', '2023-12-15 14:15:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` double NOT NULL,
  `discount_price` double DEFAULT NULL,
  `description` text NOT NULL,
  `label` varchar(30) DEFAULT NULL,
  `path_img` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:active,0:nonactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount_price`, `description`, `label`, `path_img`, `category_id`, `created_at`, `updated_at`, `status`) VALUES
(16, 'Amplop Air Mail Besar (Tali)', 2000, 1800, '', 'new', 'assets/images/upload/Amplop Coklat Besar Air Mail (Tali)_6571a636b3d0f.jpg', 2, '2023-12-07 08:56:36', '2023-12-07 11:02:14', 1),
(17, 'Amplop Polos Quwarto', 380, 0, '', 'best', 'assets/images/upload/Scc4956e3780d4f739249e77564282e22O_6571a612439f2.jpg', 2, '2023-12-07 09:05:33', '2023-12-07 11:01:38', 1),
(18, 'Amplop Coklat Polos Polio', 400, 0, '', '', 'assets/images/upload/392af8a940ee173c0e883ee0da384922_6571a5eccf6b5.jpg', 2, '2023-12-07 09:10:07', '2023-12-07 11:01:00', 1),
(19, 'Amplop Coklat Dinas', 500, 200, '', 'best', 'assets/images/upload/Amplop Coklat Dinas_6571a5cda386c.jpg', 2, '2023-12-07 09:12:43', '2023-12-07 11:00:29', 1),
(20, 'Amplop Putih Kecil Paperline', 1000, 560, 'Dijual Perintilannya', 'best', 'assets/images/upload/Amplop Putih Kecil Paperline_6571aa4e8e447.jpg', 2, '2023-12-07 10:36:58', '2023-12-07 11:19:42', 1),
(21, 'Baterai Remot AAA', 3000, 0, '', 'new', 'assets/images/upload/Baterai Remot AAA_6571a275b0463.jpeg', 3, '2023-12-07 10:46:13', '2023-12-07 10:46:13', 1),
(22, 'Benang Jahit 1 Pak', 20000, 19000, '', 'new', 'assets/images/upload/Macam macam benang jahit_6571a46724752.jpg', 3, '2023-12-07 10:51:48', '2023-12-07 10:54:31', 1),
(23, 'Besi Tulang Map Gobi', 4000, 0, '', 'new', 'assets/images/upload/Besi Tulang Map Gobi_6571a42a70955.jpg', 3, '2023-12-07 10:53:30', '2023-12-07 10:53:30', 1),
(24, 'Amplop Putih Besar Paperline', 800, 780, 'Dijual Perlembarnya', '', 'assets/images/upload/Amplop Putih Besar Paperline_6571aa2ca0567.jpg', 2, '2023-12-07 11:05:30', '2023-12-07 11:19:08', 1),
(25, 'Bantalan stempel Hero', 7000, 0, '', '', 'assets/images/upload/Bantalan stempel Hero_6571a804d95a7.jpg', 2, '2023-12-07 11:09:56', '2023-12-07 11:09:56', 1),
(26, 'Binder Clip No. 107', 30000, 0, 'Dijual 1 Pak nya', '', 'assets/images/upload/Binder Clip No. 107_6571aa855c9d6.jpg', 2, '2023-12-07 11:13:44', '2023-12-07 11:20:37', 1),
(27, 'Binder Clip No. 111', 54000, 0, 'Dijual 1 Pak', 'new', 'assets/images/upload/Binder Clip No. 111_6571aab7cf52d.jpg', 2, '2023-12-07 11:21:27', '2023-12-07 11:21:27', 1),
(28, 'Binder Clip No. 260', 16000, 0, 'Dijual 1 Pak', '', 'assets/images/upload/Kenko_Binder_Clip_No260_6571ab33eee42.jpg', 2, '2023-12-07 11:23:31', '2023-12-07 11:23:31', 1),
(29, 'Tinta Blue Print', 50000, 48000, '', 'new', 'assets/images/upload/Blue Print_6571abe8a1265.jpg', 2, '2023-12-07 11:26:32', '2023-12-07 11:26:32', 1),
(30, 'Block Note Paperline Besar', 2100, 0, '', '', 'assets/images/upload/Block Note Paperline Besar_6571ac87c951a.jpg', 2, '2023-12-07 11:29:11', '2023-12-07 11:29:11', 1),
(31, 'Buku Agenda Fashion Kecil', 10000, 0, '', 'new', 'assets/images/upload/Buku Agenda fashion kecil_6571ad705f1be.jpg', 2, '2023-12-07 11:33:04', '2023-12-07 11:33:04', 1),
(32, 'Buku Besar OKEY Folio 1 Pak', 76000, 0, '', '', 'assets/images/upload/Buku Besar OKEY Folio_6571ae2a048ef.jpg', 2, '2023-12-07 11:36:10', '2023-12-07 11:36:10', 1),
(33, 'Buku Iqra\'', 6400, 0, '', '', 'assets/images/upload/Buku Iqra\'_6571af8347f1e.jpg', 2, '2023-12-07 11:41:55', '2023-12-07 11:41:55', 1),
(34, 'Buku Gambar A4', 3200, 0, '', '', 'assets/images/upload/Buku Gambar A4_6571afa1a372f.png', 2, '2023-12-07 11:42:25', '2023-12-07 11:42:25', 1),
(35, 'Cadrige black', 255000, 0, '', 'new', 'assets/images/upload/Cadrige black_6571d6c017d4b.jpg', 3, '2023-12-07 14:29:20', '2023-12-07 14:29:20', 1),
(36, 'Cat Air Acrylic ', 21000, 0, '', '', 'assets/images/upload/Cat Air Acrylic_6571d80e2bb1b.jpg', 2, '2023-12-07 14:34:54', '2023-12-07 14:34:54', 1),
(37, 'CD - R ', 80000, 0, '', '', 'assets/images/upload/CD - R_6571d9679553e.jpg', 3, '2023-12-07 14:38:37', '2023-12-07 14:40:39', 1),
(38, 'Crayon', 120000, 0, '', '', 'assets/images/upload/Crayon_6571da44f3a80.jpg', 2, '2023-12-07 14:44:21', '2023-12-07 14:44:21', 1),
(39, 'Kertas HVS Natural A4', 45000, 0, '', 'best', 'assets/images/upload/Kertas HVS Natural A4_6571dabd8f9e5.jpg', 2, '2023-12-07 14:46:21', '2023-12-07 14:46:21', 1),
(40, 'Flasdisk Toshiba 16 GB', 64000, 0, '', '', 'assets/images/upload/Flasdisk Toshiba_6571db6f2ec53.png', 3, '2023-12-07 14:49:19', '2023-12-07 14:49:19', 1),
(41, 'Isi Binder Campus', 7600, 0, '', 'best', 'assets/images/upload/Isi Binder Campus_6571dc187fe35.jpg', 2, '2023-12-07 14:52:08', '2023-12-07 14:52:08', 1),
(42, 'Kertas Diamant', 80000, 0, 'Dijual Per-Paknya', '', 'assets/images/upload/Kertas Diamant_6571dcc94d166.jpg', 2, '2023-12-07 14:55:05', '2023-12-07 14:55:05', 1),
(43, 'Kertas Buffalo', 500, 0, 'Dijual Perlembarnya', '', 'assets/images/upload/Kertas Buffalo_6571dd481d9af.png', 2, '2023-12-07 14:57:12', '2023-12-07 14:57:12', 1),
(44, 'Kertas Kado', 1600, 0, '', 'best', 'assets/images/upload/Kertas Kado_6571de3c4ea02.jpg', 3, '2023-12-07 15:01:16', '2023-12-07 15:01:16', 1),
(45, 'Lem Fox', 11000, 0, '', '', 'assets/images/upload/Lem Fox_6571dec0dc3d4.jpg', 3, '2023-12-07 15:03:28', '2023-12-07 15:03:28', 1),
(46, 'Pena Pilot', 1600, 0, '', 'best', 'assets/images/upload/Pena pilot hitam_6571df97d6f48.jpg', 1, '2023-12-07 15:07:03', '2023-12-07 15:07:03', 1),
(47, 'Pena Quantum', 1000, 0, '', '', 'assets/images/upload/Pena Quantum_6571e00aebacf.jpg', 1, '2023-12-07 15:08:58', '2023-12-07 15:08:58', 1),
(48, 'Pena Standar AE-9', 1500, 0, '', 'best', 'assets/images/upload/Pena Standar AE-9_6571e06b9822a.jpg', 1, '2023-12-07 15:10:35', '2023-12-07 15:10:35', 1),
(49, 'Pena Mey Gel', 5000, 0, '', '', 'assets/images/upload/Pena Mey Gel Hitam_6571e10f35edb.jpeg', 1, '2023-12-07 15:13:19', '2023-12-07 15:13:19', 1),
(50, 'Pencil 2B Greebel', 2300, 0, '', 'best', 'assets/images/upload/Pencil 2B Greebel_6571e1ff33a27.jpg', 1, '2023-12-07 15:17:19', '2023-12-07 15:17:19', 1),
(51, 'Pencil 2B Montana', 1000, 0, '', '', 'assets/images/upload/Cuplikan layar 2023-12-07 221635_6571e27ccc758.png', 1, '2023-12-07 15:19:24', '2023-12-07 15:19:24', 1),
(52, 'Pencil Cadwell', 3000, 0, '', '', 'assets/images/upload/Pencil Cadwell_657c567552f7a.jpg', 1, '2023-12-07 16:16:09', '2023-12-15 13:36:53', 1),
(53, 'Penghapus Pencil', 1200, 0, '', 'best', 'assets/images/upload/Penghapus Pencil_6571f07c928e5.jpg', 1, '2023-12-07 16:19:08', '2023-12-07 16:19:08', 1),
(54, 'Citroklin 210 ml', 6000, 0, '', 'best', 'assets/images/upload/WhatsApp Image 2023-12-15 at 20.35.19_17e4e79d_657c56c0bbaea.jpg', 3, '2023-12-15 13:38:08', '2023-12-15 13:38:08', 1),
(55, 'Citroklin 400ml', 10000, 0, '', 'best', 'assets/images/upload/WhatsApp Image 2023-12-15 at 20.35.07_b50e0354_657c57322414d.jpg', 3, '2023-12-15 13:40:02', '2023-12-15 13:40:02', 1),
(56, 'Citroklin 470ml', 17000, 0, '', 'best', 'assets/images/upload/WhatsApp Image 2023-12-15 at 20.35.07_b50e0354_657c576e298f5.jpg', 3, '2023-12-15 13:41:02', '2023-12-15 13:41:02', 1),
(57, 'Citroklin 780 ml', 23000, 0, '', 'best', 'assets/images/upload/WhatsApp Image 2023-12-15 at 20.35.07_b50e0354_657c57bd5a2d6.jpg', 3, '2023-12-15 13:42:21', '2023-12-15 13:42:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(11) NOT NULL,
  `path_img` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`id`, `path_img`, `product_id`) VALUES
(53, 'assets/images/upload/varian 2_6571a2ec3c07c.jpg', 21),
(54, 'assets/images/upload/Bantalan stempel Hero Warna Biru_6571a861bcb25.jpg', 25),
(55, 'assets/images/upload/Pena pilot biru_6571dfc1e25b5.jpeg', 46),
(56, 'assets/images/upload/Pena Mey Gel biru_6571e1426e7e2.jpg', 49),
(57, 'assets/images/upload/Penghapus pencil putih_6571fba093bd1.jpg', 53);

-- --------------------------------------------------------

--
-- Table structure for table `product_varians`
--

CREATE TABLE `product_varians` (
  `id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(10) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_varians`
--

INSERT INTO `product_varians` (`id`, `color`, `size`, `stock`, `product_id`) VALUES
(36, 'Coklat', 'Kecil', 990, 17),
(37, 'Coklat', 'F4', 12, 16),
(38, 'Coklat', '-', 994, 19),
(39, 'Coklat', 'F4', 802, 18),
(40, 'Putih', 'Kecil', 468, 20),
(41, 'Hijau', 'AAA', 6, 21),
(42, 'Coklat', 'AAA', 5, 21),
(43, 'Random', '1 Pak', 6, 22),
(44, 'HItam', '-', 25, 23),
(45, 'Putih', 'Besar', 372, 24),
(46, 'Ungu', 'Menengah', 10, 25),
(47, 'Biru', 'Menengah', 10, 25),
(48, 'Hitam', 'No. 107', 5, 26),
(49, 'Hitam', 'No. 111', 5, 27),
(50, 'Hitam', 'No. 260', 3, 28),
(51, 'Biru', '-', 7, 29),
(52, 'Kuning', 'Besar', 43, 30),
(53, 'Hitam', 'Kecil', 14, 31),
(54, 'Random', 'F4', 5, 32),
(55, 'Random', '-', 6, 33),
(56, 'Random', 'A4', 8, 34),
(57, 'Hitam', '-', 2, 35),
(58, 'All in One', 'Menengah', 4, 36),
(59, '-', '1 Box', 3, 37),
(60, '24 Warna', 'Kecil', 12, 38),
(61, '-', 'F4', 7, 39),
(62, 'Putih', '16 GB', 1, 40),
(63, 'Random', 'Menengah', 8, 41),
(64, 'Putih', 'A4', 3, 42),
(65, 'Merah', 'A4', 55, 43),
(66, 'Biru', 'A4', 50, 43),
(67, 'Hijau', 'A4', 60, 43),
(68, 'Oren', 'A4', 50, 43),
(69, 'Kuning', 'A4', 60, 43),
(70, 'Random', 'One Size', 20, 44),
(71, '-', 'Menengah', 8, 45),
(72, 'Hitam', '-', 17, 46),
(73, 'Biru', '-', 22, 46),
(74, 'Random', '-', 10, 47),
(75, 'Hitam', '-', 15, 48),
(76, 'Biru', '-', 15, 48),
(77, 'Merah', '-', 20, 48),
(78, 'Hitam', '-', 12, 49),
(79, 'Biru', '-', 10, 49),
(80, '-', '-', 121, 50),
(81, '-', '-', 10, 51),
(82, 'Random', '-', 109, 52),
(83, 'Hitam', '-', 15, 53),
(84, 'Putih', '-', 10, 53),
(85, 'HIjau', '210 ml', 10, 54),
(86, 'HIjau', '400 ml', 10, 55),
(87, 'HIjau', '470 ml', 10, 56),
(88, 'HIjau', '780 ml', 9, 57);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `discount` double NOT NULL,
  `expired_on` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:active, 0:deactived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `code`, `name`, `discount`, `expired_on`, `created_at`, `updated_at`, `status`) VALUES
(2, 'BUMNAG2023', 'DISKON BELANJA', 100, '2023-12-31', '2023-12-13 15:03:54', '2023-12-14 10:28:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:active, 0:nonactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$WsgU7VT8zpJMnoiln4nDLuOIl6EVGtAgjSo3g7dJnke0e79m0N8iW', '2023-07-26 15:41:13', '2023-07-26 15:41:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_number` (`order_number`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_varians`
--
ALTER TABLE `product_varians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product_varians`
--
ALTER TABLE `product_varians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_5` FOREIGN KEY (`order_number`) REFERENCES `orders` (`order_number`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `product_img_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_varians`
--
ALTER TABLE `product_varians`
  ADD CONSTRAINT `product_varians_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
