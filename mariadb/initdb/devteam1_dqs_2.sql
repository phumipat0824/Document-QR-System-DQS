-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14 ส.ค. 2021 เมื่อ 09:24 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devteam1_dqs`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `DQS_Department`
--

CREATE TABLE `DQS_Department` (
  `dep_id` int NOT NULL,
  `dep_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dep_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- dump ตาราง `DQS_Department`
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
(9, 'สำนักงานพาณิชย์จังหวัด', 1),
(10, 'สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัด', 1),
(11, 'สำนักงานแรงงานจังหวัด', 1),
(12, 'สำนักงานสวัสดิการและคุ้มครองแรงงานจังหวัด', 1),
(13, 'สำนักงานจัดหางานจังหวัด', 1),
(14, 'สำนักงานประกันสังคมจังหวัด', 1),
(15, 'สำนักงานเกษตรและสหกรณ์จังหวัด', 1),
(16, 'สำนักงานเกษตรจังหวัด', 1),
(17, 'สำนักงานปศุสัตว์จังหวัด', 1),
(18, 'สำนักงานสหกรณ์จังหวัด', 1),
(19, 'สำนักงานปฏิรูปที่ดินจังหวัด', 1),
(20, 'สำนักงานประมงจังหวัด', 1),
(21, 'สำนักงานขนส่งจังหวัด', 1),
(22, 'สำนักงานประชาสัมพันธ์จังหวัด', 1),
(23, 'สำนักงานสถิติจังหวัด', 1),
(24, 'สำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัด', 1),
(25, 'สำนักงานวัฒนธรรมจังหวัด', 1),
(26, 'สำนักงานป้องกันและบรรเทาสาธารณภัยจังหวัด', 1),
(27, 'สำนักงานบังคับคดีจังหวัด', 1),
(28, 'สำนักงานพระพุทธศาสนาจังหวัด', 1),
(29, 'สำนักงานการท่องเที่ยวและกีฬาจังหวัด', 1),
(30, 'สำนักงานส่งเสริมการปกครองส่วนท้องถิ่นจังหวัด', 1),
(31, 'สำนักงานพลังงานจังหวัด', 1),
(32, 'สำนักงานสัสดีจังหวัด', 1),
(33, 'สำนักงานยุติธรรมจังหวัด', 1),
(34, 'สำนักงานอุตสาหกรรมจังหวัด', 1),
(35, 'สำนักงานคุมประพฤติจังหวัด', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `DQS_Document`
--

CREATE TABLE `DQS_Document` (
  `doc_id` int NOT NULL,
  `doc_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_view` int DEFAULT NULL,
  `doc_download` int DEFAULT NULL,
  `doc_datetime` timestamp NULL DEFAULT NULL,
  `doc_mem_id` int NOT NULL,
  `doc_fol_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `DQS_Folder`
--

CREATE TABLE `DQS_Folder` (
  `fol_id` int NOT NULL,
  `fol_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fol_datetime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fol_location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fol_mem_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `DQS_Member`
--

CREATE TABLE `DQS_Member` (
  `mem_id` int NOT NULL,
  `mem_emp_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_dep_id` int NOT NULL,
  `mem_province_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `DQS_Province`
--

CREATE TABLE `DQS_Province` (
  `pro_id` int NOT NULL,
  `pro_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_short` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- dump ตาราง `DQS_Province`
--

INSERT INTO `DQS_Province` (`pro_id`, `pro_name`, `pro_short`) VALUES
(1, 'กรุงเทพมหานคร', 'BKK'),
(2, 'สมุทรปราการ', 'SPK'),
(3, 'นนทบุรี', 'NTB'),
(4, 'ปทุมธานี', 'PTN'),
(5, 'พระนครศรีอยุธยา', 'AYU'),
(6, 'อ่างทอง', 'ART'),
(7, 'ลพบุรี', 'LBR'),
(8, 'สิงห์บุรี', 'SBR'),
(9, 'ชัยนาท', 'CHN'),
(10, 'สระบุรี', 'SRB'),
(11, 'ชลบุรี', 'CHB'),
(12, 'ระยอง', 'RAY'),
(13, 'จันทบุรี', 'CTB'),
(14, 'ตราด', 'TRT'),
(15, 'ฉะเชิงเทรา', 'CCS'),
(16, 'ปราจีนบุรี', 'PRC'),
(17, 'นครนายก', 'NKN'),
(18, 'สระแก้ว', 'SKA'),
(19, 'นครราชสีมา', 'NKR'),
(20, 'บุรีรัมย์', 'BRR'),
(21, 'สุรินทร์', 'SUR'),
(22, 'ศรีสะเกษ', 'SSK'),
(23, 'อุบลราชธานี', 'UBR'),
(24, 'ยโสธร', 'YST'),
(25, 'ชัยภูมิ', 'CHY'),
(26, 'อำนาจเจริญ', 'ANC'),
(27, 'หนองบัวลำภู', 'NBL'),
(28, 'ขอนแก่น', 'KHK'),
(29, 'อุดรธานี', 'UDT'),
(30, 'เลย', 'LOE'),
(31, 'หนองคาย', 'NKH'),
(32, 'มหาสารคาม', 'MSK'),
(33, 'ร้อยเอ็ด', 'ROE'),
(34, 'กาฬสินธุ์', 'KLS'),
(35, 'สกลนคร', 'SKN'),
(36, 'นครพนม', 'NKP'),
(37, 'มุกดาหาร', 'MDH'),
(38, 'เชียงใหม่', 'CHM'),
(39, 'ลำพูน', 'LPH'),
(40, 'ลำปาง', 'LMP'),
(41, 'อุตรดิตถ์', 'UTD'),
(42, 'แพร่', 'PHE'),
(43, 'น่าน', 'NAN'),
(44, 'พะเยา', 'PHY'),
(45, 'เชียงราย', 'CHR'),
(46, 'แม่ฮ่องสอน', 'MHS'),
(47, 'นครสวรรค์', 'NKS'),
(48, 'อุทัยธานี', 'UTT'),
(49, 'กำแพงเพชร', 'KPP'),
(50, 'ตาก', 'TAK'),
(51, 'สุโขทัย', 'SKT'),
(52, 'พิษณุโลก', 'PNL'),
(53, 'พิจิตร', 'PCH'),
(54, 'เพชรบูรณ์', 'PCB'),
(55, 'ราชบุรี', 'RCB'),
(56, 'กาญจนบุรี', 'KAN'),
(57, 'สุพรรณบุรี', 'SPB'),
(58, 'นครปฐม', 'NPT'),
(59, 'สมุทรสาคร', 'SMK'),
(60, 'สมุทรสงคราม', 'SMS'),
(61, 'เพชรบุรี', 'PBR'),
(62, 'ประจวบคีรีขันธ์', 'PKK'),
(63, 'นครศรีธรรมราช', 'NST'),
(64, 'กระบี่', 'KAB'),
(65, 'พังงา', 'PHG'),
(66, 'ภูเก็ต', 'PHK'),
(67, 'สุราษฎร์ธานี', 'SRT'),
(68, 'ระนอง', 'RNG'),
(69, 'ชุมพร', 'CHP'),
(70, 'สงขลา', 'SKL'),
(71, 'สตูล', 'STU'),
(72, 'ตรัง', 'TRA'),
(73, 'พัทลุง', 'PTL'),
(74, 'ปัตตานี', 'PAT'),
(75, 'ยะลา', 'YAL'),
(76, 'นราธิวาส', 'NTW'),
(77, 'บึงกาฬ', 'BUK');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `DQS_QR`
--

CREATE TABLE `DQS_QR` (
  `qr_id` int NOT NULL,
  `qr_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_view` int DEFAULT NULL,
  `qr_download` int DEFAULT NULL,
  `qr_datetime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `qr_mem_id` int NOT NULL,
  `qr_doc_id` int NOT NULL,
  `qr_fol_id` int NOT NULL
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
  ADD KEY `mem_dep_id` (`mem_dep_id`),
  ADD KEY `mem_province_id` (`mem_province_id`);

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
  MODIFY `dep_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `DQS_Document`
--
ALTER TABLE `DQS_Document`
  MODIFY `doc_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DQS_Folder`
--
ALTER TABLE `DQS_Folder`
  MODIFY `fol_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DQS_Member`
--
ALTER TABLE `DQS_Member`
  MODIFY `mem_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DQS_Province`
--
ALTER TABLE `DQS_Province`
  MODIFY `pro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `DQS_QR`
--
ALTER TABLE `DQS_QR`
  MODIFY `qr_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DQS_Document`
--
ALTER TABLE `DQS_Document`
  ADD CONSTRAINT `DQS_Document_ibfk_1` FOREIGN KEY (`doc_mem_id`) REFERENCES `DQS_Member` (`mem_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `DQS_Document_ibfk_2` FOREIGN KEY (`doc_fol_id`) REFERENCES `DQS_Folder` (`fol_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `DQS_Folder`
--
ALTER TABLE `DQS_Folder`
  ADD CONSTRAINT `DQS_Folder_ibfk_1` FOREIGN KEY (`fol_mem_id`) REFERENCES `DQS_Member` (`mem_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `DQS_Member`
--
ALTER TABLE `DQS_Member`
  ADD CONSTRAINT `DQS_Member_ibfk_1` FOREIGN KEY (`mem_dep_id`) REFERENCES `DQS_Department` (`dep_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `DQS_Member_ibfk_2` FOREIGN KEY (`mem_province_id`) REFERENCES `DQS_Province` (`pro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `DQS_QR`
--
ALTER TABLE `DQS_QR`
  ADD CONSTRAINT `DQS_QR_ibfk_1` FOREIGN KEY (`qr_mem_id`) REFERENCES `DQS_Member` (`mem_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `DQS_QR_ibfk_2` FOREIGN KEY (`qr_doc_id`) REFERENCES `DQS_Document` (`doc_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `DQS_QR_ibfk_3` FOREIGN KEY (`qr_fol_id`) REFERENCES `DQS_Folder` (`fol_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
