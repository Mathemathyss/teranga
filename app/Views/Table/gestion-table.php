<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h2>Gestion des Tables</h2>

    <!-- Bouton pour Ajouter un Table -->
    <a href="<?= url_to('Ajout_Table_Form')?>">
        <button>Ajouter Table</button>
    </a>

    <!-- Bouton pour Modifier un Table -->
    <a href="<?= url_to('Modification_Table_Form')?>">
        <button>Modifier Table</button>
    </a>

    <!-- Bouton pour Supprimer un Table -->
    <a href="<?= url_to('Suppression_Table_Form')?>">
        <button>Supprimer Table</button>
    </a>

    <!-- Bouton pour Afficher la Liste des Table -->
    <a href="<?= url_to('Liste_Table')?>">
        <button>Liste des Table</button>
    </a>

    <?= $this->endSection() ?>