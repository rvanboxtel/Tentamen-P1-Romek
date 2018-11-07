CREATE DATABASE  IF NOT EXISTS `lego-app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `lego-app`;
-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lego-app
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) unsigned DEFAULT NULL,
  `postid` int(11) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `upvotes` int(11) DEFAULT '0',
  `downvotes` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,1,'Lego police coffeedoppio, seasonal con panna at a organic. Café au lait, as aromatic acerbic cream extra beans bar whipped so cultivar.',0,0),(2,3,1,'Test',3,0),(3,1,1,'test',0,0),(4,1,1,'test',0,0),(5,1,1,'test',0,0),(6,1,1,'test',0,0),(7,1,1,'test',0,0),(8,1,1,'test',0,0),(9,1,1,'',0,0),(10,1,1,'',0,0),(11,1,1,'test',0,0),(12,1,1,'test',0,0),(13,5,1,'test',0,0),(14,5,1,'test',0,0),(15,5,1,'test',0,0),(16,5,1,'tesst',0,0),(17,5,1,'tesst',0,0),(18,5,1,'tesst',0,0),(19,5,1,'tesst',0,0),(20,5,1,'test',0,0),(21,5,1,'test',0,0),(22,5,1,'yrst',0,0),(23,1,3,'test',0,0);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legoideas`
--

DROP TABLE IF EXISTS `legoideas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `legoideas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) unsigned DEFAULT NULL,
  `postid` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(250) DEFAULT NULL,
  `step01` varchar(250) DEFAULT '',
  `pieces01` varchar(250) DEFAULT '',
  `step02` varchar(250) DEFAULT '',
  `pieces02` varchar(250) DEFAULT '',
  `step03` varchar(250) DEFAULT '',
  `pieces03` varchar(250) DEFAULT '',
  `step04` varchar(250) DEFAULT '',
  `pieces04` varchar(250) DEFAULT '',
  `step05` varchar(250) DEFAULT '',
  `pieces05` varchar(250) DEFAULT '',
  `img-end-result` blob,
  PRIMARY KEY (`id`),
  KEY `postIdLegoId_idx` (`postid`),
  CONSTRAINT `postIdLegoId` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legoideas`
--

LOCK TABLES `legoideas` WRITE;
/*!40000 ALTER TABLE `legoideas` DISABLE KEYS */;
INSERT INTO `legoideas` VALUES (1,1,1,'Xtreme Police','This police man does not fear any obstical','sOsobiście uważam, że z Lego się nie wyrasta. Ewentualnie ja nie dorastam. Ale przyszedł moment, w którym z \"budowania do szuflady\" postanowiłem, zainspirowanymi kilkoma wspaniałymi blogami AFOLi, założyć coś własnego.','5 rectancal 4, 4 double','budowania do szuflady postanowiłem, zainspirowanymi','500x2dotsqure','sOsobiście uważam, że z Lego się nie wyrasta.','5 triangle',' ',' ',' ',' ',NULL),(3,5,3,'test2','test','test','test','test','test','test','test','test','test','test','test',NULL);
/*!40000 ALTER TABLE `legoideas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `description` varchar(1250) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'great Xtreme Police','Lego wings in as grounds chicory galão redeye french press cortado sugar. Mug spoon ristretto foam aroma iced to go redeye extra kopi-luwak. Lungo latte decaffeinated, con panna caffeine half and half organic lungo. Steamed, wings seasonal fair trade rich that con panna organic.'),(3,'test2','test');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (0,'User'),(1,'Moderator'),(2,'Admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL DEFAULT '',
  `mobile` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL DEFAULT '',
  `roleid` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_banned` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Stephan','Hoeksema','Stephan@test.net','0612345678','$2y$10$NOy/5RqvUZM5folw6fLx5edkhUQE1XzzISlZRCjx1F1DdSd5lBKo6',2,0,0),(2,'henk','brouwer','hbrouwer@test.ex','0612345679','$2y$10$lCsMbheShIeCqjjDEheHxOUcW.5QW8HIhl.Iy2QUk/8GhYszdGmX.',0,0,0),(3,'test2','test','test2@test.net','0612345675','$2y$10$iSzQhNR3VZCzp.sOanLTjeAnazTU8PHeh/j3MKTaj1W6z6L6AQITa',0,0,0),(4,'ik','ben','een@test.nl','0368575856','$2y$10$1V3aUKEqIIXaWQkavFBp3.L.83H9G0Ek/hqW3UbW4.ORBx2j3qB8q',0,0,1),(5,'Romek','van Boxtel','rtest@test.test','0612345674','$2y$10$TRp90U0z1xErncdCms0Kn.2ff31U9JkG/eL3hBAXxWtyJITLI86ti',2,0,0),(6,'Rudy','Borgstede','Rudy@ruble.net','0612345676','$2y$10$fjz52TOndN3mrgOHYv2lR.CvfnOsMBka8.8qzSfbRiJWYDSdNojEi',1,0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'lego-app'
--

--
-- Dumping routines for database 'lego-app'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-07 16:21:39
