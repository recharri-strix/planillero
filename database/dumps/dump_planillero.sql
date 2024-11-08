-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: planillero
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('admin@example.com|127.0.0.1:timer','i:1730053162;',1730053162),('admin@example.com|127.0.0.1','i:1;',1730053162);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formas_pagos`
--

DROP TABLE IF EXISTS `formas_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formas_pagos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formas_pagos`
--

LOCK TABLES `formas_pagos` WRITE;
/*!40000 ALTER TABLE `formas_pagos` DISABLE KEYS */;
INSERT INTO `formas_pagos` VALUES (1,'Alumno','2024-10-28 20:34:27','2024-10-28 20:34:27',NULL),(2,'Efectivo','2024-10-28 20:34:27','2024-10-28 20:34:27',NULL),(3,'Mercado Pago','2024-10-28 20:34:27','2024-10-28 20:34:27',NULL),(4,'Big Box','2024-10-28 20:34:27','2024-10-28 20:34:27',NULL),(5,'Vale de vuelo','2024-10-28 20:34:27','2024-10-28 20:34:27',NULL),(6,'Transferencia','2024-10-28 20:34:27','2024-10-28 20:34:27',NULL);
/*!40000 ALTER TABLE `formas_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maquinas`
--

DROP TABLE IF EXISTS `maquinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maquinas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `plazas` int DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maquinas`
--

LOCK TABLES `maquinas` WRITE;
/*!40000 ALTER TABLE `maquinas` DISABLE KEYS */;
INSERT INTO `maquinas` VALUES (1,'LV-DBH','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(2,'LV-DFC','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(3,'LV-DHL','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(4,'LV-DNS','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(5,'LV-DPI','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(6,'LV-DPP','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(7,'LV-EFT','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(8,'LV-EMJ','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(9,'LV-ENE','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(10,'LV-EPX','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(11,'LV-EQX','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(12,'LV-ERE','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(13,'LV-ERO','planeador',NULL,NULL,NULL,'2024-10-28 20:40:58','2024-10-28 20:40:58',NULL),(14,'LV-GDB','avion',NULL,NULL,NULL,'2024-10-28 20:42:09','2024-10-28 20:42:09',NULL),(15,'LV-GFJ','avion',NULL,NULL,NULL,'2024-10-28 20:42:09','2024-10-28 20:42:09',NULL);
/*!40000 ALTER TABLE `maquinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nubes`
--

DROP TABLE IF EXISTS `nubes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nubes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nubes`
--

LOCK TABLES `nubes` WRITE;
/*!40000 ALTER TABLE `nubes` DISABLE KEYS */;
INSERT INTO `nubes` VALUES (1,'1/8','2024-10-28 20:07:40','2024-10-28 20:07:40',NULL),(2,'2/8','2024-10-28 20:07:40','2024-10-28 20:07:40',NULL),(3,'3/8','2024-10-28 20:07:40','2024-10-28 20:07:40',NULL),(4,'4/8','2024-10-28 20:07:40','2024-10-28 20:07:40',NULL),(5,'5/8','2024-10-28 20:07:40','2024-10-28 20:07:40',NULL),(6,'6/8','2024-10-28 20:07:40','2024-10-28 20:07:40',NULL),(7,'7/8','2024-10-28 20:07:40','2024-10-28 20:07:40',NULL),(8,'8/8','2024-10-28 20:07:40','2024-10-28 20:07:40',NULL);
/*!40000 ALTER TABLE `nubes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pilotos`
--

DROP TABLE IF EXISTS `pilotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pilotos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pilotos`
--

LOCK TABLES `pilotos` WRITE;
/*!40000 ALTER TABLE `pilotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pilotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plafon`
--

DROP TABLE IF EXISTS `plafon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plafon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plafon`
--

LOCK TABLES `plafon` WRITE;
/*!40000 ALTER TABLE `plafon` DISABLE KEYS */;
INSERT INTO `plafon` VALUES (9,'Despejado','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(10,'100','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(11,'200','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(12,'300','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(13,'400','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(14,'500','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(15,'600','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(16,'700','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(17,'800','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(18,'900','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(19,'1000','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(20,'1100','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(21,'1200','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(22,'1300','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(23,'1400','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(24,'1500','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(25,'1600','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(26,'1700','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(27,'1800','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(28,'1900','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(29,'2000','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(30,'2100','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(31,'2200','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(32,'2300','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(33,'2400','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(34,'2500','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(35,'2600','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(36,'2700','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(37,'2800','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL),(38,'2900','2024-10-28 20:54:11','2024-10-28 20:54:11',NULL);
/*!40000 ALTER TABLE `plafon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planillas`
--

DROP TABLE IF EXISTS `planillas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `planillas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` datetime not null,
  `jefe_campo_id` int not null,
  `dir_viento_id` int DEFAULT NULL,
  `vel_viento_id` int DEFAULT NULL,
  `temperatura_id` int DEFAULT NULL,
  `nube_id` int DEFAULT NULL,
  `plafon_id` int DEFAULT NULL,
  `novedades` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planillas`
--

LOCK TABLES `planillas` WRITE;
/*!40000 ALTER TABLE `planillas` DISABLE KEYS */;
/* INSERT INTO `planillas` VALUES (1,'2024-10-28 18:13:00',1,25,26,27,5,35,'nada','2024-10-29 00:24:58','2024-10-29 00:24:58',NULL),(2,'2024-10-29 18:36:00',1,18,24,24,5,29,'nada 2','2024-10-29 00:36:36','2024-10-29 00:36:36',NULL);
 *//*!40000 ALTER TABLE `planillas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presion`
--

DROP TABLE IF EXISTS `presion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `presion` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `valor` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presion`
--

LOCK TABLES `presion` WRITE;
/*!40000 ALTER TABLE `presion` DISABLE KEYS */;
/*!40000 ALTER TABLE `presion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presiones`
--

DROP TABLE IF EXISTS `presiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `presiones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presiones`
--

LOCK TABLES `presiones` WRITE;
/*!40000 ALTER TABLE `presiones` DISABLE KEYS */;
INSERT INTO `presiones` VALUES (1,'990','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(2,'991','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(3,'992','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(4,'993','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(5,'994','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(6,'995','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(7,'996','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(8,'997','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(9,'998','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(10,'999','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(11,'1000','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(12,'1001','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(13,'1002','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(14,'1003','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(15,'1004','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(16,'1005','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(17,'1006','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(18,'1007','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(19,'1008','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(20,'1009','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(21,'1010','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(22,'1011','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(23,'1012','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(24,'1013','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(25,'1014','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(26,'1015','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(27,'1016','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(28,'1017','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(29,'1018','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(30,'1019','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(31,'1020','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(32,'1021','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(33,'1022','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(34,'1023','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(35,'1024','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(36,'1025','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(37,'1026','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(38,'1027','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(39,'1028','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(40,'1029','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(41,'1030','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(42,'1031','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(43,'1032','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(44,'1033','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(45,'1034','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(46,'1035','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(47,'1036','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(48,'1037','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(49,'1038','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(50,'1039','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(51,'1040','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(52,'1041','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(53,'1042','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(54,'1043','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(55,'1044','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(56,'1045','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(57,'1046','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(58,'1047','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(59,'1048','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(60,'1049','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(61,'1050','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(62,'1051','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(63,'1052','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(64,'1053','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(65,'1054','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(66,'1055','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(67,'1056','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(68,'1057','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(69,'1058','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(70,'1059','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(71,'1060','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(72,'1061','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL),(73,'1062','2024-10-28 20:48:30','2024-10-28 20:48:30',NULL);
/*!40000 ALTER TABLE `presiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('sgyzSoP5lI0ytJabunvRZpuXbxloAScRZ5C2CxsO',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVk4yZWNUZEh6WmZ1V0xsTU1UUHFIYkkxRFQxeGp0eGpQbUIzV2F2UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC92dWVsb3MvMi92dWVsb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MzAyMTA3Nzc7fX0=',1730227869);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temas`
--

DROP TABLE IF EXISTS `temas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temas`
--

LOCK TABLES `temas` WRITE;
/*!40000 ALTER TABLE `temas` DISABLE KEYS */;
INSERT INTO `temas` VALUES (1,'AAT',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(2,'AD',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(3,'AD-Asiento Trasero',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(4,'AD-Avión',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(5,'AST',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(6,'BAU',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(7,'DC',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(8,'EN',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(9,'Exámen',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(10,'Exámen - VS',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(11,'IA',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(12,'IA-VS',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(13,'RA',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL),(14,'VV',NULL,'2024-10-28 20:37:03','2024-10-28 20:37:03',NULL);
/*!40000 ALTER TABLE `temas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temperaturas`
--

DROP TABLE IF EXISTS `temperaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temperaturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temperaturas`
--

LOCK TABLES `temperaturas` WRITE;
/*!40000 ALTER TABLE `temperaturas` DISABLE KEYS */;
INSERT INTO `temperaturas` VALUES (1,'1','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(2,'2','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(3,'3','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(4,'4','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(5,'5','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(6,'6','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(7,'7','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(8,'8','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(9,'9','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(10,'10','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(11,'11','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(12,'12','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(13,'13','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(14,'14','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(15,'15','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(16,'16','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(17,'17','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(18,'18','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(19,'19','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(20,'20','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(21,'21','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(22,'22','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(23,'23','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(24,'24','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(25,'25','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(26,'26','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(27,'27','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(28,'28','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(29,'29','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(30,'30','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(31,'31','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(32,'32','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(33,'33','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(34,'34','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(35,'35','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(36,'36','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(37,'37','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(38,'38','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL),(39,'39','2024-10-28 20:57:27','2024-10-28 20:57:27',NULL);
/*!40000 ALTER TABLE `temperaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cambio_password` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  tipo varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Juan Carlos','barriosjc@yahoo.com.ar',NULL,'$2y$12$x6//3YpwoJzOYmKOudPituWTMCov.R7MZIX5yKW3NRwuj8B5FSqoC',NULL,NULL,NULL,'1',NULL,'INS,REM','2024-10-27 21:18:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viento_dir`
--

DROP TABLE IF EXISTS `viento_dir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `viento_dir` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viento_dir`
--

LOCK TABLES `viento_dir` WRITE;
/*!40000 ALTER TABLE `viento_dir` DISABLE KEYS */;
INSERT INTO `viento_dir` VALUES (1,'0','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(2,'10','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(3,'20','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(4,'30','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(5,'40','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(6,'50','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(7,'60','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(8,'70','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(9,'80','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(10,'90','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(11,'100','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(12,'110','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(13,'120','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(14,'130','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(15,'140','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(16,'150','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(17,'160','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(18,'170','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(19,'180','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(20,'190','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(21,'200','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(22,'210','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(23,'220','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(24,'230','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(25,'240','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(26,'250','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(27,'260','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(28,'270','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(29,'280','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(30,'290','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(31,'300','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(32,'310','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(33,'320','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(34,'330','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(35,'340','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(36,'350','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL),(37,'360','2024-10-28 20:23:47','2024-10-28 20:23:47',NULL);
/*!40000 ALTER TABLE `viento_dir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viento_vel`
--

DROP TABLE IF EXISTS `viento_vel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `viento_vel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viento_vel`
--

LOCK TABLES `viento_vel` WRITE;
/*!40000 ALTER TABLE `viento_vel` DISABLE KEYS */;
INSERT INTO `viento_vel` VALUES (1,'1','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(2,'2','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(3,'3','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(4,'4','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(5,'5','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(6,'6','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(7,'7','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(8,'8','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(9,'9','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(10,'10','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(11,'11','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(12,'12','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(13,'13','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(14,'14','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(15,'15','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(16,'16','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(17,'17','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(18,'18','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(19,'19','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(20,'20','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(21,'21','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(22,'22','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(23,'23','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(24,'24','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(25,'25','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(26,'26','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(27,'27','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(28,'28','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(29,'29','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(30,'30','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(31,'31','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(32,'32','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(33,'33','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(34,'34','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(35,'35','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(36,'36','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(37,'37','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(38,'38','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL),(39,'39','2024-10-28 20:04:23','2024-10-28 20:04:23',NULL);
/*!40000 ALTER TABLE `viento_vel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vuelos`
--

DROP TABLE IF EXISTS `vuelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vuelos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `planilla_id` int NOT NULL,
  `tema_id` int NULL,
  `piloto_id` int NOT NULL,
  `avion_id` int NULL,
  `remolcador_id` int NULL,
  `planeador_id` int NULL,
  `instructor_id` int NULL,
  `tipo_pago_id` int NULL,
  `decolaje` datetime DEFAULT NULL,
  `corte` datetime DEFAULT NULL,
  `aterrizaje` datetime DEFAULT NULL,
  `aterrizaje_avion` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vuelos`
--

LOCK TABLES `vuelos` WRITE;
/*!40000 ALTER TABLE `vuelos` DISABLE KEYS */;
/* INSERT INTO `vuelos` VALUES (1,2,1,1,14,1,1,1,1,'2024-10-29 11:14:00','2024-10-29 11:20:00','2024-10-29 12:14:00','2024-10-29 11:24:00','2024-10-29 18:17:02','2024-10-29 15:39:33',NULL),(2,2,1,1,15,1,2,1,1,'2024-10-29 14:14:00','2024-10-29 14:18:00','2024-10-29 14:24:00','2024-10-29 14:20:00','2024-10-29 18:17:58','2024-10-29 15:39:33',NULL),(3,2,1,1,14,1,3,1,4,'2024-10-29 13:38:00','2024-10-29 13:44:00',NULL,NULL,'2024-10-29 19:45:13','2024-10-29 19:45:13',NULL);
 *//*!40000 ALTER TABLE `vuelos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-29 15:56:58
