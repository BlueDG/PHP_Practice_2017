<?php

    // Traitements PHP (requêtes SQL , etc)
    /**
     * 1- tu crées le lien avec la BDD
     * 2- tu crées la page PHTML 
     * 3- tu fais le code Else permettant d'utiliser les données de la BDD et faisant le lien avec ta page PHTML
     * 4_ tu fais le code If permettant d'ajouter de nouvelles données à la BDD
    */
    
    
    
    
   
    // 1.)
    // ******************************************************
    // Création de la connexion à la base de données avec PDO
    // ******************************************************
    
    // connexion 
    // avec inclusion de dépendance (de fichiers dont dépend notre script).
    // en gros tu compartimentes, tu mets un lien vers un autre php qui contient un code que tu réutiliseras
    include 'autoload.php';
    // tu peux aussi remplacer include par require
    
    
    
    // création d'un objet database dans une variable
    $db = new Database();
    
    
    
    

    // 2.)
    // ******************************************************
    // Ajout d'un nouvel article
    // ******************************************************
    
    if( !empty($_POST) ){
    // ou if( empty($_POST) == false)
    // ou if(empty ($_POST) != true)
    
    // 1. Construire la requête d'insertion et la stocker dans une variable $sql
    $sql = 'INSERT INTO `Post`( `Title`, `Contents`, `Created_At`, `Author_Id`) 
           VALUES (?,?,NOW(),?)';
        
    // 2. Préparer la requête
    $query = $pdo->prepare($sql);
    
    // 3. Exécuter la requête
    // en bleu c'est le name des balises phtml
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $authorId = $_POST['authorId'];
    
    // ce qu'il y a après les $ va remplacer les ? plus en haut
    $db->executeSql($sql, [$title, $contents, $authorId]);
    
    session_start();
    $_SESSION['message'] = "Votre article a bien été enregistré.";
    
    
    
    
    // /!\ Att. ici requête d'insertion = requête d'action, pas de résultats à récupérer
    
    // var_dump($_POST); // qu'il y a til de mauvais dans le form? 
    // var_dump($authorId); // y a t-il quelque chose dans authorId? 
    // var_dump($query->errorInfo()); // y a t-il des erreurs? 
    
    // Astuce : aller vérifier dans phpmyadmin directement si les données ont bien été insérées
    
    // Une fois que tout est ok => Redirection vers la page d'accueil (index.php)   
     header('Location: admin.php'); // ce système permet à l'internaute de ne pas tomber sur une page blanche (représentant notre code php)
     exit; // on termine le script pour éviter que PHP continue de tourner non stop
        
        
    }
    
    
    // 3.)
    // ***************************************************
    // chercher les auteurs pour afficher la liste déroulante dans le formulaire
    // On affiche la page PHTML puis on fait actionne la possibilité d'une requête SQL pour sélectionner la liste des auteurs
    // ***************************************************
    
    else {
        
       // 1. Construire la requête SQL
        $sql = 'SELECT `Id`, `Firstname`, `Lastname` 
                FROM `Author`
                ORDER BY Lastname, Firstname';
         
         $authors = $db->queryAll($sql);    
         
        
        
        
        // 2. préparation de la requête avec PDO
        /*$query = $pdo->prepare($sql);
        // 3. exécution de la requête
        $query->execute();
        /**
         * On prépare les requêtes avec PDO principalement pour des raisons de sécurité (injections SQL)
         * Cependant s'il n'y a aucun risque (car les infos récupérées par SQL ne sont pas extérieures comme une donnée de formulaire, d'un URL etc. quoique ce soit qui puisse varier), la préparation n'est pas obligatoire
         * On remplacerait dans l'exemple ci-dessus les étapes 2 et 3 par une seule étape :
         * 
         * $query = $pdo->query($sql);
         */ 
    
        
        // 4. récupération des résultats
        /*$authors = $query->fetchAll(PDO::FETCH_ASSOC);
        // 5. vérification des résultats
        // test // var_dump($authors);
        */
        
        
        
        
        // choix du template spécifique à la page du formulaire
        $template = 'add_post';
        // Inclusion du fichier de template principal (commun à toutes les pages du site)
        include 'views/layout.phtml';
        
    }
    
    
    

