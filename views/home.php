<?php 
/**
* Vue : accueil
*/
?>
<h1 id="index-text">Welcome, <?php if(isset($_SESSION['usersId'])){
        echo explode(" ", $_SESSION['usersName'])[0];
    }else{
        echo 'Guest';
    } 
    ?> </h1>
<div class="column-container">
<p>S'inscrire sur le site : <a href="index.php?cible=users&fonction=signup">Lien</a></p>
<p>Liste des utilisateurs : <a href="index.php?cible=users&fonction=list">lien</a></p>
<p>Liste des Capteurs : <a href="index.php?cible=sensors">lien</a></p>

<a href="#test" class="button lift">Test</button>
</div>