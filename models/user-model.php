<?php
require_once __DIR__ . '/db.php';

/***************************************************************************
Enregistrement d'un utilisateur : requête paramétrée
utilisation de la méthode prépare avec des paramètres nommés.
************************************************************************** */
function register_user($user_login, $user_password, $user_email, $user_interests){
    $db = db_connect();

    $sql = <<<EOD
    INSERT 
    INTO 
        `users` (`login`, `password`, `email`, `interests`) 
    VALUES 
        (:user_login, :user_password , :user_email, :user_interests)
    EOD;
    $userInfoStmt = $db->prepare($sql);
    $userInfoStmt->bindValue(':user_login', $user_login);
    $userInfoStmt->bindValue(':user_password', $user_password);
    $userInfoStmt->bindValue(':user_email', $user_email);
    $userInfoStmt->bindValue(':user_interests', $user_interests);

    $userInfoStmt->execute();

    return true;
}

