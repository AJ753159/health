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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-15 17:35:14
