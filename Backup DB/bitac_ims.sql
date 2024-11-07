-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2024 at 04:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitac_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_head` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `branch_name`, `short_name`, `branch_address`, `branch_head`, `contact_no`, `email_address`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BR0001', 'Bangladesh Industrial Technical Assistance Centre,Dhaka.', 'BITAC, Dhaka', '116(KHA), Tejgaon Industrial Area, Dhaka-1208', NULL, '01855996632', NULL, NULL, NULL, NULL, '2023-05-19 18:35:34', NULL),
(2, 'BR0002', 'Bangladesh Industrial Technical Assistance Centre,Chattogram', 'BITAC, Chattogram', 'Sagorika Road, Pahartoli, Chittagong-4219', NULL, '', NULL, NULL, NULL, '2023-05-19 18:15:00', '2023-05-19 18:15:00', '2023-05-20 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_code`, `brand_name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BR0001', 'Default Brand', 'Description of Default Brand', NULL, 1, '2022-12-07 11:34:57', '2023-06-06 10:16:06', NULL),
(2, 'BR0002', 'Bashundhara', 'Description of Best Brand of Bangladesh The Bashundhara', NULL, 1, '2022-12-28 09:35:43', '2023-06-06 10:14:11', NULL),
(3, 'BR0003', 'Akij', 'Description of AKIJ Company Brand', 1, 1, '2023-06-06 10:15:38', '2023-06-06 10:16:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `card_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `section_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `card_code`, `card_name`, `branch_id`, `section_id`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'CC0001', 'Design Section Card', 1, 1, 'Description of Design Section Card', NULL, 1, NULL, '2023-06-06 08:47:44', NULL),
(2, 2, 'CC0002', 'Plastic Section Card', 1, 2, 'Description of Plastic Section Card', NULL, 1, '2023-05-29 19:20:13', '2023-06-06 08:48:33', NULL),
(3, 3, 'CC0003', 'PC Shop Card', 1, 3, 'Description of PC Shop Card', 1, NULL, '2023-06-06 08:49:20', '2023-06-06 08:49:20', NULL),
(4, 4, 'CC0004', 'Foundry Section Card', 1, 4, 'Description of Foundry Section Card', 1, NULL, '2023-06-06 08:50:05', '2023-06-06 08:50:05', NULL),
(5, 5, 'CC0005', 'Machine Shop Card', 1, 5, 'Description of Machine Shop Card', 1, NULL, '2023-06-06 08:50:51', '2023-06-18 11:11:27', '2023-06-18 11:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `challans`
--

CREATE TABLE `challans` (
  `id` bigint UNSIGNED NOT NULL,
  `requisition_id` bigint NOT NULL,
  `branch_id` bigint NOT NULL,
  `challan_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challan_date` date NOT NULL,
  `delivery_man` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_place` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` int DEFAULT NULL,
  `party_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `warehouse_id` int NOT NULL,
  `receive_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challans`
--

INSERT INTO `challans` (`id`, `requisition_id`, `branch_id`, `challan_code`, `challan_date`, `delivery_man`, `delivery_place`, `job_id`, `party_id`, `section_id`, `warehouse_id`, `receive_by`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'CH0001', '2023-06-10', 'Saad', 'DH', 1, 1, 1, 1, NULL, 'des', 1, NULL, '2023-06-10 07:27:27', '2023-06-10 07:27:27', NULL),
(2, 1, 1, 'CH0002', '2023-06-12', 'Saad', 'DH', 1, 1, 1, 1, NULL, 'des', 1, NULL, '2023-06-12 10:02:14', '2023-06-12 10:02:14', NULL),
(3, 3, 1, 'CH0003', '2023-06-12', 'Saad', 'DH', 2, 2, 1, 1, NULL, NULL, 1, NULL, '2023-06-12 10:38:31', '2023-06-12 10:38:31', NULL),
(4, 4, 1, 'CH0004', '2023-06-15', 'Saad', 'DH', 1, 1, 2, 1, NULL, 'NA', 1, NULL, '2023-06-14 20:19:30', '2023-06-14 20:19:30', NULL),
(5, 5, 1, 'CH0005', '2023-06-17', 'Saad', 'DH', NULL, NULL, 2, 1, NULL, NULL, 1, NULL, '2023-06-17 13:28:02', '2023-06-17 13:28:02', NULL),
(6, 6, 1, 'CH0006', '2023-10-30', 'Md Abu Talib, Technician', 'PC Shop', 3, 2, 3, 1, NULL, 'emergency', 1, NULL, '2023-10-30 10:46:26', '2023-10-30 10:46:26', NULL),
(7, 9, 1, 'CH0007', '2023-11-12', 'Md Abu Talib, Technician', 'PC Shop', NULL, NULL, 1, 1, NULL, 'Urgent', 1, NULL, '2023-11-12 09:04:50', '2023-11-12 09:04:50', NULL),
(8, 10, 1, 'CH0008', '2023-11-12', 'Md Abu Talib, Technician', 'PC Shop', NULL, NULL, 1, 1, NULL, 'Urgent Need for 15/11/2023', 1, NULL, '2023-11-12 10:40:33', '2023-11-12 10:40:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `challan_details`
--

CREATE TABLE `challan_details` (
  `id` bigint UNSIGNED NOT NULL,
  `challan_id` bigint NOT NULL,
  `requisition_id` bigint NOT NULL,
  `requisition_details_id` bigint NOT NULL,
  `branch_id` int NOT NULL,
  `warehouse_id` int NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int NOT NULL,
  `subgroup_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `order_quantity` float NOT NULL,
  `delivered_quantity` float NOT NULL,
  `sale_price` float NOT NULL,
  `total_price` float NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challan_details`
--

INSERT INTO `challan_details` (`id`, `challan_id`, `requisition_id`, `requisition_details_id`, `branch_id`, `warehouse_id`, `item_id`, `group_id`, `subgroup_id`, `unit_id`, `order_quantity`, `delivered_quantity`, `sale_price`, `total_price`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 3, 1, 1, 1, 1, 2, 1, 100, 50, 200, 20000, 1, NULL, '2023-06-10 07:27:27', '2023-06-10 07:27:27', NULL),
(2, 1, 1, 4, 1, 1, 2, 1, 2, 1, 200, 100, 200, 40000, 1, NULL, '2023-06-10 07:27:27', '2023-06-10 07:27:27', NULL),
(3, 2, 1, 4, 1, 1, 2, 1, 2, 1, 200, 80, 200, 16000, 1, NULL, '2023-06-12 10:02:14', '2023-06-12 10:02:14', NULL),
(4, 3, 3, 6, 1, 1, 1, 1, 2, 1, 100, 80, 200, 16000, 1, NULL, '2023-06-12 10:38:31', '2023-06-12 10:38:31', NULL),
(5, 4, 4, 7, 1, 1, 1, 1, 2, 1, 20, 20, 200, 4000, 1, NULL, '2023-06-14 20:19:30', '2023-06-14 20:19:30', NULL),
(6, 4, 4, 9, 1, 1, 3, 1, 2, 1, 35, 35, 150, 5250, 1, NULL, '2023-06-14 20:19:30', '2023-06-14 20:19:30', NULL),
(7, 5, 5, 11, 1, 1, 5, 1, 1, 1, 10, 10, 0, 0, 1, NULL, '2023-06-17 13:28:02', '2023-06-17 13:28:02', NULL),
(8, 8, 10, 20, 1, 1, 550, 4, 302, 1, 5, 5, 0, 0, 1, NULL, '2023-11-12 10:40:33', '2023-11-12 10:40:33', NULL),
(9, 8, 10, 21, 1, 1, 9, 1, 191, 1, 5, 5, 0, 0, 1, NULL, '2023-11-12 10:40:33', '2023-11-12 10:40:33', NULL),
(10, 8, 10, 22, 1, 1, 10, 1, 191, 1, 5, 5, 0, 0, 1, NULL, '2023-11-12 10:40:33', '2023-11-12 10:40:33', NULL),
(11, 8, 10, 23, 1, 1, 438, 8, 242, 1, 5, 5, 0, 0, 1, NULL, '2023-11-12 10:40:33', '2023-11-12 10:40:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `email_address`, `website`, `company_address`, `company_logo`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BinAmeer Accounts', 'binameeracc@gmail.com', 'binameer-account.com', '51/1 ، برج VIP (الطابق 13) ، شارع VIP ، نايا بالتان ، داكا 1000  | 51/1, VIP Tower (13th Floor), VIP Road, Naya Paltan, Dhaka', '/assets/images/logo/logo.png', NULL, NULL, '2022-12-07 11:34:57', '2023-02-25 13:46:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `demageitems`
--

CREATE TABLE `demageitems` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` int NOT NULL,
  `demageitem_code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int UNSIGNED NOT NULL,
  `subgroup_id` int UNSIGNED NOT NULL,
  `warehouse_id` int NOT NULL,
  `quantity` int NOT NULL,
  `demage_by` bigint DEFAULT NULL,
  `demage_authority` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `demage_date` date NOT NULL,
  `status` enum('Pending','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demageitems`
--

INSERT INTO `demageitems` (`id`, `branch_id`, `demageitem_code`, `item_id`, `group_id`, `subgroup_id`, `warehouse_id`, `quantity`, `demage_by`, `demage_authority`, `description`, `demage_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'DI0001', 1, 1, 2, 1, 1, 2, 3, NULL, '2023-06-21', 'Approved', 1, NULL, '2023-06-20 18:29:20', '2023-06-20 20:03:25', NULL),
(2, 1, 'DI0002', 1, 1, 2, 1, 2, 2, 2, NULL, '2023-06-21', 'Pending', 1, NULL, '2023-06-20 20:05:02', '2023-06-20 20:05:02', NULL),
(3, 1, 'DI0003', 6, 9, 35, 1, 0, 2, 2, NULL, '2024-01-23', 'Approved', 1, NULL, '2024-01-23 09:03:27', '2024-01-23 09:20:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `designation_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_code`, `designation_name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DC0001', 'Director General', 'Description of Director General', 0, 1, '2023-05-29 19:33:51', '2023-10-16 12:18:04', NULL),
(3, 'DC0002', 'Director', 'Description of Director', 1, 1, '2023-06-06 09:20:12', '2023-10-16 12:19:25', NULL),
(4, 'DC0003', 'Additional Director', 'Description of Additional Director', 1, 1, '2023-06-06 09:29:35', '2023-10-18 15:11:29', NULL),
(5, 'DC0004', 'Senior System Analyst', 'Description of Senior System Analyst', 1, 1, '2023-06-06 09:31:19', '2023-10-18 15:12:19', NULL),
(6, 'DC0005', 'Executive Engineer', 'Description of Executive Engineer', 1, 1, '2023-07-23 12:56:53', '2023-10-18 15:12:57', NULL),
(7, 'DC0006', 'System Analyst', 'Description of System Analyst', 1, 1, '2023-10-16 12:21:08', '2023-10-18 15:13:51', NULL),
(8, 'DC0007', 'BITAC Secretary', 'Description of BITAC Secretary', 1, 1, '2023-10-16 12:21:23', '2023-10-18 15:14:21', NULL),
(9, 'DC0008', '33', 'Description of Engineer', 1, 1, '2023-10-16 12:21:40', '2023-10-16 12:25:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint UNSIGNED NOT NULL,
  `group_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(164) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_numeric_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_code`, `group_name`, `group_numeric_name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GR0001', 'AUTO', '1', 'Description of Auto Parts Group', NULL, 1, '2022-12-07 11:34:57', '2023-10-18 09:30:21', NULL),
(2, 'GR0002', 'TOOLS', '2', 'Description of Tools Group', NULL, 1, '2022-12-24 22:08:41', '2023-10-18 09:30:38', NULL),
(3, 'GR0003', 'HARDWARE (NUTS & BOLTS)', '3', 'Description of Hardware Group', 1, 1, '2023-06-06 10:46:29', '2023-10-18 09:30:57', NULL),
(4, 'GR0004', 'MISCELLANEOUS', '4', 'Description of Miscellaneous Goods(Cloths & Shoes) Group', 1, 1, '2023-06-06 10:53:26', '2023-10-18 09:33:09', NULL),
(5, 'GR0005', 'ELECTRICAL', '5', 'Description of Electrical Goods Group', 1, 1, '2023-06-06 10:57:44', '2023-10-18 09:32:13', NULL),
(6, 'GR0006', 'RAW MATERIALS', '6', 'Description of Raw Materials Group', 1, 1, '2023-06-06 10:58:58', '2023-10-18 09:33:38', NULL),
(7, 'GR0007', 'OIL & COLORS', '7', 'Description of Oil & Color Group', 1, 1, '2023-06-06 10:59:59', '2023-10-18 09:33:59', NULL),
(8, 'GR0008', 'MECHENARIES', '8', 'Description of Mercenaries Goods Group', 1, 1, '2023-06-06 11:01:30', '2023-10-18 09:34:25', NULL),
(9, 'GR0009', 'SEIP', '9', 'Skills for Employment Investment Program', 1, NULL, '2023-07-18 09:33:45', '2023-07-18 09:33:45', NULL),
(10, 'GR0010', 'TSC', '10', 'Technical School &  College', 1, 1, '2023-07-23 12:30:04', '2023-10-16 13:05:31', NULL),
(11, 'GR0011', 'UNDP', '11', 'United Nations Development Programme', 1, 1, '2023-10-18 09:39:30', '2023-10-18 09:40:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groupvolumes`
--

CREATE TABLE `groupvolumes` (
  `id` bigint UNSIGNED NOT NULL,
  `groupvolume_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int UNSIGNED NOT NULL,
  `groupvolume_name` varchar(164) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groupvolumes`
--

INSERT INTO `groupvolumes` (`id`, `groupvolume_code`, `group_id`, `groupvolume_name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GV0001', 1, '1', 'Description of different volumes of this group', NULL, 1, '2022-12-07 11:34:57', '2023-06-07 13:53:39', NULL),
(2, 'GV0002', 1, '1/KA', 'NA', NULL, 1, '2022-12-24 22:08:41', '2023-06-07 13:54:53', NULL),
(34, 'GV0003', 1, '1/KHA', 'NA', 1, NULL, '2023-06-07 13:55:33', '2023-06-07 13:55:33', NULL),
(35, 'GV0004', 1, '1/GA', 'NA', 1, 1, '2023-06-07 14:10:49', '2023-06-07 14:23:37', NULL),
(36, 'GV0005', 1, '1/GHA', 'NA', 1, NULL, '2023-06-07 14:23:58', '2023-06-07 14:23:58', NULL),
(37, 'GV0006', 9, 'SEIP', 'The main book', 1, NULL, '2023-07-18 09:35:25', '2023-07-18 09:35:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inspectors`
--

CREATE TABLE `inspectors` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint NOT NULL,
  `section_id` bigint NOT NULL,
  `inspector_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inspector_name` varchar(164) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inspectors`
--

INSERT INTO `inspectors` (`id`, `branch_id`, `section_id`, `inspector_code`, `inspector_name`, `address`, `contact_person`, `contact_no`, `email`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'IN0001', 'Default Inspector', 'NA', 'BITAC Dhaka', 'NA', 'NA', NULL, NULL, 1, '2023-05-28 17:26:50', '2023-06-06 15:11:21', NULL),
(2, 1, 1, 'IN0002', 'Komol Mia', 'NA', 'NA', '01834274598', 'komol@gmail.com', NULL, 1, 1, '2023-05-31 18:44:25', '2023-06-06 15:27:20', NULL),
(3, 1, 2, 'IN0003', 'Rahat Uddin', 'NA', 'NA', '01287645444', 'rahat@gmail.com', NULL, 1, NULL, '2023-06-06 15:28:39', '2023-06-06 15:28:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `item_code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(164) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int UNSIGNED NOT NULL,
  `subgroup_id` int UNSIGNED NOT NULL,
  `unit_id` int NOT NULL,
  `manufacturer_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `model_id` int DEFAULT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `sku` text COLLATE utf8mb4_unicode_ci,
  `branch_id` int NOT NULL,
  `room_id` bigint DEFAULT NULL,
  `rack_id` bigint DEFAULT NULL,
  `shelf_id` bigint DEFAULT NULL,
  `page_location` int DEFAULT NULL,
  `volume_location` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_code`, `item_name`, `group_id`, `subgroup_id`, `unit_id`, `manufacturer_id`, `brand_id`, `model_id`, `purchase_price`, `cost_price`, `sale_price`, `sku`, `branch_id`, `room_id`, `rack_id`, `shelf_id`, `page_location`, `volume_location`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '834', 'Ball Bearing No-3305/3302/3306', 1, 2, 1, 1, 1, 1, 100.00, 100.00, 200.00, 'sku', 1, 1, 1, 1, 450, '1/GA', 'NA', NULL, 1, '2023-05-23 11:09:54', '2023-07-18 10:26:54', '2023-07-18 10:26:54'),
(2, '857', 'Ball Bearing No-6004 ZZ', 1, 2, 1, 1, 1, 1, 100.00, 100.00, 200.00, 'sku', 1, 2, 4, 2, 140, '1/GA', 'NA', 1, 1, '2023-06-01 20:34:00', '2023-07-18 10:27:01', '2023-07-18 10:27:01'),
(3, '858', 'Ball Bearing No-6005', 1, 2, 1, 1, 1, 1, 100.00, 120.00, 150.00, 'NA', 1, 1, 1, 1, 120, '1/GA', 'NA', 1, 1, '2023-06-06 12:51:29', '2023-07-18 10:27:07', '2023-07-18 10:27:07'),
(4, '869', 'Ball Bearing No-6008ZZ, 6009ZZ', 1, 2, 1, 1, 1, 1, 700.00, 750.00, 780.00, 'NA', 1, 1, 1, 1, 700, '1/GA', 'NA', 1, 1, '2023-06-06 13:09:12', '2023-07-18 10:27:12', '2023-07-18 10:27:12'),
(5, 'IP0005', '1111', 1, 1, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-06-14 11:35:04', '2023-07-18 10:27:17', '2023-07-18 10:27:17'),
(6, 'SEIP-1', '[ Vortics Marine Electrode 4 mm ]', 9, 35, 5, NULL, NULL, NULL, 214.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, 1, '2023-07-18 10:01:47', '2023-10-17 08:18:50', NULL),
(7, 'SEIP-2', 'Vortics Marine Electrode 3.2 mm', 9, 35, 5, NULL, NULL, NULL, 187.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 2, NULL, 'NA', 1, NULL, '2023-07-18 10:30:35', '2023-07-18 10:30:35', NULL),
(8, '1/1', 'Idolar Arm', 1, 191, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, 1, '2023-07-19 08:44:48', '2023-10-26 08:03:56', NULL),
(9, '1/2', 'Arm Kit', 1, 191, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, 1, '2023-07-19 08:53:15', '2023-10-26 08:04:37', NULL),
(10, '1/3', 'Arm Rocker', 1, 191, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, 1, '2023-07-19 08:54:41', '2023-10-26 08:05:00', NULL),
(11, '1/4', 'Arm Staring', 1, 191, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, 1, '2023-07-19 08:55:46', '2023-10-26 08:05:18', NULL),
(12, '1/5', 'Arm Pitman', 1, 191, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, 1, '2023-07-19 08:57:56', '2023-10-26 08:05:37', NULL),
(13, 'SEIP-3', 'Vortics Marine Electrode 2.5 mm', 9, 35, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, NULL, '2023-07-19 09:08:24', '2023-07-19 09:08:24', NULL),
(14, 'SEIP-4', 'MS Plate 1/2\'\' (12mm) Thick', 9, 36, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, 1, '2023-07-19 09:43:00', '2023-07-19 09:47:13', NULL),
(15, 'SEIP-5', 'MS Plate 1/4\'\'  (6mm) Thick', 9, 36, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, NULL, '2023-07-19 09:46:53', '2023-07-19 09:46:53', NULL),
(16, 'Tool-1', 'Agor Scrow 1/4\'\'', 2, 39, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, NULL, '2023-07-19 09:57:19', '2023-07-26 09:23:29', '2023-07-26 09:23:29'),
(17, 'Tool-2', 'Agor Scrow 3/8\'\'', 2, 39, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, NULL, '2023-07-19 09:58:45', '2023-07-26 09:23:35', '2023-07-26 09:23:35'),
(18, 'Tool-3', 'Agor Scrow 1/2\'\'', 2, 39, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, NULL, '2023-07-19 10:03:10', '2023-07-26 09:23:43', '2023-07-26 09:23:43'),
(19, 'Tool-4', 'Agor Scrow 5/8\'\'', 2, 39, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, 1, '2023-07-19 10:09:18', '2023-07-26 09:23:53', '2023-07-26 09:23:53'),
(20, 'Tool-5', 'Agor Scrow 3/4\'\'', 2, 39, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, 'NA', 1, NULL, '2023-07-19 10:14:13', '2023-07-26 09:23:59', '2023-07-26 09:23:59'),
(21, 'SEIP-6', 'M.S plate- 4\'x8\'x8 m.m.', 9, 36, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-23 09:33:45', '2023-07-23 09:33:45', NULL),
(22, 'SEIP-7', 'M.S Rod,dia- 1/2\" (12m.m.)', 9, 41, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-23 09:41:28', '2023-07-23 09:41:28', NULL),
(23, 'SEIP-8', 'M.S. Shaft,Dia- 1-1/2\"', 9, 41, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-23 09:43:43', '2023-07-23 09:43:43', NULL),
(24, 'SEIP-9', 'M.S. Shaft,Dia- 2\"', 9, 41, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-23 09:59:19', '2023-07-23 09:59:19', NULL),
(25, 'SEIP-10', 'SEIP Apron', 9, 42, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-23 10:05:44', '2023-11-12 09:43:25', NULL),
(26, 'SEIP-11', 'M.S. Angle- 1-1/2\"x1-1/2\"x5 m.m.', 9, 43, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-23 10:12:32', '2023-07-23 10:12:32', NULL),
(27, 'SEIP-12', '\'\'J\'\'  hook', 9, 44, 1, NULL, NULL, NULL, 20.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-23 10:34:24', '2023-07-23 10:48:21', NULL),
(28, 'SEIP-13', 'Garjon wood', 9, 45, 16, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-23 12:09:23', '2023-07-23 12:09:23', NULL),
(29, 'SEIP-14', 'M.S Angle- 2\"x2\"x6 m.m.', 9, 43, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-23 12:11:19', '2023-07-23 12:11:19', NULL),
(30, 'SEIP-15', 'M.S Flat bar- 1.5\"x4 m.m.', 9, 46, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-23 12:56:25', '2023-07-23 12:56:25', NULL),
(31, 'SEIP-16', 'Table Vice- 6\"', 9, 49, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-24 07:37:02', '2023-07-24 07:37:02', NULL),
(32, 'SEIP-17', 'Leather hand gloves', 9, 50, 17, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-24 07:44:51', '2023-07-24 07:44:51', NULL),
(33, 'SEIP-18', 'Grinding wheel- 100x6x16 m.m.', 9, 51, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-24 07:50:53', '2023-07-24 07:50:53', NULL),
(34, 'SEIP-19', 'M.S.Fillar Metal- 3 m.m.', 9, 52, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-24 07:54:20', '2023-07-24 07:54:20', NULL),
(35, 'SEIP-20', 'M.S.Fillar Metal- 2 m.m.', 9, 52, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-24 07:56:00', '2023-07-24 07:56:00', NULL),
(36, 'SEIP-21', 'M.S, Sheet- 4\'x8\'x3 m.m.', 9, 36, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-24 08:24:52', '2023-07-24 08:24:52', NULL),
(37, 'TSCG-1', 'Training Manual', 10, 53, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 07:15:25', '2023-07-25 07:15:25', NULL),
(38, 'TSCG-2', 'Training bag', 10, 54, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 07:23:34', '2023-07-25 07:23:34', NULL),
(39, 'TSCG-3', 'Plastic Folder', 10, 55, 8, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 07:26:54', '2023-07-25 07:26:54', NULL),
(40, 'TSCG-4', 'Pad', 10, 56, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 07:29:21', '2023-07-25 07:29:21', NULL),
(41, 'TSCG-5', 'Ball pen', 10, 57, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 07:31:57', '2023-07-25 07:31:57', NULL),
(42, 'TSCG-6', 'Granding Wheel (Surface)- 8\"x1.25\"x0.5\"', 10, 58, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 07:34:34', '2023-07-25 07:34:34', NULL),
(43, 'TSCG-7', 'Granding Wheel (Out side)- 10\"x3\"x1\"/ 8\"x1.25\"x0.5\"', 10, 59, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 08:02:43', '2023-07-25 08:16:04', NULL),
(44, 'TSCG-8', 'Granding Wheel (Internal)- Ø 25 m.m. /shank- 6 m.m./ 76 m.m.', 10, 60, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 08:18:07', '2023-07-25 08:18:07', NULL),
(45, 'TSCG-9', 'Dimond Wheel dreaser', 10, 61, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 08:21:41', '2023-07-25 08:21:41', NULL),
(46, 'TSCG-10', 'Dish Wheel', 10, 62, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 08:24:36', '2023-07-25 08:24:36', NULL),
(47, 'TSCG-11', 'Cup Wheel', 10, 63, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 08:27:23', '2023-07-25 08:27:23', NULL),
(48, 'TSCG-12', 'Thread Gauge', 10, 64, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 08:30:19', '2023-07-25 08:30:19', NULL),
(49, 'TSCG-13', 'Filler gauge', 10, 65, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 08:32:20', '2023-07-25 08:32:20', NULL),
(50, 'TSCG/14', 'Taper gauge', 10, 66, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 08:36:36', '2023-10-30 09:59:41', NULL),
(51, 'TSCG/15', 'Radius gauge', 10, 67, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 08:44:02', '2023-10-30 10:01:29', NULL),
(52, 'TSCG/16', 'White bit- 1/2\"x1/2\"x100 m.m. (HSS)', 10, 68, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 08:47:03', '2023-10-30 10:03:57', NULL),
(53, 'TSCG/17', 'MS plate- 10 m.m. Thick', 10, 69, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 08:49:31', '2023-10-30 10:06:07', NULL),
(54, 'TSCG/18', 'Hand grinding Machine', 10, 70, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 08:57:37', '2023-10-30 10:08:54', NULL),
(55, 'TSCG/19', 'Hand grinding wheel', 10, 71, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 09:55:25', '2023-10-30 10:11:16', NULL),
(56, 'TSCG/20', 'Flexible cabble (Multi core)', 10, 73, 18, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 09:58:54', '2023-10-30 10:13:12', NULL),
(57, 'TSCG/21', 'Megnatic contuctor', 10, 74, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:03:16', '2023-10-30 10:15:03', NULL),
(58, 'TSCG/22', 'Thirmal Overload Relay', 10, 75, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:06:36', '2023-10-30 10:17:34', NULL),
(59, 'TSCG/23', 'Timer with base', 10, 76, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:08:42', '2023-10-30 10:23:43', NULL),
(60, 'TSCG/24', 'Emergency stop switch', 10, 77, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:10:46', '2023-10-30 10:26:53', NULL),
(61, 'TSCG/25', 'Indicator lamp', 10, 78, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:14:01', '2023-10-30 10:28:59', NULL),
(62, 'TSCG/26', 'insulation paper', 10, 79, 15, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:17:22', '2023-10-30 10:30:47', NULL),
(63, 'TSCG/27', 'Ampear tube', 10, 80, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:20:08', '2023-10-30 10:33:12', NULL),
(64, 'TSCG/28', 'Cotton tape', 10, 81, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:23:00', '2023-10-30 10:35:16', NULL),
(65, 'TSCG/29', 'H T Thiner', 10, 82, 3, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:24:58', '2023-10-30 10:37:22', NULL),
(66, 'TSCG/30', 'Pully pullar', 10, 83, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:27:01', '2023-10-30 10:40:00', NULL),
(67, 'TSCG/31', 'Ball Valb', 10, 84, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:30:22', '2023-10-30 10:45:05', NULL),
(68, 'TSCG/32', 'Current transformer (C.T)', 10, 85, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:32:28', '2023-10-30 10:48:05', NULL),
(69, 'TSCG/33', 'Over current Relay', 10, 86, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:35:08', '2023-10-30 12:03:49', NULL),
(70, 'TSCG/34', 'Power factor currection', 10, 87, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:39:36', '2023-10-30 12:06:45', NULL),
(71, 'TSCG-35', '3 Wire PT 100 RTD', 10, 88, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-25 10:46:16', '2023-07-25 10:46:16', NULL),
(72, 'TSCG-36', '2 Wire K Type Thermocouple Sensor', 10, 290, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 10:54:35', '2023-10-31 07:23:21', NULL),
(73, '1/6', 'Armachar  Genarator', 1, 91, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 11:45:49', '2023-10-18 12:05:30', NULL),
(74, '1/7', 'Armachar  DAYNAMO', 1, 92, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 11:48:40', '2023-10-18 12:05:56', NULL),
(75, '1/8', 'Center Arm', 1, 94, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 11:53:25', '2023-10-18 12:06:21', NULL),
(76, '1/9', 'Arm  Wayper', 1, 93, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 11:59:42', '2023-10-18 12:07:20', NULL),
(77, '1/10', 'Main  Arm / Cannecting  Arm', 1, 95, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 12:20:52', '2023-10-18 12:09:10', NULL),
(78, '1/11', 'Armecher  Self  Stater', 1, 96, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 12:23:23', '2023-10-18 12:09:36', NULL),
(79, '1/12', 'Insulater  Positive  post', 1, 97, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 12:25:28', '2023-10-18 12:09:51', NULL),
(80, '1/13', 'Insulater   Bendix/ Insulator complet', 1, 98, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 12:29:08', '2023-10-18 12:10:07', NULL),
(81, '1/14', 'Insulater   spring', 1, 99, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 12:31:08', '2023-10-18 12:10:26', NULL),
(82, '1/15', 'Indicator  Mud gud', 1, 100, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 12:35:59', '2023-10-18 12:10:43', NULL),
(83, '1/16', 'Engine', 1, 101, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 12:40:43', '2023-10-18 12:11:02', NULL),
(84, '1/17', 'Engine Compartment  lead Hinzu', 1, 102, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 12:43:12', '2023-10-18 12:11:25', NULL),
(85, '1/18', 'Window', 1, 103, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-25 12:53:06', '2023-10-18 12:15:48', NULL),
(86, 'Tool-6', 'AGOR Screw- 1/4\'\'', 2, 106, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 07:22:24', '2023-07-26 07:59:15', '2023-07-26 07:59:15'),
(87, 'Tool-7', 'AGOR Screw- 3/8\'\'', 2, 106, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 07:25:51', '2023-07-26 08:01:14', '2023-07-26 08:01:14'),
(88, 'Tool-8', 'AGOR Screw- 1/2\'\'', 2, 106, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 07:31:21', '2023-07-26 08:01:02', '2023-07-26 08:01:02'),
(89, 'Tool-9', 'AGOR Screw- 5/8\'\'', 2, 106, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 07:33:38', '2023-07-26 08:00:51', '2023-07-26 08:00:51'),
(90, 'Tool-10', 'AGOR Screw- 3/4\'\'', 2, 106, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 07:35:50', '2023-07-26 08:00:28', '2023-07-26 08:00:28'),
(91, 'Tool-6', 'AGOR Screw- 1\'\'', 2, 106, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 07:38:09', '2023-07-26 09:09:51', '2023-07-26 09:09:51'),
(92, 'Tool-12', 'AGOR BIT-  1/4\'\'', 2, 107, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 07:40:17', '2023-07-26 07:59:32', '2023-07-26 07:59:32'),
(93, '3/1', 'Al tala-1\'\'', 3, 108, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 09:21:16', '2023-10-19 10:22:27', NULL),
(94, '3/2', 'Al tala- 1-1/2\'\'', 3, 108, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 10:23:21', '2023-10-19 10:22:45', NULL),
(95, '3/3', 'Al tala-2\'\'', 3, 108, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 10:31:42', '2023-10-19 10:23:00', NULL),
(96, '3/4', 'Al tala-3\'\'', 3, 108, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 10:33:45', '2023-10-19 10:23:18', NULL),
(97, '3/5', 'Al tala-4\'\'', 3, 108, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 10:35:50', '2023-10-19 10:23:41', NULL),
(98, '3/6', 'Electrodes bronze,No-8', 3, 109, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 10:40:06', '2023-10-19 10:24:05', NULL),
(99, '3/7', 'Electrodes bronze,No-10', 3, 109, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 10:41:57', '2023-10-19 10:24:34', NULL),
(100, '3/8', 'Electrodes Nickel chrome No-8', 3, 110, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 10:46:32', '2023-10-19 10:24:52', NULL),
(101, '3/9', 'Electrodes arnicon No-10', 3, 111, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 10:49:58', '2023-10-19 10:25:07', NULL),
(102, '3/10', 'Electrodes Stainless steel No-8', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 10:53:58', '2023-10-19 10:25:23', NULL),
(103, '3/11', 'Electrodes Stainless steel,No- 10| 3.2 m.m. (Tankstan)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 11:43:16', '2023-10-19 10:26:01', NULL),
(104, '3/12', 'Electrodes Stainless steel No-12', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 11:45:23', '2023-10-19 10:26:19', NULL),
(105, '3/13', 'Electrodes Stainless steel No-14 (2.4m.m. tankstan)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 11:47:21', '2023-10-19 10:26:37', NULL),
(106, '2/1', 'AGOR Scrow- 1/4\'\'', 2, 133, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-07-26 12:00:00', '2023-10-18 12:13:47', NULL),
(107, 'IP0090', 'Drill Bit .5mm', 2, 107, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-17 09:09:48', '2023-10-18 09:06:21', '2023-10-18 09:06:21'),
(108, 'SEIP-22', 'Piano switch', 9, 113, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 09:50:43', '2023-10-18 11:21:18', NULL),
(109, 'SEIP/23', 'Piano socket', 9, 114, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 09:56:12', '2023-10-18 11:22:52', NULL),
(110, 'SEIP/24', 'Piano  cut- out', 9, 115, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 10:04:02', '2023-10-18 11:23:18', NULL),
(111, 'SEIP/25', 'Piano  Regulator', 9, 116, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 10:08:55', '2023-10-18 11:23:43', NULL),
(112, 'SEIP/26', 'Two-way piano type', 9, 113, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 10:11:52', '2023-10-18 11:24:02', NULL),
(113, 'SEIP/27', 'Piano push switch', 9, 113, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 10:13:45', '2023-10-18 11:24:25', NULL),
(114, 'SEIP/28', 'Batten holder pin-type', 9, 117, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 10:22:04', '2023-10-18 11:24:55', NULL),
(115, 'SEIP/29', 'Pandent holder', 9, 117, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 10:29:04', '2023-10-18 11:25:15', NULL),
(116, 'SEIP/30', 'Fuse cerimic 10  AMP', 9, 118, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 10:53:08', '2023-10-18 11:25:37', NULL),
(117, 'SEIP/31', 'Calling bell', 9, 119, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 11:59:35', '2023-10-18 11:26:11', NULL),
(118, 'SEIP/32', 'D.V box- L-6', 9, 120, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 12:02:12', '2023-10-18 11:26:55', NULL),
(119, 'SEIP/33', 'Circuit breaker- 10 Ampear', 9, 121, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 12:40:28', '2023-10-18 11:27:30', NULL),
(120, 'SEIP/34', 'Heater coil with base- 1000 wat.', 9, 122, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 12:44:36', '2023-10-18 11:27:54', NULL),
(121, 'SEIP/35', 'Combind socket- 3 pin', 9, 114, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 12:49:50', '2023-10-18 11:28:28', NULL),
(122, 'SEIP/36', 'Combind box', 9, 120, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 12:52:15', '2023-10-18 11:28:58', NULL),
(123, 'SEIP/37', '3-pin plug- 15 Ampear', 9, 123, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 12:54:40', '2023-10-18 11:29:31', NULL),
(124, 'SEIP/38', 'PVC wire -7/22', 9, 124, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 12:57:38', '2023-10-18 11:30:01', NULL),
(125, 'SEIP/39', 'Flaxible wire- 40/76', 9, 124, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 13:00:24', '2023-10-18 11:30:27', NULL),
(126, 'SEIP/40', 'Earthing wire (Green)', 9, 124, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 13:03:03', '2023-10-18 11:30:50', NULL),
(127, 'SEIP/41', 'bulb- 100 wat', 9, 125, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-17 13:08:00', '2023-10-18 11:57:38', NULL),
(128, 'SEIP/42', 'bulb- 60 wat', 9, 125, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 07:09:03', '2023-10-18 11:57:10', NULL),
(129, 'SEIP/43', 'bulb- 40 wat', 9, 125, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 07:12:07', '2023-10-18 11:58:21', NULL),
(130, 'SEIP/44', 'PVC tap (plastic tap)', 9, 127, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 07:14:40', '2023-10-18 11:58:47', NULL),
(131, 'SEIP/45', 'PVC Pipe- 3/4\"', 9, 128, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 07:16:55', '2023-10-18 11:59:19', NULL),
(132, 'SEIP/46', 'PVC Albow- 3/4\"', 9, 129, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 07:18:55', '2023-10-18 11:59:47', NULL),
(133, 'SEIP/47', 'PVC band- 3/4\"', 9, 130, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 07:23:25', '2023-10-18 12:00:29', NULL),
(134, 'SEIP/48', 'PVC joint socket', 9, 130, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 07:26:08', '2023-10-18 12:00:56', NULL),
(135, 'SEIP/49', 'One way circular box- 3/4\"', 9, 120, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 07:32:01', '2023-10-18 12:01:19', NULL),
(136, 'SEIP/50', 'Two way circular box- 3/4\"', 9, 120, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 07:35:48', '2023-10-18 12:01:53', NULL),
(137, '1/19', 'Axjost samefould', 1, 126, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 08:35:38', '2023-10-18 13:43:36', NULL),
(138, '1/20', 'Axel Rear', 1, 105, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 08:52:22', '2023-10-18 13:43:56', NULL),
(139, '1/21', 'Adjuster plug', 1, 132, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 08:54:19', '2023-10-18 13:44:14', NULL),
(140, '1/22', 'Adjuster timing chain', 1, 134, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:01:13', '2023-10-18 13:44:44', NULL),
(141, '2/2', 'AGOR Scrow- 3/8\'\'', 2, 133, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:02:06', '2023-10-18 12:14:24', NULL),
(142, '1/23', 'Adjuster ( Adjustment Screw )/ Advance procer', 1, 134, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:02:57', '2023-10-18 13:45:01', NULL),
(143, '2/3', 'AGOR Scrow- 1/2\'\'', 2, 133, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:14:41', '2023-10-18 12:15:14', NULL),
(144, '2/4', 'AGOR Scrow- 5/8\'\'', 2, 133, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:17:52', '2023-10-18 12:15:39', NULL),
(145, '2/5', 'AGOR Scrow- 3/4\'\'', 2, 133, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:23:13', '2023-10-18 12:17:42', NULL),
(146, '2/6', 'AGOR Scrow- 1\'\'', 2, 133, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:24:45', '2023-10-18 12:22:46', NULL),
(147, '1/24', 'Adjustment  Stearing  Nacal', 1, 136, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:49:02', '2023-10-18 13:45:27', NULL),
(148, '2/7', 'AGOR BIT- 1/4\'\'', 2, 135, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:56:40', '2023-10-18 12:23:35', NULL),
(149, '2/8', 'AGOR BIT-  5/16\'\'', 2, 135, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:58:09', '2023-10-18 12:24:26', NULL),
(150, '2/9', 'AGOR BIT-  3/8\'\'', 2, 135, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 09:59:09', '2023-10-18 12:27:54', NULL),
(151, '2/10', 'AGOR BIT-  1/2\'\'', 2, 135, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:00:29', '2023-10-18 12:28:21', NULL),
(152, '2/11', 'AGOR BIT-  5/8\'\'', 2, 135, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:01:43', '2023-10-18 12:30:58', NULL),
(153, '2/12', 'ARBAR TAPER ShANK (DRILL CHACK ) 2 M.M.', 2, 137, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:05:41', '2023-10-18 12:31:24', NULL),
(154, '2/13', 'Dial Indicator- 0.0001\'\'  Liver type', 2, 138, 1, NULL, NULL, NULL, 6000.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:17:20', '2023-11-02 09:26:15', NULL),
(155, '2/14', 'Dial Indicator- 0.001\"', 2, 138, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:18:51', '2023-10-18 12:32:31', NULL),
(156, '2/15', 'Dial Indicator- 1/1000\'\'', 2, 138, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:20:17', '2023-10-18 12:33:20', NULL),
(157, '1/25', 'Alement  Air Filter', 1, 139, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:21:13', '2023-10-18 13:46:37', NULL),
(158, '2/16', 'DIAL INDICATOR - 1/10000\'\'/0.01 m.m.', 2, 138, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:21:43', '2023-10-18 12:33:49', NULL),
(159, '3/14', 'Electrodes Stainless steel No-16 (1.6m.m. tankstan)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:23:18', '2023-10-19 10:34:39', NULL),
(160, '2/18', 'SPEED INDICATOR', 2, 138, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:24:35', '2023-10-18 12:35:00', NULL),
(161, '1/26', 'Alement  Air  Cleaner', 1, 139, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:25:06', '2023-10-18 13:46:55', NULL),
(162, '1/27', 'Alement  Fuel  Filter', 1, 139, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:26:05', '2023-10-18 13:49:05', NULL),
(163, '2/19', 'Straight EDGE-36\'\'', 2, 140, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:27:24', '2023-10-18 12:35:42', NULL),
(164, '1/28', 'Alement  oil   Filter (Mobil)', 1, 139, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:27:25', '2023-10-18 13:49:23', NULL),
(165, '2/20', 'Straight EDGE - 72\'\'', 2, 140, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:28:47', '2023-10-18 12:36:09', NULL),
(166, '1/29', 'Alement  Brack  Master Sylinder', 1, 141, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:28:47', '2023-10-18 13:49:52', NULL),
(167, '1/30', 'Alement  Wheel  Selinder', 1, 141, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:29:28', '2023-10-18 13:50:16', NULL),
(168, '1/31', 'Antena  (Arial)', 1, 142, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:30:48', '2023-10-18 13:50:35', NULL),
(169, '2/21', 'ExTRACTOR BROCKEN SCREW M-3 M-18', 2, 133, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:32:19', '2023-10-18 12:36:40', NULL),
(170, '1/32', 'Assembly A.C Pump', 1, 143, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:32:20', '2023-10-18 13:50:59', NULL),
(171, '1/33', 'Assembly   N.C  Pump', 1, 143, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:33:11', '2023-10-18 13:51:25', NULL),
(172, '1/34', 'Assembly   Oil  Pump', 1, 143, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:33:42', '2023-10-18 13:51:44', NULL),
(173, '1/35', 'Assembly   water Pump', 1, 143, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:34:14', '2023-10-18 13:52:29', NULL),
(174, '2/22', 'Anvill- 103 kg', 2, 144, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:37:43', '2023-10-18 12:37:10', NULL),
(175, '1/36', 'Assembly   Fuel  Pump', 1, 143, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:39:20', '2023-10-18 13:53:04', NULL),
(176, '2/23', 'Adaptor with colet', 2, 145, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:39:40', '2023-10-18 12:37:47', NULL),
(177, '2/24', 'COLET JIG for GRINDING Machine-1/8x3/8 cate No 1361', 2, 146, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:42:14', '2023-10-18 12:38:29', NULL),
(178, '2/25', 'COLET JIG for GRINDING Machine- 1/8x3/8 cate No 1362', 2, 146, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:43:28', '2023-10-18 13:07:27', NULL),
(179, '2/26', 'JIG clamp M- 10X100 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:46:03', '2023-10-18 13:08:33', NULL),
(180, '1/37', 'Assembly  Shock abjorver', 1, 148, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:46:57', '2023-10-18 13:53:23', NULL),
(181, '1/38', 'Assembly   hand   Break', 1, 148, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:48:42', '2023-10-18 13:53:54', NULL),
(182, '1/39', 'Assembly   Uper  link  rod', 1, 148, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:50:53', '2023-10-18 13:54:14', NULL),
(183, '1/40', 'Assembly   distributer', 1, 149, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:52:34', '2023-10-18 13:54:34', NULL),
(184, '1/41', 'AsSembly  bell crank  Repayer', 1, 150, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:54:05', '2023-10-18 13:54:52', NULL),
(185, '1/42', 'Assembly karborator', 1, 151, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 10:54:55', '2023-10-18 13:55:08', NULL),
(186, '2/27', 'JIG clamp M- 16x26X125 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-18 12:09:41', '2023-10-18 13:34:23', NULL),
(187, '2/28', 'JIG clamp M- 14X110 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:30:41', '2023-10-19 09:43:41', NULL),
(188, '2/29', 'JIG clamp M- 19x32x140 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:33:03', '2023-10-19 09:44:00', NULL),
(189, '2/30', 'PLAIN clamp- 22X44x150 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:34:40', '2023-10-19 09:45:46', NULL),
(190, '2/31', 'PLAIN clamp- 17x52 M.M./Clamping kit', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:37:03', '2023-10-19 09:46:20', NULL),
(191, '2/32', 'PLAIN clamp- 28x54X200 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:38:53', '2023-10-19 09:46:59', NULL),
(192, '2/33', 'PLAIN clamp- 21x70 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:40:48', '2023-10-19 09:47:39', NULL),
(193, '2/34', 'Jet clamp- 22x45x150 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:41:50', '2023-10-19 09:48:16', NULL),
(194, '2/35', 'Jet clamp- 17x43 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:43:22', '2023-10-19 09:49:59', NULL),
(195, '2/36', 'Jet clamp- 28x54x200M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:46:29', '2023-10-19 09:50:50', NULL),
(196, '2/37', 'Jet clamp- 21x62 M.M.', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:48:06', '2023-10-19 09:51:38', NULL),
(197, '2/38', 'TOOLS MAKER Parallal CLAMP-2\'\'', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:51:08', '2023-10-19 09:52:12', NULL),
(198, '2/39', 'TOOLS MAKER Parallal CLAMP-3\'\'', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:53:00', '2023-10-19 09:52:45', NULL),
(199, '2/40', 'TOOLS MAKER Parallal CLAMP-4\'\'', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:56:08', '2023-10-19 09:53:17', NULL),
(200, '2/41', 'Wooden parallel Clamp- 6\"x3\"', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:57:34', '2023-10-19 09:53:59', NULL),
(201, '2/42', 'Wooden parallel Clamp- 10\"x6\"', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 07:59:18', '2023-10-19 09:54:32', NULL),
(202, '2/43', 'Wooden parallel Clamp- 14\'\'x10\'\'', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 08:00:37', '2023-10-19 09:55:32', NULL),
(203, '2/44', 'Wooden parallel Clamp- 18\'\'x14\'\'', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 08:02:23', '2023-10-19 09:56:14', NULL),
(204, '2/45', 'C Clamp- 4\'\'', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 08:05:40', '2023-10-19 09:57:17', NULL),
(205, '2/46', 'C Clamp- 6\'\'', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 08:51:43', '2023-10-19 09:57:50', NULL),
(206, '2/47', 'C Clamp- 8\'\'', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 08:53:21', '2023-10-19 09:58:33', NULL),
(207, '2/48', 'C Clamp- 12\'\'', 2, 147, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 08:54:23', '2023-10-19 09:59:05', NULL),
(208, '2/49', 'In side calipar- 3\'\'', 2, 152, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 08:56:44', '2023-10-19 09:59:38', NULL),
(209, '2/50', 'In side calipar- 6\'\'', 2, 152, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-19 09:08:26', '2023-10-19 10:00:15', NULL),
(210, '3/15', 'Electrodes Stainless steel,10 gauge (Maghna-711)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 10:38:22', '2023-10-19 10:38:22', NULL),
(211, '3/16', 'Electrodes Stainless steel,10 gauge (Maghna-303)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 10:43:15', '2023-10-19 10:43:15', NULL),
(212, '3/17', 'Electrodes Stainless steel,12 gauge (Maghna-711)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 10:45:03', '2023-10-19 10:45:03', NULL),
(213, '3/18', 'Electrodes Cutting - 12 Gauge   (Maghna-150)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 10:46:47', '2023-10-19 10:46:47', NULL),
(214, '3/19', 'Electrodes Cutting - 10 Gauge   (Maghna-150)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 10:47:52', '2023-10-19 10:47:52', NULL),
(215, '3/20', 'Electrodes Cutting - 10 Gauge  (Maghna-770)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:05:06', '2023-10-19 12:05:06', NULL),
(216, '3/21', 'Electrodes- 10 Gauge  (Maghna-710)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:06:50', '2023-10-19 12:06:50', NULL),
(217, '3/22', 'Electrodes- 12 Gauge   (Maghna-303)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:08:43', '2023-10-19 12:08:43', NULL),
(218, '3/23', 'Electrodes- 8 Gauge   (Maghna-770)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:09:52', '2023-10-19 12:09:52', NULL),
(219, '3/24', 'Electrodes-Maghna-904', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:10:53', '2023-10-19 12:10:53', NULL),
(220, '3/25', 'Electrodes Filler Rod- 1/8\"  (2.40 m.m.)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:11:52', '2023-10-19 12:11:52', NULL),
(221, '3/26', '26	Electrodes Filler Rod- 1/16\"', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:14:24', '2023-10-19 12:14:24', NULL),
(222, '3/27', 'Electrodes Copper,No- 10', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:16:58', '2023-10-19 12:16:58', NULL),
(223, '3/28', 'Cust Iron Electrodes,No- 8', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:18:25', '2023-10-19 12:18:25', NULL),
(224, '3/29', 'Cust Iron Electrodes,No-  10   (3.2)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:20:42', '2023-10-19 12:20:42', NULL),
(225, '3/30', 'Cust Iron Electrodes,No-  12', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:56:35', '2023-10-19 12:56:35', NULL),
(226, '3/31', 'Pure Nickel Electrodes (Cust Iron,No-10)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:58:19', '2023-10-19 12:58:19', NULL),
(227, '3/32', 'Ferospeed Electrodes, No- 6', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 12:59:15', '2023-10-19 12:59:15', NULL),
(228, '3/33', 'Ferospeed Electrodes, No- 8', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:00:13', '2023-10-19 13:00:13', NULL),
(229, '3/34', 'Ferospeed Electrodes, No- 10   (Terowloyed DS 3.15)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:01:27', '2023-10-19 13:01:27', NULL),
(230, '3/35', 'Ferospeed Electrodes, No- 12', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:03:10', '2023-10-19 13:03:10', NULL),
(231, '3/36', 'Ferospeed Electrodes, No- 1', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:05:29', '2023-10-19 13:05:29', NULL),
(232, '3/37', 'Ferospeed Electrodes, No- 3', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:07:32', '2023-10-19 13:07:32', NULL),
(233, '3/38', 'Fero Craft Electrodes- 61  No-8/10', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:13:26', '2023-10-19 13:13:26', NULL),
(234, '3/39', 'Heard Craft Electrodes, No- 650 B', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:14:58', '2023-10-19 13:14:58', NULL),
(235, '3/40', 'Electrodes Stody- 21,1/4 Ø', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:16:28', '2023-10-19 13:16:28', NULL),
(236, '3/41', 'Electrods Vortic marine, No- 8 (4 m.m.)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:21:33', '2023-10-19 13:21:33', NULL),
(237, '3/42', 'Electrodes Vortic marine, No- 10 (3.20 m.m.)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:23:30', '2023-10-19 13:23:30', NULL),
(238, '3/43', 'Electrodes Vortic marine, No- 12 (2.5 m.m.)', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:27:49', '2023-10-19 13:27:49', NULL),
(239, '3/44', 'Electrodes Silicon Bronze- 1/16', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:35:43', '2023-10-19 13:35:43', NULL),
(240, '3/45', 'Electrodes Silicon Bronze- 1/8', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:37:16', '2023-10-19 13:37:16', NULL),
(241, '3/46', 'Electrodes Silicon Bronze- 3/16', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:38:33', '2023-10-19 13:38:33', NULL),
(242, '3/47', 'Electrodes manganige bronze- 1/8', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:39:41', '2023-10-19 13:39:41', NULL),
(243, '1/43', 'Assembly   brack   Master   Sylinder', 1, 141, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:39:59', '2023-10-19 13:39:59', NULL),
(244, '3/48', 'Electrodes Aluminium- 1/16, 3.4 m.m.', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:40:40', '2023-10-19 13:40:40', NULL),
(245, '3/49', 'Electrodes Aluminium- 1/8, 5 m.m., 3 m.m., 4m.m.', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:41:36', '2023-10-19 13:41:36', NULL),
(246, '3/50', 'Electrodes Aluminium- 10-18% C', 3, 112, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:42:34', '2023-10-19 13:42:34', NULL),
(247, '1/44', 'Assembly  Clatch  master  sylinder', 1, 141, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-19 13:42:38', '2023-10-19 13:42:38', NULL),
(248, '4/1', 'Aica ibon', 4, 159, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 07:28:19', '2023-10-22 07:28:19', NULL),
(249, '4/2', 'wood Aica', 4, 159, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:07:12', '2023-10-22 09:07:12', NULL),
(250, '4/3', 'Alkattra', 4, 161, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:12:18', '2023-10-22 09:12:18', NULL),
(251, '4/4', 'Dry  Ice', 4, 162, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:15:29', '2023-10-22 09:15:29', NULL),
(252, '4/5', 'Almari lockar steel 9 kamra size lock,with Lock hook- 6\'x6\'x1-1/2\'', 4, 163, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:21:07', '2023-10-22 09:21:07', NULL),
(253, '4/6', 'Urea  Sar', 4, 164, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:24:24', '2023-10-22 09:24:24', NULL),
(254, '4/7', 'Wool steel- 0', 4, 165, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:27:13', '2023-10-22 09:27:13', NULL),
(255, '4/8', 'Wool steel- 00', 4, 165, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:29:18', '2023-10-22 09:29:18', NULL),
(256, '4/9', 'Wool steel- 000', 4, 165, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:30:38', '2023-10-22 09:30:38', NULL),
(257, '4/10', 'Appron Asbaster', 4, 166, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:32:52', '2023-10-22 09:32:52', NULL),
(258, '4/11', 'Appron Lather', 4, 166, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:34:14', '2023-10-22 09:34:14', NULL),
(259, '4/12', 'Appron Kapor (Cloth)', 4, 166, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:36:49', '2023-10-22 09:36:49', NULL),
(260, '4/13', 'Abonite sheet- 1/8\" poru', 4, 167, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:40:16', '2023-10-22 09:40:16', NULL),
(261, '4/14', 'Abonite sheet- 1/2\" poru', 4, 167, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:41:56', '2023-10-22 09:41:56', NULL);
INSERT INTO `items` (`id`, `item_code`, `item_name`, `group_id`, `subgroup_id`, `unit_id`, `manufacturer_id`, `brand_id`, `model_id`, `purchase_price`, `cost_price`, `sale_price`, `sku`, `branch_id`, `room_id`, `rack_id`, `shelf_id`, `page_location`, `volume_location`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(262, '4/15', 'Abonite sheet- 1-1/4\" poru', 4, 167, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:43:23', '2023-10-22 09:43:23', NULL),
(263, '4/16', 'Abonite sheet- 6 m.m.', 4, 167, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:45:32', '2023-10-22 09:45:32', NULL),
(264, '4/17', 'Abonite Rod Φ - 2\"', 4, 167, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:47:09', '2023-10-22 09:47:09', NULL),
(265, '4/18', 'Abonite Rod Φ - 3\"', 4, 167, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:48:18', '2023-10-22 09:48:18', NULL),
(266, '4/19', 'Abonite Sheet- 1/16\" poru', 4, 167, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 09:51:39', '2023-10-22 09:51:39', NULL),
(267, '4/20', 'Asbastor sheet- 1/8\"-1/4\" poru', 4, 168, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:00:30', '2023-10-22 10:00:30', NULL),
(268, '4/21', 'Arall-Dite', 4, 169, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:03:49', '2023-10-22 10:03:49', NULL),
(269, '4/22', 'Arall-Dite Soliution   (Liquid pest)', 4, 169, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:05:18', '2023-10-22 10:05:18', NULL),
(270, '4/23', 'Amari Corn, No- 0', 4, 170, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:08:32', '2023-10-22 10:08:32', NULL),
(271, '4/24', 'Amari Corn, No- 90', 4, 170, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:18:10', '2023-10-22 10:18:10', NULL),
(272, '4/25', 'Amari Corn, No- 120', 4, 170, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:19:32', '2023-10-22 10:19:32', NULL),
(273, '4/26', 'Amari Cloth No- 00', 4, 170, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:20:36', '2023-10-22 10:20:36', NULL),
(274, '4/27', 'Amari Cloth No- 0', 4, 170, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:21:59', '2023-10-22 10:21:59', NULL),
(275, '4/28', 'Amari cloth No- 1', 4, 171, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:28:43', '2023-10-22 10:28:43', NULL),
(276, '4/29', 'Amari cloth No- 1-1/2', 4, 171, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:30:23', '2023-10-22 10:30:23', NULL),
(277, '4/30', 'Amari cloth No- 2', 4, 171, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:32:14', '2023-10-22 10:32:14', NULL),
(278, '4/31', 'Amari Cloth No- 2-1/2', 4, 171, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:33:36', '2023-10-22 10:33:36', NULL),
(279, '4/32', 'Amari Cloth No- 3\"', 4, 171, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:34:43', '2023-10-22 10:34:43', NULL),
(280, '4/33', 'Amunia Liquid', 4, 172, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:38:37', '2023-10-22 10:38:37', NULL),
(281, '4/34', 'Washer bucket   (Blue Lpmp-ar)', 4, 173, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:41:44', '2023-10-22 10:41:44', NULL),
(282, '4/35', 'Washer PVC', 4, 173, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:43:16', '2023-10-22 10:43:16', NULL),
(283, '4/36', 'Distilled Water/Water Filter', 4, 174, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:46:44', '2023-10-22 10:46:44', NULL),
(284, '4/37', 'Fire Clay/ Lal mati', 4, 175, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:49:43', '2023-10-22 10:49:43', NULL),
(285, '4/38', 'Wooden koyla/wooden dust', 4, 176, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 10:52:53', '2023-10-22 10:52:53', NULL),
(286, '4/39', 'Coal dust ((kacha koylar gura)', 4, 177, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 11:58:16', '2023-10-22 11:58:16', NULL),
(287, '4/40', 'Wood Dust', 4, 178, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:01:05', '2023-10-22 12:01:05', NULL),
(288, '4/41', 'Uniform / Cloth (Full pant And Full-shart 1 Full Pant+1 Full Shart)', 4, 179, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:03:43', '2023-10-22 12:03:43', NULL),
(289, '4/42', 'Cloth Markin', 4, 171, 7, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:05:55', '2023-10-22 12:05:55', NULL),
(290, '4/43', 'Mal Mal Cloth', 4, 180, 7, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:08:59', '2023-10-22 12:08:59', NULL),
(291, '4/44', 'Raxin Cloth', 4, 181, 7, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:11:14', '2023-10-22 12:11:14', NULL),
(292, '4/45', 'Felalin cloth', 4, 182, 7, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:13:38', '2023-10-22 12:13:38', NULL),
(293, '4/46', 'poleister Kapor (porther)/ cap', 4, 183, 7, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:41:57', '2023-10-22 12:41:57', NULL),
(294, '4/47', 'BhelVate kapor/Gavardin Cloth', 4, 184, 7, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:43:47', '2023-10-22 12:43:47', NULL),
(295, '4/48', 'Cover Spindle Rexin', 4, 185, 7, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:46:10', '2023-10-22 12:46:10', NULL),
(296, '4/49', 'Burnur Cap/ Burnur face', 4, 186, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:48:47', '2023-10-22 12:48:47', NULL),
(297, '4/50', 'Furness cover', 4, 187, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:51:01', '2023-10-22 12:51:01', NULL),
(298, '5/1', 'Soldering Iron- 25 Wat', 5, 188, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:56:37', '2023-10-22 12:56:37', NULL),
(299, '5/2', 'Soldering Iron- 30 Wat', 5, 188, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:57:55', '2023-10-22 12:57:55', NULL),
(300, '5/3', 'Soldering Iron- 40 Wat', 5, 188, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 12:58:58', '2023-10-22 12:58:58', NULL),
(301, '5/4', 'Soldering Iron- 45 Wat', 5, 188, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 13:00:20', '2023-10-22 13:00:20', NULL),
(302, '5/5', 'Soldering Iron- 60  Wat', 5, 188, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 13:01:21', '2023-10-22 13:01:21', NULL),
(303, '5/6', 'Soldering Iron- 75  Wat', 5, 188, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 13:02:35', '2023-10-22 13:02:35', NULL),
(304, '5/7', 'Soldering Iron- 100  Wat', 5, 188, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 13:04:07', '2023-10-22 13:04:07', NULL),
(305, '5/8', 'Soldering Iron- 100  Wat Up', 5, 188, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-22 13:05:50', '2023-10-22 13:05:50', NULL),
(306, '5/9', 'Electric Iron- 1200 Wat 220 Volt', 5, 189, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:16:24', '2023-10-25 07:16:24', NULL),
(307, '5/10', 'IC No.TVA 2003/1060', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:21:38', '2023-10-25 07:21:38', NULL),
(308, '5/11', 'IC No.TVA 3177', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:23:16', '2023-10-25 07:23:16', NULL),
(309, '5/12', 'IC No.TVA 741', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:25:46', '2023-10-25 07:25:46', NULL),
(310, '5/13', 'IC No.TVA 836 P', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:27:10', '2023-10-25 07:27:10', NULL),
(311, '5/14', 'IC No.4017/400', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:28:01', '2023-10-25 07:28:01', NULL),
(312, '5/15', 'I.C No. US-66', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:29:07', '2023-10-25 07:29:07', NULL),
(313, '5/16', 'I.C No. 4026', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:30:52', '2023-10-25 07:30:52', NULL),
(314, '5/17', 'I.C No. S.S  339', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:33:05', '2023-10-25 07:33:05', NULL),
(315, '5/18', 'I.C No. 4558 D 7473', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:33:56', '2023-10-25 07:33:56', NULL),
(316, '5/19', 'I.C No. 4046', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:35:23', '2023-10-25 07:35:23', NULL),
(317, '5/20', 'I.C No. 3377', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:36:39', '2023-10-25 07:36:39', NULL),
(318, '5/21', 'I.C No. LA- 3161', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:37:34', '2023-10-25 07:37:34', NULL),
(319, '5/22', 'I.C No. 550', 5, 190, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:38:28', '2023-10-25 07:38:28', NULL),
(320, '5/23', 'Cross Arms/Axtel', 5, 191, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:41:38', '2023-10-25 07:41:38', NULL),
(321, '5/24', 'IRFU (Varities-size-ar)', 5, 192, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:45:48', '2023-10-25 07:45:48', NULL),
(322, '5/25', 'IR (Varities-size-ar)', 5, 193, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:48:37', '2023-10-25 07:48:37', NULL),
(323, '5/26', 'IRF (Varities siae-ar)', 5, 194, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:50:43', '2023-10-25 07:50:43', NULL),
(324, '5/27', 'Al /Trip', 5, 195, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:53:44', '2023-10-25 07:53:44', NULL),
(325, '5/28', 'Insulator Fan-er', 5, 196, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:57:04', '2023-10-25 07:57:04', NULL),
(326, '5/29', 'Insulator for Bussbar-ar Nut bolt', 5, 196, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 07:58:43', '2023-10-25 07:58:43', NULL),
(327, '5/30', '400 shackle Installation- 3\" inch.', 5, 197, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:03:12', '2023-10-25 08:03:12', NULL),
(328, '5/31', 'Insulators stay', 5, 198, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:05:45', '2023-10-25 08:05:45', NULL),
(329, '5/32', 'Infulation-5/8\"x3/8\"', 5, 199, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:08:57', '2023-10-25 08:08:57', NULL),
(330, '5/33', 'LS Invaters SVO 40 IG 5A-2', 5, 200, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:29:15', '2023-10-25 08:29:15', NULL),
(331, '5/34', 'Electrolizer', 5, 201, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:31:15', '2023-10-25 08:31:15', NULL),
(332, '5/35', 'Aliment Iron- 750 Wat', 5, 202, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:34:05', '2023-10-25 08:34:05', NULL),
(333, '5/36', 'Aliment Heating supper heating Farnesh-ar', 5, 202, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:35:51', '2023-10-25 08:35:51', NULL),
(334, '5/37', 'Aliment silicon Carbide', 5, 202, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:37:31', '2023-10-25 08:37:31', NULL),
(335, '5/38', 'Aliment heater-er-1000 Wat (Heater coil)', 5, 202, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:39:02', '2023-10-25 08:39:02', NULL),
(336, '5/39', 'Adaptor/Ogzillari contract', 5, 203, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:41:06', '2023-10-25 08:41:06', NULL),
(337, '5/40', 'Lighting Aristator (Three face)', 5, 204, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:42:56', '2023-10-25 08:42:56', NULL),
(338, '5/41', 'Albow PVC-3/4\"', 5, 205, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:44:38', '2023-10-25 08:44:38', NULL),
(339, '5/42', 'Albow PVC-1\"', 5, 205, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:46:32', '2023-10-25 08:46:32', NULL),
(340, '5/43', 'Albow PVC-1-1/4\"', 5, 205, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:48:20', '2023-10-25 08:48:20', NULL),
(341, '5/44', 'Albow PVC-1-1/2\"', 5, 205, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:49:22', '2023-10-25 08:49:22', NULL),
(342, '5/45', 'Albow PVC-2\"', 5, 205, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:50:34', '2023-10-25 08:50:34', NULL),
(343, '5/46', 'Albow PVC-4\"', 5, 205, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:51:47', '2023-10-25 08:51:47', NULL),
(344, '5/47', 'Albow PVC-6\"', 5, 205, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:52:57', '2023-10-25 08:52:57', NULL),
(345, '5/48', 'Alfee (Eley)/Allarm', 5, 206, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:55:33', '2023-10-25 08:55:33', NULL),
(346, '5/49', 'Aristar class back oxigen', 5, 207, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 08:57:42', '2023-10-25 08:57:42', NULL),
(347, '5/50', 'Aristar class back Acetylene', 5, 207, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 09:00:10', '2023-10-25 09:00:10', NULL),
(348, '6/1', 'Oil hardining non-distroting Alloy tool Steel ground Flat stock (Type-01)1.25x150x600 m.m. Lot No.39', 6, 209, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 09:34:50', '2023-10-25 10:28:36', NULL),
(349, '6/2', 'Oil hardining non-distroting Alloy tool Steel ground Flat stock(Type-01)1.50x150xx600 m.m. Lot No.40', 6, 209, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 09:36:51', '2023-10-25 10:29:55', NULL),
(350, '6/3', 'Oil hardining non-distroting Alloy tool steel ground Flat stock(Type-01)2.00x150x600 m.m. Lot No.41', 6, 209, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 09:38:53', '2023-10-25 10:30:10', NULL),
(351, '6/4', 'Oil hardining non-distroting Alloy tool Steel ground Flat stock(Type-01)2.50x150x600 m.m. Lot No.42', 6, 209, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 09:40:05', '2023-10-25 09:40:05', NULL),
(352, '6/5', 'KE-672 Oil hardining non-distroting Alloy tool Steel (Type-01)300x 12 m.m. Lot No- 1', 6, 209, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 09:53:35', '2023-10-25 10:31:15', NULL),
(353, '6/6', 'KE-672 Oil hardining non-distroting Alloy tool Steel (Type-01)300x 20 m.m. Lot No-2', 6, 209, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 09:55:32', '2023-10-25 10:31:32', NULL),
(354, '6/7', 'KE-672 Oil hardining non-distroting Alloy tool Steel (Type-01)300x 25 m.m. Lot No-3', 6, 209, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 09:56:50', '2023-10-25 10:32:00', NULL),
(355, '6/8', 'KE-672 Oil hardining non-distroting Alloy tool Steel (Type-01)300x 30 m.m. Lot No-4', 6, 209, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 09:58:22', '2023-10-25 10:33:09', NULL),
(356, '6/9', 'KE-672 Oil hardining non-distroting Alloy tool Steel (Type-01)300x 40 m.m. Lot No-5', 6, 209, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 09:59:41', '2023-10-25 10:34:46', NULL),
(357, '6/10', 'KE-672 Oil hardining non-distroting Alloy tool Steel (Type-01)300x 50 m.m. Lot No-6', 6, 209, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 10:00:37', '2023-10-25 10:35:16', NULL),
(358, '6/11', 'Oil hardining Nickel Chromium molybdenum Steel-16m.m.dia, Lot No-15', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 10:13:24', '2023-10-25 10:35:41', NULL),
(359, '6/12', 'Oil hardining Nickel Chromium molybdenum Steel-20m.m.dia,Lot No-16', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 10:15:56', '2023-10-25 10:36:03', NULL),
(360, '6/13', 'Oil hardining Nickel Chromium molybdenum Steel-25m.m.dia,Lot No-18', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 10:18:25', '2023-10-25 10:36:23', NULL),
(361, '6/14', 'Oil hardining Nickel Chromium molybdenum Steel-30m.m.dia,Lot No-19', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 10:20:26', '2023-10-25 10:36:51', NULL),
(362, '6/15', 'Oil hardining Nickel Chromium molybdenum Steel-36m.m.dia,Lot-20', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-25 10:22:39', '2023-10-25 10:29:04', NULL),
(363, '6/16', 'Oil hardining Nickel Chromium molybdenum Steel-40m.m.dia,Lot-17', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 10:38:52', '2023-10-25 10:38:52', NULL),
(364, '6/17', 'Oil hardining Nickel Chromium molybdenum Steel-50m.m.dia,Lot-21', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 10:40:09', '2023-10-25 10:40:09', NULL),
(365, '6/18', 'KE-805,Nickel chrome molybdenum oil hardining Steel (Type-EN-24)6 m.m.dia,lot No-7', 6, 211, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 10:45:24', '2023-10-25 10:45:24', NULL),
(366, '6/19', 'KE-805,Nickel chrom molybdenum oil heardining Steel (Type-EN-24)10 m.m.dia,lot No-8', 6, 211, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 10:47:59', '2023-10-25 10:47:59', NULL),
(367, '6/20', 'KE-805,Nickel chrome molybdenum oil hardining Steel (Type-EN-24)15 m.m. Dia- Lot No-9', 6, 211, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 10:49:42', '2023-10-25 10:49:42', NULL),
(368, '6/21', 'KE-805,Nickel chrome molybdenum oil hardining Steel (Type-EN-24)25 m.m.dia,lot No-10', 6, 211, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 10:50:40', '2023-10-25 10:50:40', NULL),
(369, '6/22', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817, M-40) 45m.m.dia,Lot No-62', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:07:18', '2023-10-25 12:07:18', NULL),
(370, '6/23', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40) 60m.m.dia,Lot No-77', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:09:43', '2023-10-25 12:09:43', NULL),
(371, '6/24', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40) 65m.m.dia,Lot No-64', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:10:55', '2023-10-25 12:10:55', NULL),
(372, '6/25', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40) 70 m.m.dia,Lot No-65', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:11:51', '2023-10-25 12:11:51', NULL),
(373, '6/26', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40)75 m.m.dia,Lot No-66', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:12:55', '2023-10-25 12:12:55', NULL),
(374, '6/27', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (BS 970-817 M 40) 80 m.m.Dia Lot-67', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:13:57', '2023-10-25 12:13:57', NULL),
(375, '6/28', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40) 90 m.m.dia,Lot No-68', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:14:52', '2023-10-25 12:14:52', NULL),
(376, '6/29', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40)100 m.m.dia,Lot No-69', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:16:39', '2023-10-25 12:16:39', NULL),
(377, '6/30', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40)125m.m.dia,Lot No-70', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:18:07', '2023-10-25 12:18:07', NULL),
(378, '6/31', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40)150 m.m.dia,Lot No-71', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:19:30', '2023-10-25 12:19:30', NULL),
(379, '6/32', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40)180 m.m.dia,Lot No-72', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:21:35', '2023-10-25 12:21:35', NULL),
(380, '6/33', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40)200 m.m.dia,Lot No-73', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:22:52', '2023-10-25 12:22:52', NULL),
(381, '6/34', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40) 250 m.m.dia,Lot No-74', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:24:07', '2023-10-25 12:24:07', NULL),
(382, '6/35', 'Oil hardining Nickel chromium molybdenum Steel(EN-24)Round bar (B.S 970-817 M-40) 305 m.m.dia,Lot No-75', 6, 210, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:25:29', '2023-10-25 12:25:29', NULL),
(383, '6/36', 'Aluminium Ingot', 6, 212, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:29:38', '2023-10-25 12:29:38', NULL),
(384, '6/37', 'Copper Ingot', 6, 212, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:31:24', '2023-10-25 12:31:24', NULL),
(385, '6/38', 'Tin Ingot', 6, 212, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:42:39', '2023-10-25 12:42:39', NULL),
(386, '6/39', 'Lead Ingot', 6, 212, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:44:08', '2023-10-25 12:44:08', NULL),
(387, '6/40', 'Gun Metal Ingot', 6, 212, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:45:43', '2023-10-25 12:45:43', NULL),
(388, '7/1', 'Alkatra   (Betumin)', 7, 208, 3, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:45:45', '2023-10-25 12:45:45', NULL),
(389, '6/41', 'Zink Ingot/Zink Felinghs', 6, 212, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:46:44', '2023-10-25 12:46:44', NULL),
(390, '7/2', 'Icemol (Mold code)', 7, 213, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:48:15', '2023-10-25 12:48:15', NULL),
(391, '6/42', 'Nickel Ingot', 6, 212, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:48:32', '2023-10-25 12:48:32', NULL),
(392, '6/43', 'Alumunium  Shaft- 1/2\'\' dia', 6, 214, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:53:43', '2023-10-25 12:53:43', NULL),
(393, '6/44', 'Alumunium  Shaft- 3/4\'\' dia', 6, 214, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:54:44', '2023-10-25 12:54:44', NULL),
(394, '6/45', 'Alumunium  Shaft- 1\'\' dia', 6, 214, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:57:11', '2023-10-25 12:57:11', NULL),
(395, '6/46', 'Alumunium  Shaft- 1-1/4\'\' dia', 6, 214, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:58:13', '2023-10-25 12:58:13', NULL),
(396, '6/47', 'Alumunium  Shaft- 1-1/2\'\' dia/Ø 45 m.m', 6, 214, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 12:59:05', '2023-10-25 12:59:05', NULL),
(397, '6/48', 'Alumunium  Shaft- 2\'\' dia/ø 55 m.m.', 6, 214, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 13:00:00', '2023-10-25 13:00:00', NULL),
(398, '6/49', 'Alumunium  Shaft- 2-3/4\'\' dia', 6, 214, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 13:01:09', '2023-10-25 13:01:09', NULL),
(399, '6/50', 'Alumunium  Shaft- 3-1/2\'\' dia', 6, 214, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 13:02:15', '2023-10-25 13:02:15', NULL),
(400, '8/1', 'Boring bars with morse taper shank, MO- 5x50x1600', 8, 215, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 13:20:13', '2023-10-25 13:20:13', NULL),
(401, '8/2', 'Air condition/ Fridge', 8, 216, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-25 13:31:37', '2023-10-25 13:31:37', NULL),
(402, '8/3', 'Vulb Insert plates with washer for the first stage VK-95-21 Saare for Alup Compresser.', 8, 217, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 07:04:23', '2023-10-26 07:04:23', NULL),
(403, '8/4', 'Vulb Insert plates with washer for 2nd stage VK-75-22 spare for Alup Compresser.', 8, 217, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 07:07:03', '2023-10-26 07:07:03', NULL),
(404, '8/5', 'Piston with pin without Ring for Expholin Air compresser', 8, 217, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 07:10:37', '2023-10-26 07:43:31', NULL),
(405, '8/6', 'More precision Jig boring Machine modle,B-18 (Made in Russia)', 8, 219, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 07:12:20', '2023-10-26 07:42:56', NULL),
(406, '8/7', 'News Brand compound Table Model CPT-250', 8, 220, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 07:36:43', '2023-10-26 07:36:43', NULL),
(407, '8/8', 'Taper turning Attachmant for precission Lathe Machine model SAG-1050 H', 8, 221, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 07:41:54', '2023-10-26 07:41:54', NULL),
(408, '8/9', 'Double forge NR 74 A, with Ventilation Electro motor-3 fase curent 220/340 volts.', 8, 222, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 07:45:11', '2023-10-26 07:45:11', NULL),
(409, '8/10', 'Chimng NR-97, Dimension-1000x1800 m.m.', 8, 223, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 07:50:09', '2023-10-26 07:50:09', NULL),
(410, '8/11', 'Vertical Boring and turning mills including standred and special Accessories ,Model- 1512(signal colum)', 8, 224, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 07:53:03', '2023-10-26 07:53:03', NULL),
(411, '8/12', 'Switch Demagnasiser P/no 452-4375-03 for BPH-300 grinder', 8, 225, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 07:54:52', '2023-10-26 07:54:52', NULL),
(412, '8/13', 'Precision End Reamers eat No-1 JR', 8, 226, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 07:58:39', '2023-10-26 07:58:39', NULL),
(413, '8/14', 'Cathode Rod moving gear for single Rod tank', 8, 227, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:01:51', '2023-10-26 08:01:51', NULL),
(414, '8/15', 'OPK\'\' Brand Hydroulic manual type protable crane model PC-2000  Capacity 2 tons', 8, 229, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:04:43', '2023-10-26 08:04:43', NULL),
(415, '1/45', 'Assembly  Wheel  selinder', 1, 141, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:07:00', '2023-10-26 08:07:00', NULL),
(416, '8/16', 'Compression cyliner pressure of Automatic Engine PSI (Petralengine)Model CG-2.0280 PSiL-20 Kg/ cm²', 8, 230, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:07:06', '2023-10-26 08:07:06', NULL),
(417, '1/46', 'Assembly  radiator alternator', 1, 154, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 08:09:46', '2023-10-26 08:16:02', NULL),
(418, '1/47', 'Assembly  Alternator  Ractifire', 1, 157, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 08:10:56', '2023-10-26 08:16:48', NULL),
(419, '1/48', 'Assembly  Axel  shaft', 1, 105, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:11:54', '2023-10-26 08:11:54', NULL),
(420, '1/49', 'Assembly   Fuwel  guage', 1, 155, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 08:13:08', '2023-10-26 08:14:41', NULL),
(421, '8/17', 'Universal dividing head DV- 200 A.', 8, 231, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:21:00', '2023-10-26 08:21:00', NULL),
(422, '8/18', 'Cross plate KD-200 A.', 8, 232, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:22:58', '2023-10-26 08:22:58', NULL),
(423, '8/19', 'Gear quadrant 22-200 A.', 8, 233, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:25:31', '2023-10-26 08:25:31', NULL),
(424, '1/50', 'Assembly   singcroniger', 1, 234, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:27:17', '2023-10-26 08:27:17', NULL),
(425, '8/20', 'Short Milling Arbor ISA. 40x16x29', 8, 235, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:28:02', '2023-10-26 08:28:02', NULL),
(426, '8/21', 'Short milling Arbor ISA. 40x22x19', 8, 235, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:29:59', '2023-10-26 08:29:59', NULL),
(427, '8/22', 'Short milling Arbor ISA. 40x22x37', 8, 235, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:31:01', '2023-10-26 08:31:01', NULL),
(428, '8/23', 'Short milling Arbor ISA. 40x27x23', 8, 235, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:32:08', '2023-10-26 08:32:08', NULL),
(429, '8/24', 'Cheek collets - 40x16/ 5-32 m.m.', 8, 236, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:34:58', '2023-10-26 08:34:58', NULL),
(430, '2/17', 'DIAL INDICATOR (HARDNESS TASTER-er)', 2, 138, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:35:06', '2023-10-26 08:35:06', NULL),
(431, '8/25', 'Hydrolic hobing press for spare parts stripor type- A-285', 8, 237, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:39:18', '2023-10-26 08:39:18', NULL),
(432, '8/26', 'Hydrolic hobing press for spare parts Turcon sleep seal -S-55013-2850-46 K/452-8307', 8, 237, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:44:24', '2023-10-26 08:44:24', NULL),
(433, '8/27', 'GK-21 Universal Engraving and copy Milling Machine 440 V. 50 CPS,Model:SR No-11908 part No-460/0000/0 with Accessories', 8, 238, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:48:11', '2023-10-26 08:48:11', NULL),
(434, '8/28', 'Welding set complete', 8, 240, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:50:14', '2023-10-26 08:50:14', NULL),
(435, 'UNDP/24', 'VERNIER HIGHT GAUGE-2492-300', 11, 239, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 08:51:47', '2023-10-26 09:10:42', '2023-10-26 09:10:42'),
(436, '8/29', 'Padestal Grinding Machine (China) Model: No-S-3 SL-300', 8, 241, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:53:16', '2023-10-26 08:53:16', NULL),
(437, 'UNDP/25', 'VERNIER HIGHT GAUGE- 500', 11, 239, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 08:54:10', '2023-10-26 09:10:32', '2023-10-26 09:10:32'),
(438, '8/30', 'Beanch drill machine (china) Model:No-trade T Mark- 1-1/4\'\'-1-1/2\'\'', 8, 242, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:55:52', '2023-10-26 08:55:52', NULL),
(439, '8/31', 'Hand grinding Machine Electrict ,RPM-10,000', 8, 244, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 08:58:09', '2023-10-26 08:58:09', NULL),
(440, 'UNDP/26', 'DIAL INDICATOR-5244', 11, 243, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 09:00:31', '2023-10-26 09:10:10', '2023-10-26 09:10:10'),
(441, '8/32', 'Low -gread Alloy cast steel for pressure pad.', 8, 245, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:01:02', '2023-10-26 09:01:02', NULL),
(442, '8/33', 'Spares for polishing Machine drive shaft cat No-0620006', 8, 246, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:04:20', '2023-10-26 09:04:20', NULL),
(443, '8/34', 'Spares for polishing Machine gear cat No-0630003', 8, 246, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:06:41', '2023-10-26 09:06:41', NULL),
(444, 'UNDP/1', 'TWIST DRILL-110-19.5 M.M.', 11, 247, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:08:39', '2023-10-26 09:08:39', NULL),
(445, 'UNDP/2', 'STEEL SILVER (BRIGHT SIGN) Ø 12 M.M.', 11, 249, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 09:12:48', '2023-10-26 13:09:20', NULL),
(446, 'UNDP/3', 'STEEL SILVER (BRIGHT SIGN) Ø 15 M.M.', 11, 249, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 09:13:41', '2023-10-26 13:09:34', NULL),
(447, '8/35', 'Spears for polishing Machine ball Bearing cat NO-06300', 8, 246, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:14:19', '2023-10-26 09:14:19', NULL),
(448, 'UNDP/4', 'STEEL SILVER (BRIGHT SIGN) Ø 20 M.M.', 11, 249, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 09:14:27', '2023-10-26 13:09:46', NULL),
(449, 'UNDP/5', 'STEEL SILVER (BRIGHT SIGN) Ø 25 M.M.', 11, 249, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 09:16:01', '2023-10-26 13:09:57', NULL),
(450, 'UNDP/6', 'STEEL SILVER (Carbon) Ø 20 M.M.', 11, 249, 19, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 09:18:03', '2023-10-26 13:10:53', NULL),
(451, '8/36', 'Wheel for spning Machine (Chaka)', 8, 250, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:18:06', '2023-10-26 09:18:06', NULL),
(452, '8/37', 'ARK/ Tig welding system Tig-300 (with pulse)-26-1050/60H²', 8, 251, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:25:54', '2023-10-26 09:25:54', NULL),
(453, '8/38', 'C.N.C.Desk top tutor (with complete) C.N.C Training system)', 8, 252, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:27:44', '2023-10-26 09:27:44', NULL),
(454, '8/39', 'Rock well Heardness tester dial gauge type with all stander Accessories Model:FR-1EA Analog type -diaload minor lead N-98-07-RGt: 10', 8, 253, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:32:23', '2023-10-26 09:32:23', NULL),
(455, '8/40', 'Cobra C.N.C. Lathe model 360x100', 8, 254, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:34:47', '2023-10-26 09:34:47', NULL),
(456, '8/41', 'QIAPOI Basic Machine and standard Accessories EMCOPC Mill,153-5000 PC-controlled 3axIS C.N.C. Machingng center with interchargeable control &  All other tools.', 8, 255, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:38:24', '2023-10-26 09:38:24', NULL),
(457, '8/42', 'Spectrolab JT  CCD/1baise modiul fe including recalioration samples and 1 analytical Program with all additional accessories.', 8, 256, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:45:03', '2023-10-26 09:45:03', NULL),
(458, '8/43', 'Medium Frequnce steel meilling furnes with necessary Accessories', 8, 257, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:50:49', '2023-10-26 09:50:49', NULL),
(459, '8/44', 'C.N.C.wire cut EDM model: WT-A 30 with all standared Accessories', 8, 258, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:56:30', '2023-10-26 09:56:30', NULL),
(460, '8/45', 'Electric Discharge Machine (EDM) model: NC-F 606 N/ 90A with all  Standard Accessories.', 8, 259, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 09:59:13', '2023-10-26 09:59:13', NULL),
(461, '8/46', 'Universal tool Room Milling Machine model: FNGJ-40.', 8, 260, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 10:01:35', '2023-10-26 10:01:35', NULL),
(462, '8/47', 'Compression tester JT-231', 8, 261, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 10:03:57', '2023-10-26 10:03:57', NULL),
(463, '8/48', 'Electronic  Ignation Taster/motor taster JT-273', 8, 262, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 10:07:36', '2023-10-26 10:07:36', NULL),
(464, '8/49', 'Front Alignment Checking Equipment for Auto car.', 8, 263, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 10:11:18', '2023-10-26 10:11:18', NULL),
(465, '8/50', 'C.N.C Knee type milling machine Model: F 2 V C.N.C. In Mertic Execution Voltage 3 PC- 400 V./50 HZ with Accessories.', 8, 260, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 10:14:57', '2023-10-26 10:14:57', NULL),
(466, 'UNDP/7', 'STEEL SILVER (CARBON) Ø 25 M.M.', 11, 249, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:17:49', '2023-10-26 12:17:49', NULL),
(467, 'UNDP/8', 'STEEL SILVER (CARBON) Ø 35 M.M.', 11, 249, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:19:30', '2023-10-26 12:19:30', NULL),
(468, '7/3', 'AlBarrel-2', 7, 265, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 12:36:30', '2023-10-26 13:32:13', NULL),
(469, '7/4', 'Electro light', 7, 266, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 12:37:51', '2023-10-26 13:32:31', NULL),
(470, 'UNDP/9', 'STEEL BRIGHT Ø 12 M.M.', 11, 264, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:39:35', '2023-10-26 12:39:35', NULL),
(471, 'UNDP/10', 'STEEL BRIGHT Ø 25 M.M.', 11, 264, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:41:41', '2023-10-26 12:41:41', NULL),
(472, 'UNDP/11', 'STEEL BRIGHT Ø 35 M.M.', 11, 264, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:43:35', '2023-10-26 12:43:35', NULL),
(473, '7/5', 'Erechrome block T', 7, 267, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:43:46', '2023-10-26 12:43:46', NULL),
(474, 'UNDP/12', 'STEEL BRIGHT Ø 50 M.M.', 11, 264, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:44:55', '2023-10-26 12:44:55', NULL),
(475, 'UNDP/13', 'STEEL BRIGHT Ø 75 M.M.', 11, 264, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:46:10', '2023-10-26 12:46:10', NULL),
(476, 'UNDP/14', 'STEEL BRIGHT Ø 100 M.M.', 11, 264, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:47:28', '2023-10-26 12:47:28', NULL),
(477, '7/6', 'Ethalize dycine tetra EDAT/Hydencity palyethaline & PP', 7, 268, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:48:28', '2023-10-26 12:48:28', NULL),
(478, 'UNDP/15', 'STEEL BRIGHT Ø150 M.M.', 11, 264, 19, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 12:49:16', '2023-10-26 13:20:34', NULL),
(479, 'UNDP/16', 'STEEL BRIGHT Ø 200 M.M.', 11, 264, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:50:23', '2023-10-26 12:50:23', NULL),
(480, '7/7', 'Enoculine-15', 7, 269, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:50:46', '2023-10-26 12:50:46', NULL),
(481, 'UNDP/17', 'STEEL BRIGHT Ø 250 M.M.', 11, 264, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:51:27', '2023-10-26 12:51:27', NULL),
(482, 'UNDP/18', 'STEEL BRIGHT- 50 M.M. (SQUARE)', 11, 264, 19, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-26 12:52:26', '2023-10-26 13:20:49', NULL),
(483, 'UNDP/19', 'STEEL BRIGHT-175 M.M. (SQUARE)', 11, 264, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 12:53:33', '2023-10-26 12:53:33', NULL),
(484, 'UNDP/20', 'STEEL BRIGHT-1100 M.M. (SQUARE)', 11, 264, 19, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 13:04:27', '2023-10-26 13:04:27', NULL),
(485, '7/8', 'Acid oxied', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-26 13:29:47', '2023-10-26 13:29:47', NULL),
(486, 'UNDP/21', 'DEPTH GAUGE MICROMITER- 891/N/150', 11, 271, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 08:06:49', '2023-10-29 08:06:49', NULL),
(487, 'UNDP/22', 'STICK MICROMITER-732-75-175', 11, 271, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 08:08:47', '2023-10-29 11:54:45', '2023-10-29 11:54:45'),
(488, 'UNDP/23', 'VERNIER CALIPER', 11, 272, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 08:11:04', '2023-10-29 10:33:58', '2023-10-29 10:33:58'),
(489, '7/9', 'Acid oxalic', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-29 08:41:53', '2023-10-29 08:50:26', NULL),
(490, '7/10', 'Acid chromic', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 08:52:01', '2023-10-29 08:52:01', NULL),
(491, '7/11', 'Acid chromium', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 08:53:29', '2023-10-29 08:53:29', NULL),
(492, '7/12', 'Acid Nytric', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 08:55:14', '2023-10-29 08:55:14', NULL),
(493, '7/13', 'Acid phospharic', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 08:57:34', '2023-10-29 08:57:34', NULL),
(494, '7/14', 'Acid salfeuric', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 08:58:39', '2023-10-29 08:58:39', NULL),
(495, '7/15', 'Acid hydrocloric', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:00:45', '2023-10-29 09:00:45', NULL),
(496, '7/16', 'Acid hydrofloric', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:02:30', '2023-10-29 09:02:30', NULL),
(497, '7/17', 'Acid hydrocloride', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:04:07', '2023-10-29 09:04:07', NULL),
(498, '7/18', 'Acid elctrolight', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:05:38', '2023-10-29 09:05:38', NULL),
(499, '7/19', 'Acid boric', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:07:15', '2023-10-29 09:07:15', NULL),
(500, '7/20', 'Acitic acid', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:08:38', '2023-10-29 09:08:38', NULL),
(501, '7/21', 'Acid copper anode', 7, 270, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:10:40', '2023-10-29 09:10:40', NULL);
INSERT INTO `items` (`id`, `item_code`, `item_name`, `group_id`, `subgroup_id`, `unit_id`, `manufacturer_id`, `brand_id`, `model_id`, `purchase_price`, `cost_price`, `sale_price`, `sku`, `branch_id`, `room_id`, `rack_id`, `shelf_id`, `page_location`, `volume_location`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(502, '7/22', 'Amonium liquit', 7, 273, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:13:37', '2023-10-29 09:13:37', NULL),
(503, '7/23', 'Amonium cloride', 7, 273, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:16:45', '2023-10-29 09:16:45', NULL),
(504, '7/24', 'Amonium molivated', 7, 273, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:18:28', '2023-10-29 09:18:28', NULL),
(505, '7/25', 'Amonium acited', 7, 273, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:20:06', '2023-10-29 09:20:06', NULL),
(506, '7/26', 'Amonium sulfeat', 7, 273, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:22:19', '2023-10-29 09:22:19', NULL),
(507, '7/27', 'Amonium Hydro oxide', 7, 273, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:24:02', '2023-10-29 09:24:02', NULL),
(508, '7/28', 'Cadmium Anode', 7, 274, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:27:17', '2023-10-29 09:27:17', NULL),
(509, '7/29', 'Anode Nickel with hook-24\"x4\"', 7, 275, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:34:31', '2023-10-29 09:34:31', NULL),
(510, '7/30', 'chromium Anode with hook-', 7, 275, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:36:48', '2023-10-29 09:36:48', NULL),
(511, '7/31', 'Acetone', 7, 276, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:40:11', '2023-10-29 09:40:11', NULL),
(512, '7/32', 'Acelator/Apoxi with heardner', 7, 277, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:43:38', '2023-10-29 09:43:38', NULL),
(513, '7/33', 'Copper carbonet', 7, 279, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:46:55', '2023-10-29 09:46:55', NULL),
(514, '7/34', 'Copper Salt', 7, 279, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:49:07', '2023-10-29 09:49:07', NULL),
(515, '7/35', 'Copper sulphet', 7, 279, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:50:46', '2023-10-29 09:50:46', NULL),
(516, '7/36', 'Copper sayanite', 7, 279, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 09:52:51', '2023-10-29 09:52:51', NULL),
(517, '7/37', 'Cadmium oxide', 7, 274, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:01:07', '2023-10-29 10:01:07', NULL),
(518, '7/38', 'Cadmium salt', 7, 274, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:03:45', '2023-10-29 10:03:45', NULL),
(519, 'IP0498', 'Calcium cloride', 7, 280, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:06:12', '2023-10-29 10:06:12', NULL),
(520, '7/40', 'Calcium carbide', 7, 280, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:08:27', '2023-10-29 10:08:27', NULL),
(521, '7/41', 'Calcium Floride/Calcium siliside', 7, 280, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:10:32', '2023-10-29 10:10:32', NULL),
(522, '7/42', 'Calcium carbonet jarck/pali carbonet', 7, 280, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:11:55', '2023-10-29 10:11:55', NULL),
(523, '7/43', 'Chromium die oxide', 7, 281, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:14:51', '2023-10-29 10:14:51', NULL),
(524, '7/44', 'Chromium Neutrolizer', 7, 281, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:16:50', '2023-10-29 10:16:50', NULL),
(525, '7/45', 'Carbon Astivated', 7, 282, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:20:24', '2023-10-29 10:20:24', NULL),
(526, 'UNDP/24', 'HIGHT VERNIER  GAUGE-2492-300', 11, 272, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:23:42', '2023-10-29 10:34:13', '2023-10-29 10:34:13'),
(527, '7/46', 'Hard chrome salt', 7, 283, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:23:44', '2023-10-29 10:23:44', NULL),
(528, '7/47', 'Chostic soda/ castic salt', 7, 284, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:27:45', '2023-10-29 10:27:45', NULL),
(529, 'UNDP/25', 'HIGHT GAUGE- 500', 11, 272, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:29:35', '2023-10-29 10:34:32', '2023-10-29 10:34:32'),
(530, '7/48', 'Chostic potash', 7, 285, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:30:41', '2023-10-29 10:30:41', NULL),
(531, '7/49', 'Cleaner metal', 7, 286, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:34:35', '2023-10-29 10:34:35', NULL),
(532, '7/50', 'Karfa', 7, 287, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-29 10:37:16', '2023-10-29 10:37:16', NULL),
(533, 'TSCG/37', 'RTD PT 100 Temperature Transmiter', 10, 88, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2023-10-30 08:06:13', '2023-10-31 07:25:57', NULL),
(534, 'UNDP/30', 'MAGNATIC SINE TABLE', 11, 239, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-30 10:16:32', '2023-10-30 10:27:10', '2023-10-30 10:27:10'),
(535, 'TSC/38', 'Vortic marine M.S Electrodes- 2.5 m.m.', 10, 291, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 07:34:26', '2023-10-31 07:34:26', NULL),
(536, 'TSC/39', 'Vortic marine M.S Electrodes- 3.2 m.m.', 10, 291, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 07:36:19', '2023-10-31 07:36:19', NULL),
(537, 'TSC/40', 'Vortic marine M.S Electrodes- 4 m.m.', 10, 291, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 07:38:48', '2023-10-31 07:38:48', NULL),
(538, 'TSC/41', 'M.S Filler Metal- 1 m.m.-3 m.m.', 10, 292, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 07:41:58', '2023-10-31 07:41:58', NULL),
(539, 'TSC/42', 'Mig welding coil-1 m.m.', 10, 293, 18, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 07:45:27', '2023-10-31 07:45:27', NULL),
(540, 'TSC/43', 'M.S pipe Ø 4\"', 10, 294, 8, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 07:48:53', '2023-10-31 07:48:53', NULL),
(541, 'TSC/44', 'M.S Sheet- 2 m.m. Thick', 10, 295, 4, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 07:52:10', '2023-10-31 07:52:10', NULL),
(542, 'TSC/45', 'Hand shild', 10, 296, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 07:54:49', '2023-10-31 07:54:49', NULL),
(543, 'TSC/46', 'Helmat', 10, 297, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 08:09:05', '2023-10-31 08:09:05', NULL),
(544, 'TSC/47', 'Goagles-Black/White welding protective', 10, 298, 17, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 08:13:13', '2023-10-31 08:13:13', NULL),
(545, 'TSC/48', 'Year protective', 10, 299, 17, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 08:16:51', '2023-10-31 08:16:51', NULL),
(546, 'TSCG/49', 'Tsc Apron', 10, 300, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 10:17:40', '2023-10-31 10:17:40', NULL),
(547, 'TSCG/50', 'Lather hand gloves', 10, 301, 17, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 10:20:58', '2023-10-31 10:20:58', NULL),
(548, 'UNDP/22', 'Undp STICK MICROMITER-732-75-175', 11, 271, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-10-31 10:21:42', '2023-10-31 10:21:42', NULL),
(549, 'UNDP/23', 'UVERNIER CALIPER', 11, 272, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-11-02 09:04:11', '2023-11-02 09:04:11', NULL),
(550, '4/51', 'Apron', 4, 302, 1, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-11-12 09:44:23', '2023-11-12 09:44:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint NOT NULL,
  `job_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_name` varchar(164) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `branch_id`, `job_code`, `job_name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'JN0001', 'JOB-501', 'JOB-501 is create for Dry Dock Shipyard Ltd.', NULL, 1, '2023-05-28 17:26:50', '2023-06-06 13:56:12', NULL),
(2, 1, 'JN0002', 'JOB-502', 'JOB-502 is create for Fashion Syndicate', 1, 1, '2023-06-03 08:21:27', '2023-06-06 13:56:51', NULL),
(3, 1, 'JN0003', 'JOB-503', 'JOB-503 is created for Fashion Syndicate', 1, NULL, '2023-06-06 13:59:54', '2023-06-06 13:59:54', NULL),
(4, 1, 'JN0004', 'JOB-102', 'JOB-102 : BenQ Order', 1, NULL, '2023-10-19 07:38:19', '2023-10-19 07:38:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` bigint NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `key` text COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `ltm_translations`
--

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ar', 'cruds', 'site_title', 'محاسبة  |  مجموعة  بن أمير التجارية  |  شركة بن أمير المحدودة', '2023-02-12 20:24:37', '2023-03-26 14:02:57', NULL),
(2, 1, 'ar', 'cruds', 'insert_message', 'تم إدخال المعلومات بنجاح.', '2023-02-12 20:24:37', '2023-03-26 14:02:57', NULL),
(3, 1, 'ar', 'cruds', 'update_message', 'تم تحديث المعلومات بنجاح', '2023-02-12 20:24:37', '2023-03-26 14:02:57', NULL),
(4, 1, 'ar', 'cruds', 'delete_message', 'تم حذف المعلومات بنجاح', '2023-02-12 20:24:37', '2023-03-26 14:02:57', NULL),
(5, 1, 'ar', 'cruds', 'exist_message', 'تم إدخال هذه المعلومات بالفعل !', '2023-02-12 20:24:37', '2023-03-26 14:02:57', NULL),
(6, 1, 'ar', 'cruds', 'info_message', 'رجاءً .. كل مقاييس الدفع السابقة غير نشطة', '2023-02-12 20:24:37', '2023-03-26 14:02:57', NULL),
(7, 1, 'ar', 'cruds', 'success_message', 'تمت العملية بنجاح!', '2023-02-12 20:24:37', '2023-03-26 14:02:57', NULL),
(8, 1, 'ar', 'cruds', 'error_message', 'فشلت العملية!', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(9, 1, 'ar', 'cruds', 'actions', 'أجراءات', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(10, 1, 'ar', 'cruds', 'add', 'يضيف', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(11, 1, 'ar', 'cruds', 'allRightsReserved', 'كل الحقوق محفوظة.', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(12, 1, 'ar', 'cruds', 'areYouSure', 'هل أنت واثق؟', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(13, 1, 'ar', 'cruds', 'clickHereToVerify', 'انقر هنا للتحقق', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(14, 1, 'ar', 'cruds', 'create', 'خلق', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(15, 1, 'ar', 'cruds', 'dashboard', 'لوحة التحكم', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(16, 1, 'ar', 'cruds', 'delete', 'حذف', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(17, 1, 'ar', 'cruds', 'downloadFile', 'تحميل الملف', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(18, 1, 'ar', 'cruds', 'edit', 'تعديل', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(19, 1, 'ar', 'cruds', 'emailVerificationSuccess', 'تم التحقق من البريد الإلكتروني للمستخدم بنجاح', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(20, 1, 'ar', 'cruds', 'entries', 'إدخالات', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(21, 1, 'ar', 'cruds', 'filterDate', 'تصفية حسب التاريخ', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(22, 1, 'ar', 'cruds', 'forgot_password', 'نسيت رقمك السري؟', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(23, 1, 'ar', 'cruds', 'home', 'سكن', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(24, 1, 'ar', 'cruds', 'list', 'قائمة', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(25, 1, 'ar', 'cruds', 'login', 'تسجيل الدخول', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(26, 1, 'ar', 'cruds', 'login_email', 'بريد إلكتروني', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(27, 1, 'ar', 'cruds', 'login_password', 'كلمة المرور', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(28, 1, 'ar', 'cruds', 'login_password_confirmation', 'تأكيد كلمة المرور', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(29, 1, 'ar', 'cruds', 'logout', 'تسجيل خروج', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(30, 1, 'ar', 'cruds', 'month', 'شهر', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(31, 1, 'ar', 'cruds', 'no', 'رقم', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(32, 1, 'ar', 'cruds', 'pleaseSelect', 'الرجاء التحديد', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(33, 1, 'ar', 'cruds', 'register', 'تسجيل', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(34, 1, 'ar', 'cruds', 'remember_me', 'تذكرنى', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(35, 1, 'ar', 'cruds', 'reset_password', 'إعادة تعيين كلمة المرور', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(36, 1, 'ar', 'cruds', 'save', 'يحفظ', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(37, 1, 'ar', 'cruds', 'search', 'بحث', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(38, 1, 'ar', 'cruds', 'searching', 'بحث', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(39, 1, 'ar', 'cruds', 'no_results', 'لا نتائج', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(40, 1, 'ar', 'cruds', 'results_could_not_be_loaded', 'لا يمكن تحميل النتائج', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(41, 1, 'ar', 'cruds', 'search_input_too_short', 'الرجاء إدخال: عدد الأحرف أو أكثر', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(42, 1, 'ar', 'cruds', 'show', 'اختار عدد الصفوف', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(43, 1, 'ar', 'cruds', 'systemCalendar', 'التقويم', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(44, 1, 'ar', 'cruds', 'thankYouForUsingOurApplication', 'نشكرك لإستعمال موقعنا الإلكتروني', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(45, 1, 'ar', 'cruds', 'timeFrom', 'من', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(46, 1, 'ar', 'cruds', 'timeTo', 'الي', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(47, 1, 'ar', 'cruds', 'toggleNavigation', 'تبديل والتنقل', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(48, 1, 'ar', 'cruds', 'user_name', 'الأسم', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(49, 1, 'ar', 'cruds', 'verifyYourEmail', 'يرجى التحقق من بريدك الإلكتروني', '2023-02-12 20:24:39', '2023-03-26 14:02:57', NULL),
(50, 1, 'ar', 'cruds', 'verifyYourUser', 'لإنهاء التسجيل - يطلب منك الموقع التحقق من بريدك الإلكتروني', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(51, 1, 'ar', 'cruds', 'view', 'معاينة', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(52, 1, 'ar', 'cruds', 'view_file', 'استعراض الملف', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(53, 1, 'ar', 'cruds', 'year', 'سنة', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(54, 1, 'ar', 'cruds', 'yes', 'نعم', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(55, 1, 'ar', 'cruds', 'youAreLoggedIn', 'لقد سجلت الدخول!', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(56, 1, 'ar', 'cruds', 'yourAccountNeedsAdminApproval', 'تحتاج حساباتك إلى موافقة المسؤول لتسجيل الدخول', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(57, 1, 'ar', 'cruds', 'submit', 'اقترح', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(58, 1, 'ar', 'cruds', 'datatables.copy', 'نسخ', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(59, 1, 'ar', 'cruds', 'datatables.csv', 'عملة', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(60, 1, 'ar', 'cruds', 'datatables.excel', 'اكسل', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(61, 1, 'ar', 'cruds', 'datatables.pdf', 'بي دي إف', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(62, 1, 'ar', 'cruds', 'datatables.print', 'طباعة', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(63, 1, 'ar', 'cruds', 'datatables.colvis', 'رؤية العمود', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(64, 1, 'ar', 'cruds', 'datatables.delete', 'حذف المحدد', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(65, 1, 'ar', 'cruds', 'datatables.zero_selected', 'لم يتم تحديد صفوف', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(66, 1, 'ar', 'cruds', 'action', 'أجرءات', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(67, 1, 'ar', 'cruds', 'action_id', 'معرفة الإجراء', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(68, 1, 'ar', 'cruds', 'action_model', 'نموذج العمل', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(69, 1, 'ar', 'cruds', 'address', 'عنوان', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(70, 1, 'ar', 'cruds', 'administrator_can_create_other_users', 'المسؤول (يمكنه إنشاء مستخدمين آخرين)', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(71, 1, 'ar', 'cruds', 'aggregate_function_use', 'وظيفة التجميع المراد استخدامها', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(72, 1, 'ar', 'cruds', 'all', 'الجميع', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(73, 1, 'ar', 'cruds', 'all_messages', 'جميع الرسائل', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(74, 1, 'ar', 'cruds', 'amount', 'اجمالي المبلغ', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(75, 1, 'ar', 'cruds', 'answer', 'إجابه', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(76, 1, 'ar', 'cruds', 'app_csv_file_to_import', 'ملف CSV للاستيراد', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(77, 1, 'ar', 'cruds', 'app_csvImport', 'استيراد CSV', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(78, 1, 'ar', 'cruds', 'app_file_contains_header_row', 'يحتوي الملف على صف الرأس؟', '2023-02-12 20:24:40', '2023-03-26 14:02:57', NULL),
(79, 1, 'ar', 'cruds', 'app_import_data', 'بيانات الاستيراد', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(80, 1, 'ar', 'cruds', 'app_imported_rows_to_table', 'مستورد: صفوف الصفوف إلى: جدول الجدول', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(81, 1, 'ar', 'cruds', 'app_parse_csv', 'تحليل CSV', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(82, 1, 'ar', 'cruds', 'asset', 'مدخرات', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(83, 1, 'ar', 'cruds', 'assets', 'الأصول', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(84, 1, 'ar', 'cruds', 'assets_history', 'تاريخ الأصول', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(85, 1, 'ar', 'cruds', 'assets_management', 'إدارة الأصول', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(86, 1, 'ar', 'cruds', 'assigned_to', 'مخصص لي', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(87, 1, 'ar', 'cruds', 'assigned_user', 'معينة (المستخدم)', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(88, 1, 'ar', 'cruds', 'attachment', 'مرفق', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(89, 1, 'ar', 'cruds', 'axis', 'محور', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(90, 1, 'ar', 'cruds', 'back_to_list', 'الرجوع للقائمة', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(91, 1, 'ar', 'cruds', 'basic_crm', 'CRM الأساسي', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(92, 1, 'ar', 'cruds', 'budget', 'الدخل', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(93, 1, 'ar', 'cruds', 'calendar_sources', 'مصادر التقويم', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(94, 1, 'ar', 'cruds', 'campaign', 'حملة بشكل عام', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(95, 1, 'ar', 'cruds', 'campaigns', 'الحملات', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(96, 1, 'ar', 'cruds', 'categories', 'فئات', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(97, 1, 'ar', 'cruds', 'category', 'فئة', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(98, 1, 'ar', 'cruds', 'category_name', 'اسم التصنيف', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(99, 1, 'ar', 'cruds', 'change_notifications_field_1_label', 'إرسال إشعار بالبريد الإلكتروني إلى المستخدم', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(100, 1, 'ar', 'cruds', 'change_notifications_field_2_label', 'عند الدخول على حساب جديد', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(101, 1, 'ar', 'cruds', 'change_password', 'غير كلمة السر', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(102, 1, 'ar', 'cruds', 'chart_type', 'نوع التخطيط', '2023-02-12 20:24:41', '2023-03-26 14:02:57', NULL),
(103, 1, 'ar', 'cruds', 'code', 'الشفرة', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(104, 1, 'ar', 'cruds', 'confirm', 'يتأكد', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(105, 1, 'ar', 'cruds', 'confirm_password', 'تأكيد كلمة المرور', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(106, 1, 'ar', 'cruds', 'contact_management', 'إدارة الاتصال', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(107, 1, 'ar', 'cruds', 'contacts', 'جهات الاتصال', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(108, 1, 'ar', 'cruds', 'content_management', 'ادارة المحتوى', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(109, 1, 'ar', 'cruds', 'copy_paste_url_bellow', 'زر ، انسخ والصق عنوان URL أدناه في متصفح الويب الخاص بك:', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(110, 1, 'ar', 'cruds', 'country', 'بلد', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(111, 1, 'ar', 'cruds', 'coupon_management', 'إدارة القسيمة', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(112, 1, 'ar', 'cruds', 'coupons', 'كوبونات', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(113, 1, 'ar', 'cruds', 'coupons_amount', 'مبلغ القسائم', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(114, 1, 'ar', 'cruds', 'create_new_calendar_source', 'إنشاء مصدر تقويم جديد', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(115, 1, 'ar', 'cruds', 'create_new_notification', 'إنشاء إعلام جديد', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(116, 1, 'ar', 'cruds', 'create_new_report', 'إنشاء تقرير جديد', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(117, 1, 'ar', 'cruds', 'created_at', 'أنشئت في', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(118, 1, 'ar', 'cruds', 'crud_date_field', 'تاريخ Crud', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(119, 1, 'ar', 'cruds', 'crud_event_field', 'حقل تسمية الحدث', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(120, 1, 'ar', 'cruds', 'crud_title', 'العنوان الخام', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(121, 1, 'ar', 'cruds', 'csv_file_to_import', 'ملف CSV للاستيراد', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(122, 1, 'ar', 'cruds', 'csvImport', 'استيراد CSV', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(123, 1, 'ar', 'cruds', 'current_password', 'كلمة المرور الحالي', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(124, 1, 'ar', 'cruds', 'custom_controller_index', 'فهرس وحدة التحكم المخصصة.', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(125, 1, 'ar', 'cruds', 'customer', 'عميل', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(126, 1, 'ar', 'cruds', 'customers', 'عملاء', '2023-02-12 20:24:42', '2023-03-26 14:02:57', NULL),
(127, 1, 'ar', 'cruds', 'deleted_at', 'تم الحذف في', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(128, 1, 'ar', 'cruds', 'description', 'وصف', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(129, 1, 'ar', 'cruds', 'deselect_all', 'الغاء تحديد الكل', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(130, 1, 'ar', 'cruds', 'discount_amount', 'نسبة الخصم', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(131, 1, 'ar', 'cruds', 'discount_percent', 'نسبة الخصم', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(132, 1, 'ar', 'cruds', 'due_date', 'تاريخ الاستحقاق', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(133, 1, 'ar', 'cruds', 'edit_calendar_source', 'تحرير مصدر التقويم', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(134, 1, 'ar', 'cruds', 'email_greet', 'مرحبًا', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(135, 1, 'ar', 'cruds', 'email_line1', 'أنت تتلقى هذا البريد الإلكتروني لأننا تلقينا طلب إعادة تعيين كلمة المرور لحسابك.', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(136, 1, 'ar', 'cruds', 'email_line2', 'إذا لم تطلب إعادة تعيين كلمة المرور ، فلا داعي لاتخاذ أي إجراء آخر.', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(137, 1, 'ar', 'cruds', 'email_regards', 'يعتبر', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(138, 1, 'ar', 'cruds', 'end_time', 'وقت النهاية', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(139, 1, 'ar', 'cruds', 'entry_date', 'تاريخ الدخول', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(140, 1, 'ar', 'cruds', 'excerpt', 'مقتطفات', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(141, 1, 'ar', 'cruds', 'faq_management', 'إدارة التعليمات', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(142, 1, 'ar', 'cruds', 'featured_image', 'صورة مميزة', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(143, 1, 'ar', 'cruds', 'fee_percent', 'نسبة الرسوم', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(144, 1, 'ar', 'cruds', 'file', 'ملف', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(145, 1, 'ar', 'cruds', 'file_contains_header_row', 'يحتوي الملف على صف الرأس؟', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(146, 1, 'ar', 'cruds', 'first_name', 'الاسم الاول', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(147, 1, 'ar', 'cruds', 'group_by', 'مجموعة من', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(148, 1, 'ar', 'cruds', 'if_you_are_having_trouble', 'إذا كنت تواجه مشكلة في النقر فوق', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(149, 1, 'ar', 'cruds', 'import_data', 'بيانات الاستيراد', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(150, 1, 'ar', 'cruds', 'imported_rows_to_table', 'مستورد: صفوف الصفوف إلى: جدول الجدول', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(151, 1, 'ar', 'cruds', 'inbox', 'صندوق الوارد', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(152, 1, 'ar', 'cruds', 'integer_float_placeholder', 'الرجاء تحديد واحد من الحقول الصحيحة / العائمة', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(153, 1, 'ar', 'cruds', 'is_created', 'أنشئ', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(154, 1, 'ar', 'cruds', 'is_deleted', 'يتم حذف', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(155, 1, 'ar', 'cruds', 'is_updated', 'يتم تحديث', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(156, 1, 'ar', 'cruds', 'label_field', 'حقل التسمية', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(157, 1, 'ar', 'cruds', 'last_name', 'الكنية', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(158, 1, 'ar', 'cruds', 'location', 'تبوك', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(159, 1, 'ar', 'cruds', 'locations', 'لمواجهة الرئيسية', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(160, 1, 'ar', 'cruds', 'main_currency', 'العملة الرئيسية', '2023-02-12 20:24:43', '2023-03-26 14:02:57', NULL),
(161, 1, 'ar', 'cruds', 'message', 'رسالة', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(162, 1, 'ar', 'cruds', 'messages', 'رسائل', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(163, 1, 'ar', 'cruds', 'name', 'اسم', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(164, 1, 'ar', 'cruds', 'new_calendar_source', 'إنشاء مصدر تقويم جديد', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(165, 1, 'ar', 'cruds', 'new_message', 'رسالة جديدة', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(166, 1, 'ar', 'cruds', 'new_password', 'كلمة سر جديدة', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(167, 1, 'ar', 'cruds', 'no_calendar_sources', 'لا توجد مصادر تقويم حتى الآن.', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(168, 1, 'ar', 'cruds', 'no_entries_in_table', 'لا توجد إدخالات في الجدول', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(169, 1, 'ar', 'cruds', 'no_reports_yet', 'لا توجد تقارير حتى الآن.', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(170, 1, 'ar', 'cruds', 'not_approved_p', 'لا يزال حسابك غير معتمد من قبل المسؤول. من فضلك ، تحلى بالصبر وحاول مرة أخرى في وقت لاحق.', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(171, 1, 'ar', 'cruds', 'not_approved_title', 'أنت غير موافق عليه', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(172, 1, 'ar', 'cruds', 'note_text', 'نص الملاحظة', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(173, 1, 'ar', 'cruds', 'notifications', 'إشعارات', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(174, 1, 'ar', 'cruds', 'notify_user', 'إخطار المستخدم', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(175, 1, 'ar', 'cruds', 'outbox', 'صندوق الصادر', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(176, 1, 'ar', 'cruds', 'pages', 'الصفحات', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(177, 1, 'ar', 'cruds', 'parse_csv', 'تحليل CSV', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(178, 1, 'ar', 'cruds', 'permadel', 'الحذف بشكل نهائي', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(179, 1, 'ar', 'cruds', 'phone', 'الهاتف 2', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(180, 1, 'ar', 'cruds', 'phone1', 'الهاتف 2', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(181, 1, 'ar', 'cruds', 'phone2', 'الهاتف 2', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(182, 1, 'ar', 'cruds', 'photo', 'صور (بحد أقصى 8 ميغا بايت)', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(183, 1, 'ar', 'cruds', 'photo1', 'الصورة 1', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(184, 1, 'ar', 'cruds', 'photo2', 'صورة 2', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(185, 1, 'ar', 'cruds', 'photo3', 'الصورة 3', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(186, 1, 'ar', 'cruds', 'prefix', 'بادئة', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(187, 1, 'ar', 'cruds', 'price', 'السعر', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(188, 1, 'ar', 'cruds', 'product_management', 'ادارة المنتج', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(189, 1, 'ar', 'cruds', 'product_name', 'اسم المنتج', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(190, 1, 'ar', 'cruds', 'products', 'منتجات', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(191, 1, 'ar', 'cruds', 'question', 'سؤال', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(192, 1, 'ar', 'cruds', 'questions', 'أسئلة', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(193, 1, 'ar', 'cruds', 'recipient', 'متلقي', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(194, 1, 'ar', 'cruds', 'redeem_time', 'استرداد الوقت', '2023-02-12 20:24:44', '2023-03-26 14:02:57', NULL),
(195, 1, 'ar', 'cruds', 'registration', 'التسجيل', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(196, 1, 'ar', 'cruds', 'remember_token', 'رمز التزكرة', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(197, 1, 'ar', 'cruds', 'reply', 'الرد', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(198, 1, 'ar', 'cruds', 'reports_x_axis_field', 'المحور السيني - الرجاء اختيار أحد حقول التاريخ / الوقت', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(199, 1, 'ar', 'cruds', 'reports_y_axis_field', 'المحور ص - الرجاء اختيار أحد الحقول الرقمية', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(200, 1, 'ar', 'cruds', 'reset_password_woops', '<strong> عفوًا! </ strong> حدثت مشكلات في الإدخال:', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(201, 1, 'ar', 'cruds', 'restore', 'استرجع', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(202, 1, 'ar', 'cruds', 'sample_answer', 'عينة إجابة', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(203, 1, 'ar', 'cruds', 'sample_category', 'فئة العينة', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(204, 1, 'ar', 'cruds', 'sample_question', 'سؤال بسيط', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(205, 1, 'ar', 'cruds', 'select_all', 'اختر الكل', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(206, 1, 'ar', 'cruds', 'select_crud_placeholder', 'الرجاء اختيار واحدة من CRUDs الخاصة بك', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(207, 1, 'ar', 'cruds', 'select_dt_placeholder', 'الرجاء تحديد أحد حقول التاريخ / الوقت', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(208, 1, 'ar', 'cruds', 'select_users_placeholder', 'الرجاء تحديد أحد المستخدمين لديك', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(209, 1, 'ar', 'cruds', 'send', 'إرسال', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(210, 1, 'ar', 'cruds', 'serial_number', 'رقم سري', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(211, 1, 'ar', 'cruds', 'sl', '#', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(212, 1, 'ar', 'cruds', 'simple_user', 'مستخدم بسيط', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(213, 1, 'ar', 'cruds', 'skype', 'توا صل مع اسكايب', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(214, 1, 'ar', 'cruds', 'slug', 'Slug', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(215, 1, 'ar', 'cruds', 'start_date', 'تاريخ البدء', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(216, 1, 'ar', 'cruds', 'start_time', 'وقت البدء', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(217, 1, 'ar', 'cruds', 'status', 'حالة', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(218, 1, 'ar', 'cruds', 'statuses', 'الحالات', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(219, 1, 'ar', 'cruds', 'stripe_transactions', 'نوع المعاملة', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(220, 1, 'ar', 'cruds', 'subject', 'الموضوع', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(221, 1, 'ar', 'cruds', 'subscription-billing', 'الاشتراكات', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(222, 1, 'ar', 'cruds', 'subscription-payments', 'المدفوعات', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(223, 1, 'ar', 'cruds', 'suffix', 'لاحقة', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(224, 1, 'ar', 'cruds', 'tag', 'شعاربطاقة', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(225, 1, 'ar', 'cruds', 'tags', 'العلامات', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(226, 1, 'ar', 'cruds', 'task_management', 'ادارة المهام', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(227, 1, 'ar', 'cruds', 'tasks', 'مهام', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(228, 1, 'ar', 'cruds', 'team-management', 'فرق', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(229, 1, 'ar', 'cruds', 'team-management-singular', 'فريق', '2023-02-12 20:24:45', '2023-03-26 14:02:57', NULL),
(230, 1, 'ar', 'cruds', 'text', 'نص', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(231, 1, 'ar', 'cruds', 'there_were_problems_with_input', 'كان  هناك مشاكل في الإدخال', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(232, 1, 'ar', 'cruds', 'time', 'وقت', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(233, 1, 'ar', 'cruds', 'title', 'لقب', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(234, 1, 'ar', 'cruds', 'transaction_date', 'تاريخ المشروع', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(235, 1, 'ar', 'cruds', 'trash', 'نفاية', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(236, 1, 'ar', 'cruds', 'update', 'تحديث', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(237, 1, 'ar', 'cruds', 'updated_at', 'تم التحديث في', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(238, 1, 'ar', 'cruds', 'upgrade_to_premium', 'الترقية إلى المميزة', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(239, 1, 'ar', 'cruds', 'user_actions', 'إجراءات المستخدم', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(240, 1, 'ar', 'cruds', 'valid_from', 'صالح من تاريخ', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(241, 1, 'ar', 'cruds', 'valid_to', 'صالحة لي تاريخ', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(242, 1, 'ar', 'cruds', 'website', 'موقع إلكتروني', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(243, 1, 'ar', 'cruds', 'when_crud', 'عندما CRUD', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(244, 1, 'ar', 'cruds', 'whoops', 'عذرًا!', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(245, 1, 'ar', 'cruds', 'x_axis_field', 'X - حقل المحور (التاريخ / الوقت)', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(246, 1, 'ar', 'cruds', 'x_axis_group_by', 'X - مجموعة المحور حسب', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(247, 1, 'ar', 'cruds', 'y_axis_field', 'مجال المحور ص', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(248, 1, 'ar', 'cruds', 'you_have_no_messages', 'ليس لديك رسائل.', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(249, 1, 'ar', 'cruds', 'content', 'المحتوى', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(250, 1, 'ar', 'cruds', 'no_alerts', 'لا تنبيهات', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(251, 1, 'ar', 'cruds', 'calendar', 'التقويم', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(252, 1, 'ar', 'cruds', 'messenger', 'رسائل', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(253, 1, 'ar', 'cruds', 'select', '-- أختار--', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(254, 1, 'ar', 'cruds', 'financial_year', 'السنة المالية', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(255, 1, 'ar', 'cruds', 'from_month', 'من شهر', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(256, 1, 'ar', 'cruds', 'to_month', 'الى شهر', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(257, 1, 'ar', 'cruds', 'date', 'تاريخ العملية', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(258, 1, 'ar', 'cruds', 'generate', 'انشاء', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(259, 1, 'ar', 'cruds', 'from', 'من', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(260, 1, 'ar', 'cruds', 'to', 'الي', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(261, 1, 'ar', 'cruds', 'browse', 'تصفح', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(262, 1, 'ar', 'cruds', 'thumbnail', 'حجم الصورة المصغرة', '2023-02-12 20:24:46', '2023-03-26 14:02:57', NULL),
(263, 1, 'ar', 'cruds', 'access', 'التمكن من', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(264, 1, 'ar', 'cruds', 'generalSettings', 'الاعدادات العامة', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(265, 1, 'ar', 'cruds', 'userManagement', 'إدارةالمستخدم', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(266, 1, 'ar', 'cruds', 'menu', 'قائمة', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(267, 1, 'ar', 'cruds', 'menu_name', 'اسم القائمة', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(268, 1, 'ar', 'cruds', 'menu_link', 'قائمة ارتباط', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(269, 1, 'ar', 'cruds', 'menu_icon', 'قائمة أيقونة', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(270, 1, 'ar', 'cruds', 'parent_menu', 'قائمة الاصول', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(271, 1, 'ar', 'cruds', 'order_no', 'رقم الطلب', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(272, 1, 'ar', 'cruds', 'role', 'ألأذونات المفوض', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(273, 1, 'ar', 'cruds', 'permissions', 'أذونات(صلاحيات)', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(274, 1, 'ar', 'cruds', 'user', 'مستخدم', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(275, 1, 'ar', 'cruds', 'branch_id', 'فرع', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(276, 1, 'ar', 'cruds', 'email', 'بريد إلكتروني', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(277, 1, 'ar', 'cruds', 'password', 'كلمة المرور', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(278, 1, 'ar', 'cruds', 'roles', 'قائمة الأذونات والتفويض', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(279, 1, 'ar', 'cruds', 'language', 'لغة', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(280, 1, 'ar', 'cruds', 'country_name', 'اسم الدولة', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(281, 1, 'ar', 'cruds', 'country_code', 'الرقم الدولي', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(282, 1, 'ar', 'cruds', 'division', 'منطقة', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(283, 1, 'ar', 'cruds', 'division_name', 'اسم القسم', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(284, 1, 'ar', 'cruds', 'district', 'منطقة', '2023-02-12 20:24:47', '2023-03-26 14:02:57', NULL),
(285, 1, 'ar', 'cruds', 'district_name', 'اسم المنطقة', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(286, 1, 'ar', 'cruds', 'bank', 'بنك', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(287, 1, 'ar', 'cruds', 'bank_name', 'اسم البنك', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(288, 1, 'ar', 'cruds', 'branch_name', 'اسم الفرع', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(289, 1, 'ar', 'cruds', 'bank_account', 'رقم الحساب البنكي', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(290, 1, 'ar', 'cruds', 'account_no', 'رقم الحساب', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(291, 1, 'ar', 'cruds', 'account_name', 'أسم الحساب', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(292, 1, 'ar', 'cruds', 'companies', 'شركات', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(293, 1, 'ar', 'cruds', 'company', 'شركة', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(294, 1, 'ar', 'cruds', 'company_name', 'اسم الشركة', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(295, 1, 'ar', 'cruds', 'email_address', 'عنوان البريد الإلكتروني', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(296, 1, 'ar', 'cruds', 'company_address', 'عنوان الشركة', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(297, 1, 'ar', 'cruds', 'company_logo', 'شعار', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(298, 1, 'ar', 'cruds', 'office', 'مكتب', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(299, 1, 'ar', 'cruds', 'office_short_name', 'الاسم المختصر للمكتب', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(300, 1, 'ar', 'cruds', 'office_name', 'اسم المكتب', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(301, 1, 'ar', 'cruds', 'owner_name', 'اسم المالك', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(302, 1, 'ar', 'cruds', 'registration_no', 'رقم الصفحة', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(303, 1, 'ar', 'cruds', 'registration_date', 'تارتخ ادخال البيانات', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(304, 1, 'ar', 'cruds', 'no_of_recruitment_statement', 'رقم بيان التوظيف', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(305, 1, 'ar', 'cruds', 'no_of_delegate', 'عدد المندوبين', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(306, 1, 'ar', 'cruds', 'region_type_id', 'مكان المحاسبة', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(307, 1, 'ar', 'cruds', 'sponsor', 'كفيل', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(308, 1, 'ar', 'cruds', 'sponsor_name', 'اسم الكفيل', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(309, 1, 'ar', 'cruds', 'contact_no', 'رقم الاتصال.', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(310, 1, 'ar', 'cruds', 'optional_contact_no', 'رقم جهة الاتصال الاختيارية', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(311, 1, 'ar', 'cruds', 'relation', 'علاقة', '2023-02-12 20:24:48', '2023-03-26 14:02:57', NULL),
(312, 1, 'ar', 'cruds', 'nid_no', 'رقم البطاقة الشخصية', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(313, 1, 'ar', 'cruds', 'nid_first_page', 'الوجة الاول من البطاقة الشخصية', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(314, 1, 'ar', 'cruds', 'nid_second_page', 'الوجة الثانية من البطاقة الشخصية', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(315, 1, 'ar', 'cruds', 'profile_photo', 'صورة الملف الشخصي', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(316, 1, 'ar', 'cruds', 'sponsor_visa', 'تأشيرة الكفيل', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(317, 1, 'ar', 'cruds', 'visa_no', 'لايوجد تأشيرة', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(318, 1, 'ar', 'cruds', 'visa_cost', 'تكلفة التأشيرة', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(319, 1, 'ar', 'cruds', 'agent', 'وكيل', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(320, 1, 'ar', 'cruds', 'agent_name', 'اسم الوكيل', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(321, 1, 'ar', 'cruds', 'agency', 'وكالة', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(322, 1, 'ar', 'cruds', 'agency_name', 'اسم الوكالة', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(323, 1, 'ar', 'cruds', 'visa_type', 'نوع التاشيرة', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(324, 1, 'ar', 'cruds', 'type_name', 'مسمى التاشيرة', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(325, 1, 'ar', 'cruds', 'passenger', 'اسم المسافر | عامل', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(326, 1, 'ar', 'cruds', 'passenger_id', 'رقم حساب \nالعامل | العميل | المستخدم  | المسافر', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(327, 1, 'ar', 'cruds', 'service_name', 'اسم الخدمة', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(328, 1, 'ar', 'cruds', 'passenger_service_name', 'اسم المسافر / المستخدم / العامل', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(329, 1, 'ar', 'cruds', 'passport_no', 'رقم جواز السفر.', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(330, 1, 'ar', 'cruds', 'passenger_type', 'نوع المسافر', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(331, 1, 'ar', 'cruds', 'passenger_service', 'إستعلامات المسافرين', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(332, 1, 'ar', 'cruds', 'passenger_sale', 'تسعيرة المسافر', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(333, 1, 'ar', 'cruds', 'passenger_office', 'مكتب المسافر(الراكب)', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(334, 1, 'ar', 'cruds', 'destenition_office', 'مكتب  المقصود', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(335, 1, 'ar', 'cruds', 'middle_name', 'الاسم الوسطى', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(336, 1, 'ar', 'cruds', 'date_of_birth', 'تاريخ الميلاد', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(337, 1, 'ar', 'cruds', 'age', 'عمرالمسافر (الراكب)', '2023-02-12 20:24:49', '2023-03-26 14:02:57', NULL),
(338, 1, 'ar', 'cruds', 'father_name', 'اسم الأب', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(339, 1, 'ar', 'cruds', 'mother_name', 'اسم الأم', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(340, 1, 'ar', 'cruds', 'gender', 'جنس تذكير أو تأنيث', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(341, 1, 'ar', 'cruds', 'male', 'الذكر', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(342, 1, 'ar', 'cruds', 'female', 'أنثى', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(343, 1, 'ar', 'cruds', 'marital_status', 'الحالة الحالة الإجتماعية', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(344, 1, 'ar', 'cruds', 'married', 'متزوج', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(345, 1, 'ar', 'cruds', 'unmarried', 'اعزب', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(346, 1, 'ar', 'cruds', 'religion', 'ديانة', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(347, 1, 'ar', 'cruds', 'pic', 'صورة', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(348, 1, 'ar', 'cruds', 'picture', 'صورة', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(349, 1, 'ar', 'cruds', 'passenger_transaction', 'معاملة الركاب', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(350, 1, 'ar', 'cruds', 'contact_amount', 'مبلغ العقد المتفق', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(351, 1, 'ar', 'cruds', 'ledger_group', 'مجموعة دفتر الحسابات', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(352, 1, 'ar', 'cruds', 'ledger_group_name', 'اسم مجموعة دفتر الأستاذ', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(353, 1, 'ar', 'cruds', 'ledger_subgroup', 'مجموعة دفتر الأستاذ الفرعية', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(354, 1, 'ar', 'cruds', 'ledger_subgroup_name', 'اسم مجموعة دفتر الأستاذ الفرعية', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(355, 1, 'ar', 'cruds', 'ledger_head', 'رئيس ليدجر', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(356, 1, 'ar', 'cruds', 'ledger_head_name', 'اسم رئيس دفتر الأستاذ', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(357, 1, 'ar', 'cruds', 'receive_voucher', 'استلام القسيمة', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(358, 1, 'ar', 'cruds', 'customer_receive', 'تلقي العميل', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(359, 1, 'ar', 'cruds', 'office_ledger_receive', 'تلقي دفتر الأستاذ', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(360, 1, 'ar', 'cruds', 'receive_type', 'نوع الاستلام', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(361, 1, 'ar', 'cruds', 'currency', 'عملة', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(362, 1, 'ar', 'cruds', 'short_currency_name', 'اسم العملة القصيرة', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(363, 1, 'ar', 'cruds', 'full_currency_name', 'اسم العملة بالكامل', '2023-02-12 20:24:50', '2023-03-26 14:02:57', NULL),
(364, 1, 'ar', 'cruds', 'conversion_rate', 'معدل التحويل', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(365, 1, 'ar', 'cruds', 'base_amount', 'كمية أساسية', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(366, 1, 'ar', 'cruds', 'equivalent_amount', 'المبلغ المعادل', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(367, 1, 'ar', 'cruds', 'base_country', 'بلد القاعدة', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(368, 1, 'ar', 'cruds', 'equivalent_country', 'الدولة المعادلة', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(369, 1, 'ar', 'cruds', 'account_type', 'نوع الحساب', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(370, 1, 'ar', 'cruds', 'total_receiveble', 'إجمالي المبالغ المستحقة القبض', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(371, 1, 'ar', 'cruds', 'total_amount', 'المبلغ الإجمالي', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(372, 1, 'ar', 'cruds', 'total_dues', 'إجمالي المستحقات', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(373, 1, 'ar', 'cruds', 'total_receive', 'إجمالي الاستلام', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(374, 1, 'ar', 'cruds', 'account_head', 'رئيس الحساب', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(375, 1, 'ar', 'cruds', 'current_receive', 'الاستلام الحالي', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(376, 1, 'ar', 'cruds', 'inside_office', 'INSIDE OFFICE', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(377, 1, 'ar', 'cruds', 'outside_office', 'OUTSIDE OFFICE', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(378, 1, 'ar', 'cruds', 'test', 'امتحان', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(379, 1, 'bn', 'cruds', 'site_title', 'বিনআমির একাউন্ট', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(380, 1, 'bn', 'cruds', 'insert_message', 'তথ্য সন্নিবেশ সফল হয়েছে.', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(381, 1, 'bn', 'cruds', 'update_message', 'তথ্য আপডেট সফল হয়েছে।', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(382, 1, 'bn', 'cruds', 'delete_message', 'তথ্য মুছে ফেলা সফল হয়েছে', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(383, 1, 'bn', 'cruds', 'exist_message', 'ইতিমধ্যে এই তথ্য নেওয়া হয়েছে!', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(384, 1, 'bn', 'cruds', 'info_message', 'অনুগ্রহ করে পূর্বের সকল পেস্কেল নিষ্ক্রিয় করুন!', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(385, 1, 'bn', 'cruds', 'success_message', 'কাজটি সফল হইসে!', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(386, 1, 'bn', 'cruds', 'error_message', 'অপারেশন ব্যর্থ হয়েছে!', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(387, 1, 'bn', 'cruds', 'actions', 'অ্যাকশন', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(388, 1, 'bn', 'cruds', 'add', 'যুক্তকরণ', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(389, 1, 'bn', 'cruds', 'allRightsReserved', 'সমস্ত অধিকার সংরক্ষিত.', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(390, 1, 'bn', 'cruds', 'areYouSure', 'তুমি কি নিশ্চিত? i', '2023-02-12 20:24:51', '2023-03-26 14:02:57', NULL),
(391, 1, 'bn', 'cruds', 'clickHereToVerify', 'যাচাই করতে এখানে ক্লিক করুন', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(392, 1, 'bn', 'cruds', 'dashboard', 'ড্যাশবোর্ড', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(393, 1, 'bn', 'cruds', 'create', 'সৃষ্টি', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(394, 1, 'bn', 'cruds', 'delete', 'মুছে ফেলা', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(395, 1, 'bn', 'cruds', 'downloadFile', 'ডাউনলোড ফাইল', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(396, 1, 'bn', 'cruds', 'edit', 'সম্পাদনা করুন', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(397, 1, 'bn', 'cruds', 'emailVerificationSuccess', 'ব্যবহারকারীর ইমেল সফলভাবে যাচাই করা হয়েছে', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(398, 1, 'bn', 'cruds', 'entries', 'এন্ট্রি', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(399, 1, 'bn', 'cruds', 'filterDate', 'তারিখ অনুসারে ফিল্টার করুন', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(400, 1, 'bn', 'cruds', 'forgot_password', 'আপনি কি পাসওয়ার্ড ভুলে গেছেন?', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(401, 1, 'bn', 'cruds', 'home', 'বাড়ি', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(402, 1, 'bn', 'cruds', 'list', 'লিস্ট', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(403, 1, 'bn', 'cruds', 'login', 'প্রবেশ করুন', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(404, 1, 'bn', 'cruds', 'login_email', 'ইমেইল', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(405, 1, 'bn', 'cruds', 'login_password', 'পাসওয়ার্ড', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(406, 1, 'bn', 'cruds', 'login_password_confirmation', 'পাসওয়ার্ড নিশ্চিতকরণ', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(407, 1, 'bn', 'cruds', 'logout', 'প্রস্থান', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(408, 1, 'bn', 'cruds', 'month', 'মাস', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(409, 1, 'bn', 'cruds', 'no', 'না', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(410, 1, 'bn', 'cruds', 'pleaseSelect', 'অনুগ্রহ করে নির্বাচন করুন', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(411, 1, 'bn', 'cruds', 'register', 'নিবন্ধন', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(412, 1, 'bn', 'cruds', 'remember_me', 'আমাকে মনে কর', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(413, 1, 'bn', 'cruds', 'reset_password', 'পাসওয়ার্ড রিসেট করুন', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(414, 1, 'bn', 'cruds', 'save', 'জমা করো', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(415, 1, 'bn', 'cruds', 'search', 'সার্চ', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(416, 1, 'bn', 'cruds', 'searching', 'সার্চ', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(417, 1, 'bn', 'cruds', 'no_results', 'কোন ফলাফল নেই', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(418, 1, 'bn', 'cruds', 'results_could_not_be_loaded', 'ফলাফল লোড করা যায়নি', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(419, 1, 'bn', 'cruds', 'search_input_too_short', 'অনুগ্রহ করে লিখুন:গণনা বা আরও অক্ষর', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(420, 1, 'bn', 'cruds', 'show', 'প্রদর্শন', '2023-02-12 20:24:52', '2023-03-26 14:02:57', NULL),
(421, 1, 'bn', 'cruds', 'systemCalendar', 'ক্যালেন্ডার', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(422, 1, 'bn', 'cruds', 'thankYouForUsingOurApplication', 'আমাদের ওয়েবসাইট ব্যবহার করার জন্য আপনাকে ধন্যবাদ', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(423, 1, 'bn', 'cruds', 'timeFrom', 'থেকে', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(424, 1, 'bn', 'cruds', 'timeTo', 'প্রতি', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(425, 1, 'bn', 'cruds', 'toggleNavigation', 'নেভিগেশন টগল করুন', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(426, 1, 'bn', 'cruds', 'user_name', 'নাম', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(427, 1, 'bn', 'cruds', 'verifyYourEmail', 'আপনার ইমেল যাচাই করুন', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(428, 1, 'bn', 'cruds', 'verifyYourUser', 'আপনার নিবন্ধন শেষ করতে - সাইট আপনাকে আপনার ইমেল যাচাই করতে বলে', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(429, 1, 'bn', 'cruds', 'view', 'দেখুন', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(430, 1, 'bn', 'cruds', 'view_file', 'নথি দেখ', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(431, 1, 'bn', 'cruds', 'year', 'বছর', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(432, 1, 'bn', 'cruds', 'yes', 'হ্যাঁ', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(433, 1, 'bn', 'cruds', 'youAreLoggedIn', 'আপনি সংযুক্ত আছেন!', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(434, 1, 'bn', 'cruds', 'yourAccountNeedsAdminApproval', 'লগ ইন করার জন্য আপনার অ্যাকাউন্টগুলির একটি প্রশাসকের অনুমোদন প্রয়োজন৷', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(435, 1, 'bn', 'cruds', 'submit', 'সাবমিট', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(436, 1, 'bn', 'cruds', 'datatables.copy', 'কপি', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(437, 1, 'bn', 'cruds', 'datatables.csv', 'সিএসভি', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(438, 1, 'bn', 'cruds', 'datatables.excel', 'এক্সসেল', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(439, 1, 'bn', 'cruds', 'datatables.pdf', 'পিডিএফ', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(440, 1, 'bn', 'cruds', 'datatables.print', 'প্রিন্ট', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(441, 1, 'bn', 'cruds', 'datatables.colvis', 'কলাম দৃশ্যমানতা', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(442, 1, 'bn', 'cruds', 'datatables.delete', 'ডিলিট সিলেকটেড', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(443, 1, 'bn', 'cruds', 'datatables.zero_selected', 'কোন সারি নির্বাচন করা হয়নি', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(444, 1, 'bn', 'cruds', 'action', 'অ্যাকশন', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(445, 1, 'bn', 'cruds', 'action_id', 'অ্যাকশন আইডি', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(446, 1, 'bn', 'cruds', 'action_model', 'অ্যাকশন মডেল', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(447, 1, 'bn', 'cruds', 'address', 'ঠিকানা', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(448, 1, 'bn', 'cruds', 'administrator_can_create_other_users', 'প্রশাসক (অন্যান্য ব্যবহারকারী তৈরি করতে পারেন)', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(449, 1, 'bn', 'cruds', 'aggregate_function_use', 'ব্যবহার করার জন্য সমষ্টিগত ফাংশন', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(450, 1, 'bn', 'cruds', 'all', 'সব', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(451, 1, 'bn', 'cruds', 'all_messages', 'সব বার্তা', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(452, 1, 'bn', 'cruds', 'amount', 'পরিমাণ', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(453, 1, 'bn', 'cruds', 'answer', 'উত্তর', '2023-02-12 20:24:53', '2023-03-26 14:02:57', NULL),
(454, 1, 'bn', 'cruds', 'app_csv_file_to_import', 'আমদানি করার জন্য CSV ফাইল', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(455, 1, 'bn', 'cruds', 'app_csvImport', 'CSV আমদানি', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(456, 1, 'bn', 'cruds', 'app_file_contains_header_row', 'ফাইল হেডার সারি রয়েছে?', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(457, 1, 'bn', 'cruds', 'app_import_data', 'তথ্য আমদানি', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(458, 1, 'bn', 'cruds', 'app_imported_rows_to_table', 'আমদানি করা :সারি সারি থেকে :টেবিল টেবিল', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(459, 1, 'bn', 'cruds', 'app_parse_csv', 'CSV পার্স করুন', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL);
INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(460, 1, 'bn', 'cruds', 'asset', 'সম্পদ', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(461, 1, 'bn', 'cruds', 'assets', 'সম্পদ', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(462, 1, 'bn', 'cruds', 'assets_history', 'সম্পদের ইতিহাস', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(463, 1, 'bn', 'cruds', 'assets_management', 'সম্পদ ব্যবস্থাপনা', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(464, 1, 'bn', 'cruds', 'assigned_to', 'নির্ধারিত', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(465, 1, 'bn', 'cruds', 'assigned_user', 'বরাদ্দ (ব্যবহারকারী)', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(466, 1, 'bn', 'cruds', 'attachment', 'সংযুক্তি', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(467, 1, 'bn', 'cruds', 'axis', 'অক্ষ', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(468, 1, 'bn', 'cruds', 'back_to_list', 'ফিরে তালিকায়', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(469, 1, 'bn', 'cruds', 'basic_crm', 'বেসিক সিআরএম', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(470, 1, 'bn', 'cruds', 'budget', 'বাজেট', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(471, 1, 'bn', 'cruds', 'calendar_sources', 'ক্যালেন্ডার সূত্র', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(472, 1, 'bn', 'cruds', 'campaign', 'প্রচারণা', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(473, 1, 'bn', 'cruds', 'campaigns', 'প্রচারণা', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(474, 1, 'bn', 'cruds', 'categories', 'বিভাগ', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(475, 1, 'bn', 'cruds', 'category', 'বিভাগ', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(476, 1, 'bn', 'cruds', 'category_name', 'ব্যবহারকারীকে ইমেল বিজ্ঞপ্তি পাঠান', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(477, 1, 'bn', 'cruds', 'change_notifications_field_1_label', 'ব্যবহারকারীকে ইমেল বিজ্ঞপ্তি পাঠান', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(478, 1, 'bn', 'cruds', 'change_notifications_field_2_label', 'যখন CRUD এ প্রবেশ করুন', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(479, 1, 'bn', 'cruds', 'change_password', 'পাসওয়ার্ড পরিবর্তন করুন', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(480, 1, 'bn', 'cruds', 'chart_type', 'চার্টের ধরন', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(481, 1, 'bn', 'cruds', 'code', 'কোড', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(482, 1, 'bn', 'cruds', 'confirm', 'নিশ্চিত করুন', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(483, 1, 'bn', 'cruds', 'confirm_password', 'পাসওয়ার্ড নিশ্চিত করুন', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(484, 1, 'bn', 'cruds', 'contact_management', 'যোগাযোগ ব্যবস্থাপনা', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(485, 1, 'bn', 'cruds', 'contacts', 'পরিচিতি', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(486, 1, 'bn', 'cruds', 'content_management', 'কন্টেন্ট ম্যানেজমেন্ট', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(487, 1, 'bn', 'cruds', 'copy_paste_url_bellow', 'বোতাম, কপি এবং আপনার ওয়েব ব্রাউজারে নীচের URL পেস্ট করুন:', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(488, 1, 'bn', 'cruds', 'country', 'দেশ', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(489, 1, 'bn', 'cruds', 'coupon_management', 'কুপন ব্যবস্থাপনা', '2023-02-12 20:24:54', '2023-03-26 14:02:57', NULL),
(490, 1, 'bn', 'cruds', 'coupons', 'কুপন', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(491, 1, 'bn', 'cruds', 'coupons_amount', 'কুপন পরিমাণ', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(492, 1, 'bn', 'cruds', 'create_new_calendar_source', 'নতুন ক্যালেন্ডার উৎস তৈরি করুন', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(493, 1, 'bn', 'cruds', 'create_new_notification', 'নতুন বিজ্ঞপ্তি তৈরি করুন', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(494, 1, 'bn', 'cruds', 'create_new_report', 'নতুন প্রতিবেদন তৈরি করুন', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(495, 1, 'bn', 'cruds', 'created_at', 'এ নির্মিত', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(496, 1, 'bn', 'cruds', 'crud_date_field', 'ক্রুড ডেট ফিল্ড', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(497, 1, 'bn', 'cruds', 'crud_event_field', 'ইভেন্ট লেবেল ক্ষেত্র', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(498, 1, 'bn', 'cruds', 'crud_title', 'ক্রুড শিরোনাম', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(499, 1, 'bn', 'cruds', 'csv_file_to_import', 'আমদানি করার জন্য CSV ফাইল', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(500, 1, 'bn', 'cruds', 'csvImport', 'CSV আমদানি', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(501, 1, 'bn', 'cruds', 'current_password', 'বর্তমান পাসওয়ার্ড', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(502, 1, 'bn', 'cruds', 'custom_controller_index', 'কাস্টম কন্ট্রোলার সূচক।', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(503, 1, 'bn', 'cruds', 'customer', 'ক্রেতা', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(504, 1, 'bn', 'cruds', 'customers', 'গ্রাহকদের', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(505, 1, 'bn', 'cruds', 'deleted_at', 'এ মুছে ফেলা হয়েছে', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(506, 1, 'bn', 'cruds', 'description', 'বর্ণনা', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(507, 1, 'bn', 'cruds', 'deselect_all', 'সব গুলো অনির্বাচিত কর', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(508, 1, 'bn', 'cruds', 'discount_amount', 'হ্রাসকৃত মুল্য', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(509, 1, 'bn', 'cruds', 'discount_percent', 'ছাড় শতাংশ', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(510, 1, 'bn', 'cruds', 'due_date', 'নির্দিষ্ট তারিখ', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(511, 1, 'bn', 'cruds', 'edit_calendar_source', 'ক্যালেন্ডার উত্স সম্পাদনা করুন', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(512, 1, 'bn', 'cruds', 'email_greet', 'হ্যালো', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(513, 1, 'bn', 'cruds', 'email_line1', 'আপনি এই ইমেলটি পাচ্ছেন কারণ আমরা আপনার অ্যাকাউন্টের জন্য একটি পাসওয়ার্ড পুনরায় সেট করার অনুরোধ পেয়েছি৷', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(514, 1, 'bn', 'cruds', 'email_line2', 'আপনি যদি পাসওয়ার্ড রিসেট করার অনুরোধ না করে থাকেন, তাহলে আর কোনো পদক্ষেপের প্রয়োজন নেই।', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(515, 1, 'bn', 'cruds', 'email_regards', 'শুভেচ্ছা', '2023-02-12 20:24:55', '2023-03-26 14:02:57', NULL),
(516, 1, 'bn', 'cruds', 'end_time', 'শেষ সময়', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(517, 1, 'bn', 'cruds', 'entry_date', 'প্রবেশের তারিখ', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(518, 1, 'bn', 'cruds', 'excerpt', 'উদ্ধৃতি', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(519, 1, 'bn', 'cruds', 'faq_management', 'FAQ ব্যবস্থাপনা', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(520, 1, 'bn', 'cruds', 'featured_image', 'বৈশিষ্ট্যযুক্ত ইমেজ', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(521, 1, 'bn', 'cruds', 'fee_percent', 'ফি শতাংশ', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(522, 1, 'bn', 'cruds', 'file', 'ফাইল', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(523, 1, 'bn', 'cruds', 'file_contains_header_row', 'ফাইল হেডার সারি রয়েছে?', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(524, 1, 'bn', 'cruds', 'first_name', 'নামের প্রথম অংশ', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(525, 1, 'bn', 'cruds', 'group_by', 'দ্বারা গ্রুপ', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(526, 1, 'bn', 'cruds', 'if_you_are_having_trouble', 'আপনার যদি ক্লিক করতে সমস্যা হয়', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(527, 1, 'bn', 'cruds', 'import_data', 'তথ্য আমদানি', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(528, 1, 'bn', 'cruds', 'imported_rows_to_table', 'আমদানি করা :সারি সারি থেকে :টেবিল টেবিল', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(529, 1, 'bn', 'cruds', 'inbox', 'ইনবক্স', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(530, 1, 'bn', 'cruds', 'integer_float_placeholder', 'অনুগ্রহ করে পূর্ণসংখ্যা/ফ্লোট ক্ষেত্রগুলির মধ্যে একটি নির্বাচন করুন৷', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(531, 1, 'bn', 'cruds', 'is_created', 'সৃষ্ট', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(532, 1, 'bn', 'cruds', 'is_deleted', 'মুছে ফেলা হয়', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(533, 1, 'bn', 'cruds', 'is_updated', 'আপডেট করা হয়', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(534, 1, 'bn', 'cruds', 'label_field', 'লেবেল ক্ষেত্র', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(535, 1, 'bn', 'cruds', 'last_name', 'নামের শেষ অংশ', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(536, 1, 'bn', 'cruds', 'location', 'ঠিকানা', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(537, 1, 'bn', 'cruds', 'locations', 'অবস্থানসমূহ', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(538, 1, 'bn', 'cruds', 'main_currency', 'প্রধান মুদ্রা', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(539, 1, 'bn', 'cruds', 'message', 'বার্তা', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(540, 1, 'bn', 'cruds', 'messages', 'বার্তা', '2023-02-12 20:24:56', '2023-03-26 14:02:57', NULL),
(541, 1, 'bn', 'cruds', 'name', 'নাম', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(542, 1, 'bn', 'cruds', 'new_calendar_source', 'নতুন ক্যালেন্ডার উৎস তৈরি করুন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(543, 1, 'bn', 'cruds', 'new_message', 'নতুন বার্তা', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(544, 1, 'bn', 'cruds', 'new_password', 'নতুন পাসওয়ার্ড', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(545, 1, 'bn', 'cruds', 'no_calendar_sources', 'এখনো কোনো ক্যালেন্ডার সূত্র নেই।', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(546, 1, 'bn', 'cruds', 'no_entries_in_table', 'টেবিলে কোনো এন্ট্রি নেই', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(547, 1, 'bn', 'cruds', 'no_reports_yet', 'এখনও কোন রিপোর্ট.', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(548, 1, 'bn', 'cruds', 'not_approved_p', 'আপনার অ্যাকাউন্ট এখনও প্রশাসক দ্বারা অনুমোদিত নয়. অনুগ্রহ করে, ধৈর্য ধরুন এবং পরে আবার চেষ্টা করুন।', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(549, 1, 'bn', 'cruds', 'not_approved_title', 'আপনি অনুমোদিত নয়', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(550, 1, 'bn', 'cruds', 'note_text', 'নোট টেক্সট', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(551, 1, 'bn', 'cruds', 'notifications', 'বিজ্ঞপ্তি', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(552, 1, 'bn', 'cruds', 'notify_user', 'ব্যবহারকারীকে অবহিত করুন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(553, 1, 'bn', 'cruds', 'outbox', 'আউটবক্স', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(554, 1, 'bn', 'cruds', 'pages', 'পাতা', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(555, 1, 'bn', 'cruds', 'parse_csv', 'CSV পার্স করুন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(556, 1, 'bn', 'cruds', 'permadel', 'চিরতরে মুছে দাও', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(557, 1, 'bn', 'cruds', 'phone', 'ফোন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(558, 1, 'bn', 'cruds', 'phone1', 'ফোন 1', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(559, 1, 'bn', 'cruds', 'phone2', 'ফোন 2', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(560, 1, 'bn', 'cruds', 'photo', 'ছবি (সর্বোচ্চ 8mb)', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(561, 1, 'bn', 'cruds', 'photo1', 'ছবি ১', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(562, 1, 'bn', 'cruds', 'photo2', 'ছবি2', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(563, 1, 'bn', 'cruds', 'photo3', 'ছবি3', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(564, 1, 'bn', 'cruds', 'prefix', 'উপসর্গ', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(565, 1, 'bn', 'cruds', 'price', 'মূল্য', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(566, 1, 'bn', 'cruds', 'product_management', 'পণ্য ব্যবস্থাপনা', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(567, 1, 'bn', 'cruds', 'product_name', 'পণ্যের নাম', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(568, 1, 'bn', 'cruds', 'products', 'পণ্য', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(569, 1, 'bn', 'cruds', 'question', 'প্রশ্ন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(570, 1, 'bn', 'cruds', 'questions', 'প্রশ্ন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(571, 1, 'bn', 'cruds', 'recipient', 'প্রাপক', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(572, 1, 'bn', 'cruds', 'redeem_time', 'সময় খালাস', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(573, 1, 'bn', 'cruds', 'registration', 'নিবন্ধন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(574, 1, 'bn', 'cruds', 'remember_token', 'টোকেন মনে রাখবেন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(575, 1, 'bn', 'cruds', 'reply', 'উত্তর', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(576, 1, 'bn', 'cruds', 'reports_x_axis_field', 'X-অক্ষ - অনুগ্রহ করে তারিখ/সময় ক্ষেত্রগুলির মধ্যে একটি বেছে নিন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(577, 1, 'bn', 'cruds', 'reports_y_axis_field', 'Y-অক্ষ - অনুগ্রহ করে নম্বর ক্ষেত্রগুলির মধ্যে একটি বেছে নিন', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(578, 1, 'bn', 'cruds', 'reset_password_woops', '<strong>ওহো!</strong> ইনপুট নিয়ে সমস্যা ছিল:', '2023-02-12 20:24:57', '2023-03-26 14:02:57', NULL),
(579, 1, 'bn', 'cruds', 'restore', 'পুনরুদ্ধার করুন', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(580, 1, 'bn', 'cruds', 'sample_answer', 'নমুনা উত্তর', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(581, 1, 'bn', 'cruds', 'sample_category', 'নমুনা বিভাগ', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(582, 1, 'bn', 'cruds', 'sample_question', 'নমুনা প্রশ্ন', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(583, 1, 'bn', 'cruds', 'select_all', 'সবগুলো নির্বাচন করুন', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(584, 1, 'bn', 'cruds', 'select_crud_placeholder', 'আপনার একটি CRUD নির্বাচন করুন', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(585, 1, 'bn', 'cruds', 'select_dt_placeholder', 'তারিখ/সময় ক্ষেত্রগুলির মধ্যে একটি নির্বাচন করুন', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(586, 1, 'bn', 'cruds', 'select_users_placeholder', 'আপনার ব্যবহারকারীদের একজন নির্বাচন করুন', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(587, 1, 'bn', 'cruds', 'send', 'পাঠান', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(588, 1, 'bn', 'cruds', 'serial_number', 'ক্রমিক সংখ্যা', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(589, 1, 'bn', 'cruds', 'sl', '#', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(590, 1, 'bn', 'cruds', 'simple_user', 'সরল ব্যবহারকারী', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(591, 1, 'bn', 'cruds', 'skype', 'স্কাইপ', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(592, 1, 'bn', 'cruds', 'slug', 'স্লাগ', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(593, 1, 'bn', 'cruds', 'start_date', 'শুরুর তারিখ', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(594, 1, 'bn', 'cruds', 'start_time', 'সময় শুরু', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(595, 1, 'bn', 'cruds', 'status', 'অবস্থা', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(596, 1, 'bn', 'cruds', 'statuses', 'স্ট্যাটাস', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(597, 1, 'bn', 'cruds', 'stripe_transactions', 'স্ট্রাইপ লেনদেন', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(598, 1, 'bn', 'cruds', 'subject', 'বিষয়', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(599, 1, 'bn', 'cruds', 'subscription-billing', 'সদস্যতা', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(600, 1, 'bn', 'cruds', 'subscription-payments', 'পেমেন্ট', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(601, 1, 'bn', 'cruds', 'suffix', 'প্রত্যয়', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(602, 1, 'bn', 'cruds', 'tag', 'ট্যাগ', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(603, 1, 'bn', 'cruds', 'tags', 'ট্যাগ', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(604, 1, 'bn', 'cruds', 'task_management', 'কার্য ব্যবস্থাপনা', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(605, 1, 'bn', 'cruds', 'tasks', 'কাজ', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(606, 1, 'bn', 'cruds', 'team-management', 'দল', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(607, 1, 'bn', 'cruds', 'team-management-singular', 'টীম', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(608, 1, 'bn', 'cruds', 'text', 'পাঠ্য', '2023-02-12 20:24:58', '2023-03-26 14:02:57', NULL),
(609, 1, 'bn', 'cruds', 'there_were_problems_with_input', 'ইনপুট নিয়ে সমস্যা ছিল', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(610, 1, 'bn', 'cruds', 'time', 'সময়', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(611, 1, 'bn', 'cruds', 'title', 'শিরোনাম', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(612, 1, 'bn', 'cruds', 'transaction_date', 'লেনদেন তারিখ', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(613, 1, 'bn', 'cruds', 'trash', 'আবর্জনা', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(614, 1, 'bn', 'cruds', 'update', 'হালনাগাদ', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(615, 1, 'bn', 'cruds', 'updated_at', 'এ আপডেট', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(616, 1, 'bn', 'cruds', 'upgrade_to_premium', 'প্রিমিয়ামে আপগ্রেড করুন', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(617, 1, 'bn', 'cruds', 'user_actions', 'ব্যবহারকারীর ক্রিয়াকলাপ', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(618, 1, 'bn', 'cruds', 'valid_from', 'বৈধ হবে', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(619, 1, 'bn', 'cruds', 'valid_to', 'বৈধ', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(620, 1, 'bn', 'cruds', 'website', 'ওয়েবসাইট', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(621, 1, 'bn', 'cruds', 'when_crud', 'যখন CRUD', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(622, 1, 'bn', 'cruds', 'whoops', 'উফফফ!', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(623, 1, 'bn', 'cruds', 'x_axis_field', 'এক্স-অক্ষ ক্ষেত্র (তারিখ/সময়)', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(624, 1, 'bn', 'cruds', 'x_axis_group_by', 'এক্স-অক্ষ গ্রুপ দ্বারা', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(625, 1, 'bn', 'cruds', 'y_axis_field', 'Y-অক্ষ ক্ষেত্র', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(626, 1, 'bn', 'cruds', 'you_have_no_messages', 'আপনার কোন বার্তা নেই', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(627, 1, 'bn', 'cruds', 'content', 'বিষয়বস্তু', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(628, 1, 'bn', 'cruds', 'no_alerts', 'কোনো সতর্কতা নেই', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(629, 1, 'bn', 'cruds', 'calendar', 'ক্যালেন্ডার', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(630, 1, 'bn', 'cruds', 'messenger', 'বার্তাবাহক', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(631, 1, 'bn', 'cruds', 'select', '--নির্বাচন  করুন--', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(632, 1, 'bn', 'cruds', 'financial_year', 'আর্থিক বছর', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(633, 1, 'bn', 'cruds', 'from_month', 'মাস থেকে', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(634, 1, 'bn', 'cruds', 'to_month', 'মাস থেকে', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(635, 1, 'bn', 'cruds', 'date', 'তারিখ', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(636, 1, 'bn', 'cruds', 'generate', 'উৎপন্ন', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(637, 1, 'bn', 'cruds', 'from', 'থেকে', '2023-02-12 20:24:59', '2023-03-26 14:02:57', NULL),
(638, 1, 'bn', 'cruds', 'to', 'প্রতি', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(639, 1, 'bn', 'cruds', 'browse', 'ব্রাউজ করুন', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(640, 1, 'bn', 'cruds', 'thumbnail', 'থাম্বনেইল', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(641, 1, 'bn', 'cruds', 'access', 'অ্যাক্সেস', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(642, 1, 'bn', 'cruds', 'generalSettings', 'সাধারণ সেটিংস', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(643, 1, 'bn', 'cruds', 'userManagement', 'ইউজার ম্যানেজমেন্ট', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(644, 1, 'bn', 'cruds', 'menu', 'তালিকা', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(645, 1, 'bn', 'cruds', 'menu_name', 'মেনু নাম', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(646, 1, 'bn', 'cruds', 'menu_link', 'মেনু লিঙ্ক', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(647, 1, 'bn', 'cruds', 'menu_icon', 'মেনু আইকন', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(648, 1, 'bn', 'cruds', 'parent_menu', 'অভিভাবক মেনু', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(649, 1, 'bn', 'cruds', 'order_no', 'আদেশ নং', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(650, 1, 'bn', 'cruds', 'role', 'ভূমিকা', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(651, 1, 'bn', 'cruds', 'permissions', 'অনুমতি', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(652, 1, 'bn', 'cruds', 'user', 'ব্যবহারকারী', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(653, 1, 'bn', 'cruds', 'branch_id', 'শাখা', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(654, 1, 'bn', 'cruds', 'email', 'ইমেইল', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(655, 1, 'bn', 'cruds', 'password', 'পাসওয়ার্ড', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(656, 1, 'bn', 'cruds', 'roles', 'ভূমিকা', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(657, 1, 'bn', 'cruds', 'language', 'ভাষা', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(658, 1, 'bn', 'cruds', 'country_name', 'দেশের নাম', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(659, 1, 'bn', 'cruds', 'country_code', 'দেশের কোড', '2023-02-12 20:25:00', '2023-03-26 14:02:57', NULL),
(660, 1, 'bn', 'cruds', 'division', 'বিভাগ', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(661, 1, 'bn', 'cruds', 'division_name', 'বিভাগের নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(662, 1, 'bn', 'cruds', 'district', 'জেলা', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(663, 1, 'bn', 'cruds', 'district_name', 'জেলার নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(664, 1, 'bn', 'cruds', 'bank', 'ব্যাঙ্ক', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(665, 1, 'bn', 'cruds', 'bank_name', 'ব্যাংকের নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(666, 1, 'bn', 'cruds', 'branch_name', 'ব্রাঞ্চের নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(667, 1, 'bn', 'cruds', 'bank_account', 'ব্যাঙ্ক একাউন্ট', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(668, 1, 'bn', 'cruds', 'account_no', 'একাউন্ট নং', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(669, 1, 'bn', 'cruds', 'account_name', 'একাউন্টের নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(670, 1, 'bn', 'cruds', 'companies', 'কোম্পানি', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(671, 1, 'bn', 'cruds', 'company', 'প্রতিষ্ঠান', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(672, 1, 'bn', 'cruds', 'company_name', 'প্রতিষ্ঠানের নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(673, 1, 'bn', 'cruds', 'email_address', 'ইমেইল এড্রেস', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(674, 1, 'bn', 'cruds', 'company_address', 'কোম্পানির ঠিকানা', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(675, 1, 'bn', 'cruds', 'company_logo', 'লোগো', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(676, 1, 'bn', 'cruds', 'office', 'অফিস', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(677, 1, 'bn', 'cruds', 'office_short_name', 'অফিসার সংক্ষিপ্ত নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(678, 1, 'bn', 'cruds', 'office_name', 'অফিসার নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(679, 1, 'bn', 'cruds', 'owner_name', 'মালিকের নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(680, 1, 'bn', 'cruds', 'registration_no', 'রেজিস্ট্রেশন নং', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(681, 1, 'bn', 'cruds', 'registration_date', 'রেজিস্ট্রেশনের তারিখ', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(682, 1, 'bn', 'cruds', 'no_of_recruitment_statement', 'রিক্রুইটমেন্ট স্টেটমেন্ট নং', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(683, 1, 'bn', 'cruds', 'no_of_delegate', 'ডেলিগেট  নং', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(684, 1, 'bn', 'cruds', 'region_type_id', 'রিজিওন টাইপ', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(685, 1, 'bn', 'cruds', 'sponsor', 'স্পনসর', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(686, 1, 'bn', 'cruds', 'sponsor_name', 'স্পন্সরের নাম', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(687, 1, 'bn', 'cruds', 'contact_no', 'যোগাযোগের নং', '2023-02-12 20:25:01', '2023-03-26 14:02:57', NULL),
(688, 1, 'bn', 'cruds', 'optional_contact_no', 'অতিরিক্ত যোগাযোগের নং', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(689, 1, 'bn', 'cruds', 'relation', 'সম্পর্ক', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(690, 1, 'bn', 'cruds', 'nid_no', 'এনআইডি নং', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(691, 1, 'bn', 'cruds', 'nid_first_page', 'এনআইডি প্রথম পৃষ্ঠা', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(692, 1, 'bn', 'cruds', 'nid_second_page', 'এনআইডি দ্বিতীয় পৃষ্ঠা', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(693, 1, 'bn', 'cruds', 'profile_photo', 'প্রোফাইল ছবি', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(694, 1, 'bn', 'cruds', 'sponsor_visa', 'স্পনসর ভিসা', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(695, 1, 'bn', 'cruds', 'visa_no', 'ভিসা নং', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(696, 1, 'bn', 'cruds', 'visa_cost', 'ভিসা কস্ট', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(697, 1, 'bn', 'cruds', 'agent', 'এজেন্ট', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(698, 1, 'bn', 'cruds', 'agent_name', 'এজেন্ট নাম', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(699, 1, 'bn', 'cruds', 'agency', 'এজেন্সী', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(700, 1, 'bn', 'cruds', 'agency_name', 'এজেন্সির নাম', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(701, 1, 'bn', 'cruds', 'visa_type', 'ভিসার ধরণ', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(702, 1, 'bn', 'cruds', 'type_name', 'ভিসার ধরণের নাম', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(703, 1, 'bn', 'cruds', 'passenger', 'যাত্রী', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(704, 1, 'bn', 'cruds', 'passenger_id', 'যাত্রী/সেবা আইডি', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(705, 1, 'bn', 'cruds', 'service_name', 'কাজের নাম', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(706, 1, 'bn', 'cruds', 'passenger_service_name', 'যাত্রী/সেবার নাম', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(707, 1, 'bn', 'cruds', 'passport_no', 'পাসপোর্ট নং', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(708, 1, 'bn', 'cruds', 'passenger_type', 'যাত্রীর ধরণ', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(709, 1, 'bn', 'cruds', 'passenger_service', 'যাত্রী / ওয়ার্কার  সেবা', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(710, 1, 'bn', 'cruds', 'passenger_sale', 'যাত্রী / ওয়ার্কার পাঠানো', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(711, 1, 'bn', 'cruds', 'passenger_office', 'যাত্রীর অফিস', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(712, 1, 'bn', 'cruds', 'destenition_office', 'যাত্রী গন্তব্য অফিস', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(713, 1, 'bn', 'cruds', 'middle_name', 'নামের  মধ্য অংশ', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(714, 1, 'bn', 'cruds', 'date_of_birth', 'জন্ম তারিখ', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(715, 1, 'bn', 'cruds', 'age', 'বয়স', '2023-02-12 20:25:02', '2023-03-26 14:02:57', NULL),
(716, 1, 'bn', 'cruds', 'father_name', 'বাবার নাম', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(717, 1, 'bn', 'cruds', 'mother_name', 'মায়ের নাম', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(718, 1, 'bn', 'cruds', 'gender', 'লিঙ্গ', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(719, 1, 'bn', 'cruds', 'male', 'পুরুষ', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(720, 1, 'bn', 'cruds', 'female', 'মহিলা', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(721, 1, 'bn', 'cruds', 'marital_status', 'বৈবাহিক অবস্থা', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(722, 1, 'bn', 'cruds', 'married', 'বিবাহিত', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(723, 1, 'bn', 'cruds', 'unmarried', 'অবিবাহিত', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(724, 1, 'bn', 'cruds', 'religion', 'ধর্ম', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(725, 1, 'bn', 'cruds', 'pic', 'ছবি', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(726, 1, 'bn', 'cruds', 'picture', 'ছবি', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(727, 1, 'bn', 'cruds', 'passenger_transaction', 'যাত্রীর সাথে লেনদেন', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(728, 1, 'bn', 'cruds', 'contact_amount', 'যাত্রীর চুক্তিবদ্ধ টাকা', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(729, 1, 'bn', 'cruds', 'ledger_group', 'লেজার গ্রুপ', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(730, 1, 'bn', 'cruds', 'ledger_group_name', 'লেজার গ্রুপের নাম', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(731, 1, 'bn', 'cruds', 'ledger_subgroup', 'লেজার সাব-গ্রুপ', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(732, 1, 'bn', 'cruds', 'ledger_subgroup_name', 'লেজার সাব-গ্রুপের নাম', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(733, 1, 'bn', 'cruds', 'ledger_head', 'লেজার হেড', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(734, 1, 'bn', 'cruds', 'ledger_head_name', 'লেজার হেডের নাম', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(735, 1, 'bn', 'cruds', 'receive_voucher', 'রিসিভ ভাউচার', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(736, 1, 'bn', 'cruds', 'customer_receive', 'কাস্টমার রিসিভ', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(737, 1, 'bn', 'cruds', 'office_ledger_receive', 'অফিস লেজার রিসিভ', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(738, 1, 'bn', 'cruds', 'receive_type', 'রিসিভ টাইপ', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(739, 1, 'bn', 'cruds', 'currency', 'মুদ্রা', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(740, 1, 'bn', 'cruds', 'short_currency_name', 'মুদ্রার সংক্ষিপ্ত নাম', '2023-02-12 20:25:03', '2023-03-26 14:02:57', NULL),
(741, 1, 'bn', 'cruds', 'full_currency_name', 'মুদ্রার পুরা নাম', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(742, 1, 'bn', 'cruds', 'conversion_rate', 'মুদ্রার হার', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(743, 1, 'bn', 'cruds', 'base_amount', 'বেস পরিমাণ', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(744, 1, 'bn', 'cruds', 'equivalent_amount', 'সমমূল্য পরিমান', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(745, 1, 'bn', 'cruds', 'base_country', 'বেস কান্ট্রি', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(746, 1, 'bn', 'cruds', 'equivalent_country', 'সমতুল্য দেশ', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(747, 1, 'bn', 'cruds', 'account_type', 'একাউন্ট টাইপ', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(748, 1, 'bn', 'cruds', 'total_receiveble', 'মোট পাওনা', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(749, 1, 'bn', 'cruds', 'total_amount', 'মোট পরিমান', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(750, 1, 'bn', 'cruds', 'total_dues', 'মোট বাকী', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(751, 1, 'bn', 'cruds', 'total_receive', 'মোট পেয়েছি', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(752, 1, 'bn', 'cruds', 'account_head', 'একাউন্ট হেড', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(753, 1, 'bn', 'cruds', 'current_receive', 'বর্তমান নিচ্ছি', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(754, 1, 'bn', 'cruds', 'inside_office', 'INSIDE OFFICE', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(755, 1, 'bn', 'cruds', 'outside_office', 'OUTSIDE OFFICE', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(756, 1, 'bn', 'cruds', 'test', 'টেস্ট', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(757, 1, 'en', 'cruds', 'site_title', 'Binameer Accounts', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(758, 1, 'en', 'cruds', 'insert_message', 'Information insert successfull.', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(759, 1, 'en', 'cruds', 'update_message', 'Information update successfull.', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(760, 1, 'en', 'cruds', 'delete_message', 'Information delete successfull.', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(761, 1, 'en', 'cruds', 'exist_message', 'This information has already been taken!', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(762, 1, 'en', 'cruds', 'info_message', 'Please inactive previous all payscale!', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(763, 1, 'en', 'cruds', 'success_message', 'Operation Successfull!', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(764, 1, 'en', 'cruds', 'error_message', 'Operation Failed!', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(765, 1, 'en', 'cruds', 'setup_success_message', 'Setup Successful', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(766, 1, 'en', 'cruds', 'setup_failed_message', 'Setup Failed!', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(767, 1, 'en', 'cruds', 'actions', 'Actions', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(768, 1, 'en', 'cruds', 'add', 'Add', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(769, 1, 'en', 'cruds', 'allRightsReserved', 'All rights reserved.', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(770, 1, 'en', 'cruds', 'areYouSure', 'Are you sure?', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(771, 1, 'en', 'cruds', 'clickHereToVerify', 'Click here to verify', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(772, 1, 'en', 'cruds', 'create', 'Create', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(773, 1, 'en', 'cruds', 'dashboard', 'Dashboard', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(774, 1, 'en', 'cruds', 'delete', 'Delete', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(775, 1, 'en', 'cruds', 'downloadFile', 'Download file', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(776, 1, 'en', 'cruds', 'edit', 'Edit', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(777, 1, 'en', 'cruds', 'emailVerificationSuccess', 'User email verified successfully', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(778, 1, 'en', 'cruds', 'entries', 'Entries', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(779, 1, 'en', 'cruds', 'filterDate', 'Filter by date', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(780, 1, 'en', 'cruds', 'forgot_password', 'Forgot your password?', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(781, 1, 'en', 'cruds', 'home', 'Home', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(782, 1, 'en', 'cruds', 'list', 'List', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(783, 1, 'en', 'cruds', 'login', 'Login', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(784, 1, 'en', 'cruds', 'login_email', 'Email', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(785, 1, 'en', 'cruds', 'login_password', 'Password', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(786, 1, 'en', 'cruds', 'login_password_confirmation', 'Password confirmation', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(787, 1, 'en', 'cruds', 'logout', 'Logout', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(788, 1, 'en', 'cruds', 'month', 'Month', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(789, 1, 'en', 'cruds', 'no', 'No', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(790, 1, 'en', 'cruds', 'pleaseSelect', 'Please select', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(791, 1, 'en', 'cruds', 'register', 'Register', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(792, 1, 'en', 'cruds', 'remember_me', 'Remember me', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(793, 1, 'en', 'cruds', 'reset_password', 'Reset Password', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(794, 1, 'en', 'cruds', 'save', 'Save', '2023-02-12 20:25:05', '2023-03-26 14:02:57', NULL),
(795, 1, 'en', 'cruds', 'search', 'Search', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(796, 1, 'en', 'cruds', 'searching', 'Searching', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(797, 1, 'en', 'cruds', 'no_results', 'No results', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(798, 1, 'en', 'cruds', 'results_could_not_be_loaded', 'The results could not be loaded', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(799, 1, 'en', 'cruds', 'search_input_too_short', 'Please enter :count or more characters', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(800, 1, 'en', 'cruds', 'show', 'Show', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(801, 1, 'en', 'cruds', 'systemCalendar', 'Calendar', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(802, 1, 'en', 'cruds', 'thankYouForUsingOurApplication', 'Thank you for using our website', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(803, 1, 'en', 'cruds', 'timeFrom', 'From', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(804, 1, 'en', 'cruds', 'timeTo', 'To', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(805, 1, 'en', 'cruds', 'toggleNavigation', 'Toggle navigation', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(806, 1, 'en', 'cruds', 'user_name', 'Name', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(807, 1, 'en', 'cruds', 'verifyYourEmail', 'Please verify your email', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(808, 1, 'en', 'cruds', 'verifyYourUser', 'To finish your registration - site asks you to verify your email', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(809, 1, 'en', 'cruds', 'view', 'View', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(810, 1, 'en', 'cruds', 'view_file', 'View file', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(811, 1, 'en', 'cruds', 'year', 'Year', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(812, 1, 'en', 'cruds', 'yes', 'Yes', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(813, 1, 'en', 'cruds', 'youAreLoggedIn', 'You are logged in!', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(814, 1, 'en', 'cruds', 'yourAccountNeedsAdminApproval', 'Your accounts needs an administrator approval in order to log in', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(815, 1, 'en', 'cruds', 'submit', 'Submit', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(816, 1, 'en', 'cruds', 'datatables.copy', 'Copy', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(817, 1, 'en', 'cruds', 'datatables.csv', 'CSV', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(818, 1, 'en', 'cruds', 'datatables.excel', 'Excel', '2023-02-12 20:25:06', '2023-03-26 14:02:57', NULL),
(819, 1, 'en', 'cruds', 'datatables.pdf', 'PDF', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(820, 1, 'en', 'cruds', 'datatables.print', 'Print', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(821, 1, 'en', 'cruds', 'datatables.colvis', 'Column visibility', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(822, 1, 'en', 'cruds', 'datatables.delete', 'Delete selected', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(823, 1, 'en', 'cruds', 'datatables.zero_selected', 'No rows selected', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(824, 1, 'en', 'cruds', 'action', 'Action', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(825, 1, 'en', 'cruds', 'action_id', 'Action id', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(826, 1, 'en', 'cruds', 'action_model', 'Action model', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(827, 1, 'en', 'cruds', 'address', 'Address', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(828, 1, 'en', 'cruds', 'administrator_can_create_other_users', 'Administrator (can create other users)', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(829, 1, 'en', 'cruds', 'aggregate_function_use', 'Aggregate function to use', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(830, 1, 'en', 'cruds', 'all', 'All', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(831, 1, 'en', 'cruds', 'all_messages', 'All Messages', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(832, 1, 'en', 'cruds', 'amount', 'Amount', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(833, 1, 'en', 'cruds', 'answer', 'Answer', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(834, 1, 'en', 'cruds', 'app_csv_file_to_import', 'CSV file to import', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(835, 1, 'en', 'cruds', 'app_csvImport', 'CSV Import', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(836, 1, 'en', 'cruds', 'app_file_contains_header_row', 'File contains header row?', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(837, 1, 'en', 'cruds', 'app_import_data', 'Import data', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(838, 1, 'en', 'cruds', 'app_imported_rows_to_table', 'Imported :rows rows to :table table', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(839, 1, 'en', 'cruds', 'app_parse_csv', 'Parse CSV', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(840, 1, 'en', 'cruds', 'asset', 'Asset', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(841, 1, 'en', 'cruds', 'assets', 'Assets', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(842, 1, 'en', 'cruds', 'assets_history', 'Assets history', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(843, 1, 'en', 'cruds', 'assets_management', 'Assets management', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(844, 1, 'en', 'cruds', 'assigned_to', 'Assigned to', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(845, 1, 'en', 'cruds', 'assigned_user', 'Assigned (user)', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(846, 1, 'en', 'cruds', 'attachment', 'Attachment', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(847, 1, 'en', 'cruds', 'axis', 'Axis', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(848, 1, 'en', 'cruds', 'back_to_list', 'Back to list', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(849, 1, 'en', 'cruds', 'basic_crm', 'Basic CRM', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(850, 1, 'en', 'cruds', 'budget', 'Budget', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(851, 1, 'en', 'cruds', 'calendar_sources', 'Calendar sources', '2023-02-12 20:25:07', '2023-03-26 14:02:57', NULL),
(852, 1, 'en', 'cruds', 'campaign', 'Campaign', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(853, 1, 'en', 'cruds', 'campaigns', 'Campaigns', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(854, 1, 'en', 'cruds', 'categories', 'Categories', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(855, 1, 'en', 'cruds', 'category', 'Category', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(856, 1, 'en', 'cruds', 'category_name', 'Category name', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(857, 1, 'en', 'cruds', 'change_notifications_field_1_label', 'Send email notification to User', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(858, 1, 'en', 'cruds', 'change_notifications_field_2_label', 'When Entry on CRUD', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(859, 1, 'en', 'cruds', 'change_password', 'Change password', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(860, 1, 'en', 'cruds', 'chart_type', 'Chart type', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(861, 1, 'en', 'cruds', 'code', 'Code', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(862, 1, 'en', 'cruds', 'confirm', 'Confirm', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(863, 1, 'en', 'cruds', 'confirm_password', 'Confirm password', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(864, 1, 'en', 'cruds', 'contact_management', 'Contact management', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(865, 1, 'en', 'cruds', 'contacts', 'Contacts', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(866, 1, 'en', 'cruds', 'content_management', 'Content management', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(867, 1, 'en', 'cruds', 'copy_paste_url_bellow', 'button, copy and paste the URL below into your web browser:', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(868, 1, 'en', 'cruds', 'country', 'Country', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(869, 1, 'en', 'cruds', 'coupon_management', 'Coupon Management', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(870, 1, 'en', 'cruds', 'coupons', 'Coupons', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(871, 1, 'en', 'cruds', 'coupons_amount', 'Coupons amount', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(872, 1, 'en', 'cruds', 'create_new_calendar_source', 'Create new Calendar Source', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(873, 1, 'en', 'cruds', 'create_new_notification', 'Create new Notification', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(874, 1, 'en', 'cruds', 'create_new_report', 'Create new report', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(875, 1, 'en', 'cruds', 'created_at', 'Created at', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(876, 1, 'en', 'cruds', 'crud_date_field', 'Crud date field', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(877, 1, 'en', 'cruds', 'crud_event_field', 'Event label field', '2023-02-12 20:25:08', '2023-03-26 14:02:57', NULL),
(878, 1, 'en', 'cruds', 'crud_title', 'Crud title', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(879, 1, 'en', 'cruds', 'csv_file_to_import', 'CSV file to import', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(880, 1, 'en', 'cruds', 'csvImport', 'CSV Import', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(881, 1, 'en', 'cruds', 'current_password', 'Current password', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(882, 1, 'en', 'cruds', 'custom_controller_index', 'Custom controller index.', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(883, 1, 'en', 'cruds', 'customer', 'Customer', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(884, 1, 'en', 'cruds', 'customers', 'Customers', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(885, 1, 'en', 'cruds', 'deleted_at', 'Deleted at', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(886, 1, 'en', 'cruds', 'description', 'Description', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(887, 1, 'en', 'cruds', 'deselect_all', 'Deselect all', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(888, 1, 'en', 'cruds', 'discount_amount', 'Discount amount', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(889, 1, 'en', 'cruds', 'discount_percent', 'Discount percent', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(890, 1, 'en', 'cruds', 'due_date', 'Due date', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(891, 1, 'en', 'cruds', 'edit_calendar_source', 'Edit Calendar Source', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(892, 1, 'en', 'cruds', 'email_greet', 'Hello', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(893, 1, 'en', 'cruds', 'email_line1', 'You are receiving this email because we received a password reset request for your account.', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(894, 1, 'en', 'cruds', 'email_line2', 'If you did not request a password reset, no further action is required.', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(895, 1, 'en', 'cruds', 'email_regards', 'Regards', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(896, 1, 'en', 'cruds', 'end_time', 'End time', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(897, 1, 'en', 'cruds', 'entry_date', 'Entry date', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(898, 1, 'en', 'cruds', 'excerpt', 'Excerpt', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(899, 1, 'en', 'cruds', 'faq_management', 'FAQ Management', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(900, 1, 'en', 'cruds', 'featured_image', 'Featured image', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(901, 1, 'en', 'cruds', 'fee_percent', 'Fee percent', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(902, 1, 'en', 'cruds', 'file', 'File', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(903, 1, 'en', 'cruds', 'file_contains_header_row', 'File contains header row?', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(904, 1, 'en', 'cruds', 'first_name', 'First Name', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(905, 1, 'en', 'cruds', 'group_by', 'Group by', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(906, 1, 'en', 'cruds', 'if_you_are_having_trouble', 'If you’re having trouble clicking the', '2023-02-12 20:25:09', '2023-03-26 14:02:57', NULL),
(907, 1, 'en', 'cruds', 'import_data', 'Import data', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(908, 1, 'en', 'cruds', 'imported_rows_to_table', 'Imported :rows rows to :table table', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(909, 1, 'en', 'cruds', 'inbox', 'Inbox', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(910, 1, 'en', 'cruds', 'integer_float_placeholder', 'Please select one of integer/float fields', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(911, 1, 'en', 'cruds', 'is_created', 'is created', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(912, 1, 'en', 'cruds', 'is_deleted', 'is deleted', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(913, 1, 'en', 'cruds', 'is_updated', 'is updated', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(914, 1, 'en', 'cruds', 'label_field', 'Label field', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(915, 1, 'en', 'cruds', 'last_name', 'Last Name', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(916, 1, 'en', 'cruds', 'location', 'Address', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL);
INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(917, 1, 'en', 'cruds', 'locations', 'Locations', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(918, 1, 'en', 'cruds', 'main_currency', 'Main currency', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(919, 1, 'en', 'cruds', 'message', 'Message', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(920, 1, 'en', 'cruds', 'messages', 'Messages', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(921, 1, 'en', 'cruds', 'name', 'Name', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(922, 1, 'en', 'cruds', 'new_calendar_source', 'Create new calendar source', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(923, 1, 'en', 'cruds', 'new_message', 'New message', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(924, 1, 'en', 'cruds', 'new_password', 'New password', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(925, 1, 'en', 'cruds', 'no_calendar_sources', 'No calendar sources yet.', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(926, 1, 'en', 'cruds', 'no_entries_in_table', 'No entries in table', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(927, 1, 'en', 'cruds', 'no_reports_yet', 'No reports yet.', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(928, 1, 'en', 'cruds', 'not_approved_p', 'Your account is still not approved by administrator. Please, be patient and try again later.', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(929, 1, 'en', 'cruds', 'not_approved_title', 'You are not approved', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(930, 1, 'en', 'cruds', 'note_text', 'Note text', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(931, 1, 'en', 'cruds', 'notifications', 'Notifications', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(932, 1, 'en', 'cruds', 'notify_user', 'Notify User', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(933, 1, 'en', 'cruds', 'outbox', 'Outbox', '2023-02-12 20:25:10', '2023-03-26 14:02:57', NULL),
(934, 1, 'en', 'cruds', 'pages', 'Pages', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(935, 1, 'en', 'cruds', 'parse_csv', 'Parse CSV', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(936, 1, 'en', 'cruds', 'permadel', 'Delete Permanently', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(937, 1, 'en', 'cruds', 'phone', 'Phone', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(938, 1, 'en', 'cruds', 'phone1', 'Phone 1', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(939, 1, 'en', 'cruds', 'phone2', 'Phone 2', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(940, 1, 'en', 'cruds', 'photo', 'Photo (max 8mb)', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(941, 1, 'en', 'cruds', 'photo1', 'Photo1', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(942, 1, 'en', 'cruds', 'photo2', 'Photo2', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(943, 1, 'en', 'cruds', 'photo3', 'Photo3', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(944, 1, 'en', 'cruds', 'prefix', 'Prefix', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(945, 1, 'en', 'cruds', 'price', 'Price', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(946, 1, 'en', 'cruds', 'product_management', 'Product management', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(947, 1, 'en', 'cruds', 'product_name', 'Product name', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(948, 1, 'en', 'cruds', 'products', 'Products', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(949, 1, 'en', 'cruds', 'question', 'Question', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(950, 1, 'en', 'cruds', 'questions', 'Questions', '2023-02-12 20:25:11', '2023-03-26 14:02:57', NULL),
(951, 1, 'en', 'cruds', 'recipient', 'Recipient', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(952, 1, 'en', 'cruds', 'redeem_time', 'Redeem time', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(953, 1, 'en', 'cruds', 'registration', 'Registration', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(954, 1, 'en', 'cruds', 'remember_token', 'Remember token', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(955, 1, 'en', 'cruds', 'reply', 'Reply', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(956, 1, 'en', 'cruds', 'reports_x_axis_field', 'X-axis - please choose one of date/time fields', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(957, 1, 'en', 'cruds', 'reports_y_axis_field', 'Y-axis - please choose one of number fields', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(958, 1, 'en', 'cruds', 'reset_password_woops', '<strong>Whoops!</strong> There were problems with input:', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(959, 1, 'en', 'cruds', 'restore', 'Restore', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(960, 1, 'en', 'cruds', 'sample_answer', 'Sample answer', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(961, 1, 'en', 'cruds', 'sample_category', 'Sample category', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(962, 1, 'en', 'cruds', 'sample_question', 'Sample question', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(963, 1, 'en', 'cruds', 'select_all', 'Select all', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(964, 1, 'en', 'cruds', 'select_crud_placeholder', 'Please select one of your CRUDs', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(965, 1, 'en', 'cruds', 'select_dt_placeholder', 'Please select one of date/time fields', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(966, 1, 'en', 'cruds', 'select_users_placeholder', 'Please select one of your Users', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(967, 1, 'en', 'cruds', 'send', 'Send', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(968, 1, 'en', 'cruds', 'serial_number', 'Serial number', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(969, 1, 'en', 'cruds', 'sl', '#', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(970, 1, 'en', 'cruds', 'simple_user', 'Simple user', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(971, 1, 'en', 'cruds', 'skype', 'Skype', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(972, 1, 'en', 'cruds', 'slug', 'Slug', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(973, 1, 'en', 'cruds', 'start_date', 'Start date', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(974, 1, 'en', 'cruds', 'start_time', 'Start time', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(975, 1, 'en', 'cruds', 'status', 'Status', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(976, 1, 'en', 'cruds', 'statuses', 'Statuses', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(977, 1, 'en', 'cruds', 'stripe_transactions', 'Stripe Transactions', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(978, 1, 'en', 'cruds', 'subject', 'Subject', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(979, 1, 'en', 'cruds', 'subscription-billing', 'Subscriptions', '2023-02-12 20:25:12', '2023-03-26 14:02:57', NULL),
(980, 1, 'en', 'cruds', 'subscription-payments', 'Payments', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(981, 1, 'en', 'cruds', 'suffix', 'Sufix', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(982, 1, 'en', 'cruds', 'tag', 'Tag', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(983, 1, 'en', 'cruds', 'tags', 'Tags', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(984, 1, 'en', 'cruds', 'task_management', 'Task management', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(985, 1, 'en', 'cruds', 'tasks', 'Tasks', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(986, 1, 'en', 'cruds', 'team-management', 'Teams', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(987, 1, 'en', 'cruds', 'team-management-singular', 'Team', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(988, 1, 'en', 'cruds', 'text', 'Text', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(989, 1, 'en', 'cruds', 'there_were_problems_with_input', 'There were problems with input', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(990, 1, 'en', 'cruds', 'time', 'Time', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(991, 1, 'en', 'cruds', 'title', 'Title', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(992, 1, 'en', 'cruds', 'transaction_date', 'Transaction date', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(993, 1, 'en', 'cruds', 'trash', 'Trash', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(994, 1, 'en', 'cruds', 'update', 'Update', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(995, 1, 'en', 'cruds', 'updated_at', 'Updated at', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(996, 1, 'en', 'cruds', 'upgrade_to_premium', 'Upgrade to Premium', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(997, 1, 'en', 'cruds', 'user_actions', 'User actions', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(998, 1, 'en', 'cruds', 'valid_from', 'Valid from', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(999, 1, 'en', 'cruds', 'valid_to', 'Valid to', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1000, 1, 'en', 'cruds', 'website', 'Website', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1001, 1, 'en', 'cruds', 'when_crud', 'When CRUD', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1002, 1, 'en', 'cruds', 'whoops', 'Whoops!', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1003, 1, 'en', 'cruds', 'x_axis_field', 'X-axis field (date/time)', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1004, 1, 'en', 'cruds', 'x_axis_group_by', 'X-axis group by', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1005, 1, 'en', 'cruds', 'y_axis_field', 'Y-axis field', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1006, 1, 'en', 'cruds', 'you_have_no_messages', 'You have no messages.', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1007, 1, 'en', 'cruds', 'content', 'Content', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1008, 1, 'en', 'cruds', 'no_alerts', 'No alerts', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1009, 1, 'en', 'cruds', 'calendar', 'Calendar', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1010, 1, 'en', 'cruds', 'messenger', 'Messenger', '2023-02-12 20:25:13', '2023-03-26 14:02:57', NULL),
(1011, 1, 'en', 'cruds', 'select', '--Select--', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1012, 1, 'en', 'cruds', 'financial_year', 'Financial Year', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1013, 1, 'en', 'cruds', 'from_month', 'From Month', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1014, 1, 'en', 'cruds', 'to_month', 'To Month', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1015, 1, 'en', 'cruds', 'date', 'Date', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1016, 1, 'en', 'cruds', 'generate', 'Generate', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1017, 1, 'en', 'cruds', 'from', 'From', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1018, 1, 'en', 'cruds', 'to', 'To', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1019, 1, 'en', 'cruds', 'browse', 'Browse', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1020, 1, 'en', 'cruds', 'thumbnail', 'Thumbnail', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1021, 1, 'en', 'cruds', 'access', 'Access', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1022, 1, 'en', 'cruds', 'generalSettings', 'General Settings', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1023, 1, 'en', 'cruds', 'userManagement', 'User management', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1024, 1, 'en', 'cruds', 'menu', 'Menu', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1025, 1, 'en', 'cruds', 'menu_name', 'Menu Name', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1026, 1, 'en', 'cruds', 'menu_link', 'Menu Link', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1027, 1, 'en', 'cruds', 'menu_icon', 'Menu Icon', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1028, 1, 'en', 'cruds', 'parent_menu', 'Parent Menu', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1029, 1, 'en', 'cruds', 'order_no', 'Order No', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1030, 1, 'en', 'cruds', 'role', 'Role', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1031, 1, 'en', 'cruds', 'permissions', 'Permissions', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1032, 1, 'en', 'cruds', 'user', 'User', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1033, 1, 'en', 'cruds', 'branch_id', 'Branch', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1034, 1, 'en', 'cruds', 'email', 'Email', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1035, 1, 'en', 'cruds', 'password', 'Password', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1036, 1, 'en', 'cruds', 'roles', 'Roles', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1037, 1, 'en', 'cruds', 'language', 'Language', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1038, 1, 'en', 'cruds', 'country_name', 'Country Name', '2023-02-12 20:25:14', '2023-03-26 14:02:57', NULL),
(1039, 1, 'en', 'cruds', 'country_code', 'Country Code', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1040, 1, 'en', 'cruds', 'division', 'Division', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1041, 1, 'en', 'cruds', 'division_name', 'Division Name', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1042, 1, 'en', 'cruds', 'district', 'District', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1043, 1, 'en', 'cruds', 'district_name', 'District Name', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1044, 1, 'en', 'cruds', 'bank', 'Bank', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1045, 1, 'en', 'cruds', 'bank_name', 'Bank Name', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1046, 1, 'en', 'cruds', 'branch_name', 'Branch Name', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1047, 1, 'en', 'cruds', 'bank_account', 'Bank Account', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1048, 1, 'en', 'cruds', 'account_no', 'Account No', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1049, 1, 'en', 'cruds', 'account_name', 'Account Name', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1050, 1, 'en', 'cruds', 'companies', 'Companies', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1051, 1, 'en', 'cruds', 'company', 'Company', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1052, 1, 'en', 'cruds', 'company_name', 'Company name', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1053, 1, 'en', 'cruds', 'email_address', 'Email Address', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1054, 1, 'en', 'cruds', 'company_address', 'Company Address', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1055, 1, 'en', 'cruds', 'company_logo', 'logo', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1056, 1, 'en', 'cruds', 'office', 'Office', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1057, 1, 'en', 'cruds', 'office_short_name', 'Office Short Name', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1058, 1, 'en', 'cruds', 'office_name', 'Office Name', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1059, 1, 'en', 'cruds', 'owner_name', 'Owner Name', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1060, 1, 'en', 'cruds', 'registration_no', 'Reg. No.', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1061, 1, 'en', 'cruds', 'registration_date', 'Reg. Date', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1062, 1, 'en', 'cruds', 'no_of_recruitment_statement', 'Recruitment Statement No', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1063, 1, 'en', 'cruds', 'no_of_delegate', 'No of Delegate', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1064, 1, 'en', 'cruds', 'region_type_id', 'Region Type', '2023-02-12 20:25:15', '2023-03-26 14:02:57', NULL),
(1065, 1, 'en', 'cruds', 'sponsor', 'Sponsor', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1066, 1, 'en', 'cruds', 'sponsor_name', 'Sponsor Name', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1067, 1, 'en', 'cruds', 'contact_no', 'Contact No.', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1068, 1, 'en', 'cruds', 'optional_contact_no', 'Optional Contact No.', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1069, 1, 'en', 'cruds', 'relation', 'Relation', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1070, 1, 'en', 'cruds', 'nid_no', 'NID No.', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1071, 1, 'en', 'cruds', 'nid_first_page', 'NID First Page', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1072, 1, 'en', 'cruds', 'nid_second_page', 'NID Second Page', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1073, 1, 'en', 'cruds', 'profile_photo', 'Profile Photo', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1074, 1, 'en', 'cruds', 'sponsor_visa', 'Sponsor VISA', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1075, 1, 'en', 'cruds', 'visa_no', 'VISA No', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1076, 1, 'en', 'cruds', 'visa_cost', 'VISA Cost', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1077, 1, 'en', 'cruds', 'agent', 'Agent', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1078, 1, 'en', 'cruds', 'agent_name', 'Agent Name', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1079, 1, 'en', 'cruds', 'agency', 'Agency', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1080, 1, 'en', 'cruds', 'agency_name', 'Agency Name', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1081, 1, 'en', 'cruds', 'visa_type', 'Visa Type', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1082, 1, 'en', 'cruds', 'type_name', 'Type Name', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1083, 1, 'en', 'cruds', 'passenger', 'Passenger', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1084, 1, 'en', 'cruds', 'passenger_id', 'ID', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1085, 1, 'en', 'cruds', 'service_name', 'Service Name', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1086, 1, 'en', 'cruds', 'passenger_service_name', 'Passenger/Service Name', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1087, 1, 'en', 'cruds', 'passport_no', 'Passport No.', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1088, 1, 'en', 'cruds', 'passenger_type', 'Passenger Type', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1089, 1, 'en', 'cruds', 'passenger_service', 'Passenger Service', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1090, 1, 'en', 'cruds', 'passenger_sale', 'Passenger Sale', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1091, 1, 'en', 'cruds', 'passenger_office', 'Passenger Office', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1092, 1, 'en', 'cruds', 'destenition_office', 'Destenition Office', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1093, 1, 'en', 'cruds', 'middle_name', 'Middle Name', '2023-02-12 20:25:16', '2023-03-26 14:02:57', NULL),
(1094, 1, 'en', 'cruds', 'date_of_birth', 'DOB', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1095, 1, 'en', 'cruds', 'age', 'Age', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1096, 1, 'en', 'cruds', 'father_name', 'Father Name', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1097, 1, 'en', 'cruds', 'mother_name', 'Mother Name', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1098, 1, 'en', 'cruds', 'gender', 'Gender', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1099, 1, 'en', 'cruds', 'male', 'Male', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1100, 1, 'en', 'cruds', 'female', 'Female', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1101, 1, 'en', 'cruds', 'marital_status', 'Marital Status', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1102, 1, 'en', 'cruds', 'married', 'Married', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1103, 1, 'en', 'cruds', 'unmarried', 'Unmarried', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1104, 1, 'en', 'cruds', 'religion', 'Religion', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1105, 1, 'en', 'cruds', 'pic', 'Pic', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1106, 1, 'en', 'cruds', 'picture', 'Picture', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1107, 1, 'en', 'cruds', 'passenger_transaction', 'Passenger Transaction', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1108, 1, 'en', 'cruds', 'contact_amount', 'Contact Amount', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1109, 1, 'en', 'cruds', 'ledger_group', 'Ledger Group', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1110, 1, 'en', 'cruds', 'ledger_group_name', 'Ledger Group Name', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1111, 1, 'en', 'cruds', 'ledger_subgroup', 'Ledger SubGroup', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1112, 1, 'en', 'cruds', 'ledger_subgroup_name', 'Ledger SubGroup Name', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1113, 1, 'en', 'cruds', 'ledger_head', 'Ledger Head', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1114, 1, 'en', 'cruds', 'ledger_head_name', 'Ledger Head Name', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1115, 1, 'en', 'cruds', 'receive_voucher', 'Receive Voucher', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1116, 1, 'en', 'cruds', 'customer_receive', 'Customer Receive', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1117, 1, 'en', 'cruds', 'office_ledger_receive', 'Office Ledger Receive', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1118, 1, 'en', 'cruds', 'receive_type', 'Receive Type', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1119, 1, 'en', 'cruds', 'currency', 'Currency', '2023-02-12 20:25:17', '2023-03-26 14:02:57', NULL),
(1120, 1, 'en', 'cruds', 'short_currency_name', 'Short Currency Name', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1121, 1, 'en', 'cruds', 'full_currency_name', 'Full Currency Name', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1122, 1, 'en', 'cruds', 'conversion_rate', 'Conversion Rate', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1123, 1, 'en', 'cruds', 'base_amount', 'Base Amount', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1124, 1, 'en', 'cruds', 'equivalent_amount', 'Equivalent Amount', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1125, 1, 'en', 'cruds', 'base_country', 'Base Country', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1126, 1, 'en', 'cruds', 'equivalent_country', 'Equivalent Country', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1127, 1, 'en', 'cruds', 'account_type', 'Account Type', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1128, 1, 'en', 'cruds', 'total_receiveble', 'Total Receiveble', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1129, 1, 'en', 'cruds', 'total_amount', 'Total Amount', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1130, 1, 'en', 'cruds', 'total_dues', 'Total Dues', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1131, 1, 'en', 'cruds', 'total_receive', 'Total Receive', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1132, 1, 'en', 'cruds', 'total_received_amount', 'Total Received Amount', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1133, 1, 'en', 'cruds', 'total_dues_amount', 'Total Dues Amount', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1134, 1, 'en', 'cruds', 'account_head', 'Account Head', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1135, 1, 'en', 'cruds', 'current_receive', 'Current Receive', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1136, 1, 'en', 'cruds', 'user_role', 'User Role', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1137, 1, 'en', 'cruds', 'user_list', 'User List', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1138, 1, 'en', 'cruds', 'account_group', 'A/C Group', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1139, 1, 'en', 'cruds', 'account_subgroup', 'A/C SubGroup', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1140, 1, 'en', 'cruds', 'remarks', 'Remarks', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1141, 1, 'en', 'cruds', 'inside_office', 'IN-SIDE OFFICE', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1142, 1, 'en', 'cruds', 'outside_office', 'OUT-SIDE OFFICE', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1143, 1, 'en', 'cruds', 'required_field_message', 'Please, fillup the required fields.', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1144, 1, 'en', 'cruds', 'voucher_no', 'Voucher No', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1145, 1, 'en', 'cruds', 'receive_amount', 'Receive Amount', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1146, 1, 'en', 'cruds', 'received_from', 'Received From', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1147, 1, 'en', 'cruds', 'payment_to', 'Payment To', '2023-02-12 20:25:18', '2023-03-26 14:02:57', NULL),
(1148, 1, 'ar', 'cruds', 'inside_office', 'IN-SIDE OFFICE', '2023-02-13 22:26:24', '2023-03-26 14:02:57', NULL),
(1149, 1, 'bn', 'cruds', 'outside_office', 'আউট-সাইড অফিস', '2023-02-13 22:28:19', '2023-03-26 14:02:57', NULL),
(1150, 1, 'bn', 'cruds', 'inside_office', 'ইন-সাইড অফিস', '2023-02-13 22:29:27', '2023-03-26 14:02:57', NULL),
(1151, 1, 'ar', 'cruds', 'destenition_office', 'مكتب وصول العامل  | لدي الكفيل', '2023-02-14 14:23:30', '2023-03-26 14:02:57', NULL),
(1152, 1, 'ar', 'cruds', 'sponsor', 'إسم الكفيل | الراعي', '2023-02-14 14:25:08', '2023-03-26 14:02:57', NULL),
(1153, 1, 'ar', 'cruds', 'visa_no', 'حالة التأشيرة', '2023-02-14 14:26:14', '2023-03-26 14:02:57', NULL),
(1154, 1, 'ar', 'cruds', 'country', 'اسم الدولة', '2023-02-14 14:35:05', '2023-03-26 14:02:57', NULL),
(1155, 1, 'ar', 'cruds', 'district_name', 'اسم المنطقة | المدينة', '2023-02-14 14:35:50', '2023-03-26 14:02:57', NULL),
(1156, 1, 'ar', 'cruds', 'division', 'إسم المنطقة | المدينة', '2023-02-14 14:38:04', '2023-03-26 14:02:57', NULL),
(1157, 1, 'ar', 'cruds', 'district', 'إسم الحي | القرية', '2023-02-14 14:39:28', '2023-03-26 14:02:57', NULL),
(1158, 1, 'ar', 'cruds', 'region_type_id', 'مكان المحاسبة | مكتب خارجي او داخلي', '2023-02-14 14:41:33', '2023-03-26 14:02:57', NULL),
(1159, 1, 'ar', 'cruds', 'outside_office', 'مكتب خارجي | KSA', '2023-02-14 14:47:35', '2023-03-26 14:02:57', NULL),
(1160, 1, 'ar', 'cruds', 'datatables.csv', 'سعر العملة', '2023-02-14 14:48:29', '2023-03-26 14:02:57', NULL),
(1161, 1, 'ar', 'cruds', 'home', 'مكان الاقامة', '2023-02-14 14:49:11', '2023-03-26 14:02:57', NULL),
(1162, 1, 'ar', 'cruds', 'add', 'إضافة', '2023-02-14 14:49:36', '2023-03-26 14:02:57', NULL),
(1163, 1, 'ar', 'cruds', 'create', 'إضافة', '2023-02-14 14:50:14', '2023-03-26 14:02:57', NULL),
(1164, 1, 'ar', 'cruds', 'basic_crm', 'أساسي نظام إدارة علاقات العملاء', '2023-02-14 14:57:13', '2023-03-26 14:02:57', NULL),
(1165, 1, 'ar', 'cruds', 'phone', 'الهاتف التواصل', '2023-02-14 14:58:28', '2023-03-26 14:02:57', NULL),
(1166, 1, 'ar', 'cruds', 'phone1', 'الهاتف  التواصل 2', '2023-02-14 14:59:11', '2023-03-26 14:02:57', NULL),
(1167, 1, 'ar', 'cruds', 'phone2', 'الهاتف التواصل الاجتماعي', '2023-02-14 15:00:14', '2023-03-26 14:02:57', NULL),
(1168, 1, 'ar', 'cruds', 'prefix', 'بدية العملية', '2023-02-14 15:03:52', '2023-03-26 14:02:57', NULL),
(1169, 1, 'ar', 'cruds', 'submit', 'إضافة', '2023-02-14 15:06:47', '2023-03-26 14:02:57', NULL),
(1170, 1, 'ar', 'cruds', 'division_name', 'إضافة  الحي | القرية', '2023-02-14 15:19:08', '2023-03-26 14:02:57', NULL),
(1171, 1, 'ar', 'cruds', 'district_name', 'اسم المنطقة | المدينة 1', '2023-02-14 15:21:48', '2023-03-26 14:02:57', NULL),
(1172, 1, 'ar', 'cruds', 'district_name', 'اسم الحي | القرية', '2023-02-14 15:23:05', '2023-03-26 14:02:57', NULL),
(1173, 1, 'ar', 'cruds', 'location', 'عنوان المكتب', '2023-02-14 15:24:56', '2023-03-26 14:02:57', NULL),
(1174, 1, 'ar', 'cruds', 'location', 'العنوان', '2023-02-14 15:27:01', '2023-03-26 14:02:57', NULL),
(1175, 1, 'ar', 'cruds', 'bank', 'حساب البنك', '2023-02-14 15:30:02', '2023-03-26 14:02:57', NULL),
(1176, 1, 'ar', 'cruds', 'office', 'إضافة اسم المكتب', '2023-02-14 15:35:59', '2023-03-26 14:02:57', NULL),
(1177, 1, 'ar', 'cruds', 'optional_contact_no', 'رقم جهة الاتصال االاضافي', '2023-02-14 15:37:10', '2023-03-26 14:02:57', NULL),
(1178, 1, 'ar', 'cruds', 'address', 'إضافة العموان', '2023-02-14 15:38:13', '2023-03-26 14:02:57', NULL),
(1179, 1, 'ar', 'cruds', 'address', 'إضافة العنوان', '2023-02-14 15:39:10', '2023-03-26 14:02:57', NULL),
(1180, 1, 'ar', 'cruds', 'profile_photo', 'صورة الشخصي', '2023-02-14 15:41:13', '2023-03-26 14:02:57', NULL),
(1181, 1, 'ar', 'cruds', 'visa_no', 'رقم التأشيرة', '2023-02-14 15:44:44', '2023-03-26 14:02:57', NULL),
(1182, 1, 'ar', 'cruds', 'passenger_sale', 'إضافة بيانات المسافر', '2023-02-14 15:51:52', '2023-03-26 14:02:57', NULL),
(1183, 1, 'ar', 'cruds', 'middle_name', 'الاسم الأب', '2023-02-14 15:53:18', '2023-03-26 14:02:57', NULL),
(1184, 1, 'ar', 'cruds', 'last_name', 'إسم العائلة | الكنية', '2023-02-14 15:54:20', '2023-03-26 14:02:57', NULL),
(1185, 1, 'ar', 'cruds', 'father_name', 'كتابة اسم بالكامل بالعربي |', '2023-02-14 15:57:24', '2023-03-26 14:02:57', NULL),
(1186, 1, 'ar', 'cruds', 'father_name', 'كتابة اسم بالكامل بالأنجليزي |', '2023-02-14 15:58:44', '2023-03-26 14:02:57', NULL),
(1187, 1, 'bn', 'cruds', 'father_name', 'আরবীতে পুরো নাম লিখুন', '2023-02-14 16:00:47', '2023-03-26 14:02:57', NULL),
(1188, 1, 'ar', 'cruds', 'passenger_office', 'مكتب المسافر(الراكب) الخارجي', '2023-02-14 16:03:35', '2023-03-26 14:02:57', NULL),
(1189, 1, 'ar', 'cruds', 'agent', 'غسم الوكيل  | المندوب', '2023-02-14 16:06:22', '2023-03-26 14:02:57', NULL),
(1190, 1, 'ar', 'cruds', 'agent_name', 'اسم الوكيل1', '2023-02-14 16:07:31', '2023-03-26 14:02:57', NULL),
(1191, 1, 'ar', 'cruds', 'agency_name', 'اسم مكتب الخارجي', '2023-02-14 16:08:39', '2023-03-26 14:02:57', NULL),
(1192, 1, 'ar', 'cruds', 'agency', 'اسم المكتب الخارجي', '2023-02-14 16:09:42', '2023-03-26 14:02:57', NULL),
(1193, 1, 'ar', 'cruds', 'agent', 'اسم الوكيل  | المندوب', '2023-02-14 16:11:03', '2023-03-26 14:02:57', NULL),
(1194, 1, 'ar', 'cruds', 'passenger_transaction', 'جدول عمليات محاسبة |  العامل | المسافر', '2023-02-14 16:16:13', '2023-03-26 14:02:57', NULL),
(1195, 1, 'ar', 'cruds', 'passenger_office', 'مكتب المسافر(العامل) الخارجي', '2023-02-14 16:16:46', '2023-03-26 14:02:57', NULL),
(1196, 1, 'ar', 'cruds', 'age', 'عمرالمسافر | العامل', '2023-02-14 16:17:33', '2023-03-26 14:02:57', NULL),
(1197, 1, 'ar', 'cruds', 'current_receive', 'استلام المبلغ الحالي 1', '2023-02-14 16:46:37', '2023-03-26 14:02:57', NULL),
(1198, 1, 'ar', 'cruds', 'account_head', 'الحساب الرئيسي', '2023-02-14 16:54:14', '2023-03-26 14:02:57', NULL),
(1199, 1, 'ar', 'cruds', 'account_head', 'قائمة | فروع الفواتير', '2023-02-14 16:54:20', '2023-03-26 14:02:57', NULL),
(1200, 1, 'ar', 'cruds', 'outside_office', 'مكاتب الخارجية  | الأقليمية', '2023-02-14 17:25:55', '2023-03-26 14:02:57', NULL),
(1201, 1, 'ar', 'cruds', 'inside_office', 'مكاتب الداخلية | السعودية', '2023-02-14 17:27:35', '2023-03-26 14:02:57', NULL),
(1202, 1, 'ar', 'cruds', 'save', 'حفظ', '2023-02-14 17:47:25', '2023-03-26 14:02:57', NULL),
(1203, 1, 'ar', 'cruds', 'agent_name', 'إسم الوكلاء | والمناديب', '2023-02-14 18:09:36', '2023-03-26 14:02:57', NULL),
(1204, 1, 'ar', 'cruds', 'office', 'إضافة مكتب التحصيل', '2023-02-14 18:13:47', '2023-03-26 14:02:57', NULL),
(1205, 1, 'ar', 'cruds', 'agency', 'اسم المكتب الخارجي 1', '2023-02-14 18:18:21', '2023-03-26 14:02:57', NULL),
(1206, 1, 'ar', 'cruds', 'agency_name', 'قائمة الوكلاء | المناديب', '2023-02-14 18:20:23', '2023-03-26 14:02:57', NULL),
(1207, 1, 'ar', 'cruds', 'nid_no', 'رقم الهوية الوطنية', '2023-02-14 18:22:16', '2023-03-26 14:02:57', NULL),
(1208, 1, 'ar', 'cruds', 'ledger_group_name', 'قائمة إضافة المدفوعات', '2023-02-14 18:34:04', '2023-03-26 14:02:57', NULL),
(1209, 1, 'ar', 'cruds', 'agency', 'قائمة الوكلاء | المناديب', '2023-02-14 19:23:30', '2023-03-26 14:02:57', NULL),
(1210, 1, 'ar', 'cruds', 'setup_success_message', 'تم الإعداد بنجاح', '2023-02-14 19:27:28', '2023-03-26 14:02:57', NULL),
(1211, 1, 'ar', 'cruds', 'setup_failed_message', 'فشل الإعداد!', '2023-02-14 19:28:04', '2023-03-26 14:02:57', NULL),
(1212, 1, 'bn', 'cruds', 'setup_failed_message', 'সেটআপ ব্যর্থ হয়েছে!', '2023-02-14 19:28:36', '2023-03-26 14:02:57', NULL),
(1213, 1, 'ar', 'cruds', 'total_received_amount', 'إجمالي المبلغ المستلم', '2023-02-14 19:29:14', '2023-03-26 14:02:57', NULL),
(1214, 1, 'bn', 'cruds', 'total_received_amount', 'মোট প্রাপ্ত পরিমাণ', '2023-02-14 19:29:37', '2023-03-26 14:02:57', NULL),
(1215, 1, 'ar', 'cruds', 'total_dues_amount', 'إجمالي مبلغ المستحقات', '2023-02-14 19:30:13', '2023-03-26 14:02:57', NULL),
(1216, 1, 'bn', 'cruds', 'total_dues_amount', 'মোট বকেয়া পরিমাণ', '2023-02-14 19:30:31', '2023-03-26 14:02:57', NULL),
(1217, 1, 'ar', 'cruds', 'user_role', 'قائمة المستخدم', '2023-02-14 19:31:07', '2023-03-26 14:02:57', NULL),
(1218, 1, 'bn', 'cruds', 'user_role', 'ব্যবহারকারীর তালিকা', '2023-02-14 19:31:40', '2023-03-26 14:02:57', NULL),
(1219, 1, 'ar', 'cruds', 'user_role', 'دور المستخدم', '2023-02-14 19:33:28', '2023-03-26 14:02:57', NULL),
(1220, 1, 'bn', 'cruds', 'user_role', 'ব্যবহারকারীর ভূমিকা', '2023-02-14 19:33:50', '2023-03-26 14:02:57', NULL),
(1221, 1, 'ar', 'cruds', 'user_list', 'قائمة المستخدم', '2023-02-14 19:34:32', '2023-03-26 14:02:57', NULL),
(1222, 1, 'bn', 'cruds', 'user_list', 'ব্যবহারকারীর তালিকা', '2023-02-14 19:34:55', '2023-03-26 14:02:57', NULL),
(1223, 1, 'ar', 'cruds', 'account_group', 'قائمة |  جدول الحسابات تحصيل | استرداد', '2023-02-14 19:40:47', '2023-03-26 14:02:57', NULL),
(1224, 1, 'ar', 'cruds', 'account_subgroup', 'قائمة | جدول الحسابات المكاتب | التحصيل | واسترداد', '2023-02-14 19:42:06', '2023-03-26 14:02:57', NULL),
(1225, 1, 'ar', 'cruds', 'remarks', 'ملاحظات', '2023-02-14 19:44:02', '2023-03-26 14:02:57', NULL),
(1226, 1, 'ar', 'cruds', 'required_field_message', 'من فضلك ، املأ الحقول المطلوبة.', '2023-02-14 19:44:50', '2023-03-26 14:02:57', NULL),
(1227, 1, 'ar', 'cruds', 'voucher_no', 'رقم الفاتورة', '2023-02-14 19:45:42', '2023-03-26 14:02:57', NULL),
(1228, 1, 'ar', 'cruds', 'receive_amount', 'استلام المبلغ', '2023-02-14 19:46:12', '2023-03-26 14:02:57', NULL),
(1229, 1, 'ar', 'cruds', 'received_from', 'تم الاستلام من', '2023-02-14 19:47:02', '2023-03-26 14:02:57', NULL),
(1230, 1, 'ar', 'cruds', 'payment_to', 'تم الدفع الي', '2023-02-14 19:48:02', '2023-03-26 14:02:57', NULL),
(1231, 1, 'bn', 'cruds', 'setup_success_message', 'সফল সেটআপ', '2023-02-14 19:49:02', '2023-03-26 14:02:57', NULL),
(1232, 1, 'ar', 'cruds', 'customer_receive', 'تحصيل من العميل', '2023-02-14 19:51:39', '2023-03-26 14:02:57', NULL),
(1233, 1, 'ar', 'cruds', 'office_ledger_receive', 'تحصيل المكتب', '2023-02-14 19:53:50', '2023-03-26 14:02:57', NULL),
(1234, 1, 'ar', 'cruds', 'ledger_head_name', 'قائمة مصروفات', '2023-02-14 20:20:55', '2023-03-26 14:02:57', NULL),
(1235, 1, 'ar', 'cruds', 'ledger_subgroup_name', 'قائمة المصروفات الفرعية', '2023-02-14 20:24:06', '2023-03-26 14:02:57', NULL),
(1236, 1, 'ar', 'cruds', 'ledger_subgroup', 'قائمة مصروفات الفرعية', '2023-02-14 20:26:03', '2023-03-26 14:02:57', NULL),
(1237, 1, 'ar', 'cruds', 'ledger_group', 'قائمة | المصروفات | استلامات', '2023-02-14 20:28:50', '2023-03-26 14:02:57', NULL),
(1238, 1, 'en', 'cruds', 'acl', 'Access Control Level', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(1239, 1, 'en', 'cruds', 'entry_office', 'Entry Office', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(1240, 1, 'ar', 'cruds', 'acl', 'مستوى التحكم في الوصول', '2023-02-15 18:37:34', '2023-03-26 14:02:57', NULL),
(1241, 1, 'bn', 'cruds', 'acl', 'এক্সেস কন্ট্রোল লেভেল', '2023-02-15 21:11:31', '2023-03-26 14:02:57', NULL),
(1242, 1, 'ar', 'cruds', 'entry_office', 'مكتب الدخول', '2023-02-15 21:12:13', '2023-03-26 14:02:57', NULL),
(1243, 1, 'bn', 'cruds', 'entry_office', 'এন্ট্রি অফিস', '2023-02-15 21:13:16', '2023-03-26 14:02:57', NULL),
(1244, 1, 'en', 'cruds', 'customer_expense', 'Customer Expense', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(1245, 1, 'en', 'cruds', 'office_ledger_expense', 'Office Ledger Expense', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(1246, 1, 'en', 'cruds', 'payment_voucher', 'Payment Voucher', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(1247, 1, 'en', 'cruds', 'cash', 'Cash', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(1248, 1, 'ar', 'cruds', 'cash', 'مبلغ النقدي', '2023-02-17 13:03:32', '2023-03-26 14:02:57', NULL),
(1249, 1, 'en', 'cruds', 'from_date', 'From Date', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(1250, 1, 'en', 'cruds', 'to_date', 'To Date', '2023-02-12 20:25:04', '2023-03-26 14:02:57', NULL),
(1251, 1, 'en', 'cruds', 'office_addess', 'Office Addess', '2023-02-12 20:24:38', '2023-03-26 14:02:57', NULL),
(1252, 1, 'ar', 'cruds', 'customer_expense', 'مصاريف العميل', '2023-02-18 13:55:34', '2023-03-26 14:02:57', NULL),
(1253, 1, 'ar', 'cruds', 'office_addess', 'عنوان المكتب', '2023-02-18 13:56:32', '2023-03-26 14:02:57', NULL),
(1254, 1, 'bn', 'cruds', 'office_addess', 'অফিসের ঠিকানা', '2023-02-18 13:59:37', '2023-03-26 14:02:57', NULL),
(1255, 1, 'ar', 'cruds', 'office_ledger_expense', 'مصروفات عامة', '2023-02-18 14:22:38', '2023-03-26 14:02:57', NULL),
(1256, 1, 'ar', 'cruds', 'payment_voucher', 'دفع الفواتير', '2023-02-18 14:25:16', '2023-03-26 14:02:57', NULL),
(1257, 1, 'ar', 'cruds', 'from_date', 'من التاريخ', '2023-02-18 14:26:49', '2023-03-26 14:02:57', NULL),
(1258, 1, 'ar', 'cruds', 'to_date', 'الي تاريخ', '2023-02-18 14:28:15', '2023-03-26 14:02:57', NULL),
(1259, 1, 'bn', 'cruds', 'to_date', 'এখন পর্যন্ত', '2023-02-19 17:14:59', '2023-03-26 14:02:57', NULL),
(1260, 1, 'bn', 'cruds', 'from_date', 'তারিখ হইতে', '2023-02-19 17:15:41', '2023-03-26 14:02:57', NULL),
(1261, 1, 'bn', 'cruds', 'cash', 'নগদ', '2023-02-19 17:17:36', '2023-03-26 14:02:57', NULL),
(1262, 1, 'bn', 'cruds', 'payment_voucher', 'পরিশোধ রশীদ', '2023-02-19 17:18:13', '2023-03-26 14:02:57', NULL),
(1263, 1, 'bn', 'cruds', 'office_ledger_expense', 'অফিস লেজার খরচ', '2023-02-19 17:19:06', '2023-03-26 14:02:57', NULL),
(1264, 1, 'bn', 'cruds', 'customer_expense', 'গ্রাহক খরচ', '2023-02-19 17:19:45', '2023-03-26 14:02:57', NULL),
(1265, 1, 'bn', 'cruds', 'payment_to', 'পরিশোদ করা', '2023-02-19 17:21:11', '2023-03-26 14:02:57', NULL),
(1266, 1, 'bn', 'cruds', 'received_from', 'থেকে প্রাপ্ত', '2023-02-19 17:21:37', '2023-03-26 14:02:57', NULL),
(1267, 1, 'bn', 'cruds', 'receive_amount', 'পরিমাণ গ্রহণ', '2023-02-19 17:22:20', '2023-03-26 14:02:57', NULL),
(1268, 1, 'bn', 'cruds', 'voucher_no', 'ভাউচার নং', '2023-02-19 17:23:49', '2023-03-26 14:02:57', NULL),
(1269, 1, 'bn', 'cruds', 'required_field_message', 'অনুগ্রহ করে, প্রয়োজনীয় ক্ষেত্রগুলি পূরণ করুন।', '2023-02-19 17:24:22', '2023-03-26 14:02:57', NULL),
(1270, 1, 'bn', 'cruds', 'remarks', 'মন্তব্য', '2023-02-19 17:25:02', '2023-03-26 14:02:57', NULL),
(1271, 1, 'bn', 'cruds', 'account_subgroup', 'A/C সাবগ্রুপ', '2023-02-19 17:26:22', '2023-03-26 14:02:57', NULL),
(1272, 1, 'bn', 'cruds', 'account_group', 'এ/সি গ্রুপ', '2023-02-19 17:27:34', '2023-03-26 14:02:57', NULL),
(1273, 1, 'en', 'cruds', 'from_date', 'From Date', '2023-02-22 15:48:13', '2023-03-26 14:02:57', NULL),
(1274, 1, 'en', 'cruds', 'to_date', 'To Date', '2023-02-22 15:48:13', '2023-03-26 14:02:57', NULL),
(1275, 1, 'en', 'cruds', 'office_addess', 'Office Addess', '2023-02-22 15:48:13', '2023-03-26 14:02:57', NULL),
(1276, 1, 'en', 'cruds', 'profit_amount', 'Profit Amount', '2023-02-22 15:48:13', '2023-03-26 14:02:57', NULL),
(1277, 1, 'en', 'cruds', 'head_name', 'Heads', '2023-02-22 15:48:13', '2023-03-26 14:02:57', NULL),
(1278, 1, 'en', 'cruds', 'bdt', 'BDT', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1279, 1, 'en', 'cruds', 'sar', 'SAR', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1280, 1, 'en', 'cruds', 'office_name_english', 'Office Name English', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1281, 1, 'en', 'cruds', 'office_name_arabic', 'Office Name Arabic', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1282, 1, 'en', 'cruds', 'office_address_english', 'Office Address English', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1283, 1, 'en', 'cruds', 'office_address_arabic', 'Office Address Arabic', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1284, 1, 'en', 'cruds', 'agent_name_english', 'Agent Name English', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1285, 1, 'en', 'cruds', 'agent_name_arabic', 'Agent Name Arabic', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1286, 1, 'en', 'cruds', 'passenger_name_english', 'Passenger Name English', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1287, 1, 'en', 'cruds', 'passenger_name_arabic', 'Passenger Name Arabic', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1288, 1, 'en', 'cruds', 'service_name_english', 'Service Name English', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1289, 1, 'en', 'cruds', 'service_name_arabic', 'Service Name Arabic', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1290, 1, 'en', 'cruds', 'received_from_english', 'Received From English', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1291, 1, 'en', 'cruds', 'received_from_arabic', 'Received From Arabic', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1292, 1, 'en', 'cruds', 'remarks_english', 'Remarks English', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1293, 1, 'en', 'cruds', 'remarks_arabic', 'Write Remarks Arabic', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1294, 1, 'en', 'cruds', 'write_remarks_english', 'Write Remarks English', '2023-02-22 15:48:14', '2023-03-26 14:02:57', NULL),
(1295, 1, 'en', 'cruds', 'amount_of', 'Amount of', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1296, 1, 'en', 'cruds', 'receipt', 'Receipt', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1297, 1, 'en', 'cruds', 'receipt_no', 'Receipt No', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1298, 1, 'en', 'cruds', 'sponsor_name_english', 'Sponsor Name English', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1299, 1, 'en', 'cruds', 'sponsor_name_arabic', 'Sponsor Name Arabic', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1300, 1, 'en', 'cruds', 'payment_type', 'Payment Type', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1301, 1, 'en', 'cruds', 'payment_to_english', 'Payment To English', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1302, 1, 'en', 'cruds', 'payment_to_arabic', 'Payment To Arabic', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1303, 1, 'en', 'cruds', 'total_payment', 'Total Payment', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1304, 1, 'en', 'cruds', 'total_payment_amount', 'Total Payment Amount', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1305, 1, 'en', 'cruds', 'current_payment', 'Current Payment', '2023-02-22 15:48:15', '2023-03-26 14:02:57', NULL),
(1306, 1, 'bn', 'cruds', 'passenger_name_english', 'যাত্রীর ইংরেজি নাম', '2023-02-23 07:50:40', '2023-03-26 14:02:57', NULL),
(1307, 1, 'bn', 'cruds', 'passenger_name_arabic', 'যাত্রীর আরবি নাম', '2023-02-23 07:51:40', '2023-03-26 14:02:57', NULL),
(1308, 1, 'bn', 'cruds', 'office_name_arabic', 'অফিসের আরবি নাম', '2023-02-23 07:53:29', '2023-03-26 14:02:57', NULL),
(1309, 1, 'bn', 'cruds', 'office_name_english', 'অফিসের ইংরেজি নাম', '2023-02-23 07:54:07', '2023-03-26 14:02:57', NULL),
(1310, 1, 'bn', 'cruds', 'sponsor_name_english', 'স্পন্সরের ইংরেজি নাম', '2023-02-23 07:55:25', '2023-03-26 14:02:57', NULL),
(1311, 1, 'bn', 'cruds', 'sponsor_name_arabic', 'স্পন্সরের আরবি নাম', '2023-02-23 07:56:02', '2023-03-26 14:02:57', NULL),
(1312, 1, 'bn', 'cruds', 'agent_name_english', 'এজেন্টের ইংরেজি নাম', '2023-02-23 07:57:41', '2023-03-26 14:02:57', NULL),
(1313, 1, 'bn', 'cruds', 'agent_name_arabic', 'এজেন্টের আরবি নাম', '2023-02-23 07:58:09', '2023-03-26 14:02:57', NULL),
(1314, 1, 'ar', 'cruds', 'bdt', 'تاكا  بنغالي', '2023-02-23 22:37:25', '2023-03-26 14:02:57', NULL),
(1315, 1, 'bn', 'cruds', 'bdt', 'টাকা', '2023-02-23 22:38:36', '2023-03-26 14:02:57', NULL),
(1316, 1, 'ar', 'cruds', 'receipt', 'إيصال', '2023-02-24 00:15:33', '2023-03-26 14:02:57', NULL),
(1317, 1, 'bn', 'cruds', 'receipt', 'রশিদ', '2023-02-24 00:16:01', '2023-03-26 14:02:57', NULL),
(1318, 1, 'bn', 'cruds', 'receipt_no', 'রশিদ  নং', '2023-02-24 00:16:32', '2023-03-26 14:02:57', NULL),
(1319, 1, 'ar', 'cruds', 'receipt_no', 'رقم الإيصال', '2023-02-24 00:16:59', '2023-03-26 14:02:57', NULL),
(1320, 1, 'ar', 'cruds', 'amount_of', 'إجمالي المبلغ', '2023-02-24 00:18:15', '2023-03-26 14:02:57', NULL),
(1321, 1, 'ar', 'cruds', 'sar', 'ريال سعودي', '2023-02-24 17:45:20', '2023-03-26 14:02:57', NULL),
(1322, 1, 'bn', 'cruds', 'sar', 'সৌদি রিয়্যাল', '2023-02-24 17:48:18', '2023-03-26 14:02:57', NULL),
(1323, 1, 'ar', 'cruds', 'office_address_english', 'أضافة عنوان المكتب باللغة الإنجليزية', '2023-02-24 17:52:08', '2023-03-26 14:02:57', NULL),
(1324, 1, 'bn', 'cruds', 'office_address_english', 'ইংরেজিতে অফিসের ঠিকানা', '2023-02-24 17:53:28', '2023-03-26 14:02:57', NULL),
(1325, 1, 'ar', 'cruds', 'office_address_arabic', 'إضافة عنوان المكتب بالغة العربية', '2023-02-24 17:54:18', '2023-03-26 14:02:57', NULL),
(1326, 1, 'bn', 'cruds', 'office_address_arabic', 'আরবিতে অফিসের ঠিকানা', '2023-02-24 17:54:59', '2023-03-26 14:02:57', NULL),
(1327, 1, 'ar', 'cruds', 'office_name_english', 'إضافة  اسم المكتب باللغة الإنجليزية', '2023-02-24 17:56:05', '2023-03-26 14:02:57', NULL),
(1328, 1, 'ar', 'cruds', 'office_name_arabic', 'إضافة اسم المكتب بالغة العربية', '2023-02-24 17:56:53', '2023-03-26 14:02:57', NULL),
(1329, 1, 'ar', 'cruds', 'total_payment_amount', 'المبلغ الإجمالي للدفع', '2023-02-24 21:09:13', '2023-03-26 14:02:57', NULL),
(1330, 1, 'ar', 'cruds', 'sponsor_name_english', 'إضافة اسم الكفيل بالانجليزي', '2023-02-25 19:49:50', '2023-03-26 14:02:57', NULL),
(1331, 1, 'ar', 'cruds', 'sponsor_name_arabic', 'إضافة  اسم الكفيل بالعربي', '2023-02-25 19:54:59', '2023-03-26 14:02:57', NULL),
(1332, 1, 'ar', 'cruds', 'agent_name_arabic', 'إضافة إسم الوكيل بالعربي', '2023-02-25 20:58:13', '2023-03-26 14:02:57', NULL),
(1333, 1, 'ar', 'cruds', 'agent_name_english', 'إضافة إسم الوكيل بالانجليزي', '2023-02-25 20:59:36', '2023-03-26 14:02:57', NULL),
(1334, 1, 'ar', 'cruds', 'passenger_name_english', 'إضافة اسم المسافر بالانجليزية', '2023-02-25 21:02:41', '2023-03-26 14:02:57', NULL),
(1335, 1, 'ar', 'cruds', 'passenger_name_arabic', 'إضافة اسم العميل | العامل | المسافر| بالعربي', '2023-02-25 21:05:21', '2023-03-26 14:02:57', NULL),
(1336, 1, 'ar', 'cruds', 'profit_amount', 'مبلغ الربح |  الفائدة', '2023-02-25 21:06:33', '2023-03-26 14:02:57', NULL),
(1337, 1, 'ar', 'cruds', 'payment_type', 'نوع الدفع', '2023-02-25 21:07:32', '2023-03-26 14:02:57', NULL),
(1338, 1, 'ar', 'cruds', 'head_name', 'القائمة الرئسية', '2023-02-25 21:09:04', '2023-03-26 14:02:57', NULL),
(1339, 1, 'ar', 'cruds', 'service_name_english', 'اسم الخدمة انجليزي', '2023-02-25 21:10:25', '2023-03-26 14:02:57', NULL),
(1340, 1, 'ar', 'cruds', 'service_name_arabic', 'إسم الخدمة عربي', '2023-02-25 21:10:55', '2023-03-26 14:02:57', NULL),
(1341, 1, 'ar', 'cruds', 'remarks_arabic', 'اكتب الملاحظات بالعربية', '2023-02-25 21:11:34', '2023-03-26 14:02:57', NULL),
(1342, 1, 'ar', 'cruds', 'received_from_english', 'تم الاستلام من كتابة انجليزية', '2023-02-25 21:15:23', '2023-03-26 14:02:57', NULL),
(1343, 1, 'ar', 'cruds', 'received_from_arabic', 'تم الاستلام من  بالغة العربية', '2023-02-25 21:16:38', '2023-03-26 14:02:57', NULL),
(1344, 1, 'ar', 'cruds', 'remarks_english', 'اكتب الملاحظات باللغة الإنجليزية', '2023-02-25 21:17:15', '2023-03-26 14:02:57', NULL),
(1345, 1, 'ar', 'cruds', 'write_remarks_english', 'اكتب الملاحظات باللغة الإنجليزية', '2023-02-25 21:17:50', '2023-03-26 14:02:57', NULL),
(1346, 1, 'ar', 'cruds', 'payment_to_english', 'الدفع للغة الإنجليزية', '2023-02-25 21:18:24', '2023-03-26 14:02:57', NULL),
(1347, 1, 'ar', 'cruds', 'payment_to_arabic', 'الدفع للغة العربية', '2023-02-25 21:18:53', '2023-03-26 14:02:57', NULL),
(1348, 1, 'ar', 'cruds', 'total_payment', 'المبلغ الإجمالي', '2023-02-25 21:19:21', '2023-03-26 14:02:57', NULL),
(1349, 1, 'ar', 'cruds', 'current_payment', 'الدفع الحالي', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1350, 1, 'en', 'cruds', 'total_currency', 'Total Currency', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1351, 1, 'en', 'cruds', 'agency_name_english', 'Agency Name English', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1352, 1, 'en', 'cruds', 'agency_name_arabic', 'Agency Name Arabic', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1353, 1, 'en', 'cruds', 'setup_edit', 'Setup/Edit', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1354, 1, 'en', 'cruds', 'for', 'For', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1355, 1, 'ar', 'cruds', 'total_currency', 'اجمالي المبلغ', '2023-02-26 14:15:28', '2023-03-26 14:02:57', NULL),
(1356, 1, 'ar', 'cruds', 'agency_name_english', 'اسم | المندوب | الوكالة بانجليزي', '2023-02-26 14:16:42', '2023-03-26 14:02:57', NULL),
(1357, 1, 'ar', 'cruds', 'agency_name_arabic', 'إسم | المندوب | الوكالة بالعربي', '2023-02-26 14:17:46', '2023-03-26 14:02:57', NULL),
(1358, 1, 'ar', 'cruds', 'setup_edit', 'إضافة | تثبيت', '2023-02-26 14:19:09', '2023-03-26 14:02:57', NULL),
(1359, 1, 'ar', 'cruds', 'for', 'الي', '2023-02-26 14:20:05', '2023-03-26 14:02:57', NULL),
(1360, 1, 'en', 'cruds', 'balance', 'Balance', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1361, 1, 'en', 'cruds', 'transfer_from', 'Transfer From', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1362, 1, 'en', 'cruds', 'transfer_to', 'Transfer To', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1363, 1, 'en', 'cruds', 'transfer_amount', 'Transfer Amount', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1364, 1, 'en', 'cruds', 'balance_transfer', 'Balance Transfer', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1365, 1, 'en', 'cruds', 'write_remarks_arabic', 'Write Remarks Arabic', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1366, 1, 'ar', 'cruds', 'balance', 'رصيد حساب', '2023-03-05 20:05:19', '2023-03-26 14:02:57', NULL),
(1367, 1, 'ar', 'cruds', 'transfer_from', 'تحويل من', '2023-03-05 20:06:07', '2023-03-26 14:02:57', NULL),
(1368, 1, 'ar', 'cruds', 'transfer_to', 'تحول إلى', '2023-03-05 20:06:56', '2023-03-26 14:02:57', NULL);
INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1369, 1, 'ar', 'cruds', 'transfer_amount', 'مبلغ التحويل |', '2023-03-05 20:07:56', '2023-03-26 14:02:57', NULL),
(1370, 1, 'ar', 'cruds', 'balance_transfer', 'تحويل الرصيد', '2023-03-05 20:08:54', '2023-03-26 14:02:57', NULL),
(1371, 1, 'ar', 'cruds', 'write_remarks_arabic', 'اكتب ملاحظات باللغة العربية', '2023-03-05 20:09:48', '2023-03-26 14:02:57', NULL),
(1372, 1, 'en', 'cruds', 'contact_expense', 'Contact Expense', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1373, 1, 'en', 'cruds', 'contact_profit', 'Contact Profit', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1374, 1, 'en', 'cruds', 'expense_amount', 'Expense Amount', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1375, 1, 'en', 'cruds', 'customer_transaction_details', 'Customer Transaction Details', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1376, 1, 'en', 'cruds', 'sector_name', 'Sector Name', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1377, 1, 'en', 'cruds', 'expenditure_sector', 'Expenditure Sector', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1378, 1, 'en', 'cruds', 'profit_amount', 'Profit Amount', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1379, 1, 'en', 'cruds', 'due_amount', 'Due Amount', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1380, 1, 'en', 'cruds', 'opening', 'Opening', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1381, 1, 'en', 'cruds', 'from_office', 'From Office', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1382, 1, 'en', 'cruds', 'to_office', 'To Office', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1383, 1, 'en', 'cruds', 'balance_transfer', 'Balance Transfer', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1384, 1, 'en', 'cruds', 'to_amount', 'To Amount', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1385, 1, 'en', 'cruds', 'from_amount', 'From Amount', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1386, 1, 'bn', 'cruds', 'received_from_english', 'কাহার নিকট হইতে (ইংরেজি)', '2023-03-25 16:02:01', '2023-03-26 14:02:57', NULL),
(1387, 1, 'bn', 'cruds', 'received_from_arabic', 'কাহার নিকট হইতে (আরবি)', '2023-03-25 16:04:12', '2023-03-26 14:02:57', NULL),
(1388, 1, 'en', 'cruds', 'transaction_type', 'Transaction Type', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1389, 1, 'en', 'cruds', 'creation_date', 'Creation Date', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1390, 1, 'en', 'cruds', 'profession', 'Profession', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1391, 1, 'en', 'cruds', 'profession_name', 'Profession Name', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1392, 1, 'en', 'cruds', 'mobile_no', 'Mobile No', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1393, 1, 'en', 'cruds', 'acl_country', 'Access Control Country', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1394, 1, 'en', 'cruds', 'entry_country', 'Entry Country', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1395, 1, 'en', 'cruds', 'verify', 'Verify', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1396, 1, 'en', 'cruds', 'verification_code', 'Verification Code', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1397, 1, 'en', 'cruds', 'wrong_verification_code', 'Wrong Verification Code', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1398, 1, 'en', 'cruds', 'wrong_email_password', 'Wrong Email/Password', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1399, 1, 'en', 'cruds', 'login_successful', 'Login Successful', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1400, 1, 'en', 'cruds', 'not_exist_message', 'This information is not exist in our system!', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1401, 1, 'en', 'cruds', 'otp_type', 'OTP Type', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1402, 1, 'en', 'cruds', 'sms', 'SMS', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL),
(1403, 1, 'en', 'cruds', 'email', 'Email', '2023-02-25 21:19:52', '2023-03-26 14:02:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint UNSIGNED NOT NULL,
  `manufacturer_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_of_origin` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturer_code`, `manufacturer_name`, `country_of_origin`, `manufacturer_address`, `contact_person`, `contact_no`, `email_address`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MN0001', 'Default Manufacturer', 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 1, NULL, '2023-06-06 12:48:05', NULL),
(2, 'MN0002', 'FMC Dockyard Limited', 'Bangladesh', '340, Sagorika Road, Pahartoli, Chittagong-4219', 'NA', '01855996632', 'fmcdockyard@gmail.com', NULL, 1, '2023-05-19 18:15:00', '2023-06-06 10:10:10', NULL),
(3, 'MN0003', 'Chittagong Dry Dock Limited', 'Bangladesh', '23, East Patenga, Chittogram, Bangladesh', 'NA', 'NA', 'NA', 1, 1, '2023-06-06 12:45:35', '2023-06-06 12:48:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_receives`
--

CREATE TABLE `material_receives` (
  `id` bigint UNSIGNED NOT NULL,
  `mrfor_id` int DEFAULT NULL,
  `ps_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_receive_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_receive_date` date NOT NULL,
  `purchase_order_no` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_order_date` date NOT NULL,
  `requisition_order_no` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisition_order_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_no` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspection_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inspection_id` bigint NOT NULL,
  `vendor_id` bigint DEFAULT NULL,
  `challan_no` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challan_date` date NOT NULL,
  `bill_no` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_receives`
--

INSERT INTO `material_receives` (`id`, `mrfor_id`, `ps_id`, `material_receive_code`, `material_receive_date`, `purchase_order_no`, `purchase_order_date`, `requisition_order_no`, `requisition_order_date`, `job_no`, `inspection_name`, `inspection_id`, `vendor_id`, `challan_no`, `challan_date`, `bill_no`, `bill_date`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '2,1', 'MR0001', '2023-06-13', '1', '2023-06-13', 'RQ0001,RQ0003', '2023-06-02,2023-06-03', 'JOB-501,JOB-502', '', 1, 1, '1', '2023-06-13', '1', '2023-06-13', '1', 'Approved', 1, NULL, '2023-06-12 20:27:17', '2023-06-20 19:49:09', NULL),
(2, 0, '2', 'MR0002', '2023-06-13', '1', '2023-06-13', 'RQ0003', '2023-06-03', 'JOB-502', '', 1, 1, '1', '2023-06-13', '1', '2023-06-13', '1', 'Pending', 1, NULL, '2023-06-12 20:37:15', '2023-06-12 20:37:15', NULL),
(3, NULL, '1', 'MR0003', '2023-06-17', 'Purchase Order No', '2023-06-17', 'RQ0001', '2023-06-02', 'JOB-501', '', 1, 1, '11', '2023-06-17', '11', '2023-06-17', 'des', 'Pending', 1, NULL, '2023-06-17 11:59:25', '2023-06-17 11:59:25', NULL),
(4, NULL, '4', 'MR0004', '2023-06-17', '11', '2023-06-17', 'RQ0005', '2023-06-17', NULL, 'Some this is wrong', 1, 1, '1', '2023-06-17', '1', '2023-06-17', 'des NA', 'Approved', 1, 1, '2023-06-17 13:26:11', '2023-06-20 19:48:23', NULL),
(5, 1, '9', 'GEN0001', '2023-11-12', '20231112001', '2023-11-12', 'GEN0009', '2023-11-12', NULL, 'All items are good in condition', 2, 2, '100245', '2023-11-12', '258745', '2023-11-12', 'All quantities are right now.', 'Approved', 1, NULL, '2023-11-12 10:36:03', '2023-11-12 10:36:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_receive_details`
--

CREATE TABLE `material_receive_details` (
  `id` bigint UNSIGNED NOT NULL,
  `requisition_id` int NOT NULL,
  `job_id` int DEFAULT NULL,
  `ps_id` int NOT NULL,
  `material_receive_id` bigint NOT NULL,
  `branch_id` bigint NOT NULL,
  `warehouse_id` int NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int NOT NULL,
  `subgroup_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `order_quantity` float NOT NULL,
  `receive_quantity` float NOT NULL,
  `sale_price` float NOT NULL,
  `total_price` float NOT NULL,
  `status` enum('Pending','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_receive_details`
--

INSERT INTO `material_receive_details` (`id`, `requisition_id`, `job_id`, `ps_id`, `material_receive_id`, `branch_id`, `warehouse_id`, `item_id`, `group_id`, `subgroup_id`, `unit_id`, `order_quantity`, `receive_quantity`, `sale_price`, `total_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 2, 2, 1, 1, 1, 1, 1, 2, 1, 50, 50, 200, 10000, 'Approved', 1, NULL, '2023-06-12 20:27:17', '2023-06-20 19:49:09', NULL),
(2, 3, 2, 2, 1, 1, 1, 2, 1, 2, 1, 20, 20, 200, 4000, 'Approved', 1, NULL, '2023-06-12 20:27:17', '2023-06-20 19:49:09', NULL),
(3, 3, 2, 2, 1, 1, 1, 1, 1, 2, 1, 20, 20, 200, 4000, 'Approved', 1, NULL, '2023-06-12 20:27:17', '2023-06-20 19:49:09', NULL),
(4, 3, 2, 2, 2, 1, 1, 1, 1, 2, 1, 20, 20, 200, 4000, 'Pending', 1, NULL, '2023-06-12 20:37:16', '2023-06-12 20:37:16', NULL),
(5, 1, 1, 1, 3, 1, 1, 1, 1, 2, 1, 50, 50, 200, 10000, 'Pending', 1, NULL, '2023-06-17 11:59:25', '2023-06-17 11:59:25', NULL),
(6, 1, 1, 1, 3, 1, 1, 2, 1, 2, 1, 20, 20, 200, 4000, 'Pending', 1, NULL, '2023-06-17 11:59:25', '2023-06-17 11:59:25', NULL),
(7, 5, NULL, 4, 4, 1, 1, 5, 1, 1, 1, 10, 10, 0, 0, 'Pending', 1, NULL, '2023-06-17 13:26:11', '2023-06-18 14:04:22', '2023-06-18 14:04:22'),
(8, 5, NULL, 4, 4, 1, 1, 5, 1, 1, 1, 10, 10, 0, 0, 'Pending', 1, NULL, '2023-06-18 14:04:22', '2023-06-18 14:06:02', '2023-06-18 14:06:02'),
(9, 5, NULL, 4, 4, 1, 1, 5, 1, 1, 1, 10, 10, 0, 0, 'Approved', 1, NULL, '2023-06-18 14:06:02', '2023-06-20 19:48:23', NULL),
(10, 10, NULL, 9, 5, 1, 1, 550, 4, 302, 1, 5, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 10:36:03', '2023-11-12 10:36:34', NULL),
(11, 10, NULL, 9, 5, 1, 1, 9, 1, 191, 1, 5, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 10:36:03', '2023-11-12 10:36:34', NULL),
(12, 10, NULL, 9, 5, 1, 1, 10, 1, 191, 1, 5, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 10:36:03', '2023-11-12 10:36:34', NULL),
(13, 10, NULL, 9, 5, 1, 1, 438, 8, 242, 1, 5, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 10:36:03', '2023-11-12 10:36:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `order_no` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `en` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bn` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_link` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_icon` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `order_no`, `parent_id`, `en`, `ar`, `bn`, `menu_link`, `slug`, `menu_icon`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, NULL, 'Dashboard', 'لوحة التحكم والقيادة', 'ড্যাশবোর্ড', '#', 'dashboard', 'fas fa-home', 'Active', 1, 1, '2022-02-23 20:33:41', '2023-11-02 09:34:08', NULL),
(2, 1, NULL, 'Settings', 'الاعدادات العامة', 'জেনারেল সেটিংস', '#', 'settings', 'fas fa-cog', 'Active', 0, 1, '2022-01-01 07:15:46', '2023-06-09 07:54:30', NULL),
(4, 15, NULL, 'User', 'إدارة المستخدم', 'ব্যবহারকারী ব্যবস্থাপনা', '#', 'user', 'fas fa-users', 'Active', 0, 1, '2022-01-01 07:15:46', '2023-07-23 13:50:10', NULL),
(5, 1, 4, 'Roles', 'A | إضافة الأذونات', 'A |  রোলস', 'admin/user_management/roles', 'admin_user_management_roles', 'fas fa-circle', 'Active', 0, NULL, '2022-01-01 07:15:46', '2023-02-19 17:00:37', NULL),
(6, 3, 4, 'User List', 'C | قائمة المستخدم', 'C | ব্যবহারকারীর তালিকা', 'admin/user_management/users', 'admin_user_management_users', 'fas fa-circle', 'Active', 0, 1, '2022-01-01 07:15:46', '2023-07-23 13:51:26', NULL),
(7, 4, 2, 'Section Manage', '-', '-', 'admin/general_settings/section', 'admin_general_settings_section', 'fa fa-cog', 'Active', 0, 1, '2022-12-07 09:42:56', '2023-06-06 08:56:20', NULL),
(8, 1, 58, 'Manufacturer Manage', '-', '-', 'admin/inventory_management/manufacturer', 'admin_inventory_management_manufacturer', 'fas fa-circle', 'Active', 0, 1, '2022-12-07 19:36:42', '2023-06-06 08:57:16', NULL),
(9, 16, NULL, 'Language Management', 'إدارة ترجمة اللغات', 'ভাষা ব্যবস্থাপনা', '#', 'language_management', 'fas fa-language', 'Inactive', 0, NULL, '2022-12-11 10:26:11', '2023-02-19 17:42:00', NULL),
(10, 4, 58, 'Unit Manage', '-', '-', 'admin/inventory_management/unit', 'admin_inventory_management_unit', 'fas fa-circle', 'Active', 0, 1, '2022-12-18 11:03:04', '2023-06-06 08:57:44', NULL),
(11, 5, 58, 'Room Manage', '-', '-', 'admin/inventory_management/room', 'admin_inventory_management_room', 'fas fa-circle', 'Active', 0, 1, '2022-12-19 18:55:01', '2023-06-06 08:57:58', NULL),
(12, 6, 58, 'Rack Manage', '-', '-', 'admin/inventory_management/rack', 'admin_inventory_management_rack', 'fas fa-circle', 'Active', 0, 1, '2022-12-19 19:29:22', '2023-06-06 08:58:10', NULL),
(13, 1, 2, 'Company Information', '-', '-', 'admin/general_settings/company', 'admin_general_settings_company', 'fas fa-circle', 'Inactive', 0, NULL, '2022-12-19 20:01:53', '2023-02-19 17:08:18', NULL),
(30, 7, 58, 'Cell Manage', '-', '-', 'admin/inventory_management/shelf', 'admin_inventory_management_shelf', 'fas fa-circle', 'Active', 0, 1, '2022-12-23 02:16:18', '2023-06-06 08:58:22', NULL),
(34, 8, 58, 'Product Group Manage', '-', '-', 'admin/inventory_management/group', 'admin_inventory_management_group', 'fas fa-circle', 'Active', 0, 1, '2022-12-24 21:46:55', '2023-06-06 08:58:47', NULL),
(35, 10, 58, 'Product Sub-Group Manage', '-', '-', 'admin/inventory_management/subgroup', 'admin_inventory_management_subgroup', 'fas fa-circle', 'Active', 0, 1, '2022-12-24 21:48:27', '2023-06-06 08:59:45', NULL),
(44, 1, 9, 'A | Language', 'A | ترجمة اللغات', 'A |  ভাষা', 'admin/language', 'admin_language', 'fas fa-circle', 'Active', 0, NULL, '2022-12-27 10:14:31', '2023-02-22 19:03:16', NULL),
(46, 3, 2, 'Warehouse Manage', '-', '-', 'admin/general_settings/warehouse', 'admin_general_settings_warehouse', 'fas fa-circle', 'Active', 0, 1, '2022-12-28 18:51:40', '2023-06-06 08:55:58', NULL),
(47, 1, 1, 'Active Dashboard', 'A | لوحة القيادة النشطة', 'A | সক্রিয় ড্যাশবোর্ড', 'admin/dashboard', 'admin_dashboard', 'fas fa-circle', 'Active', 0, NULL, '2023-01-01 09:11:18', '2023-02-19 17:07:27', NULL),
(48, 8, NULL, 'Report', 'إدارة التقارير', 'প্রতিবেদন ব্যবস্থাপনা', '#', 'report', 'fas fa-bar-chart', 'Active', 0, 1, '2023-02-20 07:39:54', '2023-06-06 08:54:33', NULL),
(53, 9, 58, 'Add Group Volume', '-', '-', 'admin/inventory_management/groupvolume', 'admin_inventory_management_groupvolume', 'fas fa-circle', 'Active', 0, 1, '2023-03-11 22:27:29', '2023-06-06 08:59:11', NULL),
(54, 1, 48, 'Product Stock Report', '-', '-', 'admin/report_management/product-stock-report', 'admin_report_management_product_stock_report', 'fas fa-circle', 'Active', 0, 1, '2023-03-21 22:09:40', '2023-06-10 05:30:48', NULL),
(55, 11, 58, 'Add Sub Group Volume', '-', '-', 'admin/inventory_management/subgroupvolume', 'admin_inventory_management_subgroupvolume', 'fas fa-circle', 'Active', 0, 1, '2023-03-30 05:05:37', '2023-06-06 09:00:50', NULL),
(56, 2, 4, 'Create User', 'B | قائمة المستخدم', 'B | ব্যবহারকারীর তৈরি করুন', 'admin/user_management/users/create', 'admin_user_management_users_create', 'fas fa-circle', 'Active', 0, 1, '2023-04-10 04:28:18', '2023-07-23 13:51:11', NULL),
(57, 2, 2, 'Branch Manage', '-', '-', 'admin/general_settings/branch', 'admin_general_settings_branch', 'fas fa-circle', 'Inactive', 0, 1, '2023-05-19 17:59:07', '2023-06-06 08:55:39', NULL),
(58, 2, NULL, 'Inventory', '-', '-', '#', 'inventory', 'fas fa-bar-chart-o', 'Active', 0, 1, '2023-05-19 19:35:56', '2023-06-06 08:53:09', NULL),
(59, 2, 58, 'Brand Manage', '-', '-', 'admin/inventory_management/brand', 'admin_inventory_management_brand', 'fas fa-circle', 'Active', 0, 1, '2023-05-19 20:21:03', '2023-06-06 08:57:24', NULL),
(60, 3, 58, 'Model Manage', '-', '-', 'admin/inventory_management/model', 'admin_inventory_management_model', 'fas fa-circle', 'Active', 0, 1, '2023-05-19 20:43:39', '2023-06-06 08:57:33', NULL),
(61, 11, 58, 'Manage Product Item', '-', '-', 'admin/inventory_management/item/create', 'admin_inventory_management_item_create', 'fas fa-circle', 'Active', 0, 1, '2023-05-22 19:31:12', '2023-06-06 09:01:17', NULL),
(62, 12, 58, 'Product Item List', '-', '-', 'admin/inventory_management/item', 'admin_inventory_management_item', 'fas fa-circle', 'Active', 0, 1, '2023-05-22 19:32:01', '2023-06-06 09:01:36', NULL),
(63, 3, NULL, 'Requisition', '-', '-', '#', 'requisition', 'fas fa-flag', 'Active', 0, 1, '2023-05-27 11:04:07', '2023-06-06 08:53:28', NULL),
(64, 2, 63, 'Party Manage', '-', '-', 'admin/section_requisition_management/party/create', 'admin_section_requisition_management_party_create', 'fas fa-circle', 'Active', 0, 1, '2023-05-27 11:06:54', '2023-06-06 09:02:44', NULL),
(65, 3, 63, 'Party List', '-', '-', 'admin/section_requisition_management/party', 'admin_section_requisition_management_party', 'fas fa-circle', 'Active', 0, NULL, '2023-05-27 11:07:50', '2023-05-27 11:07:50', NULL),
(66, 4, 63, 'Job Manage', '-', '-', 'admin/section_requisition_management/job/create', 'admin_section_requisition_management_job_create', 'fas fa-circle', 'Active', 0, 1, '2023-05-28 19:02:39', '2023-06-06 09:03:16', NULL),
(67, 5, 63, 'Job List', '-', '-', 'admin/section_requisition_management/job', 'admin_section_requisition_management_job', 'fas fa-circle', 'Active', 0, NULL, '2023-05-28 19:03:17', '2023-05-28 19:03:17', NULL),
(68, 6, 63, 'Requisition Create', '-', '-', 'admin/section_requisition_management/requisition/create', 'admin_section_requisition_management_requisition_create', 'fas fa-circle', 'Active', 0, 1, '2023-05-28 19:24:17', '2023-06-06 09:03:37', NULL),
(69, 7, 63, 'Requisition List', '-', '-', 'admin/section_requisition_management/requisition', 'admin_section_requisition_management_requisition', 'fas fa-circle', 'Active', 0, NULL, '2023-05-28 19:25:01', '2023-05-28 19:25:01', NULL),
(70, 5, 2, 'Card Manage', '-', '-', 'admin/general_settings/card', 'admin_general_settings_card', 'fas fa-circle', 'Active', 0, 1, '2023-05-29 19:01:01', '2023-06-06 08:56:34', NULL),
(71, 6, 2, 'Designation Manage', '-', '-', 'admin/general_settings/designation', 'admin_general_settings_designation', 'fas fa-circle', 'Active', 0, 1, '2023-05-29 19:25:44', '2023-06-06 08:56:45', NULL),
(72, 4, NULL, 'Main Store', '-', '-', '#', 'main_store', 'fas fa-store-alt', 'Active', 1, 1, '2023-05-31 17:56:00', '2023-06-09 08:33:15', NULL),
(73, 1, 72, 'Vendor Manage', '-', '-', 'admin/main_warehouse_management/vendor/create', 'admin_main_warehouse_management_vendor_create', 'fas fa-circle', 'Active', 1, 1, '2023-05-31 17:58:00', '2023-06-06 09:04:32', NULL),
(74, 2, 72, 'Vendor List', '-', '-', 'admin/main_warehouse_management/vendor', 'admin_main_warehouse_management_vendor', 'fas fa-circle', 'Active', 1, 1, '2023-05-31 17:58:29', '2023-05-31 18:10:50', NULL),
(75, 3, 72, 'Inspector Manage', '-', '-', 'admin/main_warehouse_management/inspector/create', 'admin_main_warehouse_management_inspector_create', 'fas fa-circle', 'Active', 1, 1, '2023-05-31 18:38:17', '2023-06-06 09:04:47', NULL),
(76, 4, 72, 'Inspector List', '-', '-', 'admin/main_warehouse_management/inspector', 'admin_main_warehouse_management_inspector', 'fas fa-circle', 'Active', 1, NULL, '2023-05-31 18:38:52', '2023-05-31 18:38:52', NULL),
(77, 5, 72, 'Section Requisition Delivery', '-', '-', 'admin/main_warehouse_management/delivery/create', 'admin_main_warehouse_management_delivery_create', 'fas fa-circle', 'Active', 1, 1, '2023-05-31 19:20:27', '2023-05-31 19:22:12', NULL),
(78, 6, 72, 'Requisition Delivery List', '-', '-', 'admin/main_warehouse_management/delivery', 'admin_main_warehouse_management_delivery', 'fas fa-circle', 'Active', 1, 1, '2023-05-31 19:21:56', '2023-06-06 09:05:37', NULL),
(79, 9, 72, 'Material Receive Form', '-', '-', 'admin/main_warehouse_management/material_receive/create', 'admin_main_warehouse_management_material_receive_create', 'fas fa-circle', 'Active', 1, 1, '2023-06-02 19:47:56', '2023-06-06 09:06:09', NULL),
(80, 10, 72, 'Material Receive List', '-', '-', 'admin/main_warehouse_management/material_receive', 'admin_main_warehouse_management_material_receive', 'fas fa-circle', 'Active', 1, NULL, '2023-06-02 19:48:44', '2023-06-02 19:48:44', NULL),
(81, 13, 58, 'Create Opening Balance', '-', '-', 'admin/inventory_management/opening/create', 'admin_inventory_management_opening_create', 'fas fa-circle', 'Active', 1, 1, '2023-06-04 10:10:26', '2023-06-04 10:11:20', NULL),
(82, 14, 58, 'Opening Balance List', '-', '-', 'admin/inventory_management/opening', 'admin_inventory_management_opening', 'fas fa-circle', 'Active', 1, NULL, '2023-06-04 10:11:57', '2023-06-04 10:11:57', NULL),
(83, 5, NULL, 'Tools Store', '-', '-', '#', 'tools_store', 'fas fa-cog', 'Active', 1, 1, '2023-06-05 17:30:27', '2023-06-06 08:54:00', NULL),
(84, 1, 83, 'Tools Store Request Create', '-', '-', 'admin/tools_store_management/tsrequisition/create', 'admin_tools_store_management_tsrequisition_create', 'fas fa-circle', 'Active', 1, 1, '2023-06-05 17:33:17', '2023-06-06 09:07:06', NULL),
(85, 2, 83, 'Tools Store Request	 List', '-', '-', 'admin/tools_store_management/tsrequisition', 'admin_tools_store_management_tsrequisition', 'fas fa-circle', 'Active', 1, 1, '2023-06-05 17:34:02', '2023-06-06 09:07:20', NULL),
(86, 3, 83, 'Tools Store Request Delivery', '-', '-', 'admin/tools_store_management/tsrdelivery/create', 'admin_tools_store_management_tsrdelivery_create', 'fas fa-circle', 'Active', 1, 1, '2023-06-05 18:41:04', '2023-06-06 09:08:00', NULL),
(87, 4, 83, 'Tools Store Challan List', '-', '-', 'admin/tools_store_management/tsrdelivery', 'admin_tools_store_management_tsrdelivery', 'fas fa-circle', 'Active', 1, NULL, '2023-06-05 18:42:51', '2023-06-05 18:42:51', NULL),
(88, 11, 72, 'Tools Store Request Delivery', '-', '-', 'link is not correct yet', 'link_is_not_correct_yet', 'fas fa-circle', 'Active', 1, NULL, '2023-06-06 09:14:53', '2023-06-06 09:14:53', NULL),
(89, 1, 63, 'Requisition For', '-', '-', 'admin/section_requisition_management/requisitionfor', 'admin_section_requisition_management_requisitionfor', 'fas fa-circle', 'Active', 1, NULL, '2023-06-08 04:13:06', '2023-06-08 04:13:06', NULL),
(90, 2, 48, 'Product Stock History Report', '-', '-', 'admin/report_management/product-stock-history-report', 'admin_report_management_product_stock_history_report', 'fas fa-circle', 'Active', 1, NULL, '2023-06-10 18:25:08', '2023-06-10 18:25:08', NULL),
(91, 5, 83, 'TS Item Issue By Card', '-', '-', 'admin/tools_store_management/tsitemissue/create', 'admin_tools_store_management_tsitemissue_create', 'fas fa-circle', 'Active', 1, NULL, '2023-06-10 19:35:53', '2023-06-10 19:35:53', NULL),
(92, 6, 83, 'TS Item Issue By Card List', '-', '-', 'admin/tools_store_management/tsitemissue', 'admin_tools_store_management_tsitemissue', 'fas fa-circle', 'Active', 1, NULL, '2023-06-10 19:36:27', '2023-06-10 19:36:27', NULL),
(93, 7, 72, 'Create PS', '-', '-', 'admin/main_warehouse_management/ps/create', 'admin_main_warehouse_management_ps_create', 'fas fa-circle', 'Active', 1, NULL, '2023-06-11 20:34:46', '2023-06-11 20:34:46', NULL),
(94, 8, 72, 'PS List', '-', '-', 'admin/main_warehouse_management/ps', 'admin_main_warehouse_management_ps', 'fas fa-circle', 'Active', 1, NULL, '2023-06-11 20:35:22', '2023-06-11 20:35:22', NULL),
(95, 3, 48, 'Job No Report', '-', '-', 'admin/report_management/report/job-report', 'admin_report_management_report_job_report', 'fas fa-circle', 'Active', 1, 1, '2023-06-13 10:50:52', '2023-06-13 18:43:25', NULL),
(96, 7, 83, 'TS Item Return', '-', '-', 'admin/tools_store_management/tsitemreturn/create', 'admin_tools_store_management_tsitemreturn_create', 'fas fa-circle', 'Active', 1, NULL, '2023-06-14 10:29:13', '2023-06-14 10:29:13', NULL),
(97, 8, 83, 'Return List', '-', '-', 'admin/tools_store_management/tsitemreturn', 'admin_tools_store_management_tsitemreturn', 'fas fa-circle', 'Active', 1, NULL, '2023-06-14 10:37:33', '2023-06-14 10:37:33', NULL),
(98, 9, 83, 'Demage Manage', '-', '-', 'admin/tools_store_management/demageitem/create', 'admin_tools_store_management_demageitem_create', 'fas fa-circle', 'Active', 1, 1, '2023-06-15 11:08:00', '2023-06-15 11:08:52', NULL),
(99, 10, 83, 'Demage List', '-', '-', 'admin/tools_store_management/demageitem', 'admin_tools_store_management_demageitem', 'fas fa-circle', 'Active', 1, NULL, '2023-06-15 11:09:37', '2023-06-15 11:09:37', NULL),
(100, 4, 48, 'Requisition Report', '-', '-', 'admin/report_management/report/requisition-report', 'admin_report_management_report_requisition_report', 'fas fa-circle', 'Active', 1, 1, '2023-06-15 22:12:26', '2023-06-15 22:12:53', NULL),
(101, 5, 48, 'Card Status Report', '-', 'Card Status', 'admin/report_management/report/card-status-report', 'admin_report_management_report_card_status_report', 'fas fa-circle', 'Active', 1, 1, '2023-06-21 10:26:29', '2023-06-21 10:27:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2022_01_01_000000_create_permissions_table', 1),
(7, '2022_01_01_000001_create_roles_table', 1),
(8, '2022_01_01_000007_create_permission_role_pivot_table', 1),
(9, '2022_01_01_0000_create_menus_table', 1),
(10, '2022_01_01_100000_create_password_resets_table', 1),
(11, '2022_01_01_171723_create_designations_table', 1),
(12, '2022_01_01_171723_create_districts_table', 1),
(13, '2022_01_01_171723_create_divisions_table', 1),
(14, '2022_01_01_171730_create_users_table', 1),
(15, '2022_01_01_171731_create_role_user_pivot_table', 1),
(16, '2022_03_01_032919_create_dump_sql_table', 1),
(17, '2022_12_03_162406_create_countries_table', 2),
(18, '2022_12_03_162407_create_divisions_table', 3),
(19, '2022_12_03_162408_create_districts_table', 4),
(20, '2014_04_02_193005_create_translations_table', 5),
(21, '2022_12_03_162409_create_offices_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint UNSIGNED NOT NULL,
  `model_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `model_code`, `model_name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MO0001', 'Default Model', 'Description of Default Model', NULL, 1, '2022-12-07 11:34:57', '2023-06-06 10:21:58', NULL),
(2, 'MO0002', 'Model-1', 'Description of Model-1', NULL, 1, '2022-12-28 09:35:43', '2023-06-06 10:20:59', NULL),
(3, 'MO0003', 'Model-2', 'Description of Model-2', 1, NULL, '2023-06-06 10:21:26', '2023-06-06 10:21:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `openings`
--

CREATE TABLE `openings` (
  `id` bigint UNSIGNED NOT NULL,
  `opening_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_date` date NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int UNSIGNED NOT NULL,
  `subgroup_id` int UNSIGNED NOT NULL,
  `opening_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opening_quantity` float NOT NULL,
  `branch_id` int NOT NULL,
  `warehouse_id` bigint NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `openings`
--

INSERT INTO `openings` (`id`, `opening_code`, `opening_date`, `item_id`, `group_id`, `subgroup_id`, `opening_price`, `opening_quantity`, `branch_id`, `warehouse_id`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OP0001', '2023-06-10', 1, 1, 2, 0.00, 100, 1, 1, NULL, 1, NULL, '2023-06-10 04:19:38', '2023-06-10 04:19:38', NULL),
(5, 'OP0002', '2023-06-10', 2, 1, 2, 0.00, 200, 1, 1, NULL, 1, NULL, '2023-06-10 04:26:58', '2023-06-10 04:26:58', NULL),
(6, 'OP0002', '2023-06-10', 3, 1, 2, 0.00, 300, 1, 1, NULL, 1, NULL, '2023-06-10 04:27:14', '2023-06-10 04:27:14', NULL),
(7, 'OP0004', '2023-06-12', 1, 1, 2, 0.00, 1000, 1, 1, NULL, 1, NULL, '2023-06-12 10:37:48', '2023-06-12 10:37:48', NULL),
(8, 'OP0005', '2023-06-16', 1, 1, 2, 0.00, 20, 1, 2, NULL, 1, NULL, '2023-06-15 20:03:25', '2023-06-15 20:03:25', NULL),
(9, 'OP0005', '2023-06-16', 1, 1, 2, 0.00, 20, 1, 2, NULL, 1, NULL, '2023-06-15 20:03:32', '2023-06-15 20:03:32', NULL),
(10, 'OP0007', '2023-07-23', 27, 9, 44, 20.00, 200, 1, 1, 'OLD', 1, NULL, '2023-07-23 10:44:09', '2023-07-23 10:44:09', NULL),
(11, 'OP0008', '2023-07-24', 6, 9, 35, 223.00, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:30:31', '2023-07-24 08:30:31', NULL),
(12, 'OP0008', '2023-07-24', 7, 9, 35, 232.17, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:31:01', '2023-07-24 08:31:01', NULL),
(13, 'OP0008', '2023-07-24', 13, 9, 35, 279.50, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:31:41', '2023-07-24 08:31:41', NULL),
(14, 'OP0008', '2023-07-24', 14, 9, 36, 152.48, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:33:07', '2023-07-24 08:33:07', NULL),
(15, 'OP0008', '2023-07-24', 15, 9, 36, 82.84, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:35:04', '2023-07-24 08:35:04', NULL),
(16, 'OP0008', '2023-07-24', 21, 9, 36, 82.55, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:35:38', '2023-07-24 08:35:38', NULL),
(17, 'OP0008', '2023-07-24', 22, 9, 41, 139.53, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:36:08', '2023-07-24 08:36:08', NULL),
(18, 'OP0008', '2023-07-24', 23, 9, 41, 138.40, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:36:40', '2023-07-24 08:36:40', NULL),
(19, 'OP0008', '2023-07-24', 24, 9, 41, 140.20, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:37:08', '2023-07-24 08:37:08', NULL),
(20, 'OP0008', '2023-07-24', 25, 9, 42, 478.83, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:37:37', '2023-07-24 08:37:37', NULL),
(21, 'OP0008', '2023-07-24', 26, 9, 43, 84.00, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:38:01', '2023-07-24 08:38:01', NULL),
(22, 'OP0008', '2023-07-24', 27, 9, 44, 140.00, 0, 1, 1, NULL, 1, NULL, '2023-07-24 08:38:49', '2023-07-24 08:38:49', NULL),
(23, 'OP0020', '2023-07-24', 6, 9, 35, 96636.00, 45, 1, 1, NULL, 1, NULL, '2023-07-24 08:52:18', '2023-07-24 08:52:18', NULL),
(24, 'OP0021', '2023-07-24', 14, 9, 36, 200.00, 20, 1, 1, NULL, 1, NULL, '2023-07-24 10:42:47', '2023-07-24 10:42:47', NULL),
(25, 'OP0022', '2023-10-18', 6, 9, 35, 300.00, 500, 1, 1, NULL, 1, NULL, '2023-10-18 14:34:46', '2023-10-18 14:34:46', NULL),
(26, 'OP0023', '2023-11-02', 154, 2, 138, 6000.00, 9, 1, 1, NULL, 1, NULL, '2023-11-02 09:13:50', '2023-11-02 09:13:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` bigint UNSIGNED NOT NULL,
  `party_code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(164) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `party_code`, `party_name`, `address`, `contact_person`, `contact_no`, `email`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PR0001', 'Fashion Syndicate', '224/A, Road: 7, Block: D, Mirpur-2, Dhaka-1215', 'Sumon Ahmed', '01982457634', 'sumon.ahmed@gmail.com', NULL, NULL, 1, '2023-05-28 17:26:50', '2023-06-06 13:49:00', NULL),
(2, 'PR0002', 'SS Cargo and Shipyard Ltd.', '34, Pahartoly, Chottogram', 'Mahmud Abbas', '01826345612', 'sscargo@gmail.com', NULL, 1, 1, '2023-06-03 08:17:56', '2023-06-06 13:50:14', NULL),
(3, 'PR0003', 'Rong Tuli Garments', '23, Tikatuli Lane, Dhaka Old Town', 'Mahmud Mojumder', '01872345643', 'mahmudmojumder@gmail.com', NULL, 1, NULL, '2023-06-07 14:53:42', '2023-06-07 14:53:42', NULL),
(4, 'PR0004', 'BenQ DevOps', '12, BenQ Operation, Sat Mosjid Road, Dhanmondi, Dhaka', 'Mahmud Abbas', '01845784595', 'benqdevops@gmail.com', NULL, 1, NULL, '2023-10-19 07:40:59', '2023-10-19 07:40:59', NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int UNSIGNED NOT NULL,
  `menu_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `menu_id`, `title`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'menu_access', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(2, 0, 'menu_create', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(3, 0, 'menu_edit', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(4, 0, 'menu_delete', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(5, 0, 'menu_show', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(6, 0, 'permission_access', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(7, 0, 'permission_create', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(8, 0, 'permission_edit', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(9, 0, 'permission_delete', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(10, 0, 'permission_show', NULL, NULL, '2021-12-31 23:13:30', '2021-12-31 23:13:30', NULL),
(11, 2, 'access_settings', NULL, 1, '2021-12-31 23:13:30', '2023-06-09 07:54:30', NULL),
(17, 4, 'access_user', NULL, 1, '2021-12-31 23:13:30', '2023-07-23 13:50:10', NULL),
(18, 5, 'access_admin_user_management_roles', NULL, NULL, '2021-12-31 23:13:30', '2023-02-19 17:00:37', NULL),
(19, 5, 'create_admin_user_management_roles', NULL, NULL, '2021-12-31 23:13:30', '2023-02-19 17:00:37', NULL),
(20, 5, 'edit_admin_user_management_roles', NULL, NULL, '2021-12-31 23:13:30', '2023-02-19 17:00:37', NULL),
(21, 5, 'delete_admin_user_management_roles', NULL, NULL, '2021-12-31 23:13:30', '2023-02-19 17:00:37', NULL),
(22, 5, 'show_admin_user_management_roles', NULL, NULL, '2021-12-31 23:13:30', '2023-02-19 17:00:37', NULL),
(23, 6, 'access_admin_user_management_users', NULL, 1, '2021-12-31 23:13:30', '2023-07-23 13:51:26', NULL),
(24, 6, 'create_admin_user_management_users', NULL, 1, '2021-12-31 23:13:30', '2023-07-23 13:51:26', NULL),
(25, 6, 'edit_admin_user_management_users', NULL, 1, '2021-12-31 23:13:30', '2023-07-23 13:51:26', NULL),
(26, 6, 'delete_admin_user_management_users', NULL, 1, '2021-12-31 23:13:30', '2023-07-23 13:51:26', NULL),
(27, 6, 'show_admin_user_management_users', NULL, 1, '2021-12-31 23:13:30', '2023-07-23 13:51:26', NULL),
(28, 1, 'access_dashboard', NULL, 1, NULL, '2023-11-02 09:34:08', NULL),
(29, 1, 'create_dashboard', NULL, 1, NULL, '2023-11-02 09:34:08', NULL),
(30, 1, 'edit_dashboard', NULL, 1, NULL, '2023-11-02 09:34:08', NULL),
(31, 1, 'delete_dashboard', NULL, 1, NULL, '2023-11-02 09:34:08', NULL),
(32, 1, 'show_dashboard', NULL, 1, NULL, '2023-11-02 09:34:08', NULL),
(33, 7, 'access_admin_general_settings_section', NULL, 1, '2022-12-07 09:42:57', '2023-06-06 08:56:20', NULL),
(34, 7, 'create_admin_general_settings_section', NULL, 1, '2022-12-07 09:42:57', '2023-06-06 08:56:20', NULL),
(35, 7, 'edit_admin_general_settings_section', NULL, 1, '2022-12-07 09:42:57', '2023-06-06 08:56:20', NULL),
(36, 7, 'delete_admin_general_settings_section', NULL, 1, '2022-12-07 09:42:57', '2023-06-06 08:56:20', NULL),
(37, 7, 'show_admin_general_settings_section', NULL, 1, '2022-12-07 09:42:57', '2023-06-06 08:56:20', NULL),
(38, 8, 'access_admin_inventory_management_manufacturer', NULL, 1, '2022-12-07 19:36:42', '2023-06-06 08:57:16', NULL),
(39, 8, 'create_admin_inventory_management_manufacturer', NULL, 1, '2022-12-07 19:36:42', '2023-06-06 08:57:16', NULL),
(40, 8, 'edit_admin_inventory_management_manufacturer', NULL, 1, '2022-12-07 19:36:42', '2023-06-06 08:57:16', NULL),
(41, 8, 'delete_admin_inventory_management_manufacturer', NULL, 1, '2022-12-07 19:36:42', '2023-06-06 08:57:16', NULL),
(42, 8, 'show_admin_inventory_management_manufacturer', NULL, 1, '2022-12-07 19:36:42', '2023-06-06 08:57:16', NULL),
(43, 9, 'access_language_management', NULL, NULL, '2022-12-11 10:26:11', '2023-02-19 17:42:00', NULL),
(44, 9, 'create_language_management', NULL, NULL, '2022-12-11 10:26:11', '2023-02-19 17:42:00', NULL),
(45, 9, 'edit_language_management', NULL, NULL, '2022-12-11 10:26:11', '2023-02-19 17:42:00', NULL),
(46, 9, 'delete_language_management', NULL, NULL, '2022-12-11 10:26:11', '2023-02-19 17:42:00', NULL),
(47, 9, 'show_language_management', NULL, NULL, '2022-12-11 10:26:11', '2023-02-19 17:42:00', NULL),
(48, 10, 'access_admin_inventory_management_unit', NULL, 1, '2022-12-18 11:03:05', '2023-06-06 08:57:44', NULL),
(49, 10, 'create_admin_inventory_management_unit', NULL, 1, '2022-12-18 11:03:05', '2023-06-06 08:57:44', NULL),
(50, 10, 'edit_admin_inventory_management_unit', NULL, 1, '2022-12-18 11:03:05', '2023-06-06 08:57:44', NULL),
(51, 10, 'delete_admin_inventory_management_unit', NULL, 1, '2022-12-18 11:03:05', '2023-06-06 08:57:44', NULL),
(52, 10, 'show_admin_inventory_management_unit', NULL, 1, '2022-12-18 11:03:05', '2023-06-06 08:57:44', NULL),
(53, 11, 'access_admin_inventory_management_room', NULL, 1, '2022-12-19 18:55:01', '2023-06-06 08:57:58', NULL),
(54, 11, 'create_admin_inventory_management_room', NULL, 1, '2022-12-19 18:55:01', '2023-06-06 08:57:59', NULL),
(55, 11, 'edit_admin_inventory_management_room', NULL, 1, '2022-12-19 18:55:01', '2023-06-06 08:57:59', NULL),
(56, 11, 'delete_admin_inventory_management_room', NULL, 1, '2022-12-19 18:55:01', '2023-06-06 08:57:59', NULL),
(57, 11, 'show_admin_inventory_management_room', NULL, 1, '2022-12-19 18:55:01', '2023-06-06 08:57:59', NULL),
(58, 12, 'access_admin_inventory_management_rack', NULL, 1, '2022-12-19 19:29:23', '2023-06-06 08:58:10', NULL),
(59, 12, 'create_admin_inventory_management_rack', NULL, 1, '2022-12-19 19:29:23', '2023-06-06 08:58:10', NULL),
(60, 12, 'edit_admin_inventory_management_rack', NULL, 1, '2022-12-19 19:29:23', '2023-06-06 08:58:10', NULL),
(61, 12, 'delete_admin_inventory_management_rack', NULL, 1, '2022-12-19 19:29:23', '2023-06-06 08:58:10', NULL),
(62, 12, 'show_admin_inventory_management_rack', NULL, 1, '2022-12-19 19:29:23', '2023-06-06 08:58:10', NULL),
(63, 13, 'access_admin_general_settings_company', NULL, NULL, '2022-12-19 20:01:53', '2023-02-19 17:08:18', NULL),
(64, 13, 'create_admin_general_settings_company', NULL, NULL, '2022-12-19 20:01:53', '2023-02-19 17:08:18', NULL),
(65, 13, 'edit_admin_general_settings_company', NULL, NULL, '2022-12-19 20:01:53', '2023-02-19 17:08:18', NULL),
(66, 13, 'delete_admin_general_settings_company', NULL, NULL, '2022-12-19 20:01:53', '2023-02-19 17:08:18', NULL),
(67, 13, 'show_admin_general_settings_company', NULL, NULL, '2022-12-19 20:01:53', '2023-02-19 17:08:18', NULL),
(83, 14, 'access_office_management', NULL, NULL, '2022-12-21 18:40:55', NULL, NULL),
(84, 15, 'access_admin_office_management_office_create', NULL, NULL, '2022-12-21 18:45:25', '2023-02-19 17:19:09', NULL),
(85, 15, 'create_admin_office_management_office_create', NULL, NULL, '2022-12-21 18:45:25', '2023-02-19 17:19:09', NULL),
(86, 15, 'edit_admin_office_management_office_create', NULL, NULL, '2022-12-21 18:45:25', '2023-02-19 17:19:09', NULL),
(87, 15, 'delete_admin_office_management_office_create', NULL, NULL, '2022-12-21 18:45:25', '2023-02-19 17:19:09', NULL),
(88, 15, 'show_admin_office_management_office_create', NULL, NULL, '2022-12-21 18:45:25', '2023-02-19 17:19:09', NULL),
(89, 16, 'access_admin_office_management_office', NULL, NULL, '2022-12-21 18:47:01', '2023-02-19 17:20:03', NULL),
(90, 16, 'create_admin_office_management_office', NULL, NULL, '2022-12-21 18:47:01', '2023-02-19 17:20:03', NULL),
(91, 16, 'edit_admin_office_management_office', NULL, NULL, '2022-12-21 18:47:01', '2023-02-19 17:20:03', NULL),
(92, 16, 'delete_admin_office_management_office', NULL, NULL, '2022-12-21 18:47:01', '2023-02-19 17:20:03', NULL),
(93, 16, 'show_admin_office_management_office', NULL, NULL, '2022-12-21 18:47:01', '2023-02-19 17:20:03', NULL),
(94, 17, 'access_sponsor_management', NULL, NULL, '2022-12-22 11:19:23', '2023-03-03 14:40:41', NULL),
(95, 18, 'access_admin_sponsor_management_sponsor_create', NULL, NULL, '2022-12-22 11:24:56', '2023-03-03 14:45:41', NULL),
(96, 18, 'create_admin_sponsor_management_sponsor_create', NULL, NULL, '2022-12-22 11:24:56', '2023-03-03 14:45:41', NULL),
(97, 18, 'edit_admin_sponsor_management_sponsor_create', NULL, NULL, '2022-12-22 11:24:56', '2023-03-03 14:45:41', NULL),
(98, 18, 'delete_admin_sponsor_management_sponsor_create', NULL, NULL, '2022-12-22 11:24:56', '2023-03-03 14:45:41', NULL),
(99, 18, 'show_admin_sponsor_management_sponsor_create', NULL, NULL, '2022-12-22 11:24:56', '2023-03-03 14:45:41', NULL),
(100, 19, 'access_admin_sponsor_management_sponsor', NULL, NULL, '2022-12-22 11:26:23', '2023-03-03 14:46:17', NULL),
(101, 19, 'create_admin_sponsor_management_sponsor', NULL, NULL, '2022-12-22 11:26:23', '2023-03-03 14:46:17', NULL),
(102, 19, 'edit_admin_sponsor_management_sponsor', NULL, NULL, '2022-12-22 11:26:23', '2023-03-03 14:46:17', NULL),
(103, 19, 'delete_admin_sponsor_management_sponsor', NULL, NULL, '2022-12-22 11:26:23', '2023-03-03 14:46:17', NULL),
(104, 19, 'show_admin_sponsor_management_sponsor', NULL, NULL, '2022-12-22 11:26:23', '2023-03-03 14:46:17', NULL),
(105, 20, 'access_admin_sponsor_management_sponsor_visa_create', NULL, NULL, '2022-12-22 21:31:52', '2023-02-19 17:23:53', NULL),
(106, 20, 'create_admin_sponsor_management_sponsor_visa_create', NULL, NULL, '2022-12-22 21:31:52', '2023-02-19 17:23:53', NULL),
(107, 20, 'edit_admin_sponsor_management_sponsor_visa_create', NULL, NULL, '2022-12-22 21:31:52', '2023-02-19 17:23:53', NULL),
(108, 20, 'delete_admin_sponsor_management_sponsor_visa_create', NULL, NULL, '2022-12-22 21:31:52', '2023-02-19 17:23:53', NULL),
(109, 20, 'show_admin_sponsor_management_sponsor_visa_create', NULL, NULL, '2022-12-22 21:31:52', '2023-02-19 17:23:53', NULL),
(110, 21, 'access_admin_sponsor_management_sponsor_visa', NULL, NULL, '2022-12-22 21:33:28', '2023-03-03 14:47:06', NULL),
(111, 21, 'create_admin_sponsor_management_sponsor_visa', NULL, NULL, '2022-12-22 21:33:28', '2023-03-03 14:47:06', NULL),
(112, 21, 'edit_admin_sponsor_management_sponsor_visa', NULL, NULL, '2022-12-22 21:33:28', '2023-03-03 14:47:06', NULL),
(113, 21, 'delete_admin_sponsor_management_sponsor_visa', NULL, NULL, '2022-12-22 21:33:28', '2023-03-03 14:47:06', NULL),
(114, 21, 'show_admin_sponsor_management_sponsor_visa', NULL, NULL, '2022-12-22 21:33:28', '2023-03-03 14:47:06', NULL),
(115, 22, 'access_agent_agency_management', NULL, NULL, '2022-12-22 22:28:46', '2023-02-14 17:46:53', NULL),
(116, 23, 'access_admin_agent_agency_management_agent_create', NULL, NULL, '2022-12-22 22:30:55', '2023-02-19 17:26:00', NULL),
(117, 23, 'create_admin_agent_agency_management_agent_create', NULL, NULL, '2022-12-22 22:30:55', '2023-02-19 17:26:00', NULL),
(118, 23, 'edit_admin_agent_agency_management_agent_create', NULL, NULL, '2022-12-22 22:30:55', '2023-02-19 17:26:00', NULL),
(119, 23, 'delete_admin_agent_agency_management_agent_create', NULL, NULL, '2022-12-22 22:30:55', '2023-02-19 17:26:00', NULL),
(120, 23, 'show_admin_agent_agency_management_agent_create', NULL, NULL, '2022-12-22 22:30:55', '2023-02-19 17:26:00', NULL),
(121, 24, 'access_admin_agent_agency_management_agent', NULL, NULL, '2022-12-22 22:32:17', '2023-02-19 17:27:05', NULL),
(122, 24, 'create_admin_agent_agency_management_agent', NULL, NULL, '2022-12-22 22:32:17', '2023-02-19 17:27:05', NULL),
(123, 24, 'edit_admin_agent_agency_management_agent', NULL, NULL, '2022-12-22 22:32:17', '2023-02-19 17:27:05', NULL),
(124, 24, 'delete_admin_agent_agency_management_agent', NULL, NULL, '2022-12-22 22:32:17', '2023-02-19 17:27:05', NULL),
(125, 24, 'show_admin_agent_agency_management_agent', NULL, NULL, '2022-12-22 22:32:17', '2023-02-19 17:27:05', NULL),
(126, 25, 'access_admin_agent_agency_management_agency_create', NULL, NULL, '2022-12-22 23:31:36', '2023-02-19 17:27:55', NULL),
(127, 25, 'create_admin_agent_agency_management_agency_create', NULL, NULL, '2022-12-22 23:31:36', '2023-02-19 17:27:55', NULL),
(128, 25, 'edit_admin_agent_agency_management_agency_create', NULL, NULL, '2022-12-22 23:31:36', '2023-02-19 17:27:55', NULL),
(129, 25, 'delete_admin_agent_agency_management_agency_create', NULL, NULL, '2022-12-22 23:31:36', '2023-02-19 17:27:55', NULL),
(130, 25, 'show_admin_agent_agency_management_agency_create', NULL, NULL, '2022-12-22 23:31:36', '2023-02-19 17:27:55', NULL),
(131, 26, 'access_admin_agent_agency_management_agency', NULL, NULL, '2022-12-22 23:32:49', '2023-02-19 17:28:58', NULL),
(132, 26, 'create_admin_agent_agency_management_agency', NULL, NULL, '2022-12-22 23:32:49', '2023-02-19 17:28:58', NULL),
(133, 26, 'edit_admin_agent_agency_management_agency', NULL, NULL, '2022-12-22 23:32:49', '2023-02-19 17:28:58', NULL),
(134, 26, 'delete_admin_agent_agency_management_agency', NULL, NULL, '2022-12-22 23:32:49', '2023-02-19 17:28:58', NULL),
(135, 26, 'show_admin_agent_agency_management_agency', NULL, NULL, '2022-12-22 23:32:49', '2023-02-19 17:28:58', NULL),
(136, 27, 'access_passenger_management', NULL, NULL, '2022-12-22 23:51:01', '2023-02-14 16:34:25', NULL),
(137, 28, 'access_admin_passenger_management_passenger_create', NULL, NULL, '2022-12-22 23:54:01', '2023-02-19 17:33:46', NULL),
(138, 28, 'create_admin_passenger_management_passenger_create', NULL, NULL, '2022-12-22 23:54:01', '2023-02-19 17:33:46', NULL),
(139, 28, 'edit_admin_passenger_management_passenger_create', NULL, NULL, '2022-12-22 23:54:01', '2023-02-19 17:33:46', NULL),
(140, 28, 'delete_admin_passenger_management_passenger_create', NULL, NULL, '2022-12-22 23:54:01', '2023-02-19 17:33:46', NULL),
(141, 28, 'show_admin_passenger_management_passenger_create', NULL, NULL, '2022-12-22 23:54:01', '2023-02-19 17:33:46', NULL),
(142, 29, 'access_admin_passenger_management_passenger', NULL, NULL, '2022-12-22 23:57:03', '2023-02-19 17:34:45', NULL),
(143, 29, 'create_admin_passenger_management_passenger', NULL, NULL, '2022-12-22 23:57:03', '2023-02-19 17:34:45', NULL),
(144, 29, 'edit_admin_passenger_management_passenger', NULL, NULL, '2022-12-22 23:57:03', '2023-02-19 17:34:45', NULL),
(145, 29, 'delete_admin_passenger_management_passenger', NULL, NULL, '2022-12-22 23:57:03', '2023-02-19 17:34:45', NULL),
(146, 29, 'show_admin_passenger_management_passenger', NULL, NULL, '2022-12-22 23:57:03', '2023-02-19 17:34:45', NULL),
(147, 30, 'access_admin_inventory_management_shelf', NULL, 1, '2022-12-23 02:16:18', '2023-06-06 08:58:22', NULL),
(148, 30, 'create_admin_inventory_management_shelf', NULL, 1, '2022-12-23 02:16:18', '2023-06-06 08:58:22', NULL),
(149, 30, 'edit_admin_inventory_management_shelf', NULL, 1, '2022-12-23 02:16:18', '2023-06-06 08:58:22', NULL),
(150, 30, 'delete_admin_inventory_management_shelf', NULL, 1, '2022-12-23 02:16:18', '2023-06-06 08:58:22', NULL),
(151, 30, 'show_admin_inventory_management_shelf', NULL, 1, '2022-12-23 02:16:18', '2023-06-06 08:58:22', NULL),
(152, 31, 'access_admin_passenger_management_passenger_transaction_create', NULL, NULL, '2022-12-23 19:31:37', '2023-02-19 17:35:47', NULL),
(153, 31, 'create_admin_passenger_management_passenger_transaction_create', NULL, NULL, '2022-12-23 19:31:37', '2023-02-19 17:35:47', NULL),
(154, 31, 'edit_admin_passenger_management_passenger_transaction_create', NULL, NULL, '2022-12-23 19:31:37', '2023-02-19 17:35:47', NULL),
(155, 31, 'delete_admin_passenger_management_passenger_transaction_create', NULL, NULL, '2022-12-23 19:31:37', '2023-02-19 17:35:47', NULL),
(156, 31, 'show_admin_passenger_management_passenger_transaction_create', NULL, NULL, '2022-12-23 19:31:37', '2023-02-19 17:35:47', NULL),
(157, 32, 'access_admin_passenger_management_passenger_transaction', NULL, NULL, '2022-12-23 19:33:31', '2023-02-19 17:36:35', NULL),
(158, 32, 'create_admin_passenger_management_passenger_transaction', NULL, NULL, '2022-12-23 19:33:31', '2023-02-19 17:36:35', NULL),
(159, 32, 'edit_admin_passenger_management_passenger_transaction', NULL, NULL, '2022-12-23 19:33:31', '2023-02-19 17:36:35', NULL),
(160, 32, 'delete_admin_passenger_management_passenger_transaction', NULL, NULL, '2022-12-23 19:33:31', '2023-02-19 17:36:35', NULL),
(161, 32, 'show_admin_passenger_management_passenger_transaction', NULL, NULL, '2022-12-23 19:33:31', '2023-02-19 17:36:35', NULL),
(162, 33, 'access_account_management', NULL, NULL, '2022-12-24 11:47:40', '2023-02-18 14:53:18', NULL),
(163, 34, 'access_admin_inventory_management_group', NULL, 1, '2022-12-24 21:46:55', '2023-06-06 08:58:47', NULL),
(164, 34, 'create_admin_inventory_management_group', NULL, 1, '2022-12-24 21:46:55', '2023-06-06 08:58:47', NULL),
(165, 34, 'edit_admin_inventory_management_group', NULL, 1, '2022-12-24 21:46:55', '2023-06-06 08:58:47', NULL),
(166, 34, 'delete_admin_inventory_management_group', NULL, 1, '2022-12-24 21:46:55', '2023-06-06 08:58:47', NULL),
(167, 34, 'show_admin_inventory_management_group', NULL, 1, '2022-12-24 21:46:55', '2023-06-06 08:58:47', NULL),
(168, 35, 'access_admin_inventory_management_subgroup', NULL, 1, '2022-12-24 21:48:27', '2023-06-06 08:59:45', NULL),
(169, 35, 'create_admin_inventory_management_subgroup', NULL, 1, '2022-12-24 21:48:27', '2023-06-06 08:59:45', NULL),
(170, 35, 'edit_admin_inventory_management_subgroup', NULL, 1, '2022-12-24 21:48:27', '2023-06-06 08:59:45', NULL),
(171, 35, 'delete_admin_inventory_management_subgroup', NULL, 1, '2022-12-24 21:48:27', '2023-06-06 08:59:45', NULL),
(172, 35, 'show_admin_inventory_management_subgroup', NULL, 1, '2022-12-24 21:48:27', '2023-06-06 08:59:45', NULL),
(173, 36, 'access_admin_account_management_ledger_head', NULL, NULL, '2022-12-24 21:50:22', '2023-02-19 18:27:59', NULL),
(174, 36, 'create_admin_account_management_ledger_head', NULL, NULL, '2022-12-24 21:50:22', '2023-02-19 18:27:59', NULL),
(175, 36, 'edit_admin_account_management_ledger_head', NULL, NULL, '2022-12-24 21:50:22', '2023-02-19 18:27:59', NULL),
(176, 36, 'delete_admin_account_management_ledger_head', NULL, NULL, '2022-12-24 21:50:22', '2023-02-19 18:27:59', NULL),
(177, 36, 'show_admin_account_management_ledger_head', NULL, NULL, '2022-12-24 21:50:22', '2023-02-19 18:27:59', NULL),
(178, 37, 'access_voucher_management', NULL, NULL, '2022-12-24 23:55:22', '2023-02-19 17:39:31', NULL),
(179, 38, 'access_admin_voucher_management_receive_voucher_create', NULL, NULL, '2022-12-25 00:00:08', '2023-02-19 16:33:17', NULL),
(180, 38, 'create_admin_voucher_management_receive_voucher_create', NULL, NULL, '2022-12-25 00:00:08', '2023-02-19 16:33:17', NULL),
(181, 38, 'edit_admin_voucher_management_receive_voucher_create', NULL, NULL, '2022-12-25 00:00:08', '2023-02-19 16:33:17', NULL),
(182, 38, 'delete_admin_voucher_management_receive_voucher_create', NULL, NULL, '2022-12-25 00:00:08', '2023-02-19 16:33:17', NULL),
(183, 38, 'show_admin_voucher_management_receive_voucher_create', NULL, NULL, '2022-12-25 00:00:08', '2023-02-19 16:33:17', NULL),
(184, 39, 'access_admin_voucher_management_payment_voucher_create', NULL, NULL, '2022-12-25 00:02:55', '2023-02-19 17:37:35', NULL),
(185, 39, 'create_admin_voucher_management_payment_voucher_create', NULL, NULL, '2022-12-25 00:02:55', '2023-02-19 17:37:35', NULL),
(186, 39, 'edit_admin_voucher_management_payment_voucher_create', NULL, NULL, '2022-12-25 00:02:55', '2023-02-19 17:37:35', NULL),
(187, 39, 'delete_admin_voucher_management_payment_voucher_create', NULL, NULL, '2022-12-25 00:02:55', '2023-02-19 17:37:35', NULL),
(188, 39, 'show_admin_voucher_management_payment_voucher_create', NULL, NULL, '2022-12-25 00:02:55', '2023-02-19 17:37:35', NULL),
(189, 40, 'access_admin_voucher_management_contra_voucher_create', NULL, NULL, '2022-12-25 00:06:05', '2023-03-03 23:48:21', NULL),
(190, 40, 'create_admin_voucher_management_contra_voucher_create', NULL, NULL, '2022-12-25 00:06:05', '2023-03-03 23:48:21', NULL),
(191, 40, 'edit_admin_voucher_management_contra_voucher_create', NULL, NULL, '2022-12-25 00:06:05', '2023-03-03 23:48:21', NULL),
(192, 40, 'delete_admin_voucher_management_contra_voucher_create', NULL, NULL, '2022-12-25 00:06:05', '2023-03-03 23:48:21', NULL),
(193, 40, 'show_admin_voucher_management_contra_voucher_create', NULL, NULL, '2022-12-25 00:06:05', '2023-03-03 23:48:21', NULL),
(194, 41, 'access_admin_voucher_management_receive_voucher', NULL, NULL, '2022-12-25 03:10:17', '2023-02-19 17:38:17', NULL),
(195, 41, 'create_admin_voucher_management_receive_voucher', NULL, NULL, '2022-12-25 03:10:17', '2023-02-19 17:38:17', NULL),
(196, 41, 'edit_admin_voucher_management_receive_voucher', NULL, NULL, '2022-12-25 03:10:17', '2023-02-19 17:38:17', NULL),
(197, 41, 'delete_admin_voucher_management_receive_voucher', NULL, NULL, '2022-12-25 03:10:17', '2023-02-19 17:38:17', NULL),
(198, 41, 'show_admin_voucher_management_receive_voucher', NULL, NULL, '2022-12-25 03:10:17', '2023-02-19 17:38:17', NULL),
(199, 42, 'access_admin_voucher_management_payment_voucher', NULL, NULL, '2022-12-25 03:16:53', '2023-02-26 14:05:42', NULL),
(200, 42, 'create_admin_voucher_management_payment_voucher', NULL, NULL, '2022-12-25 03:16:53', '2023-02-26 14:05:42', NULL),
(201, 42, 'edit_admin_voucher_management_payment_voucher', NULL, NULL, '2022-12-25 03:16:53', '2023-02-26 14:05:42', NULL),
(202, 42, 'delete_admin_voucher_management_payment_voucher', NULL, NULL, '2022-12-25 03:16:53', '2023-02-26 14:05:42', NULL),
(203, 42, 'show_admin_voucher_management_payment_voucher', NULL, NULL, '2022-12-25 03:16:53', '2023-02-26 14:05:42', NULL),
(204, 43, 'access_admin_voucher_management_contra_voucher', NULL, NULL, '2022-12-25 03:20:31', '2023-03-03 23:48:35', NULL),
(205, 43, 'create_admin_voucher_management_contra_voucher', NULL, NULL, '2022-12-25 03:20:31', '2023-03-03 23:48:35', NULL),
(206, 43, 'edit_admin_voucher_management_contra_voucher', NULL, NULL, '2022-12-25 03:20:31', '2023-03-03 23:48:35', NULL),
(207, 43, 'delete_admin_voucher_management_contra_voucher', NULL, NULL, '2022-12-25 03:20:31', '2023-03-03 23:48:35', NULL),
(208, 43, 'show_admin_voucher_management_contra_voucher', NULL, NULL, '2022-12-25 03:20:31', '2023-03-03 23:48:35', NULL),
(209, 44, 'access_admin_language', NULL, NULL, '2022-12-27 10:14:32', '2023-02-22 19:03:16', NULL),
(210, 44, 'create_admin_language', NULL, NULL, '2022-12-27 10:14:32', '2023-02-22 19:03:16', NULL),
(211, 44, 'edit_admin_language', NULL, NULL, '2022-12-27 10:14:32', '2023-02-22 19:03:16', NULL),
(212, 44, 'delete_admin_language', NULL, NULL, '2022-12-27 10:14:32', '2023-02-22 19:03:16', NULL),
(213, 44, 'show_admin_language', NULL, NULL, '2022-12-27 10:14:32', '2023-02-22 19:03:16', NULL),
(214, 45, 'access_admin_general_settings_currency', NULL, NULL, '2022-12-28 10:31:37', '2023-02-19 17:09:05', NULL),
(215, 45, 'create_admin_general_settings_currency', NULL, NULL, '2022-12-28 10:31:37', '2023-02-19 17:09:05', NULL),
(216, 45, 'edit_admin_general_settings_currency', NULL, NULL, '2022-12-28 10:31:37', '2023-02-19 17:09:05', NULL),
(217, 45, 'delete_admin_general_settings_currency', NULL, NULL, '2022-12-28 10:31:37', '2023-02-19 17:09:05', NULL),
(218, 45, 'show_admin_general_settings_currency', NULL, NULL, '2022-12-28 10:31:37', '2023-02-19 17:09:05', NULL),
(219, 46, 'access_admin_general_settings_warehouse', NULL, 1, '2022-12-28 18:51:40', '2023-06-06 08:55:58', NULL),
(220, 46, 'create_admin_general_settings_warehouse', NULL, 1, '2022-12-28 18:51:40', '2023-06-06 08:55:58', NULL),
(221, 46, 'edit_admin_general_settings_warehouse', NULL, 1, '2022-12-28 18:51:40', '2023-06-06 08:55:58', NULL),
(222, 46, 'delete_admin_general_settings_warehouse', NULL, 1, '2022-12-28 18:51:40', '2023-06-06 08:55:58', NULL),
(223, 46, 'show_admin_general_settings_warehouse', NULL, 1, '2022-12-28 18:51:40', '2023-06-06 08:55:58', NULL),
(224, 47, 'access_admin_dashboard', NULL, NULL, '2023-01-01 09:11:19', '2023-02-19 17:07:27', NULL),
(225, 47, 'create_admin_dashboard', NULL, NULL, '2023-01-01 09:11:19', '2023-02-19 17:07:27', NULL),
(226, 47, 'edit_admin_dashboard', NULL, NULL, '2023-01-01 09:11:19', '2023-02-19 17:07:27', NULL),
(227, 47, 'delete_admin_dashboard', NULL, NULL, '2023-01-01 09:11:19', '2023-02-19 17:07:27', NULL),
(228, 47, 'show_admin_dashboard', NULL, NULL, '2023-01-01 09:11:19', '2023-02-19 17:07:27', NULL),
(229, 48, 'access_report', NULL, 1, '2023-02-20 07:39:54', '2023-06-06 08:54:33', NULL),
(230, 49, 'access_admin_report_management_customer_account', NULL, NULL, '2023-02-20 07:41:09', '2023-03-29 13:16:41', NULL),
(231, 49, 'create_admin_report_management_customer_account', NULL, NULL, '2023-02-20 07:41:09', '2023-03-29 13:16:41', NULL),
(232, 49, 'edit_admin_report_management_customer_account', NULL, NULL, '2023-02-20 07:41:09', '2023-03-29 13:16:41', NULL),
(233, 49, 'delete_admin_report_management_customer_account', NULL, NULL, '2023-02-20 07:41:09', '2023-03-29 13:16:41', NULL),
(234, 49, 'show_admin_report_management_customer_account', NULL, NULL, '2023-02-20 07:41:09', '2023-03-29 13:16:41', NULL),
(235, 50, 'access_admin_report_management_agent_account', NULL, NULL, '2023-03-10 21:52:30', '2023-03-29 13:17:45', NULL),
(236, 50, 'create_admin_report_management_agent_account', NULL, NULL, '2023-03-10 21:52:30', '2023-03-29 13:17:45', NULL),
(237, 50, 'edit_admin_report_management_agent_account', NULL, NULL, '2023-03-10 21:52:30', '2023-03-29 13:17:45', NULL),
(238, 50, 'delete_admin_report_management_agent_account', NULL, NULL, '2023-03-10 21:52:30', '2023-03-29 13:17:45', NULL),
(239, 50, 'show_admin_report_management_agent_account', NULL, NULL, '2023-03-10 21:52:30', '2023-03-29 13:17:45', NULL),
(240, 51, 'access_admin_report_management_office_statement', NULL, NULL, '2023-03-10 21:53:38', '2023-03-29 13:18:30', NULL),
(241, 51, 'create_admin_report_management_office_statement', NULL, NULL, '2023-03-10 21:53:38', '2023-03-29 13:18:30', NULL),
(242, 51, 'edit_admin_report_management_office_statement', NULL, NULL, '2023-03-10 21:53:38', '2023-03-29 13:18:30', NULL),
(243, 51, 'delete_admin_report_management_office_statement', NULL, NULL, '2023-03-10 21:53:38', '2023-03-29 13:18:30', NULL),
(244, 51, 'show_admin_report_management_office_statement', NULL, NULL, '2023-03-10 21:53:38', '2023-03-29 13:18:30', NULL),
(245, 52, 'access_admin_report_management_chart_of_accounts', NULL, NULL, '2023-03-10 21:54:49', '2023-03-29 13:20:31', NULL),
(246, 52, 'create_admin_report_management_chart_of_accounts', NULL, NULL, '2023-03-10 21:54:49', '2023-03-29 13:20:31', NULL),
(247, 52, 'edit_admin_report_management_chart_of_accounts', NULL, NULL, '2023-03-10 21:54:49', '2023-03-29 13:20:31', NULL),
(248, 52, 'delete_admin_report_management_chart_of_accounts', NULL, NULL, '2023-03-10 21:54:49', '2023-03-29 13:20:31', NULL),
(249, 52, 'show_admin_report_management_chart_of_accounts', NULL, NULL, '2023-03-10 21:54:49', '2023-03-29 13:20:31', NULL),
(250, 53, 'access_admin_inventory_management_groupvolume', NULL, 1, '2023-03-11 22:27:29', '2023-06-06 08:59:11', NULL),
(251, 53, 'create_admin_inventory_management_groupvolume', NULL, 1, '2023-03-11 22:27:29', '2023-06-06 08:59:11', NULL),
(252, 53, 'edit_admin_inventory_management_groupvolume', NULL, 1, '2023-03-11 22:27:29', '2023-06-06 08:59:11', NULL),
(253, 53, 'delete_admin_inventory_management_groupvolume', NULL, 1, '2023-03-11 22:27:29', '2023-06-06 08:59:11', NULL),
(254, 53, 'show_admin_inventory_management_groupvolume', NULL, 1, '2023-03-11 22:27:29', '2023-06-06 08:59:11', NULL),
(255, 54, 'access_admin_report_management_product_stock_report', NULL, 1, '2023-03-21 22:09:40', '2023-06-10 05:30:48', NULL),
(256, 54, 'create_admin_report_management_product_stock_report', NULL, 1, '2023-03-21 22:09:40', '2023-06-10 05:30:48', NULL),
(257, 54, 'edit_admin_report_management_product_stock_report', NULL, 1, '2023-03-21 22:09:40', '2023-06-10 05:30:48', NULL),
(258, 54, 'delete_admin_report_management_product_stock_report', NULL, 1, '2023-03-21 22:09:40', '2023-06-10 05:30:48', NULL),
(259, 54, 'show_admin_report_management_product_stock_report', NULL, 1, '2023-03-21 22:09:40', '2023-06-10 05:30:48', NULL),
(260, 55, 'access_admin_inventory_management_subgroupvolume', NULL, 1, '2023-03-30 05:05:37', '2023-06-06 09:00:50', NULL),
(261, 55, 'create_admin_inventory_management_subgroupvolume', NULL, 1, '2023-03-30 05:05:37', '2023-06-06 09:00:50', NULL),
(262, 55, 'edit_admin_inventory_management_subgroupvolume', NULL, 1, '2023-03-30 05:05:37', '2023-06-06 09:00:50', NULL),
(263, 55, 'delete_admin_inventory_management_subgroupvolume', NULL, 1, '2023-03-30 05:05:37', '2023-06-06 09:00:50', NULL),
(264, 55, 'show_admin_inventory_management_subgroupvolume', NULL, 1, '2023-03-30 05:05:37', '2023-06-06 09:00:50', NULL),
(265, 56, 'access_admin_user_management_users_create', NULL, 1, '2023-04-10 04:28:18', '2023-07-23 13:51:11', NULL),
(266, 56, 'create_admin_user_management_users_create', NULL, 1, '2023-04-10 04:28:18', '2023-07-23 13:51:11', NULL),
(267, 56, 'edit_admin_user_management_users_create', NULL, 1, '2023-04-10 04:28:18', '2023-07-23 13:51:11', NULL),
(268, 56, 'delete_admin_user_management_users_create', NULL, 1, '2023-04-10 04:28:18', '2023-07-23 13:51:11', NULL),
(269, 56, 'show_admin_user_management_users_create', NULL, 1, '2023-04-10 04:28:18', '2023-07-23 13:51:11', NULL),
(270, 57, 'access_admin_general_settings_branch', NULL, 1, '2023-05-19 17:59:07', '2023-06-06 08:55:39', NULL),
(271, 57, 'create_admin_general_settings_branch', NULL, 1, '2023-05-19 17:59:07', '2023-06-06 08:55:39', NULL),
(272, 57, 'edit_admin_general_settings_branch', NULL, 1, '2023-05-19 17:59:07', '2023-06-06 08:55:39', NULL),
(273, 57, 'delete_admin_general_settings_branch', NULL, 1, '2023-05-19 17:59:07', '2023-06-06 08:55:39', NULL),
(274, 57, 'show_admin_general_settings_branch', NULL, 1, '2023-05-19 17:59:07', '2023-06-06 08:55:39', NULL),
(275, 58, 'access_inventory', NULL, 1, '2023-05-19 19:35:56', '2023-06-06 08:53:09', NULL),
(276, 59, 'access_admin_inventory_management_brand', NULL, 1, '2023-05-19 20:21:03', '2023-06-06 08:57:24', NULL),
(277, 59, 'create_admin_inventory_management_brand', NULL, 1, '2023-05-19 20:21:03', '2023-06-06 08:57:24', NULL),
(278, 59, 'edit_admin_inventory_management_brand', NULL, 1, '2023-05-19 20:21:03', '2023-06-06 08:57:24', NULL),
(279, 59, 'delete_admin_inventory_management_brand', NULL, 1, '2023-05-19 20:21:03', '2023-06-06 08:57:24', NULL),
(280, 59, 'show_admin_inventory_management_brand', NULL, 1, '2023-05-19 20:21:03', '2023-06-06 08:57:25', NULL),
(281, 60, 'access_admin_inventory_management_model', NULL, 1, '2023-05-19 20:43:39', '2023-06-06 08:57:33', NULL),
(282, 60, 'create_admin_inventory_management_model', NULL, 1, '2023-05-19 20:43:39', '2023-06-06 08:57:33', NULL),
(283, 60, 'edit_admin_inventory_management_model', NULL, 1, '2023-05-19 20:43:39', '2023-06-06 08:57:33', NULL),
(284, 60, 'delete_admin_inventory_management_model', NULL, 1, '2023-05-19 20:43:39', '2023-06-06 08:57:33', NULL),
(285, 60, 'show_admin_inventory_management_model', NULL, 1, '2023-05-19 20:43:39', '2023-06-06 08:57:33', NULL),
(286, 61, 'access_admin_inventory_management_item_create', NULL, 1, '2023-05-22 19:31:12', '2023-06-06 09:01:17', NULL),
(287, 61, 'create_admin_inventory_management_item_create', NULL, 1, '2023-05-22 19:31:12', '2023-06-06 09:01:17', NULL),
(288, 61, 'edit_admin_inventory_management_item_create', NULL, 1, '2023-05-22 19:31:12', '2023-06-06 09:01:17', NULL),
(289, 61, 'delete_admin_inventory_management_item_create', NULL, 1, '2023-05-22 19:31:12', '2023-06-06 09:01:17', NULL),
(290, 61, 'show_admin_inventory_management_item_create', NULL, 1, '2023-05-22 19:31:12', '2023-06-06 09:01:17', NULL),
(291, 62, 'access_admin_inventory_management_item', NULL, 1, '2023-05-22 19:32:01', '2023-06-06 09:01:36', NULL),
(292, 62, 'create_admin_inventory_management_item', NULL, 1, '2023-05-22 19:32:01', '2023-06-06 09:01:36', NULL),
(293, 62, 'edit_admin_inventory_management_item', NULL, 1, '2023-05-22 19:32:01', '2023-06-06 09:01:36', NULL),
(294, 62, 'delete_admin_inventory_management_item', NULL, 1, '2023-05-22 19:32:01', '2023-06-06 09:01:36', NULL),
(295, 62, 'show_admin_inventory_management_item', NULL, 1, '2023-05-22 19:32:01', '2023-06-06 09:01:36', NULL),
(296, 63, 'access_requisition', NULL, 1, '2023-05-27 11:04:07', '2023-06-06 08:53:28', NULL),
(297, 64, 'access_admin_section_requisition_management_party_create', NULL, 1, '2023-05-27 11:06:54', '2023-06-06 09:02:44', NULL),
(298, 64, 'create_admin_section_requisition_management_party_create', NULL, 1, '2023-05-27 11:06:54', '2023-06-06 09:02:44', NULL),
(299, 64, 'edit_admin_section_requisition_management_party_create', NULL, 1, '2023-05-27 11:06:54', '2023-06-06 09:02:44', NULL),
(300, 64, 'delete_admin_section_requisition_management_party_create', NULL, 1, '2023-05-27 11:06:54', '2023-06-06 09:02:45', NULL),
(301, 64, 'show_admin_section_requisition_management_party_create', NULL, 1, '2023-05-27 11:06:54', '2023-06-06 09:02:45', NULL),
(302, 65, 'access_admin_section_requisition_management_party', NULL, NULL, '2023-05-27 11:07:50', NULL, NULL),
(303, 65, 'create_admin_section_requisition_management_party', NULL, NULL, '2023-05-27 11:07:50', NULL, NULL),
(304, 65, 'edit_admin_section_requisition_management_party', NULL, NULL, '2023-05-27 11:07:50', NULL, NULL),
(305, 65, 'delete_admin_section_requisition_management_party', NULL, NULL, '2023-05-27 11:07:50', NULL, NULL),
(306, 65, 'show_admin_section_requisition_management_party', NULL, NULL, '2023-05-27 11:07:50', NULL, NULL),
(307, 66, 'access_admin_section_requisition_management_job_create', NULL, 1, '2023-05-28 19:02:39', '2023-06-06 09:03:16', NULL),
(308, 66, 'create_admin_section_requisition_management_job_create', NULL, 1, '2023-05-28 19:02:39', '2023-06-06 09:03:16', NULL),
(309, 66, 'edit_admin_section_requisition_management_job_create', NULL, 1, '2023-05-28 19:02:39', '2023-06-06 09:03:16', NULL),
(310, 66, 'delete_admin_section_requisition_management_job_create', NULL, 1, '2023-05-28 19:02:39', '2023-06-06 09:03:16', NULL),
(311, 66, 'show_admin_section_requisition_management_job_create', NULL, 1, '2023-05-28 19:02:39', '2023-06-06 09:03:16', NULL),
(312, 67, 'access_admin_section_requisition_management_job', NULL, NULL, '2023-05-28 19:03:17', NULL, NULL),
(313, 67, 'create_admin_section_requisition_management_job', NULL, NULL, '2023-05-28 19:03:17', NULL, NULL),
(314, 67, 'edit_admin_section_requisition_management_job', NULL, NULL, '2023-05-28 19:03:17', NULL, NULL),
(315, 67, 'delete_admin_section_requisition_management_job', NULL, NULL, '2023-05-28 19:03:17', NULL, NULL),
(316, 67, 'show_admin_section_requisition_management_job', NULL, NULL, '2023-05-28 19:03:17', NULL, NULL),
(317, 68, 'access_admin_section_requisition_management_requisition_create', NULL, 1, '2023-05-28 19:24:17', '2023-06-06 09:03:37', NULL),
(318, 68, 'create_admin_section_requisition_management_requisition_create', NULL, 1, '2023-05-28 19:24:17', '2023-06-06 09:03:37', NULL),
(319, 68, 'edit_admin_section_requisition_management_requisition_create', NULL, 1, '2023-05-28 19:24:17', '2023-06-06 09:03:37', NULL),
(320, 68, 'delete_admin_section_requisition_management_requisition_create', NULL, 1, '2023-05-28 19:24:17', '2023-06-06 09:03:37', NULL),
(321, 68, 'show_admin_section_requisition_management_requisition_create', NULL, 1, '2023-05-28 19:24:17', '2023-06-06 09:03:37', NULL),
(322, 69, 'access_admin_section_requisition_management_requisition', NULL, NULL, '2023-05-28 19:25:02', NULL, NULL),
(323, 69, 'create_admin_section_requisition_management_requisition', NULL, NULL, '2023-05-28 19:25:02', NULL, NULL),
(324, 69, 'edit_admin_section_requisition_management_requisition', NULL, NULL, '2023-05-28 19:25:02', NULL, NULL),
(325, 69, 'delete_admin_section_requisition_management_requisition', NULL, NULL, '2023-05-28 19:25:02', NULL, NULL),
(326, 69, 'show_admin_section_requisition_management_requisition', NULL, NULL, '2023-05-28 19:25:02', NULL, NULL),
(327, 70, 'access_admin_general_settings_card', NULL, 1, '2023-05-29 19:01:01', '2023-06-06 08:56:34', NULL),
(328, 70, 'create_admin_general_settings_card', NULL, 1, '2023-05-29 19:01:01', '2023-06-06 08:56:34', NULL),
(329, 70, 'edit_admin_general_settings_card', NULL, 1, '2023-05-29 19:01:01', '2023-06-06 08:56:34', NULL),
(330, 70, 'delete_admin_general_settings_card', NULL, 1, '2023-05-29 19:01:01', '2023-06-06 08:56:34', NULL),
(331, 70, 'show_admin_general_settings_card', NULL, 1, '2023-05-29 19:01:01', '2023-06-06 08:56:34', NULL),
(332, 71, 'access_admin_general_settings_designation', NULL, 1, '2023-05-29 19:25:44', '2023-06-06 08:56:45', NULL),
(333, 71, 'create_admin_general_settings_designation', NULL, 1, '2023-05-29 19:25:44', '2023-06-06 08:56:45', NULL),
(334, 71, 'edit_admin_general_settings_designation', NULL, 1, '2023-05-29 19:25:44', '2023-06-06 08:56:45', NULL),
(335, 71, 'delete_admin_general_settings_designation', NULL, 1, '2023-05-29 19:25:44', '2023-06-06 08:56:45', NULL),
(336, 71, 'show_admin_general_settings_designation', NULL, 1, '2023-05-29 19:25:44', '2023-06-06 08:56:45', NULL),
(337, 72, 'access_main_store', NULL, 1, '2023-05-31 17:56:01', '2023-06-09 08:33:15', NULL),
(338, 73, 'access_admin_main_warehouse_management_vendor_create', NULL, 1, '2023-05-31 17:58:00', '2023-06-06 09:04:32', NULL),
(339, 73, 'create_admin_main_warehouse_management_vendor_create', NULL, 1, '2023-05-31 17:58:00', '2023-06-06 09:04:32', NULL),
(340, 73, 'edit_admin_main_warehouse_management_vendor_create', NULL, 1, '2023-05-31 17:58:00', '2023-06-06 09:04:32', NULL),
(341, 73, 'delete_admin_main_warehouse_management_vendor_create', NULL, 1, '2023-05-31 17:58:00', '2023-06-06 09:04:32', NULL),
(342, 73, 'show_admin_main_warehouse_management_vendor_create', NULL, 1, '2023-05-31 17:58:00', '2023-06-06 09:04:32', NULL),
(343, 74, 'access_admin_main_warehouse_management_vendor', NULL, 1, '2023-05-31 17:58:29', '2023-05-31 18:10:50', NULL),
(344, 74, 'create_admin_main_warehouse_management_vendor', NULL, 1, '2023-05-31 17:58:29', '2023-05-31 18:10:50', NULL),
(345, 74, 'edit_admin_main_warehouse_management_vendor', NULL, 1, '2023-05-31 17:58:29', '2023-05-31 18:10:50', NULL),
(346, 74, 'delete_admin_main_warehouse_management_vendor', NULL, 1, '2023-05-31 17:58:29', '2023-05-31 18:10:50', NULL),
(347, 74, 'show_admin_main_warehouse_management_vendor', NULL, 1, '2023-05-31 17:58:29', '2023-05-31 18:10:50', NULL),
(348, 75, 'access_admin_main_warehouse_management_inspector_create', NULL, 1, '2023-05-31 18:38:17', '2023-06-06 09:04:47', NULL),
(349, 75, 'create_admin_main_warehouse_management_inspector_create', NULL, 1, '2023-05-31 18:38:17', '2023-06-06 09:04:47', NULL),
(350, 75, 'edit_admin_main_warehouse_management_inspector_create', NULL, 1, '2023-05-31 18:38:17', '2023-06-06 09:04:47', NULL),
(351, 75, 'delete_admin_main_warehouse_management_inspector_create', NULL, 1, '2023-05-31 18:38:17', '2023-06-06 09:04:47', NULL),
(352, 75, 'show_admin_main_warehouse_management_inspector_create', NULL, 1, '2023-05-31 18:38:17', '2023-06-06 09:04:47', NULL),
(353, 76, 'access_admin_main_warehouse_management_inspector', NULL, NULL, '2023-05-31 18:38:52', NULL, NULL),
(354, 76, 'create_admin_main_warehouse_management_inspector', NULL, NULL, '2023-05-31 18:38:52', NULL, NULL),
(355, 76, 'edit_admin_main_warehouse_management_inspector', NULL, NULL, '2023-05-31 18:38:52', NULL, NULL),
(356, 76, 'delete_admin_main_warehouse_management_inspector', NULL, NULL, '2023-05-31 18:38:52', NULL, NULL),
(357, 76, 'show_admin_main_warehouse_management_inspector', NULL, NULL, '2023-05-31 18:38:52', NULL, NULL),
(358, 77, 'access_admin_main_warehouse_management_delivery_create', NULL, 1, '2023-05-31 19:20:27', '2023-05-31 19:22:13', NULL),
(359, 77, 'create_admin_main_warehouse_management_delivery_create', NULL, 1, '2023-05-31 19:20:27', '2023-05-31 19:22:13', NULL),
(360, 77, 'edit_admin_main_warehouse_management_delivery_create', NULL, 1, '2023-05-31 19:20:27', '2023-05-31 19:22:13', NULL),
(361, 77, 'delete_admin_main_warehouse_management_delivery_create', NULL, 1, '2023-05-31 19:20:27', '2023-05-31 19:22:13', NULL),
(362, 77, 'show_admin_main_warehouse_management_delivery_create', NULL, 1, '2023-05-31 19:20:27', '2023-05-31 19:22:13', NULL),
(363, 78, 'access_admin_main_warehouse_management_delivery', NULL, 1, '2023-05-31 19:21:57', '2023-06-06 09:05:37', NULL),
(364, 78, 'create_admin_main_warehouse_management_delivery', NULL, 1, '2023-05-31 19:21:57', '2023-06-06 09:05:37', NULL),
(365, 78, 'edit_admin_main_warehouse_management_delivery', NULL, 1, '2023-05-31 19:21:57', '2023-06-06 09:05:37', NULL),
(366, 78, 'delete_admin_main_warehouse_management_delivery', NULL, 1, '2023-05-31 19:21:57', '2023-06-06 09:05:37', NULL),
(367, 78, 'show_admin_main_warehouse_management_delivery', NULL, 1, '2023-05-31 19:21:57', '2023-06-06 09:05:37', NULL),
(368, 79, 'access_admin_main_warehouse_management_material_receive_create', NULL, 1, '2023-06-02 19:47:56', '2023-06-06 09:06:09', NULL),
(369, 79, 'create_admin_main_warehouse_management_material_receive_create', NULL, 1, '2023-06-02 19:47:56', '2023-06-06 09:06:09', NULL),
(370, 79, 'edit_admin_main_warehouse_management_material_receive_create', NULL, 1, '2023-06-02 19:47:56', '2023-06-06 09:06:09', NULL),
(371, 79, 'delete_admin_main_warehouse_management_material_receive_create', NULL, 1, '2023-06-02 19:47:56', '2023-06-06 09:06:09', NULL),
(372, 79, 'show_admin_main_warehouse_management_material_receive_create', NULL, 1, '2023-06-02 19:47:56', '2023-06-06 09:06:09', NULL),
(373, 80, 'access_admin_main_warehouse_management_material_receive', NULL, NULL, '2023-06-02 19:48:44', NULL, NULL),
(374, 80, 'create_admin_main_warehouse_management_material_receive', NULL, NULL, '2023-06-02 19:48:44', NULL, NULL),
(375, 80, 'edit_admin_main_warehouse_management_material_receive', NULL, NULL, '2023-06-02 19:48:44', NULL, NULL),
(376, 80, 'delete_admin_main_warehouse_management_material_receive', NULL, NULL, '2023-06-02 19:48:44', NULL, NULL),
(377, 80, 'show_admin_main_warehouse_management_material_receive', NULL, NULL, '2023-06-02 19:48:44', NULL, NULL),
(378, 81, 'access_admin_inventory_management_opening_create', NULL, 1, '2023-06-04 10:10:26', '2023-06-04 10:11:21', NULL),
(379, 81, 'create_admin_inventory_management_opening_create', NULL, 1, '2023-06-04 10:10:26', '2023-06-04 10:11:21', NULL),
(380, 81, 'edit_admin_inventory_management_opening_create', NULL, 1, '2023-06-04 10:10:26', '2023-06-04 10:11:21', NULL),
(381, 81, 'delete_admin_inventory_management_opening_create', NULL, 1, '2023-06-04 10:10:26', '2023-06-04 10:11:21', NULL),
(382, 81, 'show_admin_inventory_management_opening_create', NULL, 1, '2023-06-04 10:10:26', '2023-06-04 10:11:21', NULL),
(383, 82, 'access_admin_inventory_management_opening', NULL, NULL, '2023-06-04 10:11:57', NULL, NULL),
(384, 82, 'create_admin_inventory_management_opening', NULL, NULL, '2023-06-04 10:11:57', NULL, NULL),
(385, 82, 'edit_admin_inventory_management_opening', NULL, NULL, '2023-06-04 10:11:57', NULL, NULL),
(386, 82, 'delete_admin_inventory_management_opening', NULL, NULL, '2023-06-04 10:11:57', NULL, NULL),
(387, 82, 'show_admin_inventory_management_opening', NULL, NULL, '2023-06-04 10:11:57', NULL, NULL),
(388, 83, 'access_tools_store', NULL, 1, '2023-06-05 17:30:27', '2023-06-06 08:54:00', NULL),
(389, 84, 'access_admin_tools_store_management_tsrequisition_create', NULL, 1, '2023-06-05 17:33:17', '2023-06-06 09:07:06', NULL),
(390, 84, 'create_admin_tools_store_management_tsrequisition_create', NULL, 1, '2023-06-05 17:33:17', '2023-06-06 09:07:06', NULL),
(391, 84, 'edit_admin_tools_store_management_tsrequisition_create', NULL, 1, '2023-06-05 17:33:17', '2023-06-06 09:07:06', NULL),
(392, 84, 'delete_admin_tools_store_management_tsrequisition_create', NULL, 1, '2023-06-05 17:33:17', '2023-06-06 09:07:06', NULL),
(393, 84, 'show_admin_tools_store_management_tsrequisition_create', NULL, 1, '2023-06-05 17:33:17', '2023-06-06 09:07:06', NULL),
(394, 85, 'access_admin_tools_store_management_tsrequisition', NULL, 1, '2023-06-05 17:34:02', '2023-06-06 09:07:20', NULL),
(395, 85, 'create_admin_tools_store_management_tsrequisition', NULL, 1, '2023-06-05 17:34:02', '2023-06-06 09:07:20', NULL),
(396, 85, 'edit_admin_tools_store_management_tsrequisition', NULL, 1, '2023-06-05 17:34:02', '2023-06-06 09:07:20', NULL),
(397, 85, 'delete_admin_tools_store_management_tsrequisition', NULL, 1, '2023-06-05 17:34:02', '2023-06-06 09:07:20', NULL),
(398, 85, 'show_admin_tools_store_management_tsrequisition', NULL, 1, '2023-06-05 17:34:02', '2023-06-06 09:07:20', NULL),
(399, 86, 'access_admin_tools_store_management_tsrdelivery_create', NULL, 1, '2023-06-05 18:41:04', '2023-06-06 09:08:00', NULL),
(400, 86, 'create_admin_tools_store_management_tsrdelivery_create', NULL, 1, '2023-06-05 18:41:04', '2023-06-06 09:08:00', NULL),
(401, 86, 'edit_admin_tools_store_management_tsrdelivery_create', NULL, 1, '2023-06-05 18:41:04', '2023-06-06 09:08:00', NULL),
(402, 86, 'delete_admin_tools_store_management_tsrdelivery_create', NULL, 1, '2023-06-05 18:41:04', '2023-06-06 09:08:00', NULL),
(403, 86, 'show_admin_tools_store_management_tsrdelivery_create', NULL, 1, '2023-06-05 18:41:04', '2023-06-06 09:08:00', NULL),
(404, 87, 'access_admin_tools_store_management_tsrdelivery', NULL, NULL, '2023-06-05 18:42:51', NULL, NULL),
(405, 87, 'create_admin_tools_store_management_tsrdelivery', NULL, NULL, '2023-06-05 18:42:51', NULL, NULL),
(406, 87, 'edit_admin_tools_store_management_tsrdelivery', NULL, NULL, '2023-06-05 18:42:51', NULL, NULL),
(407, 87, 'delete_admin_tools_store_management_tsrdelivery', NULL, NULL, '2023-06-05 18:42:51', NULL, NULL),
(408, 87, 'show_admin_tools_store_management_tsrdelivery', NULL, NULL, '2023-06-05 18:42:51', NULL, NULL),
(409, 88, 'access_link_is_not_correct_yet', NULL, NULL, '2023-06-06 09:14:53', NULL, NULL),
(410, 88, 'create_link_is_not_correct_yet', NULL, NULL, '2023-06-06 09:14:53', NULL, NULL),
(411, 88, 'edit_link_is_not_correct_yet', NULL, NULL, '2023-06-06 09:14:53', NULL, NULL),
(412, 88, 'delete_link_is_not_correct_yet', NULL, NULL, '2023-06-06 09:14:53', NULL, NULL),
(413, 88, 'show_link_is_not_correct_yet', NULL, NULL, '2023-06-06 09:14:53', NULL, NULL),
(414, 89, 'access_admin_section_requisition_management_requisitionfor', NULL, NULL, '2023-06-08 04:13:06', NULL, NULL),
(415, 89, 'create_admin_section_requisition_management_requisitionfor', NULL, NULL, '2023-06-08 04:13:06', NULL, NULL),
(416, 89, 'edit_admin_section_requisition_management_requisitionfor', NULL, NULL, '2023-06-08 04:13:06', NULL, NULL),
(417, 89, 'delete_admin_section_requisition_management_requisitionfor', NULL, NULL, '2023-06-08 04:13:06', NULL, NULL),
(418, 89, 'show_admin_section_requisition_management_requisitionfor', NULL, NULL, '2023-06-08 04:13:06', NULL, NULL),
(419, 90, 'access_admin_report_management_product_stock_history_report', NULL, NULL, '2023-06-10 18:25:08', NULL, NULL),
(420, 90, 'create_admin_report_management_product_stock_history_report', NULL, NULL, '2023-06-10 18:25:08', NULL, NULL),
(421, 90, 'edit_admin_report_management_product_stock_history_report', NULL, NULL, '2023-06-10 18:25:08', NULL, NULL),
(422, 90, 'delete_admin_report_management_product_stock_history_report', NULL, NULL, '2023-06-10 18:25:08', NULL, NULL),
(423, 90, 'show_admin_report_management_product_stock_history_report', NULL, NULL, '2023-06-10 18:25:08', NULL, NULL),
(424, 91, 'access_admin_tools_store_management_tsitemissue_create', NULL, NULL, '2023-06-10 19:35:54', NULL, NULL),
(425, 91, 'create_admin_tools_store_management_tsitemissue_create', NULL, NULL, '2023-06-10 19:35:54', NULL, NULL),
(426, 91, 'edit_admin_tools_store_management_tsitemissue_create', NULL, NULL, '2023-06-10 19:35:54', NULL, NULL),
(427, 91, 'delete_admin_tools_store_management_tsitemissue_create', NULL, NULL, '2023-06-10 19:35:54', NULL, NULL),
(428, 91, 'show_admin_tools_store_management_tsitemissue_create', NULL, NULL, '2023-06-10 19:35:54', NULL, NULL),
(429, 92, 'access_admin_tools_store_management_tsitemissue', NULL, NULL, '2023-06-10 19:36:28', NULL, NULL),
(430, 92, 'create_admin_tools_store_management_tsitemissue', NULL, NULL, '2023-06-10 19:36:28', NULL, NULL),
(431, 92, 'edit_admin_tools_store_management_tsitemissue', NULL, NULL, '2023-06-10 19:36:28', NULL, NULL),
(432, 92, 'delete_admin_tools_store_management_tsitemissue', NULL, NULL, '2023-06-10 19:36:28', NULL, NULL),
(433, 92, 'show_admin_tools_store_management_tsitemissue', NULL, NULL, '2023-06-10 19:36:28', NULL, NULL),
(434, 93, 'access_admin_main_warehouse_management_ps_create', NULL, NULL, '2023-06-11 20:34:46', NULL, NULL),
(435, 93, 'create_admin_main_warehouse_management_ps_create', NULL, NULL, '2023-06-11 20:34:46', NULL, NULL),
(436, 93, 'edit_admin_main_warehouse_management_ps_create', NULL, NULL, '2023-06-11 20:34:46', NULL, NULL),
(437, 93, 'delete_admin_main_warehouse_management_ps_create', NULL, NULL, '2023-06-11 20:34:46', NULL, NULL),
(438, 93, 'show_admin_main_warehouse_management_ps_create', NULL, NULL, '2023-06-11 20:34:46', NULL, NULL),
(439, 94, 'access_admin_main_warehouse_management_ps', NULL, NULL, '2023-06-11 20:35:22', NULL, NULL),
(440, 94, 'create_admin_main_warehouse_management_ps', NULL, NULL, '2023-06-11 20:35:22', NULL, NULL),
(441, 94, 'edit_admin_main_warehouse_management_ps', NULL, NULL, '2023-06-11 20:35:22', NULL, NULL),
(442, 94, 'delete_admin_main_warehouse_management_ps', NULL, NULL, '2023-06-11 20:35:22', NULL, NULL),
(443, 94, 'show_admin_main_warehouse_management_ps', NULL, NULL, '2023-06-11 20:35:22', NULL, NULL),
(444, 95, 'access_admin_report_management_report_job_report', NULL, 1, '2023-06-13 10:50:52', '2023-06-13 18:43:25', NULL),
(445, 95, 'create_admin_report_management_report_job_report', NULL, 1, '2023-06-13 10:50:52', '2023-06-13 18:43:25', NULL),
(446, 95, 'edit_admin_report_management_report_job_report', NULL, 1, '2023-06-13 10:50:52', '2023-06-13 18:43:25', NULL),
(447, 95, 'delete_admin_report_management_report_job_report', NULL, 1, '2023-06-13 10:50:52', '2023-06-13 18:43:25', NULL),
(448, 95, 'show_admin_report_management_report_job_report', NULL, 1, '2023-06-13 10:50:52', '2023-06-13 18:43:25', NULL),
(449, 96, 'access_admin_tools_store_management_tsitemreturn_create', NULL, NULL, '2023-06-14 10:29:13', NULL, NULL),
(450, 96, 'create_admin_tools_store_management_tsitemreturn_create', NULL, NULL, '2023-06-14 10:29:13', NULL, NULL),
(451, 96, 'edit_admin_tools_store_management_tsitemreturn_create', NULL, NULL, '2023-06-14 10:29:13', NULL, NULL),
(452, 96, 'delete_admin_tools_store_management_tsitemreturn_create', NULL, NULL, '2023-06-14 10:29:13', NULL, NULL),
(453, 96, 'show_admin_tools_store_management_tsitemreturn_create', NULL, NULL, '2023-06-14 10:29:13', NULL, NULL);
INSERT INTO `permissions` (`id`, `menu_id`, `title`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(454, 97, 'access_admin_tools_store_management_tsitemreturn', NULL, NULL, '2023-06-14 10:37:33', NULL, NULL),
(455, 97, 'create_admin_tools_store_management_tsitemreturn', NULL, NULL, '2023-06-14 10:37:33', NULL, NULL),
(456, 97, 'edit_admin_tools_store_management_tsitemreturn', NULL, NULL, '2023-06-14 10:37:33', NULL, NULL),
(457, 97, 'delete_admin_tools_store_management_tsitemreturn', NULL, NULL, '2023-06-14 10:37:33', NULL, NULL),
(458, 97, 'show_admin_tools_store_management_tsitemreturn', NULL, NULL, '2023-06-14 10:37:33', NULL, NULL),
(459, 98, 'access_admin_tools_store_management_demageitem_create', NULL, 1, '2023-06-15 11:08:00', '2023-06-15 11:08:53', NULL),
(460, 98, 'create_admin_tools_store_management_demageitem_create', NULL, 1, '2023-06-15 11:08:00', '2023-06-15 11:08:53', NULL),
(461, 98, 'edit_admin_tools_store_management_demageitem_create', NULL, 1, '2023-06-15 11:08:00', '2023-06-15 11:08:53', NULL),
(462, 98, 'delete_admin_tools_store_management_demageitem_create', NULL, 1, '2023-06-15 11:08:00', '2023-06-15 11:08:53', NULL),
(463, 98, 'show_admin_tools_store_management_demageitem_create', NULL, 1, '2023-06-15 11:08:00', '2023-06-15 11:08:53', NULL),
(464, 99, 'access_admin_tools_store_management_demageitem', NULL, NULL, '2023-06-15 11:09:37', NULL, NULL),
(465, 99, 'create_admin_tools_store_management_demageitem', NULL, NULL, '2023-06-15 11:09:37', NULL, NULL),
(466, 99, 'edit_admin_tools_store_management_demageitem', NULL, NULL, '2023-06-15 11:09:37', NULL, NULL),
(467, 99, 'delete_admin_tools_store_management_demageitem', NULL, NULL, '2023-06-15 11:09:37', NULL, NULL),
(468, 99, 'show_admin_tools_store_management_demageitem', NULL, NULL, '2023-06-15 11:09:37', NULL, NULL),
(469, 100, 'access_admin_report_management_report_requisition_report', NULL, 1, '2023-06-15 22:12:26', '2023-06-15 22:12:53', NULL),
(470, 100, 'create_admin_report_management_report_requisition_report', NULL, 1, '2023-06-15 22:12:26', '2023-06-15 22:12:53', NULL),
(471, 100, 'edit_admin_report_management_report_requisition_report', NULL, 1, '2023-06-15 22:12:26', '2023-06-15 22:12:53', NULL),
(472, 100, 'delete_admin_report_management_report_requisition_report', NULL, 1, '2023-06-15 22:12:26', '2023-06-15 22:12:53', NULL),
(473, 100, 'show_admin_report_management_report_requisition_report', NULL, 1, '2023-06-15 22:12:26', '2023-06-15 22:12:53', NULL),
(474, 101, 'access_admin_report_management_report_card_status_report', NULL, 1, '2023-06-21 10:26:29', '2023-06-21 10:27:35', NULL),
(475, 101, 'create_admin_report_management_report_card_status_report', NULL, 1, '2023-06-21 10:26:29', '2023-06-21 10:27:35', NULL),
(476, 101, 'edit_admin_report_management_report_card_status_report', NULL, 1, '2023-06-21 10:26:29', '2023-06-21 10:27:35', NULL),
(477, 101, 'delete_admin_report_management_report_card_status_report', NULL, 1, '2023-06-21 10:26:29', '2023-06-21 10:27:35', NULL),
(478, 101, 'show_admin_report_management_report_card_status_report', NULL, 1, '2023-06-21 10:26:29', '2023-06-21 10:27:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int UNSIGNED NOT NULL,
  `permission_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 11),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 22),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151),
(1, 219),
(1, 220),
(1, 221),
(1, 222),
(1, 223),
(1, 229),
(1, 250),
(1, 251),
(1, 252),
(1, 253),
(1, 254),
(1, 255),
(1, 256),
(1, 257),
(1, 258),
(1, 259),
(1, 260),
(1, 261),
(1, 262),
(1, 263),
(1, 264),
(1, 265),
(1, 266),
(1, 267),
(1, 268),
(1, 269),
(1, 275),
(1, 276),
(1, 277),
(1, 278),
(1, 279),
(1, 280),
(1, 281),
(1, 282),
(1, 283),
(1, 284),
(1, 285),
(1, 163),
(1, 164),
(1, 165),
(1, 166),
(1, 167),
(1, 168),
(1, 169),
(1, 170),
(1, 171),
(1, 172),
(1, 286),
(1, 287),
(1, 288),
(1, 289),
(1, 290),
(1, 291),
(1, 292),
(1, 293),
(1, 294),
(1, 295),
(1, 296),
(1, 297),
(1, 298),
(1, 299),
(1, 300),
(1, 301),
(1, 302),
(1, 303),
(1, 304),
(1, 305),
(1, 306),
(1, 307),
(1, 308),
(1, 309),
(1, 310),
(1, 311),
(1, 312),
(1, 313),
(1, 314),
(1, 315),
(1, 316),
(1, 317),
(1, 318),
(1, 319),
(1, 320),
(1, 321),
(1, 322),
(1, 323),
(1, 324),
(1, 325),
(1, 326),
(1, 327),
(1, 328),
(1, 329),
(1, 330),
(1, 331),
(1, 332),
(1, 333),
(1, 334),
(1, 335),
(1, 336),
(1, 337),
(1, 338),
(1, 339),
(1, 340),
(1, 341),
(1, 342),
(1, 343),
(1, 344),
(1, 345),
(1, 346),
(1, 347),
(1, 348),
(1, 349),
(1, 350),
(1, 351),
(1, 352),
(1, 353),
(1, 354),
(1, 355),
(1, 356),
(1, 357),
(1, 358),
(1, 359),
(1, 360),
(1, 361),
(1, 362),
(1, 363),
(1, 364),
(1, 365),
(1, 366),
(1, 367),
(1, 368),
(1, 369),
(1, 370),
(1, 371),
(1, 372),
(1, 373),
(1, 374),
(1, 375),
(1, 376),
(1, 377),
(1, 378),
(1, 379),
(1, 380),
(1, 381),
(1, 382),
(1, 383),
(1, 384),
(1, 385),
(1, 386),
(1, 387),
(1, 388),
(1, 389),
(1, 390),
(1, 391),
(1, 392),
(1, 393),
(1, 394),
(1, 395),
(1, 396),
(1, 397),
(1, 398),
(1, 399),
(1, 400),
(1, 401),
(1, 402),
(1, 403),
(1, 404),
(1, 405),
(1, 406),
(1, 407),
(1, 408),
(1, 414),
(1, 415),
(1, 416),
(1, 417),
(1, 418),
(1, 409),
(1, 410),
(1, 411),
(1, 412),
(1, 413),
(1, 419),
(1, 420),
(1, 421),
(1, 422),
(1, 423),
(1, 424),
(1, 425),
(1, 426),
(1, 427),
(1, 428),
(1, 429),
(1, 430),
(1, 431),
(1, 432),
(1, 433),
(1, 434),
(1, 435),
(1, 436),
(1, 437),
(1, 438),
(1, 439),
(1, 440),
(1, 441),
(1, 442),
(1, 443),
(1, 444),
(1, 445),
(1, 446),
(1, 447),
(1, 448),
(1, 449),
(1, 450),
(1, 451),
(1, 452),
(1, 453),
(1, 454),
(1, 455),
(1, 456),
(1, 457),
(1, 458),
(1, 459),
(1, 460),
(1, 461),
(1, 462),
(1, 463),
(1, 464),
(1, 465),
(1, 466),
(1, 467),
(1, 468),
(1, 469),
(1, 470),
(1, 471),
(1, 472),
(1, 473),
(1, 474),
(1, 475),
(1, 476),
(1, 477),
(1, 478),
(4, 388),
(4, 429),
(4, 433);

-- --------------------------------------------------------

--
-- Table structure for table `pss`
--

CREATE TABLE `pss` (
  `id` bigint UNSIGNED NOT NULL,
  `requisition_id` int NOT NULL,
  `branch_id` bigint NOT NULL,
  `ps_code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ps_date` date NOT NULL,
  `job_id` int DEFAULT NULL,
  `party_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `warehouse_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','Approved','Received') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pss`
--

INSERT INTO `pss` (`id`, `requisition_id`, `branch_id`, `ps_code`, `ps_date`, `job_id`, `party_id`, `section_id`, `warehouse_id`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'PS0001', '2023-06-12', 1, 1, 1, 1, 'des', 'Approved', 1, NULL, '2023-06-12 10:23:27', '2023-06-12 12:22:35', NULL),
(2, 3, 1, 'PS0002', '2023-06-12', 2, 2, 1, 1, NULL, 'Approved', 1, NULL, '2023-06-12 10:38:58', '2023-06-12 12:22:32', NULL),
(3, 3, 1, 'PS0003', '2023-06-13', 2, 2, 1, 1, NULL, 'Approved', 1, NULL, '2023-06-13 10:29:55', '2023-10-30 10:49:36', NULL),
(4, 5, 1, 'PS0004', '2023-06-17', NULL, NULL, 2, 1, NULL, 'Approved', 1, NULL, '2023-06-17 13:24:37', '2023-06-17 13:24:52', NULL),
(5, 6, 1, 'PS0005', '2023-10-30', 3, 2, 3, 1, 'emergency', 'Approved', 1, NULL, '2023-10-30 10:48:14', '2023-10-30 10:49:29', NULL),
(6, 7, 1, 'PS0006', '2023-11-05', NULL, NULL, 8, 1, 'Urgent', 'Pending', 1, NULL, '2023-11-05 06:45:51', '2023-11-05 06:45:51', NULL),
(7, 7, 1, 'PS0007', '2023-11-05', NULL, NULL, 8, 1, 'Urgent', 'Pending', 1, NULL, '2023-11-05 06:52:51', '2023-11-05 06:52:51', NULL),
(8, 9, 1, 'PS0008', '2023-11-12', NULL, NULL, 1, 1, 'Urgent', 'Approved', 1, NULL, '2023-11-12 09:08:29', '2023-11-12 09:10:43', NULL),
(9, 10, 1, 'PS0009', '2023-11-12', NULL, NULL, 1, 1, 'Urgent Need for 15/11/2023', 'Approved', 1, NULL, '2023-11-12 10:23:56', '2023-11-12 10:30:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_details`
--

CREATE TABLE `ps_details` (
  `id` bigint UNSIGNED NOT NULL,
  `ps_id` bigint NOT NULL,
  `requisition_id` int NOT NULL,
  `job_id` int DEFAULT NULL,
  `branch_id` int NOT NULL DEFAULT '1',
  `warehouse_id` int NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int NOT NULL,
  `subgroup_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `quantity` float NOT NULL,
  `sale_price` float NOT NULL,
  `total_price` float NOT NULL,
  `status` enum('Pending','Approved','Received') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ps_details`
--

INSERT INTO `ps_details` (`id`, `ps_id`, `requisition_id`, `job_id`, `branch_id`, `warehouse_id`, `item_id`, `group_id`, `subgroup_id`, `unit_id`, `quantity`, `sale_price`, `total_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 50, 200, 10000, 'Approved', 1, NULL, '2023-06-12 10:23:27', '2023-06-12 12:22:35', NULL),
(2, 1, 1, 1, 1, 1, 2, 1, 2, 1, 20, 200, 4000, 'Approved', 1, NULL, '2023-06-12 10:23:27', '2023-06-12 12:22:35', NULL),
(3, 2, 3, 2, 1, 1, 1, 1, 2, 1, 20, 200, 4000, 'Approved', 1, NULL, '2023-06-12 10:38:58', '2023-06-12 12:22:32', NULL),
(4, 3, 3, 2, 1, 1, 1, 1, 2, 1, 20, 200, 4000, 'Approved', 1, NULL, '2023-06-13 10:29:55', '2023-10-30 10:49:36', NULL),
(5, 4, 5, NULL, 1, 1, 5, 1, 1, 1, 10, 0, 0, 'Approved', 1, NULL, '2023-06-17 13:24:37', '2023-06-17 13:24:52', NULL),
(6, 5, 6, 3, 1, 1, 9, 1, 191, 1, 20, 0, 0, 'Approved', 1, NULL, '2023-10-30 10:48:14', '2023-10-30 10:49:29', NULL),
(7, 5, 6, 3, 1, 1, 156, 2, 138, 1, 20, 0, 0, 'Approved', 1, NULL, '2023-10-30 10:48:14', '2023-10-30 10:49:29', NULL),
(8, 5, 6, 3, 1, 1, 444, 11, 247, 1, 10, 0, 0, 'Approved', 1, NULL, '2023-10-30 10:48:14', '2023-10-30 10:49:29', NULL),
(9, 6, 7, NULL, 1, 1, 154, 2, 138, 1, 20, 0, 0, 'Pending', 1, NULL, '2023-11-05 06:45:51', '2023-11-05 06:45:51', NULL),
(10, 6, 7, NULL, 1, 1, 182, 1, 148, 1, 5, 0, 0, 'Pending', 1, NULL, '2023-11-05 06:45:51', '2023-11-05 06:45:51', NULL),
(11, 6, 7, NULL, 1, 1, 155, 2, 138, 1, 5, 0, 0, 'Pending', 1, NULL, '2023-11-05 06:45:51', '2023-11-05 06:45:51', NULL),
(12, 7, 7, NULL, 1, 1, 154, 2, 138, 1, 20, 0, 0, 'Pending', 1, NULL, '2023-11-05 06:52:51', '2023-11-05 06:52:51', NULL),
(13, 7, 7, NULL, 1, 1, 182, 1, 148, 1, 5, 0, 0, 'Pending', 1, NULL, '2023-11-05 06:52:51', '2023-11-05 06:52:51', NULL),
(14, 7, 7, NULL, 1, 1, 155, 2, 138, 1, 5, 0, 0, 'Pending', 1, NULL, '2023-11-05 06:52:51', '2023-11-05 06:52:51', NULL),
(15, 8, 9, NULL, 1, 1, 8, 1, 191, 1, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 09:08:29', '2023-11-12 09:10:43', NULL),
(16, 9, 10, NULL, 1, 1, 550, 4, 302, 1, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 10:23:56', '2023-11-12 10:30:18', NULL),
(17, 9, 10, NULL, 1, 1, 9, 1, 191, 1, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 10:23:56', '2023-11-12 10:30:18', NULL),
(18, 9, 10, NULL, 1, 1, 10, 1, 191, 1, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 10:23:56', '2023-11-12 10:30:18', NULL),
(19, 9, 10, NULL, 1, 1, 438, 8, 242, 1, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 10:23:56', '2023-11-12 10:30:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint NOT NULL,
  `room_id` bigint NOT NULL,
  `rack_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rack_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racks`
--

INSERT INTO `racks` (`id`, `branch_id`, `room_id`, `rack_name`, `rack_code`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Rack No-1', 'RC0001', 'Description Default Room is the Big Room in the main building', NULL, 1, '2022-12-07 11:34:57', '2023-06-06 10:35:17', NULL),
(2, 1, 1, 'Rack No-2', 'RC0002', 'Description Default Room is the Big Room in the main building', NULL, 1, '2022-12-28 09:35:43', '2023-06-06 10:35:57', NULL),
(3, 1, 2, 'Rack No-21', 'RC0003', 'NA', NULL, 1, '2023-05-22 09:49:13', '2023-06-06 10:37:05', NULL),
(4, 1, 2, 'Rack No-22', 'RC0004', 'NA', NULL, 1, '2023-05-22 09:49:26', '2023-06-06 10:37:30', NULL),
(5, 1, 2, 'Rack No-23', 'RC0005', 'NA', NULL, 1, '2023-05-29 19:59:44', '2023-06-06 10:37:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requisitionfors`
--

CREATE TABLE `requisitionfors` (
  `id` bigint UNSIGNED NOT NULL,
  `requisitionfor_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requisitionfor_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisitionfors`
--

INSERT INTO `requisitionfors` (`id`, `requisitionfor_code`, `requisitionfor_name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'RF0001', 'GENERAL', 'NA', NULL, 1, '2022-12-07 11:34:57', '2023-07-23 13:35:22', NULL),
(2, 'RF0002', 'TRAINING', 'NA', NULL, 1, '2022-12-28 09:35:43', '2023-07-23 13:35:48', NULL),
(3, 'RF0003', 'SEIP', 'NA', 1, 1, '2023-06-07 16:14:04', '2023-07-23 13:34:40', NULL),
(4, 'RF0004', 'TSC', 'NA', 1, NULL, '2023-07-23 13:36:07', '2023-07-23 13:36:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` bigint UNSIGNED NOT NULL,
  `requisitionfor_id` bigint DEFAULT NULL,
  `branch_id` bigint NOT NULL,
  `requisition_code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisition_date` date NOT NULL,
  `requisition_delivery_date` date DEFAULT NULL,
  `job_id` int DEFAULT NULL,
  `party_id` int DEFAULT NULL,
  `section_id` int NOT NULL,
  `warehouse_id` int NOT NULL,
  `receive_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','Approved','Delivered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisitions`
--

INSERT INTO `requisitions` (`id`, `requisitionfor_id`, `branch_id`, `requisition_code`, `requisition_date`, `requisition_delivery_date`, `job_id`, `party_id`, `section_id`, `warehouse_id`, `receive_by`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'RQ0001', '2023-06-02', NULL, 1, 1, 1, 1, NULL, 'des', 'Approved', 1, 1, '2023-05-30 19:20:24', '2023-06-10 07:27:27', NULL),
(2, 1, 1, 'RQ0002', '2023-06-03', NULL, 1, 1, 1, 1, NULL, NULL, 'Approved', 1, NULL, '2023-06-03 08:24:11', '2023-06-03 08:24:11', NULL),
(3, 1, 1, 'RQ0003', '2023-06-03', NULL, 2, 2, 1, 1, NULL, NULL, 'Approved', 1, NULL, '2023-06-03 10:12:51', '2023-06-06 14:05:59', NULL),
(4, 1, 1, 'RQ0004', '2023-06-05', '2023-06-06', 1, 1, 2, 1, 'Saad ', 'NA', 'Approved', 1, NULL, '2023-06-06 14:17:20', '2023-06-06 14:23:17', NULL),
(5, NULL, 1, 'RQ0005', '2023-06-17', NULL, NULL, NULL, 2, 1, NULL, NULL, 'Delivered', 1, NULL, '2023-06-17 13:23:34', '2023-06-17 13:28:02', NULL),
(6, 1, 1, 'GEN0005', '2023-10-30', NULL, 3, 2, 3, 1, 'Md Abu Talib, Technician', 'emergency', 'Approved', 1, NULL, '2023-10-30 10:37:56', '2023-10-30 10:38:39', NULL),
(7, 1, 1, 'GEN0006', '2023-11-02', '2023-11-02', NULL, NULL, 8, 1, 'Md Abu Talib, Technician', 'Urgent', 'Approved', 1, NULL, '2023-11-02 10:50:23', '2023-11-05 06:43:10', NULL),
(8, 1, 1, 'GEN0007', '2023-11-05', '2023-11-07', NULL, NULL, 2, 1, 'Jahir Rahman', 'Urgent', 'Pending', 1, NULL, '2023-11-05 06:51:25', '2023-11-05 06:51:25', NULL),
(9, 1, 1, 'GEN0008', '2023-11-12', '2023-11-12', NULL, NULL, 1, 1, 'Md Abu Talib, Technician', 'Urgent', 'Approved', 1, NULL, '2023-11-12 09:01:16', '2023-11-12 09:02:39', NULL),
(10, 1, 1, 'GEN0009', '2023-11-12', '2023-11-15', NULL, NULL, 1, 1, 'Md Abu Talib, Technician', 'Urgent Need for 15/11/2023', 'Delivered', 1, NULL, '2023-11-12 10:01:39', '2023-11-12 10:40:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_details`
--

CREATE TABLE `requisition_details` (
  `id` bigint UNSIGNED NOT NULL,
  `requisition_id` bigint NOT NULL,
  `branch_id` int NOT NULL DEFAULT '1',
  `warehouse_id` int NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int NOT NULL,
  `subgroup_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `quantity` float NOT NULL,
  `sale_price` float NOT NULL,
  `total_price` float NOT NULL,
  `status` enum('Pending','Approved','Delivered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisition_details`
--

INSERT INTO `requisition_details` (`id`, `requisition_id`, `branch_id`, `warehouse_id`, `item_id`, `group_id`, `subgroup_id`, `unit_id`, `quantity`, `sale_price`, `total_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 1, 1, 1, 1, 2, 1, 100, 200, 20000, 'Approved', NULL, NULL, '2023-05-30 19:45:47', '2023-06-10 07:27:27', NULL),
(4, 1, 1, 1, 2, 1, 2, 1, 200, 200, 40000, 'Approved', 1, NULL, '2023-06-01 20:34:50', '2023-06-10 07:27:27', NULL),
(5, 2, 1, 1, 1, 1, 2, 1, 1000, 200, 200000, 'Approved', 1, NULL, '2023-06-03 08:24:11', '2023-06-03 08:24:11', NULL),
(6, 3, 1, 1, 1, 1, 2, 1, 100, 200, 20000, 'Approved', 1, NULL, '2023-06-03 10:12:51', '2023-06-06 14:05:59', NULL),
(7, 4, 1, 1, 1, 1, 2, 1, 20, 200, 4000, 'Delivered', 1, NULL, '2023-06-06 14:17:20', '2023-06-14 20:19:30', NULL),
(8, 4, 1, 1, 2, 1, 2, 1, 20, 200, 4000, 'Approved', 1, NULL, '2023-06-06 14:17:20', '2023-06-06 14:23:17', NULL),
(9, 4, 1, 1, 3, 1, 2, 1, 35, 150, 5250, 'Delivered', 1, NULL, '2023-06-06 14:17:20', '2023-06-14 20:19:30', NULL),
(10, 4, 1, 1, 4, 1, 2, 1, 50, 780, 39000, 'Approved', 1, NULL, '2023-06-06 14:17:20', '2023-06-06 14:23:17', NULL),
(11, 5, 1, 1, 5, 1, 1, 1, 10, 0, 0, 'Delivered', 1, NULL, '2023-06-17 13:23:34', '2023-06-17 13:28:02', NULL),
(12, 6, 1, 1, 9, 1, 191, 1, 20, 0, 0, 'Approved', 1, NULL, '2023-10-30 10:37:56', '2023-10-30 10:38:39', NULL),
(13, 6, 1, 1, 156, 2, 138, 1, 20, 0, 0, 'Approved', 1, NULL, '2023-10-30 10:37:56', '2023-10-30 10:38:39', NULL),
(14, 6, 1, 1, 444, 11, 247, 1, 10, 0, 0, 'Approved', 1, NULL, '2023-10-30 10:37:56', '2023-10-30 10:38:39', NULL),
(15, 7, 1, 1, 154, 2, 138, 1, 20, 0, 0, 'Approved', 1, NULL, '2023-11-02 10:50:23', '2023-11-05 06:43:10', NULL),
(16, 7, 1, 1, 182, 1, 148, 1, 5, 0, 0, 'Approved', 1, NULL, '2023-11-02 10:50:23', '2023-11-05 06:43:10', NULL),
(17, 7, 1, 1, 155, 2, 138, 1, 5, 0, 0, 'Approved', 1, NULL, '2023-11-02 10:50:23', '2023-11-05 06:43:10', NULL),
(18, 8, 1, 1, 7, 9, 35, 5, 5, 0, 0, 'Pending', 1, NULL, '2023-11-05 06:51:25', '2023-11-05 06:51:25', NULL),
(19, 9, 1, 1, 8, 1, 191, 1, 5, 0, 0, 'Approved', 1, NULL, '2023-11-12 09:01:16', '2023-11-12 09:02:39', NULL),
(20, 10, 1, 1, 550, 4, 302, 1, 5, 0, 0, 'Delivered', 1, NULL, '2023-11-12 10:01:39', '2023-11-12 10:40:33', NULL),
(21, 10, 1, 1, 9, 1, 191, 1, 5, 0, 0, 'Delivered', 1, NULL, '2023-11-12 10:03:32', '2023-11-12 10:40:33', NULL),
(22, 10, 1, 1, 10, 1, 191, 1, 5, 0, 0, 'Delivered', 1, NULL, '2023-11-12 10:03:32', '2023-11-12 10:40:33', NULL),
(23, 10, 1, 1, 438, 8, 242, 1, 5, 0, 0, 'Delivered', 1, NULL, '2023-11-12 10:03:32', '2023-11-12 10:40:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 0, NULL, '2022-01-01 07:15:46', '2023-02-19 16:05:23', NULL),
(4, 'User', 0, NULL, '2023-02-13 23:47:45', '2023-02-19 16:10:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(4, 4),
(2, 4),
(5, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint NOT NULL,
  `room_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `branch_id`, `room_name`, `room_code`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Default Room', 'RM0001', 'Description of Default Room', NULL, 1, '2022-12-07 11:34:57', '2023-06-06 10:30:33', NULL),
(2, 1, 'Room-101 (Ground Floor)', 'RM0002', 'Description of Room-101 (Ground Floor)', NULL, 1, '2022-12-28 09:35:43', '2023-06-06 10:31:18', NULL),
(3, 1, 'Room-9 (Ground Floor), Training Building', 'RM0003', 'Description of Room-9 (Ground Floor), Training Building', 1, NULL, '2023-06-06 10:32:21', '2023-06-06 10:32:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint UNSIGNED NOT NULL,
  `section_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `section_address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_code`, `section_name`, `branch_id`, `section_address`, `contact_person`, `contact_no`, `email_address`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SE0001', 'Design Section', 1, '116(Kha),Tejgoan Industrial Area, Dhaka-1208', 'NA', '+৮৮-০২-৫৫০৩০০৪৬, +৮৮-০২-৫৫০৩০০৫৭', 'NA', NULL, 1, NULL, '2023-06-06 08:41:39', NULL),
(2, 'SE0002', 'Plastic Section', 1, '116(Kha),Tejgoan Industrial Area, Dhaka-1208', 'NA', '+৮৮-০২-৫৫০৩০০৪৬, +৮৮-০২-৫৫০৩০০৫৭', 'plastic.section@gmail.com', 1, 1, '2023-06-06 08:40:22', '2023-06-06 08:42:34', NULL),
(3, 'SE0003', 'PC Shop', 1, '116(Kha),Tejgoan Industrial Area, Dhaka-1208', 'NA', '+৮৮-০২-৫৫০৩০০৪৬, +৮৮-০২-৫৫০৩০০৫৭', 'pc.shop@gmail.com', 1, NULL, '2023-06-06 08:44:26', '2023-06-06 08:44:26', NULL),
(4, 'SE0004', 'Foundry Section', 1, '116(Kha),Tejgoan Industrial Area, Dhaka-1208', 'NA', '+৮৮-০২-৫৫০৩০০৪৬, +৮৮-০২-৫৫০৩০০৫৭', 'foundery@gmail.com', 1, NULL, '2023-06-06 08:45:23', '2023-06-06 08:45:23', NULL),
(5, 'SE0005', 'Machine Shop', 1, '116(Kha),Tejgoan Industrial Area, Dhaka-1208', 'NA', '+৮৮-০২-৫৫০৩০০৪৬, +৮৮-০২-৫৫০৩০০৫৭', 'machine.shop@gmail.com', 1, NULL, '2023-06-06 08:46:29', '2023-06-06 08:46:29', NULL),
(6, 'SE0006', 'Store', 1, 'BITAC, Dhaka', 'Marjina Mojumder', '01767830001', 'razzak9763@gmail.com', 1, NULL, '2023-07-18 09:24:21', '2023-07-18 09:24:21', NULL),
(7, 'SE0007', 'Maintananace', 1, 'Dhaka', 'NA', 'NA', NULL, 1, 3, '2023-07-23 12:56:08', '2023-10-10 12:50:42', NULL),
(8, 'SE0008', 'Auto Mobile', 1, 'BITAC, Dhaka', 'Topan Kumar Moitra', 'PABX-507', NULL, 3, NULL, '2023-10-10 12:52:26', '2023-10-10 12:52:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shelfs`
--

CREATE TABLE `shelfs` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint NOT NULL,
  `room_id` bigint NOT NULL,
  `rack_id` bigint NOT NULL,
  `shelf_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shelf_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelfs`
--

INSERT INTO `shelfs` (`id`, `branch_id`, `room_id`, `rack_id`, `shelf_name`, `shelf_code`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Cell No-1', 'SF0001', 'NA', NULL, 1, '2022-12-07 11:34:57', '2023-06-06 10:40:00', NULL),
(2, 1, 1, 1, 'Cell No-2', 'SF0002', 'NA', NULL, 1, '2022-12-28 09:35:43', '2023-06-06 10:42:23', NULL),
(3, 1, 1, 1, 'Cell No-3', 'SF0003', 'NA', 1, NULL, '2023-06-06 10:40:54', '2023-06-06 10:40:54', NULL),
(4, 1, 1, 1, 'Cell No-4', 'SF0004', 'NA', 1, NULL, '2023-06-06 10:41:35', '2023-06-06 10:41:35', NULL),
(5, 1, 1, 1, 'Cell No-5', 'SF0005', 'NA', 1, NULL, '2023-06-06 10:41:58', '2023-06-06 10:41:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subgroups`
--

CREATE TABLE `subgroups` (
  `id` bigint UNSIGNED NOT NULL,
  `subgroup_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int UNSIGNED NOT NULL,
  `subgroup_name` varchar(164) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subgroups`
--

INSERT INTO `subgroups` (`id`, `subgroup_code`, `group_id`, `subgroup_name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SG0001', 1, 'NCMS', NULL, 1, '2022-12-07 11:34:57', '2023-10-25 10:07:47', '2023-10-25 10:07:47'),
(2, 'SG0002', 1, 'Bearing', NULL, 1, '2022-12-24 22:08:41', '2023-06-06 11:58:19', NULL),
(34, 'SG0003', 1, 'Thrust Bearing', 1, 1, '2023-06-06 11:19:56', '2023-10-26 07:52:55', NULL),
(35, 'SG0004', 9, 'SEIP-Electrode', 1, 1, '2023-07-18 09:42:37', '2023-10-16 12:54:38', NULL),
(36, 'SG0005', 9, 'SEIP-MS Sheet', 1, 1, '2023-07-19 09:39:18', '2023-10-16 13:37:11', NULL),
(37, 'SG0006', 9, 'SEIP-SS Sheet', 1, 1, '2023-07-19 09:39:33', '2023-10-17 07:38:16', NULL),
(38, 'SG0007', 9, 'SEIP-Aluminum Sheet', 1, 1, '2023-07-19 09:40:34', '2023-10-17 07:38:32', NULL),
(39, 'SG0008', 2, 'Scrow', 1, NULL, '2023-07-19 09:54:42', '2023-07-26 09:25:36', '2023-07-26 09:25:36'),
(40, 'SG0009', 2, 'Bit', 1, NULL, '2023-07-19 09:55:03', '2023-07-26 09:25:47', '2023-07-26 09:25:47'),
(41, 'SG0010', 9, 'SEIP-MS shaft', 1, 1, '2023-07-23 09:39:26', '2023-10-17 07:38:48', NULL),
(42, 'SG0011', 9, 'SEIP-Apron', 1, 1, '2023-07-23 10:03:43', '2023-10-16 13:17:53', NULL),
(43, 'SG0012', 9, 'SEIP-MS Angle', 1, 1, '2023-07-23 10:07:21', '2023-10-17 07:39:04', NULL),
(44, 'SG0013', 9, 'SEIP-J hook', 1, 1, '2023-07-23 10:32:27', '2023-10-17 07:39:20', NULL),
(45, 'SG0014', 9, 'SEIP-Wood', 1, 1, '2023-07-23 11:56:56', '2023-10-17 07:39:36', NULL),
(46, 'SG0017', 9, 'SEIP-MS Flat bar', 1, 1, '2023-07-23 12:47:50', '2023-10-17 07:39:55', NULL),
(47, 'SEIP-16', 9, 'XXXXX', 1, 1, '2023-07-23 13:04:10', '2023-10-16 13:15:47', NULL),
(48, 'SEIP-15', 9, 'YYYYY', 1, 1, '2023-07-23 13:08:01', '2023-10-16 13:16:10', NULL),
(49, 'SG0018', 9, 'SEIP-Table Vice', 1, 1, '2023-07-24 07:34:50', '2023-10-17 07:40:12', NULL),
(50, 'SG0019', 9, 'SEIP-Hand Gloves', 1, 1, '2023-07-24 07:38:39', '2023-10-17 07:40:36', NULL),
(51, 'SG0020', 9, 'SEIP-Grinding wheel', 1, 1, '2023-07-24 07:49:14', '2023-10-17 07:40:51', NULL),
(52, 'SG0021', 9, 'SEIP-MS Filar Metal', 1, 1, '2023-07-24 07:52:43', '2023-10-16 13:20:46', NULL),
(53, 'SG0022', 10, 'Training Manual', 1, 1, '2023-07-25 07:14:13', '2023-10-16 13:10:24', NULL),
(54, 'SG0023', 10, 'Training bag', 1, NULL, '2023-07-25 07:20:47', '2023-07-25 07:20:47', NULL),
(55, 'SG0024', 10, 'plastic folder', 1, NULL, '2023-07-25 07:25:05', '2023-07-25 07:25:05', NULL),
(56, 'SG0025', 10, 'pad', 1, NULL, '2023-07-25 07:28:03', '2023-07-25 07:28:03', NULL),
(57, 'SG0026', 10, 'Ball pen', 1, NULL, '2023-07-25 07:30:40', '2023-07-25 07:30:40', NULL),
(58, 'SG0027', 10, 'Grinding wheel (surface)', 1, NULL, '2023-07-25 07:33:25', '2023-07-25 07:33:25', NULL),
(59, 'SG0028', 10, 'Grinding wheel (out side)', 1, NULL, '2023-07-25 07:35:59', '2023-07-25 07:35:59', NULL),
(60, 'SG0029', 10, 'Grinding wheel (Internal)', 1, NULL, '2023-07-25 08:04:28', '2023-07-25 08:04:28', NULL),
(61, 'SG0030', 10, 'Dimond wheel dreaser', 1, NULL, '2023-07-25 08:20:12', '2023-07-25 08:20:12', NULL),
(62, 'SG0031', 10, 'Dish wheel', 1, NULL, '2023-07-25 08:23:09', '2023-07-25 08:23:09', NULL),
(63, 'SG0032', 10, 'Cup wheel', 1, NULL, '2023-07-25 08:26:17', '2023-07-25 08:26:17', NULL),
(64, 'SG0033', 10, 'Thread gauge', 1, NULL, '2023-07-25 08:28:21', '2023-07-25 08:28:21', NULL),
(65, 'SG0034', 10, 'Filler gauge', 1, NULL, '2023-07-25 08:31:21', '2023-07-25 08:31:21', NULL),
(66, 'SG0035', 10, 'Tapper gauge', 1, NULL, '2023-07-25 08:33:16', '2023-07-25 08:33:16', NULL),
(67, 'SG0036', 10, 'Radious gauge', 1, NULL, '2023-07-25 08:35:14', '2023-07-25 08:35:14', NULL),
(68, 'SG0037', 10, 'White bit (HSS)', 1, NULL, '2023-07-25 08:42:19', '2023-07-25 08:42:19', NULL),
(69, 'SG0038', 10, 'MS plate', 1, NULL, '2023-07-25 08:45:34', '2023-07-25 08:45:34', NULL),
(70, 'SG0039', 10, 'Hand grinding Machine', 1, NULL, '2023-07-25 08:48:22', '2023-07-25 08:48:22', NULL),
(71, 'SG0040', 10, 'Hand grinding wheel', 1, NULL, '2023-07-25 08:56:11', '2023-07-25 08:56:11', NULL),
(72, 'SG0041', 10, 'Flexible cabble', 1, NULL, '2023-07-25 08:59:18', '2023-07-25 08:59:18', NULL),
(73, 'SG0042', 10, 'Flexible cabble (Multi core)', 1, NULL, '2023-07-25 09:01:09', '2023-07-25 09:01:09', NULL),
(74, 'SG0043', 10, 'conductor', 1, NULL, '2023-07-25 09:57:36', '2023-07-25 09:57:36', NULL),
(75, 'SG0044', 10, 'Realy', 1, NULL, '2023-07-25 10:00:02', '2023-07-25 10:00:02', NULL),
(76, 'SG0045', 10, 'Timer with base', 1, NULL, '2023-07-25 10:05:35', '2023-07-25 10:05:35', NULL),
(77, 'SG0046', 10, 'Emergency stop switch', 1, NULL, '2023-07-25 10:07:28', '2023-07-25 10:07:28', NULL),
(78, 'SG0047', 10, 'Indicator Lamp', 1, NULL, '2023-07-25 10:09:44', '2023-07-25 10:09:44', NULL),
(79, 'SG0048', 10, 'Insulation paper', 1, NULL, '2023-07-25 10:11:58', '2023-07-25 10:11:58', NULL),
(80, 'SG0049', 10, 'Ampear tube', 1, NULL, '2023-07-25 10:14:51', '2023-07-25 10:14:51', NULL),
(81, 'SG0050', 10, 'Cotton Tape', 1, NULL, '2023-07-25 10:18:11', '2023-07-25 10:18:11', NULL),
(82, 'SG0051', 10, 'H.T Thiner', 1, NULL, '2023-07-25 10:21:37', '2023-07-25 10:21:37', NULL),
(83, 'SG0052', 10, 'Pullar', 1, NULL, '2023-07-25 10:23:50', '2023-07-25 10:23:50', NULL),
(84, 'SG0053', 10, 'Valb', 1, NULL, '2023-07-25 10:25:53', '2023-07-25 10:25:53', NULL),
(85, 'SG0054', 10, 'Current Transformer (C.T)', 1, NULL, '2023-07-25 10:28:09', '2023-07-25 10:28:09', NULL),
(86, 'SG0055', 10, 'Current Realy', 1, NULL, '2023-07-25 10:31:19', '2023-07-25 10:31:19', NULL),
(87, 'SG0056', 10, 'Factor currection', 1, NULL, '2023-07-25 10:33:30', '2023-07-25 10:33:30', NULL),
(88, 'SG0057', 10, '100 RTD', 1, NULL, '2023-07-25 10:36:41', '2023-07-25 10:36:41', NULL),
(89, 'SG0058', 10, 'Temparature Transmiter', 1, NULL, '2023-07-25 10:52:42', '2023-07-25 10:52:42', NULL),
(90, 'SG0059', 1, 'Armachar genarato', 1, NULL, '2023-07-25 11:43:18', '2023-07-25 11:43:18', NULL),
(91, 'SG0060', 1, 'Armachar genator', 1, NULL, '2023-07-25 11:44:24', '2023-07-25 11:44:24', NULL),
(92, 'SG0061', 1, 'Armachar daynamo', 1, NULL, '2023-07-25 11:47:35', '2023-07-25 11:47:35', NULL),
(93, 'SG0062', 1, 'Arm wayper', 1, NULL, '2023-07-25 11:50:09', '2023-07-25 11:50:09', NULL),
(94, 'SG0063', 1, 'Center Arm', 1, NULL, '2023-07-25 11:52:24', '2023-07-25 11:52:24', NULL),
(95, 'SG0064', 1, 'Main Arm/cannecting', 1, NULL, '2023-07-25 12:18:41', '2023-07-25 12:18:41', NULL),
(96, 'SG0065', 1, 'Armecher Self Stater', 1, NULL, '2023-07-25 12:22:25', '2023-07-25 12:22:25', NULL),
(97, 'SG0066', 1, 'Insulator positive post', 1, NULL, '2023-07-25 12:24:31', '2023-07-25 12:24:31', NULL),
(98, 'SG0067', 1, 'Insulator Bendix/Insulator complet', 1, NULL, '2023-07-25 12:27:55', '2023-07-25 12:27:55', NULL),
(99, 'SG0068', 1, 'Insulator spring', 1, NULL, '2023-07-25 12:30:01', '2023-07-25 12:30:01', NULL),
(100, 'SG0069', 1, 'Indicator mud gud', 1, NULL, '2023-07-25 12:32:26', '2023-07-25 12:32:26', NULL),
(101, 'SG0070', 1, 'Engine', 1, NULL, '2023-07-25 12:34:53', '2023-07-25 12:34:53', NULL),
(102, 'SG0071', 1, 'Engine compartment lead hinzu', 1, NULL, '2023-07-25 12:38:56', '2023-07-25 12:38:56', NULL),
(103, 'SG0072', 1, 'Window', 1, NULL, '2023-07-25 12:41:40', '2023-07-25 12:41:40', NULL),
(104, 'SG0073', 1, 'Axjost samefould', 1, NULL, '2023-07-25 12:48:31', '2023-07-25 12:48:31', NULL),
(105, 'SG0074', 1, 'Axel Rear', 1, NULL, '2023-07-25 12:51:28', '2023-07-25 12:51:28', NULL),
(106, 'SG0075', 2, 'Agor Screw', 1, NULL, '2023-07-26 07:20:26', '2023-07-26 07:20:26', NULL),
(107, 'SG0076', 2, 'Agor bit', 1, NULL, '2023-07-26 07:39:13', '2023-07-26 07:39:13', NULL),
(108, 'SG0077', 3, 'Al Tala', 1, NULL, '2023-07-26 09:20:04', '2023-07-26 09:20:04', NULL),
(109, 'SG0076', 3, 'Electrode bronze', 1, NULL, '2023-07-26 10:39:02', '2023-07-26 10:39:02', NULL),
(110, 'SG0077', 3, 'Electrodes Nickel chrome', 1, NULL, '2023-07-26 10:44:33', '2023-07-26 10:44:33', NULL),
(111, 'SG0078', 3, 'Electrodes Annical', 1, NULL, '2023-07-26 10:48:19', '2023-07-26 10:48:19', NULL),
(112, 'SG0079', 3, 'Electrodes', 1, 1, '2023-07-26 10:52:26', '2023-10-19 10:41:00', NULL),
(113, 'SG0080', 9, 'Seip Switch', 1, 1, '2023-10-17 09:43:46', '2023-10-17 09:50:03', NULL),
(114, 'SG0081', 9, 'seip socket', 1, NULL, '2023-10-17 09:52:55', '2023-10-17 09:52:55', NULL),
(115, 'SG0082', 9, 'SEIP cot out', 1, NULL, '2023-10-17 10:00:17', '2023-10-17 10:00:17', NULL),
(116, 'SG0083', 9, 'Seip Regulator', 1, NULL, '2023-10-17 10:05:42', '2023-10-17 10:05:42', NULL),
(117, 'SG0084', 9, 'Seip holder', 1, NULL, '2023-10-17 10:18:15', '2023-10-17 10:18:15', NULL),
(118, 'SG0085', 9, 'seip ceramic', 1, 1, '2023-10-17 10:51:09', '2023-10-17 12:36:20', NULL),
(119, 'SG0086', 9, 'seip bell', 1, 1, '2023-10-17 11:58:37', '2023-10-17 12:37:12', NULL),
(120, 'SG0087', 9, 'seip box', 1, 1, '2023-10-17 12:01:15', '2023-10-17 12:37:38', NULL),
(121, 'SG0088', 9, 'seip breaker', 1, 1, '2023-10-17 12:35:05', '2023-10-17 12:38:04', NULL),
(122, 'SG0089', 9, 'seip base', 1, NULL, '2023-10-17 12:43:15', '2023-10-17 12:43:15', NULL),
(123, 'SG0090', 9, 'seip plug', 1, NULL, '2023-10-17 12:53:50', '2023-10-17 12:53:50', NULL),
(124, 'SG0091', 9, 'seip wire', 1, NULL, '2023-10-17 12:56:20', '2023-10-17 12:56:20', NULL),
(125, 'SG0092', 9, 'seip bulb', 1, NULL, '2023-10-17 13:07:04', '2023-10-17 13:07:04', NULL),
(126, 'SG0092', 1, 'Axjost', 1, NULL, '2023-10-17 13:07:50', '2023-10-17 13:07:50', NULL),
(127, 'SG0094', 9, 'seip tap', 1, NULL, '2023-10-18 07:13:40', '2023-10-18 07:13:40', NULL),
(128, 'SG0095', 9, 'seip pipe', 1, NULL, '2023-10-18 07:15:54', '2023-10-18 07:15:54', NULL),
(129, 'SG0096', 9, 'seip albow', 1, NULL, '2023-10-18 07:17:57', '2023-10-18 07:17:57', NULL),
(130, 'SG0097', 9, 'seip band', 1, NULL, '2023-10-18 07:22:32', '2023-10-18 07:22:32', NULL),
(131, 'SG0098', 9, 'seip screw', 1, NULL, '2023-10-18 08:49:42', '2023-10-18 08:49:42', NULL),
(132, 'SG0099', 1, 'Plug', 1, NULL, '2023-10-18 08:53:27', '2023-10-18 08:53:27', NULL),
(133, 'SG0100', 2, 'screw', 1, 1, '2023-10-18 08:58:30', '2023-10-18 09:13:11', NULL),
(134, 'SG0101', 1, 'chain', 1, NULL, '2023-10-18 09:00:44', '2023-10-18 09:00:44', NULL),
(135, 'SG0102', 2, 'bit', 1, NULL, '2023-10-18 09:27:13', '2023-10-18 09:27:13', NULL),
(136, 'SG0103', 1, 'Nacal', 1, NULL, '2023-10-18 09:44:13', '2023-10-18 09:44:13', NULL),
(137, 'SG0104', 2, 'shank', 1, NULL, '2023-10-18 10:03:31', '2023-10-18 10:03:31', NULL),
(138, 'SG0105', 2, 'Indicator', 1, NULL, '2023-10-18 10:15:16', '2023-10-18 10:15:16', NULL),
(139, 'SG0106', 1, 'Filter', 1, NULL, '2023-10-18 10:20:19', '2023-10-18 10:20:19', NULL),
(140, 'SG0107', 2, 'EDGE', 1, NULL, '2023-10-18 10:26:28', '2023-10-18 10:26:28', NULL),
(141, 'SG0108', 1, 'Sylinder', 1, NULL, '2023-10-18 10:28:28', '2023-10-18 10:28:28', NULL),
(142, 'SG0109', 1, 'Antena', 1, NULL, '2023-10-18 10:30:23', '2023-10-18 10:30:23', NULL),
(143, 'SG0110', 1, 'Pump', 1, NULL, '2023-10-18 10:31:49', '2023-10-18 10:31:49', NULL),
(144, 'SG0111', 2, 'Anvill', 1, 1, '2023-10-18 10:34:01', '2023-10-18 10:36:56', NULL),
(145, 'SG0112', 2, 'colet', 1, NULL, '2023-10-18 10:39:06', '2023-10-18 10:39:06', NULL),
(146, 'SG0113', 2, 'Machine', 1, NULL, '2023-10-18 10:41:13', '2023-10-18 10:41:13', NULL),
(147, 'SG0114', 2, 'clamp', 1, NULL, '2023-10-18 10:45:09', '2023-10-18 10:45:09', NULL),
(148, 'SG0115', 1, 'abjorver', 1, NULL, '2023-10-18 10:46:38', '2023-10-18 10:46:38', NULL),
(149, 'SG0116', 1, 'distributer', 1, NULL, '2023-10-18 10:52:13', '2023-10-18 10:52:13', NULL),
(150, 'SG0117', 1, 'crank', 1, NULL, '2023-10-18 10:53:07', '2023-10-18 10:53:07', NULL),
(151, 'SG0118', 1, 'karborator', 1, NULL, '2023-10-18 10:54:34', '2023-10-18 10:54:34', NULL),
(152, 'SG0119', 2, 'calipar', 1, NULL, '2023-10-19 08:55:51', '2023-10-19 08:55:51', NULL),
(153, 'SG0120', 2, 'tala', 1, NULL, '2023-10-19 10:16:21', '2023-10-19 10:16:21', NULL),
(154, 'SG0121', 3, 'Radiator', 1, NULL, '2023-10-19 10:49:48', '2023-10-19 10:49:48', NULL),
(155, 'SG0122', 3, 'guage', 1, NULL, '2023-10-19 10:50:27', '2023-10-19 10:50:27', NULL),
(156, 'SG0123', 3, 'Axel Shaft', 1, NULL, '2023-10-19 10:52:10', '2023-10-19 10:52:10', NULL),
(157, 'SG0124', 3, 'Ractifire', 1, NULL, '2023-10-19 10:52:47', '2023-10-19 10:52:47', NULL),
(158, 'SG0125', 3, 'singcroniger', 1, NULL, '2023-10-19 10:55:06', '2023-10-19 10:55:06', NULL),
(159, 'SG0126', 4, 'Aica', 1, NULL, '2023-10-22 07:25:58', '2023-10-22 07:25:58', NULL),
(160, 'SG0127', 4, 'Miscellaneous ica', 1, NULL, '2023-10-22 07:33:53', '2023-10-22 07:33:53', NULL),
(161, 'SG0128', 4, 'Alkattra', 1, NULL, '2023-10-22 09:11:12', '2023-10-22 09:11:12', NULL),
(162, 'SG0129', 4, 'Ice', 1, NULL, '2023-10-22 09:14:24', '2023-10-22 09:14:24', NULL),
(163, 'SG0130', 4, 'lockar steel', 1, NULL, '2023-10-22 09:20:06', '2023-10-22 09:20:06', NULL),
(164, 'SG0131', 4, 'Sar', 1, NULL, '2023-10-22 09:23:13', '2023-10-22 09:23:13', NULL),
(165, 'SG0132', 4, 'Wool', 1, NULL, '2023-10-22 09:26:11', '2023-10-22 09:26:11', NULL),
(166, 'SG0133', 4, 'Appron', 1, NULL, '2023-10-22 09:31:31', '2023-10-22 09:31:31', NULL),
(167, 'SG0134', 4, 'Abonite', 1, NULL, '2023-10-22 09:38:49', '2023-10-22 09:38:49', NULL),
(168, 'SG0135', 4, 'Asbastor', 1, NULL, '2023-10-22 09:53:14', '2023-10-22 09:53:14', NULL),
(169, 'SG0136', 4, 'Dite', 1, NULL, '2023-10-22 10:02:45', '2023-10-22 10:02:45', NULL),
(170, 'SG0137', 4, 'Corn', 1, NULL, '2023-10-22 10:07:00', '2023-10-22 10:07:00', NULL),
(171, 'SG0138', 4, 'cloth', 1, NULL, '2023-10-22 10:25:37', '2023-10-22 10:25:37', NULL),
(172, 'SG0139', 4, 'Amunia', 1, NULL, '2023-10-22 10:36:56', '2023-10-22 10:36:56', NULL),
(173, 'SG0140', 4, 'Washer', 1, NULL, '2023-10-22 10:40:46', '2023-10-22 10:40:46', NULL),
(174, 'SG0141', 4, 'Water', 1, NULL, '2023-10-22 10:45:39', '2023-10-22 10:45:39', NULL),
(175, 'SG0142', 4, 'Fire', 1, NULL, '2023-10-22 10:48:26', '2023-10-22 10:48:26', NULL),
(176, 'SG0143', 4, 'Wooden', 1, NULL, '2023-10-22 10:51:35', '2023-10-22 10:51:35', NULL),
(177, 'SG0144', 4, 'Coal', 1, NULL, '2023-10-22 11:57:01', '2023-10-22 11:57:01', NULL),
(178, 'SG0145', 4, 'Wood', 1, NULL, '2023-10-22 11:59:45', '2023-10-22 11:59:45', NULL),
(179, 'SG0146', 4, 'Uniform', 1, NULL, '2023-10-22 12:02:57', '2023-10-22 12:02:57', NULL),
(180, 'SG0147', 4, 'Mal Mal', 1, NULL, '2023-10-22 12:07:39', '2023-10-22 12:07:39', NULL),
(181, 'SG0148', 4, 'Raxin', 1, NULL, '2023-10-22 12:10:15', '2023-10-22 12:10:15', NULL),
(182, 'SG0149', 4, 'Felalin', 1, NULL, '2023-10-22 12:12:43', '2023-10-22 12:12:43', NULL),
(183, 'SG0150', 4, 'poleister', 1, NULL, '2023-10-22 12:40:51', '2023-10-22 12:40:51', NULL),
(184, 'SG0151', 4, 'BhelVat', 1, NULL, '2023-10-22 12:42:59', '2023-10-22 12:42:59', NULL),
(185, 'SG0152', 4, 'Rexin', 1, NULL, '2023-10-22 12:45:21', '2023-10-22 12:45:21', NULL),
(186, 'SG0153', 4, 'Burnur', 1, NULL, '2023-10-22 12:47:43', '2023-10-22 12:47:43', NULL),
(187, 'SG0154', 4, 'Furness', 1, NULL, '2023-10-22 12:49:37', '2023-10-22 12:49:37', NULL),
(188, 'SG0155', 5, 'Soldering', 1, NULL, '2023-10-22 12:54:55', '2023-10-22 12:54:55', NULL),
(189, 'SG0156', 5, 'Iron', 1, NULL, '2023-10-25 07:14:59', '2023-10-25 07:14:59', NULL),
(190, 'SG0157', 5, 'IC', 1, NULL, '2023-10-25 07:20:01', '2023-10-25 07:20:01', NULL),
(191, 'SG0158', 5, 'Arms', 1, NULL, '2023-10-25 07:40:37', '2023-10-25 07:40:37', NULL),
(192, 'SG0159', 5, 'IRFU', 1, NULL, '2023-10-25 07:44:43', '2023-10-25 07:44:43', NULL),
(193, 'SG0160', 5, 'IR', 1, NULL, '2023-10-25 07:47:03', '2023-10-25 07:47:03', NULL),
(194, 'SG0161', 5, 'IRF', 1, NULL, '2023-10-25 07:49:42', '2023-10-25 07:49:42', NULL),
(195, 'SG0162', 5, 'Al', 1, NULL, '2023-10-25 07:52:35', '2023-10-25 07:52:35', NULL),
(196, 'SG0163', 5, 'Insulator', 1, NULL, '2023-10-25 07:55:27', '2023-10-25 07:55:27', NULL),
(197, 'SG0164', 5, 'shackle', 1, NULL, '2023-10-25 08:02:10', '2023-10-25 08:02:10', NULL),
(198, 'SG0165', 5, 'Insulators', 1, NULL, '2023-10-25 08:04:56', '2023-10-25 08:04:56', NULL),
(199, 'SG0166', 5, 'Infulation', 1, NULL, '2023-10-25 08:07:36', '2023-10-25 08:07:36', NULL),
(200, 'SG0167', 5, 'LS', 1, NULL, '2023-10-25 08:27:59', '2023-10-25 08:27:59', NULL),
(201, 'SG0168', 5, 'Electrolizer', 1, NULL, '2023-10-25 08:30:03', '2023-10-25 08:30:03', NULL),
(202, 'SG0169', 5, 'Aliment', 1, NULL, '2023-10-25 08:33:10', '2023-10-25 08:33:10', NULL),
(203, 'SG0170', 5, 'Adaptor', 1, NULL, '2023-10-25 08:40:03', '2023-10-25 08:40:03', NULL),
(204, 'SG0171', 5, 'Lighting', 1, NULL, '2023-10-25 08:42:13', '2023-10-25 08:42:13', NULL),
(205, 'SG0172', 5, 'Albow', 1, NULL, '2023-10-25 08:43:40', '2023-10-25 08:43:40', NULL),
(206, 'SG0173', 5, 'Alfee', 1, NULL, '2023-10-25 08:54:32', '2023-10-25 08:54:32', NULL),
(207, 'SG0174', 5, 'Aristar', 1, NULL, '2023-10-25 08:56:55', '2023-10-25 08:56:55', NULL),
(208, 'SG0175', 7, 'Alkatra', 1, NULL, '2023-10-25 09:29:03', '2023-10-25 09:29:03', NULL),
(209, 'SG0176', 6, 'ATS', 1, 1, '2023-10-25 09:33:32', '2023-10-25 09:49:31', NULL),
(210, 'SG0176', 6, 'NCMS', 1, NULL, '2023-10-25 10:09:19', '2023-10-25 10:09:19', NULL),
(211, 'SG0177', 6, 'NCMHS', 1, NULL, '2023-10-25 10:44:14', '2023-10-25 10:44:14', NULL),
(212, 'SG0178', 6, 'Ingot', 1, NULL, '2023-10-25 12:28:07', '2023-10-25 12:28:07', NULL),
(213, 'SG0179', 7, 'Mold code', 1, NULL, '2023-10-25 12:47:26', '2023-10-25 12:47:26', NULL),
(214, 'SG0180', 6, 'Alu shaft', 1, NULL, '2023-10-25 12:52:45', '2023-10-25 12:52:45', NULL),
(215, 'SG0181', 8, 'Boring bars', 1, NULL, '2023-10-25 13:19:23', '2023-10-25 13:19:23', NULL),
(216, 'SG0182', 8, 'Air condition', 1, NULL, '2023-10-25 13:30:53', '2023-10-25 13:30:53', NULL),
(217, 'SG0183', 8, 'Compresser.', 1, 1, '2023-10-26 07:03:19', '2023-10-26 07:40:12', NULL),
(218, 'SG0184', 8, 'Piston', 1, 1, '2023-10-26 07:09:20', '2023-10-26 07:25:46', NULL),
(219, 'SG0185', 8, 'jig boring', 1, NULL, '2023-10-26 07:30:30', '2023-10-26 07:30:30', NULL),
(220, 'SG0186', 8, 'compound Table', 1, NULL, '2023-10-26 07:34:54', '2023-10-26 07:34:54', NULL),
(221, 'SG0187', 8, 'Lathe Machine', 1, NULL, '2023-10-26 07:40:55', '2023-10-26 07:40:55', NULL),
(222, 'SG0188', 8, 'motor', 1, 1, '2023-10-26 07:44:24', '2023-10-26 07:47:19', NULL),
(223, 'SG0189', 8, 'Chimng', 1, NULL, '2023-10-26 07:49:16', '2023-10-26 07:49:16', NULL),
(224, 'SG0190', 8, 'Vertical Boring', 1, NULL, '2023-10-26 07:52:16', '2023-10-26 07:52:16', NULL),
(225, 'SG0191', 8, 'Switch Demagnasiser', 1, NULL, '2023-10-26 07:54:02', '2023-10-26 07:54:02', NULL),
(226, 'SG0192', 8, 'Precision End Reamers', 1, NULL, '2023-10-26 07:57:25', '2023-10-26 07:57:25', NULL),
(227, 'SG0193', 8, 'Cathode Rod', 1, NULL, '2023-10-26 08:00:57', '2023-10-26 08:00:57', NULL),
(228, 'SG0193', 1, 'ARM', 1, NULL, '2023-10-26 08:01:08', '2023-10-26 08:03:08', '2023-10-26 08:03:08'),
(229, 'SG0195', 8, 'OPK\'\'', 1, NULL, '2023-10-26 08:03:56', '2023-10-26 08:03:56', NULL),
(230, 'SG0195', 8, 'Compression cyliner', 1, NULL, '2023-10-26 08:06:17', '2023-10-26 08:06:17', NULL),
(231, 'SG0196', 8, 'dividing head', 1, NULL, '2023-10-26 08:20:19', '2023-10-26 08:20:19', NULL),
(232, 'SG0197', 8, 'Cross plate', 1, NULL, '2023-10-26 08:22:02', '2023-10-26 08:22:02', NULL),
(233, 'SG0198', 8, 'Gear quadrant', 1, NULL, '2023-10-26 08:24:42', '2023-10-26 08:24:42', NULL),
(234, 'SG0198', 1, 'Assembly   singcroniger', 1, NULL, '2023-10-26 08:26:36', '2023-10-26 08:26:36', NULL),
(235, 'SG0199', 8, 'Milling Arbor', 1, NULL, '2023-10-26 08:27:14', '2023-10-26 08:27:14', NULL),
(236, 'SG0201', 8, 'collets', 1, NULL, '2023-10-26 08:33:48', '2023-10-26 08:33:48', NULL),
(237, 'SG0202', 8, 'Hydrolic hobing', 1, NULL, '2023-10-26 08:37:52', '2023-10-26 08:37:52', NULL),
(238, 'SG0203', 8, 'coppy milling', 1, NULL, '2023-10-26 08:47:22', '2023-10-26 08:47:22', NULL),
(239, 'SG0204', 11, 'UNDP GAUGE', 1, 1, '2023-10-26 08:49:01', '2023-10-30 10:18:36', NULL),
(240, 'SG0204', 8, 'Welding set', 1, NULL, '2023-10-26 08:49:09', '2023-10-26 08:49:09', NULL),
(241, 'SG0206', 8, 'Grinding Machine', 1, NULL, '2023-10-26 08:52:16', '2023-10-26 08:52:16', NULL),
(242, 'SG0207', 8, 'drill machine', 1, NULL, '2023-10-26 08:54:52', '2023-10-26 08:54:52', NULL),
(243, 'SG0208', 11, 'UNDP INDICATOR', 1, NULL, '2023-10-26 08:56:52', '2023-10-26 08:56:52', NULL),
(244, 'SG0208', 8, 'grinding Machine Electrict', 1, NULL, '2023-10-26 08:57:16', '2023-10-26 08:57:16', NULL),
(245, 'SG0210', 8, 'Low -gread Alloy', 1, NULL, '2023-10-26 09:00:04', '2023-10-26 09:00:04', NULL),
(246, 'SG0211', 8, 'Spares for polishing Machine', 1, NULL, '2023-10-26 09:03:27', '2023-10-26 09:03:27', NULL),
(247, 'SG0211', 11, 'UNDP TWIST DRILL', 1, NULL, '2023-10-26 09:03:35', '2023-10-26 09:03:35', NULL),
(248, 'SG0213', 8, 'Spears for polishing Machine ball Bearing cat NO-06300', 1, NULL, '2023-10-26 09:09:11', '2023-10-26 09:09:11', NULL),
(249, 'SG0214', 11, 'UNDP STEEL SILVER', 1, NULL, '2023-10-26 09:12:18', '2023-10-26 09:12:18', NULL),
(250, 'SG0215', 8, 'Wheefor spning Machine', 1, NULL, '2023-10-26 09:16:43', '2023-10-26 09:16:43', NULL),
(251, 'SG0216', 8, 'ARK/ Tig welding', 1, NULL, '2023-10-26 09:25:01', '2023-10-26 09:25:01', NULL),
(252, 'SG0217', 8, 'C.N.C.Desk', 1, NULL, '2023-10-26 09:27:00', '2023-10-26 09:27:00', NULL),
(253, 'SG0218', 8, 'dial gauge', 1, NULL, '2023-10-26 09:31:27', '2023-10-26 09:31:27', NULL),
(254, 'SG0219', 8, 'C.N.C. Lathe', 1, NULL, '2023-10-26 09:33:55', '2023-10-26 09:33:55', NULL),
(255, 'SG0220', 8, 'Machingng center', 1, NULL, '2023-10-26 09:37:10', '2023-10-26 09:37:10', NULL),
(256, 'SG0221', 8, 'Spectrolab JT', 1, NULL, '2023-10-26 09:43:32', '2023-10-26 09:43:32', NULL),
(257, 'SG0222', 8, 'steel Milling', 1, NULL, '2023-10-26 09:49:26', '2023-10-26 09:49:26', NULL),
(258, 'SG0223', 8, 'C.N.C.wire cut', 1, NULL, '2023-10-26 09:55:33', '2023-10-26 09:55:33', NULL),
(259, 'SG0224', 8, 'Discharge Machine', 1, NULL, '2023-10-26 09:58:05', '2023-10-26 09:58:05', NULL),
(260, 'SG0225', 8, 'Milling Machine', 1, NULL, '2023-10-26 10:00:48', '2023-10-26 10:00:48', NULL),
(261, 'SG0226', 8, 'tester JT', 1, NULL, '2023-10-26 10:02:52', '2023-10-26 10:02:52', NULL),
(262, 'SG0227', 8, 'Ignation Taster', 1, NULL, '2023-10-26 10:06:05', '2023-10-26 10:06:05', NULL),
(263, 'SG0228', 8, 'Auto car.', 1, NULL, '2023-10-26 10:10:17', '2023-10-26 10:10:17', NULL),
(264, 'SG0229', 11, 'UNDP STEEL BRIGHT', 1, NULL, '2023-10-26 12:29:25', '2023-10-26 12:29:25', NULL),
(265, 'SG0230', 7, 'AlBarrel', 1, NULL, '2023-10-26 12:35:36', '2023-10-26 12:35:36', NULL),
(266, 'SG0231', 7, 'Electro', 1, NULL, '2023-10-26 12:37:00', '2023-10-26 12:37:00', NULL),
(267, 'SG0232', 7, 'Erechrome', 1, NULL, '2023-10-26 12:43:12', '2023-10-26 12:43:12', NULL),
(268, 'SG0233', 7, 'palyethaline', 1, NULL, '2023-10-26 12:47:02', '2023-10-26 12:47:02', NULL),
(269, 'SG0234', 7, 'Enoculine', 1, NULL, '2023-10-26 12:49:20', '2023-10-26 12:49:20', NULL),
(270, 'SG0235', 7, 'Acid', 1, NULL, '2023-10-26 13:26:22', '2023-10-26 13:26:22', NULL),
(271, 'SG0236', 11, 'UNDP MICROMITER', 1, 1, '2023-10-29 08:01:40', '2023-10-29 10:38:07', NULL),
(272, 'SG0237', 11, 'UNDP VERNIER', 1, 1, '2023-10-29 08:10:14', '2023-10-29 10:38:40', NULL),
(273, 'SG0238', 7, 'Amonium', 1, NULL, '2023-10-29 09:12:16', '2023-10-29 09:12:16', NULL),
(274, 'SG0239', 7, 'Cadmium', 1, NULL, '2023-10-29 09:26:25', '2023-10-29 09:26:25', NULL),
(275, 'SG0240', 7, 'Anode', 1, NULL, '2023-10-29 09:30:40', '2023-10-29 09:30:40', NULL),
(276, 'SG0241', 7, 'Acetone', 1, NULL, '2023-10-29 09:38:43', '2023-10-29 09:38:43', NULL),
(277, 'SG0242', 7, 'Acelator', 1, NULL, '2023-10-29 09:42:33', '2023-10-29 09:42:33', NULL),
(278, 'SG0243', 7, 'Copper carbonet', 1, NULL, '2023-10-29 09:45:12', '2023-10-29 09:45:12', NULL),
(279, 'SG0244', 7, 'Copper', 1, NULL, '2023-10-29 09:45:53', '2023-10-29 09:45:53', NULL),
(280, 'SG0245', 7, 'Calcium', 1, NULL, '2023-10-29 10:05:04', '2023-10-29 10:05:04', NULL),
(281, 'SG0246', 7, 'Chromium', 1, NULL, '2023-10-29 10:13:34', '2023-10-29 10:13:34', NULL),
(282, 'SG0247', 7, 'Carbon', 1, NULL, '2023-10-29 10:18:33', '2023-10-29 10:18:33', NULL),
(283, 'SG0248', 7, 'salt', 1, NULL, '2023-10-29 10:22:28', '2023-10-29 10:22:28', NULL),
(284, 'SG0249', 7, 'soda', 1, NULL, '2023-10-29 10:26:37', '2023-10-29 10:26:37', NULL),
(285, 'SG0250', 7, 'Chostic', 1, NULL, '2023-10-29 10:29:27', '2023-10-29 10:29:27', NULL),
(286, 'SG0251', 7, 'Cleaner', 1, NULL, '2023-10-29 10:32:56', '2023-10-29 10:32:56', NULL),
(287, 'SG0252', 7, 'Karfa', 1, NULL, '2023-10-29 10:36:03', '2023-10-29 10:36:03', NULL),
(288, 'SG0253', 10, 'Transmiter', 1, NULL, '2023-10-30 08:02:08', '2023-10-30 08:02:08', NULL),
(289, 'SG0254', 10, 'Sensor.', 1, NULL, '2023-10-30 08:05:19', '2023-10-30 08:05:19', NULL),
(290, 'SG0255', 10, 'Thermocouple Sensor.', 1, NULL, '2023-10-30 12:11:20', '2023-10-30 12:11:20', NULL),
(291, 'SG0256', 10, 'TSC Electrodes', 1, NULL, '2023-10-31 07:32:45', '2023-10-31 07:32:45', NULL),
(292, 'SG0257', 10, 'TSC Filler Metal', 1, NULL, '2023-10-31 07:40:51', '2023-10-31 07:40:51', NULL),
(293, 'SG0258', 10, 'TSC Mig welding', 1, NULL, '2023-10-31 07:43:53', '2023-10-31 07:43:53', NULL),
(294, 'SG0259', 10, 'TSC pipe', 1, NULL, '2023-10-31 07:47:13', '2023-10-31 07:47:13', NULL),
(295, 'SG0260', 10, 'TSC Sheet', 1, NULL, '2023-10-31 07:50:37', '2023-10-31 07:50:37', NULL),
(296, 'SG0261', 10, 'TSC Hand shild', 1, NULL, '2023-10-31 07:53:48', '2023-10-31 07:53:48', NULL),
(297, 'SG0262', 10, 'TSC Helmat', 1, NULL, '2023-10-31 08:07:51', '2023-10-31 08:07:51', NULL),
(298, 'SG0263', 10, 'TSC Goagles', 1, NULL, '2023-10-31 08:11:59', '2023-10-31 08:11:59', NULL),
(299, 'SG0264', 10, 'TSC Year protective', 1, NULL, '2023-10-31 08:15:17', '2023-10-31 08:15:17', NULL),
(300, 'SG0265', 10, 'TSC Apron', 1, NULL, '2023-10-31 08:18:37', '2023-10-31 08:18:37', NULL),
(301, 'SG0266', 10, 'TSC Lather hand gloves', 1, NULL, '2023-10-31 10:19:57', '2023-10-31 10:19:57', NULL),
(302, 'SG0267', 4, 'Apron', 1, NULL, '2023-11-12 09:35:10', '2023-11-12 09:35:10', NULL),
(303, 'SG0268', 11, 'VERNIER', 1, NULL, '2023-11-22 10:12:52', '2023-11-22 10:12:52', NULL),
(304, 'SG0269', 11, 'NUDP VERNIER', 1, NULL, '2023-11-26 09:28:22', '2023-11-26 09:28:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subgroupvolumes`
--

CREATE TABLE `subgroupvolumes` (
  `id` bigint UNSIGNED NOT NULL,
  `subgroupvolume_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int UNSIGNED NOT NULL,
  `subgroup_id` int NOT NULL,
  `subgroupvolume_name` varchar(164) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subgroupvolumes`
--

INSERT INTO `subgroupvolumes` (`id`, `subgroupvolume_code`, `group_id`, `subgroup_id`, `subgroupvolume_name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SGV0001', 1, 1, '1', NULL, 1, '2022-12-07 11:34:57', '2023-06-07 14:24:39', NULL),
(2, 'SGV0002', 1, 1, '1/KA', NULL, 1, '2022-12-24 22:08:41', '2023-07-19 08:47:12', '2023-07-19 08:47:12'),
(34, 'SGV0003', 1, 1, '1/KHA', 1, 1, '2023-06-06 12:07:17', '2023-07-19 08:47:18', '2023-07-19 08:47:18'),
(35, 'SGV0004', 1, 2, '1/GA', 1, 1, '2023-06-07 14:26:52', '2023-07-18 09:44:56', NULL),
(36, 'SGV0005', 1, 34, '1/GHA', 1, 1, '2023-06-07 14:27:24', '2023-07-18 09:45:12', NULL),
(37, 'SGV0006', 9, 35, 'seip', 1, NULL, '2023-07-18 09:43:58', '2023-07-18 09:43:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tschallans`
--

CREATE TABLE `tschallans` (
  `id` bigint UNSIGNED NOT NULL,
  `tsrequisition_id` bigint NOT NULL,
  `branch_id` bigint NOT NULL,
  `challan_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challan_date` date NOT NULL,
  `delivery_man` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_place` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_from_id` int NOT NULL,
  `warehouse_to_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tschallans`
--

INSERT INTO `tschallans` (`id`, `tsrequisition_id`, `branch_id`, `challan_code`, `challan_date`, `delivery_man`, `delivery_place`, `warehouse_from_id`, `warehouse_to_id`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'CH0001', '2023-06-06', 'Saad', 'DH', 1, 2, 'des', 1, NULL, '2023-06-05 20:29:09', '2023-06-05 20:29:09', NULL),
(2, 3, 1, 'CH0002', '2023-06-16', 'Saad', 'DH', 1, 2, 'NA', 1, NULL, '2023-06-15 21:20:02', '2023-06-15 21:20:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tschallan_details`
--

CREATE TABLE `tschallan_details` (
  `id` bigint UNSIGNED NOT NULL,
  `challan_id` bigint NOT NULL,
  `branch_id` int NOT NULL,
  `tsrequisition_id` bigint NOT NULL,
  `tsrequisition_details_id` bigint NOT NULL,
  `warehouse_from_id` int NOT NULL,
  `warehouse_to_id` int NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int NOT NULL,
  `subgroup_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `order_quantity` float NOT NULL,
  `delivered_quantity` float NOT NULL,
  `sale_price` float NOT NULL,
  `total_price` float NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tschallan_details`
--

INSERT INTO `tschallan_details` (`id`, `challan_id`, `branch_id`, `tsrequisition_id`, `tsrequisition_details_id`, `warehouse_from_id`, `warehouse_to_id`, `item_id`, `group_id`, `subgroup_id`, `unit_id`, `order_quantity`, `delivered_quantity`, `sale_price`, `total_price`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, 2, 1, 1, 2, 1, 50, 50, 200, 10000, 1, NULL, '2023-06-05 20:29:09', '2023-06-05 20:29:09', NULL),
(2, 1, 1, 1, 2, 1, 2, 2, 1, 2, 1, 50, 50, 200, 10000, 1, NULL, '2023-06-05 20:29:09', '2023-06-05 20:29:09', NULL),
(3, 2, 1, 3, 5, 1, 2, 1, 1, 2, 1, 10, 10, 200, 2000, 1, NULL, '2023-06-15 21:20:02', '2023-06-15 21:20:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tsitemissues`
--

CREATE TABLE `tsitemissues` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint NOT NULL,
  `tsitemissue_code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tsitemissue_date` date NOT NULL,
  `issue_by_id` int NOT NULL,
  `receive_by_id` int NOT NULL,
  `section_id` int NOT NULL,
  `warehouse_id` int NOT NULL,
  `card_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','Issued') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tsitemissues`
--

INSERT INTO `tsitemissues` (`id`, `branch_id`, `tsitemissue_code`, `tsitemissue_date`, `issue_by_id`, `receive_by_id`, `section_id`, `warehouse_id`, `card_id`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'IC0001', '2023-06-22', 1, 4, 1, 2, 4, 'NA', 'Issued', 1, NULL, '2023-06-21 18:23:45', '2023-06-21 18:27:49', NULL),
(2, 1, 'IC0002', '2023-07-06', 1, 4, 1, 2, 4, 'NA', 'Issued', 1, NULL, '2023-07-05 19:07:03', '2023-07-05 19:07:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tsitemissue_details`
--

CREATE TABLE `tsitemissue_details` (
  `id` bigint UNSIGNED NOT NULL,
  `tsitemissue_id` bigint NOT NULL,
  `branch_id` int NOT NULL DEFAULT '1',
  `warehouse_id` int NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int NOT NULL,
  `subgroup_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `quantity` float NOT NULL,
  `sale_price` float NOT NULL,
  `total_price` float NOT NULL,
  `status` enum('Pending','Issued') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tsitemissue_details`
--

INSERT INTO `tsitemissue_details` (`id`, `tsitemissue_id`, `branch_id`, `warehouse_id`, `item_id`, `group_id`, `subgroup_id`, `unit_id`, `quantity`, `sale_price`, `total_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 1, 1, 2, 1, 10, 200, 2000, 'Issued', 1, NULL, '2023-06-21 18:23:45', '2023-06-21 18:27:49', NULL),
(2, 1, 1, 2, 2, 1, 2, 1, 5, 200, 1000, 'Issued', 1, NULL, '2023-06-21 18:23:46', '2023-06-21 18:27:49', NULL),
(3, 2, 1, 2, 1, 1, 2, 1, 5, 200, 1000, 'Issued', 1, NULL, '2023-07-05 19:07:03', '2023-07-05 19:07:10', NULL),
(4, 2, 1, 2, 2, 1, 2, 1, 5, 200, 1000, 'Issued', 1, NULL, '2023-07-05 19:07:03', '2023-07-05 19:07:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tsitemreturns`
--

CREATE TABLE `tsitemreturns` (
  `id` bigint UNSIGNED NOT NULL,
  `tsitemissue_id` int NOT NULL,
  `branch_id` bigint NOT NULL,
  `tsitemreturn_code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tsitemreturn_date` date NOT NULL,
  `section_id` int NOT NULL,
  `warehouse_id` int NOT NULL,
  `card_id` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tsitemreturns`
--

INSERT INTO `tsitemreturns` (`id`, `tsitemissue_id`, `branch_id`, `tsitemreturn_code`, `tsitemreturn_date`, `section_id`, `warehouse_id`, `card_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'TSR0001', '2023-07-06', 1, 2, 4, 1, NULL, '2023-07-06 10:12:57', '2023-07-06 10:12:57', NULL),
(2, 2, 1, 'TSR0002', '2023-07-06', 1, 2, 4, 1, NULL, '2023-07-06 10:13:23', '2023-07-06 10:13:23', NULL),
(3, 1, 1, 'TSR0003', '2023-07-06', 1, 2, 4, 1, NULL, '2023-07-06 10:13:50', '2023-07-06 10:13:50', NULL),
(4, 2, 1, 'TSR0004', '2023-07-06', 1, 2, 4, 1, NULL, '2023-07-06 10:14:37', '2023-07-06 10:14:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tsitemreturn_details`
--

CREATE TABLE `tsitemreturn_details` (
  `id` bigint UNSIGNED NOT NULL,
  `tsitemreturn_id` bigint NOT NULL,
  `tsitemissue_details_id` bigint NOT NULL,
  `branch_id` int NOT NULL DEFAULT '1',
  `warehouse_id` int NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int NOT NULL,
  `subgroup_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `order_quantity` float NOT NULL,
  `return_quantity` float NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tsitemreturn_details`
--

INSERT INTO `tsitemreturn_details` (`id`, `tsitemreturn_id`, `tsitemissue_details_id`, `branch_id`, `warehouse_id`, `item_id`, `group_id`, `subgroup_id`, `unit_id`, `order_quantity`, `return_quantity`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 2, 1, 1, 2, 1, 10, 0, 1, NULL, '2023-07-06 10:12:57', '2023-07-06 10:12:57', NULL),
(2, 1, 2, 1, 2, 2, 1, 2, 1, 5, 5, 1, NULL, '2023-07-06 10:12:57', '2023-07-06 10:12:57', NULL),
(3, 2, 3, 1, 2, 1, 1, 2, 1, 5, 0, 1, NULL, '2023-07-06 10:13:24', '2023-07-06 10:13:24', NULL),
(4, 2, 4, 1, 2, 2, 1, 2, 1, 5, 5, 1, NULL, '2023-07-06 10:13:24', '2023-07-06 10:13:24', NULL),
(5, 3, 1, 1, 2, 1, 1, 2, 1, 10, 10, 1, NULL, '2023-07-06 10:13:50', '2023-07-06 10:13:50', NULL),
(6, 4, 3, 1, 2, 1, 1, 2, 1, 5, 5, 1, NULL, '2023-07-06 10:14:37', '2023-07-06 10:14:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tsrequisitions`
--

CREATE TABLE `tsrequisitions` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint NOT NULL,
  `tsrequisition_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tsrequisition_date` date NOT NULL,
  `tsrequisition_delivery_date` date DEFAULT NULL,
  `warehouse_from_id` int NOT NULL,
  `warehouse_to_id` int NOT NULL,
  `receive_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','Approved','Delivered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tsrequisitions`
--

INSERT INTO `tsrequisitions` (`id`, `branch_id`, `tsrequisition_code`, `tsrequisition_date`, `tsrequisition_delivery_date`, `warehouse_from_id`, `warehouse_to_id`, `receive_by`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'TS0001', '2023-06-06', NULL, 1, 2, NULL, 'des', 'Delivered', 1, NULL, '2023-06-05 18:28:55', '2023-06-05 20:29:09', NULL),
(2, 1, 'TS0002', '2023-06-06', '2023-06-06', 1, 2, 'Saad Uddin', 'Please deliver the goods within very short time', 'Approved', 1, NULL, '2023-06-06 16:34:29', '2023-06-06 16:34:52', NULL),
(3, 1, 'TS0003', '2023-06-16', NULL, 1, 2, 'Saad', 'NA', 'Delivered', 1, 1, '2023-06-15 21:12:31', '2023-06-15 21:20:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tsrequisition_details`
--

CREATE TABLE `tsrequisition_details` (
  `id` bigint UNSIGNED NOT NULL,
  `tsrequisition_id` bigint NOT NULL,
  `warehouse_from_id` int NOT NULL,
  `warehouse_to_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `item_id` bigint NOT NULL,
  `group_id` int NOT NULL,
  `subgroup_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `quantity` float NOT NULL,
  `sale_price` float NOT NULL,
  `total_price` float NOT NULL,
  `status` enum('Pending','Approved','Delivered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tsrequisition_details`
--

INSERT INTO `tsrequisition_details` (`id`, `tsrequisition_id`, `warehouse_from_id`, `warehouse_to_id`, `branch_id`, `item_id`, `group_id`, `subgroup_id`, `unit_id`, `quantity`, `sale_price`, `total_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 1, 1, 1, 1, 1, 50, 200, 10000, 'Delivered', 1, NULL, '2023-06-05 18:28:55', '2023-06-05 20:29:09', NULL),
(2, 1, 1, 2, 1, 2, 1, 1, 1, 50, 200, 10000, 'Delivered', 1, NULL, '2023-06-05 18:28:55', '2023-06-05 20:29:09', NULL),
(3, 2, 1, 2, 1, 1, 1, 2, 1, 3, 200, 600, 'Approved', 1, NULL, '2023-06-06 16:34:29', '2023-06-06 16:34:52', NULL),
(4, 2, 1, 2, 1, 2, 1, 2, 1, 4, 200, 800, 'Approved', 1, NULL, '2023-06-06 16:34:29', '2023-06-06 16:34:52', NULL),
(5, 3, 1, 2, 1, 1, 1, 2, 1, 10, 200, 2000, 'Delivered', 1, NULL, '2023-06-15 21:12:32', '2023-06-15 21:20:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `unit_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `unit_code`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pcs', 'UN0001', 'pcs is the unit of Pieces', NULL, 1, '2022-12-07 11:34:57', '2023-06-06 10:27:04', NULL),
(2, 'mtr', 'UN0002', 'mrt is the unit of Meter', NULL, 1, '2022-12-28 09:35:43', '2023-06-06 10:27:33', NULL),
(3, 'ltr', 'UN0003', 'ltr is the unit of Litre', 1, 1, '2023-06-06 10:27:53', '2023-06-06 10:29:00', NULL),
(4, 'kg', 'UN0004', 'kg is the unit of Kilogram', 1, NULL, '2023-06-06 10:29:20', '2023-06-06 10:29:20', NULL),
(5, 'mm', 'UN0005', 'Milimeter', 1, NULL, '2023-07-18 09:57:58', '2023-07-18 09:57:58', NULL),
(6, 'Lbs', 'UN0006', 'Lbs is the unit of Pound', 1, NULL, '2023-07-19 09:24:46', '2023-07-19 09:24:46', NULL),
(7, 'Yrd', 'UN0007', 'Yrd is the unit of Pound', 1, NULL, '2023-07-19 09:25:28', '2023-07-19 09:25:28', NULL),
(8, 'Ft', 'UN0008', 'Ft is the unit of Feet', 1, NULL, '2023-07-19 09:26:28', '2023-07-19 09:26:28', NULL),
(9, 'inch', 'UN0009', 'inch is the unit of Inch', 1, NULL, '2023-07-19 09:27:19', '2023-07-19 09:27:19', NULL),
(10, 'gm', 'UN0010', 'gm is the unit of Gram', 1, NULL, '2023-07-19 09:27:51', '2023-07-19 09:27:51', NULL),
(11, 'ml', 'UN0011', 'ml is the unit of Mili Liter', 1, NULL, '2023-07-19 09:28:32', '2023-07-19 09:28:32', NULL),
(12, 'cm', 'UN0012', 'cm is the unit of Centi Meter', 1, NULL, '2023-07-19 09:29:19', '2023-07-19 09:29:19', NULL),
(13, 'pack', 'UN0013', 'It is the Pack/Packet', 1, NULL, '2023-07-19 09:31:36', '2023-07-19 09:31:36', NULL),
(14, 'dz', 'UN0014', 'dz is the unit of Dozen', 1, NULL, '2023-07-19 09:32:06', '2023-07-19 09:32:06', NULL),
(15, 'gross', 'UN0015', 'gross is the unit of Gross', 1, NULL, '2023-07-19 09:37:27', '2023-07-19 09:37:27', NULL),
(16, 'cft', 'UN0016', NULL, 1, NULL, '2023-07-23 12:07:33', '2023-07-23 12:07:33', NULL),
(17, 'pair', 'UN0017', NULL, 1, NULL, '2023-07-24 07:43:32', '2023-07-24 07:43:32', NULL),
(18, 'Coil', 'UN0018', NULL, 1, NULL, '2023-07-25 09:54:16', '2023-07-25 09:54:16', NULL),
(19, 'Pound', 'UN0019', NULL, 1, NULL, '2023-10-26 13:00:51', '2023-10-26 13:00:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `user_code` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `acl` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acl_country` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `office_id` int NOT NULL,
  `designation_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` bigint NOT NULL,
  `epf_no` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `human_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_code`, `country_id`, `acl`, `acl_country`, `name`, `role_id`, `office_id`, `designation_id`, `email`, `mobile_no`, `photo`, `section_id`, `epf_no`, `signature`, `email_verified_at`, `password`, `human_password`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'EMP0001', 1, '1', '1,2,3,4,5', 'Super Admin', 1, 1, 3, 'admin@admin.com', '+8801819318316', '/uploads/super_admin/20230723090703_no_image.png', 2, '01', '/uploads/super_admin/20230716020743_1.png', NULL, '$2y$10$.xOBE/u3E.v.arKqeaDCU.PhpkvQpiTCvklLuZFcp2TwC3xYLLmpi', 'password', NULL, 0, 1, '2019-09-13 07:21:30', '2023-07-23 13:21:04', NULL),
(2, 'EMP0002', 1, '1', '1,2,3,4,5', 'Abdur Rajjak', 4, 1, 1, 'razzak9763@gmail.com', '+8801767830001', '/uploads/abdur_rajjak/20230718050742_download.jpeg', 6, '2067', '/uploads/abdur_rajjak/20230718050742_5.png', NULL, '$2y$10$.pZyaZzmUzBMoAYbxMRqJ.sRBi9mQVGA3duBCMtMpxsaipSSazp5m', '12345', NULL, 0, 1, '2019-09-13 07:21:30', '2023-07-23 13:40:09', NULL),
(3, 'EMP0003', NULL, '1', NULL, 'Md Mabrur Rohman', 1, 1, 6, 'mabrur@gmail.com', '+880 1912182655', '/uploads/md_mabrur_rohman/20231010081059_Md Mabrur Rohman.jpg', 4, '03', '/uploads/ss/20230716020731_4.png', NULL, '$2y$10$E8EsMc5DBhMYMTcS4pFMJOu4cWjXHvoKRqkB1nqkZ6.kwTXDwLREu', 'BitacLogin', NULL, 1, 3, '2023-06-18 10:33:50', '2023-10-10 12:16:00', NULL),
(4, 'EMP0004', NULL, '1', NULL, 'Md. MR', 4, 1, 3, 'mr@gmail.com', '+880', '/uploads/md_mr/20230618170641_photo.png', 3, '04', '/uploads/md_mr/20230618170641_signature.png', NULL, '$2y$10$EADGDOC5KBA0yCyqVAj8vOnVsGebdXiipOclhM/ufo1XY/Kt0M2FK', 'password', NULL, 1, 1, '2023-06-18 11:07:31', '2023-06-18 11:09:42', NULL),
(5, 'EMP0005', NULL, '1', NULL, 'Md. Fazlul Karim', 1, 1, 6, 'fazlulkarimbitac@gmail.com', '+880 1716869042', '/uploads/md_fazlul_karim/20230723090729_Faz.jpg', 7, '1706', NULL, NULL, '$2y$10$ZFLDI.IWWKmu1UmABfp5E.r5vY2vf8O2XneAbSP0zdduGGu3gKORO', '555111', NULL, 1, 1, '2023-07-23 12:59:25', '2023-07-23 13:02:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint NOT NULL,
  `vendor_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_name` varchar(164) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `branch_id`, `vendor_code`, `vendor_name`, `address`, `contact_person`, `contact_no`, `email`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'VC0001', 'Default Vendor', 'NA', 'NA', 'NA', 'NA', NULL, NULL, 1, '2023-05-28 17:26:50', '2023-06-06 15:09:43', NULL),
(2, 1, 'VC0002', 'Chandpur Enterprise1', '23/1, Kawran Bazar, Dhaka-1202', 'Touhid Hossen', '01823457622', 'chandpur.enterprise@gmail.com', NULL, 1, NULL, '2023-06-06 15:09:11', '2023-06-06 15:09:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('Main','Tools') COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `warehouse_address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `type`, `warehouse_code`, `warehouse_name`, `branch_id`, `warehouse_address`, `contact_person`, `contact_no`, `email_address`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Main', 'WR0001', 'Main Store', 1, '116(Kha),Tejgoan Industrial Area, Dhaka-1208', 'Abdur Rajjak', '+৮৮-০২-৫৫০৩০০৪৬, +৮৮-০২-৫৫০৩০০৫৭', 'bitac.dhaka@gmail.com', NULL, 1, NULL, '2023-07-18 09:19:05', NULL),
(2, 'Tools', 'WR0002', 'Tools Store', 1, '116(Kha),Tejgoan Industrial Area, Dhaka-1208', 'Samsujjaman Bhauyan', '+৮৮-০২-৫৫০৩০০৪৬, +৮৮-০২-৫৫০৩০০৫৭', 'bitac.dhaka@gmail.com', 1, 3, '2023-06-05 18:16:29', '2023-10-10 13:09:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challans`
--
ALTER TABLE `challans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challan_details`
--
ALTER TABLE `challan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demageitems`
--
ALTER TABLE `demageitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupvolumes`
--
ALTER TABLE `groupvolumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspectors`
--
ALTER TABLE `inspectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_receives`
--
ALTER TABLE `material_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_receive_details`
--
ALTER TABLE `material_receive_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `openings`
--
ALTER TABLE `openings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_334959` (`role_id`),
  ADD KEY `permission_id_fk_334959` (`permission_id`);

--
-- Indexes for table `pss`
--
ALTER TABLE `pss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_details`
--
ALTER TABLE `ps_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisitionfors`
--
ALTER TABLE `requisitionfors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_details`
--
ALTER TABLE `requisition_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_334968` (`user_id`),
  ADD KEY `role_id_fk_334968` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelfs`
--
ALTER TABLE `shelfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subgroups`
--
ALTER TABLE `subgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subgroupvolumes`
--
ALTER TABLE `subgroupvolumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tschallans`
--
ALTER TABLE `tschallans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tschallan_details`
--
ALTER TABLE `tschallan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsitemissues`
--
ALTER TABLE `tsitemissues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsitemissue_details`
--
ALTER TABLE `tsitemissue_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsitemreturns`
--
ALTER TABLE `tsitemreturns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsitemreturn_details`
--
ALTER TABLE `tsitemreturn_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsrequisitions`
--
ALTER TABLE `tsrequisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsrequisition_details`
--
ALTER TABLE `tsrequisition_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `challans`
--
ALTER TABLE `challans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `challan_details`
--
ALTER TABLE `challan_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `demageitems`
--
ALTER TABLE `demageitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `groupvolumes`
--
ALTER TABLE `groupvolumes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `inspectors`
--
ALTER TABLE `inspectors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1404;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `material_receives`
--
ALTER TABLE `material_receives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_receive_details`
--
ALTER TABLE `material_receive_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `openings`
--
ALTER TABLE `openings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

--
-- AUTO_INCREMENT for table `pss`
--
ALTER TABLE `pss`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ps_details`
--
ALTER TABLE `ps_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requisitionfors`
--
ALTER TABLE `requisitionfors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requisition_details`
--
ALTER TABLE `requisition_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shelfs`
--
ALTER TABLE `shelfs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subgroups`
--
ALTER TABLE `subgroups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `subgroupvolumes`
--
ALTER TABLE `subgroupvolumes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tschallans`
--
ALTER TABLE `tschallans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tschallan_details`
--
ALTER TABLE `tschallan_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tsitemissues`
--
ALTER TABLE `tsitemissues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tsitemissue_details`
--
ALTER TABLE `tsitemissue_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tsitemreturns`
--
ALTER TABLE `tsitemreturns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tsitemreturn_details`
--
ALTER TABLE `tsitemreturn_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tsrequisitions`
--
ALTER TABLE `tsrequisitions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tsrequisition_details`
--
ALTER TABLE `tsrequisition_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_334959` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_334959` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_334968` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_334968` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
