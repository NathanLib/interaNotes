INSERT INTO `personne` VALUES (1,'Dupont','Jean','Dupont.Jean','Dupont.Jean@hotmail.fr','tintin'),(2,'Poitou','Nicolas','Poitou.Nicolas','Poitou.Nicolas@unilim.fr','charente'),(3,'Potter','Harry','Potter.Harry','Potter.Harry@poudlard.com','dumbledore'),(4,'McQueen','Flash','Flash.McQueen@cars.com','McQueen.Flash','vitesse'),(5,'Sparrow','Jack','blackpearl@pirate.fr','Sparrow.Jack','pirate');

INSERT INTO `eleve` VALUES (1,2018,'lapin'),(3,2018,'lapin'),(4,2018,'lapin'),(5,2018,'lapin');

INSERT INTO `enseignant` VALUES (2);

INSERT INTO `examen` VALUES (1,'2018-11-30 00:00:00',2018);


INSERT INTO `enonce` VALUES (1,'Simulation de fusée','Selon les paramètres suivants, indiquez les quantités nécessaires d\'O2, de carburant, de nourriture et d\'eau pour atteindre [[planète]] :\r\n-nombre de moteurs : [[nbMoteur]]\r\n-vitesse : [[vitesseMoteur]]\r\n-Consommation de carburant par moteur : 100T/1000km\r\n-Consommation d\'eau par jour par personne : 1,5L\r\n-Consommation de nourriture par personne par journée : 2 Kg\r\n-Consommation d\'O² par personne par jour : 60L\r\n-Le nombre de personnes dans l\'équipage : [[nbPersonne]]\r\n-Destination : [[destinationPlanete]]\r\n-Distance Terre/[[destinationPlanete]] : [[distanceDestination]]');


INSERT INTO `sujet` VALUES (1,1,1,1),(2,1,1,1);

INSERT INTO `points` VALUES (1,1,'nbMoteur','unité'),(2,1,'vitesseMoteur','Km/H'),(3,1,'nbPersonne','unité'),(4,1,'destinationPlanète',''),(5,1,'distanceDestination','milllions de Km'),(6,1,'consoCarburantParMoteurs','tonnes/1000km'),(7,1,'consoEauParPersonnesParJour','L'),(8,1,'consoNourrituresParPersonneParJour','KG'),(9,1,'consoO2ParPersonnesParJour','L');

INSERT INTO `valeurs` VALUES (1,1,'1'),(2,1,'2'),(3,1,'3'),(4,1,'4'),(5,1,'5'),(6,2,'1000'),(7,2,'2000'),(8,2,'3000'),(9,2,'4000'),(10,2,'5000'),(11,3,'3'),(12,3,'4'),(13,3,'5'),(14,3,'6'),(15,3,'7'),(16,3,'8'),(17,3,'9'),(18,3,'10'),(19,3,'11'),(20,3,'12'),(21,4,'Lune'),(22,4,'Mars'),(23,5,'340000'),(24,5,'350000'),(25,5,'360000'),(26,5,'370000'),(27,5,'380000'),(28,5,'390000'),(29,5,'400000'),(30,5,'410000'),(31,5,'50000000'),(32,5,'100000000'),(33,5,'150000000'),(34,5,'200000000'),(35,5,'250000000'),(36,5,'300000000'),(37,5,'350000000'),(38,5,'400000000'),(39,6,'100'),(40,7,'1.5'),(41,8,'2'),(42,9,'60');

INSERT INTO `exerciceattribue` VALUES (3,1),(5,2);

INSERT INTO `exercicegenere` VALUES (1,1),(2,1),(1,6),(2,6),(1,11),(2,14),(1,21),(2,21),(1,23),(2,27),(1,39),(2,39),(1,40),(2,40),(1,41),(2,41),(1,42),(2,42);




