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
-- Database: `nabilrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

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

--
-- Table structure for table `kendaraans`
--

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

INSERT INTO `kendaraans` (`id`, `merk`, `deskripsi`, `harga`, `platanomor`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Toyota Avanza', 'Mobil keluarga nyaman dan irit bahan bakar.', 350000, 'B 1001 AVZ', 'mobil1.jpg', 'disewa', '2026-01-08 06:45:50', '2026-01-08 06:52:36'),
(2, 'Toyota Avanza', 'Cocok untuk perjalanan jauh dan harian.', 350000, 'B 1002 AVZ', 'mobil2.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(3, 'Honda Brio', 'City car lincah untuk penggunaan dalam kota.', 300000, 'B 1003 BRI', 'mobil3.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(4, 'Honda Brio', 'Mobil kecil, irit, dan mudah diparkir.', 300000, 'B 1004 BRI', 'mobil4.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(5, 'Mitsubishi Xpander', 'MPV modern dengan kabin luas.', 400000, 'B 1005 XPD', 'mobil5.jpg', 'disewa', '2026-01-08 06:45:50', '2026-01-08 06:53:04'),
(6, 'Mitsubishi Xpander', 'Suspensi empuk dan nyaman.', 400000, 'B 1006 XPD', 'mobil6.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(7, 'Suzuki Ertiga', 'Mobil keluarga ekonomis.', 330000, 'B 1007 ERG', 'mobil7.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(8, 'Suzuki Ertiga', 'Irit BBM dan nyaman.', 330000, 'B 1008 ERG', 'mobil1.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(9, 'Daihatsu Terios', 'SUV tangguh untuk berbagai medan.', 450000, 'B 1009 TRS', 'mobil2.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(10, 'Daihatsu Terios', 'Cocok untuk perjalanan luar kota.', 450000, 'B 1010 TRS', 'mobil3.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(11, 'Toyota Fortuner', 'SUV premium dengan tenaga besar.', 750000, 'B 1011 FTR', 'mobil4.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(12, 'Toyota Fortuner', 'Tampilan gagah dan elegan.', 750000, 'B 1012 FTR', 'mobil5.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(13, 'Honda HR-V', 'SUV compact modern.', 500000, 'B 1013 HRV', 'mobil6.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(14, 'Honda HR-V', 'Stylish dan nyaman.', 500000, 'B 1014 HRV', 'mobil7.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(15, 'Toyota Rush', 'SUV keluarga irit dan tangguh.', 420000, 'B 1015 RSH', 'mobil1.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(16, 'Toyota Rush', 'Nyaman untuk keluarga.', 420000, 'B 1016 RSH', 'mobil2.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(17, 'Daihatsu Xenia', 'Mobil keluarga ekonomis.', 340000, 'B 1017 XEN', 'mobil3.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(18, 'Daihatsu Xenia', 'Kabin luas dan irit.', 340000, 'B 1018 XEN', 'mobil4.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(19, 'Honda Mobilio', 'MPV nyaman dan modern.', 360000, 'B 1019 MOB', 'mobil5.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50'),
(20, 'Honda Mobilio', 'Cocok untuk perjalanan harian.', 360000, 'B 1020 MOB', 'mobil6.jpg', 'tersedia', '2026-01-08 06:45:50', '2026-01-08 06:45:50');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_01_08_093900_create_kendaraans_table', 1),
(6, '2026_01_08_094028_create_penyewaans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaans`
--

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

--
-- Dumping data for table `penyewaans`
--

INSERT INTO `penyewaans` (`id`, `kendaraan_id`, `nama_penyewa`, `nik`, `alamat`, `durasi_sewa`, `total_harga`, `metode_pembayaran`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(3, 1, 'nabil', '23123123123', 'SAWAH BESAR', 2, 700000, 'tunai', 'lunas', '2026-01-08 06:52:36', '2026-01-08 06:53:08'),
(4, 5, 'AGUS', '3234423423', 'semarang barat', 2, 800000, 'tunai', 'menunggu', '2026-01-08 06:53:04', '2026-01-08 06:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kendaraans_platanomor_unique` (`platanomor`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penyewaans`
--
ALTER TABLE `penyewaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyewaans_kendaraan_id_foreign` (`kendaraan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penyewaans`
--
ALTER TABLE `penyewaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyewaans`
--
ALTER TABLE `penyewaans`
  ADD CONSTRAINT `penyewaans_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
