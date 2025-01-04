-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2025 lúc 04:36 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `k23cnt2_nguyenducthanh_2310900098_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_27_120254_create__n_d_t__q_u_a_n__t_r_i_table', 1),
(6, '2024_12_27_121057_create__n_d_t__l_o_a_i__s_a_n__p_h_a_m_table', 1),
(7, '2024_12_27_122548_create__n_d_t__s_a_n__p_h_a_m_table', 1),
(8, '2024_12_27_130956_create__n_d_t__k_h_a_c_h__h_a_n_g_table', 1),
(9, '2024_12_27_131208_create__n_d_t__h_o_a__d_o_n_table', 1),
(10, '2024_12_27_131528_create__n_d_t__c_t__h_o_a__d_o_n_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ndt_ct_hoa_don`
--

CREATE TABLE `ndt_ct_hoa_don` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ndtHoaDonID` bigint(20) NOT NULL,
  `ndtSanPhamID` bigint(20) NOT NULL,
  `ndtSLMua` int(11) NOT NULL,
  `ndtDonGiaMua` double(8,2) NOT NULL,
  `ndtThanhTien` double NOT NULL,
  `ndtTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ndt_ct_hoa_don`
--

INSERT INTO `ndt_ct_hoa_don` (`id`, `ndtHoaDonID`, `ndtSanPhamID`, `ndtSLMua`, `ndtDonGiaMua`, `ndtThanhTien`, `ndtTrangThai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, 698000.00, 8388000, 0, NULL, '2025-01-02 08:10:33'),
(2, 2, 2, 20, 550000.00, 11000000, 0, NULL, NULL),
(3, 3, 5, 5, 590000.00, 2950000, 0, NULL, NULL),
(4, 4, 8, 3, 199000.00, 597000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ndt_hoa_don`
--

CREATE TABLE `ndt_hoa_don` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ndtMaHD` varchar(255) NOT NULL,
  `ndtMaKH` bigint(20) NOT NULL,
  `ndtNgayHD` date NOT NULL,
  `ndtHoTenKH` varchar(255) NOT NULL,
  `ndtEmail` varchar(255) NOT NULL,
  `ndtDienThoai` varchar(255) NOT NULL,
  `ndtDiaChi` varchar(255) NOT NULL,
  `ndtTongTriGia` double(8,2) NOT NULL,
  `ndtTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ndt_hoa_don`
--

INSERT INTO `ndt_hoa_don` (`id`, `ndtMaHD`, `ndtMaKH`, `ndtNgayHD`, `ndtHoTenKH`, `ndtEmail`, `ndtDienThoai`, `ndtDiaChi`, `ndtTongTriGia`, `ndtTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'HD001', 1, '2024-12-12', 'Vũ Tiến Đức', 'vuduc@gmail.com', '012550039', 'Yên Bái-Yên Bình', 790000.00, 2, NULL, '2025-01-02 07:50:27'),
(2, 'HD002', 2, '2024-12-20', 'Trần Tuấn Hưng', 'hungtran@gmail.com', '012588868', 'Phú Thọ', 125000.00, 0, NULL, NULL),
(3, 'HD003', 3, '2024-12-17', 'Phan Quang Minh', 'pminh@gmail.com', '0382550508', 'Phú Thọ', 999000.00, 1, NULL, NULL),
(5, 'HD005', 4, '2024-12-03', 'Phạm Tùng Quân', 'quanpham@gmail.com', '094357152', 'Hà Nội', 777999.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ndt_khach_hang`
--

CREATE TABLE `ndt_khach_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ndtMaKH` varchar(255) NOT NULL,
  `ndtTenKH` varchar(255) NOT NULL,
  `ndtEmail` varchar(255) NOT NULL,
  `ndtMatKhau` varchar(255) NOT NULL,
  `ndtDienThoai` varchar(255) NOT NULL,
  `ndtDiaChi` varchar(255) NOT NULL,
  `ndtNgayDK` date NOT NULL,
  `ndtTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ndt_khach_hang`
--

INSERT INTO `ndt_khach_hang` (`id`, `ndtMaKH`, `ndtTenKH`, `ndtEmail`, `ndtMatKhau`, `ndtDienThoai`, `ndtDiaChi`, `ndtNgayDK`, `ndtTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'KH001', 'Vũ Tiến Bịp', 'tienbip@gmail.com', '$2y$10$BXB2mX7lfVJpcw1konykWe771GnnwvFrWDLFwwnuzmegNSZmbQyNy', '012550036', 'Hà Nội2', '2024-12-12', 0, NULL, '2025-01-02 07:47:17'),
(2, 'KH002', 'Trần Duy Hưng', 'hungtran@gmail.com', '$2y$10$mSEdqZ6PvhpIYer6RtiN1.BbR9EbzLDC2EyE.xUEycQiqWTNmnJ8m', '012588868', 'Bắc Ninh', '2024-12-20', 0, NULL, NULL),
(3, 'KH003', 'Đặng Quang Minh', 'dpminh@gmail.com', '$2y$10$DnnbsImdgz3ZTeUDctllEOqiXaldYeScUVWAByk7uCTxfylo19Aha', '0382550508', 'Phú Thọ', '2024-12-17', 1, NULL, NULL),
(4, 'KH004', 'Nguyễn Văn Quân', 'quanvan@gmail.com', '$2y$10$ulP.lruc1BSY3MuzaD4eWOFkpLJjjldheHjeqKd9lZhSTilZ/O4OO', '094357152', 'Hà Nội', '2024-12-03', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ndt_loai_san_pham`
--

CREATE TABLE `ndt_loai_san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ndtMaLoai` varchar(255) NOT NULL,
  `ndtTenLoai` varchar(255) NOT NULL,
  `ndtTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ndt_loai_san_pham`
--

INSERT INTO `ndt_loai_san_pham` (`id`, `ndtMaLoai`, `ndtTenLoai`, `ndtTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'G001', 'Nike', 0, NULL, '2025-01-02 07:30:01'),
(2, 'G002', 'Adidas', 0, NULL, NULL),
(3, 'G003', 'Puma', 0, NULL, NULL),
(4, 'G004', 'Asia', 0, NULL, NULL),
(5, 'G005', 'Asics', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ndt_quan_tri`
--

CREATE TABLE `ndt_quan_tri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ndtTaiKhoan` varchar(255) NOT NULL,
  `ndtMatKhau` varchar(255) NOT NULL,
  `ndtTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ndt_quan_tri`
--

INSERT INTO `ndt_quan_tri` (`id`, `ndtTaiKhoan`, `ndtMatKhau`, `ndtTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'dthann2005@gmail.com', '$2y$10$cHO1y.eTykOhmww/7/hXPeD2A9Ma//YVtn2BuTMJFqQ0YpInXQdla', 0, NULL, NULL),
(3, 'ducthanhskg@gmail.com', '$2y$10$Mxx.TenH4bHBzCZlYQ6AXOZC0OHwei/BLCPOX/EIhKnDRd0EUA66q', 0, NULL, NULL),
(4, '0386186153', '$2y$10$/xpImam6fy7dPFuiQGxYeeD.b2ccewjlF1cOcHCwoHXV9pK34/H.m', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ndt_san_pham`
--

CREATE TABLE `ndt_san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ndtMaSanPham` varchar(255) NOT NULL,
  `ndtTenSanPham` varchar(255) NOT NULL,
  `ndtHinhAnh` varchar(255) NOT NULL,
  `ndtSoLuong` int(11) NOT NULL,
  `ndtDonGia` double(8,2) NOT NULL,
  `ndtMaLoai` bigint(20) NOT NULL,
  `ndtTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ndt_san_pham`
--

INSERT INTO `ndt_san_pham` (`id`, `ndtMaSanPham`, `ndtTenSanPham`, `ndtHinhAnh`, `ndtSoLuong`, `ndtDonGia`, `ndtMaLoai`, `ndtTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'A001', 'Adidas Samba OG Đế Cao', 'img/san_pham/AVdq6NsusYmODK059BYHZxvkPgB42r7PVInrEGIO.jpg', 200, 990000.00, 1, 0, NULL, '2025-01-02 07:40:31'),
(2, 'A002', 'Adidas Superstar', 'images/Adidas-Superstar.jpg', 250, 100000.00, 1, 0, NULL, NULL),
(3, 'A003', 'Adidas Yeezy 350', 'images/Adidas-Yeezy-350.jpg', 300, 50000.00, 1, 0, NULL, NULL),
(4, 'N001', 'Jordan 1 Retro High OG', 'images/Giay-Nike-Air-Jordan-1-Retro-High-OG-Lost-Found.jpg', 2150, 900000.00, 2, 0, NULL, NULL),
(5, 'N002', 'Nike Air Force 1', 'images/giay-nike-air-force-1.jpg', 200, 350000.00, 2, 0, NULL, NULL),
(6, 'N003', 'Nike Blazer Mid', 'images/Nike-Blazer-Mid.jpg', 100, 250000.00, 2, 0, NULL, NULL),
(7, 'P001', 'Puma Palermo', 'images/Giay-Puma-Palermo.jpg', 100, 250000.00, 3, 0, NULL, NULL),
(8, 'ASIA', 'Giày thể thao Asia', 'images/giay-the-thao-asia.jpg', 200, 30000.00, 4, 0, NULL, NULL),
(9, 'ASICS', 'Giày thể thao Asics', 'images/giay-the-thao-asics.jpg', 400, 30000.00, 5, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ndt_ct_hoa_don`
--
ALTER TABLE `ndt_ct_hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ndt_hoa_don`
--
ALTER TABLE `ndt_hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ndt_hoa_don_ndtmahd_unique` (`ndtMaHD`);

--
-- Chỉ mục cho bảng `ndt_khach_hang`
--
ALTER TABLE `ndt_khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ndt_khach_hang_ndtmakh_unique` (`ndtMaKH`);

--
-- Chỉ mục cho bảng `ndt_loai_san_pham`
--
ALTER TABLE `ndt_loai_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ndt_loai_san_pham_ndtmaloai_unique` (`ndtMaLoai`);

--
-- Chỉ mục cho bảng `ndt_quan_tri`
--
ALTER TABLE `ndt_quan_tri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ndt_quan_tri_ndttaikhoan_unique` (`ndtTaiKhoan`);

--
-- Chỉ mục cho bảng `ndt_san_pham`
--
ALTER TABLE `ndt_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `ndt_ct_hoa_don`
--
ALTER TABLE `ndt_ct_hoa_don`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ndt_hoa_don`
--
ALTER TABLE `ndt_hoa_don`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ndt_khach_hang`
--
ALTER TABLE `ndt_khach_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ndt_loai_san_pham`
--
ALTER TABLE `ndt_loai_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ndt_quan_tri`
--
ALTER TABLE `ndt_quan_tri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ndt_san_pham`
--
ALTER TABLE `ndt_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
