<?php
helper('html');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo link_tag('public/inc/style.css'); ?>
    <title>African Teranga</title>
</head>
<header>
    <a href="<?= base_url()?>">
    
    
    <?php $imageProperties = [
    'src'    => 'inc/logo.png',
    'alt'    => 'Logo du site',
    'width'  => '100']; 
    echo img($imageProperties);?></a>
    <a href="<?= base_url()?>" class="titresite">
        <h1>African Teranga</h1>
    </a>
    <nav>
        <ul>
            <li><a href="<?= url_to('Gestion_Client')?>">Gestion Clients</a></li>
            <li><a href="<?= url_to('Gestion_Table')?>">Gestion Tables</a></li>
            <li><a href="<?= url_to('Gestion_Article')?>">Gestion Articles</a></li>
            <li><a href="<?= url_to('Gestion_Reservation')?>">Gestion Réservations</a></li>
            <li><a href="<?= url_to('Gestion_Commande')?>">Gestion Commandes</a></li>
            <li><a href="<?= base_url()?>">Accueil</a></li>
        </ul>
    </nav>
    <!-- Contenu du haut de la page (navigation, en-tête, etc.) -->
</header>

<body>
    <main>
    <?= $this->renderSection('contenu') ?>
    </main>
</body>
<footer>
    <!-- Contenu du bas de la page (pied de page) -->
    <p>&copy; 2024 Mon Site Web</p>
</footer>

</html>