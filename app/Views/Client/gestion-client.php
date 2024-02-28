<?= $this->extend('layout')?>
<?= $this->section('contenu')?>

<h2>Gestion des Clients</h2>

    <!-- Bouton pour Ajouter un Client -->
    <a href="<?= url_to('Ajout_Client_Form')?>">
        <button>Ajouter Client</button>
    </a>

    <!-- Bouton pour Modifier un Client -->
    <a href="<?= url_to('Modification_Client_Form')?>">
        <button>Modifier Client</button>
    </a>

    <!-- Bouton pour Supprimer un Client -->
    <a href="<?= url_to('Suppression_Client_Form')?>">
        <button>Supprimer Client</button>
    </a>

    <!-- Bouton pour Afficher la Liste des Clients -->
    <a href="<?= url_to('Liste_Client')?>">
        <button>Liste des Clients</button>
    </a>

<?= $this->endSection()?>