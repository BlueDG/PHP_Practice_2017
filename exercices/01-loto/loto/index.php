<?php
// la concaténation php se fait avec des points .
// on peut créer une variable dès son utilisation dans une fonction comme dans la boucle for
// 6 numéros distincts entre 1 et 49

// générer un entier aléatoire en php
// echo rand(1, 49);

// comment stocker les données qu'on manipule?
// tableau

$tirage = [];

// générer 6 entiers aléatoires en php
// 3 boucles différentes

// on connait le nombre de tours de boucle, on utilise une boucle for
for($index = 0; $index < 6 ; $index++)
{
    do{
    // On tire un entier aléatoire qu'on stocke dans une variable $numero
    $numero = rand(1, 49); // ou
    // echo rand(1, 49) . ' '; echo affiche le code direct sur la page web. une forme de console log
    }
    
    // tant que le numéro est présent dans le tableau
    while(in_array($numero, $tirage) == true);
    
    /*// On ajoute le nombre aléatoire au tableau de tirage seulement si celui-ci n'est pas déjà présent dans le tableau
    if(in_array)($numero, $tirage) == false) // si le numero n'est pas présent dans $tirage alors je l'ajoute au tableau.
    {*/
    
    
    // ici je suis certain que le numéro n'est pas déjà présent peux donc l'ajouter
       $tirage[] = $numero;
    // array_push($tirage, $numero) 
}

var_dump($tirage);

// générer ces 6 entiers de manière aléatoire



