-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 06:06 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chakrichai`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_01_082913_create_user_profiles_table', 1),
(7, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(8, '2023_07_08_160158_add_google_2fa_columns', 3);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google2fa_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `google_id`, `remember_token`, `created_at`, `updated_at`, `google2fa_secret`) VALUES
(1, 'Admin', 'admin@chakrichai.com', '2023-07-05 08:28:43', '$2y$10$EkHW29NHFsMKEbfsCE4.T.OSeNJPf/btKDjy8afbLQei33a71sCXK', 0, NULL, NULL, '2023-07-05 02:28:17', '2023-07-05 02:28:17', 'eyJpdiI6IjFvT1JBcGg3cTZxSVZCdzJGVU9Denc9PSIsInZhbHVlIjoiR0ptL0Vsb2VhbkswZU1PcTJvTFB0MFZURFhEZ3dvRnQvOU4wRTBUdTZoUT0iLCJtYWMiOiI1Y2YxNWVhNjI1NGZkODJjYWJiZDNiYjM5NGQzYWRmMGFmZDYwMjcyMzg3M2IxMjQ4OGU0NjJmMDIxNGM5N2QzIiwidGFnIjoiIn0='),
(2, 'Buyer', 'buyer@chakrichai.com', '2023-07-05 18:00:00', '$2y$10$Dr10LO24lO7ZVv8R98f2A...YLFrnbKa0ZiZC/cQ1mYqHwF0YVMVS', 1, NULL, NULL, '2023-07-05 02:28:17', '2023-07-05 02:28:17', 'eyJpdiI6IjFvT1JBcGg3cTZxSVZCdzJGVU9Denc9PSIsInZhbHVlIjoiR0ptL0Vsb2VhbkswZU1PcTJvTFB0MFZURFhEZ3dvRnQvOU4wRTBUdTZoUT0iLCJtYWMiOiI1Y2YxNWVhNjI1NGZkODJjYWJiZDNiYjM5NGQzYWRmMGFmZDYwMjcyMzg3M2IxMjQ4OGU0NjJmMDIxNGM5N2QzIiwidGFnIjoiIn0='),
(3, 'Seller', 'seller@chakrichai.com', '0000-00-00 00:00:00', '$2y$10$2t8rlrL4GFUN4fWPdj2MheK5DOPhkAd9uqpcPoaLPXnbfCvOSpklK', 2, NULL, NULL, '2023-07-05 02:28:17', '2023-07-05 02:28:17', 'eyJpdiI6IjFvT1JBcGg3cTZxSVZCdzJGVU9Denc9PSIsInZhbHVlIjoiR0ptL0Vsb2VhbkswZU1PcTJvTFB0MFZURFhEZ3dvRnQvOU4wRTBUdTZoUT0iLCJtYWMiOiI1Y2YxNWVhNjI1NGZkODJjYWJiZDNiYjM5NGQzYWRmMGFmZDYwMjcyMzg3M2IxMjQ4OGU0NjJmMDIxNGM5N2QzIiwidGFnIjoiIn0='),
(15, 'sanjida', 'sanjida@gmail.com', '0000-00-00 00:00:00', '$2y$10$LHbGC6oFd5odocmcHznGUOAC8fSHV9SJWgnIX6TPiIjppbpDR6Fry', 0, NULL, NULL, '2023-07-08 07:59:08', '2023-07-08 07:59:08', 'eyJpdiI6IjFvT1JBcGg3cTZxSVZCdzJGVU9Denc9PSIsInZhbHVlIjoiR0ptL0Vsb2VhbkswZU1PcTJvTFB0MFZURFhEZ3dvRnQvOU4wRTBUdTZoUT0iLCJtYWMiOiI1Y2YxNWVhNjI1NGZkODJjYWJiZDNiYjM5NGQzYWRmMGFmZDYwMjcyMzg3M2IxMjQ4OGU0NjJmMDIxNGM5N2QzIiwidGFnIjoiIn0='),
(20, 'Sanjida', 'sanjidatasnim02@gmail.com', '2023-07-04 18:41:40', '$2y$10$5mO4xBbHk80zS0Q34dWR7uxtfm2nzbOBvqj3XHXl1XKjlAbWD7x2K', 1, NULL, NULL, '2023-07-08 11:32:08', '2023-07-08 11:32:08', 'eyJpdiI6IjFvT1JBcGg3cTZxSVZCdzJGVU9Denc9PSIsInZhbHVlIjoiR0ptL0Vsb2VhbkswZU1PcTJvTFB0MFZURFhEZ3dvRnQvOU4wRTBUdTZoUT0iLCJtYWMiOiI1Y2YxNWVhNjI1NGZkODJjYWJiZDNiYjM5NGQzYWRmMGFmZDYwMjcyMzg3M2IxMjQ4OGU0NjJmMDIxNGM5N2QzIiwidGFnIjoiIn0=');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebooklink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `githublink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagramlink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedinlink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `position`, `education`, `contact`, `address`, `dob`, `bio`, `facebooklink`, `githublink`, `instagramlink`, `linkedinlink`, `created_at`, `updated_at`, `slug`) VALUES
(1, 1, 'adfg', 'asfdg', '0123456789', 'dsfg', 'dsvfgbn', 'No bio added for User 1', NULL, NULL, NULL, NULL, '2023-07-05 02:34:46', '2023-07-05 03:04:13', '3'),
(2, 2, NULL, NULL, NULL, NULL, NULL, 'Sample bio for User 2', NULL, NULL, NULL, NULL, '2023-07-05 02:34:46', '2023-07-05 02:34:46', '2'),
(3, 3, NULL, NULL, NULL, NULL, NULL, 'Sample bio for User 3', NULL, NULL, NULL, NULL, '2023-07-05 02:34:46', '2023-07-05 02:34:46', '1'),
(8, 15, NULL, NULL, NULL, NULL, NULL, 'No bio added for User 15', NULL, NULL, NULL, NULL, '2023-07-08 07:59:08', '2023-07-08 07:59:08', NULL),
(13, 20, 'Student', 'ASD', '12345678', '1478 dww', '2023-07-21', 'No bio added for User 20  Sanjida', 'https://mdbootstrap.com/docs/standard/data/tables/', NULL, NULL, NULL, '2023-07-08 11:32:08', '2023-07-09 02:12:17', NULL);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
