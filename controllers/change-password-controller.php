<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/User-model.php';

session_start();
$userModel = new UserModel();

// Si la variable $_GET['confirm'] = true alors on enregistre l'utilisateur dans la base de donnée
if(isset($_GET['confirm']) && $_GET['confirm'] == $_SESSION['keyVerify']){
    
    
    // On renvoi vers la page de modification du mot de passe
    header('Location: /modification');
}
// Sinon on renvoi vers la page d'envoi d'email ou de connexion si il n'y a rien en paramètre
else {
    if(isset($_SESSION['userEmailTamp']) && !empty($_SESSION['userEmailTamp'])) {
        // On génère une clé pour l'authentification
        $_SESSION['keyVerify'] = uniqid();

        // On appel la page pour l'envoi du mail
        header('Location: ./email-recuperation-mdp-controller.php?user_email=' . $_SESSION['userEmailTamp'] . '&key=' . $_SESSION['keyVerify']);
    }
    // Sinon on renvoi vers la page d'inscription
    else {
        unset($_SESSION['keyVerify']);

        // header('Location: /inscription');
    }
}