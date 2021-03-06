CREATE DATABASE  IF NOT EXISTS `olhrs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `olhrs`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: olhrs
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephone` int(10) unsigned zerofill NOT NULL,
  `registered_date` date NOT NULL,
  `status` enum('Verified','Not-verified') NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (3,'dfg','asd','ss','22434 sdfvseawss','sdf@sdf.gh',0000345345,'2016-09-01','Verified'),(4,'gdfg','hhjk','hh','fg sdg','dfgdfg',0000000345,'2016-09-01','Verified'),(53,'dfg',NULL,'jj','a9ef1bf4dac17d008c8a7563179ae30574f4dd86','dfgdf',0000034534,'2016-09-01','Verified'),(54,'dfdf',NULL,'uu','dfgdfgd','dfgdfgdf',0000034534,'2016-09-02','Verified'),(55,'dfg','gkhjk','hjk','dfgdfgd','dfgdf',0345345345,'2016-09-02','Verified'),(56,'dfgdf','ghjk','vb ','dfgdfgd','dfgdfgd',0000003453,'2016-09-03','Verified'),(58,'jkl',NULL,'ddd','a9ef1bf4dac17d008c8a7563179ae30574f4dd86','dfgdfg',0000000345,'2016-09-05','Verified'),(59,'hj','hjkh','ddddddd','fgd','fdg',0000000567,'2016-09-05','Verified'),(60,'hj,m',NULL,'ert345','dfg','dfgdfgd',0000000678,'2016-09-06','Verified'),(61,'rty','d','ert346','dfgerte3','dfgdre',0000067867,'2016-09-06','Verified'),(62,'rty564','dfg','jty855','dfgdfgd','erter',0000007897,'2016-09-07','Verified'),(63,'rth b',NULL,'tyu56','tyu5674567','dfgdf',0000078978,'2016-09-08','Verified'),(64,'rty','cvbc','tyu57','5675n6r','dfgd',0000007876,'2016-09-09','Verified'),(65,'rtyr','cvb','tyu67','567nrhu','dfgdfg',0000067867,'2016-09-10','Verified'),(67,'tyu','tyuty','gfgh124','a9ef1bf4dac17d008c8a7563179ae30574f4dd86','ttt@dfg.lk',0111111111,'2016-09-17','Verified');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature`
--

DROP TABLE IF EXISTS `feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature` (
  `feature_id` int(10) NOT NULL AUTO_INCREMENT,
  `feature_name` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature`
--

LOCK TABLES `feature` WRITE;
/*!40000 ALTER TABLE `feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL AUTO_INCREMENT,
  `rating` int(2) NOT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `food_id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(50) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`food_id`),
  KEY `fk_category$food_idx` (`category_id`),
  CONSTRAINT `fk_category$food` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `group_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(45) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Admin'),(2,'Manager'),(3,'Receptionist'),(4,'Blocked');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hall`
--

DROP TABLE IF EXISTS `hall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hall` (
  `hall_id` int(10) NOT NULL AUTO_INCREMENT,
  `hall_name` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`hall_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hall`
--

LOCK TABLES `hall` WRITE;
/*!40000 ALTER TABLE `hall` DISABLE KEYS */;
/*!40000 ALTER TABLE `hall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(20) NOT NULL,
  `item_type_id` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=445 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2016-07-30','08:37:49','kdm','1469860669_3'),(2,'2016-07-30','08:39:27','kdm','1469860767_3'),(3,'2016-07-30','08:47:27','kdm','1469861247_3'),(4,'2016-07-30','08:52:13','kdm','1469861533_3'),(5,'2016-07-30','09:09:47','kdm','1469862587_3'),(6,'2016-07-30','09:11:44','kdm','1469862704_3'),(7,'2016-07-30','09:13:27','kdm','1469862807_3'),(8,'2016-07-30','09:13:57','kdm','1469862837_3'),(9,'2016-07-30','20:36:52','kdm','1469903812_3'),(10,'2016-07-30','21:01:46','kdm','1469905306_3'),(11,'2016-07-30','21:04:29','kdm','1469905469_3'),(12,'2016-07-30','21:25:30','kdm','1469906730_3'),(13,'2016-07-30','21:26:01','kdm','1469906761_3'),(14,'2016-07-30','21:30:14','kdm','1469907014_3'),(15,'2016-07-30','21:32:08','kdm','1469907128_3'),(16,'2016-07-30','21:37:55','kdm','1469907475_3'),(17,'2016-07-30','21:38:06','kdm','1469907486_3'),(18,'2016-07-30','23:44:27','kdm','1469915067_3'),(19,'2016-07-31','00:11:51','kdm','1469916711_3'),(20,'2016-08-03','08:47:28','kdm','1470194248_3'),(21,'2016-08-03','08:57:20','kdm','1470194840_3'),(22,'2016-08-03','08:57:54','kdm','1470194874_3'),(23,'2016-08-03','09:02:32','kdm','1470195152_3'),(24,'2016-08-03','09:03:46','kdm','1470195226_3'),(25,'2016-08-03','09:04:49','kdm','1470195289_3'),(26,'2016-08-03','09:06:13','kdm','1470195373_3'),(27,'2016-08-03','09:06:44','kdm','1470195404_3'),(28,'2016-08-03','09:08:20','kdm','1470195500_3'),(29,'2016-08-03','09:11:07','kdm','1470195667_3'),(30,'2016-08-03','09:11:50','kdm','1470195710_3'),(31,'2016-08-03','09:16:17','kdm','1470195977_3'),(32,'2016-08-03','09:16:42','kdm','1470196002_3'),(33,'2016-08-03','09:18:21','kdm','1470196101_3'),(34,'2016-08-03','09:18:51','kdm','1470196131_3'),(35,'2016-08-03','09:19:25','kdm','1470196165_3'),(36,'2016-08-03','09:20:21','kdm','1470196221_3'),(37,'2016-08-03','09:21:55','kdm','1470196315_3'),(38,'2016-08-03','09:47:32','kdm','1470197852_3'),(39,'2016-08-03','09:48:21','kdm','1470197901_3'),(40,'2016-08-03','09:49:00','kdm','1470197940_3'),(41,'2016-08-03','09:49:15','kdm','1470197955_3'),(42,'2016-08-03','09:51:01','kdm','1470198061_3'),(43,'2016-08-03','09:52:05','kdm','1470198125_3'),(44,'2016-08-03','09:52:21','kdm','1470198141_3'),(45,'2016-08-03','09:53:09','kdm','1470198189_3'),(46,'2016-08-03','09:53:42','kdm','1470198222_3'),(47,'2016-08-03','09:54:00','kdm','1470198240_3'),(48,'2016-08-03','09:54:12','kdm','1470198252_3'),(49,'2016-08-03','09:55:26','kdm','1470198326_3'),(50,'2016-08-03','09:56:00','kdm','1470198360_3'),(51,'2016-08-03','09:56:26','kdm','1470198386_3'),(52,'2016-08-03','09:56:37','kdm','1470198397_3'),(53,'2016-08-03','09:58:14','kdm','1470198494_3'),(54,'2016-08-03','09:58:44','kdm','1470198524_3'),(55,'2016-08-03','09:58:55','kdm','1470198535_3'),(56,'2016-08-03','09:59:05','kdm','1470198545_3'),(57,'2016-08-03','09:59:44','kdm','1470198584_3'),(58,'2016-08-03','09:59:57','kdm','1470198597_3'),(59,'2016-08-03','10:05:13','kdm','1470198913_3'),(60,'2016-08-03','10:05:25','kdm','1470198925_3'),(61,'2016-08-03','10:05:46','kdm','1470198946_3'),(62,'2016-08-03','10:05:58','kdm','1470198958_3'),(63,'2016-08-03','10:06:15','kdm','1470198975_3'),(64,'2016-08-03','10:06:36','kdm','1470198996_3'),(65,'2016-08-03','10:06:48','kdm','1470199008_3'),(66,'2016-08-03','10:07:14','kdm','1470199034_3'),(67,'2016-08-03','10:10:25','kdm','1470199225_3'),(68,'2016-08-03','10:10:39','kdm','1470199239_3'),(69,'2016-08-03','10:12:14','kdm','1470199334_3'),(70,'2016-08-03','10:23:30','kdm','1470200010_3'),(71,'2016-08-03','10:26:01','kdm','1470200161_3'),(72,'2016-08-03','10:26:13','kdm','1470200173_3'),(73,'2016-08-03','10:26:34','kdm','1470200194_3'),(74,'2016-08-03','10:27:11','kdm','1470200231_3'),(75,'2016-08-03','10:27:50','kdm','1470200270_3'),(76,'2016-08-03','10:28:22','kdm','1470200302_3'),(77,'2016-08-03','10:34:10','kdm','1470200650_3'),(78,'2016-08-03','10:34:31','kdm','1470200671_3'),(79,'2016-08-03','10:34:49','kdm','1470200689_3'),(80,'2016-08-03','10:35:01','kdm','1470200701_3'),(81,'2016-08-03','10:36:29','kdm','1470200789_3'),(82,'2016-08-03','10:36:52','kdm','1470200812_3'),(83,'2016-08-03','10:37:21','kdm','1470200841_3'),(84,'2016-08-03','10:37:48','kdm','1470200868_3'),(85,'2016-08-03','10:38:31','kdm','1470200911_3'),(86,'2016-08-03','10:38:51','kdm','1470200931_3'),(87,'2016-08-03','10:41:16','kdm','1470201076_3'),(88,'2016-08-03','10:44:20','kdm','1470201260_3'),(89,'2016-08-03','10:45:01','kdm','1470201301_3'),(90,'2016-08-03','10:45:48','kdm','1470201348_3'),(91,'2016-08-03','10:46:33','kdm','1470201393_3'),(92,'2016-08-03','10:46:46','kdm','1470201406_3'),(93,'2016-08-03','10:47:12','kdm','1470201432_3'),(94,'2016-08-03','10:47:41','kdm','1470201461_3'),(95,'2016-08-03','10:47:58','kdm','1470201478_3'),(96,'2016-08-03','10:54:18','kdm','1470201858_3'),(97,'2016-08-03','10:55:54','kdm','1470201954_3'),(98,'2016-08-03','10:56:15','kdm','1470201975_3'),(99,'2016-08-03','10:57:19','kdm','1470202039_3'),(100,'2016-08-03','10:57:54','kdm','1470202074_3'),(101,'2016-08-03','10:58:09','kdm','1470202089_3'),(102,'2016-08-03','10:58:20','kdm','1470202100_3'),(103,'2016-08-03','10:58:28','kdm','1470202108_3'),(104,'2016-08-03','10:59:16','kdm','1470202156_3'),(105,'2016-08-03','10:59:33','kdm','1470202173_3'),(106,'2016-08-03','10:59:56','kdm','1470202196_3'),(107,'2016-08-03','11:00:03','kdm','1470202203_3'),(108,'2016-08-03','11:01:46','kdm','1470202306_3'),(109,'2016-08-03','11:02:26','kdm','1470202346_3'),(110,'2016-08-03','11:03:07','kdm','1470202387_3'),(111,'2016-08-03','11:03:51','kdm','1470202431_3'),(112,'2016-08-03','11:06:50','kdm','1470202610_3'),(113,'2016-08-03','11:10:34','kdm','1470202834_3'),(114,'2016-08-03','11:11:12','kdm','1470202872_3'),(115,'2016-08-03','11:12:19','kdm','1470202939_3'),(116,'2016-08-03','11:12:51','kdm','1470202971_3'),(117,'2016-08-03','11:13:13','kdm','1470202993_3'),(118,'2016-08-03','11:27:31','kdm','1470203851_3'),(119,'2016-08-03','11:27:53','kdm','1470203873_3'),(120,'2016-08-03','11:28:11','kdm','1470203891_3'),(121,'2016-08-03','11:29:58','kdm','1470203998_3'),(122,'2016-08-03','11:31:14','kdm','1470204074_3'),(123,'2016-08-03','11:31:37','kdm','1470204097_3'),(124,'2016-08-03','11:33:05','kdm','1470204185_3'),(125,'2016-08-03','11:33:18','kdm','1470204198_3'),(126,'2016-08-03','11:34:01','kdm','1470204241_3'),(127,'2016-08-03','11:35:12','kdm','1470204312_3'),(128,'2016-08-03','11:35:24','kdm','1470204324_3'),(129,'2016-08-03','11:40:51','kdm','1470204651_3'),(130,'2016-08-03','11:41:41','kdm','1470204701_3'),(131,'2016-08-03','11:41:54','kdm','1470204714_3'),(132,'2016-08-03','11:42:13','kdm','1470204733_3'),(133,'2016-08-03','11:42:29','kdm','1470204749_3'),(134,'2016-08-03','11:43:00','kdm','1470204780_3'),(135,'2016-08-03','11:43:16','kdm','1470204796_3'),(136,'2016-08-03','11:44:12','kdm','1470204852_3'),(137,'2016-08-03','11:44:38','kdm','1470204878_3'),(138,'2016-08-03','11:44:53','kdm','1470204893_3'),(139,'2016-08-03','11:45:03','kdm','1470204903_3'),(140,'2016-08-03','11:45:20','kdm','1470204920_3'),(141,'2016-08-03','11:45:34','kdm','1470204934_3'),(142,'2016-08-03','12:11:49','kdm','1470206509_3'),(143,'2016-08-03','12:12:09','kdm','1470206529_3'),(144,'2016-08-03','12:12:16','kdm','1470206536_3'),(145,'2016-08-03','12:12:27','kdm','1470206547_3'),(146,'2016-08-03','12:12:58','kdm','1470206578_3'),(147,'2016-08-03','12:15:42','kdm','1470206742_3'),(148,'2016-08-03','12:15:51','kdm','1470206751_3'),(149,'2016-08-03','12:16:08','kdm','1470206768_3'),(150,'2016-08-03','12:16:14','kdm','1470206774_3'),(151,'2016-08-03','12:16:58','kdm','1470206818_3'),(152,'2016-08-03','12:18:23','kdm','1470206903_3'),(153,'2016-08-03','12:22:19','kdm','1470207139_3'),(154,'2016-08-03','12:22:42','kdm','1470207162_3'),(155,'2016-08-03','12:23:17','kdm','1470207197_3'),(156,'2016-08-03','12:23:36','kdm','1470207216_3'),(157,'2016-08-03','12:27:47','kdm','1470207467_3'),(158,'2016-08-03','12:50:53','kdm','1470208853_3'),(159,'2016-08-03','12:52:41','kdm','1470208961_3'),(160,'2016-08-03','12:53:54','kdm','1470209034_3'),(161,'2016-08-03','12:54:09','kdm','1470209049_3'),(162,'2016-08-03','12:54:23','kdm','1470209063_3'),(163,'2016-08-03','12:55:03','kdm','1470209103_3'),(164,'2016-08-03','12:55:54','kdm','1470209154_3'),(165,'2016-08-03','12:56:40','kdm','1470209200_3'),(166,'2016-08-03','12:57:11','kdm','1470209231_3'),(167,'2016-08-03','12:57:47','kdm','1470209267_3'),(168,'2016-08-03','12:59:12','kdm','1470209352_3'),(169,'2016-08-03','12:59:33','kdm','1470209373_3'),(170,'2016-08-03','12:59:49','kdm','1470209389_3'),(171,'2016-08-03','13:00:21','kdm','1470209421_3'),(172,'2016-08-03','13:00:48','kdm','1470209448_3'),(173,'2016-08-03','13:01:44','kdm','1470209504_3'),(174,'2016-08-03','13:02:00','kdm','1470209520_3'),(175,'2016-08-03','13:03:28','kdm','1470209608_3'),(176,'2016-08-03','13:04:26','kdm','1470209666_3'),(177,'2016-08-03','13:05:10','kdm','1470209710_3'),(178,'2016-08-03','13:05:26','kdm','1470209726_3'),(179,'2016-08-03','13:07:31','kdm','1470209851_3'),(180,'2016-08-03','13:08:08','kdm','1470209888_3'),(181,'2016-08-03','13:08:47','kdm','1470209927_3'),(182,'2016-08-03','13:09:04','kdm','1470209944_3'),(183,'2016-08-03','13:09:30','kdm','1470209970_3'),(184,'2016-08-03','13:09:52','kdm','1470209992_3'),(185,'2016-08-03','13:10:21','kdm','1470210021_3'),(186,'2016-08-03','13:10:30','kdm','1470210030_3'),(187,'2016-08-03','13:10:53','kdm','1470210053_3'),(188,'2016-08-03','13:11:01','kdm','1470210061_3'),(189,'2016-08-03','13:12:11','kdm','1470210131_3'),(190,'2016-08-03','13:12:23','kdm','1470210143_3'),(191,'2016-08-03','13:12:36','kdm','1470210156_3'),(192,'2016-08-03','13:13:32','kdm','1470210212_3'),(193,'2016-08-03','13:13:54','kdm','1470210234_3'),(194,'2016-08-03','13:15:07','kdm','1470210307_3'),(195,'2016-08-03','13:15:21','kdm','1470210321_3'),(196,'2016-08-03','13:16:10','kdm','1470210370_3'),(197,'2016-08-03','13:16:30','kdm','1470210390_3'),(198,'2016-08-03','13:16:56','kdm','1470210416_3'),(199,'2016-08-03','13:18:09','kdm','1470210489_3'),(200,'2016-08-03','13:18:42','kdm','1470210522_3'),(201,'2016-08-03','13:20:01','kdm','1470210601_3'),(202,'2016-08-03','13:20:36','kdm','1470210636_3'),(203,'2016-08-03','13:21:30','kdm','1470210690_3'),(204,'2016-08-03','13:22:10','kdm','1470210730_3'),(205,'2016-08-03','13:22:48','kdm','1470210768_3'),(206,'2016-08-03','13:23:22','kdm','1470210802_3'),(207,'2016-08-03','13:27:28','kdm','1470211048_3'),(208,'2016-08-03','13:32:11','kdm','1470211331_3'),(209,'2016-08-03','13:32:53','kdm','1470211373_3'),(210,'2016-08-03','13:33:51','kdm','1470211431_3'),(211,'2016-08-03','13:39:23','kdm','1470211763_3'),(212,'2016-08-03','13:41:19','kdm','1470211879_3'),(213,'2016-08-03','13:41:41','kdm','1470211901_3'),(214,'2016-08-03','13:42:23','kdm','1470211943_3'),(215,'2016-08-03','13:43:06','kdm','1470211986_3'),(216,'2016-08-03','13:44:41','kdm','1470212081_3'),(217,'2016-08-03','13:44:55','kdm','1470212095_3'),(218,'2016-08-03','13:45:04','kdm','1470212104_3'),(219,'2016-08-03','13:45:38','kdm','1470212138_3'),(220,'2016-08-03','13:46:03','kdm','1470212163_3'),(221,'2016-08-03','13:46:20','kdm','1470212180_3'),(222,'2016-08-03','13:46:30','kdm','1470212190_3'),(223,'2016-08-03','13:46:38','kdm','1470212198_3'),(224,'2016-08-03','13:47:24','kdm','1470212244_3'),(225,'2016-08-03','13:47:43','kdm','1470212263_3'),(226,'2016-08-03','13:47:58','kdm','1470212278_3'),(227,'2016-08-03','13:48:57','kdm','1470212337_3'),(228,'2016-08-03','13:58:30','kdm','1470212910_3'),(229,'2016-08-03','13:59:06','kdm','1470212946_3'),(230,'2016-08-03','13:59:35','kdm','1470212975_3'),(231,'2016-08-03','14:02:11','kdm','1470213131_3'),(232,'2016-08-03','14:03:28','kdm','1470213208_3'),(233,'2016-08-03','14:04:06','kdm','1470213246_3'),(234,'2016-08-03','14:04:29','kdm','1470213269_3'),(235,'2016-08-03','14:04:43','kdm','1470213283_3'),(236,'2016-08-03','14:04:54','kdm','1470213294_3'),(237,'2016-08-03','14:05:18','kdm','1470213318_3'),(238,'2016-08-03','14:06:52','kdm','1470213412_3'),(239,'2016-08-03','14:07:20','kdm','1470213440_3'),(240,'2016-08-03','14:08:33','kdm','1470213513_3'),(241,'2016-08-03','14:09:23','kdm','1470213563_3'),(242,'2016-08-03','14:09:28','kdm','1470213568_3'),(243,'2016-08-03','14:38:00','kdm','1470215280_'),(244,'2016-08-03','14:38:32','kdm','1470215312_'),(245,'2016-08-03','14:39:02','kdm','1470215342_'),(246,'2016-08-03','14:39:55','kdm','1470215395_'),(247,'2016-08-03','14:40:16','kdm','1470215416_'),(248,'2016-08-03','14:40:50','kdm','1470215450_'),(249,'2016-08-03','15:56:30','kdm','1470219990_'),(250,'2016-08-03','15:56:55','kdm','1470220015_'),(251,'2016-08-03','16:01:50','kdm','1470220310_'),(252,'2016-08-03','16:15:13','kdm','1470221113_'),(253,'2016-08-03','16:15:51','kdm','1470221151_'),(254,'2016-08-03','16:16:13','kdm','1470221173_'),(255,'2016-08-03','16:36:08','kdm','1470222368_'),(256,'2016-08-03','16:47:44','kdm','1470223064_'),(257,'2016-08-03','17:07:35','kdm','1470224255_'),(258,'2016-08-03','17:09:29','kdm','1470224369_'),(259,'2016-08-11','11:21:34','kdm','1470894694_'),(260,'2016-08-11','11:22:27','kdm','1470894747_'),(261,'2016-08-11','11:23:18','kdm','1470894798_'),(262,'2016-08-11','11:23:39','kdm','1470894819_'),(263,'2016-08-11','11:23:57','kdm','1470894837_'),(264,'2016-08-11','11:25:14','kdm','1470894914_'),(265,'2016-08-11','11:26:24','kdm','1470894984_'),(266,'2016-08-11','11:26:42','kdm','1470895002_'),(267,'2016-09-09','14:29:28','kdm','1473411567_'),(268,'2016-09-10','08:33:40','kdm','1473489220_'),(269,'2016-09-10','08:35:06','kdm','1473489306_'),(270,'2016-09-10','21:05:02','kdm','1473534301_'),(271,'2016-09-11','01:34:14','kdm','1473550454_'),(272,'2016-09-11','03:23:25','kdm','1473557005_'),(273,'2016-09-11','03:49:34','kdm','1473558574_'),(274,'2016-09-11','03:50:08','kdm','1473558608_'),(275,'2016-09-11','21:11:19','kdm','1473621079_'),(276,'2016-09-11','22:50:48','kdm','1473627048_'),(277,'2016-09-11','23:56:13','vn','1473630973_'),(278,'2016-09-11','23:59:34','abc','1473631174_'),(279,'2016-09-12','01:28:44','abc','1473636524_'),(280,'2016-09-12','02:29:59','abc','1473640199_'),(281,'2016-09-12','02:31:51','abc','1473640311_'),(282,'2016-09-12','02:32:03','abc','1473640323_4'),(283,'2016-09-12','02:34:44','abc','1473640484_4'),(284,'2016-09-12','02:40:02','abc','1473640802_4'),(285,'2016-09-12','02:40:04','abc','1473640804_4'),(286,'2016-09-12','02:40:04','abc','1473640804_4'),(287,'2016-09-12','02:40:06','abc','1473640806_4'),(288,'2016-09-12','02:40:07','abc','1473640807_4'),(289,'2016-09-12','02:40:40','abc','1473640840_4'),(290,'2016-09-12','02:40:41','abc','1473640841_4'),(291,'2016-09-12','02:40:42','abc','1473640842_4'),(292,'2016-09-12','02:43:46','abc','1473641026_4'),(293,'2016-09-12','02:43:48','abc','1473641028_4'),(294,'2016-09-12','02:43:48','abc','1473641028_4'),(295,'2016-09-12','02:43:50','abc','1473641030_4'),(296,'2016-09-12','02:44:00','abc','1473641040_4'),(297,'2016-09-12','02:44:37','abc','1473641077_4'),(298,'2016-09-12','02:45:48','abc','1473641148_4'),(299,'2016-09-12','02:46:27','abc','1473641187_4'),(300,'2016-09-12','02:48:42','abc','1473641322_4'),(301,'2016-09-12','02:53:39','abc','1473641619_4'),(302,'2016-09-12','03:01:44','abc','1473642104_4'),(303,'2016-09-12','03:46:22','abc','1473644782_4'),(304,'2016-09-12','03:49:18','abc','1473644958_4'),(305,'2016-09-12','03:50:59','abc','1473645059_4'),(306,'2016-09-12','03:51:50','abc','1473645110_4'),(307,'2016-09-12','03:52:42','abc','1473645162_4'),(308,'2016-09-12','03:52:49','abc','1473645169_4'),(309,'2016-09-12','03:54:42','abc','1473645282_4'),(310,'2016-09-12','03:58:22','abc','1473645502_4'),(311,'2016-09-12','03:58:28','abc','1473645508_4'),(312,'2016-09-12','04:00:41','abc','1473645641_4'),(313,'2016-09-12','04:01:40','abc','1473645700_4'),(314,'2016-09-12','04:03:11','abc','1473645791_4'),(315,'2016-09-12','04:08:13','abc','1473646093_4'),(316,'2016-09-12','04:09:01','abc','1473646141_4'),(317,'2016-09-12','04:09:37','abc','1473646177_4'),(318,'2016-09-12','04:09:45','abc','1473646185_4'),(319,'2016-09-12','04:10:25','abc','1473646225_4'),(320,'2016-09-12','04:14:12','abc','1473646452_4'),(321,'2016-09-12','04:14:41','abc','1473646481_4'),(322,'2016-09-12','04:14:49','abc','1473646489_4'),(323,'2016-09-12','04:15:36','abc','1473646536_4'),(324,'2016-09-12','04:16:13','abc','1473646573_4'),(325,'2016-09-12','04:17:15','abc','1473646635_4'),(326,'2016-09-12','04:17:34','abc','1473646654_4'),(327,'2016-09-12','04:17:47','abc','1473646667_4'),(328,'2016-09-12','04:18:02','abc','1473646682_4'),(329,'2016-09-12','04:27:16','abc','1473647236_4'),(330,'2016-09-12','04:43:08','abc','1473648188_4'),(331,'2016-09-12','04:43:52','abc','1473648232_4'),(332,'2016-09-12','04:44:29','abc','1473648269_4'),(333,'2016-09-12','04:47:09','abc','1473648429_4'),(334,'2016-09-12','04:47:39','abc','1473648459_4'),(335,'2016-09-12','04:49:12','abc','1473648552_4'),(336,'2016-09-12','04:56:19','abc','1473648979_4'),(337,'2016-09-12','04:59:47','abc','1473649187_4'),(338,'2016-09-12','05:00:29','abc','1473649229_4'),(339,'2016-09-12','05:01:29','abc','1473649289_4'),(340,'2016-09-12','05:02:41','abc','1473649361_4'),(341,'2016-09-12','05:03:28','abc','1473649408_4'),(342,'2016-09-12','05:21:51','abc','1473650511_4'),(343,'2016-09-12','14:48:00','abc','1473671879_4'),(344,'2016-09-12','14:48:43','abc','1473671923_4'),(345,'2016-09-12','14:49:57','abc','1473671997_4'),(346,'2016-09-12','14:49:59','abc','1473671999_4'),(347,'2016-09-12','14:50:15','abc','1473672015_4'),(348,'2016-09-12','14:50:17','abc','1473672017_4'),(349,'2016-09-12','14:50:27','abc','1473672027_4'),(350,'2016-09-12','14:50:29','abc','1473672029_4'),(351,'2016-09-12','15:00:16','abc','1473672616_4'),(352,'2016-09-12','15:01:10','abc','1473672670_4'),(353,'2016-09-12','15:01:58','abc','1473672718_4'),(354,'2016-09-12','15:18:14','abc','1473673694_4'),(355,'2016-09-12','15:32:44','abc','1473674564_4'),(356,'2016-09-12','15:32:58','abc','1473674578_4'),(357,'2016-09-12','15:36:08','abc','1473674768_4'),(358,'2016-09-12','15:43:41','abc','1473675221_4'),(359,'2016-09-12','16:05:23','abc','1473676523_4'),(360,'2016-09-12','16:06:19','abc','1473676579_4'),(361,'2016-09-12','16:08:14','abc','1473676694_4'),(362,'2016-09-12','16:30:16','abc','1473678016_4'),(363,'2016-09-12','16:48:27','abc','1473679107_4'),(364,'2016-09-12','16:49:19','abc','1473679159_4'),(365,'2016-09-12','16:49:32','abc','1473679172_4'),(366,'2016-09-12','16:49:55','abc','1473679195_4'),(367,'2016-09-12','16:50:15','abc','1473679215_4'),(368,'2016-09-12','16:50:27','abc','1473679227_4'),(369,'2016-09-12','16:50:36','abc','1473679236_4'),(370,'2016-09-12','16:50:46','abc','1473679246_4'),(371,'2016-09-12','16:50:59','abc','1473679259_4'),(372,'2016-09-12','16:51:15','abc','1473679275_4'),(373,'2016-09-12','17:12:18','abc','1473680538_4'),(374,'2016-09-12','17:13:25','abc','1473680605_4'),(375,'2016-09-13','09:16:07','abc','1473738366_4'),(376,'2016-09-13','10:10:22','abc','1473741622_4'),(377,'2016-09-13','10:33:55','abc','1473743035_4'),(378,'2016-09-13','10:54:27','abc','1473744267_4'),(379,'2016-09-13','10:55:31','abc','1473744331_4'),(380,'2016-09-13','10:56:27','abc','1473744387_4'),(381,'2016-09-13','11:01:44','abc','1473744704_4'),(382,'2016-09-13','12:13:00','abc','1473748980_4'),(383,'2016-09-13','12:54:32','abc','1473751472_4'),(384,'2016-09-13','13:03:07','abc','1473751987_4'),(385,'2016-09-13','13:10:30','abc','1473752430_4'),(386,'2016-09-13','13:17:06','abc','1473752826_4'),(387,'2016-09-13','13:17:47','abc','1473752867_4'),(388,'2016-09-13','13:19:16','abc','1473752956_4'),(389,'2016-09-13','13:24:17','abc','1473753257_4'),(390,'2016-09-13','13:26:27','abc','1473753387_4'),(391,'2016-09-13','13:27:09','abc','1473753429_4'),(392,'2016-09-13','13:27:41','abc','1473753461_4'),(393,'2016-09-13','13:27:57','abc','1473753477_4'),(394,'2016-09-13','13:33:53','abc','1473753833_4'),(395,'2016-09-13','14:01:10','abc','1473755470_4'),(396,'2016-09-13','14:01:35','abc','1473755495_4'),(397,'2016-09-13','14:02:41','abc','1473755561_4'),(398,'2016-09-13','14:04:00','abc','1473755640_4'),(399,'2016-09-13','14:20:19','abc','1473756619_4'),(400,'2016-09-13','14:22:01','abc','1473756721_4'),(401,'2016-09-13','14:22:28','abc','1473756748_4'),(402,'2016-09-13','14:22:47','abc','1473756767_4'),(403,'2016-09-13','14:23:41','abc','1473756821_4'),(404,'2016-09-13','14:26:05','abc','1473756965_4'),(405,'2016-09-13','14:26:53','abc','1473757013_4'),(406,'2016-09-13','14:27:19','abc','1473757039_4'),(407,'2016-09-13','14:28:13','abc','1473757093_4'),(408,'2016-09-13','14:29:04','abc','1473757144_4'),(409,'2016-09-13','14:30:40','abc','1473757240_4'),(410,'2016-09-13','15:12:45','abc','1473759765_4'),(411,'2016-09-13','15:13:38','abc','1473759818_4'),(412,'2016-09-13','15:43:54','abc','1473761634_'),(413,'2016-09-13','15:46:09','abc','1473761769_'),(414,'2016-09-13','15:48:22','f','1473761902_'),(415,'2016-09-13','15:49:08','f','1473761948_'),(416,'2016-09-13','15:53:01','f','1473762181_'),(417,'2016-09-13','15:53:40','f','1473762220_'),(418,'2016-09-13','15:53:52','f','1473762232_'),(419,'2016-09-13','15:54:46','f','1473762286_'),(420,'2016-09-13','16:02:48','abc','1473762768_'),(421,'2016-09-13','16:05:48','abc','1473762948_'),(422,'2016-09-13','16:08:01','abc','1473763081_'),(423,'2016-09-13','16:11:57','abc','1473763317_'),(424,'2016-09-15','18:43:03','abc','1473957783_'),(425,'2016-09-15','18:43:25','tttt','1473957805_'),(426,'2016-09-15','18:43:51','drt','1473957831_'),(427,'2016-09-15','18:45:06','drt','1473957906_'),(428,'2016-09-15','18:49:23','drt','1473958163_'),(429,'2016-09-15','18:59:33','abc','1473958773_'),(430,'2016-09-15','18:59:41','tttt','1473958781_'),(431,'2016-09-15','19:00:06','tttt','1473958806_'),(432,'2016-09-15','19:00:38','drt','1473958838_'),(433,'2016-09-15','19:00:49','abc','1473958849_'),(434,'2016-09-15','19:00:59','drt','1473958859_'),(435,'2016-09-15','19:10:51','drt','1473959451_'),(436,'2016-09-15','19:11:02','drt','1473959462_'),(437,'2016-09-15','20:28:31','abc','1473964111_'),(438,'2016-09-15','20:28:40','drt','1473964120_'),(439,'2016-09-16','18:33:27','drt','1474043607_'),(440,'2016-09-16','18:34:20','abc','1474043660_'),(441,'2016-09-17','15:42:26','abc','1474119746_'),(442,'2016-09-17','17:54:00','abc','1474127640_'),(443,'2016-09-17','18:45:40','abc','1474130740_'),(444,'2016-09-18','15:11:56','abc','1474204316_');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_food`
--

DROP TABLE IF EXISTS `menu_food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_food` (
  `menu_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  KEY `fk_menu$menu_food_idx` (`menu_id`),
  KEY `fk_food$menu_food_idx` (`food_id`),
  CONSTRAINT `fk_food$menu_food` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_menu$menu_food` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_food`
--

LOCK TABLES `menu_food` WRITE;
/*!40000 ALTER TABLE `menu_food` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `reservation_id` int(10) NOT NULL,
  `payment_method_id` int(10) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `fk_reservation$payment_idx` (`reservation_id`),
  KEY `fk_payment_method$payment_idx` (`payment_method_id`),
  CONSTRAINT `fk_payment_method$payment` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`payment_method_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_reservation$payment` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_method` (
  `payment_method_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_method_name` varchar(20) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_method`
--

LOCK TABLES `payment_method` WRITE;
/*!40000 ALTER TABLE `payment_method` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `reservation_id` int(10) NOT NULL AUTO_INCREMENT,
  `reservation_date` date DEFAULT NULL,
  `status` enum('Pending','Completed','Cancelled') NOT NULL,
  `customer_id` int(10) NOT NULL,
  `feedback_id` int(10) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `fk_customer$reservation_idx` (`customer_id`),
  KEY `fk_feedback$reservation_idx` (`feedback_id`),
  CONSTRAINT `fk_customer$reservation` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_feedback$reservation` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`feedback_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_item`
--

DROP TABLE IF EXISTS `reservation_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_item` (
  `reservation_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  KEY `fk_reservation$reservation_item_idx` (`reservation_id`),
  KEY `fk_item$reservation_item_idx` (`item_id`),
  CONSTRAINT `fk_item$reservation_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_reservation$reservation_item` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_item`
--

LOCK TABLES `reservation_item` WRITE;
/*!40000 ALTER TABLE `reservation_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_no` int(10) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `room_type_id` int(10) NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `fk_rorm$room_type_idx` (`room_type_id`),
  CONSTRAINT `fk_room$room_type` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_feature`
--

DROP TABLE IF EXISTS `room_feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_feature` (
  `room_id` int(10) NOT NULL,
  `feature_id` int(10) NOT NULL,
  KEY `fk_room$room_feature_idx` (`room_id`),
  KEY `fk_feature$room_feature_idx` (`feature_id`),
  CONSTRAINT `fk_feature$room_feature` FOREIGN KEY (`feature_id`) REFERENCES `feature` (`feature_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_room$room_feature` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_feature`
--

LOCK TABLES `room_feature` WRITE;
/*!40000 ALTER TABLE `room_feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `room_feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_type` (
  `room_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_type`
--

LOCK TABLES `room_type` WRITE;
/*!40000 ALTER TABLE `room_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `room_type` ENABLE KEYS */;
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
  `telephone` int(10) unsigned zerofill NOT NULL,
  `registered_date` date NOT NULL,
  `group_id` int(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `name_UNIQUE` (`username`),
  KEY `fk_user_1_idx` (`group_id`),
  CONSTRAINT `fk_groups$user` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'kdm','40bd001563085fc35165329ea1ff5c5ecbdbbeef','Kasun','Madusanke','kdm@live.com',0778087663,'2016-09-02',1),(4,'abc','40bd001563085fc35165329ea1ff5c5ecbdbbeef','asd','psd','abc@gmail.com',0711237332,'2016-09-02',1),(5,'tttt','dced9f4967fd10b51a5c9cfc545b19cb37c5b668','Kasun','Madusanke','kasunutube@ymail.com',0785863300,'2016-09-04',2),(6,'f','36ad8c46fed42f9fa77924b4821ed2062ae8cc14','Kasun','Madusanke','kasunutube@ymail.com',0785863300,'2016-09-06',3),(10,'dg','a9ef1bf4dac17d008c8a7563179ae30574f4dd86','Kasun','Madusanke','kasunutube@ymail.com',0785863300,'2016-09-06',3),(14,'fghfghf','a9ef1bf4dac17d008c8a7563179ae30574f4dd86','Kasun','Madusanke','kasunutube@ymail.com',0785863300,'2016-09-06',2),(21,'drt','dced9f4967fd10b51a5c9cfc545b19cb37c5b668','gfhgfhfghfgh','fghfghfg','kasunutube@ymail.com',0111111111,'2016-09-06',3),(22,'asasda3232','dced9f4967fd10b51a5c9cfc545b19cb37c5b668','erhhh','df','asdas@eddd.ll',0785863300,'2016-09-07',2),(23,'sss','dced9f4967fd10b51a5c9cfc545b19cb37c5b668','Kasundfgdf','Mdff','kasunutube@ymail.com',0785863300,'2016-09-07',3),(26,'vn','a9ef1bf4dac17d008c8a7563179ae30574f4dd86','xv','fv','bjj@fsds.fd',0777777777,'2016-09-08',2),(27,'op[','a9ef1bf4dac17d008c8a7563179ae30574f4dd86','wedsa','ase','asda@dsaa.lk',0777777770,'2016-09-08',4);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-18 19:32:34
