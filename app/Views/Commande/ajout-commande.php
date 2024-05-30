<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<!-- <?php var_dump($reservList)?> -->
<!-- Formulaire HTML pour la création d'une commande avec champs dynamiques -->
<main>
    <h2>Création de Commande</h2>

    <form method="post" action="<?php url_to('Ajout_Commande') ?>">
        <label>Sélectionnez la réservation:
            <select name="reservationID" required>
                <?php foreach ($reservList as $reservation) : ?>
                    <option value="<?= $reservation['RESERVATIONID'] ?>"><?= $reservation['RESERVATIONID'].' ' .$reservation['Nom'].' ' .$reservation['Prenom'] ?></option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <label>Statut de la commande: <select name="statut">
                <option value="Enregistrée">Enregistrée</option>
                <option value="En cours de préparation">En cours de préparation</option>
                <option value="Servie">Servie</option>
            </select></label><br>


        <label>Lieu de la commande: <select name="lieu">
                <option value="Sur place">Sur place</option>
                <option value="A emporter">A emporter</option>
            </select></label><br>

        <!-- Champs dynamiques pour les articles et quantités -->
        <div id="articles-container">
            <?php foreach ($articleList as $article) : ?>
                <div class="article-row">
                    <label><?= $article['NOM'].' ' .$article['PRIX'].' ' ."€" ?>: <input type="number" name="quantites[<?= $article['ARTICLEID'] ?>]" min="0" required></label>
                </div>
            <?php endforeach; ?>
        </div>

        <input type="submit" value="Créer la Commande">
    </form>
</main>


<?= $this->endSection() ?>