-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 02:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vku_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `us_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `us_id`, `title`, `subtitle`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 'Nên chọn phin pha cà phê nhôm hay inox ?', NULL, 'latest-1.jpg', '', NULL, NULL),
(2, 3, 'Workshop “COLD BREW – xu hướng cafe lạnh”', NULL, 'latest-2.jpg', '', NULL, NULL),
(3, 3, 'NGẪM NỀN VĂN HÓA CÀ PHÊ Ở VIỆT NAM', NULL, 'latest-3.jpg', '', NULL, NULL),
(4, 3, 'CÙNG KHÁM PHÁ DÒNG CÀ PHÊ HẠT RANG XAY', NULL, 'blog-1.jpg', '', NULL, NULL),
(5, 3, 'TÁC DỤNG CỦA CÀ PHÊ TRONG ĐỜI SỐNG HÀNG NGÀY', NULL, 'blog-2.jpg', '', NULL, NULL),
(6, 3, 'CÓ GÌ BÊN TRONG MỘT QUẦY PHA CHẾ CÀ PHÊ?', NULL, 'blog-3.jpg', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coffee_brands`
--

CREATE TABLE `coffee_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coffee_brands`
--

INSERT INTO `coffee_brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Trung Nguyên', NULL, NULL),
(2, 'NESCAFE', NULL, NULL),
(3, 'Cafe G8', NULL, NULL),
(4, 'Vinacafe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coffee_category`
--

CREATE TABLE `coffee_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coffee_category`
--

INSERT INTO `coffee_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cao cấp', NULL, NULL),
(2, 'Rang xay/ Hạt', NULL, NULL),
(3, 'Hòa tan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coffee_details`
--

CREATE TABLE `coffee_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coffee_details`
--

INSERT INTO `coffee_details` (`id`, `id_product`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rang xay/ Hạt', NULL, NULL),
(2, 2, 'Cao cấp', NULL, NULL),
(3, 3, 'Cao cấp', NULL, NULL),
(4, 4, 'Rang xay/ Hạt', NULL, NULL),
(5, 5, 'Rang xay/ Hạt', NULL, NULL),
(6, 6, 'Hòa tan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coffee_images`
--

CREATE TABLE `coffee_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coffee_images`
--

INSERT INTO `coffee_images` (`id`, `id_product`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'rangxay-2.jpg', NULL, NULL),
(2, 2, 'hat-2.jpg', NULL, NULL),
(3, 3, 'hat-3.jpg', NULL, NULL),
(4, 4, 'hat-1.jpg', NULL, NULL),
(5, 5, 'rangxay-1.jpg', NULL, NULL),
(6, 6, 'rangxay-3.png', NULL, NULL),
(8, 7, 'img-8228_637643b6dfadd_221117_092246.JPEG', '2022-11-17 14:22:46', '2022-11-17 14:22:46'),
(9, 8, 'rangxaytn_6377073e2bb9a_221118_111702.jpg', '2022-11-18 04:17:02', '2022-11-18 04:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `coffee_products`
--

CREATE TABLE `coffee_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_coffee_brand` int(10) UNSIGNED NOT NULL,
  `id_coffee_category` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coffee_products`
--

INSERT INTO `coffee_products` (`id`, `id_coffee_brand`, `id_coffee_category`, `name`, `content`, `description`, `price`, `discount`, `weight`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Cà phê House Blend', NULL, 'Thành phần: Cà phê House Blend gồm 4 loại hạt cà phê Arabica, Robusta, Cherry và Catimor. Đặc tính: Nước pha màu nâu sánh. Mùi thơm đặc trưng. Hàm lượng Caffeine: khoảng 1.0%. Khối lượng: Hộp 500gr.', 70, 80, '1.3', NULL, NULL),
(2, 1, 2, 'Cafe hạt Culi Robusta Trung Nguyên', NULL, NULL, 160, 175, NULL, NULL, NULL),
(3, 3, 2, 'Cà Phê Hạt Mộc Success 8 ', NULL, NULL, 310, 335, NULL, NULL, NULL),
(4, 1, 1, 'Cafe Hạt Trung Nguyên Success 2', NULL, NULL, 310, 335, NULL, NULL, NULL),
(5, 1, 3, 'Cà phê Chế phin 3', NULL, NULL, 117, 135, NULL, NULL, NULL),
(6, 2, 2, 'Cà phê Sáng tạo 3', NULL, NULL, 97, 115, '1500', NULL, '2022-11-17 14:26:39'),
(7, 2, 1, 'Cà phê chồn trung nguyên', NULL, '<p>C&agrave; ph&ecirc; chồn cao cấp của Trung Nguy&ecirc;n</p>', 780, 780, '100', '2022-11-17 14:02:45', '2022-11-18 03:23:04'),
(8, 2, 2, 'Cà phê rang xay NESCAFE', NULL, '<p>C&agrave; ph&ecirc; rang xay NESCAFE thơm ngon</p>', 120, 120, '200', '2022-11-18 04:16:29', '2022-11-18 04:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_000001_create_coffee_brands_table', 1),
(51, '2014_10_12_000002_create_coffee_category_table', 1),
(52, '2014_10_12_000003_create_coffee_products_table', 1),
(53, '2014_10_12_000004_create_orders_table', 1),
(54, '2014_10_12_000005_create_order_details_table', 1),
(55, '2014_10_12_000006_create_coffee_images_table', 1),
(56, '2014_10_12_000007_create_coffee_details_table', 1),
(57, '2014_10_12_000008_create_blogs_table', 1),
(58, '2014_10_12_100000_create_password_resets_table', 1),
(59, '2019_08_19_000000_create_failed_jobs_table', 1),
(60, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `country`, `street_address`, `email`, `phone_number`, `payment_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'khach', 'hang', 'Vietnam', 'Đà nẵng', 'khachhang@gmail.com', '123456712', 'pay_later', 1, '2022-11-16 07:15:26', '2022-11-16 07:15:26'),
(2, 4, 'khach', 'hang', 'Vietnam', 'Đà nẵng', 'khachhang@gmail.com', '123456712', 'online_payment', 5, '2022-11-16 07:17:09', '2022-11-16 07:17:09'),
(3, 4, 'Tran', 'Quang', 'Da nang', '19 Doan Khue', NULL, '0898639048', 'pay_later', 7, '2022-11-16 07:24:38', '2022-11-16 07:24:38'),
(4, 4, 'khach', 'hang', 'Viet nam', 'Da nang', 'khachhang@gmail.com', '234123321', 'pay_later', 6, '2022-11-16 07:27:22', '2022-11-16 07:27:22'),
(5, 4, 'khach', 'hang', 'vietnam', 'da nang', 'khachhang@gmail.com', '0123321123', 'pay_later', 1, '2022-11-16 14:27:48', '2022-11-16 14:27:48'),
(6, 4, 'khach', 'hang', 'Vietnam', 'Đà nẵng', 'client@gmail.com', '123456712', 'pay_later', 1, '2022-11-16 14:32:39', '2022-11-16 14:32:39'),
(7, 4, 'khach', 'hang', 'Vietnam', 'Đà nẵng', 'client@gmail.com', '123456712', 'pay_later', 1, '2022-11-16 14:34:04', '2022-11-16 14:34:04'),
(8, 1, 'Bun', 'Quang', 'Viet Nam', 'Da Nang', 'bun293@gmail.com', '01293213321', 'online_payment', 1, '2022-11-18 12:45:41', '2022-11-18 12:45:41'),
(9, 1, 'Bun', 'Quang', 'Viet Nam', 'Da Nang', 'bun293@gmail.com', '01293213321', 'pay_later', 1, '2022-11-18 12:46:18', '2022-11-18 12:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_order` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `id_product`, `id_order`, `qty`, `amount`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 80, 80, '2022-11-16 07:15:26', '2022-11-16 07:15:26'),
(2, 2, 1, 1, 175, 175, '2022-11-16 07:15:26', '2022-11-16 07:15:26'),
(3, 1, 2, 1, 80, 80, '2022-11-16 07:17:09', '2022-11-16 07:17:09'),
(4, 2, 2, 1, 175, 175, '2022-11-16 07:17:09', '2022-11-16 07:17:09'),
(5, 1, 3, 1, 80, 80, '2022-11-16 07:24:38', '2022-11-16 07:24:38'),
(6, 2, 3, 1, 175, 175, '2022-11-16 07:24:38', '2022-11-16 07:24:38'),
(7, 1, 4, 1, 80, 80, '2022-11-16 07:27:22', '2022-11-16 07:27:22'),
(8, 2, 4, 1, 175, 175, '2022-11-16 07:27:22', '2022-11-16 07:27:22'),
(9, 5, 5, 1, 135, 135, '2022-11-16 14:27:48', '2022-11-16 14:27:48'),
(10, 5, 6, 1, 135, 135, '2022-11-16 14:32:39', '2022-11-16 14:32:39'),
(11, 5, 7, 1, 135, 135, '2022-11-16 14:34:04', '2022-11-16 14:34:04'),
(12, 7, 8, 1, 780, 780, '2022-11-18 12:45:41', '2022-11-18 12:45:41'),
(13, 2, 8, 1, 175, 175, '2022-11-18 12:45:41', '2022-11-18 12:45:41'),
(14, 7, 9, 1, 780, 780, '2022-11-18 12:46:18', '2022-11-18 12:46:18'),
(15, 2, 9, 1, 175, 175, '2022-11-18 12:46:18', '2022-11-18 12:46:18');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `country`, `street_address`, `avatar`, `level`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bun', 'bun293@gmail.com', NULL, '$2y$10$R5agwYTyRde/oQGcuvqkxu.vY/b9YuccYre/B16cZlC8ITtPtmvgq', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$yBHq/9dt/oH5w/1Y4gqqAOOXWWQmKqe/.sqyYgYFRggDUjo062LoS', NULL, NULL, NULL, NULL, 'vku-coffee-1_6374f96b35858_221116_095331.png', 0, NULL, NULL, '2022-11-16 14:53:31'),
(3, 'tranquang', 'tranquang@gmail.com', NULL, '$2y$10$U9PWxofH4jUxq5dK..ddu.pSA9bcQO6Gc3mdyUKmokQ/XdrXEDczO', NULL, NULL, NULL, NULL, '', 1, 'tranquangisme', NULL, NULL),
(4, 'khachhang', 'khachhang@gmail.com', NULL, '$2y$10$u4A29ZmLrDJJLnvqON3q5u7yBEUUMFnmjKiDldRUrtUqzoTF6QGIq', NULL, NULL, NULL, NULL, 'img-8211_6374f95374d54_221116_095307.JPEG', 2, NULL, NULL, '2022-11-16 14:53:07'),
(6, 'quang', 'quang@gmail.com', NULL, '$2y$10$0TryFueTQu9TZDGE7Y2W/e5/ps1Ub596Yj86pN/pELgX6WlAixSMq', NULL, NULL, NULL, NULL, 'img-8228_63777fdb73ee7_221118_075139.JPEG', 0, NULL, '2022-11-18 12:51:39', '2022-11-18 12:51:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_us_id_foreign` (`us_id`);

--
-- Indexes for table `coffee_brands`
--
ALTER TABLE `coffee_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coffee_category`
--
ALTER TABLE `coffee_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coffee_details`
--
ALTER TABLE `coffee_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coffee_details_id_product_foreign` (`id_product`);

--
-- Indexes for table `coffee_images`
--
ALTER TABLE `coffee_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coffee_images_id_product_foreign` (`id_product`);

--
-- Indexes for table `coffee_products`
--
ALTER TABLE `coffee_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coffee_products_id_coffee_brand_foreign` (`id_coffee_brand`),
  ADD KEY `coffee_products_id_coffee_category_foreign` (`id_coffee_category`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_id_product_foreign` (`id_product`),
  ADD KEY `order_details_id_order_foreign` (`id_order`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coffee_brands`
--
ALTER TABLE `coffee_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coffee_category`
--
ALTER TABLE `coffee_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coffee_details`
--
ALTER TABLE `coffee_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coffee_images`
--
ALTER TABLE `coffee_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coffee_products`
--
ALTER TABLE `coffee_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_us_id_foreign` FOREIGN KEY (`us_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `coffee_details`
--
ALTER TABLE `coffee_details`
  ADD CONSTRAINT `coffee_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `coffee_products` (`id`);

--
-- Constraints for table `coffee_images`
--
ALTER TABLE `coffee_images`
  ADD CONSTRAINT `coffee_images_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `coffee_products` (`id`);

--
-- Constraints for table `coffee_products`
--
ALTER TABLE `coffee_products`
  ADD CONSTRAINT `coffee_products_id_coffee_brand_foreign` FOREIGN KEY (`id_coffee_brand`) REFERENCES `coffee_brands` (`id`),
  ADD CONSTRAINT `coffee_products_id_coffee_category_foreign` FOREIGN KEY (`id_coffee_category`) REFERENCES `coffee_category` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `coffee_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
