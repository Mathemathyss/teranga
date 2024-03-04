<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<!-- Formulaire HTML pour l'ajout d'"Article" -->
<form method="post" action="<?= url_to('Ajout_Article')?>">
    <label>Nom: <input type="text" name="nom"></label><br>
    <label>Description: <input type="text" name="description"></label><br>
    <label>Prix: <input type="number" name="prix" step="any"></label><br>
    <input type="submit" value="Ajouter">
</form>

<?= $this->endSection() ?>