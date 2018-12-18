-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 déc. 2018 à 15:53
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `intera_notes`
--

-- --------------------------------------------------------

--
-- Structure de la table `dependances`
--

DROP TABLE IF EXISTS `dependances`;
CREATE TABLE IF NOT EXISTS `dependances` (
  `idValeur` int(11) NOT NULL,
  `idValeurDependante` int(11) NOT NULL,
  PRIMARY KEY (`idValeur`,`idValeurDependante`),
  KEY `idValeurDependante` (`idValeurDependante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dependances`
--

INSERT INTO `dependances` (`idValeur`, `idValeurDependante`) VALUES
(6, 1),
(7, 2),
(8, 3),
(9, 4),
(10, 5),
(23, 21),
(24, 21),
(25, 21),
(26, 21),
(27, 21),
(28, 21),
(29, 21),
(30, 21),
(31, 22),
(32, 22),
(33, 22),
(34, 22),
(35, 22),
(36, 22),
(37, 22),
(38, 22);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `idEleve` int(11) NOT NULL,
  `annee` int(4) NOT NULL,
  `nomPromo` varchar(30) NOT NULL,
  PRIMARY KEY (`idEleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`idEleve`, `annee`, `nomPromo`) VALUES
(1, 2018, 'Promo 1A 2018'),
(3, 2018, 'Promo 1A 2018'),
(4, 2018, 'Promo 1A 2018'),
(5, 2018, 'Promo 1A 2018');

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
(1, 'Simulation de fusée', 'Selon les paramètres suivants, indiquez le nombre de jours ainsi que les quantités nécessaires d\'O2, de carburant, de nourriture et d\'eau pour atteindre Lune :\r\n<ul>\r\n<li>Nombre de moteurs : 1</li>\r\n<li>Vitesse : 1000 Km/H</li>\r\n<li>Consommation de carburant par moteur : 100T/1000km</li>\r\n<li>Consommation d\'eau par jour par personne : 1,5L</li>\r\n<li>Consommation de nourriture par personne par journée : 2 Kg</li>\r\n<li>Consommation d\'O² par personne par jour : 60L</li>\r\n<li>Le nombre de personnes dans l\'équipage : 3</li>\r\n<li>Destination : Lune</li>\r\n<li>Distance Terre/Lune : 340000 Km</li>\r\n</ul>'),
(2, 'Simulation de fusée', 'Selon les paramètres suivants, indiquez le nombre de jours ainsi que les quantités nécessaires d\'O2, de carburant, de nourriture et d\'eau pour atteindre Mars :\r\n<ul>\r\n<li>Nombre de moteurs : 2</li>\r\n<li>Vitesse : 2000 Km/H</li>\r\n<li>Consommation de carburant par moteur : 100T/1000km</li>\r\n<li>Consommation d\'eau par jour par personne : 1,5L</li>\r\n<li>Consommation de nourriture par personne par journée : 2 Kg</li>\r\n<li>Consommation d\'O² par personne par jour : 60L</li>\r\n<li>Le nombre de personnes dans l\'équipage : 6</li>\r\n<li>Destination : Mars</li>\r\n<li>Distance Terre/Mars : 100000000 Km</li>\r\n<ul>');

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
  `idExamen` int(11) NOT NULL AUTO_INCREMENT,
  `dateDepot` datetime NOT NULL,
  `anneeScolaire` int(4) NOT NULL,
  PRIMARY KEY (`idExamen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`idExamen`, `dateDepot`, `anneeScolaire`) VALUES
(1, '2018-12-23 00:00:00', 2018);

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

--
-- Déchargement des données de la table `exerciceattribue`
--

INSERT INTO `exerciceattribue` (`idEleve`, `idSujet`) VALUES
(3, 1),
(5, 2);

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

--
-- Déchargement des données de la table `exercicegenere`
--

INSERT INTO `exercicegenere` (`idSujet`, `idValeur`) VALUES
(1, 1),
(2, 2),
(1, 6),
(2, 7),
(1, 11),
(2, 14),
(1, 21),
(2, 22),
(1, 23),
(2, 32),
(1, 39),
(2, 39),
(1, 40),
(2, 40),
(1, 41),
(2, 41),
(1, 42),
(2, 42);

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

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`, `mail`, `login`, `mdp`) VALUES
(1, 'Dupont', 'Jean', 'jean.dupont@etu.unilim.fr', 'Dupont07', 'dd12a0be622525ca9c70087737495a20c41870f7'),
(2, 'Poitou', 'Nicolas', 'nicolas.poitou@etu.unilim.fr', 'Poitou13', 'd5abe173b1bf9ff8fe318c8744fe236c8a0614f8'),
(3, 'Potter', 'Harry', 'harry.potter@etu.unilim.fr', 'Potter01', '4c0bc787843c7a78ffe1bccf9761b19c6cd3ec72'),
(4, 'McQueen', 'Flash', 'flash.mcqueen@etu.unilim.fr', 'McQueen05', '391fbf9ce3238312c7d3f9c5e24e1b06d061de96'),
(5, 'Sparrow', 'Jack', 'jack.sparrow@etu.unilim.fr', 'Sparrow54', '6e9dcda6d2f78b48a2724b629ddcc96fc9ae8710');

-- --------------------------------------------------------

--
-- Structure de la table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `idPoint` int(11) NOT NULL,
  `idExamen` int(11) NOT NULL,
  `nomPoint` varchar(50) NOT NULL,
  `unitePoint` varchar(30) NOT NULL,
  PRIMARY KEY (`idPoint`,`idExamen`),
  KEY `idExamen` (`idExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `points`
--

INSERT INTO `points` (`idPoint`, `idExamen`, `nomPoint`, `unitePoint`) VALUES
(1, 1, 'nbMoteur', 'unité'),
(2, 1, 'vitesse', 'Km/H'),
(3, 1, 'nbPersonne', 'unité'),
(4, 1, 'destinationPlanète', ''),
(5, 1, 'distanceDestination', 'milllions de Kms'),
(6, 1, 'consoCarburantParMoteurs', 'tonnes/1000kms'),
(7, 1, 'consoEauParPersonnesParJour', 'L'),
(8, 1, 'consoNourrituresParPersonneParJour', 'KG'),
(9, 1, 'consoO2ParPersonnesParJour', 'L');

-- --------------------------------------------------------

--
-- Structure de la table `resultatsattendus`
--

DROP TABLE IF EXISTS `resultatsattendus`;
CREATE TABLE IF NOT EXISTS `resultatsattendus` (
  `idSujet` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `intituleQuestion` text NOT NULL,
  `resultat` decimal(21,3) NOT NULL,
  `exposantUnite` int(11) NOT NULL,
  `resultatUnite` varchar(30) NOT NULL,
  `bareme` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idReponse`,`idSujet`),
  KEY `idSujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `resultatsattendus`
--

INSERT INTO `resultatsattendus` (`idSujet`, `idReponse`, `intituleQuestion`, `resultat`, `exposantUnite`, `resultatUnite`, `bareme`) VALUES
(1, 1, 'Quantités nécessaires d\'oxygène', '2550.000', 1, 'L', '1.00'),
(2, 1, 'Quantités nécessaires d\'oxygène', '750000.000', 1, 'L', '1.00'),
(1, 2, 'Quantités nécessaires de carburant', '34000000000.000', 6, 'g', '1.00'),
(2, 2, 'Quantités nécessaires de carburant', '20000000000000.000', 6, 'g', '1.00'),
(1, 3, 'Quantités nécessaires de nourriture', '85.000', 3, 'g', '1.00'),
(2, 3, 'Quantités nécessaires de nourriture', '25000.000', 3, 'g', '1.00'),
(1, 4, 'Quantités nécessaires d\'eau', '63.750', 1, 'L', '1.00'),
(2, 4, 'Quantités nécessaires d\'eau', '18750.000', 1, 'L', '1.00'),
(1, 5, 'Nombre de jours', '14166.000', 1, 'jours', '1.00'),
(2, 5, 'Nombre de jours', '2083333.000', 1, 'jours', '1.00');

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
  `resultat` decimal(21,3) NOT NULL,
  `exposantUnite` int(11) NOT NULL,
  `resultatUnite` varchar(30) NOT NULL,
  `justification` text NOT NULL,
  `precisionReponse` decimal(10,2) NOT NULL,
  PRIMARY KEY (`dateResult`,`idEleve`,`idSujet`,`idReponse`),
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
  `idSujet` int(11) NOT NULL AUTO_INCREMENT,
  `idEnonce` int(11) NOT NULL,
  `semestre` tinyint(1) NOT NULL,
  `idExamen` int(11) NOT NULL,
  PRIMARY KEY (`idSujet`,`idEnonce`),
  KEY `idEnonce` (`idEnonce`),
  KEY `idExamen` (`idExamen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`idSujet`, `idEnonce`, `semestre`, `idExamen`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1);

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
(23, 5, '340000'),
(24, 5, '350000'),
(25, 5, '360000'),
(26, 5, '370000'),
(27, 5, '380000'),
(28, 5, '390000'),
(29, 5, '400000'),
(30, 5, '410000'),
(31, 5, '50000000'),
(32, 5, '100000000'),
(33, 5, '150000000'),
(34, 5, '200000000'),
(35, 5, '250000000'),
(36, 5, '300000000'),
(37, 5, '350000000'),
(38, 5, '400000000'),
(39, 6, '100'),
(40, 7, '1.5'),
(41, 8, '2'),
(42, 9, '60');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dependances`
--
ALTER TABLE `dependances`
  ADD CONSTRAINT `dependances_ibfk_1` FOREIGN KEY (`idValeur`) REFERENCES `valeurs` (`idValeur`),
  ADD CONSTRAINT `dependances_ibfk_2` FOREIGN KEY (`idValeurDependante`) REFERENCES `valeurs` (`idValeur`);

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
-- Contraintes pour la table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`);

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
