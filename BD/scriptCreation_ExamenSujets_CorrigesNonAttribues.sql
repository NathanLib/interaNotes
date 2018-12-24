-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: intera_notes
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `dependances`
--

DROP TABLE IF EXISTS `dependances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependances` (
  `idValeur` int(11) NOT NULL,
  `idValeurDependante` int(11) NOT NULL,
  PRIMARY KEY (`idValeur`,`idValeurDependante`),
  KEY `idValeurDependante` (`idValeurDependante`),
  CONSTRAINT `dependances_ibfk_1` FOREIGN KEY (`idValeur`) REFERENCES `valeurs` (`idValeur`),
  CONSTRAINT `dependances_ibfk_2` FOREIGN KEY (`idValeurDependante`) REFERENCES `valeurs` (`idValeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependances`
--

LOCK TABLES `dependances` WRITE;
/*!40000 ALTER TABLE `dependances` DISABLE KEYS */;
INSERT INTO `dependances` VALUES (6,1),(7,2),(8,3),(9,4),(10,5),(23,21),(24,21),(25,21),(26,21),(27,21),(28,21),(29,21),(30,21),(31,22),(32,22),(33,22),(34,22),(35,22),(36,22),(37,22),(38,22);
/*!40000 ALTER TABLE `dependances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eleve` (
  `idEleve` int(11) NOT NULL,
  `annee` int(4) NOT NULL,
  `nomPromo` varchar(30) NOT NULL,
  PRIMARY KEY (`idEleve`),
  CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `personne` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eleve`
--

LOCK TABLES `eleve` WRITE;
/*!40000 ALTER TABLE `eleve` DISABLE KEYS */;
INSERT INTO `eleve` VALUES (1,2018,'Promo 1A 2018'),(3,2018,'Promo 1A 2018'),(4,2018,'Promo 1A 2018'),(5,2018,'Promo 1A 2018');
/*!40000 ALTER TABLE `eleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enonce`
--

DROP TABLE IF EXISTS `enonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enonce` (
  `idEnonce` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `consigne` text NOT NULL,
  PRIMARY KEY (`idEnonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enonce`
--

LOCK TABLES `enonce` WRITE;
/*!40000 ALTER TABLE `enonce` DISABLE KEYS */;
INSERT INTO `enonce` VALUES (1,'Simulation de fusée','Selon les paramètres suivants, indiquez le nombre de jours ainsi que les quantités nécessaires d\'O2, de carburant, de nourriture et d\'eau pour atteindre Lune :\r\n<ul>\r\n<li>nombre de moteurs : 1</li>\r\n<li>vitesse : 1000 km/h</li>\r\n<li>Consommation de carburant par moteur : 100 tonnes/1000km</li>\r\n<li>Consommation d\'eau par jour par personne : 1,5L</li>\r\n<li>Consommation de nourriture par personne par journée : 2 Kg</li>\r\n<li>Consommation d\'O² par personne par jour : 60L</li>\r\n<li>Le nombre de personnes dans l\'équipage : 3</li>\r\n<li>Destination : Lune</li>\r\n<li>Distance Terre/Lune : 340000 km</li>\r\n</ul>'),(2,'Simulation de fusée','Selon les paramètres suivants, indiquez le nombre de jours ainsi que les quantités nécessaires d\'O2, de carburant, de nourriture et d\'eau pour atteindre Mars :\r\n<ul>\r\n<li>nombre de moteurs : 2</li>\r\n<li>vitesse : 2000 km/h</li>\r\n<li>Consommation de carburant par moteur : 100 tonnes/1000km</li>\r\n<li>Consommation d\'eau par jour par personne : 1,5L</li>\r\n<li>Consommation de nourriture par personne par journée : 2 Kg</li>\r\n<li>Consommation d\'O² par personne par jour : 60L</li>\r\n<li>Le nombre de personnes dans l\'équipage : 6</li>\r\n<li>Destination : Mars</li>\r\n<li>Distance Terre/Mars : 100000000 km</li>\r\n</ul>');
/*!40000 ALTER TABLE `enonce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enseignant` (
  `idEnseignant` int(11) NOT NULL,
  PRIMARY KEY (`idEnseignant`),
  CONSTRAINT `enseignant_ibfk_1` FOREIGN KEY (`idEnseignant`) REFERENCES `personne` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enseignant`
--

LOCK TABLES `enseignant` WRITE;
/*!40000 ALTER TABLE `enseignant` DISABLE KEYS */;
INSERT INTO `enseignant` VALUES (2);
/*!40000 ALTER TABLE `enseignant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examen`
--

DROP TABLE IF EXISTS `examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examen` (
  `idExamen` int(11) NOT NULL AUTO_INCREMENT,
  `dateDepot` datetime NOT NULL,
  `anneeScolaire` int(4) NOT NULL,
  PRIMARY KEY (`idExamen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen`
--

LOCK TABLES `examen` WRITE;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
INSERT INTO `examen` VALUES (1,'2019-01-30 00:00:00',2018);
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exerciceattribue`
--

DROP TABLE IF EXISTS `exerciceattribue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exerciceattribue` (
  `idEleve` int(11) NOT NULL,
  `idSujet` int(11) NOT NULL,
  PRIMARY KEY (`idEleve`,`idSujet`),
  KEY `idSujet` (`idSujet`),
  CONSTRAINT `exerciceattribue_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  CONSTRAINT `exerciceattribue_ibfk_2` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exerciceattribue`
--

LOCK TABLES `exerciceattribue` WRITE;
/*!40000 ALTER TABLE `exerciceattribue` DISABLE KEYS */;
/*!40000 ALTER TABLE `exerciceattribue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercicegenere`
--

DROP TABLE IF EXISTS `exercicegenere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercicegenere` (
  `idSujet` int(11) NOT NULL,
  `idValeur` int(11) NOT NULL,
  PRIMARY KEY (`idSujet`,`idValeur`),
  KEY `idValeur` (`idValeur`),
  CONSTRAINT `exercicegenere_ibfk_1` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`),
  CONSTRAINT `exercicegenere_ibfk_2` FOREIGN KEY (`idValeur`) REFERENCES `valeurs` (`idValeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicegenere`
--

LOCK TABLES `exercicegenere` WRITE;
/*!40000 ALTER TABLE `exercicegenere` DISABLE KEYS */;
INSERT INTO `exercicegenere` VALUES (1,1),(2,2),(1,6),(2,7),(1,11),(2,14),(1,21),(2,22),(1,23),(2,32),(1,39),(2,39),(1,40),(2,40),(1,41),(2,41),(1,42),(2,42);
/*!40000 ALTER TABLE `exercicegenere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `note` (
  `idEleve` int(11) NOT NULL,
  `idSujet` int(11) NOT NULL,
  `note` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idEleve`,`idSujet`),
  KEY `idSujet` (`idSujet`),
  CONSTRAINT `note_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  CONSTRAINT `note_ibfk_2` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `note`
--

LOCK TABLES `note` WRITE;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
/*!40000 ALTER TABLE `note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne`
--

LOCK TABLES `personne` WRITE;
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` VALUES (1,'Dupont','Jean','jean.dupont@etu.unilim.fr','Dupont07','dd12a0be622525ca9c70087737495a20c41870f7'),(2,'Poitou','Nicolas','nicolas.poitou@etu.unilim.fr','Poitou13','d5abe173b1bf9ff8fe318c8744fe236c8a0614f8'),(3,'Potter','Harry','harry.potter@etu.unilim.fr','Potter01','4c0bc787843c7a78ffe1bccf9761b19c6cd3ec72'),(4,'McQueen','Flash','flash.mcqueen@etu.unilim.fr','McQueen05','391fbf9ce3238312c7d3f9c5e24e1b06d061de96'),(5,'Sparrow','Jack','jack.sparrow@etu.unilim.fr','Sparrow54','6e9dcda6d2f78b48a2724b629ddcc96fc9ae8710');
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `points` (
  `idPoint` int(11) NOT NULL,
  `idExamen` int(11) NOT NULL,
  `nomPoint` varchar(50) NOT NULL,
  PRIMARY KEY (`idPoint`,`idExamen`),
  KEY `idExamen` (`idExamen`),
  CONSTRAINT `points_ibfk_1` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `points`
--

LOCK TABLES `points` WRITE;
/*!40000 ALTER TABLE `points` DISABLE KEYS */;
INSERT INTO `points` VALUES (1,1,'nbMoteur'),(2,1,'vitesse'),(3,1,'nbPersonne'),(4,1,'destinationPlanète'),(5,1,'distanceDestination'),(6,1,'consoCarburantParMoteurs'),(7,1,'consoEauParPersonnesParJour'),(8,1,'consoNourrituresParPersonneParJour'),(9,1,'consoO2ParPersonnesParJour');
/*!40000 ALTER TABLE `points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultatsattendus`
--

DROP TABLE IF EXISTS `resultatsattendus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultatsattendus` (
  `idSujet` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `intituleQuestion` text NOT NULL,
  `resultat` decimal(20,2) NOT NULL,
  `exposantUnite` int(11) NOT NULL,
  `resultatUnite` varchar(30) NOT NULL,
  `bareme` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idReponse`,`idSujet`),
  KEY `idSujet` (`idSujet`),
  CONSTRAINT `resultatsattendus_ibfk_1` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultatsattendus`
--

LOCK TABLES `resultatsattendus` WRITE;
/*!40000 ALTER TABLE `resultatsattendus` DISABLE KEYS */;
INSERT INTO `resultatsattendus` VALUES (1,1,'Quantités nécessaires d\'oxygène',2550.00,0,'L',1.00),(2,1,'Quantités nécessaires d\'oxygène',750.00,3,'L',1.00),(1,2,'Quantités nécessaires de carburant',34000.00,12,'g',1.00),(2,2,'Quantités nécessaires de carburant',20000000.00,12,'g',1.00),(1,3,'Quantités nécessaires de nourriture',85.00,3,'g',1.00),(2,3,'Quantités nécessaires de nourriture',25000.00,3,'g',1.00),(1,4,'Quantités nécessaires d\'eau',63.75,0,'L',1.00),(2,4,'Quantités nécessaires d\'eau',18750.00,0,'L',1.00),(1,5,'Nombre de jours',14.00,0,'jours',1.00),(2,5,'Nombre de jours',2083.00,0,'jours',1.00);
/*!40000 ALTER TABLE `resultatsattendus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultatseleves`
--

DROP TABLE IF EXISTS `resultatseleves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultatseleves` (
  `dateResult` datetime NOT NULL,
  `idEleve` int(11) NOT NULL,
  `idSujet` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `resultat` decimal(20,2) NOT NULL,
  `exposantUnite` int(11) NOT NULL,
  `resultatUnite` varchar(30) NOT NULL,
  `justification` text NOT NULL,
  `precisionReponse` decimal(10,2) NOT NULL,
  PRIMARY KEY (`dateResult`,`idEleve`,`idSujet`,`idReponse`),
  KEY `idEleve` (`idEleve`),
  KEY `idSujet` (`idSujet`),
  KEY `idReponse` (`idReponse`),
  CONSTRAINT `resultatseleves_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  CONSTRAINT `resultatseleves_ibfk_2` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`),
  CONSTRAINT `resultatseleves_ibfk_3` FOREIGN KEY (`idReponse`) REFERENCES `resultatsattendus` (`idReponse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultatseleves`
--

LOCK TABLES `resultatseleves` WRITE;
/*!40000 ALTER TABLE `resultatseleves` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultatseleves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schemasujet`
--

DROP TABLE IF EXISTS `schemasujet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schemasujet` (
  `idSujet` int(11) NOT NULL,
  `schema1` longblob NOT NULL,
  `schema2` longblob NOT NULL,
  PRIMARY KEY (`idSujet`),
  CONSTRAINT `schemasujet_ibfk_1` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schemasujet`
--

LOCK TABLES `schemasujet` WRITE;
/*!40000 ALTER TABLE `schemasujet` DISABLE KEYS */;
/*!40000 ALTER TABLE `schemasujet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sujet` (
  `idSujet` int(11) NOT NULL AUTO_INCREMENT,
  `idEnonce` int(11) NOT NULL,
  `semestre` tinyint(1) NOT NULL,
  `idExamen` int(11) NOT NULL,
  PRIMARY KEY (`idSujet`,`idEnonce`),
  KEY `idEnonce` (`idEnonce`),
  KEY `idExamen` (`idExamen`),
  CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`idEnonce`) REFERENCES `enonce` (`idEnonce`),
  CONSTRAINT `sujet_ibfk_2` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sujet`
--

LOCK TABLES `sujet` WRITE;
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` VALUES (1,1,1,1),(2,2,1,1);
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valeurs`
--

DROP TABLE IF EXISTS `valeurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valeurs` (
  `idValeur` int(11) NOT NULL,
  `idPoint` int(11) NOT NULL,
  `valeur` varchar(50) NOT NULL,
  `uniteValeur` varchar(30) NOT NULL,
  `exposantValeur` int(11) NOT NULL,
  PRIMARY KEY (`idValeur`),
  KEY `idPoint` (`idPoint`),
  CONSTRAINT `valeurs_ibfk_1` FOREIGN KEY (`idPoint`) REFERENCES `points` (`idPoint`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valeurs`
--

LOCK TABLES `valeurs` WRITE;
/*!40000 ALTER TABLE `valeurs` DISABLE KEYS */;
INSERT INTO `valeurs` VALUES (1,1,'1','unité',0),(2,1,'2','unité',0),(3,1,'3','unité',0),(4,1,'4','unité',0),(5,1,'5','unité',0),(6,2,'1000','km/h',0),(7,2,'2000','km/h',0),(8,2,'3000','km/h',0),(9,2,'4000','km/h',0),(10,2,'5000','km/h',0),(11,3,'3','unité',0),(12,3,'4','unité',0),(13,3,'5','unité',0),(14,3,'6','unité',0),(15,3,'7','unité',0),(16,3,'8','unité',0),(17,3,'9','unité',0),(18,3,'10','unité',0),(19,3,'11','unité',0),(20,3,'12','unité',0),(21,4,'Lune','',0),(22,4,'Mars','',0),(23,5,'340','m',6),(24,5,'350','m',6),(25,5,'360','m',6),(26,5,'370','m',6),(27,5,'380','m',6),(28,5,'390','m',6),(29,5,'400','m',6),(30,5,'410','m',6),(31,5,'50','m',9),(32,5,'100','m',9),(33,5,'150','m',9),(34,5,'200','m',9),(35,5,'250','m',9),(36,5,'300','m',9),(37,5,'350','m',9),(38,5,'400','m',9),(39,6,'100','tonnes/1000km',0),(40,7,'1.5','L',0),(41,8,'2','g',3),(42,9,'60','L',0);
/*!40000 ALTER TABLE `valeurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-24 17:46:09
