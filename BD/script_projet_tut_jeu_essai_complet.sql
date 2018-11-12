-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 11 nov. 2018 à 09:32
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_tut`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `idEleve` int(11) NOT NULL,
  `annee` int(4) NOT NULL,
  PRIMARY KEY (`idEleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`idEleve`, `annee`) VALUES
(1, 2018),
(3, 2018),
(4, 2018),
(5, 2018);

-- --------------------------------------------------------

--
-- Structure de la table `enonce`
--

DROP TABLE IF EXISTS `enonce`;
CREATE TABLE IF NOT EXISTS `enonce` (
  `idEnonce` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `consigne` text NOT NULL,
  PRIMARY KEY (`idEnonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enonce`
--

INSERT INTO `enonce` (`idEnonce`, `titre`, `consigne`) VALUES
(1, 'Simulation de fusée', 'Selon les paramètres suivants, indiquez les quantités nécessaires d\'O2, de carburant, de nourriture et d\'eau pour atteindre [[planète]] :\r\n-nombre de moteurs : [[nbMoteur]]\r\n-vitesse : [[vitesseMoteur]]\r\n-Consommation de carburant par moteur : 100T/1000km\r\n-Consommation d\'eau par jour par personne : 1,5L\r\n-Consommation de nourriture par personne par journée : 2 Kg\r\n-Consommation d\'O² par personne par jour : 60L\r\n-Le nombre de personnes dans l\'équipage : [[nbPersonne]]\r\n-Destination : [[destinationPlanete]]\r\n-Distance Terre/[[destinationPlanete]] : [[distanceDestination]]');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `idEnseignant` int(11) NOT NULL,
  PRIMARY KEY (`idEnseignant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`idEnseignant`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

DROP TABLE IF EXISTS `examen`;
CREATE TABLE IF NOT EXISTS `examen` (
  `idExamen` int(11) NOT NULL,
  `dateDepot` datetime NOT NULL,
  PRIMARY KEY (`idExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`idExamen`, `dateDepot`) VALUES
(1, '2018-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `exerciceattribue`
--

DROP TABLE IF EXISTS `exerciceattribue`;
CREATE TABLE IF NOT EXISTS `exerciceattribue` (
  `idEleve` int(11) NOT NULL,
  `idSujet` int(11) NOT NULL,
  PRIMARY KEY (`idEleve`,`idSujet`),
  KEY `idSujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `exercicegenere`
--

DROP TABLE IF EXISTS `exercicegenere`;
CREATE TABLE IF NOT EXISTS `exercicegenere` (
  `idSujet` int(11) NOT NULL,
  `idValeur` int(11) NOT NULL,
  PRIMARY KEY (`idSujet`,`idValeur`),
  KEY `idValeur` (`idValeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `idEleve` int(11) NOT NULL,
  `idSujet` int(11) NOT NULL,
  `note` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idEleve`,`idSujet`),
  KEY `idSujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`idEleve`, `idSujet`, `note`) VALUES
(1, 1, '12.50');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`, `login`, `mdp`) VALUES
(1, 'Dupont', 'Jean', 'Dupont.Jean', 'tintin'),
(2, 'Poitou', 'Nicolas', 'Poitou.Nicolas', 'charente'),
(3, 'Potter', 'Harry', 'Potter.Harry', 'dumbledore'),
(4, 'McQueen', 'Flash', 'McQueen.Flash', 'vitesse'),
(5, 'Sparrow', 'Jack', 'Sparrow.Jack', 'pirate');

-- --------------------------------------------------------

--
-- Structure de la table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `idPoint` int(11) NOT NULL,
  `nomPoint` varchar(30) NOT NULL,
  `unitePoint` varchar(30) NOT NULL,
  PRIMARY KEY (`idPoint`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `points`
--

INSERT INTO `points` (`idPoint`, `nomPoint`, `unitePoint`) VALUES
(1, 'nbMoteur', 'unité'),
(2, 'vitesseMoteur', 'Km/H'),
(3, 'nbPersonne', 'unité'),
(4, 'destinationPlanète', ''),
(5, 'distanceDestination', 'milllions de Km');

-- --------------------------------------------------------

--
-- Structure de la table `resultatsattendus`
--

DROP TABLE IF EXISTS `resultatsattendus`;
CREATE TABLE IF NOT EXISTS `resultatsattendus` (
  `idSujet` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `resultat` decimal(5,1) NOT NULL,
  `bareme` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idReponse`,`idSujet`),
  KEY `idSujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `resultatseleves`
--

DROP TABLE IF EXISTS `resultatseleves`;
CREATE TABLE IF NOT EXISTS `resultatseleves` (
  `dateResult` datetime NOT NULL,
  `idEleve` int(11) NOT NULL,
  `idSujet` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `resultat` decimal(5,1) NOT NULL,
  `precisionReponse` decimal(4,2) NOT NULL,
  PRIMARY KEY (`dateResult`,`idEleve`,`idSujet`),
  KEY `idEleve` (`idEleve`),
  KEY `idSujet` (`idSujet`),
  KEY `idReponse` (`idReponse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `schemasujet`
--

DROP TABLE IF EXISTS `schemasujet`;
CREATE TABLE IF NOT EXISTS `schemasujet` (
  `idSujet` int(11) NOT NULL,
  `schema1` longblob NOT NULL,
  `schema2` longblob NOT NULL,
  PRIMARY KEY (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
CREATE TABLE IF NOT EXISTS `sujet` (
  `idSujet` int(11) NOT NULL,
  `idEnonce` int(11) NOT NULL,
  `semestre` tinyint(1) NOT NULL,
  `idExamen` int(11) NOT NULL,
  PRIMARY KEY (`idSujet`,`idEnonce`),
  KEY `idEnonce` (`idEnonce`),
  KEY `idExamen` (`idExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`idSujet`, `idEnonce`, `semestre`, `idExamen`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `valeurs`
--

DROP TABLE IF EXISTS `valeurs`;
CREATE TABLE IF NOT EXISTS `valeurs` (
  `idValeur` int(11) NOT NULL,
  `idPoint` int(11) NOT NULL,
  `valeur` varchar(50) NOT NULL,
  PRIMARY KEY (`idValeur`),
  KEY `idPoint` (`idPoint`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `valeurs`
--

INSERT INTO `valeurs` (`idValeur`, `idPoint`, `valeur`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 1, '3'),
(4, 1, '4'),
(5, 1, '5'),
(6, 2, '1000'),
(7, 2, '2000'),
(8, 2, '3000'),
(9, 2, '4000'),
(10, 2, '5000'),
(11, 3, '3'),
(12, 3, '4'),
(13, 3, '5'),
(14, 3, '6'),
(15, 3, '7'),
(16, 3, '8'),
(17, 3, '9'),
(18, 3, '10'),
(19, 3, '11'),
(20, 3, '12'),
(21, 4, 'Lune'),
(22, 4, 'Mars'),
(23, 5, '0.34'),
(24, 5, '0.35'),
(25, 5, '0.36'),
(26, 5, '0.37'),
(27, 5, '0.38'),
(28, 5, '0.39'),
(29, 5, '0.40'),
(30, 5, '0.41'),
(31, 5, '50'),
(32, 5, '100'),
(33, 5, '150'),
(34, 5, '200'),
(35, 5, '250'),
(36, 5, '300'),
(37, 5, '350'),
(38, 5, '400');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `personne` (`idPersonne`);

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `enseignant_ibfk_1` FOREIGN KEY (`idEnseignant`) REFERENCES `personne` (`idPersonne`);

--
-- Contraintes pour la table `exerciceattribue`
--
ALTER TABLE `exerciceattribue`
  ADD CONSTRAINT `exerciceattribue_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  ADD CONSTRAINT `exerciceattribue_ibfk_2` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`);

--
-- Contraintes pour la table `exercicegenere`
--
ALTER TABLE `exercicegenere`
  ADD CONSTRAINT `exercicegenere_ibfk_1` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`),
  ADD CONSTRAINT `exercicegenere_ibfk_2` FOREIGN KEY (`idValeur`) REFERENCES `valeurs` (`idValeur`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`);

--
-- Contraintes pour la table `resultatsattendus`
--
ALTER TABLE `resultatsattendus`
  ADD CONSTRAINT `resultatsattendus_ibfk_1` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`);

--
-- Contraintes pour la table `resultatseleves`
--
ALTER TABLE `resultatseleves`
  ADD CONSTRAINT `resultatseleves_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  ADD CONSTRAINT `resultatseleves_ibfk_2` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`),
  ADD CONSTRAINT `resultatseleves_ibfk_3` FOREIGN KEY (`idReponse`) REFERENCES `resultatsattendus` (`idReponse`);

--
-- Contraintes pour la table `schemasujet`
--
ALTER TABLE `schemasujet`
  ADD CONSTRAINT `schemasujet_ibfk_1` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`);

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`idEnonce`) REFERENCES `enonce` (`idEnonce`),
  ADD CONSTRAINT `sujet_ibfk_2` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`);

--
-- Contraintes pour la table `valeurs`
--
ALTER TABLE `valeurs`
  ADD CONSTRAINT `valeurs_ibfk_1` FOREIGN KEY (`idPoint`) REFERENCES `points` (`idPoint`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
