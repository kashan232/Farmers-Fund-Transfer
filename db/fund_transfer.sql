-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 09:44 AM
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
(1, '2', '1', 'kashan Shaikh', 'Alec Davenport', 'Kameko Henson', 'Custom', 'Assumenda ullamco it', 'Minim omnis natus ve', 'Hyderabad', 'Hyderabad', 'Tando Qaiser', 'ADDITIONAL HUSSAIN KHAN THORO', 'Iste consequatur und', 'Dolorum laboris cons', 'Aliquid ipsa volupt', 'Excepteur pariatur', 'In dolor labore culp', 'Culpa accusantium r', 'Aut ut possimus lau', 'Sapiente quidem qui', 'Id tempor quis cupid', '989', 'Rem ipsum sint neces', 'Reiciendis saepe dol', 'Quibusdam animi sed', 'Veniam sed exercita', 'Praesentium facilis', 'Est esse harum fugit', '28-Jun-2007', '25-Feb-1979', 'Sed quis ut voluptat', 'Impedit aliquid dol', '67', 'At ut repellendus V', '972', 'Porro voluptatum sin', 'Consectetur quas mol', '15-Feb-2024', 'Labore ipsam iure el', 'Matthew Donaldson', 'Cumque sed maxime ex', 'Architecto reiciendi', '145', 'Reprehenderit esse', 'Reprehenderit fuga', NULL, NULL, NULL, NULL, NULL, NULL, 'Unverified', NULL, NULL, '2024-06-14 01:45:17', '2024-06-14 01:45:17', NULL),
(2, '2', '1', 'kashan Shaikh', 'Indira Townsend', 'Liberty Case', 'Male', 'Provident repudiand', 'Impedit lorem et li', 'Hyderabad', 'Hyderabad', 'seri', 'ADDITIONAL TANDO FAZAL', 'Consequuntur lorem a', 'Voluptatem Incididu', 'Incidunt ex ea aut', 'Minus lorem quae rer', 'Repudiandae reiciend', 'Voluptate sunt tota', 'Iusto eveniet accus', 'Quis ipsum accusant', 'Et beatae quo nulla', '208', 'Velit illum quas eu', 'Proident obcaecati', 'At quibusdam asperio', 'Dolorem id tempor o', 'Sint quia assumenda', 'Perferendis nulla si', '29-Apr-1978', '03-Dec-2008', 'Voluptas dolore ad p', 'Vitae dolores dolor', '853', 'Consequat In sunt', '832', 'Fugiat elit ratione', 'Voluptatibus rerum v', '05-Oct-2003', 'Ea eligendi voluptas', 'Walter Henderson', 'Deserunt sunt occaec', 'Itaque expedita eos', '549', 'Eos modi numquam ad', 'Placeat quo rerum v', NULL, NULL, NULL, NULL, NULL, NULL, 'Unverified', NULL, NULL, '2024-06-14 01:48:09', '2024-06-14 01:48:09', NULL);

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
  `ucs` text DEFAULT NULL,
  `tappas` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agriculture_officers`
--

INSERT INTO `agriculture_officers` (`id`, `admin_or_user_id`, `full_name`, `contact_number`, `address`, `email_address`, `district`, `tehsil`, `ucs`, `tappas`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'kashan Shaikh', '03173859647', 'hyderabad', 'shaikhkashan670@gmail.com', 'Hyderabad', 'Hyderabad', '[\"seri\",\"Tando Qaiser\"]', '[\"ADDITIONAL HUSSAIN KHAN THORO\",\"ADDITIONAL TANDO FAZAL\"]', 'kashi', '12345678', '2024-06-12 05:06:46', '2024-06-12 05:06:46', NULL),
(2, 1, NULL, NULL, 'hyderabad', NULL, 'Hyderabad', 'Hyderabad', '[\"seri\"]', '[\"ADDITIONAL KATHRI\",\"ADDITIONAL TANDO FAZAL\"]', NULL, '12345678', '2024-06-13 03:45:56', '2024-06-13 03:45:56', NULL),
(3, 1, NULL, NULL, 'hyderabad', NULL, 'Hyderabad', 'Hyderabad', '[\"seri\"]', '[\"ADDITIONAL KATHRI\",\"ADDITIONAL TANDO FAZAL\"]', NULL, '12345678', '2024-06-13 03:49:42', '2024-06-13 03:49:42', NULL),
(4, 1, NULL, NULL, 'hyderabad', NULL, 'Hyderabad', 'Hyderabad', '[\"seri\"]', '[\"ADDITIONAL KATHRI\",\"ADDITIONAL TANDO FAZAL\"]', NULL, '12345678', '2024-06-13 03:50:01', '2024-06-13 03:50:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agriculture_user_farmer_registrations`
--

CREATE TABLE `agriculture_user_farmer_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `agri_user_emp_id` text DEFAULT NULL,
  `agri_user_emp_name` text DEFAULT NULL,
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
-- Dumping data for table `agriculture_user_farmer_registrations`
--

INSERT INTO `agriculture_user_farmer_registrations` (`id`, `admin_or_user_id`, `agri_user_emp_id`, `agri_user_emp_name`, `name`, `father_name`, `gender`, `cnic`, `province`, `district`, `tehsil`, `uc`, `tappa`, `area`, `chak_goth_killi`, `khasra_survey`, `mobile`, `area_category`, `ownership`, `aid_type`, `is_distributed`, `cheque_amount`, `cheque_number`, `created_on`, `created_by`, `is_verified`, `rejection_reason`, `verified_by`, `verified_on`, `registration_sms_date_time`, `seed_given_sms_date_time`, `receiver_mobile_no`, `total_area`, `seed_required_qty`, `seed_variety`, `seed_given_qty`, `seed_variety_given`, `seed_given_by`, `seed_given_date`, `is_sent_bisp`, `bank_branch_name`, `bank_branch_code`, `bank_account_title`, `bank_account_number`, `latitude`, `longitude`, `front_id_card`, `back_id_card`, `upload_land_proof`, `upload_other_attach`, `upload_farmer_pic`, `upload_cheque_pic`, `verification_status`, `declined_reason`, `verification_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '5', '1', 'Umar Khan', 'Louis Ferrell', 'Cameron Bowers', 'Male', 'Quod impedit ration', 'Excepturi exercitati', 'Hyderabad', 'Hyderabad', 'seri', 'ADDITIONAL HUSSAIN KHAN THORO', 'Consequatur Qui ape', 'Et non sit sed sunt', 'Eu quis nostrum non', 'Adipisci veniam tem', 'Ducimus modi sit co', 'Eum amet qui ducimu', 'Consectetur error ea', 'Cupiditate beatae id', 'Qui occaecat ut sint', '511', 'Sint aute iste volup', 'Qui architecto ad es', 'Quibusdam quibusdam', 'Sed est odit iure e', 'Mollit vel laborum', 'Rerum labore recusan', '21-Sep-1982', '12-Apr-2001', 'Illo eaque aut commo', 'Pariatur Nulla reru', '567', 'Sunt est dignissim', 'Illo eaque aut commo', 'Repellendus Dolor v', 'In eos ut veniam vo', '14-Jan-1973', 'Quos illo amet eum', 'Tatyana Gomez', 'Qui aliquip rerum op', 'Optio numquam tempo', '215', 'Consequuntur est et', 'Doloribus tempor del', NULL, NULL, NULL, NULL, NULL, NULL, 'Unverified', 'Documents not attached', 'Ali Khan', '2024-06-13 06:36:23', '2024-06-14 01:37:32', NULL),
(2, '5', '1', 'Umar Khan', 'Cheyenne Vang', 'Fatima Dudley', 'Male', 'Distinctio Ut adipi', 'Eius pariatur Repre', 'Hyderabad', 'Hyderabad', 'Tando Qaiser', 'ADDITIONAL KATHRI', 'Non iure incidunt h', 'Reprehenderit dignis', 'Officia quisquam qui', 'Debitis est hic inci', 'Ullamco velit delect', 'Molestias totam dist', 'Lorem et dolor sed a', 'Sunt aliquam molesti', 'Mollitia non earum u', '556', 'Architecto nihil omn', 'Libero sint illo qu', 'Libero eum labore et', 'Expedita sed sint la', 'Officia porro enim o', 'Et dolores voluptate', '18-Mar-2019', '05-Sep-2014', 'Ut quo esse cum vol', 'Repudiandae ut ut ne', '558', 'Voluptatum ut quo id', 'Ut quo esse cum vol', 'Consectetur proident', 'Sit et irure eiusmo', '31-May-2011', 'Molestiae irure reru', 'Fletcher Hutchinson', 'Ipsum earum sed sed', 'Quisquam quo rerum v', '660', 'Labore dolores perfe', 'Quam ad veritatis es', NULL, NULL, NULL, NULL, NULL, NULL, 'Verified', NULL, 'Ali Khan', '2024-06-14 01:39:51', '2024-06-14 01:40:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agri_users`
--

CREATE TABLE `agri_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text NOT NULL,
  `user_name` text DEFAULT NULL,
  `number` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `cnic` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `tehsil` text DEFAULT NULL,
  `ucs` text DEFAULT NULL,
  `tappas` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `cnic_img` text DEFAULT NULL,
  `form_img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agri_users`
--

INSERT INTO `agri_users` (`id`, `admin_or_user_id`, `user_name`, `number`, `email`, `address`, `cnic`, `district`, `tehsil`, `ucs`, `tappas`, `password`, `img`, `cnic_img`, `form_img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Umar Khan', '03112328922', 'umar12@gmail.com', 'hyderabad', '41302365505551', 'Hyderabad', 'Hyderabad', '[\"seri\",\"Tando Qaiser\"]', '[\"ADDITIONAL HUSSAIN KHAN THORO\",\"ADDITIONAL KATHRI\"]', '12345678', NULL, NULL, NULL, '2024-06-13 03:52:01', '2024-06-13 03:52:01', NULL);

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
(1, '1', 'Badin', '2024-06-11 02:46:01', '2024-06-11 02:46:01', NULL),
(2, '1', 'Dadu', '2024-06-11 02:46:08', '2024-06-11 02:46:08', NULL),
(3, '1', 'Ghotki', '2024-06-11 02:46:14', '2024-06-11 02:46:14', NULL),
(4, '1', 'Hyderabad', '2024-06-11 02:46:20', '2024-06-11 02:46:20', NULL);

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
  `ucs` text DEFAULT NULL,
  `tappas` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_revenue_departments`
--

INSERT INTO `land_revenue_departments` (`id`, `admin_or_user_id`, `full_name`, `contact_number`, `address`, `email_address`, `district`, `tehsil`, `ucs`, `tappas`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Ali Khan', '03112328922', 'hyderabad', 'ali12@gmail.com', 'Hyderabad', 'Hyderabad', '[\"seri\"]', '[\"ADDITIONAL TANDO FAZAL\"]', 'ali12', '12345678', '2024-06-12 06:02:33', '2024-06-12 06:02:33', NULL);

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
(1, '3', '1', 'Ali Khan', 'Eric Lawrence', 'Ginger Higgins', 'Female', 'Nihil enim proident', 'Amet magna numquam', 'Hyderabad', 'Hyderabad', 'seri', 'ADDITIONAL TANDO FAZAL', 'Omnis enim ipsum dol', 'Aperiam blanditiis o', 'Et odio sapiente rep', 'Consequatur eveniet', 'Voluptate labore eaq', 'Nulla dignissimos ul', 'Dolore consequatur e', 'Aut excepturi amet', 'Est quo consequuntur', '789', 'Natus laborum quibus', 'Sed iusto aut velit', 'Itaque voluptate vol', 'Qui blanditiis facer', 'Pariatur Tempora ut', 'Aliquam in quisquam', '04-Nov-1976', '05-Jul-1996', 'At consequatur Esse', 'Aperiam hic hic beat', '72', 'Rerum fuga Quasi qu', 'At consequatur Esse', 'Facere animi laboru', 'Qui enim esse velit', '06-Oct-2020', 'Sunt consequatur c', 'Hayfa Rowland', 'Ipsum dicta eos qui', 'Nihil deserunt ad ip', '771', 'Ullam aliquam elit', 'Consequatur accusan', NULL, NULL, NULL, NULL, NULL, NULL, 'Unverified', NULL, NULL, '2024-06-14 01:53:19', '2024-06-14 01:53:19', NULL);

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
(12, '2024_06_06_063724_create_land_revenue_farmer_registations_table', 8),
(13, '2024_06_10_113505_create_u_c_s_table', 9),
(14, '2024_06_10_133347_create_agri_users_table', 10),
(15, '2024_06_13_090513_create_agriculture_user_farmer_registrations_table', 11);

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
(1, '1', 'Dadu', 'Mehar', 'A GIRKAN-II', '2024-06-11 03:00:51', '2024-06-11 03:00:51', NULL),
(2, '1', 'Dadu', 'Mehar', 'A-BOTHRO-I', '2024-06-11 03:01:11', '2024-06-11 03:01:11', NULL),
(3, '1', 'Dadu', 'Mehar', 'A-BOTHRO-II', '2024-06-11 03:01:28', '2024-06-11 03:01:28', NULL),
(4, '1', 'Dadu', 'Mehar', 'A-FARIDABAD', '2024-06-11 03:01:55', '2024-06-11 03:01:55', NULL),
(5, '1', 'Dadu', 'Mehar', 'A-GAHI MAHESAR', '2024-06-11 03:02:05', '2024-06-11 03:02:05', NULL),
(6, '1', 'Badin', 'Matli', 'ADDITIONAL AGHAMANO', '2024-06-11 03:04:05', '2024-06-11 03:04:05', NULL),
(7, '1', 'Badin', 'Matli', 'ADDITIONAL ARAIN', '2024-06-11 03:04:16', '2024-06-11 03:04:16', NULL),
(8, '1', 'Badin', 'Matli', 'ADDITIONAL DASTI', '2024-06-11 03:04:32', '2024-06-11 03:04:32', NULL),
(9, '1', 'Badin', 'Matli', 'ADDITIONAL GUJO', '2024-06-11 03:04:43', '2024-06-11 03:04:43', NULL),
(10, '1', 'Hyderabad', 'Hyderabad', 'ADDITIONAL HUSSAIN KHAN THORO', '2024-06-11 03:05:29', '2024-06-11 03:05:29', NULL),
(11, '1', 'Hyderabad', 'Hyderabad', 'ADDITIONAL KATHRI', '2024-06-11 03:08:10', '2024-06-11 03:08:10', NULL),
(12, '1', 'Hyderabad', 'Hyderabad', 'ADDITIONAL TANDO FAZAL', '2024-06-11 03:09:18', '2024-06-11 03:09:18', NULL);

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
(1, '1', 'Badin', 'Badin', '2024-06-11 02:48:51', '2024-06-11 02:48:51', NULL),
(2, '1', 'Badin', 'Khoski', '2024-06-11 02:49:00', '2024-06-11 02:49:00', NULL),
(3, '1', 'Badin', 'Matli', '2024-06-11 02:49:13', '2024-06-11 02:49:13', NULL),
(4, '1', 'Badin', 'Shaheed Fazil Rahu', '2024-06-11 02:49:22', '2024-06-11 02:49:22', NULL),
(5, '1', 'Badin', 'Talhar', '2024-06-11 02:49:33', '2024-06-11 02:49:33', NULL),
(6, '1', 'Dadu', 'Dadu', '2024-06-11 02:49:50', '2024-06-11 02:49:50', NULL),
(7, '1', 'Dadu', 'Johi', '2024-06-11 02:50:04', '2024-06-11 02:50:04', NULL),
(8, '1', 'Dadu', 'Khairpur Nathan Shah', '2024-06-11 02:50:19', '2024-06-11 02:50:19', NULL),
(9, '1', 'Dadu', 'Mehar', '2024-06-11 02:50:33', '2024-06-11 02:50:33', NULL),
(10, '1', 'Ghotki', 'Daharki', '2024-06-11 02:50:48', '2024-06-11 02:50:48', NULL),
(11, '1', 'Ghotki', 'Ghotki', '2024-06-11 02:51:04', '2024-06-11 02:51:04', NULL),
(12, '1', 'Ghotki', 'Khangarh', '2024-06-11 02:51:48', '2024-06-11 02:51:48', NULL),
(13, '1', 'Hyderabad', 'Hyderabad City', '2024-06-11 02:52:04', '2024-06-11 02:52:04', NULL),
(14, '1', 'Hyderabad', 'Hyderabad', '2024-06-11 02:52:12', '2024-06-11 02:52:12', NULL),
(15, '1', 'Hyderabad', 'Latifabad', '2024-06-11 02:52:25', '2024-06-11 02:52:25', NULL),
(16, '1', 'Hyderabad', 'Qasimabad', '2024-06-11 02:52:38', '2024-06-11 02:52:38', NULL);

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
  `ucs` text DEFAULT NULL,
  `tappas` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `email_verified_at`, `usertype`, `password`, `district`, `tehsil`, `ucs`, `tappas`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@gmail.com', NULL, 'admin', '$2y$12$EgC2oRPY5VrpjA4OzGr0ROfNmBcez9kboAw721dIEEHF1ZP8kdgNS', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '1', 'kashan Shaikh', 'shaikhkashan670@gmail.com', NULL, 'Agriculture_Officer', '$2y$12$TRRPxWwgOSwv.S6bg3OzH.y2MkbsRalTjgbjqYlFfRJZicf3FpK/a', 'Hyderabad', 'Hyderabad', '[\"seri\",\"Tando Qaiser\"]', '[\"ADDITIONAL HUSSAIN KHAN THORO\",\"ADDITIONAL TANDO FAZAL\"]', NULL, '2024-06-12 05:06:46', '2024-06-12 05:06:46'),
(3, '1', 'Ali Khan', 'ali12@gmail.com', NULL, 'Land_Revenue_Officer', '$2y$12$om48ENpbIIR2.blsJJFv..ueF9HGgGqyk.zEQt0n9HYBMEGH16G/i', 'Hyderabad', 'Hyderabad', '[\"seri\"]', '[\"ADDITIONAL TANDO FAZAL\"]', NULL, '2024-06-12 06:02:33', '2024-06-12 06:02:33'),
(5, '1', 'Umar Khan', 'umar12@gmail.com', NULL, 'Agriculture_User', '$2y$12$PQVg0knEEJYLaAg8x2/L3OGdfpoUJEl1DOL6UfoTDlasG3M90VnAS', 'Hyderabad', 'Hyderabad', '[\"seri\",\"Tando Qaiser\"]', '[\"ADDITIONAL HUSSAIN KHAN THORO\",\"ADDITIONAL KATHRI\"]', NULL, '2024-06-13 03:52:01', '2024-06-13 03:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `u_c_s`
--

CREATE TABLE `u_c_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `tehsil` text DEFAULT NULL,
  `uc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `u_c_s`
--

INSERT INTO `u_c_s` (`id`, `admin_or_user_id`, `district`, `tehsil`, `uc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Hyderabad', 'Qasimabad', 'Qasimabad UC-1', '2024-06-11 03:15:05', '2024-06-11 03:15:05', NULL),
(2, '1', 'Hyderabad', 'Qasimabad', 'Qasimabad UC-4', '2024-06-11 03:18:32', '2024-06-11 03:18:32', NULL),
(3, '1', 'Hyderabad', 'Qasimabad', 'Shah Bukhari Old', '2024-06-11 03:19:52', '2024-06-11 03:19:52', NULL),
(4, '1', 'Hyderabad', 'Hyderabad', 'seri', '2024-06-11 03:20:48', '2024-06-11 03:20:48', NULL),
(5, '1', 'Hyderabad', 'Hyderabad', 'Tando Qaiser', '2024-06-11 03:20:59', '2024-06-11 03:20:59', NULL);

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
-- Indexes for table `agriculture_user_farmer_registrations`
--
ALTER TABLE `agriculture_user_farmer_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agri_users`
--
ALTER TABLE `agri_users`
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
-- Indexes for table `u_c_s`
--
ALTER TABLE `u_c_s`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agriculture_farmers_registrations`
--
ALTER TABLE `agriculture_farmers_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agriculture_officers`
--
ALTER TABLE `agriculture_officers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agriculture_user_farmer_registrations`
--
ALTER TABLE `agriculture_user_farmer_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agri_users`
--
ALTER TABLE `agri_users`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `land_revenue_farmer_registations`
--
ALTER TABLE `land_revenue_farmer_registations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tappas`
--
ALTER TABLE `tappas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tehsils`
--
ALTER TABLE `tehsils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `u_c_s`
--
ALTER TABLE `u_c_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
