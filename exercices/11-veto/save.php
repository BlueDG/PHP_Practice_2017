<?php


// var_dump($_POST);

// 1) connexion à la BDD
require_once 'libraries/database.php';

// 2) Récupération des données dans le POST (envoi du formulaire)
$nom = $_POST['dogName'];
// var_dump($nom);
$race = $_POST['dogRace'];
$age = $_POST['dogAge'];
$vaccination = $_POST['dogVaccination'];
$photo = $_POST['dogPhoto'];

// 3) Requête de type INSERT 
addDog($nom, $race, $age, $vaccination, $photo);

header('Location: index.php');
exit();




