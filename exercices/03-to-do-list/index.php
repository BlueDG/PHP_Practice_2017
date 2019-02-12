<?php


// PARTIE TRAITEMENTS

//include 'librairies/utilities.php';// // le mettre en avance de façon à ce que ce soit reconnu

require 'libraries/utilities.php'; // require au lieu de include car le code ne continuera jamais sans ce qui suit require. pas de bug.

$tasks = loadTasks();



// var_dump($_POST);

// 1) aller chercher les lignes qui se trouvent dans le CSV
// 1.1) ouvrir le fichier (fopen())

/*$fichier = fopen('tasks.csv', 'r');
// 1.2) lire les lignes une à une (les placer dans un tableau)
$lignes = [];
// fegetcsv retransmet les infos sous forme de tableau 
while(($ligne = fgetcsv($fichier)) != false){ // tant que j'ai de l'info récupérée par fget, je continue de remplir le tableau $lignes. si c'est fini et en gros false, on arrete la boucle.
        $lignes[] = $ligne;
    }*/ // ce code fut coupé et collé ailleurs pour devenir une fonction
    




// PARTIE AFFICHAGE INCLUSION DES TEMPLATES
// 2) Afficher les lignes récupérées dans le HTML






include 'index.phtml';

