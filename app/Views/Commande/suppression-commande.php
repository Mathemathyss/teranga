<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<main>
    <h2>Suppression de Commande</h2>

    <!-- Formulaire HTML pour la suppression d'une commande -->
    <form method="post" action="<?= base_url('commande/supprimerCommande') ?>">
        <label>Sélectionnez la commande à supprimer:
            <select name="commandeID" required>
                <?php foreach ($commandes as $commande) : ?>
                    <option value="<?= $commande['COMMANDEID'] ?>">Commande #<?= $commande['COMMANDEID'] ?> (Réservation #<?= $commande['RESERVATIONID'] ?>)</option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <input type="submit" value="Supprimer Commande">
    </form>
</main>
<?= $this->endSection() ?>