<?php 
$title = 'Modification mot de passe';
require_once './inc/header.php';
?>

<main class="container container-width">
    <div class="text-center">
        <h2>Entrez votre nouveau mot de passe</h2>
    </div>
    <!-- Formulaire de connexion -->
    <form method="GET" action="./controllers/change-password-controller.php">
        <div class="form-group mt-3">
            <label for="password">Nouveau mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Valider</button>
        </div>
    </form>
</main>