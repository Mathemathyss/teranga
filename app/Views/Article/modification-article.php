<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<!-- Formulaire HTML pour la modification d'article -->
<form method="post" action="<?= url_to('Modification_Article') ?>">
    <label>Sélectionnez un article à modifier:
        <select name="articleID">
            <?php
            // Afficher les options du ComboBox
            foreach ($articleList as $article) {
                echo "<option value='" . $article['ARTICLEID'] . "'>" . $article['NOM'] .' '.$article['PRIX'].'€'. "</option>";
            }
            ?>
        </select>
    </label><br>

    <!-- Autres champs pour la modification -->
    <label>Nom: <input type="text" name="nom"></label><br>
    <label>Description: <input type="text" name="description"></label><br>
    <label>Prix: <input type="text" name="prix"></label><br>

    <input type="submit" value="Modifier">
</form>
<?= $this->endSection() ?>