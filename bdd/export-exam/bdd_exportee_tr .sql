-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: exam-php
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `competence`
--

DROP TABLE IF EXISTS `competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competence` (
  `titre` varchar(250) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `competence_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competence`
--

LOCK TABLES `competence` WRITE;
/*!40000 ALTER TABLE `competence` DISABLE KEYS */;
INSERT INTO `competence` VALUES ('test 6',1,5),('test4',6,3),('qdkJFIOEjk',8,4);
/*!40000 ALTER TABLE `competence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `experience_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,'testtiusdqJK','MLDKQPOFUIjkldsgjqioujEQDLKFQJFOQIkl','2020-07-14','2020-07-13'),(4,'test 42','diqofueiosfjsoqiugdfqgokfruqiou','2020-05-06','2020-06-09'),(5,'QZERZKPOK','DPOSKPOTKRSPKPÙKPkpoksqptgok','2020-07-13','2020-07-16');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','admin','21232f297a57a5a743894a0e4a801fc3','admin@admin.admin',1),('test','test','098f6bcd4621d373cade4e832627b4f6','test@gmail',2),('test2','test2','ad0234829205b9033196ba818f7a872b','test2@gmail.com',3);
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

-- Dump completed on 2020-07-15 16:19:17
