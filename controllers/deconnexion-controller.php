<?php

session_start();

unset($_SESSION['login']);
$_SESSION['confirmedUser'] = false;
// On détruit la session
session_unset();
session_destroy();


// On renvoi vers la page de connexion
header('Location: /connexion');