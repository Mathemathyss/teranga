<?php

namespace App\Controllers;

class Client extends BaseController
{
    public function index(): string
    {
        return view('Client/gestion-client');
    }

    #--------------------------------------------------------------------
    # AJOUT
    #--------------------------------------------------------------------

    public function ajouterClientForm(): string
    {
        return view('Client/ajout-client');
    }

    public function ajouterClient(): string
    {
        $data = $this->request->getVar();

        // print('<pre>');
        // print_r($data);
        // print('</pre>');

        $clientModel = new \App\Models\Clients();

        // Récupérer les données du formulaire
        $clientModel->insert([
            'NOM' => $data['nom'],
            'PRENOM' => $data['prenom'],
            'TELEPHONE' => $data['telephone'],
            'EMAIL' => $data['email']
        ]);


        // Préparer la requête SQL d'insertion
        // $sql = "INSERT INTO Clients (Nom, Prenom, Telephone, Email) VALUES ('$nom', '$prenom', '$telephone', '$email')";

        return view('Client/gestion-client');
    }

    #--------------------------------------------------------------------
    # MODIFICATION
    #--------------------------------------------------------------------

    public function modifierClientForm()
    {
        // Récupérer la liste des clients depuis la base de données
        $clientModel = new \App\Models\Clients();
        $clientsList = $clientModel->findAll();

        // $sql_clients = "SELECT ClientID, CONCAT(Nom, ' ', Prenom) AS NomComplet FROM Clients";
        // Initialiser les variables du client
        $selectedClient = null;

        // Vérifier si un clientID a été passé en paramètre
        $clientID = $this->request->getVar('clientID');
        if (!empty($clientID)) {
            // Récupérer les informations du client sélectionné
            $selectedClient = $clientModel->find($clientID);
        }

        // Charger la vue avec les données des clients
        return view('Client/modification-client', [
            'clientsList' => $clientsList,
            'selectedClient' => $selectedClient,
        ]);

        //return view('Client/modification-client', ['clientsList' => $clientsList]);
    }

    public function modifierClient(): string
    {
        $data = $this->request->getVar();
        $clientModel = new \App\Models\Clients();

        // print('<pre>');
        // print_r($data);
        // print('</pre>');

        $id = $data['clientID'];

        $donnees = [
            'CLIENTID' => $data['clientID'],
            'NOM' => $data['nom'],
            'PRENOM' => $data['prenom'],
            'TELEPHONE' => $data['telephone'],
            'EMAIL' => $data['email']
        ];
        $clientModel->save($donnees);

        //Préparer la requête SQL de mise à jour
        // $sql = "UPDATE Clients SET Nom='$nom', Prenom='$prenom', Telephone='$telephone', Email='$email' WHERE ClientID='$clientID'";


        return view('Client/gestion-client');
    }

    #--------------------------------------------------------------------
    # Suppression
    #--------------------------------------------------------------------

    public function suppressionClientForm(): string
    {
        // Récupérer la liste des clients depuis la base de données
        $clientModel = new \App\Models\Clients();
        $clientsList = $clientModel->findAll();

        return view('Client/suppression-client', ['clientsList' => $clientsList]);
    }

    public function suppressionClient(): string
    {
        $data = $this->request->getVar();

        // print('<pre>');
        // print_r($data);
        // print('</pre>');

        $clientModel = new \App\Models\Clients();
        $clientModel->delete($data);
        // Préparer la requête SQL de suppression
        // $sql = "DELETE FROM Clients WHERE ClientID='$clientID'";

        return view('Client/gestion-client');
    }

    #--------------------------------------------------------------------
    # Lecture des infos
    #--------------------------------------------------------------------

    public function listeClient(): string
    {
        $clientModel = new \App\Models\Clients();
        $clientsList = $clientModel->findAll();
        return view('Client/liste-client', ['clientsList' => $clientsList]);
    }
}
