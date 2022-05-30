<?php
if (!isset($_SESSION['name'])) {
    header("Location: index.php?cible=users&function=signin"); 
}
?>

<head>
    <link rel="stylesheet" href="./styles/profile.css" />
</head>

<h1 id="welcome-text"><?php if (isset($_SESSION['name'])) {
                        echo explode("Welcome ", $_SESSION['name'])[0];
                    }
                    ?> </h1>
<div class="spacer"></div>
<div class="h-stack">
    <p>C'est ici que vous pouvez modifier les informations de votre profil.</p>
    <img src="./content/new-icons/illustrations/working-alone.svg">
</div>