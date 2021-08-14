-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Aug 13, 2021 at 04:52 PM
-- Server version: 10.3.30-MariaDB-1:10.3.30+maria~focal
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devteam1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `DQS_Department`
--

CREATE TABLE `DQS_Department` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dep_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `DQS_Department`
--

INSERT INTO `DQS_Department` (`dep_id`, `dep_name`, `dep_active`) VALUES
(1, 'ที่ทำการปกครองจังหวัด', 1),
(2, 'สำนักงานจังหวัด', 1),
(3, 'สำนักงานสาธารณสุขจังหวัด', 1),
(4, 'สำนักงานที่ดินจังหวัด', 1),
(5, 'สำนักงานพัฒนาชุมชนจังหวัด', 1),
(6, 'สำนักงานโยธาธิการและผังเมืองจังหวัด', 1),
(7, 'เรือนจำจังหวัด', 1),
(8, 'สำนักงานคลังจังหวัด', 1),
(9, 'สำนักงานอุตสาหกรรมจังหวัด', 1),
(10, 'สำนักงานพาณิชย์จังหวัด', 1),
(11, 'สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัด', 1),
(12, 'สำนักงานแรงงานจังหวัด', 1),
(13, 'สำนักงานสวัสดิการและคุ้มครองแรงงานจังหวัด', 1),
(14, 'สำนักงานจัดหางานจังหวัด', 1),
(15, 'สำนักงานประกันสังคมจังหวัด', 1),
(16, 'สำนักงานเกษตรและสหกรณ์จังหวัด', 1),
(17, 'สำนักงานเกษตรจังหวัด', 1),
(18, 'สำนักงานปศุสัตว์จังหวัด', 1),
(19, 'สำนักงานสหกรณ์จังหวัด', 1),
(20, 'สำนักงานปฏิรูปที่ดินจังหวัด', 1),
(21, 'สำนักงานประมงจังหวัด', 1),
(22, 'สำนักงานขนส่งจังหวัด', 1),
(23, 'สำนักงานประชาสัมพันธ์จังหวัด', 1),
(24, 'สำนักงานสถิติจังหวัด', 1),
(25, 'สำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัด', 1),
(26, 'สำนักงานวัฒนธรรมจังหวัด', 1),
(27, 'สำนักงานป้องกันและบรรเทาสาธารณภัยจังหวัด', 1),
(28, 'สำนักงานบังคับคดีจังหวัด', 1),
(29, 'สำนักงานคุมประพฤติจังหวัด', 1),
(30, 'สำนักงานพระพุทธศาสนาจังหวัด', 1),
(31, 'สำนักงานการท่องเที่ยวและกีฬาจังหวัด', 1),
(32, 'สำนักงานส่งเสริมการปกครองส่วนท้องถิ่นจังหวัด', 1),
(33, 'สำนักงานพลังงานจังหวัด', 1),
(34, 'สำนักงานสัสดีจังหวัด', 1),
(35, 'สำนักงานยุติธรรมจังหวัด', 1);

-- --------------------------------------------------------

--
-- Table structure for table `DQS_Document`
--

CREATE TABLE `DQS_Document` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_view` int(11) DEFAULT NULL,
  `doc_download` int(11) DEFAULT NULL,
  `doc_datetime` timestamp NULL DEFAULT NULL,
  `doc_mem_id` int(11) NOT NULL,
  `doc_fol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `DQS_Folder`
--

CREATE TABLE `DQS_Folder` (
  `fol_id` int(11) NOT NULL,
  `fol_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fol_datetime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `fol_location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fol_mem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `DQS_Member`
--

CREATE TABLE `DQS_Member` (
  `mem_id` int(11) NOT NULL,
  `mem_emp_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `DQS_Province`
--

CREATE TABLE `DQS_Province` (
  `pro_id` int(5) NOT NULL,
  `pro_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `DQS_Province`
--

INSERT INTO `DQS_Province` (`pro_id`, `pro_name`) VALUES
(1, 'กรุงเทพมหานคร   '),
(2, 'สมุทรปราการ   '),
(3, 'นนทบุรี   '),
(4, 'ปทุมธานี   '),
(5, 'พระนครศรีอยุธยา   '),
(6, 'อ่างทอง   '),
(7, 'ลพบุรี   '),
(8, 'สิงห์บุรี   '),
(9, 'ชัยนาท   '),
(10, 'สระบุรี'),
(11, 'ชลบุรี   '),
(12, 'ระยอง   '),
(13, 'จันทบุรี   '),
(14, 'ตราด   '),
(15, 'ฉะเชิงเทรา   '),
(16, 'ปราจีนบุรี   '),
(17, 'นครนายก   '),
(18, 'สระแก้ว   '),
(19, 'นครราชสีมา   '),
(20, 'บุรีรัมย์   '),
(21, 'สุรินทร์   '),
(22, 'ศรีสะเกษ   '),
(23, 'อุบลราชธานี   '),
(24, 'ยโสธร   '),
(25, 'ชัยภูมิ   '),
(26, 'อำนาจเจริญ   '),
(27, 'หนองบัวลำภู   '),
(28, 'ขอนแก่น   '),
(29, 'อุดรธานี   '),
(30, 'เลย   '),
(31, 'หนองคาย   '),
(32, 'มหาสารคาม   '),
(33, 'ร้อยเอ็ด   '),
(34, 'กาฬสินธุ์   '),
(35, 'สกลนคร   '),
(36, 'นครพนม   '),
(37, 'มุกดาหาร   '),
(38, 'เชียงใหม่   '),
(39, 'ลำพูน   '),
(40, 'ลำปาง   '),
(41, 'อุตรดิตถ์   '),
(42, 'แพร่   '),
(43, 'น่าน   '),
(44, 'พะเยา   '),
(45, 'เชียงราย   '),
(46, 'แม่ฮ่องสอน   '),
(47, 'นครสวรรค์   '),
(48, 'อุทัยธานี   '),
(49, 'กำแพงเพชร   '),
(50, 'ตาก   '),
(51, 'สุโขทัย   '),
(52, 'พิษณุโลก   '),
(53, 'พิจิตร   '),
(54, 'เพชรบูรณ์   '),
(55, 'ราชบุรี   '),
(56, 'กาญจนบุรี   '),
(57, 'สุพรรณบุรี   '),
(58, 'นครปฐม   '),
(59, 'สมุทรสาคร   '),
(60, 'สมุทรสงคราม   '),
(61, 'เพชรบุรี   '),
(62, 'ประจวบคีรีขันธ์   '),
(63, 'นครศรีธรรมราช   '),
(64, 'กระบี่   '),
(65, 'พังงา   '),
(66, 'ภูเก็ต   '),
(67, 'สุราษฎร์ธานี   '),
(68, 'ระนอง   '),
(69, 'ชุมพร   '),
(70, 'สงขลา   '),
(71, 'สตูล   '),
(72, 'ตรัง   '),
(73, 'พัทลุง   '),
(74, 'ปัตตานี   '),
(75, 'ยะลา   '),
(76, 'นราธิวาส   '),
(77, 'บึงกาฬ');

-- --------------------------------------------------------

--
-- Table structure for table `DQS_QR`
--

CREATE TABLE `DQS_QR` (
  `qr_id` int(11) NOT NULL,
  `qr_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_view` int(11) DEFAULT NULL,
  `qr_download` int(11) DEFAULT NULL,
  `qr_datetime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `qr_mem_id` int(11) NOT NULL,
  `qr_doc_id` int(11) NOT NULL,
  `qr_fol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DQS_Department`
--
ALTER TABLE `DQS_Department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `DQS_Document`
--
ALTER TABLE `DQS_Document`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `doc_mem_id` (`doc_mem_id`),
  ADD KEY `doc_fol_id` (`doc_fol_id`);

--
-- Indexes for table `DQS_Folder`
--
ALTER TABLE `DQS_Folder`
  ADD PRIMARY KEY (`fol_id`),
  ADD KEY `fol_mem_id` (`fol_mem_id`);

--
-- Indexes for table `DQS_Member`
--
ALTER TABLE `DQS_Member`
  ADD PRIMARY KEY (`mem_id`),
  ADD KEY `mem_dep_id` (`mem_dep_id`);

--
-- Indexes for table `DQS_Province`
--
ALTER TABLE `DQS_Province`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `DQS_QR`
--
ALTER TABLE `DQS_QR`
  ADD PRIMARY KEY (`qr_id`),
  ADD KEY `qr_mem_id` (`qr_mem_id`),
  ADD KEY `qr_doc_id` (`qr_doc_id`),
  ADD KEY `qr_fol_id` (`qr_fol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DQS_Department`
--
ALTER TABLE `DQS_Department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `DQS_Document`
--
ALTER TABLE `DQS_Document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DQS_Folder`
--
ALTER TABLE `DQS_Folder`
  MODIFY `fol_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DQS_Member`
--
ALTER TABLE `DQS_Member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DQS_Province`
--
ALTER TABLE `DQS_Province`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `DQS_QR`
--
ALTER TABLE `DQS_QR`
  MODIFY `qr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DQS_Document`
--
ALTER TABLE `DQS_Document`
  ADD CONSTRAINT `DQS_Document_ibfk_1` FOREIGN KEY (`doc_mem_id`) REFERENCES `DQS_Member` (`mem_id`),
  ADD CONSTRAINT `DQS_Document_ibfk_2` FOREIGN KEY (`doc_fol_id`) REFERENCES `DQS_Folder` (`fol_id`);

--
-- Constraints for table `DQS_Folder`
--
ALTER TABLE `DQS_Folder`
  ADD CONSTRAINT `DQS_Folder_ibfk_1` FOREIGN KEY (`fol_mem_id`) REFERENCES `DQS_Member` (`mem_id`);

--
-- Constraints for table `DQS_Member`
--
ALTER TABLE `DQS_Member`
  ADD CONSTRAINT `DQS_Member_ibfk_1` FOREIGN KEY (`mem_dep_id`) REFERENCES `DQS_Department` (`dep_id`);

--
-- Constraints for table `DQS_QR`
--
ALTER TABLE `DQS_QR`
  ADD CONSTRAINT `DQS_QR_ibfk_1` FOREIGN KEY (`qr_mem_id`) REFERENCES `DQS_Member` (`mem_id`),
  ADD CONSTRAINT `DQS_QR_ibfk_2` FOREIGN KEY (`qr_doc_id`) REFERENCES `DQS_Document` (`doc_id`),
  ADD CONSTRAINT `DQS_QR_ibfk_3` FOREIGN KEY (`qr_fol_id`) REFERENCES `DQS_Folder` (`fol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
