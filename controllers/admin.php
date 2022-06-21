<?php

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
  $function = "home";
} else {
  $function = $_GET['function'];
}

switch ($function) {

  case 'users':
    $vue = "admin-users";
    $title = "Gestion des utilisateurs";
    break;

  case 'sensors':
    $vue = "admin-sensors";
    $title = "Gestion des équipes";
    break;

  case 'teams';
    $vue = "admin-teams";
    $title = "Gestion des capteurs";
    break;

  default:
    // si aucune fonction ne correspond au paramètre function passé en GET
    $vue = "erreur404";
    $title = "error404";
    $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('views/header.php');
include('views/' . $vue . '.php');
include('views/footer.php');
