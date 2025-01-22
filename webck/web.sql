-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2025 lúc 09:47 AM
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
-- Cơ sở dữ liệu: `web`
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

--
-- Đang đổ dữ liệu cho bảng `notes`
--

INSERT INTO `notes` (`id`, `content`, `updated_at`) VALUES
(1, 'chào các em', '2025-01-04 05:49:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `note` varchar(200) NOT NULL,
  `product` varchar(250) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `fullname`, `phone`, `email`, `address`, `note`, `product`, `price`) VALUES
(7, 'đasadas', '4532523542', 'gsfdfgdgsd@dsfg.sdfg', 'sdfadfsggsd', 'ádfsadfsdaf', 'áo ngắn cộc dài', 1030000),
(8, 'ádfasdfasd', 'sadfasfasdf', 'dasfdasfdasdf@gdfdgsg.gfds', 'sdffgsdsdfg', 'sdfgdsfgfsdg', 'Đinh Đức', 706774),
(9, 'dfsgsdf', '3425342', 'fdsgs@dfss', 'sdfgdfs', 'sdfgsdfg', 'Quần công sở dáng suông', 719000),
(10, 'sdfgsdfg', '456345363', 'sdfgsdfg@dfgsgg', 'dfgsggfdsg', 'dfsgdfsgf', 'Chân váy công sở dáng loe', 719000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `type` varchar(100) NOT NULL,
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
(1, 'Áo sơ mi kiểu đầm công sở', '1', 'Thiết kế: Kiểu dáng đầm sơ mi thanh lịch với form suông nhẹ hoặc ôm vừa vặn, tôn lên vóc dáng phái đẹp. Phần cổ bẻ truyền thống kết hợp tay áo lửng hoặc tay dài, nhấn nhá bởi dây buộc hoặc xếp ly nơi eo, mang lại vẻ nữ tính và chuyên nghiệp.  Chất liệu: Vải cao cấp như cotton, linen, hoặc lụa mềm mại, thoáng khí, tạo cảm giác dễ chịu cho cả ngày dài.  Màu sắc: Bảng màu trung tính như trắng, đen, xám, hoặc các gam pastel nhẹ nhàng, dễ dàng phối hợp cùng phụ kiện thời trang.  Lợi ích và ưu điểm Thanh lịch và nữ tính: Tạo vẻ ngoài cuốn hút, vừa chuyên nghiệp vừa dịu dàng.  Đa năng và tiện lợi: Phù hợp với nhiều hoàn cảnh: đi làm, dự họp, hoặc gặp gỡ đối tác.  Thoải mái khi sử dụng: Chất liệu mềm mại cùng thiết kế tối ưu, giúp bạn tự tin di chuyển và làm việc suốt cả ngày.  Dễ phối đồ: Kết hợp dễ dàng với giày cao gót, túi xách hay blazer, mang lạ', 1, 689000, 'none', '../../img/products/products_1.jpg'),
(2, 'Chân váy công sở dáng loe', '1', 'Thiết kế: Chân váy dáng loe nhẹ nhàng, giúp tôn dáng và tạo sự thoải mái khi di chuyển. Đường cắt xòe tinh tế kết hợp chi tiết xếp ly hoặc đai thắt lưng, mang lại vẻ nữ tính và chuyên nghiệp.  Chất liệu: Sử dụng các loại vải cao cấp như lụa, cotton pha, hoặc vải dệt kim thoáng mát, co giãn nhẹ, phù hợp cho cả ngày dài làm việc.  Màu sắc: Tập trung vào bảng màu trung tính như đen, xanh navy, be hoặc pastel nhẹ nhàng, dễ phối với áo sơ mi và phụ kiện.  Độ dài: Dài qua gối hoặc vừa chạm đầu gối, tạo sự thanh lịch và kín đáo, đúng chuẩn công sở.  Lợi ích và ưu điểm Tôn dáng vượt trội: Thiết kế loe nhẹ giúp tôn lên đường cong cơ thể mà không tạo cảm giác gò bó.  Dễ phối đồ: Phối hoàn hảo với áo sơ mi, blazer hoặc áo thun công sở, tạo ra nhiều phong cách đa dạng.  Thoải mái cả ngày: Chất liệu thoáng mát và kiểu dáng linh hoạt, đảm bảo sự dễ chịu dù phải ngồi làm việc lâu hoặc di chuyển nhiều.  Phù hợp nhiều dịp: Từ đi làm, dự họp, đến tham gia sự kiện hoặc gặp gỡ đối tác, chân váy dáng loe luôn giúp bạn tự tin.  Thông điệp gửi gắm Hãy để Chân Váy Công Sở Dáng Loe trở thành người bạn đồng hành hoàn hảo, giúp bạn chinh phục mọi thử thách công việc với phong thái chuyên nghiệp và duyên dáng. 👗✨', 1, 689000, 'note', '../../img/products/products_2.jpg'),
(3, 'Quần công sở dáng suông', '1', 'Thiết kế: Kiểu dáng: Quần dáng suông thanh lịch, mang phong cách hiện đại, phù hợp với mọi vóc dáng. Điểm nhấn: Lưng cao hoặc lưng vừa, tôn dáng và kéo dài đôi chân. Đường cắt may sắc nét, tạo cảm giác chuyên nghiệp. Chi tiết: Có thể có túi hai bên hoặc túi giả phía sau, giúp tăng thêm sự tiện lợi và thẩm mỹ. Chất liệu: Loại vải: Sử dụng chất liệu cao cấp như: Polyester pha len: Giữ form dáng chuẩn, ít nhăn. Cotton pha co giãn nhẹ: Đảm bảo sự thoải mái khi di chuyển. Vải lụa mịn: Tạo độ rủ nhẹ, mềm mại, phù hợp cho thời tiết mát mẻ. Màu sắc: Tông màu trung tính: Đen, xám, trắng, xanh navy – dễ phối với áo sơ mi, áo vest, và phụ kiện. Phong cách nổi bật: Các gam pastel như hồng nhạt, xanh ngọc hoặc beige – dành cho những ai yêu thích sự trẻ trung và mới lạ. Độ dài: Độ dài tiêu chuẩn: Quần dài chạm mắt cá chân hoặc dài hơn một chút, đảm bảo vẻ thanh lịch và kín đáo. Lợi ích và Ưu điểm Tôn dáng vượt trội: Thiết kế dáng suông giúp cân đối cơ thể, tạo cảm giác cao ráo, thon gọn. Thoải mái cả ngày: Chất liệu mềm mại, thoáng khí, đảm bảo sự dễ chịu dù phải làm việc lâu. Dễ phối đồ: Kết hợp hoàn hảo với áo sơ mi, blazer hoặc áo thun, tạo phong cách công sở chỉn chu hoặc năng động tùy dịp. Phù hợp nhiều hoàn cảnh: Từ công sở, hội họp, đến sự kiện quan trọng, quần dáng suông luôn là lựa chọn lý tưởng.', 1, 689000, 'none', '../../img/products/products_3.jpg'),
(7, 'Đầm công sở vải thô', '1', 'Thiết kế: Kiểu dáng: Đầm công sở dáng suông hoặc ôm nhẹ, mang lại sự thanh lịch và trang nhã. Thiết kế tối giản nhưng tinh tế, dễ dàng tạo sự tự tin cho người mặc trong môi trường công sở. Chi tiết: Cổ tròn hoặc cổ vuông, tay ngắn hoặc tay lỡ, nhấn eo nhẹ nhàng giúp tôn dáng. Đầm có thể có túi hai bên hoặc đường xếp ly tỉ mỉ, tạo điểm nhấn nhẹ nhàng. Phong cách: Phù hợp với phong cách công sở hiện đại, nhưng vẫn duy trì được sự thanh lịch và chuyên nghiệp. Chất liệu: Vải thô cao cấp: Chất liệu vải thô dày dặn nhưng thoáng khí, giúp người mặc cảm thấy thoải mái suốt cả ngày làm việc. Vải thô dễ dàng tạo form dáng, có độ bền cao và ít nhăn. Cảm giác mát mẻ: Với khả năng thấm hút mồ hôi tốt, vải thô là sự lựa chọn lý tưởng cho các buổi làm việc dài, đặc biệt trong môi trường công sở. Màu sắc: Tông màu trung tính: Đen, xám, be, hoặc xanh navy, dễ phối hợp với nhiều phụ kiện khác nhau và luôn giữ được vẻ thanh lịch. Màu sắc nhẹ nhàng: Các màu pastel như hồng nhạt, xanh ngọc hoặc be sẽ mang lại vẻ nữ tính và tươi mới cho phong cách công sở. Độ dài: Độ dài vừa phải: Đầm thường có độ dài qua gối hoặc dài đến chân, tạo sự kín đáo và lịch sự, phù hợp với môi trường công sở. Lợi ích và Ưu điểm Tôn dáng và thoải mái: Chất liệu vải thô có khả năng giữ form tốt, tôn lên đường cong cơ thể mà vẫn mang lại cảm giác thoải mái khi di chuyển. Dễ dàng phối đồ: Đầm vải thô có thể kết hợp với các kiểu giày cao gót hoặc giày bệt, tạo phong cách công sở vừa chuyên nghiệp vừa nữ tính. Phong cách đa dạng: Phù hợp cho nhiều dịp như đi làm, tham gia họp, gặp gỡ đối tác, hoặc các buổi tiệc nhẹ.', 1, 689000, 'none', '../../img/products/products_4.jpg'),
(8, 'Chân váy công sở vải thô', '1', 'Thiết kế: Kiểu dáng: Chân váy công sở vải thô thường có kiểu dáng ôm nhẹ hoặc dáng suông, tạo sự thoải mái và thanh lịch cho người mặc. Thiết kế đơn giản nhưng tinh tế, giúp tôn lên vẻ đẹp tự nhiên của cơ thể mà không gây cảm giác gò bó. Chi tiết: Chân váy có thể có cạp cao, giúp kéo dài chân và tạo dáng đẹp. Một số mẫu có thêm chi tiết như xếp ly, túi hai bên hoặc đai thắt lưng, tạo điểm nhấn nổi bật mà vẫn giữ được sự chuyên nghiệp. Phong cách: Phù hợp với nhiều phong cách công sở từ thanh lịch, hiện đại đến nữ tính, dễ dàng kết hợp với các loại áo sơ mi, áo thun hay blazer. Chất liệu: Vải thô cao cấp: Chất liệu vải thô có độ bền cao, thấm hút mồ hôi tốt và thoáng khí, mang lại sự thoải mái cho người mặc suốt cả ngày dài. Vải thô có kết cấu dày dặn, giúp tạo form dáng chuẩn, dễ dàng tạo độ phồng nhẹ cho các mẫu váy dáng suông hoặc xòe. Tính năng: Chất liệu vải thô không bị nhăn nhiều, rất dễ bảo quản và giặt giũ, giữ màu sắc lâu dài. Màu sắc: Màu sắc trung tính: Các gam màu như đen, xám, xanh navy, be, trắng là lựa chọn phổ biến cho chân váy công sở vải thô, dễ dàng phối với các loại áo và phụ kiện khác nhau. Màu sắc tươi sáng: Các màu như hồng nhạt, xanh pastel, hoặc be sáng mang lại vẻ tươi mới, giúp bạn thể hiện sự nữ tính và hiện đại nhưng vẫn phù hợp cho môi trường công sở. Độ dài: Độ dài tiêu chuẩn: Chân váy thường có độ dài vừa phải, đến ngang gối hoặc qua gối, giúp tạo sự kín đáo và thanh lịch, phù hợp cho các buổi làm việc, họp hành hoặc các sự kiện công sở quan trọng. Lợi ích và Ưu điểm Tôn dáng và thoải mái: Chất liệu vải thô giúp tạo form dáng đẹp, tôn lên đường cong cơ thể mà không làm bạn cảm thấy bị gò bó. Đặc biệt, vải thô thấm hút mồ hôi tốt, giúp bạn luôn cảm thấy mát mẻ và dễ chịu trong suốt ngày làm việc. Dễ dàng phối đồ: Chân váy vải thô dễ dàng phối với các kiểu áo sơ mi, áo thun hoặc áo blazer, tạo ra nhiều phong cách công sở khác nhau, từ thanh lịch, chuyên nghiệp đến năng động, tươi mới. Phong cách thanh lịch: Với chất liệu vải thô và kiểu dáng tinh tế, chân váy giúp bạn thể hiện sự chuyên nghiệp, đồng thời tạo cảm giác tự tin và duyên dáng trong mọi tình huống. Độ bền cao: Chất liệu vải thô bền bỉ, dễ bảo quản và không nhăn, giúp bạn giữ được vẻ ngoài chỉn chu suốt cả ngày mà không cần phải lo lắng về việc váy bị xô lệch hay nhăn nhúm.', 1, 689000, 'none', '../../img/products/products_5.jpg'),
(9, 'Đầm công sở vải tuyp sy', '1', 'Thiết kế: Kiểu dáng: Đầm công sở vải tuyp sy thường có kiểu dáng ôm nhẹ, tôn lên đường cong cơ thể nhưng vẫn đảm bảo sự thoải mái. Thiết kế có thể là dáng suông hoặc ôm vừa phải, giúp tạo sự thanh thoát mà không gây cảm giác gò bó. Chi tiết: Đầm có thể có cổ tròn, cổ chữ V, hoặc cổ cao, kết hợp với các chi tiết như tay lỡ, tay ngắn, hoặc xẻ tà nhẹ nhàng. Một số mẫu có đai lưng để tạo điểm nhấn tại phần eo, hoặc các chi tiết trang trí như xếp ly hoặc nếp gấp tinh tế. Phong cách: Đầm vải tuyp sy mang đến vẻ đẹp đơn giản nhưng không kém phần sang trọng, rất thích hợp cho môi trường công sở. Chất liệu: Vải Tuyp Sy: Chất liệu vải tuyp sy (tweed) đặc biệt mềm mại, có độ bền cao và ít nhăn, tạo cảm giác thoải mái khi mặc. Chất vải này có kết cấu dày dặn, giữ form dáng tốt và có khả năng thoáng khí, thích hợp cho cả ngày làm việc dài. Cảm giác thoải mái: Vải tuyp sy thường có độ co giãn nhẹ, giúp người mặc dễ dàng di chuyển mà không cảm thấy bị gò bó. Đây là lựa chọn lý tưởng cho những ai muốn vừa mặc đẹp lại thoải mái trong suốt ngày làm việc. Màu sắc: Màu sắc trung tính: Đen, xám, xanh navy, be hoặc các gam màu tối, mang lại vẻ ngoài thanh lịch và dễ phối hợp với các phụ kiện khác. Màu sắc tươi sáng: Các màu như đỏ, xanh lá, hoặc pastel nhẹ nhàng giúp tạo sự mới mẻ và năng động nhưng vẫn không mất đi sự chuyên nghiệp. Độ dài: Độ dài vừa phải: Đầm công sở vải tuyp sy thường có độ dài vừa qua gối, tạo sự kín đáo, thanh lịch nhưng không kém phần duyên dáng. Lợi ích và Ưu điểm Tôn dáng và lịch sự: Chất liệu vải tuyp sy giúp tạo form dáng chuẩn, tôn lên vẻ đẹp cơ thể mà vẫn giữ được sự lịch sự, phù hợp với mọi môi trường công sở. Thoải mái suốt cả ngày: Với độ co giãn nhẹ và khả năng thấm hút mồ hôi tốt, đầm vải tuyp sy giúp bạn cảm thấy dễ chịu trong suốt ngày dài làm việc. Dễ phối đồ: Đầm vải tuyp sy có thể dễ dàng kết hợp với giày cao gót, giày bệt hoặc blazer, mang lại phong cách công sở đa dạng và phong phú. Độ bền cao: Chất liệu tuyp sy có độ bền cao, ít nhăn, dễ bảo quản và giữ màu tốt, giúp bạn sử dụng trong thời gian dài mà không lo về chất lượng.', 1, 689000, 'none', '../../img/products/img.jpg'),
(10, 'Quần công sở vải thô dáng suông', '1', 'Thiết kế: Kiểu dáng: Quần công sở dáng suông với thiết kế rộng rãi, không bó sát, mang lại sự thoải mái và thanh lịch cho người mặc. Quần có lưng cao, tạo cảm giác chân dài và thon gọn, đồng thời giúp che đi các khuyết điểm cơ thể. Chi tiết: Đường may tinh tế, phần cạp quần vừa vặn, giúp tạo hình dáng đẹp. Quần có thể có túi hai bên hoặc túi giả phía sau, tạo điểm nhấn và thêm phần tiện lợi. Phong cách: Mang đến vẻ ngoài thanh thoát, hiện đại nhưng vẫn giữ được sự chuyên nghiệp, phù hợp cho các cô nàng công sở yêu thích sự đơn giản và tinh tế. Chất liệu: Vải thô cao cấp: Quần được làm từ vải thô, có độ bền cao, cứng cáp nhưng vẫn thoải mái và dễ chịu khi mặc. Chất liệu này có khả năng thấm hút mồ hôi tốt, giúp bạn thoải mái cả ngày dài mà không cảm thấy bí bách. Đặc tính vải: Vải thô có độ dày vừa phải, không quá mỏng nhưng lại không quá dày, tạo sự thông thoáng, thích hợp cho môi trường công sở. Màu sắc: Màu sắc trung tính: Quần công sở vải thô dáng suông thường có các màu sắc cơ bản như đen, xám, xanh navy, be, dễ phối hợp với nhiều loại áo sơ mi, áo thun hay blazer, tạo sự chuyên nghiệp và dễ dàng thay đổi phong cách. Màu sắc sáng hoặc pastel: Những màu như trắng, hồng nhạt, xanh ngọc hoặc be sáng có thể mang lại vẻ tươi mới, năng động cho các buổi làm việc. Độ dài: Độ dài tiêu chuẩn: Quần dài đến mắt cá chân hoặc dài hơn một chút, mang đến sự kín đáo và lịch sự, phù hợp với môi trường công sở nhưng vẫn rất hiện đại và trẻ trung. Lợi ích và Ưu điểm Tôn dáng và thoải mái: Thiết kế dáng suông giúp che khuyết điểm và tôn lên vẻ đẹp tự nhiên của cơ thể, đồng thời tạo sự thoải mái khi di chuyển hoặc ngồi làm việc. Chất liệu vải thô bền bỉ: Vải thô có độ bền cao, dễ bảo quản và không bị nhăn, giúp bạn luôn trông chỉn chu trong suốt cả ngày làm việc. Dễ dàng phối đồ: Quần dáng suông dễ dàng kết hợp với các loại áo sơ mi, áo thun, blazer, giúp bạn linh hoạt trong việc tạo ra nhiều phong cách công sở khác nhau, từ chuyên nghiệp đến năng động. Tạo phong cách thanh lịch: Quần dáng suông từ vải thô mang lại vẻ ngoài sang trọng, phù hợp cho các cuộc họp, buổi làm việc hay các sự kiện công sở quan trọng.', 1, 689000, 'none', '../../img/products/products_8.jpg'),
(11, 'Quần công sở vải tuyp sy dáng suông', '1', 'Thiết kế: Kiểu dáng: Quần công sở vải tuyp sy dáng suông mang đến vẻ đẹp thanh lịch, đơn giản nhưng cực kỳ tinh tế. Với đường cắt suông, không quá ôm sát, quần tạo cảm giác thoải mái khi di chuyển, đồng thời giữ được sự lịch sự, chuyên nghiệp cho người mặc. Chi tiết: Quần có cạp cao, giúp kéo dài chân và tạo sự thanh thoát. Phần ống quần suông nhẹ, không quá rộng nhưng vẫn đủ thoải mái, kết hợp với những đường may tinh tế và may túi hai bên, mang đến vẻ ngoài hiện đại và tiện lợi. Phong cách: Quần vải tuyp sy dáng suông mang đến một phong cách công sở vừa sang trọng vừa năng động, rất phù hợp cho những buổi họp hoặc ngày làm việc dài. Chất liệu: Vải tuyp sy cao cấp: Quần được làm từ chất liệu vải tuyp sy (tweed), có độ bền cao, thấm hút mồ hôi tốt, tạo cảm giác thoải mái cho người mặc. Chất liệu này không chỉ có khả năng giữ form dáng tốt mà còn dễ bảo quản, ít nhăn. Đặc tính vải: Vải tuyp sy dày dặn, có kết cấu chắc chắn nhưng vẫn mềm mại, không gây cảm giác nóng bức, phù hợp cho cả môi trường làm việc trong phòng điều hòa hoặc ngoài trời. Màu sắc: Màu sắc trung tính: Quần công sở vải tuyp sy thường có các gam màu như đen, xám, xanh navy, be, rất dễ dàng phối hợp với các loại áo sơ mi, áo thun hoặc blazer. Những màu sắc này mang lại vẻ ngoài thanh lịch và chuyên nghiệp. Màu sắc tươi sáng: Đối với những ai yêu thích phong cách trẻ trung, những màu như hồng, xanh pastel hay đỏ đậm sẽ giúp tạo sự nổi bật và tươi mới mà vẫn phù hợp với môi trường công sở. Độ dài: Độ dài tiêu chuẩn: Quần dài đến mắt cá chân hoặc có thể dài hơn một chút, tạo ra sự cân đối và vừa vặn, không quá dài hoặc quá ngắn. Độ dài này đảm bảo sự kín đáo, thanh lịch nhưng vẫn tôn lên vóc dáng người mặc. Lợi ích và Ưu điểm Tôn dáng và thoải mái: Quần vải tuyp sy dáng suông giúp tôn lên đường cong cơ thể mà không làm bạn cảm thấy gò bó. Đặc biệt, dáng suông mang lại sự thoải mái và dễ dàng di chuyển trong suốt ngày dài làm việc. Phong cách thanh lịch: Với thiết kế đơn giản, quần vải tuyp sy mang lại vẻ ngoài thanh thoát và tinh tế, phù hợp với mọi hoàn cảnh công sở, từ những cuộc họp quan trọng đến các buổi làm việc hằng ngày. Dễ phối đồ: Quần dáng suông dễ dàng kết hợp với nhiều kiểu áo sơ mi, áo thun, áo blazer hoặc thậm chí áo croptop, tạo ra phong cách đa dạng, linh hoạt cho nhiều sự kiện công sở. Độ bền cao: Chất liệu vải tuyp sy có độ bền vượt trội, không bị nhăn, không phai màu sau nhiều lần giặt, giúp bạn duy trì vẻ ngoài chỉn chu suốt cả ngày làm việc.', 1, 689000, 'none', '../../img/products/products_9.jpg'),
(13, 'áo ngắn cộc dài', 'quần', 'áo dài đẹp vl đẹp siêu cấp vũ trụ', 10, 1000000, 'hahahahehehehe', '../../img/products/products_12.jpg'),
(14, 'Đinh Đức', 'áoo', 'áo dài đẹp vl đẹp siêu cấp vũ trụ', 10, 676774, 'áo rách', '../../img/products/products_1.jpg');

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
(3, 'Quần\r\n'),
(4, 'Đầm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone`, `password`) VALUES
(15, 'Đinh Đức', 'dinhduck98@gmail.com', '0976812805', '123456'),
(18, 'Đinh Đức', 'dinhduck98@gmail.com', '34252345432', '123456'),
(19, 'Đinh Đức', 'dinhduck98@gmail.com', '3545324234', '123456'),
(20, 'thuphuong', 'sadas@gmail.ia', '0868686', '1123456'),
(21, 'Duck duck', 'duckg@gmail.com', '8686868686', '123456'),
(22, 'duc', 'abc@sss.ss', '00000000', '123456');

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
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
