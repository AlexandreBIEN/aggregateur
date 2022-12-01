<?php 
$title = 'Connexion';
require_once './inc/header.php';
?>

<main class="container container-width">
    <div class="text-center">
        <?php if(isset($_SESSION['confirmedUser']) && ($_SESSION['confirmedUser'] == true)) : ?>
            <span class="text-success">Votre inscription a été validé ! veuillez désormais vous connecter à votre compte.</span>
        <?php endif; ?>
        <h2>Bienvenue !</h2>
    </div>
    <!-- Formulaire de connexion -->
    <form method="GET" action="./controllers/connect-user-controller.php">
        <div class="form-group mt-3">
            <label for="login">Identidiant :</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="ex : Alexandre">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
            <?php if(isset($_SESSION['errorConnection']) && $_SESSION['errorConnection'] == true) : ?>
                <span class="text-danger">Votre identifiant ou votre mot de passe est erroné, veuillez réessayer.</span>
                <a href="./controllers/change-password-controller.php">Mot de passe oublié</a>
            <?php endif; ?>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Connexion</button><br>
            <a href="/inscription">S'inscrire</a>
        </div>
    </form>
</main>
<?php $_SESSION['confirmedUser'] = false; ?>