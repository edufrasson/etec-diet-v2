-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: etec_diet_v2
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
-- Dumping data for table `alimento`
--

LOCK TABLES `alimento` WRITE;
/*!40000 ALTER TABLE `alimento` DISABLE KEYS */;
INSERT INTO `alimento` VALUES (7,'Aveia',100,374,3),(8,'Banana',100,89,1);
/*!40000 ALTER TABLE `alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categoria_alimento`
--

LOCK TABLES `categoria_alimento` WRITE;
/*!40000 ALTER TABLE `categoria_alimento` DISABLE KEYS */;
INSERT INTO `categoria_alimento` VALUES (1,'Legume'),(2,'Grãos'),(3,'Cereais, pães e tubérculos'),(4,'Frutas');
/*!40000 ALTER TABLE `categoria_alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dieta`
--

LOCK TABLES `dieta` WRITE;
/*!40000 ALTER TABLE `dieta` DISABLE KEYS */;
INSERT INTO `dieta` VALUES (1,'Projetinho Fellas','2021-12-10','2022-02-10',1);
/*!40000 ALTER TABLE `dieta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `nutriente`
--

LOCK TABLES `nutriente` WRITE;
/*!40000 ALTER TABLE `nutriente` DISABLE KEYS */;
INSERT INTO `nutriente` VALUES (2,67,14,6,10,7),(3,23,1,0,3,8);
/*!40000 ALTER TABLE `nutriente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'Eduardo','2005-09-08',75,1.75,'M');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `refeicao`
--

LOCK TABLES `refeicao` WRITE;
/*!40000 ALTER TABLE `refeicao` DISABLE KEYS */;
INSERT INTO `refeicao` VALUES (2,'Banana Com Aveia','Café da Tarde',1,368.9);
/*!40000 ALTER TABLE `refeicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `refeicao_alimento_assoc`
--

LOCK TABLES `refeicao_alimento_assoc` WRITE;
/*!40000 ALTER TABLE `refeicao_alimento_assoc` DISABLE KEYS */;
INSERT INTO `refeicao_alimento_assoc` VALUES (7,2,60),(8,2,50);
/*!40000 ALTER TABLE `refeicao_alimento_assoc` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-29 20:03:05
