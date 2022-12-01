<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/user-model.php';
session_start();

if($_GET != null) {
    $userModel = new UserModel();
    
    $userModel->change_user_password($_GET['password'], $_SESSION['userLoginTamp']);
    header('Location: /connexion');
}
else {
    $_SESSION['errorConnection'] = false;
    header('Location: /connexion');
}