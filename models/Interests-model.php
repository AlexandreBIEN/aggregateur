<?php
require_once __DIR__ . '/db.php';

class Interests {

    /**
     * Fonction qui récupère toutes les infos des intérêts dans la base de donnée
     *
     * @return self
     */
    public function get_all_interests()
    {
        $db = db_connect();

        $sql = <<<EOD
        SELECT 
            `interest_id`, 
            `category`, 
            `name`, 
            `link` 
        FROM 
            `interests`
        EOD;

        $interestStmt = $db->query($sql);
        $interests = $interestStmt->fetchAll(PDO::FETCH_ASSOC);
        return $interests;
    }

    /**
     * Fonction qui change l'intérêt l'utilisateur par le nouveau
     *
     * @param string $user_new_interest
     * @param string $user_login
     * @return boolean
     */
    public function change_user_interest(string $user_new_interest, string $user_login):bool
    {
        $db = db_connect();

        $sql = <<<EOD
        UPDATE 
            `users` 
        SET 
            `interests` = :user_new_interest
        WHERE 
            `users`.`login` = :user_login;
        EOD;

        $changePwd = $db->prepare($sql);
        $changePwd->bindValue(':user_new_interest', $user_new_interest);
        $changePwd->bindValue(':user_login', $user_login);

        $changePwd->execute();
        return true;
    }
}