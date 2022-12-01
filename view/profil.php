<?php 
$title = 'Profil';
require_once './inc/header.php';
?>

<main class="container container-width">
    <!-- Formulaire de changement d'intérêt -->
    <form method="GET" action="./controllers/change-interest-controller.php">
        <div class="form-group">
            <label for="interests">Choisissez votre intérêt :</label>
            <select required class="form-control" id="interests" name="interests" placeholder="ex : Rugby">
                <?php foreach ($_SESSION['interestsList'] as $key => $value) : ?>
                    <option value="<?= $value['name']?>"><?= $value['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Valider</button><br><br>
        </div>
    </form>
</main>