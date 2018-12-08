<?php if (empty($_POST["publi"])) {
    ?>
    <form class="" action="#" method="post">
        <label for="enonceExam">Enoncé :</label>
        <textarea class="form-control" id="ennonceExam"  onkeyup="adjustHeightTextArea(this)" name="publi" placeholder='Veuillez écire vos variables de la manière suivante : [["maVariable"]]' maxlength="65535"></textarea>

        <input type="submit" name="" value="click">
    </form>
    <?php
}
else {
    $contenu = $_POST["publi"];
    echo $contenu;

    preg_match_all( '#\$(\w++)\$#', $contenu, $extraction );

    var_dump($extraction);
}?>
