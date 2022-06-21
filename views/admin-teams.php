<?php
if (!isset($_SESSION['name']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 3)) {
    header("Location: index.php?cible=users&function=signin");
}
include_once 'helpers/session_helper.php';
?>

<head>
    <link rel="stylesheet" href="./styles/admin.css" />
</head>

<h1 id="welcome-text">Gestion des équipes</h1>
<div class="h-stack">
    <form class="h-stack" action="index.php?cible=users&function=search-team" method="POST">
        <?php flash('search-team') ?>
        <input type="hidden" name="type" value="search-team">
        <div class="v-stack">
            <label>Nom équipe</label>
            <input type="text" value="" />
        </div>
        <div class="v-stack">
            <label>Bâtiment</label>
            <input type="text" value="" />
        </div>
        <div class="v-stack">
            <label>Etage</label>
            <input type="text" />
        </div>
        <button type="submit" name="submit" class="button">Chercher</button>
    </form>

</div>