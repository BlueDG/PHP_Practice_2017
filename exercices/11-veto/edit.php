<?php

// var_dump($_GET);
$id = $_GET['id'];

// connexion à la BDD
require_once 'libraries/database.php';


// Requête sql récupérer id spécifique dans la BDD
$chien = getDog($id);

// var_dump($chien);


include 'views/edit.phtml';