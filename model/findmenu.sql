CREATE DATABASE  IF NOT EXISTS `findmenu` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `findmenu`;
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

DROP TABLE IF EXISTS `restaurantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurantes` (
  `id` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `poblacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `latitud` float NOT NULL DEFAULT '0',
  `longitud` float NOT NULL DEFAULT '0',
  `titular` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `precio_menu` float NOT NULL DEFAULT '0',
  `precio_menu_almuerzo` float NOT NULL DEFAULT '0',
  `precio_menu_noche` float NOT NULL DEFAULT '0',
  `valoracion` tinyint(1) DEFAULT NULL,
  `foto_menu` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `foto_menu_almuerzo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `foto_menu_noche` varchar(200) COLLATE utf8_spanish_ci NOT NULL,



  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `restaurantes` WRITE;
/*!40000 ALTER TABLE `restaurantes` DISABLE KEYS */;
INSERT INTO `restaurantes` VALUES ('000000001','Bar el LLombo','Spain','Valencia','Ontinyent','Avenida conde Torrefiel 30',38.81858815239258,-0.6092583283003639,'Manolo Gimenez','/media/default-restaurante.jpg',10,5,12,4,'/media/default-menu-mediodia.jpg','/media/default-almuerzo.jpg','/media/default-menu-noche.jpg'),('000000002','Bar la Taska','Spain','Valencia','Ontinyent','Carrer Rafael Juan Vidal 20',38.81904216042001,-0.6104985146936248,'Rafa Lopez','/media/default-restaurante.jpg',11,5.5,14,5,'/media/default-menu-mediodia.jpg','/media/default-almuerzo.jpg','/media/default-menu-noche.jpg'),('000000003','Bar Tauro','Spain','Valencia','Ontinyent','Avenida conde Torrefiel 20',38.8195604261144,-0.6099204986509155,'Benito Sanchez','/media/default-restaurante.jpg',9,6,16,3,'/media/default-menu-mediodia.jpg','/media/default-almuerzo.jpg','/media/default-menu-noche.jpg'),('000000004','El Encuentro','Spain','Valencia','Ontinyent','Carretera cv-81',38.81368896566597,-0.6085559248145889,'Juan Muriana','/media/default-restaurante.jpg',10,7,20,2,'/media/default-menu-mediodia.jpg','/media/default-almuerzo.jpg','/media/default-menu-noche.jpg'),('000000005','Hermanos Camineros','Spain','Valencia','Villena','CalleTomasGines Galvis',38.64610936305988,-0.8678655528938228,'Pepe Soriano','/media/default-restaurante.jpg',8,4,12,5,'/media/default-menu-mediodia.jpg','/media/default-almuerzo.jpg','/media/default-menu-noche.jpg');
/*!40000 ALTER TABLE `restaurantes` ENABLE KEYS */;
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
