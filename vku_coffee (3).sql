-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 01:19 PM
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
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `blogs` (`id`, `title`, `subtitle`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'CÓ GÌ BÊN TRONG MỘT QUẦY PHA CHẾ CÀ PHÊ?', NULL, 'blog-3.jpg', '', NULL, NULL),
(2, 'TÁC DỤNG CỦA CÀ PHÊ TRONG ĐỜI SỐNG HÀNG NGÀY', NULL, 'blog-2.jpg', '', NULL, NULL),
(4, 'CÙNG KHÁM PHÁ DÒNG CÀ PHÊ HẠT RANG XAY', NULL, 'blog-1.jpg', '', NULL, NULL),
(5, 'NGẪM NỀN VĂN HÓA CÀ PHÊ Ở VIỆT NAM', 'Ngẫm nền văn hóa cà phê ở Việt Nam Việt Nam có một nền văn hóa cà phê rất khác với các nền văn hóa cà phê ở phương Tây. Cà phê ở đây dành...', 'latest-3.jpg', '', '2022-10-20 04:14:45', NULL),
(6, 'Workshop “COLD BREW – xu hướng cafe lạnh”', 'Workshop “Cold Brew – xu hướng cafe lạnh” Bạn có biết ? Cold brew là một phương pháp pha chế cà phê khá phổ biến ở những nước có khí hậu nóng, bên cạnh đó...', 'latest-2.jpg', '', '2022-10-23 04:14:45', NULL),
(7, 'Nên chọn phin pha cà phê nhôm hay inox ?', 'Một ly cà phê ngon được chiết xuất vừa đủ tinh chất trong bột cà phê hòa vào nước. Đó là lý do cho sự ra đời của phin pha cà phê.', 'latest-1.jpg', '', '2022-10-26 04:14:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coffee_brands`
--

CREATE TABLE `coffee_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coffee_category`
--

INSERT INTO `coffee_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cao cấp', NULL, NULL),
(2, 'Rang xay| Hạt', NULL, NULL),
(3, 'Hòa tan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coffee_details`
--

CREATE TABLE `coffee_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
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
(6, 6, 'rangxay-3.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coffee_products`
--

CREATE TABLE `coffee_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_coffee_brand` int(10) UNSIGNED NOT NULL,
  `id_coffee_category` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `coffee_products` (`id`, `id_coffee_brand`, `id_coffee_category`, `name`, `description`, `price`, `discount`, `weight`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Cà phê House Blend', 'Thành phần: Cà phê House Blend gồm 4 loại hạt cà phê Arabica, Robusta, Cherry và Catimor. Đặc tính: Nước pha màu nâu sánh. Mùi thơm đặc trưng. Hàm lượng Caffeine: khoảng 1.0%. Khối lượng: Hộp 500gr.', 70, 80, '1.3', NULL, NULL),
(2, 1, 2, 'Cafe hạt Culi Robusta Trung Nguyên', NULL, 160, 175, NULL, NULL, NULL),
(3, 3, 2, 'Cà Phê Hạt Mộc Success 8 ', NULL, 310, 335, NULL, NULL, NULL),
(4, 1, 1, 'Cafe Hạt Trung Nguyên Success 2', NULL, 310, 335, NULL, NULL, NULL),
(5, 1, 3, 'Cà phê Chế phin 3', NULL, 117, 135, NULL, NULL, NULL),
(6, 2, 2, 'Cà phê Sáng tạo 3', NULL, 97, 115, NULL, NULL, NULL);

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
(62, '2014_10_12_000000_create_users_table', 1),
(63, '2014_10_12_100000_create_password_resets_table', 1),
(64, '2019_08_19_000000_create_failed_jobs_table', 1),
(65, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(66, '2022_10_27_045405_create_orders_table', 1),
(67, '2022_10_27_110341_create_order_details_table', 1),
(68, '2022_10_27_110456_create_blogs_table', 1),
(69, '2022_10_27_112706_create_coffee_products_table', 1),
(70, '2022_10_27_133941_create_coffee_brands_table', 1),
(71, '2022_10_27_134036_create_coffee_category_table', 1),
(72, '2022_10_27_134139_create_coffee_details_table', 1),
(73, '2022_10_27_135224_create_coffee_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
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
(2, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 11:50:14', '2022-11-02 11:50:14'),
(3, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-02 11:56:23', '2022-11-02 11:56:23'),
(4, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 18:25:11', '2022-11-02 18:25:11'),
(5, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 18:26:20', '2022-11-02 18:26:20'),
(6, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 18:27:37', '2022-11-02 18:27:37'),
(7, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 18:28:10', '2022-11-02 18:28:10'),
(8, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 18:28:46', '2022-11-02 18:28:46'),
(9, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 18:29:30', '2022-11-02 18:29:30'),
(10, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 18:31:26', '2022-11-02 18:31:26'),
(11, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 18:31:39', '2022-11-02 18:31:39'),
(12, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-02 18:35:24', '2022-11-02 18:35:24'),
(13, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-03 01:43:01', '2022-11-03 01:43:01'),
(14, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-03 02:02:15', '2022-11-03 02:02:15'),
(15, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 10:23:35', '2022-11-05 10:23:35'),
(16, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 10:24:09', '2022-11-05 10:24:09'),
(17, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 10:24:23', '2022-11-05 10:24:23'),
(18, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 10:26:27', '2022-11-05 10:26:27'),
(19, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-05 10:26:51', '2022-11-05 10:26:51'),
(20, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 10:27:13', '2022-11-05 10:27:13'),
(21, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 10:39:48', '2022-11-05 10:39:48'),
(22, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 10:50:08', '2022-11-05 10:50:08'),
(23, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 19:42:35', '2022-11-05 19:42:35'),
(24, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 19:43:53', '2022-11-05 19:43:53'),
(25, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 19:44:10', '2022-11-05 19:44:10'),
(26, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-05 19:44:21', '2022-11-05 19:44:21'),
(27, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:12:50', '2022-11-06 06:12:50'),
(28, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:13:37', '2022-11-06 06:13:37'),
(29, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:15:31', '2022-11-06 06:15:31'),
(30, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:16:18', '2022-11-06 06:16:18'),
(31, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:16:42', '2022-11-06 06:16:42'),
(32, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:31:40', '2022-11-06 06:31:40'),
(33, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:37:37', '2022-11-06 06:37:37'),
(34, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:41:41', '2022-11-06 06:41:41'),
(35, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:41:49', '2022-11-06 06:41:49'),
(37, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:50:11', '2022-11-06 06:50:11'),
(38, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:55:28', '2022-11-06 06:55:28'),
(39, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 06:56:39', '2022-11-06 06:56:39'),
(40, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 07:16:09', '2022-11-06 07:16:09'),
(41, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-06 07:24:33', '2022-11-06 07:24:33'),
(42, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-06 07:27:11', '2022-11-06 07:27:11'),
(43, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'online_payment', 0, '2022-11-06 07:27:31', '2022-11-06 07:27:31'),
(45, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-06 07:33:08', '2022-11-06 07:33:08'),
(46, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-06 18:02:26', '2022-11-06 18:02:26'),
(47, 0, 'Võ', 'Lực', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '+84915941874', 'pay_later', 0, '2022-11-07 06:01:34', '2022-11-07 06:01:34'),
(48, 0, 'Mai', 'Phương Nam', 'VN', '125 Nguyễn Minh Châu', 'mphuongnam20047@gmail.com', '0', 'pay_later', 0, '2022-11-07 10:18:52', '2022-11-07 10:18:52'),
(49, 0, 'Mai', 'Phương Nam', 'Vietnam', 'Thanh Lương - Quảng Xuân - Quảng Trạch - Quảng Bình', 'votheluc01@gmail.com', '0915941874', 'pay_later', 0, '2022-11-07 10:35:46', '2022-11-07 10:35:46'),
(50, 0, 'Võ Thế Lực', NULL, 'VN', 'Ngũ Hành Sơn - Đà Nẵng', 'votheluc01@gmail.com', '0945834765', 'pay_later', 0, '2022-11-09 18:21:50', '2022-11-09 18:21:50'),
(51, 7, 'Võ Thế Lực', NULL, 'VN', 'Ngũ Hành Sơn - Đà Nẵng', 'votheluc01@gmail.com', '0945834765', 'pay_later', 1, '2022-11-10 03:58:13', '2022-11-10 03:58:13'),
(52, 7, 'Võ Thế Lực', NULL, 'VN', 'Ngũ Hành Sơn - Đà Nẵng', 'votheluc01@gmail.com', '0945834765', 'pay_later', 1, '2022-11-10 05:17:14', '2022-11-10 05:17:14'),
(53, 7, 'Võ Thế Lực', NULL, 'VN', 'Ngũ Hành Sơn - Đà Nẵng', 'votheluc01@gmail.com', '0945834765', 'pay_later', 1, '2022-11-10 11:16:31', '2022-11-10 11:16:31'),
(54, 7, 'Võ Thế Lực', NULL, 'VN', 'Ngũ Hành Sơn - Đà Nẵng', 'votheluc01@gmail.com', '0945834765', 'pay_later', 1, '2022-11-10 11:21:59', '2022-11-10 11:21:59'),
(55, 7, 'Võ Thế Lực', NULL, 'VN', 'Ngũ Hành Sơn - Đà Nẵng', 'votheluc01@gmail.com', '0945834765', 'pay_later', 1, '2022-11-10 11:30:31', '2022-11-10 11:30:31'),
(56, 7, 'Mai', 'Văn Trung', 'VN', 'Ngũ Hành Sơn - Đà Nẵng', 'maitrung375@gmail.com', '0123', 'pay_later', 1, '2022-11-10 11:42:35', '2022-11-10 11:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 1, 2, 15, 80, 1200, '2022-11-02 11:50:14', '2022-11-02 11:50:14'),
(2, 2, 2, 2, 175, 350, '2022-11-02 11:50:14', '2022-11-02 11:50:14'),
(3, 5, 3, 2, 135, 270, '2022-11-02 11:56:23', '2022-11-02 11:56:23'),
(4, 3, 3, 2, 335, 670, '2022-11-02 11:56:23', '2022-11-02 11:56:23'),
(5, 5, 4, 1, 135, 135, '2022-11-02 18:25:11', '2022-11-02 18:25:11'),
(6, 5, 5, 1, 135, 135, '2022-11-02 18:26:20', '2022-11-02 18:26:20'),
(7, 5, 6, 1, 135, 135, '2022-11-02 18:27:37', '2022-11-02 18:27:37'),
(8, 5, 7, 1, 135, 135, '2022-11-02 18:28:10', '2022-11-02 18:28:10'),
(9, 5, 8, 1, 135, 135, '2022-11-02 18:28:46', '2022-11-02 18:28:46'),
(10, 5, 9, 1, 135, 135, '2022-11-02 18:29:30', '2022-11-02 18:29:30'),
(11, 5, 10, 1, 135, 135, '2022-11-02 18:31:26', '2022-11-02 18:31:26'),
(12, 1, 12, 1, 80, 80, '2022-11-02 18:35:24', '2022-11-02 18:35:24'),
(13, 3, 12, 2, 335, 670, '2022-11-02 18:35:24', '2022-11-02 18:35:24'),
(14, 2, 12, 1, 175, 175, '2022-11-02 18:35:24', '2022-11-02 18:35:24'),
(15, 1, 13, 2, 80, 160, '2022-11-03 01:43:01', '2022-11-03 01:43:01'),
(16, 3, 13, 2, 335, 670, '2022-11-03 01:43:01', '2022-11-03 01:43:01'),
(17, 5, 14, 1, 135, 135, '2022-11-03 02:02:15', '2022-11-03 02:02:15'),
(18, 1, 15, 2, 80, 160, '2022-11-05 10:23:35', '2022-11-05 10:23:35'),
(19, 2, 15, 1, 175, 175, '2022-11-05 10:23:35', '2022-11-05 10:23:35'),
(20, 1, 16, 2, 80, 160, '2022-11-05 10:24:09', '2022-11-05 10:24:09'),
(21, 2, 16, 1, 175, 175, '2022-11-05 10:24:09', '2022-11-05 10:24:09'),
(22, 1, 17, 2, 80, 160, '2022-11-05 10:24:23', '2022-11-05 10:24:23'),
(23, 2, 17, 1, 175, 175, '2022-11-05 10:24:23', '2022-11-05 10:24:23'),
(24, 1, 18, 2, 80, 160, '2022-11-05 10:26:27', '2022-11-05 10:26:27'),
(25, 2, 18, 1, 175, 175, '2022-11-05 10:26:27', '2022-11-05 10:26:27'),
(26, 1, 19, 2, 80, 160, '2022-11-05 10:26:51', '2022-11-05 10:26:51'),
(27, 2, 19, 1, 175, 175, '2022-11-05 10:26:51', '2022-11-05 10:26:51'),
(28, 1, 20, 1, 80, 80, '2022-11-05 10:27:13', '2022-11-05 10:27:13'),
(29, 1, 21, 1, 80, 80, '2022-11-05 10:39:48', '2022-11-05 10:39:48'),
(30, 1, 22, 1, 80, 80, '2022-11-05 10:50:08', '2022-11-05 10:50:08'),
(31, 1, 23, 1, 80, 80, '2022-11-05 19:42:35', '2022-11-05 19:42:35'),
(32, 1, 24, 1, 80, 80, '2022-11-05 19:43:53', '2022-11-05 19:43:53'),
(33, 1, 25, 1, 80, 80, '2022-11-05 19:44:10', '2022-11-05 19:44:10'),
(34, 1, 26, 1, 80, 80, '2022-11-05 19:44:21', '2022-11-05 19:44:21'),
(35, 1, 27, 1, 80, 80, '2022-11-06 06:12:50', '2022-11-06 06:12:50'),
(36, 1, 28, 1, 80, 80, '2022-11-06 06:13:37', '2022-11-06 06:13:37'),
(37, 1, 29, 1, 80, 80, '2022-11-06 06:15:31', '2022-11-06 06:15:31'),
(38, 1, 30, 1, 80, 80, '2022-11-06 06:16:18', '2022-11-06 06:16:18'),
(39, 1, 31, 1, 80, 80, '2022-11-06 06:16:42', '2022-11-06 06:16:42'),
(40, 1, 32, 1, 80, 80, '2022-11-06 06:31:40', '2022-11-06 06:31:40'),
(41, 1, 33, 1, 80, 80, '2022-11-06 06:37:37', '2022-11-06 06:37:37'),
(42, 1, 34, 1, 80, 80, '2022-11-06 06:41:41', '2022-11-06 06:41:41'),
(43, 1, 35, 1, 80, 80, '2022-11-06 06:41:49', '2022-11-06 06:41:49'),
(44, 1, 36, 1, 80, 80, '2022-11-06 06:46:21', '2022-11-06 06:46:21'),
(45, 1, 37, 1, 80, 80, '2022-11-06 06:50:11', '2022-11-06 06:50:11'),
(46, 1, 38, 1, 80, 80, '2022-11-06 06:55:28', '2022-11-06 06:55:28'),
(47, 1, 39, 1, 80, 80, '2022-11-06 06:56:39', '2022-11-06 06:56:39'),
(48, 1, 40, 1, 80, 80, '2022-11-06 07:16:09', '2022-11-06 07:16:09'),
(49, 1, 41, 1, 80, 80, '2022-11-06 07:24:33', '2022-11-06 07:24:33'),
(50, 1, 42, 1, 80, 80, '2022-11-06 07:27:11', '2022-11-06 07:27:11'),
(51, 1, 43, 1, 80, 80, '2022-11-06 07:27:31', '2022-11-06 07:27:31'),
(52, 2, 44, 1, 175, 175, '2022-11-06 07:28:43', '2022-11-06 07:28:43'),
(53, 2, 45, 2, 175, 350, '2022-11-06 07:33:08', '2022-11-06 07:33:08'),
(54, 1, 45, 1, 80, 80, '2022-11-06 07:33:08', '2022-11-06 07:33:08'),
(55, 4, 46, 14, 335, 4690, '2022-11-06 18:02:26', '2022-11-06 18:02:26'),
(56, 2, 46, 1, 175, 175, '2022-11-06 18:02:26', '2022-11-06 18:02:26'),
(57, 5, 46, 6, 135, 810, '2022-11-06 18:02:26', '2022-11-06 18:02:26'),
(58, 6, 46, 5, 115, 575, '2022-11-06 18:02:26', '2022-11-06 18:02:26'),
(59, 1, 47, 1, 80, 80, '2022-11-07 06:01:34', '2022-11-07 06:01:34'),
(60, 3, 48, 36, 335, 12060, '2022-11-07 10:18:52', '2022-11-07 10:18:52'),
(61, 1, 48, 14, 80, 1120, '2022-11-07 10:18:52', '2022-11-07 10:18:52'),
(62, 2, 48, 6, 175, 1050, '2022-11-07 10:18:52', '2022-11-07 10:18:52'),
(63, 6, 48, 5, 115, 575, '2022-11-07 10:18:52', '2022-11-07 10:18:52'),
(64, 5, 48, 6, 135, 810, '2022-11-07 10:18:52', '2022-11-07 10:18:52'),
(65, 3, 49, 51, 335, 17085, '2022-11-07 10:35:46', '2022-11-07 10:35:46'),
(66, 1, 50, 1, 80, 80, '2022-11-09 18:21:50', '2022-11-09 18:21:50'),
(67, 1, 51, 1, 80, 80, '2022-11-10 03:58:13', '2022-11-10 03:58:13'),
(68, 1, 52, 2, 80, 160, '2022-11-10 05:17:14', '2022-11-10 05:17:14'),
(69, 2, 52, 2, 175, 350, '2022-11-10 05:17:14', '2022-11-10 05:17:14'),
(70, 3, 52, 4, 335, 1340, '2022-11-10 05:17:14', '2022-11-10 05:17:14'),
(71, 5, 52, 1, 135, 135, '2022-11-10 05:17:14', '2022-11-10 05:17:14'),
(72, 2, 53, 1, 175, 175, '2022-11-10 11:16:31', '2022-11-10 11:16:31'),
(73, 1, 53, 1, 80, 80, '2022-11-10 11:16:31', '2022-11-10 11:16:31'),
(74, 1, 54, 7, 80, 560, '2022-11-10 11:21:59', '2022-11-10 11:21:59'),
(75, 1, 55, 1, 80, 80, '2022-11-10 11:30:31', '2022-11-10 11:30:31'),
(76, 2, 55, 1, 175, 175, '2022-11-10 11:30:31', '2022-11-10 11:30:31'),
(77, 3, 55, 1, 335, 335, '2022-11-10 11:30:31', '2022-11-10 11:30:31'),
(78, 4, 55, 2, 335, 670, '2022-11-10 11:30:31', '2022-11-10 11:30:31'),
(79, 5, 55, 2, 135, 270, '2022-11-10 11:30:31', '2022-11-10 11:30:31'),
(80, 6, 55, 5, 115, 575, '2022-11-10 11:30:31', '2022-11-10 11:30:31'),
(81, 1, 56, 5, 80, 400, '2022-11-10 11:42:35', '2022-11-10 11:42:35'),
(82, 2, 56, 1, 175, 175, '2022-11-10 11:42:35', '2022-11-10 11:42:35'),
(83, 3, 56, 1, 335, 335, '2022-11-10 11:42:35', '2022-11-10 11:42:35');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'Bun', 'bun293@gmail.com', NULL, '$2y$10$jT7AXQKiXrMQgxb7QEnM9.JiYh8Ds6XPqpHzZr/x065owTZwT1Kqa', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$mkliGGprkXubOvR08SsGJ.QH/34loXLhnW2qkFo.UkXSI9PJ5se1.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(3, 'tranquang', 'tranquang@gmail.com', NULL, '$2y$10$g1/470Y5nRvn2lFxer0ejupmz0KeHe34qyX0bV5cl266BIXvDn/Xm', NULL, NULL, NULL, NULL, 'avatar-0.png', 1, 'tranquangisme', NULL, NULL),
(4, 'khachhang', 'khachhang@gmail.com', NULL, '$2y$10$zPcpWl.hE5Wux.DfhlU/hOyuGt/lHWkmH.GPaPei08YSa9wF6esJa', NULL, NULL, NULL, NULL, 'avatar-0.png', 2, 'khachhang', NULL, NULL),
(7, 'Võ Thế Lực', 'votheluc01@gmail.com', NULL, '$2y$10$enwUAZMADsHIyTdTR4yIKuZRx5T2Int2wvreJ66z1gxYnZBAuq1lq', NULL, '0945834765', 'VN', 'Ngũ Hành Sơn - Đà Nẵng', NULL, 2, NULL, '2022-11-09 17:49:26', '2022-11-09 17:49:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coffee_images`
--
ALTER TABLE `coffee_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coffee_products`
--
ALTER TABLE `coffee_products`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coffee_brands`
--
ALTER TABLE `coffee_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coffee_category`
--
ALTER TABLE `coffee_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coffee_details`
--
ALTER TABLE `coffee_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coffee_images`
--
ALTER TABLE `coffee_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coffee_products`
--
ALTER TABLE `coffee_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
