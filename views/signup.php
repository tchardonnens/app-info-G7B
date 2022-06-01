<?php
include_once 'helpers/session_helper.php';
?>

<head>
	<link rel="stylesheet" href="styles/signup.css" />
</head>
<div class="column-container">
	<h1>Inscription</h1>
</div>

<div class="h-stack">
	<form method="POST" action="index.php?cible=users&function=signup" class="column-container">
		<?php flash('signup') ?>
		<input type="hidden" name="type" value="signup">


		<label>Prénom :</label>
		<input type="text" name="firstname" placeholder="Prénom" />
		<br>

		<label>Nom :</label>
		<input type="text" name="name" placeholder="Nom" />
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

		<button type="submit" name="submit" class="button">S'inscrire</button>

	</form>
	<div class="v-stack">
		<p>Le mot de passe doit contenir : </p>
		<ul>

			<li>Au moins 6 caractères</li>
			<li>Des lettres minuscules et MAJUSCULES</li>
			<li>Au moins 1 chiffre</li>
			<li>Au moins un caractère spécial : [@/_!]</li>

		</ul>
		<a href="index.php?cible=users&function=signin" class="spacer">Déjà un compte ?</a>
	</div>

</div>