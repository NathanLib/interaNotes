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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Own CSS -->
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-md bg-dark navbar-dark justify-content-bewteen">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="image/board.png" width="75" height="auto" alt="logo" title="logo">
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=2">Link 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=3">Afficher Sujets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=10">Lister sujets prof</a>
                </li>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        More
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#.html">Link 4</a>
                        <a class="dropdown-item" href="#.html">Link 5</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
