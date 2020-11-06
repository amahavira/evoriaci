-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 01:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoriaci`
--

-- --------------------------------------------------------

--
-- Table structure for table `inspirasi`
--

CREATE TABLE `inspirasi` (
  `id` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspirasi`
--

INSERT INTO `inspirasi` (`id`, `id_seller`, `nama`, `gambar`, `date_created`) VALUES
(4, 24, 'Lamaran', '11.jpg', 1603425963),
(5, 24, 'Foto Prewed', '3.jpg', 1603425982),
(6, 21, 'Event Musik Kosmik', 'A.png', 1603426090),
(7, 24, 'Fotografi Festival Ikan Cupang', 'betta-fish-rc.jpg', 1603695660);

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` varchar(10000) NOT NULL,
  `syarat` varchar(10000) NOT NULL,
  `diskon` float NOT NULL,
  `rating` float NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id`, `nama`, `harga`, `gambar`, `lokasi`, `deskripsi`, `syarat`, `diskon`, `rating`, `id_kategori`, `id_seller`, `date_created`) VALUES
(168, 'Paket Musik A', 20000000, 'music12.jpg', 'Yogyakarta', 'asdsaasda', 'assadasasdsda', 0, 0, 2, 24, 1601263891),
(172, 'Paket Musik', 10000000, 'music11.jpg', 'Yogyakarta', '', '', 0, 0, 2, 21, 1601550114),
(173, 'Paket Pernikahan', 20000000, 'wedding1.jpg', 'Yogyakarta', 'Gown type:\r\n- 1 Diamond gown (The luxurious and elegant Ballgown Collection)\r\nComplete Groom\'s suit:\r\n- Complete groom suit corresponding to the measures taken (suit + bottom) with vest &amp; tie (ready stock, rented)\r\nMake-up &amp; Hair do for wedding:\r\n- 1x Make-up &amp; hair-do for bride &amp; groom at Alissha\r\n- 1x Test make-up only for bride at pre-wedding\r\n- 1x Retouch only for bride &amp; groom for Jakarta sevice area (on the spot)\r\n- 1x Make-up &amp; hair-do for 2 mothers at Alissha (not include touch-up/retouch)\r\nPre-Wedding Photoshoot:\r\n- Indoor &amp; outdoor at Alissha (package w/o additional charge for outside location)\r\n- Include pre-wedding make-up (as test make-up for wedding day)\r\n- All file photos (raw/JPEG/not yet edited)\r\n- Outfit for photo + 1 casual pose with 2 gowns and 1 suit\r\n- 25 Edited Photos\r\n- 20 x 30 album size (1 unit)\r\n- 50 x 60 canvas + photo frame (1 unit)\r\n- Wedding Car (driver, decoration, fuel) \r\n- Not include parking &amp; toll fee, only Jakarta service area &amp; standard service time above 6 am. (outside service area &amp; service time, additional charge):\r\n- Alphard (rent 10 hours)\r\n\r\nWedding Cake (dummy cake, cake table, cake knife):\r\n- The default package includes a standard 3 layer dummy cake of voucher/limit value IDR 1.000.000,- for only Jakarta service area (outside service area, additional charge)\r\nWedding Day Photo &amp; Video Documentation:\r\n- On the spot filming\r\n- 1 photographer + 1 videographer\r\n- 1 album + all file photo + video highlight &amp; documentation\r\n- The default package includes wedding day documentation for only Jakarta service area &amp; starting documentation standard time above 6 am. to the end or reception (outside service area &amp; service time, additional charge)\r\n- Suggested to provide meal box for person on duty (not included in the package)\r\nBonus:\r\n- 2 Standar mother\'s gowns\r\n- 2 angpao\'s gowns\r\n- 1 bridesmaid\'s gown\r\n- 1 bridesmaid make-up &amp; hair-do at Alissha (not include touch-up/retouch)\r\n- 1x banner\r\n- 1 hand bouquet + 2 carnation type, corsage (fresh flower, rose type)', '- Pemesan harus memilih tanggal acara minimal 1 bulan sebelum hari-H\r\n- Pemesan harus menyetujui MOU', 0, 0, 1, 24, 1601960481),
(179, 'Paket Pernikahan', 20000000, '1.jpg', 'Yogyakarta', 'asdadad', 'assdaaddasd', 0, 0, 1, 24, 1602671768),
(180, 'Paket Lamaran', 20000000, '2.jpg', 'Yogyakarta', 'asdadsadsadsa', 'asdasasddasdasdas', 0, 0, 4, 22, 1603272329),
(181, 'Paket Lamaran', 20000000, '11.jpg', 'Yogyakarta', 'sadsadasdas', 'asdasasdasddas', 0, 0, 4, 24, 1603423248),
(182, 'Paket Musik Kosmik', 20000000, 'music1.jpg', 'Yogyakarta', 'asdasdasdas', 'asddasasddasdas', 0, 0, 2, 24, 1603423375);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_jasa`
--

CREATE TABLE `kategori_jasa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_jasa`
--

INSERT INTO `kategori_jasa` (`id`, `nama`) VALUES
(1, 'Pernikahan'),
(2, 'Musik'),
(3, 'Ulang Tahun'),
(4, 'Lamaran'),
(5, 'Korporat'),
(6, 'Anniversary');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_jasa` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `tgl_acara` date NOT NULL,
  `status` int(11) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_jasa`, `id_seller`, `id_user`, `tgl_order`, `tgl_acara`, `status`, `bukti_bayar`, `rating`) VALUES
(25, 168, 24, 20, '2020-10-16', '2020-10-24', 5, 'Contoh_Bukti_TF1.png', 5),
(26, 173, 24, 25, '2020-10-16', '2020-10-23', 5, 'Contoh_Bukti_TF.png', 4),
(27, 168, 24, 25, '2020-10-16', '2020-10-30', 6, '', 0),
(28, 172, 21, 25, '2020-10-16', '2020-10-24', 0, '', 0),
(29, 172, 21, 25, '2020-10-16', '2020-10-31', 0, '', 0),
(30, 168, 24, 25, '2020-10-19', '2020-11-19', 2, 'Contoh_Bukti_TF5.png', 0),
(31, 172, 21, 25, '2020-10-19', '2020-10-31', 0, '', 0),
(32, 173, 24, 25, '2020-10-19', '2020-11-19', 5, 'Contoh_Bukti_TF2.png', 5),
(33, 168, 24, 20, '2020-10-20', '2020-11-28', 6, '', 0),
(34, 173, 24, 25, '2020-10-26', '2020-11-26', 5, 'Contoh_Bukti_TF3.png', 5),
(35, 173, 24, 25, '2020-10-26', '2020-11-26', 5, 'Contoh_Bukti_TF4.png', 5),
(36, 181, 24, 25, '2020-10-27', '2020-10-27', 1, '', 0),
(37, 168, 24, 20, '2020-10-27', '2020-10-27', 5, 'Contoh_Bukti_TF6.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `nama_bisnis` varchar(100) NOT NULL,
  `tentang` varchar(10000) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `medsos` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `rating` float NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nohp`, `email`, `pekerjaan`, `image`, `password`, `role_id`, `is_active`, `nama_bisnis`, `tentang`, `alamat`, `kota`, `medsos`, `npwp`, `rating`, `date_created`) VALUES
(14, 'Aditya Putra Irawan', '081260176831', 'emailnya.aditni@gmail.com', '', 'Foto_Formal_BG_BIRU1.jpg', '$2y$10$rIZvce.CsdzwE1cpCrK3texd0fEYBu4IhZfOoQhBhDwmiM4vIXghO', 1, 1, '', '', '', '', '', '', 0, 1595954496),
(18, 'Aditya Putra Irawan', '081260176831', 'aditputrasiro@gmail.com', '', '5.png', '$2y$10$Ol.p1zHqGbcB6yzGzXE3UeEroF0od5/pu3Re9zUhBaeULTzltIoL.', 1, 1, '', '', '', '', '', '', 0, 1595991605),
(19, 'Aditya Mahavira Steven', '081258963548', 'amahavira@gmail.com', '', 'IMG_20170115_233052_264.jpg', '$2y$10$lrastBE8NfSrjv1ds1yMzu/Ct5rKehiqnMUPPdrMgrLDFFGlLbiAC', 1, 1, '', '', '', '', '', '', 0, 1596967265),
(20, 'Muhammad Rasyid Shadiq', '082293641087', 'rasyidshadiq97@gmail.com', 'Karyawan', 'logo_kosmik_png.png', '$2y$10$T6ypha2aR5XQftI3h/nCsuZjVOoTLNdxmrnxPluz5Gvtxn5ArHPEi', 2, 1, '', '', 'Yogyakarta', '', '', '', 0, 1599142022),
(21, 'Aditya Mahavira', '089520892008', 'amahavira@rocketmail.com', 'Marketing', '1.jpg', '$2y$10$kRA3o4ZueeRo100EIIYeQOiYtJu8PHbeT3Hd3JCQxQZS6MZks9aYq', 4, 1, 'Adot EO', 'Bergerak di bidang Macam-macam', 'Yogyakarta', 'Sleman', 'IG : @eocimtah', 'contohnpwp1.pdf', 0, 1600479121),
(22, 'Aditya Mahavira', '089520892008', 'tjah001@gmail.com', 'Marketing', '2.jpg', '$2y$10$yENhbWgf3scyVPd3yber7usjw876pp/1PJ8E2DBULb.lzNJ80QIJa', 4, 1, 'Project Adot', 'Bergerak di bidang Musik', 'Yogyakarta', 'Sleman', 'IG : @ProjectAdot', 'contohnpwp2.pdf', 0, 1600483783),
(24, 'Fikri Almakmuri', '081258963548', 'alfikripriyagung@gmail.com', 'Marketing', 'music1.jpg', '$2y$10$JfHHMLDiDHCz2yC.kpihj.4ZiECGCfv0H8uxZkyoKLU9KNIt6l2We', 4, 1, 'Makmur EO', 'Makmur EO', 'Yogyakarta', 'Sleman', '@makmureo', 'contohnpwp.pdf', 0, 1600953180),
(25, 'Muhammad Yasin Deru Saputra', '081227272672', 'mydsaputra@gmail.com', 'Karyawan', 'default.png', '$2y$10$A4hlbghCUH5dsL39l1sa6Oov4BRzPcy3pJJS4TZDeSomfXRxUx0Vu', 2, 1, '', '', 'Kalasan', '', '', '', 0, 1601954798),
(33, 'Adoto GGWP', '089520892008', 'adotoggwp1@gmail.com', 'Karyawan', 'default.png', '$2y$10$kYZpV81qWSMan93mdEMci.JT30s9TgXCetNNPwXA0vD20c.qM2tEG', 2, 1, '', '', 'Wonosobo', '', '', '', 0, 1604664481);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(20, 2, 2),
(21, 1, 3),
(22, 1, 2),
(24, 4, 4),
(25, 1, 4),
(27, 4, 2),
(28, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(4, 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 0),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 0),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 0),
(12, 2, 'Home', 'user/evoria', 'fas fa-fw fa-home', 1),
(13, 2, 'Vendor', 'user/evoria/index#vendor', 'fas fa-fw fa-store', 1),
(14, 2, 'Inspirasi', 'user/inspiration', 'fas fa-fw fa-images', 1),
(15, 4, 'Data Tentang Bisnis', 'user/data_bisnis', 'fas fa-fw fa-table', 0),
(17, 4, 'Edit Profile', 'user/edit_profile_seller', 'fas fa-fw fa-user-edit', 0),
(19, 2, 'Pesanan Saya', 'user/pesanan_saya', 'fas fa-fw fa-boxes', 1),
(22, 4, 'Halaman Bisnis', 'user/halaman_bisnis', 'fas fa-fw fa-store', 1),
(23, 4, 'Profile', 'user/profile_seller', 'fas fa-fw fa-user-circle', 1),
(24, 4, 'Halaman Pesanan', 'user/pesanan', 'fas fa-fw fa-boxes', 1),
(26, 1, 'Kategori', 'admin/kategori', 'fas fa-fw fa-store', 1),
(27, 1, 'User Management', 'admin/usermanagement', 'fas fa-fw fa-user-edit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'rasyidshadiq97@gmail.com', 'yyB2Am3qrP63YfcceF8ZmypRuDm6JFI9yKFvep2MQEU=', 1599142022),
(3, 'tjah001@gmail.com', 'yPgwU/NEzGxd+gli3BccwKHiAR9KToM2Z9jNeDG2YE8=', 1600483783),
(12, 'adotoggwp1@gmail.com', 'Z5FrfO3qOcNowrSq2ScMzl/R89NR16guN/lurdrKK2Y=', 1604664826),
(13, 'adotoggwp1@gmail.com', 'wEEUNPUYLgo97BhaLQsvfD32dowi1/5XKksLrT28rhI=', 1604665073);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inspirasi`
--
ALTER TABLE `inspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_jasa`
--
ALTER TABLE `kategori_jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inspirasi`
--
ALTER TABLE `inspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `kategori_jasa`
--
ALTER TABLE `kategori_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
