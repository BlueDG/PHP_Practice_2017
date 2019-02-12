<?php

// récup la research de l'internaute dans le paramètre de l'URL (data:)
$search = $_GET['data'];

// requête sql pour rechercher les clients dont le nom contient la chaine recherchée

// connexion
$dsn = 'mysql:host=localhost;dbname=classicmodels';
$user = 'guillaumedg'; // Utilisateur de la BDD
$password = ''; // Password BDD
$pdo = new PDO($dsn, $user, $password);
$pdo->exec('SET NAMES UTF8');



// requête pour trouver clients
$sql = 'SELECT customerName, customerNumber
        FROM customers
        WHERE customerName LIKE ?
        ORDER BY customerName';



$query = $pdo->prepare($sql);
$query->execute(['%' . $search . '%']); 
$results = $query->fetchAll(PDO::FETCH_ASSOC); 

// Je teste ce que je récupère comme résultats de ma requête
// var_dump($results);


// On va convertir le tableau $results en une chaîne de caractères pour la retourner en réponse http au client
// C'est ce qu'on appelle la "sérialisation"
// on utiliser le format JSON pour faire voyager les données
echo json_encode($results);






