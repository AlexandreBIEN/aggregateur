<?php
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../models/user-model.php';

if($_GET != null) {
    $userModel = new UserModel();
    $isUserConnected = $userModel->connect_user($_GET['login'], $_GET['password']);

    if($isUserConnected == true){
        session_start();
        $userInfos = $userModel->get_user_infos($_GET['login'], $_GET['password']);

        $_SESSION['connectedUser'] = new User($userInfos[0]['login'], $userInfos[0]['interests'], $userInfos[0]['email']);

        header('Location: /accueil');
    }
    else{
        header('Location: /connexion');
    }
}
else {
    header('Location: /connexion');
}