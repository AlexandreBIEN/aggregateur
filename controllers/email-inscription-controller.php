<?php
    // Expéditeur du mail
    $from = "confirmation@lemonde.fr";
    // Destinataire du mail
    $to = $_GET['user_email'];
    // Sujet du mail
    $subject = "Confirmation d'inscription, journal Le Monde";
    // Contenu du mail
    $message = "Si vous êtes à l'origine de cette inscription, veuillez cliquer sur le lien suivant pour continuer : http://aggregateur.test/controllers/add-user-controller.php?confirm=true";
    // Informations de l'expéditeur
    $headers = "De :" . $from;
    // Création et envoi du mail
    mail($to, $subject, $message, $headers);
    header('Location: /verification/inscription');