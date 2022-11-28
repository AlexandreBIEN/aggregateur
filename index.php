<?php

// Router

if(isset($_GET['route']) && $_GET['route'] != ''){

    // Redirige vers la page inscript dans $_GET['route']
    switch ($_GET['route']) {
        case 'accueil':
            header('Location: ./view/accueil.php');
            break;
        case 'connexion':
            header('Location: ./view/connexion.php');
            break;
        case 'inscription':
            header('Location: ./view/inscription.php');
            break;
        case 'modification':
            header('Location: ./view/modification.php');
            break;
        
        default:
            header('Location: ./view/connexion.php');
            break;
    }
}
// Sinon on redirige vers la page de connexion
else{
    header('Location: ./view/connexion.php');
}