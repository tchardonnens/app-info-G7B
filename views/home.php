<head>
    <link rel="stylesheet" href="./styles/home.css" />
</head>
</br>
</br>
</br>
</br>
<h1 id="index-text"><?php if(isset($_SESSION['name'])){
        echo "Welcome " . $_SESSION['name'];
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
                <img src="./content/new-icons/basic/sound.svg" />
                <p>Sonore</p>
            </div>
            <div class="element">
                <img src="./content/new-icons/basic/heart.svg" />
                <p>Rythme cardiaque</p>
            </div>
            <div class="element">
                <img src="./content/new-icons/basic/co2.svg" />
                <p>CO2</p>
            </div>
            <div class="element">
                <img src="./content/new-icons/basic/temperature.svg" />
                <p>Température</p>
            </div>
            <div class="element">
                <img src="./content/new-icons/basic/humidity.svg" />
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