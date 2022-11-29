<?php
require_once __DIR__ . '/db.php';

/**
 * Enregistrement d'un utilisateur dans la base de donnée
 *
 * @param string $user_login
 * @param string $user_password
 * @param string $user_email
 * @param string $user_interests
 * @return bool
 */
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

