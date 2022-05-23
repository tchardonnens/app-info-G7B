<?php
include_once 'helpers/session_helper.php';
?>

<head>
    <link rel="stylesheet" href="styles/signin.css" />
</head>
</br>
</br>
</br>
<div class="full-page">
    <div class="column-container">
    <?php flash('signin') ?>
        <h1 class="header">Veuillez vous connecter</h1>

        <form method="post" action="index.php?cible=users&function=signin" class="column-container">
            <input type="hidden" name="type" value="signin">
            <input type="text" name="mail" placeholder="Email">
            </br>
            <input type="password" name="password" placeholder="Mot de passe">
            </br>
            <button type="submit" name="submit">Connexion</button>
        </form>
    </div>
</div>