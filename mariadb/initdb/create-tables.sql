-- MySQL dump 10.19  Distrib 10.3.28-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cluster2
-- ------------------------------------------------------
-- Server version	10.3.28-MariaDB-1:10.3.28+maria~focal

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dcs_admin`
--

DROP TABLE IF EXISTS `dcs_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_admin` (
  `ID_admin` varchar(10) NOT NULL,
  `Password_admin` varchar(20) DEFAULT NULL,
  `First_Name_admin` varchar(100) NOT NULL,
  `Last_Name_admin` varchar(100) NOT NULL,
  `Phonenumber_admin` varchar(10) NOT NULL,
  `Mail_admin` varchar(255) NOT NULL,
  `Prefix_ID` smallint(2) NOT NULL,
  PRIMARY KEY (`ID_admin`),
  KEY `Prefix_ID` (`Prefix_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_admin`
--

LOCK TABLES `dcs_admin` WRITE;
/*!40000 ALTER TABLE `dcs_admin` DISABLE KEYS */;
INSERT INTO `dcs_admin` VALUES ('AD62160014', 'Bank62160014', 'ณัฐกรณ์', 'น้อยเกิด', '0627641517', '62160014@go.buu.ac.th', 1),('AD62160079', 'Tang62160079', 'จุฑามาศ', 'ทับทอง', '0800599428', '62160079@go.buu.ac.th', 3),('AD62160082', 'Gun62160082', 'ณเอก', 'ปุณย์ปริชญ์', '0970608324', '62160082@go.buu.ac.th', 1),('AD62160098', 'Pass62160098', 'ประสพสุข', 'นาเมืองรักษ์', '0800599378', '62160098@go.buu.ac.th', 3),('AD62160105', 'Prame62160105', 'ภูมิรพี', 'ราชสุข', '0615164477', '62160105@go.buu.ac.th', 1),('AD62160135', 'Trich62160135', 'จรัสพร', 'แซ่ล่อ', '0635255991', '62160135@go.buu.ac.th', 3),('AD62160152', 'Ice62160152', 'ณัฐรุจา', 'คะปัญญา', '0861415304', '62160152@go.buu.ac.th', 3),('AD62160160', 'Jack62160160', 'ศวกร', 'ศิลปวานนท์', '0909179051', '62160160@go.buu.ac.th', 1),('AD62160333', 'First62160333', 'ภูมิพัฒน์', 'เกตุสุวรรณ์', '0988274578', '62160333@go.buu.ac.th', 1);
/*!40000 ALTER TABLE `dcs_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_appellant`
--

DROP TABLE IF EXISTS `dcs_appellant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_appellant` (
  `ID_ssn` varchar(13) NOT NULL,
  `First_Name_Appellant` varchar(100) NOT NULL,
  `Last_Name_Appellant` varchar(100) NOT NULL,
  `Phonenumber_Appellant` varchar(10) NOT NULL,
  `Mail_Appellant` varchar(255) DEFAULT NULL,
  `Address_Appellant` text DEFAULT NULL,
  `Prefix_ID` smallint(2) NOT NULL,
  PRIMARY KEY (`ID_ssn`),
  KEY `ID_Prefix` (`Prefix_ID`),
  KEY `Prefix_ID` (`Prefix_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_appellant`
--

LOCK TABLES `dcs_appellant` WRITE;
/*!40000 ALTER TABLE `dcs_appellant` DISABLE KEYS */;
INSERT INTO `dcs_appellant` VALUES ('1419901937340', 'จีรศักดิ์', 'บุญธรรม', '0943953508', '62160078@go.buu.ac.th', 'บ้านเลขที่ 15/7. หมู่ที่ 3. หมู่บ้าน -. ซอย -. ถนน -. ตำบล แสนสุข. อำเภอ เมือง. จังหวัด ชลบุรี. รหัสไปรษณีย์ 20130.', 1);
/*!40000 ALTER TABLE `dcs_appellant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_category`
--

DROP TABLE IF EXISTS `dcs_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_category` (
  `ID_category` smallint(3) NOT NULL AUTO_INCREMENT,
  `Status_category` smallint(1) NOT NULL,
  `Detail_category` text NOT NULL,
  `Name_category` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_category`
--

LOCK TABLES `dcs_category` WRITE;
/*!40000 ALTER TABLE `dcs_category` DISABLE KEYS */;
INSERT INTO `dcs_category` VALUES (1, 1, 'เจ้าหน้าที่หน่วยงานเกิดเหตุทะเลาะวิวาทภายในเวลางาน หรือภายในสำนักงาน', 'ทะเลาะวิวาท'),(2, 1, 'ทุจริต/ฉ้อโกง/คอรัปชั่น', 'ทุจริต'),(3, 1, 'สิ่งแวดล้อมที่พบสกปรก/สิ่งอำนวยความสะดวกไม่เพียงพอ', 'สิ่งแวดล้อมและสิ่งอำนวยความสะดวก'),(4, 1, 'ละเลยในหน้าที่/ปฏิบัติหน้าที่ล่าช้าเกินสมควร/เพิกเฉยต่อบุคคลเข้าใช้บริการ', 'ละเลยหน้าที่');
/*!40000 ALTER TABLE `dcs_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_complaint`
--

DROP TABLE IF EXISTS `dcs_complaint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_complaint` (
  `ID_complaint` varchar(10) NOT NULL,
  `Status_complaint` smallint(1) NOT NULL,
  `Detail_complaint` text DEFAULT NULL,
  `Date_complaint` date NOT NULL,
  `Time_complaint` time NOT NULL,
  `Category_ID` smallint(3) NOT NULL,
  `Department_ID` smallint(3) NOT NULL,
  `Ssn_ID` varchar(13) NOT NULL,
  PRIMARY KEY (`ID_complaint`),
  KEY `Category_ID` (`Category_ID`),
  KEY `Department_ID` (`Department_ID`),
  KEY `Ssn_ID` (`Ssn_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_complaint`
--

LOCK TABLES `dcs_complaint` WRITE;
/*!40000 ALTER TABLE `dcs_complaint` DISABLE KEYS */;
INSERT INTO `dcs_complaint` VALUES ('COMP0001', 1, 'เจ้าหน้าที่ขนส่งเรียกเก็บเงินปลายทาง แต่ตรวจสอบประเภทการจัดส่งที่เลือกเป็น EMS', '2020-10-02', '18:00:00', 2, 4, '1419901937340');
/*!40000 ALTER TABLE `dcs_complaint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_department`
--

DROP TABLE IF EXISTS `dcs_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_department` (
  `ID_depart` smallint(3) NOT NULL AUTO_INCREMENT,
  `Status_depart` smallint(1) NOT NULL,
  `Detail_depart` text NOT NULL,
  `Name_depart` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_depart`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_department`
--

LOCK TABLES `dcs_department` WRITE;
/*!40000 ALTER TABLE `dcs_department` DISABLE KEYS */;
INSERT INTO `dcs_department` VALUES (1, 1, 'เจ้าหน้าที่บัญชี เจ้าหน้าที่การเงิน ผู้จัดการฝ่ายบัญชี', 'แผนกบัญชีและการเงิน'),(2, 1, 'ผู้ดูแลระบบ วิศวกรซอฟต์แวร์ นักวิเคราะห์ระบบ', 'แผนกไอที'),(3, 1, 'เจ้าหน้าที่ต้อนรับ ผู้จัดการฝ่ายต้อนรับ พนักงานแคชเชียร์ พนักงานโอเปอร์เรเตอร์ ', 'แผนกต้อนรับ'),(4, 1, 'เจ้าหน้าที่ขนส่งภายในประเทศ เจ้าหน้าที่ขนส่งต่างประเทศ หัวหน้าแผนกขนส่ง ', 'แผนกขนส่ง');
/*!40000 ALTER TABLE `dcs_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_image`
--

DROP TABLE IF EXISTS `dcs_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_image` (
  `ID_image` smallint(5) NOT NULL AUTO_INCREMENT,
  `Name_image` mediumtext NOT NULL,
  `Complaint_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_image`),
  KEY `Complaint_ID` (`Complaint_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_image`
--

LOCK TABLES `dcs_image` WRITE;
/*!40000 ALTER TABLE `dcs_image` DISABLE KEYS */;
INSERT INTO `dcs_image` VALUES (1, 'กล่อง.jpg', 'COMP0001');
/*!40000 ALTER TABLE `dcs_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_prefix`
--

DROP TABLE IF EXISTS `dcs_prefix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_prefix` (
  `ID_prefix` smallint(2) NOT NULL AUTO_INCREMENT,
  `Name_prefix` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_prefix`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_prefix`
--

LOCK TABLES `dcs_prefix` WRITE;
/*!40000 ALTER TABLE `dcs_prefix` DISABLE KEYS */;
INSERT INTO `dcs_prefix` VALUES (1, 'นาย'),(2, 'นาง'),(3, 'นางสาว');
/*!40000 ALTER TABLE `dcs_prefix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_reply`
--

DROP TABLE IF EXISTS `dcs_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_reply` (
  `ID_reply` int(10) NOT NULL AUTO_INCREMENT,
  `Feedback` mediumtext NOT NULL,
  `Date_reply` date NOT NULL,
  `Time_reply` time NOT NULL,
  `Complaint_ID` varchar(10) NOT NULL,
  `Admin_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_reply`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_reply`
--

LOCK TABLES `dcs_reply` WRITE;
/*!40000 ALTER TABLE `dcs_reply` DISABLE KEYS */;
INSERT INTO `dcs_reply` VALUES (1, 'ประสานงานแก่เจ้าหน้าที่ที่เกี่ยวข้องเรียบร้อยแล้ว อยู่ระหว่างเรียกพนักงานมาสอบสวน', '2020-10-03', '15:30:00', 'COMP0001', 'AD62160160');
/*!40000 ALTER TABLE `dcs_reply` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-12 14:27:04
