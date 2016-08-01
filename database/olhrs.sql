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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2016-07-30','08:37:49','kdm','1469860669_3'),(2,'2016-07-30','08:39:27','kdm','1469860767_3'),(3,'2016-07-30','08:47:27','kdm','1469861247_3'),(4,'2016-07-30','08:52:13','kdm','1469861533_3'),(5,'2016-07-30','09:09:47','kdm','1469862587_3'),(6,'2016-07-30','09:11:44','kdm','1469862704_3'),(7,'2016-07-30','09:13:27','kdm','1469862807_3'),(8,'2016-07-30','09:13:57','kdm','1469862837_3'),(9,'2016-07-30','20:36:52','kdm','1469903812_3'),(10,'2016-07-30','21:01:46','kdm','1469905306_3'),(11,'2016-07-30','21:04:29','kdm','1469905469_3'),(12,'2016-07-30','21:25:30','kdm','1469906730_3'),(13,'2016-07-30','21:26:01','kdm','1469906761_3'),(14,'2016-07-30','21:30:14','kdm','1469907014_3'),(15,'2016-07-30','21:32:08','kdm','1469907128_3'),(16,'2016-07-30','21:37:55','kdm','1469907475_3'),(17,'2016-07-30','21:38:06','kdm','1469907486_3'),(18,'2016-07-30','23:44:27','kdm','1469915067_3'),(19,'2016-07-31','00:11:51','kdm','1469916711_3');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telephone` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'kdm','40bd001563085fc35165329ea1ff5c5ecbdbbeef','Kasun','Madusanke','kdm@live.com',778087663);
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

-- Dump completed on 2016-07-31 18:00:56
