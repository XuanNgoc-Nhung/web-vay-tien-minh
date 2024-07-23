-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 23, 2024 lúc 08:23 AM
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
-- Cấu trúc bảng cho bảng `config_web`
--

CREATE TABLE `config_web` (
  `id` int(12) NOT NULL,
  `lai_suat_ca_nhan` varchar(12) DEFAULT NULL,
  `lai_suat_doanh_nghiep` varchar(12) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `config_web`
--

INSERT INTO `config_web` (`id`, `lai_suat_ca_nhan`, `lai_suat_doanh_nghiep`, `updated_at`, `created_at`) VALUES
(1, '12', '12', '2024-07-23 04:34:43', '2024-07-23 04:34:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach-hang-dang-ky-vay`
--

CREATE TABLE `khach-hang-dang-ky-vay` (
  `id` int(12) NOT NULL,
  `hoTen` varchar(256) DEFAULT NULL,
  `ngaySinh` varchar(64) DEFAULT NULL,
  `soCmnd` varchar(12) DEFAULT NULL,
  `diaChi` varchar(256) DEFAULT NULL,
  `ngheNghiep` varchar(256) DEFAULT NULL,
  `thuNhap` varchar(32) DEFAULT NULL,
  `mucDichVayTien` varchar(256) DEFAULT NULL,
  `soDienThoaiDangNhap` varchar(256) DEFAULT NULL,
  `matKhauDangNhap` varchar(256) DEFAULT NULL,
  `anhMatTruoc` varchar(256) DEFAULT NULL,
  `anhMatSau` varchar(256) DEFAULT NULL,
  `anhChanDung` varchar(256) DEFAULT NULL,
  `trangThai` int(1) NOT NULL DEFAULT 0,
  `soTienVay` varchar(64) NOT NULL DEFAULT '0',
  `soThangTra` varchar(3) NOT NULL DEFAULT '12',
  `soTienTraMoiThang` varchar(64) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach-hang-dang-ky-vay`
--

INSERT INTO `khach-hang-dang-ky-vay` (`id`, `hoTen`, `ngaySinh`, `soCmnd`, `diaChi`, `ngheNghiep`, `thuNhap`, `mucDichVayTien`, `soDienThoaiDangNhap`, `matKhauDangNhap`, `anhMatTruoc`, `anhMatSau`, `anhChanDung`, `trangThai`, `soTienVay`, `soThangTra`, `soTienTraMoiThang`, `created_at`, `updated_at`) VALUES
(1, 'Ngọc', NULL, '132352213', 'Phú Thọ', 'Lập trình viên', '15000000', 'Chi tiêu cá nhân', '0332882442', '123456Aa@', '/hoSo/63620d8dabecf.png', '/hoSo/63620d8dacd4d.png', '/hoSo/63620d8dace60.png', 0, '0', '12', '0', '2022-11-01 23:26:21', '2022-11-01 23:26:21'),
(2, 'Ngọc', '27/02/1996', '132352213', 'Phú Thọ', 'Lập trình viên', '15000000', 'Chi tiêu cá nhân', '0332882442', '123456Aa@', '/hoSo/63620db20572a.png', '/hoSo/63620db2062bc.png', '/hoSo/63620db2063cc.png', 1, '0', '12', '0', '2022-11-01 23:26:58', '2022-11-02 01:28:28'),
(3, 'Ngọc', '27/02/1996', '132352213', 'Phú Thọ', 'Lập trình viên', '15000000', 'Chi tiêu cá nhân', '0332882442', '123456Aa@', '/hoSo/63620dd458a10.png', '/hoSo/63620dd4594de.png', '/hoSo/63620dd4595bf.png', 1, '0', '12', '0', '2022-11-01 23:27:32', '2022-11-02 01:28:34'),
(4, 'Ngọc', '27/02/1996', '132352213', 'Phú Thọ', 'Lập trình viên', '15000000', 'Chi tiêu cá nhân', '0332882442', '123456Aa@', '/hoSo/6362425e5320e.png', '/hoSo/6362425e5e9c7.png', '/hoSo/6362425e5eacb.png', 1, '0', '12', '0', '2022-11-02 03:11:42', '2022-11-02 03:21:16'),
(5, 'Ngọc', '27/02/1996', '132352213', 'Phú Thọ', 'Lập trình viên', '15000000', 'Chi tiêu cá nhân', '0332882442', '123456Aa@', '/hoSo/6362430b006c2.png', '/hoSo/6362430b0190c.png', '/hoSo/6362430b019b4.png', 2, '30000000', '12', '2725000', '2022-11-02 03:14:35', '2022-11-02 03:21:13'),
(6, 'Nguyễn Văn An', '03/11/2022', '123456793', 'Hà Nội', 'Giáo Viên', '12000000', 'Ăn chơi', '0332552662', NULL, '/hoSo/63624bd9874b3.png', '/hoSo/63624bd988ee3.png', '/hoSo/63624bd9891b9.png', 0, '200000000', '60', '4833333', '2022-11-02 03:52:09', '2022-11-02 03:52:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profiles`
--

CREATE TABLE `profiles` (
  `id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `ho_ten` varchar(128) DEFAULT NULL,
  `dia_chi` varchar(256) DEFAULT NULL,
  `cmnd` varchar(12) DEFAULT NULL,
  `gioi_tinh` varchar(12) DEFAULT NULL,
  `ngay_sinh` varchar(12) DEFAULT NULL,
  `nghe_nghiep` varchar(64) DEFAULT NULL,
  `thu_nhap` varchar(16) DEFAULT NULL,
  `muc_dich_vay` varchar(256) DEFAULT NULL,
  `sdt_nguoi_than` varchar(32) DEFAULT NULL,
  `moi_quan_he` varchar(62) DEFAULT NULL,
  `ngan_hang` varchar(64) DEFAULT NULL,
  `so_tai_khoan` varchar(15) DEFAULT NULL,
  `chu_tai_khoan` varchar(62) DEFAULT NULL,
  `anh_mat_truoc` varchar(128) DEFAULT NULL,
  `anh_mat_sau` varchar(128) DEFAULT NULL,
  `anh_chan_dung` varchar(128) DEFAULT NULL,
  `anh_giay_to` varchar(128) DEFAULT NULL,
  `so_tien_vay` varchar(20) DEFAULT NULL,
  `thoi_han_vay` varchar(32) DEFAULT NULL,
  `lai_suat` varchar(12) DEFAULT NULL,
  `tra_moi_ky` varchar(12) DEFAULT NULL,
  `so_du` varchar(41) DEFAULT NULL,
  `trang_thai` varchar(12) DEFAULT NULL,
  `chu_ky` longtext DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `ho_ten`, `dia_chi`, `cmnd`, `gioi_tinh`, `ngay_sinh`, `nghe_nghiep`, `thu_nhap`, `muc_dich_vay`, `sdt_nguoi_than`, `moi_quan_he`, `ngan_hang`, `so_tai_khoan`, `chu_tai_khoan`, `anh_mat_truoc`, `anh_mat_sau`, `anh_chan_dung`, `anh_giay_to`, `so_tien_vay`, `thoi_han_vay`, `lai_suat`, `tra_moi_ky`, `so_du`, `trang_thai`, `chu_ky`, `updated_at`, `created_at`) VALUES
(1, 4, 'Nguyễn Văn An', 'Hà Nội', '123456789', 'Nữ', '06/08/2024', 'Làm Nông', 'Từ 5-10tr', 'làm ăn', '0988552233', 'em gái', 'BacABank', '552266', 'nguyễn văn an', '/images/xacMinh/669f35acc9fa0.jpg', '/images/xacMinh/669f35accc8d8.jpg', '/images/xacMinh/669f35accd078.png', NULL, '5000000', '24', '12', '208583', '5000000', '1', 'data:image/png;base64,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', '2024-07-23 05:01:15', '2024-07-23 04:09:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) DEFAULT 0,
  `type` int(1) NOT NULL DEFAULT 1,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) DEFAULT 1,
  `thong_bao` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `type`, `phone`, `status`, `thong_bao`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, '0987654322', 2, 1, '0987654322', 1, NULL, NULL, '$2y$10$WOoWDTmCchbduszKnYtn7OYR.Zqx55.1HFNEhzy3B8.z98U6m6gIe', NULL, '2024-07-23 04:09:52', '2024-07-23 04:09:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `so_tien` varchar(222) NOT NULL DEFAULT '0',
  `trang_thai` int(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `withdraw`
--

INSERT INTO `withdraw` (`id`, `user_id`, `so_tien`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 4, '5000000', 2, '2024-07-23 05:00:56', '2024-07-23 05:01:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `config_web`
--
ALTER TABLE `config_web`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach-hang-dang-ky-vay`
--
ALTER TABLE `khach-hang-dang-ky-vay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`phone`);

--
-- Chỉ mục cho bảng `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `config_web`
--
ALTER TABLE `config_web`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khach-hang-dang-ky-vay`
--
ALTER TABLE `khach-hang-dang-ky-vay`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
