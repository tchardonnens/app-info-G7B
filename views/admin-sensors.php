<?php
if (!isset($_SESSION['name']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 3)) {
  header("Location: index.php?cible=users&function=signin");
}
include_once 'helpers/session_helper.php';
?>

<head>
  <link rel="stylesheet" href="./styles/admin.css" />
</head>

<h1 id="welcome-text">Gestion des capteurs</h1>
<div class="h-stack">
  <form class="h-stack" action="index.php?cible=sensors&function=search-sensor" method="POST">
    <?php flash('search-sensor') ?>
    <input type="hidden" name="type" value="search-sensor">
    <div class="v-stack">
      <label>Type de capteur</label>
      <input type="text" value="" required />
    </div>
    <button type="submit" name="submit" class="button">Chercher</button>
  </form>

</div>