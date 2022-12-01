<?php 
$title = 'Inscription';
require_once './inc/header.php';
?>

<main class="container container-width">
    <!-- Création compte utilisateur -->

    <h2 class="text-center">Création d'un compte :</h2>

    <!-- Formulaire d'inscription -->
    <form method="GET" action="./controllers/add-user-controller.php">
        <div class="form-group">
            <label for="login">Identidiant :</label>
            <input required type="text" class="form-control" id="login" name="login" placeholder="ex : Alexandre">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input required type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
        </div>
        <div class="form-group">
            <label for="email">E-mail :</label>
            <input required type="email" class="form-control" id="email" name="email" placeholder="ex : exemple@gmail.com">
        </div>
        <div class="form-group">
            <label for="interests">Intérêt(s) :</label>
            <input required type="text" class="form-control" id="interests" name="interests" placeholder="ex : Rugby">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Créer le compte</button><br><br>
            <a href="/connexion">Retour</a>
        </div>
    </form>
</main>