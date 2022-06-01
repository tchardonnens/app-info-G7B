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
<script src="./javascript/tabs.js"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="javascript/dataVis.js"></script>