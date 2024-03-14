
<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<!-- Formulaire HTML pour la création d'une réservation -->
<form method="post" action="">
    <label>Sélectionnez le client:
        <select name="clientID" required>
            <?php
            // Afficher les options du ComboBox pour les clients
            foreach ($clientsList as $client) {
                echo "<option value='" . $client['CLIENTID'] . "'>" . $client['NOM'] .' ' .$client['PRENOM'] . "</option>";
            }
            ?>
        </select>
    </label><br>

    <label>Date et heure de réservation: <input type="datetime-local" name="dateHeureReservation" required></label><br>

    <label>Nombre de personnes: <input type="number" name="nombrePersonnes" min="1" required></label><br>

    <label>Sélectionnez les tables à attribuer:<br>
        <?php
        // Afficher les cases à cocher pour les tables
        foreach ($tableList as $table) {
            echo "<label><input type='checkbox' name='tablesSelectionnees[]' value='" . $table['TABLEID'] . "'>" . $table['NUMERO_DE_TABLE'] . " (" . $table['CAPACITE'] . ")" . "</label><br>";
        }
        ?>
    </label><br>

    <input type="submit" value="Créer réservation">
</form>
<?= $this->endSection() ?>