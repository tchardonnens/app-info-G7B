<?php
if (!isset($_SESSION['name']) && ($_SESSION['role']==2 || $_SESSION['role']==3)) {
    header("Location: index.php?cible=users&function=signin");
}
?>

<head>
    <link rel="stylesheet" href="./styles/profile.css" />
</head>

<h1 id="welcome-text">Gestion des utilisateurs</h1>
<div class="spacer"></div>
<div class="h-stack">
    <form class="v-stack" action="index.php?cible=users&function=search-user" method="POST">
        <?php flash('search-user') ?>
        <input type="hidden" name="type" value="search-user">
        <h2>Rechercher un utilisateur :</h2>
        <label>Prénom</label>
        <input type="text" name="firstname" />
        <label>Nom</label>
        <input type="text" name="name" />
        <label>Email</label>
        <input type="text"/>
        <div class="spacer"></div>
        <button type="submit" name="submit" class="button">Chercher</button>
    </form>

</div>