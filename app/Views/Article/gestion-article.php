<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h2>Gestion des Article</h2>

    <!-- Bouton pour Ajouter un Article -->
    <a href="<?= url_to('Ajout_Article_Form')?>">
        <button>Ajouter Article</button>
    </a>

    <!-- Bouton pour Modifier un Article -->
    <a href="<?= url_to('Modification_Article_Form')?>">
        <button>Modifier Article</button>
    </a>

    <!-- Bouton pour Supprimer un Article -->
    <a href="<?= url_to('Suppression_Article_Form')?>">
        <button>Supprimer Article</button>
    </a>

    <!-- Bouton pour Afficher la Liste des Article -->
    <a href="<?= url_to('Liste_Article')?>">
        <button>Liste des Article</button>
    </a>

    <?= $this->endSection() ?>