-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2021 at 10:54 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
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
-- Database: `devteam1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `DQS_Department`
--

CREATE TABLE `DQS_Department` (
  `dep_id` int NOT NULL,
  `dep_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dep_province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dep_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `DQS_Document`
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
-- Table structure for table `DQS_Folder`
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
-- Table structure for table `DQS_Member`
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
  `mem_dep_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `DQS_QR`
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
  ADD KEY `mem_dep_id` (`mem_dep_id`);

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
  MODIFY `dep_id` int NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `DQS_Member_ibfk_1` FOREIGN KEY (`mem_dep_id`) REFERENCES `DQS_Department` (`dep_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
