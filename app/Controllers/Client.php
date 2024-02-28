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

        print('<pre>');
        print_r($data);
        print('</pre>');
        
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $nom = $data['nom'];
            $prenom = $data['prenom'];
            $telephone = $data['telephone'];
            $email = $data['email'];
        
            // Préparer la requête SQL d'insertion
            $sql = "INSERT INTO Clients (Nom, Prenom, Telephone, Email) VALUES ('$nom', '$prenom', '$telephone', '$email')";
        
            // Exécuter la requête
            // if ($conn->query($sql) === TRUE) {
            //     echo "Enregistrement ajouté avec succès.";
            // } else {
            //     echo "Erreur : " . $sql . "<br>" . $conn->error;
            // }
        
            // // Fermer la connexion à la base de données
            // $conn->close();
        // }

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
