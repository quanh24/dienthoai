-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 07, 2020 lúc 03:33 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maintain` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`name`, `maintain`, `price`, `image`, `status`) VALUES
(' Oppo A9', 12, 16990000, 'Oppo A9_6.990.000.png', 3),
('Asus', 12, 15300000, 'Asus Zenfone Max Pro M2 - 4GB-64GB - 5.390.000.jpg', 34),
('Iphone 12 64G', 12, 23000000, 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-400png-400x460.png', 20),
('LG Optimus', 12, 22290000, 'https://ponseljambi.com/products/images/800.jpg', 1),
('LG Optimus G2', 12, 11290000, 'https://cf.shopee.vn/file/8fce22092b5ebdf9f3c6e9686090a1c6', 1),
('LG Optimus G4', 15, 15000000, 'Oppo A5s_3.690.000.png', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`user`, `pass`, `role`) VALUES
('admin', '123456', 'admin'),
('user', '123123', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`name`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
