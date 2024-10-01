-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 29, 2024 lúc 06:39 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vay-tien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_su`
--

CREATE TABLE `lich_su` (
  `id` int(12) NOT NULL,
  `account` varchar(256) DEFAULT NULL,
  `action` varchar(256) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lich_su`
--

INSERT INTO `lich_su` (`id`, `account`, `action`, `updated_at`, `created_at`) VALUES
(1, NULL, NULL, '2024-09-29 16:09:16', '2024-09-29 16:09:16'),
(2, '0123789456', 'Đăng xuất hệ thống.', '2024-09-29 16:14:10', '2024-09-29 16:14:10'),
(3, '0963963958', 'Thực hiện đăng ký tài khoản', '2024-09-29 16:14:17', '2024-09-29 16:14:17'),
(4, '0963963958', 'Thực hiện đăng nhập sau khi đăng ký tài khoản', '2024-09-29 16:14:17', '2024-09-29 16:14:17'),
(5, '0963963958', 'Đăng xuất hệ thống.', '2024-09-29 16:39:08', '2024-09-29 16:39:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `lich_su`
--
ALTER TABLE `lich_su`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `lich_su`
--
ALTER TABLE `lich_su`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
