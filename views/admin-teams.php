<?php
if (!isset($_SESSION['name']) && ($_SESSION['role']==2 || $_SESSION['role']==3)) {
    header("Location: index.php?cible=users&function=signin");
}
?>

<head>
    <link rel="stylesheet" href="./styles/profile.css" />
</head>

<h1 id="welcome-text">Gestion des équipes</h1>
<div class="spacer"></div>
<div class="h-stack">
    <form class="v-stack" action="index.php?cible=users&function=search-team" method="POST">
        <?php flash('search-team') ?>
        <input type="hidden" name="type" value="search-team">
        <h2>Rechercher une équipe :</h2>
        <label>Nom équipe</label>
        <input type="text" name="name" value="<?php echo $_SESSION['firstname'] ?>" required />
        <label>Building</label>
        <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>" required />
        <label>Etage</label>
        <input type="text" />
        <div class="spacer"></div>
        <button type="submit" name="submit" class="button">Chercher</button>
    </form>

</div>