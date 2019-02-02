<?php
$db = new Mypdo();

$noteManager = new NoteManager($db);
$reponseEleveManager = new ReponseEleveManager($db);
$questionManager = new QuestionManager($db);

$question = $questionManager->getAllQuestion(1);//WARNING: utiliser l'idSujet de l'élève

$noteTotal=0;

foreach ($question as $numQuestion) {
	$idQuestion = $numQuestion->getIdQuestion();
	$reponse = $reponseEleveManager->getReponseEleveByIdQuestion($idQuestion, 1);

	$note = $noteManager->calculerNotePourUneQuestion($numQuestion, $reponse);
	$noteTotal=$noteTotal+$note;
	echo('note de la question '.$idQuestion.' : '.$note);
	?>
	<br>
	<?php
}
echo($noteTotal);
?>
