CREATE DATABASE  IF NOT EXISTS `siccum` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `siccum`;
-- MySQL dump 10.13  Distrib 5.6.19, for Win64 (x86_64)
--
-- Host: localhost    Database: siccum
-- ------------------------------------------------------
-- Server version	5.6.21-enterprise-commercial-advanced-log

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `idadministrador` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  PRIMARY KEY (`idadministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Jesus','1234');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administradorsiccum`
--

DROP TABLE IF EXISTS `administradorsiccum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administradorsiccum` (
  `idadministradorsiccum` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(145) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  PRIMARY KEY (`idadministradorsiccum`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administradorsiccum`
--

LOCK TABLES `administradorsiccum` WRITE;
/*!40000 ALTER TABLE `administradorsiccum` DISABLE KEYS */;
INSERT INTO `administradorsiccum` VALUES (1,'Santiago','1234');
/*!40000 ALTER TABLE `administradorsiccum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `idAlumno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cuentas_usuario` varchar(45) DEFAULT NULL,
  `cuentas_idcuentas` int(10) unsigned DEFAULT NULL,
  `grupo_idgrupo` int(10) unsigned NOT NULL,
  `carrera_idcarrera` int(10) unsigned NOT NULL,
  `nivel_idnivel` int(10) unsigned NOT NULL,
  `Coordinador_idCoordinador` int(10) unsigned DEFAULT NULL,
  `nombre` varchar(145) NOT NULL,
  `matriculaa` int(10) unsigned DEFAULT NULL,
  `idperiodo` int(10) NOT NULL,
  `curp` varchar(45) NOT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `estadoperfil` int(11) NOT NULL DEFAULT '1' COMMENT '1 = activo\n0 = inactivo',
  `fecha` date NOT NULL,
  PRIMARY KEY (`idAlumno`),
  KEY `Alumno_FKIndex2` (`nivel_idnivel`),
  KEY `Alumno_FKIndex3` (`carrera_idcarrera`),
  KEY `Alumno_FKIndex4` (`grupo_idgrupo`),
  KEY `Alumno_FKIndex5` (`cuentas_idcuentas`,`cuentas_usuario`),
  KEY `Alumno_FKIndex1` (`Coordinador_idCoordinador`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (1,NULL,NULL,10,1,1,5,'Emanuel',131101,13,'ROPE921204','nomeacuerdo',1,'2014-08-01'),(2,NULL,NULL,1,2,1,7,'Lucas',1212,1,'ROPL921204','1212',1,'2014-11-19'),(3,NULL,NULL,1,1,1,1,'Carlos Lopez Gomez',1113,1,'CACS920326MCSLRT15','1113',1,'2014-01-01'),(4,NULL,NULL,2,2,2,1,'Michel Perez Zarate',2224,2,'CACS920326MCSLRT15','2224',1,'2014-02-01'),(5,NULL,NULL,1,2,2,7,'Eder Ivan Pérez Zárate',1215,1,'13456783','1215',1,'2014-03-01'),(6,NULL,NULL,1,1,1,NULL,'Adriana Roque Pimentel',1116,1,'CACS920326MCSLRT1F','1116',1,'2014-06-01'),(7,NULL,NULL,3,3,3,NULL,'Emanuel Roque Pimentel',1337,1,'CACS920326MCSLRT15','1337',1,'2014-07-01'),(8,NULL,NULL,4,2,3,NULL,'Alexis Mazariegos Sanchez ',3248,3,'CACS920326MCSLRT15','3248',1,'2014-08-01'),(9,NULL,NULL,7,2,1,NULL,'Stephania Cal y Mayor Cardona',4279,4,'CACS920326MCSLRT15','4279',1,'2014-09-01'),(10,NULL,NULL,2,2,2,NULL,'Rafael Roque Medina',22210,2,'CAVS920326MCSLRT15','22210',1,'2014-10-01'),(11,NULL,NULL,3,3,3,NULL,'Maria Elizabet Pimentel',33311,3,'CACS920226MCSLRT15','33311',1,'2014-12-01'),(12,NULL,NULL,3,3,1,NULL,'Aminta Cardona Culebro',43312,4,'CACS920326MCSLRT15','43312',1,'2014-11-01'),(13,NULL,NULL,5,2,2,NULL,'Erick Camcho Albores',42513,4,'CACS920326MCSLRT15','42513',1,'2014-12-01'),(14,NULL,NULL,4,4,1,NULL,'Marco Antonio Lopez',44414,4,'CACS920326MCSLRT11','44414',1,'2014-09-01'),(15,NULL,NULL,9,2,3,NULL,'Jafet Zagal Moreno',52915,5,'CACS920326MCSLRT15','52915',1,'2014-12-01'),(16,NULL,NULL,5,5,2,NULL,'Cristian Isai Vazquez',55516,5,'CACS920726MCSLRT15','55516',1,'2014-12-01'),(17,NULL,NULL,6,1,3,NULL,'Ignacio Iguala',61617,6,'CACS920320MCSLRT15','61617',1,'2014-12-01'),(18,NULL,NULL,7,2,1,NULL,'Anastacia Nicole Romanoft',72718,7,'CACS920326NCSLRT15','72718',1,'2014-01-01'),(19,NULL,NULL,18,2,2,NULL,'David Sanchez Lopez',921819,9,'CACS920326MCSLRT15','921819',1,'2014-12-01'),(20,NULL,NULL,8,3,2,NULL,'Cesar Enrique Martinez',83820,8,'MMCS920326MCSLRT15','83820',1,'2014-12-01'),(21,NULL,NULL,9,4,3,NULL,'Juan Andres Pascacio',94921,9,'CACS921426MCSLRT15','94921',1,'2014-08-01'),(22,NULL,NULL,30,2,3,NULL,'Juan Hernandez Suarez',223022,2,'CACS920326MCSLRT15','223022',1,'2014-12-01'),(23,NULL,NULL,11,1,2,NULL,'Yahir Zahat Xorolitch',1111123,11,'XYZS920326MCSLRT15','1111123',1,'2014-12-01'),(24,NULL,NULL,4,3,2,NULL,'Jorge Marin Lopez',113424,11,'CACS920326MCSLRT15','113424',1,'2014-12-01'),(25,NULL,NULL,7,3,3,NULL,'Susana Mendez Aguilar',153725,15,'CACS920326MCSLRT15','153725',1,'2014-12-01'),(26,NULL,NULL,12,2,3,NULL,'Ana Fon Bon Carter',1221226,12,'BCFA920326MCSLRT15','1221226',1,'2014-12-01'),(27,NULL,NULL,1,1,2,9,'Hector Suarez Molina',11127,1,'hecd7365345','11127',1,'2014-12-01'),(28,NULL,NULL,3,3,1,NULL,'Danira Moreno Sanchez',53328,5,'CACS920326MCSLRT15','53328',1,'2014-12-01'),(29,NULL,NULL,1,1,2,9,'Wilbert Pérez Zárate',11129,1,'eerdf765543','11129',1,'2014-12-01'),(30,NULL,NULL,13,3,1,NULL,'Elisa Martinez Hernandez',1331330,13,'EMHS920326MCSLRT15','1331330',1,'2014-12-01'),(31,NULL,NULL,1,1,2,9,'José Vasquez Enriquez',11131,1,'sfdgfvgfg6235534','11131',1,'2014-12-01'),(32,NULL,NULL,1,1,2,NULL,'Rosa Camacho Jimenez',21132,2,'rosfr62565','21132',1,'2014-12-01'),(33,NULL,NULL,1,1,1,9,'José Pérez Manrique',31133,3,'jodgvd6tr53','31133',1,'2014-12-01'),(34,NULL,NULL,14,4,2,NULL,'Iovanna Castro Rodriguez',1441434,14,'ICRS920326MCSLRT15','1441434',1,'2014-12-01'),(35,NULL,NULL,14,1,2,NULL,'Cesario Dominguez Rodriguez',511435,5,'CACS920326MCSLRT15','511435',1,'2014-12-01'),(36,NULL,NULL,1,1,2,9,'Enrique Toledo Jimenez',11136,1,'ofofof35344444','11136',1,'2014-12-01'),(37,NULL,NULL,15,5,3,NULL,'Cruz Cruz Cruz de la Cruz',1551537,15,'CCCC920326MCSLRT15','1551537',1,'2014-12-01'),(38,NULL,NULL,1,1,2,9,'David Lopez Lopez',51138,5,'dafdgdff24333','51138',1,'2014-12-01'),(39,NULL,NULL,1,1,2,9,'Oscar Ovando Toledo',71139,7,'osds54346','71139',1,'2014-12-01'),(40,NULL,NULL,18,2,2,NULL,'Zoe Dominguez Cruz',221840,2,'CACS920326MCSLRT15','221840',1,'2014-12-01'),(41,NULL,NULL,1,1,2,9,'Pedro Luis Zárate',91141,9,'perd13456524','91141',1,'2014-12-01'),(42,NULL,NULL,1,1,2,9,'Rodrigo Mendoza Casillas',11142,1,'rods12345','11142',1,'2014-12-01'),(43,NULL,NULL,16,1,2,NULL,'Carmen Elizabeth Juanita de Costa Braba Cortes',111643,1,'CACS920326MCSLTR15','111643',1,'2014-12-01'),(44,NULL,NULL,2,2,2,NULL,'Yesenia Enriquez Mazariegos',72244,7,'mdsd63','72244',1,'2014-12-01'),(45,NULL,NULL,2,2,2,NULL,'Ricardo Lopez Zárate',72245,7,'rif6335','72245',1,'2014-12-01'),(46,NULL,NULL,2,2,2,NULL,'Esteban Vasquez Velasquez',72246,7,'esdf7654345','72246',1,'2014-12-01'),(47,NULL,NULL,2,2,2,NULL,'Edy Gomez Vasquez',72247,7,'eder654344','72247',1,'2014-12-01');
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificaciones` (
  `idcalificaciones` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `periodo_idperiodo` int(10) unsigned NOT NULL,
  `Alumno_idAlumno` int(10) unsigned NOT NULL,
  `matricula` int(10) unsigned NOT NULL,
  `materia_idmateria` int(10) unsigned NOT NULL,
  `carrera_idcarrera` int(10) unsigned NOT NULL,
  `grupo_idgrupo` int(10) unsigned NOT NULL,
  `nivel_idnivel` int(10) unsigned NOT NULL,
  `calificacion` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idcalificaciones`),
  KEY `calificaciones_FKIndex1` (`Alumno_idAlumno`),
  KEY `calificaciones_FKIndex2` (`periodo_idperiodo`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificaciones`
--

LOCK TABLES `calificaciones` WRITE;
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
INSERT INTO `calificaciones` VALUES (1,13,1,131101,1,1,10,10,89),(2,1,29,11129,1,1,1,2,100),(3,1,29,11129,3,1,1,2,50),(4,1,29,11129,3,1,1,2,30),(5,1,29,11129,4,1,1,2,69),(6,1,29,11129,5,1,1,2,70),(7,1,29,11129,6,1,1,2,85),(8,1,29,11129,7,2,1,2,10),(9,1,29,11129,8,1,1,2,61),(10,1,29,11129,2,1,1,2,29),(11,1,2,1212,9,2,1,1,88),(12,1,1,131101,1,1,1,1,100),(13,2,1,131101,2,1,1,1,90),(14,3,1,131101,3,1,1,1,80),(15,3,1,131101,3,1,1,1,70),(16,4,1,131101,4,1,1,1,60),(17,5,1,131101,5,1,1,1,50),(18,1,3,1113,1,1,1,1,90),(19,2,3,1113,2,1,1,1,80),(20,3,3,1113,3,1,1,1,70),(21,4,3,1113,4,1,1,1,60),(22,5,3,1113,5,1,1,1,50),(23,1,6,1116,1,1,1,1,80),(24,2,6,1116,2,1,1,1,70),(25,3,6,1116,3,1,1,1,60),(26,4,6,1116,4,1,1,1,50),(27,5,6,1116,5,1,1,1,40),(28,1,17,61617,1,1,6,3,70),(29,2,17,61617,2,1,6,3,60),(30,3,17,61617,3,1,6,3,50),(31,4,17,61617,4,1,6,3,40),(32,4,17,61617,5,1,6,3,30),(33,1,23,1111123,1,1,11,2,60),(34,1,23,1111123,1,1,11,2,50),(35,2,23,1111123,2,1,11,2,40),(36,1,2,1212,10,2,1,1,69),(37,4,23,1111123,4,1,11,2,30),(38,1,2,1212,11,2,1,1,69),(39,1,2,1212,12,2,1,1,69),(40,1,2,1212,12,2,1,1,69),(41,1,2,1212,14,2,1,1,90),(42,5,23,1111123,5,1,11,2,20),(43,2,4,2224,9,2,1,1,69),(44,1,4,2224,10,2,1,1,70),(45,1,4,2224,11,2,1,1,69),(46,6,27,11127,8,1,16,2,100),(47,7,27,11127,7,1,16,1,90),(48,1,4,2224,12,2,1,1,80),(49,8,27,11127,6,1,16,1,80),(50,9,27,11127,5,1,16,1,70),(51,1,4,2224,14,2,1,1,90),(52,10,27,11127,4,1,16,1,60),(53,1,5,1215,9,2,1,1,60),(54,1,5,1215,10,2,1,1,90),(55,1,5,1215,11,2,1,1,69),(56,1,29,11129,8,1,1,1,90),(57,1,5,1215,12,2,1,1,80),(58,2,29,11129,7,1,1,1,80),(59,1,5,1215,13,2,1,1,70),(60,3,29,11129,6,1,1,1,70),(61,5,29,11129,5,1,1,1,60),(62,1,8,3248,9,2,1,1,69),(63,5,29,11129,4,1,1,1,50),(64,1,8,3248,11,2,1,1,69),(65,1,8,3248,12,2,1,1,80),(66,1,31,11131,8,1,1,1,80),(67,1,8,3248,10,2,1,1,100),(68,2,31,11131,7,1,1,1,70),(69,3,31,11131,5,1,1,1,60),(70,4,31,11131,5,1,1,1,50),(71,5,31,11131,1,1,1,1,40),(72,1,32,21132,8,1,1,1,70),(73,1,32,21132,7,1,1,1,60),(74,3,32,21132,6,1,1,1,50),(75,1,8,3248,11,2,1,1,70),(76,4,32,21132,5,1,1,1,40),(77,5,32,21132,4,1,1,1,30),(78,1,33,31133,8,1,16,1,60),(79,2,33,31133,7,1,16,1,50),(80,3,33,31133,6,1,16,1,40),(81,4,33,31133,5,1,16,1,30),(82,5,33,31133,4,1,16,1,20),(83,1,35,511435,1,1,6,2,100),(84,2,35,511435,8,1,6,2,90),(85,3,35,511435,2,1,6,2,80),(86,3,35,511435,7,1,6,2,70),(87,5,35,511435,3,1,6,2,50),(88,1,36,11136,1,1,6,2,90),(89,2,36,11136,8,1,6,2,80),(90,3,36,11136,2,1,6,2,70),(91,4,36,11136,7,1,6,2,60),(92,5,36,11136,3,1,6,2,50),(93,1,38,51138,1,1,6,2,80),(94,2,38,51138,8,1,6,2,70),(95,3,38,51138,2,1,6,2,60),(96,4,38,51138,7,1,6,2,50),(97,5,38,51138,3,1,6,2,40),(98,1,39,71139,1,1,6,2,70),(99,2,39,71139,8,1,6,2,60),(100,3,39,71139,2,1,6,2,50),(101,4,39,71139,7,1,6,2,40),(102,5,39,71139,3,1,6,2,30),(103,1,41,91141,1,1,6,2,60),(104,2,41,91141,8,1,6,2,50),(105,3,41,91141,2,1,6,2,40),(106,4,41,91141,7,1,6,2,30),(107,5,41,91141,3,1,6,2,20),(108,1,42,11142,8,1,21,2,100),(109,2,42,11142,1,1,21,2,90),(110,3,42,11142,7,1,21,2,80),(111,4,42,11142,2,1,21,2,70),(112,5,42,11142,6,1,21,2,60),(113,1,43,111643,8,1,21,2,90),(114,2,43,111643,1,1,21,2,80),(115,3,43,111643,7,1,21,2,70),(116,4,43,111643,2,1,21,2,60),(117,5,43,111643,6,1,21,2,50),(118,1,5,1215,9,2,2,2,100),(119,2,5,1215,10,2,2,2,90),(120,3,5,1215,11,2,2,2,80),(121,4,5,1215,12,2,2,2,70),(122,5,5,1215,14,2,2,2,60),(123,1,8,3248,9,2,2,2,90),(124,1,8,3248,10,2,2,2,80),(125,1,8,3248,11,2,2,2,70),(126,1,8,3248,12,2,2,2,60);
/*!40000 ALTER TABLE `calificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrera` (
  `idcarrera` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,'Enfermeria'),(2,'Trabajo Social'),(3,'Radiologia'),(4,'Enfereria Quirurgica'),(5,'Geriatria');
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colegiatura`
--

DROP TABLE IF EXISTS `colegiatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colegiatura` (
  `idcolegiatura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `periodo_idperiodo` int(10) unsigned NOT NULL,
  `Alumno_idAlumno` int(10) unsigned NOT NULL,
  `matriculaa` int(10) unsigned NOT NULL,
  `mes` date NOT NULL,
  PRIMARY KEY (`idcolegiatura`),
  KEY `colegiatura_FKIndex1` (`Alumno_idAlumno`),
  KEY `colegiatura_FKIndex2` (`periodo_idperiodo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colegiatura`
--

LOCK TABLES `colegiatura` WRITE;
/*!40000 ALTER TABLE `colegiatura` DISABLE KEYS */;
INSERT INTO `colegiatura` VALUES (1,13,1,131101,'2014-10-01'),(2,1,1,131101,'2014-12-02'),(3,1,3,1113,'2014-12-02'),(4,1,6,1116,'2014-12-02'),(5,1,17,61617,'2014-12-02'),(6,1,23,1111123,'2014-12-02'),(7,1,27,11127,'2014-12-02'),(8,1,29,11129,'2014-12-02'),(9,1,31,11131,'2014-12-02'),(10,1,32,21132,'2014-12-02'),(11,1,33,31133,'2014-12-02'),(12,1,2,1212,'2014-12-02'),(13,1,4,2224,'2014-12-02'),(14,1,5,1215,'2014-12-02'),(15,1,8,3248,'2014-12-02'),(16,1,9,4279,'2014-12-02');
/*!40000 ALTER TABLE `colegiatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordinador`
--

DROP TABLE IF EXISTS `coordinador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordinador` (
  `idCoordinador` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matriculac` int(10) unsigned NOT NULL,
  `nombre` varchar(145) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `estadoperfil` int(11) NOT NULL DEFAULT '1' COMMENT '1 = activo\n0 = inactivo',
  PRIMARY KEY (`idCoordinador`,`matriculac`),
  UNIQUE KEY `matriculac_UNIQUE` (`matriculac`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinador`
--

LOCK TABLES `coordinador` WRITE;
/*!40000 ALTER TABLE `coordinador` DISABLE KEYS */;
INSERT INTO `coordinador` VALUES (1,1111,'Jesus Emanuel','1111',1),(5,1233,'Andres','1233',1),(7,1239,'Fani','1239',1),(8,1234,'Emilio','1234',1),(9,123087,'Eder Pérez Zárate','1234',1);
/*!40000 ALTER TABLE `coordinador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas` (
  `idcuentas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `Coordinador_matriculac` int(10) unsigned NOT NULL,
  `Coordinador_idCoordinador` int(10) unsigned NOT NULL,
  `passwordd` varchar(45) NOT NULL,
  `tipo` int(10) unsigned DEFAULT NULL,
  `matricula` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idcuentas`,`usuario`,`Coordinador_matriculac`,`Coordinador_idCoordinador`),
  KEY `cuentas_FKIndex1` (`Coordinador_idCoordinador`,`Coordinador_matriculac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `idgrupo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `periodo_idperiodo` int(10) unsigned NOT NULL,
  `nombre` varchar(10) NOT NULL,
  PRIMARY KEY (`idgrupo`),
  KEY `grupo_FKIndex1` (`periodo_idperiodo`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,1,'A'),(2,2,'A'),(3,3,'A'),(4,4,'A'),(5,5,'A'),(6,6,'A'),(7,7,'A'),(8,8,'A'),(9,9,'A'),(10,10,'A'),(11,11,'A'),(12,12,'A'),(13,13,'A'),(14,14,'A'),(15,15,'A'),(16,1,'B'),(17,2,'B'),(18,3,'B'),(19,4,'B'),(20,5,'B'),(21,6,'B'),(22,7,'B'),(23,8,'B'),(24,9,'B'),(25,10,'B'),(26,11,'B'),(27,12,'B'),(28,13,'B'),(29,14,'B'),(30,15,'B'),(31,1,'C'),(32,2,'C'),(33,3,'C'),(34,4,'C'),(35,5,'C'),(36,6,'C'),(37,7,'C'),(38,8,'C'),(39,9,'C'),(40,10,'C'),(41,11,'C'),(42,12,'C'),(43,13,'C'),(44,14,'C'),(45,15,'C');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `idmateria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `periodo_idperiodo` int(10) unsigned NOT NULL,
  `carrera_idcarrera` int(10) unsigned NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idmateria`),
  KEY `materia_FKIndex1` (`carrera_idcarrera`),
  KEY `materia_FKIndex2` (`periodo_idperiodo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (1,11,1,'Introduccion a la Enfermeria'),(2,11,1,'Introduccion a los aparatos'),(3,1,1,'Cultura y Salud'),(4,1,1,'Salud Publica'),(5,1,1,'Economía y Salud'),(6,1,1,'Computación'),(7,1,1,'Historia de la Enfermería'),(8,1,1,'Metodología de la Investigación'),(9,7,2,'Trabajo Social I'),(10,7,2,'Practicas de Trabajo Social I'),(11,7,2,'Estadistica I'),(12,7,2,'Filosofía I'),(13,7,2,'Filosofía I'),(14,7,2,'Geohistoria Contemporanea de México'),(15,7,2,'Antropología I'),(16,7,2,'Computación I'),(17,11,2,'Comunicación');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel` (
  `idnivel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idnivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` VALUES (1,'Bachillerato'),(2,'Licenciatura'),(3,'Especializacion');
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodo` (
  `idperiodo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idperiodo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
INSERT INTO `periodo` VALUES (1,'Ene-Feb'),(2,'Mar-Abr'),(3,'May-Jun'),(4,'Jul-Ago'),(5,'Sep-Oct'),(6,'Nov-Dic'),(7,'Ene-Mar'),(8,'Abr-Jun'),(9,'Jul-Sep'),(10,'Oct-Dic'),(11,'Ene-Abr'),(12,'May-Ago'),(13,'Sep-Dic'),(14,'Ene-Jun'),(15,'Jul-Dic');
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `idpermiso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) unsigned NOT NULL,
  `matriculaa` int(10) unsigned DEFAULT NULL,
  `descripcion` text,
  `URL` varchar(45) DEFAULT NULL,
  `fechaSolicitud` date DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `estado` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0 = no visto\n1 = aceptado\n2 = rechazado',
  PRIMARY KEY (`idpermiso`),
  UNIQUE KEY `idpermiso_UNIQUE` (`idpermiso`),
  KEY `permiso_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,1,131101,'','permisos/1.png','2014-10-22','2014-10-22','2014-10-29',2),(2,1,131101,'','permisos/2.pdf','2014-10-23','2014-10-23','2014-10-25',1),(3,1,131101,'Tengo fiebre','permisos/3.jpg','2014-11-06','2014-11-10','2014-11-14',1),(4,1,131101,'','permisos/4.jpg','2014-11-06','2014-11-07','2014-11-14',2),(5,1,131101,'','permisos/5.jpg','2014-11-14','2014-11-14','2014-11-25',0);
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-03  9:55:44
