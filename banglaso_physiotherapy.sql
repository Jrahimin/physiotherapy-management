-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2018 at 06:39 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banglaso_physiotherapy`
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
(5, 'জামিন', '22', '09009988987', 4, '2017-11-13', '1510558277Welcome Scan.jpg', '2017-11-13 01:31:17', '2017-11-13 01:31:17', 500),
(6, 'মোঃ শফিকুল ইসলাম', '৪০', '০১৭২২৩৪১৯৬২', 4, '2018-02-05', '1517842557robiul.png', '2018-02-05 08:55:57', '2018-02-05 08:55:57', 500),
(7, 'Shofikul islam', '40', '01819318726', 4, '2018-02-05', '1517842870robiul.png', '2018-02-05 09:01:10', '2018-02-05 09:01:10', 500);

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
(6, 7, 5, 7, 'বিকাল', '2018-02-02', 0, NULL, NULL, 7),
(7, 1, 5, 2, 'বিকাল', '2018-02-02', 0, NULL, NULL, 8),
(8, 1, 5, 3, 'বিকাল', '2018-02-02', 0, NULL, NULL, 8),
(9, 1, 5, 2, 'বিকাল', '2018-02-02', 0, NULL, NULL, 9),
(10, 1, 5, 3, 'বিকাল', '2018-02-02', 0, NULL, NULL, 9),
(11, 1, 5, 2, 'বিকাল', '2018-02-02', 0, NULL, NULL, 10),
(12, 1, 5, 3, 'বিকাল', '2018-02-02', 0, NULL, NULL, 10),
(13, 1, 5, 2, '2pm', '2018-02-02', 0, NULL, NULL, 11),
(14, 1, 5, 3, '2pm', '2018-02-02', 0, NULL, NULL, 11),
(15, 1, 5, 2, 'সকাল', '2018-02-03', 0, NULL, NULL, 12),
(16, 1, 5, 3, 'সকাল', '2018-02-03', 0, NULL, NULL, 12),
(17, 1, 5, 2, '2pm', '2018-02-04', 0, NULL, NULL, 13),
(18, 1, 5, 3, '2pm', '2018-02-04', 0, NULL, NULL, 13),
(19, 1, 5, 2, '2pm', '2018-02-04', 0, NULL, NULL, 14),
(20, 1, 5, 3, '2pm', '2018-02-04', 0, NULL, NULL, 14),
(21, 8, 5, 2, '2pm', '2018-02-04', 0, NULL, NULL, 15),
(22, 8, 5, 3, '2pm', '2018-02-04', 0, NULL, NULL, 15),
(23, 1, 5, 2, '2pm', '2018-02-04', 0, NULL, NULL, 16),
(24, 1, 5, 3, '2pm', '2018-02-04', 0, NULL, NULL, 16),
(25, 2, 4, 2, '2pm', '2018-02-04', 0, NULL, NULL, 17),
(26, 7, 4, 2, '2pm', '2018-02-04', 0, NULL, NULL, 18),
(27, 1, 5, 2, '2pm', '2018-02-04', 0, NULL, NULL, 19),
(28, 1, 5, 3, '2pm', '2018-02-04', 0, NULL, NULL, 19),
(29, 1, 4, 3, '2pm', '2018-02-04', 0, NULL, NULL, 20),
(30, 1, 4, 2, '2pm', '2018-02-04', 0, NULL, NULL, 20),
(31, 7, 4, 3, '2pm', '2018-02-04', 0, NULL, NULL, 21),
(32, 7, 4, 2, '2pm', '2018-02-04', 0, NULL, NULL, 21),
(33, 7, 4, 3, '2pm', '2018-02-04', 0, NULL, NULL, 22),
(34, 7, 4, 2, '2pm', '2018-02-04', 0, NULL, NULL, 22),
(35, 6, 4, 3, '2pm', '2018-02-04', 0, NULL, NULL, 23),
(36, 6, 4, 2, '2pm', '2018-02-04', 0, NULL, NULL, 23),
(37, 7, 4, 3, '4pm', '2018-02-04', 0, NULL, NULL, 24),
(38, 1, 4, 3, '4pm', '2018-02-04', 0, NULL, NULL, 25),
(39, 8, 6, 3, '2pm', '2018-02-05', 0, NULL, NULL, 26),
(40, 8, 6, 3, '2pm', '2018-02-05', 0, NULL, NULL, 27),
(41, 8, 6, 3, '2pm', '2018-02-05', 0, NULL, NULL, 28),
(42, 8, 6, 3, '2pm', '2018-02-05', 0, NULL, NULL, 29);

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
(6, 22000, 18000, -4000, 5, 23, '2018-02-01 15:25:05', '2018-02-01 15:25:05', '2018-02-02', 'বিকাল', 7, 1),
(7, 22000, 23000, 1000, 5, 23, '2018-02-01 15:25:30', '2018-02-01 15:25:30', '2018-02-02', 'বিকাল', 7, 0),
(8, 22000, 20000, -2000, 5, 27, '2018-02-01 16:31:42', '2018-02-01 16:31:42', '2018-02-02', 'বিকাল', 1, 0),
(9, 22000, 20000, -2000, 5, 27, '2018-02-01 16:32:53', '2018-02-01 16:32:53', '2018-02-02', 'বিকাল', 1, 0),
(10, 22000, 20000, -2000, 5, 27, '2018-02-01 16:33:40', '2018-02-01 16:33:40', '2018-02-02', 'বিকাল', 1, 0),
(11, 22000, 25000, 3000, 5, 27, '2018-02-02 06:25:37', '2018-02-02 06:25:37', '2018-02-02', '2pm', 1, 0),
(12, 20000, 25000, 5000, 5, 27, '2018-02-03 11:56:05', '2018-02-03 11:56:05', '2018-02-03', 'সকাল', 1, 1),
(13, 20000, 20000, 0, 5, 27, '2018-02-03 12:33:18', '2018-02-03 12:33:18', '2018-02-04', '2pm', 1, 0),
(14, 20000, 6000, -14000, 5, 27, '2018-02-03 12:42:04', '2018-02-03 12:42:04', '2018-02-04', '2pm', 1, 0),
(15, 20000, 16000, -4000, 5, 27, '2018-02-03 13:11:22', '2018-02-03 13:11:22', '2018-02-04', '2pm', 8, 0),
(16, 20000, 36000, 16000, 5, 27, '2018-02-03 13:14:25', '2018-02-03 13:14:25', '2018-02-04', '2pm', 1, 0),
(17, 4000, 6000, 2000, 4, 28, '2018-02-03 13:25:06', '2018-02-03 13:25:06', '2018-02-04', '2pm', 2, 0),
(18, 4000, 8000, 4000, 4, 28, '2018-02-03 13:27:54', '2018-02-03 13:27:54', '2018-02-04', '2pm', 7, 0),
(19, 20000, 25000, 5000, 5, 27, '2018-02-03 13:40:54', '2018-02-03 13:40:54', '2018-02-04', '2pm', 1, 0),
(20, 7000, 6000, -1000, 4, 29, '2018-02-03 13:48:14', '2018-02-03 13:48:14', '2018-02-04', '2pm', 1, 0),
(21, 7000, 9000, 2000, 4, 29, '2018-02-03 21:31:08', '2018-02-03 21:31:08', '2018-02-04', '2pm', 7, 0),
(22, 7000, 1000, -6000, 4, 29, '2018-02-03 21:34:16', '2018-02-03 21:34:16', '2018-02-04', '2pm', 7, 0),
(23, 7000, 4000, -3000, 4, 29, '2018-02-03 22:38:09', '2018-02-03 22:38:09', '2018-02-04', '2pm', 6, 0),
(24, 5000, 5000, 0, 4, 30, '2018-02-03 22:40:32', '2018-02-03 22:40:32', '2018-02-04', '4pm', 7, 0),
(25, 5000, 6000, 1000, 4, 30, '2018-02-03 22:41:17', '2018-02-03 22:41:17', '2018-02-04', '4pm', 1, 0),
(26, 500, 500, 0, 6, 32, '2018-02-05 08:58:07', '2018-02-05 08:58:07', '2018-02-05', '2pm', 8, 1),
(27, 500, 400, -100, 6, 33, '2018-02-05 09:17:24', '2018-02-05 09:17:24', '2018-02-05', '2pm', 8, 0),
(28, 300, 400, 100, 6, 33, '2018-02-05 09:18:17', '2018-02-05 09:18:17', '2018-02-05', '2pm', 8, 0),
(29, 300, 300, 0, 6, 33, '2018-02-05 09:34:26', '2018-02-05 09:34:26', '2018-02-05', '2pm', 8, 0);

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
(27, '2', '3', 'long term', '2018-02-02', 5, '2018-02-01 15:49:27', '2018-02-01 15:49:27'),
(28, '4', '5', 'abc', '2018-02-04', 4, '2018-02-03 13:19:04', '2018-02-03 13:19:04'),
(29, '4', '5', 'abc', '2018-02-04', 4, '2018-02-03 13:38:36', '2018-02-03 13:38:36'),
(30, '4', '5', 'ab', '2018-02-04', 4, '2018-02-03 22:39:10', '2018-02-03 22:39:10'),
(31, '2', '3', 'abc', '2018-02-05', 4, '2018-02-05 08:50:01', '2018-02-05 08:50:01'),
(32, '2', '3', 'Back pain', '2018-02-05', 6, '2018-02-05 08:56:59', '2018-02-05 08:56:59'),
(33, '2', '3', 'abcd', '2018-02-05', 6, '2018-02-05 09:00:02', '2018-02-05 09:00:02'),
(34, '2', '3', 'abc', '2018-02-05', 7, '2018-02-05 09:02:55', '2018-02-05 09:02:55');

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
(33, 27, 3, 'বিকাল ৪টা', 2, NULL, NULL),
(34, 28, 2, '2pm', 4, NULL, NULL),
(35, 29, 3, '2pm', 4, NULL, NULL),
(36, 29, 2, '2pm', 3, NULL, NULL),
(37, 30, 3, '4pm', 10, NULL, NULL),
(38, 31, 8, '2pm', 4, NULL, NULL),
(39, 32, 3, '2pm', 2, NULL, NULL),
(40, 33, 3, '2pm', 3, NULL, NULL),
(41, 34, 3, '2pm', 3, NULL, NULL);

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
(6, 'pr', 'pr@gmail.com', '$2y$10$9QZRSD39dqKc7nF36jZ.B.MHeGxaeub3q7IEM185bSO3WSEgDyEu2', 1, 'Z8weUfXMjC6fy7icfn5MqzThqOYjw0K8ZTA1xGA5u8sM14LFTRFMSwy9aYwn', NULL, NULL),
(7, 'আমি', 'ami@gmail.com', '$2y$10$c/e9xcZDz1JIw0wtIhPcyOaqZzmO4zbXDOlMeSos9hp3nfHI1LWb2', 1, 'nsRvU7KJzIk7uPwTU7euh5Dng9kgOri0Qs4z0SmtRJjJl2R8vcSbWIPFmHKR', '2017-11-30 00:14:41', '2017-11-30 00:14:41'),
(8, 'Raju', 'raju.syau@gmail.com', '$2y$10$v.IrJsGcO6ORItd19CU1XuXgRjoXCZQwLufjPqFrDDxN0/q.Pmr1a', 1, 'DeJgNXEub20Dpm0SQW0RUj8W8IwEkjsdmFDBaW9LmRNxSOxyhZxRiG7RfZsH', '2017-11-30 16:20:08', '2017-11-30 16:20:08');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `patient_therapy`
--
ALTER TABLE `patient_therapy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `prescription_therapy`
--
ALTER TABLE `prescription_therapy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
