<?php
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../models/user-model.php';
session_start();


if($_GET != null) {
    $userModel = new UserModel();
    // vérifie si l'utilisateur existe
    $isUserConnected = $userModel->connect_user($_GET['login'], $_GET['password']);

    // On test si l'utilisateur est connecté
    if($isUserConnected == true){
        $_SESSION['errorConnection'] = false;
        // On récupère les infos de l'utilisateur connecté
        $userInfos = $userModel->get_user_infos($_GET['login'], $_GET['password']);

        // On stock les infos de l'utilisateur connecté dans une variable session
        $user = new User($userInfos[0]['login'], $userInfos[0]['interests'], $userInfos[0]['email']);

        $_SESSION['login'] = $user->getLogin();

        header('Location: /accueil');
    }
    // Sinon on renvoi sur la page de connexion
    else{
        $_SESSION['errorConnection'] = true;
        header('Location: /connexion');
    }
}
else {
    $_SESSION['errorConnection'] = false;
    header('Location: /connexion');
}