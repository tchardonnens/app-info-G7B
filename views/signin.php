<?php
include_once 'helpers/session_helper.php';
?>

<head>
    <link rel="stylesheet" href="styles/signin.css" />
</head>
</br>
</br>
</br>
</br>
<div class="full-page">
    <div class="column-container">
    <?php flash('signin') ?>
        <h1 class="header">Connexion</h1>
        <form method="post" action="index.php?cible=users&function=signin" class="column-container">
            <input type="hidden" name="type" value="signin">
            <input type="text" name="mail" placeholder="Email" class="case">
            </br>
            <input type="password" name="password" placeholder="Mot de passe" class="case">
            </br>
                <button type="submit" name="submit">Connexion</button>
        </form>
        <a href="index.php?cible=users&function=signup" class="account-link">Pas encore de compte ?</a>
    </div>
</div>