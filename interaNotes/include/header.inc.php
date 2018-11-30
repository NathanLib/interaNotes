<?php session_start(); ?>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            Accueil
        </span>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['prof'])) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=1">Accueil enseignant</a>
                    </li>
                <?php } elseif (isset($_SESSION['eleve'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=7">Accueil élève</a>
                    </li>
                <?php } if(isset($_SESSION['prof']) || isset($_SESSION['eleve'])) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=16">Déconnexion</a>
                    </li>
                <?php } ?>
                
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            More
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?page=12">t_ListerSujets</a>
                            <a class="dropdown-item" href="index.php?page=8">t_afficherSujetPro</a>
                            <a class="dropdown-item" href="index.php?page=14">t_genSujet</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
