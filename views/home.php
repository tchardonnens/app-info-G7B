<?php 
    include_once 'header.php'
?>

<head>
    <link rel="stylesheet" href="../styles/home.css" />
</head>
<h1 id="index-text" >Welcome <?php if (isset($_SESSION['usersId'])) {
                                    echo explode(", ", $_SESSION['usersName'])[0];
                                } else {
                                    echo '';
                                }
                                ?> </h1>
<section>
    <article>
        <img src="../content/wave-it-white.png" />
    </article>

    <aside>
        <div class="mesures">
            <div class="element">
                <img src="../content/noise.png" />
                <p>Sonore</p>
                </br></br></br></br>
                <img src="../content/cardiac.png" />
                <p>Rythme cardiaque</p>
            </div>

            <div class="element">
                <img src="../content/co2.png" />
                <p>CO2</p>
            </div>

            <div class="element">
                <img src="../content/temperature.png" />
                <p>Température</p>
                </br></br></br></br>
                <img src="../content/humidity.png" />
                <p>Humidité</p>
            </div>
        </div>
    </aside>
</section>
<article id="text">
    <p>
        Wave IT propose une interface permettant de comprendre votre environnement.
        Grâce aux différents capteurs et à ce site, vous comprendrez votre environnement et en deviendrez le maître.
        Notre site comprend une interface ludique vous mettant en compétition avec le restant des participants pour avoir le meilleur environnement de travail.
    </p>
</article>
<article id="Challenge">

</article>

<?php 
    include_once 'footer.php'
?>