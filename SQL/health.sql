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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` bigint NOT NULL,
  `doctor_id` int NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `department` varchar(45) DEFAULT NULL,
  `prescription` varchar(2000) DEFAULT NULL,
  `Aadharno` bigint NOT NULL,
  `date_visited` date DEFAULT NULL,
  PRIMARY KEY (`id`,`appointment_id`),
  KEY `Aadharno` (`Aadharno`),
  KEY `doctor_id_idx` (`doctor_id`),
  KEY `appointment_id` (`appointment_id`),
  CONSTRAINT `Aadharno` FOREIGN KEY (`Aadharno`) REFERENCES `users` (`Aadharno`),
  CONSTRAINT `doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,6431078113,789456,'09:00:00','2022-04-14','Bone','Medicine:- Dolo\r\nTest:- Sugar Test & CBC Test',159,'2022-04-13'),(2,7974368370,123456,'09:30:00','2022-04-15','Skin',NULL,159,NULL),(3,71423654,123456,'11:00:00','2022-04-15','Skin','',753,NULL),(5,1469685989,789456,'10:00:00','2022-04-15','Bone','Medicine:- Toba 1-1\r\nTest:- LFT',555666774891,'2022-04-14'),(6,1583024015,520772,'09:00:00','2022-04-16','OPD','dhgdhghajdggshgaghj',159,'2022-04-15'),(7,4707193109,789456,'09:30:00','2022-04-16','Bone','Medicine:- dolo 650\r\nTest:- Sugar test',778899442233,'2022-04-15'),(8,7208665112,789456,'10:00:00','2022-04-16','Bone','Medicine: Dolo650\r\nTest: Urine',222255558888,'2022-04-15');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booktests`
--

DROP TABLE IF EXISTS `booktests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booktests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_id` bigint NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `Aadharno` bigint NOT NULL,
  `appointment_id` bigint NOT NULL,
  `report` tinytext,
  `uploaded_by` varchar(45) DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `report_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`,`appointment_id`),
  KEY `appointment_id` (`appointment_id`),
  KEY `test_id` (`test_id`),
  CONSTRAINT `appointment_id` FOREIGN KEY (`appointment_id`) REFERENCES `bookings` (`appointment_id`),
  CONSTRAINT `test_id` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booktests`
--

LOCK TABLES `booktests` WRITE;
/*!40000 ALTER TABLE `booktests` DISABLE KEYS */;
INSERT INTO `booktests` VALUES (1,102,'2022-04-14','09:00:00',159,6431078113,'Stage 2 - IND Schedule.pdf','200',789456,'CBC'),(2,101,'2022-04-15','10:00:00',159,7974368370,'Beneficiary_Form (1).pdf','200',123456,'LFT'),(3,100,'2022-04-16','10:30:00',159,6431078113,'Beneficiary_Form (1).pdf','200',789456,'Sugar'),(4,101,'2022-04-15','10:30:00',555666774891,1469685989,'epic.docx (4) (2).pdf','200',789456,'LFT'),(5,100,'2022-04-16','10:00:00',778899442233,4707193109,'epic.docx (4) (1).pdf','200',789456,'Sugar'),(6,103,'2022-04-16','11:00:00',222255558888,7208665112,'epic.docx (4) (2).pdf','200',789456,'Urine Analysis');
/*!40000 ALTER TABLE `booktests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `doctor_id` int NOT NULL,
  `doctor_name` varchar(45) DEFAULT NULL,
  `Mobile_No` bigint NOT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `Email_id` varchar(45) NOT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `profileImage` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `Employee_ID` bigint DEFAULT NULL,
  PRIMARY KEY (`id`,`doctor_id`),
  UNIQUE KEY `doctor_id_UNIQUE` (`doctor_id`),
  KEY `Employee_ID` (`Employee_ID`),
  CONSTRAINT `Employee_ID` FOREIGN KEY (`Employee_ID`) REFERENCES `staffs` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,789456,'Akhilesh',7894561234,'Male','akhil@gmail.com','vidyavihar','gyu.jpg','Bone',123),(3,123456,'Karan',1597534682,'Male','karan@gmail.com','Thane','xyz.jpg','Skin',222),(4,1234,'Rakesh',1234567890,'Male','rakesh@gmail.com','kurla','appointment.png','Bone',159),(5,958683,'Amit',1234567899,'Male','amit@gmail.com','Mahim','doctor_profile.jpg','OPD',100),(9,142876,'demo2',7830308105,NULL,'demo2@gmail.com',NULL,NULL,'OPD',4567152),(10,520772,'demo3',7830308104,'Male','demo3@gmail.com','BVGHYhjgjjh','generate_login1.png','OPD',4567153);
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_id` bigint NOT NULL,
  `test_name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `other_details` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (1,100,'Sugar',NULL,NULL),(2,101,'LFT',NULL,NULL),(3,102,'CBC',NULL,NULL),(4,103,'Urine Analysis',NULL,NULL);
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2022-04-15 17:41:04
