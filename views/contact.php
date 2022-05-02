<?php
include_once 'header.php'
?>

<head>
    <link rel="stylesheet" href="../styles/contact.css" />
</head>
<div class="row-container">
<div class="column-container">
    <img class="mail" src="../content/mail.png" />
    <p>Contacter l’administrateur par mail :</p>
    <p style="font-weight:bold">help@infinite-measures.com</p>
</div>
<div class="column-container">
    <img class="message" src="../content/message.png">
    <p>Contactez l'admin sur la messagerie interne</p>
    <input type="text" name="object" placeholder="Objet"></br>
    <input class="text-area" type="text" name="message" placeholder="Message"></br>
    <button>Envoyer</button>
</div>
</div>



<?php
include_once 'footer.php'
?>