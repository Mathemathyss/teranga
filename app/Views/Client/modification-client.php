

<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<!-- Formulaire HTML pour la modification -->
<form method="post" action="<?= url_to('Modification_Client')?>">
    <label>Sélectionnez un client à modifier:
        <select name="clientID">
            <?php
            // Afficher les options du ComboBox
            foreach ($clientsList as $client) {
                echo "<option value='" . $client['CLIENTID'] . "'>" . $client['NOM'] .' ' .$client['PRENOM'] . "</option>";
            }
            ?>

        </select>
    </label><br>

    <!-- Autres champs pour la modification -->
    <label>Nom: <input type="text" name="nom"></label><br>
    <label>Prénom: <input type="text" name="prenom"></label><br>
    <label>Téléphone: <input type="tel" name="telephone"></label><br>
    <label>Email: <input type="email" name="email"></label><br>

    <input type="submit" value="Modifier">
</form>

<?= $this->endSection() ?>
