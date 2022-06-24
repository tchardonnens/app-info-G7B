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
    <button type="submit" name="submit">Chercher</button>
  </form>
</div>
<div class="v-stack">
  <?php
  $list
  ?>
  <ul>
    <li>
      <div class="h-stack">
      </div>
    </li>
  </ul>
  <form action="index.php?cible=sensors&function=send" method="POST">
    <input type="hidden" name="type" value="send">
    <button type="submit">Action sur la carte</button>
  </form>
  <?php
  ////////////RECUPERER LE LOG
  // initialisation de la session
  $ch = curl_init();

  // configuration des options
  curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=7506");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  // A ajouter sinon il se passe rien : https://stackoverflow.com/questions/14679886/why-does-curl-return-an-empty-string
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_VERBOSE, 1);


  $data = curl_exec($ch);

  // fermeture des ressources
  curl_close($ch);

  //echo "Raw Data:<br />";
  //echo $data;


  ///////TRANSFORMER SOUS FORME DE TABLEAU
  $data_tab = str_split($data, 33); //créer une liste avec toutes les trames
  for ($i = 0, $size = count($data_tab); $i < $size; $i++) {  //pour chaque trame mélangé
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
      sscanf($data_tab[$i], "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
  }
  echo "Dernières trames:<br />";
  for ($i = $size - 15, $size = count($data_tab); $i < $size; $i++) {
    echo "Trame $i: $data_tab[$i]<br />";
  }


  ///////DECODER LA TRAME
  $trame = $data_tab[count($data_tab) - 2];  //décodage de la trame 0
  // décodage avec des substring
  //$t = substr($trame, 0, 1);
  //$o = substr($trame, 1, 4);
  // …
  // décodage avec sscanf
  list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
  //echo ("<br />$t,$o,$r, type capteur : $c,$n, valeur : $v,$a,$x,$year,$month,$day, heure : $hour,$min,$sec<br />");


  $valeur_capteur = hexdec($v);
  echo "Dernière valeur retournée : {$v}";
  return $valeur_capteur;
  ?>
</div>