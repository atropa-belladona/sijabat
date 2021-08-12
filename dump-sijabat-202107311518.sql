-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: sijabat
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.7-MariaDB

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
-- Table structure for table `auth_activation_attempts`
--

DROP TABLE IF EXISTS `auth_activation_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_activation_attempts`
--

LOCK TABLES `auth_activation_attempts` WRITE;
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups`
--

LOCK TABLES `auth_groups` WRITE;
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` VALUES (1,'administrator','Administrator'),(2,'dosen','Dosen'),(3,'operator','Operator Unit'),(4,'verifikator','Verifikator Unit'),(5,'reviewer','Tim Penilai Data'),(6,'koordinator','Bagian Kepegawaian'),(7,'monitor','Monitoring'),(8,'auditor','Auditor'),(9,'rektor','Rektor Universitas');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_permissions`
--

LOCK TABLES `auth_groups_permissions` WRITE;
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (1,2),(1,4),(2,9),(3,10),(4,11),(5,12),(6,13),(7,14);
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'::1','dn.muhidin@gmail.com',2,'2021-07-30 14:07:05',1),(2,'::1','dn.muhidin@gmail.com',2,'2021-07-30 14:10:49',1),(3,'::1','dn.muhidin@gmail.com',2,'2021-07-30 14:11:23',1),(4,'::1','dn.muhidin@gmail.com',2,'2021-07-30 14:29:21',1),(5,'::1','dnmuhidin',NULL,'2021-07-30 14:39:01',0),(6,'::1','dn.muhidin@gmail.com',2,'2021-07-30 15:01:40',1),(7,'::1','dn.muhidin@gmail.com',2,'2021-07-30 15:10:10',1),(8,'::1','morte',NULL,'2021-07-31 07:20:19',0),(9,'::1','dnmuhidin',NULL,'2021-07-31 07:21:30',0),(10,'::1','didin',NULL,'2021-07-31 07:21:59',0),(11,'::1','diidn',NULL,'2021-07-31 07:22:33',0),(12,'::1','dnmuhidin',NULL,'2021-07-31 07:23:09',0),(13,'::1','dnmuhidin',NULL,'2021-07-31 07:23:34',0),(14,'::1','dnmuhidin',NULL,'2021-07-31 07:23:47',0),(15,'::1','dn.muhidin@gmail.com',2,'2021-07-31 07:25:30',1),(16,'::1','dn.muhidin@gmail.com',2,'2021-07-31 07:56:30',1),(17,'::1','dn.muhidin@gmail.com',2,'2021-07-31 08:01:55',1),(18,'::1','dn.muhidin@gmail.com',2,'2021-07-31 08:10:29',1),(19,'::1','dn.muhidin@gmail.com',2,'2021-07-31 08:28:02',1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_permissions`
--

DROP TABLE IF EXISTS `auth_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_permissions`
--

LOCK TABLES `auth_permissions` WRITE;
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_reset_attempts`
--

DROP TABLE IF EXISTS `auth_reset_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_reset_attempts`
--

LOCK TABLES `auth_reset_attempts` WRITE;
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_tokens`
--

LOCK TABLES `auth_tokens` WRITE;
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_users_permissions`
--

DROP TABLE IF EXISTS `auth_users_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_users_permissions`
--

LOCK TABLES `auth_users_permissions` WRITE;
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1627626729,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `kd_fakultas` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) NOT NULL DEFAULT 'user.png',
  `level` tinyint(1) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Didin Muhidin','-',NULL,'dn.muhidin@gmail.com','dnmuhidin','$2y$10$cEGliatqQ71XQz1W5BjDIe4w0Etc4mOpXge.T/5xaY12cUtWQEsjq',NULL,NULL,NULL,NULL,NULL,NULL,'user.png',99,1,0,'2021-07-30 14:06:55','2021-07-30 14:06:55',NULL),(4,'Administrator','-',NULL,'','admin','$2y$10$jepboWF3qMyVPa3r3cJ59.9peMZQa4VsMxN1mJmaXmH7sJblSOJ.i',NULL,NULL,NULL,NULL,NULL,NULL,'user.png',1,1,0,'2021-07-31 13:16:20','2021-07-31 13:16:20',NULL),(9,'Prof. Dr. Komarudin, M.Si.','196403011991031001','','','komarudin','$2y$10$QjeNVxxQiuHs6PQizgUk2uOCDJ26Ia3tr7IxPgDfx1miA9YFQFp0K',NULL,NULL,NULL,NULL,NULL,NULL,'user.png',1,1,0,'2021-07-31 14:59:48','2021-07-31 14:59:48',NULL),(10,'Operator FIS','-','14','','fisunj','$2y$10$b9dFrLJnU249NkrSpVuewuocolvOGiSNtx3.fWqjinlc/2Q/lggqe',NULL,NULL,NULL,NULL,NULL,NULL,'user.png',1,1,0,'2021-07-31 15:00:46','2021-07-31 15:00:46',NULL),(11,'Verifikator FIS','-','14','','senatfis','$2y$10$jmAll8V/4r3q1bpXnSRYYun.lXi25YN.18Nib77jrE6h2rGAUekky',NULL,NULL,NULL,NULL,NULL,NULL,'user.png',1,1,0,'2021-07-31 15:01:54','2021-07-31 15:01:54',NULL),(12,'Tim Penilai PAK','-','','','penilai','$2y$10$cW2e/WCLud8wJX0GcXkHbO4bwBdGudkBvZyKbNOMhA.2tLr4P.BkK',NULL,NULL,NULL,NULL,NULL,NULL,'user.png',1,1,0,'2021-07-31 15:02:42','2021-07-31 15:02:42',NULL),(13,'Koordinator Bagian Kepegawaian','-','','','koorbuk','$2y$10$1DF2HuWjyN8IR0mL4nrPYOVVRyLeQIHgNnGoZnwT2ke.CCVevulbS',NULL,NULL,NULL,NULL,NULL,NULL,'user.png',1,1,0,'2021-07-31 15:03:36','2021-07-31 15:03:36',NULL),(14,'Monitoring','-','','','monitoring','$2y$10$y9ragyU/7bdJe7MXwnxy7eoRNVPYf2rEluRG2RrMphRzXaX.SEgeW',NULL,NULL,NULL,NULL,NULL,NULL,'user.png',1,1,0,'2021-07-31 15:16:37','2021-07-31 15:16:37',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_users`
--

DROP TABLE IF EXISTS `v_users`;
/*!50001 DROP VIEW IF EXISTS `v_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_users` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `nip` tinyint NOT NULL,
  `kd_fakultas` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `role_id` tinyint NOT NULL,
  `role_name` tinyint NOT NULL,
  `role_desc` tinyint NOT NULL,
  `level` tinyint NOT NULL,
  `active` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'sijabat'
--

--
-- Final view structure for view `v_users`
--

/*!50001 DROP TABLE IF EXISTS `v_users`*/;
/*!50001 DROP VIEW IF EXISTS `v_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_users` AS select `a`.`id` AS `id`,`a`.`name` AS `name`,`a`.`nip` AS `nip`,`a`.`kd_fakultas` AS `kd_fakultas`,`a`.`email` AS `email`,`a`.`username` AS `username`,`c`.`id` AS `role_id`,`c`.`name` AS `role_name`,`c`.`description` AS `role_desc`,`a`.`level` AS `level`,`a`.`active` AS `active` from ((`users` `a` join `auth_groups_users` `b` on(`b`.`user_id` = `a`.`id`)) join `auth_groups` `c` on(`c`.`id` = `b`.`group_id`)) order by `a`.`level` desc,`c`.`id` */;
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

-- Dump completed on 2021-07-31 15:18:53
