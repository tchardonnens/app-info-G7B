<?php
	include_once 'header.php';
	include_once '../helpers/session_helper.php';
?>

<head>
	<link rel="stylesheet" href="../styles/signup.css" />
</head>
<?php flash('register') ?>

<form method="POST" action="../controllers/users.php" class="column-container">
	<input type="hidden" name="type" value="register">
	<h1>Inscription</h1>

	<label>Prénom :</label>
	<input type="text" name="name" placeholder="Prénom" />
	<br>

	<label>Email :</label>
	<input type="text" name="mail" placeholder="Email" />
	<br>

	<label>Mot de passe :</label>
	<input type="password" name="password" placeholder="Mot de passe" />
	<br>

	<label>Mot de passe (vérification) :</label>
	<input type="password" name="pwdRepeat" placeholder="Mot de passe à nouveau" />
	<br>
	<button type="submit" name="submit">S'inscrire</button>
</form>
<div class="spacer">

</div><a href="./signin.php" class="no-header-style">Déjà un compte ?</a>



<?php
include_once 'footer.php';
?>