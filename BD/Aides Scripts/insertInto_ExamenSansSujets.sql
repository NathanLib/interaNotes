
INSERT INTO `personne` VALUES (1,'Dupont','Jean', 'jean.dupont@etu.unilim.fr', 'Dupont07','tintin'),(2,'Poitou','Nicolas', 'nicolas.poitou@etu.unilim.fr', 'Poitou13','charente'),(3,'Potter','Harry','harry.potter@etu.unilim.fr','Potter01','giny'),(4,'McQueen','Flash','flash.mcqueen@etu.unilim.fr','McQueen05','vitesse'),(5,'Sparrow','Jack','jack.sparrow@etu.unilim.fr','Sparrow54','pirate');

INSERT INTO `eleve` VALUES (1,2018, "Promo 1A 2018"),(3,2018, "Promo 1A 2018"),(4,2018, "Promo 1A 2018"),(5,2018, "Promo 1A 2018");

INSERT INTO `enseignant` VALUES (2);

INSERT INTO `examen` VALUES (1,'2018-11-30 00:00:00',2018);

INSERT INTO `points` VALUES 
(1,1,'nbMoteur','unité'),
(2,1,'vitesse','Km/H'),
(3,1,'nbPersonne','unité'),
(4,1,'destinationPlanète',''),
(5,1,'distanceDestination','milllions de Kms'),
(6,1,'consoCarburantParMoteurs','tonnes/1000kms'),
(7,1,'consoEauParPersonnesParJour','L'),
(8,1,'consoNourrituresParPersonneParJour','KG'),
(9,1,'consoO2ParPersonnesParJour','L');

INSERT INTO `valeurs` VALUES 
(1,1,'1'), /*nbMoteurs*/
(2,1,'2'),
(3,1,'3'),
(4,1,'4'),
(5,1,'5'),
(6,2,'1000'), /*vitesse*/
(7,2,'2000'),
(8,2,'3000'),
(9,2,'4000'),
(10,2,'5000'),
(11,3,'3'), /*nbPersonnes*/
(12,3,'4'),
(13,3,'5'),
(14,3,'6'),
(15,3,'7'),
(16,3,'8'),
(17,3,'9'),
(18,3,'10'),
(19,3,'11'),
(20,3,'12'),
(21,4,'Lune'), /*planete*/
(22,4,'Mars'),
(23,5,'340000'), /*distance*/
(24,5,'350000'),
(25,5,'360000'),
(26,5,'370000'),
(27,5,'380000'),
(28,5,'390000'),
(29,5,'400000'),
(30,5,'410000'),
(31,5,'50000000'),
(32,5,'100000000'),
(33,5,'150000000'),
(34,5,'200000000'),
(35,5,'250000000'),
(36,5,'300000000'),
(37,5,'350000000'),
(38,5,'400000000'),
(39,6,'100'),
(40,7,'1.5'),
(41,8,'2'),
(42,9,'60');

INSERT INTO `dependances` VALUES 
(6,1),
(7,2),
(8,3),
(9,4),
(10,5),

(23,21),
(24,21),
(25,21),
(26,21),
(27,21),
(28,21),
(29,21),
(30,21),

(31,22),
(32,22),
(33,22),
(34,22),
(35,22),
(36,22),
(37,22),
(38,22),

