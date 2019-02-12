<?php


// connexion à la BDD
require_once 'libraries/database.php';

// requête SQL // tu peux aussi mettre SELECT * pour récupérer tous les champs d'un coup //
// le resultat de la fonction getDogs va dans la variable $dogs
// ça permet de faire resortir le $resultats qui est DANS la fonction (il est aussi possible de le faire sortir grâce au return)
$dogs = getDogs();

// test sur la récupération

// inclusion du phtml
include 'views/list.phtml';
