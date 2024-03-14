<?php

namespace App\Controllers;

class Reservation extends BaseController
{
    public function index(): string
    {
        // Récupérer le terme de recherche s'il existe
        $term = $this->request->getGet('search');

        // Si le formulaire de recherche est soumis
        if ($this->request->getMethod() == 'post') {
            $term = $this->request->getPost('term');
        }

        // Charger le modèle
        $reservationModel = new \App\Models\Reservations();

        // Récupérer les résultats de recherche
        $data['resultats'] = $reservationModel->rechercherReservations($term);

        return view('Reservation/gestion-reservation', $data);
    }

    #--------------------------------------------------------------------
    # AJOUT
    #--------------------------------------------------------------------

    public function ajouterReservationForm(): string
    {
        // Récupérer la liste des clients depuis la base de données
        $clientModel = new \App\Models\Clients();
        $clientsList = $clientModel->findAll();

        // Récupérer la liste des tables depuis la base de données
        $tableModel = new \App\Models\Tables();
        $tableList = $tableModel->findAll();


        return view('Reservation/ajout-reservation', ['clientsList' => $clientsList ,'tableList' => $tableList]);
    }

    public function ajouterReservation(): string
    {
        $reservModel = new \App\Models\Reservations();
        $data = $this->request->getVar();
        $tablesSelectionnees = $data['tablesSelectionnees'];
        // Vérifier si le formulaire est soumis
        



            // Convertir le tableau en chaîne séparée par des virgules pour stocker dans la base de données
            // $tablesAttribuees = implode(",", $tablesSelectionnees);

            // Préparer la requête SQL d'insertion
            //$sql = "INSERT INTO Reservation (ClientID, Date_Heure, Nombre_de_Personne) VALUES ('$clientID', '$dateHeureReservation', '$nombrePersonnes')";
            $reservModel->insert([
                'CLIENTID' => $data['clientID'],
                'DATE_HEURE' => $data['dateHeureReservation'],
                'NOMBRE_DE_PERSONNE' => $data['nombrePersonnes'],
            ]);

            $lastID = $reservModel->getInsertID();

            $tablereservModel = new \App\Models\TableReserve();

            foreach ($data['tablesSelectionnees'] as $tableSelectionnee){
                $tablereservModel->insert([
                    'TABLEID' => $tableSelectionnee,
                    'RESERVATIONID' => $lastID
                ]);
            }

            //     // Exécuter la requête
            // if ($conn->query($sql) === TRUE) {
            //     $last_id = $conn->insert_id;
            //     foreach ($tablesSelectionnees as $tableSelectionnee) {
            //         $sql_add_table = "INSERT INTO table_reserve(TableID, ReservationID) VALUES ('$tableSelectionnee', '$last_id')";
            //         $conn->query($sql_add_table);
            //     }
            //     // echo "$last_id";

            //     echo "Réservation ajoutée avec succès.";
            // } else {
            //     echo "Erreur : " . $sql . "<br>" . $conn->error;
            // }

            // //     // Fermer la connexion à la base de données
            // $conn->close();
        

        // Fermer les résultats des requêtes
        // $result_clients->free_result();
        // $result_tables->free_result();
        return view('Reservation/gestion-reservation');
    }

    #--------------------------------------------------------------------
    # MODIFICATION
    #--------------------------------------------------------------------

    public function modifierReservationForm(): string
    {
        // Récupérer la liste des clients depuis la base de données
        $reservModel = new \App\Models\Reservations();
        $reservList = $reservModel->findAll();

        return view('Reservation/modification-reservation', ['reservList' => $reservList]);
    }

    public function modifierReservation(): string
    {
        return view('Reservation/gestion-reservation');
    }

    #--------------------------------------------------------------------
    # Suppression
    #--------------------------------------------------------------------

    public function suppressionReservationForm(): string
    {
        // Récupérer la liste des clients depuis la base de données
        $reservModel = new \App\Models\Reservations();
        $reservList = $reservModel->findAll();

        return view('Reservation/suppression-Reservation', ['reservList' => $reservList]);
    }

    public function suppressionReservation(): string
    {
        return view('Reservation/gestion-reservation');
    }

    #--------------------------------------------------------------------
    # Lecture des infos
    #--------------------------------------------------------------------

    // public function listeClient(): string
    // {
    //     $clientModel = new \App\Models\Clients();
    //     $clientsList = $clientModel->findAll();
    //     return view('Client/liste-client', ['clientsList' => $clientsList]);
    // }
}
