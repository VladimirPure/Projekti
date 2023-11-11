CREATE DATABASE  IF NOT EXISTS `3demand` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `3demand`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: 3demand
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(127) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_category_id_uindex` (`category_id`),
  UNIQUE KEY `category_name_uindex` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'action figure','2022-01-25 20:58:19'),(2,'tools','2022-01-26 17:39:50');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company` (
  `company_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(127) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `company_company_id_uindex` (`company_id`),
  UNIQUE KEY `company_name_uindex` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Creality','2022-01-25 20:24:58'),(2,'Prusa','2022-01-25 20:24:58'),(3,'Ultimaker','2022-01-25 20:24:58'),(4,'Elegoo','2022-01-25 20:24:58');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_file`
--

DROP TABLE IF EXISTS `forum_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_file` (
  `forum_files` int NOT NULL AUTO_INCREMENT,
  `forum_post_id` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`forum_files`),
  UNIQUE KEY `forum_files_forum_files_uindex` (`forum_files`),
  UNIQUE KEY `forum_files_path_uindex` (`path`),
  KEY `fk_forum_files_forum_post_id` (`forum_post_id`),
  CONSTRAINT `fk_forum_files_forum_post_id` FOREIGN KEY (`forum_post_id`) REFERENCES `forum_post` (`forum_post_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_file`
--

LOCK TABLES `forum_file` WRITE;
/*!40000 ALTER TABLE `forum_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_post`
--

DROP TABLE IF EXISTS `forum_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_post` (
  `forum_post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`forum_post_id`),
  UNIQUE KEY `forum_post_post_id_uindex` (`forum_post_id`),
  UNIQUE KEY `forum_post_title_uindex` (`title`),
  KEY `fk_forum_post_user_id` (`user_id`),
  CONSTRAINT `fk_forum_post_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_post`
--

LOCK TABLES `forum_post` WRITE;
/*!40000 ALTER TABLE `forum_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model` (
  `model_id` int NOT NULL AUTO_INCREMENT,
  `model_name` varchar(127) NOT NULL,
  `company_id` int NOT NULL,
  `type` enum('Resin','FDM') NOT NULL,
  PRIMARY KEY (`model_id`),
  UNIQUE KEY `model_model_id_uindex` (`model_id`),
  UNIQUE KEY `model_model_name_uindex` (`model_name`),
  KEY `fk_model_company` (`company_id`),
  CONSTRAINT `fk_model_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES (1,'Ender 3',1,'FDM'),(2,'Ender 5',1,'FDM'),(3,'Ender 3 pro',1,'FDM'),(4,'Ender 3 v2',1,'FDM'),(5,'CR 10',1,'FDM'),(6,'CR 10s',1,'FDM'),(7,'i3 MK2',2,'FDM'),(8,'i3 MK3',2,'FDM'),(9,'S3',3,'FDM'),(10,'S5',3,'FDM'),(11,'Mars',4,'Resin'),(12,'Mars 2',4,'Resin');
/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printer_ad`
--

DROP TABLE IF EXISTS `printer_ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `printer_ad` (
  `printer_ad_id` int NOT NULL AUTO_INCREMENT,
  `model_id` int NOT NULL,
  `minimal_resolution` float NOT NULL,
  `maximal_resolution` float NOT NULL,
  `printing_speed` int NOT NULL DEFAULT '0',
  `working_hour_price` float NOT NULL,
  `user_id` int NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`printer_ad_id`),
  UNIQUE KEY `printer_ad_printer_ad_id_uindex` (`printer_ad_id`),
  KEY `fk_printer_ad_user_id` (`user_id`),
  KEY `fk_printer_ad_model_id_idx` (`model_id`),
  CONSTRAINT `fk_printer_ad_model_id` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_printer_ad_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printer_ad`
--

LOCK TABLES `printer_ad` WRITE;
/*!40000 ALTER TABLE `printer_ad` DISABLE KEYS */;
INSERT INTO `printer_ad` VALUES (1,4,50,300,60,10,100,NULL),(4,5,50,500,100,100,100,''),(5,3,50,300,100,10,100,''),(7,11,50,100,1010,30,100,''),(9,10,50,100,100,30,101,''),(12,9,30,300,150,30,101,''),(13,5,50,100,100,12,101,''),(14,5,50,50,100,10,100,''),(18,4,50,300,100,10,100,'61nQWzU87gL._SL1000_.jpg'),(19,8,50,500,200,50,100,'yY.jpg');
/*!40000 ALTER TABLE `printer_ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printer_feedback`
--

DROP TABLE IF EXISTS `printer_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `printer_feedback` (
  `printer_feedback_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `printer_ad_id` int NOT NULL,
  `rate` enum('1','2','3','4','5') NOT NULL DEFAULT '5',
  `feedback_description` text,
  PRIMARY KEY (`printer_feedback_id`),
  UNIQUE KEY `printer_feedback_printer_feedback_id_uindex` (`printer_feedback_id`),
  KEY `fk_printer_feedback_printer_ad_id` (`printer_ad_id`),
  KEY `fk_printer_feedback_user_id` (`user_id`),
  CONSTRAINT `fk_printer_feedback_printer_ad_id` FOREIGN KEY (`printer_ad_id`) REFERENCES `printer_ad` (`printer_ad_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_printer_feedback_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printer_feedback`
--

LOCK TABLES `printer_feedback` WRITE;
/*!40000 ALTER TABLE `printer_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `printer_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printing_demand`
--

DROP TABLE IF EXISTS `printing_demand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `printing_demand` (
  `printing_demand_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `demand_description` text NOT NULL,
  `user_id` int NOT NULL,
  `files_path` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`printing_demand_id`),
  UNIQUE KEY `printing_demand_printing_demand_id_uindex` (`printing_demand_id`),
  KEY `fk_printing_demand_user_id` (`user_id`),
  CONSTRAINT `fk_printing_demand_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printing_demand`
--

LOCK TABLES `printing_demand` WRITE;
/*!40000 ALTER TABLE `printing_demand` DISABLE KEYS */;
INSERT INTO `printing_demand` VALUES (1,'proba','proba',100,'',NULL),(2,'Neki predmet','Treba mi neko da mi istampa ovo',100,'',''),(3,'Francuski kljuc','Opis',100,'','');
/*!40000 ALTER TABLE `printing_demand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printing_demand_category`
--

DROP TABLE IF EXISTS `printing_demand_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `printing_demand_category` (
  `printing_demand_category_id` int NOT NULL AUTO_INCREMENT,
  `printing_demand_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`printing_demand_category_id`),
  UNIQUE KEY `printing_demand_category_printing_demand_category_id_uindex` (`printing_demand_category_id`),
  KEY `fk_printing_demand_category_category_id` (`category_id`),
  KEY `fk_printing_demand_category_printing_demand_id` (`printing_demand_id`),
  CONSTRAINT `fk_printing_demand_category_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_printing_demand_category_printing_demand_id` FOREIGN KEY (`printing_demand_id`) REFERENCES `printing_demand` (`printing_demand_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printing_demand_category`
--

LOCK TABLES `printing_demand_category` WRITE;
/*!40000 ALTER TABLE `printing_demand_category` DISABLE KEYS */;
INSERT INTO `printing_demand_category` VALUES (1,1,1),(2,2,1),(3,3,2);
/*!40000 ALTER TABLE `printing_demand_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printing_demand_feedback`
--

DROP TABLE IF EXISTS `printing_demand_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `printing_demand_feedback` (
  `printing_demand_feedback_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `printing_demand_id` int NOT NULL,
  `rate` enum('1','2','3','4','5') NOT NULL DEFAULT '5',
  `feedback_description` text,
  PRIMARY KEY (`printing_demand_feedback_id`),
  UNIQUE KEY `feedback_ad_id_uindex` (`printing_demand_id`),
  UNIQUE KEY `feedback_feedback_id_uindex` (`printing_demand_feedback_id`),
  KEY `fk_feedback_user_id` (`user_id`),
  CONSTRAINT `fk_demand_feedack_printing_demand_id` FOREIGN KEY (`printing_demand_id`) REFERENCES `printing_demand` (`printing_demand_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_feedback_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printing_demand_feedback`
--

LOCK TABLES `printing_demand_feedback` WRITE;
/*!40000 ALTER TABLE `printing_demand_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `printing_demand_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(127) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_role_id_uindex` (`role_id`),
  UNIQUE KEY `role_role_name_uindex` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'administrator','2022-01-23 16:18:59','2022-01-23 16:18:59'),(2,'guest','2022-01-23 16:18:59','2022-01-23 16:18:59'),(3,'user','2022-01-23 16:18:59','2022-01-23 16:18:59');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `user_password` varchar(127) NOT NULL,
  `email` varchar(127) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `phone_number` varchar(64) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_user_id_uindex` (`user_id`),
  UNIQUE KEY `user_username_uindex` (`username`),
  UNIQUE KEY `user_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (81,'korisnicko_ime','$2y$10$0ZuMpjUOS0Kxq18g.3MI2.5CpdMxzKSQpoa2m2TbHYQkc05GTt.2O','zika@mika.rs','Zika','Mikic','062543678','2022-01-23 18:47:02',NULL,1),(100,'matija17','$2y$10$ugnUul.wxeeYMYEl4DEAYOMH5wRd0CqMeULI7IwouyU54YjsfWU3W','matija@djuric.rs','Matija','Djuric','098765432','2022-01-24 17:48:36',NULL,1),(101,'puretina','$2y$10$4amEAMRHksjv0K1ugIrD8.fDCTAQ1ciaADwyKJ0zlCPDX05Pw35Lm','pure@pravi.sajt','Vladimir','Purkovic','063123123','2022-01-25 23:39:23',NULL,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role` (
  `user_role_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_role_id`),
  UNIQUE KEY `user_role_user_role_id_uindex` (`user_role_id`),
  KEY `fk_user_role_role_id` (`role_id`),
  KEY `fk_user_role_user_id` (`user_id`),
  CONSTRAINT `fk_user_role_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_user_role_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (7,100,3),(10,100,1),(11,101,3);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view__demand_card`
--

DROP TABLE IF EXISTS `view__demand_card`;
/*!50001 DROP VIEW IF EXISTS `view__demand_card`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view__demand_card` AS SELECT 
 1 AS `title`,
 1 AS `demand_description`,
 1 AS `username`,
 1 AS `name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view__printer_card`
--

DROP TABLE IF EXISTS `view__printer_card`;
/*!50001 DROP VIEW IF EXISTS `view__printer_card`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view__printer_card` AS SELECT 
 1 AS `minimal_resolution`,
 1 AS `maximal_resolution`,
 1 AS `printing_speed`,
 1 AS `working_hour_price`,
 1 AS `image_path`,
 1 AS `username`,
 1 AS `model_name`,
 1 AS `company`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view__printer_models_count`
--

DROP TABLE IF EXISTS `view__printer_models_count`;
/*!50001 DROP VIEW IF EXISTS `view__printer_models_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view__printer_models_count` AS SELECT 
 1 AS `model_name`,
 1 AS `name`,
 1 AS `models_count`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_cc`
--

DROP TABLE IF EXISTS `view_cc`;
/*!50001 DROP VIEW IF EXISTS `view_cc`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_cc` AS SELECT 
 1 AS `name`,
 1 AS `category_count`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view__demand_card`
--

/*!50001 DROP VIEW IF EXISTS `view__demand_card`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view__demand_card` AS select `pd`.`title` AS `title`,`pd`.`demand_description` AS `demand_description`,`u`.`username` AS `username`,`c`.`name` AS `name` from (((`printing_demand` `pd` join `user` `u` on((`pd`.`user_id` = `u`.`user_id`))) join `printing_demand_category` `pdc` on((`pdc`.`printing_demand_id` = `pd`.`printing_demand_id`))) join `category` `c` on((`pdc`.`category_id` = `c`.`category_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view__printer_card`
--

/*!50001 DROP VIEW IF EXISTS `view__printer_card`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view__printer_card` AS select `pa`.`minimal_resolution` AS `minimal_resolution`,`pa`.`maximal_resolution` AS `maximal_resolution`,`pa`.`printing_speed` AS `printing_speed`,`pa`.`working_hour_price` AS `working_hour_price`,`pa`.`image_path` AS `image_path`,`u`.`username` AS `username`,`m`.`model_name` AS `model_name`,`c`.`name` AS `company` from (((`printer_ad` `pa` join `user` `u` on((`u`.`user_id` = `pa`.`user_id`))) join `model` `m` on((`pa`.`model_id` = `m`.`model_id`))) join `company` `c` on((`c`.`company_id` = `m`.`company_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view__printer_models_count`
--

/*!50001 DROP VIEW IF EXISTS `view__printer_models_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view__printer_models_count` AS select `m`.`model_name` AS `model_name`,`c`.`name` AS `name`,count(`m`.`model_name`) AS `models_count` from ((`printer_ad` `pa` join `model` `m` on((`m`.`model_id` = `pa`.`model_id`))) join `company` `c` on((`c`.`company_id` = `m`.`company_id`))) group by `m`.`model_name` order by `models_count` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_cc`
--

/*!50001 DROP VIEW IF EXISTS `view_cc`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_cc` AS select `c`.`name` AS `name`,count(`pdc`.`category_id`) AS `category_count` from (`printing_demand_category` `pdc` join `category` `c` on((`c`.`category_id` = `pdc`.`category_id`))) group by `c`.`name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-26 17:52:42
