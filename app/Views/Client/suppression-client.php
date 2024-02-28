<?= $this->extend('layout')?>
<?= $this->section('contenu')?>
<!-- <?php
// print('<pre>');
// print_r($clientsList);
// print('</pre>');
?> -->

<!-- Formulaire HTML pour la suppression -->
<form method="post" action="<?= url_to('Suppression_Client')?>">
    <label>Sélectionnez un client à supprimer: 
        <select name="clientID">
            <?php
            // Afficher les options du ComboBox
            foreach ($clientsList as $client) {
                echo "<option value='" . $client['CLIENTID'] . "'>" . $client['NOM'].' '.$client['PRENOM'] . "</option>";
            }
            ?>
        </select>
    </label><br>

    <input type="submit" value="Supprimer">
</form>

<?= $this->endSection()?>