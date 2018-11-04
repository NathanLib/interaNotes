INSERT INTO `examen` (`idExamen`,`dateDebut`,`dateDepot`) VALUES (1,'2018-11-01 00:00:00', '2018-11-30 00:00:00');
INSERT INTO `enonce` (`idEnonce`, `titre`, `consigne`) VALUES (1, 'Décollage de fusée', 'Le but est de faire décoller la fusée !!');
INSERT INTO `sujet` (`idSujet`, `idEnonce`, `semestre`,`idExamen`) VALUES(1, 1, 1, 1),(2, 1, 1, 1);
INSERT INTO `points` (`idPoint`, `nomPoint`, `unitePoint`) VALUES (1, 'Nombre de moteur', 'moteur(s)'), (2, 'Consommation d\'O² par personne', 'L/jour');
INSERT INTO `valeurs` (`idValeur`, `idPoint`, `valeur`) VALUES (1, 1, '1.0'),(2, 1, '2.0'),(3, 1, '4.0'),(4, 2, '1.0'),(5, 2, '1.5'),(6, 2, '2.0');
INSERT INTO `exercicegenere` (`idSujet`, `idValeur`) VALUES (1, 2),(2, 3),(2, 4),(1, 5);
INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`, `login`, `mdp`) VALUES (1, 'Dupont', 'Jean', 'Dupont.Jean', 'tintin'),(2, 'Poitou', 'Nicolas', 'Poitou.Nicolas', 'charente');
INSERT INTO `eleve` (`idEleve`) VALUES (1);
INSERT INTO `enseignant` (`idEnseignant`) VALUES (2);
INSERT INTO `note` (`idEleve`, `idSujet`, `note`) VALUES (1, 1, '12.50');
INSERT INTO `exerciceattribue` (`idEleve`, `idSujet`) VALUES (1, 1);
INSERT INTO resultatsattendus VALUES (1,1,500) //premier résultat : 500 k carburant
INSERT INTO resultatseleves VALUES ('2018-11-04 00:00:00',1,1,1,499) //a répondu 499