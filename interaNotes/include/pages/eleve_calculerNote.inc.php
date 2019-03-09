<?php
$db = new Mypdo();

$noteManager = new NoteManager($db);
$reponseEleveManager = new ReponseEleveManager($db);
$questionManager = new QuestionManager($db);

$questions = $questionManager->getAllQuestion(1,$_GET["id"]);//WARNING: utiliser l'idSujet de l'élève
$noteTotal=0;

if (!$questions) {
	echo "erreur";
}else{
	?>

	<div class="tableNotesEleve">
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
					<td style="background-color: lightgrey;"></td>
					<td style="background-color: lightgrey;"></td>
					<td>
						<?php $bareme = 0;
						foreach ($questions as $question) {
							$bareme = $bareme + $question->getBaremeQuestion();
						}?>
						<p>/<?php echo $bareme; ?></p></td>
						<td><?php echo $noteTotal; ?></td>
					</tr>
					<tr>
						<td><p>Note sur 20 : </p></td>
						<td style="background-color: lightgrey;"></td>
						<td style="background-color: lightgrey;"></td>
						<td><p>/20</p></td>
						<td><p><?php echo $noteManager->calculerNoteSur20($noteTotal, $bareme); ?></p></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php } ?>