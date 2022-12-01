<?php
require_once __DIR__ . '/../models/User-model.php';
require_once __DIR__ . '/../models/Interests-model.php';
session_start();

$interests = new Interests();

// On change l'intérêt de l'utilisateur par le nouveau
$interests->change_user_interest($_GET['interests'], $_SESSION['login']);

// On redirige vers la page d'accueil
header('Location: ./accueil-controller.php');