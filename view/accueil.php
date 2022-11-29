<?php 
$title = 'Accueil';
require_once './inc/header.php';
$url = 'https://www.lemonde.fr/sport/rss_full.xml'; 
$xml = simpleXML_load_file($url,"SimpleXMLElement",LIBXML_NOCDATA);

// for ($i=0; $i < 10; $i++) { 
//     echo $xml->channel->item[$i]->media->url . '<br>';
//     echo $xml->channel->item[$i]->title . '<br>';
// }
// echo $xml->channel->item[0]->title;

?>

<div class="container d-flex">
    <div class="row">
    <!-- Liste des postes -->
    <?php for ($i=0; $i < 10; $i++): ?>
        <div class="col">
            <div class="card mb-4 p-4">
                <img src="https://img.lemde.fr/2022/11/20/456/0/5473/2736/644/322/60/0/42ad128_5785158-01-06.jpg" alt="image du poste" class="img-post">
                <p class="post-title font-weight-bold"><?= $xml->channel->item[$i]->title; ?></p>
                <p class="post-desc font-weight-light"><?= $xml->channel->item[$i]->description; ?></p>
                <a href="<?= $xml->channel->item[$i]->link; ?>" class="post-link">En savoir plus</a>
            </div>
        </div>
    <?php endfor; ?>
    </div>
</div>