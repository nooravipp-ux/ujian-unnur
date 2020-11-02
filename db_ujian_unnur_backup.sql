-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 09:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ujian_unnur_backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_05_042507_create_roles_table', 1),
(5, '2020_10_05_042743_create_role_user_table', 1),
(6, '2020_10_05_084529_create_tbl_kategori_soal_table', 2),
(7, '2020_10_05_132404_create_tbl_paket_soal_table', 3),
(8, '2020_10_06_110929_create_tbl_soal_table', 4),
(9, '2020_10_06_150933_create_tbl_role_soal_table', 5),
(10, '2020_10_08_033531_create_tbl_nilai_table', 6),
(11, '2020_10_08_035734_create_tbl_nilai_table', 7),
(12, '2020_10_09_065422_create_tbl_jawab_pg_table', 8),
(13, '2020_10_11_102748_create_tbl_soal_essay_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-10-04 21:37:48', '2020-10-04 21:37:48'),
(2, 'dosen', '2020-10-04 21:37:48', '2020-10-04 21:37:48'),
(3, 'mhs', '2020-10-04 21:37:48', '2020-10-04 21:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 3, 4, '2020-10-09 15:15:36', '2020-10-09 15:15:36'),
(5, 3, 5, '2020-10-11 13:23:28', '2020-10-11 13:23:28'),
(169, 3, 413, NULL, NULL),
(170, 3, 414, NULL, NULL),
(171, 3, 415, NULL, NULL),
(172, 3, 416, NULL, NULL),
(173, 3, 417, NULL, NULL),
(174, 3, 418, NULL, NULL),
(175, 3, 419, NULL, NULL),
(176, 3, 420, NULL, NULL),
(177, 3, 421, NULL, NULL),
(178, 3, 422, NULL, NULL),
(179, 3, 423, NULL, NULL),
(180, 3, 424, NULL, NULL),
(181, 3, 425, NULL, NULL),
(182, 3, 426, NULL, NULL),
(183, 3, 427, NULL, NULL),
(184, 3, 428, NULL, NULL),
(185, 3, 429, NULL, NULL),
(186, 3, 430, NULL, NULL),
(187, 3, 431, NULL, NULL),
(188, 3, 432, NULL, NULL),
(189, 3, 433, NULL, NULL),
(190, 3, 434, NULL, NULL),
(191, 3, 435, NULL, NULL),
(192, 3, 436, NULL, NULL),
(193, 3, 437, NULL, NULL),
(194, 3, 438, NULL, NULL),
(195, 3, 439, NULL, NULL),
(196, 3, 440, NULL, NULL),
(197, 3, 441, NULL, NULL),
(198, 3, 442, NULL, NULL),
(199, 3, 443, NULL, NULL),
(200, 3, 444, NULL, NULL),
(201, 3, 445, NULL, NULL),
(202, 3, 446, NULL, NULL),
(203, 3, 447, NULL, NULL),
(204, 3, 448, NULL, NULL),
(205, 3, 449, NULL, NULL),
(206, 3, 450, NULL, NULL),
(207, 3, 451, NULL, NULL),
(208, 3, 452, NULL, NULL),
(209, 3, 453, NULL, NULL),
(210, 3, 454, NULL, NULL),
(211, 3, 455, NULL, NULL),
(212, 3, 456, NULL, NULL),
(213, 3, 457, NULL, NULL),
(214, 3, 458, NULL, NULL),
(215, 3, 459, NULL, NULL),
(216, 3, 460, NULL, NULL),
(217, 3, 461, NULL, NULL),
(218, 3, 462, NULL, NULL),
(219, 3, 463, NULL, NULL),
(220, 3, 464, NULL, NULL),
(221, 3, 465, NULL, NULL),
(222, 3, 466, NULL, NULL),
(223, 3, 467, NULL, NULL),
(224, 3, 468, NULL, NULL),
(225, 3, 469, NULL, NULL),
(226, 3, 470, NULL, NULL),
(227, 3, 471, NULL, NULL),
(228, 3, 472, NULL, NULL),
(229, 3, 473, NULL, NULL),
(230, 3, 474, NULL, NULL),
(231, 3, 475, NULL, NULL),
(232, 3, 476, NULL, NULL),
(233, 3, 477, NULL, NULL),
(234, 3, 478, NULL, NULL),
(235, 3, 479, NULL, NULL),
(236, 3, 480, NULL, NULL),
(237, 3, 481, NULL, NULL),
(238, 3, 482, NULL, NULL),
(239, 3, 483, NULL, NULL),
(240, 3, 484, NULL, NULL),
(241, 3, 485, NULL, NULL),
(242, 3, 486, NULL, NULL),
(243, 3, 487, NULL, NULL),
(244, 3, 488, NULL, NULL),
(245, 3, 489, NULL, NULL),
(246, 3, 490, NULL, NULL),
(247, 3, 491, NULL, NULL),
(248, 3, 492, NULL, NULL),
(249, 3, 493, NULL, NULL),
(250, 3, 494, NULL, NULL),
(251, 3, 495, NULL, NULL),
(252, 3, 496, NULL, NULL),
(253, 3, 497, NULL, NULL),
(254, 3, 498, NULL, NULL),
(255, 3, 499, NULL, NULL),
(256, 3, 500, NULL, NULL),
(257, 3, 501, NULL, NULL),
(258, 3, 502, NULL, NULL),
(259, 3, 503, NULL, NULL),
(260, 3, 504, NULL, NULL),
(261, 3, 505, NULL, NULL),
(262, 3, 506, NULL, NULL),
(263, 3, 507, NULL, NULL),
(264, 3, 508, NULL, NULL),
(265, 3, 509, NULL, NULL),
(266, 3, 510, NULL, NULL),
(267, 3, 511, NULL, NULL),
(268, 3, 512, NULL, NULL),
(269, 3, 513, NULL, NULL),
(270, 3, 514, NULL, NULL),
(271, 3, 515, NULL, NULL),
(272, 3, 516, NULL, NULL),
(273, 3, 517, NULL, NULL),
(274, 3, 518, NULL, NULL),
(275, 3, 519, NULL, NULL),
(276, 3, 520, NULL, NULL),
(277, 3, 521, NULL, NULL),
(278, 3, 522, NULL, NULL),
(279, 3, 523, NULL, NULL),
(280, 3, 524, NULL, NULL),
(281, 3, 525, NULL, NULL),
(282, 3, 526, NULL, NULL),
(283, 3, 527, NULL, NULL),
(284, 3, 528, NULL, NULL),
(285, 3, 529, NULL, NULL),
(286, 3, 530, NULL, NULL),
(287, 3, 531, NULL, NULL),
(288, 3, 532, NULL, NULL),
(289, 3, 533, NULL, NULL),
(290, 3, 534, NULL, NULL),
(291, 3, 535, NULL, NULL),
(292, 3, 536, NULL, NULL),
(293, 3, 537, NULL, NULL),
(294, 3, 538, NULL, NULL),
(295, 3, 539, NULL, NULL),
(296, 3, 540, NULL, NULL),
(297, 3, 541, NULL, NULL),
(298, 3, 542, NULL, NULL),
(299, 3, 543, NULL, NULL),
(300, 3, 544, NULL, NULL),
(301, 3, 545, NULL, NULL),
(302, 3, 546, NULL, NULL),
(303, 3, 547, NULL, NULL),
(304, 3, 548, NULL, NULL),
(305, 3, 549, NULL, NULL),
(306, 3, 550, NULL, NULL),
(307, 3, 551, NULL, NULL),
(308, 3, 552, NULL, NULL),
(309, 3, 553, NULL, NULL),
(310, 3, 554, NULL, NULL),
(311, 3, 555, NULL, NULL),
(312, 3, 556, NULL, NULL),
(313, 3, 557, NULL, NULL),
(314, 3, 558, NULL, NULL),
(315, 3, 559, NULL, NULL),
(316, 3, 560, NULL, NULL),
(317, 3, 561, NULL, NULL),
(318, 3, 562, NULL, NULL),
(319, 3, 563, NULL, NULL),
(320, 3, 564, NULL, NULL),
(321, 3, 565, NULL, NULL),
(322, 3, 566, NULL, NULL),
(323, 3, 567, NULL, NULL),
(324, 3, 568, NULL, NULL),
(325, 3, 569, NULL, NULL),
(326, 3, 570, NULL, NULL),
(327, 3, 571, NULL, NULL),
(328, 3, 572, NULL, NULL),
(329, 3, 573, NULL, NULL),
(330, 3, 574, NULL, NULL),
(331, 3, 575, NULL, NULL),
(332, 3, 576, NULL, NULL),
(333, 3, 577, NULL, NULL),
(334, 3, 578, NULL, NULL),
(335, 3, 579, NULL, NULL),
(336, 3, 580, NULL, NULL),
(337, 3, 581, NULL, NULL),
(338, 3, 582, NULL, NULL),
(339, 3, 583, NULL, NULL),
(340, 3, 584, NULL, NULL),
(341, 3, 585, NULL, NULL),
(342, 3, 586, NULL, NULL),
(343, 3, 587, NULL, NULL),
(344, 3, 588, NULL, NULL),
(345, 3, 589, NULL, NULL),
(346, 3, 590, NULL, NULL),
(347, 3, 591, NULL, NULL),
(348, 3, 592, NULL, NULL),
(349, 3, 593, NULL, NULL),
(350, 3, 594, NULL, NULL),
(351, 3, 595, NULL, NULL),
(352, 3, 596, NULL, NULL),
(353, 3, 597, NULL, NULL),
(354, 3, 598, NULL, NULL),
(355, 3, 599, NULL, NULL),
(356, 3, 600, NULL, NULL),
(357, 3, 601, NULL, NULL),
(358, 3, 602, NULL, NULL),
(359, 3, 603, NULL, NULL),
(360, 3, 604, NULL, NULL),
(361, 3, 605, NULL, NULL),
(362, 3, 606, NULL, NULL),
(363, 3, 607, NULL, NULL),
(364, 3, 608, NULL, NULL),
(365, 3, 609, NULL, NULL),
(366, 3, 610, NULL, NULL),
(367, 3, 611, NULL, NULL),
(368, 3, 612, NULL, NULL),
(369, 3, 613, NULL, NULL),
(370, 3, 614, NULL, NULL),
(371, 3, 615, NULL, NULL),
(372, 3, 616, NULL, NULL),
(373, 3, 617, NULL, NULL),
(374, 3, 618, NULL, NULL),
(375, 3, 619, NULL, NULL),
(376, 3, 620, NULL, NULL),
(377, 3, 621, NULL, NULL),
(378, 3, 622, NULL, NULL),
(379, 3, 623, NULL, NULL),
(380, 3, 624, NULL, NULL),
(381, 3, 625, NULL, NULL),
(382, 3, 626, NULL, NULL),
(383, 3, 627, NULL, NULL),
(384, 3, 628, NULL, NULL),
(385, 3, 629, NULL, NULL),
(386, 3, 630, NULL, NULL),
(387, 3, 631, NULL, NULL),
(388, 3, 632, NULL, NULL),
(389, 3, 633, NULL, NULL),
(390, 3, 634, NULL, NULL),
(391, 2, 635, NULL, NULL),
(392, 2, 636, NULL, NULL),
(393, 2, 637, NULL, NULL),
(394, 2, 638, NULL, NULL),
(395, 2, 639, NULL, NULL),
(396, 2, 640, NULL, NULL),
(397, 2, 641, NULL, NULL),
(398, 2, 642, NULL, NULL),
(399, 2, 643, NULL, NULL),
(400, 2, 644, NULL, NULL),
(401, 2, 645, NULL, NULL),
(402, 2, 646, NULL, NULL),
(403, 2, 647, NULL, NULL),
(404, 2, 648, NULL, NULL),
(405, 2, 649, NULL, NULL),
(406, 2, 650, NULL, NULL),
(407, 3, 651, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jawab_essay`
--

CREATE TABLE `tbl_jawab_essay` (
  `id` bigint(20) NOT NULL,
  `id_mhs` bigint(20) NOT NULL,
  `id_paket_soal` varchar(25) NOT NULL,
  `id_soal_essay` bigint(20) NOT NULL,
  `jawaban_essay` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jawab_pg`
--

CREATE TABLE `tbl_jawab_pg` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mhs` bigint(20) UNSIGNED NOT NULL,
  `id_paket_soal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_soal` bigint(20) UNSIGNED NOT NULL,
  `pilihan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_pilihan` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_soal`
--

CREATE TABLE `tbl_kategori_soal` (
  `id_kategori_soal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori_soal` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kategori_soal`
--

INSERT INTO `tbl_kategori_soal` (`id_kategori_soal`, `nama_kategori_soal`, `created_at`, `updated_at`) VALUES
('KAT001', 'Soal PMB', '2020-10-05 05:13:15', '2020-10-05 05:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` bigint(20) UNSIGNED NOT NULL,
  `id_mhs` bigint(20) UNSIGNED NOT NULL,
  `id_paket_soal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` decimal(8,2) DEFAULT 0.00,
  `nilai_pg` decimal(8,2) DEFAULT 0.00,
  `nilai_essay` decimal(8,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket_soal`
--

CREATE TABLE `tbl_paket_soal` (
  `id_paket_soal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori_soal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket_soal` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'nonaktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`id`, `nama`, `status`) VALUES
(1, 'form_nilai_mhs', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_soal`
--

CREATE TABLE `tbl_role_soal` (
  `id_role_soal` bigint(20) UNSIGNED NOT NULL,
  `id_dosen` bigint(20) NOT NULL,
  `id_paket_soal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nonaktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` bigint(20) NOT NULL,
  `id_paket_soal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_a` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_b` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_c` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_d` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_e` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_soal` decimal(8,2) NOT NULL,
  `gambar` longblob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal_essay`
--

CREATE TABLE `tbl_soal_essay` (
  `id_soal_essay` bigint(20) UNSIGNED NOT NULL,
  `id_paket_soal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_essay` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_essay` longblob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_prodi` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `id_prodi`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin@admin.com', 'Admin User', 'admin@admin.com', NULL, '7e4d77695ceeaa6611bc48fd75d307e4', NULL, '', '2020-10-04 21:38:04', '2020-10-04 21:38:04', ''),
(2, 'dosen@dosen.com', 'Dosen', 'dosen@dosen.com', NULL, '7e4d77695ceeaa6611bc48fd75d307e4', NULL, '55201', '2020-10-04 21:38:04', '2020-10-04 21:38:04', ''),
(3, 'mhs@mhs.com', 'mhs', 'mhs@mhs.com', NULL, '7e4d77695ceeaa6611bc48fd75d307e4', NULL, '55201', '2020-10-04 21:38:04', '2020-10-04 21:38:04', ''),
(4, 'hawk@gmail.com', 'Riley Hawk', 'hawk@gmail.com', NULL, '7e4d77695ceeaa6611bc48fd75d307e4', NULL, '55201', '2020-10-09 08:15:13', '2020-10-09 08:15:13', ''),
(5, 'milton@gmail.com', 'Milton Martinez', 'milton@gmail.com', NULL, '7e4d77695ceeaa6611bc48fd75d307e4', NULL, '55201', '2020-10-11 06:22:50', '2020-10-11 06:22:50', ''),
(413, '55201116001', 'AFNAN IBNU RAHARJO', NULL, NULL, '768230bff274e7fe9ea40a5d88b7ba29', NULL, '55201', NULL, NULL, ''),
(414, '55201116008', 'ELDIANSYAH CAHYA NUGRAHA', NULL, NULL, '4750394d2c55036c8995769866c1f7d3', NULL, '55201', NULL, NULL, ''),
(415, '55201116022', 'NUR AINI AYUNINGSIH', 'ayuningsihnuraini@gmail.com ', NULL, 'a5d9e8a43ef8a1c6df0bb9fb279a949a', NULL, '55201', NULL, NULL, ''),
(416, '55201116025', 'UTIN KUMALA ZUBAIRA', 'utinkum@gmail.com', NULL, 'e6fe3df6f7b8c336e15d0f5b6a1e7b8b', NULL, '55201', NULL, NULL, ''),
(417, '55201117051', 'MUHAMMAD ALDI FIRDAUS', NULL, NULL, 'c22aba5dad0913b9cdd361d1b5f2b2de', NULL, '55201', NULL, NULL, ''),
(418, '55201117050', 'RAKA BAGOES HERLAMBANG', NULL, NULL, '1030d30161674a1a94b7cf94dde3b332', NULL, '55201', NULL, NULL, ''),
(419, '55201117047', 'EKO BIMO YUDHA PRASETYO', NULL, NULL, 'd0ad6bde9dae5ff98e15bc474692c114', NULL, '55201', NULL, NULL, ''),
(420, '55201117046', 'REZA WISNU AJI', NULL, NULL, '91abeee324fe6d9399338b1c012a79f2', NULL, '55201', NULL, NULL, ''),
(421, '55201117045', 'FERDY RIVALDY TAMPUBOLON', NULL, NULL, 'afeb29b101f1ee3c191175f85a86dd65', NULL, '55201', NULL, NULL, ''),
(422, '55201117043', 'MUHAMMAD HAFIDZ PRATAMA', NULL, NULL, 'dac966500794725843479254b305b4c4', NULL, '55201', NULL, NULL, ''),
(423, '55201117042', 'SILVA FEBRIANTI', NULL, NULL, '5040d9f5f259bbae6f4c8dff15ed0e32', NULL, '55201', NULL, NULL, ''),
(424, '55201117040', 'TIMOTHIUS DWI APRIAN', NULL, NULL, 'ce18f93e33a34f9c45d0aa64a1d8fe15', NULL, '55201', NULL, NULL, ''),
(425, '55201117038', 'INDRA Pratama', 'ip08111997@gmail.com', NULL, 'c1a3e18acfd29d212aefad32cc7b66b1', NULL, '55201', NULL, NULL, ''),
(426, '55201117034', 'ARIEL PRATAMA', NULL, NULL, 'e6407b3ac8cd43c0d737433d4e381f1d', NULL, '55201', NULL, NULL, ''),
(427, '55201117031', 'REPI SETIA NUGRAHA', NULL, NULL, '9395a9ed510d4ef030b745d99b56b398', NULL, '55201', NULL, NULL, ''),
(428, '55201117025', 'ARFI RHEZA FIRMANSYAH', NULL, NULL, '5d8910690c539c6338778bbcc6f13982', NULL, '55201', NULL, NULL, ''),
(429, '55201117021', 'EKY RACHMADITYA NUGRAHA', NULL, NULL, '64644ff0853403e542942b062e971645', NULL, '55201', NULL, NULL, ''),
(430, '55201117019', 'GILANG YULIANTO', NULL, NULL, 'e9fc6d034a046e562e97137dbca0db2e', NULL, '55201', NULL, NULL, ''),
(431, '55201117013', 'ALMA AROFA DHARMAWAN', NULL, NULL, '8a8febc5a7f63acab6ad9dcd197745f9', NULL, '55201', NULL, NULL, ''),
(432, '55201117008', 'NURAPIP', NULL, NULL, '474fce52d9b94aedbe98d5ac2c074ec8', NULL, '55201', NULL, NULL, ''),
(433, '55201117003', 'SANDI TYAS NUGROHO', NULL, NULL, 'b516b3252e76226a5d723030410f946c', NULL, '55201', NULL, NULL, ''),
(434, '55201118001', 'TIARA AIRINDYA', NULL, NULL, '11ed1d2275bb0b8bf89d97965d7e044b', NULL, '55201', NULL, NULL, ''),
(435, '55201118002', 'REGA AWALA FRIYA SUNDAWA', NULL, NULL, 'fbfc9a277d6f36cb03dbd818d95c8b15', NULL, '55201', NULL, NULL, ''),
(436, '55201118003', 'YANTO KOTOUKI', NULL, NULL, 'dc59018278ebc09c6aa891636519f616', NULL, '55201', NULL, NULL, ''),
(437, '55201118005', 'TIARA PUJI ASTUTI', NULL, NULL, '656e12695c7cab465a1693ab0047a2b0', NULL, '55201', NULL, NULL, ''),
(438, '55201118012', 'SOPIAN RAHMAT', 'sopianrahmat.if18@student.unnur.ac.id', NULL, '85f0d19d7fc7690c2f14f74321614684', NULL, '55201', NULL, NULL, ''),
(439, '55201118022', 'IKHSAN ABDUL ROCHMAN', NULL, NULL, '8a907bc4a4cfa757901f0d6ecbe929bd', NULL, '55201', NULL, NULL, ''),
(440, '55201118023', 'YUNI KARMILA', NULL, NULL, '6cd58199e6a1231b462127140375c132', NULL, '55201', NULL, NULL, ''),
(441, '55201118024', 'BAYU SETIAWAN', NULL, NULL, 'bc45a27d33bbb73085bb46ef8b8912f5', NULL, '55201', NULL, NULL, ''),
(442, '55201118026', 'MUTIA MAUDYA RAHMAYANTI', 'mutiamaudyaa7@gmail.com', NULL, '97b90dfee9b871cbfcd6593e7fd566c7', NULL, '55201', NULL, NULL, ''),
(443, '55201118028', 'MUHAMMAD SYAIFUL MAHIALHAKIM', 'syaiful.unnur@gmail.com', NULL, '1d0787d664c95f8c2adb1da311af3c78', NULL, '55201', NULL, NULL, ''),
(444, '55201118031', 'HAGI FAKHRI MUBARAK', NULL, NULL, '8a6fc9f2fe1d7eb5fe95f802c49b6cb7', NULL, '55201', NULL, NULL, ''),
(445, '55201118032', 'DEVANI ALYA SAROFA', NULL, NULL, '28240ff70d723b30787ef2ff19ce294a', NULL, '55201', NULL, NULL, ''),
(446, '55201118033', 'DEISFANSHA RAMDHANI', 'deisfansha8082@gmail.com', NULL, '26d740c4222355a072391b10adc5558d', NULL, '55201', NULL, NULL, ''),
(447, '55201118034', 'DERI SETIA FEBRIANGGI', NULL, NULL, '9fb9ee435a7f173e4189a93fcb499c2d', NULL, '55201', NULL, NULL, ''),
(448, '55201118037', 'VINSENSIUS OKTAVIANUS NOE', NULL, NULL, 'c190b4642314f8fd9fb76740fe750d22', NULL, '55201', NULL, NULL, ''),
(449, '55201118038', 'SUCI SULASTRI', NULL, NULL, '4bdee6d987280eb322b3f3a2e60deb33', NULL, '55201', NULL, NULL, ''),
(450, '55201118042', 'MELI DINAWATI SITUMORANG', NULL, NULL, 'e8c3cdd40b2af8e3ceac2549d38e420c', NULL, '55201', NULL, NULL, ''),
(451, '55201118043', 'MUHAMMAD ALFIKRI NASUTION', NULL, NULL, '48f7f434090f8c952f2747b6863301f1', NULL, '55201', NULL, NULL, ''),
(452, '55201118046', 'DEDE FIRMAN', NULL, NULL, '7d33abaa3c4722ebf4ccf4d8db39d1e5', NULL, '55201', NULL, NULL, ''),
(453, '55201118040', 'Indra Irmansyah', 'spacekzkong24@gmail.com', NULL, 'cdfc0904357c1cda0e1c4f85519776bf', NULL, '55201', NULL, NULL, ''),
(454, '55201120001', 'RAIFVALDHY JOUNIAS LUPPUS MELATISUDRA', 'jouniasluppus@gmail.com', NULL, '1456cd84915b88c2990418fe11f204f4', NULL, '55201', NULL, NULL, ''),
(455, '55201120002', 'MOH RAKA ADI PUTRA', 'mochrakaadiputra@gmail.com', NULL, '73dae9900bcd7e936fc57bc4959e4a74', NULL, '55201', NULL, NULL, ''),
(456, '55201120004', 'RIFQI AHMAD FAJARI', 'rifqiahmad573@gmail.com', NULL, '5b230798401e424c15a343514457890f', NULL, '55201', NULL, NULL, ''),
(457, '55201120005', 'ADITYA NUGRAHA ARDIANSYAH', NULL, NULL, '2cb8f3d755421a179723e7cc8d42a511', NULL, '55201', NULL, NULL, ''),
(458, '55201120008', 'NATHANAEL CHRISTIADI DAVITAMA', NULL, NULL, 'c475e89ccc55e9ab460a0eeb9e429aef', NULL, '55201', NULL, NULL, ''),
(459, '55201120012', 'CHAIRUL WIRAHMAN', NULL, NULL, '1cd4f23cf9af3c2c0ae3e50e078f072c', NULL, '55201', NULL, NULL, ''),
(460, '55201120014', 'KRISMAYANTI', NULL, NULL, 'ad32a411171926a1401b57289b1bd701', NULL, '55201', NULL, NULL, ''),
(461, '55201120015', 'RANDY HERAWAN', NULL, NULL, 'b993b522ee6714161d16a288e29b9013', NULL, '55201', NULL, NULL, ''),
(462, '55201120016', 'SAYUTI', NULL, NULL, 'a682a2e6aa170bb2f9fc03a94dbdba5c', NULL, '55201', NULL, NULL, ''),
(463, '55201120017', 'KEMAL ERLANDA KEIBAR', NULL, NULL, 'e427f3dd8f86d96d4e74245393b39c6b', NULL, '55201', NULL, NULL, ''),
(464, '55201120018', 'NUZLA HAYATIAJI', NULL, NULL, '9220292f6d74d68914968790c501600a', NULL, '55201', NULL, NULL, ''),
(465, '55201120020', 'RULLY DWINANDA FAISHAL', NULL, NULL, '7cebda8bd807b00cb3f4a29fa2b3b255', NULL, '55201', NULL, NULL, ''),
(466, '55201120021', 'RENA IMANINA ILMIAH', NULL, NULL, '9755559751f363a5a4d1e1a4bda2f178', NULL, '55201', NULL, NULL, ''),
(467, '55201120023', 'IEZAM KAMALUL BASYAR', NULL, NULL, 'ddf61bb8baf3045109c7a8767860b3a2', NULL, '55201', NULL, NULL, ''),
(468, '55201120024', 'VITO JIHAD ABDILLAH', NULL, NULL, '59fe4bb9625219c7a9cd90f90aa45c71', NULL, '55201', NULL, NULL, ''),
(469, '55201220025', 'MUHAMMAD RAKASIWI MAKKAH', NULL, NULL, 'a3a75c7926aa9604d26421b0c27953f5', NULL, '55201', NULL, NULL, ''),
(470, '55201119002', 'SUPARTI', NULL, NULL, '36b464c4caa1681fa07c5827a7e08275', NULL, '55201', NULL, NULL, ''),
(471, '55201119004', 'MESA MUSTIKA', 'mesamustika05@gmail.com', NULL, '1a6977f6be30df0efef4b863fc66e9ef', NULL, '55201', NULL, NULL, ''),
(472, '55201119006', 'ADITIA GUSTI ANANDA', NULL, NULL, '6bbbf85ade9b013e568b57b47dc4f446', NULL, '55201', NULL, NULL, ''),
(473, '55201119007', 'WILSON ILHAMDI YUSUFA FRIMA', 'algapurinawa60@gmail.com', NULL, 'e70e91ac83c05af669ad795199b009a5', NULL, '55201', NULL, NULL, ''),
(474, '55201219008', 'STEPHEN HARDIKNAS MATHEUS', 'stephenmatheus02@gmail.com', NULL, '3612396fa14f75b624c579f590450a6e', NULL, '55201', NULL, NULL, ''),
(475, '55201119010', 'INDRI PERMANA PUTRI', NULL, NULL, 'a215e064835c12a63a5c95762e3f1b6d', NULL, '55201', NULL, NULL, ''),
(476, '55201119011', 'MUHAMMAD FURQAN', 'furqanmuhammad987@gmail.com', NULL, '02438bc1f950566964cc47e67ea7ecda', NULL, '55201', NULL, NULL, ''),
(477, '55201119012', 'RIZAL SETIAWAN', 'rizalsetiawan2001@gmail.com', NULL, '2fc8f8600d3462088417e488f03ff937', NULL, '55201', NULL, NULL, ''),
(478, '55201119013', 'JAKA SAEPUL ROCHMAT', NULL, NULL, '90ca9cd7b65609c4570fe45b411fd708', NULL, '55201', NULL, NULL, ''),
(479, '55201119014', 'H YOSUA HILAPOK', NULL, NULL, '8bf2c008e2470920ce498ddbf4a82d33', NULL, '55201', NULL, NULL, ''),
(480, '55201119015', 'RAYHAN AGRADYUTA PUTRA FATRIA', NULL, NULL, 'd060e9a3cffdf80d6e1947a87648d84f', NULL, '55201', NULL, NULL, ''),
(481, '55201119017', 'CITRA DEWI', 'dcitra912@gmail.com', NULL, '73f7a07d3855e936254b09fea60e26a1', NULL, '55201', NULL, NULL, ''),
(482, '55201119021', 'AHMAD ISMAIL', NULL, NULL, '7f33f24f66406c78cc891d4b4638eb50', NULL, '55201', NULL, NULL, ''),
(483, '55201119022', 'RENI RAHAYU', NULL, NULL, 'cb0be00248756617a1800c2ac4a9e195', NULL, '55201', NULL, NULL, ''),
(484, '55201119023', 'TIARA LARASITA', 'Larasitat1801@gmail.com', NULL, '237959d229c611fa3278e001822ed801', NULL, '55201', NULL, NULL, ''),
(485, '55201119024', 'SOFYAN IBNU ABDILAH', NULL, NULL, 'e073173c4b61a3f01b84c4d1a9f23c1a', NULL, '55201', NULL, NULL, ''),
(486, '55201119025', 'ENDAR KUSNANDAR', NULL, NULL, '315eb115d98fcbad39ffc5edebd669c9', NULL, '55201', NULL, NULL, ''),
(487, '55201119026', 'ACHMAD FERDIANSYAH YOGO PRATAMA', 'Pratamaferdi984@gmail.com', NULL, 'c4b235c57781098df22d50297c5548e4', NULL, '55201', NULL, NULL, ''),
(488, '55201119029', 'Rendi Kurniawan', 'rendi2701@gmail.com', NULL, '217e6b3109df24cbe32fdc81c1587696', NULL, '55201', NULL, NULL, ''),
(489, '55201119035', 'ANDI RAHMAD ALIF YUDA', NULL, NULL, '7e2c990e041e8666f103d42475edde4b', NULL, '55201', NULL, NULL, ''),
(490, '55201119036', 'MUHAMMAD RIZKY ADAM SYAHPUTRA', NULL, NULL, '96e590c135ec3815b46dece1950f174d', NULL, '55201', NULL, NULL, ''),
(491, '55201119037', 'JUARIAH FEBRIANTI', 'juafebrianti@gmail.com', NULL, 'bedfd925d00aeba2af079f7b1bf7327b', NULL, '55201', NULL, NULL, ''),
(492, '55201119038', 'IMAM RIJALUL HAKIM', NULL, NULL, 'cfd8e038283419cfbed2e9c78de9a24a', NULL, '55201', NULL, NULL, ''),
(493, '55201119039', 'ELLA ROSTIANA', 'ellar2106@gmail.com', NULL, '64ebc99ad780bcb2ef4e1a63ea322c85', NULL, '55201', NULL, NULL, ''),
(494, '55201119040', 'NADILA FEBRIANI', NULL, NULL, '25533934fc303fffce2e10d92a5a027a', NULL, '55201', NULL, NULL, ''),
(495, '55201119041', 'MUHAMMAD NUR RIZKY PERDANA', NULL, NULL, 'de47008350494746616409c5ec9e889e', NULL, '55201', NULL, NULL, ''),
(496, '55201119042', 'DHANY SYABANA', 'dhany.syabana14@gmail.com', NULL, '587391d36ede2c9509a101e846feff5e', NULL, '55201', NULL, NULL, ''),
(497, '55201119043', 'DADAT TEJO KRISDANTO', NULL, NULL, 'e7ba03c6298c775932329943b1dca7ff', NULL, '55201', NULL, NULL, ''),
(498, '55201119047', 'GADING SUNARYO', 'gading971@gmail.com', NULL, '9bf8832246e18c9ba37a63016845233c', NULL, '55201', NULL, NULL, ''),
(499, '55201119050', 'FARHAN RACHMAT SYAHRIZAL', 'farhan.rachmat09@gmail.com', NULL, '1cad614c75923448cd43161601ed2616', NULL, '55201', NULL, NULL, ''),
(500, '55201119051', 'AHMAD NUR FAUZAN', 'Ahmadn.fauzan88@gmail.com', NULL, 'adcb869647ce6792a86f9ef428b2ae9b', NULL, '55201', NULL, NULL, ''),
(501, '55201120026', 'NURULQOLBI MUTMAINNAH', NULL, NULL, '70085c555c7adbfdbc74d6421c727dfd', NULL, '55201', NULL, NULL, ''),
(502, '55201120027', 'MUHAMMAD RIZQIE FAJAR ROHADI', NULL, NULL, '3fe38ef8546ab98e9fa46e65d4401ef3', NULL, '55201', NULL, NULL, ''),
(503, '55201120030', 'RAHMAT SUNJANI', NULL, NULL, '0fe64c4326c8f8a76a5541ef142c9005', NULL, '55201', NULL, NULL, ''),
(504, '55201120031', 'FASHAL KURNIAWAN', 'fashalkurniawan45@gmail.com', NULL, 'c66f2af738f409004b5c9bf709d8a37e', NULL, '55201', NULL, NULL, ''),
(505, '55201120032', 'NOPY YANTI', 'yantinopy5@gmail.com', NULL, '95252718d7be9b4bc6feeddcdca4c336', NULL, '55201', NULL, NULL, ''),
(506, '55201120033', 'RESSA AYU ISTIANI', NULL, NULL, '64942a4dc3ef0e4ec3195663b4ce7ba0', NULL, '55201', NULL, NULL, ''),
(507, '55201120034', 'ADRYAN DZULFIKAR', NULL, NULL, '785412a8e779de705cdc5df3cdda1115', NULL, '55201', NULL, NULL, ''),
(508, '55201120035', 'DAVID ALFAREZKY', NULL, NULL, '203e7f8d6ef9bad5b360f3a78dfa5a64', NULL, '55201', NULL, NULL, ''),
(509, '55201120036', 'ASEP KURNIA', NULL, NULL, '03c8ed09bbc634e3b2e43b2419231d1d', NULL, '55201', NULL, NULL, ''),
(510, '55201120037', 'ANGGA PRASETYA', NULL, NULL, '22e03df9ed670164b0887ee01d1291c9', NULL, '55201', NULL, NULL, ''),
(511, '55201120038', 'RAIHAN AURA FERDIANSYAH', NULL, NULL, '5fc2e2170a66fc8c00c9608e8e1ce902', NULL, '55201', NULL, NULL, ''),
(512, '55201120039', 'RIZKI WAHYUDI', NULL, NULL, 'f2a2964cc250f3ba39175f886feb21b7', NULL, '55201', NULL, NULL, ''),
(513, '55201120040', 'CINTANA SAUMMI AGIRA', NULL, NULL, '1a13b1cdb359a7942873395c44f5e4e5', NULL, '55201', NULL, NULL, ''),
(514, '55201120041', 'PUTRI AVRILIYA ', NULL, NULL, 'd14a16f8615ab614dcaff1d414420bfc', NULL, '55201', NULL, NULL, ''),
(515, '55201120042', 'TIARA ANISA NURHAQIQI', NULL, NULL, '436f3ae06968cdc2122df26cd2ecae9d', NULL, '55201', NULL, NULL, ''),
(516, '55201120043', 'ALSHA GUMILAR', NULL, NULL, '4868a70e398c9e9995b3c9ad9ebdd9f9', NULL, '55201', NULL, NULL, ''),
(517, '55201120045', 'BAYU RACHMAD SADEWO', 'bayurachmad31@gmal.com', NULL, 'baa5476ec01c7e0456ca2220a9f8c748', NULL, '55201', NULL, NULL, ''),
(518, '55201120046', 'WAFI AL-QAWI ZAMZAMI', NULL, NULL, 'ea0c0de21222a6bcc28886fdce846948', NULL, '55201', NULL, NULL, ''),
(519, '55201115010', 'ILHAM WIBISANA', 'ninja_ilham@rocketmail.com', NULL, '427bb082ca56db804f869e489d496616', NULL, '55201', NULL, NULL, ''),
(520, '55201120048', 'NAUFAL FAZA FADHILAH', NULL, NULL, 'ee55888985710d08ca9d67a89e2637cd', NULL, '55201', NULL, NULL, ''),
(521, '55201120049', 'ROBI NUGRAHA', NULL, NULL, '6f30929c80c775b3219060bb9368ea2a', NULL, '55201', NULL, NULL, ''),
(522, '55201120050', 'IQBAL BAYYINAHBILHAQQI', NULL, NULL, '053083e868b3c15f3cde3af7ec9a0cf4', NULL, '55201', NULL, NULL, ''),
(523, '55201116002', 'ANISA GUSTAMI PERTIWI', NULL, NULL, '0bd3c19f4fd826fa6f6055cbdd9856d5', NULL, '55201', NULL, NULL, ''),
(524, '55201116003', 'ARDIANSYAH', 'ardiansyahnazril11@gmail.com', NULL, '34e34e6337279c5271bba6a69759d453', NULL, '55201', NULL, NULL, ''),
(525, '55201116004', 'ARIF GINANJAR', 'arif17ginanjar@gmail.com', NULL, '315ca98c7d114ddab20018312f579b2e', NULL, '55201', NULL, NULL, ''),
(526, '55201116005', 'AYU LESTARI ROSWINDA', NULL, NULL, '7f2594bd02e5adee0e00c5376c6528b7', NULL, '55201', NULL, NULL, ''),
(527, '55201116006', 'DAMARA OKTARISNYAH', NULL, NULL, '3b83a8ff036adb2bec9a1ac7660d7c21', NULL, '55201', NULL, NULL, ''),
(528, '55201116007', 'DECIANY KHAIRUNNISA', NULL, NULL, '22ad9ef812345b3e68ad2feb0f6201aa', NULL, '55201', NULL, NULL, ''),
(529, '55201116009', 'ERISA NUHAYANI', NULL, NULL, 'd199577e604117e361d74e1718218ca9', NULL, '55201', NULL, NULL, ''),
(530, '55201116011', 'FAJAR JULIANSYAH EKA PUTRA', NULL, NULL, '031212fa3da3ee7a15deefc3d4e7d425', NULL, '55201', NULL, NULL, ''),
(531, '55201116013', 'HERU NUGRAHA', NULL, NULL, '1ade82708dce42dfad6e7c1897a76cf7', NULL, '55201', NULL, NULL, ''),
(532, '55201116015', 'INDRA PRATAMA SETIAWAN', NULL, NULL, '8a807cd66b80ed239e0bd02b3178a8c4', NULL, '55201', NULL, NULL, ''),
(533, '55201116017', 'MOH. AMIR FAIZAL', NULL, NULL, 'd778f0ec6748eef6916cd93495c50b5a', NULL, '55201', NULL, NULL, ''),
(534, '55201116018', 'MUHAMMAD BAYU SATRIA', 'Shortbyu98@gmail.com', NULL, '63f5d6eff7e4ec1f4a91da773ec4f015', NULL, '55201', NULL, NULL, ''),
(535, '55201116021', 'NOVI CINDY ANDIANI', NULL, NULL, 'b34a4b74ba507877547cda323a070706', NULL, '55201', NULL, NULL, ''),
(536, '55201116023', 'RIVAN ERLANGGA KODONG', NULL, NULL, 'b180f1a0e425969222e47ff662118839', NULL, '55201', NULL, NULL, ''),
(537, '55201116024', 'TIA SITI MAULIDDA LESTARI', NULL, NULL, 'e9c219daa045fde04d2d57edb8b6f4d4', NULL, '55201', NULL, NULL, ''),
(538, '55201217048', 'WELLY HEGAR BUDIYANTO', NULL, NULL, 'f7e098c0dcd5ff35531024bda08711f7', NULL, '55201', NULL, NULL, ''),
(539, '55201217018', 'M ZAKIYYAN ANWAR DINAN', NULL, NULL, 'deba362d7e70d3c9a6d7cb29473a55ad', NULL, '55201', NULL, NULL, ''),
(540, '55201117052', 'BAYU KRISNA PATI', NULL, NULL, '8f83509f37c242b6f1e1f6747529cd51', NULL, '55201', NULL, NULL, ''),
(541, '55201117044', 'ALDE FITRI YULDEMAR', NULL, NULL, '4df8bb58cb8b1601f7784feb9ea1aaf7', NULL, '55201', NULL, NULL, ''),
(542, '55201117041', 'RIZAL MUHAEMIN', NULL, NULL, 'f1a1e2146ad7641833781a6d9b013848', NULL, '55201', NULL, NULL, ''),
(543, '55201117039', 'MELKY SAPUTRA SIANTURI', 'syahputrasianturi@gmail.com', NULL, 'aba50a986b72c3920fbd47fe86c845d0', NULL, '55201', NULL, NULL, ''),
(544, '55201117037', 'TRIEPADI ASPRI INDRAYUANA', NULL, NULL, '2bccef79455709eef32f5dfc8e81e7a9', NULL, '55201', NULL, NULL, ''),
(545, '55201117036', 'MOH ARIEF ASYADHI', NULL, NULL, '11420e697d3c372cdc20ace58da90d95', NULL, '55201', NULL, NULL, ''),
(546, '55201117035', 'YANA MULYANA', 'yanamul955@gmail.com', NULL, 'fe2f5ab482ed108fa6d554d612541b0a', NULL, '55201', NULL, NULL, ''),
(547, '55201117033', 'WIDA NURAENI', NULL, NULL, '59f116b6064c1615e6f2e8f14bb2ab4a', NULL, '55201', NULL, NULL, ''),
(548, '55201117032', 'ROBBI DEDIANSAH', NULL, NULL, '39610cf7d06d4873cb8e8f9e7307a18c', NULL, '55201', NULL, NULL, ''),
(549, '55201117030', 'MUHAMMAD ALI RAMDAN', 'muhammadali.ramdan96@gmail.com', NULL, 'f0b845bcb382b27b11aa08457eecb365', NULL, '55201', NULL, NULL, ''),
(550, '55201117029', 'GISA SETIA BAKTI', NULL, NULL, '7f3e2ea8533725ecbca748fc56210689', NULL, '55201', NULL, NULL, ''),
(551, '55201117028', 'HILMAN FIRDAUS', 'hilmanfirdaus48@gmail.com', NULL, '9b97f58ebe5aeff77c3d13993c44ceed', NULL, '55201', NULL, NULL, ''),
(552, '55201117027', 'RD. FADHIL CANDRA KURNIA', NULL, NULL, 'b568bcdefd1b6a5f896193253aac175e', NULL, '55201', NULL, NULL, ''),
(553, '55201117026', 'IVAN JANUAR PRATAMA', 'ivanjanuarpratama.if17@student.unnur.ac.id', NULL, '31cb2b278a4fa1e9fd86d8bcc751cf36', NULL, '55201', NULL, NULL, ''),
(554, '55201117024', 'KHOERUNISA ', NULL, NULL, '04ff74b73505d69534e3d51dea8acf1f', NULL, '55201', NULL, NULL, ''),
(555, '55201117017', 'LYGIA DETHEA ROSSLA DANDEL', NULL, NULL, '2e5b05389134061a22485cccacc6509d', NULL, '55201', NULL, NULL, ''),
(556, '55201117016', 'PANJI EKA PRASETYO', 'panjieka8@gmail.com', NULL, '246c52afa9871fbb5dba8ed8206c8950', NULL, '55201', NULL, NULL, ''),
(557, '55201117015', 'NABILA GUSTINE MAHARANI', NULL, NULL, '59fdcbe2ce5804cd54e537a0f28a44a4', NULL, '55201', NULL, NULL, ''),
(558, '55201117012', 'DIAN ANDRIYANI', NULL, NULL, 'aefc5bc9d4b7a6f1250739db60d87d02', NULL, '55201', NULL, NULL, ''),
(559, '55201117011', 'ANDREW BAHARI MARTATO', 'andrewbahari9@gmail.com', NULL, 'ed79b777371bcb71adb2db0965ce808f', NULL, '55201', NULL, NULL, ''),
(560, '55201117010', 'RINDU DWI WAHYUNI', NULL, NULL, 'ee2a7f3b433c1cfb9f098e2131456117', NULL, '55201', NULL, NULL, ''),
(561, '55201117006', 'GANDHI VEGARIANTO MANGOPO', NULL, NULL, '09c3fd43fa23c06e52a084aeedd05bd9', NULL, '55201', NULL, NULL, ''),
(562, '55201117005', 'ARISNO KADARISMAN', NULL, NULL, 'd6b539e00f242deee154d34fa211a24a', NULL, '55201', NULL, NULL, ''),
(563, '55201117004', 'MAYA SRI', 'Khartikamaya@gmail.com', NULL, '00fe1bc42546be489642f9f7c480095a', NULL, '55201', NULL, NULL, ''),
(564, '55201117002', 'NIPSON BENU', NULL, NULL, 'ae631970f992cb75e98155a7bab0d914', NULL, '55201', NULL, NULL, ''),
(565, '55201117001', 'ELSA TIARA FEBRINISSA', NULL, NULL, '9b97f58ebe5aeff77c3d13993c44ceed', NULL, '55201', NULL, NULL, ''),
(566, '55201118006', 'IRVAN MAULANA', NULL, NULL, '3388088a6a197f6af0a43755b46ebdcb', NULL, '55201', NULL, NULL, ''),
(567, '55201118007', 'MUHAMMAD FALIQ ALFIAN', NULL, NULL, '3896166430d86493632b0795b49829b6', NULL, '55201', NULL, NULL, ''),
(568, '55201118008', 'Nada Hasna Nazahah', 'nadahasna123@gmail.com', NULL, '712ea9b08c07ef4a56b111edfb983fa3', NULL, '55201', NULL, NULL, ''),
(569, '55201118009', 'SUCI APRILLIANI', NULL, NULL, '1ef10092f4638d164383a9b6c5e55da4', NULL, '55201', NULL, NULL, ''),
(570, '55201118010', 'ARDIAN NURHAKIM', NULL, NULL, 'c67e1e4c45514e721a68c96973fcff96', NULL, '55201', NULL, NULL, ''),
(571, '55201118011', 'ALKUIN RAJAGUKGUK', NULL, NULL, 'f4d8e1873448afe4d2bbd286f2b7f267', NULL, '55201', NULL, NULL, ''),
(572, '55201118013', 'SITI HARDIYANTI', NULL, NULL, '7e910dbbc7af6ec5498c4cab0c6e8ffc', NULL, '55201', NULL, NULL, ''),
(573, '55201118014', 'ALDI RENALDHI', NULL, NULL, 'ee655b1f5b5ecddfb200b8b93c37c455', NULL, '55201', NULL, NULL, ''),
(574, '55201118015', 'ORIZA MAHENDRA ATMAJANITI', 'oriza.mahendra@gmail.com', NULL, '3ed8a08b281e77e2d9fc8d8fa53694a5', NULL, '55201', NULL, NULL, ''),
(575, '55201118016', 'ANEU OKTAVIANI PURNAMA', NULL, NULL, '05cdb538c5fa0d0318cc788123d4d68a', NULL, '55201', NULL, NULL, ''),
(576, '55201118017', 'RISMA RIYANTI', NULL, NULL, '1a30cf9197697a979323be044e9a5e15', NULL, '55201', NULL, NULL, ''),
(577, '55201118018', 'BAGUS SUBRATA', NULL, NULL, '15671e4cf9d7ed23ba0b8c9f8bae3f47', NULL, '55201', NULL, NULL, ''),
(578, '55201118019', 'DWI INDAH PUTRI ANINGRUM', NULL, NULL, '7992cf8f47386668e05b014184f8bc23', NULL, '55201', NULL, NULL, ''),
(579, '55201118020', 'ASEP TARYAT', NULL, NULL, '908ab610d609f378bbf9c4d5e8a20cc2', NULL, '55201', NULL, NULL, ''),
(580, '55201118021', 'WILDAN PURNOMO', NULL, NULL, '20b75ca6bce63ae54e119496b3eebcd7', NULL, '55201', NULL, NULL, ''),
(581, '55201118025', 'YUDI PERMANA SAPUTRA', NULL, NULL, '147db326a19de0a50913eead6e2bc757', NULL, '55201', NULL, NULL, ''),
(582, '55201118027', 'KIKI EKO RIYANTO', '4darkside.ker@gmail.com', NULL, '430731eab730f4b6bb89a93e27e4c83c', NULL, '55201', NULL, NULL, ''),
(583, '55201118029', 'ZOPPA CHRISTOPPA M MAHDE', NULL, NULL, '36409cba7dcb3a86f8040cc04eba7e17', NULL, '55201', NULL, NULL, ''),
(584, '55201118030', 'RHENALDY', NULL, NULL, '064392bb26aaac4865998fce4da02081', NULL, '55201', NULL, NULL, ''),
(585, '55201118035', 'POSMA MULIA SURANTA', NULL, NULL, '3d8d5ea945c071c7b8d7fd93aa1857d8', NULL, '55201', NULL, NULL, ''),
(586, '55201118036', 'RISTA NUR SEPTRIANY', NULL, NULL, '13a94197a019e6f2b1202f43002b62cd', NULL, '55201', NULL, NULL, ''),
(587, '55201118039', 'GILANG RESI MULYA', NULL, NULL, '0cc0cd82ec9c24b2240dcc303c4b7d30', NULL, '55201', NULL, NULL, ''),
(588, '55201118041', 'TB. FATHUL MAULUDIN', NULL, NULL, '1e5b517893d5305effc152dd3230d49c', NULL, '55201', NULL, NULL, ''),
(589, '55201118044', 'RIZA ABURIZAL FAUZI', NULL, NULL, '90fcb6aee2cbbb8ae7b92db82a3c1cd9', NULL, '55201', NULL, NULL, ''),
(590, '55201118045', 'SAMUEL PARASIAN MANALU', NULL, NULL, '16f4043d55bf42214e1a51093745bc24', NULL, '55201', NULL, NULL, ''),
(591, '55201118047', 'ADE IRWAN SAPUTRA', 'irwan.super@gmail.com', NULL, '1816fbd5bed6f71133932df85fb3587d', NULL, '55201', NULL, NULL, ''),
(592, '55201118048', 'BAMBANG ARIANTO', NULL, NULL, '40577082d6bd9e51b1b4c35e6ef4b3a6', NULL, '55201', NULL, NULL, ''),
(593, '55201118049', 'BAGUS TRI HARDIANTO SETIAWAN', NULL, NULL, 'e3caba1630bdc8b518556002fe329b25', NULL, '55201', NULL, NULL, ''),
(594, '55201118050', 'RESHA PRADANA', NULL, NULL, '66140d0493a846236fe52b100cfca3af', NULL, '55201', NULL, NULL, ''),
(595, '55201218004', 'HAPPRILA YULIANA JAYANTI', NULL, NULL, 'c7125c873606a2a48fb995e18540d03d', NULL, '55201', NULL, NULL, ''),
(596, '55201118055', 'FITRI INDRIANI', NULL, NULL, 'ff5c5bff576b18fdb9b31fcb266fb747', NULL, '55201', NULL, NULL, ''),
(597, '55201218051', 'TIOFANI ATSILAHASNA LABIBAH', NULL, NULL, 'b0d6b88d0b925cf048b1501d5e702f34', NULL, '55201', NULL, NULL, ''),
(598, '55201218052', 'ARIS MULYANA', NULL, NULL, '89f8d467ad70bcfc39f96b22569420fa', NULL, '55201', NULL, NULL, ''),
(599, '55201218053', 'REINHART MAROUNDUN SIHOTANG', 'reinhart.if18@student.unnur.ac.id', NULL, '5ffac0a58a5171f048a1d34a7cfaace9', NULL, '55201', NULL, NULL, ''),
(600, '55201218054', 'ALY DZULFIKAR', NULL, NULL, '46f44f07e26365e9519e7493c43f294d', NULL, '55201', NULL, NULL, ''),
(601, '55201120003', 'FAJAR NUR SIDIK', NULL, NULL, 'a8fbbaab34413b299df05f9434b605ff', NULL, '55201', NULL, NULL, ''),
(602, '55201120006', 'KUSUMA SURYA AJI', 'kusumasajii17@gmail.com', NULL, '3aa188f053587fb571ec0692e1957f71', NULL, '55201', NULL, NULL, ''),
(603, '55201120007', 'VIETA OKTAVIANI', 'vietaokt14@gmail.com', NULL, 'fd8b50e027e1f798459b012a7cce9f3b', NULL, '55201', NULL, NULL, ''),
(604, '55201120009', 'NENI NURAENI', 'neinee033@gmail.com', NULL, '70a737af70b94540628eee0a3e8897ae', NULL, '55201', NULL, NULL, ''),
(605, '55201120010', 'RIKI ANDRIYANA', 'rikiandriyana12@gmail.com', NULL, 'a3305cee77540b7f7b26db8228829f2c', NULL, '55201', NULL, NULL, ''),
(606, '55201120011', 'MUHAMMAD ALIF HIDAYAT', NULL, NULL, '03f6404dc3ddf0a34872ea5a25a95435', NULL, '55201', NULL, NULL, ''),
(607, '55201120013', 'ZIAN AZIS TAHAJUDIN', NULL, NULL, '5d948fe56928ac956edb94df8db96f91', NULL, '55201', NULL, NULL, ''),
(608, '55201120019', 'MUHAMAD DIKA', NULL, NULL, 'f85b75ecc51dd3b2fa0f8f6d743b0ad7', NULL, '55201', NULL, NULL, ''),
(609, '55201120022', 'RIZKY SURTANA', NULL, NULL, 'c2b8debfee2f3746aaa9f1a5bd655f86', NULL, '55201', NULL, NULL, ''),
(610, '55201119001', 'RISMA NOVIYANTI', 'rnovy2@gmail.com', NULL, 'e29b346d7139db1b5415edf4cbfe39e8', NULL, '55201', NULL, NULL, ''),
(611, '55201119003', 'MOSES CHRISTIAN ANWAR', 'moseschristian133@gmail.com', NULL, '1ddbe865ffb7ff7bcbc5b76b227ea759', NULL, '55201', NULL, NULL, ''),
(612, '55201219005', 'DAVID SETIA RAJA', 'davidsetiaraja@gmail.com', NULL, '6ef284f28bdd87182371caf183f62304', NULL, '55201', NULL, NULL, ''),
(613, '55201119009', 'FEBI ADRIAN', 'febiadrian665@gmail.com', NULL, 'bf7e51f198665f2c2f4fce8107121e82', NULL, '55201', NULL, NULL, ''),
(614, '55201119016', 'ANTON WIJAYA', 'awijaya140369@gmail.com', NULL, 'e17692d77203da31c46086c1fccfe412', NULL, '55201', NULL, NULL, ''),
(615, '55201119018', 'SRI KUSMAWATI', 'sriikusmawatii03@gmail.com', NULL, '861f93a25451d0aa37acbd7009541434', NULL, '55201', NULL, NULL, ''),
(616, '55201219019', 'BAGUS NUGRAHA', NULL, NULL, 'cf758c3a5a60b7b91c4e0341ac9659cc', NULL, '55201', NULL, NULL, ''),
(617, '55201119020', 'FEBRIAN ARI SANDI', NULL, NULL, '92a18d1352309a1d803d879f951699db', NULL, '55201', NULL, NULL, ''),
(618, '55201119027', 'CLAUDIUS ANANDA NATANAEL', 'Claudius.ananda29@gmail.com', NULL, 'e838602157490c6f8a35e561ab6969cc', NULL, '55201', NULL, NULL, ''),
(619, '55201219028', 'OKTA FIBRIANTO', 'oktafibrianto777@gmail.com', NULL, '43924cea1572caec9401662067e6a0b8', NULL, '55201', NULL, NULL, ''),
(620, '55201119030', 'REYNALDO CAESAR SAKTI', NULL, NULL, '4a866a079a017055dca651a9615516ef', NULL, '55201', NULL, NULL, ''),
(621, '55201119031', 'ZEFFJOAN GERAL SUHENDAR', NULL, NULL, '8448ff3f595519aeb5353010dcad4dc3', NULL, '55201', NULL, NULL, ''),
(622, '55201119032', 'FREDDY MARNASIP MANURUNG', NULL, NULL, '21483c853a25d6670bbff7616d4bd0a8', NULL, '55201', NULL, NULL, ''),
(623, '55201119033', 'ADRIANUS HIA', NULL, NULL, '40fc89e0382fc82c58ddedd12da40771', NULL, '55201', NULL, NULL, ''),
(624, '55201119034', 'YANDI FAOZAN AL ANSHORI', 'yandi.if19@student.unnur.ac.id', NULL, 'c39408c95b162cd4b3bbcb1879c72c39', NULL, '55201', NULL, NULL, ''),
(625, '55201119044', 'NORA HIKMA HALAWA', NULL, NULL, 'f3d64e00659cd4abe47c4d4d816962eb', NULL, '55201', NULL, NULL, ''),
(626, '55201119045', 'AYANG SAFITRI HANDAYANTI', 'ayangfitrianti09@gmail.com', NULL, 'bb2b48068ddc1ce65b42377a54faa91d', NULL, '55201', NULL, NULL, ''),
(627, '55201119046', 'REYNALDO FAJRUL HERMANAN', 'reynaldofajrul15@gmail.com', NULL, 'dc658dfee088c2fbc538c29ffcf4aa9c', NULL, '55201', NULL, NULL, ''),
(628, '55201119048', 'MELKY', 'melkyreqi@gmail.com', NULL, '98b468ac64e5bfbe7adb436405d3670f', NULL, '55201', NULL, NULL, ''),
(629, '55201219049', 'FICKY MUHAMMAD PAHLEEFI', 'Fickympahlefi@gmail.com', NULL, '224f157b06efbf9b6897127c55f40b35', NULL, '55201', NULL, NULL, ''),
(630, '55201120028', 'IMAN KASIH NAZARA', NULL, NULL, '5d47599000b9ded98643e9e51800ff19', NULL, '55201', NULL, NULL, ''),
(631, '55201120029', 'ROBI DWI CAHYA', NULL, NULL, 'c93bf283e62fd1c65724ccd82ffe2d5a', NULL, '55201', NULL, NULL, ''),
(632, '55201120044', 'RYAN RINALDI', 'ryansyarif14@gmail.com', NULL, '3b4ab9c1ceae004e365622fd971c797c', NULL, '55201', NULL, NULL, ''),
(633, '55201120047', 'TEUKU RIDWAN ILHAM RAMADHAN', NULL, NULL, 'bcee38e55fe917769b42c6d302326257', NULL, '55201', NULL, NULL, ''),
(634, '55201120051', 'INGGIT ARI WIBOWO', NULL, NULL, 'c5d8ef37d8ddb155f1b6787154eadf36', NULL, '55201', NULL, NULL, ''),
(635, '12345678910', 'Nopi Ramsari', 'nopiramsari@unnur.ac.id', NULL, '698d51a19d8a121ce581499d7b701668', NULL, '55201', NULL, NULL, ''),
(636, '8856950017', 'Ekasari Nugrahaeni', NULL, NULL, '09bfad558b97e4b415444d632d1a6e65', NULL, '55201', NULL, NULL, ''),
(637, '0404016403', 'HERNAWATI', NULL, NULL, '6fb42da0e32e07b61c9f0251fe627a9c', NULL, '55201', NULL, NULL, ''),
(638, '8879670018', 'ANA HERYANA', NULL, NULL, '6fb42da0e32e07b61c9f0251fe627a9c', NULL, '55201', NULL, NULL, ''),
(639, '0422037002', 'Zen Munawar, M.Kom', NULL, NULL, '959f0ad4a688cdf97b65dbd0a654896f', NULL, '55201', NULL, NULL, ''),
(640, '141025001', 'Gunawan Wibisono, S.T., M.Sc', NULL, NULL, '42b4f00ff1b35e5f21891aa73b68ffb0', NULL, '55201', NULL, NULL, ''),
(641, '141025004', 'Immanuel, S.T., M.T', NULL, NULL, 'bfe3f35b9efd15a3a82ce1a9d1fb4257', NULL, '55201', NULL, NULL, ''),
(642, '141025008', 'Carolina Kristianawuri, S.s., M.pd', 'Carolina.ririen@gmail.com', NULL, '765293ef4218a67dc8c2d6cb829c22cd', NULL, '55201', NULL, NULL, ''),
(643, '141025005', 'Teddy Hidayat, S.Si., M.T', 'teddyunnur@gmail.com', NULL, '3588d32d28d07bffbe0fddf87d9a1f9c', NULL, '55201', NULL, NULL, ''),
(644, '141025012', 'Deden Much. Darmadi, M.Pd.', 'dedenmuchdarmadi@gmail.com', NULL, '36e72d9ee0d437739113d21c2eafa5ed', NULL, '55201', NULL, NULL, ''),
(645, '141025006', 'Ikra Novar Rizqi, S.Kom., M.T', NULL, NULL, 'bf34f7bad1956016ba350f542c783907', NULL, '55201', NULL, NULL, ''),
(646, '0407087402', 'Wieky Rusmanto, M.Si', NULL, NULL, 'a3a285f162aabad6bd7370e826a0610e', NULL, '55201', NULL, NULL, ''),
(647, '0413056812', 'Bambang Tjahyo Utomo, S.T., M.T', NULL, NULL, '7573146613cb021d869d4a3b8223ce7c', NULL, '55201', NULL, NULL, ''),
(648, '0425076101', 'Toto Heriyanto, M.Si', NULL, NULL, 'e4ec8cda43dbc8fddba0710c446f2fa2', NULL, '55201', NULL, NULL, ''),
(649, '141025007', 'Edah Jubaedah, M.Si', NULL, NULL, '016137cb9218bead17e47c54ef6851be', NULL, '55201', NULL, NULL, ''),
(650, '141025013', 'YUNUS SUPRIADI WIJAYA, S.Kom., M.T', NULL, NULL, 'f1e96738d416f3d1304637639deb680a', NULL, '55201', NULL, NULL, ''),
(651, '201552010001', 'Ahmad Sodikin', 'ahmad@gmail.com', NULL, '5fababe5b9d2fbd5ec35cca725816810', NULL, '55201', NULL, NULL, 'calon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jawab_essay`
--
ALTER TABLE `tbl_jawab_essay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jawab_pg`
--
ALTER TABLE `tbl_jawab_pg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori_soal`
--
ALTER TABLE `tbl_kategori_soal`
  ADD PRIMARY KEY (`id_kategori_soal`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_paket_soal`
--
ALTER TABLE `tbl_paket_soal`
  ADD PRIMARY KEY (`id_paket_soal`);

--
-- Indexes for table `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role_soal`
--
ALTER TABLE `tbl_role_soal`
  ADD PRIMARY KEY (`id_role_soal`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tbl_soal_essay`
--
ALTER TABLE `tbl_soal_essay`
  ADD PRIMARY KEY (`id_soal_essay`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- AUTO_INCREMENT for table `tbl_jawab_essay`
--
ALTER TABLE `tbl_jawab_essay`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_jawab_pg`
--
ALTER TABLE `tbl_jawab_pg`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role_soal`
--
ALTER TABLE `tbl_role_soal`
  MODIFY `id_role_soal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_soal_essay`
--
ALTER TABLE `tbl_soal_essay`
  MODIFY `id_soal_essay` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
