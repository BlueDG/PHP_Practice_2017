<?php

require 'app/connexion.php'; // Connexion à la BDD
require 'utilities.php';

// Récupération de l'id de l'article à modifier depuis l'url 
// là tu chopes le nom de l'URL "article_Id" que tu as créé dans le PHTML admin.phtml
// tu chopes le l'adresse URL pour faire un lien et ainsi insérer ce que tu veux dans la page grâce à la requête SQL qui suit
    $articleId = $_GET['articleId'];
    

// le $_POST ne vient pas de toi. Il provient de PHP MyAdmin
if(empty($_POST)){
    
    // Sélection des auteurs pour afficher la liste déroulante des auteurs (optionnel)
        
    // 1. Construire la requête SQL
    $sql = 'SELECT Id, Firstname, Lastname
            FROM Author
            ORDER BY Lastname, Firstname';
    
    $authors = queryAll($sql);
    
    /*// 2. Préparation de la requête
    $query = $pdo->prepare($sql);
    
    // 3. Exécution de la requête
    $query->execute();
    
    // 4. Récupération des résultats
    $authors = $query->fetchAll();*/
    
    
    $sql = 'SELECT Id, Title, Contents, Author_Id
            FROM Post
            WHERE Id = ?';
    
    $article = queryOne($sql, [$articleId]);
    
    
    /*$query = $pdo->prepare($sql);
    $query->execute([$articleId]);
    $article = $query->fetch(); // 1 article = 1 résultat*/
    
    $template = 'edit_post';
    
    include 'views/layout.phtml';
}

else{
    
    $sql = 'UPDATE Post 
            SET Title = ?, Contents = ?, Author_Id = ?
            WHERE Id = ?';
    
    /* $query = $pdo->prepare($sql); */
    
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $articleId = $_POST['articleId'];
    $author = $_POST['author'];
    
    
   /* $query->execute([$title, $contents, $author, $articleId]);
   var_dump($_POST); */
   
   executeSql($sql, [$title, $contents, $author, $articleId]]);
        
    // Redirection vers le tableau de bord
    header('Location: admin.php');
    exit;
}


















