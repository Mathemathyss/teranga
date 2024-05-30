<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#--------------------------------------------------------------------
# CLIENT
#--------------------------------------------------------------------

$routes->get('/gestion-client', 'Client::index', ['as' => 'Gestion_Client']);
$routes->get('/liste-client', 'Client::listeClient', ['as' => 'Liste_Client']);

$routes->get('/ajout-client', 'Client::ajouterClientForm', ['as' => 'Ajout_Client_Form']);
//méthode d'ajout en base de donnnée associée
$routes->post('/ajout-client', 'Client::ajouterClient', ['as' => 'Ajout_Client']);

$routes->get('/modification-client', 'Client::modifierClientForm', ['as' => 'Modification_Client_Form']);
//méthode de modification en base de donnnée associée
$routes->post('/modification-client', 'Client::modifierClient', ['as' => 'Modification_Client']);

$routes->get('/suppression-client', 'Client::suppressionClientForm', ['as' => 'Suppression_Client_Form']);
//méthode de suppression en base de donnnée associée
$routes->post('/suppression-client', 'Client::suppressionClient', ['as' => 'Suppression_Client']);


#--------------------------------------------------------------------
# ARTICLE
#--------------------------------------------------------------------

$routes->get('/gestion-article', 'Article::index', ['as' => 'Gestion_Article']);
$routes->get('/liste-article', 'Article::listeArticle', ['as' => 'Liste_Article']);

$routes->get('/ajout-article', 'Article::ajouterArticleForm', ['as' => 'Ajout_Article_Form']);
//méthode d'ajout en base de donnnée associée
$routes->post('/ajout-article', 'Article::ajouterArticle', ['as' => 'Ajout_Article']);

$routes->get('/modification-article', 'Article::modifierArticleForm', ['as' => 'Modification_Article_Form']);
//méthode de modification en base de donnnée associée
$routes->post('/modification-article', 'Article::modifierArticle', ['as' => 'Modification_Article']);

$routes->get('/suppression-article', 'Article::suppressionArticleForm', ['as' => 'Suppression_Article_Form']);
//méthode de suppression en base de donnnée associée
$routes->post('/suppression-article', 'Article::suppressionArticle', ['as' => 'Suppression_Article']);

#--------------------------------------------------------------------
# Table
#--------------------------------------------------------------------

$routes->get('/gestion-table', 'Table::index', ['as' => 'Gestion_Table']);
$routes->get('/liste-table', 'Table::listeTable', ['as' => 'Liste_Table']);

$routes->get('/ajout-table', 'Table::ajouterTableForm', ['as' => 'Ajout_Table_Form']);
//méthode d'ajout en base de donnnée associée
$routes->post('/ajout-table', 'Table::ajouterTable', ['as' => 'Ajout_Table']);

$routes->get('/modification-table', 'Table::modifierTableForm', ['as' => 'Modification_Table_Form']);
//méthode de modification en base de donnnée associée
$routes->post('/modification-table', 'Table::modifierTable', ['as' => 'Modification_Table']);

$routes->get('/suppression-table', 'Table::suppressionTableForm', ['as' => 'Suppression_Table_Form']);
//méthode de suppression en base de donnnée associée
$routes->post('/suppression-table', 'Table::suppressionTable', ['as' => 'Suppression_Table']);


#--------------------------------------------------------------------
# Reservation
#--------------------------------------------------------------------

$routes->match(['get','post'],'/gestion-reservation', 'Reservation::index', ['as' => 'Gestion_Reservation']);
$routes->get('/liste-reservation', 'Reservation::listeReservation', ['as' => 'Liste_Reservation']);

$routes->get('/ajout-reservation', 'Reservation::ajouterReservationForm', ['as' => 'Ajout_Reservation_Form']);
//méthode d'ajout en base de donnnée associée
$routes->post('/ajout-reservation', 'Reservation::ajouterReservation', ['as' => 'Ajout_Reservation']);

$routes->get('/modification-reservation/(:num)', 'Reservation::modifierReservationForm/$1', ['as' => 'Modification_Reservation_Form']);
//méthode de modification en base de donnnée associée
$routes->post('/modification-reservation', 'Reservation::modifierReservation', ['as' => 'Modification_Reservation']);

$routes->get('/suppression-reservation', 'Reservation::suppressionReservationForm', ['as' => 'Suppression_Reservation_Form']);
//méthode de suppression en base de donnnée associée
$routes->post('/suppression-reservation', 'Reservation::suppressionReservation', ['as' => 'Suppression_Reservation']);


#--------------------------------------------------------------------
# Commande
#--------------------------------------------------------------------

$routes->match(['get','post'],'/gestion-commande', 'Commande::index', ['as' => 'Gestion_Commande']);
$routes->get('/liste-commande', 'Commande::listeCommande', ['as' => 'Liste_Commande']);

$routes->get('/ajout-commande', 'Commande::ajouterCommandeForm', ['as' => 'Ajout_Commande_Form']);
//méthode d'ajout en base de donnnée associée
$routes->post('/ajout-commande', 'Commande::ajouterCommande', ['as' => 'Ajout_Commande']);

$routes->get('/modification-commande/(:num)', 'Commande::modifierCommandeForm/$1', ['as' => 'Modification_Commande_Form']);
//méthode de modification en base de donnnée associée
$routes->post('/modification-commande', 'Commande::modifierCommande', ['as' => 'Modification_Commande']);

$routes->get('/suppression-commande', 'Commande::suppressionCommandeForm', ['as' => 'Suppression_Commande_Form']);
//méthode de suppression en base de donnnée associée
$routes->post('/suppression-commande', 'Commande::suppressionCommande', ['as' => 'Suppression_Commande']);

$routes->get('/suppression-commande/(:num)', 'Commande::suppressionCommande2/$1', ['as' => 'Suppression_Commande_Direct']);


#--------------------------------------------------------------------
# Encaisser
#--------------------------------------------------------------------
$routes->get('/encaisser', 'Commande::encaisser', ['as' => 'Encaisser_Form']);



//page principale
$routes->get('/', 'Home::index', ['as' => 'accueil']);
