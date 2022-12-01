<?php 
$title = 'Accueil';
require_once './inc/header.php';
// Url du Flux RSS
$url = 'https://www.lemonde.fr/sport/rss_full.xml';
// On interprète le fichier xml en objet
$xml = simpleXML_load_file($url);
?>

<div class="container d-flex">
    <div class="row">
    <!-- Liste des postes -->
    <?php for ($i=0; $i < 10; $i++): ?>
        <div class="col">
            <div class="card mb-4 p-4">
                <!-- Image du poste -->
                <img src="<?= $xml->channel->item[$i]->children('media', true)->content->attributes()->url?>" alt="image du poste" class="img-post">
                <!-- Titre du poste -->
                <p class="post-title font-weight-bold"><?= $xml->channel->item[$i]->title; ?></p>
                <!-- Description du poste -->
                <p class="post-desc font-weight-light"><?= $xml->channel->item[$i]->description; ?></p>
                <a href="<?= $xml->channel->item[$i]->link; ?>" class="post-link">En savoir plus</a>
            </div>
        </div>
    <?php endfor; ?>
    </div>
</div>