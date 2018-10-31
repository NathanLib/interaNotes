CREATE TABLE personne (
  idPersonne INT NOT NULL AUTO_INCREMENT,
  nom varchar(30) NOT NULL,
  prenom varchar(30) NOT NULL,
  login varchar(30) NOT NULL,
  mdp varchar(30) NOT NULL,
  PRIMARY KEY (idPersonne)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE enseignant (
    idEnseignant INT NOT NULL,
	FOREIGN KEY (idEnseignant) REFERENCES personne(idPersonne),
    PRIMARY KEY (idEnseignant)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE eleve (
    idEleve INT NOT NULL,
	FOREIGN KEY (idEleve) REFERENCES personne(idPersonne),
    PRIMARY KEY (idEleve)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE enonce (
  idEnonce INT NOT NULL,
  titre VARCHAR(50) NOT NULL,
  semestre TEXT NOT NULL,
  PRIMARY KEY (idEnonce)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE sujet (
  idSujet INT NOT NULL,
  idEnonce INT NOT NULL,
  semestre TINYINT(1) NOT NULL,
  FOREIGN KEY (idEnonce) REFERENCES enonce(idEnonce),
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
  nomPoint VARCHAR(30) NOT NULL,
  unitePoint VARCHAR(30) NOT NULL,
  PRIMARY KEY (idPoint)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE valeurs (
  idValeur INT NOT NULL,
  idPoint INT NOT NULL,
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