-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 01 nov. 2018 à 21:05
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
  PRIMARY KEY (`idEleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`idEleve`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `enonce`
--

DROP TABLE IF EXISTS `enonce`;
CREATE TABLE IF NOT EXISTS `enonce` (
  `idEnonce` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `consigne` text NOT NULL,
  `dateDebut` datetime NOT NULL,
  `dateDepot` datetime NOT NULL,
  PRIMARY KEY (`idEnonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enonce`
--

INSERT INTO `enonce` (`idEnonce`, `titre`, `consigne`, `dateDebut`, `dateDepot`) VALUES
(1, 'Décollage de fusée', 'Le but est de faire décoller la fusée !!', '2018-11-01 00:00:00', '2018-11-30 00:00:00');

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
(1, 1);

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
(1, 2),
(2, 3),
(2, 4),
(1, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`, `login`, `mdp`) VALUES
(1, 'Dupont', 'Jean', 'Dupont.Jean', 'tintin'),
(2, 'Poitou', 'Nicolas', 'Poitou.Nicolas', 'charente');

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
(1, 'Nombre de moteur', 'moteur(s)'),
(2, 'Consommation d\'O² par personne', 'L/jour');

-- --------------------------------------------------------

--
-- Structure de la table `resultateleves`
--

DROP TABLE IF EXISTS `resultateleves`;
CREATE TABLE IF NOT EXISTS `resultateleves` (
  `date` datetime NOT NULL,
  `idSujet` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `resultat` int(11) NOT NULL,
  PRIMARY KEY (`date`,`idSujet`,`idReponse`),
  KEY `idSujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `resultatsattendus`
--

DROP TABLE IF EXISTS `resultatsattendus`;
CREATE TABLE IF NOT EXISTS `resultatsattendus` (
  `idSujet` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `resultat` int(11) NOT NULL,
  PRIMARY KEY (`idSujet`,`idReponse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`idSujet`,`idEnonce`),
  KEY `idEnonce` (`idEnonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`idSujet`, `idEnonce`, `semestre`) VALUES
(1, 1, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `valeurs`
--

DROP TABLE IF EXISTS `valeurs`;
CREATE TABLE IF NOT EXISTS `valeurs` (
  `idValeur` int(11) NOT NULL,
  `idPoint` int(11) NOT NULL,
  `valeur` decimal(5,1) NOT NULL,
  PRIMARY KEY (`idValeur`),
  KEY `idPoint` (`idPoint`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `valeurs`
--

INSERT INTO `valeurs` (`idValeur`, `idPoint`, `valeur`) VALUES
(1, 1, '1.0'),
(2, 1, '2.0'),
(3, 1, '4.0'),
(4, 2, '1.0'),
(5, 2, '1.5'),
(6, 2, '2.0');

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
-- Contraintes pour la table `resultateleves`
--
ALTER TABLE `resultateleves`
  ADD CONSTRAINT `resultateleves_ibfk_1` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`);

--
-- Contraintes pour la table `resultatsattendus`
--
ALTER TABLE `resultatsattendus`
  ADD CONSTRAINT `resultatsattendus_ibfk_1` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`),
  ADD CONSTRAINT `resultatsattendus_ibfk_2` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`);

--
-- Contraintes pour la table `schemasujet`
--
ALTER TABLE `schemasujet`
  ADD CONSTRAINT `schemasujet_ibfk_1` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`idSujet`);

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`idEnonce`) REFERENCES `enonce` (`idEnonce`);

--
-- Contraintes pour la table `valeurs`
--
ALTER TABLE `valeurs`
  ADD CONSTRAINT `valeurs_ibfk_1` FOREIGN KEY (`idPoint`) REFERENCES `points` (`idPoint`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
