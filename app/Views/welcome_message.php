<?= $this->extend('layout')?>
<?= $this->section('contenu')?>

<main>
    <h2>Bienvenue sur le Site de Gestion</h2>

    <p>Bienvenue sur le site de gestion du restaurant African Teranga. Vous pouvez utiliser les liens ci-dessous pour accéder aux différentes fonctionnalités :</p>

    <div class="button-container">
        <!-- Premier bouton -->
        <a href="gestion_client.php" class="button-link">
            <img src="inc/gestionclient.jpg" alt="Image 1">
            <div class="button-text">Gestion Clients</div>
        </a>

        <!-- Deuxième bouton -->
        <a href="gestion_table.php" class="button-link">
            <img src="inc/gestiontable.jpg" alt="Image 2">
            <div class="button-text">Gestion des Tables</div>
        </a>

        <!-- Troisième bouton -->
        <a href="gestion_article.php" class="button-link">
            <img src="inc/gestionarticle.jpg" alt="Image 3">
            <div class="button-text">Gestions des Articles</div>
        </a>

        <!-- Quatrième bouton -->
        <a href="gestion_reservation.php" class="button-link">
            <img src="inc/gestionreservation.jpg" alt="Image 4">
            <div class="button-text">Gestion des Réservations</div>
        </a>

        <!-- Cinquième bouton -->
        <a href="gestion_commande.php" class="button-link">
            <img src="inc/gestioncommande.png" alt="Image 5">
            <div class="button-text">Gestion des Commandes</div>
        </a>

        <!-- Sixième bouton -->
        <a href="encaisser.php" class="button-link">
            <img src="inc/encaisser.jpg" alt="Image 6">
            <div class="button-text">Encaisser un client</div>
        </a>
    </div>

</main>

<?= $this->endSection()?>