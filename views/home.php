<head>
    <link rel="stylesheet" href="./styles/home.css" />
</head>
</br>
</br>
</br>
</br>
<h1 id="index-text"><?php if(isset($_SESSION['name'])){
        echo explode("Welcome ", $_SESSION['name'])[0];
    } 
    ?> </h1>
<section>
    <h1 class="texts1">
    Présentation
    </h1>
    <p class="presentation1">
    Wave IT propose une interface permettant de comprendre votre environnement.
    Grâce aux différents capteurs et à ce site, vous comprendrez votre environnement et en deviendrez le maître.
    Notre site comprend une interface ludique vous mettant en compétition avec le restant des participants pour avoir le meilleur environnement de travail.
    </p>
    <aside>
            <div class="element">
                <img src="./content/noise.png" />
                <p>Sonore</p>
            </div>
            <div class="element">
                <img src="./content/cardiac.png" />
                <p>Rythme cardiaque</p>
            </div>
            <div class="element">
                <img src="./content/co2.png" />
                <p>CO2</p>
            </div>
            <div class="element">
                <img src="./content/temperature.png" />
                <p>Température</p>
            </div>
            <div class="element">
                <img src="./content/humidity.png" />
                <p>Humidité</p>
            </div>
    </aside>
    <h1 class="texts2">
    Le Challenge
    </h1>
    <p class="presentation2">
    Leaderboard et compétition, nous allons vous faire aimer le bien-être au travail.   
    </p>
</section>