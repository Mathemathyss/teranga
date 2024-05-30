<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
    <h2>Liste des Articles</h2>

    <?php
    if (!empty($articleList)) {
        echo "<table>
                <thead>
                    <tr>
                        <th>Numéro de l'article</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>";
        // Afficher les données de chaque article
        foreach ($articleList as $article) {
            echo "<tr>
                    <td>{$article['ARTICLEID']}</td>
                    <td>{$article['NOM']}</td>
                    <td>{$article['DESCRIPTION']}</td>
                    <td>{$article['PRIX']}</td>
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "Aucun article trouvé.";
    }
    ?>
    <?= $this->endSection() ?>
