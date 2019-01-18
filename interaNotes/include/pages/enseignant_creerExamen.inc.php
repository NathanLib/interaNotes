<?php require_once("include/verifEnseignant.inc.php"); ?>

<?php

$db = new Mypdo();
$eleveManager = new EleveManager($db);

$listePromo = $eleveManager->getAllPromo();

if($listePromo===false) { ?>
    <div class="msgErrorTitre">
        <h3>Erreur saisie</h3>
        <p>Il n'y a aucune promotion enregistrée</p>
    </div>

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

        <div class="row d-flex justify-content-center headCreateExam">
            <div class="col-12 col-md-4">
                <h4>Titre de l'examen : <span><?php echo $titreExamen ?></span> </h4>
            </div>
            <div class="col-12 col-md-4">
                <h4>Promotion concernée : <span><?php echo $nomPromotion ?></span> </h4>
            </div>
            <div class="col-12 col-md-4">
                <h4>Date de fin : <span><?php echo $dateLimite ?></span> </h4>
            </div>
        </div>

        <hr class="hr" style="width:80%">

        <div class="col-12 d-flex justify-content-center" id="needHelp">
            <span class="more_info" id="text_info">
                <img class="helpIcon" src="image/help.svg" alt="help" title="help">
                Besoin d'aide ?
                <div class="popup">
                </br> <h4>Comment&nbspremplir cette&nbsppage ?</h4>

                <h5> La saisie de question :</h5>
                <p id="text_info">Pour saisir une question, vous devez d'abord saisir l'intitulé de la question puis son barème. Si cette question représente 2pts sur 20, vous devez seulement saisir 2. Enfin, vous pouvez cocher la case "valeur parfaite" si vous souhaitez que l'élève doit saisir exactement la bonne réponse pour avoir les points sinon il n'aura aucun point. Dans le cas contraire, les points de l'élève dépendront de la différence entre son résultat et le résultat attentu</p>

                <h5> La saisie des valeurs :</h5>
                <p id="text_info">A chaque paramètre saisie dans l'énoncé, vous retrouverez un bouton pour ajouter les valeurs que peut prendre cette variable. Les variables peuvent prendre soit des valeurs uniques ou alors des intervalles. Pour saisir des intervalles, vous saisissez une valeur minimale et une maximale ainsi que leur puissance et un pas. Dans les deux cas, vous devez ensuite saisir l'unité (SI) de la valeur et l'exposant de cette unité.</p>
                <i>Exemple : Pour avoir un résultat en 'km', vous devez sélectionner l'unité 'm' (mètre) dans unité du résultat puis 3 dans Exposant de l'unité </i>
                <p>Vous pouvez retrouver toutes les valeurs ou intervalles déjà saisis dans la liste en dessous. Pour supprimer une ligne, vous devez la sélectionner la ligne dans la liste puis cliquer sur la poubelle.</p>
             </br>
            </div>
        </span>
    </div>

    <hr class="hr" style="width:80%">

    <div class="row enonceCreateExam">
        <div class="col-12">
            <h4>Enonce de l'examen</h4>
            <p><?php echo $texteEnonce?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h4>Liste des questions de l'examen :</h4>

            <div class="form-container">
                <fieldset>
                    <!-- Form Name -->
                    <div class="form-group" style="margin-bottom:15px;">
                        <div class="row">
                            <!-- Replace these fields -->
                            <div class="col-12 col-md-6">
                                <input type="text" name="" class="form-control intituleQuestion" placeholder="Intitulé">
                            </div>
                            <div class="col-4 col-md-2">
                                <input type="number" step="0.25" min="0" max="20" name="" class="form-control bareme" placeholder="Barème">
                            </div>
                            <div class="col-6 col-md-3" style="padding-top:8px">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="valeurParfaite">
                                    <label class="custom-control-label" for="customCheck">Valeur parfaite</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="dynamic-stuff">
                        <!-- Dynamic element will be cloned here -->
                        <!-- You can call clone function once if you want it to show it a first element-->
                        <!-- HIDDEN DYNAMIC ELEMENT TO CLONE -->
                        <!-- you can replace it with any other elements -->
                        <div class="form-group dynamic-element" style="display:none">
                            <div class="row">
                                <!-- Replace these fields -->
                                <div class="col-12 col-md-6">
                                    <input id="intituleQuestion" type="text" name="" class="form-control intituleQuestion" placeholder="Intitulé">
                                </div>
                                <div class="col-4 col-md-2">
                                    <input id="bareme" type="number" step="0.25" min="0" max="20" name="" class="form-control bareme" placeholder="Barème">
                                </div>
                                <div class="col-6 col-md-3" style="padding-top:8px">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="valeurParfaite">
                                        <label class="custom-control-label" for="customCheck">Valeur parfaite</label>
                                    </div>
                                </div>

                                <!-- End of fields-->
                                <div class="col-md-1">
                                    <p class="delete">
                                        <img class="trachIconCreateExam" src="image/trash.ico" alt="trash">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- END OF HIDDEN ELEMENT -->
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="add-one">+ ajouter une question</p>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>


    <div class="row saisieValeursParametre">
        <div class="col-12">
            <h4>Liste des paramètres de l'examen :</h4>

            <?php
            foreach ($tableauParametres as $compteur => $parametre) { ?>
                <p><?php echo $parametre ?> : </p>

                <div class="choiceParameterSaisie">
                    <button id="<?php echo "btnAjout".$compteur; ?>" class="btn btn-primary popUp" type="button" name="button" onclick="ouvrirBox(<?php echo $compteur; ?>)">Ajouter les valeurs</button>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="catia" name="catia">
                        <label class="custom-control-label" for="catia">Catia</label>
                    </div>
                </div>


                <div class="box mesParametresSaisie" id=<?php echo "box".$compteur ;?> >
                    <div class="form-wrapper">
                        <h4><?php echo $parametre ?></h4>

                        <div class="row d-flex justify-content-around choixTypesValeurs">
                            <div class="col-5 d-flex justify-content-center">
                                <input id=<?php echo "boutonUnique".$compteur ; ?> type="button" value="Valeurs Uniques" onclick="affichageSaisieValeurUnique(<?php echo $compteur; ?>)">
                            </div>

                            <div class="col-5 d-flex justify-content-center">
                                <input id=<?php echo "boutonIntervalle".$compteur ; ?> type="button" onclick="affichageSaisieIntervalle(<?php echo $compteur; ?>)" value="Intervalles">
                            </div>
                        </div>

                        <div class="blockValeurUnique" id=<?php echo "valeursUniques".$compteur ;?> style="display : none">

                            <div class="row">
                                <div class="col-12">
                                    <label for="">Nouvelle valeur :</label>
                                </div>
                                <div class="col-7">
                                    <input class="form-control" id="<?php echo 'saisieParametre'.$compteur ?>" type="text">
                                </div>
                                <div class="col-5 form-group divPuissanceResult d-flex">
                                    <span id="puissanceValeur">x10</span>
                                    <input id=<?php echo "puissanceValeur".$compteur; ?> class="form-control saisiePuissanceResult" name=<?php echo "puissanceValeur".$compteur; ?> type="number" value="0" step="1" required>

                                </div>

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

                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <input class="btnSaisieValeur" type="button" value="Valider valeur" class="btn" onclick="return ajouterValeurDeParametre(event,<?php echo "'saisieParametre".$compteur."'" ?>,<?php echo "'parametre".$compteur."'" ?>,<?php echo "'puissanceValeur".$compteur."'" ?>,<?php echo "'uniteValeur".$compteur."'" ?>,<?php echo "'exposantValeur".$compteur."'" ?>)" />
                                </div>
                            </div>

                            <div class="row d-flex justify-content-between divListeValeursTrash">
                                <div class="col-8 d-flex justify-content-center listeValeur">
                                    <select class="form-control" id="<?php echo 'parametre'.$compteur ?>" multiple></select>
                                </div>
                                <div class="col-3 d-flex jsutify-content-center">
                                    <button class="myTrash" id="<?php echo "bouton".$compteur; ?>" onclick=<?php echo "supprimerValeur(".$compteur.")"; ?> value="Supprimer">
                                        <img src="image/delete.png" alt="delete">
                                    </button>
                                </div>
                            </div>

                            <div class="row form-group divMdpButton d-flex justify-content-around">
                                <div class="col-5 d-flex justify-content-center">
                                    <input class="btnSaisieValeur" type="button" value="Annuler" class="btn" onclick=" annulerSaisie(<?php echo $compteur; ?>) " />
                                </div>
                                <div class="col-5 d-flex justify-content-center">
                                    <input class="btnSaisieValeur" type="button" value="Valider" class="btn" onclick=<?php echo "ouvrirBox(".$compteur.")"; ?> />
                                </div>
                            </div>
                        </div>

                        <div class="blockIntervalle" id=<?php echo "intervalle".$compteur ;?> style="display : none">

                            <div class="row">
                                <div class="col-12">
                                    <label for="">Nouvel intervalle :</label>
                                </div>
                                <div class="col-7">
                                    <input class="form-control" id="<?php echo 'saisieParametre'.$compteur ?>" type="text" placeholder="Valeur manimale">
                                </div>
                                <div class="col-5 form-group divPuissanceResult d-flex">
                                    <span id="puissanceValeur">x10</span>
                                    <input id=<?php echo "puissanceValeur".$compteur; ?> class="form-control saisiePuissanceResult" name=<?php echo "puissanceValeur".$compteur; ?> type="number" value="0" step="1" required>
                                </div>

                                <div class="col-7">
                                    <input class="form-control" id="<?php echo 'saisieParametre'.$compteur ?>" type="text" placeholder="Valeur maximale">
                                </div>
                                <div class="col-5 form-group divPuissanceResult d-flex">
                                    <span id="puissanceValeur">x10</span>
                                    <input id=<?php echo "puissanceValeur".$compteur; ?> class="form-control saisiePuissanceResult" name=<?php echo "puissanceValeur".$compteur; ?> type="number" value="0" step="1" required>

                                </div>

                                <div class="col-12">
                                    <input class="form-control" id="<?php echo 'saisieParametre'.$compteur ?>" type="text" placeholder="Pas">
                                </div>
                            </div>

                            <div class="form-group" style="margin-top:15px">
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

                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <input class="btnSaisieValeur" type="button" value="Valider valeur" class="btn" onclick="return ajouterValeurDeParametre(event,<?php echo "'saisieParametre".$compteur."'" ?>,<?php echo "'parametre".$compteur."'" ?>,<?php echo "'puissanceValeur".$compteur."'" ?>,<?php echo "'uniteValeur".$compteur."'" ?>,<?php echo "'exposantValeur".$compteur."'" ?>)" />
                                </div>
                            </div>

                            <div class="row d-flex justify-content-between divListeValeursTrash">
                                <div class="col-8 d-flex justify-content-center listeValeur">
                                    <select class="form-control" id="<?php echo 'parametre'.$compteur ?>" multiple></select>
                                </div>
                                <div class="col-3 d-flex jsutify-content-center">
                                    <button class="myTrash" id="<?php echo "bouton".$compteur; ?>" onclick=<?php echo "supprimerValeur(".$compteur.")"; ?> value="Supprimer">
                                        <img src="image/delete.png" alt="delete">
                                    </button>
                                </div>
                            </div>

                            <div class="row form-group divMdpButton d-flex justify-content-around">
                                <div class="col-5 d-flex justify-content-center">
                                    <input class="btnSaisieValeur" type="button" value="Annuler" class="btn" onclick=" annulerSaisie(<?php echo $compteur; ?>) " />
                                </div>
                                <div class="col-5 d-flex justify-content-center">
                                    <input class="btnSaisieValeur" type="button" value="Valider" class="btn" onclick=<?php echo "ouvrirBox(".$compteur.")"; ?> />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>


<?php    } ?>
<?php } ?>
