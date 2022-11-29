<?php

session_start();

$_SESSION['login'] = NULL;
// On détruit la session
session_destroy();

// On renvoi vers la page de connexion
header('Location: /connexion');