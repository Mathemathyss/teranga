<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h2>Liste des Tables</h2>

<?php
if (!empty($tableList)) {
echo "<table>
                <thead>
                    <tr>
                        <th>Identifiant de la Table</th>
                        <th>Numéro en salle de la Table</th>
                        <th>Capacité</th>
                        <th>État</th>
                    </tr>
                </thead>
                <tbody>";
// Afficher les données de chaque table
foreach ($tableList as $table) {
    echo "<tr>
                    <td>{$table['TABLEID']}</td>
                    <td>{$table['NUMERO_DE_TABLE']}</td>
                    <td>{$table['CAPACITE']}</td>
                    <td>{$table['ETAT']}</td>
                </tr>";
}
echo "</tbody></table>";
} else {
    echo "Aucune Table trouvé.";
}

?>
<?= $this->endSection() ?>