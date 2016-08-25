-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2016 at 01:18 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `childrenworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,0) NOT NULL,
  `special` tinyint(1) DEFAULT '0',
  `sale_off` int(3) DEFAULT '0',
  `picture` text,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `ordering` int(11) DEFAULT '10',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `category_id`) VALUES
(1, 'Những con chim ẩn mình chờ chế', 'Điều đau khổ và niềm tin trong cuộc sống', '50000', 1, 30, 'x3827FjK.jpg', '0000-00-00', NULL, '2016-03-05', 'admin', 1, 3, 6),
(5, 'Chicken Sup for the soul', 'Những Câu Chuyện Sưởi Ấm Lòng Bạn', '45000', 1, 25, 'SwuyU2rX.jpg', '2016-03-15', 'admin', '2016-03-05', 'admin', 1, 1, 22),
(8, 'những điều kinh điển', 'Tác phẩm kinh điển thế kỉ 20', '35000', 0, 50, 'yCnM6WgK.jpg', '2016-03-04', '1', '2016-03-05', 'admin', 1, 55, 16),
(9, 'Mùa Thu Trong Kí Ức Của Tôi', 'Câu chuyện về một thời đã qua', '350000', 0, 5, 'QVNAPgOs.jpg', '2016-03-04', '1', '2016-03-05', 'admin', 1, 82, 12),
(10, 'Lá Đậu Trên Cành', 'Văn học kinh điển', '789000', 1, 20, 'fFhR0Cvu.jpg', '2016-03-04', '1', '2016-03-05', 'admin', 1, 88, 5),
(11, 'Tôi thấy hoa vàng trên cỏ xanh', 'Cuốn sách viết về tuổi thơ nghèo khó ở một làng quê, bên cạnh đề tài tình yêu quen thuộc, lần đầu tiên Nguyễn Nhật Ánh đưa vào tác phẩm của mình những nhân vật phản diện và đặt ra vấn đề đạo đức như sự vô tâm, cái ác. 81 chương ngắn là 81 câu chuyện nhỏ của những đứa trẻ xảy ra ở một ngôi làng: chuyện về con cóc Cậu trời, chuyện ma, chuyện công chúa và hoàng tử, bên cạnh chuyện đói ăn, cháy nhà, lụt lội,..', '85000', 1, 15, 'iAKMRSV2.jpg', '2016-03-04', '1', '2016-03-05', 'admin', 1, 66, 5),
(12, 'Mèo Ú ăn bánh rán', 'con mèo ú ù', '86000', 1, 10, 'QKLgUJyv.jpg', '2016-03-04', '1', '2016-03-05', 'admin', 1, 99, 9),
(13, 'Chiếc Lá Cuối Cùng', 'Câu chuyện lãng mạn, khiến ta suy ngẫm lại con người và thời gian', '85000', 1, 2, 'Ta1GuQZr.jpg', '2016-03-05', 'admin', '2016-03-05', 'admin', 1, 16, 6),
(14, 'Violin bên cuốn sách xanh', 'Giai điệu ngân nga, du dương của cây vĩ cầm bên những cuốn sách', '80000', 0, 10, 'gQ19cLJm.jpg', '2016-03-07', 'admin', '0000-00-00', NULL, 1, 66, 12),
(15, 'Hạt Giống Tâm Hồn Truyện', 'Cho những tâm hồn hoài niệm, câu chuyện lắng đọng', '65000', 0, 10, 'WVL0Suyt.jpg', '2016-03-07', 'admin', '0000-00-00', NULL, 1, 20, 22),
(16, 'Giáo Dục Vô Địch', 'Giáo dục Việt Nam là một nền giáo dục tiên tiến khó có thể mà thấu hiểu được', '88000', 0, 50, 'viSBme9k.jpg', '2016-03-07', 'admin', '0000-00-00', NULL, 1, 55, 9);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `books` text NOT NULL,
  `prices` text NOT NULL,
  `quantities` text NOT NULL,
  `names` text NOT NULL,
  `pictures` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`) VALUES
('8TgN3vs', 'admin', '["15"]', '["58500"]', '["1"]', '["Hu1ea1t Giu1ed1ng Tu00e2m Hu1ed3n Truyu1ec7n"]', '["WVL0Suyt.jpg"]', 0, '2016-03-08 02:35:50'),
('PRMEAB9', 'admin', '["1","13","8"]', '["35000","83300","17500"]', '["1","1","2"]', '["Nhu1eefng con chim u1ea9n mu00ecnh chu1edd chu1ebf","Chiu1ebfc Lu00e1 Cuu1ed1i Cu00f9ng","nhu1eefng u0111iu1ec1u kinh u0111iu1ec3n"]', '["x3827FjK.jpg","Ta1GuQZr.jpg","yCnM6WgK.jpg"]', 0, '2016-03-08 02:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` text,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `ordering` int(11) DEFAULT '10'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(2, 'Kinh Tế', 'hbdzft4Y.jpg', '2016-02-26', 'admin', '2016-03-09', 'admin', 1, 8),
(3, 'Chính Trị', 'u3vGmeWS.jpg', '2016-02-26', 'admin', '2016-03-01', 'admin', 1, 16),
(5, 'Văn Học', 'lE1Ags7a.jpg', '2016-02-26', 'admin', '2016-03-02', 'admin', 1, 18),
(6, 'Tiểu Thuyết', 'e9GdyXjW.jpg', '2016-02-27', 'admin', '2016-03-02', 'admin', 1, 20),
(9, 'Biếm Họa', '8vfGF9Ti.jpg', '2016-02-29', 'admin', '2016-03-02', 'admin', 1, 4),
(12, 'Trừu Tượng', 'SsKNWfep.jpg', '2016-02-29', 'admin', '2016-03-02', 'admin', 1, 3),
(16, 'Nghệ Thuật', 'MEIm9eO1.jpg', '2016-02-29', 'admin', '2016-03-01', 'admin', 1, 2),
(22, 'Hạt Giống Tâm Hồn', 'vlL2G4zS.jpg', '2016-03-01', 'admin', '2016-03-02', 'admin', 1, 1),
(24, 'Thiền Định', 'aVWFSqxn.jpg', '2016-03-09', 'admin', '0000-00-00', NULL, 1, 86);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_acp` tinyint(1) DEFAULT '0',
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(45) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `ordering` int(11) DEFAULT '10',
  `privilege_id` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `privilege_id`) VALUES
(8, 'RealMadrid', 1, '2016-01-12', NULL, '2016-01-25', NULL, 0, 15, '1,2,5,8'),
(9, 'Barceldona', 0, '2016-02-12', NULL, '2016-02-25', NULL, 1, 18, ''),
(10, 'Arsenal', 0, '2016-02-18', NULL, '2016-01-21', '15', 0, 122, ''),
(11, 'Acmilan', 1, '2016-01-21', '1', '0000-00-00', NULL, 1, 35, '1,2,3,4,5,6,7,8'),
(12, 'Chelsea', 0, '2016-01-21', '1', '0000-00-00', NULL, 1, 36, ''),
(13, 'ManUnited', 0, '2016-01-21', '1', '0000-00-00', NULL, 0, 78, ''),
(14, 'Dortmund', 1, '2016-01-21', '1', '2016-01-26', '15', 1, 69, ''),
(16, 'BayerMunich', 1, '2016-01-21', '1', '2016-02-22', 'admin', 1, 88, ''),
(17, 'Lescity', 1, '2016-02-22', 'admin', '0000-00-00', NULL, 1, 16, '');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `module` varchar(45) NOT NULL,
  `controller` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`, `module`, `controller`, `action`) VALUES
(1, 'Hiển thị danh sách người dùng', 'admin', 'user', 'index'),
(2, 'Thay đổi status người dùng', 'admin', 'user', 'status'),
(3, 'Cập nhật thông tin người dùng', 'admin', 'user', 'form'),
(4, 'Thay đổi status của người dùng Ajax', 'admin', 'user', 'ajaxStatus'),
(5, 'Xóa một hoặc nhiều người dùng', 'admin', 'user', 'trash'),
(6, 'Thay đổi vị trí hiển thị của người dùng', 'admin', 'user', 'ordering'),
(7, 'Truy cập menu Admin Control Panel', 'admin', 'index', 'index'),
(8, 'Đăng nhập Admin Control Panel', 'admin', 'index', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(45) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(45) DEFAULT NULL,
  `register_date` datetime DEFAULT '0000-00-00 00:00:00',
  `register_ip` varchar(25) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `ordering` int(11) DEFAULT '10',
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `created`, `created_by`, `modified`, `modified_by`, `register_date`, `register_ip`, `status`, `ordering`, `group_id`) VALUES
(1, 'modric', 'modric@gmail.com', 'lukamodric', '061a7cb5230d2e91e3dd60e9ec7ee848', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', '', 1, 10, 8),
(3, 'kaka', 'kaka@gmail.com', 'RicaldoKaka', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', NULL, '0000-00-00', NULL, '0000-00-00 00:00:00', '', 0, 3, 9),
(4, 'Silva', 'silva@gmail.com', 'DavidSilva', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', NULL, '0000-00-00', NULL, '0000-00-00 00:00:00', '', 1, 2, 10),
(5, 'admin', 'admin@gmail.com', 'MarcoAdmin', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', NULL, '0000-00-00', NULL, '0000-00-00 00:00:00', '', 0, 8, 11),
(6, 'Reus', 'reus@gmail.com', 'MarcoReus', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', '', 0, 16, 12),
(7, 'messi', 'messi@gmail.com', 'LionelMessi', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', '1', '2016-01-26', '15', '0000-00-00 00:00:00', '', 1, 15, 13),
(8, 'KroosReal', 'kroos@gmail.com', 'TonyKroos', 'e10adc3949ba59abbe56e057f20f883e', '2016-01-26', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', '', 1, 6, 16),
(9, 'Aguero', 'Aguero@gmail.com', 'ThomasRosicky', '', '2016-01-26', '1', '2016-01-26', '15', '0000-00-00 00:00:00', '', 1, 17, 17),
(10, 'RodrigedArsenal', 'Rodriges@gmail.com', 'JameRodriges', '2816a8f48b86331faf6c7e1ba7b05a10', '2016-01-26', '1', '2016-02-27', '15', '0000-00-00 00:00:00', '', 0, 88, 8),
(11, 'Coutinho', 'Coutinho@gmail.com', 'PhilippeCoutinho', '09f1fabaa5fa8a53ff86230d626847da', '0000-00-00', NULL, '0000-00-00', NULL, '2016-01-30 17:01:59', '::1', 0, 10, 15),
(12, 'vantu', 'tubt1994@gmail.com', 'LeVanTu', '8e7682ef81dd49d8fed31f93fa141bcf', '0000-00-00', NULL, '0000-00-00', NULL, '2016-02-23 01:02:31', '::1', 0, 10, 0),
(13, 'Vardy', 'vardy@gmail.com', 'JamyVardy', 'f846647695607cde85aa5fb0ecbc9d89', '0000-00-00', NULL, '0000-00-00', NULL, '2016-02-23 01:02:45', '::1', 0, 10, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
