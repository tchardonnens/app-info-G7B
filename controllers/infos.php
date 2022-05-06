<?php

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "home";
} else {
    $function = $_GET['function'];
}

switch ($function) {

    case 'home':
        $vue = "home";
        $title = "Accueil";
        break;
    
    case 'contact':
        $vue = "contact";
        $title = "Contact";
        break;

    case 'questions':
        $vue = "questions";
        $title = "FAQ";
        break;
        
    case 'legal':
        $vue = "legal";
        $title = "Mentions Légales";
        break;

    case 'help':
        $vue = "help";
        $title = "Aide";
        break;
        
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('views/header.php');
include ('views/' . $vue . '.php');
include ('views/footer.php');
