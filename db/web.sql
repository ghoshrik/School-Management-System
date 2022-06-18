-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 12:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg_id` int(11) NOT NULL,
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` int(11) NOT NULL,
  `pass_mark` double NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `status`, `created_at`, `updated_at`) VALUES
(29, 7, 1, 100, 35, '1', '2022-06-15 12:56:05', '2022-06-15 12:56:05'),
(30, 7, 2, 100, 35, '1', '2022-06-15 12:56:05', '2022-06-15 12:56:05'),
(31, 7, 3, 100, 35, '1', '2022-06-15 12:56:05', '2022-06-15 12:56:05'),
(32, 7, 5, 100, 35, '1', '2022-06-15 12:56:05', '2022-06-15 12:56:05'),
(33, 7, 6, 100, 35, '1', '2022-06-15 12:56:05', '2022-06-15 12:56:05'),
(34, 7, 4, 100, 35, '1', '2022-06-15 12:56:05', '2022-06-15 12:56:05'),
(35, 7, 7, 100, 35, '1', '2022-06-15 12:56:05', '2022-06-15 12:56:05'),
(36, 8, 1, 100, 35, '1', '2022-06-15 12:56:15', '2022-06-15 12:56:15'),
(37, 8, 2, 100, 35, '1', '2022-06-15 12:56:15', '2022-06-15 12:56:15'),
(38, 8, 3, 100, 35, '1', '2022-06-15 12:56:15', '2022-06-15 12:56:15'),
(39, 8, 5, 100, 35, '1', '2022-06-15 12:56:15', '2022-06-15 12:56:15'),
(40, 8, 6, 100, 35, '1', '2022-06-15 12:56:15', '2022-06-15 12:56:15'),
(41, 8, 7, 100, 35, '1', '2022-06-15 12:56:15', '2022-06-15 12:56:15'),
(42, 8, 4, 100, 35, '1', '2022-06-15 12:56:15', '2022-06-15 12:56:15'),
(43, 5, 1, 100, 35, '1', '2022-06-15 13:00:33', '2022-06-15 13:00:33'),
(44, 5, 2, 100, 35, '1', '2022-06-15 13:00:33', '2022-06-15 13:00:33'),
(45, 5, 3, 100, 35, '1', '2022-06-15 13:00:33', '2022-06-15 13:00:33'),
(46, 5, 7, 100, 35, '1', '2022-06-15 13:00:33', '2022-06-15 13:00:33'),
(47, 5, 4, 100, 35, '1', '2022-06-15 13:00:33', '2022-06-15 13:00:33'),
(48, 6, 1, 100, 35, '1', '2022-06-15 13:01:20', '2022-06-15 13:01:20'),
(49, 6, 2, 100, 35, '1', '2022-06-15 13:01:20', '2022-06-15 13:01:20'),
(50, 6, 3, 100, 35, '1', '2022-06-15 13:01:20', '2022-06-15 13:01:20'),
(51, 6, 4, 100, 35, '1', '2022-06-15 13:01:20', '2022-06-15 13:01:20'),
(52, 6, 7, 100, 35, '1', '2022-06-15 13:01:20', '2022-06-15 13:01:20'),
(53, 9, 1, 100, 35, '1', '2022-06-15 13:07:19', '2022-06-15 13:07:19'),
(54, 9, 2, 100, 35, '1', '2022-06-15 13:07:19', '2022-06-15 13:07:19'),
(55, 9, 3, 100, 35, '1', '2022-06-15 13:07:19', '2022-06-15 13:07:19'),
(56, 9, 5, 100, 35, '1', '2022-06-15 13:07:19', '2022-06-15 13:07:19'),
(57, 9, 6, 100, 35, '1', '2022-06-15 13:07:19', '2022-06-15 13:07:19'),
(58, 9, 4, 100, 35, '1', '2022-06-15 13:07:19', '2022-06-15 13:07:19'),
(59, 9, 7, 100, 35, '1', '2022-06-15 13:07:19', '2022-06-15 13:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `class_masters`
--

CREATE TABLE `class_masters` (
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_masters`
--

INSERT INTO `class_masters` (`class_id`, `class_name`, `class_symbol`, `status`, `created_at`, `updated_at`) VALUES
(1, 'One', 'I', '1', '2022-06-13 12:16:09', '2022-06-13 12:16:09'),
(2, 'Two', 'II', '1', '2022-06-13 12:16:24', '2022-06-13 12:16:24'),
(3, 'Three', 'III', '1', '2022-06-13 12:36:11', '2022-06-13 12:36:11'),
(4, 'Four', 'IV', '1', '2022-06-15 12:49:52', '2022-06-15 12:49:52'),
(5, 'Five', 'V', '1', '2022-06-15 12:50:03', '2022-06-15 12:50:03'),
(6, 'Six', 'VI', '1', '2022-06-15 12:50:19', '2022-06-15 12:50:19'),
(7, 'Seven', 'VII', '1', '2022-06-15 12:50:32', '2022-06-15 12:50:32'),
(8, 'Eight', 'VIII', '1', '2022-06-15 12:50:47', '2022-06-15 12:50:47'),
(9, 'Nine', 'IX', '1', '2022-06-15 12:51:00', '2022-06-15 12:51:00'),
(10, 'Ten', 'X', '1', '2022-06-15 12:51:12', '2022-06-15 12:51:12');

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
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_ammounts`
--

CREATE TABLE `fee_ammounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_cat_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `ammount` double NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_06_13_153228_create_classes_table', 3),
(11, '2022_06_13_154914_create_class_masters_table', 4),
(12, '2022_06_13_184624_create_years_table', 5),
(13, '2022_06_13_233639_create_fees_table', 6),
(14, '2022_06_14_105114_create_fee_ammounts_table', 7),
(15, '2022_06_15_111037_create_subjects_table', 8),
(16, '2022_06_15_133033_create_assign_subjects_table', 9),
(17, '2022_06_15_214514_create_student_registrations_table', 10),
(18, '2022_06_15_220355_create_assign_students_table', 11),
(19, '2022_06_15_221519_create_minority_discounts_table', 11),
(21, '2014_10_12_000000_create_users_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `minority_discounts`
--

CREATE TABLE `minority_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_cat_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_registrations`
--

CREATE TABLE `student_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doR` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bengali', '2022-06-15 06:00:33', '2022-06-15 06:00:33'),
(2, 'English', '2022-06-15 06:00:48', '2022-06-15 06:03:45'),
(3, 'Mathematics', '2022-06-15 12:47:22', '2022-06-15 12:47:22'),
(4, 'History', '2022-06-15 12:47:36', '2022-06-15 12:47:36'),
(5, 'Physical Science', '2022-06-15 12:48:16', '2022-06-15 12:48:16'),
(6, 'Life Science', '2022-06-15 12:48:34', '2022-06-15 12:48:34'),
(7, 'Geography', '2022-06-15 12:48:53', '2022-06-15 12:48:53'),
(8, 'Environmental', '2022-06-15 12:58:14', '2022-06-15 12:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `year_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`year_id`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021', '1', '2022-06-13 13:35:38', '2022-06-16 05:47:45'),
(2, '2022', '1', '2022-06-16 05:46:51', '2022-06-16 05:47:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_masters`
--
ALTER TABLE `class_masters`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_masters_class_name_unique` (`class_name`),
  ADD UNIQUE KEY `class_masters_class_symbol_unique` (`class_symbol`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fees_name_unique` (`name`);

--
-- Indexes for table `fee_ammounts`
--
ALTER TABLE `fee_ammounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minority_discounts`
--
ALTER TABLE `minority_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `student_registrations`
--
ALTER TABLE `student_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_registrations_student_id_unique` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`year_id`),
  ADD UNIQUE KEY `years_year_unique` (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `class_masters`
--
ALTER TABLE `class_masters`
  MODIFY `class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_ammounts`
--
ALTER TABLE `fee_ammounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `minority_discounts`
--
ALTER TABLE `minority_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_registrations`
--
ALTER TABLE `student_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `year_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
