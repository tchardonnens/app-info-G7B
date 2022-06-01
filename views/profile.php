<?php
if (!isset($_SESSION['name'])) {
    header("Location: index.php?cible=users&function=signin");
}
?>

<head>
    <link rel="stylesheet" href="./styles/profile.css" />
</head>

<h1 id="welcome-text">Bonjour <?php echo $_SESSION['firstname'] ?> 👋</h1>
<div class="spacer"></div>
<div class="h-stack">
    <form class="v-stack" action="index.php?cible=users&function=profile" method="POST">
        <h2>Vos informations :</h2>
        <label>Prénom</label>
        <input type="text" value="<?php echo $_SESSION['firstname'] ?>" required />
        <label>Nom</label>
        <input type="text" value="<?php echo $_SESSION['name'] ?>" required />
        <label>Email</label>
        <input type="text" value="<?php echo $_SESSION['mail'] ?>" required />
        <div class="spacer"></div>
        <button type="submit" name="submit" class="button">Sauvegarder</button>
    </form>
    <div class="v-stack">
        <img src="./content/new-icons/illustrations/working-alone.svg">
        <a href="index.php?cible=users&function=change-password" class="account-link">Changer mon mot de passe</a>
    </div>

</div>