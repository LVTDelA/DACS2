-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 07:39 AM
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
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(4, 4, 'hat-1.jpg', NULL, NULL),
(7, 6, 'sangtao3_638769d6eed77_221130_093358.jpg', '2022-11-30 14:33:58', '2022-11-30 14:33:58'),
(8, 6, 'sangtao3-2_63876a02c3a9e_221130_093442.jpg', '2022-11-30 14:34:42', '2022-11-30 14:34:42'),
(9, 1, 'houseblend_63876a7fc6e9a_221130_093647.jpg', '2022-11-30 14:36:47', '2022-11-30 14:36:47'),
(11, 2, 'culi-robusta_63876be079136_221130_094240.jpg', '2022-11-30 14:42:40', '2022-11-30 14:42:40'),
(12, 3, 'sucess8_63876d11deeed_221130_094745.jpg', '2022-11-30 14:47:45', '2022-11-30 14:47:45'),
(13, 5, 'chephin3_63876d5fd9ea3_221130_094903.jpg', '2022-11-30 14:49:03', '2022-11-30 14:49:03'),
(14, 7, 'caocap1_63876e1aaee75_221130_095210.jpg', '2022-11-30 14:52:10', '2022-11-30 14:52:10'),
(15, 8, 'hoatan1_63876ead66f19_221130_095437.jpg', '2022-11-30 14:54:37', '2022-11-30 14:54:37'),
(16, 4, 'sc2-cafe_639890a923a55_221213_094809.jpg', '2022-12-13 14:48:09', '2022-12-13 14:48:09'),
(17, 5, 'cp1-cafe_6398913500d7f_221213_095029.jpg', '2022-12-13 14:50:29', '2022-12-13 14:50:29');

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
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 1, 2, 'Cà phê House Blend', NULL, '<p><strong>C&agrave; ph&ecirc;&nbsp;</strong><strong>House Blend Trung Nguy&ecirc;n &ndash;&nbsp;</strong>Từ T&acirc;y Nguy&ecirc;n Đại Ng&agrave;n, nơi chứa đựng của Hồn Đất &ndash; Hồn Nước &ndash; Hồn Nghề &ndash; Hồn Người, l&agrave; v&ugrave;ng đất thi&ecirc;n li&ecirc;ng của c&agrave; ph&ecirc;. Từ những hạt c&agrave; ph&ecirc; ngon nhất T&acirc;y Nguy&ecirc;n v&agrave; b&iacute; quyết phối trộn độc đ&aacute;o, kh&ocirc;ng thể sao ch&eacute;p House Blend c&oacute; vị đậm đ&agrave; v&agrave; hương thơm nồng n&agrave;n kh&oacute; qu&ecirc;n.</p>\r\n\r\n<p>Th&agrave;nh phần: C&agrave; ph&ecirc; House Blend gồm 4 loại hạt c&agrave; ph&ecirc; Arabica, Robusta, Cherry v&agrave; Catimor. Đặc t&iacute;nh: Nước pha m&agrave;u n&acirc;u s&aacute;nh. M&ugrave;i thơm đặc trưng. H&agrave;m lượng Caffeine: khoảng 1.0%. Khối lượng: Hộp 500gr.</p>\r\n\r\n<p>Được chế biến từ những hạt c&agrave; ph&ecirc; Robusta v&agrave; Arabica ngon nhất. Của v&ugrave;ng đất Th&aacute;nh địa c&agrave; ph&ecirc; Bu&ocirc;n Ma Thuột.V&agrave; tr&ecirc;n Thế giới ng những c&ocirc;ng nghệ hiện đại nhất thế giới.V&agrave; b&iacute; quyết phối trộn ri&ecirc;ng kh&ocirc;ng thể sao ch&eacute;p.&nbsp;<strong>C&agrave; ph&ecirc;&nbsp;</strong><strong>House Blend</strong>&nbsp;mang hương thơm dịu lưu luyến. Vị đậm đ&agrave; m&ecirc; mẩn vị gi&aacute;c chuy&ecirc;n d&agrave;nh cho những người s&agrave;nh c&agrave; ph&ecirc;. C&aacute;c qu&aacute;n c&agrave; ph&ecirc; muốn sở hữu gu c&agrave; ph&ecirc; ri&ecirc;ng biệt.</p>\r\n\r\n<p>&nbsp;</p>', 70, 80, '1300', NULL, '2022-11-30 14:37:31'),
(2, 1, 2, 'Cafe hạt Culi Robusta Trung Nguyên', NULL, '<p>Culi Robusta c&oacute; hương thơm tốt hơn, thi&ecirc;n về m&ugrave;i hoa quả ch&iacute;n, m&ugrave;i thảo dược, m&ugrave;i mạch nha xen lẫn rất nhẹ v&agrave; tinh tế n&ecirc;n m&ugrave;i thơm kh&aacute; hấp dẫn.</p>\r\n\r\n<p>Đối với d&acirc;n s&agrave;nh caf&eacute;, d&ugrave; bận rộn đến mấy, d&ugrave; qu&aacute;n c&oacute; xa đến đ&acirc;u th&igrave; họ cũng sẵn s&agrave;ng &ldquo;cất c&ocirc;ng, mất sức&rdquo; để đến thưởng thức c&aacute;i hương vị caf&eacute; đặc trưng. Caf&eacute; ở đ&acirc;y kh&ocirc;ng chỉ l&agrave; một loại thức uống m&agrave; l&agrave; sự tận hưởng, trải nghiệm. V&igrave; thế, b&ecirc;n cạnh những g&oacute;i caf&eacute; h&ograve;a tan chất lượng v&agrave; tiện lợi th&igrave; người ti&ecirc;u d&ugrave;ng vẫn c&oacute; nhiều lựa chọn kh&aacute;c với c&agrave; ph&ecirc; hạt rang Trung Nguy&ecirc;n.</p>', 160, 175, '500', NULL, '2022-11-30 14:41:28'),
(3, 3, 2, 'Cà Phê Hạt Mộc Success 8', NULL, '<p>L&agrave; loại c&agrave; ph&ecirc; si&ecirc;u hạng c&oacute; hương vị độc đ&aacute;o v&agrave; đầy thử th&aacute;ch. M&ugrave;i hương dịu nhẹ nhưng rất đa dạng; Thể chất mạnh nhưng c&acirc;n bằng, hậu vị ngọt dịu.</p>\r\n\r\n<p>Trọng lượng tịnh: 340g</p>\r\n\r\n<p>- Đặc t&iacute;nh:<br />\r\n+ Thể chất mạnh<br />\r\n+ Vị c&acirc;n bằng<br />\r\n- Th&agrave;nh phần: 100%&nbsp;C&agrave; ph&ecirc; Arabica<br />\r\n- Hướng dẫn sử dụng: Xay c&agrave; ph&ecirc; trước khi pha chế, sản phẩm ph&ugrave; hợp tất cả c&aacute;c kiểu pha</p>', 310, 335, '350', NULL, '2022-11-30 14:47:39'),
(4, 1, 1, 'Cafe Hạt Trung Nguyên Success 2', NULL, '<p>L&agrave; loại c&agrave; ph&ecirc; si&ecirc;u hạng c&oacute; hương vị độc đ&aacute;o v&agrave; đầy thử th&aacute;ch. M&ugrave;i hương dịu nhẹ nhưng rất đa dạng; Thể chất mạnh nhưng c&acirc;n bằng, hậu vị ngọt dịu.</p>\r\n\r\n<p>Trọng lượng tịnh: 1kg</p>\r\n\r\n<p>- Đặc t&iacute;nh:<br />\r\n+ Thể chất mạnh<br />\r\n+ Vị c&acirc;n bằng<br />\r\n- Th&agrave;nh phần: C&agrave; ph&ecirc; (Arabica, Robusta)<br />\r\n- Hướng dẫn sử dụng: Xay c&agrave; ph&ecirc; trước khi pha chế, sản phẩm ph&ugrave; hợp tất cả c&aacute;c kiểu pha</p>', 310, 335, '200', NULL, '2022-12-13 14:47:49'),
(5, 1, 3, 'Cà phê Chế phin 3', NULL, '<p>L&agrave; những sản phẩm được phối trộn từ những hạt c&agrave; ph&ecirc; ngon nhất theo b&iacute; quyết ri&ecirc;ng kh&ocirc;ng thể sao ch&eacute;p của Trung Nguy&ecirc;n. Mỗi tuyệt phẩm c&agrave; ph&ecirc; CHẾ PHIN sở hữu hương thơm v&agrave; vị đặc trưng, l&agrave;m rung động c&aacute;c gi&aacute;c quan của những người s&agrave;nh c&agrave; ph&ecirc; v&agrave; đặc biệt tạo gu ri&ecirc;ng biệt cho mỗi qu&aacute;n c&agrave; ph&ecirc; t&ugrave;y theo mỗi sản phẩm m&agrave; họ lựa chọn</p>\r\n\r\n<p><strong>Đặc t&iacute;nh:</strong></p>\r\n\r\n<p>Nước pha m&agrave;u n&acirc;u c&aacute;nh gi&aacute;n nhạt.</p>\r\n\r\n<p>M&ugrave;i thơm nồng.</p>\r\n\r\n<p>Vị đắng hơi chua, thể chất nhẹ vừa phải.</p>\r\n\r\n<p>H&agrave;m lượng Caffeine:<strong>&nbsp;</strong>khoảng 1.7%.</p>\r\n\r\n<p>Ngon nhất khi uống với sữa.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;<strong>Khối lượng:</strong>&nbsp;Bịch 500gr.</p>\r\n\r\n<p>&nbsp;</p>', 117, 135, '600', NULL, '2022-12-13 14:49:19'),
(6, 2, 2, 'Cà phê Sáng tạo 3', NULL, '<p>Những hạt c&agrave; ph&ecirc; Arabica sẻ đến từ v&ugrave;ng đất trồng c&agrave; ph&ecirc; nổi tiếng Bu&ocirc;n Ma Thuột, được chọn lựa kỹ lưỡng để tạo ra một sản phẩm c&agrave; ph&ecirc; c&oacute; m&agrave;u n&acirc;u nhạt, m&ugrave;i rất thơm, thể chất nhẹ v&agrave; c&oacute; vị hơi chua</p>\r\n\r\n<p>C&agrave; ph&ecirc; s&aacute;ng tạo 3 l&agrave; sự kết hợp giữa những hạt c&agrave; ph&ecirc; Arabica sẻ đến từ v&ugrave;ng đất trồng c&agrave; ph&ecirc; nổi tiếng Bu&ocirc;n Ma Thuột, được chọn lựa kỹ lưỡng v&agrave; sản xuất tr&ecirc;n c&ocirc;ng nghệ h&agrave;ng đầu v&agrave; b&iacute; quyết phối trộn kh&ocirc;ng thể sao ch&eacute;p để tạo ra một sản phẩm c&agrave; ph&ecirc; c&oacute; m&agrave;u n&acirc;u nhạt, m&ugrave;i rất thơm. Lịch sử thế giới đ&atilde; minh chứng, c&oacute; những &yacute; tưởng s&aacute;ng tạo trước đ&acirc;y được coi l&agrave; đi&ecirc;n rồ, kh&ocirc;ng tưởng th&igrave; nay đ&atilde; th&agrave;nh hiện thực v&agrave; l&agrave;m thay đổi ho&agrave;n to&agrave;n thế giới v&agrave; n&oacute; được khơi l&ecirc;n từ c&agrave; ph&ecirc;.</p>\r\n\r\n<p>Bao b&igrave; c&agrave; ph&ecirc; S&aacute;ng Tạo 3 l&agrave; ph&aacute;t kiến về chiếc xe hơi đầu ti&ecirc;n để tạo n&ecirc;n những si&ecirc;u xe đẳng cấp nhất của ng&agrave;y nay để khẳng định về những &yacute; tưởng v&agrave; sự s&aacute;ng tạo, c&oacute; thể l&agrave;m thay đổi, tạo ra những bước ngoặt trong lịch sử nh&acirc;n loại.</p>\r\n\r\n<p>C&agrave; ph&ecirc; S&aacute;ng tạo 3 th&iacute;ch hợp với nữ giới v&igrave; hương vị nhẹ nh&agrave;ng nhưng rất quyến rũ</p>', 97, 115, '1500', NULL, '2022-11-30 14:33:01'),
(7, 1, 1, 'Cà Phê Đen Success', NULL, '<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<p>Lắc đều trước khi đổ ra ly</p>\r\n\r\n<p>N&ecirc;n d&ugrave;ng với đ&aacute; lạnh</p>\r\n\r\n<p>Bảo quản lạnh để giữ được hương vị</p>\r\n\r\n<p>D&ugrave;ng ngon nhất trong 24 giờ kể từ khi mở nắp</p>\r\n\r\n<p><strong>C&aacute;ch thức bảo quản:&nbsp;</strong>Nhiệt độ bảo quản 0-4&deg;C, v&igrave; vậy khuyến kh&iacute;ch kh&aacute;ch h&agrave;ng sau khi mở nắp chai sử dụng c&oacute; thể cho v&agrave;o ngăn m&aacute;t tủ lạnh v&agrave; tiếp tục sử dụng để đảm bảo chất lượng ngon nhất.</p>\r\n\r\n<p><strong>Hạn sử dụng: 6</strong>&nbsp;ng&agrave;y kể từ NSX v&agrave; 24 tiếng sau khi mở nắp chai.</p>', 100, 110, '150', '2022-11-30 14:52:05', '2022-12-13 14:46:09'),
(8, 1, 3, 'Legend Classic', NULL, '<p>Kết hợp những loại c&agrave; ph&ecirc; nguy&ecirc;n liệu tốt nhất thế giới c&ugrave;ng c&ocirc;ng nghệ Nano v&agrave; những b&iacute; quyết huyền diệu của Phương Đ&ocirc;ng</p>\r\n\r\n<p>Cảm hứng từ những Bản giao hưởng lừng danh của Thi&ecirc;n t&agrave;i &Acirc;m nhạc người Đức &ndash; Ludwig Van Beethoven v&agrave; ước muốn phụng sự Người đam m&ecirc; c&agrave; ph&ecirc; tr&ecirc;n to&agrave;n thế giới những T&aacute;ch c&agrave; ph&ecirc; năng lượng tuyệt hảo, c&aacute;c chuy&ecirc;n gia của Tập đo&agrave;n c&agrave; ph&ecirc; số 1 &ndash; Trung Nguy&ecirc;n Legend đ&atilde; ti&ecirc;n t&aacute;c n&ecirc;n Tuyệt phẩm c&agrave; ph&ecirc; Legend Classic.</p>\r\n\r\n<p>Những khi kh&ocirc;ng c&oacute; thời gian đến qu&aacute;n c&agrave; ph&ecirc;, bạn c&oacute; thể tự pha cho m&igrave;nh ly c&agrave; ph&ecirc; Legend Classic để nạp năng lượng s&aacute;ng tạo cho một ng&agrave;y l&agrave;m việc.</p>', 139, 139, '600', '2022-11-30 14:54:22', '2022-11-30 14:54:22');

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
(61, '2014_10_12_000000_create_users_table', 1),
(62, '2014_10_12_000001_create_coffee_brands_table', 1),
(63, '2014_10_12_000002_create_coffee_category_table', 1),
(64, '2014_10_12_000003_create_coffee_products_table', 1),
(65, '2014_10_12_000004_create_orders_table', 1),
(66, '2014_10_12_000005_create_order_details_table', 1),
(67, '2014_10_12_000006_create_coffee_images_table', 1),
(68, '2014_10_12_000007_create_coffee_details_table', 1),
(69, '2014_10_12_000008_create_blogs_table', 1),
(70, '2014_10_12_000009_create_statistical_table', 1),
(71, '2014_10_12_100000_create_password_resets_table', 1),
(72, '2019_08_19_000000_create_failed_jobs_table', 1),
(73, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
(1, 1, 'Bun', 'Quang', 'Viet Nam', 'Da Nang', 'bun293@gmail.com', '0898639048', 'pay_later', 1, '2022-12-04 12:08:53', '2022-12-04 12:08:53'),
(2, 1, 'Trần', 'Quang', 'Viet Nam', 'Da Nang', 'tranquangbun293@gmail.com', '0898639048', 'pay_later', 1, '2022-12-13 10:19:33', '2022-12-13 10:19:33'),
(3, 1, 'Bun', 'Quang', 'Viet Nam', 'Da Nang', 'quangt.21it@vku.udn.vn', '0898639048', 'pay_later', 1, '2022-12-13 10:21:38', '2022-12-13 10:21:38'),
(4, 1, 'Bun', 'Quang', 'Viet Nam', 'Ngũ Hành Sơn, Đà Nẵng', 'quangt.21it@vku.udn.vn', '0898639048', 'pay_later', 1, '2022-12-13 10:31:56', '2022-12-13 10:31:56'),
(5, 1, 'Trần', 'Quang', 'Viet Nam', 'Ngũ Hành Sơn, Đà Nẵng', 'quangt.21it@vku.udn.vn', '0898639048', 'pay_later', 1, '2022-12-13 10:36:49', '2022-12-13 10:36:49'),
(6, 1, 'Bun', 'Quang', 'Viet Nam', 'Ngũ Hành Sơn, Đà Nẵng', 'quangt.21it@vku.udn.vn', '0898639048', 'pay_later', 1, '2022-12-13 14:38:23', '2022-12-13 14:38:23'),
(7, 1, 'Trần', 'Quang', 'Việt Nam', 'Ngũ Hành Sơn, Đà Nẵng', 'quangt.21it@vku.udn.vn', '0898639048', 'pay_later', 1, '2022-12-13 15:01:53', '2022-12-13 15:01:53'),
(8, 1, 'Trần', 'Quang', 'Việt Nam', 'Ngũ Hành Sơn, Đà Nẵng', 'quangt.21it@vku.udn.vn', '0898639048', 'pay_later', 1, '2022-12-13 15:03:52', '2022-12-13 15:03:52'),
(9, 1, 'Bun', 'Trần', 'Việt Nam', 'Ngũ Hành Sơn, Đà Nẵng', 'quangt.21it@vku.udn.vn', '0898639048', 'online_payment', 4, '2022-12-17 13:17:00', '2022-12-17 13:19:43'),
(10, 1, 'Bun', 'Trần', 'Việt Nam', 'Ngũ Hành Sơn, Đà Nẵng', 'quangt.21it@vku.udn.vn', '0898639048', 'pay_later', 1, '2022-12-17 13:20:42', '2022-12-17 13:20:42'),
(11, 1, 'Trần', 'Bun', 'Việt Nam', 'Đà Nẵng', 'bun293@gmail.com', '0898639048', 'pay_later', 1, '2022-12-20 03:56:11', '2022-12-20 03:56:11');

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
(1, 8, 1, 1, 139, 139, '2022-12-04 12:08:53', '2022-12-04 12:08:53'),
(2, 5, 1, 1, 135, 135, '2022-12-04 12:08:53', '2022-12-04 12:08:53'),
(3, 8, 2, 1, 139, 139, '2022-12-13 10:19:33', '2022-12-13 10:19:33'),
(4, 2, 3, 1, 175, 175, '2022-12-13 10:21:38', '2022-12-13 10:21:38'),
(5, 3, 3, 1, 335, 335, '2022-12-13 10:21:38', '2022-12-13 10:21:38'),
(6, 7, 4, 1, 110, 110, '2022-12-13 10:31:56', '2022-12-13 10:31:56'),
(7, 4, 5, 1, 335, 335, '2022-12-13 10:36:49', '2022-12-13 10:36:49'),
(8, 7, 6, 2, 110, 220, '2022-12-13 14:38:23', '2022-12-13 14:38:23'),
(9, 4, 6, 1, 335, 335, '2022-12-13 14:38:23', '2022-12-13 14:38:23'),
(10, 1, 7, 1, 80, 80, '2022-12-13 15:01:53', '2022-12-13 15:01:53'),
(11, 2, 7, 1, 175, 175, '2022-12-13 15:01:53', '2022-12-13 15:01:53'),
(12, 7, 8, 1, 110, 110, '2022-12-13 15:03:52', '2022-12-13 15:03:52'),
(13, 5, 8, 1, 135, 135, '2022-12-13 15:03:52', '2022-12-13 15:03:52'),
(14, 7, 9, 1, 110, 110, '2022-12-17 13:17:00', '2022-12-17 13:17:00'),
(15, 5, 9, 1, 135, 135, '2022-12-17 13:17:00', '2022-12-17 13:17:00'),
(16, 8, 10, 1, 139, 139, '2022-12-17 13:20:42', '2022-12-17 13:20:42'),
(17, 5, 11, 1, 135, 135, '2022-12-20 03:56:11', '2022-12-20 03:56:11');

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
-- Table structure for table `statistical`
--

CREATE TABLE `statistical` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'Bun Trần', 'bun293@gmail.com', NULL, '$2y$10$Umr9GPGRdLezqcA/o56kE.TcrA.sL./9vPGPXd8WZhk3o8Sts6j2u', NULL, '0898639048', 'Việt Nam', 'Đà Nẵng', '21it303_6387672f8ed80_221130_092239.JPG', 0, 'Trần Quang thích 1 con vịt', NULL, '2022-12-14 04:56:40'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$z/s3kk0hJQclx3KYlBKiuuUBq2o/fgDjJSkNRxi0LWFoWrkgghNWW', NULL, '123456712', 'Vietnam', 'Đà nẵng', 'vku-coffee-1_638767689f34f_221130_092336.png', 1, NULL, NULL, '2022-11-30 14:23:36'),
(3, 'Quang', 'tranquang@gmail.com', NULL, '$2y$10$r8zub26Sm2azl5JvZ5KGXeyAiAQi/Knlbyc1S5pFH.4cVpbVJPEPO', NULL, '07761233123', 'Việt Nam', 'Đà Nẵng', 'img-8211_638767f2b9c59_221130_092554.JPEG', 2, NULL, NULL, '2022-12-13 10:16:17'),
(4, 'Hoster', 'hoster@gmail.com', NULL, '$2y$10$FTF9layGERH3i3rg/C5kf.Ys.8nFMmb0nmss35XrCotk8sY5XWYhS', NULL, '0123123123', 'USA', 'Las Vegas', 'untitled-diagramdrawio_638768667f744_221130_092750.png', 0, 'Hoster testing website', NULL, '2022-11-30 14:27:50');

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
-- Indexes for table `statistical`
--
ALTER TABLE `statistical`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistical`
--
ALTER TABLE `statistical`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
