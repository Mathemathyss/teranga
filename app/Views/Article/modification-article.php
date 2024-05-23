<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<!-- Formulaire HTML pour sélectionner un article -->
<form method="get" action="<?= url_to('Modification_Article_Form') ?>">
    <label>Sélectionnez un article à modifier:
        <select name="articleID" onchange="this.form.submit()">
            <option value="">-- Sélectionnez un article --</option>
            <?php foreach ($articleList as $article): ?>
                <option value="<?= $article['ARTICLEID'] ?>" <?= isset($selectedArticle) && $selectedArticle['ARTICLEID'] == $article['ARTICLEID'] ? 'selected' : '' ?>>
                    <?= $article['NOM'] . ' ' . $article['PRIX'] . '€' ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>
</form>

<?php if ($selectedArticle): ?>
    <!-- Formulaire HTML pour modifier l'article -->
    <form method="post" action="<?= url_to('Modification_Article') ?>">
        <input type="hidden" name="articleID" value="<?= $selectedArticle['ARTICLEID'] ?>">
        <label>Nom: <input type="text" name="nom" value="<?= $selectedArticle['NOM'] ?>"></label><br>
        <label>Description: <input type="text" name="description" value="<?= $selectedArticle['DESCRIPTION'] ?>"></label><br>
        <label>Prix: <input type="text" name="prix" value="<?= $selectedArticle['PRIX'] ?>"></label><br>
        <input type="submit" value="Modifier">
    </form>
<?php endif; ?>

<?= $this->endSection() ?>
