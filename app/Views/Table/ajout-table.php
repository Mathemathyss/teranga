<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<!-- Formulaire HTML pour l'ajout de "Table" -->
<form method="post" action="<?= url_to('Ajout_Table')?>">
    <label>Numéro de table: <input type="text" name="numeroTable"></label><br>
    <label>Capacité: <input type="text" name="capacite"></label><br>
    <!-- <label>État: <input type="text" name="etat"></label><br> -->
    <label for="etat">Etat de la table:</label>
    <select name="etat">
        <option value="Libre">Libre</option>
        <option value="Occupée">Occupée</option>
        <option value="Réservée">Réservée</option>
        <option value="A Nettoyer">A Nettoyer</option>
    </select>
    <input type="submit" value="Ajouter">
</form>
<?= $this->endSection() ?>