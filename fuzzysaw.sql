-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2025 pada 07.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuzzysaw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `symbol`, `name`, `created_at`, `updated_at`) VALUES
(13, 'A1', 'Akutansi', '2025-01-09 06:01:01', '2025-01-09 06:15:33'),
(14, 'A2', 'Matematika', '2025-01-09 06:01:12', '2025-01-09 06:01:12'),
(15, 'A3', 'Manajemen', '2025-01-09 06:01:21', '2025-01-09 06:01:21'),
(16, 'A4', 'Biologi', '2025-01-09 06:01:35', '2025-01-09 06:37:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datafuzzys`
--

CREATE TABLE `datafuzzys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penilaian_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_fuzzy` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datafuzzys`
--

INSERT INTO `datafuzzys` (`id`, `penilaian_id`, `kriteria_id`, `alternatif_id`, `nilai_fuzzy`, `created_at`, `updated_at`) VALUES
(466, 13, 5, 13, 0.25203377751155, '2025-01-11 00:01:48', '2025-01-14 23:48:08'),
(467, 14, 6, 13, 0.71428465306259, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(468, 15, 7, 13, 0.75518134715026, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(469, 16, 8, 13, 0.34502923976608, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(470, 17, 9, 13, 0.44444444444444, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(471, 18, 5, 14, 0.18699322228634, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(472, 19, 6, 14, 0.71428465306259, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(473, 20, 7, 14, 0.13946459412781, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(474, 21, 8, 14, 0.98050682261209, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(475, 22, 9, 14, 0.38888888888889, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(476, 23, 5, 15, 0.25203377751155, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(477, 24, 6, 15, 0.8571416122465, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(478, 25, 7, 15, 0.99568221070812, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(479, 26, 8, 15, 0.34502923976608, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(480, 27, 9, 15, 0.44444444444444, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(481, 28, 5, 16, 0.0000016260138806301, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(482, 29, 6, 16, 0.99999857143041, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(483, 30, 7, 16, 0.18091537132988, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(484, 31, 8, 16, 0.97465886939571, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(485, 32, 9, 16, 0.33333333333333, '2025-01-11 00:01:48', '2025-01-11 00:12:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `fuzzys`
--

CREATE TABLE `fuzzys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `a` double NOT NULL,
  `b` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fuzzys`
--

INSERT INTO `fuzzys` (`id`, `kriteria_id`, `a`, `b`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 6150010, '2025-01-10 07:11:52', '2025-01-11 00:12:17'),
(2, 6, 1, 7000010, '2025-01-10 07:11:52', '2025-01-11 00:12:17'),
(3, 7, 1, 2317, '2025-01-10 07:11:52', '2025-01-11 00:12:17'),
(4, 8, 1, 514, '2025-01-10 07:11:52', '2025-01-11 00:12:17'),
(5, 9, 1, 19, '2025-01-10 07:11:52', '2025-01-11 00:12:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuzzy_values`
--

CREATE TABLE `fuzzy_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_min_max` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fuzzy_values`
--

INSERT INTO `fuzzy_values` (`id`, `kriteria_id`, `nilai_min_max`, `created_at`, `updated_at`) VALUES
(1, 5, 0.0000016260138806301, '2025-01-09 10:38:20', '2025-01-11 00:12:17'),
(2, 6, 0.99999857143041, '2025-01-09 10:38:20', '2025-01-11 00:12:17'),
(3, 7, 0.99568221070812, '2025-01-09 10:38:20', '2025-01-11 00:12:17'),
(4, 8, 0.98050682261209, '2025-01-09 10:38:20', '2025-01-11 00:12:17'),
(5, 9, 0.44444444444444, '2025-01-09 10:38:20', '2025-01-11 00:12:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `attribute` enum('cost','benefit') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriterias`
--

INSERT INTO `kriterias` (`id`, `symbol`, `name`, `weight`, `attribute`, `created_at`, `updated_at`) VALUES
(5, 'C1', 'Biaya Pendidikan', 0.25, 'cost', '2025-01-09 05:58:46', '2025-01-09 05:58:46'),
(6, 'C2', 'Potensi Karir', 0.3, 'benefit', '2025-01-09 05:59:27', '2025-01-09 05:59:27'),
(7, 'C3', 'Peminat', 0.15, 'benefit', '2025-01-09 05:59:52', '2025-01-09 05:59:52'),
(8, 'C4', 'Reputasi Kampus', 0.2, 'benefit', '2025-01-09 06:00:21', '2025-01-09 06:00:21'),
(9, 'C5', 'Kesesuaian Kurikulum', 0.1, 'benefit', '2025-01-09 06:00:49', '2025-01-09 06:00:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_03_053827_create_alternatifs_table', 2),
(5, '2025_01_03_054608_create_kriterias_table', 2),
(6, '2025_01_04_021353_create_penilaians_table', 3),
(7, '2025_01_04_021417_create_penilaians_table', 4),
(8, '2025_01_05_120340_create_perhitungans_table', 5),
(9, '2025_01_09_123944_create_fuzzys_table', 5),
(10, '2025_01_09_141634_create_datafuzzys_table', 6),
(17, '2025_01_09_145852_create_datafuzzys_table', 7),
(21, '2025_01_09_165119_create_fuzzy_values_table', 8),
(22, '2025_01_10_140202_create_fuzzys_table', 9),
(23, '2025_01_11_045051_create_perhitungans_table', 10),
(24, '2025_01_11_045224_create_perhitungans_table', 11),
(25, '2025_01_13_020048_create_preferensis_table', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penilaians`
--

INSERT INTO `penilaians` (`id`, `alternatif_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(13, 13, 5, 4600000, '2025-01-09 06:35:54', '2025-01-14 23:48:08'),
(14, 13, 6, 5000000, '2025-01-09 06:35:54', '2025-01-09 06:35:54'),
(15, 13, 7, 1750, '2025-01-09 06:35:55', '2025-01-09 06:35:55'),
(16, 13, 8, 178, '2025-01-09 06:35:55', '2025-01-09 06:35:55'),
(17, 13, 9, 9, '2025-01-09 06:35:55', '2025-01-09 06:35:55'),
(18, 14, 5, 5000000, '2025-01-09 06:48:50', '2025-01-09 06:48:50'),
(19, 14, 6, 5000000, '2025-01-09 06:48:50', '2025-01-09 06:48:50'),
(20, 14, 7, 324, '2025-01-09 06:48:50', '2025-01-09 06:48:50'),
(21, 14, 8, 504, '2025-01-09 06:48:50', '2025-01-09 06:48:50'),
(22, 14, 9, 8, '2025-01-09 06:48:50', '2025-01-09 06:48:50'),
(23, 15, 5, 4600000, '2025-01-09 06:50:33', '2025-01-09 06:50:33'),
(24, 15, 6, 6000000, '2025-01-09 06:50:33', '2025-01-09 06:50:33'),
(25, 15, 7, 2307, '2025-01-09 06:50:33', '2025-01-09 06:50:33'),
(26, 15, 8, 178, '2025-01-09 06:50:33', '2025-01-09 06:50:33'),
(27, 15, 9, 9, '2025-01-09 06:50:33', '2025-01-09 06:50:33'),
(28, 16, 5, 6150000, '2025-01-09 06:55:18', '2025-01-09 06:55:18'),
(29, 16, 6, 7000000, '2025-01-09 06:55:18', '2025-01-09 06:55:18'),
(30, 16, 7, 420, '2025-01-09 06:55:18', '2025-01-09 06:55:18'),
(31, 16, 8, 501, '2025-01-09 06:55:18', '2025-01-09 06:55:18'),
(32, 16, 9, 7, '2025-01-09 06:55:18', '2025-01-09 06:55:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perhitungans`
--

CREATE TABLE `perhitungans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_matriks` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perhitungans`
--

INSERT INTO `perhitungans` (`id`, `alternatif_id`, `kriteria_id`, `nilai_matriks`, `created_at`, `updated_at`) VALUES
(21, 13, 5, 0.0000064515712801852, '2025-01-11 00:01:48', '2025-01-14 23:48:11'),
(22, 13, 6, 1.40000008, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(23, 13, 7, 1.3184676958262, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(24, 13, 8, 2.8418079096045, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(25, 13, 9, 1, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(26, 14, 5, 0.0000086955765602039, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(27, 14, 6, 1.40000008, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(28, 14, 7, 7.1393188854488, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(29, 14, 8, 1, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(30, 14, 9, 1.1428571428571, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(31, 15, 5, 0.0000064515712801852, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(32, 15, 6, 1.1666666944444, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(33, 15, 7, 1, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(34, 15, 8, 2.8418079096045, '2025-01-11 00:01:48', '2025-01-11 00:12:17'),
(35, 15, 9, 1, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(36, 16, 5, 1, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(37, 16, 6, 1, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(38, 16, 7, 5.5035799522673, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(39, 16, 8, 1.006, '2025-01-11 00:01:48', '2025-01-11 00:01:48'),
(40, 16, 9, 1.3333333333333, '2025-01-11 00:01:48', '2025-01-11 00:01:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `preferensis`
--

CREATE TABLE `preferensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_preferensi` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `preferensis`
--

INSERT INTO `preferensis` (`id`, `alternatif_id`, `kriteria_id`, `nilai_preferensi`, `created_at`, `updated_at`) VALUES
(1, 13, 5, 0.0000016128928200463, '2025-01-12 19:31:45', '2025-01-14 23:48:11'),
(2, 14, 5, 0.000002173894140051, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(3, 15, 5, 0.0000016128928200463, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(4, 16, 5, 0.25, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(5, 13, 6, 0.420000024, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(6, 14, 6, 0.420000024, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(7, 15, 6, 0.35000000833332, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(8, 16, 6, 0.3, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(9, 13, 7, 0.19777015437393, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(10, 14, 7, 1.0708978328173, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(11, 15, 7, 0.15, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(12, 16, 7, 0.82553699284009, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(13, 13, 8, 0.5683615819209, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(14, 14, 8, 0.2, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(15, 15, 8, 0.5683615819209, '2025-01-12 19:31:45', '2025-01-12 19:31:45'),
(16, 16, 8, 0.2012, '2025-01-12 19:31:46', '2025-01-12 19:31:46'),
(17, 13, 9, 0.1, '2025-01-12 19:31:46', '2025-01-12 19:31:46'),
(18, 14, 9, 0.11428571428571, '2025-01-12 19:31:46', '2025-01-12 19:31:46'),
(19, 15, 9, 0.1, '2025-01-12 19:31:46', '2025-01-12 19:31:46'),
(20, 16, 9, 0.13333333333333, '2025-01-12 19:31:46', '2025-01-12 19:31:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PWL02GjXkmq350zbQjej01Bg6RUvdB49PU7l87nz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN05salJ4VmpxY29lSWdvbGFaUzBmd09Bc1FpVE5PdHUzZkhFa1JRUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXJoaXR1bmdhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736923691);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `datafuzzys`
--
ALTER TABLE `datafuzzys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datafuzzys_penilaian_id_foreign` (`penilaian_id`),
  ADD KEY `datafuzzys_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `datafuzzys_alternatif_id_foreign` (`alternatif_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fuzzys`
--
ALTER TABLE `fuzzys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuzzys_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `fuzzy_values`
--
ALTER TABLE `fuzzy_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuzzy_values_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaians_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `penilaians_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `perhitungans`
--
ALTER TABLE `perhitungans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perhitungans_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `perhitungans_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `preferensis`
--
ALTER TABLE `preferensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preferensis_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `preferensis_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `datafuzzys`
--
ALTER TABLE `datafuzzys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fuzzys`
--
ALTER TABLE `fuzzys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `fuzzy_values`
--
ALTER TABLE `fuzzy_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `perhitungans`
--
ALTER TABLE `perhitungans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `preferensis`
--
ALTER TABLE `preferensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `datafuzzys`
--
ALTER TABLE `datafuzzys`
  ADD CONSTRAINT `datafuzzys_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `datafuzzys_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `datafuzzys_penilaian_id_foreign` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaians` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fuzzys`
--
ALTER TABLE `fuzzys`
  ADD CONSTRAINT `fuzzys_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fuzzy_values`
--
ALTER TABLE `fuzzy_values`
  ADD CONSTRAINT `fuzzy_values_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD CONSTRAINT `penilaians_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perhitungans`
--
ALTER TABLE `perhitungans`
  ADD CONSTRAINT `perhitungans_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perhitungans_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `preferensis`
--
ALTER TABLE `preferensis`
  ADD CONSTRAINT `preferensis_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preferensis_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
