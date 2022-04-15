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
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Employee_ID` bigint NOT NULL,
  `Employee_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mobile_No` bigint NOT NULL,
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileImage` text COLLATE utf8mb4_unicode_ci,
  `qualifications` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`Employee_ID`),
  UNIQUE KEY `staffs_employee_id_unique` (`Employee_ID`),
  UNIQUE KEY `staffs_mobile_no_unique` (`Mobile_No`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
INSERT INTO `staffs` VALUES (1,123,'Akhilesh',7894561234,'Male','akhil@gmail.com','vidyavihar','view-profile.png','BDMS','doctor'),(2,456,'Lokesh',1234567891,'Male','lokesh@gmail.com','Bhusawal','doctor_profile.jpg','XYZ','admin'),(3,789,'Anuj',8080048719,NULL,'anuj@gmail.com',NULL,NULL,NULL,'nonmedical'),(4,222,'Karan',1597534682,'Male','karan@gmail.com','Kashmir','appointment.png','BDMS','doctor'),(5,159,'Rakesh',1234567890,'Male','rakesh@gmail.com','kurla','appointment.png','VCX','doctor'),(6,1,'Lucky',4561237890,'Male','lucky@gmail.com','kalwa','nmk.jpg',NULL,'pathology'),(7,200,'Rahul',7303081050,'Male','rahul@gmail.com','Bhandup','doctor_patient.jpg','BDMS','pathology'),(13,100,'Amit',1234567899,'Male','amit@gmail.com','Mahim','doctor_profile.jpg','BDMS','doctor'),(17,45671523,'demo1',7730308105,'MALE','demo1@gmail.com','Nagpur','doctor_patient.jpg','GGJHG','nonmedical'),(18,4567152,'demo2',7830308105,NULL,'demo2@gmail.com',NULL,NULL,NULL,'doctor'),(19,4567153,'demo3',7830308104,'Male','demo3@gmail.com','BVGHYhjgjjh','generate_login1.png','ASDG','doctor'),(20,7456123,'demo4',7894567894,'GHJGJH','demo4@gmail.com','HGHJ','appointment.png','AGHGJ','pathology'),(21,147852,'Demo7',7841025639,NULL,'demo7@gmail.com',NULL,NULL,NULL,'nonmedical'),(22,4545,'demo8',7418475975,NULL,'demo8@gmail.com',NULL,NULL,NULL,'nonmedical'),(23,3394,'demo9',9966330088,'Male','demo9@gmail.com','Kurla','doctor_profile.jpg','BDMS','nonmedical'),(24,33945,'Demo10',9966330022,'Female','demo10@gmail.com','Thane','doctor_patient.jpg','XYZ','nonmedical'),(25,446677,'Demo18',9004003001,'Male','demo18@gmail.com','XYZ','appointment.png','XYZ','nonmedical');
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
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
