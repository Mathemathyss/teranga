<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>





<!-- Formulaire HTML pour la modification de "Table" -->
<form method="post" action="<?= url_to('Modification_Table') ?>">
    <label>Sélectionnez une table à modifier:
        <select name="tableID">
            <?php
            // Afficher les options du ComboBox
            foreach ($tableList as $table) {
                echo "<option value='" . $table['TABLEID'] . "'>" .'N°'. $table['NUMERO_DE_TABLE'] .' Capacité ' .$table['CAPACITE'] .' Personne(s)' . "</option>";
            }
            ?>
        </select>
    </label><br>

    <!-- Autres champs pour la modification -->
    <label>Numéro de table: <input type="text" name="numero_de_Table"></label><br>
    <label>Capacité: <input type="text" name="capacite"></label><br>
    <label for="etat">Etat de la table:</label>
    <select name="etat">
        <option value="Libre">Libre</option>
        <option value="Occupée">Occupée</option>
        <option value="Réservée">Réservée</option>
        <option value="A Nettoyer">A Nettoyer</option>
    </select><br>

    <input type="submit" value="Modifier">
</form>
<?= $this->endSection() ?>