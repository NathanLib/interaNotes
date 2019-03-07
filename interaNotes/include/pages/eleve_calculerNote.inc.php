<?php
$db = new Mypdo();

$noteManager = new NoteManager($db);
$reponseEleveManager = new ReponseEleveManager($db);
$questionManager = new QuestionManager($db);

$questions = $questionManager->getAllQuestion(1,1);//WARNING: utiliser l'idSujet de l'élève

$noteTotal=0;
?>

<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col" style="border-radius: 20px 0 0 0;">Question</th>
			<th scope="col">Présision réponse</th>
			<th scope="col">Zone de tolérance</th>
			<th scope="col">Barème</th>
			<th scope="col" style="border-radius: 0 20px 0 0;">Note</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>
				<?php foreach ($questions as $question) {
					$intitule = $question->getIntituleQuestion();?>

					<p><?php echo $intitule; ?></p>
				<?php } ?>
			</td>
			<td>
				<?php foreach ($questions as $question) {
					$idQuestion = $question->getIdQuestion();
					$reponse = $reponseEleveManager->getReponseEleveByIdQuestion($idQuestion, $_GET["id"]);
					$precision = $reponse->getPrecisionReponse();?>

					<p><?php echo $precision."%" ?></p>
				<?php } ?>
			</td>
			<td>
				<?php foreach ($questions as $question) {
					$zoneTolerance = $question->getZoneTolerance();?>

					<p><?php echo $zoneTolerance."%" ?></p>
				<?php } ?>
			</td>
			<td>
				<?php foreach ($questions as $question) {
					$bareme = $question->getBaremeQuestion();
					?>
					<p><?php echo $bareme; ?></p>
				<?php } ?>
			</td>
			<td>
				<?php foreach ($questions as $question) {
					$idQuestion = $question->getIdQuestion();
					$reponse = $reponseEleveManager->getReponseEleveByIdQuestion($idQuestion, $_GET["id"]);
					$note = $noteManager->calculerNotePourUneQuestion($question, $reponse);
					$noteTotal=$noteTotal+$note;
					?>
					<p><?php echo $note; ?></p>
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td><p>Note totale : </p></td>
			<td><p>/</p></td>
			<td><p>10</p></td>
			<td><p><?php echo $noteTotal; ?></p></td>
		</tr>
	</tbody>
</table>
