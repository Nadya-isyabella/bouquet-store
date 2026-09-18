-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2026 at 04:29 AM
-- Server version: 8.0.30
-- PHP Version: 8.5.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bouquet_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-08-29 05:40:37', '2026-08-29 05:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `aksesoris`
--

CREATE TABLE `aksesoris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aksesoris`
--

INSERT INTO `aksesoris` (`id`, `nama`, `gambar`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Pita Pink Lucu', 'aksesoris/tt538BHpKwweMctda4H5cBtDHPJa4ZvdmJeY6UWr.jpg', 2000.00, 19, '2026-08-13 05:58:21', '2026-08-28 23:39:27'),
(2, 'Kertas Custom', 'aksesoris/eJs7tp1VL8REsbmkaF0EBclWueRSoHRki3lW726q.jpg', 10000.00, 23, '2026-08-13 06:00:43', '2026-08-28 23:32:35'),
(3, 'kartu pesan', 'aksesoris/MBhELJeSGOGEfWvarLTViy4OBB1uTWnRWordjUjB.jpg', 12000.00, 8, '2026-08-13 20:50:37', '2026-08-28 23:32:25'),
(5, 'bodi manja', 'aksesoris/6UKvhcNNKXUpEgXTxefSUnbBnZaflN3W5lrNQ5M9.jpg', 1.00, 0, '2026-08-16 21:28:42', '2026-09-01 19:20:15'),
(7, 'tulip cantik', 'aksesoris/M1lTQspC1eI50uBvdTMHIfcPvhT6t4Tq9H09AJAY.jpg', 2000.00, 0, '2026-08-17 00:58:33', '2026-09-10 09:28:44'),
(8, 'Pita Pink Lucu', 'aksesoris/RXISVbMRX5COOCQMa5VQtIPyaEQEzbyKtPampD3w.jpg', 24000.00, 0, '2026-08-21 20:05:58', '2026-09-01 06:34:35'),
(9, 'bouquet mini', 'aksesoris/myaTwZRcBsDtoFphZrcinPWi3lCcO1Lq9Einrjsc.jpg', 45000.00, 21, '2026-08-28 00:37:46', '2026-09-10 09:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `alamat`, `nomor_hp`, `email`, `created_at`, `updated_at`) VALUES
(43, 'radot al mizan', 'Situjuah', '085263975534', 'radot@tefa.org', '2026-09-01 19:18:41', '2026-09-01 19:18:41'),
(44, 'isabella', 'xjauxauxa', '08657657654', 'bella@gmail.com', '2026-09-10 06:35:47', '2026-09-10 06:35:47'),
(45, 'layla valiant', 'JNCEFER', '08767686678', 'layla@gmail.com', '2026-09-10 08:47:39', '2026-09-10 08:47:39'),
(46, 'NANANA', 'asdasda', '0999999999', 'nana@gmail.com', '2026-09-10 09:26:25', '2026-09-10 09:31:02'),
(47, 'tifvalian', 'kototo', '08775676776', 'tiftfi@gmail.com', '2026-09-10 18:02:16', '2026-09-10 18:02:16'),
(48, 'fikafika', 'kotototot', '09823423423', 'fikaaa@gmail.com', '2026-09-10 19:09:54', '2026-09-10 19:09:54'),
(49, 'yas valian', 'koto baru', '086567122123', 'tyas@gmail.com', '2026-09-10 19:34:23', '2026-09-10 19:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `attempts` smallint UNSIGNED NOT NULL,
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
-- Table structure for table `kategori_bouquets`
--

CREATE TABLE `kategori_bouquets` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_bouquets`
--

INSERT INTO `kategori_bouquets` (`id`, `nama`, `gambar`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'bouket lucu siap jadi', 'kategori-bouquet/DuVSSQUuXok1AL69673Z4ImKRyv0FYz9ED4Tjl2j.jpg', 60000.00, 51, '2026-08-18 19:32:55', '2026-09-10 19:34:23'),
(2, 'biru lucu', 'kategori-bouquet/dRVb7yg67BgBxdyZEytS6UPzpCM6uzFCcBwr0WoY.jpg', 75000.00, 30, '2026-08-18 19:46:49', '2026-09-01 18:33:51'),
(3, 'uwa', 'kategori-bouquet/zmrCCJpziNPLC0xygNSDHepGXtCuHo8ECL6bzGB5.jpg', 1500.00, 28, '2026-08-27 06:36:13', '2026-09-10 08:48:09'),
(4, 'hiasan monyet mirip kamu', 'kategori-bouquet/hvuX6GF22cb9gJRKXzh2NThMf5shKLg336RLQ5La.jpg', 10000.00, 29, '2026-08-28 00:36:21', '2026-09-10 19:34:23'),
(5, 'cuking', 'kategori-bouquet/umZrCttWPEUCBrXNP7olmOLHdYaS7z2faLx3pch2.jpg', 10000000.00, 0, '2026-08-28 08:43:07', '2026-09-01 19:20:15'),
(6, 'bouquet kain', 'kategori-bouquet/KuvKhLL2wDnsquF5IfglYRSaxB5moVUSMpjILJ7P.jpg', 35000.00, 0, '2026-09-01 07:32:26', '2026-09-10 19:15:29'),
(7, 'Bundle Radot bersaudara', 'kategori-bouquet/IFGW3intrPuJl37y1n4mOqUKzrZGSIHyVNfNCw1p.jpg', 10000000.00, 0, '2026-09-01 19:19:45', '2026-09-01 19:19:45');

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
(4, '2026_08_13_041033_add_role_to_users_table', 2),
(5, '2026_08_13_113300_create_aksesoris_table', 3),
(6, '2026_08_14_130615_create_kategori_bouquets_table', 4),
(7, '2026_08_19_025139_create_customers_table', 5),
(8, '2026_08_19_070243_add_role_to_users_table', 6),
(9, '2026_08_19_070404_create_petugas_table', 6),
(10, '2026_08_19_073055_create_pemesanans_table', 7),
(11, '2026_08_20_004858_add_columns_to_pemesanans_table', 8),
(12, '2026_08_20_010408_create_pemesanan_detail_table', 9),
(13, '2026_08_21_030141_add_columns_to_pemesanan_detail_table', 10),
(14, '2026_08_21_044932_alter_customers_email_nullable', 11),
(15, '2026_08_27_111846_create_pembayarans_table', 12),
(16, '2026_08_27_112205_create_pembayaran_table', 12),
(17, '2026_08_28_052510_fix_status_pemesanans_table', 13),
(18, '2026_08_28_053110_update_status_pemesanans_table', 14),
(19, '2026_08_29_052430_create_roles_table', 15),
(20, '2026_08_29_053507_create_admins_table', 15),
(21, '2026_08_29_053604_add_role_id_to_users_table', 15);

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
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `pemesanan_id` bigint UNSIGNED NOT NULL,
  `metode` enum('bayar_di_tempat','bayar_sekarang') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('belum_bayar','menunggu_konfirmasi','dikonfirmasi','ditolak','lunas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_bayar',
  `tanggal_pembayaran` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pemesanan` date NOT NULL DEFAULT '2026-08-20',
  `tanggal_pengembalian` date DEFAULT NULL,
  `total_harga` decimal(15,0) NOT NULL DEFAULT '0',
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'baru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanans`
--

INSERT INTO `pemesanans` (`id`, `customer_id`, `alamat`, `tanggal_pemesanan`, `tanggal_pengembalian`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(53, 43, 'Situjuah', '2026-09-02', '2026-09-09', 10054998, 'selesai', '2026-09-01 19:18:41', '2026-09-01 19:20:15'),
(54, 44, 'xjauxauxa', '2026-09-10', '2026-09-26', 46500, 'pending', '2026-09-10 06:35:47', '2026-09-10 06:35:47'),
(55, 45, 'JNCEFER', '2026-09-10', '2026-09-26', 11500, 'selesai', '2026-09-10 08:47:39', '2026-09-10 08:48:09'),
(56, 46, 'ADADADADADA', '2026-09-10', '2026-10-10', 125000, 'selesai', '2026-09-10 09:26:25', '2026-09-10 09:28:44'),
(57, 46, 'asdasda', '2026-09-10', '2026-09-11', 35000, 'selesai', '2026-09-10 09:31:02', '2026-09-10 09:31:47'),
(58, 47, 'kototo', '2026-09-11', '2026-09-26', 80000, 'selesai', '2026-09-10 18:02:16', '2026-09-10 18:10:36'),
(59, 48, 'kotototot', '2026-09-11', '2026-10-01', 35000, 'selesai', '2026-09-10 19:09:54', '2026-09-10 19:15:29'),
(60, 49, 'koto baru', '2026-09-11', '2026-10-10', 80000, 'pending', '2026-09-10 19:34:23', '2026-09-10 19:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id` bigint UNSIGNED NOT NULL,
  `pemesanan_id` bigint UNSIGNED NOT NULL,
  `item_type` enum('bouquet','aksesoris') COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `harga_satuan` decimal(15,0) NOT NULL,
  `jumlah` int NOT NULL,
  `subtotal` decimal(15,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id`, `pemesanan_id`, `item_type`, `item_id`, `harga_satuan`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(170, 53, 'aksesoris', 5, 1, 9998, 9998, '2026-09-01 19:20:15', '2026-09-01 19:20:15'),
(171, 53, 'aksesoris', 9, 45000, 1, 45000, '2026-09-01 19:20:15', '2026-09-01 19:20:15'),
(172, 53, 'bouquet', 5, 10000000, 1, 10000000, '2026-09-01 19:20:15', '2026-09-01 19:20:15'),
(173, 54, 'bouquet', 6, 35000, 1, 35000, '2026-09-10 06:35:47', '2026-09-10 06:35:47'),
(174, 54, 'bouquet', 4, 10000, 1, 10000, '2026-09-10 06:35:47', '2026-09-10 06:35:47'),
(175, 54, 'bouquet', 3, 1500, 1, 1500, '2026-09-10 06:35:47', '2026-09-10 06:35:47'),
(178, 55, 'bouquet', 3, 1500, 1, 1500, '2026-09-10 08:48:09', '2026-09-10 08:48:09'),
(179, 55, 'bouquet', 4, 10000, 1, 10000, '2026-09-10 08:48:09', '2026-09-10 08:48:09'),
(186, 56, 'bouquet', 1, 60000, 1, 60000, '2026-09-10 09:28:44', '2026-09-10 09:28:44'),
(187, 56, 'aksesoris', 9, 45000, 1, 45000, '2026-09-10 09:28:44', '2026-09-10 09:28:44'),
(188, 56, 'aksesoris', 7, 2000, 10, 20000, '2026-09-10 09:28:44', '2026-09-10 09:28:44'),
(190, 57, 'bouquet', 6, 35000, 1, 35000, '2026-09-10 09:31:47', '2026-09-10 09:31:47'),
(193, 58, 'bouquet', 6, 35000, 2, 70000, '2026-09-10 18:10:36', '2026-09-10 18:10:36'),
(194, 58, 'bouquet', 4, 10000, 1, 10000, '2026-09-10 18:10:36', '2026-09-10 18:10:36'),
(196, 59, 'bouquet', 6, 35000, 1, 35000, '2026-09-10 19:15:29', '2026-09-10 19:15:29'),
(197, 60, 'bouquet', 4, 10000, 2, 20000, '2026-09-10 19:34:23', '2026-09-10 19:34:23'),
(198, 60, 'bouquet', 1, 60000, 1, 60000, '2026-09-10 19:34:23', '2026-09-10 19:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Cuti','Sakit','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `alamat`, `nomor_hp`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Iqbal Ramadhan', 'jakarta', '081283721981', 'IqbalRamadhan@gmail.com', 'Aktif', '2026-08-25 21:00:31', '2026-08-25 21:00:31'),
(4, 'naday', 'jl. jl dg spatu rodaku', '02832746287462874', 'nadnad@gmail.com', 'Aktif', '2026-08-28 08:42:07', '2026-08-28 08:42:07'),
(5, 'nanonad', 'kmklkm', '08777777', 'nad@gmail.com', 'Sakit', '2026-08-28 11:13:40', '2026-08-28 11:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2026-08-29 05:37:51', '2026-08-29 05:37:51'),
(2, 'User', '2026-08-29 05:37:51', '2026-08-29 05:37:51');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('obph6DONblmb0cpwsGuNKYNOdB3fjWhbCJlp9qlf', 23, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJleGNLSDBick5DY04wb1lrR2J0SGk5a0RkdFNGbmtpbHJ6aHQ2RjRhIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvYm91cXVldF9zdG9yZS50ZXN0XC91c2VyXC9wZXNhbmFuIiwicm91dGUiOiJ1c2VyLnBlc2FuYW4uaW5kZXgifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjIzfQ==', 1789703053);

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
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nadjhsufhs', 'nadyaisyabella627@gmail.com', NULL, '$2y$12$I1g8i3GZq79qsxHE4jqyoeYDNf7/9ea5IiX4qUeRHwOYTQ.0ihh6W', 2, 'user', NULL, '2026-08-12 19:41:11', '2026-08-12 19:41:11'),
(2, 'kisty', 'nazzala@gmail.com', NULL, '$2y$12$j3q4orMz9yLJ1/D8f4OZg.Z3Df/ULRYKcOfN./4tzuwNbwcuatRfG', 2, 'user', NULL, '2026-08-12 21:23:55', '2026-08-12 21:23:55'),
(3, 'Admin Bouquet Store', 'admin@bouquetstore.com', NULL, '$2y$12$TXxvHCFkAsfyYd80a2E7/eJGNlwF/394abmX5xQ.IZKnkt35ZesbS', 1, 'admin', NULL, '2026-08-12 21:49:32', '2026-08-12 21:49:32'),
(4, 'Petugas Bouquet Store', 'petugas@bouquetstore.com', NULL, '$2y$12$JLBpm3.yc4mMj6oroh1jb.s6E7eWEqyAm1p66RdDU/AyJSp6Oyb0W', NULL, 'petugas', NULL, '2026-08-12 21:49:32', '2026-08-12 21:49:32'),
(5, 'ance nova', 'ance@gmail.com', NULL, '$2y$12$LaD0RRTqKuIfASPK7R1pxeblD9.yMEODDq1OXYf997OrSisriuUyS', 2, 'user', NULL, '2026-08-13 18:39:07', '2026-08-13 18:39:07'),
(6, 'deni manto', 'deni@gmail.com', NULL, '$2y$12$lLQB/kGR8ECv5H37EDwM7OrGa6cwpy72hTKR4UcnkJcVNeGDAth0S', 2, 'user', NULL, '2026-08-14 05:24:26', '2026-08-14 05:24:26'),
(7, 'nadya', 'nadya@gmail.com', NULL, '$2y$12$O6TT92t3k1MfnEhlT5ry/uirpLlRLZziRiLs8OH0E80qcoWIdCy76', 2, 'user', NULL, '2026-08-25 23:35:54', '2026-08-25 23:35:54'),
(8, 'nadyaisyabella', 'nadyai@gmail.com', NULL, '$2y$12$ehEyOlAW.l9yd/tOw6zvFOw2Hbb5lOXGNKI5a9tc/w/lTz8pkH6gK', 2, 'user', NULL, '2026-08-26 00:16:35', '2026-08-26 00:16:35'),
(9, 'kisty', 'kistynasala@gmail.com', NULL, '$2y$12$EubtcL5b0jRQ5GMv52.i8OEbQ5tOfhak4HhCQxZ9Am89hE0hbuFY.', 2, 'user', NULL, '2026-08-26 00:32:08', '2026-08-26 00:32:08'),
(10, 'nasalakisty', 'kistyy@gmail.com', NULL, '$2y$12$nGBAAXsjsOEoxs.lcB/ha.sdIWYHMvknf72ACTt3jkSiz9.G5xJ5K', 2, 'user', NULL, '2026-08-26 01:28:23', '2026-08-26 01:28:23'),
(11, 'nadya', 'nadyaisyabella@gmail.com', NULL, '$2y$12$vTTJH3ymmlre6i1L6bUib.Jc954shzB/aK4K3L1ZXh9ClXkPd4Zmm', 2, 'user', NULL, '2026-08-28 01:23:05', '2026-08-28 01:23:05'),
(12, 'rindu', 'rindunur@gmail.com', NULL, '$2y$12$GAK9wIEnRsW8o2tKB10Fv.LxqWbOuYZuZfKSGRTDqML9NtzfqmInS', 2, 'user', NULL, '2026-08-28 01:25:43', '2026-08-28 01:25:43'),
(13, 'nadynady', 'nanandy@gmail.com', NULL, '$2y$12$6kquXmjiMCUSFjO24Rn50eIgLqIBfu9x0VlpF41CpBpduo4m4wwE6', 2, 'user', NULL, '2026-08-28 11:02:14', '2026-08-28 11:02:14'),
(14, 'aura', 'aurauwa@gmail.com', NULL, '$2y$12$2vT.Ai.zz.zbcsnqzIRq2eOcIHvyGxDjslMofcLiT8dS5T.2krj7m', 2, 'user', NULL, '2026-08-28 11:10:07', '2026-08-28 11:10:07'),
(15, 'anya', 'anya@gmail.com', NULL, '$2y$12$TJWSYS3hfWB.VCnh.y014uz4aGN/9zhqIs4yaV9Plwvwv/wwpoSyy', 2, 'user', NULL, '2026-08-28 19:17:53', '2026-08-28 19:17:53'),
(16, 'jia', 'jiasyuk@gmail.com', NULL, '$2y$12$qW2gW7IugjRoLjo.NLG1rOx9LxEh42AScRnCz25dodX8AOOE0VMx6', 2, 'user', NULL, '2026-08-28 21:14:06', '2026-08-28 21:14:06'),
(17, 'syafika', 'fika@gmail.com', NULL, '$2y$12$mWOYxuTzymc3p0QmmS/GfOeGFEPj6rtpN3biWGFuXQwyvPBurMHNy', NULL, 'user', NULL, '2026-08-28 22:52:32', '2026-08-28 22:52:32'),
(18, 'nana', 'nanaya@gmail.com', NULL, '$2y$12$O8Trpv941aj7ZAVcyBzTJexWsfyz43cbKZUAk3h0.zCjmtlBddInS', NULL, 'user', 'IGhmoRW0t4LAAp8B6a5EFL15StOs8ScoIKifaxjwXdxe7PHsjhh9w2TzYvSg', '2026-09-01 06:32:52', '2026-09-01 06:32:52'),
(19, 'susanti', 'susanti@gmail.com', NULL, '$2y$12$OYisGC0q19NZ7w8W8fbQCu69yC/N45LgSqE/QRJuuvWeU1x/Yt.uC', NULL, 'user', NULL, '2026-09-01 17:40:00', '2026-09-01 17:40:00'),
(20, 'radot al mizan', 'radot@tefa.org', NULL, '$2y$12$LDxgtcC1QoIX9d5Vy9juEe8GKRxKr5v6k3yMPadqzCa60JbIkf/WC', NULL, 'user', NULL, '2026-09-01 19:16:52', '2026-09-01 19:16:52'),
(21, 'mail', 'mail@gmail.com', NULL, '$2y$12$yDJ2uNwqNAaaI8ta5j5qEe75avuOf6JO3bxGWuMdfUZrssAfuSPUq', NULL, 'user', NULL, '2026-09-02 18:12:04', '2026-09-02 18:12:04'),
(22, 'memei', 'meimei@gmail.com', NULL, '$2y$12$6TAE3p3PFlK6u/LYdksdkucVr/zd2CNKSUboBsX43HqA3NVsWhgI.', NULL, 'user', NULL, '2026-09-02 18:17:55', '2026-09-02 18:17:55'),
(23, 'layla valiant', 'layla@gmail.com', NULL, '$2y$12$KH0/oW3u2RembzU/1O77fucvkxSYW5ByD1og1tLG5LlxQxaoakMMO', NULL, 'user', NULL, '2026-09-10 06:27:25', '2026-09-10 06:27:25'),
(24, 'isabella', 'bella@gmail.com', NULL, '$2y$12$WXCPCnsqWUkVnPQkMbCxWOA5yqaD1KsM/4ZIIHTHP66uaXr2KdunO', NULL, 'user', NULL, '2026-09-10 06:33:53', '2026-09-10 06:33:53'),
(25, 'NANANA', 'nana@gmail.com', NULL, '$2y$12$HZXNAYs3yNCNJWW6mX.zEO3fubD2dksz8TULHLcGqXnLx4EIO6yKm', NULL, 'user', NULL, '2026-09-10 08:53:36', '2026-09-10 08:53:36'),
(26, 'tifvalian', 'tiftfi@gmail.com', NULL, '$2y$12$hU2UWzzoCHK27PuUs69FfeH.GZkmkD7rVowLdqbRzttnzw9Jj79Je', NULL, 'user', NULL, '2026-09-10 18:01:36', '2026-09-10 18:01:36'),
(27, 'fikafika', 'fikaaa@gmail.com', NULL, '$2y$12$PR.9E2xtHS/X5TMvo7or5OB3Nk.0ON1FFJ7ts.Ft1XEpWgCUqSfZC', NULL, 'user', NULL, '2026-09-10 19:09:00', '2026-09-10 19:09:00'),
(28, 'yas valian', 'tyas@gmail.com', NULL, '$2y$12$hwGtipW/m0SEsQMUt.YOjeuUndri5viTid02ND1IJljR817AwKUJK', NULL, 'user', NULL, '2026-09-10 19:33:45', '2026-09-10 19:33:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `aksesoris`
--
ALTER TABLE `aksesoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

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
-- Indexes for table `kategori_bouquets`
--
ALTER TABLE `kategori_bouquets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_pemesanan_id_foreign` (`pemesanan_id`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanans_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_detail_pemesanan_id_foreign` (`pemesanan_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `petugas_email_unique` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aksesoris`
--
ALTER TABLE `aksesoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
-- AUTO_INCREMENT for table `kategori_bouquets`
--
ALTER TABLE `kategori_bouquets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD CONSTRAINT `pemesanans_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD CONSTRAINT `pemesanan_detail_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
