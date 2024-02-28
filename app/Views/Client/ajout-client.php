<?= $this->extend('layout')?>
<?= $this->section('contenu')?>

<!-- Formulaire HTML pour l'ajout -->
<form method="post" action="<?= url_to('Ajout_Client')?>">
    <label>Nom: <input type="text" name="nom" required></label><br>
    <label>Prénom: <input type="text" name="prenom" required></label><br>
    <label>Téléphone: <input type="text" name="telephone" required></label><br>
    <label>Email: <input type="text" name="email" required></label><br>
    <input type="submit" value="Ajouter">
</form>

<?= $this->endSection()?>