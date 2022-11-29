<?php
require_once __DIR__ . '/../models/user-model.php';

if($_GET != null) {
    $userModel = new UserModel();
    $isUserConnected = $userModel->connect_user($_GET['login'], $_GET['password']);

    if($isUserConnected == true){
        header('Location: /accueil');
    }
    else{
        header('Location: /connexion');
    }
}
else {
    header('Location: /connexion');
}