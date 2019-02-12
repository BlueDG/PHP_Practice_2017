<?php

// l'idée ici est de regrouper ce qui traite de la connexion à la BDD et l'execution des requêtes SQL
/**
 * - le fichier connexion.php
 * - les 3 fonctions utilitaires query(All), query(One) et executeSql()
 * 
 * */

class Database {
    
    
    // Propriétés
    private $pdo;
    
    
    
    // Constructeur
    public function __construct()
    {
        // On fait appel à la méthode getPDOConnection() pour créer un objet PDO
        // et on stocke cet objet dans la propriété 'pdo' de l'objet courant
        $this->pdo = $this->getPDOConnection('localhost', 'blog', 'guillaumedg', '');
    }
    
    
    // Méthodes
    
    public function getPDOConnection($host, $dbname, $user, $password)
    {
        
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;
    // on crée $options afin d'insérer automatiquement le FETCH ASSOC dans les fetch
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Gestion des erreurs SQL
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Type de récupération des résultats par défaut 
    ];
    
    // on ajoute options dedans par default
    $pdo = new PDO($dsn, $user, $password, $options);
    $pdo->exec('SET NAMES UTF8');
    
    // Paramétrage de la liaison PHP <-> MySQL, les données sont encodées en UTF-8.
    $pdo->exec('SET NAMES UTF8');
    
    
    // retour du résultat 
    return $pdo;
    }
    
    
    
    
    
    function queryAll($sql, array $params = [])
{
    
    // connexion
    
    
    // Préparation la requête à exécuter
    $query = $this->pdo->prepare($sql);
    
    // Exécution de la requête avec les paramètres éventuels
    $query->execute($params);
    
    
    // Retour des résultats de la requête
    return $query->fetchAll();
}


    function queryOne($sql, array $params = [])
{
  // connexion
    
    
    // Préparation la requête à exécuter
    $query = $this->pdo->prepare($sql);
    
    // Exécution de la requête avec les paramètres éventuels
    $query->execute($params);
    
    
    // Retour des résultats de la requête
    return $query->fetch();  
}
  
  
    function executeSql($sql, array $params = [])
{
    // Connexion à la BDD
    // plus besoin de lui cqr connexion quto dans constructeur database
    // require 'app/connexion.php';
    
    // Préparation la requête à exécuter
    $query = $this->pdo->prepare($sql);
    
    // Exécution de la requête avec les paramètres éventuels
    $query->execute($params);
} 
    
    
}