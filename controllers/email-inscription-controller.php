<?php
    // Expéditeur du mail
    $from = "confirmation@lemonde.fr";
    // Destinataire du mail
    $to = $_GET['user_email'];
    // Sujet du mail
    $subject = "Confirmation d'inscription, journal Le Monde";
    // Contenu du mail
    $message = "Si vous êtes à l'origine de cette inscription, veuillez cliquer sur le lien suivant pour continuer. Sinon ignorez ce mail : http://aggregateur.test/controllers/add-user-controller.php?confirm=". $_GET['key'];
    // Informations de l'expéditeur
    $headers = "De :" . $from;
    // Création et envoi du mail
    mail($to, $subject, $message, $headers);
    header('Location: /verification/inscription');