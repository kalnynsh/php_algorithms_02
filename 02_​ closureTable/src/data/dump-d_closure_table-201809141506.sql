-- MySQL dump 10.16  Distrib 10.3.9-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: d_closure_table
-- ------------------------------------------------------
-- Server version	10.3.9-MariaDB-1:10.3.9+maria~bionic-log

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
-- Table structure for table `categories_ct`
--

DROP TABLE IF EXISTS `categories_ct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_ct` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_ct`
--

LOCK TABLES `categories_ct` WRITE;
/*!40000 ALTER TABLE `categories_ct` DISABLE KEYS */;
INSERT INTO `categories_ct` VALUES (1,'Catalog'),(2,'Clothes'),(3,'Food'),(4,'Upper clothes'),(5,'Fast food'),(6,'Underwear');
/*!40000 ALTER TABLE `categories_ct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_ct_tree`
--

DROP TABLE IF EXISTS `categories_ct_tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_ct_tree` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL COMMENT 'ancestor',
  `child_id` int(11) NOT NULL COMMENT 'descendant',
  `level` int(11) DEFAULT NULL COMMENT 'Depth',
  `comment` varchar(100) DEFAULT NULL,
  `nearest_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_ct_tree`
--

LOCK TABLES `categories_ct_tree` WRITE;
/*!40000 ALTER TABLE `categories_ct_tree` DISABLE KEYS */;
INSERT INTO `categories_ct_tree` VALUES (1,1,1,0,'Catalog',1),(2,1,2,1,'Catalog - Clothes',1),(3,2,2,1,'Clothes',1),(4,1,3,1,'Catalog - Food',1),(5,3,3,1,'Food',1),(6,1,4,2,'Catalog - Upper clothes',2),(7,2,4,2,'Clothes - Upper clothes',2),(8,1,6,2,'Catalog - Underwear',2),(9,2,6,2,'Clothes - Underwear',2),(10,1,5,2,'Catalog - Fast food',3),(11,3,5,2,'Food - Fast food',3);
/*!40000 ALTER TABLE `categories_ct_tree` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-14 15:06:07
