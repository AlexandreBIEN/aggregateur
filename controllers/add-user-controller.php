<?php
require_once __DIR__ . '/../models/user-model.php';

if($_GET != null) {
    $userModel = new UserModel();
    $userModel->register_user($_GET['login'], $_GET['password'], $_GET['email'], $_GET['interests']);

    header('Location: /connexion');
}
else {
    header('Location: /inscription');
}