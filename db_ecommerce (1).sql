-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2025 pada 20.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanans`
--

CREATE TABLE `detail_pesanans` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pesanans`
--

INSERT INTO `detail_pesanans` (`id_detail`, `id_pesanan`, `id_produk`, `jumlah`, `harga_satuan`) VALUES
(70, 70, 29, 3, 58500.00),
(71, 71, 29, 4, 58500.00),
(72, 72, 34, 2, 60000.00),
(73, 73, 33, 5, 26000.00),
(74, 74, 31, 4, 24000.00),
(75, 75, 30, 5, 135000.00),
(76, 76, 32, 2, 46000.00),
(77, 77, 31, 5, 24000.00),
(78, 78, 29, 2, 58500.00),
(79, 79, 32, 3, 46000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkirs`
--

CREATE TABLE `ongkirs` (
  `id_ongkir` int(11) NOT NULL,
  `harga_ongkir` int(11) NOT NULL,
  `daerah_ongkir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `status` enum('Dikemas','Dikirim','Selesai','Batal') NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `harga_ongkir` int(11) NOT NULL,
  `bukti_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id_pesanan`, `id_pelanggan`, `nama`, `tanggal_pesanan`, `status`, `total_harga`, `bukti`, `harga_ongkir`, `bukti_foto`) VALUES
(70, 12, 'Rahmat Saputra', '2025-07-10 14:34:48', 'Dikemas', 187500.00, NULL, 12000, NULL),
(71, 13, 'Diah Indah Sari', '2025-07-10 14:39:05', 'Dikemas', 254000.00, NULL, 20000, NULL),
(72, 14, 'Riski Putra', '2025-07-10 14:42:08', 'Dikemas', 130000.00, NULL, 10000, NULL),
(73, 15, 'Putra Ramadhan', '2025-07-10 14:44:28', 'Dikemas', 140000.00, NULL, 10000, NULL),
(74, 16, 'Geby Grimelda', '2025-07-10 14:46:43', 'Dikemas', 108000.00, NULL, 12000, NULL),
(75, 17, 'Friskana Putri', '2025-07-10 14:48:52', 'Dikemas', 693000.00, NULL, 18000, NULL),
(76, 18, 'Nabila Sari', '2025-07-10 14:50:51', 'Dikemas', 105000.00, NULL, 13000, NULL),
(77, 19, 'Havids Putra', '2025-07-10 14:52:39', 'Dikemas', 135000.00, NULL, 15000, NULL),
(78, 20, 'Januar Efendi', '2025-07-10 14:54:06', 'Dikemas', 140000.00, NULL, 23000, NULL),
(79, 21, 'Nia Rahma Putri', '2025-07-10 14:55:29', 'Dikemas', 158000.00, NULL, 20000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `bahan` varchar(30) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id_produk`, `id_penjual`, `nama_produk`, `deskripsi`, `harga`, `stok_awal`, `stok`, `bahan`, `gambar`) VALUES
(29, 11, 'Cocoa Nibs', 'Organic - Nutrient Dense _Free Sugar', 58500.00, NULL, 82, 'Cocoa Nibs', 'produk/lgH9D3XQftSBXNuz0vjnvEwLTyCiJ3lHOn40XNkF.jpg'),
(30, 11, 'Cocoa Powder', 'Gluten Free - Non GMO Verified', 135000.00, NULL, 83, 'Cocoa Powder', 'produk/ZsyP9FYiV14cUcE2yflQacaTmYiS0uSVaMKZAMH9.jpg'),
(31, 11, 'Premium Milk Chocolate', 'Cokelat Campur Susu Asli', 24000.00, 6, 82, 'Premiun Milk Chocolate', 'produk/U6Z4n9M40jJy0WvbVsEJD9GSoRFXhNKk84FTGLMr.jpg'),
(32, 11, 'Dark Chocolate', 'Cokelat Hitam 70% Kakao', 46000.00, NULL, 93, 'Dark Chocolate', 'produk/azDYQuPYKn0XqhHY6HYQTWx991sDwYNrWfEtJha6.jpg'),
(33, 11, 'Organic 100% Dark Chocolate', 'Cokelat Murni Tanpa Campur Yang lain', 26000.00, NULL, 90, 'Organic 100% Dark Chocolate', 'produk/Vt94jsEQVwBuBZkznMN6J90ILXedWbcBk8Ho4QtM.jpg'),
(34, 11, 'Healthy Chocolate', '70% Dark Chocolate Sea Salt', 60000.00, NULL, 92, 'Healthy Chocolate', 'produk/vnkC8UyQ7oIONS4WeosXaraPfXBApTwiWB2CY2LD.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `nama`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(7, 'fiqye', 'Kota Paiaman', '081261712152', '2025-06-29 07:48:32', '2025-06-29 07:48:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_suppliers`
--

CREATE TABLE `transaksi_suppliers` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_supplier` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_suppliers`
--

INSERT INTO `transaksi_suppliers` (`id_transaksi`, `id_supplier`, `id_produk`, `harga_beli`, `jumlah`, `tanggal_transaksi`, `created_at`, `updated_at`) VALUES
(13, 7, 31, 24000.00, 4, '2025-06-18 00:00:00', '2025-06-29 20:50:48', '2025-06-29 20:50:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasans`
--

CREATE TABLE `ulasans` (
  `id_ulasan` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `komentar` text DEFAULT NULL,
  `tanggal_ulasan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `role` enum('admin','pelanggan','penjual') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `alamat`, `no_hp`, `role`) VALUES
(9, 'pelanggan', 'pelanggan@gmail.com', '$2y$12$k0AiL2O90fvDSs5TfDcTQu1DbNWUAAe7bJL1Jjzes9Vtmg7B5c7fu', 'pariaman', '081374915014', 'pelanggan'),
(10, 'penjual', 'penjual@gmail.com', '$2y$12$vTS.JRe8epodxuh2D/MlWOghIGLed6xhekqna4ZMxlx2Rpp62zs.W', 'Pariaman', '081356784532', 'penjual'),
(11, 'fiqye', 'fiqye311@gmail.com', '$2y$12$iCXn4gIK/cNdxTdDaMby6O78YccvFZc6PDcboCCSkSfrZf1okijwi', 'pariaman', '081261712152', 'admin'),
(12, 'Rahmat Saputra', 'asep@gmail.com', '$2y$12$eDL5ZZUB3SPplcA5aaL72OFl/QvejWULSjsoqEdOSaBuDb2bp6b7G', 'padang', '081356784532', 'pelanggan'),
(13, 'Diah Indah Sari', 'diah@gmail.com', '$2y$12$8ZI/NIdLIeszIMVouhSVve77uPwMBcER6O1RITtq52X8UiI59w7jq', 'Bukittinggi', '081267834567', 'pelanggan'),
(14, 'Riski Putra', 'riski@gmaill.com', '$2y$12$7qmUGaMlOAoeOcUQCpAlbubOzyzbqosqqpT.eCljQczrurX3I4OWa', 'Pariaman', '087956423467', 'pelanggan'),
(15, 'Putra Ramadhan', 'putra@gmaill.com', '$2y$12$zqWS5VSs0ybbEgmwe02LlOoFSSHX1NmrRF2t2Pu.gAulCQn0EqN/i', 'Pariaman', '088956742300', 'pelanggan'),
(16, 'Geby Grimelda', 'geby@gmaill.com', '$2y$12$X0xg0gqoqW9oZDcFJ3CtiObtWtUqjGRufMkKLp7jMuKO.HtNDce9u', 'Padang', '081245672345', 'pelanggan'),
(17, 'Friskana Putri', 'friska@gmaill.com', '$2y$12$y977Jy/kUn6sDpLCKCAW3OUZNobhvZW00jeCxepsVYLertiufNY4y', 'Solok', '081256783455', 'pelanggan'),
(18, 'Nabila Sari', 'nabila@gmaill.com', '$2y$12$aDbp/rO.l02JU4Lnez2vtuBg9WaCEQGa3/Si1Ah4npuTQURFi4/QO', 'Padang Panjang', '081267452367', 'pelanggan'),
(19, 'Havids Putra', 'havis@gmaill.com', '$2y$12$kqbD0WYg6YWt9qCTKZ/84Oc9TZFvEu6ujGZFJeR8arz88p/VDdJWa', 'BatuSangka', '081231412564', 'pelanggan'),
(20, 'Januar Efendi', 'januar@gmaill.com', '$2y$12$FdRg712Furg83.yOSW0RveMpcKH14iVdDpj0pmJPdonjlOsWoOiW.', 'Dhamasraya', '088934678923', 'pelanggan'),
(21, 'Nia Rahma Putri', 'nia@gmaill.com', '$2y$12$AD.PJseqnm724RTuxNJx0.tefJyNz3TyuvBi5dACKfvtRQJlB62Ji', 'Bukittinggi', '081256783499', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_pesanans_id_pesanan_foreign` (`id_pesanan`),
  ADD KEY `detail_pesanans_id_produk_foreign` (`id_produk`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ongkirs`
--
ALTER TABLE `ongkirs`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `transaksi_suppliers`
--
ALTER TABLE `transaksi_suppliers`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_suppliers_id_supplier_foreign` (`id_supplier`),
  ADD KEY `transaksi_suppliers_id_produk_foreign` (`id_produk`);

--
-- Indeks untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `ulasans_id_produk_foreign` (`id_produk`),
  ADD KEY `ulasans_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ongkirs`
--
ALTER TABLE `ongkirs`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaksi_suppliers`
--
ALTER TABLE `transaksi_suppliers`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id_ulasan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD CONSTRAINT `detail_pesanans_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanans` (`id_pesanan`),
  ADD CONSTRAINT `detail_pesanans_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `transaksi_suppliers`
--
ALTER TABLE `transaksi_suppliers`
  ADD CONSTRAINT `transaksi_suppliers_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id_produk`),
  ADD CONSTRAINT `transaksi_suppliers_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id_produk`),
  ADD CONSTRAINT `ulasans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
