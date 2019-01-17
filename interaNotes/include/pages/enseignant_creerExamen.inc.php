<?php require_once("include/verifEnseignant.inc.php"); ?>

<?php 

$db = new Mypdo();
$eleveManager = new EleveManager($db);

$listePromo = $eleveManager->getAllPromo();

if($listePromo===false) { ?>
    <p style="text-align:center;font-weight:bold; margin:10% 0;">
        <img src="image/erreur.png" alt="erreur.png">
        Aucune promo enregistrée ! 
    </p>

<?php } else { ?>

    <?php if(!isset($_POST['enonceExam'])) { ?>
        <form action="index.php?page=4" method="post" name="form1">
            <div class="row createExam">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="classExam">Promotion :</label>
                            <select class="form-control" id="classExam" name="classExam" required>
                                <?php foreach ($listePromo as $promo => $value) { ?>
                                    <option value=<?php echo $value->nomPromo ?> > <?php echo $value->nomPromo ; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 form-group">
                            <label for="endExam">Date de fin :</label>
                            <input class="form-control" id="endExam" name="endExam" type="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" min='<?php echo date('Y-m-d');?>' value='<?php echo date('Y-m-d');?>' placeholder="DD/MM/YYYY" required/>
                        </div>

                        <div class="col-12 form-group">
                            <label for="nameExam">Titre de l'examen :</label>
                            <input class="form-control" id="nameExam" name="nameExam" type="text" placeholder="" maxlength="50" required>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="enonceExam">Enoncé :</label>
                            <textarea class="form-control" id="enonceExam" name="enonceExam" onkeyup="adjustHeightTextArea(this)" placeholder='Veuillez écrire vos variables de la manière suivante : $maVariables$' maxlength="65535" required></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" class="createClassSubmit" name="Submit" value="Importer">
            </form>
        </div>
        
    <?php } else {

        $nomPromotion = $_POST['classExam'];
        $dateLimite = $_POST['endExam'];
        $titreExamen = $_POST['nameExam'];
        $texteEnonce = $_POST['enonceExam'];

        preg_match_all( '#\$(\w++)\$#', $_POST['enonceExam'], $tableauParametres);
        $tableauParametres = $tableauParametres[1]; //destruction des variables $var$
        ?>
        
        <h1>Titre de l'examen : <?php echo $titreExamen ?></h1>
        <h2>Promotion concernée : <?php echo $nomPromotion ?></h2>
        <h2>Date de fin : <?php echo $dateLimite ?></h2>

        <h3>Enonce de l'examen</h3>
        <p><?php echo $texteEnonce?></p>
        
        <h3>Liste des paramètres de l'examen</h3>
        
        <?php
        foreach ($tableauParametres as $compteur => $parametre) { ?>
            <p><?php echo $parametre ?> : </p>
            <button id="<?php echo "btnAjout".$compteur; ?>" class="btn btn-primary popUp" type="button" name="button" onclick="ouvrirBox(<?php echo $compteur; ?>)">Ajouter les valeurs</button>
            <div class="box" id=<?php echo "box".$compteur ;?> >

                <div class="form-wrapper">


                    <h3><?php echo $parametre ?></h3>

                    <div>

                        <input id=<?php echo "boutonUnique".$compteur ; ?> type="button" value="Valeurs Uniques" onclick="affichageSaisieValeurUnique(<?php echo $compteur; ?>)">

                        <input id=<?php echo "boutonIntervalle".$compteur ; ?> type="button" onclick="affichageSaisieIntervalle(<?php echo $compteur; ?>)" value="Intervalles">
                    </div>

                    <div id=<?php echo "valeursUniques".$compteur ;?> style="display : none">   

                        <input id="<?php echo 'saisieParametre'.$compteur ?>" type="text" placeholder="Nouvelle valeur" >
                        <div class="form-group divPuissanceResult">
                            <p id="puissanceValeur">x10</p>
                            <input id=<?php echo "puissanceValeur".$compteur; ?> class="form-control saisiePuissanceResult" name=<?php echo "puissanceValeur".$compteur; ?> type="number" value="0" step="1" required>
                        </div>

                        <div class="form-group">
                            <label for="uniteAnswer">Unité de la valeur :</label>
                            <select class="form-control" id=<?php echo "uniteValeur".$compteur ;?> type="text" placeholder="Sélectionnez l'unité du résultat" required>
                                <?php
                                $listeUnites = Unites::getConstants();

                                foreach ($listeUnites as $unite => $abreviation) { ?>
                                    <option value="<?php echo $abreviation ?>"><?php echo $abreviation ?></option>";
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exposantAnswer">Exposant de la valeur :</label>
                            <select class="form-control" id=<?php echo "exposantValeur".$compteur ;?> type="text" placeholder="Sélectionnez l'exposant de l'unité" required>
                                <?php
                                $listeExposants = Exposants::getConstants();
                                $defautExposant = Exposants::getExposantParDefaut();

                                foreach ($listeExposants as $exposant) { ?>
                                    <option <?php if($exposant==$defautExposant){ echo "selected ";} ?>value="<?php echo $exposant ?>"><?php echo $exposant ?></option>";
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <input class="detailMdpButton" type="button" value="Valider" class="btn" onclick="return ajouterValeurDeParametre(event,<?php echo "'saisieParametre".$compteur."'" ?>,<?php echo "'parametre".$compteur."'" ?>,<?php echo "'puissanceValeur".$compteur."'" ?>,<?php echo "'uniteValeur".$compteur."'" ?>,<?php echo "'exposantValeur".$compteur."'" ?>)" />

                        <select class="listeValeur" id="<?php echo 'parametre'.$compteur ?>" multiple></select>

                        <button id="<?php echo "bouton".$compteur; ?>" onclick=<?php echo "supprimerValeur(".$compteur.")"; ?> value="Supprimer">Poubelle</button>

                        <div class="form-group divMdpButton">
                            <input class="detailMdpButton" type="button" value="Annuler" class="btn" onclick=" annulerSaisie(<?php echo $compteur; ?>) " />
                            <input class="detailMdpButton" type="button" value="Valider" class="btn" onclick=<?php echo "ouvrirBox(".$compteur.")"; ?> />
                        </div>
                    </div>




                </div>
            </div>
            <?php
        } ?>

        
    <?php    } ?>
<?php } ?>
