-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cascar
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anotacoes`
--

DROP TABLE IF EXISTS `anotacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anotacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `prioridade` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anotacoes`
--

LOCK TABLES `anotacoes` WRITE;
/*!40000 ALTER TABLE `anotacoes` DISABLE KEYS */;
INSERT INTO `anotacoes` VALUES (23,'fazer gol turbo jean','tubo 1.6 alcool',2);
/*!40000 ALTER TABLE `anotacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(11) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cpfcnpj` bigint(20) NOT NULL,
  `telefone` bigint(11) NOT NULL,
  `veiculo` varchar(255) NOT NULL,
  `ano` mediumint(9) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (66,'Jean Marcos de Souza','jiamarcos@outlook.com.br','Tapejara','99950000','São Paulo',4398942041,54996660580,'Golf',2001,'Sportline','DZG6E37','ate2');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estoque`
--

DROP TABLE IF EXISTS `estoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estoque` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `enderecamento` varchar(40) NOT NULL,
  `valor` int(11) NOT NULL,
  `quantidade_estoque` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoque`
--

LOCK TABLES `estoque` WRITE;
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
INSERT INTO `estoque` VALUES (24,'Mão de Obra','-',120,1,NULL),(25,'Amortecedor traseiros','a1b1c2d4',300,10,NULL),(26,'teste produto 2','a',122,12,NULL);
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itensordens`
--

DROP TABLE IF EXISTS `itensordens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itensordens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `os` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data` date NOT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `produto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itensordens`
--

LOCK TABLES `itensordens` WRITE;
/*!40000 ALTER TABLE `itensordens` DISABLE KEYS */;
INSERT INTO `itensordens` VALUES (28,1,2,120,'2021-05-24','66','24'),(29,1,2,300,'2021-05-24','66','25'),(30,2,3,120,'2021-05-28','66','24'),(31,2,4,350,'2021-05-28','66','25'),(32,3,1,122,'2021-06-23','66','26');
/*!40000 ALTER TABLE `itensordens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `osid`
--

DROP TABLE IF EXISTS `osid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `osid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `osid`
--

LOCK TABLES `osid` WRITE;
/*!40000 ALTER TABLE `osid` DISABLE KEYS */;
INSERT INTO `osid` VALUES (3);
/*!40000 ALTER TABLE `osid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `usuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Jean Marcos de Souza','698dc19d489c4e4db73e28a713eab07b','jiamarcos@outlook.com.br','jean.souza'),(2,'Leonardo Milani Pizzi','a3b9b46c138a0e5b748a8621539e8378','leonardo.milani.pizzi@gmail.com','leonardo'),(5,'João Simonetto','feb4e3306f69f047cfb53ce2627d3a4d','','joao');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-24 19:05:47
