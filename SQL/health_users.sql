-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: health
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` bigint NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Aadharno` bigint NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Aadharimg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` bigint DEFAULT NULL,
  `weight` bigint DEFAULT NULL,
  `BMI` bigint DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_mobileno_unique` (`mobileno`),
  UNIQUE KEY `users_aadharno_unique` (`Aadharno`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Saurabh','Diva',7418529630,'Male',159,'appointment.png','doctor_patient.jpg',150,79,25,'saurabh@gmail.com','2000-09-29','B+','2022-04-11 12:31:10','2022-04-11 12:31:10'),(2,'Sachin','Badlapur',8529637410,'Male',753,'appointment.png','doctor_patient.jpg',147,65,23,'sachin@gmail.com','2001-12-18','AB+','2022-04-11 12:32:10','2022-04-11 12:32:10'),(3,'Nitish','Kopar',8529637411,'Male',998877445566,'appointment.png','generate_login1.png',130,100,40,'nitish@gmail.com','1988-05-02','O-','2022-04-13 23:06:25','2022-04-13 23:06:25'),(4,'Rajan','CSMT',9001234567,'Male',337755114896,'doctor_profile.jpg','Pathology.jpg',156,60,23,'rajan@gmail.com','2000-01-24','A+','2022-04-14 02:02:35','2022-04-14 02:02:35'),(5,'demo789','Churchgate',9324031708,'male',555666774891,'doctor_profile.jpg','doctor_patient.jpg',178,45,23,'demo789@gmail.com','2002-01-08','A+','2022-04-14 07:29:32','2022-04-14 07:29:32'),(6,'demo78965','kalwa',7417418529,'Male',999888777444,'appointment.png','doctor_patient.jpg',178,65,21,'demo78695@gmail.com','1992-01-01','A+','2022-04-14 10:41:04','2022-04-14 10:41:04'),(7,'demo5','demo5',7894567485,'Male',777444555222,'appointment.png','doctor_patient.jpg',145,78,45,'demo5@gmail.com','2022-04-01','A+','2022-04-14 23:29:44','2022-04-14 23:29:44'),(8,'demo10','demo10',9342031708,'Male',778899445566,'appointment.png','doctor_profile.jpg',145,45,23,'demo10@gmail.com','2012-01-03','A+','2022-04-15 01:57:10','2022-04-15 01:57:10'),(9,'demo17','demo17',9867937695,'Male',778899442233,'doctor_profile.jpg','doctor_patient.jpg',145,45,21,'demo17@gmail.com','2012-10-23','B+','2022-04-15 02:10:18','2022-04-15 02:10:18'),(10,'demo19','demo19',8007006002,'female',222255558888,'appointment.png','doctor_patient.jpg',120,65,23,'demo19@gmail.com','2013-02-13','B+','2022-04-15 02:50:17','2022-04-15 02:50:17');
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

-- Dump completed on 2022-04-15 17:35:14
