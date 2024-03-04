<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<!-- Formulaire HTML pour la suppression d'article -->
<form method="post" action="<?= url_to('Suppression_Article') ?>">
    <label>Sélectionnez un article à supprimer: 
        <select name="articleID">
            <?php
            // Afficher les options du ComboBox
            foreach ($articleList as $article) {
                echo "<option value='" . $article['ARTICLEID'] . "'>" . $article['NOM'] .' '.$article['PRIX'].'€'. "</option>";
            }
            ?>
        </select>
    </label><br>

    <input type="submit" value="Supprimer">
</form>
<?= $this->endSection() ?>