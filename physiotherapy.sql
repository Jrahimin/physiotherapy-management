-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 08:44 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `physiotherapy`
--

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Blood pressure', 0, NULL, NULL),
(2, 'Malnutrition', 0, NULL, NULL),
(3, 'Under Weight', 2, NULL, NULL),
(4, 'Main', 0, '2017-11-19 12:26:28', '2017-11-19 12:26:28'),
(5, 'Sub', 4, '2017-11-19 12:26:43', '2017-11-19 12:26:43'),
(6, 'Main 2', 0, '2017-11-19 12:27:07', '2017-11-19 12:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'ddddddddddddddd', 'vvvvvvv', '2017-11-10 00:11:21', '2017-11-10 00:11:21'),
(2, 'jsks', 'asal', '2017-11-10 00:12:50', '2017-11-10 00:12:50'),
(3, 'ahaj', 'akaa', '2017-11-10 00:13:22', '2017-11-10 00:13:22'),
(4, 'জামাল', 'ডাক্তার', '2017-11-13 01:15:00', '2017-11-13 01:15:00'),
(5, 'কালাম', 'ডাক্তার', '2017-11-13 01:21:12', '2017-11-13 01:21:12'),
(6, 'নাজিম', 'প্রফেসর', '2017-11-13 01:21:45', '2017-11-13 01:21:45'),
(7, 'আমির', 'ডাক্তার', '2017-11-13 01:22:12', '2017-11-13 01:22:12');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_08_055200_create_types_table', 1),
(4, '2017_11_08_055803_create_patients_table', 1),
(5, '2017_11_08_060456_create_therapies_table', 1),
(6, '2017_11_08_060927_create_pivot_table', 1),
(7, '2017_11_10_054316_create_doctors_table', 2),
(8, '2017_11_19_154233_create_diseases_table', 3),
(9, '2017_11_19_184350_create_prescriptions_table', 4),
(10, '2017_12_30_200505_add_fee_to_patients', 5),
(11, '2018_01_22_152616_remove_fields_from_prescription', 6),
(12, '2018_01_22_152949_prescription_therapy', 6);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `image_path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `consultancy_fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `age`, `phone`, `doctor_id`, `date`, `image_path`, `created_at`, `updated_at`, `consultancy_fee`) VALUES
(1, 'ami', '22', '12345678901', 1, '2017-11-08', '1510150878DSC00131-9.JPG', '2017-11-08 08:21:18', '2017-11-08 08:21:18', 0),
(2, 'rahimin', '34', '12345678901', 1, '2017-11-08', '151020583421850303_1857731247585240_66952304_n.jpg', '2017-11-08 23:37:14', '2017-11-08 23:37:14', 0),
(3, 'sjsksk', '23', 'aka', 2, '2017-11-08', '151029484121850303_1857731247585240_66952304_n.jpg', '2017-11-10 00:20:41', '2017-11-10 00:20:41', 0),
(4, 'আজগর', '২২', '০১৯৮৭৬৭৬৫৪৩', 2, '2017-11-11', '1510405302DSC00131-9 - Copy (4).JPG', '2017-11-11 07:01:42', '2017-11-11 07:01:42', 0),
(5, 'জামিন', '22', '09009988987', 4, '2017-11-13', '1510558277Welcome Scan.jpg', '2017-11-13 01:31:17', '2017-11-13 01:31:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_therapy`
--

CREATE TABLE `patient_therapy` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `therapy_id` int(11) NOT NULL,
  `time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_therapy`
--

INSERT INTO `patient_therapy` (`id`, `user_id`, `patient_id`, `therapy_id`, `time`, `date`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '', '2017-11-08', 10000, 1, NULL, NULL),
(2, 2, 2, 2, '', '2017-11-08', 30000, 0, NULL, NULL),
(3, 2, 3, 2, '', '2017-11-08', 10000, 0, NULL, NULL),
(4, 1, 3, 2, '', '2017-11-08', 10000, 1, NULL, NULL),
(5, 6, 3, 1, '', '2017-11-08', 10000, 1, NULL, NULL),
(6, 1, 1, 2, '', '2017-11-08', 2000, 1, NULL, NULL),
(7, 6, 2, 3, '', '2017-11-11', 5000, 0, NULL, NULL),
(8, 2, 2, 3, '', '2017-11-11', 5000, 0, NULL, NULL),
(9, 6, 3, 1, '', '2017-11-11', 5660, 1, NULL, NULL),
(10, 2, 4, 1, '', '2017-11-13', 6000, 1, NULL, NULL),
(11, 1, 5, 1, '', '2017-11-12', 6000, 1, NULL, NULL),
(12, 6, 5, 1, '', '2017-11-13', 10000, 1, NULL, NULL),
(13, 1, 5, 1, '', '2017-11-15', 20000, 1, NULL, NULL),
(14, 1, 5, 1, 'সকাল 9:50', '2017-11-23', 5500, 1, NULL, NULL),
(15, 6, 4, 3, 'বিকাল ৩টা', '2017-11-23', 6000, 0, NULL, NULL),
(16, 1, 4, 1, 'সকাল 9:50', '2018-01-19', 10000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_disease` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `main_disease`, `sub_disease`, `history`, `date`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, '2', 'Under Weight', 'For 5 years...', '2017-11-20', 5, '2017-11-20 07:16:19', '2017-11-20 07:16:19'),
(2, '4', 'Sub', 'দীর্ঘ ইতিহাস', '2017-11-20', 4, '2017-11-20 08:45:47', '2017-11-20 08:45:47'),
(3, '2', 'Under Weight', 'নতুন', '2017-11-25', 1, '2017-11-25 01:35:56', '2017-11-25 01:35:56'),
(4, '2', 'Under Weight', 'নতুন', '2017-11-25', 1, '2017-11-25 01:37:09', '2017-11-25 01:37:09'),
(5, '2', 'Under Weight', 'For 5 years...', '2017-11-29', 3, '2017-11-28 12:57:36', '2017-11-28 12:57:36'),
(6, '2', '3', 'For 5 years...', '2018-01-14', 2, '2018-01-14 06:24:47', '2018-01-14 06:24:47'),
(7, '2', '3', '6666', '2018-01-14', 2, '2018-01-14 07:05:35', '2018-01-14 07:05:35'),
(8, '2', '3', 'পুরনো', '2018-01-19', 4, '2018-01-18 14:10:08', '2018-01-18 14:10:08'),
(9, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:05:33', '2018-01-23 12:05:33'),
(10, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:08:16', '2018-01-23 12:08:16'),
(11, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:11:10', '2018-01-23 12:11:10'),
(12, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:15:47', '2018-01-23 12:15:47'),
(13, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:19:47', '2018-01-23 12:19:47'),
(14, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:25:06', '2018-01-23 12:25:06'),
(15, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:27:25', '2018-01-23 12:27:25'),
(16, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:28:07', '2018-01-23 12:28:07'),
(17, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:28:28', '2018-01-23 12:28:28'),
(18, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:28:39', '2018-01-23 12:28:39'),
(19, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:29:34', '2018-01-23 12:29:34'),
(20, '2', '3', 'jkkjhkkk', '2018-01-23', 5, '2018-01-23 12:30:18', '2018-01-23 12:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_therapy`
--

CREATE TABLE `prescription_therapy` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `therapy_id` int(11) NOT NULL,
  `therapy_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `therapy_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_therapy`
--

INSERT INTO `prescription_therapy` (`id`, `prescription_id`, `therapy_id`, `therapy_time`, `therapy_amount`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 'lhljl', 5, NULL, NULL),
(2, 11, 2, 'lhlklj', 6, NULL, NULL),
(3, 12, 1, 'lhljl', 5, NULL, NULL),
(4, 12, 2, 'lhlklj', 6, NULL, NULL),
(5, 13, 1, 'lhljl', 5, NULL, NULL),
(6, 13, 2, 'lhlklj', 6, NULL, NULL),
(7, 14, 1, 'lhljl', 5, NULL, NULL),
(8, 14, 2, 'lhlklj', 6, NULL, NULL),
(9, 15, 1, 'lhljl', 5, NULL, NULL),
(10, 15, 2, 'lhlklj', 6, NULL, NULL),
(11, 16, 1, 'lhljl', 5, NULL, NULL),
(12, 16, 2, 'lhlklj', 6, NULL, NULL),
(13, 17, 1, 'lhljl', 5, NULL, NULL),
(14, 17, 2, 'lhlklj', 6, NULL, NULL),
(15, 18, 1, 'lhljl', 5, NULL, NULL),
(16, 18, 2, 'lhlklj', 6, NULL, NULL),
(17, 19, 1, 'lhljl', 5, NULL, NULL),
(18, 19, 2, 'lhlklj', 6, NULL, NULL),
(19, 20, 1, 'lhljl', 5, NULL, NULL),
(20, 20, 2, 'lhlklj', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `therapies`
--

CREATE TABLE `therapies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapies`
--

INSERT INTO `therapies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'janina', '2017-11-08 23:34:43', '2017-11-08 23:34:43'),
(2, 'exactly', '2017-11-08 23:34:53', '2017-11-08 23:34:53'),
(3, 'avc', '2017-11-08 23:35:27', '2017-11-08 23:35:27'),
(4, 'Dr.alak sjsks', '2017-11-10 00:10:23', '2017-11-10 00:10:23'),
(5, 'empty', '2017-11-11 10:21:08', '2017-11-11 10:21:08'),
(6, 'long', '2017-11-13 01:15:22', '2017-11-13 01:15:22'),
(7, 'mid', '2017-11-13 01:30:08', '2017-11-13 01:30:08'),
(8, 'jam', '2017-11-13 01:30:17', '2017-11-13 01:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ami', 'ami@g.com', '$2y$10$9QZRSD39dqKc7nF36jZ.B.MHeGxaeub3q7IEM185bSO3WSEgDyEu2', 1, 'NrDsYYjVvp0hWu7g6BENOd9FcpkWUBTh6lR771uejCOx39rdTFHcLt2Qxddi', '2017-11-08 02:05:45', '2017-11-08 02:05:45'),
(2, 'Aulipriya Mukhles', 'apromona@yahoo.com', '$2y$10$cgPbUyob13wBy7m62Uotz.C920Y8LcbAy.Aoz3Cp1z6WxXE79yK0O', 2, 'QgTb9vLHNXPvtzQGdfaxZq43N1wt4Z0jD9J3HmSPRNSSjpiMurHnPDgCV22Z', '2017-11-08 03:06:03', '2017-11-23 12:01:41'),
(6, 'pr', 'pr@gmail.com', '$2y$10$9QZRSD39dqKc7nF36jZ.B.MHeGxaeub3q7IEM185bSO3WSEgDyEu2', 1, 'rb0sRaXQxaDHpEQitAs1qdTlF2h3YNyxkJrkhJhJfARMRkQqezAi09PdXZfZ', NULL, NULL),
(7, 'Jr', 'jr@gmail.com', '$2y$10$PMLPbSuFIPp2f86/4u/kK.i5kIPCdfuhW50bfKKiIDrTKb1othDBy', 1, NULL, '2017-12-31 01:45:36', '2017-12-31 01:45:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_therapy`
--
ALTER TABLE `patient_therapy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `prescription_therapy`
--
ALTER TABLE `prescription_therapy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapies`
--
ALTER TABLE `therapies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patient_therapy`
--
ALTER TABLE `patient_therapy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `prescription_therapy`
--
ALTER TABLE `prescription_therapy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `therapies`
--
ALTER TABLE `therapies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
