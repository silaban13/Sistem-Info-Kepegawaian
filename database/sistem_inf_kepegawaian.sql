-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306:8111
-- Waktu pembuatan: 04 Agu 2026 pada 09.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_inf_kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status` enum('Hadir','Izin','Sakit','Alpha') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `alasan` text DEFAULT NULL,
  `status` enum('Pending','Disetujui','Ditolak','Dibatalkan') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Operasional', 'Memastikan operasional dan alur kerja sehari-hari berjalan lancar.', '2026-07-05 02:16:38', '2026-07-22 04:59:32'),
(2, 'Information Technology (IT)', 'Menjaga stabilitas sistem jaringan, mengembangkan aplikasi, dan memastikan keamanan data perusahaan.', '2026-07-08 03:55:26', '2026-07-22 04:59:04'),
(4, 'Sales', 'Berfokus langsung pada penjualan produk atau layanan kepada klien untuk mencapai target pendapatan.', '2026-07-19 02:57:59', '2026-07-22 04:58:32'),
(5, 'Marketing, Branding & Public Relations (PR)', 'Merancang strategi promosi, kampanye produk, dan menjaga reputasi perusahaan di mata publik.', '2026-07-21 07:32:11', '2026-07-22 04:57:50'),
(6, 'Finance & Accounting', 'Mengelola arus kas, pelaporan pajak, audit, dan penyusunan anggaran perusahaan.', '2026-07-21 07:35:55', '2026-07-22 04:56:58'),
(7, 'Legal & Compliance', 'Memastikan setiap kegiatan perusahaan mematuhi regulasi dan hukum yang berlaku.', '2026-07-22 05:07:09', '2026-07-22 05:07:09'),
(8, 'Research & Development (R&D)', 'Berinovasi menciptakan produk baru atau meningkatkan kualitas produk lama.', '2026-07-22 05:07:44', '2026-07-22 05:07:44'),
(10, 'Human Resources Department (HRD)', 'yang bertugas mengelola seluruh aspek terkait sumber daya manusia atau karyawan di dalam perusahaan.', '2026-08-02 14:00:51', '2026-08-02 14:00:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `gaji_pokok` decimal(12,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `gaji_pokok`, `created_at`, `updated_at`) VALUES
(6, 'Frontend Developer', 2000000.00, '2026-07-21 07:06:51', '2026-07-22 05:38:05'),
(9, 'Marketing Staff', 5000000.00, '2026-07-21 07:36:35', '2026-07-21 07:36:35'),
(10, 'Backend Developer', 5000000.00, '2026-08-02 13:43:28', '2026-08-02 13:43:28'),
(11, 'UI/UX Designer', 5000000.00, '2026-08-02 13:49:20', '2026-08-02 13:49:20'),
(12, 'HR Staff', 4300000.00, '2026-08-02 14:09:01', '2026-08-02 14:09:01'),
(13, 'Finance Staff', 6100000.00, '2026-08-02 14:17:37', '2026-08-02 14:17:37'),
(14, 'QA Engineer', 6000000.00, '2026-08-03 03:23:16', '2026-08-03 03:23:16'),
(15, 'Network Engineer', 10000000.00, '2026-08-03 03:27:31', '2026-08-03 03:27:31'),
(16, 'Customer Service', 3000000.00, '2026-08-03 03:33:38', '2026-08-03 03:33:38'),
(17, 'System Analyst', 4000000.00, '2026-08-03 03:39:15', '2026-08-03 03:39:15'),
(18, 'Mobile Developer', 6000000.00, '2026-08-03 07:59:25', '2026-08-03 07:59:25'),
(19, 'Accountant', 5000000.00, '2026-08-04 04:33:57', '2026-08-04 04:33:57'),
(20, 'DevOps Engineer', 6000000.00, '2026-08-04 05:36:27', '2026-08-04 05:36:27'),
(21, 'Data Analyst', 5000000.00, '2026-08-04 05:40:25', '2026-08-04 05:40:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `status` enum('belum','dibaca') DEFAULT 'belum',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `judul`, `isi`, `status`, `created_at`) VALUES
(24, 'Pegawai Baru', 'Pegawai Andi Saputra  berhasil ditambahkan.', 'belum', '2026-08-04 07:03:04'),
(25, 'Pegawai Baru', 'Pegawai Budi Santoso berhasil ditambahkan.', 'belum', '2026-08-04 07:12:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `jenis_kelamin`, `alamat`, `email`, `no_hp`, `foto`, `status`, `id_divisi`, `id_jabatan`, `id_user`, `created_at`, `updated_at`) VALUES
(63, 'Andi Saputra ', 'L', 'Jl. Melati No. 12, Medan Sunggal, Kota Medan, Sumatera Utara\r\n', 'andi.saputra@gmail.com', '0812345678012', 'd4ae7c4b79839236d248d908376a5890.jpg', 'Aktif', 2, 6, 14, '2026-08-04 07:03:04', '2026-08-04 07:03:04'),
(64, 'Budi Santoso', 'L', 'Jl. Kenanga No. 45, Medan Helvetia, Kota Medan, Sumatera Utara\r\n', 'budi.santoso@gmail.com', '081234567802', '80b68d421ffa7b6ac0993c7c04d66443.jpg', 'Aktif', 2, 10, 15, '2026-08-04 07:12:57', '2026-08-04 07:12:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pegawai') NOT NULL DEFAULT 'pegawai',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`, `remember_token`) VALUES
(8, 'siti.rahmawati', '$2y$10$BID1NBZj1mM4xxdP1VS/H.DAFIA.DCTo5ZXvi9rUKMNdTah4rpe.K', 'admin', '2026-07-21 07:44:16', '2026-08-02 10:45:35', NULL),
(14, 'Andi Saputra', '$2y$10$xsbPmgSpBAThuXX.f.rYVesyWJUgTfmjUR2Q6GZWiRJVl55vUqbYG', 'pegawai', '2026-08-01 13:53:35', '2026-08-01 13:53:35', NULL),
(15, 'Budi Santoso', '$2y$10$vSlfOfzNiMBwSOFqxFjIjeFawwQpXsOdyCAutaWjaMZMkQK6GvadG', 'pegawai', '2026-08-01 13:54:12', '2026-08-01 13:54:12', NULL),
(16, 'Citra Lestari', '$2y$10$cQX0c3KE9Fjjoari6f05n.dgD8eg4joP3L.VopGUoq.MPQJLQODHy', 'pegawai', '2026-08-01 13:54:43', '2026-08-01 13:54:43', NULL),
(17, 'Dedi Pratama', '$2y$10$W791Ok6aUrZv0K8FLDlaYOwNYrIdmKlYcJ/ZJEF3Tu/xu38hc0e5i', 'pegawai', '2026-08-01 13:55:15', '2026-08-01 13:55:15', NULL),
(18, 'Eka Putri', '$2y$10$EAPCePVx1E3EW9DLX6BozO8IouHSda1xMFNgj17gjj0NS1nY2vVoy', 'pegawai', '2026-08-01 13:55:48', '2026-08-01 13:55:48', NULL),
(19, 'Fajar Nugroho ', '$2y$10$1OflZPL1BLsOLVCR1JUNH.gwtxo5Ec7bCIReqAXYiTETWchi9LkRC', 'pegawai', '2026-08-01 13:56:23', '2026-08-01 13:56:23', NULL),
(20, 'Gina Amelia', '$2y$10$s0FpLzDED19koVC7iE6nnusqWgN8OniUfjXCe5G.m/LuswVR5836.', 'pegawai', '2026-08-01 13:56:58', '2026-08-01 13:56:58', NULL),
(21, 'Hendra Wijaya', '$2y$10$ISO3CEAHioo7YFL.oyJI5.BxsvrpeVWUDhhumJTwWYZOEthcV7n/m', 'pegawai', '2026-08-01 14:47:35', '2026-08-01 14:47:35', NULL),
(22, 'Intan Permata', '$2y$10$Z1Xz51dNX31yqslHCWQ2/uIUVQdTWmZJFG9lXReSgmKBcJcj1X74m', 'pegawai', '2026-08-01 14:49:12', '2026-08-03 04:43:14', NULL),
(23, 'Joko Susilo', '$2y$10$vCyq3zKf./Qcb6r2wy1no.E.5MfJdiaZLl9qEjf4on8enFjPMu6xO', 'pegawai', '2026-08-01 14:49:55', '2026-08-01 14:49:55', NULL),
(24, 'Kevin Saputra ', '$2y$10$yXx82XP3Us7/QZTCCCiiROQ0qaGLojnFf1say6cHfjxlDoZnoCPPa', 'pegawai', '2026-08-01 14:50:34', '2026-08-01 14:50:34', NULL),
(25, 'Lina Marlina', '$2y$10$7U2HqcLJRPiD4NeKnhRZWOSQ78eXq4hrt79o1YSV3yhtqUfUIPvSa', 'pegawai', '2026-08-01 14:51:11', '2026-08-01 14:51:11', NULL),
(26, 'Muhammad Rizky', '$2y$10$KsY90p4KOBH6mj48lCjVUe5VlXkP.X905ZWrBBiFo5EcSyUCBtlYu', 'pegawai', '2026-08-01 14:51:44', '2026-08-01 14:51:44', NULL),
(27, 'Nanda Putri', '$2y$10$oo3XnI0Q109ypOfmPOaljeOkOydodpa78dPIS2VXfS2mm1MzGrdaS', 'pegawai', '2026-08-01 14:52:12', '2026-08-01 14:52:12', NULL),
(28, 'Oki Prasetyo', '$2y$10$qerD/qzKwHWvD0JxmgeWVefMkkbk8srcLIGOB/4nNm3mUTnuHxncK', 'pegawai', '2026-08-01 14:52:42', '2026-08-01 14:52:42', NULL),
(29, 'Putri Ayu', '$2y$10$6hnEek2X0HiU/FZUBssYT.sy2BX.hxEgiovAEWKBV/IJuoGUDSpZK', 'pegawai', '2026-08-01 14:53:14', '2026-08-01 14:53:14', NULL),
(30, 'Rina Amelia', '$2y$10$ZmcZs2L3ibXM1hEdlneHie1oDf7v2sqthBwNPEmC/I.zjtTu6l4Ay', 'pegawai', '2026-08-01 14:53:41', '2026-08-01 14:53:41', NULL),
(31, 'Randy Pangalila', '$2y$10$uMHsliHDGwPjn790gP1UOO1DAy9oKqKEzOiDfR/E2ieHPymXhPXmu', 'pegawai', '2026-08-01 14:54:12', '2026-08-01 14:54:12', NULL),
(32, 'Siti Rahma', '$2y$10$tQQiswA7IrzIMMdCWg4RKuuYMb1z3Qf0MmD5qljQA4nElhtY7CUu6', 'pegawai', '2026-08-01 14:54:45', '2026-08-01 14:54:45', NULL),
(33, 'Yoga Pratama', '$2y$10$T56gAOIky7NeGQDeXbWyEe55sYX3rbsw0NZkQqZgM.reik3/fsbuG', 'pegawai', '2026-08-01 14:55:13', '2026-08-01 14:55:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_absensi_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuti_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `unique_no_hp` (`no_hp`),
  ADD KEY `fk_divisi` (`id_divisi`),
  ADD KEY `fk_jabatan` (`id_jabatan`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `fk_absensi_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `fk_cuti_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
