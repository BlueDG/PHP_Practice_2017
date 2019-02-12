<?php

require 'app/connexion.php'; 

// Récupération de l'id de l'auteur à modifier depuis l'url 
// là tu chopes le nom de l'URL "author_Id" que tu as créé dans le PHTML admin.phtml
// tu chopes l'adresse URL pour faire un lien et ainsi insérer ce que tu veux dans la page grâce à la requête SQL qui suit
    $authorId = $_GET['authorId'];
    

// le $_POST ne vient pas de toi. Il provient de PHP MyAdmin
if(empty($_POST)){
    
    $sql = 'SELECT Id, Firstname, Lastname
            FROM Author
            WHERE Id = ?';
    
    $query = $pdo->prepare($sql);
    $query->execute([$authorId]);
    $author = $query->fetch(); // 1 auteur = 1 résultat
    
    $template = 'edit_author';
    
    include 'views/layout.phtml';
}

else{
    
    $sql = 'UPDATE Author 
            SET Lastname = ?, Firstname = ?
            WHERE Id = ?';
    
    $query = $pdo->prepare($sql);
    $Lastname = $_POST['lastname'];
    $Firstname = $_POST['firstname'];
    $authorId = $_POST['id'];
    
    
   $query->execute([$Lastname, $Firstname, $authorId]);
        
        // Redirection vers le tableau de bord
        header('Location: admin.php');
        exit;
}

// var_dump($query->errorInfo());
















