<?php
error_reporting(E_ALL ^ E_NOTICE);  
session_start(); 
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/global-style.css">
</head>

<body>
    <header>
        <img class="image-logo" src="content/infinite.png" />

        <ul>
            <a href="index.php?cible=infos&function=home">Accueil</a>
            <?php if(isset($_SESSION['name'])){
                echo '<a href="index.php?cible=challenge&function=challenge">Challenge</a>';
                echo '<a href="index.php?cible=users&function=sensors">Capteurs</a>';

            }
            ?>
            <a href="index.php?cible=infos&function=contact">Contact</a>
            <a href="index.php?cible=infos&function=questions">FAQ</a>
            <?php if(isset($_SESSION['name'])){
                echo '<a href="index.php?cible=users&function=logout">Déconnexion</a>';
            }else{
                echo '<a href="index.php?cible=users&function=signin">Se connecter</a>';
                echo '<a href="index.php?cible=users&function=signup">S\'inscrire</a>';
            } 
            ?>
            

        </ul>
    </header>
    <div class="full-page">
