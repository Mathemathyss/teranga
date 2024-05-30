<?php

namespace App\Controllers;

use App\Models\Commandes;
use CodeIgniter\HTTP\RedirectResponse;

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

    public function ajouterCommandeForm(): string
    {
        // Récupérer la liste des clients depuis la base de données
        $reservModel = new \App\Models\Reservations();
        // Récupérer toutes les réservations avec les informations de nom et prénom des clients
        $reservList = $reservModel->getAllReservationsWithClientInfo();

        // Récupérer la liste des tables depuis la base de données
        $articleModel = new \App\Models\Articles();
        $articleList = $articleModel->findAll();
        // , ['clientsList' => $clientsList, 'tableList' => $tableList]


        return view('Commande/ajout-commande', ['reservList' => $reservList, 'articleList' => $articleList]);
    }

    public function ajouterCommande(): RedirectResponse
    {
        // $data = $this->request->getVar();

        // Récupérer les données du formulaire
        $reservationID = $this->request->getPost('reservationID');
        $statut = $this->request->getPost('statut');
        $quantites = $this->request->getPost('quantites');

        // Validation des données (ajoutez vos propres validations)

        // Charger le modèle de commande
        $commandeModel = new \App\Models\Commandes();

        // Créer la commande
        $commandeModel->insert([
            'RESERVATIONID' => $reservationID,
            'DATE_HEURE' => date('Y-m-d H:i:s'), // Date et heure actuelles
            'STATUT' => $statut
        ]);

        $commandeID = $commandeModel->getInsertID();

        // Charger le modèle pour la table DetailsCommande
        $detailsCommandeModel = new \App\Models\DetailsCommande();

        // Boucler sur les articles et quantités et insérer dans la table de détails de commande
        foreach ($quantites as $articleID => $quantite) {
            var_dump($articleID, $quantite);
            if ($quantite > 0) {
                $detailsCommandeModel->insert([
                    'COMMANDEID' => $commandeID,
                    'ARTICLEID' => $articleID,
                    'QUANTITÉ' => $quantite
                ]);
            }
        }
        // Rediriger vers la page de succès ou d'échec
        // if ($commandeID) {
        //     return redirect()->to(site_url('success')); // Remplacez 'success' par l'URL de votre page de succès
        // } else {
        //     return redirect()->to(site_url('error')); // Remplacez 'error' par l'URL de votre page d'erreur
        // }

        return redirect()->route('accueil');
    }

    public function modifierCommandeForm($commandeID): string
    {
        // var_dump($commandeID);
        // Charger le modèle de commande
        $commandeModel = new \App\Models\Commandes();
        // Requête pour récupérer les détails de la commande en jointure avec la table DetailsCommande
        $commande_details = $commandeModel->find($commandeID);

        // Récupérer la liste des clients depuis la base de données
        $reservModel = new \App\Models\Reservations();
        // Récupérer toutes les réservations avec les informations de nom et prénom des clients
        $reservList = $reservModel->getAllReservationsWithClientInfo();

        // Récupérer la liste des tables depuis la base de données
        $articleModel = new \App\Models\Articles();
        $articleList = $articleModel->findAll();

        // Charger le modèle pour la table DetailsCommande
        $detailsCommandeModel = new \App\Models\DetailsCommande();
        $detailsarticle = $detailsCommandeModel->where('COMMANDEID', $commandeID)->find();

        return view('Commande/modification-commande', ['commande_details' => $commande_details, 'reservations' => $reservList, 'articles' => $articleList, 'detailsarticle' => $detailsarticle]);
    }

    public function modifierCommande(): RedirectResponse
    {
        $data = $this->request->getVar();
        // var_dump($data);
        $commandeID = $data['commandeID'];
        //supprimer les données dans détails commande, les anciennes données
        $detailsCommandeModel = new \App\Models\DetailsCommande();
        $detailsarticle = $detailsCommandeModel->where('COMMANDEID', $commandeID)->delete();
        // Charger le modèle de commande
        $commandeModel = new \App\Models\Commandes();

        // Créer la commande
        $commandeModel->save([
            'COMMANDEID' => $commandeID,
            'RESERVATIONID' => $data['reservationID'],
            'DATE_HEURE' => date('Y-m-d H:i:s'), // Date et heure actuelles
            'STATUT' => $data['statut']
        ]);
        // Boucler sur les articles et quantités et insérer dans la table de détails de commande
        foreach ($data['quantites'] as $articleID => $quantite) {
            var_dump($articleID, $quantite);
            if ($quantite > 0) {
                $detailsCommandeModel->save([
                    'COMMANDEID' => $commandeID,
                    'ARTICLEID' => $articleID,
                    'QUANTITÉ' => $quantite
                ]);
            }
        }

        return redirect()->route('accueil');
    }
    public function suppressionCommandeForm(): string
    {
        $commandeModel = new \App\Models\Commandes();
        $commandes = $commandeModel->findAll();

        return view('Commande/suppression-commande', ['commandes' => $commandes]);
    }

    public function suppressionCommande(): RedirectResponse
    {
        $data = $this->request->getVar();
        // var_dump($data);
        $detailsCommandeModel = new \App\Models\DetailsCommande();
        $detailsCommandeModel->where('COMMANDEID', $data['commandeID'])->delete();
        $commandeModel = new \App\Models\Commandes();
        $commandeModel->where('COMMANDEID', $data['commandeID'])->delete();

        return redirect()->route('accueil');
    }

    public function encaisserForm(): string
    {

        return view('Encaisser/encaisser');
    }
    public function encaisser()
    {
        // Récupérer la liste des commandes depuis le modèle
        $commandeModel = new \App\Models\Commandes();
        $commandes = $commandeModel->findAll();

        // Récupérer l'ID de la commande sélectionnée (s'il existe)
        $selectedCommandeID = $this->request->getVar('commandeID');

        // Initialiser les variables pour le nom et le prénom du client
        $clientNom = '';
        $clientPrenom = '';
        $commande_details = '';
        $details_commande = '';

        // Si une commande est sélectionnée, récupérer les détails de la commande et les informations sur le client
        if (!empty($selectedCommandeID)) {
            $commande_details = $commandeModel->find($selectedCommandeID);

            // Requête pour récupérer les détails des articles de la commande sélectionnée
            $detailsCommandeModel = new \App\Models\DetailsCommande();
            $details_commande = $detailsCommandeModel
                ->select('detailscommande.*, articles.Prix AS PrixArticle, articles.Nom AS NomArticle')
                ->join('articles', 'detailscommande.ArticleID = articles.ArticleID')
                ->where('detailscommande.CommandeID', $selectedCommandeID)
                ->findAll();

            // Récupérer les informations sur le client à partir de la réservation associée à la commande
            $reservationModel = new \App\Models\Reservations();
            $reservation = $reservationModel->select('clients.NOM, clients.PRENOM')
                ->join('clients', 'reservation.ClientID = clients.ClientID')
                ->find($commande_details['RESERVATIONID']);

            // Récupérer le nom et le prénom du client
            $clientNom = $reservation['NOM'];
            $clientPrenom = $reservation['PRENOM'];
        }

        // Charger la vue avec les données récupérées
        return view('Encaisser/encaisser', [
            'commandes' => $commandes,
            'selectedCommandeID' => $selectedCommandeID,
            'commande_details' => $commande_details,
            'details_commande' => $details_commande,
            'clientNom' => $clientNom,
            'clientPrenom' => $clientPrenom
        ]);
    }
}
