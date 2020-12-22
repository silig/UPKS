-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2020 pada 02.51
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerjasama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_berita`
--

CREATE TABLE `halaman_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konten` longtext COLLATE utf8mb4_unicode_ci,
  `summary` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `halaman_berita`
--

INSERT INTO `halaman_berita` (`id`, `judul`, `konten`, `summary`, `created_at`, `updated_at`) VALUES
(8, 'CSR TOYOTA dan Pemkab Purbalingga', '<p><img data-filename=\"WhatsApp Image 2020-02-21 at 10.48.52.jpeg\" style=\"width: 801px;\" src=\"http://localhost/kerjasama/public/Halaman/Berita/15825933990.png\"><p><img data-filename=\"WhatsApp Image 2020-02-21 at 09.59.59.jpeg\" style=\"width: 435px;\" src=\"http://localhost/kerjasama/public/Halaman/Berita/15825933991.png\">                      \n                    </p></p>\n', NULL, '2020-02-24 18:16:39', '2020-02-24 18:16:39'),
(11, 'Rapat dengan Disperindag Banjarnegara Inisiasi Kerja Sama', '<p><img data-filename=\"WhatsApp Image 2020-02-21 at 09.58.46.jpeg\" style=\"width: 1006px;\" src=\"http://localhost/kerjasama/public/Halaman/Berita/15837179690.png\">                      \n                    </p>\n', NULL, '2020-03-08 18:39:29', '2020-03-08 18:39:29'),
(12, 'Pelayanan Laboratorium FT Undip', '<p>                      \n                    <img data-filename=\"WhatsApp Image 2020-02-21 at 16.11.11.jpeg\" style=\"width: 801px;\" src=\"http://localhost/kerjasama/public/Halaman/Berita/15837184040.png\"></p>\n', NULL, '2020-03-08 18:46:44', '2020-03-08 18:46:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_gambar_berita`
--

CREATE TABLE `halaman_gambar_berita` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berita_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `halaman_gambar_berita`
--

INSERT INTO `halaman_gambar_berita` (`id`, `gambar`, `berita_id`, `created_at`, `updated_at`) VALUES
(7, '15825933990.png', 8, '2020-02-24 18:16:39', '2020-02-24 18:16:39'),
(8, '15825933991.png', 8, '2020-02-24 18:16:39', '2020-02-24 18:16:39'),
(11, '15837179690.png', 11, '2020-03-08 18:39:29', '2020-03-08 18:39:29'),
(12, '15837184040.png', 12, '2020-03-08 18:46:44', '2020-03-08 18:46:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_kontak`
--

CREATE TABLE `halaman_kontak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `halaman_kontak`
--

INSERT INTO `halaman_kontak` (`id`, `email`, `hp`, `created_at`, `updated_at`) VALUES
(1, 'upks@ft.undip.ac.id', '081805867370', '2020-02-19 19:37:34', '2020-02-21 02:28:37'),
(2, 'yuni.nurjanah@ft.undip.ac.id', NULL, '2020-02-20 01:11:54', '2020-02-21 02:28:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_panduan`
--

CREATE TABLE `halaman_panduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `halaman_panduan`
--

INSERT INTO `halaman_panduan` (`id`, `judul`, `file`, `created_at`, `updated_at`) VALUES
(3, 'Panduan Kerjasama', 'Panduan Kerja Sama FT UNDIP.docx', '2020-03-08 10:23:25', '2020-03-08 10:23:25'),
(4, 'draft MoU UNDIP', 'Draf MoU UNDIP.doc', '2020-03-08 10:24:14', '2020-03-08 10:24:14'),
(5, 'Draft PKS Pendidikan', 'Draft PKS Pendidikan.doc', '2020-03-08 10:30:37', '2020-03-08 10:30:37'),
(6, 'Draft PKS Non Pendidikan', 'Draft PKS Non Pendidikan.docx', '2020-03-08 10:30:54', '2020-03-08 10:30:54'),
(7, 'Form inisiasi MoU', 'Form Inisiasi MoU.xlsx', '2020-03-08 10:32:22', '2020-03-08 10:32:22'),
(8, 'Form Kajian MoU Dalam Negeri', 'Form Kajian MoU DN.docx', '2020-03-08 10:33:22', '2020-03-08 10:33:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_pengelola`
--

CREATE TABLE `halaman_pengelola` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `halaman_pengelola`
--

INSERT INTO `halaman_pengelola` (`id`, `nama`, `foto`, `jabatan`, `created_at`, `updated_at`) VALUES
(2, 'Dr.Eng. Gunawan Dwi Haryadi', 'pak-gun-3.jpg', 'Ketua', '2020-03-02 01:12:19', '2020-03-02 23:25:30'),
(6, 'Yuni Nurjanah, M.A', '0.jpg', 'Sekertaris', '2020-03-02 18:51:16', '2020-03-02 19:50:19'),
(7, 'Mardian Ramaji, S.IP', 'unnamed.jpg', 'anggota', '2020-03-02 23:01:58', '2020-03-02 23:13:57'),
(10, 'Farida Nur , S.E', 'ind1ex.jpg', 'anggota', '2020-03-02 23:24:03', '2020-03-08 18:00:36'),
(11, 'Gilis Aryo', 'WhatsApp Image 2020-03-02 at 11.51.40.jpeg', 'anggota', '2020-03-03 21:22:58', '2020-03-08 17:59:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_pengumuman`
--

CREATE TABLE `halaman_pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pengumuman` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `lampiran` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `halaman_pengumuman`
--

INSERT INTO `halaman_pengumuman` (`id`, `judul`, `pengumuman`, `tanggal`, `lampiran`, `created_at`, `updated_at`) VALUES
(14, 'Terbitnya MOU dengan Pertamina', 'telah diterbitkan MoU dengan Pertamina', '2020-02-19 06:04:33', 'document(2).pdf', '2020-02-18 23:04:33', '2020-02-24 19:24:15'),
(18, 'Pertaturan Rektor XXX', 'adanya perubahan peraturan tentang kerjasama', '2020-02-19 06:08:10', 'document_9.pdf', '2020-02-18 23:08:10', '2020-02-24 19:26:38'),
(19, 'Sistem Mengalami Maintenance', 'pada tanggal 20 Februari 2020 sistem akan mengalami maintenace karena adanya perbaikan', '2020-02-19 06:10:24', 'email.png', '2020-02-18 23:10:24', '2020-02-24 19:28:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_profil`
--

CREATE TABLE `halaman_profil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `halaman_profil`
--

INSERT INTO `halaman_profil` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '<ul><li style=\"text-align: justify; line-height: 2;\"><span style=\"font-size: 18pt; line-height: 115%; font-family: &quot;Bookman Old Style&quot;, serif;\">UPKS adalah Unit Pengelola Kerja Sama yang\r\nmempunyai tugas melaksanakan pengelolaan dan pengembangan kerja sama dalam\r\nbidang Tri Dharma Perguruan Tinggi dan Pengembangan Sumber Daya Manusia yang\r\nsesuai dengan kebutuhan masyarakat dan mengoptimalkan perolehan sumber-sumber\r\npendanaan untuk mendukung pelaksanaan program dan kegiatan Tridharma perguruan\r\ntinggi</span></li></ul><p style=\"text-align: justify; line-height: 2;\"><br></p><ul><li style=\"text-align: justify; line-height: 2;\"><span style=\"font-size: 18pt; line-height: 115%; font-family: &quot;Bookman Old Style&quot;, serif;\">Tujuan UPKS</span><br></li></ul><p style=\"text-align: justify; line-height: 2; margin-left: 25px;\"><font face=\"Bookman Old Style, serif\">&nbsp;<span style=\"font-size: 18px;\">&nbsp;</span></font><span style=\"font-family: &quot;Bookman Old Style&quot;, serif; font-size: 24px;\">Meningkatnya kerjasama riset, inkubasi, hilirisasi, dan komersialisasi hasil riset dalam bidang kerekayasaan dan teknologi</span></p><p style=\"text-align: justify; line-height: 2; margin-left: 25px;\"><span style=\"text-indent: -18pt; font-family: &quot;Bookman Old Style&quot;, serif; font-size: 12pt; line-height: 115%;\">&nbsp; &nbsp;</span></p>', '2020-02-17 02:01:27', '2020-02-24 18:56:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerjasama`
--

CREATE TABLE `kerjasama` (
  `id` int(255) NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomorks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mitra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'DN / LN',
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_inisiasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_mou` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_dana` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerjasama_pt`
--

CREATE TABLE `kerjasama_pt` (
  `id` int(11) NOT NULL,
  `nama_pt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'perguruan tinggi',
  `mitra_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mitra_negara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'DN / LN',
  `kegiatan_ks` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_ks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_inisiasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_mou` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_dana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampiran`
--

CREATE TABLE `lampiran` (
  `id` int(11) NOT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `halaman_berita_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Setting', '#', 'fa fa-cog', 0, 1, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(2, 'Users', '/users', NULL, 1, 2, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(3, 'Roles', '/roles', NULL, 1, 3, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(4, 'Permissions', '/permissions', NULL, 1, 4, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(5, 'Menus', '/menus', NULL, 1, 4, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(6, 'Halaman', '#', 'fa fa-clone', 0, 1, '2020-02-16 18:36:52', '2020-02-16 18:36:52'),
(7, 'Profil', '/profil', NULL, 6, 2, '2020-02-16 18:38:30', '2020-02-16 18:38:30'),
(8, 'Pengumuman', '/pengumuman', NULL, 6, 3, '2020-02-16 18:39:04', '2020-02-16 19:18:04'),
(9, 'Kontak', '/kontak', NULL, 6, 4, '2020-02-16 18:39:23', '2020-02-16 18:39:23'),
(10, 'Pengelola', '/pengelola', NULL, 6, 5, '2020-02-16 18:39:45', '2020-02-16 18:39:45'),
(11, 'Panduan', '/panduan', NULL, 6, 6, '2020-02-16 18:40:27', '2020-02-16 18:40:27'),
(12, 'Berita', '/berita', NULL, 6, 5, '2020-02-22 07:50:33', '2020-02-22 07:50:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_09_053403_create_roles_table', 1),
(5, '2020_01_09_053514_create_permissions_table', 1),
(6, '2020_01_09_053623_create_menus_table', 1),
(7, '2020_01_09_061115_create_role_permission_table', 1),
(8, '2020_02_14_034716_create_halaman_kontak', 2),
(9, '2020_02_14_034804_create_halaman_panduan', 2),
(10, '2020_02_14_034819_create_halaman_pengelola', 2),
(11, '2020_02_14_034836_create_halaman_pengumuman', 2),
(12, '2020_02_14_034852_create_halaman_profil', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `alias`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 'view-users', 'view users', 2, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(2, 'create-users', 'create users', 2, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(3, 'edit-users', 'edit users', 2, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(4, 'delete-users', 'delete users', 2, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(5, 'view-roles', 'view roles', 3, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(6, 'create-roles', 'create roles', 3, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(7, 'edit-roles', 'edit roles', 3, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(8, 'delete-roles', 'delete roles', 3, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(9, 'view-permissions', 'view permissions', 4, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(10, 'create-permissions', 'create permissions', 4, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(11, 'edit-permissions', 'edit permissions', 4, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(12, 'delete-permissions', 'delete permissions', 4, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(13, 'view-menus', 'view menus', 5, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(14, 'create-menus', 'create menus', 5, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(15, 'edit-menus', 'edit menus', 5, '2020-02-13 20:34:40', '2020-02-13 20:34:40'),
(16, 'delete-menus', 'delete menus', 5, '2020-02-13 20:34:40', '2020-02-13 20:34:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-02-13 20:34:40', '2020-02-13 20:34:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id`, `judul`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'MoU (Memorandum of Understanding/ Nota Kesepahaman)', '<p style=\"margin-left: 25px;\">\n\n</p><ul><li><span style=\"font-size: 16px;\">﻿</span><span lang=\"EN-ID\" style=\"line-height: 115%; font-size: 16px;\">Surat\nPengantar Pengajuan MoU&nbsp;</span></li><li><span style=\"font-size: 16px;\">Draf\nMoU&nbsp;</span></li><li><span lang=\"EN-ID\" style=\"line-height: 115%; font-size: 16px;\">Form\nInisiasi Kerjasama&nbsp;</span></li><li><span style=\"font-size: 16px;\">Lembar Kajian Pentingnya\nMoU bagi UNDIP&nbsp;</span></li></ul><p></p>', '2020-02-19 05:24:31', '2020-03-08 18:03:57'),
(2, 'MoA/ PKS (Memorandum of Agreement/ Perjanjian Kerjasama)', '<ul><li><span lang=\"EN-ID\" style=\"line-height: 115%; font-size: 16px;\">Surat\nPengantar Pengajuan MoU&nbsp;</span></li><li><span lang=\"EN-ID\" style=\"text-indent: -18pt; line-height: 115%; font-size: 16px;\">Draft MoU</span></li><li><span lang=\"EN-ID\" style=\"text-indent: -18pt; line-height: 115%; font-size: 16px;\">Form\nInisiasi Kerjasama&nbsp;</span></li><li><span lang=\"EN-ID\" style=\"text-indent: -18pt; line-height: 115%; font-size: 16px;\">Lembar\nKajian Pentingnya MoU bagi UNDIP&nbsp;</span></li></ul>', '2020-02-19 08:15:47', '2020-03-08 18:03:59'),
(3, 'Draf SK Rektor', '<ul><li><span lang=\"EN-ID\" style=\"line-height: 115%; font-size: 16px;\">Surat Pengantar Pengajuan SK Rektor&nbsp;</span></li><li><span style=\"text-align: justify; text-indent: -18pt; font-size: 16px;\">Draf\nSK Rektor&nbsp;&nbsp;</span></li><li><span lang=\"EN-ID\" style=\"line-height: 115%; font-size: 16px;\">Lampiran Draf SK Rektor&nbsp;</span><span style=\"font-family: \" bookman=\"\" old=\"\" style\",=\"\" serif;=\"\" font-size:=\"\" 16pt;=\"\" text-align:=\"\" justify;=\"\" text-indent:=\"\" -18pt;\"=\"\"><br></span></li></ul>', '2020-02-21 02:25:57', '2020-03-08 18:04:00'),
(4, 'Layanan Penerbitan Nomor Virtual Account untuk: Penyetoran Dana Laboratorium untuk Jasa Layanan/ Konferensi/ Sponsor/ lainnya', '<ul><li><span lang=\"EN-ID\" style=\"line-height: 115%;\"><span style=\"font-size: 16px;\">Surat\nPengantar Pengajuan Nomor Virtual Account&nbsp;</span></span></li></ul>', '2020-02-21 02:26:21', '2020-03-08 18:04:02'),
(5, 'Layanan Pencairan Dana Laboratorium', '<ul><li><span lang=\"EN-ID\" style=\"line-height: 115%; font-size: 16px;\">Surat\nPengantar Permohonan Pencairan Dana Lab&nbsp;</span></li><li><span style=\"font-size: 16px;\">Lampiran\nRekap Penggunaan Dana Lab/ SPJ&nbsp;</span></li><li><span style=\"font-size: 16px;\">\n\n\n\n</span><span lang=\"EN-ID\" style=\"line-height: 115%; font-size: 16px;\">Lampiran SK Rektor Pencairan\nDana Lab&nbsp;</span><br></li></ul>', '2020-02-24 18:07:22', '2020-03-08 18:04:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_access` enum('admin','vendor','customer') COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `role_id`, `user_access`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'admin@upks.com', NULL, '$2y$10$HJnVY7/phekU.p6xPx9TJOFVZtxbrIDWPM8RryIhCvoC2F4ZrPp.W', '8hUTO449fNlwTKJZoOj8fxXOb8e5YcxqEA9on8ojCykT4dCpuZ0A8rjLaHU0', '123456789', 1, 'admin', 'yes', '2020-02-13 20:34:40', '2020-02-13 20:34:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman_berita`
--
ALTER TABLE `halaman_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman_gambar_berita`
--
ALTER TABLE `halaman_gambar_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman_kontak`
--
ALTER TABLE `halaman_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman_panduan`
--
ALTER TABLE `halaman_panduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman_pengelola`
--
ALTER TABLE `halaman_pengelola`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman_pengumuman`
--
ALTER TABLE `halaman_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman_profil`
--
ALTER TABLE `halaman_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kerjasama_pt`
--
ALTER TABLE `kerjasama_pt`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `halaman_berita`
--
ALTER TABLE `halaman_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `halaman_gambar_berita`
--
ALTER TABLE `halaman_gambar_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `halaman_kontak`
--
ALTER TABLE `halaman_kontak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `halaman_panduan`
--
ALTER TABLE `halaman_panduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `halaman_pengelola`
--
ALTER TABLE `halaman_pengelola`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `halaman_pengumuman`
--
ALTER TABLE `halaman_pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `halaman_profil`
--
ALTER TABLE `halaman_profil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
