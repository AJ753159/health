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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-15 17:35:15
