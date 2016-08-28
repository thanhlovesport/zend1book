-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2011 at 06:06 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_article`
--

CREATE TABLE IF NOT EXISTS `news_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `status` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `news_article`
--

INSERT INTO `news_article` (`id`, `article_title`, `article_content`, `status`, `poster_id`, `modified_by`) VALUES
(1, 'Hơn 800 người chết vì ngập lụt tại Pakistan', 'AP đưa tin những cơn mưa trong mùa mưa năm nay đổ xuống Pakistan với sức mạnh lớn chưa từng có. Đối với vùng tây bắc, đây là trận lụt dữ dội nhất kể từ năm 1929. Trong lúc mực nước của nhiều dòng sông liên tục dâng cao ở phía tây bắc Pakistan, người dân chạy tới những nơi chưa bị nước lũ nhấn chìm, trèo lên cây hoặc bám vào hàng rào để không bị nước cuốn trôi. Đài truyền hình Geo TV phát sóng hình ảnh những ngôi nhà tại thành phố Kalam sụp đổ trước sự tấn công của nước lũ hôm qua.\r\n\r\nBBC cho biết, chính phủ Pakistan ban bố tình trạng khẩn cấp sau khi Cơ quan Khí tượng quốc gia thông báo lượng mưa trong 36 giờ ở vùng tây bắc lên tới 312 mm. Đây là lượng mưa cao nhất trong nhiều thập kỷ. Nước lũ tàn phá đường xá, cầu và mạng lưới viễn thông khiến nỗ lực cứu hộ bị cản trở. Nguy cơ bùng phát dịch bệnh ngày càng tăng do người dân tập trung sơ tán tới các trại cùng bệnh tiêu chảy, sốt và các bệnh về da. Chính quyền nhiều nơi phải ra lệnh cắt điện để ngăn chặn tình trạng người dân bị điện giật trong lúc lội nước.', 1, 1, 1),
(2, 'Khủng bố gửi bom tới cơ quan tình báo Anh', 'AFP đưa tin, cảnh sát được gọi tới hôm 28/7 sau khi một bưu kiện đáng ngờ xuất hiện trong tòa nhà của Cục tình báo đối ngoại Anh. Hôm sau người ta lại phát hiện một bưu kiện chứa bom khác tại một bưu điện ở phía nam thủ đô London. Nó cũng được gửi tới Cục tình báo đối ngoại.\r\n\r\nCảnh sát đã bắt hai nghi phạm ở phía bắc xứ Wales và đưa họ tới London để thẩm vấn hôm nay. Hai nghi phạm, 21 và 52 tuổi, gửi bưu kiện từ hai địa chỉ khác nhau tại thành phố biển Caernarfon ở phía tây bắc xứ Wales vào ngày 30/7. Cảnh sát đang điều tra hai địa chỉ này, song họ không công bố thông tin về những thứ bên trong hai gói bưu kiện.\r\n\r\nTrụ sở của Cục quan tình báo đối ngoại Anh - thường được gọi là MI6 - nằm bên bờ sông Thames. Tòa nhà này từng xuất hiện trong nhiều phim về điệp viên lừng danh James Bond.\r\n\r\n', 0, 1, 1),
(3, 'Mỹ điều tra rò rỉ tài liệu quân sự mật', 'Julian Assange, chủ trang web Wikileaks, bảo vệ việc công bố thông tin và cho biết ông hy vọng nó sẽ gây tranh cãi về cuộc chiến Afghanistan. Assange khẳng định ông đã kiểm chứng các nguồn tin và có danh tính của họ trước khi đăng tải.\r\n\r\nAssange cho biết còn giữ trong tay khoảng 15.000 trang tài liệu mật nữa và đang cân nhắc có công bố hay không. Ông cáo buộc rằng Bộ trưởng Quốc phòng Mỹ Robert Gates chỉ trích Wikileaks để đánh lạc hướng dư luận khỏi cái chết của dân thường Afghanistan.\r\n\r\n"Máu đổ ở Afghanistan và đó là hậu quả của các chính sách của ông Gates và chính quyền (Tổng thống Mỹ) Obama cũng như xung đột chung trong khu vực", Reuters dẫn lời Assange nói.', 1, 3, 2),
(5, '23 người chết vì cháy rừng tại Nga', '“Chúng tôi chẳng biết chạy tới chỗ nào. Mọi người gọi số điện thoại khẩn cấp nhưng chẳng có ai trả lời”, Galina Shibanova, một phụ nữ 52 tuổi, nói với Reuters khi bà đứng bên ngoài ngôi nhà cháy rụi trong thị trấn Maslovka, cách thủ đô khoảng 500 km về phía nam.\r\n\r\nCác máy bay phun nước vào các đám cháy, còn lính cứu hỏa và người tình nguyện vẫn đang chiến đấu với lửa tại nhiều nơi ở miền trung.\r\n\r\nIgor Vlasnev, người đứng đầu lực lượng cứu hỏa vùng Voronezh, nhận định tình hình có thể trở nên tồi tệ hơn trong hôm nay do nhiệt độ tiếp tục tăng.\r\n\r\nTổng thống Dmitry Medvedev ra lệnh cho quân đội tham gia hoạt động dập lửa. Ông cũng yêu cầu các bộ trưởng tới những vùng chịu ảnh hưởng bởi hỏa hoạn để đánh giá nhu cầu cứu trợ của người dân.', 0, 3, 1),
(6, 'Các cô dâu Việt trải lòng về cuộc sống ở xứ Hàn', 'Ông xã của chị là một người đàn ông hơn 40 tuổi, dáng người thấp đậm. Cả buổi tiệc, anh không ngồi cạnh vợ hay chăm cho con ăn như một số ông bố Hàn khác mà thường chỉ nói chuyện với mấy người đàn ông cùng nước. Vì thế, nhìn họ không mấy ai biết đó là một cặp vợ chồng.\r\n\r\nTheo lời chị Ngát, chồng chị ít khi quan tâm đến hai cô con gái. Lấy chồng xong, chị ở nhà nội trợ, lo chăm sóc các con. Thường, mỗi tháng, anh để một số tiền nhất định vào "cuốn sổ gia đình" cho vợ chi tiêu. Mỗi khi chị cần mua sắm gì thì cứ tự nhiên lấy nhưng phải thông báo cho chồng biết.\r\n\r\n"Ông ấy vẫn bảo mình là sướng nhất vì toàn được chồng mua mỹ phẩm về cho làm đẹp, mình cũng không có gì phải phàn nàn về cuộc sống ở nhà chồng", chị Ngát thổ lộ. ', 1, 4, 4),
(7, 'Làm giàu ở Mỹ dễ thế sao?', 'Xin được nói ngay rằng tôi không hề có ý định đả phá bạn Anhchu81, chỉ mượn những thông tin mà bạn ấy đưa ra để phân tích vấn đề. Tôi tôn trọng ý chí phấn đấu và tinh thần làm việc của bạn ấy, tuy nhiên cần nói rõ thêm rằng, tôi và hầu hết tất cả các bạn của tôi khi mới qua Mỹ đều làm việc như thế cả.\r\n\r\nBạn Anhchu81 bảo rằng bạn có bằng thạc sĩ tại Mỹ và hiện đang làm việc tại một ngân hàng. Điểm này có thể một số độc giả tại Việt Nam sẽ hiểu sai vấn đề. Ở Mỹ có bằng thạc sĩ là chuyện bình thường (Mỹ vốn không nặng bằng cấp như Việt Nam) và làm việc tại một ngân hàng lại càng bình thường hơn. Quan trọng là bạn ấy làm ở ngân hàng nào và làm việc gì tại đó. ', 1, 2, 1),
(8, 'Thành phố cấm nữ công chức mặc váy ngắn', 'Telegraph cho biết, trong một biên bản ghi nhớ dành cho nhân viên trong bộ máy công quyền, hội đồng thành phố Southampton cảnh báo váy của các nữ công chức "phải có độ dài hợp lý" và họ nhất định không được mặc váy ngắn. Ngoài ra các đấng mày râu cũng phải mặc trang phục nghiêm chỉnh khi tới chỗ làm. Những người vi phạm quy định sẽ bị đuổi về nhà.\r\n\r\nBiên bản ghi nhớ được gửi tới 400 nhân viên xã hội, giáo viên, công chức trẻ và những người làm công việc liên quan tới trẻ em trong thành phố Southampton. Hội đồng thành phố khẳng định ăn mặc nghiêm túc là cách thể hiện sự tôn trọng đối với trẻ em và phụ huynh của chúng.', 1, 1, 2),
(9, 'Một người Trung Quốc tự nhận là bé nhất thế giới', 'Sau khi He Pingping, người đàn ông được công nhận là bé nhất thế giới qua đời hồi tháng 3 ở tuổi 21, Huang Kaiquan trở thành ứng viên nặng ký cho vị trí này, NY Daily News cho hay.\r\n\r\nHuang chỉ cao hơn He 1,5 cm và nặng khoảng 12 kg, tương đương với một em bé ba tuổi. Anh là con thứ hai trong gia đình. Bố mẹ và chị gái của Huang có chiều cao bình thường. Bố mẹ Huang phát hiện cậu con trai phát triển không bình thường khi anh lên 3 tuổi.', 0, 4, 5),
(10, 'Trùm ma túy Mexico bị tiêu diệt', 'uân đội Mexico thực hiện chiến dịch truy quét tại ngoại ô thành phố Guadalajara, phía tây nước này, để săn lùng ông trùm ma túy Ignacio "Nacho" Coronel.\r\n\r\nCoronel cố thủ trong một ngôi nhà trong khi trực thăng quần đảo phía trên và các binh sĩ bao vây toàn bộ khu vực. Một người dân cho biết: "Trực thăng bay rất thấp và chúng tôi được lệnh không ra khỏi nhà, sau đó có nhiều tiếng súng và tiếng nổ lớn".\r\n\r\nKhi bị vây ráp, Coronel nổ súng khiến một binh sĩ thiệt mạng và một người bị thương, rồi sau đó y bị hạ sát tại chỗ. ', 1, 5, 6),
(11, 'Hàn Quốc truy tố kẻ môi giới tuyển vợ', 'Nhân viên mai mối họ Lee này không nói cho khách hàng của anh ta biết về những hạn chế đối với hôn nhân có yếu tố nước ngoài tại Campuchia, trong đó có chuyện phỏng vấn hàng loạt để chọn vợ. Nếu bị kết tội, Lee sẽ bị phạt 2.500 USD, AFP cho hay.\r\n\r\nTheo văn bản của tòa, Lee sắp xếp để một người đàn ông 43 tuổi đến Phnom Penh tháng 9 năm ngoái và đưa 25 cô gái từ vùng nông thôn lên xếp hàng cho ông ta xem mặt. Trước đó, một nhân viên môi giới hôn nhân người Campuchia bị tuyên án 10 năm tù trong vụ này.\r\n\r\nCampuchia ra lệnh cấm kết hôn với người nước ngoài năm 2008 để ngăn nạn buôn người. Nước này lo ngại rằng ngày càng nhiều đàn ông Hàn Quốc tìm đến các cô gái nghèo qua mai mối. Lệnh trên được xóa bỏ sau đó 8 tháng, sau khi Campuchia ra luật mới nhằm ngăn tình trạng đặt hàng cô dâu. ', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `category_name`) VALUES
(2, 'Thế giới'),
(3, 'Kinh doanh'),
(4, 'Văn Hóa'),
(5, 'Thể thao'),
(6, 'Pháp luật'),
(7, 'Khoa học'),
(8, 'Vi tính');

-- --------------------------------------------------------

--
-- Table structure for table `news_category_artilce`
--

CREATE TABLE IF NOT EXISTS `news_category_artilce` (
  `category_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_category_artilce`
--

INSERT INTO `news_category_artilce` (`category_id`, `article_id`) VALUES
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 9),
(3, 10),
(3, 11),
(4, 1),
(4, 2),
(4, 5),
(4, 7),
(5, 1),
(5, 8),
(5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE IF NOT EXISTS `privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `module` varchar(150) NOT NULL,
  `controller` varchar(150) NOT NULL,
  `action` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `name`, `module`, `controller`, `action`) VALUES
(1, 'Admin Cpanel', 'default', 'admin', 'index'),
(2, 'Hiển thị các nhóm', 'default', 'admin-group', 'index'),
(3, 'Hiển thị các nhóm', 'default', 'admin-group', 'index'),
(4, 'Thêm một nhóm mới', 'default', 'admin-group', 'add'),
(5, 'Chỉnh sửa một nhóm', 'default', 'admin-group', 'edit'),
(6, 'Xóa một nhóm', 'default', 'admin-group', 'delete'),
(7, 'Xóa nhiều nhóm', 'default', 'admin-group', 'multi-delete'),
(8, 'Thay đổi trạng nhóm', 'default', 'admin-group', 'status'),
(9, 'Sắp xếp thứ tự nhóm', 'default', 'admin-group', 'sort'),
(10, 'Xem theo tùy chọn', 'default', 'admin-group', 'filter'),
(11, 'Hiển thị các thành viên', 'default', 'admin-user', 'index'),
(12, 'Thêm một thành viên mới', 'default', 'admin-user', 'add'),
(13, 'Chỉnh sửa một thành viên', 'default', 'admin-user', 'edit'),
(14, 'Xóa một thành viên', 'default', 'admin-user', 'delete'),
(15, 'Xóa nhiều thành viên', 'default', 'admin-user', 'multi-delete'),
(16, 'Thay đổi trạng thành viên', 'default', 'admin-user', 'status'),
(17, 'Xem theo tùy chọn', 'default', 'admin-user', 'filter'),
(18, 'Hiển thị các item', 'shopping', 'admin-item', 'index'),
(19, 'Thêm một  item mới', 'shopping', 'admin-item', 'add'),
(20, 'Chỉnh sửa một  item', 'shopping', 'admin-item', 'edit'),
(21, 'Xóa một  item', 'shopping', 'admin-item', 'delete'),
(22, 'Xóa nhiều  item', 'shopping', 'admin-item', 'multi-delete'),
(23, 'Thay đổi trạng  item', 'shopping', 'admin-item', 'status'),
(24, 'Xem theo tùy chọn', 'shopping', 'admin-item', 'filter'),
(25, 'Hiển thị các category', 'shopping', 'admin-category', 'index'),
(26, 'Thêm một category mới', 'shopping', 'admin-category', 'add'),
(27, 'Chỉnh sửa một category', 'shopping', 'admin-category', 'edit'),
(28, 'Xóa một category', 'shopping', 'admin-category', 'delete'),
(29, 'Xóa nhiều category', 'shopping', 'admin-category', 'multi-delete'),
(30, 'Thay đổi trạng category', 'shopping', 'admin-category', 'status'),
(31, 'Xem theo tùy chọn', 'shopping', 'admin-category', 'filter'),
(32, 'Sắp xếp category', 'shopping', 'admin-category', 'sort');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `picture`, `price`, `special`, `selloff`, `publish_date`, `synopsis`, `author`, `content`, `hits`, `created`, `created_by`, `modified`, `modified_by`, `order`, `status`, `cat_id`) VALUES
(1, 'PHP and MySQL Web Development', 'php-001.jpg', 54.99, 0, 34.17, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Luke Welling', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 100, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(2, 'PHP 6 and MySQL 5 for Dynamic Web Sites', 'php002.jpg', 49.99, 0, 28.22, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Larry Ullman', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 100, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(3, 'Head First PHP & MySQL', 'php003.jpg', 44.99, 0, 0, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Michael Morrison', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 23, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(4, 'PHP Solutions: Dynamic Web Design Made Easy', 'php004.jpg', 44.99, 0, 27.99, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'David Powers', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 123, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(5, 'Beginning PHP and MySQL: From Novice to Professional', 'php005.jpg', 49.99, 0, 29.99, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'W. Jason Gilmore', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 323, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(6, 'Programming PHP', 'php006.jpg', 39.99, 0, 25.32, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Rasmus Lerdorf', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 790, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(7, 'I Hate PHP - A Beginners Guide to PHP & MySQL Programming', 'php007.jpg', 4.99, 0, 0, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'eBook Media Ventures', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 190, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(8, 'PHP Cookbook: Solutions and Examples for PHP Programmers', 'php008.jpg', 44.99, 0, 29.69, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'David Sklar', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 70, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(9, 'PHP Solutions: Dynamic Web Design Made Easy', 'php009.jpg', 34.99, 0, 15.48, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'David Powers', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 79, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(10, 'Murach''s PHP and MySQL', 'php010.jpg', 54.5, 0, 34.34, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Joel Murach', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 479, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 19),
(11, 'Zend Framework, A Beginner''s Guide', 'zf001.jpg', 39.99, 1, 25.06, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Vikram Vaswani', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 179, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 20),
(12, 'Pro Zend Framework Techniques: Build a Full CMS Project', 'zf002.jpg', 46.99, 1, 24.3, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Forrest Lyman', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 175, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 20),
(13, 'Beginning Zend Framework', 'zf003.jpg', 42.99, 1, 26.58, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Armando Padilla', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 375, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 20),
(14, 'Zend Framework in Action', 'zf004.jpg', 44.99, 1, 32.5, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Rob Allen', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 895, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 20),
(15, 'Zend Framework 1.8 Web Application Development ', 'zf005.jpg', 39.99, 1, 33.57, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Keith Pope', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 495, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 20),
(16, 'Zend Framework: The Official Programmer’s Reference Guide', 'zf006.jpg', 49.99, 1, 22.24, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Zend', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 435, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 20),
(17, 'Easy PHP Websites with the Zend Framework', 'zf007.jpg', 40.99, 1, 25.24, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'W. J. Gilmore', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 135, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 20),
(18, 'Beginning Database Design: From Novice to Professional ', 'db001.jpg', 34.99, 0, 21.77, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Clare Churcher', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 535, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 18),
(19, 'Beginning Database Design: From Novice to Professional', 'db002.jpg', 34.99, 0, 17.39, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Clare Churcher', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 230, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 18),
(20, 'Modern Database Management', 'db003.jpg', 182, 0, 147.91, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Jeffrey A. Hoffer', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 230, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 18),
(21, 'High Performance MySQL: Optimization, Backups, Replication, and More', 'db004.jpg', 49.99, 0, 29.99, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Baron Schwartz', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 430, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 18),
(22, 'Learning MySQL', 'db005.jpg', 44.99, 0, 29.39, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Seyed M.M', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 330, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 18),
(23, 'MySQL Administrator''s Bible', 'db005.jpg', 49.99, 0, 31.17, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Sheeri K. Cabral and Keith Murphy', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 630, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 18),
(24, 'MySQL Cookbook ', 'db006.jpg', 49.99, 0, 31.17, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Paul Dubois', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 230, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 18),
(25, 'The Definitive Guide to MySQL 5', 'db007.jpg', 49.99, 0, 30.81, '2010-02-20 00:00:00', 'Dolore Mam libero tempore massa estumede\r\nsoluta nobis est eligendi omnis volutasassumenda est, omnis doloresed repeledusempquibusdamet aut rerum odes neceset voluptateestu repudiandae sint et molestiae non recus', 'Michael Kofler', 'Duis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. \r\n\r\nDuis autem vel eum iriure dolor in hendreri in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. \r\n\r\nLorem ipsum dolor sit amet, consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\nUt wisi enim ad minim veniam. ', 1030, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `parents` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '10',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `picture`, `parents`, `created`, `created_by`, `modified`, `modified_by`, `order`, `status`) VALUES
(1, 'Máy tính & Internet', NULL, 0, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 1, 1),
(2, 'Kinh doanh & Đầu tư', NULL, 0, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 2, 1),
(3, 'Chuyên nghành và kỹ thuật', NULL, 0, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 3, 1),
(4, 'Khoa học & Ngoại ngữ', NULL, 0, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(5, 'Y tế, Tâm thức và cơ thể', NULL, 0, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(6, 'Truyện tranh', NULL, 0, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 6, 1),
(7, 'Gia đình & con cái', NULL, 0, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 7, 1),
(8, 'Lập trình', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(9, 'Phần mềm', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(10, 'Khoa học Máy tính', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(11, 'Phát triển Web', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(12, 'Thiết kế đồ họa', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(13, 'Mạng', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(14, 'Bảo mật và mã hóa', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(15, 'Phần cứng', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(16, 'Viễn thông', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(17, 'Microsoft', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(18, 'Cơ sở dữ liệu', NULL, 1, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(19, 'PHP', NULL, 8, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(20, 'Zend Framework', NULL, 8, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(21, 'ASP', NULL, 8, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(22, 'C#', NULL, 8, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(23, 'Java', NULL, 8, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(24, 'Visual Basic', NULL, 8, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(25, 'Window', NULL, 9, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(26, 'Adobe', NULL, 9, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(27, 'Apple', NULL, 9, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(28, 'Linux', NULL, 9, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(29, 'Opensource', NULL, 9, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(30, 'Tiếp thị & Bán hàng', NULL, 2, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(31, 'Doanh nghiệp', NULL, 2, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(32, 'Kế toán', NULL, 2, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(33, 'Chuyên ngành', NULL, 2, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(34, 'Quản lý và Lãnh đạo', NULL, 2, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(35, 'Kỹ năng', NULL, 2, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(36, 'Quản lý kinh doanh', NULL, 3, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(37, 'Kế toán & Tài chính', NULL, 3, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(38, 'Du lịch & Khách sạn', NULL, 3, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(39, 'Kỹ thuật', NULL, 3, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(40, 'Giáo dục', NULL, 3, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(41, 'Ngoại ngữ', NULL, 4, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(42, 'Khoa học xã hội', NULL, 4, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(43, 'Giáo dục', NULL, 4, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(44, 'Viễn tưởng', NULL, 4, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(45, 'Nghiên cứu', NULL, 4, '2011-01-15 00:00:00', 1, '2011-01-15 00:00:00', 2, 10, 1),
(46, 'Hon nhan', NULL, 7, '2011-02-22 21:38:33', 1, '0000-00-00 00:00:00', 0, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `brithday` date NOT NULL,
  `salary` float NOT NULL,
  `bonus` float NOT NULL,
  `nationality` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `brithday`, `salary`, `bonus`, `nationality`) VALUES
(1, 'Thanh Nguyen', '1990-01-23', 350.4, 250.7, 'VN'),
(2, 'Khanh Pham', '1994-01-19', 370.25, 270.75, 'GB'),
(3, 'Long Nguyen', '1982-01-19', 195.25, 170.75, 'US'),
(4, 'Van Nguyen', '1988-06-19', 435.45, 210.75, 'DE'),
(5, 'Lan Tran', '1984-08-21', 737.45, 230.75, 'FR'),
(6, 'Zuki Pham', '1985-08-21', 623.45, 430.75, 'JP'),
(7, 'Hiep Tran', '1981-06-11', 693.45, 130.75, 'RU');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_avatar` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `birthday` date DEFAULT '0000-00-00',
  `register_date` datetime DEFAULT NULL,
  `register_ip` varchar(20) DEFAULT NULL,
  `visited_date` datetime DEFAULT NULL,
  `visited_ip` varchar(20) DEFAULT NULL,
  `active_code` varchar(45) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `sign` text,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_avatar`, `password`, `email`, `first_name`, `last_name`, `birthday`, `register_date`, `register_ip`, `visited_date`, `visited_ip`, `active_code`, `status`, `sign`, `group_id`) VALUES
(1, 'KhanhPham', 'khanhpham.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'vukhanh2212@gmail.com', 'Pham Vu', 'Khanh', '1978-12-22', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 1),
(2, 'Marsu', 'marsu.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'marsu@zend.vn', 'Phạm Tiến', 'Thịnh', '1983-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 2),
(3, 'VietRuss', 'vietruss.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'vietruss@zend.vn', 'Nguyễn Việt', 'Thắng', '1981-01-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 2),
(4, 'tuanha', 'tuanha.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'tuanha@zend.vn', 'Tuan', 'Ha', '1984-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 3),
(5, 'anhnga2607', 'anhnga2607.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'anhnga2607@zend.vn', 'Anh', 'Nga', '1985-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 3),
(6, 'hoanglong', 'hoanglong.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'hoanglong@gmail.com', 'Hoang', 'Long', '1988-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 4),
(7, 'nhannghia', 'nhannghia.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'nhannghia@gmail.com', 'Nhan', 'Nghia', '1988-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 4),
(8, 'thanhphong', 'thanhphong.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'thanhphong@gmail.com', 'Thanh', 'Phong', '1988-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 4),
(9, 'antran', 'antran.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'antran@gmail.com', 'An', 'Tran', '1988-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 4),
(10, 'havu', 'havu.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'havu@gmail.com', 'Ha', 'Vu', '1988-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 4),
(11, 'thanhtam', 'thanhtam.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'thanhtam@gmail.com', 'Thanh', 'Tam', '1988-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 4),
(12, 'huyhiep', 'huyhiep.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'huyhiep@gmail.com', 'Huy', 'Hiep', '1988-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, 'I love Zend Framework', 4),
(13, 'longnguyen', 'file_1294938192.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'longnguyen@gmail.com', 'Nguyen', 'Long', '1988-11-01', '2010-07-01 00:00:00', '127.0.0.1', '2010-07-01 00:00:00', '127.0.0.1', NULL, 1, '<div>I love Zend Framework</div>', 4),
(20, 'Khanh Pham', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'admin1213213@yahoo.com', 'Khanh', 'Pham', '1978-12-22', '2010-09-20 00:00:00', '127.0.0.1', NULL, NULL, NULL, 1, '<div>&#160;asdsa dsahd asdasd asdhasd asydasnd asydaskd</div>', 2),
(21, 'ZendVN', NULL, 'fcea920f7412b5da7be0cf42b8c93759', 'trieukinh123@gmail.com', 'Trieu', 'Kinh', '1998-10-20', '2010-09-20 00:00:00', '127.0.0.1', NULL, NULL, NULL, 1, '<div>&#160;asdsad asjdksa dasljkdlkasd sajdkjaskdjsa djasjdjas</div>', 4),
(22, 'Tester123', '', 'e10adc3949ba59abbe56e057f20f883e', 'Tester123@yahoo.com', 'Tester', 'Mr.', '1990-12-12', '2010-09-20 00:00:00', '127.0.0.1', NULL, NULL, NULL, 1, '<div style=\\"background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; \\">&#160;This is a test&#160;&#160;This is a test&#160;&#160;This is a test&#160;&#160;This is a test&#160;&#160;This is a test&#160;&#160;This is a test</div>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT 'none',
  `avatar` varchar(45) DEFAULT NULL,
  `ranking` varchar(45) DEFAULT NULL,
  `group_acp` tinyint(1) DEFAULT '0',
  `group_default` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT '0',
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT '0',
  `permission` varchar(20) NOT NULL DEFAULT 'limit',
  `status` tinyint(1) DEFAULT '0',
  `order` int(11) DEFAULT '99',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `group_name`, `type`, `avatar`, `ranking`, `group_acp`, `group_default`, `created`, `created_by`, `modified`, `modified_by`, `permission`, `status`, `order`) VALUES
(1, 'Founder', 'none', 'founder.png', 'rfounder.png', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Full Access', 1, 1),
(2, 'Administrator', 'none', 'administrator.png', 'rAdministrator.png', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Full Access', 1, 2),
(4, 'Member', 'none', 'member.gif', 'rMember.png', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 4),
(3, 'Manager', 'none', 'manager.gif', 'rManager.png', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Limit Access', 0, 3),
(18, 'Hải Phòng', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(14, 'Ha Noi', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(15, 'TP.Ho Chi Minh', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(16, 'Huế', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(17, 'Đà Nẵng', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(19, 'Cần Thơ', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(20, 'Vũng Tàu', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(21, 'Khánh Hòa', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(22, 'Quảng Nam', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(23, 'Vĩnh Long', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(24, 'An Giang', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10),
(25, 'Nghệ An', 'none', NULL, NULL, 0, 0, '2010-07-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 'Limit Access', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_group_privileges`
--

CREATE TABLE IF NOT EXISTS `user_group_privileges` (
  `privilege_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`privilege_id`,`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group_privileges`
--

INSERT INTO `user_group_privileges` (`privilege_id`, `group_id`, `status`) VALUES
(18, 3, 1),
(1, 3, 1),
(19, 3, 1),
(20, 3, 1),
(21, 3, 1),
(22, 3, 1),
(23, 3, 1),
(24, 3, 1),
(25, 3, 1),
(26, 3, 1),
(27, 3, 1),
(28, 3, 1),
(29, 3, 1),
(30, 3, 1),
(31, 3, 1),
(32, 3, 1);
