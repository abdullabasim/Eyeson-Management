-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2018 at 02:26 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eyeson`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `address`, `mobile`, `email`, `created_at`, `updated_at`) VALUES
(1, 'عبدالله باسم', 'asia, 1681sss', '15758042636', NULL, '2018-05-25 18:28:00', '2018-05-25 19:28:38'),
(3, 'احمد سامي محمد', 'بغداد \\ العراق', '15758042636', 'abdullabasim91@gmail.com', '2018-06-02 23:23:08', '2018-06-02 23:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'صالون', '2018-05-25 22:34:01', '2018-05-25 22:34:01'),
(2, 'عيادة', '2018-05-25 22:34:01', '2018-05-25 22:34:01'),
(3, 'دكتور', '2018-05-25 22:34:01', '2018-05-25 22:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `paid` decimal(10,3) NOT NULL,
  `reminding` decimal(10,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `total`, `paid`, `reminding`, `created_at`, `updated_at`) VALUES
(2, 1, '15000.000', '10000.000', '5000.000', '2018-06-02 17:25:21', '2018-06-02 17:25:21'),
(3, 1, '10000.000', '10000.000', '0.000', '2018-06-02 17:39:24', '2018-06-02 17:39:24'),
(4, 1, '10000.000', '5000.000', '5000.000', '2018-06-02 21:20:40', '2018-06-02 21:20:40'),
(5, 1, '10000.000', '5000.000', '5000.000', '2018-06-02 21:23:57', '2018-06-02 21:23:57'),
(11, 1, '10000.000', '5000.000', '5000.000', '2018-06-02 22:25:44', '2018-06-02 22:25:44'),
(12, 1, '5000.000', '5000.000', '0.000', '2018-06-02 22:28:38', '2018-06-02 22:28:38'),
(13, 1, '10000.000', '10000.000', '0.000', '2018-06-02 22:29:15', '2018-06-02 22:29:15'),
(14, 2, '5000.000', '5000.000', '0.000', '2018-06-02 23:23:28', '2018-06-02 23:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_05_25_143545_create_service', 1),
(9, '2018_05_25_143926_create_department', 2),
(10, '2018_05_25_144037_create_client', 2),
(11, '2018_05_25_144242_create_session', 2),
(12, '2018_05_25_144530_create_invoice', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(7,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `department_id`, `title`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'كلا', '12.430', '2018-05-25 20:00:54', '2018-05-28 18:05:23'),
(3, 2, 'لا يوجد', '12.430', '2018-06-02 22:15:46', '2018-06-02 22:15:46'),
(4, 3, 'aaa', '0.000', '2018-06-02 22:47:31', '2018-06-02 22:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `department_id`, `service_id`, `client_id`, `price`, `note`, `invoice_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, '10000.000', 'none', 2, '2018-06-02 17:25:21', '2018-06-02 17:25:21'),
(3, 1, 1, 1, '5000.000', 'none', 2, '2018-06-02 17:25:21', '2018-06-02 17:25:21'),
(5, 1, 1, 1, '5000.000', 'none', 3, '2018-06-02 17:39:24', '2018-06-02 17:39:24'),
(6, 1, 1, 1, '5000.000', 'none', 3, '2018-06-02 17:39:24', '2018-06-02 17:39:24'),
(7, 1, 1, 1, '10000.000', 'none', 4, '2018-06-02 21:20:40', '2018-06-02 21:20:40'),
(8, 1, 1, 1, '10000.000', 'none', 5, '2018-06-02 21:23:57', '2018-06-02 21:23:57'),
(9, 2, 3, 1, '5000.000', 'none', 9, '2018-06-02 22:21:24', '2018-06-02 22:21:24'),
(10, 2, 3, 1, '5000.000', 'none', 10, '2018-06-02 22:22:45', '2018-06-02 22:22:45'),
(11, 2, 3, 1, '10000.000', 'none', 11, '2018-06-02 22:25:44', '2018-06-02 22:25:44'),
(12, 2, 3, 1, '5000.000', 'none', 12, '2018-06-02 22:28:38', '2018-06-02 22:28:38'),
(13, 2, 3, 1, '10000.000', 'none', 13, '2018-06-02 22:29:15', '2018-06-02 22:29:15'),
(14, 2, 3, 3, '5000.000', 'none', 14, '2018-06-02 23:23:28', '2018-06-02 23:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'عبدالله باسم', 'abdullabasim91@gmail.com', '$2y$10$uzqFiJVIgN.kRcyUVQ.vKOiFQnG9b9Fm1N6dsrT5BBYXT2FBSTLPu', 1, 'NgpxhdOoroBYFbYrZlgPo8NmW3A76uv8bwfooZUO4RyxncSN1jYyqhyTms5I', '2018-06-02 21:52:06', '2018-06-02 21:52:06'),
(2, 'تمارا زياد', 'abdullabasim911@gmail.com', '$2y$10$TQlajj91cBZxd67fXpRVVupOfg4ZwFg7ZzKkCGNT5GbxWD9OsGm1C', 2, '66oIpgsVseLYduNr9eCDqFoQ9USnORPeDSnzfC6MXfcQ5aI5VYRr3qzb8mEc', '2018-06-02 23:17:49', '2018-06-02 23:17:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
