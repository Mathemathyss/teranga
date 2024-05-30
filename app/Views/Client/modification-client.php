<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<!-- Formulaire HTML pour sélectionner un client -->
<form method="get" action="<?= url_to('Modification_Client_Form') ?>">
    <label>Sélectionnez un client à modifier :
        <select name="clientID" onchange="this.form.submit()">
            <option value="">-- Sélectionnez un client --</option>
            <?php foreach ($clientsList as $client): ?>
                <option value="<?= $client['CLIENTID'] ?>" <?= isset($selectedClient) && $selectedClient['CLIENTID'] == $client['CLIENTID'] ? 'selected' : '' ?>>
                    <?= $client['NOM'] . ' ' . $client['PRENOM'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>
</form>

<?php if ($selectedClient): ?>
    <!-- Formulaire HTML pour modifier le client -->
    <form method="post" action="<?= url_to('Modification_Client') ?>">
        <input type="hidden" name="clientID" value="<?= $selectedClient['CLIENTID'] ?>">
        <label>Nom : <input type="text" name="nom" value="<?= $selectedClient['NOM'] ?>"></label><br>
        <label>Prénom : <input type="text" name="prenom" value="<?= $selectedClient['PRENOM'] ?>"></label><br>
        <label>Téléphone (+33): <input type="tel" name="telephone" value="<?= $selectedClient['TELEPHONE'] ?>"></label><br>
        <label>Email : <input type="email" name="email" value="<?= $selectedClient['EMAIL'] ?>"></label><br>
        <input type="submit" value="Modifier">
    </form>
<?php endif; ?>

<?= $this->endSection() ?>
