-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 07:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fund_transfer`
--

-- --------------------------------------------------------

--
-- Table structure for table `agriculture_farmers_registrations`
--

CREATE TABLE `agriculture_farmers_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `agri_emp_id` text DEFAULT NULL,
  `agri_emp_name` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `father_name` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `cnic` text DEFAULT NULL,
  `province` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `tehsil` text DEFAULT NULL,
  `uc` text DEFAULT NULL,
  `tappa` text DEFAULT NULL,
  `area` text DEFAULT NULL,
  `chak_goth_killi` text DEFAULT NULL,
  `khasra_survey` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `area_category` text DEFAULT NULL,
  `ownership` text DEFAULT NULL,
  `aid_type` text DEFAULT NULL,
  `is_distributed` text DEFAULT NULL,
  `cheque_amount` text DEFAULT NULL,
  `cheque_number` text DEFAULT NULL,
  `created_on` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `is_verified` text DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `verified_by` text DEFAULT NULL,
  `verified_on` text DEFAULT NULL,
  `registration_sms_date_time` text DEFAULT NULL,
  `seed_given_sms_date_time` text DEFAULT NULL,
  `receiver_mobile_no` text DEFAULT NULL,
  `total_area` text DEFAULT NULL,
  `seed_required_qty` text DEFAULT NULL,
  `seed_variety` text DEFAULT NULL,
  `seed_given_qty` text DEFAULT NULL,
  `seed_variety_given` text DEFAULT NULL,
  `seed_given_by` text DEFAULT NULL,
  `seed_given_date` text DEFAULT NULL,
  `is_sent_bisp` text DEFAULT NULL,
  `bank_branch_name` text DEFAULT NULL,
  `bank_branch_code` text DEFAULT NULL,
  `bank_account_title` text DEFAULT NULL,
  `bank_account_number` text DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  `front_id_card` text DEFAULT NULL,
  `back_id_card` text DEFAULT NULL,
  `upload_land_proof` text DEFAULT NULL,
  `upload_other_attach` text DEFAULT NULL,
  `upload_farmer_pic` text DEFAULT NULL,
  `upload_cheque_pic` text DEFAULT NULL,
  `verification_status` text DEFAULT NULL,
  `declined_reason` text DEFAULT NULL,
  `verification_by` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agriculture_farmers_registrations`
--

INSERT INTO `agriculture_farmers_registrations` (`id`, `admin_or_user_id`, `agri_emp_id`, `agri_emp_name`, `name`, `father_name`, `gender`, `cnic`, `province`, `district`, `tehsil`, `uc`, `tappa`, `area`, `chak_goth_killi`, `khasra_survey`, `mobile`, `area_category`, `ownership`, `aid_type`, `is_distributed`, `cheque_amount`, `cheque_number`, `created_on`, `created_by`, `is_verified`, `rejection_reason`, `verified_by`, `verified_on`, `registration_sms_date_time`, `seed_given_sms_date_time`, `receiver_mobile_no`, `total_area`, `seed_required_qty`, `seed_variety`, `seed_given_qty`, `seed_variety_given`, `seed_given_by`, `seed_given_date`, `is_sent_bisp`, `bank_branch_name`, `bank_branch_code`, `bank_account_title`, `bank_account_number`, `latitude`, `longitude`, `front_id_card`, `back_id_card`, `upload_land_proof`, `upload_other_attach`, `upload_farmer_pic`, `upload_cheque_pic`, `verification_status`, `declined_reason`, `verification_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', '1', 'Kashan Shaikh', 'Zena Ortiz', 'Leo Hawkins', 'Custom', 'Sapiente reprehender', 'Inventore sunt et de', 'Illo dolor ut pariat', 'Nesciunt sit corpo', 'Cumque ipsa et temp', 'Ad voluptatem dolor', 'Similique eiusmod al', 'Id aliquid aspernatu', 'Ab fuga Consectetur', 'Deleniti nostrud pro', 'Voluptatibus necessi', 'Soluta ratione amet', 'Dolor velit modi mi', 'Consequatur Vel vol', 'Praesentium laborum', '180', 'Optio nostrud velit', 'Ratione est ipsum l', 'Minima aut quia dolo', 'Est aut obcaecati c', 'Necessitatibus sunt', 'Ad ut voluptates tem', '26-Apr-2014', '30-Aug-1978', 'Possimus commodi es', 'Omnis vel et molesti', '165', 'Culpa do sequi volu', 'Possimus commodi es', 'Quaerat voluptatibus', 'In qui hic non repel', '23-Oct-1977', 'Sapiente dolorem adi', 'Stella Mitchell', 'Nihil rerum est comm', 'Dolore quo in et eum', '970', 'Quia sapiente et eos', 'Laborum Qui soluta', NULL, NULL, NULL, NULL, NULL, NULL, 'Verified', NULL, 'Ali Shaikh', '2024-05-31 03:24:44', '2024-06-08 04:02:39', NULL),
(2, '2', '1', 'Kashan Shaikh', 'Ali Khan', 'Leo Hawkins', 'Custom', 'Sapiente reprehender', 'Inventore sunt et de', 'Illo dolor ut pariat', 'Nesciunt sit corpo', 'Cumque ipsa et temp', 'Ad voluptatem dolor', 'Similique eiusmod al', 'Id aliquid aspernatu', 'Ab fuga Consectetur', 'Deleniti nostrud pro', 'Voluptatibus necessi', 'Soluta ratione amet', 'Dolor velit modi mi', 'Consequatur Vel vol', 'Praesentium laborum', '180', 'Optio nostrud velit', 'Ratione est ipsum l', 'Minima aut quia dolo', 'Est aut obcaecati c', 'Necessitatibus sunt', 'Ad ut voluptates tem', '26-Apr-2014', '30-Aug-1978', 'Possimus commodi es', 'Omnis vel et molesti', '165', 'Culpa do sequi volu', 'Possimus commodi es', 'Quaerat voluptatibus', 'In qui hic non repel', '23-Oct-1977', 'Sapiente dolorem adi', 'Stella Mitchell', 'Nihil rerum est comm', 'Dolore quo in et eum', '970', 'Quia sapiente et eos', 'Laborum Qui soluta', NULL, NULL, NULL, NULL, NULL, NULL, 'Unverified', 'documents not attach', 'Ali Shaikh', '2024-05-31 03:24:44', '2024-06-03 02:56:49', NULL),
(3, '2', '1', 'Kashan Shaikh', 'Umar khan', 'Leo Hawkins', 'Custom', 'Sapiente reprehender', 'Inventore sunt et de', 'Illo dolor ut pariat', 'Nesciunt sit corpo', 'Cumque ipsa et temp', 'Ad voluptatem dolor', 'Similique eiusmod al', 'Id aliquid aspernatu', 'Ab fuga Consectetur', 'Deleniti nostrud pro', 'Voluptatibus necessi', 'Soluta ratione amet', 'Dolor velit modi mi', 'Consequatur Vel vol', 'Praesentium laborum', '180', 'Optio nostrud velit', 'Ratione est ipsum l', 'Minima aut quia dolo', 'Est aut obcaecati c', 'Necessitatibus sunt', 'Ad ut voluptates tem', '26-Apr-2014', '30-Aug-1978', 'Possimus commodi es', 'Omnis vel et molesti', '165', 'Culpa do sequi volu', 'Possimus commodi es', 'Quaerat voluptatibus', 'In qui hic non repel', '23-Oct-1977', 'Sapiente dolorem adi', 'Stella Mitchell', 'Nihil rerum est comm', 'Dolore quo in et eum', '970', 'Quia sapiente et eos', 'Laborum Qui soluta', NULL, NULL, NULL, NULL, NULL, NULL, 'Unverified', 'pictures not attached', 'Ali Shaikh', '2024-05-31 03:24:44', '2024-06-03 04:49:18', NULL),
(4, '2', '1', 'Kashan Shaikh', 'testing', 'Leo Hawkins', 'Custom', 'Sapiente reprehender', 'Inventore sunt et de', 'Illo dolor ut pariat', 'Nesciunt sit corpo', 'Cumque ipsa et temp', 'Ad voluptatem dolor', 'Similique eiusmod al', 'Id aliquid aspernatu', 'Ab fuga Consectetur', 'Deleniti nostrud pro', 'Voluptatibus necessi', 'Soluta ratione amet', 'Dolor velit modi mi', 'Consequatur Vel vol', 'Praesentium laborum', '180', 'Optio nostrud velit', 'Ratione est ipsum l', 'Minima aut quia dolo', 'Est aut obcaecati c', 'Necessitatibus sunt', 'Ad ut voluptates tem', '26-Apr-2014', '30-Aug-1978', 'Possimus commodi es', 'Omnis vel et molesti', '165', 'Culpa do sequi volu', 'Possimus commodi es', 'Quaerat voluptatibus', 'In qui hic non repel', '23-Oct-1977', 'Sapiente dolorem adi', 'Stella Mitchell', 'Nihil rerum est comm', 'Dolore quo in et eum', '970', 'Quia sapiente et eos', 'Laborum Qui soluta', NULL, NULL, NULL, NULL, NULL, NULL, 'Unverified', 'Not registered', 'Ali Shaikh', '2024-05-31 03:24:44', '2024-06-08 05:40:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agriculture_officers`
--

CREATE TABLE `agriculture_officers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `full_name` text DEFAULT NULL,
  `contact_number` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `tehsil` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agriculture_officers`
--

INSERT INTO `agriculture_officers` (`id`, `admin_or_user_id`, `full_name`, `contact_number`, `address`, `email_address`, `district`, `tehsil`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Kashan Shaikh', '03173859647', 'Hyderabad', 'shaikhkashan670@gmail.com', 'Hyderabad', 'Hyderabad', 'Kashan', '12345678', '2024-05-31 02:04:13', '2024-05-31 02:04:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `area` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `admin_or_user_id`, `area`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', '2024-06-01 05:58:38', '2024-06-01 05:58:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `admin_or_user_id`, `district`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Badin', '2024-05-29 01:56:04', '2024-05-29 01:56:04', NULL),
(2, '1', 'Dadu', '2024-05-29 01:56:23', '2024-05-29 01:56:23', NULL),
(3, '1', 'Hyderabad', '2024-05-29 01:56:49', '2024-05-29 01:56:49', NULL),
(4, '1', 'checking', '2024-06-01 05:07:26', '2024-06-01 05:07:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_revenue_departments`
--

CREATE TABLE `land_revenue_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `full_name` text DEFAULT NULL,
  `contact_number` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `tehsil` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_revenue_departments`
--

INSERT INTO `land_revenue_departments` (`id`, `admin_or_user_id`, `full_name`, `contact_number`, `address`, `email_address`, `district`, `tehsil`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Ali Shaikh', '03112328922', 'hyderabad', 'ali12@gmail.com', 'Hyderabad', 'Hyderabad City', 'ali', '12345678', '2024-05-31 05:36:46', '2024-05-31 05:36:46', NULL),
(2, '1', 'Shery', '03112328922', 'hyderabad', 'shery12@gmail.com', 'Badin', 'Tando', 'shery12', '12345678', '2024-06-06 02:21:00', '2024-06-06 02:21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `land_revenue_farmer_registations`
--

CREATE TABLE `land_revenue_farmer_registations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `land_emp_id` text DEFAULT NULL,
  `land_emp_name` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `father_name` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `cnic` text DEFAULT NULL,
  `province` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `tehsil` text DEFAULT NULL,
  `uc` text DEFAULT NULL,
  `tappa` text DEFAULT NULL,
  `area` text DEFAULT NULL,
  `chak_goth_killi` text DEFAULT NULL,
  `khasra_survey` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `area_category` text DEFAULT NULL,
  `ownership` text DEFAULT NULL,
  `aid_type` text DEFAULT NULL,
  `is_distributed` text DEFAULT NULL,
  `cheque_amount` text DEFAULT NULL,
  `cheque_number` text DEFAULT NULL,
  `created_on` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `is_verified` text DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `verified_by` text DEFAULT NULL,
  `verified_on` text DEFAULT NULL,
  `registration_sms_date_time` text DEFAULT NULL,
  `seed_given_sms_date_time` text DEFAULT NULL,
  `receiver_mobile_no` text DEFAULT NULL,
  `total_area` text DEFAULT NULL,
  `seed_required_qty` text DEFAULT NULL,
  `seed_variety` text DEFAULT NULL,
  `seed_given_qty` text DEFAULT NULL,
  `seed_variety_given` text DEFAULT NULL,
  `seed_given_by` text DEFAULT NULL,
  `seed_given_date` text DEFAULT NULL,
  `is_sent_bisp` text DEFAULT NULL,
  `bank_branch_name` text DEFAULT NULL,
  `bank_branch_code` text DEFAULT NULL,
  `bank_account_title` text DEFAULT NULL,
  `bank_account_number` text DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  `front_id_card` text DEFAULT NULL,
  `back_id_card` text DEFAULT NULL,
  `upload_land_proof` text DEFAULT NULL,
  `upload_other_attach` text DEFAULT NULL,
  `upload_farmer_pic` text DEFAULT NULL,
  `upload_cheque_pic` text DEFAULT NULL,
  `verification_status` text DEFAULT NULL,
  `declined_reason` text DEFAULT NULL,
  `verification_by` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_revenue_farmer_registations`
--

INSERT INTO `land_revenue_farmer_registations` (`id`, `admin_or_user_id`, `land_emp_id`, `land_emp_name`, `name`, `father_name`, `gender`, `cnic`, `province`, `district`, `tehsil`, `uc`, `tappa`, `area`, `chak_goth_killi`, `khasra_survey`, `mobile`, `area_category`, `ownership`, `aid_type`, `is_distributed`, `cheque_amount`, `cheque_number`, `created_on`, `created_by`, `is_verified`, `rejection_reason`, `verified_by`, `verified_on`, `registration_sms_date_time`, `seed_given_sms_date_time`, `receiver_mobile_no`, `total_area`, `seed_required_qty`, `seed_variety`, `seed_given_qty`, `seed_variety_given`, `seed_given_by`, `seed_given_date`, `is_sent_bisp`, `bank_branch_name`, `bank_branch_code`, `bank_account_title`, `bank_account_number`, `latitude`, `longitude`, `front_id_card`, `back_id_card`, `upload_land_proof`, `upload_other_attach`, `upload_farmer_pic`, `upload_cheque_pic`, `verification_status`, `declined_reason`, `verification_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3', '1', 'Ali Shaikh', 'Bevis Walton', 'Troy Garcia', 'Custom', 'Eveniet maiores qui', 'Eu eos reprehenderit', 'Et blanditiis sed re', 'Quasi cum dolore min', 'Esse ut labore faci', 'Molestiae illo praes', 'Lorem adipisci volup', 'Tenetur voluptates n', 'Maiores quia maxime', 'Delectus culpa min', 'Anim repellendus Te', 'Voluptatem expedita', 'Ea distinctio Quas', 'Nostrud corrupti pr', 'Unde culpa est delen', '665', 'Ullam illum sunt be', 'Consequatur reiciend', 'Elit veniam recusa', 'Nam reprehenderit q', 'Voluptas obcaecati a', 'Consequatur exercita', '21-Nov-1981', '09-Feb-2023', 'Adipisci dolorem con', 'Sit ad necessitatib', '704', 'Et veniam impedit', 'Adipisci dolorem con', 'Inventore deserunt r', 'Consequatur delenit', '28-Aug-1977', 'Asperiores id harum', 'Dominique Dean', 'Consequatur dolorem', 'Qui Nam maiores in e', '279', 'Ex rem exercitatione', 'Tempor consectetur', NULL, NULL, NULL, NULL, NULL, NULL, 'Verified', NULL, 'Ali Shaikh', '2024-06-06 02:22:44', '2024-06-08 04:21:05', NULL),
(2, '3', '1', 'Ali Shaikh', 'Shaikh khan', 'Troy Garcia', 'Custom', 'Eveniet maiores qui', 'Eu eos reprehenderit', 'Et blanditiis sed re', 'Quasi cum dolore min', 'Esse ut labore faci', 'Molestiae illo praes', 'Lorem adipisci volup', 'Tenetur voluptates n', 'Maiores quia maxime', 'Delectus culpa min', 'Anim repellendus Te', 'Voluptatem expedita', 'Ea distinctio Quas', 'Nostrud corrupti pr', 'Unde culpa est delen', '665', 'Ullam illum sunt be', 'Consequatur reiciend', 'Elit veniam recusa', 'Nam reprehenderit q', 'Voluptas obcaecati a', 'Consequatur exercita', '21-Nov-1981', '09-Feb-2023', 'Adipisci dolorem con', 'Sit ad necessitatib', '704', 'Et veniam impedit', 'Adipisci dolorem con', 'Inventore deserunt r', 'Consequatur delenit', '28-Aug-1977', 'Asperiores id harum', 'Dominique Dean', 'Consequatur dolorem', 'Qui Nam maiores in e', '279', 'Ex rem exercitatione', 'Tempor consectetur', NULL, NULL, NULL, NULL, NULL, NULL, 'Unverified', NULL, NULL, '2024-06-06 02:22:44', '2024-06-06 02:22:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_09_075338_create_districts_table', 2),
(6, '2024_05_09_084903_create_tehsils_table', 3),
(7, '2024_05_09_102341_create_areas_table', 4),
(8, '2024_05_13_113851_create_tappas_table', 5),
(9, '2024_05_13_091013_create_agriculture_officers_table', 6),
(10, '2024_05_14_100153_create_land_revenue_departments_table', 6),
(11, '2024_05_20_092036_create_agriculture_farmers_registrations_table', 7),
(12, '2024_06_06_063724_create_land_revenue_farmer_registations_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tappas`
--

CREATE TABLE `tappas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `tehsil` text DEFAULT NULL,
  `tappa` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tappas`
--

INSERT INTO `tappas` (`id`, `admin_or_user_id`, `district`, `tehsil`, `tappa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Dadu', 'Mehar', 'A GIRKAN-II', '2024-05-22 13:07:42', '2024-05-22 13:07:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tehsils`
--

CREATE TABLE `tehsils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `tehsil` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tehsils`
--

INSERT INTO `tehsils` (`id`, `admin_or_user_id`, `district`, `tehsil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Badin', 'Tando', '2024-05-29 02:01:38', '2024-05-29 02:01:38', NULL),
(2, '1', 'Badin', 'Talhar', '2024-05-29 02:01:46', '2024-05-29 02:01:46', NULL),
(3, '1', 'Badin', 'Shaheed Fazil Rahu', '2024-05-29 02:01:54', '2024-05-29 02:01:54', NULL),
(4, '1', 'Badin', 'Matli', '2024-05-29 02:02:25', '2024-05-29 02:02:25', NULL),
(5, '1', 'Dadu', 'Dadu', '2024-05-29 02:02:42', '2024-05-29 02:02:42', NULL),
(6, '1', 'Dadu', 'Johi', '2024-05-29 02:02:52', '2024-05-29 02:02:52', NULL),
(7, '1', 'Dadu', 'Khairpur Nathan Shah', '2024-05-29 02:03:03', '2024-05-29 02:03:03', NULL),
(8, '1', 'Dadu', 'Mehar', '2024-05-29 02:03:17', '2024-05-29 02:03:17', NULL),
(9, '1', 'Hyderabad', 'Hyderabad City', '2024-05-29 02:04:03', '2024-05-29 02:04:03', NULL),
(10, '1', 'Hyderabad', 'Hyderabad', '2024-05-29 02:04:14', '2024-05-29 02:04:14', NULL),
(11, '1', 'Hyderabad', 'Latifabad', '2024-05-29 02:04:29', '2024-05-29 02:04:29', NULL),
(12, '1', 'Hyderabad', 'Qasimabad', '2024-05-29 02:04:50', '2024-05-29 02:04:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'admin',
  `password` varchar(255) NOT NULL,
  `district` text DEFAULT NULL,
  `tehsil` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `email_verified_at`, `usertype`, `password`, `district`, `tehsil`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@gmail.com', NULL, 'admin', '$2y$12$EgC2oRPY5VrpjA4OzGr0ROfNmBcez9kboAw721dIEEHF1ZP8kdgNS', NULL, NULL, NULL, NULL, NULL),
(2, '1', 'Kashan Shaikh', 'shaikhkashan670@gmail.com', NULL, 'Agriculture_Officer', '$2y$12$nEw.55Xz9TqT3C8FoTWE0OiLvnscraToZPTiOZh5W4vP4YhVRAxd.', 'Hyderabad', 'Hyderabad', NULL, '2024-05-31 02:04:14', '2024-05-31 02:04:14'),
(3, '1', 'Ali Shaikh', 'ali12@gmail.com', NULL, 'Land_Revenue_Officer', '$2y$12$2lerh6y7Xn9Vmu0mWmqJd.keK849jRgdT4qkNJv6ln5TjDfICrOne', 'Hyderabad', 'Hyderabad City', NULL, '2024-05-31 05:36:46', '2024-05-31 05:36:46'),
(4, '2', 'Shery', 'shery12@gmail.com', NULL, 'Land_Revenue_Officer', '$2y$12$U3Ui/GpcCSYssA.P7rRzOOHh30QLL7ntGPk86SKcoSOJJhybj8htS', 'Badin', 'Tando', NULL, '2024-06-06 02:21:00', '2024-06-06 02:21:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agriculture_farmers_registrations`
--
ALTER TABLE `agriculture_farmers_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agriculture_officers`
--
ALTER TABLE `agriculture_officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `land_revenue_departments`
--
ALTER TABLE `land_revenue_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_revenue_farmer_registations`
--
ALTER TABLE `land_revenue_farmer_registations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tappas`
--
ALTER TABLE `tappas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tehsils`
--
ALTER TABLE `tehsils`
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
-- AUTO_INCREMENT for table `agriculture_farmers_registrations`
--
ALTER TABLE `agriculture_farmers_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agriculture_officers`
--
ALTER TABLE `agriculture_officers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_revenue_departments`
--
ALTER TABLE `land_revenue_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `land_revenue_farmer_registations`
--
ALTER TABLE `land_revenue_farmer_registations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tappas`
--
ALTER TABLE `tappas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tehsils`
--
ALTER TABLE `tehsils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
