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
            <button class="btn btn-primary popUp" type="button" name="button">Ajouter les valeurs</button>
            <div class="box">

                <div class="form-wrapper">
                    <form method="post" action="#">

                        <div><?php echo $parametre ?></div>

                        <div>
                            <input id="<?php echo 'saisieParametre'.$compteur ?>" type="text" placeholder="Nouvelle valeur">

                            <select id="<?php echo 'parametre'.$compteur ?>"></select>

                        <div class="form-group divMdpButton">
                            <input class="detailMdpButton" type="submit" value="Valider" class="btn"/>
                        </div>

                    </form>
                </div>
            </div>
        <?php
        }
    } ?>
<?php } ?>
