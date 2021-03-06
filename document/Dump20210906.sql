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
INSERT INTO `nguoidung` VALUES (1000000002,NULL,'A42F8359B26CA4BB1FE7230C45605DD0BF9FC4FE6F2A479B9032555E4CF3E4EA','2070E4A5D02B0A056C06E26B32C6023A',NULL,'TP. H??? Ch?? Minh','/image/user/user.jpg',0,'$2y$10$aDwa22IXAqm5OjCnDvxXqegtCmedo/wxaXiHIalG9jr2dlCSxedQK',1),(1000000003,NULL,'92A6317C0B71C24F6FFD36A6FAFC12D2','FD77F2E0C6E56ADDEC42E651411C5C0D',NULL,'TP. H??? Ch?? Minh','/image/user/user.jpg',0,'$2y$10$09wN/CZDH6bR5s9oMXKJj.pYVF/L1a2zUG3QHswrfnXdMcX/PkEjG',1),(1000000004,NULL,'E3B660D3A6F13F1B48BD68ADDC8CD9434084A625D60D939AC5533096F303FF81','0821F0375971163A814DE43A92AE0F3F',NULL,'TP. H??? Ch?? Minh','/image/user/user.jpg',0,'$2y$10$cXxx4ASXGNiiLoSZ3tcxze.b0vIyqE6m24B4fFbLASl4YZkkX4wK2',1),(1000000005,NULL,'ED22AC1812156FC9CB30CEF9C378E20D','25CECD036A19644B179304F725626E1A',NULL,'TP. H??? Ch?? Minh','/image/user/user.jpg',0,'$2y$10$eEuYh6uQSCu8sur2Hdu9quFdNUXdf.CjaJlDUGzg3e4b6ASCerhJK',1),(1000000006,NULL,'B433A8B619A551F40BDD98AFA2522586','3C7741057FBC43D2DC8A71602240F169',NULL,'TP. H??? Ch?? Minh','/image/user/user.jpg',0,'$2y$10$HSMnHNGi0oBxRCoDdoTGWenbyec1gkjkIW1LlFLm3qOCm6/T00Qn2',1);
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
INSERT INTO `tuthien` VALUES (1000000002,1000000002,'/tuthien/1000000002/210904143752.jpg','Quy??n g??p b?? con v??ng l?? mi???n Trung trong ?????t l?? n??m 2020','2020-10-01','2021-05-01','<p>Ho???t ??&ocirc;ng k&ecirc;u g???i g&acirc;y qu??? ????? ???ng h??? b&agrave; con v&ugrave;ng l?? mi???n Tr&ugrave;n Ngh??? An c???a ??&agrave;m V??nh H??ng.</p>\r\n<p>Th&ecirc;m v&agrave;i ng&agrave;y n???a thoi!</p>\r\n<p>C???m l&ugrave;i d???t ??i???m !</p>\r\n<p>X???n tay ki???m ti???n c???u tr??? mi???n Trung</p>\r\n<p>Mi???n Trung ??i! ?????i ch&uacute;ng con nh&eacute;!</p>\r\n<p>S??? nhanh th&ocirc;i!</p>\r\n<p>S??? t&agrave;i kho???n quen thu???c l???i vang l&ecirc;n ti???ng g???i ?????y t&igrave;nh ngh??a!</p>\r\n<p>HU???NH MINH H??NG</p>\r\n<p>5050508</p>\r\n<p>Ng&acirc;n h&agrave;ng ACB - HCM</p>','2070E4A5D02B0A056C06E26B32C6023A','????m V??nh H??ng','TP. H??? Ch?? Minh','Ngh??? s???',1,'2021-09-04 14:37:52',0),(1000000003,1000000003,'/tuthien/1000000003/210905055420.jpg','???NG H?? C??NG NH??N NGH??O , B??? N??? L????NG ??? BINHG D????NG C?? TI???N V??? QU?? ??N T???T','2020-01-15','2020-01-17','<p>Ng&agrave;y 15/1/2020 Th???y Ti&ecirc;n k&ecirc;u g???i</p>\r\n<p>Nh??? m???i ng?????i share gi&uacute;p Ti&ecirc;n th&ocirc;ng tin n&agrave;y ????? c&ocirc;ng d&acirc;n ngh&egrave;o g???p kh&oacute; kh??n b??? c&ocirc;ng ty ph&aacute; s???n n??? l????ng th?????ng t???t c&oacute; ti???n ??n t???t nh&eacute;. Nhi???u anh ch??? c&ograve;n kh&ocirc;ng c&oacute; ti???n ??&oacute;ng ti???n tr??? m???y th&aacute;ng nay, con c&aacute;i h??? ??? qu&ecirc; c??ng t???t n&agrave;y kh&ocirc;ng g???p ???????c ba m??? :(( ??i l&agrave;m xa r???t v???t v&atilde;&nbsp; xa con c&aacute;i ????? mong c&oacute; ch&uacute;t ti???n, t???t nh???t c&ograve;n g???p c???nh n&agrave;y nhi???u c&ocirc;ng nh&acirc;n kh??? qu&aacute; h??? c&ograve;n mu???n ngh?? qu???n, r???t l&agrave; t??? nghi???p.</p>\r\n<p>sau m???t n??m lao ?????ng v???t v&atilde; v&agrave; c&ocirc;ng nh&acirc;n c???u c&ocirc;ng ty may Xu&acirc;n Hi???u l???ng ng?????i khi bi???t tin c&ocirc;ng ty ph&aacute; s???n. C&aacute;ch ??&acirc;y v&agrave;i th&aacute;ng, khi c&ocirc;ng ty n??? l????ng, t??? 1.000 c&ocirc;ng nh&acirc;n ch??? c&ograve;n 400 c&ocirc;ng nh&acirc;n ch??? y???u l&agrave; nh???ng ng?????i c&oacute; th&acirc;m ni&ecirc;n l&agrave;m vi???c h&agrave;ng ch???c n??m t???i c&ocirc;ng ty, c??? g???ng b&aacute;m tr??? mong t???t c&oacute; ch&uacute;t ti???n</p>\r\n<p>nh??ng gi??? l????ng c??ng khoogn c&oacute;, th?????ng t???t c??ng kh&ocirc;ng, ?????c b&agrave;i th???y c&aacute;c anh ch??? c&ocirc;ng nh???n kh&oacute;c v&agrave; t&acirc;m s??? chuy???n m???y n??m r???i kh&ocirc;ng ???????c v??? qu&ecirc; c&ugrave;ng gia ??&igrave;nh, t???t ch??? b&oacute; ch&acirc;n trong 4 b???c t?????ng ph&ograve;ng tr??? thi???u th???n m&agrave; th????ng qu&aacute;.</p>\r\n<p>Ai c??ng mong c&oacute; c&aacute;i t???t ??o&agrave;n vi&ecirc;n sum v???y cu???c s???ng v???t v&atilde;, vi???c v??? qu&ecirc; ??&oacute;n t???t v???i nhi???u c&ocirc;ng nh&acirc;n l&agrave; gi???c m?? xa v???i.</p>\r\n<p>H&ocirc;m qua Ti&ecirc;n ?????c ???????c b&agrave;o b&aacute;o c???a b???n Ph????ng Ng&acirc;n h&ocirc;m qua v&agrave; nh??? b???n t&igrave;m th&ocirc;ng tin c&aacute;c anh ch??? c&ocirc;ng nh&acirc;n kh&oacute; kh??n n&agrave;y ????? gi&uacute;p d??? v&agrave; r???t may m???n bi???t ??n v&agrave; b???n gi&uacute;p ????? t&igrave;m th&ocirc;ng tin c???a c&ocirc;ng nh&acirc;n r???t nhi???t t&igrave;nh.</p>\r\n<p>Ti&ecirc;n chuy???n kho???n 200 tri???u v&agrave;o s??? t&agrave;i kho???n ri???n ch??? ????? d&agrave;nh t??? thi???n c???a m&igrave;nh tr?????c, v&agrave; s??? ti???n n&agrave;y c??ng kh&ocirc;ng th???m v&agrave;o ??&acirc;u do s??? l?????ng c&ocirc;ng nh&acirc;n qu&aacute; l???n, n&ecirc;n mong mu???n k&ecirc;u g???i th&ecirc;m m???i ng?????i m???i ng?????i 1 &iacute;t ch&uacute;ng ta c??ng g&oacute;p gi&oacute; thanhd b&atilde;o ????? gi&uacute;p ????? ch&uacute;t ti???n t???t cho c&ocirc;ng nh&acirc;n ngh&egrave;o g???p kh&oacute; kh??n n&agrave;y nh&eacute;</p>\r\n<p>m???i ng?????i gi&uacute;p ????? xin chuy???n v??? s??? TK</p>\r\n<p>Ch??? t&agrave;i kho???n: Tr???n Th??? Th???y Ti&ecirc;n</p>\r\n<p>STK: 0181003469746 (0181003495812)</p>\r\n<p>NH: Vietcombank chi nh&aacute;nh Nam S&agrave;i G&ograve;n</p>\r\n<p>V&igrave; th???i gian kh&ocirc;ng c&ograve;n nhi???u, Ti&ecirc;n s??? tr???c ti???p ??i ph&aacute;t ti???n gi&uacute;p ????? c&ocirc;ng nh&acirc;n v&agrave;o tr?????c ng&agrave;y 25 &acirc;m l???ch, n&ecirc;n s??? ch???t s??? ti???n gi&uacute;p ????? v&agrave;o s&aacute;ng th??? 6 tu???n n&agrave;y, ch??? c&oacute; 3 ng&agrave;y ????? gi&uacute;p ????? th&ocirc;i ??? :((</p>\r\n<p>Ch&iacute;nh tay Ti&ecirc;n s??? tr???c ti???p mang ti???n ??i gi&uacute;p c&ocirc;ng nh&acirc;n v&agrave; s??? quay l???i r&otilde; r&agrave;ng minnh b???ch ????? m???i ng?????i y&ecirc;n t&acirc;m gi&uacute;p ????? nh&eacute;.</p>\r\n<p>C???m ??n c??? nh&agrave; nhi???u thi???t nhi???u v&igrave; s??? gi&uacute;p ????? d&ugrave; l&agrave; share tin hay tr???c ti???p gi&uacute;p 5 - 100k th&igrave; c??ng l&agrave; r???t qu&yacute; trong th???i ??i???m n&agrave;y ???.</p>\r\n<p>&nbsp;</p>','FD77F2E0C6E56ADDEC42E651411C5C0D','TH???Y TI??N','TP. H??? Ch?? Minh','Ngh??? s???',1,'2021-09-05 05:54:20',0),(1000000004,1000000003,'/tuthien/1000000004/210905062739.jpg','H??? tr??? kh???c ph???c h???u qu??? thi??n lai','2020-10-13','2020-11-02','<p>M&igrave;nh s??? ??i mi???n Trung</p>\r\n<p>C??? nh&agrave; qua kh&ocirc;ng ???????c, kh&ocirc;ng bi???t sao m&igrave;nh c??? nh???m m???t l&agrave; th???y h&igrave;nh ???nh l?? l???t mi???n trung l???n qu???n trong ?????u. ??i s??? r???t v???t v&atilde;, v&igrave; 1 khi m&agrave; m&igrave;nh ??&atilde; l&agrave;m g&igrave; th&igrave; m&igrave;nh c??? hay ph???i t??? tay l&agrave;m t???i n??i t???i ch???n n&ecirc;n ch??? bi???t s???c m&igrave;nh c&oacute; ch???u n???i hay kh&ocirc;ng... m&agrave; kh&ocirc;ng l&agrave;m th&igrave; trong l&ograve;ng n&oacute; c??? ray r???c ng??? kh&ocirc;ng ???????c kh??? t&acirc;m h???t s???c :((</p>\r\n<p>?????t n&agrave;y m&igrave;nh theo d&otilde;i th???y ngo&agrave;i l?? l???t ra th&igrave; mi???n trung l???i chu???n b??? c&oacute; b&atilde;o ti???p t???c, n&ecirc;n c&oacute; th??? ?????ng b&agrave;o mi???n trung m&igrave;nh s??? c&ograve;n tan hoang n???a, n&ecirc;n sau kho suy ngh?? c??? ?????m, m&igrave;nh quy???t ?????nh s??? b??? b???t c&ocirc;ng vi???c ??i ra gi&uacute;p ????? ca chia s??? c&ugrave;ng ng?????i d&acirc;n mi???n trung 1 ph???n n&agrave;o ??&oacute; kh&oacute; kh??n.</p>\r\n<p>M???i ng?????i c&ugrave;ng ch&uacute;ng tay v???i Ti&ecirc;n th&igrave; h&atilde;y chuy???n kho???n v&agrave;o t&igrave;a kho???n n&agrave;y nh&eacute;</p>\r\n<p>S??? TK 0181003469746</p>\r\n<p>Ch??? TK : Tr???n Th??? Th???y Ti&ecirc;n</p>\r\n<p>NH: Vieetcombank</p>\r\n<p>Sau l?? v&agrave; b&atilde;o trong v&agrave;i ng&agrave;y t???i th&igrave; Ti&ecirc;n s??? nh??? 1 ng?????i anh em ??i ti???n tr???m th???c t??? tr?????c c&aacute;c n??i Hu???, Qu???ng B&igrave;nh, Qu???ng tr??? nh?? l???n gi&uacute;p ????? mi???n trung b&atilde;o v&agrave; l?? l???t 2 n??m tr?????c. Sau ??&oacute; Ti&ecirc;n s??? l&ecirc;n k??? ho???ch v&agrave; th&ocirc;ng b&aacute;o r&otilde; r&agrave;ng Ti&ecirc;n s??? ?????n nh???ng ??&acirc;u v&agrave; l&agrave;m nh???ng g&igrave; ????? m???i ng?????i y&ecirc;n l&ograve;ng nh&eacute;.</p>\r\n<p>N???u c&aacute;c b???n c&oacute; c???n k&ecirc;u g???i s??? gi&uacute;p ????? kh&oacute; kh???n t??? n??i m&igrave;nh ??ang s???ng th&igrave; c??? nh???n tin cho Ti&ecirc;n nh&eacute;.</p>\r\n<p>C???m ??n m???i ng?????i ??&atilde; ?????c tin v&agrave; chia s??? th&ocirc;ng tin n&agrave;y ?????n nhi???u ng?????i bi???t gi&uacute;p ????? h??n</p>\r\n<p>&nbsp;Ti&ecirc;n v&ocirc; c&ugrave;ng bi???t ??n s??? ??&oacute;ng g&oacute;p d&ugrave; l&agrave; nh??? nh???t ??? &lt;3</p>','FD77F2E0C6E56ADDEC42E651411C5C0D','TH???Y TI??N -  C??NG VINH','TP. H??? Ch?? Minh','NGH??? S???',1,'2021-09-05 06:27:39',0),(1000000005,1000000004,'/tuthien/1000000005/210905064950.jpg','K??u g???i c??c m???nh th?????ng qu??n ???ng h??? ti???n c???u tr??? b?? con mi???n Trung','2020-10-15','2020-10-18','<p>S&aacute;ng gi??? tui coi c&aacute;i clip n&agrave;y tui x&oacute;t qu&aacute;! Th&agrave;nh Cry l???i cry n???a r???i! Q&uacute;a m???t!!!</p>\r\n<p>Ch&uacute;ng ta h&atilde;y chung tay g&oacute;p s???c, m???i ng?????i chia s??? 1 &iacute;t cho b&agrave; con mi???n Trung nha qu&yacute; v???. Em s??? mang xu???ng d?????i cho ng?????i ta. Kh??? g&igrave; m&agrave; kh??? d??? v???y. Thi&ecirc;n nhi&ecirc;n ?????i x??? teeh v???i b&agrave; con mi???n Trung tui qu&aacute;! Th???y th????ng! M???i n??m m???i b???. kh&ocirc;ng bi???t bao gi??? m???i d???t!</p>\r\n<p>Ri&ecirc;ng em xung phong g&oacute;p 300 tri???u tr?????c! b&agrave; con m???i ng?????i ph??? em 1 tay. G???i v??? t&agrave;i kho???n c???a em:</p>\r\n<p>007100 1121 888</p>\r\n<p>Hu???nh Tr???n Th&agrave;nh</p>\r\n<p>Ng&acirc;n h&agrave;ng Vietcombank tp.HCM</p>\r\n<p>Em h???a s??? g???i h&ecirc;t cho b&agrave; con ??? d?????i, kh&ocirc;ng ??n 1 ?????ng n&agrave;o! l???i h???a ch&acirc;n th&agrave;nh c???u Th&agrave;nh Cry.</p>\r\n<p>M???i ng?????i ??i!!!</p>\r\n<p>Gi&uacute;p ????? ?????ng n&agrave;o mi???n Trung n&agrave;o!!!</p>\r\n<p>P/s:</p>\r\n<p>H&ocirc;m nay l&agrave; ng&agrave;y 15/10/20. Em s??? t???ng k???t ti???n sau 3 ng???y ????ng stt n&agrave;y.</p>\r\n<p>H???t 18/10/20 em kh&ocirc;ng nh&acirc;n n???a. M???y anh ch??? ?????ng chuy???n n???a nha. V&igrave; s&aacute;ng 19 em cho chuy???n ti???n ??i mi???n Trung.</p>\r\n<p>Ai kh&ocirc;ng c&oacute; &yacute; chuy???n sau ng&agrave;y ??&oacute;, em s??? x&agrave;i s??? ti???n c&ograve;n l???i cho m???y c&ocirc; ch&uacute; ngh??? s?? neo ????n nh?? M???c Can, c&ocirc; Ho&agrave;ng Lan v.v.....</p>\r\n<p>V???y nha!!!!!!! S&aacute;ng 19 em s??? th&ocirc;ng b&aacute;o coi nh&agrave; m&igrave;nh g&oacute;p dc bao nhi&ecirc;u! C???m on c??? nh&agrave; ??&atilde; tin t?????ng Th&agrave;nh Cry!</p>','0821F0375971163A814DE43A92AE0F3F','MC TR???N TH??NH','TP. H??? Ch?? Minh','NGH??? S???',1,'2021-09-05 06:49:50',0),(1000000006,1000000005,'/tuthien/1000000006/210905071257.jpg','K??u g???i ???ng h??? ng?????i d??n v??ng l?? - h?????ng v??? Mi???n Trung','2020-10-20','2020-11-11','<p>K&Iacute;NH TH??A QU&Yacute; V???</p>\r\n<p>LINH ??&atilde; ?????c nh???ng b&igrave;nh lu???n c???a Q&uacute;y V??? trong nh???ng b&agrave;i ????ng c???a Linh. Xin c???m ??n nh???ng &yacute; ki???n ??&oacute;ng g&oacute;p th???t h???u hi???u v&agrave; qu&yacute; b&aacute;o c???a qu&yacute; v??? ????? Linh c&oacute; th&ecirc;m nhi???u th&ocirc;ng tin v??? chuy???n thi???n ngy???n chung c???a ?????i gia ??&igrave;nh ch&uacute;ng ta. S??? ti???n hi???n t???i l&agrave; T&acirc;m, s???c c???a m???i ng?????i t???&nbsp; trong n?????c, ?????n Ki???u B&agrave;o sinh s???ng v&agrave; lam vi???c ??? n?????c ngo&agrave;i, lu&ocirc;n h?????ng v??? mi???n Trung, Ch&uacute;ng ta s??? c??? g???ng d&ugrave;ng s??? ti???n n&agrave;y m???t c&aacute;ch hi???u qu??? nh???t d&ugrave; ch??? 1000 ?????ng. Ch&uacute;ng ta n&ecirc;n ??u ti&ecirc;n cho c&aacute;c gia ??&igrave;nh kh&oacute; kh??n, nh???t l&agrave; nh???ng gia ??&igrave;nh v&ugrave;ng s&acirc;u, v&ugrave;ng xa v&agrave; ?????ng b&agrave;o c&aacute;c D&acirc;n T???c mi???n n&uacute;i, tr&aacute;nh tr?????ng h???p nh???ng n??i ???????c h??? tr??? qu&aacute; nhi???u, c&ograve;n nh???ng n??i l???i &iacute;t ng?????i ?????n. Linh xin ph&eacute;p Q&uacute;y V??? ch??a ??i v???i, v&igrave; Linh c&ograve;n xin th&ecirc;m s??? ?????ng h&agrave;nh c???a nh???ng c&ocirc;ng ty m&agrave; Linh ??&atilde; v&agrave; ??ang l&agrave;m vi???c v&igrave; ch&uacute;ng ta ??&atilde; x&aacute;c ?????nh l&agrave; kh???c ph???c h???u qu??? sau b&atilde;o, l??. C&agrave;ng th&ecirc;m ???????c nhi???u s??? chung tay, th&igrave; B&agrave;, Con mi???n Trung m&igrave;nh c&agrave;ng ???????c nhi???u s??? an ???i c??? v??? tinh th???n l???n v???t ch???t. B???i qu&aacute; nhi???u m???t m&aacute;t ??au th????ng. M???t l???n n???a c???m ??n Q&uacute;y V???. C???u xin ??n tr&ecirc;n lu&ocirc;n ban ph&uacute;c cho Q&uacute;y V??? v&agrave; gian ??&igrave;nh. Xin Q&uacute;y V??? hi???p &yacute; c???u nguy???n cho Mi???n Trung ,m???nh m??? v?????t qua kh&oacute; kh??n m&ugrave;a b&atilde;o l?? n&agrave;y.</p>\r\n<p>M???i s??? ???ng h??? xin Q&uacute;y V??? g???i v??? tk:</p>\r\n<p>V&Otilde; NGUY???N HO&Agrave;I LINH&nbsp; s??? Tk 0860158163686&nbsp; ng&acirc;n h&agrave;ng MBbank. tpHM</p>','25CECD036A19644B179304F725626E1A','HO??I LINH','TP. H??? Ch?? Minh','NGH??? S???',1,'2021-09-05 07:12:57',0),(1000000007,1000000006,'/tuthien/1000000007/210905074844.jpg','Ch????ng tr??nh t???ng qu?? cho c??c anh em bi??n ph??ng ti???p t???c s??? ?????n v???i v??ng T???nh Bi??n- An Giang','2021-05-05','2021-05-09','<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Ch????ng tr&igrave;nh t???ng qu&agrave; cho c&aacute;c anh em bi&ecirc;n ph&ograve;ng ti???p t???c s??? ?????n v???i v&ugrave;ng T???nh Bi&ecirc;n- An Giang. C&oacute; t???t c??? 55 ch???t bi&ecirc;n ph&ograve;ng t???i ??&acirc;y.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Ca??c cho????t tre??n Ti??nh Bie??n kh&ocirc;ng gio????ng o???? An Phu??. Co?? 26 cho????t co?? 4_5 chie????n si??. Co?? 25 cho????t co?? tu???? 8_11 chie????n si?? va?? 4 to???? co?? ??o????ng ( mo????i to???? co?? 10 chie????n si??)</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&aacute;c ph???n qu&agrave; g???m :</div>\r\n<div dir=\"auto\">_15 be????p gas 3.750.000???</div>\r\n<div dir=\"auto\">_12 thu??ng kha????u trang, m???i th&ugrave;ng 50 h???p, m???i h???p 50 c&aacute;i : 15.600.000???</div>\r\n<div dir=\"auto\">_55 ca??i ??e??n pin : 12.650.000???</div>\r\n<div dir=\"auto\">_30 ca??i ??e??n na??ng lu??o????ng 200w pin du???? tru???? 20 gi??? : 40.500.000???</div>\r\n<div dir=\"auto\">_ 84 bao ga??o , m???i bao 50kg : 50.400.000???</div>\r\n<div dir=\"auto\">_ 55 pha????n ca??c nhu ye????u pha????m : 43.835.000???</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">*To????ng: 166.735.000???</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">V&igrave; s??? l?????ng anh em ??? m???i ch???t nhi???u &iacute;t kh&aacute;c nhau v&agrave; nhu c???u c??ng kh&aacute;c nhau n&ecirc;n c&aacute;c ph???n nh?? g???o c??ng kh&aacute;c. Ch???t &iacute;t ng?????i m&igrave;nh g???i 50kg g???o, ch???t ??&ocirc;ng ng?????i m&igrave;nh g???i 100kg g???o.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">P/S: ng&agrave;y 9/5 n&agrave;y s??? t???ng qu&agrave; cho 80 ch???t bi&ecirc;n ph&ograve;ng t???i An Ph&uacute; tr?????c c&aacute;c b???n nh&eacute;</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">M???i ??&oacute;ng g&oacute;p xin g???i v??? t&agrave;i kho???n B&Ugrave;I ?????I NGH??A, ng&acirc;n h&agrave;ng Vietcombank chi nh&aacute;nh K??? ?????ng</div>\r\n<div dir=\"auto\">S??? TK : ???0721000599682</div>\r\n<div dir=\"auto\">???</div>\r\n<div dir=\"auto\">C&aacute;m ??n c&aacute;c b???n nhi???u <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','Tk An Vui','TP. H??? Ch?? Minh','Ngh??? s???',1,'2021-09-05 07:48:44',0),(1000000008,1000000006,'/tuthien/1000000008/210905075421.jpg','v???n ?????ng cho ch????ng tr??nh t???ng qu?? cho ng?????i d??n ??? Vaishali bang Bihar - ???n ?????','2020-04-26','2020-04-27','<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&oacute; ??i???u n&agrave;y Ngh??a mu???n chia s??? v???i c&aacute;c b???n <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Ngh??a bi???t r???ng b&agrave; con ch&uacute;ng ta v???n c&ograve;n nhi???u n??i kh&oacute; kh??n c???n ???????c ch&uacute;ng ta gi&uacute;p ????? l???m, d???ch b???nh ??? n?????c ta v???n c&ograve;n. Nh??ng nh???ng ng&agrave;y qua theo d&otilde;i tin t???c c&aacute;c b???n c??ng bi???t r???ng ???n ????? ??ang kh???ng ho???ng b???i d???ch b???nh lan tr&agrave;n. Nh&igrave;n nh???ng ?????ng l???a thi&ecirc;u x&aacute;c ng?????i san s&aacute;t nhau tr&ecirc;n nh???ng b&atilde;i ?????t tr???ng th???t th&ecirc; l????ng , h&igrave;nh ???nh l&ograve; thi&ecirc;u ng&ugrave;n ng???t kh&oacute;i l???a ng&agrave;y ??&ecirc;m, ch???c h???n ch&uacute;ng ta c??ng kh&ocirc;ng kh???i ?????ng l&ograve;ng.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nh???n ???????c t&acirc;m th?? c???a Ni vi???n Ki???u ??&agrave;m Di t???i bang Bihar c???a ???n ?????, k&ecirc;u g???i ????? h??? tr??? l????ng th???c cho c&aacute;c gia ??&igrave;nh t???i Vaisali v&agrave; Bihar, Ngh??a c??ng r???t ?????n ??o c&acirc;n nh???c v&igrave; bi???t r???ng b&agrave; con c???a m&igrave;nh v???n c&ograve;n ch??a ???????c gi&uacute;p h???t th&igrave; gi??? l???i ??i gi&uacute;p ????? cho nh???ng ng?????i ??? m???t ?????t n?????c xa x&ocirc;i kh&aacute;c. V&agrave; n???u c&oacute; gi&uacute;p m&igrave;nh c??ng ch??? gi&uacute;p ???????c m???t ch&uacute;t n&agrave;o ??&oacute;, ch??? nh?? mu???i b??? b???. Nh??ng c&ugrave;ng l&agrave; con ng?????i v???i nhau, nh&igrave;n t&igrave;nh c???nh c???a h??? nh?? v???y Ngh??a th???t s??? ??au l&ograve;ng n&ecirc;n n???u nh???m m???t l&agrave;m ng?? th&igrave; c??ng kh&ocirc;ng n???.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">N&ecirc;n nay Ngh??a chia s??? nh???ng ??i???u n&agrave;y, hi v???ng c&aacute;c b???n c??ng ?????ng c???m ????? ch&uacute;ng ta gi&uacute;p ????? cho h??? ???????c ph???n n&agrave;o trong kh??? n??ng c???a m&igrave;nh, m???t mi???ng khi ??&oacute;i b???ng m???t g&oacute;i khi no v???y.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&aacute;c s?? c&ocirc; xin Tk An Vui h??? tr??? 3000 ph???n l????ng th???c ????? ph&aacute;t cho m???i ng?????i, m???i ph???n ch??? c&oacute; 5kg g???o v&agrave; 5kg b???t m&igrave;, t???ng c???ng 130.000???/ph???n (m???t s??? nhu y???u ph???m kh&aacute;c n???a th&igrave; c&aacute;c s?? c&ocirc; t??? v???n ?????ng th&ecirc;m)</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Ngh??a xin ???????c ??&oacute;ng g&oacute;p tr?????c 10.000.000??? cho ch????ng tr&igrave;nh l???n n&agrave;y c&aacute;c b???n nh&eacute;.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">P/S: c&aacute;c b???n ?????c t&acirc;m th?? c???a Ni vi???n Ki???u ??&agrave;m Di ????? hi???u r&otilde; h??n nh&eacute;.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">M???i ??&oacute;ng g&oacute;p xin g???i v??? t&agrave;i kho???n B&Ugrave;I ?????I NGH??A, ng&acirc;n h&agrave;ng Vietcombank chi nh&aacute;nh K??? ?????ng</div>\r\n<div dir=\"auto\">S??? TK : ???0721000599682</div>\r\n<div dir=\"auto\">???</div>\r\n<div dir=\"auto\">C&aacute;m ??n c&aacute;c b???n nhi???u <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','?????i Ngh??a','TP. H??? Ch?? Minh','Ngh??? s???',1,'2021-09-05 07:54:21',0),(1000000009,1000000006,'/tuthien/1000000009/210905075856.jpg','v???n ?????ng cho ch????ng tr??nh t???ng qu?? cho ng?????i d??n ??? Vaishali bang Bihar - ???n ?????','2020-04-26','2020-04-30','<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&oacute; ??i???u n&agrave;y Ngh??a mu???n chia s??? v???i c&aacute;c b???n <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Ngh??a bi???t r???ng b&agrave; con ch&uacute;ng ta v???n c&ograve;n nhi???u n??i kh&oacute; kh??n c???n ???????c ch&uacute;ng ta gi&uacute;p ????? l???m, d???ch b???nh ??? n?????c ta v???n c&ograve;n. Nh??ng nh???ng ng&agrave;y qua theo d&otilde;i tin t???c c&aacute;c b???n c??ng bi???t r???ng ???n ????? ??ang kh???ng ho???ng b???i d???ch b???nh lan tr&agrave;n. Nh&igrave;n nh???ng ?????ng l???a thi&ecirc;u x&aacute;c ng?????i san s&aacute;t nhau tr&ecirc;n nh???ng b&atilde;i ?????t tr???ng th???t th&ecirc; l????ng , h&igrave;nh ???nh l&ograve; thi&ecirc;u ng&ugrave;n ng???t kh&oacute;i l???a ng&agrave;y ??&ecirc;m, ch???c h???n ch&uacute;ng ta c??ng kh&ocirc;ng kh???i ?????ng l&ograve;ng.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nh???n ???????c t&acirc;m th?? c???a Ni vi???n Ki???u ??&agrave;m Di t???i bang Bihar c???a ???n ?????, k&ecirc;u g???i ????? h??? tr??? l????ng th???c cho c&aacute;c gia ??&igrave;nh t???i Vaisali v&agrave; Bihar, Ngh??a c??ng r???t ?????n ??o c&acirc;n nh???c v&igrave; bi???t r???ng b&agrave; con c???a m&igrave;nh v???n c&ograve;n ch??a ???????c gi&uacute;p h???t th&igrave; gi??? l???i ??i gi&uacute;p ????? cho nh???ng ng?????i ??? m???t ?????t n?????c xa x&ocirc;i kh&aacute;c. V&agrave; n???u c&oacute; gi&uacute;p m&igrave;nh c??ng ch??? gi&uacute;p ???????c m???t ch&uacute;t n&agrave;o ??&oacute;, ch??? nh?? mu???i b??? b???. Nh??ng c&ugrave;ng l&agrave; con ng?????i v???i nhau, nh&igrave;n t&igrave;nh c???nh c???a h??? nh?? v???y Ngh??a th???t s??? ??au l&ograve;ng n&ecirc;n n???u nh???m m???t l&agrave;m ng?? th&igrave; c??ng kh&ocirc;ng n???.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">N&ecirc;n nay Ngh??a chia s??? nh???ng ??i???u n&agrave;y, hi v???ng c&aacute;c b???n c??ng ?????ng c???m ????? ch&uacute;ng ta gi&uacute;p ????? cho h??? ???????c ph???n n&agrave;o trong kh??? n??ng c???a m&igrave;nh, m???t mi???ng khi ??&oacute;i b???ng m???t g&oacute;i khi no v???y.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">C&aacute;c s?? c&ocirc; xin Tk An Vui h??? tr??? 3000 ph???n l????ng th???c ????? ph&aacute;t cho m???i ng?????i, m???i ph???n ch??? c&oacute; 5kg g???o v&agrave; 5kg b???t m&igrave;, t???ng c???ng 130.000???/ph???n (m???t s??? nhu y???u ph???m kh&aacute;c n???a th&igrave; c&aacute;c s?? c&ocirc; t??? v???n ?????ng th&ecirc;m)</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Ngh??a xin ???????c ??&oacute;ng g&oacute;p tr?????c 10.000.000??? cho ch????ng tr&igrave;nh l???n n&agrave;y c&aacute;c b???n nh&eacute;.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">P/S: c&aacute;c b???n ?????c t&acirc;m th?? c???a Ni vi???n Ki???u ??&agrave;m Di ????? hi???u r&otilde; h??n nh&eacute;.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">M???i ??&oacute;ng g&oacute;p xin g???i v??? t&agrave;i kho???n B&Ugrave;I ?????I NGH??A, ng&acirc;n h&agrave;ng Vietcombank chi nh&aacute;nh K??? ?????ng</div>\r\n<div dir=\"auto\">S??? TK : ???0721000599682</div>\r\n<div dir=\"auto\">???</div>\r\n<div dir=\"auto\">C&aacute;m ??n c&aacute;c b???n nhi???u <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','?????i Ngh??a','TP. H??? Ch?? Minh','Ngh??? s???',1,'2021-09-05 07:58:56',0),(1000000010,1000000006,'/tuthien/1000000010/210905080935.jpg','Gi??p b?? Nguy???n Ho??ng Minh ( SN 2020) m??? tim g???p c??c b???n nh??','2021-03-18','2021-03-19','<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Gi&uacute;p b&eacute; Nguy???n Ho&agrave;ng Minh ( SN 2020) m??? tim g???p c&aacute;c b???n nh&eacute;</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">??ang tr&ecirc;n ???????ng t??? V??nh Long v???, nh???n ???????c tin nh???n c???a m???t ch??? b???n xin h??? tr??? g???p cho b&eacute; Minh m??? tim v&agrave;o tu???n sau. B&eacute; b??? tim n???ng v&agrave; c???n m??? c&agrave;ng s???m c&agrave;ng t???t. Ch??? nh???n xin h??? tr??? s??? ti???n 60.000.000???. Th???t l&ograve;ng ban ?????u Ngh??a c??ng r???t kh&oacute; x??? v&igrave; nh?? Ngh??a ??&atilde; n&oacute;i hi???n Tk An Vui ch&uacute;ng ta ??ang thi???u h???t khi ??ang th???c hi???n nh???ng d??? &aacute;n l???n n&ecirc;n ??&atilde; ng??ng ti???p nh???n nh???ng c&ocirc;ng tr&igrave;nh m???i.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">Nh??ng ??&acirc;y kh&ocirc;ng ph???i l&agrave; m???t c&ocirc;ng tr&igrave;nh, ??&acirc;y l&agrave; m???t em b&eacute;....<span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/t33/1.5/16/2665.png\" alt=\"&hearts;???\" width=\"16\" height=\"16\" /></span></div>\r\n<div dir=\"auto\">N???u kh&ocirc;ng gi&uacute;p th&igrave; c??? c???m th???y l&ograve;ng d??? b???t r???t l???m, v&igrave; v???y Ngh??a ??&atilde; nh???n l???i h??? tr??? ????? b&eacute; nh???p vi???n c&aacute;c b???n nh&eacute;. Mong c&aacute;c b???n hi???u v&agrave; chia s??? v???i Ngh??a nha.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">M???i ??&oacute;ng g&oacute;p xin g???i v??? t&agrave;i kho???n B&Ugrave;I ?????I NGH??A, ng&acirc;n h&agrave;ng Vietcombank chi nh&aacute;nh K??? ?????ng</div>\r\n<div dir=\"auto\">S??? TK : ???0721000599682</div>\r\n<div dir=\"auto\">???</div>\r\n<div dir=\"auto\">C&aacute;m ??n c&aacute;c b???n nhi???u <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://www.facebook.com/images/emoji.php/v9/td9/1.5/16/1f64f.png\" alt=\"?\" width=\"16\" height=\"16\" /></span></div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','?????i Ngh??a','TP. H??? Ch?? Minh','Ngh??? s???',1,'2021-09-05 08:09:35',0),(1000000011,1000000006,'/tuthien/1000000011/210905115505.jpg','Quy??n g??p ???ng h??? TK AN VUI gi??p ????? c??c ho??n c???nh kh?? kh??n','2021-04-01','2021-08-31','<p>D&ugrave;ng s??? ti???n n&agrave;y ????? h??? tr??? c&aacute;c ho&agrave;n c???nh kh&oacute; kh??n c??ng nh?? h??? tr??? c&aacute;c b&agrave; con trong m&ugrave;a d???ch Covid v??? l????ng th???c, th???c ph???m, (520kg g???o, tr???ng , thu???c, ch&aacute;o , s???a), b??? ????? b???o h??? y t???, b&igrave;nh oxy. v.v.v</p>\r\n<div>\r\n<div id=\"jsc_c_1g1\" class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div>\r\n<div class=\"sonix8o1\">\r\n<div>\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/240349269_6600872429926675_658335881820166606_n.jpg?_nc_cat=107&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=QtPwRUFbD6sAX-v3HED&amp;tn=o42m80GbD_cxHc7g&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=137a7c7259d815b35b0251cdd10d980a&amp;oe=615A9670\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s r9n4d945\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/231438285_6600872459926672_1369889946713901401_n.jpg?_nc_cat=102&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=O4c8ms4B5hwAX-ekE3R&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=ab6dc991b07fff00049e81e56ed3d63f&amp;oe=615BF737\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div class=\"stjgntxs ni8dbmo4 l82x9zwi uo3d90p7 h905i5nu monazrh9\" data-visualcompletion=\"ignore-dynamic\">\r\n<div class=\"tvfksri0 ozuftl9m\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 pfnyh3mw i1fnvgqd gs1a9yip owycx6da btwxx1t3 ph5uu5jm b3onmgus e5nlhep0 ecm0bbzt nkwizq5d roh60bw9 mysgfdmx hddg9phg\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 cbu4d94t g5gj957u d2edcug0 hpfvmrgz rj1gh0hx buofh1pr n8tt0mok hyh9befq iuny7tx3 ipjc6fyt\">\r\n<div class=\"oajrlxb2 gs1a9yip g5ia77u1 mtkw9kbi tlpljxtp qensuy8j ppp5ayq2 goun2846 ccm00jje s44p3ltw mk2mc5f4 rt8b4zig n8ej3o3l agehan2d sk4xxmp2 rq0escxv nhd2j8a9 pq6dq46d mg4g778l btwxx1t3 pfnyh3mw p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso l9j0dhe7 i1ao9s8h esuyzwwr f1sip0of du4w35lb lzcic4wl abiwlrkh p8dawk7l\" tabindex=\"0\" role=\"button\" aria-label=\"G???i n???i dung n&agrave;y ?????n b???n b&egrave; ho???c ????ng tr&ecirc;n d&ograve;ng th???i gian c???a b???n.\">\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s rnr61an3\" data-visualcompletion=\"ignore\">\r\n<div>\r\n<div id=\"jsc_c_wn\" class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div>\r\n<div>\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/240366217_6613785125302072_1560006039727797150_n.jpg?_nc_cat=102&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=z03FcFPaU0UAX9es_3E&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=b3e401fb7e77957bbe9ef1d8890abd0b&amp;oe=6158F9D2\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s r9n4d945\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/p720x720/239782152_6613785815302003_2263432542605577927_n.jpg?_nc_cat=111&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=LjqUsqDW6X4AX8aBLv8&amp;_nc_ht=scontent-hkg4-2.xx&amp;oh=c17c65fc3028ebee84866c9e9baf6c77&amp;oe=615B0AF1\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/234136788_6613785581968693_1684548858918537830_n.jpg?_nc_cat=103&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=UgFAOYtEXgsAX95Wl3c&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=b1ae0f9f765f4b7aa0534f895b1fbd0e&amp;oe=615A8442\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/240391484_6613786031968648_7876627107647738784_n.jpg?_nc_cat=107&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=BDx4XbaNGDYAX-DkUsF&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=064d89d8df2cf4edebaf6217253f9dd7&amp;oe=6159E544\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/234160202_6613787308635187_6673485427008730858_n.jpg?_nc_cat=103&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=EH7i2EGJkSUAX9ikja-&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=4f1b6bd38cd9ed69f4b2f1b3fa9c1c10&amp;oe=615BA7D2\" alt=\"\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div class=\"stjgntxs ni8dbmo4 l82x9zwi uo3d90p7 h905i5nu monazrh9\" data-visualcompletion=\"ignore-dynamic\">\r\n<div>\r\n<div>\r\n<div class=\"tvfksri0 ozuftl9m\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 pfnyh3mw i1fnvgqd gs1a9yip owycx6da btwxx1t3 ph5uu5jm b3onmgus e5nlhep0 ecm0bbzt nkwizq5d roh60bw9 mysgfdmx hddg9phg\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 cbu4d94t g5gj957u d2edcug0 hpfvmrgz rj1gh0hx buofh1pr n8tt0mok hyh9befq iuny7tx3 ipjc6fyt\">\r\n<div class=\"oajrlxb2 gs1a9yip g5ia77u1 mtkw9kbi tlpljxtp qensuy8j ppp5ayq2 goun2846 ccm00jje s44p3ltw mk2mc5f4 rt8b4zig n8ej3o3l agehan2d sk4xxmp2 rq0escxv nhd2j8a9 pq6dq46d mg4g778l btwxx1t3 pfnyh3mw p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso l9j0dhe7 i1ao9s8h esuyzwwr f1sip0of du4w35lb lzcic4wl abiwlrkh p8dawk7l\" tabindex=\"0\" role=\"button\" aria-label=\"G???i n???i dung n&agrave;y ?????n b???n b&egrave; ho???c ????ng tr&ecirc;n d&ograve;ng th???i gian c???a b???n.\">\r\n<div class=\"rq0escxv l9j0dhe7 du4w35lb j83agx80 g5gj957u rj1gh0hx buofh1pr hpfvmrgz taijpn5t bp9cbjyn owycx6da btwxx1t3 d1544ag0 tw6a2znq jb3vyjys dlv3wnog rl04r1d5 mysgfdmx hddg9phg qu8okrzs g0qnabr5\">&nbsp;</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">\r\n<div>\r\n<div id=\"jsc_c_vn\" class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div>\r\n<div>\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"k4urcfbm l9j0dhe7 datstx6m a8c37x1j du4w35lb\">\r\n<div>&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/239378464_6622267487787169_4008890550061160059_n.jpg?_nc_cat=101&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=CsUY47_5R7EAX_Hcu_K&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=782dd2c57e4f1c8abd0590389dc598df&amp;oe=61599FE5\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/p720x720/239294200_6622267734453811_804755803699927850_n.jpg?_nc_cat=110&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=IH--3s6OlDkAX_40wqe&amp;_nc_ht=scontent-hkg4-2.xx&amp;oh=b451df408ece0984fb6a22f1fced4880&amp;oe=615B6CA7\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/p720x720/235654255_6622267534453831_1139509328954702457_n.jpg?_nc_cat=100&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=VzshnQcIZPYAX-m2V1a&amp;_nc_ht=scontent-hkg4-1.xx&amp;oh=dc81c5bb5d1a2c6b612b8d19d28984ff&amp;oe=6159B4C8\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/p720x720/239430257_6622267921120459_2949247672769292887_n.jpg?_nc_cat=110&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=QOOVTBsFGBkAX86IpVM&amp;tn=o42m80GbD_cxHc7g&amp;_nc_ht=scontent-hkg4-2.xx&amp;oh=ac4baae53a71de81efbbca42d61909a0&amp;oe=61584DD6\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"cwj9ozl2 tvmbv18p\">\r\n<div class=\"\" dir=\"auto\">\r\n<div id=\"jsc_c_ae\" class=\"ecm0bbzt hv4rvrfc ihqw7lf3 dati1w0a\" data-ad-comet-preview=\"message\" data-ad-preview=\"message\">\r\n<div class=\"j83agx80 cbu4d94t ew0dbk1b irj2b8pg\">\r\n<div class=\"qzhwtbm6 knvmm38d\">\r\n<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\">BV H&oacute;c M&ocirc;n v&agrave; Trung t&acirc;m Y t??? qu???n 12 ?????n nh???n b&igrave;nh oxy k&egrave;m ????? b???o h???.</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"jsc_c_af\" class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"l9j0dhe7\">\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/p720x720/239849409_6668452573168660_8316522231297264938_n.jpg?_nc_cat=109&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=pcGTji-D8FUAX-zLT9g&amp;_nc_ht=scontent-hkg4-2.xx&amp;oh=2c920935e41a8b5043ed6b310bbc16a0&amp;oe=61594D13\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\">&nbsp;</div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\"><img class=\"i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm\" src=\"https://scontent.fsgn5-5.fna.fbcdn.net/v/t1.6435-9/p720x720/240615766_6668452883168629_3459046694423157049_n.jpg?_nc_cat=100&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=2apMRlLIC-oAX_wgnbi&amp;_nc_oc=AQnxLkLE2YCmDxwD3KObRNd4zvHWD1wYQWAaKm9nc0bq0Y-2fk5cW_mWnWrUf562ch4&amp;_nc_ht=scontent.fsgn5-5.fna&amp;oh=4382a5adad5b9832d2d4720bec9c63a9&amp;oe=615B8A28\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"hzruof5a opwvks06 linmgsc8 kr520xx4 j9ispegn pmk7jnqg n7fi1qx3 rq0escxv i09qtzwb\">&nbsp;</div>\r\n</div>\r\n<div class=\"n00je7tq arfg74bv qs9ysxi8 k77z8yql i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s\" data-visualcompletion=\"ignore\">&nbsp;</div>\r\n</div>\r\n<div class=\"ni8dbmo4 stjgntxs pmk7jnqg\">\r\n<div class=\"stjgntxs ni8dbmo4\">\r\n<div class=\"do00u71z ni8dbmo4 stjgntxs l9j0dhe7\">\r\n<div class=\"pmk7jnqg kr520xx4\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>','3C7741057FBC43D2DC8A71602240F169','Tk An Vui','TP. H??? Ch?? Minh','Ngh??? s???',1,'2021-09-05 11:55:05',0);
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
