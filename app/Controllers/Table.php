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

    #--------------------------------------------------------------------
    # SUPPRESSION
    #--------------------------------------------------------------------

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
