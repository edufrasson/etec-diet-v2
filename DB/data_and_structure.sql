-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: etec_diet
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
-- Table structure for table `alimento`
--

DROP TABLE IF EXISTS `alimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alimento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `porcao` int NOT NULL,
  `caloria` double NOT NULL,
  `id_categoria_alimento` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria_alimento` (`id_categoria_alimento`),
  CONSTRAINT `alimento_ibfk_1` FOREIGN KEY (`id_categoria_alimento`) REFERENCES `categoria_alimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimento`
--

LOCK TABLES `alimento` WRITE;
/*!40000 ALTER TABLE `alimento` DISABLE KEYS */;
INSERT INTO `alimento` VALUES (1,' Arroz Branco',100,109,3),(2,'Cenoura',100,45,1),(3,'Patinho Moído',100,219,2),(4,'Feijão',100,141,3),(5,'Bacalhau',100,77,6),(6,'Frango Grelhado',100,237,7),(7,'Ovo',50,79,9),(8,'Banana',100,89,4),(9,'Macarrao Espaguete',100,350,5),(10,'Pernil',100,321,10),(11,'Pão Francês',50,135,8),(12,'Batata',100,85,8),(13,'Molho de Tomate',50,20,1),(14,'Maçã',100,59,4);
/*!40000 ALTER TABLE `alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_alimento`
--

DROP TABLE IF EXISTS `categoria_alimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_alimento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_alimento`
--

LOCK TABLES `categoria_alimento` WRITE;
/*!40000 ALTER TABLE `categoria_alimento` DISABLE KEYS */;
INSERT INTO `categoria_alimento` VALUES (1,'Legume'),(2,'Carne Bovina'),(3,'Grãos '),(4,'Fruta'),(5,'Massa'),(6,'Carne Branca'),(7,'Carne de Aves'),(8,'Cereais, pães e tubérculos'),(9,'Ovos, Leite, Queijo e Cia'),(10,'Carne Suína');
/*!40000 ALTER TABLE `categoria_alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_nutriente`
--

DROP TABLE IF EXISTS `categoria_nutriente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_nutriente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_nutriente`
--

LOCK TABLES `categoria_nutriente` WRITE;
/*!40000 ALTER TABLE `categoria_nutriente` DISABLE KEYS */;
INSERT INTO `categoria_nutriente` VALUES (1,'Proteina'),(2,'Carboidrato'),(3,'Vitamina'),(4,'Lipídeo'),(5,'Fibra');
/*!40000 ALTER TABLE `categoria_nutriente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dieta`
--

DROP TABLE IF EXISTS `dieta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dieta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `id_paciente` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `dieta_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dieta`
--

LOCK TABLES `dieta` WRITE;
/*!40000 ALTER TABLE `dieta` DISABLE KEYS */;
INSERT INTO `dieta` VALUES (1,'Projetinho Fellas','2021-11-10','2022-03-22',1);
/*!40000 ALTER TABLE `dieta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nutriente`
--

DROP TABLE IF EXISTS `nutriente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nutriente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `quantidade` double NOT NULL,
  `id_alimento` int NOT NULL,
  `id_categoria_nutriente` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_alimento` (`id_alimento`),
  KEY `id_categoria_nutriente` (`id_categoria_nutriente`),
  CONSTRAINT `nutriente_ibfk_1` FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id`),
  CONSTRAINT `nutriente_ibfk_2` FOREIGN KEY (`id_categoria_nutriente`) REFERENCES `categoria_nutriente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nutriente`
--

LOCK TABLES `nutriente` WRITE;
/*!40000 ALTER TABLE `nutriente` DISABLE KEYS */;
INSERT INTO `nutriente` VALUES (1,'Carboidratos',24000,1,2),(2,'Proteina',2000,1,1),(3,'Gordura',250,1,4),(4,'Carboidrato',11000,2,2),(5,'Proteina',1000,2,1),(6,'Fibra',3000,2,5),(7,'Proteina',36000,3,1),(8,'Gordura',7000,3,4),(9,'Carboidrato',26000,4,2),(10,'Proteina',9000,4,1),(11,'Gordura',1000,4,4),(12,'Fibra',8000,4,5),(13,'Proteina',18000,5,1),(14,'Fibra',1000,5,5),(15,'Proteina',27000,6,1),(16,'Gordura',13000,6,4),(17,'Gordura',13000,6,4),(18,'Carboidrato',500,7,2),(19,'Proteína',6500,7,1),(20,'Gordura',6000,7,5),(21,'Carboidrato',22840,8,2),(22,'Proteina',1090,8,1),(23,'Gordura',330,8,4),(24,'Fibra',2600,8,5),(25,'Carboidrato',74000,9,2),(26,'Proteina',11000,9,1),(27,'Gordura',1000,9,4),(28,'Fibra',2000,9,5),(29,'Proteina',15000,10,1),(30,'Gordura',29000,10,4),(31,'Carboidrato',28500,11,2),(32,'Proteina',4500,11,1),(33,'Carboidrato',19000,12,2),(34,'Proteina',2000,12,1),(35,'Carboidrato',4500,13,2),(36,'Carboidrato',15000,14,2),(37,'Fibra',3000,14,5);
/*!40000 ALTER TABLE `nutriente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `data_nascimento` date NOT NULL,
  `peso` double NOT NULL,
  `altura` double NOT NULL,
  `sexo` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'Eduardo','2005-09-08',75,1.75,'M');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refeicao`
--

DROP TABLE IF EXISTS `refeicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refeicao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `id_dieta` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dieta` (`id_dieta`),
  CONSTRAINT `refeicao_ibfk_1` FOREIGN KEY (`id_dieta`) REFERENCES `dieta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refeicao`
--

LOCK TABLES `refeicao` WRITE;
/*!40000 ALTER TABLE `refeicao` DISABLE KEYS */;
INSERT INTO `refeicao` VALUES (1,'Omelete','Café da Manhã',1),(2,'Arroz, Feijão e Frango Grelhado','Almoço',1),(3,'Espaguete com Molho de Tomate','Jantar',1),(4,'Salada de Frutas','Café da Tarde',1),(5,'Arroz com Bacalhau','Almoço',1),(6,'Macarrao com Molho e Carne Moida','Jantar',1),(7,'Pão','Café da Manhã',1),(8,'Arroz com Pernil e Cenoura','Almoço',1),(9,'Arroz com Ovo','Jantar',1),(10,'Arroz com Batata e Carne Moida','Almoço',1);
/*!40000 ALTER TABLE `refeicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refeicao_alimento_assoc`
--

DROP TABLE IF EXISTS `refeicao_alimento_assoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refeicao_alimento_assoc` (
  `id_refeicao` int NOT NULL,
  `id_alimento` int NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`id_refeicao`,`id_alimento`),
  KEY `id_alimento` (`id_alimento`),
  CONSTRAINT `refeicao_alimento_assoc_ibfk_1` FOREIGN KEY (`id_refeicao`) REFERENCES `refeicao` (`id`),
  CONSTRAINT `refeicao_alimento_assoc_ibfk_2` FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refeicao_alimento_assoc`
--

LOCK TABLES `refeicao_alimento_assoc` WRITE;
/*!40000 ALTER TABLE `refeicao_alimento_assoc` DISABLE KEYS */;
INSERT INTO `refeicao_alimento_assoc` VALUES (1,7,100),(2,1,100),(2,4,50),(2,6,200),(3,9,200),(3,13,50),(4,12,100),(4,14,100),(5,1,100),(5,5,200),(6,3,100),(6,9,100),(6,13,50),(7,11,100),(8,1,100),(8,2,100),(8,10,200),(9,1,100),(9,7,100),(10,1,100),(10,3,200),(10,12,150);
/*!40000 ALTER TABLE `refeicao_alimento_assoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `select_paciente`
--

DROP TABLE IF EXISTS `select_paciente`;
/*!50001 DROP VIEW IF EXISTS `select_paciente`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `select_paciente` AS SELECT 
 1 AS `id`,
 1 AS `nome`,
 1 AS `data_nascimento`,
 1 AS `sexo`,
 1 AS `peso`,
 1 AS `altura`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `select_paciente`
--

/*!50001 DROP VIEW IF EXISTS `select_paciente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `select_paciente` AS select `paciente`.`id` AS `id`,`paciente`.`nome` AS `nome`,date_format(`paciente`.`data_nascimento`,'%d/%m/%Y') AS `data_nascimento`,if((`paciente`.`sexo` = 'M'),'Masculino','Feminino') AS `sexo`,`paciente`.`peso` AS `peso`,`paciente`.`altura` AS `altura` from `paciente` */;
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

-- Dump completed on 2022-04-03 20:49:22
