-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2016 at 11:03 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `accbanks`
--

CREATE TABLE `accbanks` (
  `accbank_id` int(11) NOT NULL,
  `coa_code` varchar(25) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `reknumber` varchar(150) NOT NULL,
  `currency` varchar(15) NOT NULL,
  `accbanks_desc` varchar(25) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_At` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accbanks`
--

INSERT INTO `accbanks` (`accbank_id`, `coa_code`, `bank_id`, `owner_id`, `reknumber`, `currency`, `accbanks_desc`, `users_id`, `created_At`, `updated_at`) VALUES
(1, '11.02.06', 2, 2, '1340001116400', 'SAR', 'MANDIRI LOS', 1, '2016-09-14 08:25:56', '2016-09-28 17:45:57'),
(15, '11.02.10', 3, 1, '1000607701', 'USD', 'BCI PT CJFI (RP)', 1, '2016-09-15 01:47:39', '2016-09-27 20:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `accname`
--

CREATE TABLE `accname` (
  `accname_id` int(11) NOT NULL,
  `accname_name` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_date` date NOT NULL,
  `accbank_id` int(35) NOT NULL,
  `account_total` varchar(15) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_date`, `accbank_id`, `account_total`, `users_id`, `created_at`, `updated_at`) VALUES
(60, '2016-09-02', 1, '323000', 1, '2016-09-25 20:28:36', '2016-10-10 17:50:28'),
(61, '2016-09-03', 15, '232340', 1, '2016-09-25 20:37:02', '2016-09-26 21:25:32'),
(62, '2016-09-03', 15, '23434', 1, '2016-09-25 20:38:48', '2016-09-25 20:38:48'),
(63, '2016-09-05', 15, '560000', 1, '2016-09-25 23:33:16', '2016-09-25 23:33:16'),
(64, '2016-09-09', 15, '250000', 1, '2016-09-25 23:36:58', '2016-09-25 23:36:58'),
(65, '2016-09-01', 1, '2434', 1, '2016-09-26 00:09:21', '2016-09-26 00:09:21'),
(66, '2016-09-17', 15, '23300', 1, '2016-09-26 01:05:55', '2016-09-26 01:05:55'),
(67, '2016-09-02', 1, '423423', 1, '2016-09-27 01:12:09', '2016-09-26 18:12:09'),
(68, '2016-09-01', 15, '15000000', 1, '2016-09-27 19:36:42', '2016-09-27 19:36:42'),
(69, '2016-09-01', 15, '43423', 1, '2016-09-28 21:33:45', '2016-09-28 21:33:45'),
(70, '2016-09-23', 15, '900000', 1, '2016-09-29 00:34:36', '2016-09-29 00:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mandiri', 1, '2016-09-13 23:36:54', '2016-09-15 20:06:25'),
(2, 'BCA', 1, '2016-09-13 23:38:19', '2016-09-13 23:38:19'),
(3, 'CTBC', 1, '2016-09-13 23:39:17', '2016-09-13 23:39:17'),
(4, 'CTBC TAIWAN', 1, '2016-09-13 23:39:27', '2016-09-13 23:39:35'),
(5, 'UOB', 1, '2016-09-13 23:40:36', '2016-09-13 23:40:36'),
(7, '342', 0, '2016-09-15 20:19:45', '2016-09-15 20:19:45'),
(8, 'OCBC', 1, '2016-09-20 00:36:24', '2016-09-20 00:36:24'),
(9, '34234', 2, '2016-09-26 18:55:08', '2016-09-26 18:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`category_id`, `category_name`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'USD', 1, '2016-09-19 02:21:02', '2016-09-18 19:37:41'),
(2, 'EXPORT', 1, '2016-09-19 02:21:02', '0000-00-00 00:00:00'),
(3, 'INTEREST', 1, '2016-09-19 02:21:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL,
  `destination_name` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'UKSM', 1, '2016-09-19 02:17:43', '0000-00-00 00:00:00'),
(2, 'AGEN', 1, '2016-09-19 02:17:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `detaccounts`
--

CREATE TABLE `detaccounts` (
  `detaccount_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `detaccount_name` varchar(45) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `detaccount_tr` varchar(25) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `debit` varchar(15) NOT NULL,
  `credit` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detaccounts`
--

INSERT INTO `detaccounts` (`detaccount_id`, `account_id`, `detaccount_name`, `category_id`, `item_id`, `detaccount_tr`, `destination_id`, `debit`, `credit`, `created_at`, `updated_at`) VALUES
(92, 60, 'kayu', 2, 2, '34234', 2, '34234', '0', '2016-09-26 08:12:27', '2016-09-25 20:28:53'),
(93, 60, '3334', 1, 2, '42', 2, '0', '34234', '2016-09-25 20:29:02', '2016-09-25 20:29:02'),
(95, 62, '3423', 1, 1, '43423', 1, '343423', '0', '2016-09-25 20:38:55', '2016-09-25 20:38:55'),
(97, 63, '12121', 2, 2, '454545', 2, '250000', '0', '2016-09-25 23:33:31', '2016-09-25 23:33:31'),
(98, 63, '32321', 1, 3, '312', 1, '0', '25000', '2016-09-25 23:33:45', '2016-09-25 23:33:45'),
(99, 64, '4234', 2, 1, '43', 2, '3434', '0', '2016-09-25 23:37:09', '2016-09-25 23:37:09'),
(100, 64, '34234', 2, 1, '4234', 2, '33344', '0', '2016-09-25 23:37:15', '2016-09-25 23:37:15'),
(101, 64, '342', 2, 1, '343', 2, '0', '454534', '2016-09-25 23:37:28', '2016-09-25 23:37:28'),
(102, 61, '2312', 1, 1, '3434', 1, '343423', '0', '2016-09-26 02:30:32', '2016-09-26 02:30:32'),
(103, 61, '343', 1, 1, '2433', 1, '343434', '0', '2016-09-26 02:30:39', '2016-09-26 02:30:39'),
(104, 61, '334', 2, 3, '343', 2, '0', '343', '2016-09-26 02:30:48', '2016-09-26 02:30:48'),
(105, 61, '2323', 2, 3, '232', 1, '23123', '0', '2016-09-26 02:31:29', '2016-09-26 02:31:29'),
(106, 62, 'ee', 1, 1, '423', 1, '343423', '0', '2016-09-26 04:16:28', '2016-09-26 04:16:28'),
(107, 67, 'Pembayaran agunan', 2, 5, '54000000', 2, '250000', '0', '2016-09-26 18:11:54', '2016-09-26 18:11:54'),
(108, 69, '34324', 2, 2, '343', 2, '0', '34233', '2016-09-28 21:33:59', '2016-09-28 21:33:59'),
(109, 69, '343242', 1, 3, '34324', 1, '3432423', '0', '2016-09-28 21:34:08', '2016-09-28 21:34:08'),
(110, 69, '3', 2, 2, '4234234', 2, '34234', '0', '2016-09-28 21:34:16', '2016-09-28 21:34:16'),
(111, 70, 'rewr', 1, 1, 'rewr', 2, '4343', '0', '2016-09-29 00:36:08', '2016-09-29 00:36:08'),
(112, 70, '423', 2, 2, '43432', 1, '0', '3432', '2016-09-29 00:36:22', '2016-09-29 00:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `item_desc` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_desc`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'FC', 'Foreign Currency', 1, '2016-09-19 01:51:15', '2016-09-19 01:54:23'),
(2, 'ADM', 'Administrasi', 1, '2016-09-19 01:51:15', '2016-09-19 01:54:32'),
(3, 'AR', 'Account Receivable', 1, '2016-09-19 01:52:57', '2016-09-19 01:54:43'),
(4, 'PB', 'Payment Bank', 1, '2016-09-19 01:52:57', '2016-09-18 20:12:53'),
(5, 'AP', 'Account Payable', 1, '2016-09-19 20:20:49', '2016-09-19 20:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_14_062106_create_posts_table', 2),
('2016_09_14_063347_create_banks_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `option_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'AR', 1, '2016-09-19 06:27:41', '0000-00-00 00:00:00'),
(2, 'AP', 1, '2016-09-19 06:27:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(55) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owner_id`, `owner_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'PT Chang Jui Fang Indonesia', 1, '2016-09-16 03:46:59', '2016-09-15 20:46:59'),
(2, 'Lin Chi Chen', 1, '2016-09-13 23:47:27', '2016-09-13 23:47:27'),
(3, 'Brisk International', 1, '2016-09-13 23:47:46', '2016-09-13 23:47:46'),
(4, 'Chang Jui Fang', 1, '2016-09-13 23:48:02', '2016-09-13 23:48:02'),
(5, 'Lien Chien Ping', 1, '2016-09-13 23:48:25', '2016-09-13 23:48:25'),
(6, 'Yah Chih Hua', 1, '2016-09-13 23:48:39', '2016-09-13 23:48:39'),
(7, 'PT Kien Chai Indonesia', 1, '2016-09-13 23:48:58', '2016-09-13 23:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `category` enum('kacrut','kodok','tes','232') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category`, `created_at`, `updated_at`) VALUES
(1, 'testing', 'sdasds', '', '2016-09-13 23:25:23', '2016-09-13 23:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'surya', 'surya.hndk@gmail.com', '$2y$10$FhxOCTaJjD83UK3oQyEJH.C9y1qDnAcK2LLkyRLjqvLSzhbUosGQi', 'RxrBDUu4YDragI8fOatFD4BbKT30Q5iTJuBSMivGRe0nOTOXkJqdmRxFG38B', '2016-09-13 23:27:14', '2016-10-01 21:17:43'),
(2, 'huimien', 'huimien@yahoo.com', '$2y$10$Ph2qE5f53fCXwlUJtO4nA.gXte9597Uqkl8SY85nDaEyM34BRqIcq', '3QKhqkgXKvMF2skjLREkZsdYHGEhqYnUiGL4aJQrzSm1OOaMLob6i1KJF2zZ', '2016-09-26 18:54:45', '2016-09-26 20:44:23'),
(3, 'admin', 'admin@yahoo.com', '$2y$10$PV1o9N23nYRpq72M6p0CmONC2PnQ/pG9Oxy76w.x/i8LT2AnzfNXK', NULL, '2016-09-27 18:30:39', '2016-09-27 18:30:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accbanks`
--
ALTER TABLE `accbanks`
  ADD PRIMARY KEY (`accbank_id`);

--
-- Indexes for table `accname`
--
ALTER TABLE `accname`
  ADD PRIMARY KEY (`accname_id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `detaccounts`
--
ALTER TABLE `detaccounts`
  ADD PRIMARY KEY (`detaccount_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `accbanks`
--
ALTER TABLE `accbanks`
  MODIFY `accbank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `accname`
--
ALTER TABLE `accname`
  MODIFY `accname_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detaccounts`
--
ALTER TABLE `detaccounts`
  MODIFY `detaccount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detaccounts`
--
ALTER TABLE `detaccounts`
  ADD CONSTRAINT `detaccounts_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
