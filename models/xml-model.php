<?php
require_once __DIR__ . '/db.php';

class Xml {


    /**
     * Fonction qui va chercher les infos d'un flux RSS dans la base de donnée
     *
     * @param string $user_interest
     * @return boolean
     */
    public function get_rss_info(string $user_interest):bool
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

        $rssInfo = $db->prepare($sql);
        $rssInfo->bindValue(':user_interest', $user_interest);
        $rssInfo->execute();
        return true;
    }


    /**
     * Fonction qui récupère et les données du fichier xml en objet
     *
     * @param string $user_interest
     * @return void
     */
    public function get_data_from_xml(string $user_interest)
    {
        // Url du Flux RSS
        $url = $this->get_rss_info($user_interest)[0]['interests'];
        echo $url;
        // On interprète le fichier xml en objet
        $xml = simpleXML_load_file($url);
        return $xml;
    }
}