<?php require_once("include/verifEnseignant.inc.php"); ?>

<div class="row createExam">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="row">
            <div class="col-12 form-group">
                <label for="classExam">Promotion :</label>
                <select class="form-control" id="classExam">
                    <option>Première année</option>
                </select>
            </div>

            <div class="col-12 form-group">
                <label for="endExam">Date de fin :</label>
                <input class="form-control" id="endExam" name="endExam" type="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" min='<?php echo date('Y-m-d');?>' placeholder="DD/MM/YYYY" required/>
            </div>

            <div class="col-12 form-group">
                <label for="nameExam">Titre de l'examen :</label>
                <input class="form-control" id="nameExam" type="text" placeholder="" maxlength="50" required>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8">
        <div class="row">
            <div class="col-12 form-group">
                <label for="enonceExam">Enoncé :</label>
                <textarea class="form-control" id="ennonceExam" name="ennonceExam" onkeyup="adjustHeightTextArea(this)" placeholder='Veuillez écrire vos variables de la manière suivante : [["maVariable"]]' maxlength="65535"></textarea>
            </div>
        </div>
    </div>
</div>
