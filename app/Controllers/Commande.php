<?php

namespace App\Controllers;

use App\Models\Commandes;

class Commande extends BaseController
{
    public function index(): string
    {
        // Récupérer le terme de recherche s'il existe
        $term = $this->request->getPost('term');

        // Charger le modèle de commande
        $commandeModel = new Commandes();

        // Récupérer le terme de recherche s'il existe
        // $term = $this->request->getVar('search');

        // Rechercher les commandes en fonction du terme de recherche
        $data['resultats'] = $commandeModel->rechercherCommandes($term);

        // Passer les résultats à la vue
        // $data['commandes'] = $commandes;

        // Charger la vue avec les résultats de la recherche
        return view('Commande/gestion-commande', $data);
    }
}