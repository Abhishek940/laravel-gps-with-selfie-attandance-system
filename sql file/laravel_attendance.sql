-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 08:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mobile`, `email`, `password`, `address`, `created_at`, `updated_at`) VALUES
(1, 'admin', '7896541230', 'admin@gmail.com', '$2y$10$ox8kklm11WoFfUnvkUN56ODayw.Z7XzrolvQd52hmWHKq9GxPkQD6', 'address', '2020-10-27 05:36:34', '2020-10-27 05:36:34'),
(2, 'abhishek', '9563241078', 'akabhishek7485@gmail.com', '$2y$10$14hfqiD0Aw8MT5cTtSsFaOVGQiLNXfSOsengIZ4A8oXC1k3kWKMSS', 'address', '2020-10-27 05:36:34', '2020-10-27 05:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `attandancelocations`
--

CREATE TABLE `attandancelocations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `time_id` int(10) UNSIGNED NOT NULL,
  `location_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_out` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latlong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2020_02_20_000001_create_permissions_table', 1),
(8, '2020_02_20_000002_create_roles_table', 1),
(9, '2020_02_20_000003_create_users_table', 1),
(10, '2020_02_20_000004_create_time_entries_table', 1),
(11, '2020_02_20_000005_create_permission_role_pivot_table', 1),
(12, '2020_02_20_000006_create_role_user_pivot_table', 1),
(13, '2020_02_20_000007_add_relationship_fields_to_time_entries_table', 1),
(14, '2020_10_10_104717_create_admins_table', 1),
(15, '2020_10_19_163707_create_attandancelocations_table', 1),
(16, '2020_10_22_135740_create_time_entry_users_table', 1),
(17, '2020_10_27_154115_add_deleted_at_column_to_time_entry_users_table', 2),
(18, '2020_11_02_103050_add_image_to_time_entry_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$mB15tM1jLreBKxfUOvW9neT4SVfoPLB0G2d/UZQjvdq9ktI75b9La', '2020-10-28 08:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_entries`
--

CREATE TABLE `time_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_entries`
--

INSERT INTO `time_entries` (`id`, `user_id`, `time_start`, `time_end`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 4, '2020-10-27 14:54:25', NULL, '2020-10-27 09:24:25', '2020-10-27 10:02:20', '2020-10-27 10:02:20'),
(16, 2, '2020-10-27 14:56:54', NULL, '2020-10-27 09:26:54', '2020-10-27 09:28:10', '2020-10-27 09:28:10'),
(17, 2, '2020-10-27 15:08:02', '2020-10-27 15:08:05', '2020-10-27 09:38:02', '2020-10-27 09:39:29', '2020-10-27 09:39:29'),
(18, 2, '2020-10-27 15:31:15', NULL, '2020-10-27 10:01:15', '2020-10-27 10:02:43', '2020-10-27 10:02:43'),
(19, 4, '2020-10-27 15:34:37', NULL, '2020-10-27 10:04:37', '2020-10-27 10:05:44', '2020-10-27 10:05:44'),
(20, 4, '2020-10-27 15:48:51', NULL, '2020-10-27 10:18:51', '2020-10-27 10:19:47', '2020-10-27 10:19:47'),
(21, 4, '2020-10-27 15:51:05', '2020-10-27 16:06:31', '2020-10-27 10:21:05', '2020-10-27 10:37:10', '2020-10-27 10:37:10'),
(22, 2, '2020-10-27 15:51:35', '2020-10-27 15:53:41', '2020-10-27 10:21:35', '2020-10-27 10:27:21', '2020-10-27 10:27:21'),
(23, 2, '2020-10-27 15:55:41', '2020-10-27 15:57:48', '2020-10-27 10:25:41', '2020-10-27 10:28:15', '2020-10-27 10:28:15'),
(24, 2, '2020-10-27 15:59:06', '2020-10-27 15:59:40', '2020-10-27 10:29:06', '2020-10-27 10:37:35', '2020-10-27 10:37:35'),
(25, 4, '2020-10-27 16:07:47', '2020-10-27 16:19:40', '2020-10-27 10:37:47', '2020-10-28 04:36:21', '2020-10-28 04:36:21'),
(26, 4, '2020-10-27 16:20:02', '2020-10-27 17:20:31', '2020-10-27 10:50:02', '2020-10-28 04:36:42', '2020-10-28 04:36:42'),
(27, 4, '2020-10-27 17:24:16', '2020-10-27 17:24:29', '2020-10-27 11:54:16', '2020-11-01 19:18:11', '2020-11-01 19:18:11'),
(28, 2, '2020-10-28 10:04:55', '2020-10-28 11:16:26', '2020-10-28 04:34:55', '2020-11-01 19:16:14', '2020-11-01 19:16:14'),
(29, 2, '2020-10-28 11:16:27', '2020-10-28 11:16:28', '2020-10-28 05:46:27', '2020-11-01 19:18:56', '2020-11-01 19:18:56'),
(30, 2, '2020-10-28 11:16:28', '2020-10-28 11:17:05', '2020-10-28 05:46:28', '2020-11-01 19:18:59', '2020-11-01 19:18:59'),
(31, 4, '2020-11-01 23:37:01', '2020-11-01 11:12:39', '2020-11-02 07:37:01', '2020-11-01 19:19:02', '2020-11-01 19:19:02'),
(32, 4, '2020-11-01 11:13:05', '2020-11-01 11:13:42', '2020-11-01 19:13:05', '2020-11-01 19:13:42', NULL),
(33, 4, '2020-11-01 11:13:56', '2020-11-01 11:16:58', '2020-11-01 19:13:56', '2020-11-01 19:16:58', NULL),
(34, 4, '2020-11-02 09:46:58', '2020-11-02 14:00:38', '2020-11-02 04:16:58', '2020-11-02 08:30:38', NULL),
(35, 4, '2020-11-02 14:28:30', '2020-11-02 15:05:47', '2020-11-02 08:58:30', '2020-11-02 09:35:47', NULL),
(36, 4, '2020-11-02 15:11:06', '2020-11-02 15:49:53', '2020-11-02 09:41:06', '2020-11-02 10:19:53', NULL),
(37, 2, '2020-11-02 15:53:20', '2020-11-02 15:56:33', '2020-11-02 10:23:20', '2020-11-02 10:26:33', NULL),
(38, 5, '2020-11-02 16:10:14', '2020-11-02 16:34:09', '2020-11-02 10:40:14', '2020-11-02 11:04:09', NULL),
(39, 2, '2020-11-03 10:37:49', NULL, '2020-11-03 05:07:49', '2020-11-03 05:07:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `time_entry_users`
--

CREATE TABLE `time_entry_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `time_entry_id` int(10) UNSIGNED NOT NULL,
  `location_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_out` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latlong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_entry_users`
--

INSERT INTO `time_entry_users` (`id`, `user_id`, `time_entry_id`, `location_in`, `location_out`, `latlong`, `created_at`, `updated_at`, `deleted_at`, `image`) VALUES
(53, 4, 32, 'rajendra sarovar, Chhapra, Bihar 801303, India', 'Bihar', '25.0960742,85.31311939999999', '2020-11-02 09:41:15', '2020-11-02 09:41:15', NULL, 'uploads/5f9fd43b7292f.png'),
(54, 4, 32, 'rajendra sarovar, Chhapra, Bihar 801303, India', 'Bihar', '25.0960742,85.31311939999999', '2020-11-02 09:42:39', '2020-11-02 09:42:39', NULL, 'uploads/5f9fd48f67b50.png'),
(55, 4, 32, 'rajendra sarovar, Chhapra, Bihar 801303, India', 'Bihar', '25.0960742,85.31311939999999', '2020-11-02 10:19:58', '2020-11-02 10:19:58', NULL, 'uploads/5f9fdd4e9dcc6.png'),
(56, 2, 37, 'rajendra sarovar, Chhapra, Bihar 801303, India', 'Bihar', '25.0960742,85.31311939999999', '2020-11-02 10:23:26', '2020-11-02 10:23:26', NULL, 'uploads/5f9fde1e0c6ac.png'),
(57, 2, 37, 'rajendra sarovar, Chhapra, Bihar 801303, India', 'Bihar', '25.0960742,85.31311939999999', '2020-11-02 10:26:39', '2020-11-02 10:26:39', NULL, 'uploads/5f9fdedf6bd50.png'),
(58, 5, 38, 'rajendra sarovar, Chhapra, Bihar 801303, India', 'Bihar', '25.0960742,85.31311939999999', '2020-11-02 10:40:44', '2020-11-02 10:40:44', NULL, 'uploads/5f9fe22c322e1.png'),
(59, 5, 38, 'rajendra sarovar, Chhapra, Bihar 801303, India', 'Bihar', '25.0960742,85.31311939999999', '2020-11-02 11:04:15', '2020-11-02 11:04:15', NULL, 'uploads/5f9fe7af057dd.png'),
(60, 2, 37, 'rajendra sarovar, Chhapra, Bihar 801303, India', 'Bihar', '25.0960742,85.31311939999999', '2020-11-03 05:08:00', '2020-11-03 05:08:00', NULL, 'uploads/5fa0e5b0232fb.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `address`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rahul Kumar', '7896541256', 'rahul@gmail.com', NULL, '$2y$10$u2riJWYikbpkScCxrAfI2.BBE7sKbz8Dw8Q.dWfnJ7ZdrgSQdPp3q', 'patna', NULL, '2020-10-27 05:38:10', '2020-10-27 05:56:22', '2020-10-27 05:56:22'),
(2, 'Abhishek Kumar', '9865471235', 'akabhishek7485@gmail.com', NULL, '$2y$10$GY4JQiB2e63SoFVwSpbGI.owkT.LN8iIurMqaE21CuF7lqlhcjT5i', 'patna', '6w6O2zOmqOstRT8XgndKh6ClpiFXZo6R3SdmjRh8XSErH5g3I7MxGAY3GN2h', '2020-10-27 05:38:52', '2020-11-01 19:31:40', NULL),
(3, 'Ritesh Kumar', '7896541230', 'ritesh@gmail.com', NULL, '$2y$10$TEFkwQbNB5Yp6OyFh2kije6B755xLtP.ydA21dUmjJvfO9r892.2q', 'Bihar', NULL, '2020-10-27 05:39:29', '2020-10-27 05:50:42', '2020-10-27 05:50:42'),
(4, 'Rohit Kumar', '8569741230', 'rohit@gmail.com', NULL, '$2y$10$e8M65AvefbLzafg9l6TLw.vVLY.rF3AdILwCEfPDeb1IIJVnGKMLe', 'patna', NULL, '2020-10-27 05:44:02', '2020-10-27 05:55:50', NULL),
(5, 'Aman Kumar', '8596321470', 'aman@gmail.com', NULL, '$2y$10$F7/2ezLLMHVwzywAe0RP7uXIvEuoYzbVT1Yl4CFbwwraOq5/Kgl0G', 'Bihar', NULL, '2020-11-02 10:39:07', '2020-11-02 10:39:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attandancelocations`
--
ALTER TABLE `attandancelocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attandancelocations_user_id_foreign` (`user_id`),
  ADD KEY `attandancelocations_time_id_foreign` (`time_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
  ADD KEY `role_id_fk_1028284` (`role_id`),
  ADD KEY `permission_id_fk_1028284` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_1028293` (`user_id`),
  ADD KEY `role_id_fk_1028293` (`role_id`);

--
-- Indexes for table `time_entries`
--
ALTER TABLE `time_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_entries_user_id_foreign` (`user_id`);

--
-- Indexes for table `time_entry_users`
--
ALTER TABLE `time_entry_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_entry_users_user_id_foreign` (`user_id`),
  ADD KEY `time_entry_users_time_entry_id_foreign` (`time_entry_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attandancelocations`
--
ALTER TABLE `attandancelocations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_entries`
--
ALTER TABLE `time_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `time_entry_users`
--
ALTER TABLE `time_entry_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attandancelocations`
--
ALTER TABLE `attandancelocations`
  ADD CONSTRAINT `attandancelocations_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `time_entries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attandancelocations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_1028284` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_1028284` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_1028293` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_1028293` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_entries`
--
ALTER TABLE `time_entries`
  ADD CONSTRAINT `time_entries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_entry_users`
--
ALTER TABLE `time_entry_users`
  ADD CONSTRAINT `time_entry_users_time_entry_id_foreign` FOREIGN KEY (`time_entry_id`) REFERENCES `time_entries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_entry_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
