<?php
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../models/user-model.php';

session_start();
$userModel = new UserModel();
$userInfos = $userModel->get_user_info($_SESSION['userLoginTamp']);

// Si la variable $_GET['confirm'] = true alors on enregistre l'utilisateur dans la base de donnée
if(isset($_GET['confirm']) && $_GET['confirm'] == $_SESSION['keyVerify']){
    
    
    // On renvoi vers la page de modification du mot de passe
    header('Location: /modification');
}
// Sinon on renvoi vers la page d'envoi d'email ou de connexion si il n'y a rien en paramètre
else {
    if(isset($_SESSION['userLoginTamp'])) {
        $userInfos = $userModel->get_user_info($_SESSION['userLoginTamp']);
        // On génère une clé pour l'authentification
        $_SESSION['keyVerify'] = uniqid();

        // On appel la page pour l'envoi du mail
        header('Location: ./email-recuperation-mdp-controller.php?user_email=' . $userInfos[0]['email'] . '&key=' . $_SESSION['keyVerify']);
    }
    // Sinon on renvoi vers la page d'inscription
    else {
        $_SESSION['keyVerify'] = "";

        header('Location: /connexion');
    }
}