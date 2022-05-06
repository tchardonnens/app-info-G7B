<?php

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "contact";
} else {
    $function = $_GET['function'];
}

switch ($function) {

    case 'challenge':
        $vue = "challenge";
        $title = "Challenge";
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "error404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('views/header.php');
include ('views/' . $vue . '.php');
include ('views/footer.php');
