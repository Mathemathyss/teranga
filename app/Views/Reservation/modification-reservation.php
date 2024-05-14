<!-- app/Views/modification_reservation.php -->

<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<form method="post" action="<?= url_to('Modification_Reservation') ?>">
    <label>Sélectionnez la réservation:
        <select name="reservationID" required>
            <?php foreach ($reservations as $reservation) : ?>
                <option value="<?= $reservation['RESERVATIONID'] ?>"><?= $reservation['RESERVATIONID'] ?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <label>Sélectionnez le client:
        <select name="clientID" required>
            <?php foreach ($clients as $client) : ?>
                <option value="<?= $client['CLIENTID'] ?>"><?= $client['NOM'] ." " . $client['PRENOM'] ?></option>
            <?php endforeach; ?>
        </select>
    </label><br>

    <label>Date et heure de réservation: <input type="datetime-local" name="dateHeureReservation" required></label><br>

    <label>Nombre de personnes: <input type="number" name="nombrePersonnes" min="1" required></label><br>

    <label>Sélectionnez les tables à attribuer:<br>
        <?php foreach ($tables as $table) : ?>
            <label><input type="checkbox" name="tablesSelectionnees[]" value="<?= $table['TABLEID'] ?>"><?= $table['NUMERO_DE_TABLE']. " (" . $table['CAPACITE'] . ")" ?></label><br>
        <?php endforeach; ?>
    </label><br>

    <input type="submit" value="Modifier réservation">
</form>

<?= $this->endSection() ?>
