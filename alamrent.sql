-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2026 at 01:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alamrent`
--

-- --------------------------------------------------------
-- Table structure for table `failed_jobs`
-- --------------------------------------------------------

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `kendaraans`
-- --------------------------------------------------------

CREATE TABLE `kendaraans` (
  `id` bigint UNSIGNED NOT NULL,
  `merk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `platanomor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('tersedia','disewa','perbaikan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans`
(`id`, `merk`, `deskripsi`, `harga`, `platanomor`, `gambar`, `status`, `created_at`, `updated_at`)
VALUES
(1, 'Toyota Fortuner', 'Memberikan kenyamanan ekstra serta kesan elegan bagi penggunanya.', 750000, 'B 2112 ALM', 'mobil5.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(2, 'Honda Mobilio', 'Cocok digunakan untuk kebutuhan transportasi keluarga sehari-hari.', 360000, 'B 2120 ALM', 'mobil6.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(3, 'Daihatsu Xenia', 'Kabin luas dengan konsumsi bahan bakar yang cukup efisien.', 340000, 'B 2118 ALM', 'mobil4.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(4, 'Honda Brio', 'Mobil kecil, irit, dan mudah diparkir.', 300000, 'B 1004 BRI', 'mobil4.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(5, 'Mitsubishi Xpander', 'MPV modern dengan kabin luas.', 400000, 'B 1005 XPD', 'mobil5.jpg', 'disewa', '2026-01-08 06:45:50', '2026-01-08 06:53:04'),
(6, 'Honda Mobilio', 'Cocok digunakan untuk kebutuhan transportasi keluarga sehari-hari.', 360000, 'B 2120 ALM', 'mobil6.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(7, 'Honda HR-V', 'Nyaman digunakan untuk aktivitas harian dengan tampilan stylish.', 500000, 'B 2114 ALM', 'mobil7.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(8, 'Suzuki Ertiga', 'Irit BBM dan nyaman.', 330000, 'B 1008 ERG', 'mobil1.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(9, 'Toyota Rush', 'Memberikan kenyamanan berkendara dengan ground clearance yang tinggi.', 420000, 'B 2116 ALM', 'mobil2.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50');

-- --------------------------------------------------------
-- Table structure for table `migrations`
-- --------------------------------------------------------

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_01_08_093900_create_kendaraans_table', 1),
(6, '2026_01_08_094028_create_penyewaans_table', 1);

-- --------------------------------------------------------
-- Table structure for table `password_reset_tokens`
-- --------------------------------------------------------

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `penyewaans`
-- --------------------------------------------------------

CREATE TABLE `penyewaans` (
  `id` bigint UNSIGNED NOT NULL,
  `kendaraan_id` bigint UNSIGNED NOT NULL,
  `nama_penyewa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi_sewa` int NOT NULL,
  `total_harga` int NOT NULL,
  `metode_pembayaran` enum('tunai','transfer','kartu_kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` enum('menunggu','dp','lunas','batal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `penyewaans`
(`id`, `kendaraan_id`, `nama_penyewa`, `nik`, `alamat`, `durasi_sewa`, `total_harga`, `metode_pembayaran`, `status_pembayaran`, `created_at`, `updated_at`)
VALUES
(3, 1, 'Baharudin', '332109080001', 'Brebes', 2, 700000, 'tunai', 'lunas', '2026-01-08 07:52:36', '2026-01-08 06:53:08'),
(4, 5, 'Siti', '3321090800023', 'Tegal', 2, 900000, 'tunai', 'menunggu', '2026-01-08 09:45:23', '2026-01-08 06:53:04');

-- --------------------------------------------------------
-- Indexes & AUTO_INCREMENT
-- --------------------------------------------------------

ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kendaraans_platanomor_unique` (`platanomor`);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

ALTER TABLE `penyewaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyewaans_kendaraan_id_foreign` (`kendaraan_id`);

ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `kendaraans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `penyewaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `penyewaans`
  ADD CONSTRAINT `penyewaans_kendaraan_id_foreign`
  FOREIGN KEY (`kendaraan_id`)
  REFERENCES `kendaraans` (`id`)
  ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
