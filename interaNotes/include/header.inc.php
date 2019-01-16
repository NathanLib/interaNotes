<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
    $title = "Intera Note";?>
    <title>
        <?php echo $title ?>
    </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Own CSS -->
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-md bg-dark navbar-dark justify-content-bewteen">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php?page=0">
            <img src="image/board.png" width="75" alt="logo" title="logo">
        </a>

        <!-- Navbar text-->
        <span class="navbar-text">
            <?php echo $_SESSION['titre']; ?>
        </span>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['enseignant'])) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=1">Accueil enseignant</a>
                    </li>
                <?php } elseif (isset($_SESSION['eleve'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=10">Accueil élève</a>
                    </li>
                <?php } if(isset($_SESSION['enseignant']) || isset($_SESSION['eleve'])) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=40">Déconnexion</a>
                    </li>
                <?php } ?>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        More
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?page=20">t_ListerSujets</a>
                        <a class="dropdown-item" href="index.php?page=22">t_genSujet</a>
                        <a class="dropdown-item" href="index.php?page=23">t_saisiReponseEleve</a>
                        <a class="dropdown-item" href="index.php?page=24">t_publipostage</a>
                        <a class="dropdown-item" href="index.php?page=25">t_AffichagePourcentage</a>
                        <a class="dropdown-item" href="index.php?page=26">t_AffichagePopUp</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
