<?php
require_once __DIR__ . '/../models/User-model.php';
session_start();

// Si la variable $_GET['confirm'] = true alors on enregistre l'utilisateur dans la base de donnée
if(isset($_GET['confirm']) && ($_GET['confirm'] == $_SESSION['keyVerify'])){
    $userModel = new UserModel();

    // On enregistre l'utilisateur créé dans la base de donnée
    $userModel->register_user($_SESSION['pending_login'], $_SESSION['pending_password'], $_SESSION['pending_email'], $_SESSION['pending_interests']);
    
    $_SESSION['confirmedUser'] = true;
    
    // On renvoi vers la page de connexion
    header('Location: /connexion');
}
// Sinon on renvoi vers la page d'envoi d'email ou d'inscription si il n'y a rien en paramètre
else {
    if($_GET != null) {

        // On génère une clé pour l'authentification
        $_SESSION['keyVerify'] = uniqid();
        // On met les valeurs des champs entrée par l'utilisateur dans des variables SESSION temporaire
        $_SESSION['pending_login'] = $_GET['login'];
        $_SESSION['pending_password'] = $_GET['password'];
        $_SESSION['pending_email'] = $_GET['email'];
        $_SESSION['pending_interests'] = $_GET['interests'];

        // On appel la page pour l'envoi du mail
        header('Location: ./email-inscription-controller.php?user_email=' . $_GET['email'] . '&key=' . $_SESSION['keyVerify']);
    }
    // Sinon on renvoi vers la page d'inscription
    else {
        // On détruit toutes les variables de SESSION temporaire
        unset($_SESSION['pending_login']);
        unset($_SESSION['pending_password']);
        unset($_SESSION['pending_email']);
        unset($_SESSION['pending_interests']);
        $_SESSION['confirmedUser'] = false;

        header('Location: /inscription');
    }
}
