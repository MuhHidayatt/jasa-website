-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2025 at 06:35 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasa_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `kode_customer`, `name_customer`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'CST031', 'Tiara Azahra', 'araa@gmail.com', '086745676432', 'Palimanan, Cirebon', '2025-07-04 23:55:50', '2025-07-08 08:26:03'),
(2, 'CST569', 'Muhammad Hidayat', 'hidayat@gmail.com', '085967029702', 'JL. Koreak - Sedong, RT.005, RW.002\r\nKoreak, Cigandamekar, Kuningan 45556', '2025-07-07 10:47:06', '2025-07-08 08:25:49'),
(3, 'CST829', 'Muhammad Faiz', 'pais@gmail.com', '087567898765', 'Megu, Cirebon', '2025-07-08 08:24:27', '2025-07-08 08:24:27'),
(4, 'CST509', 'Muhammad Farhan Saino', 'buttom@gmail.com', '09765423456', 'Harjamukti, Kab. Cirebon', '2025-07-08 08:26:38', '2025-07-08 08:26:38'),
(5, 'CST945', 'Nadzwa Nurul Hikmah', 'cacaa@gmail.com', '0865434567', 'Indramayu, Jawa Barat', '2025-07-08 08:27:16', '2025-07-08 08:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_30_151044_create_customers_table', 1),
(5, '2025_06_30_151045_create_services_table', 1),
(6, '2025_06_30_151055_create_orders_table', 1),
(7, '2025_06_30_151056_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_custom` tinyint(1) NOT NULL DEFAULT '0',
  `custom_request` text COLLATE utf8mb4_unicode_ci,
  `order_date` date NOT NULL,
  `status` enum('pending','paid','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `kode_order`, `kode_customer`, `kode_service`, `is_custom`, `custom_request`, `order_date`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'ORD051', 'CST031', 'SRV034', 0, NULL, '2025-07-07', 'done', '-', '2025-07-07 11:08:51', '2025-07-08 10:45:58'),
(2, 'ORD379', 'CST569', NULL, 1, 'Web App Jasa Konsultasi Pendidikan dan Bimbingan Belajar', '2025-07-07', 'done', '-', '2025-07-07 11:10:53', '2025-07-08 09:38:49'),
(4, 'ORD626', 'CST829', 'SRV034', 0, NULL, '2025-07-02', 'pending', NULL, '2025-07-08 09:38:39', '2025-07-08 09:38:39'),
(5, 'ORD352', 'CST945', 'SRV088', 0, NULL, '2025-07-08', 'paid', '-', '2025-07-08 09:49:11', '2025-07-08 09:52:32'),
(7, 'ORD736', 'CST509', NULL, 1, 'Web Aplikasi Penyewaan Bus Pariwisata Laravel', '2025-07-03', 'paid', 'Web Aplikasi Penyewaan Bus Pariwisata adalah solusi digital berbasis Laravel yang dirancang untuk mengelola bisnis penyewaan bus pariwisata. Aplikasi ini mempermudah proses pemesanan, manajemen armada, dan transaksi, memberikan pengalaman yang efisien bagi penyedia jasa dan pelanggan.', '2025-07-08 10:17:01', '2025-07-08 10:45:24'),
(8, 'ORD347', 'CST509', 'SRV470', 0, NULL, '2025-05-10', 'pending', '-', '2025-07-08 10:20:37', '2025-07-08 10:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `method` enum('transfer','qris','cash') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','paid','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `kode_payment`, `kode_order`, `payment_date`, `amount`, `method`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PAY320', 'ORD379', '2025-07-07', 400000.00, 'transfer', 'paid', '2025-07-07 11:39:38', '2025-07-07 11:39:38'),
(3, 'PAY842120', 'ORD352', '2025-07-08', 450000.00, 'cash', 'paid', '2025-07-08 09:52:31', '2025-07-08 09:52:31'),
(4, 'PAY046358', 'ORD736', '2025-07-08', 400000.00, 'qris', 'paid', '2025-07-08 10:45:24', '2025-07-08 10:45:24'),
(5, 'PAY122013', 'ORD051', '2025-07-08', 500000.00, 'transfer', 'paid', '2025-07-08 10:45:47', '2025-07-08 10:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `kode_service`, `name_service`, `description`, `price`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'SRV034', 'Sistem Informasi Penjualan Produk UMKM Berbasis Web', 'Sistem Informasi Penjualan Produk UMKM adalah aplikasi web yang dirancang untuk membantu pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) mengelola penjualan produk secara efisien. Aplikasi ini menyediakan platform digital untuk memasarkan produk, mengelola pesanan, dan memantau performa bisnis dengan antarmuka yang sederhana dan intuitif.\r\n\r\nFitur Utama:\r\n- Katalog Produk: Tampilan produk dengan detail harga, deskripsi, dan gambar untuk memudahkan pelanggan memilih.\r\n- Manajemen Pesanan: Pelacakan pesanan dari pemesanan hingga pengiriman, dengan status real-time.\r\n- Pembayaran Online: Integrasi dengan gateway pembayaran untuk transaksi yang aman dan cepat.\r\n- Manajemen Pelanggan: Penyimpanan data pelanggan dan riwayat pembelian untuk pemasaran yang lebih baik.\r\n- Laporan Penjualan: Analisis penjualan dan laporan keuangan untuk pengambilan keputusan bisnis.\r\n- Dashboard Admin: Pemantauan stok, pesanan, dan performa bisnis secara langsung.', 300000.00, 'services/KxqYqstutXaBlb5gRmlVybcHot54U3w0pvnqgkvV.png', '2025-07-07 11:00:52', '2025-07-08 08:59:02'),
(2, 'SRV871', 'Aplikasi Laravel Penyewaan Sound System dan Alat Acara', 'Aplikasi web berbasis Laravel untuk mengelola penyewaan sound system dan alat acara. Dirancang untuk efisiensi bisnis dengan antarmuka ramah pengguna.\r\n\r\nFitur Utama:\r\n-Manajemen Inventaris: Kelola ketersediaan dan harga alat.\r\n-Pemesanan Online: Pelanggan memesan alat berdasarkan tanggal dan durasi.\r\n-Manajemen Pelanggan: Simpan data dan riwayat transaksi pelanggan.\r\n-Pembayaran: Integrasi gateway pembayaran dan konfirmasi manual.\r\n-Laporan: Ringkasan pendapatan dan transaksi.\r\n-Notifikasi: Konfirmasi dan pengingat via email/WhatsApp.\r\n-Dashboard Admin: Pantau pemesanan dan performa bisnis.', 500000.00, 'services/RV2b7WtMyoY0IgOUVPp1uRDFcRJQuvtB4H08ZtCR.png', '2025-07-08 09:00:24', '2025-07-08 09:00:24'),
(3, 'SRV088', 'Sistem Informasi Jasa Laundry dan Antar Jemput Pakaian', 'Sistem Informasi Jasa Laundry dan Antar Jemput Pakaian adalah aplikasi web yang dirancang untuk menyederhanakan pengelolaan layanan laundry dengan fitur antar jemput. Aplikasi ini membantu bisnis laundry meningkatkan efisiensi operasional dan kepuasan pelanggan melalui platform digital yang mudah digunakan.', 450000.00, 'services/EMLrA28uIfeLFfAUWXE2HRCfoHqDG5wB2pW6yRmd.png', '2025-07-08 09:12:07', '2025-07-08 09:12:07'),
(4, 'SRV507', 'Sistem Informasi Sewa Peralatan Camping & Outdoor', 'Sistem Informasi Sewa Peralatan Camping & Outdoor adalah aplikasi web yang dirancang untuk mempermudah pengelolaan bisnis penyewaan peralatan camping seperti tenda, sleeping bag, dan perlengkapan outdoor lainnya. Aplikasi ini membantu penyedia jasa meningkatkan efisiensi operasional dan memberikan pengalaman pemesanan yang seamless bagi pelanggan.', 250000.00, 'services/InThqXOoIg8cT44f8nspIUmDRdTY8ozu7rypD0iW.png', '2025-07-08 09:37:22', '2025-07-08 09:45:15'),
(5, 'SRV470', 'Aplikasi Penyewaan Kendaraan (Motor/Mobil) Berbasis Laravel', 'mengelola bisnis penyewaan motor dan mobil. Aplikasi ini dirancang untuk menyederhanakan proses pemesanan, manajemen armada, dan transaksi, memberikan kemudahan bagi penyedia jasa dan pelanggan.', 600000.00, 'services/9VYbc9ehm6FbTWQE51ybNiIYu21FYD55sotItZZM.png', '2025-07-08 09:48:41', '2025-07-08 10:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Budi', 'budi@gmail.com', NULL, '$2y$12$pgJKJVskSq4D9ks7MBJYXOP6k3/9r.4XzIMMe.ehnuFjCsqhiviX2', 'customer', NULL, '2025-07-04 09:35:56', '2025-07-04 09:35:56'),
(3, 'Muhammad Hidayat', 'muhidayat467@gmail.com', NULL, '$2y$10$z0KxN5c3Ug/Vr9l7IH5RJ.3HbeoliF4oD8t3tus13FpYb9lPmOPXK', 'admin', NULL, '2025-07-04 11:01:55', '2025-07-04 11:01:55'),
(4, 'Samsul', 'samsul@gmail.com', NULL, '$2y$10$oVEK3cR9uIQiC4X216i5TupXgga.dE89RgPypD9aM81.JM2cdKp3G', 'customer', NULL, '2025-07-08 11:28:32', '2025-07-08 11:28:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_kode_customer_unique` (`kode_customer`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_kode_order_unique` (`kode_order`),
  ADD KEY `orders_kode_customer_foreign` (`kode_customer`),
  ADD KEY `orders_kode_service_foreign` (`kode_service`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_kode_payment_unique` (`kode_payment`),
  ADD KEY `payments_kode_order_foreign` (`kode_order`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_kode_service_unique` (`kode_service`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_kode_customer_foreign` FOREIGN KEY (`kode_customer`) REFERENCES `customers` (`kode_customer`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_kode_service_foreign` FOREIGN KEY (`kode_service`) REFERENCES `services` (`kode_service`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_kode_order_foreign` FOREIGN KEY (`kode_order`) REFERENCES `orders` (`kode_order`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
