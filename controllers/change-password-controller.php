<?php
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../models/user-model.php';

session_start();

// Si la variable $_GET['confirm'] = true alors on enregistre l'utilisateur dans la base de donnée
if(isset($_GET['confirm']) && $_GET['confirm'] == $_SESSION['keyVerify']){



    // On renvoi vers la page de modification du mot de passe
    header('Location: /modification');
}
// Sinon on renvoi vers la page d'envoi d'email ou de connexion si il n'y a rien en paramètre
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
        header('Location: ./email-recuperation-mdp-controller.php?user_email=' . $_GET['email'] . '&key=' . $_SESSION['keyVerify']);
    }
    // Sinon on renvoi vers la page d'inscription
    else {
        $_SESSION['keyVerify'] = "";

        header('Location: /connexion');
    }
}