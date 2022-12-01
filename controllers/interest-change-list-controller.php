<?php
require_once '../models/Interests-model.php';
$interests = new Interests();
session_start();

// On récupère tous les intérêts disponible dans la base de données
$_SESSION['interestsList'] = $interests->get_all_interests();

// On redirige vers la page de profil
header('Location: /profil');