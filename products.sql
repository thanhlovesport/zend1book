-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2016 at 11:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0',
  `special` tinyint(1) NOT NULL DEFAULT '0',
  `selloff` float NOT NULL DEFAULT '0',
  `publish_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `synopsis` text,
  `author` varchar(200) DEFAULT NULL,
  `content` mediumtext NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '10',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `picture`, `price`, `special`, `selloff`, `publish_date`, `synopsis`, `author`, `content`, `hits`, `created`, `created_by`, `modified`, `modified_by`, `order`, `status`, `cat_id`) VALUES
(26, 'Giày sân 11 người', 'product_1472619181.jpg', 60, 1, 20, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 10, 1, 69),
(40, 'Bóng Chuyền Ubete', 'product_1472619519.jpg', 90000, 1, 10000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 25, 1, 59),
(41, 'Áo Cầu Lông Jinjisen', 'product_1472627016.jpg', 135000, 0, 10, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 12, 0, 60),
(42, 'Quần Cầu Lông Yenex', 'product_1472620023.jpg', 220000, 1, 15000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 30, 1, 61),
(43, 'Giày Cầu Lông Adidas xanh trắng', 'product_1472624499.jpg', 88000, 1, 1000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 38, 1, 62),
(44, 'Vợt cầu lông Victor', 'product_1472624612.jpg', 200000, 1, 0, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 39, 1, 63),
(45, 'Hộp Cầu Lông Hải Yến', '', 135000, 1, 0, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 40, 1, 64),
(46, 'Đồ bơi nữ zumy', 'product_1472624935.jpg', 12000, 0, 1000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 42, 1, 66),
(47, 'Quần bơi spedo Nam', 'product_1472625013.jpg', 900000, 1, 80, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 45, 1, 65),
(48, 'Kính bơi Phoenix', 'product_1472625156.jpg', 250000, 1, 20, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 38, 1, 67),
(49, 'Giày Span SalaPro', 'product_1472628134.jpg', 300000, 1, 10, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 46, 1, 71),
(27, 'Giày Nike CR7', 'product_1472607677.jpg', 80000, 0, 20, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 18, 1, 70),
(28, 'Giày Sân Cỏ Nhân Tạo', 'product_1472617563.jpg', 300000, 0, 18, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 20, 1, 70),
(29, 'Giày Nike', 'product_1472617693.jpg', 350000, 1, 20, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 18, 1, 72),
(30, 'Giày Adidas', 'product_1472617860.jpg', 4000000, 1, 30000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 19, 1, 73),
(31, 'Giày Puma', 'product_1472617927.jpg', 360000, 1, 10000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 15, 1, 75),
(32, 'Móc Khóa RealMadrid', 'product_1472618040.jpg', 60000, 1, 10000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 20, 1, 34),
(33, 'Găng tay cho gôn', 'product_1472618309.jpg', 200000, 0, 19, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 30, 1, 30),
(34, 'Tất, Vớ Cầu thủ', 'product_1472618407.jpg', 360000, 0, 30, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 19, 1, 32),
(35, 'Áo Pitch màu xanh', 'product_1472618519.jpg', 67000, 0, 2000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 35000, 1, 31),
(36, 'Bó Gối cho cầu thủ', 'product_1472618639.jpg', 80000, 0, 19000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 15000, 0, 33),
(37, 'Quần áo bóng rổ Vikis', 'product_1472619044.jpg', 80000, 1, 15000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 18, 1, 38),
(38, 'Giày Bóng Rổ Nikes', 'product_1472619113.jpg', 40000, 0, 12000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 79, 1, 36),
(39, 'Bóng Rổ Geru Star', 'product_1472619306.jpg', 58000, 0, 9000, '0000-00-00 00:00:00', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 16, 1, 37);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
