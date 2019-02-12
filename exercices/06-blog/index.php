<?php

require 'autoload.php';
require 'utilities.php';

/* 1°) Traitements PHP (fichier index.php)
            -> Sélection des données des articles
                - Connexion BDD
                - Construction requête SQL
                - Préparation requête
                - Exécution requête
                - Récupération résultats
                */
            
            
    // connexion 
    // avec inclusion de dépendance (de fichiers dont dépend notre script).
    // en gros tu compartimentes, tu mets un lien vers un autre php qui contient un code que tu réutiliseras
    // elle était là mais tu l'as mise dans la fonction requête (ds utilises.php). parceque si elle reste en dehors de la fonction elle sera pas reconnue
    // tu peux aussi remplacer include par require
    

    // requête SQL avec LEFT(champsÀcouper, nbreMaxPourExtrait)
    $sql = 'SELECT Post.Id AS Article_Id, Title, LEFT(Contents, 150) AS Abstract, Created_At, Firstname, Lastname
            FROM Post
            INNER JOIN Author ON Post.Author_Id = Author.Id
            ORDER BY Created_At DESC'; 
            
    // appel de la fonction queryAll() et stockage des résultats dans la variable $posts 
    // on crée une variable car on a un return dans la fonction
    // comme une tasse pour recup le cafe de queryAll
    
    // création d'un objet de la classe Database
    $db = new Database();
    
    
    $listArticle = $db->queryAll($sql);
    
    // var_dump($listArticle);
   

    // Inclusion du template 





// choix du template spécifique à la page d'accueil
$template = 'index';
// Inclusion du fichier de template principal (commun à toutes les pages du site)
include 'views/layout.phtml';



