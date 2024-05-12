<?= $this->extend('layout')?>
<?= $this->section('contenu')?>

<main>
    <h2>Bienvenue sur le Site de Gestion</h2>

    <p>Bienvenue sur le site de gestion du restaurant African Teranga. Vous pouvez utiliser les liens ci-dessous pour accéder aux différentes fonctionnalités :</p>

    <div class="button-container">
        <!-- Premier bouton -->
        <a href="<?= url_to('Gestion_Client')?>" class="button-link">
            <img src="inc/gestionclient.jpg" alt="Image 1">
            <div class="button-text">Gestion Clients</div>
        </a>

        <!-- Deuxième bouton -->
        <a href="<?= url_to('Gestion_Table')?>" class="button-link">
            <img src="inc/gestiontable.jpg" alt="Image 2">
            <div class="button-text">Gestion des Tables</div>
        </a>

        <!-- Troisième bouton -->
        <a href="<?= url_to('Gestion_Article')?>" class="button-link">
            <img src="inc/gestionarticle.jpg" alt="Image 3">
            <div class="button-text">Gestions des Articles</div>
        </a>

        <!-- Quatrième bouton -->
        <a href="<?= url_to('Gestion_Reservation')?>" class="button-link">
            <img src="inc/gestionreservation.jpg" alt="Image 4">
            <div class="button-text">Gestion des Réservations</div>
        </a>

        <!-- Cinquième bouton -->
        <a href="<?= url_to('Gestion_Commande')?>" class="button-link">
            <img src="inc/gestioncommande.png" alt="Image 5">
            <div class="button-text">Gestion des Commandes</div>
        </a>

        <!-- Sixième bouton -->
        <a href="<?= url_to('Encaisser_Form')?>" class="button-link">
            <img src="inc/encaisser.jpg" alt="Image 6">
            <div class="button-text">Encaisser un client</div>
        </a>
    </div>

</main>

<?= $this->endSection()?>