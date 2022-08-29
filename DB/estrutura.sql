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
-- Table structure for table `alimento`
--

DROP TABLE IF EXISTS `alimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alimento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `porcao` double NOT NULL,
  `caloria` double NOT NULL,
  `id_categoria_alimento` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria_alimento` (`id_categoria_alimento`),
  CONSTRAINT `alimento_ibfk_1` FOREIGN KEY (`id_categoria_alimento`) REFERENCES `categoria_alimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `nutriente`
--

DROP TABLE IF EXISTS `nutriente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nutriente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `carboidrato` double NOT NULL,
  `proteina` double NOT NULL,
  `lipideo` double NOT NULL,
  `fibra` double NOT NULL,
  `id_alimento` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_alimento` (`id_alimento`),
  CONSTRAINT `nutriente_ibfk_1` FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `peso` double NOT NULL,
  `altura` double NOT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `refeicao`
--

DROP TABLE IF EXISTS `refeicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refeicao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `id_dieta` int NOT NULL,
  `calorias_totais` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dieta` (`id_dieta`),
  CONSTRAINT `refeicao_ibfk_1` FOREIGN KEY (`id_dieta`) REFERENCES `dieta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `refeicao_alimento_assoc`
--

DROP TABLE IF EXISTS `refeicao_alimento_assoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refeicao_alimento_assoc` (
  `id_alimento` int NOT NULL,
  `id_refeicao` int NOT NULL,
  `quantidade` double NOT NULL,
  PRIMARY KEY (`id_alimento`,`id_refeicao`),
  KEY `id_refeicao` (`id_refeicao`),
  CONSTRAINT `refeicao_alimento_assoc_ibfk_1` FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id`),
  CONSTRAINT `refeicao_alimento_assoc_ibfk_2` FOREIGN KEY (`id_refeicao`) REFERENCES `refeicao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Temporary view structure for view `view_alimento`
--

DROP TABLE IF EXISTS `view_alimento`;
/*!50001 DROP VIEW IF EXISTS `view_alimento`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_alimento` AS SELECT 
 1 AS `id`,
 1 AS `nome`,
 1 AS `porcao`,
 1 AS `caloria`,
 1 AS `categoria`*/;
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

--
-- Final view structure for view `view_alimento`
--

/*!50001 DROP VIEW IF EXISTS `view_alimento`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_alimento` AS select `a`.`id` AS `id`,`a`.`nome` AS `nome`,`a`.`porcao` AS `porcao`,`a`.`caloria` AS `caloria`,`ca`.`descricao` AS `categoria` from (`alimento` `a` join `categoria_alimento` `ca` on((`ca`.`id` = `a`.`id_categoria_alimento`))) order by `a`.`id` */;
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

-- Dump completed on 2022-08-29 20:03:22
