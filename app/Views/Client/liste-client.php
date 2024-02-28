<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h2>Liste des Clients</h2>



<?php
// print('<pre>');
// print_r($clientsList);
// print('</pre>');

echo "<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone (+33)</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>";

foreach ($clientsList as $client) {
    echo "<tr>
                    <td>{$client['CLIENTID']}</td>
                    <td>{$client['NOM']}</td>
                    <td>{$client['PRENOM']}</td>
                    <td>{$client['TELEPHONE']}</td>
                    <td>{$client['EMAIL']}</td>
                </tr>";
}
// Afficher les données de chaque client
// while ($row = $result->fetch_assoc()) {
//     
// }
echo "</tbody></table>";
?>
<?= $this->endSection() ?>