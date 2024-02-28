<?php

namespace App\Controllers;

class Client extends BaseController
{
    public function index(): string
    {
        return view('Client/gestion-client');
    }

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

    public function modificationClientForm(): string
    {
        return view('Client/modification-client');
    }

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

    public function listeClient(): string
    {
        $clientModel = new \App\Models\Clients();
        $clientsList = $clientModel->findAll();
        return view('Client/liste-client', ['clientsList' => $clientsList]);
    }
}
