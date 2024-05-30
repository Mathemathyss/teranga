<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<main>
    <h2>Encaissement de la Commande</h2>

    <form id="selectCommandeForm" method="get" action="<?php

 url_to('Encaisser_Form') ?>">
        <label>Sélectionnez une commande:
            <select name="commandeID" onchange="document.getElementById('selectCommandeForm').submit()">
                <option value="" <?= empty($selectedCommandeID) ? 'selected' : '' ?>>-- Sélectionnez une commande --</option>
                <?php foreach ($commandes as $commande) : ?>
                    <option value="<?= $commande['COMMANDEID'] ?>" <?= $selectedCommandeID == $commande['COMMANDEID'] ? 'selected' : '' ?>>
                        <?= $commande['DATE_HEURE'] ?> - Commande <?= $commande['COMMANDEID'] ?> - <?= $clientNom ?> <?= $clientPrenom ?>
                    </option>
                <?php endforeach; ?>
            </select>

        </label>
    </form>
    <!-- <?= var_dump($commande_details, $details_commande); ?> -->

    <?php if (!empty($commande_details)) : ?>
        <h3>Informations sur la Commande</h3>
        <p>Numéro de commande: <?= $commande_details['COMMANDEID'] ?></p>
        <p>Réservation: <?= $clientNom . ' ' . $clientPrenom ?></p>
        <p>Date et Heure de la Commande: <?= $commande_details['DATE_HEURE'] ?></p>
        <p>Statut de la Commande: <?= $commande_details['STATUT'] ?></p>


        <h3>Détails de la Commande</h3>
        <table border="1">
            <tr>
                <th>Article</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>

            <?php
            $totalCommande = 0;
            foreach ($details_commande as $detail) :
                $sousTotal = $detail['PrixArticle'] * $detail['QUANTITÉ'];
                $totalCommande += $sousTotal;
            ?>
                <tr>
                    <td><?= $detail['NomArticle'] ?></td>
                    <td><?= $detail['PrixArticle'] ?> €</td>
                    <td><?= $detail['QUANTITÉ'] ?></td>
                    <td><?= $sousTotal ?> €</td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total de la Commande:</strong></td>
                <td><?= $totalCommande ?> €</td>
            </tr>
        </table>

        <p>Procéder au paiement...</p>
    <?php endif; ?>
</main>

<?= $this->endSection() ?>