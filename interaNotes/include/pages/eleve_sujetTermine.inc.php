<?php 
$pdo = new Mypdo();

$sujetManager = new SujetManager($pdo);
$enonceManager = new EnonceManager($pdo);
$examenManager = new ExamenManager($pdo);
$noteManager = new NoteManager($pdo);

$tabSujetTerminés = $sujetManager->getSujetTermineByLogin($_SESSION['eleve']);
?>


<?php 
if (!$tabSujetTerminés){ ?>
    <div class="msgErrorTitre">
        <h3>Aucun sujet</h3>
        <p>Aucun de vos sujets sont terminés pour le moment ! </p>
    </div>
<?php } else { ?>

    <div class="listerSujet">
        <?php // WARNING: BLOC A LAISSER ?>
        <div class="row justify-content-around text-center teteListeSujet">
            <div class="col-6 col-sm-3 col-lg-2 textListeSujet">
                <p> </p>
            </div>
            <div class="col-6 col-lg-4">
                <span id="attributeTo">Note obtenue : </span>
            </div>
            <div class="col-3 col-lg-2">
            </div>
        </div>

        <?php // WARNING: BLOC A GENERER EN PHP
        foreach ($tabSujetTerminés as $sujet) { 
        	$sujetComplet = $sujetManager->getSujet($sujet);
        	?>
            <div class="row justify-content-center text-center contenuListeSujet">
                <div class="col-6 col-sm-3 col-lg-2 textListeSujet">
                    <p><?php $enonce =  $enonceManager->getEnonce($sujetComplet->getIdEnonce());
                    	echo($enonce->getTitreEnonce());
                     ?></p>
                </div>

                <?php  ?>

                <div class="col-6 col-lg-4 textListeSujet">
                    <p> <?php $note = $noteManager->getNoteByIdSujet($sujet);
                    		echo($note->getNote());
                     ?></p>
                </div>

                <div class="col-6 col-sm-3 col-lg-2 buttonConsulter">
                    <a href="index.php?page=15&amp;id=<?php echo $sujet;?>">
                        <input type="button" name="" value="Consulter">
                    </a>
                </div>
            </div>
        <?php }
    }
    ?>

</div>
?>