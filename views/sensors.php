<?php
if (!isset($_SESSION['name'])) {
    header("Location: index.php?cible=users&function=signin");
}
include_once 'helpers/session_helper.php';
?>

<head>
    <link rel="stylesheet" href="./styles/sensors.css" />
</head>

<h1 id="welcome-text">Mes données</h1>
<div class="spacer"></div>

<ul id="tabs" class="tabs">
    <li class="selected"><a id="tab_1" href="#tab_1">Bruit</a></li>
    <li><a id="tab_2" href="#tab_2">Rythme Cardiaque</a></li>
    <li><a id="tab_3" href="#tab_3">CO2</a></li>
    <li><a id="tab_4" href="#tab_4">Température</a></li>
    <li><a id="tab_5" href="#tab_5">Humidité</a></li>
</ul>
<div id="contents">
    <div id="content_1" class="content visual">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="noiseChart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
    <div id="content_2" class="content">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="heartChart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
    <div id="content_3" class="content">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="co2Chart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
    <div id="content_4" class="content">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="tempChart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
    <div id="content_5" class="content">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="humidityChart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>

</div>
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

echo "Raw Data:<br />";
echo $data;


///////TRANSFORMER SOUS FORME DE TABLEAU
$data_tab = str_split($data, 33); //créer une liste avec toutes les trames
for ($i = 0, $size = count($data_tab); $i < $size; $i++) {  //pour chaque trame mélangé
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($data_tab[$i], "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
}
echo "Tabular Data:<br />";
for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
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
echo $v;
return $valeur_capteur;
?>
<script src="./javascript/tabs.js"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="javascript/dataVis.js"></script>