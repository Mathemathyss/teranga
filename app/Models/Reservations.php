<?php

namespace App\Models;

use CodeIgniter\Model;

class Reservations extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'RESERVATION';
    protected $primaryKey       = 'RESERVATIONID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['CLIENTID', 'DATE_HEURE', 'NOMBRE_DE_PERSONNE'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllReservationsWithClientInfo()
    {
        // Joindre la table Clients pour obtenir les noms et prénoms associés aux réservations
        $builder = $this->db->table('reservation');
        $builder->select('reservation.*, clients.Nom, clients.Prenom');
        $builder->join('clients', 'clients.ClientID = reservation.ClientID', 'left');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function rechercherReservations($term)
    {
        // Requête de recherche avec jointure pour récupérer les réservations, les informations client et les tables associées
    $this->select('reservation.*, c.Nom as NomClient, c.Prenom as PrenomClient, GROUP_CONCAT(t.Numero_de_Table) as TablesAssociees');
    $this->join('CLIENTS c', 'reservation.ClientID = c.CLIENTID', 'left');
    $this->join('TABLE_RESERVE tr', 'reservation.RESERVATIONID = tr.RESERVATIONID', 'left');
    $this->join('TABLES t', 'tr.TABLEID = t.TABLEID', 'left');

    // Groupement par réservation pour obtenir les tables associées sous forme de liste séparée
    $this->groupBy('reservation.RESERVATIONID');

    // Si le terme de recherche n'est pas vide, appliquer les conditions de recherche
    if (!empty($term)) {
        // Échapper les caractères spéciaux pour éviter les injections SQL
        $term = $this->db->escapeLikeString($term);

        $this->like('c.Nom', $term);
        $this->orLike('c.Prenom', $term);
        $this->orLike('reservation.ClientID', $term);
        $this->orLike('reservation.Date_Heure', $term);
        $this->orLike('reservation.Nombre_de_Personne', $term);
    }else {
        // Si aucun terme de recherche n'est spécifié, récupérer uniquement les réservations à venir
        $this->where('reservation.Date_Heure >', date('Y-m-d H:i:s'));
    }
    
    // Exécuter la requête
    return $this->findAll();
    }
}
