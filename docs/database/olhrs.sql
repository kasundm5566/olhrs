CREATE DATABASE  IF NOT EXISTS `olhrs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `olhrs`;
-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: olhrs
-- ------------------------------------------------------
-- Server version	5.7.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `group_id` int(5) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(45) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (1,'Admin'),(2,'Manager'),(3,'Receptionist');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_permission`
--

DROP TABLE IF EXISTS `group_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_permission` (
  `group_id` int(5) NOT NULL,
  `permission_id` int(5) NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `fk_grouppermission$permissionid_idx` (`permission_id`),
  CONSTRAINT `fk_grouppermission$groupid` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grouppermission$permissionid` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`permission_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_permission`
--

LOCK TABLES `group_permission` WRITE;
/*!40000 ALTER TABLE `group_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `log_id` int(200) NOT NULL AUTO_INCREMENT,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL,
  `username` varchar(45) NOT NULL,
  `session_id` text NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `fk_username_idx` (`username`),
  CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2016-07-30','08:37:49','kdm','1469860669_3'),(2,'2016-07-30','08:39:27','kdm','1469860767_3'),(3,'2016-07-30','08:47:27','kdm','1469861247_3'),(4,'2016-07-30','08:52:13','kdm','1469861533_3'),(5,'2016-07-30','09:09:47','kdm','1469862587_3'),(6,'2016-07-30','09:11:44','kdm','1469862704_3'),(7,'2016-07-30','09:13:27','kdm','1469862807_3'),(8,'2016-07-30','09:13:57','kdm','1469862837_3'),(9,'2016-07-30','20:36:52','kdm','1469903812_3'),(10,'2016-07-30','21:01:46','kdm','1469905306_3'),(11,'2016-07-30','21:04:29','kdm','1469905469_3'),(12,'2016-07-30','21:25:30','kdm','1469906730_3'),(13,'2016-07-30','21:26:01','kdm','1469906761_3'),(14,'2016-07-30','21:30:14','kdm','1469907014_3'),(15,'2016-07-30','21:32:08','kdm','1469907128_3'),(16,'2016-07-30','21:37:55','kdm','1469907475_3'),(17,'2016-07-30','21:38:06','kdm','1469907486_3'),(18,'2016-07-30','23:44:27','kdm','1469915067_3'),(19,'2016-07-31','00:11:51','kdm','1469916711_3'),(20,'2016-08-03','08:47:28','kdm','1470194248_3'),(21,'2016-08-03','08:57:20','kdm','1470194840_3'),(22,'2016-08-03','08:57:54','kdm','1470194874_3'),(23,'2016-08-03','09:02:32','kdm','1470195152_3'),(24,'2016-08-03','09:03:46','kdm','1470195226_3'),(25,'2016-08-03','09:04:49','kdm','1470195289_3'),(26,'2016-08-03','09:06:13','kdm','1470195373_3'),(27,'2016-08-03','09:06:44','kdm','1470195404_3'),(28,'2016-08-03','09:08:20','kdm','1470195500_3'),(29,'2016-08-03','09:11:07','kdm','1470195667_3'),(30,'2016-08-03','09:11:50','kdm','1470195710_3'),(31,'2016-08-03','09:16:17','kdm','1470195977_3'),(32,'2016-08-03','09:16:42','kdm','1470196002_3'),(33,'2016-08-03','09:18:21','kdm','1470196101_3'),(34,'2016-08-03','09:18:51','kdm','1470196131_3'),(35,'2016-08-03','09:19:25','kdm','1470196165_3'),(36,'2016-08-03','09:20:21','kdm','1470196221_3'),(37,'2016-08-03','09:21:55','kdm','1470196315_3'),(38,'2016-08-03','09:47:32','kdm','1470197852_3'),(39,'2016-08-03','09:48:21','kdm','1470197901_3'),(40,'2016-08-03','09:49:00','kdm','1470197940_3'),(41,'2016-08-03','09:49:15','kdm','1470197955_3'),(42,'2016-08-03','09:51:01','kdm','1470198061_3'),(43,'2016-08-03','09:52:05','kdm','1470198125_3'),(44,'2016-08-03','09:52:21','kdm','1470198141_3'),(45,'2016-08-03','09:53:09','kdm','1470198189_3'),(46,'2016-08-03','09:53:42','kdm','1470198222_3'),(47,'2016-08-03','09:54:00','kdm','1470198240_3'),(48,'2016-08-03','09:54:12','kdm','1470198252_3'),(49,'2016-08-03','09:55:26','kdm','1470198326_3'),(50,'2016-08-03','09:56:00','kdm','1470198360_3'),(51,'2016-08-03','09:56:26','kdm','1470198386_3'),(52,'2016-08-03','09:56:37','kdm','1470198397_3'),(53,'2016-08-03','09:58:14','kdm','1470198494_3'),(54,'2016-08-03','09:58:44','kdm','1470198524_3'),(55,'2016-08-03','09:58:55','kdm','1470198535_3'),(56,'2016-08-03','09:59:05','kdm','1470198545_3'),(57,'2016-08-03','09:59:44','kdm','1470198584_3'),(58,'2016-08-03','09:59:57','kdm','1470198597_3'),(59,'2016-08-03','10:05:13','kdm','1470198913_3'),(60,'2016-08-03','10:05:25','kdm','1470198925_3'),(61,'2016-08-03','10:05:46','kdm','1470198946_3'),(62,'2016-08-03','10:05:58','kdm','1470198958_3'),(63,'2016-08-03','10:06:15','kdm','1470198975_3'),(64,'2016-08-03','10:06:36','kdm','1470198996_3'),(65,'2016-08-03','10:06:48','kdm','1470199008_3'),(66,'2016-08-03','10:07:14','kdm','1470199034_3'),(67,'2016-08-03','10:10:25','kdm','1470199225_3'),(68,'2016-08-03','10:10:39','kdm','1470199239_3'),(69,'2016-08-03','10:12:14','kdm','1470199334_3'),(70,'2016-08-03','10:23:30','kdm','1470200010_3'),(71,'2016-08-03','10:26:01','kdm','1470200161_3'),(72,'2016-08-03','10:26:13','kdm','1470200173_3'),(73,'2016-08-03','10:26:34','kdm','1470200194_3'),(74,'2016-08-03','10:27:11','kdm','1470200231_3'),(75,'2016-08-03','10:27:50','kdm','1470200270_3'),(76,'2016-08-03','10:28:22','kdm','1470200302_3'),(77,'2016-08-03','10:34:10','kdm','1470200650_3'),(78,'2016-08-03','10:34:31','kdm','1470200671_3'),(79,'2016-08-03','10:34:49','kdm','1470200689_3'),(80,'2016-08-03','10:35:01','kdm','1470200701_3'),(81,'2016-08-03','10:36:29','kdm','1470200789_3'),(82,'2016-08-03','10:36:52','kdm','1470200812_3'),(83,'2016-08-03','10:37:21','kdm','1470200841_3'),(84,'2016-08-03','10:37:48','kdm','1470200868_3'),(85,'2016-08-03','10:38:31','kdm','1470200911_3'),(86,'2016-08-03','10:38:51','kdm','1470200931_3'),(87,'2016-08-03','10:41:16','kdm','1470201076_3'),(88,'2016-08-03','10:44:20','kdm','1470201260_3'),(89,'2016-08-03','10:45:01','kdm','1470201301_3'),(90,'2016-08-03','10:45:48','kdm','1470201348_3'),(91,'2016-08-03','10:46:33','kdm','1470201393_3'),(92,'2016-08-03','10:46:46','kdm','1470201406_3'),(93,'2016-08-03','10:47:12','kdm','1470201432_3'),(94,'2016-08-03','10:47:41','kdm','1470201461_3'),(95,'2016-08-03','10:47:58','kdm','1470201478_3'),(96,'2016-08-03','10:54:18','kdm','1470201858_3'),(97,'2016-08-03','10:55:54','kdm','1470201954_3'),(98,'2016-08-03','10:56:15','kdm','1470201975_3'),(99,'2016-08-03','10:57:19','kdm','1470202039_3'),(100,'2016-08-03','10:57:54','kdm','1470202074_3'),(101,'2016-08-03','10:58:09','kdm','1470202089_3'),(102,'2016-08-03','10:58:20','kdm','1470202100_3'),(103,'2016-08-03','10:58:28','kdm','1470202108_3'),(104,'2016-08-03','10:59:16','kdm','1470202156_3'),(105,'2016-08-03','10:59:33','kdm','1470202173_3'),(106,'2016-08-03','10:59:56','kdm','1470202196_3'),(107,'2016-08-03','11:00:03','kdm','1470202203_3'),(108,'2016-08-03','11:01:46','kdm','1470202306_3'),(109,'2016-08-03','11:02:26','kdm','1470202346_3'),(110,'2016-08-03','11:03:07','kdm','1470202387_3'),(111,'2016-08-03','11:03:51','kdm','1470202431_3'),(112,'2016-08-03','11:06:50','kdm','1470202610_3'),(113,'2016-08-03','11:10:34','kdm','1470202834_3'),(114,'2016-08-03','11:11:12','kdm','1470202872_3'),(115,'2016-08-03','11:12:19','kdm','1470202939_3'),(116,'2016-08-03','11:12:51','kdm','1470202971_3'),(117,'2016-08-03','11:13:13','kdm','1470202993_3'),(118,'2016-08-03','11:27:31','kdm','1470203851_3'),(119,'2016-08-03','11:27:53','kdm','1470203873_3'),(120,'2016-08-03','11:28:11','kdm','1470203891_3'),(121,'2016-08-03','11:29:58','kdm','1470203998_3'),(122,'2016-08-03','11:31:14','kdm','1470204074_3'),(123,'2016-08-03','11:31:37','kdm','1470204097_3'),(124,'2016-08-03','11:33:05','kdm','1470204185_3'),(125,'2016-08-03','11:33:18','kdm','1470204198_3'),(126,'2016-08-03','11:34:01','kdm','1470204241_3'),(127,'2016-08-03','11:35:12','kdm','1470204312_3'),(128,'2016-08-03','11:35:24','kdm','1470204324_3'),(129,'2016-08-03','11:40:51','kdm','1470204651_3'),(130,'2016-08-03','11:41:41','kdm','1470204701_3'),(131,'2016-08-03','11:41:54','kdm','1470204714_3'),(132,'2016-08-03','11:42:13','kdm','1470204733_3'),(133,'2016-08-03','11:42:29','kdm','1470204749_3'),(134,'2016-08-03','11:43:00','kdm','1470204780_3'),(135,'2016-08-03','11:43:16','kdm','1470204796_3'),(136,'2016-08-03','11:44:12','kdm','1470204852_3'),(137,'2016-08-03','11:44:38','kdm','1470204878_3'),(138,'2016-08-03','11:44:53','kdm','1470204893_3'),(139,'2016-08-03','11:45:03','kdm','1470204903_3'),(140,'2016-08-03','11:45:20','kdm','1470204920_3'),(141,'2016-08-03','11:45:34','kdm','1470204934_3'),(142,'2016-08-03','12:11:49','kdm','1470206509_3'),(143,'2016-08-03','12:12:09','kdm','1470206529_3'),(144,'2016-08-03','12:12:16','kdm','1470206536_3'),(145,'2016-08-03','12:12:27','kdm','1470206547_3'),(146,'2016-08-03','12:12:58','kdm','1470206578_3'),(147,'2016-08-03','12:15:42','kdm','1470206742_3'),(148,'2016-08-03','12:15:51','kdm','1470206751_3'),(149,'2016-08-03','12:16:08','kdm','1470206768_3'),(150,'2016-08-03','12:16:14','kdm','1470206774_3'),(151,'2016-08-03','12:16:58','kdm','1470206818_3'),(152,'2016-08-03','12:18:23','kdm','1470206903_3'),(153,'2016-08-03','12:22:19','kdm','1470207139_3'),(154,'2016-08-03','12:22:42','kdm','1470207162_3'),(155,'2016-08-03','12:23:17','kdm','1470207197_3'),(156,'2016-08-03','12:23:36','kdm','1470207216_3'),(157,'2016-08-03','12:27:47','kdm','1470207467_3'),(158,'2016-08-03','12:50:53','kdm','1470208853_3'),(159,'2016-08-03','12:52:41','kdm','1470208961_3'),(160,'2016-08-03','12:53:54','kdm','1470209034_3'),(161,'2016-08-03','12:54:09','kdm','1470209049_3'),(162,'2016-08-03','12:54:23','kdm','1470209063_3'),(163,'2016-08-03','12:55:03','kdm','1470209103_3'),(164,'2016-08-03','12:55:54','kdm','1470209154_3'),(165,'2016-08-03','12:56:40','kdm','1470209200_3'),(166,'2016-08-03','12:57:11','kdm','1470209231_3'),(167,'2016-08-03','12:57:47','kdm','1470209267_3'),(168,'2016-08-03','12:59:12','kdm','1470209352_3'),(169,'2016-08-03','12:59:33','kdm','1470209373_3'),(170,'2016-08-03','12:59:49','kdm','1470209389_3'),(171,'2016-08-03','13:00:21','kdm','1470209421_3'),(172,'2016-08-03','13:00:48','kdm','1470209448_3'),(173,'2016-08-03','13:01:44','kdm','1470209504_3'),(174,'2016-08-03','13:02:00','kdm','1470209520_3'),(175,'2016-08-03','13:03:28','kdm','1470209608_3'),(176,'2016-08-03','13:04:26','kdm','1470209666_3'),(177,'2016-08-03','13:05:10','kdm','1470209710_3'),(178,'2016-08-03','13:05:26','kdm','1470209726_3'),(179,'2016-08-03','13:07:31','kdm','1470209851_3'),(180,'2016-08-03','13:08:08','kdm','1470209888_3'),(181,'2016-08-03','13:08:47','kdm','1470209927_3'),(182,'2016-08-03','13:09:04','kdm','1470209944_3'),(183,'2016-08-03','13:09:30','kdm','1470209970_3'),(184,'2016-08-03','13:09:52','kdm','1470209992_3'),(185,'2016-08-03','13:10:21','kdm','1470210021_3'),(186,'2016-08-03','13:10:30','kdm','1470210030_3'),(187,'2016-08-03','13:10:53','kdm','1470210053_3'),(188,'2016-08-03','13:11:01','kdm','1470210061_3'),(189,'2016-08-03','13:12:11','kdm','1470210131_3'),(190,'2016-08-03','13:12:23','kdm','1470210143_3'),(191,'2016-08-03','13:12:36','kdm','1470210156_3'),(192,'2016-08-03','13:13:32','kdm','1470210212_3'),(193,'2016-08-03','13:13:54','kdm','1470210234_3'),(194,'2016-08-03','13:15:07','kdm','1470210307_3'),(195,'2016-08-03','13:15:21','kdm','1470210321_3'),(196,'2016-08-03','13:16:10','kdm','1470210370_3'),(197,'2016-08-03','13:16:30','kdm','1470210390_3'),(198,'2016-08-03','13:16:56','kdm','1470210416_3'),(199,'2016-08-03','13:18:09','kdm','1470210489_3'),(200,'2016-08-03','13:18:42','kdm','1470210522_3'),(201,'2016-08-03','13:20:01','kdm','1470210601_3'),(202,'2016-08-03','13:20:36','kdm','1470210636_3'),(203,'2016-08-03','13:21:30','kdm','1470210690_3'),(204,'2016-08-03','13:22:10','kdm','1470210730_3'),(205,'2016-08-03','13:22:48','kdm','1470210768_3'),(206,'2016-08-03','13:23:22','kdm','1470210802_3'),(207,'2016-08-03','13:27:28','kdm','1470211048_3'),(208,'2016-08-03','13:32:11','kdm','1470211331_3'),(209,'2016-08-03','13:32:53','kdm','1470211373_3'),(210,'2016-08-03','13:33:51','kdm','1470211431_3'),(211,'2016-08-03','13:39:23','kdm','1470211763_3'),(212,'2016-08-03','13:41:19','kdm','1470211879_3'),(213,'2016-08-03','13:41:41','kdm','1470211901_3'),(214,'2016-08-03','13:42:23','kdm','1470211943_3'),(215,'2016-08-03','13:43:06','kdm','1470211986_3'),(216,'2016-08-03','13:44:41','kdm','1470212081_3'),(217,'2016-08-03','13:44:55','kdm','1470212095_3'),(218,'2016-08-03','13:45:04','kdm','1470212104_3'),(219,'2016-08-03','13:45:38','kdm','1470212138_3'),(220,'2016-08-03','13:46:03','kdm','1470212163_3'),(221,'2016-08-03','13:46:20','kdm','1470212180_3'),(222,'2016-08-03','13:46:30','kdm','1470212190_3'),(223,'2016-08-03','13:46:38','kdm','1470212198_3'),(224,'2016-08-03','13:47:24','kdm','1470212244_3'),(225,'2016-08-03','13:47:43','kdm','1470212263_3'),(226,'2016-08-03','13:47:58','kdm','1470212278_3'),(227,'2016-08-03','13:48:57','kdm','1470212337_3'),(228,'2016-08-03','13:58:30','kdm','1470212910_3'),(229,'2016-08-03','13:59:06','kdm','1470212946_3'),(230,'2016-08-03','13:59:35','kdm','1470212975_3'),(231,'2016-08-03','14:02:11','kdm','1470213131_3'),(232,'2016-08-03','14:03:28','kdm','1470213208_3'),(233,'2016-08-03','14:04:06','kdm','1470213246_3'),(234,'2016-08-03','14:04:29','kdm','1470213269_3'),(235,'2016-08-03','14:04:43','kdm','1470213283_3'),(236,'2016-08-03','14:04:54','kdm','1470213294_3'),(237,'2016-08-03','14:05:18','kdm','1470213318_3'),(238,'2016-08-03','14:06:52','kdm','1470213412_3'),(239,'2016-08-03','14:07:20','kdm','1470213440_3'),(240,'2016-08-03','14:08:33','kdm','1470213513_3'),(241,'2016-08-03','14:09:23','kdm','1470213563_3'),(242,'2016-08-03','14:09:28','kdm','1470213568_3'),(243,'2016-08-03','14:38:00','kdm','1470215280_'),(244,'2016-08-03','14:38:32','kdm','1470215312_'),(245,'2016-08-03','14:39:02','kdm','1470215342_'),(246,'2016-08-03','14:39:55','kdm','1470215395_'),(247,'2016-08-03','14:40:16','kdm','1470215416_'),(248,'2016-08-03','14:40:50','kdm','1470215450_'),(249,'2016-08-03','15:56:30','kdm','1470219990_'),(250,'2016-08-03','15:56:55','kdm','1470220015_'),(251,'2016-08-03','16:01:50','kdm','1470220310_'),(252,'2016-08-03','16:15:13','kdm','1470221113_'),(253,'2016-08-03','16:15:51','kdm','1470221151_'),(254,'2016-08-03','16:16:13','kdm','1470221173_'),(255,'2016-08-03','16:36:08','kdm','1470222368_'),(256,'2016-08-03','16:47:44','kdm','1470223064_'),(257,'2016-08-03','17:07:35','kdm','1470224255_'),(258,'2016-08-03','17:09:29','kdm','1470224369_'),(259,'2016-08-11','11:21:34','kdm','1470894694_'),(260,'2016-08-11','11:22:27','kdm','1470894747_'),(261,'2016-08-11','11:23:18','kdm','1470894798_'),(262,'2016-08-11','11:23:39','kdm','1470894819_'),(263,'2016-08-11','11:23:57','kdm','1470894837_'),(264,'2016-08-11','11:25:14','kdm','1470894914_'),(265,'2016-08-11','11:26:24','kdm','1470894984_'),(266,'2016-08-11','11:26:42','kdm','1470895002_'),(267,'2016-09-09','14:29:28','kdm','1473411567_');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `permission_id` int(5) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(45) NOT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `telephone` int(10) NOT NULL,
  `status` enum('verified','not-verified') NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `name_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'kdm','40bd001563085fc35165329ea1ff5c5ecbdbbeef','Kasun','Madusanke','kdm@live.com',778087663,'verified'),(4,'abc','40bd001563085fc35165329ea1ff5c5ecbdbbeef','asd','psd','abc@gmail.com',711237332,'verified');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `user_id` int(5) NOT NULL,
  `group_id` int(5) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `fk_usergroup$groupid_idx` (`group_id`),
  CONSTRAINT `fk_usergroup$groupid` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usergroup$userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (3,1),(4,3);
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-09 15:30:52