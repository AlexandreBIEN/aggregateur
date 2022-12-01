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
}