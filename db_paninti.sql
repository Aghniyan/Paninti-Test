-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 12:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_paninti`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `shop_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 'Sayuran', '2020-11-04 09:29:53', '2020-11-04 09:29:53'),
(3, 3, 'Makanan', '2020-11-04 11:20:45', '2020-11-04 11:20:45'),
(4, 3, 'Pakaian', '2020-11-04 11:20:52', '2020-11-04 11:20:52'),
(5, 5, 'Pangan', '2020-11-04 11:21:03', '2020-11-04 11:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2020_11_04_011212_create_shops_table', 2),
(17, '2020_11_04_011639_create_categories_table', 2),
(18, '2020_11_04_011921_create_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `shop_id`, `category_id`, `name`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 'Bonsay', 10000, 0, '2020-11-04 10:44:43', '2020-11-04 10:44:43'),
(3, 5, 1, 'Bonsay', 10000, 0, '2020-11-04 10:45:07', '2020-11-04 10:45:07'),
(4, 3, 1, 'Bonsay', 10000, 0, '2020-11-04 10:53:43', '2020-11-04 10:53:43'),
(5, 5, 1, 'Bonsay', 10000, 50, '2020-11-04 10:53:49', '2020-11-04 13:28:15'),
(6, 5, 1, 'Bonsay', 10000, 0, '2020-11-04 11:05:13', '2020-11-04 11:05:13'),
(7, 5, 1, 'Bonsay', 10000, 0, '2020-11-04 11:05:50', '2020-11-04 11:05:50'),
(8, 3, 1, 'Bonsay', 10000, 0, '2020-11-04 11:27:10', '2020-11-04 11:27:10'),
(9, 3, 1, 'Bonsay', 10000, 0, '2020-11-04 11:38:08', '2020-11-04 11:38:08'),
(10, 3, 1, 'Bonsay', 10000, 0, '2020-11-04 11:40:41', '2020-11-04 11:40:41'),
(11, 5, 5, 'Bonsay', 10000, 0, '2020-11-04 11:56:50', '2020-11-04 11:56:50'),
(12, 5, 5, 'Bonsay', 10000, 0, '2020-11-04 12:03:49', '2020-11-04 12:03:49'),
(13, 3, 3, 'Bonsay', 10000, 0, '2020-11-04 12:04:11', '2020-11-04 12:04:11'),
(14, 3, 3, 'Bonsay Upddate', 10000, 0, '2020-11-04 12:11:14', '2020-11-04 12:11:14'),
(15, 5, 5, 'Bonsay', 10000, 0, '2020-11-04 15:32:56', '2020-11-04 15:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `user_id`, `name`, `contact`, `address`, `info`, `created_at`, `updated_at`) VALUES
(3, 3, 'Toko Abadi Jaya Update', '089012100089', 'Jalan Dipatiukur', 'Menjual Berbagai Macam Barang Pecah Belah', '2020-11-04 06:20:00', '2020-11-04 08:17:30'),
(4, 3, 'Toko Abadi Jaya Update admin 3', '089012100089', 'Jalan Dipatiukur', 'Menjual Berbagai Macam Barang Pecah Belah', '2020-11-04 06:20:46', '2020-11-04 14:04:45'),
(5, 6, 'Toko Abadi Jaya Update admin 3', '02181910190', 'Jalan Dipatiukur', 'Menjual Berbagai Macam Barang Pecah Belah', '2020-11-04 08:25:58', '2020-11-04 14:30:51'),
(6, NULL, 'Toko Baru', NULL, 'Jln Baru', 'Menjual Berbagai Macam Sayuran', '2020-11-04 15:11:23', '2020-11-04 15:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aghniya Ni\'amillah Nurhilman', 'aghniyan@gmail.com', NULL, '$2y$10$rJV7uTQfdBP9GVPHfZqRc.zmSY0tbcmjNESwCqpdzT4CeP58ysbAm', 'ncDpzbiNldkB4ABNNyEZdf0wFP5RRVaenk1k9JMq0Fus955Ckrmimi84BujFXWszgkwyvu0L6uXBDGsF', 'Super Admin', NULL, '2020-11-03 23:58:27', '2020-11-03 23:58:27'),
(2, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$vSC1WxVnl3otuf3RqcBroewTcgx2owfilpny6S./7OXIyNdCnsEru', '7v3hH1n6jEV2zpOQXQ53ZlBhYuFa9FrerOA9ybMnpm0xWWZy4TMQUlZ5ccARao54V5lWXnvvc9Gu9Bie', 'Admin', NULL, '2020-11-04 03:32:19', '2020-11-04 03:32:19'),
(3, 'Administrator 2', 'admin2@gmail.com', NULL, '$2y$10$JUVKPToIGqyIPNUg0Z4ySuThidiiP6Lg3xx8zES6fX15PSoIcJgJu', 'VE4k4XOE1iVbYbAB3oWZMTEHF4MnhDNZuEoWX6mQmbpc874IKgO9Mn4vDDPEe65TccYn30Ge2O9BeNt3', 'Admin', NULL, '2020-11-04 03:42:21', '2020-11-04 03:42:21'),
(4, 'Administrator 3', 'admin3@gmail.com', NULL, '$2y$10$HC555LM7qqv2CfhHFzA05eTcANWqw/rzswq9eHc20LrmGQTzDm3J6', 'RswTE70dQ6Wsx7Fb469GP8pE4aF24Tg1YLle8j5Zt42ZKg5nuuuzDicRQFmDeJeHlswOgeTRThArDQGd', 'Admin', NULL, '2020-11-04 03:42:31', '2020-11-04 03:42:31'),
(5, 'Aghniya Ni\'amillah Nurhilman', 'super@gmail.com', NULL, '$2y$10$MjSj2WWdsDNBsb7mPcnXf.BhZ8tWfHbWZnk7AmWKYXK4GKVLbTRru', 'Q591ZYVHMhHEvvGcHnAYAlOXon3wVzfanWOGCDz1f0Wn4JDZcBGrZLREhwsv4Tn5tn6g4iMebX97JFR7', 'Super Admin', NULL, '2020-11-04 05:24:43', '2020-11-04 05:24:43'),
(6, 'Niya', 'niya@gmail.com', NULL, '$2y$10$Lis5.WtBx9/uvi2aw.KdEuv8LI0sJg6r170wVnZyEuPSCaET/RxGm', NULL, 'Admin', NULL, '2020-11-04 07:09:02', '2020-11-04 07:09:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_shop_id_foreign` (`shop_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
