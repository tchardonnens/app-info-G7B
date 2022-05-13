<head>
    <link rel="stylesheet" href="./styles/home.css" />
</head>
<h1 id="index-text"><?php if(isset($_SESSION['name'])){
        echo explode("Welcome ", $_SESSION['name'])[0];
    } 
    ?> </h1>
<section>
    <div class="texts">
    <h1>Présentation</h1>
    <p class="presentation">
    Wave IT propose une interface permettant de comprendre votre environnement.
    Grâce aux différents capteurs et à ce site, vous comprendrez votre environnement et en deviendrez le maître.
    Notre site comprend une interface ludique vous mettant en compétition avec le restant des participants pour avoir le meilleur environnement de travail.
    </p>
        </div>
    <aside>
        <div class="mesures">
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
        </div>
    </aside>
    <div class="texts">
    <h1>Le Challenge</h1>
    <p class="presentation">
    Leaderboard et compétition, nous allons vous faire aimer le bien-être au travail.   
    </p>
    </div>
</section>