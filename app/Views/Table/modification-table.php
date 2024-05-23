<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<!-- Formulaire HTML pour sélectionner une table -->
<form method="get" action="<?= url_to('Modification_Table_Form') ?>">
    <label>Sélectionnez une table à modifier:
        <select name="tableID" onchange="this.form.submit()">
            <option value="">-- Sélectionnez une table --</option>
            <?php foreach ($tableList as $table): ?>
                <option value="<?= $table['TABLEID'] ?>" <?= isset($selectedTable) && $selectedTable['TABLEID'] == $table['TABLEID'] ? 'selected' : '' ?>>
                    N°<?= $table['NUMERO_DE_TABLE'] ?> Capacité <?= $table['CAPACITE'] ?> Personne(s)
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>
</form>

<?php if ($selectedTable): ?>
    <!-- Formulaire HTML pour modifier la table -->
    <form method="post" action="<?= url_to('Modification_Table') ?>">
        <input type="hidden" name="tableID" value="<?= $selectedTable['TABLEID'] ?>">
        <label>Numéro de table: <input type="text" name="numero_de_Table" value="<?= $selectedTable['NUMERO_DE_TABLE'] ?>"></label><br>
        <label>Capacité: <input type="text" name="capacite" value="<?= $selectedTable['CAPACITE'] ?>"></label><br>
        <label for="etat">État de la table:</label>
        <select name="etat">
            <option value="Libre" <?= $selectedTable['ETAT'] == 'Libre' ? 'selected' : '' ?>>Libre</option>
            <option value="Occupée" <?= $selectedTable['ETAT'] == 'Occupée' ? 'selected' : '' ?>>Occupée</option>
            <option value="Réservée" <?= $selectedTable['ETAT'] == 'Réservée' ? 'selected' : '' ?>>Réservée</option>
            <option value="A Nettoyer" <?= $selectedTable['ETAT'] == 'A Nettoyer' ? 'selected' : '' ?>>A Nettoyer</option>
        </select><br>
        <input type="submit" value="Modifier">
    </form>
<?php endif; ?>

<?= $this->endSection() ?>
