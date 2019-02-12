<?php

//  var_dump($_POST);

// connexion à la BDD
require_once 'libraries/database.php';

// extraction des infos du POST
$nom = $_POST['dogName'];
$race = $_POST['dogRace'];
$age = $_POST['dogAge'];
$photo = $_POST['dogPhoto'];
$vaccination = $_POST['dogVaccination'];
$id = $_POST['dogId'];

// requête vers BDD
updateDog($nom, $race, $age, $photo, $vaccination, $id);

header('Location: index.php');
exit();