-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2023 at 04:26 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecombackend`
--

-- --------------------------------------------------------

--
-- Table structure for table `e_addresses`
--

CREATE TABLE `e_addresses` (
  `id` int NOT NULL,
  `customers_id` int DEFAULT NULL,
  `countries_id` int DEFAULT NULL,
  `locations_id` int DEFAULT NULL,
  `city` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_addresses`
--

INSERT INTO `e_addresses` (`id`, `customers_id`, `countries_id`, `locations_id`, `city`, `street`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 61, 1, 1, 'Dawpon', 'Minsan st', 'No.789, RoomA', '829329392', '2023-12-01 21:47:27', '2023-12-05 00:00:00'),
(2, 9, 1, 1, 'Hlaing', 'Ma Har Myaing St', 'No.120, RoomA, 2392, Sample', '829329392', '2023-12-28 21:46:49', '2023-12-28 21:46:49'),
(3, 8, NULL, NULL, 'Yangon', 'Monalia', 'Monalia', NULL, '2023-12-16 14:44:52', '2023-12-16 14:44:52'),
(4, 9, NULL, NULL, 'Yangon', 'Monalia', 'Monalia', NULL, '2023-12-16 14:46:01', '2023-12-16 14:46:01'),
(5, 10, NULL, NULL, 'Yangon', 'Monalia', 'Monalia', NULL, '2023-12-16 14:47:03', '2023-12-16 14:47:03'),
(6, 11, NULL, NULL, 'Yangon', 'Monalia', 'Monalia', NULL, '2023-12-16 14:47:25', '2023-12-16 14:47:25'),
(7, 12, NULL, NULL, 'Yangon', 'Monalia', 'Monalia', NULL, '2023-12-16 14:47:31', '2023-12-16 14:47:31'),
(8, 13, NULL, NULL, 'Yangon', 'Monalia', 'Monalia', NULL, '2023-12-16 14:47:34', '2023-12-16 14:47:34'),
(9, 14, NULL, NULL, 'Yangon', 'Monalia', 'Monalia', NULL, '2023-12-16 14:47:40', '2023-12-16 14:47:40'),
(10, 15, NULL, NULL, 'Yangon', 'Hlaing', 'Hlaing', NULL, '2023-12-16 14:48:03', '2023-12-16 14:48:03'),
(11, 16, NULL, NULL, 'New yourk', '239232 street', '239232 street', NULL, '2023-12-16 17:13:24', '2023-12-16 17:13:24'),
(12, 17, NULL, NULL, '232', 'yagnonsf2392', 'yagnonsf2392', NULL, '2023-12-17 16:09:08', '2023-12-17 16:09:08'),
(13, 18, NULL, NULL, '2323', '29388923', '29388923', NULL, '2023-12-17 16:13:12', '2023-12-17 16:13:12'),
(14, 6, 1, NULL, '3232', NULL, 'st stread addressd', NULL, '2023-12-17 17:57:59', '2023-12-17 17:57:59'),
(15, 19, 1, NULL, '893823', NULL, 'example streutwrw', NULL, '2023-12-17 17:59:08', '2023-12-17 17:59:08'),
(16, 20, 3, NULL, 'New Address', NULL, '238293892', NULL, '2023-12-18 03:45:06', '2023-12-18 03:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `e_categories`
--

CREATE TABLE `e_categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `is_feature` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_categories`
--

INSERT INTO `e_categories` (`id`, `name`, `description`, `image`, `parent_id`, `status`, `is_feature`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Woman Fashion', 'Ea omnis tenetur ut vero sequi est.', 'https://via.placeholder.com/640x480.png/0011dd?text=cats+cum', NULL, 1, 1, '2023-12-11 10:17:16', '2023-12-11 10:17:16', NULL),
(2, 'Men Fashion', 'Ut nemo voluptatum vitae eos.', 'https://via.placeholder.com/640x480.png/00ddcc?text=cats+minima', NULL, 0, 1, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(3, 'Kid Fashion', 'Occaecati deserunt tenetur aliquam enim dolorum est.', 'https://via.placeholder.com/640x480.png/009922?text=cats+repellendus', NULL, 1, 1, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(4, 'dolor', 'Rem placeat iure repellendus dignissimos.', 'https://via.placeholder.com/640x480.png/00bb55?text=cats+harum', NULL, 1, NULL, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(5, 'iusto', 'Perspiciatis repellendus repudiandae eveniet.', 'https://via.placeholder.com/640x480.png/004411?text=cats+porro', NULL, 0, NULL, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(6, 'et', 'Ut omnis in in consectetur.', 'https://via.placeholder.com/640x480.png/00cc44?text=cats+adipisci', NULL, 1, NULL, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(7, 'qui', 'Illum expedita eos ut laudantium vero.', 'https://via.placeholder.com/640x480.png/00dd55?text=cats+laborum', NULL, 0, NULL, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(8, 'saepe', 'Nobis laboriosam eum id ex.', 'https://via.placeholder.com/640x480.png/000077?text=cats+tempore', NULL, 0, NULL, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(9, 'ad', 'Eos sed ratione exercitationem et blanditiis.', 'https://via.placeholder.com/640x480.png/00bb33?text=cats+laboriosam', NULL, 1, NULL, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(10, 'velit', 'Facere cum laudantium eos necessitatibus exercitationem.', 'https://via.placeholder.com/640x480.png/00ee11?text=cats+eligendi', NULL, 1, NULL, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(11, 'Vehicle ', 'Facere cum laudantium eos necessitatibus exercitationem.', 'https://via.placeholder.com/640x480.png/00ee11?text=cats+eligendi', NULL, 1, NULL, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL),
(12, 'Tools', 'Facere cum laudantium eos necessitatibus exercitationem.', 'https://via.placeholder.com/640x480.png/00ee11?text=cats+eligendi', NULL, 1, NULL, '2023-12-11 10:17:17', '2023-12-11 10:17:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `e_countries`
--

CREATE TABLE `e_countries` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_countries`
--

INSERT INTO `e_countries` (`id`, `name`) VALUES
(1, 'Myanmar');

-- --------------------------------------------------------

--
-- Table structure for table `e_customers`
--

CREATE TABLE `e_customers` (
  `id` int NOT NULL,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_customers`
--

INSERT INTO `e_customers` (`id`, `name`, `first_name`, `last_name`, `username`, `phone`, `email`, `password`, `address`, `verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LOL PP', 'Ye Htun Z', 'ZNZ', NULL, '29389329223', 'demo@gmail.com', '$2y$12$WSUeK.udtaC0NkXPe2AHa.tFDdx6b0Pf74EX.QYvHHzGQenGDYa1u', NULL, NULL, '2023-12-12 08:56:35', '2023-12-12 08:56:35', NULL),
(2, '39829323', NULL, NULL, NULL, '239238', 'h2o39@gmil.com', '3923892392', NULL, NULL, '2023-12-14 17:12:45', '2023-12-14 17:12:45', NULL),
(3, 'ye htunz', NULL, NULL, NULL, '38928392', 'go22@gmail.com', '293293923', NULL, NULL, '2023-12-14 17:14:25', '2023-12-14 17:14:25', NULL),
(4, 'yeyeyeyeyey', NULL, NULL, NULL, '293293', '23923@gmil.com', 'yeyeyeye', NULL, NULL, '2023-12-14 17:15:50', '2023-12-14 17:15:50', NULL),
(5, '9392492', NULL, NULL, NULL, '29382939', 'mona@gmail.com', '$2y$12$Ls.H/wv9D6/9poWbxD00a.5YAKiGFAuE.HC7osqwPXMb35ZRFPvwS', NULL, NULL, '2023-12-14 17:16:59', '2023-12-14 17:16:59', NULL),
(6, '9238293892', '9238293892', NULL, NULL, '28298392', 'yeye@gmail.com', '$2y$12$MB4pFO22//1E/32JKeDhIORZGDogoZ8d84ODrOVwGXT0a9Tz6GQY6', NULL, NULL, '2023-12-14 17:25:06', '2023-12-14 17:25:06', NULL),
(7, 'Yeh', NULL, NULL, NULL, '09 794 327769', 'admin@example.com', NULL, 'Monalia', NULL, '2023-12-16 14:43:54', '2023-12-16 14:43:54', NULL),
(8, 'Yeh', NULL, NULL, NULL, '09 794 327769', 'admin@example.com', NULL, 'Monalia', NULL, '2023-12-16 14:44:52', '2023-12-16 14:44:52', NULL),
(9, 'Yeh', NULL, NULL, NULL, '09 794 327769', 'admin@example.com', NULL, 'Monalia', NULL, '2023-12-16 14:46:01', '2023-12-16 14:46:01', NULL),
(10, 'Yeh', NULL, NULL, NULL, '09 794 327769', 'admin@example.com', NULL, 'Monalia', NULL, '2023-12-16 14:47:03', '2023-12-16 14:47:03', NULL),
(11, 'Yeh', NULL, NULL, NULL, '09 794 327769', 'admin@example.com', NULL, 'Monalia', NULL, '2023-12-16 14:47:25', '2023-12-16 14:47:25', NULL),
(12, 'Yeh', NULL, NULL, NULL, '09 794 327769', 'admin@example.com', NULL, 'Monalia', NULL, '2023-12-16 14:47:31', '2023-12-16 14:47:31', NULL),
(13, 'Yeh', NULL, NULL, NULL, '09 794 327769', 'admin@example.com', NULL, 'Monalia', NULL, '2023-12-16 14:47:34', '2023-12-16 14:47:34', NULL),
(14, 'Yeh', NULL, NULL, NULL, '09 794 327769', 'admin@example.com', NULL, 'Monalia', NULL, '2023-12-16 14:47:40', '2023-12-16 14:47:40', NULL),
(15, 'Ye Htun Zaw', NULL, NULL, NULL, '09794327769', 'yeye@gmail.com', NULL, 'Hlaing', NULL, '2023-12-16 14:48:03', '2023-12-16 14:48:03', NULL),
(16, 'last item', NULL, NULL, NULL, '9832738237', 'gcit2023@gmail.com', NULL, '239232 street', NULL, '2023-12-16 17:13:24', '2023-12-16 17:13:24', NULL),
(17, 'Mona', NULL, NULL, NULL, '10092302', 'Sample@gmail.com', NULL, 'yagnonsf2392', NULL, '2023-12-17 16:09:08', '2023-12-17 16:09:08', NULL),
(18, 'Jhon Son', NULL, NULL, NULL, '293829', '293892@gmoail.com', NULL, '29388923', NULL, '2023-12-17 16:13:12', '2023-12-17 16:13:12', NULL),
(19, 'Hello 92389', NULL, NULL, NULL, '293923928', 'boringtask@gmail.com', NULL, 'example streutwrw', NULL, '2023-12-17 17:59:08', '2023-12-17 17:59:08', NULL),
(20, 'Monalisa', 'Monalisa', NULL, NULL, '93892392', 'hi@m.com', '$2y$12$Erv3NRylR8vY5.DeQZHUCOBDq7zkqjYgMrnFKI9yN7.vpWTTBWNhy', NULL, NULL, '2023-12-18 03:31:37', '2023-12-18 03:31:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `e_locations`
--

CREATE TABLE `e_locations` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  `countries_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_locations`
--

INSERT INTO `e_locations` (`id`, `name`, `parent_id`, `countries_id`) VALUES
(1, 'Yangon', NULL, 1),
(2, 'Mandalay', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `e_orderitems`
--

CREATE TABLE `e_orderitems` (
  `id` int NOT NULL,
  `customers_id` int DEFAULT NULL,
  `orders_id` int DEFAULT NULL,
  `products_id` int NOT NULL,
  `unit_rate` decimal(10,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_orderitems`
--

INSERT INTO `e_orderitems` (`id`, `customers_id`, `orders_id`, `products_id`, `unit_rate`, `qty`, `total_amount`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 10, '500.00', 1, '500.00', 1, NULL, NULL, NULL),
(2, 1, 1, 20, '5000.00', 10, '50000.00', 1, NULL, NULL, NULL),
(3, 6, NULL, 3, '7000.00', 17, '119000.00', 0, '2023-12-15 07:05:15', '2023-12-17 06:40:55', '2023-12-17 06:40:55'),
(4, 6, NULL, 11, '4000.00', 16, '64000.00', 0, '2023-12-15 07:12:23', '2023-12-17 08:54:26', '2023-12-17 08:54:26'),
(5, 6, NULL, 98, '1000.00', 15, '15000.00', 0, '2023-12-15 08:04:58', '2023-12-15 08:30:22', '2023-12-15 08:30:22'),
(6, 15, 3, 10, '6000.00', 1, '6000.00', 0, '2023-12-16 14:48:03', '2023-12-16 14:48:03', NULL),
(7, 15, 3, 12, '2000.00', 1, '2000.00', 0, '2023-12-16 14:48:03', '2023-12-16 14:48:03', NULL),
(8, 15, 3, 86, '7000.00', 1, '7000.00', 0, '2023-12-16 14:48:03', '2023-12-16 14:48:03', NULL),
(9, 15, 3, 87, '7000.00', 1, '7000.00', 0, '2023-12-16 14:48:03', '2023-12-16 14:48:03', NULL),
(10, 15, 3, 94, '4000.00', 1, '4000.00', 0, '2023-12-16 14:48:03', '2023-12-16 14:48:03', NULL),
(11, 16, 4, 2, '7000.00', 1, '7000.00', 0, '2023-12-16 17:13:24', '2023-12-16 17:13:24', NULL),
(12, 16, 4, 3, '7000.00', 1, '7000.00', 0, '2023-12-16 17:13:24', '2023-12-16 17:13:24', NULL),
(13, 6, NULL, 77, '2000.00', 1, '2000.00', 0, '2023-12-17 05:10:58', '2023-12-17 06:41:04', '2023-12-17 06:41:04'),
(14, 6, 7, 14, '3000.00', 1, '3000.00', 0, '2023-12-17 05:11:03', '2023-12-17 09:19:31', NULL),
(15, 6, 7, 15, '6000.00', 1, '6000.00', 0, '2023-12-17 05:12:01', '2023-12-17 09:19:31', NULL),
(16, 6, 7, 16, '5000.00', 1, '5000.00', 0, '2023-12-17 05:13:52', '2023-12-17 09:19:31', NULL),
(17, 6, NULL, 2, '7000.00', 4, '28000.00', 0, '2023-12-17 05:14:30', '2023-12-17 08:54:33', '2023-12-17 08:54:33'),
(18, 6, 7, 18, '1000.00', 1, '1000.00', 0, '2023-12-17 05:14:44', '2023-12-17 09:19:31', NULL),
(20, 6, 5, 14, '3000.00', 1, '3000.00', 0, '2023-12-17 09:08:42', '2023-12-17 09:08:42', NULL),
(21, 6, 5, 15, '6000.00', 1, '6000.00', 0, '2023-12-17 09:08:42', '2023-12-17 09:08:42', NULL),
(22, 6, 5, 16, '5000.00', 1, '5000.00', 0, '2023-12-17 09:08:42', '2023-12-17 09:08:42', NULL),
(23, 6, 5, 18, '1000.00', 1, '1000.00', 0, '2023-12-17 09:08:42', '2023-12-17 09:08:42', NULL),
(24, 6, 6, 14, '3000.00', 1, '3000.00', 0, '2023-12-17 09:12:50', '2023-12-17 09:12:50', NULL),
(25, 6, 6, 15, '6000.00', 1, '6000.00', 0, '2023-12-17 09:12:50', '2023-12-17 09:12:50', NULL),
(26, 6, 6, 16, '5000.00', 1, '5000.00', 0, '2023-12-17 09:12:50', '2023-12-17 09:12:50', NULL),
(27, 6, 6, 18, '1000.00', 1, '1000.00', 0, '2023-12-17 09:12:50', '2023-12-17 09:12:50', NULL),
(28, 6, 10, 28, '1000.00', 5, '5000.00', 0, '2023-12-17 09:53:46', '2023-12-17 17:08:46', NULL),
(29, 17, 8, 2, '7000.00', 1, '7000.00', 0, '2023-12-17 16:09:08', '2023-12-17 16:09:08', NULL),
(30, 17, 8, 3, '7000.00', 1, '7000.00', 0, '2023-12-17 16:09:08', '2023-12-17 16:09:08', NULL),
(31, 18, 9, 2, '7000.00', 1, '7000.00', 0, '2023-12-17 16:13:12', '2023-12-17 16:13:12', NULL),
(32, 18, 9, 3, '7000.00', 1, '7000.00', 0, '2023-12-17 16:13:12', '2023-12-17 16:13:12', NULL),
(33, 18, 9, 4, '7000.00', 1, '7000.00', 0, '2023-12-17 16:13:12', '2023-12-17 16:13:12', NULL),
(34, 6, 11, 34, '6000.00', 1, '6000.00', 0, '2023-12-17 17:08:58', '2023-12-17 17:12:31', NULL),
(35, 6, 11, 35, '2000.00', 5, '10000.00', 0, '2023-12-17 17:08:59', '2023-12-17 17:12:31', NULL),
(36, 6, 11, 36, '1000.00', 1, '1000.00', 0, '2023-12-17 17:09:01', '2023-12-17 17:12:31', NULL),
(37, 6, 12, 37, '7000.00', 1, '7000.00', 0, '2023-12-17 17:12:36', '2023-12-17 17:41:10', NULL),
(38, 6, 12, 38, '5000.00', 1, '5000.00', 0, '2023-12-17 17:12:37', '2023-12-17 17:41:10', NULL),
(39, 6, 12, 39, '4000.00', 1, '4000.00', 0, '2023-12-17 17:12:38', '2023-12-17 17:41:10', NULL),
(40, 6, 13, 40, '2000.00', 1, '2000.00', 0, '2023-12-17 17:41:22', '2023-12-17 17:57:59', NULL),
(41, 6, 14, 41, '1000.00', 3, '3000.00', 0, '2023-12-17 17:58:09', '2023-12-17 17:58:25', NULL),
(42, 19, 15, 2, '7000.00', 1, '7000.00', 0, '2023-12-17 17:59:08', '2023-12-17 17:59:08', NULL),
(43, 19, 15, 3, '7000.00', 1, '7000.00', 0, '2023-12-17 17:59:08', '2023-12-17 17:59:08', NULL),
(44, 20, NULL, 2, '7000.00', 1, '7000.00', 0, '2023-12-18 03:32:09', '2023-12-18 03:33:00', '2023-12-18 03:33:00'),
(45, 20, 16, 45, '8000.00', 4, '32000.00', 0, '2023-12-18 03:32:09', '2023-12-18 03:45:06', NULL),
(46, 20, 17, 46, '1000.00', 1, '1000.00', 0, '2023-12-18 03:55:25', '2023-12-18 03:55:49', NULL),
(47, 20, 17, 47, '2000.00', 1, '2000.00', 0, '2023-12-18 03:55:25', '2023-12-18 03:55:49', NULL),
(48, 20, 18, 48, '2000.00', 9, '18000.00', 0, '2023-12-18 04:19:16', '2023-12-18 04:19:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `e_orders`
--

CREATE TABLE `e_orders` (
  `id` int NOT NULL,
  `saleno` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deliveries_id` int DEFAULT NULL COMMENT 'delivery address id',
  `customers_id` int NOT NULL,
  `total_qty` int DEFAULT NULL,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `paid_status` tinyint DEFAULT NULL,
  `payments_id` int DEFAULT NULL,
  `delivery_status` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_orders`
--

INSERT INTO `e_orders` (`id`, `saleno`, `deliveries_id`, `customers_id`, `total_qty`, `total_amount`, `paid_status`, `payments_id`, `delivery_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ORID2023-12-12-0001', 2, 2, 10, '1000', 1, 1, 1, '2023-12-12 10:38:41', '2023-12-12 10:38:41', NULL),
(2, 'ORID2023-12-12-0002', 2, 6, 10, '1000', 1, 3, 1, '2023-12-12 10:38:41', '2023-12-12 10:38:41', NULL),
(3, NULL, 10, 6, NULL, NULL, 0, 3, 0, '2023-12-16 14:48:03', '2023-12-16 14:48:03', NULL),
(4, 'OD-1702746804-0001', 11, 6, 2, NULL, 0, 1, 0, '2023-12-16 17:13:24', '2023-12-16 17:13:24', NULL),
(5, 'OD-1702804122-0001', NULL, 6, 4, NULL, 0, NULL, 0, '2023-12-17 09:08:42', '2023-12-17 09:08:42', NULL),
(6, 'OD-1702804370-0001', NULL, 6, 4, NULL, 0, NULL, 0, '2023-12-17 09:12:50', '2023-12-17 09:12:50', NULL),
(7, 'OD-1702804771-0001', NULL, 6, 4, NULL, 1, 1, 2, '2023-12-17 09:19:31', '2023-12-17 15:55:25', NULL),
(8, 'OD-1702829348-0001', NULL, 17, 2, NULL, 0, 3, 0, '2023-12-17 16:09:08', '2023-12-17 16:09:08', NULL),
(9, 'OD-1702829592-0001', NULL, 18, 3, '21000', 1, 2, 2, '2023-12-17 16:13:12', '2023-12-17 16:13:31', NULL),
(10, 'OD-1702832926-0001', NULL, 6, 5, '5000', 2, NULL, 1, '2023-12-17 17:08:46', '2023-12-17 17:08:46', NULL),
(11, 'OD-1702833151-0001', NULL, 6, 7, '17000', 2, 3, 1, '2023-12-17 17:12:31', '2023-12-17 17:12:31', NULL),
(12, 'OD-1702834870-0001', NULL, 6, 3, '16000', 2, NULL, 1, '2023-12-17 17:41:10', '2023-12-17 17:41:10', NULL),
(13, 'OD-1702835879 ', 14, 6, 1, '2000', 2, 1, 1, '2023-12-17 17:57:59', '2023-12-17 17:57:59', NULL),
(14, 'OD-1702835905 ', 14, 6, 3, '3000', 2, 1, 1, '2023-12-17 17:58:25', '2023-12-17 17:58:25', NULL),
(15, 'OD-1702835948 ', 15, 19, 2, '14000', 2, 3, 1, '2023-12-17 17:59:08', '2023-12-17 17:59:08', NULL),
(16, 'OD-1702871106 ', 16, 20, 4, '32000', 2, 3, 1, '2023-12-18 03:45:06', '2023-12-18 03:45:06', NULL),
(17, 'OD-1702871749 ', 16, 20, 2, '3000', 2, 2, 1, '2023-12-18 03:55:49', '2023-12-18 03:55:49', NULL),
(18, 'OD-1702873183 ', 16, 20, 9, '18000', 1, 4, 2, '2023-12-18 04:19:43', '2023-12-18 04:21:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `e_productimages`
--

CREATE TABLE `e_productimages` (
  `id` int NOT NULL,
  `image` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `products_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `udpated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_productimages`
--

INSERT INTO `e_productimages` (`id`, `image`, `products_id`, `created_at`, `udpated_at`) VALUES
(1, 'https://via.placeholder.com/640x480.png/002233?text=cats+quia', 2, NULL, NULL),
(2, 'https://via.placeholder.com/640x480.png/ffee00?text=image+2', 2, NULL, NULL),
(3, 'https://via.placeholder.com/640x480.png/FF2200?text=dothas+quia', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `e_products`
--

CREATE TABLE `e_products` (
  `id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `unit_rate` decimal(10,2) DEFAULT NULL,
  `categories_id` int NOT NULL,
  `is_recommend` tinyint DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_products`
--

INSERT INTO `e_products` (`id`, `image`, `name`, `description`, `unit_rate`, `categories_id`, `is_recommend`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'https://via.placeholder.com/640x480.png/00ddcc?text=cats+velit', 'excepturi', 'Molestias ad adipisci consequuntur.', '6000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 9, 4),
(2, 'https://via.placeholder.com/640x480.png/00ffbb?text=cats+voluptatibus', 'ut', 'Sit voluptatem voluptatem harum.', '7000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 10),
(3, 'https://via.placeholder.com/640x480.png/001111?text=cats+corporis', 'perspiciatis', 'Et qui sed consequatur ipsum.', '7000.00', 8, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 6),
(4, 'https://via.placeholder.com/640x480.png/002233?text=cats+quia', 'voluptate', 'Exercitationem nostrum beatae fugit saepe quo.', '7000.00', 6, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 5),
(5, 'https://via.placeholder.com/640x480.png/0099aa?text=cats+nesciunt', 'possimus', 'Est mollitia aut et ipsa laudantium dolores quia.', '8000.00', 5, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 5),
(6, 'https://via.placeholder.com/640x480.png/00aa66?text=cats+rerum', 'fuga', 'Tempora autem iusto ut perspiciatis.', '4000.00', 2, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 7),
(7, 'https://via.placeholder.com/640x480.png/0033aa?text=cats+vero', 'vel', 'Nobis in non quia mollitia corporis fugit.', '7000.00', 8, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 7),
(8, 'https://via.placeholder.com/640x480.png/0099ff?text=cats+et', 'autem', 'Corrupti voluptatibus corporis minima dolorum repudiandae dolor.', '6000.00', 7, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 7),
(9, 'https://via.placeholder.com/640x480.png/007700?text=cats+quia', 'totam', 'Reprehenderit corrupti explicabo aperiam.', '3000.00', 8, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 9, 6),
(10, 'https://via.placeholder.com/640x480.png/002222?text=cats+non', 'rerum', 'Debitis qui quo sed esse est.', '6000.00', 5, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 9, 5),
(11, 'https://via.placeholder.com/640x480.png/006611?text=cats+voluptas', 'fugit', 'Praesentium totam aut aut.', '4000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 1),
(12, 'https://via.placeholder.com/640x480.png/00dd99?text=cats+quae', 'aut', 'Laborum voluptatibus architecto ut rerum soluta.', '2000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 5),
(13, 'https://via.placeholder.com/640x480.png/009988?text=cats+cum', 'et', 'Consequatur dolores quo aut suscipit.', '7000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 7),
(14, 'https://via.placeholder.com/640x480.png/00ffff?text=cats+ut', 'aliquid', 'Aut velit ea dignissimos odit ipsum laboriosam.', '3000.00', 7, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 6, 10),
(15, 'https://via.placeholder.com/640x480.png/006633?text=cats+culpa', 'minima', 'Possimus consequuntur inventore optio consequatur.', '6000.00', 7, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 8),
(16, 'https://via.placeholder.com/640x480.png/0044cc?text=cats+ducimus', 'magnam', 'Odio minima consequatur repudiandae consequuntur consequatur.', '5000.00', 5, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 7, 4),
(17, 'https://via.placeholder.com/640x480.png/00cc77?text=cats+qui', 'dolorum', 'Ratione non similique itaque deserunt vitae expedita.', '7000.00', 9, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 6, 9),
(18, 'https://via.placeholder.com/640x480.png/00eecc?text=cats+omnis', 'sint', 'In exercitationem modi tempore odio molestiae.', '1000.00', 8, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 5),
(19, 'https://via.placeholder.com/640x480.png/003333?text=cats+rem', 'beatae', 'Possimus ut enim ea tenetur.', '9000.00', 2, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 10),
(20, 'https://via.placeholder.com/640x480.png/0044aa?text=cats+in', 'minima', 'Minima porro dolores et sunt.', '7000.00', 7, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 9, 8),
(21, 'https://via.placeholder.com/640x480.png/00bb77?text=cats+cupiditate', 'reprehenderit', 'In voluptatem voluptatem voluptas nobis non.', '2000.00', 8, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 4),
(22, 'https://via.placeholder.com/640x480.png/000066?text=cats+suscipit', 'ex', 'Atque delectus deleniti omnis est dolorum natus.', '1000.00', 7, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 7, 9),
(23, 'https://via.placeholder.com/640x480.png/00aa00?text=cats+dolor', 'labore', 'Voluptatem pariatur nobis debitis totam qui.', '3000.00', 7, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 9),
(24, 'https://via.placeholder.com/640x480.png/00cc99?text=cats+explicabo', 'autem', 'Dolor quos tempore qui consequatur a qui.', '3000.00', 6, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 9),
(25, 'https://via.placeholder.com/640x480.png/0077cc?text=cats+voluptatem', 'quae', 'Provident harum architecto iure.', '7000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 7, 5),
(26, 'https://via.placeholder.com/640x480.png/0066ee?text=cats+est', 'aut', 'Iure in ad dolorum voluptatum porro aliquam.', '7000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 4),
(27, 'https://via.placeholder.com/640x480.png/006633?text=cats+optio', 'et', 'Optio occaecati excepturi debitis ut perferendis.', '4000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 9, 1),
(28, 'https://via.placeholder.com/640x480.png/001188?text=cats+excepturi', 'ut', 'Enim et repellat a omnis et quaerat.', '1000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 10),
(29, 'https://via.placeholder.com/640x480.png/001188?text=cats+quae', 'ipsum', 'Fugiat qui voluptatem sit.', '5000.00', 1, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 6, 8),
(30, 'https://via.placeholder.com/640x480.png/006622?text=cats+perferendis', 'eum', 'Et libero accusamus ullam.', '8000.00', 2, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 4),
(31, 'https://via.placeholder.com/640x480.png/001155?text=cats+et', 'voluptatem', 'Quam voluptatem sint animi nam.', '1000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 6),
(32, 'https://via.placeholder.com/640x480.png/005533?text=cats+aspernatur', 'qui', 'Ut expedita ratione architecto.', '4000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 10),
(33, 'https://via.placeholder.com/640x480.png/00aa66?text=cats+enim', 'repellat', 'Totam sit alias nulla.', '7000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 3),
(34, 'https://via.placeholder.com/640x480.png/009911?text=cats+libero', 'iure', 'Saepe aut consequuntur quia voluptates nisi sint.', '6000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 3),
(35, 'https://via.placeholder.com/640x480.png/00dd00?text=cats+provident', 'asperiores', 'Voluptate et voluptatum omnis velit et.', '2000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 7, 9),
(36, 'https://via.placeholder.com/640x480.png/007766?text=cats+aut', 'voluptatibus', 'Animi molestiae et ut et et voluptatem.', '1000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 4),
(37, 'https://via.placeholder.com/640x480.png/007711?text=cats+nam', 'laboriosam', 'Labore ipsum ut qui non.', '7000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 9),
(38, 'https://via.placeholder.com/640x480.png/0055cc?text=cats+similique', 'et', 'Rerum doloribus quo qui.', '5000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 8),
(39, 'https://via.placeholder.com/640x480.png/007766?text=cats+ex', 'occaecati', 'Ullam vitae est eos nemo assumenda dignissimos.', '4000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 3),
(40, 'https://via.placeholder.com/640x480.png/008888?text=cats+et', 'et', 'Non ut consequatur qui alias facere sequi.', '2000.00', 2, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 6, 1),
(41, 'https://via.placeholder.com/640x480.png/002288?text=cats+autem', 'exercitationem', 'Iure ea consequatur atque itaque eos.', '1000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 7, 9),
(42, 'https://via.placeholder.com/640x480.png/0088bb?text=cats+ut', 'tempore', 'Molestiae ut voluptas possimus ipsa perferendis nisi.', '8000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 10),
(43, 'https://via.placeholder.com/640x480.png/00bb00?text=cats+nam', 'nam', 'Itaque iste reprehenderit vero ea.', '7000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 6),
(44, 'https://via.placeholder.com/640x480.png/008844?text=cats+veritatis', 'itaque', 'Omnis hic itaque et voluptatum sed ea.', '9000.00', 6, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 7, 6),
(45, 'https://via.placeholder.com/640x480.png/00ffbb?text=cats+minima', 'molestiae', 'Neque fugit dolorem beatae.', '8000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 10, 6),
(46, 'https://via.placeholder.com/640x480.png/00cc55?text=cats+inventore', 'iure', 'Ut laboriosam nam ducimus et nisi magni.', '1000.00', 6, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 9, 9),
(47, 'https://via.placeholder.com/640x480.png/00ccdd?text=cats+quia', 'quod', 'Eligendi occaecati quia quibusdam ea corrupti sed.', '2000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 1),
(48, 'https://via.placeholder.com/640x480.png/00aaff?text=cats+voluptatem', 'voluptatem', 'Perspiciatis quas dolor nesciunt reiciendis magni nulla.', '2000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 3),
(49, 'https://via.placeholder.com/640x480.png/0011dd?text=cats+dolore', 'possimus', 'Dolor maiores autem iste quisquam.', '8000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 2),
(50, 'https://via.placeholder.com/640x480.png/0000ee?text=cats+molestiae', 'modi', 'At corporis eveniet porro aut.', '9000.00', 1, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 9, 7),
(51, 'https://via.placeholder.com/640x480.png/00bbbb?text=cats+dolores', 'accusantium', 'Id molestiae officia dolores nam sapiente natus.', '7000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 8),
(52, 'https://via.placeholder.com/640x480.png/008877?text=cats+mollitia', 'ut', 'Repellat ullam ducimus consectetur corporis.', '5000.00', 7, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 10),
(53, 'https://via.placeholder.com/640x480.png/00ddee?text=cats+modi', 'modi', 'Facilis facere non quo.', '5000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 10, 4),
(54, 'https://via.placeholder.com/640x480.png/00ddee?text=cats+a', 'voluptatum', 'Modi sequi aperiam dicta distinctio quisquam unde.', '1000.00', 6, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 6),
(55, 'https://via.placeholder.com/640x480.png/008877?text=cats+et', 'nobis', 'Pariatur et autem rerum saepe eos ad.', '4000.00', 7, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 2),
(56, 'https://via.placeholder.com/640x480.png/00dddd?text=cats+et', 'repudiandae', 'Aliquid velit quam rerum quo tempora.', '7000.00', 5, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 4),
(57, 'https://via.placeholder.com/640x480.png/007733?text=cats+praesentium', 'tempore', 'Nemo sint aut et.', '6000.00', 7, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 2),
(58, 'https://via.placeholder.com/640x480.png/00dddd?text=cats+autem', 'dolorem', 'Et iusto nostrum rerum.', '3000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 3),
(59, 'https://via.placeholder.com/640x480.png/0044bb?text=cats+et', 'magni', 'Architecto eos tempore tempore quo repellendus illum.', '1000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 6, 5),
(60, 'https://via.placeholder.com/640x480.png/0088cc?text=cats+sequi', 'expedita', 'Nostrum dolorem incidunt aut delectus cupiditate ipsa.', '8000.00', 6, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 4),
(61, 'https://via.placeholder.com/640x480.png/0033ff?text=cats+magni', 'repellat', 'Sed officiis voluptas excepturi dicta.', '1000.00', 1, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 6, 2),
(62, 'https://via.placeholder.com/640x480.png/0066aa?text=cats+facere', 'et', 'Quia ut officia modi amet non.', '6000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 3),
(63, 'https://via.placeholder.com/640x480.png/00cccc?text=cats+voluptatum', 'minima', 'Minus nesciunt deleniti similique nisi.', '9000.00', 2, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 3),
(64, 'https://via.placeholder.com/640x480.png/00aa77?text=cats+aut', 'quo', 'Nihil est consequuntur ab quos ad quisquam.', '7000.00', 1, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 2),
(65, 'https://via.placeholder.com/640x480.png/009922?text=cats+excepturi', 'at', 'Ducimus corporis consequatur quasi voluptas quo.', '4000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 7),
(66, 'https://via.placeholder.com/640x480.png/0077aa?text=cats+quas', 'illum', 'Deleniti aliquid repellendus sunt.', '9000.00', 1, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 6),
(67, 'https://via.placeholder.com/640x480.png/006677?text=cats+illo', 'sunt', 'Consequatur qui hic porro.', '4000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 7),
(68, 'https://via.placeholder.com/640x480.png/0033ee?text=cats+cumque', 'vel', 'Iusto sapiente dolor repellat quisquam.', '8000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 3),
(69, 'https://via.placeholder.com/640x480.png/00aadd?text=cats+ab', 'hic', 'Est rem fugit consequatur molestias.', '3000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 9),
(70, 'https://via.placeholder.com/640x480.png/003311?text=cats+aliquam', 'iure', 'Aspernatur velit accusamus aspernatur alias vel.', '8000.00', 1, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 3),
(71, 'https://via.placeholder.com/640x480.png/00bb33?text=cats+reprehenderit', 'nobis', 'Natus illum nisi quae.', '1000.00', 8, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 9),
(72, 'https://via.placeholder.com/640x480.png/0022ff?text=cats+totam', 'fugiat', 'Ut aperiam expedita architecto sit.', '4000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 4),
(73, 'https://via.placeholder.com/640x480.png/0055ff?text=cats+qui', 'minima', 'Sit dolores illum recusandae quos.', '5000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 5),
(74, 'https://via.placeholder.com/640x480.png/00ee99?text=cats+voluptate', 'dolores', 'Commodi sed accusamus laudantium.', '9000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 3),
(75, 'https://via.placeholder.com/640x480.png/00bb66?text=cats+quasi', 'repudiandae', 'Nulla sed totam quaerat ea.', '1000.00', 10, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 7),
(76, 'https://via.placeholder.com/640x480.png/0066ff?text=cats+ut', 'aliquam', 'Voluptates enim voluptas aut et illum.', '1000.00', 1, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 2),
(77, 'https://via.placeholder.com/640x480.png/0066bb?text=cats+maiores', 'eos', 'Necessitatibus iste et id numquam.', '2000.00', 4, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 2),
(78, 'https://via.placeholder.com/640x480.png/0000bb?text=cats+enim', 'quisquam', 'Delectus consequatur qui totam voluptate laboriosam.', '6000.00', 4, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 4),
(79, 'https://via.placeholder.com/640x480.png/00cc44?text=cats+qui', 'quidem', 'Et necessitatibus fuga voluptatem ad.', '5000.00', 3, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 9),
(80, 'https://via.placeholder.com/640x480.png/0022aa?text=cats+eligendi', 'maiores', 'Dolor laborum sapiente fugit voluptatem.', '5000.00', 10, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 9),
(81, 'https://via.placeholder.com/640x480.png/00eeaa?text=cats+quasi', 'sint', 'Vitae sunt ipsum in.', '6000.00', 9, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 7, 2),
(82, 'https://via.placeholder.com/640x480.png/006688?text=cats+ut', 'voluptas', 'Aut sint enim est possimus.', '9000.00', 1, 1, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 8),
(83, 'https://via.placeholder.com/640x480.png/0033dd?text=cats+debitis', 'distinctio', 'Eligendi assumenda consequatur accusamus aut natus.', '8000.00', 5, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 4),
(84, 'https://via.placeholder.com/640x480.png/0022dd?text=cats+veritatis', 'provident', 'Sint quia consequatur et et.', '3000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 2),
(85, 'https://via.placeholder.com/640x480.png/0022ee?text=cats+tempora', 'earum', 'Deleniti magni odit amet.', '4000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 3, 1),
(86, 'https://via.placeholder.com/640x480.png/0022ee?text=cats+mollitia', 'velit', 'Quos magnam eum sed velit odio.', '7000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 2),
(87, 'https://via.placeholder.com/640x480.png/002299?text=cats+beatae', 'cum & cost', 'Rem non illo impedit nemo.', '7000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 10),
(88, 'https://via.placeholder.com/640x480.png/004444?text=cats+a', 'rerum', 'Aut reiciendis est est quo ut.', '2000.00', 2, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 8, 6),
(89, 'https://via.placeholder.com/640x480.png/008833?text=cats+sint', 'alias', 'Quia provident accusantium dolorem.', '2000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 2),
(90, 'https://via.placeholder.com/640x480.png/005577?text=cats+nemo', 'necessitatibus', 'Doloremque soluta consectetur quia debitis aut nisi.', '2000.00', 3, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 2, 1),
(91, 'https://via.placeholder.com/640x480.png/0000bb?text=cats+aut', 'cumque', 'Eum placeat nulla reprehenderit eum accusantium.', '6000.00', 5, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 5, 3),
(92, 'https://via.placeholder.com/640x480.png/000044?text=cats+facere', 'laborum', 'Maiores quaerat provident nisi qui.', '9000.00', 9, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 7, 5),
(93, 'https://via.placeholder.com/640x480.png/009977?text=cats+tempora', 'neque', 'Blanditiis ut autem sed incidunt facilis et.', '5000.00', 7, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 7, 7),
(94, 'https://via.placeholder.com/640x480.png/00bbcc?text=cats+eligendi', 'fugit', 'Eum aliquid sint similique sed ut.', '4000.00', 2, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 4, 3),
(95, 'https://via.placeholder.com/640x480.png/0077aa?text=cats+perferendis', 'voluptas', 'Qui sit reiciendis a fuga est rerum.', '7000.00', 8, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 10, 9),
(96, 'https://via.placeholder.com/640x480.png/00aa77?text=cats+quis', 'adipisci', 'Quidem nobis modi consequatur unde.', '6000.00', 1, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 6, 1),
(97, 'https://via.placeholder.com/640x480.png/00aa22?text=cats+qui', 'facere', 'Voluptatem tenetur ipsa eligendi natus.', '9000.00', 8, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 9, 3),
(98, 'https://via.placeholder.com/640x480.png/000055?text=cats+quasi', 'quiwts', 'Consequatur sint velit veniam est velit.', '1000.00', 1, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 10, 5),
(99, 'https://via.placeholder.com/640x480.png/0011dd?text=cats+maiores', 'molestias', 'Possimus odio dicta fugiat nam ea.', '6000.00', 4, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 10, 4),
(100, 'https://via.placeholder.com/640x480.png/008899?text=cats+ut', 'qui qui', 'Autem quae est aut maiores qui.', '9000.00', 5, NULL, '2023-12-11 10:14:12', '2023-12-11 10:14:12', NULL, 1, 6),
(101, 'https://placehold.co/640x480@3x.png', 'Alpine Drinking Water', 'test', '500.00', 4, NULL, '2023-12-12 07:39:33', '2023-12-12 07:39:33', NULL, NULL, NULL),
(102, 'https://via.placeholder.com/640x480.png/00ddcc?text=cats+velit', 'JJ Shoe', 'test', '10000.00', 1, NULL, '2023-12-12 07:40:37', '2023-12-12 16:30:15', '2023-12-12 16:30:15', NULL, NULL),
(103, 'https://via.placeholder.com/640x480.png/00ddcc?text=cats+velit', 'J-donut', NULL, '10000.00', 1, NULL, '2023-12-14 02:53:12', '2023-12-14 02:53:12', NULL, NULL, NULL),
(104, 'https://via.placeholder.com/640x480.png/00ddcc?text=cats+velit', 'Apple Fruit', 'Helow World is small', '500.00', 1, NULL, '2023-12-15 17:14:35', '2023-12-15 17:14:35', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `e_specialoffers`
--

CREATE TABLE `e_specialoffers` (
  `id` int NOT NULL,
  `image` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `percent` int DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `title` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_specialoffers`
--

INSERT INTO `e_specialoffers` (`id`, `image`, `percent`, `expired_at`, `created_at`, `updated_at`, `title`) VALUES
(1, NULL, 20, NULL, NULL, NULL, NULL),
(2, NULL, 80, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `e_specialoffers_items`
--

CREATE TABLE `e_specialoffers_items` (
  `id` int NOT NULL,
  `specialoffers_id` int NOT NULL,
  `products_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_stocks`
--

CREATE TABLE `e_stocks` (
  `id` int NOT NULL,
  `products_id` int NOT NULL,
  `qty` int NOT NULL,
  `status` enum('add','remove') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remark` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `udpated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_stockvouchers`
--

CREATE TABLE `e_stockvouchers` (
  `id` int NOT NULL,
  `vocuno` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_qty` int DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(12, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(13, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(14, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(15, '2016_06_01_000004_create_oauth_clients_table', 1),
(16, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0243aea8084f1704eb98e42f3db7b92739688191b01ed43c666614cd0b0b8938249bfedb67ae843a', 1, '9ad46ce3-2dca-454e-b823-d83ae4f92ab9', 'e-commerce-customer', '[]', 0, '2023-12-12 02:29:17', '2023-12-12 02:29:17', '2024-06-12 08:59:17'),
('62a8784ceda26e3ac41090cfefdcf754498098863baf0b0a1a242267cf2d21295fa18562cf45b0cf', 1, '9ad46ce3-2dca-454e-b823-d83ae4f92ab9', 'e-commerce-customer', '[]', 0, '2023-12-12 02:30:51', '2023-12-12 02:30:51', '2024-06-12 09:00:51'),
('65c3120db58c53d03bba01c394b7e6aa39724631a1be1cf300c3e57dc4247d4783f8e4293e84f4f9', 1, '9ad46ce3-2dca-454e-b823-d83ae4f92ab9', 'e-commerce-customer', '[]', 0, '2023-12-12 02:28:52', '2023-12-12 02:28:52', '2024-06-12 08:58:52'),
('93a51ce4209cee5adeaf2a14177e240e518ced5d4422754c7b8ce1c78d7a70fd073921643564c850', 1, '9ad46ce3-2dca-454e-b823-d83ae4f92ab9', 'e-commerce-customer', '[]', 0, '2023-12-12 02:30:15', '2023-12-12 02:30:15', '2024-06-12 09:00:15'),
('b22fa0e72db8d424f9f4c27e5703aafe61fb29a2ae9b17e3b1906a74b1908c42f9d612b1aadeda71', 1, '9ad46ce3-2dca-454e-b823-d83ae4f92ab9', 'e-commerce-customer', '[]', 0, '2023-12-12 02:29:48', '2023-12-12 02:29:48', '2024-06-12 08:59:48'),
('d543c3a45bb0840759afd72b9f208ed727ced999dd8893efac2d0776bcee54846583d0d311147da0', 1, '9ad46ce3-2dca-454e-b823-d83ae4f92ab9', 'e-commerce-customer', '[]', 0, '2023-12-12 02:32:17', '2023-12-12 02:32:17', '2024-06-12 09:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
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

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('9ad46ce3-2dca-454e-b823-d83ae4f92ab9', NULL, 'e-commerce-customer', 'LfGqM5vs1pb0IdeoJZM4TcBS60ZTnIN1hYepVSWG', NULL, 'http://localhost', 1, 0, 0, '2023-12-12 02:28:25', '2023-12-12 02:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '9ad46ce3-2dca-454e-b823-d83ae4f92ab9', '2023-12-12 02:28:25', '2023-12-12 02:28:25');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ye Htun Zaw', 'yeye@gmail.com', NULL, '$2y$12$eRR.IyR5rraq02VKZ2mTOOOiyoHSuiiE66PIyLnvyE8sPNC.lOG8S', 'CeOgQiYurRY2ByGMJgFrOitWNpAnv1Fns03IuXzzXocmY4SZp14srjrTDDQB', '2023-12-12 02:22:52', '2023-12-12 02:22:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_addresses`
--
ALTER TABLE `e_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_categories`
--
ALTER TABLE `e_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_countries`
--
ALTER TABLE `e_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_customers`
--
ALTER TABLE `e_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_orderitems`
--
ALTER TABLE `e_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_orders`
--
ALTER TABLE `e_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_productimages`
--
ALTER TABLE `e_productimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_products`
--
ALTER TABLE `e_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indexes for table `e_specialoffers`
--
ALTER TABLE `e_specialoffers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_specialoffers_items`
--
ALTER TABLE `e_specialoffers_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_stocks`
--
ALTER TABLE `e_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_stockvouchers`
--
ALTER TABLE `e_stockvouchers`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_addresses`
--
ALTER TABLE `e_addresses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `e_categories`
--
ALTER TABLE `e_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `e_countries`
--
ALTER TABLE `e_countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `e_customers`
--
ALTER TABLE `e_customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `e_orderitems`
--
ALTER TABLE `e_orderitems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `e_orders`
--
ALTER TABLE `e_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `e_productimages`
--
ALTER TABLE `e_productimages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `e_products`
--
ALTER TABLE `e_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `e_specialoffers`
--
ALTER TABLE `e_specialoffers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_specialoffers_items`
--
ALTER TABLE `e_specialoffers_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_stocks`
--
ALTER TABLE `e_stocks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_stockvouchers`
--
ALTER TABLE `e_stockvouchers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
