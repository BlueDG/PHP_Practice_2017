<?php


// Inclusion des dépendances (connexion à la BDD)
require 'app/connexion.php';


// Récupération de l'identifiant de l'article à supprimer dans l'url (page admin donc!)
// le authorId BLEU EST CELUI A GAUCHE DANS LA REQUETE HTTP DANS MAIN.js LIGNE 19
$authorId = $_POST["authorId"];



// Suppression de l'article en BDD

// 1. Construction de la requête de suppression (https://sql.sh/cours/delete)
$sql = 'DELETE 
        FROM Author
        WHERE Id = ?';

// 2. Préparation de la requête de suppression
$query = $pdo->prepare($sql);

// 3. Exécution de la requête de suppression
$query->execute([$authorId]);


// Redirection vers le tableau de bord (admin.php) 
// header('Location: admin.php');
// exit;

echo 'Suppression auteur terminée';


