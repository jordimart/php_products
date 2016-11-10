CREATE DATABASE  IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `shop`;
-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: rural_shop
-- ------------------------------------------------------
-- Server version	5.6.27-0ubuntu0.15.04.1

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `serial_number` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `trademark` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `model` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `date_entry` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `date_exit` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `purchase_price` float NOT NULL DEFAULT '0',
  `sale_price` float NOT NULL DEFAULT '0',
  `provider` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `weight` float NOT NULL DEFAULT '0',
  `height` float NOT NULL DEFAULT '0',
  `width` float NOT NULL DEFAULT '0',
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Any` tinyint(1) DEFAULT NULL,
  `6_months` tinyint(1) DEFAULT NULL,
  `1_year` tinyint(1) DEFAULT NULL,
  `5_years` tinyint(1) DEFAULT NULL,
  `8_years` tinyint(1) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,


  PRIMARY KEY (`serial_number`),
  UNIQUE KEY `serial_number` (`serial_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES ('NT6000A885432','Photovoltaic','Sunways','NT6000','05-10-2016','06-10-2016',1000,1500,'Soleos',20,30,40,'description','status',0,0,1,1,0,'/media/default-avatar.png');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-04 18:58:01
