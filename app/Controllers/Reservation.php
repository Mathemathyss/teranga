<?php

namespace App\Controllers;

use App\Models\Reservations;
use App\Models\Clients;
use App\Models\Tables;
use CodeIgniter\HTTP\RedirectResponse;

class Reservation extends BaseController
{
    public function index(): string
    {
        // Récupérer le terme de recherche s'il existe
        $term = $this->request->getPost('term');

        // Charger le modèle
        $reservationModel = new Reservations();

        // Récupérer les résultats de recherche
        $data['resultats'] = $reservationModel->rechercherReservations($term);

        // Passer les données à la vue et afficher la vue

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


        return view('Reservation/ajout-reservation', ['clientsList' => $clientsList, 'tableList' => $tableList]);
    }

    public function ajouterReservation(): RedirectResponse
    {
        $reservModel = new \App\Models\Reservations();
        $data = $this->request->getVar();
        $tablesSelectionnees = $data['tablesSelectionnees'];

        // Préparer la requête SQL d'insertion
        //$sql = "INSERT INTO Reservation (ClientID, Date_Heure, Nombre_de_Personne) VALUES ('$clientID', '$dateHeureReservation', '$nombrePersonnes')";
        $reservModel->insert([
            'CLIENTID' => $data['clientID'],
            'DATE_HEURE' => $data['dateHeureReservation'],
            'NOMBRE_DE_PERSONNE' => $data['nombrePersonnes'],
        ]);

        $lastID = $reservModel->getInsertID();

        $tablereservModel = new \App\Models\TableReserve();

        foreach ($data['tablesSelectionnees'] as $tableSelectionnee) {
            $tablereservModel->insert([
                'TABLEID' => $tableSelectionnee,
                'RESERVATIONID' => $lastID
            ]);
        }
        return redirect()->route('accueil');
    }

    #--------------------------------------------------------------------
    # MODIFICATION
    #--------------------------------------------------------------------

    public function modifierReservationForm(): string
    {
        // Récupérer la liste des clients depuis la base de données
        // $reservModel = new \App\Models\Reservations();
        // $reservList = $reservModel->findAll();
        // Récupérer les données depuis les modèles
        $clientModel = new Clients();
        $clients = $clientModel->findAll();

        $tableModel = new Tables();
        $tables = $tableModel->findAll();

        $reservationModel = new Reservations();
        $reservations = $reservationModel->findAll();

        // Passer les données à la vue
        // $data['clients'] = $clients;
        // $data['tables'] = $tables;
        // $data['reservations'] = $reservations;

        // Afficher la vue
        // return view('modification_reservation', $data);

        return view('Reservation/modification-reservation', ['clients' => $clients, 'tables' => $tables, 'reservations' => $reservations]);
    }

    public function modifierReservation(): string
    {

        $reservModel = new \App\Models\Reservations();
        $data = $this->request->getVar();
        // var_dump($data) ;
        $tablesSelectionnees = $data['tablesSelectionnees'];
        $id = $data['reservationID'];

        $donnees = [
            'RESERVATIONID' => $data['reservationID'],
            'CLIENTID' => $data['clientID'],
            'DATE_HEURE' => $data['dateHeureReservation'],
            'NOMBRE_DE_PERSONNE' => $data['nombrePersonnes'],
        ];
        $reservModel->save($donnees);

        // $lastID = $reservModel->getInsertID();
        // var_dump($lastID);
        $tablereservModel = new \App\Models\TableReserve();
        $tablereservModel->where('RESERVATIONID', $id)->delete();
        foreach ($data['tablesSelectionnees'] as $tableSelectionnee) {
            $tablereservModel->save([
                'TABLEID' => $tableSelectionnee,
                'RESERVATIONID' => $id
            ]);
        }
        return view('Reservation/gestion-reservation');
    }

    #--------------------------------------------------------------------
    # Suppression
    #--------------------------------------------------------------------

    public function suppressionReservationForm(): string
    {
        // Récupérer la liste des clients depuis la base de données
        $reservModel = new \App\Models\Reservations();
        // Récupérer toutes les réservations avec les informations de nom et prénom des clients
        $reservList = $reservModel->getAllReservationsWithClientInfo();

        return view('Reservation/suppression-Reservation', ['reservList' => $reservList]);
    }

    public function suppressionReservation(): string
    {
        $reservModel = new \App\Models\Reservations();
        $data = $this->request->getVar();
        $id=$data['reservationID'];
        $tablereservModel = new \App\Models\TableReserve();
        $tablereservModel->where('RESERVATIONID', $id)->delete();
        $reservModel->where('RESERVATIONID', $id)->delete();
        
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
