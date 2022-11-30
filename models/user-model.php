<?php
require_once __DIR__ . '/db.php';

class UserModel {

    /**
     * Enregistrement d'un utilisateur dans la base de donnée
     *
     * @param string $user_login
     * @param string $user_password
     * @param string $user_email
     * @param string $user_interests
     * @return bool
     */
    public function register_user(string $user_login, string $user_password, string $user_email, string $user_interests):bool
    {
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


    /**
     * Fonction qui vérifie si le compte existe
     *
     * @param string $user_login
     * @param string $user_password
     * @return boolean
     */
    public function connect_user(string $user_login, string $user_password):bool
    {
        $db = db_connect();

        $sql = <<<EOD
            SELECT 
                `login`, 
                `password` 
            FROM 
                `users` 
            WHERE 
                `login` = :user_login
            AND 
                `password` = :user_password
        EOD;
        $userConnect = $db->prepare($sql);
        $userConnect->bindvalue(':user_login', $user_login);
        $userConnect->bindvalue(':user_password', $user_password);
        $userConnect->execute();


        $userConnected = $userConnect->fetchAll(PDO::FETCH_ASSOC);

        if($userConnected != NULL) {
            return true;
        }
        else {
            return false;
        }
    }


    /**
     * Fonction qui récupère les informations de l'utilisateur ayant le même identifiant et mot de passe que renseigné en paramètre
     *
     * @param string $user_login
     * @param string $user_password
     * @return void
     */
    public function verify_user_infos(string $user_login, string $user_password)
    {
        $db = db_connect();

        $sql = <<<EOD
        SELECT 
            `user_id`,
            `login`, 
            `password`,
            `email`,
            `interests`
        FROM 
            `users`
        WHERE
            `login` = :user_login 
        AND
            `password` = :user_password
        EOD;

        $userStmt = $db->prepare($sql);
        $userStmt->bindvalue(':user_login', $user_login);
        $userStmt->bindvalue(':user_password', $user_password);

        $userStmt->execute();
        $user = $userStmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    /**
     * Fonction qui change le mot de passe de l'utilisateur par le nouveau
     *
     * @param string $user_new_password
     * @param string $user_login
     * @return boolean
     */
    public function change_user_password(string $user_new_password, string $user_login):bool
    {
        $db = db_connect();

        $sql = <<<EOD
        UPDATE 
            `users` 
        SET 
            `password` = :user_new_password 
        WHERE 
            `users`.`login` = :user_login;
        EOD;

        $changePwd = $db->prepare($sql);
        $changePwd->bindValue(':user_new_password', $user_new_password);
        $changePwd->bindValue(':user_login', $user_login);

        $changePwd->execute();
        return true;
    }
}