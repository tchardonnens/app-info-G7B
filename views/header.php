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
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/global-style.css">
</head>

<body>
    <header>
        <img class="image-logo" src="../content/wave-it-blue.jpg" />

        <ul>
            <a href="./home.php">Accueil</a>
            <a href="./challenge.php">Challenge</a>
            <a href="./contact.php">Contact</a>
            <a href="./questions.php">FAQ</a>
            <a href="../index.php?cible=users&fonction=signup"><img src="../content/login.png" class="sign-in-logo"/></a>
        </ul>
    </header>
    <div class="full-page">