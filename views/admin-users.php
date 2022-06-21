<?php
if (!isset($_SESSION['name']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 3)) {
    header("Location: index.php?cible=users&function=signin");
}
include_once 'helpers/session_helper.php';
?>

<head>
    <link rel="stylesheet" href="./styles/admin.css" />
</head>

<h1 id="welcome-text">Gestion des utilisateurs</h1>
<div class="h-stack">
    <form class="h-stack" action="index.php?cible=users&function=search-user" method="POST">
        <?php flash('search-user') ?>
        <input type="hidden" name="type" value="search-user">
        <div class="v-stack">
            <label>Prénom</label>
            <input type="text" name="firstname" />
        </div>
        <div class="v-stack">
            <label>Nom</label>
            <input type="text" name="name" />
        </div>
        <div class="v-stack">
            <label>Email</label>
            <input type="text" />
        </div>
        <button type="submit" name="submit" class="button">Chercher</button>
    </form>

</div>