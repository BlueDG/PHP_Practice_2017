<?php


// Inclusion des dépendances (connexion à la BDD)
require 'app/connexion.php';


// Récupération de l'identifiant de l'article à supprimer dans l'url (page admin donc!)
$articleId = $_GET["articleId"];



// Suppression de l'article en BDD

// 1. Construction de la requête de suppression (https://sql.sh/cours/delete)
$sql = 'DELETE 
        FROM Post
        WHERE Id = ?';

// 2. Préparation de la requête de suppression
$query = $pdo->prepare($sql);

// 3. Exécution de la requête de suppression
$query->execute([$articleId]);


// Redirection vers le tableau de bord (admin.php) 
header('Location: admin.php');
exit;


