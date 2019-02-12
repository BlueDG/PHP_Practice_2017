<?php


// PHP  <---> PDO  <---> MySQL (SGBDR)  <---> SQL <--->  BDD (Base de données)
// Avant on faisait des fonctions pour interargir direct entre PHP et MySQL.
// Il existe des trucs comme MySQL comme Oracle etc, des gratuits des payants etc.
// le problème étant que si on change de logiciel, on doit changer les fonctions faites entre php et le logiciel MySQL

// Maintenant il existe PDO de façon à ne pas être embêté par les langages différents

/*
API: Application Programming Interface. 
Elle fait diaoguer deux elements differents qui ne parlent pas le même langage. 
Exemple: PDO


SGBDR: Système de gestion de base de données relationnel





// Étape 1: Créer une connexion de base de données => Créer un objet de la classe PDO
*/
$dsn = 'mysql:host=localhost;dbname=classicmodels'; /* le Data Source Main, on lui dit quel logiciel on utilise, puis l'hôte (serveur) sur lequel est installé le BDD puis le dbname, le nom de la base de données */
$user = 'guillaumedg'; /* le login */
$password = ''; /* mot de passe */

$pdo = new PDO($dsn, $user, $password);

// Exécuter une requête SQL pour indiquer l'encodage de communication entre PDO et la BDD
$pdo->exec('SET NAMES UTF8');


// Étape 2: Exécution d'une requête de sélection
// -> Du point de vue de PHP, une requête SQL est une simple chaine de caractères

// Exemple: requête de sélection des clients de la table customers
$sql = 'SELECT * FROM customers'; // cette requête devrait être collée dans le sql de phpmyadmin histoire de voir si ça marche bien dès le départ.

/**
* On exécute la requête directement avec la méthode query appliquée à l'objet PDO
* On récupère le résultat de la méthode query dans la variable $query
*/
$query = $pdo->query($sql);


/**
* On récupère TOUS les résultats d'un seul coup grâce à la méthode fetchAll(), ils seront stockés dans un tableau
* On pourra ensuite les afficher dans le code HTML par exemple
* Penser à faire un var_dump($customers) pour voir si on obtient bien les résultats souhaités
*/

$customers = $query->fetchAll(); // récupérer tous les résultats et les stocker dans un tab php


// var_dump($customers);












/***************************************** AUTRE REQUÊTE pour le client 172*****************************/

// On récupère d'une manière ou d'une autre le numéro d'un client à afficher
$customerNumber = 172;

// variable sql
// Requête pour sélectionner le client n°172

// NE JAMAIS FAIRE COMME CI DESSOUS: car risque de hack: une injection SQL
$sql = 'SELECT * FROM customers WHERE customerNumber = ' . $customerNumber; 



// SOLUTION : protéger les données insérées dans la requête SQL en "préparant" la requête
// 1. Remplacer les données à insérer dans la requête par "?"
$sql = 'SELECT * FROM customers WHERE customerNumber = ?'; // Le ? est un placeholder anonyme
// on remplace l'information par une point d'interrogation dans la requête: premier point de sécurité


// 2. Préparer la requête en faisant appel à la méthode prepare() de PDO
$query = $pdo->prepare($sql); // La flèche en PHP c'est comme le point en JS. La méthode en fait

// 3. Exécution de la requête
// on met un tab dans les paramètres avec dedans la variable $customerNumber qui correspond au ? 
$query->execute([$customerNumber]); 


// 4. Récupèrer les résultats
$myCustomer = $query->fetch(PDO::FETCH_ASSOC); // les :: signifient constante à l'intérieur d'une classe


// var_dump($myCustomer);














// Affichage = inclusion du template
include 'index.phtml';