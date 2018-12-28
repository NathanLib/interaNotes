<?php
if(isset($_SESSION['mail'])){

$mail = $_SESSION['mail']; // Déclaration de l'adresse de destination.
$passwd = $_SESSION['passwd']; //Récupération du mot de passe à insérer dans le mail

unset($_SESSION['mail']);
unset($_SESSION['passwd']);

$passage_ligne = "\n";

//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Vous avez récemment demander un nouveau mot de passe pour votre compte Intera Notes.\n
Votre mot de passe : ".$passwd."\n\n
Veuillez le modifier le plus rapidement possible, merci et à bientôt sur Intera Notes !";

$message_html = "
<html>
  <head>
  </head>
  <body>
    <h1>Demande de nouveau mot de passe</h1>
    <p>Vous avez récemment demander un nouveau mot de passe pour votre compte Intera Notes.</p>
    <p>Votre nouveau mot de passe : <b>".$passwd."</b></p>
    </br>
    <p>Veuillez le modifier le plus rapidement possible, merci et à bientôt sur Intera Notes !</p>
  </body>
</html>";
//==========

//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========

//=====Définition du sujet.
$sujet = "Mot de passe oublié";
//=========

//=====Création du header de l'e-mail.
$header = "From: \"Intera Notes\"<developpement_web@laposte.net>".$passage_ligne;
$header.= "Reply-to: \"Intera Notes\"<developpement_web@laposte.net>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========

//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========

//=====Envoi de l'e-mail.
$retour = mail($mail,$sujet,$message,$header);
//==========

//======Vérification de l'envoi
if($retour){?>
  <div>
    <h1>Mot de passe oublié ?</h1>
    <p>Un nouveau mot de passe vous a été attribué, vous le trouverez dans le mail envoyé</p>
  </div>

<?php
}else{ ?>

  <div>
    <h1>Echec de l'envoi</h1>
    <p>Un problème est survenu lors de l'envoi du mail, veuillez réessayer dans quelques minutes</p>
  </div>

<?php
}
//=========

}else{
  header('Location: index.php?page=0');
}

?>
