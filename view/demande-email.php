<?php 
$title = 'Demande email';
require_once './inc/header.php';
?>

<main class="container container-width">
    <div class="text-center">
        <h2>Entrez l'email de votre compte</h2>
    </div>
    <!-- Formulaire de connexion -->
    <form method="GET" action="./controllers/email-request.php">
        <div class="form-group mt-3">
            <label for="email">E-mail :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Valider</button>
        </div>
    </form>
</main>