<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<?php

$term = isset($termReserv) ? $_GET['search'] : '';
?>
<!-- Contenu de la page -->

    <h2>Gestion des Commandes</h2>

    <!-- Formulaire de recherche de commandes -->
    <form method="post" action="<?php url_to('Gestion_Commande') ?>">
        <label for="term">Rechercher par ID Réservation, Date/Heure, Nom, Prenom client, nom d'article ou Statut :</label>
        <input type="text" name="term" id="term" value="<?php echo $term; ?>">
        <input type="submit" value="Rechercher">
    </form>

    <!-- Boutons pour créer, modifier et supprimer une commande -->
    <div>
    <a href="<?= url_to('Ajout_Commande_Form') ?>"><button>Ajouter une commande</button></a>
        <!-- <a href="modification_commande.php"><button>Modifier une Commande</button></a> -->
        <!-- <a href="suppression_commande.php"><button>Supprimer une Commande</button></a> -->
    </div>

    <!--date("Y-m-d H:i:s", strtotime('+3 hours', $commande['DATE_HEURE']))-->
    <!-- Affichage des résultats de recherche ou de toutes les commandes -->
    <?php
    if (!empty($resultats)) {
        echo "<table border='1'>
                <tr>
                    <th>Numéro Commande</th>
                    <th>infos client (N°client)</th>
                    <th>Date et Heure Commande(+livraison)</th>
                    <th>Plats Commandés (Quantité)</th>
                    <th>Lieu</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>";
        // Afficher les données de chaque commande
        foreach ($resultats as $commande) {
            $heure = $commande['DATE_HEURE'];
            $heurelivraison = strlen(($commande['LIEU'] == 'A emporter') ? [date("Y-m-d H:i:s", strtotime('+2 hours', strtotime($heure)))] : '') ;
            //var_dump($heurelivraison);
            echo "<tr>
                    <td>{$commande['COMMANDEID']}</td>
                    <td>{$commande['NomPrenomReservation']}</td>
                    <td>$heure + ($heurelivraison)</td>
                    <td>{$commande['PlatsCommandes']}</td>
                    <td>{$commande['LIEU']}</td>
                    <td>{$commande['STATUT']}</td>
                    <td>
                    <a href='" . url_to('Modification_Commande_Form', $commande['COMMANDEID']) . "'><button>Modifier</button></a>
                    <a href='" . url_to('Suppression_Commande_Direct', $commande['COMMANDEID']) . "'><button>Supprimer</button></a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Aucune commande trouvée.";
    }
    ?>

<?= $this->endSection() ?>