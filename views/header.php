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

    <script>
        /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    <header>
        <a href="http://localhost/app-info-G7B/index.php?cible=infos&function=home"><img class="image-logo" src="content/infinite.png" /></a>

        <ul>
            <a href="index.php?cible=infos&function=home">Accueil</a>
            <?php if (isset($_SESSION['name'])) {
                echo '<a href="index.php?cible=challenge&function=challenge">Challenge</a>';
                echo '<a href="index.php?cible=users&function=sensors">Mes Données</a>';
            }
            ?>
            <a href="index.php?cible=infos&function=contact">Contact</a>
            <a href="index.php?cible=infos&function=questions">FAQ</a>
            <?php if (isset($_SESSION['name'])) {
                echo '<a href="index.php?cible=users&function=logout">Déconnexion</a>';
            } else {
                echo '<a href="index.php?cible=users&function=signin">Se connecter</a>';
                echo '<a href="index.php?cible=users&function=signup">S\'inscrire</a>';
            }
            ?>


        </ul>
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">Dropdown</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="index.php?cible=infos&function=contact">Home</a>
                <a href="index.php?cible=infos&function=contact">About</a>
                <a href="index.php?cible=infos&function=contact">Contact</a>
            </div>
        </div>
    </header>
    <div class="full-page">