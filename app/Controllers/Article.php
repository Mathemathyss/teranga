<?php

namespace App\Controllers;

class Article extends BaseController
{
    public function index(): string
    {
        return view('Article/gestion-article');
    }

    #--------------------------------------------------------------------
    # AJOUT
    #--------------------------------------------------------------------

    public function ajouterArticleForm(): string
    {
        return view('Article/ajout-article');
    }

    public function ajouterArticle(): string
    {
        $data = $this->request->getVar();
        $articleModel = new \App\Models\Articles();

        // print('<pre>');
        // print_r($data);
        // print('</pre>');

        $articleModel->insert([
            'NOM' => $data['nom'],
            'DESCRIPTION' => $data['description'],
            'PRIX' => $data['prix'],
        ]);

        // // Préparer la requête SQL d'insertion
        // $sql = "INSERT INTO Tables (Numero_de_Table, Capacite, Etat) VALUES ('$numeroTable', '$capacite', '$etat')";

        return view('Article/gestion-article');
    }

    #--------------------------------------------------------------------
    # MODIFICATION
    #--------------------------------------------------------------------

    public function modifierArticleForm()
    {
        // Récupérer la liste des articles depuis la base de données
        $articleModel = new \App\Models\Articles();
        $articleList = $articleModel->findAll();

        // Récupérer l'article sélectionné s'il y en a un
        $selectedArticle = null;
        $articleID = $this->request->getVar('articleID');
        if (!empty($articleID)) {
            $selectedArticle = $articleModel->find($articleID);
        }

        return view('Article/modification-article', [
            'articleList' => $articleList,
            'selectedArticle' => $selectedArticle,
        ]);
    }

    public function modifierArticle(): string
    {
        $data = $this->request->getVar();
        $articleModel = new \App\Models\Articles();

        // print('<pre>');
        // print_r($data);
        // print('</pre>');

        // $id = $data['tableID'];

        $donnees = [
            'ARTICLEID' => $data['articleID'],
            'NOM' => $data['nom'],
            'DESCRIPTION' => $data['description'],
            'PRIX' => $data['prix'],
        ];
        $articleModel->save($donnees);

        

        return view('Article/gestion-article');
    }

    #--------------------------------------------------------------------
    # SUPPRESSION
    #--------------------------------------------------------------------
    
    public function suppressionArticleForm(): string
    {
        // Récupérer la liste des articles depuis la base de données
        $articleModel = new \App\Models\Articles();
        $articleList = $articleModel->findAll();

        return view('Article/suppression-article', ['articleList' => $articleList]);
    }

    public function suppressionArticle(): string
    {
        $data = $this->request->getVar();

        // print('<pre>');
        // print_r($data);
        // print('</pre>');

        $articleModel = new \App\Models\Articles();
        $articleModel->delete($data);

        return view('Article/gestion-article');
    }

    #--------------------------------------------------------------------
    # LECTURE DE DONNEES
    #--------------------------------------------------------------------

    public function listeArticle(): string
    {
        $articleModel = new \App\Models\Articles();
        $articleList = $articleModel->findAll();
        return view('Article/liste-article', ['articleList' => $articleList]);
    }
}
