-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2024 at 01:46 AM
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
-- Database: `ordering_and_borrowing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` bigint UNSIGNED NOT NULL,
  `user_fk_id` int NOT NULL,
  `product_fk_id` int NOT NULL,
  `borrow_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speed_test` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrow_status` enum('pending_it','pending_admin','Accepted','Completed','Deny','Returned') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending_it',
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `user_fk_id`, `product_fk_id`, `borrow_id`, `fullname`, `email`, `contact`, `speed_test`, `borrow_status`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'Q4WLUPCRGIV', 'carlos bernales', 'kimpaycod@gmail.com', '09951776900', '1720588987_668e1abbc68bf.jpg', 'Completed', '2024-07-10', '2024-07-09 21:23:07', '2024-07-10 04:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint UNSIGNED NOT NULL,
  `user_fk_id` int NOT NULL,
  `fk_product_id` int NOT NULL,
  `cart_qty` int NOT NULL,
  `status` enum('pending','placed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_fk_id`, `fk_product_id`, `cart_qty`, `status`, `created_at`, `updated_at`) VALUES
(10, 6, 1, 1, 'placed', '2024-07-10 19:21:32', '2024-07-10 19:24:15'),
(11, 6, 2, 3, 'placed', '2024-07-10 19:21:33', '2024-07-10 23:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(10, 'Keyboards', '2024-07-01 18:43:23', '2024-07-02 21:08:29'),
(12, 'Mouse', '2024-07-01 18:44:10', '2024-07-01 18:44:10'),
(13, 'Monitor', '2024-07-01 18:44:22', '2024-07-01 18:44:22'),
(14, 'Laptop', '2024-07-02 03:00:07', '2024-07-02 03:00:07');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_06_27_111327_create_category_table', 1),
(4, '2024_06_28_102719_create_product_table', 2),
(5, '2024_06_28_103221_create_products_table', 3),
(6, '2024_06_28_110934_create_products_table', 4),
(7, '2024_07_02_103412_create_cart_table', 5),
(8, '2024_07_04_033611_create_order_table', 6),
(9, '2024_07_04_033805_create_order_item_table', 6),
(10, '2024_07_06_025122_create_borrow_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_fk_id` int NOT NULL,
  `order_status` enum('Pending','Accepted','Completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `order_total` double(10,2) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_id`, `user_fk_id`, `order_status`, `order_total`, `fullname`, `email`, `phone_no`, `others`, `created_at`, `updated_at`) VALUES
(1, 'N6INADIW0VX', 6, 'Pending', 1131.70, 'carlos bernales', 'kimpaycod@gmail.com', '09951776900', '', '2024-07-10 19:24:15', '2024-07-10 19:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint UNSIGNED NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `order_fk_id` int NOT NULL,
  `product_fk_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `product_price`, `order_fk_id`, `product_fk_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 240.50, 1, 1, 1, '2024-07-10 19:24:15', '2024-07-10 19:24:15'),
(2, 445.60, 1, 2, 2, '2024-07-10 19:24:15', '2024-07-10 19:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `cat_fk_id` int NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Available','Not Available') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stocks` int NOT NULL,
  `stock_price` double(10,2) NOT NULL,
  `borrow_stocks` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_fk_id`, `cat_name`, `product_name`, `product_desc`, `product_price`, `product_image`, `status`, `stocks`, `stock_price`, `borrow_stocks`, `created_at`, `updated_at`) VALUES
(1, 10, 'Keyboards', 'Asus', 'Maganda', 240.50, '1719997230_6685132ed0882.jpg', 'Available', 3, 200.00, 2, '2024-07-02 03:01:20', '2024-07-10 19:24:15'),
(2, 10, 'Keyboards', 'asdasd', 'fghjkl;\'asd', 445.60, '1719918100_6683de147a7c8.jpg', 'Available', 13, 400.00, 5, '2024-07-02 03:01:40', '2024-07-10 19:24:15'),
(3, 10, 'Keyboards', 'asdas', 'sadasdasd', 213.00, '1719918112_6683de20dae81.jpg', 'Not Available', 16, 180.00, 8, '2024-07-02 03:01:52', '2024-07-07 17:34:59'),
(4, 12, 'Mouse', 'asdsad', 'sadasd', 342.00, '1719918126_6683de2e51406.jpg', 'Available', 8, 0.00, 6, '2024-07-02 03:02:06', '2024-07-07 17:35:38'),
(5, 12, 'Mouse', 'asdas', 'sadsad', 232.50, '1719918202_6683de7aa0452.jpg', 'Available', 10, 0.00, 4, '2024-07-02 03:03:22', '2024-07-07 17:35:28'),
(6, 12, 'Mouse', 'asdas', 'sadasd', 232.00, '1719918215_6683de87ae4d9.jpg', 'Available', 3, 200.00, 9, '2024-07-02 03:03:35', '2024-07-10 19:15:10'),
(7, 12, 'Mouse', 'sadas', 'sadasd', 232.00, '1719918226_6683de9218cd5.jpg', 'Available', 0, 0.00, 0, '2024-07-02 03:03:46', '2024-07-02 03:03:46'),
(8, 13, 'Monitor', 'asdas', 'sadasd', 2131.00, '1719918240_6683dea05290a.jpg', 'Available', 6, 0.00, 6, '2024-07-02 03:04:00', '2024-07-10 19:15:10'),
(9, 13, 'Monitor', 'asda', 'dasdasd', 2321.00, '1719918252_6683deac6e593.jpg', 'Available', 5, 0.00, 8, '2024-07-02 03:04:12', '2024-07-07 17:34:48'),
(10, 14, 'Laptop', 'dasdasd', 'sadasd', 21322.00, '1719918268_6683debcb017b.jpg', 'Available', 8, 20900.00, 5, '2024-07-02 03:04:28', '2024-07-07 17:35:08'),
(11, 14, 'Laptop', 'asdas', 'asasd', 67532.00, '1719918289_6683ded1c7188.jpg', 'Available', 15, 67000.00, 8, '2024-07-02 03:04:49', '2024-07-07 17:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','IT','User','Superadmin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `other_info_address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `role`, `email`, `phone_no`, `username`, `address`, `other_info_address`, `created_at`, `updated_at`) VALUES
(3, 'carlos', 'bernales', '$2y$12$Z76aMR4QWZ/S3kam0IWNROpXhMvl5b.IG/0XOx0zlaqXL4PhV4R7y', 'Admin', 'carlosbernales24@gmail.com', '09951776900', 'carlosbernales', NULL, NULL, '2024-06-27 03:49:04', '2024-06-27 03:49:04'),
(4, 'carlos', 'bernales', '$2y$12$DkXlpXGTZt8QqHku9Nvxk.5AZFD1YlhG68r6ki9g5vhgn8gjkaahi', 'User', 'bernalescarlos480@gmail.com', '09951776900', 'carlosbernales1', NULL, NULL, '2024-06-27 03:49:21', '2024-06-27 03:49:21'),
(6, 'carlos', 'bernales', '$2y$12$RdhETZUTYMxcJLJQjh4/busmYNT5PySV1WLQeb..KIU4RWYGyUUk.', 'User', 'kimpaycod@gmail.com', '09951776900', 'carlos123', NULL, NULL, '2024-07-02 22:22:19', '2024-07-02 22:22:19'),
(7, 'carlos', 'bernales', '$2y$12$9MSIDK6fKGCc357hwulCRuIx9RRVezH/aU1hqViDSWTDPQatM02g.', 'IT', 'mymykimpay@gmail.com', '09951776900', 'carlos1234', NULL, NULL, '2024-07-07 17:52:48', '2024-07-07 17:52:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
