<?php
include_once 'header.php';
include_once './helpers/session_helper.php';
?>

<head>
    <link rel="stylesheet" href="../styles/signin.css" />
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
</div>
</div>

<?php
include_once 'footer.php'
?>