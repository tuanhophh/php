-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 05:07 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `content`, `created_at`, `update_at`, `image`) VALUES
(8, 'Phong cách thời trang', '<p>B&iacute; k&iacute;p để tr&ocirc;ng lu&ocirc;n đẹp trai ch&iacute;nh l&agrave; x&acirc;y dựng một phong c&aacute;ch c&aacute; nh&acirc;n thật độc đ&aacute;o. Bạn chẳng phải Fashionista n&ecirc;n c&oacute; thể gu ăn mặc chưa s&agrave;nh điệu. Trước ti&ecirc;n cần mặc đ&uacute;ng, ph&ugrave; hợp với lứa tuổi v&agrave; ho&agrave;n cảnh.</p>\r\n', '2021-04-18 08:40:14', '2021-04-18 08:40:14', '1618735214skater-style-21.jpg'),
(9, 'Sự tự tin', '<p>Sự tự tin l&agrave; yếu tố quan trọng, h&atilde;y cứ lu&ocirc;n l&agrave; ch&iacute;nh m&igrave;nh, v&igrave; những điều ri&ecirc;ng biệt sẽ g&acirc;y thu h&uacute;t nhất. Ngo&agrave;i ra, con trai sở hữu một v&agrave;i t&agrave;i lẻ như nhảy nh&oacute;t, chơi guitar, thể thao&hellip; c&ugrave;ng với sự tự tin trong giao tiếp cũng l&agrave; những điểm cộng s&aacute;ng gi&aacute; để g&acirc;y ấn tượng với mọi người.</p>\r\n', '2021-04-18 08:41:04', '2021-04-18 08:41:04', '1618735264Develop-a-confidence-mindset.jpg'),
(10, 'Vuốt sáp/keo và sử dụng sản phẩm dưỡng cho tóc', '<p>10 người th&igrave; c&oacute; tới 8 người k&ecirc;u than &ldquo;T&oacute;c chỉ đẹp khi c&ograve;n ở tiệm&rdquo;. Nhưng sự thật t&oacute;c c&oacute; cắt đẹp nhưng anh bỏ b&ecirc; n&oacute; khi về tới nh&agrave;, kh&ocirc;ng chịu chăm s&oacute;c tạo kiểu th&igrave; kh&ocirc;ng c&oacute; chuyện đẹp trai được đ&acirc;u.</p>\r\n', '2021-04-18 08:42:36', '2021-04-18 08:42:36', '1618735356maxresdefault-6.jpg'),
(11, 'Mạnh dạn thử nhiều kiểu tóc', '<p>H&atilde;y đầu tư một khoản nhất định cho kiểu t&oacute;c của m&igrave;nh. T&oacute;c nam giới thường d&agrave;i rất nhanh vậy n&ecirc;n h&atilde;y đi cắt tỉa cho gọn g&agrave;ng từ 2-3 tuần 1 lần.</p>\r\n', '2021-04-18 08:49:11', '2021-04-18 08:49:11', '1618735751Nhung-mau-nhuom-toc-dep-giup-nam-gioi-tro-nen-sieu-ngau-30Shine2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `cate_img`) VALUES
(2, 'Cắt tóc nam', '161812749715-kieu-toc-nam-uon-dep-hien-dai-dang-cap-nhat-nam-2020-toc-nam-uon-5-1589183333-456-width600height590.jpg'),
(3, 'Cắt tóc nữ ', '1618127156cac-kieu-cat-toc-nu-dep.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmt_id`, `user_id`, `service_id`, `content`, `created_at`) VALUES
(1, 1, 2, 'tốt', '2021-04-18 05:04:41'),
(2, 2, 2, 'fgdfg', '2021-04-24 16:07:20'),
(3, 2, 2, 'đẹp', '2021-04-24 16:07:37'),
(4, 2, 2, 'đẹp', '2021-04-24 16:08:11'),
(5, 2, 2, 'đẹp', '2021-04-24 16:08:38'),
(6, 2, 2, 'ok', '2021-04-24 16:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cut_day` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `staff_id`, `note`, `created_at`, `cut_day`, `status`, `name`, `phone`) VALUES
(7, 1, 2, '', '2021-04-22 15:07:02', '2021-04-23 18:10:00', 0, '', ''),
(8, 1, 2, '', '2021-04-22 15:07:27', '2021-04-23 18:10:00', 0, '', ''),
(9, 1, 2, '', '2021-04-22 16:07:12', '2021-04-16 23:01:00', 0, '', ''),
(10, 1, 2, '', '2021-04-22 16:12:07', '2021-04-16 23:01:00', 0, '', ''),
(11, 1, 2, '', '2021-04-22 16:12:32', '2021-04-16 23:01:00', 0, '', ''),
(12, 1, 2, '', '2021-04-22 16:15:30', '2021-04-22 23:15:00', 0, '', ''),
(13, 1, 2, '', '2021-04-22 16:16:36', '2021-04-22 23:15:00', 0, '', ''),
(14, 1, 2, '', '2021-04-22 16:17:14', '2021-04-22 23:15:00', 0, '', ''),
(15, 1, 2, '', '2021-04-22 16:20:53', '2021-04-22 23:15:00', 0, '', ''),
(16, 1, 2, '', '2021-04-22 16:21:17', '2021-04-22 23:15:00', 0, '', ''),
(17, 1, 2, '', '2021-04-22 16:21:51', '2021-04-22 23:15:00', 0, '', ''),
(18, 1, 2, '', '2021-04-22 16:22:22', '2021-04-22 23:23:00', 0, '', ''),
(19, 1, 2, '', '2021-04-22 16:22:35', '2021-04-22 23:23:00', 0, '', ''),
(20, 1, 2, '', '2021-04-22 16:23:11', '2021-04-22 23:23:00', 0, '', ''),
(21, 1, 2, '', '2021-04-22 17:32:50', '2021-05-01 00:36:00', 0, '', ''),
(22, 2, 2, '', '2021-04-24 10:29:08', '2021-04-30 22:33:00', 0, '', ''),
(23, 2, 2, '', '2021-04-24 14:56:13', '2021-04-24 21:59:00', 0, '', ''),
(24, 2, 2, '', '2021-04-24 15:00:37', '2021-05-01 22:00:00', 0, '', ''),
(25, 2, 2, '', '2021-04-24 15:01:14', '2021-05-01 22:00:00', 0, '', ''),
(26, 2, 2, '', '2021-04-24 15:05:54', '2021-05-01 22:00:00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `service_id`) VALUES
(20, 2),
(20, 3),
(20, 7),
(20, 8),
(21, 2),
(21, 3),
(22, 2),
(22, 3),
(23, 9),
(24, 9),
(25, 9),
(26, 9);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_img` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `detail` varchar(500) NOT NULL,
  `cate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_img`, `price`, `sale`, `detail`, `cate_id`) VALUES
(2, 'Uốn cụp ', '1618130014toc-ngan-duoi-cup-1a.jpg', 299, 0, 'Tóc uốn cụp', 3),
(3, 'Tóc xoăn lơi', '1618134566kieu-toc-nu-dep-13.jpg', 399, 0, 'tóc đẹp', 3),
(7, 'Undercut', '1618764782cd7db57e03e3cc8ac0b72a2e23f1d0cd.jpg', 200, 149, '<p>Undercut l&agrave; một trong những kiểu t&oacute;c nam đang được y&ecirc;u th&iacute;ch nhất trong thời điểm hiện nay bởi n&eacute;t nam t&iacute;nh quyến rũ m&ecirc; hồn. Bạn c&oacute; thể tham khảo một số kiểu undercut thịnh h&agrave;nh &lt;br&gt;</p>\r\n\r\n<p>Undercut bất đối xứng l&agrave; một kiểu t&oacute;c c&oacute; một b&ecirc;n cao s&aacute;t đến đỉnh đầu, 1 b&ecirc;n cạo đến mang tai, một phần t&oacute;c m&aacute;i được để d&agrave;i rũ sang một b&ecirc;n tạo vẻ lịch l&atilde;m phong t', 2),
(8, 'Kiểu tóc 2 mái ', '1618764928cach-tao-kieu-toc-2-mai-cho-nam_093705020.jpg', 300, 269, '<p>T&oacute;c nam đẹp H&agrave;n Quốc 2 m&aacute;i l&agrave; kiểu t&oacute;c được nhiều bạn nam ưa th&iacute;ch v&agrave; trưng diện trong năm 2021. Kiểu t&oacute;c H&agrave;n Quốc 2 m&aacute;i c&oacute; đặc điểm được cắt ngắn v&agrave; phần t&oacute;c 2 b&ecirc;n được cắt tỉa gọn g&agrave;ng tập trung nhiều v&agrave;o phần đỉnh lẫn m&aacute;i. Phần m&aacute;i t&oacute;c d&agrave;i bạn c&oacute; thể biến tấu để m&aacute;i t&oacute;c th&ecirc;m gọn g&agrave;ng sao cho gương mặt c&acirc;n đối hơn.', 2),
(9, 'Tóc nam layer', '1619261301nhung-kieu-toc-nam-dep-2020-dan-dau-xu-huong-va-hot-nhat-hien-nay-toc-nam-dep-7-1593143932-727-width640height529.jpg', 320, 250000, '<p>T&oacute;c nam đẹp layer l&agrave; một trong những kiểu t&oacute;c được nhiều sao quốc tế ưa chuộng v&agrave; tạo th&agrave;nh cơn s&oacute;ng hot trong cộng đồng giới trẻ. Kiểu t&oacute;c n&agrave;y c&oacute; đặc điểm được tỉa d&agrave;i 2 b&ecirc;n, những lọn t&oacute;c được tạo h&igrave;nh xếp layer tr&ocirc;ng v&ocirc; c&ugrave;ng bắt mắt v&agrave;&nbsp; nổi bật. T&oacute;c tỉa layer cực kỳ ph&ugrave; hợp với mọi gương mặt từ tr&ograve;n d&agrave;i đến vu&ocirc;ng g&oacute;c cạnh. Th&ecir', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_name`, `slider_img`, `link`) VALUES
(1, 'banner1', '1618119438banner2.jpg', 'https://www.facebook.com/'),
(2, 'banner2', '1618119666banner1.jpg', 'https://www.google.com/'),
(4, 'banner3', '1618119762banner3.jpg', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `password`, `avatar`, `phone`, `note`) VALUES
(2, 'Nguyễn Quốc Khải', '1234567', '1618759110Nhung-mau-nhuom-toc-dep-giup-nam-gioi-tro-nen-sieu-ngau-30Shine2.jpg', '0987654321', 'Tốt nghiệp trung cấp nghề \r\n<br> \r\nKinh nghiệm : 2 năm làm việc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `avatar`, `role`, `address`, `phone`, `email`) VALUES
(1, 'thanhtam', '123456', '', 0, '', '', ''),
(2, 'hop', '1234567', '', 1, 'hd', '09123456778', 'a@gmail.com'),
(3, 'khanhlinh', '1234567', '', 2, 'hai duong', '12350785', 'linh@gmail.com'),
(4, 'maimai', '123', '', 2, 'Chung cư Anland, khu đô thị Dương Nội mới, Tố Hữu, Hà Đông, Hà Nội', '0901531238', 'tamtong776@gmail.com'),
(5, 'b', '827ccb0eea8a706c4c34a16891f84e7b', '', 2, 'ha noi', '098614543454', 'tam@gmail.com'),
(8, 'trang', '12345', '', 2, 'ha noi', '0947365786', 'trang@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
