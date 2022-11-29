<?php 
$title = 'Connexion';
require_once './inc/header.php';
?>

<main class="container container-width">
    <div class="text-center">
        <h2>Bienvenue !</h2>
    </div>
    <form method="GET" action="./controllers/connect-user.php">
        <div class="form-group mt-3">
            <label for="login">Identidiant :</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="ex : Alexandre">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Connexion</button><br>
            <a href="/inscription">S'inscrire</a>
        </div>
    </form>
</main>