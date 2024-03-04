<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<!-- Formulaire HTML pour la suppression de "Table" -->
<form method="post" action="<?= url_to('Suppression_Table')?>">
    <label>Sélectionnez une table à supprimer:
        <select name="tableID">
            <?php
            // Afficher les options du ComboBox
            foreach ($tableList as $table) {
                echo "<option value='" . $table['TABLEID'] . "'>" .'N°'. $table['NUMERO_DE_TABLE'] .' Capacité ' .$table['CAPACITE'] .' Personne(s)' . "</option>";
            }
            ?>
        </select>
    </label><br>

    <input type="submit" value="Supprimer">
</form>
<?= $this->endSection() ?>