-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 04, 2026 at 01:04 AM
-- Server version: 8.0.44
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_smk_tb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id_jenis_kendaraan` bigint UNSIGNED NOT NULL,
  `nama_jenis_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status_default` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak',
  `urutan` int DEFAULT NULL,
  `durasi_parkir_gratis` int NOT NULL DEFAULT '0',
  `durasi_parkir_harian` int NOT NULL DEFAULT '0',
  `tarif_perjam` int NOT NULL DEFAULT '0',
  `tarif_harian` int NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id_jenis_kendaraan`, `nama_jenis_kendaraan`, `keterangan`, `status_default`, `urutan`, `durasi_parkir_gratis`, `durasi_parkir_harian`, `tarif_perjam`, `tarif_harian`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MPV', 'Avanza, Xenia, Xpander', 'Ya', 1, 15, 12, 5000, 25000, 1, 1, NULL, '2026-06-03 13:52:29', '2026-06-03 14:16:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_06_03_060757_create_users_table', 1),
(2, '2026_06_03_060841_create_jenis_kendaraan_table', 1),
(3, '2026_06_03_060916_create_pintu_parkir_table', 1),
(4, '2026_06_03_060948_create_parkir_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parkir`
--

CREATE TABLE `parkir` (
  `id_parkir` bigint UNSIGNED NOT NULL,
  `id_jenis_kendaraan` bigint UNSIGNED NOT NULL,
  `id_pintu_parkir` bigint UNSIGNED DEFAULT NULL,
  `id_pintu_keluar` bigint UNSIGNED DEFAULT NULL,
  `nomor_polisi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_parkir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tanggal_keluar` datetime DEFAULT NULL,
  `durasi_hari` int NOT NULL DEFAULT '0',
  `durasi_jam` int NOT NULL DEFAULT '0',
  `durasi_menit` int NOT NULL DEFAULT '0',
  `harga_harian` int NOT NULL DEFAULT '0',
  `harga_perjam` int NOT NULL DEFAULT '0',
  `total_bayar` int NOT NULL DEFAULT '0',
  `status_bayar` enum('Menunggu','Sudah') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkir`
--

INSERT INTO `parkir` (`id_parkir`, `id_jenis_kendaraan`, `id_pintu_parkir`, `id_pintu_keluar`, `nomor_polisi`, `kode_parkir`, `tanggal_masuk`, `tanggal_keluar`, `durasi_hari`, `durasi_jam`, `durasi_menit`, `harga_harian`, `harga_perjam`, `total_bayar`, `status_bayar`, `keterangan`, `foto`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 3, 'B0875ERK', 'TR1WEFSN', '2026-06-04 07:27:00', '2026-06-04 00:50:00', 0, 6, 37, 25000, 5000, 30000, 'Sudah', NULL, NULL, 1, 1, NULL, '2026-06-03 17:28:33', '2026-06-03 17:50:31', NULL),
(2, 1, 2, 3, 'F8888ERK', 'LZO8KUQG', '2026-06-04 07:29:00', '2026-06-04 00:47:00', 0, 6, 42, 25000, 5000, 30000, 'Sudah', NULL, NULL, 1, 1, NULL, '2026-06-03 17:29:17', '2026-06-03 17:48:22', NULL),
(3, 1, 2, 3, 'B0875ERK', 'FUPGWYHN', '2026-06-04 08:03:00', '2026-06-04 01:04:00', 0, 6, 59, 25000, 5000, 30000, 'Sudah', NULL, NULL, 1, 1, NULL, '2026-06-03 18:03:50', '2026-06-03 18:04:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pintu_parkir`
--

CREATE TABLE `pintu_parkir` (
  `id_pintu_parkir` bigint UNSIGNED NOT NULL,
  `nama_pintu_parkir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `jenis_pintu` enum('Masuk','Keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pintu_parkir`
--

INSERT INTO `pintu_parkir` (`id_pintu_parkir`, `nama_pintu_parkir`, `keterangan`, `jenis_pintu`, `urutan`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Pintu Masuk Barat 2', 'Oke mantap', 'Masuk', 2, 1, 1, NULL, '2026-06-03 16:34:05', '2026-06-03 16:34:33', NULL),
(3, 'Pintu Keluar 1', 'Oke', 'Keluar', 1, 1, 1, NULL, '2026-06-03 17:42:51', '2026-06-03 17:42:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses_level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Andoyo Andoyo', 'andoyoandoyo@gmail.com', 'andoyo', '02bd2110cf6d75229745092321c819c1c72b91ad', 'Admin', NULL, NULL, NULL, '2026-06-02 23:19:26', '2026-06-02 23:19:26', NULL),
(2, 'Kheira Alexandrina Andoyo', 'javawebmedia@gmail.com', 'kheira', 'fb61cc07d60735719fff32b247cbf966a784b845', 'User', NULL, NULL, NULL, '2026-06-02 23:19:26', '2026-06-02 23:19:26', NULL),
(3, 'Izra Rashid Andoyo', 'izra@gmail.com', 'izra', '2ae84a8f8d0420457846192890ac86478ed3d37a', 'User', NULL, NULL, NULL, '2026-06-02 23:19:26', '2026-06-02 23:19:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenis_kendaraan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkir`
--
ALTER TABLE `parkir`
  ADD PRIMARY KEY (`id_parkir`),
  ADD UNIQUE KEY `parkir_kode_parkir_unique` (`kode_parkir`),
  ADD KEY `parkir_nomor_polisi_index` (`nomor_polisi`),
  ADD KEY `parkir_tanggal_masuk_index` (`tanggal_masuk`);

--
-- Indexes for table `pintu_parkir`
--
ALTER TABLE `pintu_parkir`
  ADD PRIMARY KEY (`id_pintu_parkir`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id_jenis_kendaraan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parkir`
--
ALTER TABLE `parkir`
  MODIFY `id_parkir` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pintu_parkir`
--
ALTER TABLE `pintu_parkir`
  MODIFY `id_pintu_parkir` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
