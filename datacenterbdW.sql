CREATE DATABASE  IF NOT EXISTS `datacenterbd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `datacenterbd`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 159.203.134.123    Database: datacenterbd
-- ------------------------------------------------------
-- Server version	5.6.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `cliID` varchar(30) NOT NULL,
  `cliName` varchar(40) NOT NULL,
  PRIMARY KEY (`cliID`),
  UNIQUE KEY `cliID_UNIQUE` (`cliID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES ('1','Tigo'),('2','Wingo'),('3','Palace');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `proID` int(11) NOT NULL,
  `proName` varchar(40) NOT NULL,
  `fk_cliPID` varchar(30) NOT NULL,
  PRIMARY KEY (`proID`),
  UNIQUE KEY `proID_UNIQUE` (`proID`),
  KEY `fk_cliID_idx` (`fk_cliPID`),
  CONSTRAINT `fk_cliPID` FOREIGN KEY (`fk_cliPID`) REFERENCES `client` (`cliID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Ecommerce','1'),(2,'Apps','1'),(3,'ReporteGeneral','2'),(4,'Grand','3'),(5,'JamaicaGrande','3'),(6,'MoonPalace','3');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usecli`
--

DROP TABLE IF EXISTS `usecli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usecli` (
  `idUseCli` int(11) NOT NULL,
  `useID` varchar(50) DEFAULT NULL,
  `cliID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUseCli`),
  KEY `useFK_idx` (`useID`),
  KEY `cliFK_idx` (`cliID`),
  CONSTRAINT `cliFK` FOREIGN KEY (`cliID`) REFERENCES `client` (`cliID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `useFK` FOREIGN KEY (`useID`) REFERENCES `user` (`useEmail`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usecli`
--

LOCK TABLES `usecli` WRITE;
/*!40000 ALTER TABLE `usecli` DISABLE KEYS */;
INSERT INTO `usecli` VALUES (1,'daniel.valencia@ariadnacg.com','1'),(2,'daniel.valencia@ariadnacg.com','2'),(3,'david.gallego@ariadnacg.com','1'),(4,'david.gallego@ariadnacg.com','2'),(5,'dfnarvaez@wingo.com','2'),(6,'Dortega@wingo.com','2'),(7,'MChaves@wingo.com','2'),(8,'daniel.ramirez@ariadnacg.com','1'),(9,'daniel.ramirez@ariadnacg.com','2'),(10,'juan.espinosa@ariadnacg.com','1'),(11,'juan.espinosa@ariadnacg.com','2'),(12,'tigo@tigo.com','1'),(13,'sebastian.maldonado@ariadnacg.com','1'),(14,'wingo@wingo.com','2'),(15,'sebastian.maldonado@ariadnacg.com','2'),(16,'ana.ramirez@millicom.com','1'),(17,'angelica.ruiz@tigo.net.py','1'),(18,'cnieves@sv.tigo.com','1'),(19,'cristian.rivera@ariadnacg.com','1'),(20,'cristian.rivera@ariadnacg.com','2'),(21,'felipe.ortiz@ariadnacg.com','1'),(22,'gvega@sv.tigo.com','1'),(23,'marcela.lara@ariadnacg.com','2'),(24,'mariacristina.benitez@tigo.net.py','1'),(25,'max.gomez@ariadnacg.com','1'),(26,'max.gomez@ariadnacg.com','2'),(27,'mmelara@tigo.com.hn','1'),(28,'terrazass@tigo.net.bo','1'),(29,'vasquezn@tigo.net.bo','1'),(30,'reports@maiadatacenter.co','1'),(31,'reports@maiadatacenter.co','2'),(32,'vanessa.saldarriaga@ariadnacg.com','1'),(33,'vanessa.saldarriaga@ariadnacg.com','2'),(34,'david.gallego@ariadnacg.com','3'),(35,'daniel.ramirez@ariadnacg.com','3'),(36,'juan.espinosa@ariadnacg.com','3'),(37,'daniel.valencia@ariadnacg.com','3');
/*!40000 ALTER TABLE `usecli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `useEmail` varchar(50) NOT NULL,
  `usePassword` varchar(30) NOT NULL,
  `useStatus` tinyint(1) NOT NULL,
  `useOnline` tinyint(1) NOT NULL,
  `fk_cliID` varchar(30) NOT NULL,
  PRIMARY KEY (`useEmail`),
  UNIQUE KEY `useEmail_UNIQUE` (`useEmail`),
  KEY `fk_cliID_idx` (`fk_cliID`),
  CONSTRAINT `fk_cliID` FOREIGN KEY (`fk_cliID`) REFERENCES `client` (`cliID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('ana.ramirez@millicom.com','anarmz/2017',1,1,'1'),('angelica.ruiz@tigo.net.py','anruiz%py',1,1,'1'),('cnieves@sv.tigo.com','nievesSV%2017',1,1,'1'),('cristian.rivera@ariadnacg.com','crisRiv#2017',1,1,'1'),('daniel.ramirez@ariadnacg.com','daramirez2017#',1,1,'1'),('daniel.valencia@ariadnacg.com','dvalencia#2017',1,1,'1'),('david.gallego@ariadnacg.com','davidAriadna2017&',1,1,'2'),('dfnarvaez@wingo.com','dfwingo#2017',1,1,'2'),('Dortega@wingo.com','dortega2017*',1,1,'2'),('felipe.ortiz@ariadnacg.com','fortiz$#17',1,1,'1'),('gvega@sv.tigo.com','vegatigo&2017',1,1,'1'),('juan.espinosa@ariadnacg.com','juanAriadna#',1,1,'2'),('marcela.lara@ariadnacg.com','malara/tigo',1,1,'2'),('mariacristina.benitez@tigo.net.py','crisbtz#net',1,1,'1'),('max.gomez@ariadnacg.com','max$2017All',1,1,'1'),('MChaves@wingo.com','wingoChaves2017$',1,1,'2'),('mmelara@tigo.com.hn','laratigohn$',1,1,'1'),('reports@maiadatacenter.co','DataReportsMaia',1,1,'2'),('sebastian.maldonado@ariadnacg.com','Sebas2017#',1,1,'1'),('terrazass@tigo.net.bo','terrazass%bo',1,1,'1'),('tigo@tigo.com','tigoDash',1,1,'1'),('vanessa.saldarriaga@ariadnacg.com','vaneAriadna#2017',1,1,'1'),('vasquezn@tigo.net.bo','vasquezn$bo',1,1,'1'),('wingo@wingo.com','wingoDash',1,1,'2');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-17 16:19:44
