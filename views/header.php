<?php

/**
 * Vue : entête HTML
 */
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <header>
        <div class="header">
            <nav class="header-navbar">
                <ul>
                    <img src="content/Infinite_measures.gif" alt="">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php?cible=utilisateurs&fonction=inscription">Inscription</a></li>
                    <li><a href="index.php?cible=utilisateurs&fonction=liste">Utilisateurs</a></li>
                    <li><a href="index.php?cible=capteurs">Capteurs</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1><?php echo $title; ?></h1>