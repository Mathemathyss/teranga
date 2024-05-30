<?php

namespace App\Models;

use CodeIgniter\Model;

class Commandes extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'commandes';
    protected $primaryKey       = 'COMMANDEID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['RESERVATIONID', 'DATE_HEURE', 'LIEU', 'STATUT'];

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


    // Fonction de recherche des commandes
    public function rechercherCommandes($term)
    {
        // Requête de recherche avec jointure pour récupérer les commandes, les informations de réservation et les détails de commande
        $this->select('commandes.*, r.RESERVATIONID, r.DATE_HEURE, CONCAT(cl.NOM, " ", cl.PRENOM, " (", r.RESERVATIONID, ")") AS NomPrenomReservation,
            GROUP_CONCAT(CONCAT(a.NOM, " (", dc.QUANTITÉ, ")") SEPARATOR ", ") AS PlatsCommandes');
        $this->join('reservation r', 'commandes.RESERVATIONID = r.RESERVATIONID');
        $this->join('clients cl', 'r.CLIENTID = cl.CLIENTID', 'left');
        $this->join('detailscommande dc', 'commandes.COMMANDEID = dc.COMMANDEID', 'left');
        $this->join('articles a', 'dc.ARTICLEID = a.ARTICLEID', 'left');
        $this->groupBy('commandes.COMMANDEID');

        // Si le terme de recherche n'est pas vide, appliquer les conditions de recherche
        if (!empty($term)) {
            // Échapper les caractères spéciaux pour éviter les injections SQL
            $term = $this->db->escapeLikeString($term);

            $this->like('commandes.RESERVATIONID', $term);
            $this->orLike('r.DATE_HEURE', $term);
            $this->orLike('a.NOM', $term);
            $this->orLike('cl.NOM', $term);
            $this->orLike('cl.PRENOM', $term);
            $this->orLike('commandes.STATUT', $term);
        } else {
            // Si aucun terme de recherche n'est spécifié, récupérer uniquement les Commandes en cours
            $this->where('commandes.STATUT', 'Enregistrée');
            $this->orWhere('commandes.STATUT', 'En cours de préparation');
        }

        // Exécuter la requête
        return $this->findAll();
    }


}
