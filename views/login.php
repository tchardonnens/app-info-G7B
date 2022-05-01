<?php 
    require_once '../views/header.php';
flash('login')
?>
<h1 class="header">Please Lgar</h1>

<form method="post" action="../controllers/users.php">
    <input type="hidden" name="type" value="login">
    <input type="text" name="name/email"  
    placeholder="Username/Email...">
    <input type="password" name="usersPwd" 
    placeholder="Password...">
    <button type="submit" name="submit">Log In</button>
</form>

<div class="form-sub-msg"><a href="./reset-password.php">Forgotten Password?</a></div>


<p><a href="index.php">Retour</a></p>