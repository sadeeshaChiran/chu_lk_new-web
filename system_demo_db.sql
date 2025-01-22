-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2025 at 11:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_demo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_no` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `initial_balance` double DEFAULT NULL,
  `total_balance` double NOT NULL,
  `note` text DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'Bank Account',
  `parent_account_id` int(11) DEFAULT NULL,
  `is_payment` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_no`, `name`, `initial_balance`, `total_balance`, `note`, `is_default`, `is_active`, `created_at`, `updated_at`, `code`, `type`, `parent_account_id`, `is_payment`) VALUES
(1, '11111', 'Sales Accounts', 1000, 1000, 'this is first account', 1, 1, '2018-12-17 21:28:02', '2024-03-12 02:27:50', NULL, 'Bank Account', NULL, 1),
(3, '21211', 'Sa', NULL, 0, NULL, 0, 1, '2018-12-17 21:28:56', '2019-01-20 04:29:06', NULL, 'Bank Account', NULL, 1),
(5, 'bank-1', 'zuhair', 100000, 100000, NULL, NULL, 1, '2022-11-28 00:28:18', '2022-11-28 00:28:18', NULL, 'Bank Account', NULL, 1),
(6, '1234567', 'boc', 100000, 100000, 'sds', NULL, 1, '2025-01-10 11:20:16', '2025-01-10 11:20:16', NULL, 'Bank Account', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adjustments`
--

CREATE TABLE `adjustments` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `total_qty` double NOT NULL,
  `item` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `checkout` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE `barcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `width` double(22,4) DEFAULT NULL,
  `height` double(22,4) DEFAULT NULL,
  `paper_width` double(22,4) DEFAULT NULL,
  `paper_height` double(22,4) DEFAULT NULL,
  `top_margin` double(22,4) DEFAULT NULL,
  `left_margin` double(22,4) DEFAULT NULL,
  `row_distance` double(22,4) DEFAULT NULL,
  `col_distance` double(22,4) DEFAULT NULL,
  `stickers_in_one_row` int(11) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `is_continuous` tinyint(1) NOT NULL DEFAULT 0,
  `stickers_in_one_sheet` int(11) DEFAULT NULL,
  `is_custom` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billers`
--

CREATE TABLE `billers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `company_name` varchar(191) NOT NULL,
  `vat_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billers`
--

INSERT INTO `billers` (`id`, `name`, `image`, `company_name`, `vat_number`, `email`, `phone_number`, `address`, `city`, `state`, `postal_code`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'sadeesha kaushalya', NULL, 'abc', NULL, 'test1@gmail.com', '0717467162', 'No. 144, thorayaya, kurunegala,srilanka', 'Kurunegala', 'Paris', '60000', 'Sri Lanka', 1, '2025-01-10 11:16:20', '2025-01-10 11:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `page_title`, `short_description`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'brand1', NULL, NULL, NULL, 'brand1', 1, '2025-01-10 11:27:25', '2025-01-10 11:27:25'),
(2, 'brande 2', NULL, NULL, NULL, 'brande-2', 1, '2025-01-10 17:20:51', '2025-01-10 17:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `cash_registers`
--

CREATE TABLE `cash_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `cash_in_hand` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_registers`
--

INSERT INTO `cash_registers` (`id`, `cash_in_hand`, `user_id`, `warehouse_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 100000, 1, 1, 1, '2025-01-10 11:34:23', '2025-01-10 11:34:23'),
(2, 10000, 1, 2, 1, '2025-01-11 07:44:09', '2025-01-11 07:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) DEFAULT NULL,
  `woocommerce_category_id` int(11) DEFAULT NULL,
  `is_sync_disable` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `parent_id`, `page_title`, `short_description`, `slug`, `icon`, `featured`, `is_active`, `woocommerce_category_id`, `is_sync_disable`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', NULL, NULL, NULL, NULL, 'clothing', NULL, 1, 1, NULL, NULL, '2025-01-10 10:54:26', '2025-01-10 10:54:26'),
(2, 'Newborn', NULL, 1, NULL, NULL, 'newborn', NULL, 0, 1, NULL, NULL, '2025-01-10 10:54:37', '2025-01-10 10:54:37'),
(3, 'Infant', NULL, 1, NULL, NULL, 'infant', NULL, 1, 1, NULL, NULL, '2025-01-10 10:54:44', '2025-01-10 10:54:44'),
(4, 'Dresses', NULL, 1, NULL, NULL, 'dresses', NULL, 1, 1, NULL, NULL, '2025-01-10 10:54:53', '2025-01-10 10:54:53'),
(5, 'Feeding', NULL, NULL, NULL, NULL, 'feeding', '20250110052315.PNG', 1, 1, NULL, NULL, '2025-01-10 10:55:08', '2025-01-10 10:55:08'),
(6, 'Bottles & Nipples', NULL, 5, NULL, NULL, 'bottles-nipples', NULL, 1, 1, NULL, NULL, '2025-01-10 10:55:20', '2025-01-10 10:55:20'),
(7, 'Breastfeeding Supplies', NULL, 5, NULL, NULL, 'breastfeeding-supplies', NULL, 1, 1, NULL, NULL, '2025-01-10 10:55:30', '2025-01-10 10:55:30'),
(8, 'Sippy Cups', NULL, 5, NULL, NULL, 'sippy-cups', NULL, 0, 1, NULL, NULL, '2025-01-10 10:55:38', '2025-01-10 10:55:38'),
(9, 'Toys & Entertainment', NULL, 5, NULL, NULL, 'toys-entertainment', NULL, 0, 1, NULL, NULL, '2025-01-10 10:55:48', '2025-01-10 10:55:48'),
(10, 'Health & Safety', NULL, NULL, NULL, NULL, 'health-safety', NULL, 1, 1, NULL, NULL, '2025-01-10 10:56:06', '2025-01-10 10:56:06'),
(11, 'Baby Monitors', NULL, 10, NULL, NULL, 'baby-monitors', '20250110052056.PNG', 1, 1, NULL, 1, '2025-01-10 10:56:13', '2025-01-10 10:56:13'),
(12, 'Thermometers', NULL, 10, NULL, NULL, 'thermometers', NULL, 0, 1, NULL, NULL, '2025-01-10 10:56:24', '2025-01-10 10:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `challans`
--

CREATE TABLE `challans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `packing_slip_list` longtext NOT NULL,
  `amount_list` longtext NOT NULL,
  `cash_list` longtext DEFAULT NULL,
  `online_payment_list` longtext DEFAULT NULL,
  `cheque_list` longtext DEFAULT NULL,
  `delivery_charge_list` longtext DEFAULT NULL,
  `status_list` longtext DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `created_by_id` int(11) NOT NULL,
  `closed_by_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challans`
--

INSERT INTO `challans` (`id`, `reference_no`, `status`, `courier_id`, `packing_slip_list`, `amount_list`, `cash_list`, `online_payment_list`, `cheque_list`, `delivery_charge_list`, `status_list`, `closing_date`, `created_by_id`, `closed_by_id`, `created_at`, `updated_at`) VALUES
(1, '1001', 'Close', 1, '1', '93000', '93000', '', '', '', 'Delivered', '2025-01-11', 1, 1, '2025-01-10 18:30:00', '2025-01-10 19:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `products` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `image`, `page_title`, `short_description`, `slug`, `products`, `status`, `created_at`, `updated_at`) VALUES
(3, 'New Products', NULL, 'New Products at SalePro eCommerce', 'New Products at SalePro eCommerce', 'new-products', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `amount` double NOT NULL,
  `minimum_amount` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `name`, `phone_number`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'sadeesha kaushalya', '0717467162', 'No. 144, thorayaya, kurunegala,srilanka', 1, '2025-01-10 19:27:48', '2025-01-10 19:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `symbol` varchar(2) DEFAULT NULL,
  `exchange_rate` double NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `exchange_rate`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sri Lanka Rupees', 'Rs', NULL, 1, 1, '2020-10-31 18:52:58', '2025-01-10 10:59:15'),
(2, 'Euro', 'Euro', NULL, 0.95, 0, '2020-10-31 19:59:12', '2025-01-10 10:58:40'),
(3, 'Bangladeshi Taka', 'BDT', NULL, 110, 0, '2023-09-06 01:35:29', '2023-09-06 01:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) NOT NULL,
  `tax_no` varchar(191) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `points` double DEFAULT NULL,
  `deposit` double DEFAULT NULL,
  `expense` double DEFAULT NULL,
  `wishlist` longtext DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ecom` varchar(255) DEFAULT NULL,
  `dsf` varchar(255) DEFAULT 'df',
  `arabic_name` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `franchise_location` varchar(255) DEFAULT NULL,
  `customer_type` varchar(255) DEFAULT 'Same as Customer',
  `customer_assigned_to` varchar(255) DEFAULT 'Advocate',
  `assigned` varchar(255) DEFAULT 'Advocate',
  `aaaaaaaa` varchar(255) DEFAULT 'aa',
  `district` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_group_id`, `user_id`, `name`, `company_name`, `email`, `phone_number`, `tax_no`, `address`, `city`, `state`, `postal_code`, `country`, `points`, `deposit`, `expense`, `wishlist`, `is_active`, `created_at`, `updated_at`, `ecom`, `dsf`, `arabic_name`, `admin`, `franchise_location`, `customer_type`, `customer_assigned_to`, `assigned`, `aaaaaaaa`, `district`) VALUES
(1, 1, NULL, 'sadeesha kaushalya', 'abc', 'pmsck@gmail.com', '0717467162', '0717467162', 'No. 144, thorayaya, kurunegala,srilanka', 'Kurunegala', 'Paris', '60000', 'Sri Lanka', 110, NULL, NULL, NULL, 1, '2025-01-10 17:23:23', '2025-01-10 19:38:41', NULL, 'df', NULL, NULL, NULL, 'Same as Customer', 'Advocate', 'Advocate', 'aa', NULL),
(2, 1, 48, 'A.A.Kaumadi Harindra Adhikari', NULL, 'kaumadhiharindra@gmail.com', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1,', 0, '2025-01-10 19:46:52', '2025-01-10 19:54:28', NULL, 'df', NULL, NULL, NULL, 'Same as Customer', 'Advocate', 'Advocate', 'aa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `percentage` varchar(191) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_groups`
--

INSERT INTO `customer_groups` (`id`, `name`, `percentage`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Local', '0', 1, '2025-01-10 17:23:03', '2025-01-10 17:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `belongs_to` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `default_value` text DEFAULT NULL,
  `option_value` text DEFAULT NULL,
  `grid_value` int(11) NOT NULL,
  `is_table` tinyint(1) NOT NULL,
  `is_invoice` tinyint(1) NOT NULL,
  `is_required` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_disable` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `packing_slip_ids` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `courier_id` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `delivered_by` varchar(191) DEFAULT NULL,
  `recieved_by` varchar(191) DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `reference_no`, `sale_id`, `packing_slip_ids`, `user_id`, `courier_id`, `address`, `delivered_by`, `recieved_by`, `file`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dr-20250111-125430', 1, '1', 1, 1, 'No. 144, thorayaya, kurunegala,srilanka, Kurunegala, LK', NULL, 'sadeesha kaushalya', NULL, NULL, '3', '2025-01-10 19:24:30', '2025-01-10 19:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'department1', 1, '2025-01-10 11:19:30', '2025-01-10 11:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `applicable_for` varchar(191) NOT NULL,
  `product_list` longtext DEFAULT NULL,
  `valid_from` date NOT NULL,
  `valid_till` date NOT NULL,
  `type` varchar(191) NOT NULL,
  `value` double NOT NULL,
  `minimum_qty` double NOT NULL,
  `maximum_qty` double NOT NULL,
  `days` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_plans`
--

CREATE TABLE `discount_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_plan_customers`
--

CREATE TABLE `discount_plan_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_plan_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_plan_discounts`
--

CREATE TABLE `discount_plan_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` int(11) NOT NULL,
  `discount_plan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dso_alerts`
--

CREATE TABLE `dso_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_info` longtext NOT NULL,
  `number_of_products` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ecommerce_settings`
--

CREATE TABLE `ecommerce_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `theme` varchar(255) NOT NULL DEFAULT 'default',
  `theme_font` varchar(255) NOT NULL DEFAULT 'Inter',
  `theme_color` varchar(255) NOT NULL DEFAULT '#fa9928',
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `store_phone` varchar(255) DEFAULT NULL,
  `store_email` varchar(255) DEFAULT NULL,
  `store_address` varchar(255) DEFAULT NULL,
  `home_page` bigint(20) DEFAULT NULL,
  `is_rtl` int(11) NOT NULL DEFAULT 0,
  `search` int(11) NOT NULL DEFAULT 0,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `contact_form_email` varchar(255) DEFAULT NULL,
  `free_shipping_from` double DEFAULT NULL,
  `flat_rate_shipping` double DEFAULT NULL,
  `checkout_pages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`checkout_pages`)),
  `gift_card` tinyint(4) NOT NULL DEFAULT 0,
  `custom_css` longtext DEFAULT NULL,
  `custom_js` longtext DEFAULT NULL,
  `chat_code` text DEFAULT NULL,
  `analytics_code` text DEFAULT NULL,
  `fb_pixel_code` text DEFAULT NULL,
  `sell_without_stock` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecommerce_settings`
--

INSERT INTO `ecommerce_settings` (`id`, `site_title`, `theme`, `theme_font`, `theme_color`, `logo`, `favicon`, `store_phone`, `store_email`, `store_address`, `home_page`, `is_rtl`, `search`, `warehouse_id`, `biller_id`, `contact_form_email`, `free_shipping_from`, `flat_rate_shipping`, `checkout_pages`, `gift_card`, `custom_css`, `custom_js`, `chat_code`, `analytics_code`, `fb_pixel_code`, `sell_without_stock`, `created_at`, `updated_at`) VALUES
(1, 'chu', 'default', 'Inter', '#f8008c', NULL, NULL, '0717467162', 'pmsck@gmail.com', 'No. 144, thorayaya, kurunegala,srilanka', 1, 0, 0, 1, 1, NULL, 1, 312, '[\"1\",\"3\"]', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `staff_id` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `reference_no`, `expense_category_id`, `warehouse_id`, `account_id`, `user_id`, `cash_register_id`, `amount`, `note`, `created_at`, `updated_at`) VALUES
(1, 'er-20250110-045334', 1, 1, 1, 1, NULL, 1000, 'sdsdxczx', '2025-01-09 18:30:00', '2025-01-10 11:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `code`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '76353809', 'Expense 1', 1, '2025-01-10 11:23:00', '2025-01-10 11:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `external_services`
--

CREATE TABLE `external_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `module_status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`module_status`)),
  `active` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `external_services`
--

INSERT INTO `external_services` (`id`, `name`, `type`, `details`, `module_status`, `active`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', 'payment', 'Client ID,Client Secret;abcd1234,wxyz5678', NULL, 0, NULL, NULL),
(2, 'Stripe', 'payment', 'Public Key,Private Key;efgh1234,stuv5678', NULL, 0, NULL, NULL),
(3, 'Razorpay', 'payment', 'Key,Secret;rzp_test_Y4MCcpHfZNU6rR,3Hr7SDqaZ0G5waN0jsLgsiLx', NULL, 1, NULL, NULL),
(4, 'Paystack', 'payment', 'public_Key,Secret_Key;pk_test_e8d220b7463d64569f0053e78534f38e6b10cf4a,sk_test_6d62cb976e1e0ab43f1e48b2934b0dfc7f32a1fe', NULL, 1, NULL, NULL),
(6, 'Mollie', 'payment', 'api_key;test_dHar4XY7LxsDOtmnkVtjNVWXLSlXsM', NULL, 0, NULL, NULL),
(7, 'Xendit', 'payment', 'secret_key,callback_token;xnd_development_aKJVKYbc4lHkEjcCLzWLrBsKs6jF6nbM6WaCMfnJerP3JW57CLis553XNRdDU,YPZxND92Mt8tdXntTYIEkRX802onZ5OcdKBUzycebuqYvN4n', NULL, 1, NULL, NULL),
(8, 'bkash', 'payment', 'Mode,app_key,app_secret,username,password;sandbox,0vWQuCRGiUX7EPVjQDr0EUAYtc,jcUNPBgbcqEDedNKdvE4G1cAK7D3hCjmJccNPZZBq96QIxxwAMEx,01770618567,D7DaC<*E*eG', NULL, 1, NULL, NULL),
(9, 'sslcommerz', 'payment', 'appkey,appsecret;12341234,asdfa23423', NULL, 1, NULL, NULL),
(10, 'Pesapal', 'payment', 'Mode,Consumer Key,Consumer Secret;sandbox,qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW,osGQ364R49cXKeOYSpaOnT++rHs=', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `order` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `category_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'xzc', 'xczxc', 1, '1', NULL, NULL),
(2, 'asd', 'asd', 1, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, 'zxc', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_title` varchar(191) NOT NULL,
  `site_logo` varchar(191) DEFAULT NULL,
  `is_rtl` tinyint(1) DEFAULT NULL,
  `currency` varchar(191) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `subscription_type` varchar(255) DEFAULT NULL,
  `staff_access` varchar(191) NOT NULL,
  `without_stock` varchar(255) NOT NULL DEFAULT 'no',
  `date_format` varchar(191) NOT NULL,
  `developed_by` varchar(191) DEFAULT NULL,
  `invoice_format` varchar(191) DEFAULT NULL,
  `decimal` int(11) DEFAULT 2,
  `state` int(11) DEFAULT NULL,
  `theme` varchar(191) NOT NULL,
  `modules` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_position` varchar(191) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `expiry_type` varchar(255) NOT NULL DEFAULT 'days',
  `expiry_value` varchar(255) NOT NULL DEFAULT '0',
  `is_zatca` tinyint(1) DEFAULT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `vat_registration_number` varchar(191) DEFAULT NULL,
  `is_packing_slip` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_title`, `site_logo`, `is_rtl`, `currency`, `package_id`, `subscription_type`, `staff_access`, `without_stock`, `date_format`, `developed_by`, `invoice_format`, `decimal`, `state`, `theme`, `modules`, `created_at`, `updated_at`, `currency_position`, `expiry_date`, `expiry_type`, `expiry_value`, `is_zatca`, `company_name`, `vat_registration_number`, `is_packing_slip`) VALUES
(1, 'Chu.lk', '20250111013243.PNG', 0, '1', NULL, NULL, 'all', 'yes', 'd-m-Y', 'www.metrocoding.com', 'standard', 2, 1, 'default.css', 'ecommerce', '2018-07-06 00:43:11', '2025-01-10 20:02:43', 'prefix', NULL, 'days', '0', 0, 'Lioncoders', '98098007', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gift_cards`
--

CREATE TABLE `gift_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_no` varchar(191) NOT NULL,
  `amount` double NOT NULL,
  `expense` double NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gift_card_recharges`
--

CREATE TABLE `gift_card_recharges` (
  `id` int(10) UNSIGNED NOT NULL,
  `gift_card_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `note` text DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hrm_settings`
--

CREATE TABLE `hrm_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `checkin` varchar(191) NOT NULL,
  `checkout` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hrm_settings`
--

INSERT INTO `hrm_settings` (`id`, `checkin`, `checkout`, `created_at`, `updated_at`) VALUES
(1, '10:00am', '6:00pm', '2019-01-01 20:50:08', '2019-01-01 22:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `income_category_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `reference_no`, `income_category_id`, `warehouse_id`, `account_id`, `user_id`, `cash_register_id`, `amount`, `note`, `created_at`, `updated_at`) VALUES
(1, 'ir-20250110-045357', 1, 1, 1, 1, NULL, 900, 'zsfdas', '2025-01-09 18:30:00', '2025-01-10 11:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_categories`
--

INSERT INTO `income_categories` (`id`, `code`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '96009376', 'income 1', 1, '2025-01-10 11:22:33', '2025-01-10 11:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'en', '2018-07-07 17:29:17', '2019-12-24 12:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `widget_title` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver` varchar(191) NOT NULL,
  `host` varchar(191) NOT NULL,
  `port` varchar(191) NOT NULL,
  `from_address` varchar(191) NOT NULL,
  `from_name` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `encryption` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `location`, `content`, `created_at`, `updated_at`) VALUES
(3, 'Main Nav', '1', '[[{\"id\":\"6\"},{\"id\":\"7\"},{\"id\":\"8\"}]]', '2025-01-10 12:41:44', '2025-01-10 17:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `title`, `name`, `slug`, `type`, `target`, `menu_id`, `created_at`, `updated_at`) VALUES
(6, 'Home', NULL, 'home', 'page', NULL, 3, '2025-01-10 12:52:38', NULL),
(7, 'ContactUs', NULL, 'contactus', 'page', NULL, 3, '2025-01-10 12:52:38', NULL),
(8, 'Faq', NULL, 'faq', 'page', NULL, 3, '2025-01-10 12:54:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_17_060412_create_categories_table', 1),
(4, '2018_02_20_035727_create_brands_table', 1),
(5, '2018_02_25_100635_create_suppliers_table', 1),
(6, '2018_02_27_101619_create_warehouse_table', 1),
(7, '2018_03_03_040448_create_units_table', 1),
(8, '2018_03_04_041317_create_taxes_table', 1),
(9, '2018_03_10_061915_create_customer_groups_table', 1),
(10, '2018_03_10_090534_create_customers_table', 1),
(11, '2018_03_11_095547_create_billers_table', 1),
(12, '2018_04_05_054401_create_products_table', 1),
(13, '2018_04_06_133606_create_purchases_table', 1),
(14, '2018_04_06_154600_create_product_purchases_table', 1),
(15, '2018_04_06_154915_create_product_warhouse_table', 1),
(16, '2018_04_10_085927_create_sales_table', 1),
(17, '2018_04_10_090133_create_product_sales_table', 1),
(18, '2018_04_10_090254_create_payments_table', 1),
(19, '2018_04_10_090341_create_payment_with_cheque_table', 1),
(20, '2018_04_10_090509_create_payment_with_credit_card_table', 1),
(21, '2018_04_13_121436_create_quotation_table', 1),
(22, '2018_04_13_122324_create_product_quotation_table', 1),
(23, '2018_04_14_121802_create_transfers_table', 1),
(24, '2018_04_14_121913_create_product_transfer_table', 1),
(25, '2018_05_13_082847_add_payment_id_and_change_sale_id_to_payments_table', 2),
(26, '2018_05_13_090906_change_customer_id_to_payment_with_credit_card_table', 3),
(27, '2018_05_20_054532_create_adjustments_table', 4),
(28, '2018_05_20_054859_create_product_adjustments_table', 4),
(29, '2018_05_21_163419_create_returns_table', 5),
(30, '2018_05_21_163443_create_product_returns_table', 5),
(31, '2018_06_02_050905_create_roles_table', 6),
(32, '2018_06_02_073430_add_columns_to_users_table', 7),
(33, '2018_06_03_053738_create_permission_tables', 8),
(36, '2018_06_21_063736_create_pos_setting_table', 9),
(37, '2018_06_21_094155_add_user_id_to_sales_table', 10),
(38, '2018_06_21_101529_add_user_id_to_purchases_table', 11),
(39, '2018_06_21_103512_add_user_id_to_transfers_table', 12),
(40, '2018_06_23_061058_add_user_id_to_quotations_table', 13),
(41, '2018_06_23_082427_add_is_deleted_to_users_table', 14),
(42, '2018_06_25_043308_change_email_to_users_table', 15),
(43, '2018_07_06_115449_create_general_settings_table', 16),
(44, '2018_07_08_043944_create_languages_table', 17),
(45, '2018_07_11_102144_add_user_id_to_returns_table', 18),
(46, '2018_07_11_102334_add_user_id_to_payments_table', 18),
(47, '2018_07_22_130541_add_digital_to_products_table', 19),
(49, '2018_07_24_154250_create_deliveries_table', 20),
(50, '2018_08_16_053336_create_expense_categories_table', 21),
(51, '2018_08_17_115415_create_expenses_table', 22),
(55, '2018_08_18_050418_create_gift_cards_table', 23),
(56, '2018_08_19_063119_create_payment_with_gift_card_table', 24),
(57, '2018_08_25_042333_create_gift_card_recharges_table', 25),
(58, '2018_08_25_101354_add_deposit_expense_to_customers_table', 26),
(59, '2018_08_26_043801_create_deposits_table', 27),
(60, '2018_09_02_044042_add_keybord_active_to_pos_setting_table', 28),
(61, '2018_09_09_092713_create_payment_with_paypal_table', 29),
(62, '2018_09_10_051254_add_currency_to_general_settings_table', 30),
(63, '2018_10_22_084118_add_biller_and_store_id_to_users_table', 31),
(65, '2018_10_26_034927_create_coupons_table', 32),
(66, '2018_10_27_090857_add_coupon_to_sales_table', 33),
(67, '2018_11_07_070155_add_currency_position_to_general_settings_table', 34),
(68, '2018_11_19_094650_add_combo_to_products_table', 35),
(69, '2018_12_09_043712_create_accounts_table', 36),
(70, '2018_12_17_112253_add_is_default_to_accounts_table', 37),
(71, '2018_12_19_103941_add_account_id_to_payments_table', 38),
(72, '2018_12_20_065900_add_account_id_to_expenses_table', 39),
(73, '2018_12_20_082753_add_account_id_to_returns_table', 40),
(74, '2018_12_26_064330_create_return_purchases_table', 41),
(75, '2018_12_26_144210_create_purchase_product_return_table', 42),
(76, '2018_12_26_144708_create_purchase_product_return_table', 43),
(77, '2018_12_27_110018_create_departments_table', 44),
(78, '2018_12_30_054844_create_employees_table', 45),
(79, '2018_12_31_125210_create_payrolls_table', 46),
(80, '2018_12_31_150446_add_department_id_to_employees_table', 47),
(81, '2019_01_01_062708_add_user_id_to_expenses_table', 48),
(82, '2019_01_02_075644_create_hrm_settings_table', 49),
(83, '2019_01_02_090334_create_attendances_table', 50),
(84, '2019_01_27_160956_add_three_columns_to_general_settings_table', 51),
(85, '2019_02_15_183303_create_stock_counts_table', 52),
(86, '2019_02_17_101604_add_is_adjusted_to_stock_counts_table', 53),
(87, '2019_04_13_101707_add_tax_no_to_customers_table', 54),
(89, '2019_10_14_111455_create_holidays_table', 55),
(90, '2019_11_13_145619_add_is_variant_to_products_table', 56),
(91, '2019_11_13_150206_create_product_variants_table', 57),
(92, '2019_11_13_153828_create_variants_table', 57),
(93, '2019_11_25_134041_add_qty_to_product_variants_table', 58),
(94, '2019_11_25_134922_add_variant_id_to_product_purchases_table', 58),
(95, '2019_11_25_145341_add_variant_id_to_product_warehouse_table', 58),
(96, '2019_11_29_182201_add_variant_id_to_product_sales_table', 59),
(97, '2019_12_04_121311_add_variant_id_to_product_quotation_table', 60),
(98, '2019_12_05_123802_add_variant_id_to_product_transfer_table', 61),
(100, '2019_12_08_114954_add_variant_id_to_product_returns_table', 62),
(101, '2019_12_08_203146_add_variant_id_to_purchase_product_return_table', 63),
(102, '2020_02_28_103340_create_money_transfers_table', 64),
(103, '2020_07_01_193151_add_image_to_categories_table', 65),
(105, '2020_09_26_130426_add_user_id_to_deliveries_table', 66),
(107, '2020_10_11_125457_create_cash_registers_table', 67),
(108, '2020_10_13_155019_add_cash_register_id_to_sales_table', 68),
(109, '2020_10_13_172624_add_cash_register_id_to_returns_table', 69),
(110, '2020_10_17_212338_add_cash_register_id_to_payments_table', 70),
(111, '2020_10_18_124200_add_cash_register_id_to_expenses_table', 71),
(112, '2020_10_21_121632_add_developed_by_to_general_settings_table', 72),
(113, '2019_08_19_000000_create_failed_jobs_table', 73),
(114, '2020_10_30_135557_create_notifications_table', 73),
(115, '2020_11_01_044954_create_currencies_table', 74),
(116, '2020_11_01_140736_add_price_to_product_warehouse_table', 75),
(117, '2020_11_02_050633_add_is_diff_price_to_products_table', 76),
(118, '2020_11_09_055222_add_user_id_to_customers_table', 77),
(119, '2020_11_17_054806_add_invoice_format_to_general_settings_table', 78),
(120, '2021_02_10_074859_add_variant_id_to_product_adjustments_table', 79),
(121, '2021_03_07_093606_create_product_batches_table', 80),
(122, '2021_03_07_093759_add_product_batch_id_to_product_warehouse_table', 80),
(123, '2021_03_07_093900_add_product_batch_id_to_product_purchases_table', 80),
(124, '2021_03_11_132603_add_product_batch_id_to_product_sales_table', 81),
(127, '2021_03_25_125421_add_is_batch_to_products_table', 82),
(128, '2021_05_19_120127_add_product_batch_id_to_product_returns_table', 82),
(130, '2021_05_22_105611_add_product_batch_id_to_purchase_product_return_table', 83),
(131, '2021_05_23_124848_add_product_batch_id_to_product_transfer_table', 84),
(132, '2021_05_26_153106_add_product_batch_id_to_product_quotation_table', 85),
(133, '2021_06_08_213007_create_reward_point_settings_table', 86),
(134, '2021_06_16_104155_add_points_to_customers_table', 87),
(135, '2021_06_17_101057_add_used_points_to_payments_table', 88),
(136, '2021_07_06_132716_add_variant_list_to_products_table', 89),
(137, '2021_09_27_161141_add_is_imei_to_products_table', 90),
(138, '2021_09_28_170052_add_imei_number_to_product_warehouse_table', 91),
(139, '2021_09_28_170126_add_imei_number_to_product_purchases_table', 91),
(140, '2021_10_03_170652_add_imei_number_to_product_sales_table', 92),
(141, '2021_10_10_145214_add_imei_number_to_product_returns_table', 93),
(142, '2021_10_11_104504_add_imei_number_to_product_transfer_table', 94),
(143, '2021_10_12_160107_add_imei_number_to_purchase_product_return_table', 95),
(144, '2021_10_12_205146_add_is_rtl_to_general_settings_table', 96),
(145, '2021_10_23_142451_add_is_approve_to_payments_table', 97),
(146, '2022_01_13_191242_create_discount_plans_table', 97),
(147, '2022_01_14_174318_create_discount_plan_customers_table', 97),
(148, '2022_01_14_202439_create_discounts_table', 98),
(149, '2022_01_16_153506_create_discount_plan_discounts_table', 98),
(150, '2022_02_05_174210_add_order_discount_type_and_value_to_sales_table', 99),
(154, '2022_05_26_195506_add_daily_sale_objective_to_products_table', 100),
(155, '2022_05_28_104209_create_dso_alerts_table', 101),
(156, '2022_06_01_112100_add_is_embeded_to_products_table', 102),
(157, '2022_06_14_130505_add_sale_id_to_returns_table', 103),
(159, '2022_07_19_115504_add_variant_data_to_products_table', 104),
(160, '2022_07_25_194300_add_additional_cost_to_product_variants_table', 104),
(161, '2022_09_04_195610_add_purchase_id_to_return_purchases_table', 105),
(162, '2023_01_18_123842_alter_table_pos_setting', 106),
(164, '2023_01_18_125040_alter_table_general_settings', 107),
(165, '2023_01_18_133701_alter_table_pos_setting', 108),
(166, '2023_01_25_145309_add_expiry_date_to_general_settings_table', 109),
(167, '2023_02_23_125656_alter_table_sales', 110),
(168, '2023_02_26_124100_add_package_id_to_general_settings_table', 111),
(169, '2023_03_04_120325_create_custom_fields_table', 111),
(170, '2023_03_22_174352_add_currency_id_and_exchange_rate_to_returns_table', 112),
(171, '2023_03_27_114320_add_currency_id_and_exchange_rate_to_purchases_table', 113),
(172, '2023_03_27_132747_add_currency_id_and_exchange_rate_to_return_purchases_table', 114),
(173, '2023_04_25_150236_create_mail_settings_table', 115),
(174, '2023_05_13_125424_add_zatca_to_general_settings_table', 116),
(175, '2023_05_28_155540_create_tables_table', 117),
(176, '2023_05_29_115039_add_is_table_to_pos_setting_table', 117),
(177, '2023_05_29_115301_add_table_id_to_sales_table', 117),
(178, '2023_05_31_165049_add_queue_no_to_sales_table', 117),
(190, '2023_08_12_124016_add_staff_id_to_employees_table', 121),
(192, '2023_07_23_160254_create_couriers_table', 122),
(193, '2023_07_23_174343_add_courier_id_to_deliveries_table', 122),
(194, '2023_08_14_142608_add_is_active_to_currencies_table', 122),
(195, '2023_08_24_130203_change_columns_to_attendances_table', 122),
(196, '2023_09_10_134503_add_without_stock_to_general_settings_table', 123),
(204, '2023_09_26_211542_add_modules_to_general_settings_table', 125),
(217, '2023_10_15_124306_add_return_qty_to_product_sales_table', 129),
(219, '2023_12_03_235606_crete_external_services_table', 131),
(221, '2023_03_14_174658_add_subscription_type_to_general_setting_table', 130),
(222, '2024_02_04_131826_add_unit_cost_to_product_adjustments_table', 132),
(223, '2024_02_13_173126_change_modules_to_general_settings_table', 133),
(224, '2024_05_02_114215_add_payment_receiver_to_payments', 134),
(225, '2024_05_06_132553_create_sms_templates_table', 135),
(226, '2024_05_07_102225_add_send_sms_to_pos_setting_table', 135),
(227, '2024_05_07_132625_add_is_default_to_sms_templates_table', 135),
(228, '2024_05_08_112211_change_address_and_city_field_to_nullable_in_customers_table', 135),
(229, '2024_05_08_151050_add_is_default_ecommerce_columne_to_sms_templates_table', 135),
(230, '2024_05_20_182757_add_wholesale_price_to_products_table', 136),
(231, '2024_05_21_170500_add_is_sent_to_transfers_table', 137),
(232, '2023_02_05_132001_add_change_to_payments_table', 138),
(233, '2024_06_04_225113_create_income_categories_table', 138),
(234, '2024_06_04_225128_create_incomes_table', 138),
(235, '2024_06_29_131917_add_is_packing_slip_to_general_settings_table', 138),
(236, '2024_07_05_192531_create_packing_slips_table', 138),
(237, '2024_07_05_193002_create_packing_slip_products_table', 138),
(238, '2024_07_05_194501_add_is_packing_and_delivered_to_product_sales_table', 138),
(239, '2024_07_14_122245_add_delivery_id_to_packing_slips_table', 138),
(240, '2024_07_14_122415_add_variant_id_to_packing_slip_products_table', 138),
(241, '2024_07_14_122519_add_packing_slip_ids_to_deliveries_table', 138),
(242, '2024_07_16_125908_create_challans_table', 138),
(245, '2023_03_18_141537_add_woocommerce_category_id_to_categories_table', 139),
(246, '2023_03_20_214553_add_column_for_woocommerce_to_products_table', 139),
(247, '2023_03_20_214563_add_woocommerce_tax_id_to_taxes_table', 139),
(248, '2023_03_20_214565_add_woocommerce_order_id_to_sales_table', 139),
(249, '2023_08_01_134406_add_is_sync_disable_to_categories_table', 139),
(250, '2023_08_01_135252_add_product_status_to_woocommerce_settings_table', 139),
(251, '2024_08_12_112830_add_thermal_invoice_size_to_pos_setting', 139),
(252, '2024_08_14_133351_add_expiry_type_value_to_general_settings', 139),
(253, '2024_09_11_151744_add_return_qty_to_product_purchases_table', 140),
(254, '2024_09_12_162309_create_barcodes_table', 140),
(255, '2024_10_10_121312_add_data_to_payment_with_credit_card_table', 141),
(256, '2024_10_10_212501_alter_attendances_table', 142),
(257, '2024_10_10_213757_alter_attendances_table', 142),
(258, '2024_10_14_144917_change_column_to_nullable_to_payment_with_credit_card_table', 142),
(259, '2024_09_01_120515_create_productions_table', 143),
(260, '2024_09_01_120536_create_product_productions_table', 143),
(261, '2024_11_10_121521_add_code_and_type_to_accounts_table', 144),
(262, '2024_11_24_100926_add_module_status_to_external_services_table', 145),
(263, '2022_09_05_213845_create_sliders_table', 146),
(264, '2022_09_05_214402_create_pages_table', 146),
(265, '2022_09_05_235844_add_multiple_column_to_categories_table', 146),
(266, '2022_09_06_215257_add_symbol_to_currencies_table', 146),
(267, '2022_09_13_194813_create_links_table', 146),
(268, '2022_09_14_151339_add_widget_title_to_links_table', 146),
(269, '2022_09_14_151904_add_multiple_column_to_products_table', 146),
(270, '2023_10_05_190729_create_ecommerce_settings_table', 146),
(271, '2023_10_05_201640_create_social_links_table', 146),
(272, '2023_10_08_211633_crete_menus_table', 146),
(273, '2023_10_08_211806_crete_menu_items_table', 146),
(274, '2023_10_12_101855_crete_widgets_table', 146),
(275, '2023_10_19_211003_crete_page_widgets_table', 146),
(276, '2023_11_09_110943_crete_collections_table', 146),
(277, '2023_11_09_113224_crete_customer_addresses_table', 146),
(278, '2023_11_09_113237_crete_faqs_table', 146),
(279, '2023_11_09_114154_add_multiple_columns_to_brands_table', 146),
(280, '2023_11_09_125124_crete_faq_categories_table', 146),
(281, '2023_11_14_155545_crete_newsletter_table', 146),
(282, '2023_12_01_110636_add_multiple_columns_to_sales_table', 146),
(283, '2024_01_27_185652_add_multiple_columns_to_ecommerce_settings_table', 146),
(284, '2024_02_03_183124_add_multiple_columns_to_products_table', 146),
(285, '2024_02_06_133230_edi_sales_table', 146),
(286, '2024_02_12_235611_change_page_widgets_table', 146),
(287, '2024_02_18_175556_add_columns_to_customers_table', 146),
(288, '2024_03_03_231218_add_gift_card_to_ecommerce_settings_table', 146),
(289, '2024_03_18_150001_crete_blogs_table', 146),
(290, '2024_06_09_155352_add_theme_color_to_ecommerce_settings_table', 146),
(291, '2024_06_12_222658_edit_page_widgets_table', 146),
(292, '2024_07_22_235454_add_search_to_ecommerce_settings_table', 146),
(293, '2024_10_10_102444_add_is_rtl_to_ecommerce_settings_table', 146),
(294, '2024_10_25_202721_alter_ecommerce_settings_table', 146),
(295, '2024_11_11_170940_alter_page_widgets_table', 146),
(296, '2024_11_23_225726_change_ecommerce_settings_table', 146);

-- --------------------------------------------------------

--
-- Table structure for table `money_transfers`
--

CREATE TABLE `money_transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packing_slips`
--

CREATE TABLE `packing_slips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packing_slips`
--

INSERT INTO `packing_slips` (`id`, `reference_no`, `sale_id`, `delivery_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '1001', 1, 1, 93000, 'Delivered', '2025-01-10 19:24:30', '2025-01-10 19:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `packing_slip_products`
--

CREATE TABLE `packing_slip_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packing_slip_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packing_slip_products`
--

INSERT INTO `packing_slip_products` (`id`, `packing_slip_id`, `product_id`, `variant_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2025-01-10 19:24:30', '2025-01-10 19:24:30'),
(2, 1, 1, 4, '2025-01-10 19:24:30', '2025-01-10 19:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `template` varchar(255) NOT NULL DEFAULT 'Default',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `description`, `slug`, `meta_title`, `meta_description`, `og_title`, `og_image`, `og_description`, `template`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, 'home', 'eCommerce add-on for SalePro POS, inventory management Laravel application', 'eCommerce add-on for SalePro POS, inventory management Laravel application', 'SalePro eCommerce', '20250110061933.JPG.JPG', NULL, 'home', 1, '2025-01-10 11:43:01', '2025-01-10 17:17:50'),
(2, 'ContactUs', NULL, 'contactus', NULL, NULL, NULL, NULL, NULL, 'contact', 1, '2025-01-10 12:50:48', '2025-01-10 12:50:48'),
(3, 'Faq', NULL, 'faq', NULL, NULL, NULL, NULL, NULL, 'faq', 1, '2025-01-10 12:53:16', '2025-01-10 12:53:16'),
(4, 'About SalePro eCommerce', '<p>Chu&nbsp;eCommerce is an optional premium add-on/extension/module for SalePro POS. If you have shop where you are running or plan to run our SalePro POS software and you want to sell online as well, this is the perfect solution for you. Whether you are looking to go for a local, nation-wide or even international operation with your eCommerce store, SalePro eCommerce has everything built-in to meet all the challenges therein.</p>', 'about-salepro-ecommerce', 'eCommerce', 'eCommerce', NULL, NULL, NULL, 'default', 1, '2025-01-10 17:18:52', '2025-01-10 17:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `page_widgets`
--

CREATE TABLE `page_widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_id` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `product_category_title` varchar(255) DEFAULT NULL,
  `product_category_id` varchar(255) DEFAULT NULL,
  `product_category_type` varchar(255) DEFAULT NULL,
  `product_category_slider_loop` varchar(255) DEFAULT NULL,
  `product_category_slider_autoplay` varchar(255) DEFAULT NULL,
  `product_category_limit` varchar(255) DEFAULT NULL,
  `tab_product_collection_id` varchar(255) DEFAULT NULL,
  `tab_product_collection_type` varchar(255) DEFAULT NULL,
  `tab_product_collection_slider_loop` varchar(255) DEFAULT NULL,
  `tab_product_collection_slider_autoplay` varchar(255) DEFAULT NULL,
  `tab_product_collection_limit` varchar(255) DEFAULT NULL,
  `product_collection_title` varchar(255) DEFAULT NULL,
  `product_collection_id` varchar(255) DEFAULT NULL,
  `product_collection_type` varchar(255) DEFAULT NULL,
  `product_collection_slider_loop` varchar(255) DEFAULT NULL,
  `product_collection_slider_autoplay` varchar(255) DEFAULT NULL,
  `product_collection_limit` varchar(255) DEFAULT NULL,
  `category_slider_title` varchar(255) DEFAULT NULL,
  `category_slider_loop` varchar(255) DEFAULT NULL,
  `category_slider_autoplay` varchar(255) DEFAULT NULL,
  `category_slider_ids` varchar(255) DEFAULT NULL,
  `brand_slider_title` varchar(255) DEFAULT NULL,
  `brand_slider_loop` varchar(255) DEFAULT NULL,
  `brand_slider_autoplay` varchar(255) DEFAULT NULL,
  `brand_slider_ids` varchar(255) DEFAULT NULL,
  `three_c_banner_link1` varchar(255) DEFAULT NULL,
  `three_c_banner_image1` varchar(255) DEFAULT NULL,
  `three_c_banner_link2` varchar(255) DEFAULT NULL,
  `three_c_banner_image2` varchar(255) DEFAULT NULL,
  `three_c_banner_link3` varchar(255) DEFAULT NULL,
  `three_c_banner_image3` varchar(255) DEFAULT NULL,
  `two_c_banner_link1` varchar(255) DEFAULT NULL,
  `two_c_banner_image1` varchar(255) DEFAULT NULL,
  `two_c_banner_link2` varchar(255) DEFAULT NULL,
  `two_c_banner_image2` varchar(255) DEFAULT NULL,
  `one_c_banner_link1` varchar(255) DEFAULT NULL,
  `one_c_banner_image1` varchar(255) DEFAULT NULL,
  `text_title` varchar(255) DEFAULT NULL,
  `text_content` varchar(255) DEFAULT NULL,
  `slider_images` text DEFAULT NULL,
  `slider_links` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_widgets`
--

INSERT INTO `page_widgets` (`id`, `name`, `page_id`, `order`, `product_category_title`, `product_category_id`, `product_category_type`, `product_category_slider_loop`, `product_category_slider_autoplay`, `product_category_limit`, `tab_product_collection_id`, `tab_product_collection_type`, `tab_product_collection_slider_loop`, `tab_product_collection_slider_autoplay`, `tab_product_collection_limit`, `product_collection_title`, `product_collection_id`, `product_collection_type`, `product_collection_slider_loop`, `product_collection_slider_autoplay`, `product_collection_limit`, `category_slider_title`, `category_slider_loop`, `category_slider_autoplay`, `category_slider_ids`, `brand_slider_title`, `brand_slider_loop`, `brand_slider_autoplay`, `brand_slider_ids`, `three_c_banner_link1`, `three_c_banner_image1`, `three_c_banner_link2`, `three_c_banner_image2`, `three_c_banner_link3`, `three_c_banner_image3`, `two_c_banner_link1`, `two_c_banner_image1`, `two_c_banner_link2`, `two_c_banner_image2`, `one_c_banner_link1`, `one_c_banner_image1`, `text_title`, `text_content`, `slider_images`, `slider_links`, `created_at`, `updated_at`) VALUES
(12, 'category-slider-widget', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Browse By categories', 'yes', NULL, '1,5,10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-10 17:15:47', '2025-01-10 17:17:50'),
(13, 'product-category-widget', '1', '1', 'Laptops for everyday', '5', 'gallery', 'yes', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-10 17:16:19', '2025-01-10 17:17:50'),
(14, 'brand-slider-widget', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-10 17:17:01', '2025-01-10 17:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ashfaqdev.php@gmail.com', '$2y$10$plxHOMxChJlHd9t6FQkoN.4dXMdtZ9fE5tXBBItzjxB1R5JF9OpbO', '2023-07-15 06:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_reference` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `payment_receiver` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL,
  `used_points` double DEFAULT NULL,
  `change` double DEFAULT NULL,
  `paying_method` varchar(191) NOT NULL,
  `payment_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_reference`, `user_id`, `purchase_id`, `sale_id`, `cash_register_id`, `account_id`, `payment_receiver`, `amount`, `used_points`, `change`, `paying_method`, `payment_note`, `created_at`, `updated_at`) VALUES
(1, 'spr-20250111-125853', 1, NULL, 1, 1, 1, NULL, 93000, NULL, 0, 'Cash', NULL, '2025-01-10 19:28:53', '2025-01-10 19:28:53'),
(2, 'ppr-20250111-010216', 1, 2, NULL, NULL, 1, NULL, 100000, NULL, 0, 'Cash', NULL, '2025-01-10 19:32:16', '2025-01-10 19:32:16'),
(3, 'spr-20250111-010841', 1, NULL, 3, 1, 1, 'sadeesha kaushalya', 16500, NULL, 0, 'Credit Card', 'asdasd', '2025-01-10 19:38:41', '2025-01-10 19:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_cheque`
--

CREATE TABLE `payment_with_cheque` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `cheque_no` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_credit_card`
--

CREATE TABLE `payment_with_credit_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_stripe_id` varchar(191) DEFAULT NULL,
  `charge_id` varchar(191) NOT NULL,
  `data` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_with_credit_card`
--

INSERT INTO `payment_with_credit_card` (`id`, `payment_id`, `customer_id`, `customer_stripe_id`, `charge_id`, `data`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, '12345', '{\"card_number\":\"123123412\",\"card_holder_name\":\"asdasd\",\"card_type\":\"Visa\"}', '2025-01-10 19:38:41', '2025-01-10 19:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_gift_card`
--

CREATE TABLE `payment_with_gift_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `gift_card_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_paypal`
--

CREATE TABLE `payment_with_paypal` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `transaction_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `paying_method` varchar(191) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'products-edit', 'web', '2018-06-02 19:30:09', '2018-06-02 19:30:09'),
(5, 'products-delete', 'web', '2018-06-03 17:24:22', '2018-06-03 17:24:22'),
(6, 'products-add', 'web', '2018-06-03 19:04:14', '2018-06-03 19:04:14'),
(7, 'products-index', 'web', '2018-06-03 22:04:27', '2018-06-03 22:04:27'),
(8, 'purchases-index', 'web', '2018-06-04 02:33:19', '2018-06-04 02:33:19'),
(9, 'purchases-add', 'web', '2018-06-04 02:42:25', '2018-06-04 02:42:25'),
(10, 'purchases-edit', 'web', '2018-06-04 04:17:36', '2018-06-04 04:17:36'),
(11, 'purchases-delete', 'web', '2018-06-04 04:17:36', '2018-06-04 04:17:36'),
(12, 'sales-index', 'web', '2018-06-04 05:19:08', '2018-06-04 05:19:08'),
(13, 'sales-add', 'web', '2018-06-04 05:19:52', '2018-06-04 05:19:52'),
(14, 'sales-edit', 'web', '2018-06-04 05:19:52', '2018-06-04 05:19:52'),
(15, 'sales-delete', 'web', '2018-06-04 05:19:53', '2018-06-04 05:19:53'),
(16, 'quotes-index', 'web', '2018-06-04 16:35:10', '2018-06-04 16:35:10'),
(17, 'quotes-add', 'web', '2018-06-04 16:35:10', '2018-06-04 16:35:10'),
(18, 'quotes-edit', 'web', '2018-06-04 16:35:10', '2018-06-04 16:35:10'),
(19, 'quotes-delete', 'web', '2018-06-04 16:35:10', '2018-06-04 16:35:10'),
(20, 'transfers-index', 'web', '2018-06-04 17:00:03', '2018-06-04 17:00:03'),
(21, 'transfers-add', 'web', '2018-06-04 17:00:03', '2018-06-04 17:00:03'),
(22, 'transfers-edit', 'web', '2018-06-04 17:00:03', '2018-06-04 17:00:03'),
(23, 'transfers-delete', 'web', '2018-06-04 17:00:03', '2018-06-04 17:00:03'),
(24, 'returns-index', 'web', '2018-06-04 17:20:24', '2018-06-04 17:20:24'),
(25, 'returns-add', 'web', '2018-06-04 17:20:24', '2018-06-04 17:20:24'),
(26, 'returns-edit', 'web', '2018-06-04 17:20:25', '2018-06-04 17:20:25'),
(27, 'returns-delete', 'web', '2018-06-04 17:20:25', '2018-06-04 17:20:25'),
(28, 'customers-index', 'web', '2018-06-04 17:45:54', '2018-06-04 17:45:54'),
(29, 'customers-add', 'web', '2018-06-04 17:45:55', '2018-06-04 17:45:55'),
(30, 'customers-edit', 'web', '2018-06-04 17:45:55', '2018-06-04 17:45:55'),
(31, 'customers-delete', 'web', '2018-06-04 17:45:55', '2018-06-04 17:45:55'),
(32, 'suppliers-index', 'web', '2018-06-04 18:10:12', '2018-06-04 18:10:12'),
(33, 'suppliers-add', 'web', '2018-06-04 18:10:12', '2018-06-04 18:10:12'),
(34, 'suppliers-edit', 'web', '2018-06-04 18:10:12', '2018-06-04 18:10:12'),
(35, 'suppliers-delete', 'web', '2018-06-04 18:10:12', '2018-06-04 18:10:12'),
(36, 'product-report', 'web', '2018-06-24 17:35:33', '2018-06-24 17:35:33'),
(37, 'purchase-report', 'web', '2018-06-24 17:54:56', '2018-06-24 17:54:56'),
(38, 'sale-report', 'web', '2018-06-24 18:03:13', '2018-06-24 18:03:13'),
(39, 'customer-report', 'web', '2018-06-24 18:06:51', '2018-06-24 18:06:51'),
(40, 'due-report', 'web', '2018-06-24 18:09:52', '2018-06-24 18:09:52'),
(41, 'users-index', 'web', '2018-06-24 18:30:10', '2018-06-24 18:30:10'),
(42, 'users-add', 'web', '2018-06-24 18:30:10', '2018-06-24 18:30:10'),
(43, 'users-edit', 'web', '2018-06-24 18:31:30', '2018-06-24 18:31:30'),
(44, 'users-delete', 'web', '2018-06-24 18:31:30', '2018-06-24 18:31:30'),
(45, 'profit-loss', 'web', '2018-07-14 16:20:05', '2018-07-14 16:20:05'),
(46, 'best-seller', 'web', '2018-07-14 16:31:38', '2018-07-14 16:31:38'),
(47, 'daily-sale', 'web', '2018-07-14 16:54:21', '2018-07-14 16:54:21'),
(48, 'monthly-sale', 'web', '2018-07-14 17:00:41', '2018-07-14 17:00:41'),
(49, 'daily-purchase', 'web', '2018-07-14 17:06:46', '2018-07-14 17:06:46'),
(50, 'monthly-purchase', 'web', '2018-07-14 17:18:17', '2018-07-14 17:18:17'),
(51, 'payment-report', 'web', '2018-07-14 17:40:41', '2018-07-14 17:40:41'),
(52, 'warehouse-stock-report', 'web', '2018-07-14 17:46:55', '2018-07-14 17:46:55'),
(53, 'product-qty-alert', 'web', '2018-07-14 18:03:21', '2018-07-14 18:03:21'),
(54, 'supplier-report', 'web', '2018-07-29 21:30:01', '2018-07-29 21:30:01'),
(55, 'expenses-index', 'web', '2018-09-04 19:37:10', '2018-09-04 19:37:10'),
(56, 'expenses-add', 'web', '2018-09-04 19:37:10', '2018-09-04 19:37:10'),
(57, 'expenses-edit', 'web', '2018-09-04 19:37:10', '2018-09-04 19:37:10'),
(58, 'expenses-delete', 'web', '2018-09-04 19:37:11', '2018-09-04 19:37:11'),
(59, 'general_setting', 'web', '2018-10-19 17:40:04', '2018-10-19 17:40:04'),
(60, 'mail_setting', 'web', '2018-10-19 17:40:04', '2018-10-19 17:40:04'),
(61, 'pos_setting', 'web', '2018-10-19 17:40:04', '2018-10-19 17:40:04'),
(62, 'hrm_setting', 'web', '2019-01-02 05:00:23', '2019-01-02 05:00:23'),
(63, 'purchase-return-index', 'web', '2019-01-02 16:15:14', '2019-01-02 16:15:14'),
(64, 'purchase-return-add', 'web', '2019-01-02 16:15:14', '2019-01-02 16:15:14'),
(65, 'purchase-return-edit', 'web', '2019-01-02 16:15:14', '2019-01-02 16:15:14'),
(66, 'purchase-return-delete', 'web', '2019-01-02 16:15:14', '2019-01-02 16:15:14'),
(67, 'account-index', 'web', '2019-01-02 16:36:13', '2019-01-02 16:36:13'),
(68, 'balance-sheet', 'web', '2019-01-02 16:36:14', '2019-01-02 16:36:14'),
(69, 'account-statement', 'web', '2019-01-02 16:36:14', '2019-01-02 16:36:14'),
(70, 'department', 'web', '2019-01-02 17:00:01', '2019-01-02 17:00:01'),
(71, 'attendance', 'web', '2019-01-02 17:00:01', '2019-01-02 17:00:01'),
(72, 'payroll', 'web', '2019-01-02 17:00:01', '2019-01-02 17:00:01'),
(73, 'employees-index', 'web', '2019-01-02 17:22:19', '2019-01-02 17:22:19'),
(74, 'employees-add', 'web', '2019-01-02 17:22:19', '2019-01-02 17:22:19'),
(75, 'employees-edit', 'web', '2019-01-02 17:22:19', '2019-01-02 17:22:19'),
(76, 'employees-delete', 'web', '2019-01-02 17:22:19', '2019-01-02 17:22:19'),
(77, 'user-report', 'web', '2019-01-16 01:18:18', '2019-01-16 01:18:18'),
(78, 'stock_count', 'web', '2019-02-17 05:02:01', '2019-02-17 05:02:01'),
(79, 'adjustment', 'web', '2019-02-17 05:02:02', '2019-02-17 05:02:02'),
(80, 'sms_setting', 'web', '2019-02-21 23:48:03', '2019-02-21 23:48:03'),
(81, 'create_sms', 'web', '2019-02-21 23:48:03', '2019-02-21 23:48:03'),
(82, 'print_barcode', 'web', '2019-03-06 23:32:19', '2019-03-06 23:32:19'),
(83, 'empty_database', 'web', '2019-03-06 23:32:19', '2019-03-06 23:32:19'),
(84, 'customer_group', 'web', '2019-03-07 00:07:15', '2019-03-07 00:07:15'),
(85, 'unit', 'web', '2019-03-07 00:07:15', '2019-03-07 00:07:15'),
(86, 'tax', 'web', '2019-03-07 00:07:15', '2019-03-07 00:07:15'),
(87, 'gift_card', 'web', '2019-03-07 00:59:38', '2019-03-07 00:59:38'),
(88, 'coupon', 'web', '2019-03-07 00:59:38', '2019-03-07 00:59:38'),
(89, 'holiday', 'web', '2019-10-19 03:27:15', '2019-10-19 03:27:15'),
(90, 'warehouse-report', 'web', '2019-10-22 00:30:23', '2019-10-22 00:30:23'),
(91, 'warehouse', 'web', '2020-02-26 01:17:32', '2020-02-26 01:17:32'),
(92, 'brand', 'web', '2020-02-26 01:29:59', '2020-02-26 01:29:59'),
(93, 'billers-index', 'web', '2020-02-26 01:41:15', '2020-02-26 01:41:15'),
(94, 'billers-add', 'web', '2020-02-26 01:41:15', '2020-02-26 01:41:15'),
(95, 'billers-edit', 'web', '2020-02-26 01:41:15', '2020-02-26 01:41:15'),
(96, 'billers-delete', 'web', '2020-02-26 01:41:15', '2020-02-26 01:41:15'),
(97, 'money-transfer', 'web', '2020-03-02 00:11:48', '2020-03-02 00:11:48'),
(98, 'category', 'web', '2020-07-13 06:43:16', '2020-07-13 06:43:16'),
(99, 'delivery', 'web', '2020-07-13 06:43:16', '2020-07-13 06:43:16'),
(100, 'send_notification', 'web', '2020-10-31 00:51:31', '2020-10-31 00:51:31'),
(101, 'today_sale', 'web', '2020-10-31 01:27:04', '2020-10-31 01:27:04'),
(102, 'today_profit', 'web', '2020-10-31 01:27:04', '2020-10-31 01:27:04'),
(103, 'currency', 'web', '2020-11-08 18:53:11', '2020-11-08 18:53:11'),
(104, 'backup_database', 'web', '2020-11-14 18:46:55', '2020-11-14 18:46:55'),
(105, 'reward_point_setting', 'web', '2021-06-26 23:04:42', '2021-06-26 23:04:42'),
(106, 'revenue_profit_summary', 'web', '2022-02-08 08:27:21', '2022-02-08 08:27:21'),
(107, 'cash_flow', 'web', '2022-02-08 08:27:22', '2022-02-08 08:27:22'),
(108, 'monthly_summary', 'web', '2022-02-08 08:27:22', '2022-02-08 08:27:22'),
(109, 'yearly_report', 'web', '2022-02-08 08:27:22', '2022-02-08 08:27:22'),
(110, 'discount_plan', 'web', '2022-02-16 03:42:26', '2022-02-16 03:42:26'),
(111, 'discount', 'web', '2022-02-16 03:42:38', '2022-02-16 03:42:38'),
(112, 'product-expiry-report', 'web', '2022-03-30 00:09:20', '2022-03-30 00:09:20'),
(113, 'purchase-payment-index', 'web', '2022-06-05 08:42:27', '2022-06-05 08:42:27'),
(114, 'purchase-payment-add', 'web', '2022-06-05 08:42:28', '2022-06-05 08:42:28'),
(115, 'purchase-payment-edit', 'web', '2022-06-05 08:42:28', '2022-06-05 08:42:28'),
(116, 'purchase-payment-delete', 'web', '2022-06-05 08:42:28', '2022-06-05 08:42:28'),
(117, 'sale-payment-index', 'web', '2022-06-05 08:42:28', '2022-06-05 08:42:28'),
(118, 'sale-payment-add', 'web', '2022-06-05 08:42:28', '2022-06-05 08:42:28'),
(119, 'sale-payment-edit', 'web', '2022-06-05 08:42:28', '2022-06-05 08:42:28'),
(120, 'sale-payment-delete', 'web', '2022-06-05 08:42:28', '2022-06-05 08:42:28'),
(121, 'all_notification', 'web', '2022-06-05 08:42:29', '2022-06-05 08:42:29'),
(122, 'sale-report-chart', 'web', '2022-06-05 08:42:29', '2022-06-05 08:42:29'),
(123, 'dso-report', 'web', '2022-06-05 08:42:29', '2022-06-05 08:42:29'),
(124, 'product_history', 'web', '2022-08-25 08:34:05', '2022-08-25 08:34:05'),
(125, 'supplier-due-report', 'web', '2022-08-31 04:16:33', '2022-08-31 04:16:33'),
(126, 'custom_field', 'web', '2023-05-02 02:11:35', '2023-05-02 02:11:35'),
(127, 'incomes-index', 'web', '2024-08-10 23:20:59', '2024-08-10 23:20:59'),
(128, 'incomes-add', 'web', '2024-08-10 23:20:59', '2024-08-10 23:20:59'),
(129, 'incomes-edit', 'web', '2024-08-10 23:20:59', '2024-08-10 23:20:59'),
(130, 'incomes-delete', 'web', '2024-08-10 23:20:59', '2024-08-10 23:20:59'),
(131, 'packing_slip_challan', 'web', '2024-08-10 23:21:00', '2024-08-10 23:21:00'),
(132, 'biller-report', 'web', '2024-08-25 18:00:44', '2024-08-25 18:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `pos_setting`
--

CREATE TABLE `pos_setting` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `product_number` int(11) NOT NULL,
  `keybord_active` tinyint(1) NOT NULL,
  `is_table` tinyint(1) NOT NULL DEFAULT 0,
  `send_sms` tinyint(1) NOT NULL DEFAULT 0,
  `stripe_public_key` varchar(191) DEFAULT NULL,
  `stripe_secret_key` varchar(191) DEFAULT NULL,
  `paypal_live_api_username` varchar(191) DEFAULT NULL,
  `paypal_live_api_password` varchar(191) DEFAULT NULL,
  `paypal_live_api_secret` varchar(191) DEFAULT NULL,
  `payment_options` text DEFAULT NULL,
  `invoice_option` varchar(10) DEFAULT NULL,
  `thermal_invoice_size` varchar(255) NOT NULL DEFAULT '80',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_setting`
--

INSERT INTO `pos_setting` (`id`, `customer_id`, `warehouse_id`, `biller_id`, `product_number`, `keybord_active`, `is_table`, `send_sms`, `stripe_public_key`, `stripe_secret_key`, `paypal_live_api_username`, `paypal_live_api_password`, `paypal_live_api_secret`, `payment_options`, `invoice_option`, `thermal_invoice_size`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 3, 0, 0, 1, NULL, NULL, 'admin', 'admin', NULL, 'cash,card,cheque,gift_card,deposit,paypal', 'thermal', '80', '2018-09-01 21:47:04', '2024-08-25 17:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `status` int(11) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `code` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `barcode_symbology` varchar(191) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `wholesale_price` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `alert_quantity` double DEFAULT NULL,
  `daily_sale_objective` double DEFAULT NULL,
  `promotion` tinyint(4) DEFAULT NULL,
  `promotion_price` varchar(191) DEFAULT NULL,
  `starting_date` varchar(200) DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `tax_method` int(11) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `is_embeded` tinyint(1) DEFAULT NULL,
  `is_variant` tinyint(1) DEFAULT NULL,
  `is_batch` tinyint(1) DEFAULT NULL,
  `is_diffPrice` tinyint(1) DEFAULT NULL,
  `is_imei` tinyint(1) DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `is_online` tinyint(4) DEFAULT NULL,
  `in_stock` tinyint(4) DEFAULT NULL,
  `track_inventory` tinyint(4) NOT NULL DEFAULT 0,
  `product_list` varchar(191) DEFAULT NULL,
  `variant_list` varchar(191) DEFAULT NULL,
  `qty_list` varchar(191) DEFAULT NULL,
  `price_list` varchar(191) DEFAULT NULL,
  `product_details` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `specification` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `related_products` longtext DEFAULT NULL,
  `variant_option` text DEFAULT NULL,
  `variant_value` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_sync_disable` tinyint(4) DEFAULT NULL,
  `woocommerce_product_id` int(11) DEFAULT NULL,
  `woocommerce_media_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `tags`, `code`, `type`, `barcode_symbology`, `brand_id`, `category_id`, `unit_id`, `purchase_unit_id`, `sale_unit_id`, `cost`, `price`, `wholesale_price`, `qty`, `alert_quantity`, `daily_sale_objective`, `promotion`, `promotion_price`, `starting_date`, `last_date`, `tax_id`, `tax_method`, `image`, `file`, `is_embeded`, `is_variant`, `is_batch`, `is_diffPrice`, `is_imei`, `featured`, `is_online`, `in_stock`, `track_inventory`, `product_list`, `variant_list`, `qty_list`, `price_list`, `product_details`, `short_description`, `specification`, `meta_title`, `meta_description`, `related_products`, `variant_option`, `variant_value`, `is_active`, `is_sync_disable`, `woocommerce_product_id`, `woocommerce_media_id`, `created_at`, `updated_at`) VALUES
(1, 'product1', 'product1', NULL, '60564900', 'standard', 'C128', 1, 6, 1, 1, 1, 1000, 1500, 1300, 46, NULL, NULL, NULL, NULL, '2025-01-10', NULL, NULL, 1, '202501100459471.png,202501100459472.png,202501100459473.png,202501100459474.png', NULL, 0, 1, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, '<p>sadasd</p>', NULL, NULL, NULL, NULL, '[]', '[\"size\"]', '[\"L,m\"]', 1, NULL, NULL, NULL, '2025-01-10 11:29:47', '2025-01-11 07:47:46'),
(2, 'produc12123', 'produc12123', NULL, '27851401', 'standard', 'C128', 1, 3, 1, 1, 1, 1000, 1500, 10000, -20, 23, 1000, NULL, NULL, NULL, NULL, NULL, 1, '202501110104531.PNG', NULL, 0, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '<p>asdfsdf</p>', NULL, NULL, NULL, NULL, '[]', NULL, NULL, 1, NULL, NULL, NULL, '2025-01-10 19:34:53', '2025-01-11 07:50:22'),
(3, 'admin', 'admin', NULL, '53612249', 'standard', 'C128', NULL, 1, 1, 1, 1, 10000, 1500, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2025-01-11 07:46:30', '2025-01-11 07:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_adjustments`
--

CREATE TABLE `product_adjustments` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `qty` double NOT NULL,
  `action` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_batches`
--

CREATE TABLE `product_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `batch_no` varchar(191) NOT NULL,
  `expired_date` date NOT NULL,
  `qty` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_productions`
--

CREATE TABLE `product_productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `production_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `recieved` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

CREATE TABLE `product_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `recieved` double NOT NULL,
  `return_qty` double NOT NULL DEFAULT 0,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_purchases`
--

INSERT INTO `product_purchases` (`id`, `purchase_id`, `product_id`, `product_batch_id`, `variant_id`, `imei_number`, `qty`, `recieved`, `return_qty`, `purchase_unit_id`, `net_unit_cost`, `discount`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, 10, 10, 0, 1, 1000, 0, 0, 0, 10000, '2025-01-10 11:32:35', '2025-01-10 11:32:35'),
(2, 2, 1, NULL, 3, NULL, 100, 100, 0, 1, 1000, 0, 0, 0, 100000, '2025-01-10 19:31:51', '2025-01-10 19:31:51'),
(3, 3, 3, NULL, NULL, NULL, 10, 10, 0, 1, 10000, 0, 0, 0, 100000, '2025-01-11 07:49:07', '2025-01-11 07:49:07'),
(4, 4, 3, NULL, NULL, NULL, 1, 1, 0, 1, 10000, 0, 0, 0, 10000, '2025-01-11 07:50:44', '2025-01-11 07:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_quotation`
--

CREATE TABLE `product_quotation` (
  `id` int(10) UNSIGNED NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_returns`
--

CREATE TABLE `product_returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `return_qty` double NOT NULL DEFAULT 0,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_delivered` tinyint(1) DEFAULT NULL,
  `is_packing` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`id`, `sale_id`, `product_id`, `product_batch_id`, `variant_id`, `imei_number`, `qty`, `return_qty`, `sale_unit_id`, `net_unit_price`, `discount`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`, `is_delivered`, `is_packing`) VALUES
(1, 1, 1, NULL, 3, NULL, 2, 0, 1, 1500, 0, 0, 0, 3000, '2025-01-10 19:22:52', '2025-01-10 19:28:53', 1, 1),
(2, 1, 1, NULL, 4, NULL, 60, 0, 1, 1500, 0, 0, 0, 90000, '2025-01-10 19:22:52', '2025-01-10 19:24:30', NULL, 1),
(3, 2, 1, NULL, 3, 'null', 1, 0, 1, 1500, 0, 0, 0, 1500, '2025-01-10 19:35:46', '2025-01-10 19:35:46', NULL, NULL),
(4, 2, 2, NULL, NULL, 'null', 10, 0, 1, 1500, 0, 0, 0, 15000, '2025-01-10 19:35:46', '2025-01-10 19:35:46', NULL, NULL),
(5, 3, 1, NULL, 3, 'null', 1, 0, 1, 1500, 0, 0, 0, 1500, '2025-01-10 19:38:41', '2025-01-10 19:38:41', NULL, NULL),
(6, 3, 2, NULL, NULL, 'null', 10, 0, 1, 1500, 0, 0, 0, 15000, '2025-01-10 19:38:41', '2025-01-10 19:38:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_transfer`
--

CREATE TABLE `product_transfer` (
  `id` int(10) UNSIGNED NOT NULL,
  `transfer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `item_code` varchar(191) NOT NULL,
  `additional_cost` double DEFAULT NULL,
  `additional_price` double DEFAULT NULL,
  `qty` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `variant_id`, `position`, `item_code`, `additional_cost`, `additional_price`, `qty`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 1, 'L-60564900', NULL, NULL, 96, '2025-01-10 11:54:03', '2025-01-10 19:38:41'),
(4, 1, 4, 2, 'm-60564900', NULL, NULL, -60, '2025-01-10 11:54:03', '2025-01-10 19:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_warehouse`
--

CREATE TABLE `product_warehouse` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(191) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_warehouse`
--

INSERT INTO `product_warehouse` (`id`, `product_id`, `product_batch_id`, `variant_id`, `imei_number`, `warehouse_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 1, NULL, 1, 10, NULL, '2025-01-10 11:29:47', '2025-01-10 11:32:35'),
(2, '1', NULL, 2, NULL, 1, 0, NULL, '2025-01-10 11:29:47', '2025-01-10 11:29:47'),
(3, '1', NULL, 1, NULL, 2, 0, NULL, '2025-01-10 11:29:47', '2025-01-10 11:29:47'),
(4, '1', NULL, 2, NULL, 2, 0, NULL, '2025-01-10 11:29:47', '2025-01-10 11:29:47'),
(5, '1', NULL, 3, NULL, 1, 98, 1500, '2025-01-10 19:31:51', '2025-01-10 19:38:41'),
(6, '2', NULL, NULL, NULL, 1, -20, NULL, '2025-01-10 19:34:53', '2025-01-10 19:38:41'),
(7, '2', NULL, NULL, NULL, 2, 0, NULL, '2025-01-10 19:34:53', '2025-01-10 19:34:53'),
(8, '3', NULL, NULL, NULL, 1, 11, NULL, '2025-01-11 07:46:30', '2025-01-11 07:50:44'),
(9, '3', NULL, NULL, NULL, 2, 0, NULL, '2025-01-11 07:46:30', '2025-01-11 07:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `exchange_rate` double DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `user_id`, `warehouse_id`, `supplier_id`, `currency_id`, `exchange_rate`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_cost`, `order_tax_rate`, `order_tax`, `order_discount`, `shipping_cost`, `grand_total`, `paid_amount`, `status`, `payment_status`, `document`, `note`, `created_at`, `updated_at`) VALUES
(1, '21313', 1, 1, 1, 1, 1, 1, 10, 0, 0, 10000, 0, 0, 0, 0, 10000, 0, 1, 1, NULL, NULL, '2025-01-16 18:30:00', '2025-01-10 11:32:35'),
(2, 'dfvfd', 1, 1, 1, 1, 1, 1, 100, 0, 0, 100000, 0, 0, 0, 0, 100000, 100000, 1, 2, NULL, NULL, '2025-01-10 18:30:00', '2025-01-10 19:32:16'),
(3, 'pr-20250111-011907', 1, 1, NULL, 1, 1, 1, 10, 0, 0, 100000, 0, 0, 0, 0, 100000, 0, 1, 1, NULL, NULL, '2025-01-11 07:49:07', '2025-01-11 07:49:07'),
(4, 'pr-20250111-012044', 1, 1, 1, 1, 1, 1, 1, 0, 0, 10000, 0, 0, 0, 0, 10000, 0, 1, 1, NULL, NULL, '2025-01-09 18:30:00', '2025-01-11 07:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_return`
--

CREATE TABLE `purchase_product_return` (
  `id` int(10) UNSIGNED NOT NULL,
  `return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `quotation_status` int(11) NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `exchange_rate` double DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `return_note` text DEFAULT NULL,
  `staff_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_purchases`
--

CREATE TABLE `return_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `exchange_rate` double DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `return_note` text DEFAULT NULL,
  `staff_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reward_point_settings`
--

CREATE TABLE `reward_point_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `per_point_amount` double NOT NULL,
  `minimum_amount` double NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reward_point_settings`
--

INSERT INTO `reward_point_settings` (`id`, `per_point_amount`, `minimum_amount`, `duration`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 300, 1000, 1, 'Year', 1, '2021-06-08 10:10:15', '2021-06-26 23:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `guard_name` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `guard_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin can access all data...', 'web', 1, '2018-06-01 18:16:44', '2018-06-02 17:43:05'),
(2, 'Owner', 'Staff of shop', 'web', 1, '2018-10-21 21:08:13', '2022-02-01 07:43:30'),
(4, 'staff', 'staff has specific acess...', 'web', 1, '2018-06-01 18:35:27', '2022-02-01 07:43:04'),
(5, 'Customer', NULL, 'web', 1, '2020-11-05 01:13:16', '2020-11-14 18:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(7, 2),
(7, 4),
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(9, 2),
(9, 4),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(12, 4),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(20, 4),
(21, 1),
(21, 2),
(21, 4),
(22, 1),
(22, 2),
(22, 4),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(24, 4),
(25, 1),
(25, 2),
(25, 4),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(28, 4),
(29, 1),
(29, 2),
(29, 4),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(55, 4),
(56, 1),
(56, 2),
(56, 4),
(57, 1),
(57, 2),
(57, 4),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(63, 4),
(64, 1),
(64, 2),
(64, 4),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(86, 1),
(86, 2),
(87, 1),
(87, 2),
(88, 1),
(88, 2),
(89, 1),
(89, 2),
(89, 4),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(92, 2),
(93, 1),
(93, 2),
(94, 1),
(94, 2),
(95, 1),
(95, 2),
(96, 1),
(96, 2),
(97, 1),
(97, 2),
(98, 1),
(98, 2),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(105, 1),
(105, 2),
(106, 1),
(106, 4),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `queue` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `grand_total` double NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `exchange_rate` double DEFAULT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount_type` varchar(191) DEFAULT NULL,
  `order_discount_value` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `sale_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `billing_name` varchar(255) DEFAULT NULL,
  `billing_phone` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `billing_zip` varchar(255) DEFAULT NULL,
  `shipping_name` varchar(255) DEFAULT NULL,
  `shipping_phone` varchar(255) DEFAULT NULL,
  `shipping_email` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_country` varchar(255) DEFAULT NULL,
  `shipping_zip` varchar(255) DEFAULT NULL,
  `sale_type` varchar(255) DEFAULT 'pos',
  `payment_mode` varchar(255) DEFAULT NULL,
  `sale_note` text DEFAULT NULL,
  `staff_note` text DEFAULT NULL,
  `woocommerce_order_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `reference_no`, `user_id`, `cash_register_id`, `table_id`, `queue`, `customer_id`, `warehouse_id`, `biller_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_price`, `grand_total`, `currency_id`, `exchange_rate`, `order_tax_rate`, `order_tax`, `order_discount_type`, `order_discount_value`, `order_discount`, `coupon_id`, `coupon_discount`, `shipping_cost`, `sale_status`, `payment_status`, `document`, `paid_amount`, `billing_name`, `billing_phone`, `billing_email`, `billing_address`, `billing_city`, `billing_state`, `billing_country`, `billing_zip`, `shipping_name`, `shipping_phone`, `shipping_email`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_zip`, `sale_type`, `payment_mode`, `sale_note`, `staff_note`, `woocommerce_order_id`, `created_at`, `updated_at`) VALUES
(1, '67816c83e75ef', 1, NULL, NULL, NULL, 1, 1, 1, 2, 62, 0, 0, 93000, 93000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 4, NULL, 93000, 'sadeesha kaushalya', '0717467162', 'pmsck@gmail.com', 'No. 144, thorayaya, kurunegala,srilanka', 'Kurunegala', '', 'LK', '60000', 'sadeesha kaushalya', '0717467162', 'pmsck@gmail.com', 'No. 144, thorayaya, kurunegala,srilanka', 'Kurunegala', '', 'LK', '60000', 'online', NULL, '', NULL, NULL, '2025-01-10 19:22:52', '2025-01-10 19:28:53'),
(2, 'sr-20250111-010546', 1, 1, NULL, NULL, 1, 1, 1, 2, 11, 0, 0, 16500, 16500, 1, 1, 0, 0, 'Flat', NULL, 0, NULL, NULL, 0, 1, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pos', NULL, NULL, NULL, NULL, '2025-01-09 19:35:46', '2025-01-10 19:35:46'),
(3, 'posr-20250111-010841', 1, 1, NULL, NULL, 1, 1, 1, 2, 11, 0, 0, 16500, 16500, 1, 1, 0, 0, 'Flat', NULL, 0, NULL, 0, 0, 1, 4, NULL, 16500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pos', NULL, 'asd', 'asd', NULL, '2025-01-10 19:38:41', '2025-01-10 19:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `link`, `image1`, `image2`, `image3`, `order`, `status`, `created_at`, `updated_at`) VALUES
(4, NULL, NULL, '202501101041480.jpg', NULL, NULL, 0, 1, '2025-01-10 17:11:48', '2025-01-10 17:11:48'),
(5, NULL, NULL, '202501101042040.jpg', NULL, NULL, 0, 1, '2025-01-10 17:12:04', '2025-01-10 17:12:04'),
(6, NULL, NULL, '202501101042130.jpg', NULL, NULL, 0, 1, '2025-01-10 17:12:13', '2025-01-10 17:12:13'),
(7, NULL, NULL, '202501101042270.jpg', NULL, NULL, 0, 1, '2025-01-10 17:12:27', '2025-01-10 17:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `sms_templates`
--

CREATE TABLE `sms_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `is_default_ecommerce` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_counts`
--

CREATE TABLE `stock_counts` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `category_id` varchar(191) DEFAULT NULL,
  `brand_id` varchar(191) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(191) NOT NULL,
  `initial_file` varchar(191) DEFAULT NULL,
  `final_file` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `is_adjusted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_counts`
--

INSERT INTO `stock_counts` (`id`, `reference_no`, `warehouse_id`, `category_id`, `brand_id`, `user_id`, `type`, `initial_file`, `final_file`, `note`, `is_adjusted`, `created_at`, `updated_at`) VALUES
(1, 'scr-20250110-050025', 1, NULL, NULL, 1, 'full', '20250110-050025.csv', NULL, NULL, 0, '2025-01-10 11:30:25', '2025-01-10 11:30:25'),
(2, 'scr-20250111-011833', 1, NULL, NULL, 1, 'full', '20250111-011833.csv', NULL, NULL, 0, '2025-01-11 07:48:33', '2025-01-11 07:48:33'),
(3, 'scr-20250111-011950', 1, NULL, NULL, 1, 'full', '20250111-011950.csv', NULL, NULL, 0, '2025-01-11 07:49:50', '2025-01-11 07:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `company_name` varchar(191) NOT NULL,
  `vat_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `image`, `company_name`, `vat_number`, `email`, `phone_number`, `address`, `city`, `state`, `postal_code`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'sadeesha kaushalya', NULL, 'abc', NULL, 'test2@gmail.com', '0717467162', 'No. 144, thorayaya, kurunegala,srilanka', 'Kurunegala', 'Paris', '60000', 'Sri Lanka', 1, '2025-01-10 11:17:14', '2025-01-10 11:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `number_of_person` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `rate` double NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `woocommerce_tax_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `rate`, `is_active`, `woocommerce_tax_id`, `created_at`, `updated_at`) VALUES
(1, '1%', 1, 1, NULL, '2025-01-10 10:59:33', '2025-01-10 10:59:33'),
(2, '5%', 5, 1, NULL, '2025-01-10 10:59:47', '2025-01-10 10:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `is_sent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_code` varchar(191) NOT NULL,
  `unit_name` varchar(191) NOT NULL,
  `base_unit` int(11) DEFAULT NULL,
  `operator` varchar(191) DEFAULT NULL,
  `operation_value` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `base_unit`, `operator`, `operation_value`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'pisces', 'pisces', NULL, '*', 1, 1, '2025-01-10 10:58:27', '2025-01-10 10:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone` varchar(191) NOT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `phone`, `company_name`, `role_id`, `biller_id`, `warehouse_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'pmsck@gmail.com', '$2y$10$D3NNYjFpxZ/7ve5fTVs.k.6cH5AfPyPC1JL7/G8NQoVcTPvt9nZoa', 'Am1O1oteWNEo1p6WMINAtmtgBu76fOYh8QyvigToxP0iWlTwZlz2V2vkknhP', '0717467162', 'Chu.lk', 1, NULL, NULL, 1, 0, '2018-06-01 21:54:15', '2025-01-10 11:00:27'),
(3, 'dhiman da', 'dhiman@gmail.com', '$2y$10$Fef6vu5E67nm11hX7V5a2u1ThNCQ6n9DRCvRF9TD7stk.Pmt2R6O.', '5ehQM6JIfiQfROgTbB5let0Z93vjLHS7rd9QD5RPNgOxli3xdo7fykU7vtTt', '212', 'lioncoders', 1, NULL, NULL, 0, 1, '2018-06-13 16:30:31', '2020-11-05 01:36:51'),
(6, 'test', 'test@gmail.com', '$2y$10$TDAeHcVqHyCmurki0wjLZeIl1SngKX3WLOhyTiCoZG3souQfqv.LS', 'KpW1gYYlOFacumklO2IcRfSsbC3KcWUZzOI37gqoqM388Xie6KdhaOHIFEYm', '1234', '212312', 4, NULL, NULL, 0, 1, '2018-06-22 21:35:33', '2018-06-22 21:43:45'),
(8, 'test', 'test@yahoo.com', '$2y$10$hlMigidZV0j2/IPkgE/xsOSb8WM2IRlsMv.1hg1NM7kfyd6bGX3hC', NULL, '31231', NULL, 4, NULL, NULL, 0, 1, '2018-06-24 17:05:49', '2018-07-01 19:37:39'),
(9, 'staff', 'anda@gmail.com', '$2y$10$kxDbnynB6mB1e1w3pmtbSOlSxy/WwbLPY5TJpMi0Opao5ezfuQjQm', 'EOBWOQLzRNZHj4Qo59mIDEW4z1qk7Bewt7tgTwGSnMaGlez2Xt47zb6ReIb1', '3123', NULL, 4, 5, 1, 1, 0, '2018-07-01 19:38:08', '2018-10-23 16:11:13'),
(10, 'abul', 'abul@alpha.com', '$2y$10$5zgB2OOMyNBNVAd.QOQIju5a9fhNnTqPx5H6s4oFlXhNiF6kXEsPq', 'x7HlttI5bM0vSKViqATaowHFJkLS3PHwfvl7iJdFl5Z1SsyUgWCVbLSgAoi0', '1234', 'anda', 1, NULL, NULL, 0, 0, '2018-09-07 18:14:48', '2018-09-07 18:14:48'),
(11, 'teststaff', 'a@a.com', '$2y$10$5KNBIIhZzvvZEQEhkHaZGu.Q8bbQNfqYvYgL5N55B8Pb4P5P/b/Li', 'DkHDEcCA0QLfsKPkUK0ckL0CPM6dPiJytNa0k952gyTbeAyMthW3vi7IRitp', '111', 'aa', 4, 5, 1, 0, 1, '2018-10-21 21:17:56', '2018-10-22 20:40:56'),
(12, 'john', 'john@gmail.com', '$2y$10$P/pN2J/uyTYNzQy2kRqWwuSv7P2f6GE/ykBwtHdda7yci3XsfOKWe', 'O0f1WJBVjT5eKYl3Js5l1ixMMtoU6kqrH7hbHDx9I1UCcD9CmiSmCBzHbQZg', '10001', NULL, 4, 2, 2, 0, 1, '2018-12-29 19:18:37', '2019-03-05 23:29:49'),
(13, 'jjj', 'test@test.com', '$2y$10$/Qx3gHWYWUhlF1aPfzXaCeZA7fRzfSEyCIOnk/dcC4ejO8PsoaalG', NULL, '1213', NULL, 1, NULL, NULL, 0, 1, '2019-01-02 18:38:31', '2019-03-02 22:32:29'),
(19, 'shakalaka', 'shakalaka@gmail.com', '$2y$10$ketLWT0Ib/JXpo00eJlxoeSw.7leS8V1CUGInfbyOWT4F5.Xuo7S2', NULL, '1212', 'Digital image', 5, NULL, NULL, 1, 0, '2020-11-08 18:37:16', '2020-11-08 18:37:16'),
(21, 'modon', 'modon@gmail.com', '$2y$10$7VpoeGMkP8QCvL5zLwFW..6MYJ5MRumDLDoX.TTQtClS561rpFHY.', NULL, '2222', 'modon company', 5, NULL, NULL, 1, 0, '2020-11-13 01:42:08', '2020-11-13 01:42:08'),
(22, 'dhiman', 'dhiman@gmail.com', '$2y$10$3mPygsC6wwnDtw/Sg85IpuExtUhgaHx52Lwp7Rz0.FNfuFdfKVpRq', NULL, '+8801111111101', 'lioncoders', 5, NULL, NULL, 1, 0, '2020-11-15 00:44:58', '2020-11-15 00:44:58'),
(31, 'mbs', 'mbs@gmail.com', '$2y$10$6Ldm1rWEVSrlTmpjIXkeQO9KwWJz/j0FB4U.fY1oCFeax47rvttEK', NULL, '2121', NULL, 4, 1, 2, 0, 0, '2021-12-29 01:10:22', '2021-12-29 01:10:22'),
(39, 'maja', 'maja@maja.com', '$2y$10$lrMVhNDE9AuKhFrJIgG2y.zdtrCltR8/JB1okO0W8GsUcMjSFW7rW', NULL, '444555', NULL, 4, 5, 2, 1, 0, '2022-09-13 23:07:21', '2022-09-13 23:07:21'),
(42, 'Tarik Iqbal', 'tarik_17@yahoo.co.uk', '$2y$10$z2nZAsrIPrSWgPEtTY9D6.1vmkvYj4p3W3kamYvdoCDnCtlVqZp86', NULL, '', NULL, 5, NULL, NULL, 1, 0, '2023-11-16 23:34:37', '2023-11-28 09:40:11'),
(43, 'support@lion-coders.com', 'support@lion-coders.com', '$2y$10$ea.ekPLTQk0Y5087FqSbdevaN.gkEMGucgFJ13aGPEd.EqY45Y.AK', NULL, '', NULL, 5, NULL, NULL, 1, 0, '2023-12-09 08:45:06', '2023-12-09 08:45:50'),
(44, 'james', 'jamesbond@gmail.com', '$2y$10$7XCviP5GAZm6E/nlk4HQmuyw2kbhVpLbxsN6PqmNubmUKpiseGiEy', NULL, '313131', 'MI6', 5, NULL, NULL, 1, 0, '2024-01-19 07:53:28', '2024-01-19 07:53:28'),
(46, 'bkk', 'bkk@bkk.com', '$2y$10$6FBCW.gf7tOH6ygDYLUcSeVkur1VL.iBSvGor35AxO849fJLxxZoW', NULL, '87897', NULL, 5, NULL, NULL, 1, 0, '2024-06-10 05:10:15', '2024-06-10 05:10:15'),
(47, 'pmsckaushalya@gmail.com', 'pmsckaushalya@gmail.com', '$2y$10$X8qtg92dfjVM4BgQBqExZ.b/aarVkb/hHASMCUpJh9dpdVMuXtfNa', NULL, '0717467162', 'no name', 5, NULL, NULL, 0, 0, '2025-01-10 09:54:34', '2025-01-10 09:54:34'),
(48, 'A.A.Kaumadi Harindra Adhikari', 'kaumadhiharindra@gmail.com', '$2y$10$4yb12ndJ3Lh8Go26vrP83.295jXBOlJLk8k8ZnQCAX0aK8hU5PKhG', NULL, '', NULL, 5, NULL, NULL, 0, 0, '2025-01-10 19:46:52', '2025-01-10 19:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'L/', '2025-01-10 11:29:47', '2025-01-10 11:29:47'),
(2, 'm/', '2025-01-10 11:29:47', '2025-01-10 11:29:47'),
(3, 'L', '2025-01-10 11:54:03', '2025-01-10 11:54:03'),
(4, 'm', '2025-01-10 11:54:03', '2025-01-10 11:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `phone`, `email`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Kurunegala', '0717467162', 'pmsckaushalya@gmail.com', 'No. 144, thorayaya, kurunegala,srilanka\r\nThoraya Kiriwaula', 1, '2025-01-10 11:05:14', '2025-01-10 11:05:14'),
(2, 'Colombo', '0717467161', 'pmsck@gmail.com', 'No. 10, colombo', 1, '2025-01-10 11:05:37', '2025-01-10 11:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `feature_title` varchar(255) DEFAULT NULL,
  `feature_secondary_title` varchar(255) DEFAULT NULL,
  `feature_icon` varchar(255) DEFAULT NULL,
  `site_info_name` varchar(255) DEFAULT NULL,
  `site_info_description` varchar(255) DEFAULT NULL,
  `site_info_address` varchar(255) DEFAULT NULL,
  `site_info_phone` varchar(255) DEFAULT NULL,
  `site_info_email` varchar(255) DEFAULT NULL,
  `site_info_hours` varchar(255) DEFAULT NULL,
  `newsletter_title` varchar(255) DEFAULT NULL,
  `newsletter_text` varchar(255) DEFAULT NULL,
  `quick_links_title` varchar(255) DEFAULT NULL,
  `quick_links_menu` varchar(255) DEFAULT NULL,
  `text_title` varchar(255) DEFAULT NULL,
  `text_content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `location`, `order`, `feature_title`, `feature_secondary_title`, `feature_icon`, `site_info_name`, `site_info_description`, `site_info_address`, `site_info_phone`, `site_info_email`, `site_info_hours`, `newsletter_title`, `newsletter_text`, `quick_links_title`, `quick_links_menu`, `text_title`, `text_content`, `created_at`, `updated_at`) VALUES
(1, 'text-widget', 'footer_top', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-10 13:02:36', '2025-01-10 13:02:36'),
(2, 'site-info-widget', 'footer_top', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-10 13:02:40', '2025-01-10 13:02:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjustments`
--
ALTER TABLE `adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billers`
--
ALTER TABLE `billers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_registers`
--
ALTER TABLE `cash_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challans`
--
ALTER TABLE `challans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_plans`
--
ALTER TABLE `discount_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_plan_customers`
--
ALTER TABLE `discount_plan_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_plan_discounts`
--
ALTER TABLE `discount_plan_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dso_alerts`
--
ALTER TABLE `dso_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecommerce_settings`
--
ALTER TABLE `ecommerce_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `external_services`
--
ALTER TABLE `external_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_card_recharges`
--
ALTER TABLE `gift_card_recharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrm_settings`
--
ALTER TABLE `hrm_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_transfers`
--
ALTER TABLE `money_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `packing_slips`
--
ALTER TABLE `packing_slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packing_slip_products`
--
ALTER TABLE `packing_slip_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_widgets`
--
ALTER TABLE `page_widgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_cheque`
--
ALTER TABLE `payment_with_cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_credit_card`
--
ALTER TABLE `payment_with_credit_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_gift_card`
--
ALTER TABLE `payment_with_gift_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_paypal`
--
ALTER TABLE `payment_with_paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_setting`
--
ALTER TABLE `pos_setting`
  ADD UNIQUE KEY `pos_setting_id_unique` (`id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_adjustments`
--
ALTER TABLE `product_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_batches`
--
ALTER TABLE `product_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_productions`
--
ALTER TABLE `product_productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_quotation`
--
ALTER TABLE `product_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_returns`
--
ALTER TABLE `product_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_transfer`
--
ALTER TABLE `product_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_warehouse`
--
ALTER TABLE `product_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_product_return`
--
ALTER TABLE `purchase_product_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_purchases`
--
ALTER TABLE `return_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_point_settings`
--
ALTER TABLE `reward_point_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_templates`
--
ALTER TABLE `sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_counts`
--
ALTER TABLE `stock_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
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
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adjustments`
--
ALTER TABLE `adjustments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barcodes`
--
ALTER TABLE `barcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billers`
--
ALTER TABLE `billers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cash_registers`
--
ALTER TABLE `cash_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `challans`
--
ALTER TABLE `challans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_plans`
--
ALTER TABLE `discount_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_plan_customers`
--
ALTER TABLE `discount_plan_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_plan_discounts`
--
ALTER TABLE `discount_plan_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dso_alerts`
--
ALTER TABLE `dso_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecommerce_settings`
--
ALTER TABLE `ecommerce_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `external_services`
--
ALTER TABLE `external_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gift_cards`
--
ALTER TABLE `gift_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gift_card_recharges`
--
ALTER TABLE `gift_card_recharges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hrm_settings`
--
ALTER TABLE `hrm_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `money_transfers`
--
ALTER TABLE `money_transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packing_slips`
--
ALTER TABLE `packing_slips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packing_slip_products`
--
ALTER TABLE `packing_slip_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_widgets`
--
ALTER TABLE `page_widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_with_cheque`
--
ALTER TABLE `payment_with_cheque`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_with_credit_card`
--
ALTER TABLE `payment_with_credit_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_with_gift_card`
--
ALTER TABLE `payment_with_gift_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_with_paypal`
--
ALTER TABLE `payment_with_paypal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `pos_setting`
--
ALTER TABLE `pos_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_adjustments`
--
ALTER TABLE `product_adjustments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_batches`
--
ALTER TABLE `product_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_productions`
--
ALTER TABLE `product_productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_quotation`
--
ALTER TABLE `product_quotation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_returns`
--
ALTER TABLE `product_returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_transfer`
--
ALTER TABLE `product_transfer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_warehouse`
--
ALTER TABLE `product_warehouse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_product_return`
--
ALTER TABLE `purchase_product_return`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_purchases`
--
ALTER TABLE `return_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reward_point_settings`
--
ALTER TABLE `reward_point_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sms_templates`
--
ALTER TABLE `sms_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_counts`
--
ALTER TABLE `stock_counts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
