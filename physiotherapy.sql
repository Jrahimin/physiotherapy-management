-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 11:20 PM
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
(12, '2018_01_22_152949_prescription_therapy', 6),
(14, '2018_01_28_083936_create_payments_table', 7),
(15, '2018_02_01_181540_alter_patient_therapies_fields', 8),
(18, '2018_02_01_191557_add_date_to_payment', 9);

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
(5, 'জামিন', '22', '09009988987', 4, '2017-11-13', '1510558277Welcome Scan.jpg', '2017-11-13 01:31:17', '2017-11-13 01:31:17', 500);

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
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_therapy`
--

INSERT INTO `patient_therapy` (`id`, `user_id`, `patient_id`, `therapy_id`, `time`, `date`, `status`, `created_at`, `updated_at`, `payment_id`) VALUES
(3, 7, 5, 3, 'বিকাল', '2018-02-02', 0, NULL, NULL, 6),
(4, 7, 5, 7, 'বিকাল', '2018-02-02', 0, NULL, NULL, 6),
(5, 7, 5, 3, 'বিকাল', '2018-02-02', 0, NULL, NULL, 7),
(6, 7, 5, 7, 'বিকাল', '2018-02-02', 0, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `paid` double NOT NULL,
  `due_or_advance` double NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `time` varchar(150) CHARACTER SET utf8 NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `paid`, `due_or_advance`, `patient_id`, `prescription_id`, `created_at`, `updated_at`, `date`, `time`, `user_id`, `status`) VALUES
(6, 22000, 18000, -4000, 5, 23, '2018-02-01 15:25:05', '2018-02-01 15:25:05', '2018-02-02', 'বিকাল', 7, 0),
(7, 22000, 23000, 1000, 5, 23, '2018-02-01 15:25:30', '2018-02-01 15:25:30', '2018-02-02', 'বিকাল', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_disease_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_disease_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `main_disease_id`, `sub_disease_id`, `history`, `date`, `patient_id`, `created_at`, `updated_at`) VALUES
(21, '2', '3', 'long term', '2018-02-02', 5, '2018-02-01 14:48:54', '2018-02-01 14:48:54'),
(22, '2', '3', 'long term', '2018-02-02', 5, '2018-02-01 14:49:23', '2018-02-01 14:49:23'),
(23, '2', '3', 'long time', '2018-02-02', 5, '2018-02-01 15:24:29', '2018-02-01 15:24:29'),
(24, '2', '3', 'long term', '2018-02-02', 5, '2018-02-01 15:48:16', '2018-02-01 15:48:16'),
(25, '2', '3', 'long term', '2018-02-02', 5, '2018-02-01 15:48:44', '2018-02-01 15:48:44'),
(26, '2', '3', 'long term', '2018-02-02', 5, '2018-02-01 15:49:16', '2018-02-01 15:49:16'),
(27, '2', '3', 'long term', '2018-02-02', 5, '2018-02-01 15:49:27', '2018-02-01 15:49:27');

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
(24, 23, 3, 'বিকাল', 2, NULL, NULL),
(25, 23, 7, 'বিকাল ৪টা', 4, NULL, NULL),
(26, 24, 2, 'বিকাল ৪টা', 3, NULL, NULL),
(27, 24, 3, 'বিকাল ৪টা', 2, NULL, NULL),
(28, 25, 2, 'বিকাল ৪টা', 3, NULL, NULL),
(29, 25, 3, 'বিকাল ৪টা', 2, NULL, NULL),
(30, 26, 2, 'বিকাল ৪টা', 3, NULL, NULL),
(31, 26, 3, 'বিকাল ৪টা', 2, NULL, NULL),
(32, 27, 2, 'বিকাল ৪টা', 3, NULL, NULL),
(33, 27, 3, 'বিকাল ৪টা', 2, NULL, NULL);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patient_therapy`
--
ALTER TABLE `patient_therapy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `prescription_therapy`
--
ALTER TABLE `prescription_therapy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
