<?php
if (!isset($_SESSION['name'])) {
    header("Location: index.php?cible=users&function=signin");
}
?>

<head>
    <link rel="stylesheet" href="./styles/sensors.css" />
</head>

<h1 id="welcome-text"><?php if (isset($_SESSION['name'])) {
                            echo explode("Welcome ", $_SESSION['name'])[0];
                        }
                        ?> </h1>
<div class="spacer"></div>

<ul id="tabs" class="teste">
    <li class="selected"><a id="noise" href="#noise">Bruit</a></li>
    <li><a id="heart" href="#heart">Rythme Cardiaque</a></li>
    <li><a id="co2" href="#co2">CO2</a></li>
    <li><a id="tempe" href="#temp">Température</a></li>
    <li><a id="humidity" href="#humidity">Humidité</a></li>
</ul>
<div id="contents">
    <div id="noise" class="content visual">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="noiseChart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
    <div id="heart" class="content">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="heartChart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
    <div id="co2" class="content">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="co2Chart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
    <div id="temperature" class="content">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="tempChart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
    <div id="humidity" class="content">
        <div class="h-stack">
            <div class="chart-container">
                <canvas id="humidityChart"></canvas>
            </div>
        </div>
        <div class="spacer"></div>
    </div>

</div>
<script src="./javascript/tabs.js"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="javascript/dataVis.js"></script>