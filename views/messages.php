<?php
if (!isset($_SESSION['name'])) {
    header("Location: index.php?cible=users&function=signin"); 
}
?>

<head>
    <link rel="stylesheet" href="./styles/profile.css" />
</head>

<h1 id="welcome-text">Mes messages</h1>
<div class="spacer"></div>
<div class="h-stack">
    <p>C'est ici que vous pouvez consulter les données de votre Open Space.</p>
    <img src="./content/new-icons/illustrations/messages.svg">
</div>