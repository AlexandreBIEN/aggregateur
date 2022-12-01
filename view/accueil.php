<?php 
$title = 'Accueil';
require_once './inc/header.php';
// Url du Flux RSS
$urlXmlo = $_SESSION['xmlo'];
// On interprète le fichier xml en objet
$xmlo = simpleXML_load_file($urlXmlo);
?>

<div class="container d-flex">
    <div class="row">
    <!-- Liste des postes -->
    <?php foreach ($xmlo->channel->item as $key => $value) : ?>
        <div class="col">
            <div class="card mb-4 p-4">
                <!-- Image du poste -->
                <img src="<?= $value->children('media', true)->content->attributes()->url?>" alt="image du poste" class="img-post">
                <!-- Titre du poste -->
                <p class="post-title font-weight-bold"><?= $value->title; ?></p>
                <!-- Description du poste -->
                <p class="post-desc font-weight-light"><?= $value->description; ?></p>
                <a href="<?= $value->link; ?>" class="post-link">En savoir plus</a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>