-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 16, 2025 lúc 04:15 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pantio`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `phone`, `password`) VALUES
(1, '123456789', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `tinh_tp` varchar(250) DEFAULT NULL,
  `quan_huyen` varchar(250) DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `so_luong` int(50) NOT NULL,
  `gia_mua` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `fullname`, `phone`, `email`, `location`, `tinh_tp`, `quan_huyen`, `payment`, `created_at`, `so_luong`, `gia_mua`) VALUES
(1, 2, 'ghhg', '453654675', 'hgdg@ghfngfng', 'hfgfhg', 'Tỉnh Bắc Giang', 'Huyện Yên Thế', 'tiền mặt', '2025-01-16 01:44:47', 0, 4030000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `type` int(11) NOT NULL,
  `describe` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` float NOT NULL,
  `note` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `describe`, `quantity`, `price`, `note`, `image`) VALUES
(2, 'Áo mangto dạ lông cừu cao cấp dáng suông cổ bẻ ve to phối khuy trang trí kèm đai tạo kiểu', 1, 'Phong cách trẻ trung hiện đại dễ dàng mix với nhiều trang phục khác nhau như chân váy, quần... chắc chắn sẽ không khiến nàng mất đi sự ấn tượng nơi công sở hay lúc đi chơi, dạo phố. Tối ưu đặc tính nhẹ nhàng, dịu dàng hơn cho làn da, mang đến sự quyến rũ cho người mặc tôn lên vóc dáng hoàn hảo cho mỗi người.  chất liệu:Dạ lông cừu cao cấp - 100% Wool', 1, 4000000, 'none', '../../uploads_img/fmo251-5980k__fat9400-798k__fjd51206-898k__6__36179bfb5adc490ea4e7403e6ff3b3ab_master.webp'),
(3, 'Đầm công sở vải thô dày dáng hai dây suông eo đính vạt lệch bất đối xứng', 4, 'Đầm công sở tôn dáng tạo lên vẻ đẹp quyến rũ toát lên vẻ đẹp hiện đại và trẻ trung. phù hợp cho những chị em yêu thích sự đơn giản nhưng vẫn muốn nổi bật giữa đám đông. Chất liệu:Thô dày - 95% Polyester 5% Spandex', 5, 896000, 'none', '../../uploads_img/bdc93232__d__1280k__1__88ec4bd67a024548b77aaac4359aec2e_master.webp'),
(4, 'Chân váy dài vải thô dáng suông thân váy phối ly bong tạo xoè', 2, 'Chân váy mang đến cho quý cô hơi thở cuộc sống nhẹ nhàng, những cảm nhận thướt tha mà năng động. Không quá khó để trở nên nổi bật, nàng chỉ cần phối với chiếc sơ mi đơn giản là đã có thể tự tin dạo phố hay tham gia các buổi tiệc. Chất liệu:Vải thô - 84% Polyester 16% Rayon', 5, 890000, 'none', '../../uploads_img/chanvay.webp'),
(5, 'Quần short, cạp liền cạp cao, túi sườn, đỉa ngang rốn, khóa giọt lệ thân sau ', 3, 'Mẫu quần short được các chị em yêu thích cái đẹp ưa chuộng. Đây là một gợi ý hay ho cho trang phục công sở hiện đại, đễ dàng phối đồ ở nhiều hoàn cảnh khác nhau. Chất liệu:90% polyester 10% rayon', 5, 500000, 'nône', '../../uploads_img/quan.webp'),
(6, 'Áo thun thời trang cao cấp vải len co giãn dáng ôm cổ cao dài tay hoạ tiết đường gân thời trang - PANTIO Mã sản phẩm: FAT9407 ', 1, 'Mẫu áo thun là thiết kế độc quyền của Pantio. mang đến cho nàng sự chỉn chu chuyên nghịệp mà không mất đi nét nữ tính, thời thượng. Làm nàng nổi bật nét đẹp, ấn tượng giữa đám đông. Chất liệu:Vải len - 93% Polyester 7% Spandex', 2, 327600, 'none', '../../uploads_img/fat9407__g__468k_-_fjd51198__b__1180k__1__0233f42f542d4db1b617168575799c9c_master.webp'),
(7, 'Áo vest công sở vải thô dày dáng ôm cổ hai ve phối vạt dài tạo kiểu thân áo có túi hai bên', 1, 'Mẫu áo vest là thiết kế độc quyền của Pantio. mang đến cho nàng sự chỉn chu chuyên nghịệp mà không mất đi nét nữ tính, thời thượng. Làm nàng nổi bật nét đẹp, ấn tượng giữa đám đông. Chất liệu:Thô dày - 95% Polyester 5% Spandex', 3, 1100000, 'none', '../../uploads_img/fav9955__b__1580k_-_fas13854__w__798k_-_fqd51128__b__898k__1__4019f405905747bba6e6f12b2dc396a5_master.webp'),
(8, 'Đầm dạo phố vải thô dày dáng suông cổ tròn phối vải lưới tạo kiểu khoá thân sau', 4, 'Đầm dạo phố tôn dáng tạo lên vẻ đẹp quyến rũ toát lên vẻ đẹp hiện đại và trẻ trung. phù hợp cho những chị em yêu thích sự đơn giản nhưng vẫn muốn nổi bật giữa đám đông. Chất liệu:Thô dày - 100% polyester', 3, 900000, 'none', '../../uploads_img/fdp33337-1780k_368f18617f3844b180d27d626f150a4f_master.jpg'),
(9, 'Đầm dạo phố vải thô kate dáng suông cổ đức xẻ chữ V tay bồng thân váy nhún tầng tạo kiểu', 4, 'Đầm dạo phố đơn giản, dễ mặc, dễ phối giúp nàng thoải mái hoạt động đặc biệt kiểu đầm này không hề kén người mặc lại vô cùng phóng khoáng để ứng dụng trong nhiều hoàn cảnh khác nhau. Chất liệu:Thô Kate - 100% cotton', 5, 600000, 'none', '../../uploads_img/fdp33339__x__1180k__1__8a07f71c7209416da6252a086bdc8875_master.webp'),
(10, 'Quần short dạo phố vải kaki eo đáp cạp bản to khoá thân sau', 4, 'Mẫu quần short mang lại sự thoải mái được nhiều quý cô sành điệu không thua kém các mẫu váy hot trend đồng thời tôn lên vẻ đẹp cơ thể thật mạnh mẽ, năng động, trẻ trung, nhưng cũng rất nữ tính và quyến rũ. Chất liệu:Kaki - 78% Polyester 22% Rayon', 4, 400000, 'none', '../../uploads_img/fol507-698k_fat7380-398k_fqn5358-788k_20876b9db33849709d5406a274b35f14_master.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `type` int(10) NOT NULL,
  `type_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`type`, `type_name`) VALUES
(1, 'Áo'),
(2, 'Chân váy'),
(3, 'Quần'),
(4, 'Đầm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone`, `password`, `registration_date`) VALUES
(1, 'DUC', 'dsf@dfds', '123456', '123456', '2025-01-15 16:49:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`phone`);

--
-- Chỉ mục cho bảng `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`type`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
