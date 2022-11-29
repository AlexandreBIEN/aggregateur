<?php
require_once __DIR__ . '/../models/user-model.php';

if($_GET != null) {
    $userModel = new UserModel();
    // On enregistre l'utilisateur créé dans la base de donnée
    $userModel->register_user($_GET['login'], $_GET['password'], $_GET['email'], $_GET['interests']);

    // On renvoi vers la page de connexion
    header('Location: /connexion');
}
// Sinon on renvoi vers la page d'inscription
else {
    header('Location: /inscription');
}