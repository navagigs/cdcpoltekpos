-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 06:58 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_user` varchar(25) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_nama` varchar(30) NOT NULL,
  `admin_alamat` varchar(250) NOT NULL,
  `admin_telepon` varchar(15) NOT NULL,
  `admin_ip` varchar(12) NOT NULL,
  `admin_online` int(10) NOT NULL,
  `admin_level_kode` int(3) NOT NULL,
  `admin_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_user`, `admin_pass`, `admin_nama`, `admin_alamat`, `admin_telepon`, `admin_ip`, `admin_online`, `admin_level_kode`, `admin_status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Bandung', '087820033395', '', 0, 1, 'A'),
('disban01', '6b9246aad58dc3c379c2b664b8f5430d', 'Admin.Dis', 'Bandung', '-', '', 0, 2, 'H'),
('nava', '533078acd91fffef2a525239de4a3dc9', 'Nava Gia', 'Bandung', '087820033395', '', 0, 2, 'H'),
('wadir', '0f48529ef59b423475ada2f4d4dd8535', 'Wakil DIrektur', '-', '-', '', 0, 2, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `admin_level`
--

CREATE TABLE `admin_level` (
  `admin_level_kode` int(3) NOT NULL,
  `admin_level_nama` varchar(30) NOT NULL,
  `admin_level_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_level`
--

INSERT INTO `admin_level` (`admin_level_kode`, `admin_level_nama`, `admin_level_status`) VALUES
(1, 'Administrator', 'A'),
(2, 'Wadir', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `apply_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `apply_status` enum('DITERIMA','TIDAK DITERIMA','BELUM DIPROSES') NOT NULL DEFAULT 'BELUM DIPROSES',
  `apply_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`apply_id`, `job_id`, `member_id`, `company_id`, `apply_status`, `apply_created`) VALUES
(4, 1, 4, 2, 'TIDAK DITERIMA', '2019-07-20 10:58:33'),
(5, 2, 4, 4, 'DITERIMA', '2019-07-20 11:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_logo` varchar(150) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_field` varchar(50) NOT NULL,
  `company_description` text NOT NULL,
  `company_year` varchar(4) NOT NULL,
  `company_address` text NOT NULL,
  `company_contact` varchar(20) NOT NULL,
  `company_web` varchar(100) NOT NULL,
  `company_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_logo`, `company_name`, `company_field`, `company_description`, `company_year`, `company_address`, `company_contact`, `company_web`, `company_created`) VALUES
(2, '1563766990-bdv2.jpg', 'Bandung Digital Valley', 'Co Working Space', '<div>\r\n	Bandung Digital Valley is an incubator and co-working space for digital creative enthusiasts of various backgrounds including students, community members, freelancers, IT practitioners and startup founders. Bandung Digital Valley membership is offered to those who met our criteria. Applicant should submit the application form with complete details. BDV management have the right to reject new member applications for any reasons including incomplete application form and mismatch applicant criteria.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n', '2010', 'Menara Bandung Digital Valley, Jl. Gegerkalong Hilir No.47, Sukarasa, Kec. Sukasari, Kota Bandung, Jawa Barat 40152', '(022) 4572380', 'https://bandungdigitalvalley.com/', '2019-07-18 23:09:03'),
(4, '1563766626-crop copy.png', 'CROP - IT Solution', 'IT of Things Solutions', '<p>\r\n	Menciptakan layanan pengembangan IT yang kreatif untuk kepentingan pelanggan, internal perusahaan, UMKM dan usaha lainnya. Yang mengembangkan layanan IT yang berlandaskan pada pemanfaatan teknologi informasi yang bernilai tinggi untuk menjadi perusahaan pengembangan IT terbsesar dan terbaik di Indonesia</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '2016', 'Jl. Sari Asih 4 RT.07/RW.10 Sarijadi, Bandung - Jawa Barat', '087820033395', 'www.crop.web.id', '2019-07-18 23:09:17'),
(5, '1563767162-dycode.jpg', 'DyCode', 'Professional Training', '<p>\r\n	iOS Professional Training</p>\r\n<p>\r\n	Learn how to create your awesome iOS app</p>\r\n<p>\r\n	using Apple&rsquo;s latest programming language &ndash; Swift</p>\r\n<p>\r\n	or widely-known one &ndash; Objective-C</p>\r\n', '2009', 'Jl. Sarikaso No.6A, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151', '(022) 82004356', 'https://edu.dycode.co.id/', '2019-07-22 10:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `cv_id` int(11) NOT NULL,
  `cv_file` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `cv_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`cv_id`, `cv_file`, `member_id`, `cv_created`) VALUES
(1, '', 1, '2019-07-20 03:01:41'),
(2, '', 1, '2019-07-20 03:02:17'),
(3, '', 1, '2019-07-20 03:02:49'),
(4, '', 1, '2019-07-20 08:07:08'),
(12, 'AUDIT KEAMANA SI.pdf', 4, '2019-07-22 08:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'D4-Teknik Informatika'),
(2, 'D3-Teknik Informatika'),
(3, 'D4-Logistik Bisnis'),
(4, 'D3-Logistik Bisnis'),
(5, 'D3-Manajemen Informatika'),
(6, 'D3-Manajemen Bisnis'),
(7, 'D3-Akuntansi'),
(8, 'D4-Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_responsible` text NOT NULL,
  `job_qualifications` text NOT NULL,
  `job_date` date NOT NULL,
  `job_images` varchar(255) NOT NULL,
  `company_id` text NOT NULL,
  `job_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`, `job_responsible`, `job_qualifications`, `job_date`, `job_images`, `company_id`, `job_created`) VALUES
(1, 'Web Developers', '<p>\r\n	-Membuat dan Memperbaiki Aplikasi</p>\r\n<p>\r\n	-Siap Dikejar Deadline</p>\r\n', '<p>\r\n	- Bisa Codeigniter</p>\r\n<p>\r\n	- Bisa Ajax</p>\r\n', '2019-07-20', '1563633823-web-developers.jpg', '2', '2019-07-19 14:20:38'),
(2, 'Android', '<p>\r\n	-Membuat dan Memperbaiki Aplikasi -Siap Dikejar Deadline</p>\r\n', '<p>\r\n	- Bisa Codeigniter- Bisa Ajax</p>\r\n', '2019-08-31', '1563636767-android.jpg', '4', '2019-07-19 14:20:38'),
(3, 'Desain Grafis', '-Membuat dan Memperbaiki Aplikasi\r\n-Siap Dikejar Deadline', '- Bisa Codeigniter- Bisa Ajax', '2019-07-10', '1563636329-desain-grafis.jpg', '2', '2019-07-19 14:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_phone` varchar(255) NOT NULL,
  `member_address` text NOT NULL,
  `member_images` varchar(255) NOT NULL,
  `member_created` datetime NOT NULL,
  `member_username` varchar(100) NOT NULL,
  `member_password` varchar(100) NOT NULL,
  `member_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `department_id`, `member_name`, `member_email`, `member_phone`, `member_address`, `member_images`, `member_created`, `member_username`, `member_password`, `member_status`) VALUES
(4, 2, 'e', 'nava@gmail.com', '3', 'Bandung1', '1563770989-1.PNG', '2019-07-18 00:00:00', 'dede', 'b4be1c568a6dc02dcaf2849852bdb13e', '');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('418c2ce1e2947e1d49f5ce81556580d1', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', 1480604248, 'a:5:{s:9:\"user_data\";s:0:\"\";s:10:\"admin_user\";s:5:\"admin\";s:10:\"admin_nama\";s:13:\"Administrator\";s:11:\"admin_level\";s:1:\"1\";s:9:\"logged_in\";b:1;}'),
('4cb8962053e458d6d1b357e3c5cec66a', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', 1553062818, 'a:5:{s:9:\"user_data\";s:0:\"\";s:10:\"admin_user\";s:5:\"admin\";s:10:\"admin_nama\";s:13:\"Administrator\";s:11:\"admin_level\";s:1:\"1\";s:9:\"logged_in\";b:1;}'),
('7a5214e22585a8b8e5a8f3b7826fac3b', '0.0.0.0', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile', 1480604261, ''),
('7d9283ce861b9dde31649e124b9afbd7', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1534084988, ''),
('a1efe840d7d5591d9e811f0f4bf6f78d', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 1563460834, 'a:2:{s:9:\"user_data\";s:0:\"\";s:17:\"flash:old:warning\";s:44:\"Username, Password, dan Caphcha tidak cocok!\";}'),
('acf21b44d82641186b223b960da3c0e2', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', 1480608218, 'a:5:{s:9:\"user_data\";s:0:\"\";s:10:\"admin_nama\";s:13:\"Administrator\";s:10:\"admin_user\";s:5:\"admin\";s:11:\"admin_level\";s:1:\"1\";s:9:\"logged_in\";b:1;}'),
('bec86ae62ff3987a5c1746ede0180ddf', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', 1480605148, 'a:5:{s:10:\"admin_nama\";s:13:\"Administrator\";s:10:\"admin_user\";s:5:\"admin\";s:11:\"admin_level\";s:1:\"1\";s:9:\"logged_in\";b:1;s:17:\"flash:new:success\";s:26:\"Password Berhasil Diubah!,\";}'),
('fbd34838c15c25a2881fdfb79d759b0f', '0.0.0.0', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile', 1480608382, ''),
('fdebf5457ae3564b6245f14362add273', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', 1480609024, 'a:1:{s:10:\"admin_nama\";s:13:\"Administrator\";}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_user`),
  ADD KEY `admin_level_kode` (`admin_level_kode`);

--
-- Indexes for table `admin_level`
--
ALTER TABLE `admin_level`
  ADD PRIMARY KEY (`admin_level_kode`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`cv_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_level`
--
ALTER TABLE `admin_level`
  MODIFY `admin_level_kode` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_level_kode`) REFERENCES `admin_level` (`admin_level_kode`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
