-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2024 lúc 05:33 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `store_123`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2024_06_20_160438_create_tbl_admin_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(5, '2024_06_20_185544_create_tbl_category_product', 2),
(6, '2024_06_20_214912_create_tbl_brand_product', 3),
(7, '2024_06_20_173919_create_tbl_product', 4),
(8, '2024_06_20_161744_tbl_customer', 5),
(9, '2024_06_20_165303_tbl_shipping', 6),
(10, '2024_06_20_195944_tbl_payment', 7),
(11, '2024_06_20_200141_tbl_order', 7),
(12, '2024_06_20_200159_tbl_order_details', 7),
(13, '2019_08_19_000000_create_failed_jobs_table', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tokenable_id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `abilities` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `last_used_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(3, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'TranThuan', '0123456789', '2024-06-24 16:18:41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `brand_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `category_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(10, 1, 'Apple', 'Điện thoại Apple', 1, '2024-06-22 18:08:09', NULL),
(15, 2, 'Macbook', 'Laptop MacBook', 1, '2024-06-22 18:41:08', NULL),
(22, 6, 'iPad', 'Máy tính bảng iPad', 1, '2024-06-22 19:16:17', NULL),
(23, 5, 'Apple Watch Ultra', 'Apple Watch Ultra', 0, '2024-06-22 19:16:44', NULL),
(24, 5, 'Apple Watch Series 8', 'Apple Watch Series 8', 0, '2024-06-22 19:16:54', NULL),
(25, 5, 'Apple Watch Series 7', 'Apple Watch Series 7', 0, '2024-06-22 19:17:01', NULL),
(26, 5, 'Apple Watch SE', 'Apple Watch SE', 0, '2024-06-22 19:17:10', NULL),
(28, 1, 'SamSung', 'Điện thoại Samsung', 1, '2024-06-30 13:44:18', NULL),
(29, 1, 'Xiaomi', 'Điện thoại xiaomi', 1, '2024-06-30 13:57:20', NULL),
(30, 1, 'Oppo', 'Điện thoại Oppo', 1, '2024-06-30 13:57:31', NULL),
(31, 1, 'Realme', 'Điện thoại Realme', 1, '2024-06-30 13:57:40', NULL),
(32, 6, 'SamSung', 'Máy tính bảng SamSung', 1, '2024-06-30 14:23:10', NULL),
(33, 6, 'Xiaomi', 'Máy tính bảng Xiaomi', 1, '2024-06-30 14:23:35', NULL),
(34, 6, 'Oppo', 'Máy tính bảng Oppo', 1, '2024-06-30 14:23:43', NULL),
(35, 6, 'Lenovo', 'Máy tính bảng Lenovo', 1, '2024-06-30 14:47:01', NULL),
(36, 2, 'Asus', 'Laptop Asus', 1, '2024-06-30 15:15:23', NULL),
(37, 2, 'Lenovo', 'Laptop Lenovo', 1, '2024-06-30 15:15:55', NULL),
(38, 2, 'HP', 'Laptop HP', 1, '2024-06-30 15:16:16', NULL),
(39, 2, 'Dell', 'Laptop Dell', 1, '2024-06-30 15:16:28', NULL),
(40, 2, 'Acer', 'Laptop Acer', 1, '2024-06-30 15:16:54', NULL),
(41, 5, 'Apple Watch', 'Đồng hồ Apple Watch', 1, '2024-06-30 15:53:14', NULL),
(42, 5, 'Samsung', 'Đồng hồ Samsung', 1, '2024-06-30 15:53:32', NULL),
(44, 5, 'Huawei', 'Đồng hồ Huawei', 1, '2024-06-30 15:54:13', NULL),
(45, 5, 'Coros', 'Đồng hồ Coros', 1, '2024-06-30 15:55:19', NULL),
(46, 5, 'Garmin', 'Đồng hồ Garmin', 1, '2024-06-30 15:55:50', NULL),
(47, 13, 'Sạc dự phòng', 'Sạc dự phòng', 1, '2024-07-09 16:57:11', NULL),
(49, 13, 'Sạc, cáp', 'Sạc, cáp', 1, '2024-07-09 16:58:46', NULL),
(50, 13, 'Óp lưng điện thoại, máy tính bảng', 'Óp lưng điện thoại, máy tính bảng', 1, '2024-07-09 16:59:48', NULL),
(51, 13, 'Miếng dán', 'Miếng dán', 1, '2024-07-09 17:00:03', NULL),
(52, 13, 'Tay nghe', 'Tay nghe', 1, '2024-07-09 17:01:18', NULL),
(53, 14, 'Camera', 'Camera', 1, '2024-07-11 16:42:12', NULL),
(54, 14, 'Máy in', 'Máy in', 1, '2024-07-11 16:42:22', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'Điện thoại di động', 1, '2024-06-23 19:19:14', NULL),
(2, 'Laptop', 'Máy tính', 1, '2024-06-23 19:20:24', NULL),
(5, 'Đồng hồ thông minh', 'Đồng hồ', 1, '2024-06-23 19:20:32', NULL),
(6, 'Máy tính bảng', 'Máy tính bảng', 1, '2024-06-23 19:20:42', NULL),
(13, 'Phụ Kiện', 'Phụ kiện', 1, '2024-06-30 17:17:29', '2024-06-30 17:17:29'),
(14, 'PC, màn hình, máy in', 'PC màn hình máy in', 1, '2024-06-30 17:18:58', '2024-06-30 17:18:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_type` int(11) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`coupon_id`, `coupon_name`, `coupon_code`, `coupon_type`, `coupon_value`, `coupon_quantity`) VALUES
(5, 'tran thuan sale', 'SALE20', 1, 20, 10),
(6, 'trung luong sale', 'SALE100', 2, 100000, 10),
(8, 'trung luong sale', 'SALE50', 2, 50000, 10),
(9, 'tai tri', 'SALE200', 2, 200000, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(5) NOT NULL,
  `district_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `province_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_details_id` int(11) DEFAULT NULL,
  `customer_id` bigint(20) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_details_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(102, NULL, 3, 107, 107, '8,590,000', '1', '2024-07-13 18:01:41', NULL),
(103, NULL, 3, 108, 108, '17,990,000', '1', '2024-07-14 11:45:05', NULL),
(104, NULL, 3, 109, 109, '5,750,000', '1', '2024-07-14 16:20:08', NULL),
(105, NULL, 3, 110, 110, '1,310,000', '3', '2024-07-14 16:38:55', NULL),
(106, NULL, 3, 111, 111, '650,000', '4', '2024-07-14 16:57:28', NULL),
(107, NULL, 3, 112, 112, '5,590,000', '3', '2024-07-14 17:03:15', NULL),
(108, NULL, 3, 113, 113, '67,690,000', '4', '2024-07-15 13:35:06', NULL),
(109, NULL, 3, 114, 114, '390,000', '1', '2024-07-16 11:39:10', NULL),
(110, NULL, 3, 115, 115, '5,750,000', '3', '2024-07-17 17:20:27', NULL),
(111, NULL, 3, 116, 116, '650,000', '4', '2024-07-17 17:37:14', NULL),
(112, NULL, 3, 117, 117, '490,000', '4', '2024-07-17 17:37:43', NULL),
(113, NULL, 3, 118, 118, '5,590,000', '3', '2024-07-17 17:50:04', NULL),
(114, NULL, 4, 119, 119, '650,000', '4', '2024-07-17 18:04:11', NULL),
(115, NULL, 4, 120, 120, '1,310,000', '3', '2024-07-17 19:46:43', NULL),
(116, NULL, 4, 121, 121, '490,000', '3', '2024-07-17 19:58:24', NULL),
(117, NULL, 4, 122, 122, '490,000', '3', '2024-07-17 19:58:54', NULL),
(118, NULL, 4, 123, 123, '490,000', '2', '2024-07-17 19:59:10', NULL),
(119, NULL, 4, 124, 124, '490,000', '2', '2024-07-17 19:59:26', NULL),
(120, NULL, 4, 125, 125, '28,550,000', '2', '2024-07-17 20:00:25', NULL),
(121, NULL, 4, 126, 126, '28,550,000', '2', '2024-07-17 20:00:42', NULL),
(122, NULL, 4, 127, 127, '17,990,000', '2', '2024-07-17 20:02:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_details_quantity` int(11) DEFAULT 1,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_storage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `order_details_quantity`, `product_name`, `product_price`, `product_color`, `product_storage`, `created_at`, `updated_at`) VALUES
(83, 102, 23, 1, 'Iphone 11', '8590000', 'Trắng', '64GB', '2024-07-13 18:01:41', NULL),
(84, 103, 20, 1, 'Apple Watch Series 8 Thép GPS + Cellular', '17990000', 'Silver', '41mm', '2024-07-14 11:45:05', NULL),
(85, 104, 45, 1, 'Tai nghe Bluetooth Apple AirPods Pro 2 2023 USB-C', '5750000', 'Trắng', '6h', '2024-07-14 16:20:08', NULL),
(86, 105, 41, 1, 'Pin sạc dự phòng Xiaomi 20.000mAh 50W PB200SZM', '1310000', 'Đen', '20.000mAh', '2024-07-14 16:38:55', NULL),
(87, 106, 44, 1, 'Camera IP Wifi Ezviz TY1 Pro 4MP', '650000', 'Trắng', '2K', '2024-07-14 16:57:28', NULL),
(88, 107, 40, 1, 'Đồng hồ thông minh Garmin Forerunner 55', '5590000', 'Đen', '44mm', '2024-07-14 17:03:15', NULL),
(89, 108, 31, 1, 'Asus ROG Zephyrus M16', '67890000', 'Đen', '12GB/1TB', '2024-07-15 13:35:06', NULL),
(90, 109, 43, 1, 'Camera IP hồng ngoại Wifi Ezviz C6N 1080p 2MP', '390000', 'Trắng', '1080p', '2024-07-16 11:39:10', NULL),
(91, 110, 45, 1, 'Tai nghe Bluetooth Apple AirPods Pro 2 2024', '5750000', 'Trắng', '6h', '2024-07-17 17:20:27', NULL),
(92, 111, 44, 1, 'Camera IP Wifi Ezviz TY1 Pro 4MP', '650000', 'Trắng', '2K', '2024-07-17 17:37:14', NULL),
(93, 112, 46, 1, 'SẠC APPLE IPHONE', '490000', 'Trắng', '20W', '2024-07-17 17:37:43', NULL),
(94, 113, 40, 1, 'Đồng hồ thông minh Garmin Forerunner 55', '5590000', 'Đen', '44mm', '2024-07-17 17:50:04', NULL),
(95, 114, 44, 1, 'Camera IP Wifi Ezviz TY1 Pro 4MP', '650000', 'Trắng', '2K', '2024-07-17 18:04:11', NULL),
(96, 115, 41, 1, 'Pin sạc dự phòng Xiaomi 20.000mAh 50W PB200SZM', '1310000', 'Đen', '20.000mAh', '2024-07-17 19:46:43', NULL),
(97, 116, 46, 1, 'SẠC APPLE IPHONE', '490000', 'Trắng', '20W', '2024-07-17 19:58:24', NULL),
(98, 117, 46, 1, 'SẠC APPLE IPHONE', '490000', 'Trắng', '20W', '2024-07-17 19:58:54', NULL),
(99, 118, 46, 1, 'SẠC APPLE IPHONE', '490000', 'Trắng', '20W', '2024-07-17 19:59:10', NULL),
(100, 119, 46, 1, 'SẠC APPLE IPHONE', '490000', 'Trắng', '20W', '2024-07-17 19:59:26', NULL),
(101, 120, 15, 1, 'MacBook Pro M1 2020', '28550000', 'Space Gray', '256GB', '2024-07-17 20:00:25', NULL),
(102, 121, 15, 1, 'MacBook Pro M1 2020', '28550000', 'Space Gray', '256GB', '2024-07-17 20:00:42', NULL),
(103, 122, 20, 1, 'Apple Watch Series 8 Thép GPS + Cellular', '17990000', 'Silver', '41mm', '2024-07-17 20:02:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Pending', '2024-06-28 22:49:16', NULL),
(2, '2', 'Pending', '2024-06-28 22:50:31', NULL),
(3, '2', 'Pending', '2024-06-28 22:52:14', NULL),
(4, '2', 'Pending', '2024-06-28 22:53:02', NULL),
(5, '1', 'Pending', '2024-06-28 23:22:50', NULL),
(6, '1', 'Pending', '2024-06-28 23:40:29', NULL),
(7, '1', 'Pending', '2024-06-29 14:00:23', NULL),
(8, '1', 'Pending', '2024-06-30 18:06:06', NULL),
(9, '1', 'Pending', '2024-06-30 18:19:58', NULL),
(10, '1', 'Pending', '2024-06-30 19:12:20', NULL),
(11, '2', 'Pending', '2024-06-30 22:57:38', NULL),
(12, '2', 'Pending', '2024-06-30 22:59:31', NULL),
(13, '2', 'Pending', '2024-06-30 22:59:40', NULL),
(14, '2', 'Pending', '2024-06-30 23:02:21', NULL),
(15, '2', 'Pending', '2024-06-30 23:03:09', NULL),
(16, '2', 'Pending', '2024-06-30 23:04:20', NULL),
(17, '2', 'Pending', '2024-07-02 14:52:26', NULL),
(18, '2', 'Pending', '2024-07-02 14:54:05', NULL),
(19, '1', 'Pending', '2024-07-02 15:51:42', NULL),
(20, '1', 'Pending', '2024-07-02 15:58:37', NULL),
(21, '1', 'Pending', '2024-07-02 16:00:19', NULL),
(22, '1', 'Pending', '2024-07-02 17:17:23', NULL),
(23, '1', 'Pending', '2024-07-02 17:20:23', NULL),
(24, '2', 'Pending', '2024-07-03 17:17:19', NULL),
(25, '2', 'Pending', '2024-07-03 17:19:01', NULL),
(26, '2', 'Pending', '2024-07-03 17:19:56', NULL),
(27, '2', 'Pending', '2024-07-03 17:21:01', NULL),
(28, '2', 'Pending', '2024-07-03 17:21:04', NULL),
(29, '2', 'Pending', '2024-07-03 17:21:11', NULL),
(30, '2', 'Pending', '2024-07-03 17:24:19', NULL),
(31, '1', 'Pending', '2024-07-10 11:09:02', NULL),
(32, '2', 'Pending', '2024-07-10 13:05:05', NULL),
(33, '1', 'Pending', '2024-07-10 13:07:32', NULL),
(34, '2', 'Pending', '2024-07-10 13:09:43', NULL),
(35, '1', 'Pending', '2024-07-10 13:14:53', NULL),
(36, '1', 'Pending', '2024-07-11 23:12:02', NULL),
(37, '1', 'Pending', '2024-07-11 23:22:09', NULL),
(38, '1', 'Pending', '2024-07-11 23:36:26', NULL),
(39, '1', 'Pending', '2024-07-12 12:13:13', NULL),
(40, '1', 'Pending', '2024-07-13 13:35:38', NULL),
(41, '1', 'Pending', '2024-07-13 13:37:59', NULL),
(42, '1', 'Pending', '2024-07-13 13:43:18', NULL),
(43, '1', 'Pending', '2024-07-13 13:45:17', NULL),
(44, '1', 'Pending', '2024-07-13 13:50:27', NULL),
(45, '1', 'Pending', '2024-07-13 13:55:42', NULL),
(46, '1', 'Pending', '2024-07-13 14:00:30', NULL),
(47, '1', 'Pending', '2024-07-13 14:03:07', NULL),
(48, '1', 'Pending', '2024-07-13 14:04:13', NULL),
(49, '1', 'Pending', '2024-07-13 14:06:23', NULL),
(50, '1', 'Pending', '2024-07-13 14:07:14', NULL),
(51, '1', 'Pending', '2024-07-13 14:08:59', NULL),
(52, '1', 'Pending', '2024-07-13 14:10:21', NULL),
(53, '1', 'Pending', '2024-07-13 14:15:02', NULL),
(54, '1', 'Pending', '2024-07-13 14:35:00', NULL),
(55, '1', 'Pending', '2024-07-13 14:51:43', NULL),
(56, '1', 'Pending', '2024-07-13 15:14:13', NULL),
(57, '1', 'Pending', '2024-07-13 15:50:42', NULL),
(58, '1', 'Pending', '2024-07-13 16:06:54', NULL),
(59, '1', 'Pending', '2024-07-13 16:08:03', NULL),
(60, '1', 'Pending', '2024-07-13 16:16:47', NULL),
(61, '1', 'Pending', '2024-07-13 16:24:12', NULL),
(62, '1', 'Pending', '2024-07-13 16:24:16', NULL),
(63, '1', 'Pending', '2024-07-13 16:24:20', NULL),
(64, '1', 'Pending', '2024-07-13 16:24:24', NULL),
(65, '1', 'Pending', '2024-07-13 16:24:29', NULL),
(66, '1', 'Pending', '2024-07-13 16:24:33', NULL),
(67, '1', 'Pending', '2024-07-13 16:24:37', NULL),
(68, '1', 'Pending', '2024-07-13 16:24:41', NULL),
(69, '1', 'Pending', '2024-07-13 16:24:45', NULL),
(70, '1', 'Pending', '2024-07-13 16:24:49', NULL),
(71, '1', 'Pending', '2024-07-13 16:24:54', NULL),
(72, '1', 'Pending', '2024-07-13 16:24:58', NULL),
(73, '1', 'Pending', '2024-07-13 16:25:02', NULL),
(74, '1', 'Pending', '2024-07-13 16:27:02', NULL),
(75, '1', 'Pending', '2024-07-13 16:29:20', NULL),
(76, '1', 'Pending', '2024-07-13 16:46:02', NULL),
(77, '1', 'Pending', '2024-07-13 16:46:39', NULL),
(78, '1', 'Pending', '2024-07-13 16:46:50', NULL),
(79, '1', 'Pending', '2024-07-13 16:47:22', NULL),
(80, '1', 'Pending', '2024-07-13 16:47:32', NULL),
(81, '1', 'Pending', '2024-07-13 16:47:49', NULL),
(82, '1', 'Pending', '2024-07-13 16:48:43', NULL),
(83, '1', 'Pending', '2024-07-13 16:49:32', NULL),
(84, '1', 'Pending', '2024-07-13 16:51:20', NULL),
(85, '1', 'Pending', '2024-07-13 16:51:27', NULL),
(86, '1', 'Pending', '2024-07-13 16:53:00', NULL),
(87, '1', 'Pending', '2024-07-13 16:53:30', NULL),
(88, '1', 'Pending', '2024-07-13 16:53:36', NULL),
(89, '1', 'Pending', '2024-07-13 16:54:12', NULL),
(90, '1', 'Pending', '2024-07-13 16:54:33', NULL),
(91, '1', 'Pending', '2024-07-13 16:56:15', NULL),
(92, '1', 'Pending', '2024-07-13 16:58:09', NULL),
(93, '1', 'Pending', '2024-07-13 16:58:16', NULL),
(94, '1', 'Pending', '2024-07-13 17:00:08', NULL),
(95, '1', 'Pending', '2024-07-13 17:03:04', NULL),
(96, '1', 'Pending', '2024-07-13 17:03:44', NULL),
(97, '1', 'Pending', '2024-07-13 17:07:48', NULL),
(98, '1', 'Pending', '2024-07-13 17:26:26', NULL),
(99, '1', 'Pending', '2024-07-13 17:28:28', NULL),
(100, '1', 'Pending', '2024-07-13 17:30:59', NULL),
(101, '1', 'Pending', '2024-07-13 17:31:51', NULL),
(102, '1', 'Pending', '2024-07-13 17:33:01', NULL),
(103, '1', 'Pending', '2024-07-13 17:33:50', NULL),
(104, '1', 'Pending', '2024-07-13 17:34:07', NULL),
(105, '1', 'Pending', '2024-07-13 17:37:16', NULL),
(106, '1', 'Pending', '2024-07-13 17:37:28', NULL),
(107, '1', 'Pending', '2024-07-13 18:01:41', NULL),
(108, '2', 'Pending', '2024-07-14 11:45:05', NULL),
(109, '1', 'Pending', '2024-07-14 16:20:08', NULL),
(110, '1', 'Pending', '2024-07-14 16:38:55', NULL),
(111, '2', 'Pending', '2024-07-14 16:57:28', NULL),
(112, '1', 'Pending', '2024-07-14 17:03:15', NULL),
(113, '1', 'Pending', '2024-07-15 13:35:06', NULL),
(114, '1', 'Pending', '2024-07-16 11:39:10', NULL),
(115, '1', 'Pending', '2024-07-17 17:20:27', NULL),
(116, '1', 'Pending', '2024-07-17 17:37:14', NULL),
(117, '1', 'Pending', '2024-07-17 17:37:43', NULL),
(118, '2', 'Pending', '2024-07-17 17:50:04', NULL),
(119, '1', 'Pending', '2024-07-17 18:04:11', NULL),
(120, '1', 'Pending', '2024-07-17 19:46:43', NULL),
(121, '2', 'Pending', '2024-07-17 19:58:24', NULL),
(122, '2', 'Pending', '2024-07-17 19:58:54', NULL),
(123, '2', 'Pending', '2024-07-17 19:59:10', NULL),
(124, '2', 'Pending', '2024-07-17 19:59:26', NULL),
(125, '1', 'Pending', '2024-07-17 20:00:25', NULL),
(126, '1', 'Pending', '2024-07-17 20:00:42', NULL),
(127, '1', 'Pending', '2024-07-17 20:02:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_storage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `product_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `product_import` varchar(250) DEFAULT NULL,
  `product_sold` int(11) DEFAULT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_img`, `product_storage`, `product_color`, `product_status`, `created_at`, `updated_at`, `product_import`, `product_sold`, `product_quantity`) VALUES
(6, 'iPhone 14 Pro Max 128GB', 1, 10, 'iPhone 14 Pro Max. Bắt trọn chi tiết ấn tượng với Camera Chính 48MP. Trải nghiệm iPhone theo cách hoàn toàn mới với Dynamic Island và màn hình Luôn Bật. Công nghệ an toàn quan trọng – Phát Hiện Va Chạm  thay bạn gọi trợ giúp khi cần kíp', 'iPhone 14 Pro Max Vượt trội', '27890000', 'iphone-14-pro-max-128gb4.jpg', '128GB', 'Gold', 1, '2024-06-24 17:58:16', NULL, '26390000', 0, 20),
(8, 'iPhone 14 128GB', 1, 10, 'iPhone 14. Với hệ thống camera kép tiên tiến nhất từng có trên iPhone. Chụp những bức ảnh tuyệt đẹp trong điều kiện từ thiếu sáng đến dư sáng. Phát hiện Va Chạm, một tính năng an toàn mới, thay bạn gọi trợ giúp khi cần kíp.', 'iPhone 14. Một trời tính năng tuyệt vời.', '19790000', 'iphone-14-128gb5.jpg', '64GB', 'Red', 1, '2024-06-24 18:00:30', NULL, '18290000', 0, 20),
(10, 'iPad Pro M2', 6, 22, 'iPad Pro. Với hiệu năng ấn tượng, kết nối không dây siêu nhanh và trải nghiệm Apple Pencil thế hệ mới. Cùng với các tính năng mới mạnh mẽ cho hiệu suất công việc và cộng tác ở iPadOS 16. iPad Pro đem đến trải nghiệm iPad cực đỉnh.', 'iPad Pro. Siêu mạnh mẽ với M2.', '28490000', 'iPadProM263.jpg', '128GB', 'Silver', 1, '2024-06-25 17:11:04', NULL, '26990000', 0, 20),
(12, 'iPad Pro M1', 6, 22, 'Chiếc iPad đỉnh cao với chip Apple M1 siêu mạnh, màn hình Liquid Retina XDR 12.9 inch sống động, kết nối không dây siêu nhanh. Thắt dây an toàn vào đi nào.', 'iPad Pro 12.9 inch (2021)', '29950000', 'ipad-M1-512gb89.jpg', '512GB', 'Space Gray', 1, '2024-06-25 17:18:01', NULL, '28450000', 0, 20),
(13, 'iPad Air 5', 6, 22, 'iPad Air. Với màn hình Liquid Retina 10.9 inch sống động. Chip Apple M1 đột phá cho hiệu năng nhanh hơn, giúp iPad Air trở nên siêu mạnh mẽ để sáng tạo và chơi game di động. Sở hữu Touch ID, camera tiên tiến, 5G và Wi-Fi 6 nhanh như chớp, cổng USB-C, cùng khả năng hỗ trợ Magic Keyboard và Apple Pencil (thế hệ thứ 2).', 'iPad Air 5 (2022)', '14490000', 'ipad-air44.jpg', '64GB', 'Space Gray', 1, '2024-06-25 17:19:10', NULL, '12990000', 0, 20),
(14, 'iPad mini 6', 6, 22, 'iPad mini mới. Thiết kế màn hình toàn phần với màn hình Liquid Retina 8.3 inch. Chip A15 Bionic mạnh mẽ với Neural Engine. Camera trước Ultra Wide 12MP với tính năng Trung Tâm Màn Hình. Cổng kết nối USB-C.', 'iPad mini 6 (2021)', '12390000', 'ipad-mini45.jpg', '64GB', 'Space Gray', 1, '2024-06-25 17:20:03', NULL, '10890000', 0, 20),
(15, 'MacBook Pro M1 2020', 2, 15, 'Thay đổi ngoạn mục nhờ chip Apple M1, với sức mạnh xử lý tăng thêm đến 2.8x, tốc độ xử lý đồ họa nhanh hơn 5x. Và thời lượng pin lên đến 20 giờ, thời lượng pin lâu nhất trong các dòng máy tính Mac từ trước đến nay. Để bạn có thể tiến xa trong công việc, dù đi bất kỳ nơi đâu.', 'MacBook Pro M1', '28550000', 'mac-pro-m199.jpg', '256GB', 'Space Gray', 1, '2024-06-25 17:20:47', NULL, '27050000', 0, 20),
(16, 'MacBook Air M1', 2, 15, 'Là máy tính xách tay mỏng và nhẹ nhất của Apple – nay thay đổi ngoạn mục với chip Apple M1 mạnh mẽ. Tạo ra một cú nhảy vọt về hiệu năng CPU và đồ họa, cùng thời lượng pin lên đến 18 giờ.', 'MacBook Air M1', '19790000', '0006171_gold_55076.webp', '256GB', 'Gold', 1, '2024-06-25 17:23:41', NULL, '18290000', 0, 20),
(19, 'Apple Watch Ultra LTE 49mm Alpine Loop size S', 5, 41, 'Các tính năng và cảm biến chuyên dụng, cùng với ba dây đeo mới được thiết kế cho các hoạt động khám phá, phiêu lưu, và rèn luyện sức bền\r\nVỏ titan hàng không chuyên dụng 49mm cân bằng hoàn hảo giữa các yêu cầu về trọng lượng, độ bền và khả năng chống ăn mòn', 'Apple Watch Ultra LTE', '20390000', 'watchultra47.jpg', '49mm', 'Orange', 1, '2024-06-26 17:29:04', NULL, '18890000', 0, 20),
(20, 'Apple Watch Series 8 Thép GPS + Cellular', 5, 41, 'Sở hữu các cảm biến và ứng dụng sức khỏe tối tân, vì vậy bạn có thể đo điện tâm đồ (ECG),1 đo nhịp tim và nồng độ oxy trong máu,2 theo dõi sự thay đổi nhiệt độ3 để nắm bắt thông tin chuyên sâu về chu kỳ kinh nguyệt.', 'Apple Watch Series 8 (GPS + Cellular)', '17990000', 'watch820.jpg', '41mm', 'Silver', 1, '2024-06-26 17:30:20', NULL, '16490000', 0, 20),
(21, 'Apple Watch Series 7 Nhôm GPS + Cellular', 5, 41, 'Màn hình Retina Luôn Bật lớn nhất, tiên tiến nhất giúp mọi tác vụ bạn thực hiện với Apple Watch Series 7 trông lớn hơn và đẹp hơn.', 'Apple Watch Series 7 (GPS)', '10990000', 'watch71.jpg', '41mm', 'Red', 1, '2024-06-26 17:31:14', NULL, '9490000', 0, 20),
(22, 'Apple Watch SE Nhôm 2022 GPS', 5, 26, 'Các tính năng mới hoàn toàn. Giá vẫn nhẹ nhàng. Các tính năng thiết yếu giúp bạn luôn kết nối, năng động, khỏe mạnh, và an toàn.', 'Apple Watch SE 2022 Nhôm GPS', '6190000', 'watch665.jpg', '40mm', 'Starlight', 1, '2024-06-26 17:32:04', NULL, '4690000', 0, 20),
(23, 'Iphone 11', 1, 10, 'Apple đã chính thức trình làng bộ 3 siêu phẩm iPhone 11, trong đó phiên bản iPhone 11 64GB có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như iPhone Xr ra mắt trước đó.', 'iPhone 11 mạnh mẽ', '8590000', 'iphone-11.jpg', '64GB', 'Trắng', 1, '2024-06-27 23:13:11', NULL, '7090000', 0, 20),
(24, 'Samsung Galaxy S24 Ultra', 1, 28, 'Samsung Galaxy S24 Ultra 1TB – Siêu phẩm dành cho những người đam mê công nghệ\r\nSiêu phẩm AI smartphone S24 Ultra được Samsung trang bị những công nghệ và tính năng hàng đầu. Với màn hình lớn, cấu hình mạnh mẽ, camera đỉnh cao và dung lượng lưu trữ khủng, sản phẩm hứa hẹn sẽ là một lựa chọn hoàn hảo cho những người đam mê công nghệ.', 'Samsung Galaxy S24 Ultra 1TB là chiếc smartphone flagship mới của nhà Samsung với màn hình Dynamic AMOLED 2X, mang đến trải nghiệm giải trí đỉnh cao. Máy cũng được trang bị con chip Snapdragon 8 Gen 3 for Galaxy, đi kèm với RAM 12GB và bộ nhớ trong lên tới 1TB. Hệ thống camera của S24 Ultra cũng được nâng cấp đáng kể với camera chính 200MP, mang lại khả năng nhiếp ảnh tuyệt vời.', '38490000', 'ss-s24.jpg', '12GB 1TB', 'Đen', 1, '2024-06-29 21:10:54', NULL, '36990000', 0, 20),
(25, 'Samsung Galaxy S23 Ultra', 1, 28, 'Samsung Galaxy S23 Ultra 12GB 512GB - Hiển thị sắc nét, cấu hình đỉnh cao\r\nSmartphone cao cấp nhất của tập đoàn Samsung trong năm 2023 được nhiều người bình chọn là phân khúc Samsung Galaxy S23 Ultra. Bứt phá mọi giới hạn hiệu năng với vi xử lý Snapdragon 8 Gen 2 đỉnh cao cùng khả năng hiển thị hình ảnh sắc nét trong từng chi tiết điểm ảnh, Galaxy S23 Ultra mang tới trải nghiệm sử dụng siêu mượt mà, dễ dàng làm hài lòng những người dùng khó tính nhất', 'Samsung Galaxy S23 Ultra 12GB 512GB tạo nên đột phá mạnh mẽ về mặt hiệu năng khi được trang bị vi xử lý Snapdragon 8 Gen 2 vượt trội cùng 12GB bộ nhớ RAM.', '27990000', 's23-ultra-xanh.jpg', '12GB 512GB', 'Xanh', 1, '2024-06-30 13:50:40', NULL, '26490000', 0, 20),
(26, 'Xiaomi 14', 1, 29, 'Điện thoại mi 14 chính hãng nổi bật với những ưu điểm đáng chú ý như màn hình AMOLED 6.36-inch có tốc độ làm mới 120Hz, bộ vi xử lý Qualcomm Snapdragon 8 Gen 3 siêu mạnh mẽ, và hệ thống ba camera sau với cảm biến chính 50MP. Thông qua đó, Xiaomi thế hệ thứ 14 có thể cung cấp trải nghiệm người dùng cực mượt mà và chất lượng hình ảnh xuất sắc.', 'Xiaomi 14 5G mang trên mình màn hình OLED 6.36-inch, cùng với bộ vi xử lý Qualcomm Snapdragon 8 Gen 3, làm nên một cấu hình siêu mạnh mẽ cho người dùng.', '19990000', 'xiaomi-14.jpg', '12GB 256GB', 'Trắng', 1, '2024-06-30 14:01:25', NULL, '18490000', 0, 20),
(27, 'Xiaomi Redmi Note 13 Pro', 1, 29, 'Chip Dimensity 7200 Ultra sở hữu đáng mong đợi\r\nRedmi Note 13 Pro + 5G được trang bị bộ vi xử lý Dimensity 7200 Ultra với khả năng xử lý mạnh mẽ, mở ra những trải nghiệm hiệu năng không giới hạn. Đây được đánh giá là sự kết hợp đi kèm các lõi xử lý mạnh mẽ đi kèm các phát minh mới update cho máy ngày càng trở nên mượt mà.', 'Xiaomi Redmi Note 13 Pro Plus sở hữu màn hình rộng 6.67 inch, trang bị bộ vi xử lý Dimensity 7200 đem lại hiệu năng kinh ngạc.', '9290000', 'xiaomi-redmi-note-13-pro-plus_5.jpg', '256GB', 'Tím', 1, '2024-06-30 14:05:58', NULL, '7790000', 0, 20),
(28, 'Samsung Galaxy Tab S9', 6, 32, 'Samsung Galaxy Tab S9 - Máy tính bảng bình dân với chất lượng vượt trội\r\nSamsung Galaxy Tab S9 là thế hệ máy tính bảng tiếp theo của “ông lớn” trong ngành công nghệ Samsung. Đây là thiết bị kế thừa dòng máy Galaxy Tab S8 đã được ra mắt trước đó. Trong phiên bản mới nhất này, Samsung sẽ có nhiều nâng cấp cho sản phẩm của mình', 'Samsung Galaxy Tab S9 8GB 128GB với màn hình kích thước 11 inch tấm nền Dynamic AMOLED 2X cùng bút SPEN, người dùng có thể thỏa sức học tập và sáng tạo trên màn hình.', '22490000', 'ss-tab-s9.jpg', '128GB', 'Trắng', 1, '2024-06-30 14:30:06', NULL, '20990000', 0, 20),
(29, 'Xiaomi Pad 6', 6, 33, 'Dung lượng pin lớn 8840 mAh - Đáp ứng tốt được nhu cầu làm việc cả ngày dài.\r\nThoải thích đắm chìm trong các bộ phim với màn hình hiển thị sắc nét độ phân giải 2,8K; mượt mà với tốc độ làm mới 144Hz.\r\nTận hưởng âm thanh thực sự đắm chìm với Quad Speakers cùng ánh xạ kênh giúp điều chỉnh đầu ra âm thanh theo hướng màn hình của bạn.', 'Thiết kế kim loại nguyên khối - Nhỏ gọn, sang trọng với hai gam màu hiện đại.\r\nSnapdragon 870 - Hiệu suất cao hàng đầu trong phân khúc.', '8790000', 'ipad-xiaomi.jpg', '8GB/256GB', 'Trắng', 1, '2024-06-30 14:42:59', NULL, '7290000', 0, 20),
(30, 'Lenovo Tab M11', 6, 35, 'Máy tính bảng Lenovo Tab M11 - Sang trọng, mạnh mẽ\r\nPhiên bản tablet Lenovo Tab M11 nổi bật với thiết kế gọn nhỏ, cấu hình mạnh mẽ. Chính những đặc trưng này mà thiết bị là lựa chọn phù hợp cho mọi đối tượng từ học sinh, sinh viên đến dân văn phòng.', 'Màn hình IPS LCD, 11 inch, độ phân giải cao - Cho hình ảnh sắc nét và màu sắc chân thực, góc nhìn hình ảnh rộng.\r\nĐáp ứng tốt các nhu cầu đa nhiệm và giải trí với chipset MediaTek Helio G88 và GPU Mali-G52 MC2.', '6490000', 'may-tinh-bang-lenovo.jpg', '8GB/128GB', 'Đen', 1, '2024-06-30 14:49:27', NULL, '4990000', 0, 20),
(31, 'Asus ROG Zephyrus M16', 2, 36, 'Laptop Asus ROG Zephyrus M16 GU604VI-NM779W - Tận hưởng hiệu suất mạnh mẽ và ổn định\r\nLaptop Asus ROG Zephyrus M16 GU604VI-NM779W không chỉ đáp ứng đầy đủ các tiêu chí hiển thị của người dùng đặt ra mà còn mang đến sức mạnh đồ họa đỉnh cao. Là một game thủ chắc hẳn bạn sẽ không thể bỏ qua sản phẩm laptop Asus gaming cao cấp mới', 'Sở hữu thiết kế mạnh mẽ với lớp vỏ màu đen cá tính\r\nCPU Intel Core i9-13900H cân mọi tác vụ học tập, văn phòng\r\nRAM DDR5 4800Mhz tăng tốc độ xử lý mọi tác vụ từ gaming, duyệt web và giải trí', '67890000', 'laptopassus.jpg', '12GB/1TB', 'Đen', 1, '2024-06-30 15:23:27', NULL, '66390000', 0, 20),
(32, 'Lenovo V14 G4', 2, 37, 'Laptop Lenovo V14 G4 AMN 82YT00M8VN sở hữu hiệu năng mạnh mẽ khi được trang bị con chip Ryzen 5 7520U, 16GB RAM và 512GB dung lượng bộ nhớ. Với màn hình 14 inch Full HD, sản phẩm laptop Lenovo V này không chỉ mang tới sự nhỏ gọn, cơ động mà còn có được chất lượng hình ảnh sắc nét. Thiết kế tối giản, lịch sự của laptop V14 G4 AMN 82YT00M8VN cùng độ bền chuẩn quân đội sẽ phù hợp để người dùng tiện lợi mang theo và sử dụng ở bất kỳ nơi đâu', 'ĐẶC ĐIỂM NỔI BẬT\r\nCPU AMD Ryzen 5 7520U cung cấp hiệu suất đủ mạnh để xử lý các tác vụ hàng ngày và văn phòng một cách mượt mà\r\nBộ nhớ RAM lên đến 16GB và ổ cứng SSD PCIe 512GB, cung cấp không gian lưu trữ đủ rộng rãi và tốc độ truy cập nhanh cho người dùng', '19990000', 'laptop-lenovo-v14.jpg', '16GB/512GB', 'Đen', 1, '2024-06-30 15:29:42', NULL, '18490000', 0, 20),
(33, 'Acer Nitro 5 Tiger', 2, 40, 'Laptop Acer Nitro 5 Tiger AN515-58-52SP - Thủ lĩnh laptop gaming\r\nLaptop Acer Nitro 5 Tiger AN515-58-52SP mang vẻ ngoài phong thái sắc sảo, tích hợp hàng loạt công nghệ phần mềm đời mới và đặc biệt là bộ vi xử lý Intel ổn định. Chứa đựng hiệu năng siêu vượt trội đã góp phần làm nên chiếc laptop Acer Nitro 5 dẫn đầu phân khúc.', 'ĐẶC ĐIỂM NỔI BẬT\r\nChip Core i5-12500H cùng card rời RTX 3050 cho khả năng chiến các tựa game nặng, chỉnh sửa hình ảnh trên PTS, Render video ngắn mượt mà.\r\nRam 8GB, ổ cứng SSD 512GB mang đến tốc độ xử lý nhanh cùng đa nhiệm mượt mà.\r\nMàn hình 15.6 inch độ phân giải Full HD, mang lại chất lượng hiển thị sắc nét.', '20990000', 'acernitro5.jpg', '8GB/512GB', 'Đen', 1, '2024-06-30 15:38:46', NULL, '19490000', 0, 20),
(34, 'HP Victus 15-FA1155TX', 2, 38, 'Laptop HP Victus 15-FA1155TX 952R1PA - Cấu hình ấn tượng với thiết kế bắt mắt\r\nLaptop HP Victus 15-FA1155TX 952R1PA thuộc bộ sưu tập các sản phẩm dành cho game thủ khi có hiệu năng vượt trội cùng nhiều công nghệ tiên tiến. Điểm đặc biệt ở dòng máy là sở hữu công nghệ kết nối Wifi 6 hiện đại giúp bạn kết nối mạng nhanh chóng. Ngoại hình của laptop cũng được đánh giá cao khi được hoàn thiện với kiểu dáng sang trọng.', 'ĐẶC ĐIỂM NỔI BẬT\r\nSở hữu thiết kế thời thượng, màu sắc sang trọng, phù hợp sử dụng cho cả nam và nữ.\r\nCPU Intel Core i5 12450H xử lý nhanh gọn mọi tác vụ học tập, văn phòng.\r\nCard đồ họa Nvidia GeForce RTX 2050 4GB GDDR6 cân mọi tựa game phổ biến hiện nay.', '17990000', 'Hp.jpg', '8GB/512GB', 'Trắng', 1, '2024-06-30 15:40:35', NULL, '16490000', 0, 20),
(35, 'Dell Inspiron', 2, 39, 'Laptop Dell Inspiron 7506-5903SLV - Laptop văn phòng với khả năng hoạt động vượt trội\r\nLaptop DELL Inspiron 7506-5903SLV là sự lựa chọn hoàn hảo cho những bạn đang tìm kiếm một thiết bị có thể xử lý tốt các tác vụ văn phòng, cũng như phục vụ công việc thiết kế ảnh, video cơ bản. Laptop Dell Inspiron sở hữu bộ cấu hình ấn tượng với màn hình rộng, thiết bị sẽ giúp tiến trình công việc của bạn trở nên dễ dàng hơn rất nhiều.', 'ĐẶC ĐIỂM NỔI BẬT\r\nMàn hình 15.6 inch cho góc nhìn rộng hơn cùng công nghệ Anti Glare hạn chế tình trạng chói, lóa.\r\nCPU Intel Core i5-1135G7 cho khả năng xử lý nhanh gọn, hiệu quả các tác vụ văn phòng.\r\nCard đồ họa Intel Iris Xe graphics đáp ứng đầy đủ nhu cầu lướt web, xem phim, thiết kế cơ bản trên Photoshop, Canva,...', '17990000', 'dell.jpg', '8GB/256GB', 'Đen', 1, '2024-06-30 15:43:15', NULL, '16490000', 0, 20),
(37, 'Samsung Galaxy Watch6 Classic 47mm Bluetooth', 5, 42, 'Galaxy Watch6 Classic sở hữu một thiết kế cổ điển với màn hình 47mm, kích thước 1,47 inch với tấm nền AMOLED mang lại khả năng hiển thị các nội dung rõ nét. Đồng hồ thông minh Samsung Watch6 Classic với khung thép không gỉ bền bỉ cùng với đó là nhiều tính năng theo dõi sức khỏe thông minh (SpO2, nhịp thở, nhịp tim,...) cùng đó là khả năng theo dõi chỉ số tập luyện với 95 bộ môn thể thao.', 'ĐẶC ĐIỂM NỔI BẬT\r\nTính năng theo dõi giấc ngủ giúp bạn có thể phân tích và hiểu rõ hơn về thói quen ngủ của mình\r\nĐột phá công nghệ theo dõi sức khoẻ với khả năng phân tích thành phần cơ thể, đo huyết áp', '7990000', 'dhsamsung22.jpg', '40mm', 'Đen', 1, '2024-06-30 16:00:23', NULL, '6490000', 0, 20),
(38, 'Huawei Watch GT4 dây silicone', 5, 44, 'Đồng hồ thông minh Huawei Watch GT4 dây silicone thời trang, hiện đại và đa năng\r\nĐồng hồ thông minh Huawei Watch GT4 dây silicone là một chiếc smartwatch đáng sở hữu với thiết kế thời trang phù hợp với cả nam và nữ. Bên cạnh đó, với cảm biến thông minh kết hợp công nghệ HUAWEI TruSeen giúp bạn dễ dàng theo dõi các chỉ số sức khỏe chính xác.', 'ĐẶC ĐIỂM NỔI BẬT\r\nTrang bị thời lượng sử dụng lên đến 14 ngày giúp bạn không lo hết pin giữa chừng\r\nTích hợp hơn 100 chế độ luyện tập để bạn thỏa sức tập luyện', '4290000', 'đhhuawe.jpg', '45mm', 'Đen', 1, '2024-06-30 16:09:14', NULL, '2790000', 0, 20),
(39, 'Đồng hồ thông minh Coros Pace 2', 5, 45, 'Coros Pace 2 là lựa chọn hoàn hảo cho các vận động viên đang tìm kiếm một chiếc đồng hồ GPS thể thao nhẹ, bền và có nhiều tính năng. Thời lượng pin lên đến 30 giờ với GPS hoạt động liên tục. Bên cạnh đó còn hỗ trợ theo dõi nhịp tim, độ cao, khí áp, thời tiết, giấc ngủ cùng nhiều tính năng nổi bật khác.', 'ĐẶC ĐIỂM NỔI BẬT\r\nHoạt động liên tục - trong 30 giờ với chế độ GPS, 20 ngày sử dụng khi theo dõi nhịp tim và giấc ngủ\r\nThiết kế núm vặn - phép kiểm tra nhịp tim hay bài tập tiếp theo chỉ với 1 cái gạt tay\r\nNhìn rõ cả trong màn đêm - Night mode cho phép màn hình luôn sáng mà vẩn tiết kiệm pin', '5000000', 'coros.jpg', '42mm', 'Trắng', 1, '2024-06-30 16:11:34', NULL, '3500000', 0, 20),
(40, 'Đồng hồ thông minh Garmin Forerunner 55', 5, 46, 'Đồng hồ thông minh Garmin Forerunner 55 – Em út nhà Garmin\r\nBạn đã quá quen thuộc với các thiết bị đồng hồ đeo tay cao cấp đắt tiền của Garmin, nhưng lần này còn gì tuyệt hơn khi bạn được trải nghiệm toàn bộ tính năng hấp dẫn trên chiếc đồng hồ thông minh Garmin Forerunner 55 với sở hữu mức giá chỉ rơi vào từ 200 đô.', 'ĐẶC ĐIỂM NỔI BẬT\r\nĐưa ra gợi ý luyện tập hằng ngày dựa trên các chỉ số sức khoẻ\r\nMàn hình công nghệ MIP cho phép nhìn rõ dưới ánh sáng mặt trời\r\nSử dụng đến 2 tuần với chết độ thông minh,20 giờ với chế độ GPS', '5590000', 'garmin_15_.jpg', '44mm', 'Đen', 1, '2024-06-30 16:15:46', NULL, '4090000', 0, 20),
(41, 'Pin sạc dự phòng Xiaomi 20.000mAh 50W PB200SZM', 13, 47, 'Một sản phẩm phụ kiện vừa có dung lượng pin trữ cao, vừa có công suất sạc nhanh như pin sạc dự phòng Xiaomi PB200SZM 20.000mAh 50W sẽ là “cứu tinh” cho người dùng công nghệ ở mọi thời điểm trong ngày. Tìm hiểu ngay pin dự phòng Xiaomi với các thông tin dưới đây!', 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế linh hoạt, gọn nhẹ thuận tiện bỏ túi mà không chiếm quá nhiều diện tích\r\nCông suất đầu ra lên đến 50 W, hỗ trợ sạc nhanh cho nhiều thiết bị kể cả laptop\r\nTích hợp chip mạch hiện đại giúp nâng cao hiệu suất sạc, ổn định điện áp đầu ra\r\nTrang bị 3 cổng đầu ra gồm 2 x USB-C và USB A, tương thích với nhiều thiết bị', '1310000', 'sacxiaomi.jpg', '20.000mAh', 'Đen', 1, '2024-07-09 17:12:44', NULL, '1160000', 0, 20),
(42, 'Pin dự phòng Baseus Free2Pull 10000mAh 30W', 13, 47, 'Pin sạc dự phòng Baseus Free2 10000mAH kèm cáp 30W cho phép sạc nhiều thiết bị khác nhau với tận 2 cổng ra USB-C và USB-A với công suất tối đa 30W. Mẫu pin sạc có dung lượng 10000mAH sạc được nhiều lần. Bên cạnh đó, Baseus Free2Pull còn có thiết kế nhỏ gọn với cáp sạc có thể thu gọn vô cùng tiện lợi.', 'ĐẶC ĐIỂM NỔI BẬT\r\nDung lượng lớn: Cung cấp năng lượng dự phòng cho nhiều thiết bị di động.\r\nSạc nhanh 30W: Sạc thiết bị hiệu quả, tiết kiệm thời gian.\r\nCáp thu gọn: Tiện lợi cho việc mang theo và không chiếm nhiều không gian.\r\nĐa năng: Sạc được nhiều thiết bị khác nhau, từ điện thoại đến máy ảnh.', '1100000', 'pin-sac-du-phong-baseus.jpg', '10000mAh', 'Đen', 1, '2024-07-09 17:20:27', NULL, '950000', 0, 20),
(43, 'Camera IP hồng ngoại Wifi Ezviz C6N 1080p 2MP', 14, 53, 'Để tăng khả năng giám sát cả bên trong & bên ngoài căn nhà, bạn hãy sở hữu ngay camera Ezviz chất lượng. Với khả năng quan sát hồng ngoại 360 độ, camera Ezviz C6N 1080p 2MP sẽ giúp bạn theo dõi căn nhà của mình một cách trọn vẹn, bất kể ban ngày hay ban đêm.', 'ĐẶC ĐIỂM NỔI BẬT\r\nCamera ghi lại mọi chi tiết ở độ phân giải 1080p rõ nét\r\nQuay và Quét: ngang 340 độ, dọc 55 độ, chéo 85 độ\r\nChế độ tầm nhìn ban đêm thông minh với Smart IR\r\nTự động theo dõi khi phát hiện một vật thể chuyển động và báo động\r\nm thanh 2 chiều giúp giao tiếp với người khác bằng micrô và loa tích hợp\r\nHỗ trợ lưu trữ nội bộ với thẻ SD 256GB hoặc lưu trữ đám mây EZVIZ Cloud', '390000', 'camera.jpg', '1080p', 'Trắng', 1, '2024-07-11 16:45:17', NULL, '240000', 0, 20),
(44, 'Camera IP Wifi Ezviz TY1 Pro 4MP', 14, 53, 'Camera IP Wifi EZVIZ TY1 Pro 4MP là một camera an ninh thông minh có khả năng quay 360° và cung cấp hình ảnh cực kỳ chi tiết với độ phân giải 2K. Với chế độ quay tự động và khả năng nhận diện hoạt động của con người, đảm bảo không có góc khuất nào trong nhà. Camera cũng có khả năng phóng to và theo dõi người di chuyển. Camera cũng cung cấp hình ảnh rõ nét ban đêm và kết nối Wi-Fi ổn định. Với công nghệ nén video H.265, các file video được giảm kích thước, tiết kiệm không gian lưu trữ.', 'ĐẶC ĐIỂM NỔI BẬT\r\nLưu mọi khoảnh khắc với dung lượng 512GB trên thẻ nhớ MicroSD, xem trực tiếp có thể zoom 8X\r\nLoại bỏ tự động các điểm mù với chế độ tuần tra độc đáo, xoay ngang 340 độ và xoay dọc 55 độ\r\nCó nút gọi trực tiếp trên camera, có thể đàm thoại 2 chiều, nhận các thông báo quan trọng từ xa\r\nĐem lại hình ảnh rõ nét cả vào ban đêm với ghi màu thông minh lên tới 5 mét và chụp ảnh 10 mét', '650000', 'camera2.jpg', '2K', 'Trắng', 1, '2024-07-11 16:47:17', NULL, '500000', 0, 20),
(45, 'Tai nghe Bluetooth Apple AirPods Pro 2 2024', 14, 52, 'Airpods Pro 2 Type-C với công nghệ khử tiếng ồn chủ động mang lại khả năng khử ồn lên gấp 2 lần mang lại trải nghiệm nghe - gọi và trải nghiệm âm nhạc ấn tượng. Cùng với đó, điện thoại còn được trang bị công nghệ âm thanh không gian giúp trải nghiệm âm nhạc thêm phần sống động. Airpods Pro 2 Type-C với cổng sạc Type C tiện lợi cùng viên pin mang lại thời gian trải nghiệm lên đến 6 giờ tiện lợi.', 'ĐẶC ĐIỂM NỔI BẬT\r\nTích hợp chip Apple H2 mang đến chất âm sống động cùng khả năng tái tạo âm thanh 3 chiều vượt trội\r\nCông nghệ Bluetooth 5.3 kết nối ổn định, mượt mà, tiêu thụ năng lượng thấp, giúp tiết kiệm pin đáng kể\r\nChống ồn chủ động loại bỏ tiếng ồn hiệu quả gấp đôi thế hệ trước, giúp nâng cao trải nghiệm nghe nhạc\r\nChống nước chuẩn IP54 trên tai nghe và hộp sạc, giúp bạn thỏa sức tập luyện không cần lo thấm mồ hôi', '5750000', 'appleairpods.jpg', '6h', 'Trắng', 1, '2024-07-11 22:37:59', NULL, '4250000', 0, 20),
(46, 'SẠC APPLE IPHONE', 13, 49, 'Công suất 20W và công nghệ PD vừa nhanh, vừa an toàn\r\nCủ sạc Apple chính hãng có độ bền vượt trội, lâu dài', 'ĐẶC ĐIỂM NỔI BẬT\r\nSở hữu thiết kế thanh lịch với tone màu trắng nhẹ nhàng\r\nTích hợp 2 cổng Type-C phù hợp với nhiều thiết bị Apple', '490000', '1721108552.jpg', '20W', 'Trắng', 1, '2024-07-16 12:42:32', NULL, '590000', NULL, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_province`
--

CREATE TABLE `tbl_province` (
  `province_id` int(5) NOT NULL,
  `province_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `shipping_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `shipping_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `shipping_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `shipping_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `shipping_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_phone`, `shipping_note`, `created_at`, `updated_at`) VALUES
(107, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam', '0706812610', NULL, '2024-07-13 18:01:41', NULL),
(108, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam', '0706812610', NULL, '2024-07-14 11:45:05', NULL),
(109, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam', '0706812610', NULL, '2024-07-14 16:20:08', NULL),
(110, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam', '0706812610', NULL, '2024-07-14 16:38:54', NULL),
(111, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam', '0706812610', NULL, '2024-07-14 16:57:28', NULL),
(112, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam', '0706812610', NULL, '2024-07-14 17:03:15', NULL),
(113, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam', '0706812610', NULL, '2024-07-15 13:35:06', NULL),
(114, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam, 84+', '0706812610', NULL, '2024-07-16 11:39:10', NULL),
(115, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam, 84+', '0706812610', NULL, '2024-07-17 17:20:27', NULL),
(116, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam, 84+', '0706812610', NULL, '2024-07-17 17:37:14', NULL),
(117, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam, 84+', '0706812610', NULL, '2024-07-17 17:37:43', NULL),
(118, 'TranThuan', 'thuantrantv201002@gmail.com', 'Trà Vinh, Việt Nam, 84+', '0706812610', NULL, '2024-07-17 17:50:04', NULL),
(119, 'huy123', 'huy536739@gmail.com', 'Càng Long', '0123456789', NULL, '2024-07-17 18:04:11', NULL),
(120, 'huy123', 'huy536739@gmail.com', 'Càng Long', '0123456789', NULL, '2024-07-17 19:46:43', NULL),
(121, 'huy123', 'huy536739@gmail.com', 'Càng Long', '0123456789', NULL, '2024-07-17 19:58:24', NULL),
(122, 'huy123', 'huy536739@gmail.com', 'Càng Long', '0123456789', NULL, '2024-07-17 19:58:54', NULL),
(123, 'huy123', 'huy536739@gmail.com', 'Càng Long', '0123456789', NULL, '2024-07-17 19:59:10', NULL),
(124, 'huy123', 'huy536739@gmail.com', 'Càng Long', '0123456789', NULL, '2024-07-17 19:59:26', NULL),
(125, 'huy123', 'huy536739@gmail.com', 'Càng Long', '0123456789', NULL, '2024-07-17 20:00:25', NULL),
(126, 'huy123', 'huy536739@gmail.com', 'Càng Long', '0123456789', NULL, '2024-07-17 20:00:42', NULL),
(127, 'huy123', 'huy536739@gmail.com', 'Càng Long', '0123456789', NULL, '2024-07-17 20:02:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_statistical`
--

CREATE TABLE `tbl_statistical` (
  `id_statistical` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `sales` varchar(200) NOT NULL,
  `profit` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_statistical`
--

INSERT INTO `tbl_statistical` (`id_statistical`, `order_date`, `sales`, `profit`, `quantity`, `total_order`) VALUES
(73, '2024-07-13', '8590000', '1500000', 1, 1),
(74, '2024-07-14', '31290000', '4800000', 5, 5),
(75, '2024-07-15', '67690000', '1500000', 1, 1),
(76, '2024-07-16', '390000', '150000', 1, 1),
(77, '2024-07-17', '91490000', '7450000', 13, 13),
(78, '2024-06-13', '8590000', '1500000', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'TranThuan', 'thuantrantv201002@gmail.com', '0706812610', 'Trà Vinh, Việt Nam, 84+', NULL, '$2y$10$/gvrDAl1y6L3qyqg9oHOv.KBH7DUX7E1bvsY9d96L09hhok6xNn1q', NULL, '2024-06-28 15:47:01', '2024-07-15 09:03:02'),
(4, 'huy123', 'huy536739@gmail.com', '0123456789', 'Càng Long', NULL, '$2y$10$8uXx0u9d6sPaU0Xa6jb3q.gyKyTY2lKptZyGs3RsfOXleaqh61KDW', NULL, '2024-07-02 07:48:34', '2024-07-10 06:14:35'),
(7, 'thuanthuan', 'thuanthuan@gmail.com', '0123456789', 'Trà Vinh city', NULL, '$2y$10$jRIiSbt1IznjHkIyHQAtX.JVL9iS2JMW8M4RaK9ux/hEGYbCjOXVG', NULL, '2024-07-11 14:03:10', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Chỉ mục cho bảng `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `matp` (`province_id`) USING BTREE;

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_Order_Customer` (`customer_id`),
  ADD KEY `FK_Order_Payment` (`payment_id`),
  ADD KEY `shipping_id` (`shipping_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `FK_OrderDetails_Product` (`product_id`),
  ADD KEY `FK_Order` (`order_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_Product_Brand` (`brand_id`),
  ADD KEY `FK_Product_Category` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`province_id`) USING BTREE;

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  ADD PRIMARY KEY (`id_statistical`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  MODIFY `id_statistical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `FK_Order_Customer` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_Order_Payment` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`),
  ADD CONSTRAINT `FK_Order_Shipping` FOREIGN KEY (`shipping_id`) REFERENCES `tbl_shipping` (`shipping_id`);

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `FK_OrderDetails_Order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`),
  ADD CONSTRAINT `FK_OrderDetails_Product` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `FK_Product_Brand` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`),
  ADD CONSTRAINT `FK_Product_Category` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
