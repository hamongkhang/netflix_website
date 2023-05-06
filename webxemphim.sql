create database if not exists webxemphim;
use webxemphim;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 01:04 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webxemphim`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabinets`
--

CREATE TABLE `cabinets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE `cates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `cate_name`, `created_at`, `updated_at`) VALUES
(1, 'Hành Động', NULL, '2020-03-12 19:11:55'),
(2, 'Viễn Tưởng', '2020-03-09 20:59:15', '2020-03-09 20:59:15'),
(4, 'Hài Hước', '2020-03-10 18:23:43', '2020-03-10 18:23:43'),
(5, 'Võ Thuật', '2020-03-10 19:54:49', '2020-03-10 19:54:49'),
(6, 'Kinh Dị', '2020-03-10 19:54:55', '2020-03-10 19:54:55'),
(7, 'Phiêu Lưu', '2020-03-10 19:55:05', '2020-03-10 19:55:05'),
(8, 'Tình Cảm', '2020-03-10 19:55:11', '2020-03-10 19:55:11'),
(9, 'Cổ Trang', '2020-03-10 19:55:17', '2020-03-10 19:55:17'),
(10, 'Thần Thoại', '2020-03-10 19:55:23', '2020-03-10 19:55:23'),
(11, 'Tâm Lý', '2020-03-10 19:55:33', '2020-03-10 19:55:33'),
(12, 'Tài Liệu', '2020-03-10 19:55:38', '2020-03-10 19:55:38'),
(13, 'Hoạt Hình', '2020-03-10 19:55:43', '2020-03-10 19:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `created_at`, `updated_at`) VALUES
(1, 'Vietsub', NULL, NULL),
(2, 'Thuyết minh', NULL, NULL),
(3, 'Lồng tiếng', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `link1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link4` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link5` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link6` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `movie_id`, `link1`, `link2`, `link3`, `link4`, `link5`, `link6`, `created_at`, `updated_at`) VALUES
(55, 56, '<iframe width=\"1180\" height=\"664\" src=\"https://www.youtube.com/embed/ileyFOAbvkU\" title=\"The Flash - Official Trailer 2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<iframe width=\"1180\" height=\"664\" src=\"https://www.youtube.com/embed/ileyFOAbvkU\" title=\"The Flash - Official Trailer 2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<iframe width=\"1180\" height=\"664\" src=\"https://www.youtube.com/embed/ileyFOAbvkU\" title=\"The Flash - Official Trailer 2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<iframe width=\"1180\" height=\"664\" src=\"https://www.youtube.com/embed/ileyFOAbvkU\" title=\"The Flash - Official Trailer 2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<iframe width=\"1180\" height=\"664\" src=\"https://www.youtube.com/embed/ileyFOAbvkU\" title=\"The Flash - Official Trailer 2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<iframe width=\"1180\" height=\"664\" src=\"https://www.youtube.com/embed/ileyFOAbvkU\" title=\"The Flash - Official Trailer 2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-04-26 08:59:38', '2023-04-29 10:15:18');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_03_07_100824_create_cates_table', 1),
(4, '2020_03_07_101750_create_nations_table', 1),
(6, '2020_03_07_101947_create_languages_table', 1),
(7, '2020_03_07_102555_create_movies_table', 1),
(8, '2020_03_08_025957_create_images_table', 2),
(10, '2020_03_08_030919_create_cabinets_table', 4),
(12, '2020_03_10_021017_create_comments_table', 6),
(13, '2020_03_07_101847_create_years_table', 7),
(16, '2020_03_08_030708_create_links_table', 8),
(18, '2020_03_08_031205_create_recovers_table', 9),
(20, '2014_10_12_100000_create_password_resets_table', 10),
(23, '2020_04_27_041509_create_wallets_table', 11),
(25, '2020_04_27_145809_create_payments_table', 11),
(27, '2020_04_27_151527_create_wallet_charges_table', 12),
(28, '2020_11_19_095149_create_rates_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `series_id` int,
  `task_number` int,
  `vie_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eng_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `nation_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `year_id` bigint(20) UNSIGNED NOT NULL,
  `poster_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(11,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table `series`(
	`id` int primary key auto_increment,
	`series_name` text,
	`poster` text,
	`description` text,
    `information` text,
	`number_of_movie` text,
	`director` varchar(255) COLLATE utf8mb4_unicode_ci,
    `actor` varchar(255) COLLATE utf8mb4_unicode_ci,
    `year` varchar(255),
    `created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	`price` decimal(11,3)
);
--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `vie_name`, `eng_name`, `cate_id`, `nation_id`, `language_id`, `year_id`, `poster_image`, `information`, `trailer`, `director`, `actor`, `quality`, `point`, `time`, `created_at`, `updated_at`, `price`) VALUES
(56, 'Trường Nguyệt Tẫn Minh', 'Truong Nguyet Tan Minh', 10, 7, 2, 14, '1682788518-1.jpg', '<p>ssss</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<iframe width=\"1180\" height=\"664\" src=\"https://www.youtube.com/embed/ileyFOAbvkU\" title=\"The Flash - Official Trailer 2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'phan năm', 'phan năm', 'full hd', '10', '20 Phút', '2023-04-26 08:59:38', '2023-04-29 10:15:18', 2333.000);

-- --------------------------------------------------------

--
-- Table structure for table `nations`
--

CREATE TABLE `nations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nation_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nations`
--

INSERT INTO `nations` (`id`, `nation_name`, `created_at`, `updated_at`) VALUES
(1, 'Mỹ', '2020-03-12 19:40:11', '2020-03-12 20:19:42'),
(2, 'Anh', '2020-03-12 19:41:44', '2020-03-12 19:41:44'),
(3, 'Pháp', '2020-03-12 20:02:54', '2020-03-12 20:02:54'),
(4, 'Nga', '2020-03-12 20:03:08', '2020-03-12 20:03:08'),
(5, 'Việt Nam', '2020-03-12 20:03:24', '2020-03-12 20:03:24'),
(6, 'Thái Lan', '2020-03-12 20:03:34', '2020-03-12 20:03:34'),
(7, 'Trung Quốc', '2020-03-12 20:03:42', '2020-03-12 20:03:42'),
(8, 'Ấn Độ', '2020-03-12 20:03:49', '2020-03-12 20:03:49'),
(9, 'Nhật Bản', '2020-03-12 20:04:07', '2020-03-12 20:04:07'),
(10, 'Hàn Quốc', '2020-03-12 20:04:15', '2020-03-12 20:04:15'),
(11, 'Đài Loan', '2020-03-12 20:04:23', '2020-03-12 20:04:23'),
(12, 'Quốc gia khác', '2020-03-12 20:04:37', '2020-03-12 20:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`, `updated_at`) VALUES
('vcb000111@cdythadong.edu.vn', 'VIX48JTBnKpg4Fl5eNmncSeSb9fZtdAzX6jCNRTEqScK43LtewLM39H3Qqbo', '2020-04-06 06:47:24', '2020-04-06 06:47:24'),
('vcb000111@cdythadong.edu.vn', 'CQ9Ec0hpfSNTFeIPdaMd6niEt0ePN9DjokjAldeiQ1mBrtzeb3RRDTlAdrM9', '2020-04-06 06:56:21', '2020-04-06 06:56:21'),
('vcb000111@cdythadong.edu.vn', '2L1q0CgSPQhcnmImSJjj7ThksD8UIV6lezJToaNsg0496CbepnIEE2g3CvEO', '2020-04-19 20:27:02', '2020-04-19 20:27:02'),
('phanvannam0303@gmail', 'd7eq9x5ctA4h3WYukph7KglVlN9ZBL9iDKAUqvf2tUeUqcpAsDfaHFr2vjuB', '2023-04-26 03:36:51', '2023-04-26 03:36:51'),
('vcb000111@cdythadong.edu.vn', 'VIX48JTBnKpg4Fl5eNmncSeSb9fZtdAzX6jCNRTEqScK43LtewLM39H3Qqbo', '2020-04-06 06:47:24', '2020-04-06 06:47:24'),
('vcb000111@cdythadong.edu.vn', 'CQ9Ec0hpfSNTFeIPdaMd6niEt0ePN9DjokjAldeiQ1mBrtzeb3RRDTlAdrM9', '2020-04-06 06:56:21', '2020-04-06 06:56:21'),
('vcb000111@cdythadong.edu.vn', '2L1q0CgSPQhcnmImSJjj7ThksD8UIV6lezJToaNsg0496CbepnIEE2g3CvEO', '2020-04-19 20:27:02', '2020-04-19 20:27:02'),
('phanvannam0303@gmail', 'd7eq9x5ctA4h3WYukph7KglVlN9ZBL9iDKAUqvf2tUeUqcpAsDfaHFr2vjuB', '2023-04-26 03:36:51', '2023-04-26 03:36:51'),
('reversal247@gmail.com', 'AW8keUqoEVtyiaMhC03i5YvHvYunEUDfGIjHWoM36E5axfkBoMyptS0cyFgb', '2023-04-29 11:31:25', '2023-04-29 11:31:25'),
('reversal247@gmail.com', 'DUcGI2pHnUx0A33UnDHTqGGn31VpWXz6pRGkAfaEFC21tbM5F6gW9loIUjE1', '2023-04-29 11:31:45', '2023-04-29 11:31:45'),
('reversal247@gmail.com', 'fdyHi32foqMvzcbQDIK1PaMAgbjHZDMITnMWbytl8LqPhjzf13pkaU7BvhQV', '2023-04-29 11:32:08', '2023-04-29 11:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(5, 18, 56, '2023-04-29 09:04:59', '2023-04-29 09:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `rate`, `movie_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 8, 31, 11, '2020-12-15 20:25:47', '2020-12-15 20:25:47'),
(2, 7, 54, 17, '2023-04-26 02:55:48', '2023-04-26 02:55:48'),
(3, 10, 56, 18, '2023-04-26 09:04:18', '2023-04-26 09:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `recovers`
--

CREATE TABLE `recovers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recover_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `level`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'admin@admin.com', '$2y$10$nJUPgh11n4fKg0s18huK6eZykpVnG3XPedtoW0HCBEkRxHdzWbMIq', 'admin@admin.com', 'quyen', 1, NULL, 'zxeZnsy4QC8TMEZ7G0oeemC47eLULAF2xFankAKWzgkrNPx5QC3KBAAiCumX', '2023-04-26 02:06:41', '2023-04-26 03:29:06'),
(18, 'truong', '$2y$10$P0w2GIpwf9W4FE428KP0oOKKxeVidPA2wP2s0BlIHCmUkEih4k7.C', 'reversal247@gmail.com', 'truong', 0, NULL, '76Yv2Cpn0TT6sNv9aX0Ko9lIVq7HcUVMBK9LJrjeISghFvgaQcIEWb3is0kA', '2023-04-26 03:31:48', '2023-04-29 11:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `money` decimal(11,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `money`, `created_at`, `updated_at`) VALUES
(9, 17, 50000000.000, '2023-04-26 02:06:41', '2023-04-26 02:06:41'),
(10, 18, 500000.000, '2023-04-26 03:31:48', '2023-04-29 09:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_charges`
--

CREATE TABLE `wallet_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` bigint(20) UNSIGNED NOT NULL,
  `orderId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` decimal(11,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `created_at`, `updated_at`) VALUES
(1, '2020', '2020-03-12 20:51:15', '2020-03-12 20:51:15'),
(2, '2019', '2020-03-12 20:52:21', '2020-03-12 21:14:47'),
(4, '2018', '2020-03-20 18:54:29', '2020-03-20 18:54:29'),
(5, '2017', '2020-04-19 20:16:40', '2020-04-19 20:16:40'),
(6, '2016', '2020-05-19 20:48:43', '2020-05-19 20:48:43'),
(7, '2015', '2020-05-19 20:48:51', '2020-05-19 20:48:51'),
(8, '2014', '2020-05-19 20:49:01', '2020-05-19 20:49:01'),
(9, '2013', '2020-05-19 20:49:10', '2020-05-19 20:49:10'),
(10, 'Trước 2013', '2020-05-19 20:49:22', '2020-05-19 20:49:22'),
(12, '2021', '2023-04-26 08:56:34', '2023-04-26 08:56:34'),
(13, '2022', '2023-04-26 08:56:39', '2023-04-26 08:56:39'),
(14, '2023', '2023-04-26 08:56:44', '2023-04-26 08:56:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabinets`
--
ALTER TABLE `cabinets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cabinets_movie_id_foreign` (`movie_id`),
  ADD KEY `cabinets_user_id_foreign` (`user_id`);

--
-- Indexes for table `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_cate_name_unique` (`cate_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `links_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_cate_id_foreign` (`cate_id`),
  ADD KEY `movies_nation_id_foreign` (`nation_id`),
  ADD KEY `movies_language_id_foreign` (`language_id`),
  ADD KEY `movies_year_id_foreign` (`year_id`);

--
-- Indexes for table `nations`
--
ALTER TABLE `nations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nations_nation_name_unique` (`nation_name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recovers`
--
ALTER TABLE `recovers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- Indexes for table `wallet_charges`
--
ALTER TABLE `wallet_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_charges_user_id_foreign` (`user_id`),
  ADD KEY `wallet_charges_wallet_id_foreign` (`wallet_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `years_year_unique` (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabinets`
--
ALTER TABLE `cabinets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `nations`
--
ALTER TABLE `nations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recovers`
--
ALTER TABLE `recovers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wallet_charges`
--
ALTER TABLE `wallet_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabinets`
--
ALTER TABLE `cabinets`
  ADD CONSTRAINT `cabinets_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cabinets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_nation_id_foreign` FOREIGN KEY (`nation_id`) REFERENCES `nations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallet_charges`
--
ALTER TABLE `wallet_charges`
  ADD CONSTRAINT `wallet_charges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wallet_charges_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;