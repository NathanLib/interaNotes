<?php require_once("include/verifEnseignant.inc.php"); ?>

<?php
$pdo = new Mypdo();
$examenManager = new ExamenManager($pdo);

$listeExamens = $examenManager->getAllExamens();
$listeExamensAttribues = $examenManager->getAllExamensAttribues();

if (!$listeExamens){ ?>
    <div class="msgErrorTitre">
        <h3>Erreur examen</h3>
        <p>Aucun examen n'a été créé pour l'instant !</p>
    </div>
<?php } else {
    if(isset($_GET['selection'])){
        $_SESSION['examen'] = $examenManager->getExamen($_GET['selection']);
    }
    ?>

    <div class="listerSujet">
        <h4 style="text-align:center">Liste de mes examens : </h4>
        <hr style="width:80%">

        <?php // WARNING: BLOC A GENERER EN PHP
        foreach ($listeExamens as $compteur=>$examen) {
            $examenEstAttribue = in_array($examen->getIdExamen(), $listeExamensAttribues);
            $statutExamen = $examen->getStatut($examenEstAttribue);

            $classExamen = ($examen->getIdExamen() === $_SESSION['examen']->getIdExamen()) ? "examenSelection" : ""; ?>

            <div class="row justify-content-center text-center <?php echo $classExamen ?>">
                <!-- Numero examen -->
                <div class="col-6 col-sm-3 col-lg-2">
                    <p>Examen n°<?php echo $compteur +1 ?></p>
                </div>

                <!-- statut -->
                <div class="col-6 col-lg-4">
                    <p> <?php echo $statutExamen; ?></p>
                </div>

                <div class="boutonsListerSujetProf">
                    <!-- Actions examen : bouton 'consulter un examen'-->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <a href="#">
                            <input type="button" name="" value="Consulter">
                        </a>
                    </div>

                    <!-- Actions examen : bouton 'consulter un examen'-->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <?php
                        switch($statutExamen){
                            case StatutExamen::EN_COURS: ?>
                            <div class="">
                                <a href="index.php?page=5&amp;selection=<?php echo $examen->getIdExamen() ?>">
                                    <input type="button" name="" value="Sélectionner">
                                </a>
                            </div>
                            <?php break; ?>

                            <?php
                            case StatutExamen::TERMINE: ?>
                            <div class="">
                                <a href="#">
                                    <input type="button" name="" value="Voir les résultats">
                                </a>
                            </div>
                            <?php break; ?>

                            <?php
                            case StatutExamen::NON_DISTRIBUE: ?>
                            <div class="">
                                <a href="#">
                                    <input type="button" name="" value="Commencer">
                                </a>
                            </div>
                            <?php break; ?>

                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
        <?php }
    }
    ?>

</div>
