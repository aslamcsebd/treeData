-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2022 at 04:38 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tree`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Table structure for table `refresh_status`
--

CREATE TABLE `refresh_status` (
  `id` bigint(20) NOT NULL,
  `time` bigint(20) NOT NULL DEFAULT '5' COMMENT 'Second',
  `status` tinyint(4) NOT NULL COMMENT '0=hide, 1=show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refresh_status`
--

INSERT INTO `refresh_status` (`id`, `time`, `status`) VALUES
(1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tree_datas`
--

CREATE TABLE `tree_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `data_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=hide, 1=show',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_datas`
--

INSERT INTO `tree_datas` (`id`, `user_id`, `parent_id`, `data_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Bangladesh', 1, '2022-03-02 06:46:13', NULL, NULL),
(2, 1, NULL, 'India', 1, '2022-03-02 06:46:20', NULL, NULL),
(3, 1, 1, 'Chittagong', 1, NULL, NULL, NULL),
(4, 1, 1, 'Dhaka', 1, NULL, NULL, NULL),
(5, 1, 1, 'Sylhet', 1, NULL, NULL, NULL),
(9, 1, 3, 'Halishar', 1, NULL, NULL, NULL),
(10, 1, 3, 'New market', 1, NULL, NULL, NULL),
(11, 1, 3, 'Agrabad', 1, NULL, NULL, NULL),
(12, 1, 11, 'Mogoltoli', 1, NULL, NULL, NULL),
(13, 1, 11, 'Mather bari', 1, NULL, NULL, NULL),
(14, 1, 11, 'Commerce college road', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tree_titles`
--

CREATE TABLE `tree_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=hide, 1=show',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_titles`
--

INSERT INTO `tree_titles` (`id`, `user_id`, `title_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'country', 1, '2022-03-02 06:42:07', '2022-04-06 06:16:09', NULL),
(2, 1, 'district', 1, '2022-03-02 06:42:07', '2022-04-06 06:16:03', NULL),
(3, 1, 'city', 1, '2022-03-02 06:42:07', '2022-04-06 10:24:48', NULL),
(26, 1, 'area', 1, '2022-04-11 04:36:55', NULL, NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aslam', 'aslamcsebd@gmail.com', NULL, '$2y$10$gk.oPmp3GDgDxCvISaaW6uigAQHkt41m43n2FqE.eOWee4RoVhwnC', NULL, '2022-03-02 06:22:41', '2022-03-02 06:22:41'),
(2, 'aslam2', 'aslam2@gmail.com', NULL, '$2y$10$OPqYTd4fcnQIqVDp/VF7luq20sNjHF8tFZ3fvHFPu/2JBZnV.BXNK', NULL, '2022-04-10 05:56:19', '2022-04-10 05:56:19');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `refresh_status`
--
ALTER TABLE `refresh_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_datas`
--
ALTER TABLE `tree_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_titles`
--
ALTER TABLE `tree_titles`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refresh_status`
--
ALTER TABLE `refresh_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tree_datas`
--
ALTER TABLE `tree_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tree_titles`
--
ALTER TABLE `tree_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
