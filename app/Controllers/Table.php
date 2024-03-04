<?php

namespace App\Controllers;

class Table extends BaseController
{
    public function index(): string
    {
        return view('Table/gestion-table');
    }

    public function ajouterTableForm(): string
    {
        return view('Table/ajout-table');
    }
}
