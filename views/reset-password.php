
<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
?>

<head>
    <link rel="stylesheet" href="../styles/reset-passwords.css" />
</head>
    <div class="column-container">
    <h1 class="header">Mot de passe oublié</h1>

    <form method="post" action="../controllers/resetPasswords.php">
        <input type="hidden" name="type" value="send" />
        <input type="text" name="usersEmail" placeholder="Email...">
        <button type="submit" name="submit">Receive Email</button>
    </form>
    </div>
    
<?php 
    include_once 'footer.php'
?>