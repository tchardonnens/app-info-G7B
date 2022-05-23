<?php
include_once 'helpers/session_helper.php';
?>

<head>
	<link rel="stylesheet" href="styles/signup.css" />
</head>
</br>
</br>
</br>
</br>
<form method="POST" action="index.php?cible=users&function=signup" class="column-container">
	<?php flash('signup') ?>
	<input type="hidden" name="type" value="signup">
	<h1>Inscription</h1>

	<label>Prénom :</label>
	<input type="text" name="name" placeholder="Prénom" />
	<br>

	<label>Email :</label>
	<input type="text" name="mail" placeholder="Email" />
	<br>

	<label>Mot de passe :</label>
	<input type="password" name="password" placeholder="Mot de passe" />
	<p>Le mot de passe doit avoir une majuscule, un chiffre et un caractère spécial</p>
	<label>Mot de passe (vérification) :</label>
	<input type="password" name="pwdRepeat" placeholder="Mot de passe à nouveau" />
	<br>
	<button type="submit" name="submit">S'inscrire</button>
</form>
<div class="spacer">

</div><a href="index.php?cible=users&function=signin" class="no-header-style">Déjà un compte ?</a>