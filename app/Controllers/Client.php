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

        return view('Client/liste-client');
    }

    public function modificationClientForm(): string
    {
        return view('Client/modification-client');
    }

    public function suppressionClientForm(): string
    {
        return view('Client/suppression-client');
    }

    public function listeClient(): string
    {
        return view('Client/liste-client');
    }
}
