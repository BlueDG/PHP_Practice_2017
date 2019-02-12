<?php

    // Traitements PHP
    
    
    // ETAPE 1 : Aller chercher dans la BDD les données concernant les commandes (table orders)
    /////////////////////////////////////
    
    // Créer une connexion à la base de données => créer un objet de la classe PDO
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
    // Récupérer les informations 
    
    // 1. Construire la requête SQL dans une chaîne de caractères
    $sql = 'SELECT  orderNumber, orderDate, shippedDate, status FROM orders';
    
    // 2. Préparer la requête avec PDO
    $query = $pdo->prepare($sql);
    
    // 3. Exécuter la requête
    $query->execute(); // Ici pas de données à insérer dans la requête (pas de ?) => pas de paramètre à la méthode execute
    
    // 4. Récupérer les résultats
    $orders = $query->fetchAll(PDO::FETCH_ASSOC); // Plusieurs résultats attendus => on utilise la méthode fetchAll()
    
    // Je teste ce que je récupère comme résultats de ma requête
   // var_dump($orders);//
    
    
    

    
    // ETAPE 2 : Affichage (inclusion du template)
    ////////////////////////////////////////////////
    
    
    include 'index.phtml';