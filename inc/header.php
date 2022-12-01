<?php
session_start();
if(($_SERVER['REQUEST_URI'] != '/connexion') && $_SERVER['REQUEST_URI'] != '/inscription' && $_SERVER['REQUEST_URI'] != '/inscription' && $_SERVER['REQUEST_URI'] != '/modification'){
    if(!isset($_SESSION['login'])){
        header('Location: /connexion');
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Le Monde - <?= $title; ?></title>
</head>
<body class="bg-light">
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-4">
        <div class="container justify-content-start">
            <a href="/accueil"><img class="navbar-brand text-white mx-0 logo" src="../assets/img/lemondelogo.svg" alt="logo le Monde"></a>
        </div>
        <div class="container d-flex justify-content-end">
            <ul>
                <li><a href="/accueil">Accueil</a></li>
                <li><a href="/">Profil</a></li>
                <li><a href="./controllers/deconnexion-controller.php">Se déconnecter</a></li>
            </ul>
        </div>
    </nav>
</header>