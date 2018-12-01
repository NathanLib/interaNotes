CREATE TABLE personne (
  idPersonne INT NOT NULL AUTO_INCREMENT,
  nom varchar(30) NOT NULL,
  prenom varchar(30) NOT NULL,
  mail varchar(30) NOT NULL,
  login varchar(30) NOT NULL,
  mdp varchar(50) NOT NULL,
  PRIMARY KEY (idPersonne)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE enseignant (
    idEnseignant INT NOT NULL,
	FOREIGN KEY (idEnseignant) REFERENCES personne(idPersonne),
    PRIMARY KEY (idEnseignant)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE eleve (
    idEleve INT NOT NULL,
	annee INT(4) NOT NULL,
	nomPromo VARCHAR(30) NOT NULL,
	FOREIGN KEY (idEleve) REFERENCES personne(idPersonne),
    PRIMARY KEY (idEleve)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE examen (
  idExamen INT NOT NULL AUTO_INCREMENT,
  dateDepot DATETIME NOT NULL,
  anneeScolaire INT(4) NOT NULL,
  PRIMARY KEY (idExamen)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE enonce (
  idEnonce INT NOT NULL,
  titre VARCHAR(50) NOT NULL,
  consigne TEXT NOT NULL,
  PRIMARY KEY (idEnonce)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE sujet (
  idSujet INT NOT NULL AUTO_INCREMENT,
  idEnonce INT NOT NULL,
  semestre TINYINT(1) NOT NULL,
  idExamen INT NOT NULL,
  FOREIGN KEY (idEnonce) REFERENCES enonce(idEnonce),
  FOREIGN KEY (idExamen) REFERENCES examen(idExamen),
  PRIMARY KEY (idSujet,idEnonce)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*A Redecouper*/
CREATE TABLE schemaSujet (
  idSujet INT NOT NULL,
  schema1 longblob NOT NULL,
  schema2 longblob NOT NULL,
  FOREIGN KEY (idSujet) REFERENCES sujet(idSujet),
  PRIMARY KEY (`idSujet`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*----*/

CREATE TABLE exerciceAttribue (
  idEleve INT NOT NULL,
  idSujet INT NOT NULL,
  FOREIGN KEY (idEleve) REFERENCES eleve(idEleve),
  FOREIGN KEY (idSujet) REFERENCES sujet(idSujet),
  PRIMARY KEY (idEleve,idSujet)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE note (
  idEleve INT NOT NULL,
  idSujet INT NOT NULL,
  note decimal(4,2) NOT NULL,
  FOREIGN KEY (idEleve) REFERENCES eleve(idEleve),
  FOREIGN KEY (idSujet) REFERENCES sujet(idSujet),
  PRIMARY KEY (idEleve,idSujet)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE points (
  idPoint INT NOT NULL,
  idExamen INT NOT NULL,
  nomPoint VARCHAR(50) NOT NULL,
  unitePoint VARCHAR(30) NOT NULL,
  FOREIGN KEY (idExamen) REFERENCES examen(idExamen),
  PRIMARY KEY (idPoint, idExamen)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE valeurs (
  idValeur INT NOT NULL,
  idPoint INT NOT NULL,
  valeur VARCHAR(50) NOT NULL,
  FOREIGN KEY (idPoint) REFERENCES points(idPoint),
  PRIMARY KEY (idValeur)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE exerciceGenere (
  idSujet INT NOT NULL,
  idValeur INT NOT NULL,
  FOREIGN KEY (idSujet) REFERENCES sujet(idSujet),
  FOREIGN KEY (idValeur) REFERENCES valeurs(idValeur),
  PRIMARY KEY (idSujet,idValeur)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE resultatsAttendus (
  idSujet INT NOT NULL,
  idReponse INT NOT NULL,
  intituleQuestion TEXT NOT NULL,
  resultat DECIMAL(15,2) NOT NULL,
  exposantUnite INT NOT NULL,
  resultatUnite VARCHAR(30) NOT NULL,
  bareme DECIMAL(4,2) NOT NULL,
  FOREIGN KEY (idSujet) REFERENCES sujet(idSujet),
  PRIMARY KEY (idReponse, idSujet)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE resultatsEleves (
  dateResult DATETIME NOT NULL,
  idEleve INT NOT NULL,
  idSujet INT NOT NULL,
  idReponse INT NOT NULL,
  resultat DECIMAL(15,2) NOT NULL,
  exposantUnite INT NOT NULL,
  resultatUnite VARCHAR(30) NOT NULL,
  justification TEXT NOT NULL,
  precisionReponse DECIMAL(4,2) NOT NULL,
  FOREIGN KEY (idEleve) REFERENCES eleve(idEleve),
  FOREIGN KEY (idSujet) REFERENCES sujet(idSujet),
  FOREIGN KEY (idReponse) REFERENCES resultatsAttendus(idReponse),
  PRIMARY KEY (dateResult, idEleve, idSujet)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE dependances (
    idValeur INT NOT NULL,
	idValeurDependante INT NOT NULL,
	FOREIGN KEY (idValeur) REFERENCES valeurs(idValeur),
	FOREIGN KEY (idValeurDependante) REFERENCES valeurs(idValeur),
    PRIMARY KEY (idValeur, idValeurDependante)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`, `login`, `mdp`) VALUES
(1, 'Dupont', 'Jean', 'Dupont.Jean', 'tintin'),
(2, 'Poitou', 'Nicolas', 'Poitou.Nicolas', 'charente'),
(3, 'Potter', 'Harry', 'Potter.Harry', 'dumbledore'),
(4, 'McQueen', 'Flash', 'McQueen.Flash', 'vitesse'),
(5, 'Sparrow', 'Jack', 'Sparrow.Jack', 'pirate');

INSERT INTO `eleve` (`idEleve`, `annee`) VALUES
(1, 2018),
(3, 2018),
(4, 2018),
(5, 2018);

INSERT INTO `enseignant` (`idEnseignant`) VALUES
(2);

INSERT INTO `enonce` (`idEnonce`, `titre`, `consigne`) VALUES
(1, 'Simulation de fusée', 'Selon les paramètres suivants, indiquez les quantités nécessaires d\'O2, de carburant, de nourriture et d\'eau pour atteindre [[planète]] :\r\n-nombre de moteurs : [[nbMoteur]]\r\n-vitesse : [[vitesseMoteur]]\r\n-Consommation de carburant par moteur : 100T/1000km\r\n-Consommation d\'eau par jour par personne : 1,5L\r\n-Consommation de nourriture par personne par journée : 2 Kg\r\n-Consommation d\'O² par personne par jour : 60L\r\n-Le nombre de personnes dans l\'équipage : [[nbPersonne]]\r\n-Destination : [[destinationPlanete]]\r\n-Distance Terre/[[destinationPlanete]] : [[distanceDestination]]');

INSERT INTO `examen` (`idExamen`, `dateDepot`, `anneeScolaire`) VALUES
(1, '2018-11-30 00:00:00', '2018');

/*INSERT INTO `sujet` (`idSujet`, `idEnonce`, `semestre`, `idExamen`) VALUES
(1, 1, 1, 1);

INSERT INTO `note` (`idEleve`, `idSujet`, `note`) VALUES
(1, 1, '12.50');*/

INSERT INTO `points` (`idPoint`, `idExamen`, `nomPoint`, `unitePoint`) VALUES
(1, 1, 'nbMoteur', 'unité'),
(2, 1, 'vitesseMoteur', 'Km/H'),
(3, 1, 'nbPersonne', 'unité'),
(4, 1, 'destinationPlanète', ''),
(5, 1, 'distanceDestination', 'milllions de Km');

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