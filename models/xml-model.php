<?php
require_once __DIR__ . '/db.php';

class Xml {


    /**
     * Fonction qui va chercher les infos d'un flux RSS dans la base de donnée
     *
     * @param string $user_interest
     * @return self
     */
    public function get_rss_info(string $user_interest)
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
        WHERE
            `name` = :user_interest
        EOD;

        $rssStmt = $db->prepare($sql);
        $rssStmt->bindValue(':user_interest', $user_interest);
        $rssStmt->execute();
        $rssInfos = $rssStmt->fetchAll(PDO::FETCH_ASSOC);
        return $rssInfos;
    }


    /**
     * Fonction qui récupère et les données du fichier xml en objet
     *
     * @param string $user_interest
     * @return self
     */
    public function get_data_from_xml(string $user_interest)
    {
        // Url du Flux RSS
        $url = $this->get_rss_info($user_interest)[0]['link'];
        // On interprète le fichier xml en objet
        $xml = simpleXML_load_file($url);
        // var_dump($xml);
        return $xml;
    }
    
}