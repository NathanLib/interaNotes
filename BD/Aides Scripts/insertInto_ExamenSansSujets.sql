
INSERT INTO `personne` VALUES 
(1,'Dupont','Jean', 'jean.dupont@etu.unilim.fr', 'Dupont07','dd12a0be622525ca9c70087737495a20c41870f7'),
(2,'Poitou','Nicolas', 'nicolas.poitou@etu.unilim.fr', 'Poitou13','d5abe173b1bf9ff8fe318c8744fe236c8a0614f8'),
(3,'Potter','Harry','harry.potter@etu.unilim.fr','Potter01','4c0bc787843c7a78ffe1bccf9761b19c6cd3ec72'),
(4,'McQueen','Flash','flash.mcqueen@etu.unilim.fr','McQueen05','391fbf9ce3238312c7d3f9c5e24e1b06d061de96'),
(5,'Sparrow','Jack','jack.sparrow@etu.unilim.fr','Sparrow54','6e9dcda6d2f78b48a2724b629ddcc96fc9ae8710');

INSERT INTO `eleve` VALUES (1,2018, "Promo 1A 2018"),(3,2018, "Promo 1A 2018"),(4,2018, "Promo 1A 2018"),(5,2018, "Promo 1A 2018");

INSERT INTO `enseignant` VALUES (2);

INSERT INTO `examen` VALUES (1,'2019-01-30 00:00:00',2018);

INSERT INTO `points` VALUES 
(1,1,'nbMoteur'),
(2,1,'vitesse'),
(3,1,'nbPersonne'),
(4,1,'destinationPlanète'),
(5,1,'distanceDestination'),
(6,1,'consoCarburantParMoteurs'),
(7,1,'consoEauParPersonnesParJour'),
(8,1,'consoNourrituresParPersonneParJour'),
(9,1,'consoO2ParPersonnesParJour');

INSERT INTO `valeurs` VALUES 
(1,1,'1','unité',0), /*nbMoteurs*/
(2,1,'2','unité',0),
(3,1,'3','unité',0),
(4,1,'4','unité',0),
(5,1,'5','unité',0),
(6,2,'1000','km/h',0), /*vitesse*/
(7,2,'2000','km/h',0),
(8,2,'3000','km/h',0),
(9,2,'4000','km/h',0),
(10,2,'5000','km/h',0),
(11,3,'3','unité',0), /*nbPersonnes*/
(12,3,'4','unité',0),
(13,3,'5','unité',0),
(14,3,'6','unité',0),
(15,3,'7','unité',0),
(16,3,'8','unité',0),
(17,3,'9','unité',0),
(18,3,'10','unité',0),
(19,3,'11','unité',0),
(20,3,'12','unité',0),
(21,4,'Lune','',0), /*planete*/
(22,4,'Mars','',0),
(23,5,'340','m',6), /*distance*/
(24,5,'350','m',6),
(25,5,'360','m',6),
(26,5,'370','m',6),
(27,5,'380','m',6),
(28,5,'390','m',6),
(29,5,'400','m',6),
(30,5,'410','m',6),
(31,5,'50','m',9),
(32,5,'100','m',9),
(33,5,'150','m',9),
(34,5,'200','m',9),
(35,5,'250','m',9),
(36,5,'300','m',9),
(37,5,'350','m',9),
(38,5,'400','m',9),
(39,6,'100','tonnes/1000km',0), /*ConsoCarburantParMoteurPar1000km*/
(40,7,'1.5','L',0), /*ConsoEau*/
(41,8,'2','g',3), /*ConsoNourriture*/
(42,9,'60','L',0); /*ConsoO2*/

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
(38,22);

