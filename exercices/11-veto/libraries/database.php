<?php

// connexion BDD
$dsn = 'mysql:host=localhost;dbname=veterinaire';
$user = 'guillaumedg'; 
$password = ''; 
$pdo = new PDO($dsn, $user, $password, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);  
$pdo->exec('SET NAMES UTF8');



// requête de type INSERT
function addDog($nom, $race, $age, $vaccination, $photo)
{
    global $pdo; // on insère une variable extérieure dans la fonction
    
    $sql = 'INSERT INTO chien (nom, race, age, vaccination, photo)
        VALUES (?, ?, ?, ?, ?)';
        
    $query = $pdo->prepare($sql);
    $query->execute([$nom, $race, $age, $vaccination, $photo]);  
}


// requête de type DELETE
function deleteDog($id) // un param = un ? // la fonction a besoin de ces variables
{
    global $pdo;
    $sql = 'DELETE  FROM chien WHERE Id = ?';

    $query=$pdo->prepare($sql);
    $query->execute([$id]);
}

// requête de type UPDATE
function updateDog($nom, $race, $age, $photo, $vaccination, $id)
{
    global $pdo;
    $sql = 'UPDATE chien SET nom = ?, race = ?, age = ?, photo = ?, vaccination = ? WHERE Id = ?';

    $query=$pdo->prepare($sql);
    $query->execute([$nom, $race, $age, $photo, $vaccination, $id]);
}

// requête de type SELECT
function getDogs()
{
    global $pdo;
    $sql = "SELECT  `Id` ,  `nom` ,  `race` ,  `age` ,  `vaccination` ,  `photo`  
        FROM  `chien` 
        WHERE 1"; 

    $query = $pdo->prepare($sql);
    $query->execute();
    $resultats = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $resultats;
}

function getDog($id)
{
    global $pdo;
    $sql = 'SELECT * FROM chien WHERE Id = ?';

    $query=$pdo->prepare($sql);
    $query->execute([$id]);
    $chien = $query->fetch();
    
    return $chien;
}