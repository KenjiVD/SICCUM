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
  `contrasena` varchar(45) NOT NULL,
  `estadoperfil` int(11) NOT NULL DEFAULT '1' COMMENT '1 = activo\n0 = inactivo',
  PRIMARY KEY (`idAlumno`),
  KEY `Alumno_FKIndex2` (`nivel_idnivel`),
  KEY `Alumno_FKIndex3` (`carrera_idcarrera`),
  KEY `Alumno_FKIndex4` (`grupo_idgrupo`),
  KEY `Alumno_FKIndex5` (`cuentas_idcuentas`,`cuentas_usuario`),
  KEY `Alumno_FKIndex1` (`Coordinador_idCoordinador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (1,NULL,NULL,10,1,10,5,'Emanuel',131101,13,'ROPE921204','131101',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificaciones`
--

LOCK TABLES `calificaciones` WRITE;
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
INSERT INTO `calificaciones` VALUES (1,13,1,131101,1,1,10,10,89);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,'IDS'),(2,'IBM'),(3,'IM'),(4,'IA'),(5,'IER'),(6,'IM'),(7,'IP');
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
  `mes` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idcolegiatura`),
  KEY `colegiatura_FKIndex1` (`Alumno_idAlumno`),
  KEY `colegiatura_FKIndex2` (`periodo_idperiodo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colegiatura`
--

LOCK TABLES `colegiatura` WRITE;
/*!40000 ALTER TABLE `colegiatura` DISABLE KEYS */;
INSERT INTO `colegiatura` VALUES (1,13,1,131101,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinador`
--

LOCK TABLES `coordinador` WRITE;
/*!40000 ALTER TABLE `coordinador` DISABLE KEYS */;
INSERT INTO `coordinador` VALUES (1,111,'Jesus Emanuel','1234',1),(5,1233,'Andres','1233',1),(7,1239,'Fani','1239',1);
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
  `nombre` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idgrupo`),
  KEY `grupo_FKIndex1` (`periodo_idperiodo`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(15,1,2),(16,2,2),(17,3,2),(18,4,2),(19,5,2),(20,6,2),(21,7,2),(22,8,2),(23,9,2),(24,10,2),(25,11,2),(26,12,2),(27,13,2),(28,14,2),(29,15,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (1,11,1,'Concurrente'),(2,11,1,'Mantenimiento');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` VALUES (1,'1'),(2,'2'),(3,'3'),(4,'4'),(5,'5'),(6,'6'),(7,'7'),(8,'8'),(9,'9'),(10,'10'),(11,'11'),(12,'12');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,1,131101,'','permisos/1.png','2014-10-22','2014-10-22','2014-10-29',2);
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

-- Dump completed on 2014-10-23  1:38:06
