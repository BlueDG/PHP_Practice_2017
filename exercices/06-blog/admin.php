<?php


// connexion 
// avec inclusion de dépendance (de fichiers dont dépend notre script).
// en gros tu compartimentes, tu mets un lien vers un autre php qui contient un code que tu réutiliseras
include 'app/connexion.php';
// tu peux aussi remplacer include par require

// on copie d'index car c'est une sorte d'index pour l'administrateur
// sauf que ce sera cette fois sous la forme d'un tableau 

// requête SQL avec LEFT(champsÀcouper, nbreMaxPourExtrait)
$sql = 'SELECT Post.Id AS Article_Id, Title, Created_At, Firstname, Lastname
        FROM Post
        INNER JOIN Author ON Post.Author_Id = Author.Id
        ORDER BY Created_At DESC'; 
        
// préparer requête SQL
$query = $pdo->prepare($sql);

// executer requête
$query->execute();

// Récupérer les résultats
$listArticle = $query->fetchAll(); // Plusieurs résultats attendus => on utilise la méthode fetchAll()


session_start();
$message = $_SESSION['message'];
        

/* REQUÊTE POUR AJOUTER AUTEUR DANS PHP PHTML */

// requête SQL avec LEFT(champsÀcouper, nbreMaxPourExtrait)
$sql = 'SELECT `Lastname`, `Firstname`, `Id` 
        FROM `Author`
        ORDER BY Lastname, Firstname';
        
// préparer requête SQL
$query = $pdo->prepare($sql);

// executer requête
$query->execute();

// Récupérer les résultats
$listAuthor = $query->fetchAll(); // Plusieurs résultats attendus => on utilise la méthode fetchAll()





/* INCLUSION DU TEMPLATE */

// Inclusion du template 

// choix du template spécifique à la page d'accueil
$template = 'admin';
    

include 'views/layout.phtml';