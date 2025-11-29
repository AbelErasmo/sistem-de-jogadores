-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema_jogadores
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jogadores`
--

DROP TABLE IF EXISTS `jogadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jogadores` (
  `id_jogador` bigint unsigned NOT NULL AUTO_INCREMENT,
  `apelido` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jogador`),
  KEY `jogadores_user_id_foreign` (`user_id`),
  KEY `jogadores_data_nascimento_index` (`data_nascimento`),
  CONSTRAINT `jogadores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogadores`
--

LOCK TABLES `jogadores` WRITE;
/*!40000 ALTER TABLE `jogadores` DISABLE KEYS */;
INSERT INTO `jogadores` VALUES (2,'Martins','Leonardo','2001-12-11',3,'2025-11-28 12:20:21','2025-11-28 12:20:21'),(3,'Samora','Samunel','2002-11-27',4,'2025-11-28 12:30:02','2025-11-28 12:30:02'),(4,'Manhica','Ian','2005-12-05',5,'2025-11-28 22:04:00','2025-11-28 22:04:00'),(5,'Manhica','agostinho','2004-06-04',6,'2025-11-28 22:06:14','2025-11-28 22:39:12'),(6,'Madeia','Herculos','1995-12-04',7,'2025-11-28 22:41:04','2025-11-28 22:41:04'),(7,'Sibinde','Ersmo Abel','2025-11-12',8,'2025-11-29 03:58:05','2025-11-29 03:58:05'),(8,'Abel','Erasmo','2014-06-12',9,'2025-11-29 03:59:42','2025-11-29 03:59:42'),(9,'Erasmo','Abel','2025-11-15',10,'2025-11-29 04:00:59','2025-11-29 04:00:59');
/*!40000 ALTER TABLE `jogadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2025_11_27_161110_create_roles_table',1),(2,'2025_11_27_161447_create_users_table',1),(3,'2025_11_27_161522_create_jogadores_table',1),(4,'2025_11_28_064230_create_sessions_table',1),(5,'2025_11_28_105821_create_personal_access_tokens_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'auth_token','e5b4e4fffa587863780da82f195b16e8fc9c763c810cae7e2c66b6556b9ee75f','[\"role_user\",\"role_admin\"]',NULL,NULL,'2025-11-28 12:14:05','2025-11-28 12:14:05'),(2,'App\\Models\\User',3,'auth_token','01d33395e5ec949e8e5aa0e20481853e336a205b8125d9cfde44eae6eaa1db79','[\"role_user\"]',NULL,NULL,'2025-11-28 12:22:13','2025-11-28 12:22:13'),(3,'App\\Models\\User',3,'auth_token','c5e7572e1f0e1d2ebf222b6f936bad7db8cf75690d6e4a160ce48172b9cdc9c2','[\"role_user\"]','2025-11-28 16:17:02',NULL,'2025-11-28 12:28:20','2025-11-28 16:17:02'),(4,'App\\Models\\User',3,'auth_token','e0725e489c0427739cef20cd99f777c4f55392a7dd641492f50b28ae8a06f125','[\"*\"]',NULL,NULL,'2025-11-28 21:41:24','2025-11-28 21:41:24'),(5,'App\\Models\\User',6,'auth_token','44b2cff724590bf2abac003f5b57ce2294d0cbb41ed17b9d991a4d3d5fe8e067','[\"*\"]',NULL,NULL,'2025-11-28 22:06:35','2025-11-28 22:06:35'),(6,'App\\Models\\User',4,'auth_token','d1fdf71af81950f25cf63ee008ad49b8f014678e31f3b09ab73d1084d7276a1d','[\"*\"]',NULL,NULL,'2025-11-28 22:19:04','2025-11-28 22:19:04'),(7,'App\\Models\\User',6,'auth_token','e506dce72c181383ded4e427c9389add3b7f3289949f37ce97c6ad2a40a14259','[\"*\"]',NULL,NULL,'2025-11-28 22:19:21','2025-11-28 22:19:21'),(8,'App\\Models\\User',6,'auth_token','9e2e0533fc469e138f5c4dec91ef2af85e9aedb624d4eba2a9f8445f90b845c5','[\"*\"]',NULL,NULL,'2025-11-28 22:20:29','2025-11-28 22:20:29'),(9,'App\\Models\\User',6,'auth_token','f453a9b1d9208c3e06215a5d3f8f5b60229a0256578a78a352ff41856b82890c','[\"*\"]',NULL,NULL,'2025-11-28 22:20:56','2025-11-28 22:20:56');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_role` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'role_admin',NULL,NULL),(2,'role_user',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
  KEY `sessions_last_activity_index` (`last_activity`),
  CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0I1wSxsgSV4cLuk3xrXBoa7cRzj4yM6v4FmSww0v',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoieVA3M1dpcW1oa0dZQzh4eGJ5M2RJYms5UEdNbGVabkhua0JnRGFZZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbnNjcmljYW8iO3M6NToicm91dGUiO3M6MTQ6ImpvZ2Fkb3IuY3JlYXRlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9',1764396059);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_user` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'erasmo.abel','erasmo@gmail.com','12345678',1,'2025-11-28 22:00:00','2025-11-28 22:00:00'),(3,'leonardo.martins','leonardo.martins@gmail.com','$2y$12$L8Orcsj38Gj1bjNV4BZq5OFHNnaSf7bIXzIgPymHDzD.ONfqJoViS',1,'2025-11-28 12:20:21','2025-11-28 12:20:21'),(4,'samuel','samuel.samora@gmail.com','$2y$12$s/AImvTjyyv0WNYNib.F7OJKyIJ8AA8Bmivq/81AFc20b4R0/8LrW',2,'2025-11-28 12:30:02','2025-11-28 22:36:32'),(5,'ian.manhica','ian@gmail.com','$2y$12$r0OogWeAlhlJPVBhaQuNNe/bOlP5avXjWNFF7SGJrYCwe6kW1w4v.',2,'2025-11-28 22:04:00','2025-11-28 22:04:00'),(6,'agostinho','agostinho@gmail.com','$2y$12$8Njsl5vKt7HtEam3HexvkOR6pxDv.vUZjefu/nC3WEsQBRpv6ASQ2',2,'2025-11-28 22:06:14','2025-11-28 22:06:14'),(7,'herculos','herculos@gmail.com','$2y$12$6PGuI8BHyfz7uhB0ky7TKO4HBIByRgyWfOfW6SStdTIvA8dINB2La',2,'2025-11-28 22:41:04','2025-11-28 22:41:04'),(8,'leonardo.martins@gmail.com','erasmosibinde@gmail.com','$2y$12$0sq3I8Shpp35yiDx5lPDceV9JcQWhIt5.KWt0KH6sgmmbpCfFKbL.',2,'2025-11-29 03:58:05','2025-11-29 03:58:05'),(9,'abel','abel@gmail.com','$2y$12$JqbOI6hEh8ayLiE8UBxtCeeRHe5oBTZek7WmFWOD2B3Ul5jsqfcqy',2,'2025-11-29 03:59:42','2025-11-29 03:59:42'),(10,'erasmo','12345678@gmail.com','$2y$12$xiyrKEjj1/R/P8QDoha3Ue/..GZKDIV0lFFWXnZmPpTtrvUHp1/WK',2,'2025-11-29 04:00:59','2025-11-29 04:00:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-29  8:05:17
