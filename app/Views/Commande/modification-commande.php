<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<!-- <?=var_dump($articles);?> -->

<main>
    <h2>Modification de Commande</h2>

    <form method="post" action="<?php echo url_to('Modification_Commande') ?>">
        <input type="hidden" name="commandeID" value="<?= $commande_details['COMMANDEID'] ?>">

        <label>Sélectionnez la réservation:
            <select name="reservationID" required>
                <?php foreach ($reservations as $reservation) : ?>
                    <?php $selected = ($commande_details['RESERVATIONID'] == $reservation['RESERVATIONID']) ? 'selected' : ''; ?>
                    <option value="<?= $reservation['RESERVATIONID'] ?>" <?= $selected ?>>
                        <?= $reservation['RESERVATIONID'].' '.$reservation['Nom'].' '.$reservation['Prenom'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <label>Statut de la commande:
            <select name="statut">
                <option value="Enregistrée" <?= ($commande_details['STATUT'] == 'Enregistrée') ? 'selected' : '' ?>>Enregistrée</option>
                <option value="En cours de préparation" <?= ($commande_details['STATUT'] == 'En cours de préparation') ? 'selected' : '' ?>>En cours de préparation</option>
                <option value="Servie" <?= ($commande_details['STATUT'] == 'Servie') ? 'selected' : '' ?>>Servie</option>
            </select>
        </label><br>

        <!-- Champs dynamiques pour les articles et quantités -->
        <div id="articles-container">
            <?php foreach ($articles as $article) : ?>
                <?php
                $articleID = $article['ARTICLEID'];
                $quantite = 0;

                // Rechercher la quantité associée à l'article pour cette commande
                foreach ($detailsarticle as $detail) {
                    if ($detail['ARTICLEID'] == $articleID) {
                        $quantite = $detail['QUANTITÉ'];
                        break;
                    }
                }
                ?>
                <div class="article-row">
                    <label><?= $article['NOM'].' '.$article['PRIX'] ?>: <input type="number" name="quantites[<?= $articleID ?>]" min="0" value="<?= $quantite ?>" required></label>
                </div>
            <?php endforeach; ?>
        </div>

        <input type="submit" value="Modifier la Commande">
    </form>
</main>

<?= $this->endSection() ?>
