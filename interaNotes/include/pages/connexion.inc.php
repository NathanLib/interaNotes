<?php
if (isset($_SESSION['eleve'])){
   header('Location: index.php?page=7');
} elseif (isset($_SESSION['enseignant'])) {
  header('Location: index.php?page=1');
}

echo "dumbledore : ".createProtectedPassword("dumbledore");
echo "<br>";
echo "charente : ".createProtectedPassword("charente");

if(empty($_POST['mdp'])) { ?>
    <div class="row justify-content-center contenuConnexion">
        <div class="col-9 col-md-6">
            <div class="row justify-content-center">
                <div class="col-sm-5 logoConnexion">
                    <img class="logoConnexion" src="image/board.png" alt="logo" title="logo">
                </div>
                <div class="col-sm-7 text-center interaNoteConnexion">
                    <h2>Intera Note</h2>
                </div>
            </div>

            <!--<form action="#" method="post">-->
                <form action="index.php?page=0" method="post">
                    <div class="row">
                        <div class="col-12">
                            <input class="inputConnexion" type="text" name="login" placeholder="Identifiant" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input class="inputConnexion" type="password" name="mdp" placeholder="Mot de passe" required>
                        </div>
                    </div>

                    <div class="row buttonConnexion">
                        <div class="col-7">
                            <input type="submit" name="submit" value="Connexion">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } else {

     $db = new Mypdo();
     $personneManager = new PersonneManager($db);

     $log = $personneManager->connexion($_POST['login'],createProtectedPassword($_POST['mdp']));

     switch ($log) {
         case "erreurConnexion":
         ?>
         <div class="row justify-content-center contenuConnexion">
            <div class="col-9 col-md-6">
                <div class="row justify-content-center">
                    <div class="col-sm-5 logoConnexion">
                        <img class="logoConnexion" src="image/board.png" alt="logo" title="logo">
                    </div>
                    <div class="col-sm-7 text-center interaNoteConnexion">
                        <h2>Intera Note</h2>
                    </div>
                </div>

                <!--<form action="#" method="post">-->
                    <form action="index.php?page=0" method="post">
                        <p><img src="image/erreur.png" alt="Erreur" title="Erreur" /> Login / Mot de passe incorrect</p>
                        <div class="row">
                            <div class="col-12">
                                <input class="inputConnexion" type="text" name="login" placeholder="Identifiant" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input class="inputConnexion" type="password" name="mdp" placeholder="Mot de passe" required>
                            </div>
                        </div>

                        <div class="row buttonConnexion">
                            <div class="col-7">
                                <input type="submit" name="submit" value="Connexion">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <?php
            break;

            case "eleve":
            $_SESSION['eleve']=$_POST['login'];
            header('Location: index.php?page=7');
            break;

            case "enseignant":
            $_SESSION['enseignant']=$_POST['login'];
            header('Location: index.php?page=1');
            break;

            default:
            header('Location: index.php?page=0');
            break;
        }
    } ?>
