<?php

    // DONNEES : quelles données (informations) veut-on afficher sur la page ? Où sont stockées ces informations ?
    
    // On veut afficher les données relatives à UN bon de commande particulier, plus précisément :
    // - les infos du client qui a passé la commande (table customers)
    // - la liste des produits commandés (tables orderdetails et products)
    
    
    
    // QUESTION : quel est le numéro de la commande que l'on souhaite afficher ?
    // REPONSE : on le récupère dans la chaîne de requête, c'est le paramètre appelé "orderNumber"
    
    // var_dump($_GET['orderNumber']); // ce qu'il y a entre crochet est choisi par toi. tu choisis du nom de l'url.
    // à voir également dans le lien href présent dans le phtml
    
    
    
    
    
    
    
    
    
    
    // ETAPE 1
    //////////////////////////////////////////////////
    
    // Connexion à la BDD (Base de données) avec PDO
    // DSN : Data Source Name
    // host : hôte (serveur) sur lequel est installée la BDD
    // dbname : database name : nom de la base de données
    $dsn = 'mysql:host=localhost;dbname=classicmodels';
    $user = 'guillaumedg'; // Utilisateur de la BDD
    $password = ''; // Password BDD
    
    // Documentation de la classe PDO : http://php.net/manual/fr/class.pdo.php
    $pdo = new PDO($dsn, $user, $password);
    
    // Exécuter une requête SQL pour indiquer l'encodage de communication entre PDO et la BDD
    $pdo->exec('SET NAMES UTF8');
    
    
    /////////////////////////////////////////////////////////////////////////
    // Récupérer les informations relatives au client qui a passé la commande
    
    // 1. Construire la requête SQL (testée au préalable dans phpmyadmin) et la stocker dans une variable $sql
    $sql = 'SELECT customerName, contactFirstName, contactLastName, addressLine1, addressLine2, city
            FROM customers
            INNER JOIN orders ON orders.customerNumber = customers.customerNumber
            WHERE orderNumber = ?'; // on met ? pour remplacer le nom exact de la donnée (sécurité)
    
    // 2. "Préparer" la requête avec la méthode "prepare" appliquée à l'objet PDO
    $query = $pdo->prepare($sql);
    
    
    // 3. Exécuter la requête avec la méthode "execute"
    $orderNumber = $_GET['orderNumber']; // On stocke le numéro de la commande dans la variable $orderNumber
    $query->execute([$orderNumber]);
    
    
    // 4. Récupérer les résultats
    $customer = $query->fetch(PDO::FETCH_ASSOC); // un seul client, un seul résultat attendu donc juste fetch()
    
    
    // 5. Tester les résultats avec un var_dump
    /*var_dump($customer);*/
    
   
   
   
   
    /////////////////////////////////////////////////////////////////////////
    // Récupérer ce qui faut afficher pour chaque commande dans le tableau (partie head et main)
    
    // 1. Construire la requête SQL (testée au préalable dans phpmyadmin) et la stocker dans une variable $sql
    $sql = 'SELECT productName, priceEach, quantityOrdered, priceEach * quantityOrdered AS totalPrice
            FROM orderdetails
            INNER JOIN products ON orderdetails.productCode = products.productCode
            WHERE orderNumber = ?
            ORDER BY orderLineNumber'; // on met ORDER car il y a plusieurs lignes traitant de trucs différents donc on les distingue en utilisant ORDER BY
    
    
    // 2. "Préparer" la requête avec la méthode "prepare" appliquée à l'objet PDO
    $query = $pdo->prepare($sql);
    
    
    // 3. Exécuter la requête avec la méthode "execute"
    /*$orderNumber = $_GET['orderNumber'];*/ // le numéro de la commande est déjà stocké dans la variable $orderNumber
    $query->execute([$orderNumber]);
    
    
    // 4. Récupérer les résultats
    $orderDetails = $query->fetchAll(PDO::FETCH_ASSOC); // plusieurs produits, plusieurs résultats attendus donc fetchAll()
    
    
    // 5. Tester les résultats avec un var_dump
    
    // var_dump($orderDetails);//
    
    
    /////////////////////////////////////////////////////////////////////////
    // Récupérer le total de la commande
    
    // 1. Construire la requête SQL (testée au préalable dans phpmyadmin) et la stocker dans une variable $sql
    $sql = 'SELECT SUM(quantityOrdered * priceEach) AS totalAmount
            FROM orderdetails
            WHERE orderNumber = ?';
           
    
    
    // 2. "Préparer" la requête avec la méthode "prepare" appliquée à l'objet PDO
    $query = $pdo->prepare($sql);
    
    
    // 3. Exécuter la requête avec la méthode "execute"
    $query->execute([$orderNumber]);
    
    
    // 4. Récupérer les résultats
    $totalAmount = $query->fetchColumn(); // UNE valeur seulement, UN montant, UNE colomne SQL 
    
    /*
    Possible aussi:
    
    $result = $query->fetch();
    $totalAmount = $result['totalAmount'];
    
    */
    
    
    // 5. Tester les résultats avec un var_dump
    
    //var_dump($totalAmount);//
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // ETAPE 2 : Affichage (inclusion du template)
    ////////////////////////////////////////////////
    // AFFICHAGE
    include 'order-form.phtml';