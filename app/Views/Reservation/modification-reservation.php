<!-- app/Views/Reservation/modification-reservation.php -->

<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<!-- Formulaire pour sélectionner une réservation -->
<form method="get" >
    <label>Sélectionnez la réservation:
        <select name="reservationID" onchange="this.form.submit()">
            <option value="">-- Sélectionnez une réservation --</option>
            <?php foreach ($reservations as $reservation): ?>
                <option value="<?= $reservation['RESERVATIONID'] ?>" <?= isset($selectedReserv) && $selectedReserv['RESERVATIONID'] == $reservation['RESERVATIONID'] ? 'selected' : '' ?>>
                    <?= $reservation['RESERVATIONID'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
</form>

<?php if (isset($selectedReserv)): ?>
    <!-- Formulaire pour modifier la réservation -->
    <form method="post" action="<?= url_to('Modification_Reservation') ?>">
        <input type="hidden" name="reservationID" value="<?= $selectedReserv['RESERVATIONID'] ?>">

        <label>Sélectionnez le client:
            <select name="clientID" required>
                <?php foreach ($clients as $client): ?>
                    <option value="<?= $client['CLIENTID'] ?>" <?= $selectedReserv['CLIENTID'] == $client['CLIENTID'] ? 'selected' : '' ?>>
                        <?= $client['NOM'] . " " . $client['PRENOM'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <label>Date et heure de réservation:
            <input type="datetime-local" name="dateHeureReservation" value="<?= date('Y-m-d\TH:i', strtotime($selectedReserv['DATE_HEURE'])) ?>" required>
        </label><br>

        <label>Nombre de personnes:
            <input type="number" name="nombrePersonnes" min="1" value="<?= $selectedReserv['NOMBRE_DE_PERSONNE'] ?>" required>
        </label><br>

        <label>Sélectionnez les tables à attribuer:<br>
            <?php foreach ($tables as $table): ?>
                <label>
                    <input type="checkbox" name="tablesSelectionnees[]" value="<?= $table['TABLEID'] ?>"
                        <?= in_array($table['TABLEID'], $selectedTableIds) ? 'checked' : '' ?>>
                    <?= $table['NUMERO_DE_TABLE'] . " (" . $table['CAPACITE'] . ")" ?>
                </label><br>
            <?php endforeach; ?>
        </label><br>

        <input type="submit" value="Modifier réservation">
    </form>
<?php endif; ?>

<?= $this->endSection() ?>
