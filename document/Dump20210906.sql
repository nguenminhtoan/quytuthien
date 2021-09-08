-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: quytuthien
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chitiet`
--

DROP TABLE IF EXISTS `chitiet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitiet` (
  `ID_CHITIET` int NOT NULL AUTO_INCREMENT,
  `ID_HOATDONG` int DEFAULT NULL,
  `TEN` varchar(1000) DEFAULT NULL,
  `SOTIEN` bigint DEFAULT NULL,
  `CHUNGTU` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_CHITIET`),
  KEY `FK_FK_HD_CT` (`ID_HOATDONG`),
  CONSTRAINT `FK_FK_HD_CT` FOREIGN KEY (`ID_HOATDONG`) REFERENCES `hoatdong` (`ID_HOATDONG`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=1000000004 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet`
--

LOCK TABLES `chitiet` WRITE;
/*!40000 ALTER TABLE `chitiet` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitiet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gopy`
--

DROP TABLE IF EXISTS `gopy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gopy` (
  `ID_GOPY` int NOT NULL AUTO_INCREMENT,
  `HOTEN` varchar(500) DEFAULT NULL,
  `EMAIL` varchar(500) DEFAULT NULL,
  `NOIDUNG` text,
  `THOIGIAN` datetime DEFAULT NULL,
  `HINHANH_1` varchar(500) DEFAULT NULL,
  `HINHANH_2` varchar(500) DEFAULT NULL,
  `HINHANH_3` varchar(500) DEFAULT NULL,
  `HINHANH_4` varchar(500) DEFAULT NULL,
  `HINHANH_5` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_GOPY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gopy`
--

LOCK TABLES `gopy` WRITE;
/*!40000 ALTER TABLE `gopy` DISABLE KEYS */;
/*!40000 ALTER TABLE `gopy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hinhanh`
--

DROP TABLE IF EXISTS `hinhanh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hinhanh` (
  `ID_HINHANH` int NOT NULL AUTO_INCREMENT,
  `ID_HOATDONG` int DEFAULT NULL,
  `PATH` varchar(500) DEFAULT NULL,
  `THOIGIAN` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_HINHANH`),
  KEY `FK_FK_HD_HA` (`ID_HOATDONG`),
  CONSTRAINT `FK_FK_HD_HA` FOREIGN KEY (`ID_HOATDONG`) REFERENCES `hoatdong` (`ID_HOATDONG`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=1000000000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hinhanh`
--

LOCK TABLES `hinhanh` WRITE;
/*!40000 ALTER TABLE `hinhanh` DISABLE KEYS */;
/*!40000 ALTER TABLE `hinhanh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoatdong`
--

DROP TABLE IF EXISTS `hoatdong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoatdong` (
  `ID_HOATDONG` int NOT NULL AUTO_INCREMENT,
  `ID_TUTHIEN` int DEFAULT NULL,
  `ID_NGUOIDUNG` int DEFAULT NULL,
  `TEN` varchar(1000) DEFAULT NULL,
  `BATDAU` date DEFAULT NULL,
  `KETTHUC` date DEFAULT NULL,
  `MOTA` text,
  PRIMARY KEY (`ID_HOATDONG`),
  KEY `FK_FK_ND_HD` (`ID_NGUOIDUNG`),
  KEY `FK_FK_TT_HD` (`ID_TUTHIEN`),
  CONSTRAINT `FK_FK_ND_HD` FOREIGN KEY (`ID_NGUOIDUNG`) REFERENCES `nguoidung` (`ID_NGUOIDUNG`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_FK_TT_HD` FOREIGN KEY (`ID_TUTHIEN`) REFERENCES `tuthien` (`ID_TUTHIEN`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=1000000003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoatdong`
--

LOCK TABLES `hoatdong` WRITE;
/*!40000 ALTER TABLE `hoatdong` DISABLE KEYS */;
/*!40000 ALTER TABLE `hoatdong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nguoidung` (
  `ID_NGUOIDUNG` int NOT NULL AUTO_INCREMENT,
  `NGU_ID_NGUOIDUNG` int DEFAULT NULL,
  `HOTEN` varchar(500) DEFAULT NULL,
  `SDT` varchar(500) DEFAULT NULL,
  `EMAIL` varchar(500) DEFAULT NULL,
  `DIACHI` varchar(1000) DEFAULT NULL,
  `HINHANH` varchar(600) DEFAULT NULL,
  `QUYEN` smallint DEFAULT NULL,
  `MATKHAU` varchar(500) DEFAULT NULL,
  `XACTHUC` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_NGUOIDUNG`),
  KEY `FK_FK_ND_CND` (`NGU_ID_NGUOIDUNG`),
  CONSTRAINT `FK_FK_ND_CND` FOREIGN KEY (`NGU_ID_NGUOIDUNG`) REFERENCES `nguoidung` (`ID_NGUOIDUNG`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=1000000008 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nguoidung`
--

LOCK TABLES `nguoidung` WRITE;
/*!40000 ALTER TABLE `nguoidung` DISABLE KEYS */;
INSERT INTO `nguoidung` VALUES (1000000002,NULL,'A42F8359B26CA4BB1FE7230C45605DD0BF9FC4FE6F2A479B9032555E4CF3E4EA','2070E4A5D02B0A056C06E26B32C6023A',NULL,'TP. Hồ Chí Minh','/image/user/user.jpg',0,'$2y$10$aDwa22IXAqm5OjCnDvxXqegtCmedo/wxaXiHIalG9jr2dlCSxedQK',1),(1000000003,NULL,'92A6317C0B71C24F6FFD36A6FAFC12D2','FD77F2E0C6E56ADDEC42E651411C5C0D',NULL,'TP. Hồ Chí Minh','/image/user/user.jpg',0,'$2y$10$09wN/CZDH6bR5s9oMXKJj.pYVF/L1a2zUG3QHswrfnXdMcX/PkEjG',1),(1000000004,NULL,'E3B660D3A6F13F1B48BD68ADDC8CD9434084A625D60D939AC5533096F303FF81','0821F0375971163A814DE43A92AE0F3F',NULL,'TP. Hồ Chí Minh','/image/user/user.jpg',0,'$2y$10$cXxx4ASXGNiiLoSZ3tcxze.b0vIyqE6m24B4fFbLASl4YZkkX4wK2',1),(1000000005,NULL,'ED22AC1812156FC9CB30CEF9C378E20D','25CECD036A19644B179304F725626E1A',NULL,'TP. Hồ Chí Minh','/image/user/user.jpg',0,'$2y$10$eEuYh6uQSCu8sur2Hdu9quFdNUXdf.CjaJlDUGzg3e4b6ASCerhJK',1),(1000000006,NULL,'B433A8B619A551F40BDD98AFA2522586','3C7741057FBC43D2DC8A71602240F169',NULL,'TP. Hồ Chí Minh','/image/user/user.jpg',0,'$2y$10$HSMnHNGi0oBxRCoDdoTGWenbyec1gkjkIW1LlFLm3qOCm6/T00Qn2',1);
/*!40000 ALTER TABLE `nguoidung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nguoithamgia`
--

DROP TABLE IF EXISTS `nguoithamgia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nguoithamgia` (
  `ID_THAMGIA` int NOT NULL AUTO_INCREMENT,
  `HOTEN` varchar(500) DEFAULT NULL,
  `SDT` varchar(500) DEFAULT NULL,
  `EMAIL` varchar(500) DEFAULT NULL,
  `GHICHU` text,
  `HINHANH` varchar(600) DEFAULT NULL,
  `NGAYTAO` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_THAMGIA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nguoithamgia`
--

LOCK TABLES `nguoithamgia` WRITE;
/*!40000 ALTER TABLE `nguoithamgia` DISABLE KEYS */;
INSERT INTO `nguoithamgia` VALUES (1,'4084A625D60D939AC5533096F303FF81','D2ED082138BEC94FB130F65A03DCFCF0',NULL,NULL,NULL,'2021-09-05 18:02:26'),(2,'4084A625D60D939AC5533096F303FF81','D2ED082138BEC94FB130F65A03DCFCF0',NULL,NULL,NULL,'2021-09-05 18:02:47'),(3,'4084A625D60D939AC5533096F303FF81','D2ED082138BEC94FB130F65A03DCFCF0',NULL,NULL,NULL,'2021-09-05 18:03:26');
/*!40000 ALTER TABLE `nguoithamgia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quyengop`
--

DROP TABLE IF EXISTS `quyengop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quyengop` (
  `ID_QUYENGOP` int NOT NULL AUTO_INCREMENT,
  `ID_THAMGIA` int DEFAULT NULL,
  `ID_TUTHIEN` int DEFAULT NULL,
  `TAIKHOAN` varchar(500) DEFAULT NULL,
  `TEN` varchar(1000) DEFAULT NULL,
  `THOIGIAN` datetime DEFAULT NULL,
  `SOTIEN` bigint DEFAULT NULL,
  `XACTHUC` tinyint(1) DEFAULT NULL,
  `HINHANH` varchar(600) DEFAULT NULL,
  `NGAYTAO` datetime DEFAULT NULL,
  `MAGIAODICH` varchar(500) DEFAULT NULL,
  `NOIDUNG` text,
  `NGANHANG` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_QUYENGOP`),
  KEY `FK_FK_TG_QG` (`ID_THAMGIA`),
  CONSTRAINT `FK_FK_TG_QG` FOREIGN KEY (`ID_THAMGIA`) REFERENCES `nguoithamgia` (`ID_THAMGIA`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quyengop`
--

LOCK TABLES `quyengop` WRITE;
/*!40000 ALTER TABLE `quyengop` DISABLE KEYS */;
INSERT INTO `quyengop` VALUES (11,NULL,1000000002,'DAA79DD21994B31394F9B1BE6C6CA1FA','F66BB96E2356D8516ED6A63A30DCFD1C84FCD1272F6907695FAB86C150AE91B4','2021-09-05 00:00:00',4000000,0,'image/1000000002/210905171836.jpg','2021-09-05 17:18:50','','','4084A625D60D939AC5533096F303FF81'),(12,3,1000000002,'CECA2C0D0DC81854DCD909616DA7C1E3','4084A625D60D939AC5533096F303FF81','2021-09-05 00:00:00',40000000,0,'image/1000000002/210905180326.png','2021-09-05 18:03:26','','','4084A625D60D939AC5533096F303FF81');
/*!40000 ALTER TABLE `quyengop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taikhoan` (
  `ID_TUTHIEN` int NOT NULL,
  `MA_TAIKHOAN` varchar(500) NOT NULL,
  `HOTEN` varchar(500) DEFAULT NULL,
  `NGANHANG` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_TUTHIEN`,`MA_TAIKHOAN`),
  CONSTRAINT `FK_FK_TT_TK` FOREIGN KEY (`ID_TUTHIEN`) REFERENCES `tuthien` (`ID_TUTHIEN`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taikhoan`
--

LOCK TABLES `taikhoan` WRITE;
/*!40000 ALTER TABLE `taikhoan` DISABLE KEYS */;
INSERT INTO `taikhoan` VALUES (1000000002,'2C6981BBBCF8E65F34FB6EFE69FF6913','FADB330328AE8487CADA6C7C42EC5A3097588B5574DA67A6ACC151651E25BAB6','6E1C1397E1C2846999073C95C6F4E858'),(1000000003,'882F52C4E19BF4A991430B1A7BC1226E','1456F4F02588687A9B5F5B0892FDDC9AF29DBFD9D530AA7AD3514B3E1DBAC262','5EA1BD0531A38FD265E011ED13C5977EBBDFF2E6536A07AF5A804E61C5BD914A'),(1000000004,'882F52C4E19BF4A991430B1A7BC1226E','1456F4F02588687A9B5F5B0892FDDC9AF29DBFD9D530AA7AD3514B3E1DBAC262','2E798704AC017C0F0C2E698980FB960B786A8A2834359E4247F100F2A6AE825C'),(1000000005,'5B40B0A6ADC1F70AA0B501874984F398','3D820B129AD242CAE5B96D6F5A18700682555DE15D3099F3FEF7D9CE45AB65AB','B5F2CE77BE8539C985DD789A07B142FADE1B44CB46A3B02D2E35FC90941E87BC'),(1000000006,'04BB4872BD8D6B400D542945268BED5B','EFC3789665938CA248BCA294CC84979C5E0A50B5153EE60CE5D4A3AFF7AB6821','F7CFC4DA4E679F1EDB4400FBEC89389B'),(1000000007,'822B7A66BEA4A2DA9DD15CD80458FEE0','D0F33615E99D0CE514A36AA4B47CEBEB54773B6813F6CEA8EF6B3E5ADCF706E6','33059CEA69D3F865EA3CB5AF1CA3C9EF'),(1000000008,'822B7A66BEA4A2DA9DD15CD80458FEE0','D0F33615E99D0CE514A36AA4B47CEBEB54773B6813F6CEA8EF6B3E5ADCF706E6','33059CEA69D3F865EA3CB5AF1CA3C9EF'),(1000000009,'822B7A66BEA4A2DA9DD15CD80458FEE0','D0F33615E99D0CE514A36AA4B47CEBEB54773B6813F6CEA8EF6B3E5ADCF706E6','33059CEA69D3F865EA3CB5AF1CA3C9EF'),(1000000010,'822B7A66BEA4A2DA9DD15CD80458FEE0','D0F33615E99D0CE514A36AA4B47CEBEB54773B6813F6CEA8EF6B3E5ADCF706E6','33059CEA69D3F865EA3CB5AF1CA3C9EF'),(1000000011,'822B7A66BEA4A2DA9DD15CD80458FEE0','D0F33615E99D0CE514A36AA4B47CEBEB54773B6813F6CEA8EF6B3E5ADCF706E6','33059CEA69D3F865EA3CB5AF1CA3C9EF');
/*!40000 ALTER TABLE `taikhoan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tuthien`
--

DROP TABLE IF EXISTS `tuthien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tuthien` (
  `ID_TUTHIEN` int NOT NULL AUTO_INCREMENT,
  `ID_NGUOIDUNG` int DEFAULT NULL,
  `HINHANH` varchar(600) DEFAULT NULL,
  `TENQUY` varchar(500) DEFAULT NULL,
  `BATDAU` date DEFAULT NULL,
  `KETTHUC` date DEFAULT NULL,
  `MOTA` text,
  `SDT` varchar(500) DEFAULT NULL,
  `PHUTRACH` varchar(200) DEFAULT NULL,
  `DIACHI` varchar(1000) DEFAULT NULL,
  `GHICHU` text,
  `XACTHUC` tinyint(1) DEFAULT NULL,
  `NGAYTAO` datetime DEFAULT NULL,
  `LUOCXEM` int DEFAULT '0',
  PRIMARY KEY (`ID_TUTHIEN`),
  KEY `FK_FK_ND_TT` (`ID_NGUOIDUNG`),
  CONSTRAINT `FK_FK_ND_TT` FOREIGN KEY (`ID_NGUOIDUNG`) REFERENCES `nguoidung` (`ID_NGUOIDUNG`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=1000000018 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tuthien`
--

LOCK TABLES `tuthien` WRITE;
/*!40000 ALTER TABLE `tuthien` DISABLE KEYS */;
INSERT INTO `tuthien` VALUES (1000000002,1000000002,'/tuthien/1000000002/210904143752.jpg','Quyên góp bà con vùng lũ miền Trung trong đợt lũ năm 2020','2020-10-01','2021-05-01','<p>Hoạt đ&ocirc;ng k&ecirc;u gọi g&acirc;y quỷ để ủng hộ b&agrave; con v&ugrave;ng lũ miền Tr&ugrave;n Nghệ An của Đ&agrave;m Vĩnh Hưng.</p>\r\n<p>Th&ecirc;m v&agrave;i ng&agrave;y nữa thoi!</p>\r\n<p>Cảm l&ugrave;i dứt điểm !</p>\r\n<p>Xắn tay kiếm tiền cứu trợ miền Trung</p>\r\n<p>Miền Trung ơi! Đợi ch&uacute;ng con nh&eacute;!</p>\r\n<p>Sẽ nhanh th&ocirc;i!</p>\r\n<p>Số t&agrave;i khoản quen thuộc lại vang l&ecirc;n tiếng gọi đầy t&igrave;nh nghĩa!</p>\r\n<p>HUỲNH MINH HƯNG</p>\r\n<p>5050508</p>\r\n<p>Ng&acirc;n h&agrave;ng ACB - HCM</p>','2070E4A5D02B0A056C06E26B32C6023A','Đàm Vĩnh Hưng','TP. Hồ Chí Minh','Nghệ sỹ',1,'2021-09-04 14:37:52',0),(1000000003,1000000003,'/tuthien/1000000003/210905055420.jpg','ỦNG HÔ CÔNG NHÂN NGHÈO , BỊ NỢ LƯƠNG Ở BINHG DƯƠNG CÓ TIỀN VỀ QUÊ ĂN TẾT','2020-01-15','2020-01-17','<p>Ng&agrave;y 15/1/2020 Thủy Ti&ecirc;n k&ecirc;u gọi</p>\r\n<p>Nhờ mọi người share gi&uacute;p Ti&ecirc;n th&ocirc;ng tin n&agrave;y để c&ocirc;ng d&acirc;n ngh&egrave;o gặp kh&oacute; khăn bị c&ocirc;ng ty ph&aacute; sản nợ lương thưởng tết c&oacute; tiền ăn tết nh&eacute;. Nhiều anh chị c&ograve;n kh&ocirc;ng c&oacute; tiền đ&oacute;ng tiền trọ mấy th&aacute;ng nay, con c&aacute;i họ ở qu&ecirc; cũng tết n&agrave;y kh&ocirc;ng gặp được ba mẹ :(( đi l&agrave;m xa rất vất v&atilde;&nbsp; xa con c&aacute;i để mong c&oacute; ch&uacute;t tiền, tết nhất c&ograve;n gặp cảnh n&agrave;y nhiều c&ocirc;ng nh&acirc;n khổ qu&aacute; họ c&ograve;n muốn nghĩ quẫn, rất l&agrave; tộ nghiệp.</p>\r\n<p>sau một năm lao động vất v&atilde; v&agrave; c&ocirc;ng nh&acirc;n cảu c&ocirc;ng ty may Xu&acirc;n Hiếu lặng người khi biết tin c&ocirc;ng ty ph&aacute; sản. C&aacute;ch đ&acirc;y v&agrave;i th&aacute;ng, khi c&ocirc;ng ty nợ lương, từ 1.000 c&ocirc;ng nh&acirc;n chỉ c&ograve;n 400 c&ocirc;ng nh&acirc;n chủ yếu l&agrave; những người c&oacute; th&acirc;m ni&ecirc;n l&agrave;m việc h&agrave;ng chục năm tại c&ocirc;ng ty, cố gắng b&aacute;m trụ mong tết c&oacute; ch&uacute;t tiền</p>\r\n<p>nhưng giờ lương cũng khoogn c&oacute;, thưởng tết cũng kh&ocirc;ng, đọc b&agrave;i thấy c&aacute;c anh chị c&ocirc;ng nhận kh&oacute;c v&agrave; t&acirc;m sự chuyện mấy năm rồi kh&ocirc;ng được về qu&ecirc; c&ugrave;ng gia đ&igrave;nh, tết chỉ b&oacute; ch&acirc;n trong 4 bức tường ph&ograve;ng trọ thiếu thốn m&agrave; thương qu&aacute;.</p>\r\n<p>Ai cũng mong c&oacute; c&aacute;i tết đo&agrave;n vi&ecirc;n sum vầy cuộc sống vất v&atilde;, việc về qu&ecirc; đ&oacute;n tết với nhiều c&ocirc;ng nh&acirc;n l&agrave; giấc mơ xa vời.</p>\r\n<p>H&ocirc;m qua Ti&ecirc;n đọc được b&agrave;o b&aacute;o của bạn Phương Ng&acirc;n h&ocirc;m qua v&agrave; nhờ bạn t&igrave;m th&ocirc;ng tin c&aacute;c anh chị c&ocirc;ng nh&acirc;n kh&oacute; khăn n&agrave;y để gi&uacute;p dỡ v&agrave; rất may mắn biết ơn v&agrave; bạn gi&uacute;p đỡ t&igrave;m th&ocirc;ng tin của c&ocirc;ng nh&acirc;n rất nhiệt t&igrave;nh.</p>\r\n<p>Ti&ecirc;n chuyển khoản 200 triệu v&agrave;o số t&agrave;i khoản riền chỉ để d&agrave;nh từ thiện của m&igrave;nh trước, v&agrave; số tiền n&agrave;y cũng kh&ocirc;ng thắm v&agrave;o đ&acirc;u do số lượng c&ocirc;ng nh&acirc;n qu&aacute; lớn, n&ecirc;n mong muốn k&ecirc;u gọi th&ecirc;m mọi người mỗi người 1 &iacute;t ch&uacute;ng ta cũng g&oacute;p gi&oacute; thanhd b&atilde;o để gi&uacute;p đỡ ch&uacute;t tiền tết cho c&ocirc;ng nh&acirc;n ngh&egrave;o gặp kh&oacute; khăn n&agrave;y nh&eacute;</p>\r\n<p>mọi người gi&uacute;p đỡ xin chuyển về số TK</p>\r\n<p>Chủ t&agrave;i khoản: Trần Thị Thủy Ti&ecirc;n</p>\r\n<p>STK: 0181003469746 (0181003495812)</p>\r\n<p>NH: Vietcombank chi nh&aacute;nh Nam S&agrave;i G&ograve;n</p>\r\n<p>V&igrave; thời gian kh&ocirc;ng c&ograve;n nhiều, Ti&ecirc;n sẽ trực tiếp đi ph&aacute;t tiền gi&uacute;p đỡ c&ocirc;ng nh&acirc;n v&agrave;o trước ng&agrave;y 25 &acirc;m lịch, n&ecirc;n sẽ chốt số tiền gi&uacute;p đỡ v&agrave;o s&aacute;ng thứ 6 tuần n&agrave;y, chỉ c&oacute; 3 ng&agrave;y để gi&uacute;p đỡ th&ocirc;i ạ :((</p>\r\n<p>Ch&iacute;nh tay Ti&ecirc;n sẽ trực tiếp mang tiền đi gi&uacute;p c&ocirc;ng nh&acirc;n v&agrave; sẽ quay lại r&otilde; r&agrave;ng minnh bạch để mọi người y&ecirc;n t&acirc;m gi&uacute;p đỡ nh&eacute;.</p>\r\n<p>Cảm ơn cả nh&agrave; nhiều thiệt nhiều v&igrave; sự gi&uacute;p đỡ d&ugrave; l&agrave; share tin hay trực tiếp gi&uacute;p 5 - 100k th&igrave; cũng l&agrave; rất qu&yacute; trong thời điểm n&agrave;y ạ.</p>\r\n<p>&nbsp;</p>','FD77F2E0C6E56ADDEC42E651411C5C0D','THỦY TIÊN','TP. Hồ Chí Minh','Nghệ sỹ',1,'2021-09-05 05:54:20',0),(1000000004,1000000003,'/tuthien/1000000004/210905062739.jpg','Hỗ trợ khắc phục hậu quả thiên lai','2020-10-13','2020-11-02','<p>M&igrave;nh sẽ đi miền Trung</p>\r\n<p>Cả nh&agrave; qua kh&ocirc;ng được, kh&ocirc;ng biết sao m&igrave;nh cứ nhắm mắt l&agrave; thấy h&igrave;nh ảnh lũ lụt miền trung lẫn quẩn trong đầu. đi sẽ rất vất v&atilde;, v&igrave; 1 khi m&agrave; m&igrave;nh đ&atilde; l&agrave;m g&igrave; th&igrave; m&igrave;nh cứ hay phải tự tay l&agrave;m tới nơi tới chốn n&ecirc;n chả biết sức m&igrave;nh c&oacute; chịu nổi hay kh&ocirc;ng... m&agrave; kh&ocirc;ng l&agrave;m th&igrave; trong l&ograve;ng n&oacute; cứ ray rức ngủ kh&ocirc;ng được khổ t&acirc;m hết sức :((</p>\r\n<p>Đợt n&agrave;y m&igrave;nh theo d&otilde;i thấy ngo&agrave;i lũ lụt ra th&igrave; miền trung lại chuẩn bị c&oacute; b&atilde;o tiếp tục, n&ecirc;n c&oacute; thể đồng b&agrave;o miền trung m&igrave;nh sẽ c&ograve;n tan hoang nữa, n&ecirc;n sau kho suy nghĩ cả đểm, m&igrave;nh quyết định sẽ bỏ bớt c&ocirc;ng việc đi ra gi&uacute;p đỡ ca chia sẽ c&ugrave;ng người d&acirc;n miền trung 1 phần n&agrave;o đ&oacute; kh&oacute; khăn.</p>\r\n<p>Mọi người c&ugrave;ng ch&uacute;ng tay với Ti&ecirc;n th&igrave; h&atilde;y chuyển khoản v&agrave;o t&igrave;a khoản n&agrave;y nh&eacute;</p>\r\n<p>Số TK 0181003469746</p>\r\n<p>Chủ TK : Trần Thị Thủy Ti&ecirc;n</p>\r\n<p>NH: Vieetcombank</p>\r\n<p>Sau lũ v&agrave; b&atilde;o trong v&agrave;i ng&agrave;y tới th&igrave; Ti&ecirc;n sẽ nhờ 1 người anh em đi tiền trạm thực tế trước c&aacute;c nơi Huế, Quảng B&igrave;nh, Quảng trị như lần gi&uacute;p đỡ miền trung b&atilde;o v&agrave; lũ lụt 2 năm trước. Sau đ&oacute; Ti&ecirc;n sẽ l&ecirc;n kế hoạch v&agrave; th&ocirc;ng b&aacute;o r&otilde; r&agrave;ng Ti&ecirc;n sẽ đến những đ&acirc;u v&agrave; l&agrave;m những g&igrave; để mọi người y&ecirc;n l&ograve;ng nh&eacute;.</p>\r\n<p>Nếu c&aacute;c bạn c&oacute; cần k&ecirc;u gọi sự gi&uacute;p đỡ kh&oacute; khắn từ nơi m&igrave;nh đang sống th&igrave; cứ nhắn tin cho Ti&ecirc;n nh&eacute;.</p>\r\n<p>Cảm ơn mọi người đ&atilde; đọc tin v&agrave; chia sẻ th&ocirc;ng tin n&agrave;y đến nhiều người biết gi&uacute;p đỡ hơn</p>\r\n<p>&nbsp;Ti&ecirc;n v&ocirc; c&ugrave;ng biết ơn sự đ&oacute;ng g&oacute;p d&ugrave; l&agrave; nhỏ nhất ạ &lt;3</p>','FD77F2E0C6E56ADDEC42E651411C5C0D','THỦY TIÊN -  CÔNG VINH','TP. Hồ Chí Minh','NGHỆ SỸ',1,'2021-09-05 06:27:39',0),(1000000005,1000000004,'/tuthien/1000000005/210905064950.jpg','Kêu gọi các mạnh thường quân ủng hộ tiền cứu trợ bà con miền Trung','2020-10-15','2020-10-18','<p>S&aacute;ng giờ tui coi c&aacute;i clip n&agrave;y tui x&oacute;t qu&aacute;! Th&agrave;nh Cry lại cry nữa rồi! Q&uacute;a mệt!!!</p>\r\n<p>Ch&uacute;ng ta h&atilde;y chung tay g&oacute;p sức, mỗi người chia sẻ 1 &iacute;t cho b&agrave; con miền Trung nha qu&yacute; vị. Em sẽ mang xuống dưới cho người ta. Khổ g&igrave; m&agrave; khổ dữ vậy. Thi&ecirc;n nhi&ecirc;n đối xử teeh với b&agrave; con miền Trung tui qu&aacute;! Thấy thương! Mỗi năm mỗi bị. kh&ocirc;ng biết bao giờ mới dứt!</p>\r\n<p>Ri&ecirc;ng em xung phong g&oacute;p 300 triệu trước! b&agrave; con mỗi người phụ em 1 tay. Gửi về t&agrave;i khoản của em:</p>\r\n<p>007100 1121 888</p>\r\n<p>Huỳnh Trấn Th&agrave;nh</p>\r\n<p>Ng&acirc;n h&agrave;ng Vietcombank tp.HCM</p>\r\n<p>Em hứa sẽ gửi h&ecirc;t cho b&agrave; con ở dưới, kh&ocirc;ng ăn 1 đồng n&agrave;o! lời hứa ch&acirc;n th&agrave;nh cảu Th&agrave;nh Cry.</p>\r\n<p>Mọi người ơi!!!</p>\r\n<p>Gi&uacute;p đỡ đồng n&agrave;o miền Trung n&agrave;o!!!</p>\r\n<p>P/s:</p>\r\n<p>H&ocirc;m nay l&agrave; ng&agrave;y 15/10/20. Em sẽ tổng kết tiền sau 3 ngảy đăng stt n&agrave;y.</p>\r\n<p>Hết 18/10/20 em kh&ocirc;ng nh&acirc;n nữa. Mấy anh chị đừng chuyển nữa nha. V&igrave; s&aacute;ng 19 em cho chuyển tiền đi miền Trung.</p>\r\n<p>Ai kh&ocirc;ng c&oacute; &yacute; chuyển sau ng&agrave;y đ&oacute;, em sẻ x&agrave;i số tiền c&ograve;n lại cho mấy c&ocirc; ch&uacute; nghệ sũ neo đơn như Mạc Can, c&ocirc; Ho&agrave;ng Lan v.v.....</p>\r\n<p>Vậy nha!!!!!!! S&aacute;ng 19 em sẻ th&ocirc;ng b&aacute;o coi nh&agrave; m&igrave;nh g&oacute;p dc bao nhi&ecirc;u! Cảm on cả nh&agrave; đ&atilde; tin tưởng Th&agrave;nh Cry!</p>','0821F0375971163A814DE43A92AE0F3F','MC TRẤN THÀNH','TP. Hồ Chí Minh','NGHỆ SỸ',1,'2021-09-05 06:49:50',0),(1000000006,1000000005,'/tuthien/1000000006/210905071257.jpg','Kêu gọi ủng hộ người dân vùng lũ - hướng về Miền Trung','2020-10-20','2020-11-11','<p>K&Iacute;NH THƯA QU&Yacute; VỊ</p>\r\n<p>LINH đ&atilde; đọc những b&igrave;nh luận của Q&uacute;y Vị trong những b&agrave;i đăng của Linh. Xin cảm ơn những &yacute; kiến đ&oacute;ng g&oacute;p thật hữu hiệu v&agrave; qu&yacute; b&aacute;o của qu&yacute; vị để Linh c&oacute; th&ecirc;m nhiều th&ocirc;ng tin về chuyến thiện ngyện chung của đại gia đ&igrave;nh ch&uacute;ng ta. Số tiền hiện tại l&agrave; T&acirc;m, sức của mọi người từ&nbsp; trong nước, đền Kiều B&agrave;o sinh sống v&agrave; lam việc ở nước ngo&agrave;i, lu&ocirc;n hướng về miền Trung, Ch&uacute;ng ta sẽ cố gắng d&ugrave;ng số tiền n&agrave;y một c&aacute;ch hiệu quả nhất d&ugrave; chỉ 1000 đồng. Ch&uacute;ng ta n&ecirc;n ưu ti&ecirc;n cho c&aacute;c gia đ&igrave;nh kh&oacute; khăn, nhất l&agrave; những gia đ&igrave;nh v&ugrave;ng s&acirc;u, v&ugrave;ng xa v&agrave; đồng b&agrave;o c&aacute;c D&acirc;n Tộc miền n&uacute;i, tr&aacute;nh trường hợp những nơi được hỗ trợ qu&aacute; nhiều, c&ograve;n những nơi lại &iacute;t người đến. Linh xin ph&eacute;p Q&uacute;y Vị chưa đi vội, v&igrave; Linh c&ograve;n xin th&ecirc;m sự đồng h&agrave;nh của những c&ocirc;ng ty m&agrave; Linh đ&atilde; v&agrave; đang l&agrave;m việc v&igrave; ch&uacute;ng ta đ&atilde; x&aacute;c định l&agrave; khắc phục hậu quả sau b&atilde;o, lũ. C&agrave;ng th&ecirc;m được nhiều sự chung tay, th&igrave; B&agrave;, Con miền Trung m&igrave;nh c&agrave;ng được nhiều sự an ủi cả về tinh thần lẫn vật chất. Bỏi qu&aacute; nhiều mất m&aacute;t đau thương. Một lần nữa cảm ơn Q&uacute;y Vị. Cầu xin ơn tr&ecirc;n lu&ocirc;n ban ph&uacute;c cho Q&uacute;y Vị v&agrave; gian đ&igrave;nh. Xin Q&uacute;y Vị hiệp &yacute; cầu nguyện cho Miền Trung ,mạnh mẽ vượt qua kh&oacute; khăn m&ugrave;a b&atilde;o lũ n&agrave;y.</p>\r\n<p>Mọi sự ủng hộ xin Q&uacute;y Vị gửi về tk:</p>\r\n<p>V&Otilde; NGUYỄN HO&Agrave;I LINH&nbsp; số Tk 0860158163686&nbsp; ng&acirc;n h&agrave;ng MBbank. tpHM</p>','25CECD036A19644B179304F725626E1A','HOÀI LINH','TP. Hồ Chí Minh','NGHỆ SỸ',1,'2021-09-05 07:12:57',0),(1000000007,1000000006,'/tuthien/1000000007/210905074844.jpg','Chương trình tặng quà cho các anh em biên phòng tiếp tục sẽ đến với vùng Tịnh Biên- An Giang','2021-05-05','2021-05-09','<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Chương tr&igrave;nh tặng qu&agrave; cho c&aacute;c anh em bi&ecirc;n ph&ograve;ng tiếp tục sẽ đến với v&ugrave;ng Tịnh Bi&ecirc;n- An Giang. C&oacute; tất cả 55 chốt bi&ecirc;n ph&ograve;ng tại đ&acirc;y.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Các chốt trên Tịnh Biên kh&ocirc;ng giống ở An Phú. Có 26 chốt có 4_5 chiến sĩ. Có 25 chốt có từ 8_11 chiến sĩ và 4 tổ cơ động ( mỗi tổ có 10 chiến sĩ)</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&aacute;c phần qu&agrave; gồm :</div>\r\n<div dir=\"auto\">_15 bếp gas 3.750.000₫</div>\r\n<div dir=\"auto\">_12 thùng khẩu trang, mỗi th&ugrave;ng 50 hộp, mỗi hộp 50 c&aacute;i : 15.600.000₫</div>\r\n<div dir=\"auto\">_55 cái đèn pin : 12.650.000₫</div>\r\n<div dir=\"auto\">_30 cái đèn năng lượng 200w pin dự trữ 20 giờ : 40.500.000₫</div>\r\n<div dir=\"auto\">_ 84 bao gạo , mỗi bao 50kg : 50.400.000₫</div>\r\n<div dir=\"auto\">_ 55 phần các nhu yếu phẩm : 43.835.000₫</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">*Tổng: 166.735.000₫</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">V&igrave; số lượng anh em ở mỗi chốt nhiều &iacute;t kh&aacute;c nhau v&agrave; nhu cầu cũng kh&aacute;c nhau n&ecirc;n c&aacute;c phần như gạo cũng kh&aacute;c. Chốt &iacute;t người m&igrave;nh gởi 50kg gạo, chốt đ&ocirc;ng người m&igrave;nh gởi 100kg gạo.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">P/S: ng&agrave;y 9/5 n&agrave;y sẽ tặng qu&agrave; cho 80 chốt bi&ecirc;n ph&ograve;ng tại An Ph&uacute; trước c&aacute;c bạn nh&eacute;</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Mọi đ&oacute;ng g&oacute;p xin gởi về t&agrave;i khoản B&Ugrave;I ĐẠI NGHĨA, ng&acirc;n h&agrave;ng Vietcombank chi nh&aacute;nh Kỳ Đồng</div>\r\n<div dir=\"auto\">Số TK : ‪0721000599682</div>\r\n<div dir=\"auto\">‬</div>\r\n<div dir=\"auto\">C&aacute;m ơn c&aacute;c bạn nhiều <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','Tk An Vui','TP. Hồ Chí Minh','Nghệ sỹ',1,'2021-09-05 07:48:44',0),(1000000008,1000000006,'/tuthien/1000000008/210905075421.jpg','vận động cho chương trình tặng quà cho người dân ở Vaishali bang Bihar - Ấn Độ','2020-04-26','2020-04-27','<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&oacute; điều n&agrave;y Nghĩa muốn chia sẻ với c&aacute;c bạn <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nghĩa biết rằng b&agrave; con ch&uacute;ng ta vẫn c&ograve;n nhiều nơi kh&oacute; khăn cần được ch&uacute;ng ta gi&uacute;p đỡ lắm, dịch bệnh ở nước ta vẫn c&ograve;n. Nhưng những ng&agrave;y qua theo d&otilde;i tin tức c&aacute;c bạn cũng biết rằng Ấn Độ đang khủng hoảng bởi dịch bệnh lan tr&agrave;n. Nh&igrave;n những đống lửa thi&ecirc;u x&aacute;c người san s&aacute;t nhau tr&ecirc;n những b&atilde;i đất trống thật th&ecirc; lương , h&igrave;nh ảnh l&ograve; thi&ecirc;u ng&ugrave;n ngụt kh&oacute;i lửa ng&agrave;y đ&ecirc;m, chắc hẳn ch&uacute;ng ta cũng kh&ocirc;ng khỏi động l&ograve;ng.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nhận được t&acirc;m thư của Ni viện Kiều Đ&agrave;m Di tại bang Bihar của Ấn Độ, k&ecirc;u gọi để hỗ trợ lương thực cho c&aacute;c gia đ&igrave;nh tại Vaisali v&agrave; Bihar, Nghĩa cũng rất đắn đo c&acirc;n nhắc v&igrave; biết rằng b&agrave; con của m&igrave;nh vẫn c&ograve;n chưa được gi&uacute;p hết th&igrave; giờ lại đi gi&uacute;p đỡ cho những người ở một đất nước xa x&ocirc;i kh&aacute;c. V&agrave; nếu c&oacute; gi&uacute;p m&igrave;nh cũng chỉ gi&uacute;p được một ch&uacute;t n&agrave;o đ&oacute;, chỉ như muối bỏ bể. Nhưng c&ugrave;ng l&agrave; con người với nhau, nh&igrave;n t&igrave;nh cảnh của họ như vậy Nghĩa thật sự đau l&ograve;ng n&ecirc;n nếu nhắm mắt l&agrave;m ngơ th&igrave; cũng kh&ocirc;ng nỡ.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">N&ecirc;n nay Nghĩa chia sẻ những điều n&agrave;y, hi vọng c&aacute;c bạn cũng đồng cảm để ch&uacute;ng ta gi&uacute;p đỡ cho họ được phần n&agrave;o trong khả năng của m&igrave;nh, một miếng khi đ&oacute;i bằng một g&oacute;i khi no vậy.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&aacute;c sư c&ocirc; xin Tk An Vui hỗ trợ 3000 phần lương thực để ph&aacute;t cho mọi người, mỗi phần chỉ c&oacute; 5kg gạo v&agrave; 5kg bột m&igrave;, tổng cộng 130.000₫/phần (một số nhu yếu phẩm kh&aacute;c nữa th&igrave; c&aacute;c sư c&ocirc; tự vận động th&ecirc;m)</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nghĩa xin được đ&oacute;ng g&oacute;p trước 10.000.000₫ cho chương tr&igrave;nh lần n&agrave;y c&aacute;c bạn nh&eacute;.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">P/S: c&aacute;c bạn đọc t&acirc;m thư của Ni viện Kiều Đ&agrave;m Di để hiểu r&otilde; hơn nh&eacute;.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Mọi đ&oacute;ng g&oacute;p xin gởi về t&agrave;i khoản B&Ugrave;I ĐẠI NGHĨA, ng&acirc;n h&agrave;ng Vietcombank chi nh&aacute;nh Kỳ Đồng</div>\r\n<div dir=\"auto\">Số TK : ‪0721000599682</div>\r\n<div dir=\"auto\">‬</div>\r\n<div dir=\"auto\">C&aacute;m ơn c&aacute;c bạn nhiều <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','Đại Nghĩa','TP. Hồ Chí Minh','Nghệ sỹ',1,'2021-09-05 07:54:21',0),(1000000009,1000000006,'/tuthien/1000000009/210905075856.jpg','vận động cho chương trình tặng quà cho người dân ở Vaishali bang Bihar - Ấn Độ','2020-04-26','2020-04-30','<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&oacute; điều n&agrave;y Nghĩa muốn chia sẻ với c&aacute;c bạn <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nghĩa biết rằng b&agrave; con ch&uacute;ng ta vẫn c&ograve;n nhiều nơi kh&oacute; khăn cần được ch&uacute;ng ta gi&uacute;p đỡ lắm, dịch bệnh ở nước ta vẫn c&ograve;n. Nhưng những ng&agrave;y qua theo d&otilde;i tin tức c&aacute;c bạn cũng biết rằng Ấn Độ đang khủng hoảng bởi dịch bệnh lan tr&agrave;n. Nh&igrave;n những đống lửa thi&ecirc;u x&aacute;c người san s&aacute;t nhau tr&ecirc;n những b&atilde;i đất trống thật th&ecirc; lương , h&igrave;nh ảnh l&ograve; thi&ecirc;u ng&ugrave;n ngụt kh&oacute;i lửa ng&agrave;y đ&ecirc;m, chắc hẳn ch&uacute;ng ta cũng kh&ocirc;ng khỏi động l&ograve;ng.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nhận được t&acirc;m thư của Ni viện Kiều Đ&agrave;m Di tại bang Bihar của Ấn Độ, k&ecirc;u gọi để hỗ trợ lương thực cho c&aacute;c gia đ&igrave;nh tại Vaisali v&agrave; Bihar, Nghĩa cũng rất đắn đo c&acirc;n nhắc v&igrave; biết rằng b&agrave; con của m&igrave;nh vẫn c&ograve;n chưa được gi&uacute;p hết th&igrave; giờ lại đi gi&uacute;p đỡ cho những người ở một đất nước xa x&ocirc;i kh&aacute;c. V&agrave; nếu c&oacute; gi&uacute;p m&igrave;nh cũng chỉ gi&uacute;p được một ch&uacute;t n&agrave;o đ&oacute;, chỉ như muối bỏ bể. Nhưng c&ugrave;ng l&agrave; con người với nhau, nh&igrave;n t&igrave;nh cảnh của họ như vậy Nghĩa thật sự đau l&ograve;ng n&ecirc;n nếu nhắm mắt l&agrave;m ngơ th&igrave; cũng kh&ocirc;ng nỡ.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">N&ecirc;n nay Nghĩa chia sẻ những điều n&agrave;y, hi vọng c&aacute;c bạn cũng đồng cảm để ch&uacute;ng ta gi&uacute;p đỡ cho họ được phần n&agrave;o trong khả năng của m&igrave;nh, một miếng khi đ&oacute;i bằng một g&oacute;i khi no vậy.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&aacute;c sư c&ocirc; xin Tk An Vui hỗ trợ 3000 phần lương thực để ph&aacute;t cho mọi người, mỗi phần chỉ c&oacute; 5kg gạo v&agrave; 5kg bột m&igrave;, tổng cộng 130.000₫/phần (một số nhu yếu phẩm kh&aacute;c nữa th&igrave; c&aacute;c sư c&ocirc; tự vận động th&ecirc;m)</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nghĩa xin được đ&oacute;ng g&oacute;p trước 10.000.000₫ cho chương tr&igrave;nh lần n&agrave;y c&aacute;c bạn nh&eacute;.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">P/S: c&aacute;c bạn đọc t&acirc;m thư của Ni viện Kiều Đ&agrave;m Di để hiểu r&otilde; hơn nh&eacute;.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Mọi đ&oacute;ng g&oacute;p xin gởi về t&agrave;i khoản B&Ugrave;I ĐẠI NGHĨA, ng&acirc;n h&agrave;ng Vietcombank chi nh&aacute;nh Kỳ Đồng</div>\r\n<div dir=\"auto\">Số TK : ‪0721000599682</div>\r\n<div dir=\"auto\">‬</div>\r\n<div dir=\"auto\">C&aacute;m ơn c&aacute;c bạn nhiều <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','Đại Nghĩa','TP. Hồ Chí Minh','Nghệ sỹ',1,'2021-09-05 07:58:56',0),(1000000010,1000000006,'/tuthien/1000000010/210905080935.jpg','Giúp bé Nguyễn Hoàng Minh ( SN 2020) mổ tim gấp các bạn nhé','2021-03-18','2021-03-19','<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Gi&uacute;p b&eacute; Nguyễn Ho&agrave;ng Minh ( SN 2020) mổ tim gấp c&aacute;c bạn nh&eacute;</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Đang tr&ecirc;n đường từ Vĩnh Long về, nhận được tin nhắn của một chị bạn xin hỗ trợ gấp cho b&eacute; Minh mổ tim v&agrave;o tuần sau. B&eacute; bị tim nặng v&agrave; cần mổ c&agrave;ng sớm c&agrave;ng tốt. Chị nhắn xin hỗ trợ số tiền 60.000.000₫. Thật l&ograve;ng ban đầu Nghĩa cũng rất kh&oacute; xử v&igrave; như Nghĩa đ&atilde; n&oacute;i hiện Tk An Vui ch&uacute;ng ta đang thiếu hụt khi đang thực hiện những dự &aacute;n lớn n&ecirc;n đ&atilde; ngưng tiếp nhận những c&ocirc;ng tr&igrave;nh mới.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nhưng đ&acirc;y kh&ocirc;ng phải l&agrave; một c&ocirc;ng tr&igrave;nh, đ&acirc;y l&agrave; một em b&eacute;....<span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/t33/1.5/16/2665.png\" alt=\"&hearts;️\" width=\"16\" height=\"16\" /></span></div>\r\n<div dir=\"auto\">Nếu kh&ocirc;ng gi&uacute;p th&igrave; cứ cảm thấy l&ograve;ng dạ bứt rứt lắm, v&igrave; vậy Nghĩa đ&atilde; nhận lời hỗ trợ để b&eacute; nhập viện c&aacute;c bạn nh&eacute;. Mong c&aacute;c bạn hiểu v&agrave; chia sẻ với Nghĩa nha.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Mọi đ&oacute;ng g&oacute;p xin gởi về t&agrave;i khoản B&Ugrave;I ĐẠI NGHĨA, ng&acirc;n h&agrave;ng Vietcombank chi nh&aacute;nh Kỳ Đồng</div>\r\n<div dir=\"auto\">Số TK : ‪0721000599682</div>\r\n<div dir=\"auto\">‬</div>\r\n<div dir=\"auto\">C&aacute;m ơn c&aacute;c bạn nhiều <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','Đại Nghĩa','TP. Hồ Chí Minh','Nghệ sỹ',1,'2021-09-05 08:09:35',0),(1000000011,1000000006,'/tuthien/1000000011/210905115505.jpg','Quyên góp ủng hộ TK AN VUI giúp đỡ các hoàn cảnh khó khăn','2021-04-01','2021-08-31','<p>D&ugrave;ng số tiền n&agrave;y để hỗ trợ c&aacute;c ho&agrave;n cảnh kh&oacute; khăn cũng như hỗ trợ c&aacute;c b&agrave; con trong m&ugrave;a dịch Covid về lương thực, thực phẩm, (520kg gạo, trứng , thuốc, ch&aacute;o , sữa), bộ đồ bảo hộ y tế, b&igrave;nh oxy. v.v.v</p>\r\n<div>\r\n<div id=\"jsc_c_1g1\" class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div>\r\n<div class=\"sonix8o1\">\r\n<div>\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/240349269_6600872429926675_658335881820166606_n.jpg?_nc_cat=107&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=QtPwRUFbD6sAX-v3HED&amp;tn=o42m80GbD_cxHc7g&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=137a7c7259d815b35b0251cdd10d980a&amp;oe=615A9670\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s r9n4d945\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/231438285_6600872459926672_1369889946713901401_n.jpg?_nc_cat=102&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=O4c8ms4B5hwAX-ekE3R&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=ab6dc991b07fff00049e81e56ed3d63f&amp;oe=615BF737\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div class=\"stjgntxs ni8dbmo4 l82x9zwi uo3d90p7 h905i5nu monazrh9\" data-visualcompletion=\"ignore-dynamic\">\r\n<div class=\"tvfksri0 ozuftl9m\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 pfnyh3mw i1fnvgqd gs1a9yip owycx6da btwxx1t3 ph5uu5jm b3onmgus e5nlhep0 ecm0bbzt nkwizq5d roh60bw9 mysgfdmx hddg9phg\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 cbu4d94t g5gj957u d2edcug0 hpfvmrgz rj1gh0hx buofh1pr n8tt0mok hyh9befq iuny7tx3 ipjc6fyt\">\r\n<div class=\"oajrlxb2 gs1a9yip g5ia77u1 mtkw9kbi tlpljxtp qensuy8j ppp5ayq2 goun2846 ccm00jje s44p3ltw mk2mc5f4 rt8b4zig n8ej3o3l agehan2d sk4xxmp2 rq0escxv nhd2j8a9 pq6dq46d mg4g778l btwxx1t3 pfnyh3mw p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso l9j0dhe7 i1ao9s8h esuyzwwr f1sip0of du4w35lb lzcic4wl abiwlrkh p8dawk7l\" tabindex=\"0\" role=\"button\" aria-label=\"Gửi nội dung n&agrave;y đến bạn b&egrave; hoặc đăng tr&ecirc;n d&ograve;ng thời gian của bạn.\">\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s rnr61an3\" data-visualcompletion=\"ignore\">\r\n<div>\r\n<div id=\"jsc_c_wn\" class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div>\r\n<div>\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/240366217_6613785125302072_1560006039727797150_n.jpg?_nc_cat=102&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=z03FcFPaU0UAX9es_3E&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=b3e401fb7e77957bbe9ef1d8890abd0b&amp;oe=6158F9D2\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s r9n4d945\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/p720x720/239782152_6613785815302003_2263432542605577927_n.jpg?_nc_cat=111&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=LjqUsqDW6X4AX8aBLv8&amp;_nc_ht=scontent-hkg4-2.xx&amp;oh=c17c65fc3028ebee84866c9e9baf6c77&amp;oe=615B0AF1\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/234136788_6613785581968693_1684548858918537830_n.jpg?_nc_cat=103&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=UgFAOYtEXgsAX95Wl3c&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=b1ae0f9f765f4b7aa0534f895b1fbd0e&amp;oe=615A8442\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/240391484_6613786031968648_7876627107647738784_n.jpg?_nc_cat=107&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=BDx4XbaNGDYAX-DkUsF&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=064d89d8df2cf4edebaf6217253f9dd7&amp;oe=6159E544\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/234160202_6613787308635187_6673485427008730858_n.jpg?_nc_cat=103&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=EH7i2EGJkSUAX9ikja-&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=4f1b6bd38cd9ed69f4b2f1b3fa9c1c10&amp;oe=615BA7D2\" alt=\"\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div class=\"stjgntxs ni8dbmo4 l82x9zwi uo3d90p7 h905i5nu monazrh9\" data-visualcompletion=\"ignore-dynamic\">\r\n<div>\r\n<div>\r\n<div class=\"tvfksri0 ozuftl9m\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 pfnyh3mw i1fnvgqd gs1a9yip owycx6da btwxx1t3 ph5uu5jm b3onmgus e5nlhep0 ecm0bbzt nkwizq5d roh60bw9 mysgfdmx hddg9phg\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 cbu4d94t g5gj957u d2edcug0 hpfvmrgz rj1gh0hx buofh1pr n8tt0mok hyh9befq iuny7tx3 ipjc6fyt\">\r\n<div class=\"oajrlxb2 gs1a9yip g5ia77u1 mtkw9kbi tlpljxtp qensuy8j ppp5ayq2 goun2846 ccm00jje s44p3ltw mk2mc5f4 rt8b4zig n8ej3o3l agehan2d sk4xxmp2 rq0escxv nhd2j8a9 pq6dq46d mg4g778l btwxx1t3 pfnyh3mw p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso l9j0dhe7 i1ao9s8h esuyzwwr f1sip0of du4w35lb lzcic4wl abiwlrkh p8dawk7l\" tabindex=\"0\" role=\"button\" aria-label=\"Gửi nội dung n&agrave;y đến bạn b&egrave; hoặc đăng tr&ecirc;n d&ograve;ng thời gian của bạn.\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 g5gj957u rj1gh0hx buofh1pr hpfvmrgz taijpn5t bp9cbjyn owycx6da btwxx1t3 d1544ag0 tw6a2znq jb3vyjys dlv3wnog rl04r1d5 mysgfdmx hddg9phg qu8okrzs g0qnabr5\">&nbsp;</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">\r\n<div>\r\n<div id=\"jsc_c_vn\" class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div>\r\n<div>\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"k4urcfbm l9j0dhe7 datstx6m a8c37x1j du4w35lb\">\r\n<div>&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/239378464_6622267487787169_4008890550061160059_n.jpg?_nc_cat=101&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=CsUY47_5R7EAX_Hcu_K&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=782dd2c57e4f1c8abd0590389dc598df&amp;oe=61599FE5\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/p720x720/239294200_6622267734453811_804755803699927850_n.jpg?_nc_cat=110&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=IH--3s6OlDkAX_40wqe&amp;_nc_ht=scontent-hkg4-2.xx&amp;oh=b451df408ece0984fb6a22f1fced4880&amp;oe=615B6CA7\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/235654255_6622267534453831_1139509328954702457_n.jpg?_nc_cat=100&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=VzshnQcIZPYAX-m2V1a&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=dc81c5bb5d1a2c6b612b8d19d28984ff&amp;oe=6159B4C8\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/p720x720/239430257_6622267921120459_2949247672769292887_n.jpg?_nc_cat=110&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=QOOVTBsFGBkAX86IpVM&amp;tn=o42m80GbD_cxHc7g&amp;_nc_ht=scontent-hkg4-2.xx&amp;oh=ac4baae53a71de81efbbca42d61909a0&amp;oe=61584DD6\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"cwj9ozl2 tvmbv18p\">\r\n<div class=\"\" dir=\"auto\">\r\n<div id=\"jsc_c_ae\" class=\"ecm0bbzt hv4rvrfc ihqw7lf3 dati1w0a\" data-ad-comet-preview=\"message\" data-ad-preview=\"message\">\r\n<div class=\"j83agx80 cbu4d94t ew0dbk1b irj2b8pg\">\r\n<div class=\"qzhwtbm6 knvmm38d\">\r\n<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">BV H&oacute;c M&ocirc;n v&agrave; Trung t&acirc;m Y tế quận 12 đến nhận b&igrave;nh oxy k&egrave;m đồ bảo hộ.</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"jsc_c_af\" class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/p720x720/239849409_6668452573168660_8316522231297264938_n.jpg?_nc_cat=109&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=pcGTji-D8FUAX-zLT9g&amp;_nc_ht=scontent-hkg4-2.xx&amp;oh=2c920935e41a8b5043ed6b310bbc16a0&amp;oe=61594D13\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\">&nbsp;</div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent.fsgn5-5.fna.fbcdn.net/v/t1.6435-9/p720x720/240615766_6668452883168629_3459046694423157049_n.jpg?_nc_cat=100&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=2apMRlLIC-oAX_wgnbi&amp;_nc_oc=AQnxLkLE2YCmDxwD3KObRNd4zvHWD1wYQWAaKm9nc0bq0Y-2fk5cW_mWnWrUf562ch4&amp;_nc_ht=scontent.fsgn5-5.fna&amp;oh=4382a5adad5b9832d2d4720bec9c63a9&amp;oe=615B8A28\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','Tk An Vui','TP. Hồ Chí Minh','Nghệ sỹ',1,'2021-09-05 11:55:05',0);
/*!40000 ALTER TABLE `tuthien` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-06 20:54:26
