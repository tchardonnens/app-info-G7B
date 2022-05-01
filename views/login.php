<?php
include_once 'header.php'
?>

<head>
    <link rel="stylesheet" href="../styles/login.css" />
</head>

<div class="full-page">
<div class="column-container">
    <h1 class="header">Veuillez vous connecter</h1>

    <form method="post" action="../controllers/users.php" class="column-container">
        <input type="hidden" name="type" value="login">
        <input type="text" name="email" placeholder="Email">
        </br>
        <input type="password" name="password" placeholder="Mot de passe">
        </br>
        <button type="submit" name="submit">Connexion</button>
    </form>
    <div class="spacer"></div>
    <a href="./reset-password.php" class="no-header-style">Mot de passe oublié ?</a>

    <p><a href="home.php" class="no-header-style">Retour</a></p>
</div>
</div>

<?php
include_once 'footer.php'
?>