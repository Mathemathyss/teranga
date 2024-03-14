
<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<?php
$term = isset($termReserv) ? $_GET['search'] : '';
?>
    <h2>Gestion des Réservations</h2>

    <form method="post" action="AMODIF">
        <label>Rechercher par Nom ou prénom client, Date/Heure ou Nombre de Personnes:
            <input type="text" name="term" value="<?php echo $term; ?>">
        </label>
        <input type="submit" value="Rechercher">
    </form>

    <div>
        <a href="<?=url_to('Ajout_Reservation_Form')?>"><button>Ajouter Réservation</button></a>
    </div>

    <?php
    if (!empty($reservList)) {
        echo "<table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ClientID</th>
                        <th>Nom Client</th>
                        <th>Prénom Client</th>
                        <th>Date/Heure</th>
                        <th>Nombre de Personnes</th>
                        <th>Tables Associées</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";
        // Afficher les données de chaque réservation
        foreach ($reservList as $reserv) {
            echo "<tr>
                    <td>{$reserv['RESERVATIONID']}</td>
                    <td>{$reserv['CLIENTID']}</td>
                    <td>{$reserv['NomClient']}</td>
                    <td>{$reserv['PrenomClient']}</td>
                    <td>{$reserv['DATE_HEURE']}</td>
                    <td>{$reserv['NOMBRE_DE_PERSONNE']}</td>
                    <td>{$reserv['TablesAssociees']}</td>
                    <td>
                        <a href='modification_reservation.php?id={$reserv['RESERVATIONID']}'><button>Modifier</button></a>
                        <a href='suppression_reservation.php?id={$reserv['RESERVATIONID']}'><button>Supprimer</button></a>
                    </td>
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "Aucune réservation trouvée.";
    }
    ?>

<?= $this->endSection() ?>
