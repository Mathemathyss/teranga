<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<!-- Formulaire HTML pour la suppression d'une réservation -->
<form method="post" action="<?= url_to('Suppression_Reservation')?>">
    <label>Sélectionnez la réservation à supprimer:
        <select name="reservationID" required>
            <?php foreach ($reservList as $reservation) : ?>
                <option value="<?= $reservation['RESERVATIONID'] ?>"><?= $reservation['RESERVATIONID'] ?> - <?= $reservation['Nom'] ?> <?= $reservation['Prenom'] ?> - <?= $reservation['DATE_HEURE'] ?> - <?= $reservation['NOMBRE_DE_PERSONNE'] ?> personne(s)</option>
            <?php endforeach; ?>
        </select>
    </label><br>

    <input type="submit" value="Supprimer réservation">
</form>

<?= $this->endSection() ?>