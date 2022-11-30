<?php

// Router

if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != ''){

    // Redirige vers la page inscript dans $_SERVER['REQUEST_URI']
    switch ($_SERVER['REQUEST_URI']) {
        case '/accueil':
            require_once __DIR__ . '/view/accueil.php';
            break;
        case '/connexion':
            require_once __DIR__ . '/view/connexion.php';
            break;
        case '/inscription':
            require_once __DIR__ . '/view/inscription.php';
            break;
        case '/verification/inscription':
            require_once __DIR__ . '/view/email-inscription.php';
            break;
        case '/modification':
            require_once __DIR__ . '/view/modification.php';
            break;
        
        default:
        require_once __DIR__ . '/view/connexion.php';
            break;
    }
}
// Sinon on redirige vers la page de connexion
else{
    require_once __DIR__ . '/view/connexion.php';
}