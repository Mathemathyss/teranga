<?php
helper('html');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo link_tag('inc/style.css'); ?>
    <title>African Teranga</title>
</head>
<header>
    <a href="<?= base_url()?>"><img src="inc/logo.png" alt="Logo du site" width="100"></a>
    <a href="<?= base_url()?>" class="titresite">
        <h1>African Teranga</h1>
    </a>
    <nav>
        <ul>
            <li><a href="gestion_client.php">Gestion Clients</a></li>
            <li><a href="gestion_table.php">Gestion Tables</a></li>
            <li><a href="gestion_article.php">Gestion Articles</a></li>
            <li><a href="gestion_reservation.php">Gestion Réservations</a></li>
            <li><a href="gestion_commande.php">Gestion Commandes</a></li>
            <li><a href="<?= base_url()?>">Accueil</a></li>
        </ul>
    </nav>
    <!-- Contenu du haut de la page (navigation, en-tête, etc.) -->
</header>

<body>
    <?= $this->renderSection('contenu') ?>
</body>
<footer>
    <!-- Contenu du bas de la page (pied de page) -->
    <p>&copy; 2024 Mon Site Web</p>
</footer>

</html>