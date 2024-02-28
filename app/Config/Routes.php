<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#--------------------------------------------------------------------
# CLIENT
#--------------------------------------------------------------------

$routes->get('/gestion-client', 'Client::index', ['as' => 'Gestion_Client']);
$routes->get('/liste-client', 'Client::listeClient', ['as' => 'liste_client']);

$routes->get('/ajout-client', 'Client::ajouterClientForm', ['as' => 'Ajout_Client_Form']);
//méthode d'ajout en base de donnnée associée
$routes->get('/ajout-client', 'Client::ajouterClient', ['as' => 'Ajout_Client']);

$routes->get('/modification-client', 'Client::modifierClientForm', ['as' => 'Modification_Client_Form']);
//méthode de modification en base de donnnée associée
$routes->get('/modification-client', 'Client::modifierClient', ['as' => 'Modification_Client']);

$routes->get('/suppression-client', 'Client::suppressionClientForm', ['as' => 'Suppression_Client_Form']);
//méthode de suppression en base de donnnée associée
$routes->get('/suppression-client', 'Client::suppressionClient', ['as' => 'Suppression_Client']);


#--------------------------------------------------------------------
# ARTICLE
#--------------------------------------------------------------------

$routes->get('/gestion-article', 'Article::index', ['as' => 'Gestion_Article']);
$routes->get('/liste-article', 'Article::listeArticle', ['as' => 'Liste_Article']);

$routes->get('/ajout-article', 'Article::ajouterArticleForm', ['as' => 'Ajout_Article_Form']);
//méthode d'ajout en base de donnnée associée
$routes->get('/ajout-article', 'Article::ajouterArticle', ['as' => 'Ajout_Article']);

$routes->get('/modification-article', 'Article::modifierArticleForm', ['as' => 'Modification_Article_Form']);
//méthode de modification en base de donnnée associée
$routes->get('/modification-article', 'Article::modifierArticle', ['as' => 'Modification_Article']);

$routes->get('/suppression-article', 'Article::suppressionArticleForm', ['as' => 'Suppression_Article_Form']);
//méthode de suppression en base de donnnée associée
$routes->get('/suppression-article', 'Article::suppressionArticle', ['as' => 'Suppression_Article']);

#--------------------------------------------------------------------
# Table
#--------------------------------------------------------------------

$routes->get('/gestion-table', 'Table::index', ['as' => 'Gestion_Table']);
$routes->get('/liste-table', 'Table::listeTable', ['as' => 'Liste_Table']);

$routes->get('/ajout-table', 'Table::ajouterTableForm', ['as' => 'Ajout_Table_Form']);
//méthode d'ajout en base de donnnée associée
$routes->get('/ajout-table', 'Table::ajouterTable', ['as' => 'Ajout_Table']);

$routes->get('/modification-table', 'Table::modifierTableForm', ['as' => 'Modification_Table_Form']);
//méthode de modification en base de donnnée associée
$routes->get('/modification-table', 'Table::modifierTable', ['as' => 'Modification_Table']);

$routes->get('/suppression-table', 'Table::suppressionTableForm', ['as' => 'Suppression_Table_Form']);
//méthode de suppression en base de donnnée associée
$routes->get('/suppression-table', 'Table::suppressionTable', ['as' => 'Suppression_Table']);


#--------------------------------------------------------------------
# Reservation
#--------------------------------------------------------------------






#--------------------------------------------------------------------
# Commande
#--------------------------------------------------------------------





//page principale
$routes->get('/', 'Home::index');
