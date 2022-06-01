<?php
if (!isset($_SESSION['name'])) {
    header("Location: index.php?cible=users&function=signin");
}
?>

<head>
    <link rel="stylesheet" href="./styles/profile.css" />
</head>

<h1>Modification de votre mot de passe</h1>
<div class="spacer"></div>
<div class="h-stack">
    <form class="v-stack" action="index.php?cible=users&function=change-password" method="POST">
        <?php flash('change-password') ?>
        <input type="hidden" name="type" value="change-password">
        <h2>Changer votre mot de passe :</h2>
        <label>Nouveau mot de passe</label>
        <input type="password" name="password" placeholder="Nouveau mot de passe" required />
        <div class="spacer"></div>
        <label>Nouveau mot de passe (vérification)</label>
        <input type="password" name="pwdRepeat" placeholder="Nouveau mot de passe" required />
        <div class="spacer"></div>
        <button type="submit" name="submit" class="button">Changer mon mot de passe</button>
    </form>
    <div class="v-stack">
        <img src="./content/new-icons/illustrations/working-alone.svg">
        <a href="index.php?cible=users&function=profile" class="account-link">Changer mes informations de compte</a>
    </div>

</div>