<?php

namespace App\Controllers;

class Table extends BaseController
{
    public function index(): string
    {
        return view('Table/gestion-table');
    }

    #--------------------------------------------------------------------
    # AJOUT
    #--------------------------------------------------------------------

    public function ajouterTableForm(): string
    {
        return view('Table/ajout-table');
    }

    public function ajouterTable(): string
    {
        $data = $this->request->getVar();
        $tableModel = new \App\Models\Tables();

        // print('<pre>');
        // print_r($data);
        // print('</pre>');

        $tableModel->insert([
            'NUMERO_DE_TABLE' => $data['numeroTable'],
            'CAPACITE' => $data['capacite'],
            'ETAT' => $data['etat'],
        ]);

        // // Préparer la requête SQL d'insertion
        // $sql = "INSERT INTO Tables (Numero_de_Table, Capacite, Etat) VALUES ('$numeroTable', '$capacite', '$etat')";

        return view('Table/gestion-table');
    }

    #--------------------------------------------------------------------
    # MODIFICATION
    #--------------------------------------------------------------------

    public function modifierTableForm(): string
    {
        // Récupérer la liste des tables depuis la base de données
        $tableModel = new \App\Models\Tables();
        $tableList = $tableModel->findAll();

        // $sql_clients = "SELECT ClientID, CONCAT(Nom, ' ', Prenom) AS NomComplet FROM Clients";



        return view('Table/modification-table', ['tableList' => $tableList]);
    }

    public function modifierTable(): string
    {
        $data = $this->request->getVar();
        $tableModel = new \App\Models\Tables();

        print('<pre>');
        print_r($data);
        print('</pre>');

        $id = $data['tableID'];

        $donnees = [
            'TABLEID' => $data['tableID'],
            'NUMERO_DE_TABLE' => $data['numero_de_Table'],
            'CAPACITE' => $data['capacite'],
            'ETAT' => $data['etat']
        ];
        $tableModel->save($donnees);

        

        return view('Table/gestion-table');
    }

    #--------------------------------------------------------------------
    # SUPPRESSION
    #--------------------------------------------------------------------
    
    public function suppressionTableForm(): string
    {
        // Récupérer la liste des tables depuis la base de données
        $tableModel = new \App\Models\Tables();
        $tableList = $tableModel->findAll();

        return view('Table/suppression-table', ['tableList' => $tableList]);
    }

    public function suppressionTable(): string
    {
        $data = $this->request->getVar();

        // print('<pre>');
        // print_r($data);
        // print('</pre>');

        $tableModel = new \App\Models\Tables();
        $tableModel->delete($data);

        return view('table/gestion-table');
    }

    #--------------------------------------------------------------------
    # LECTURE DE DONNEES
    #--------------------------------------------------------------------

    public function listeTable(): string
    {
        $tableModel = new \App\Models\Tables();
        $tableList = $tableModel->findAll();
        return view('Table/liste-table', ['tableList' => $tableList]);
    }
}
