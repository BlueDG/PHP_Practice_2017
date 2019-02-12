<?php

// les noms de classe commencent par une majuscule. le title case
// les classes par défaut sont tjrs en public mais on écrit public quand même 
/*class Personne {
    public $prenom;
    public $nom;
    public $age;
    
    public function presentation($personne){
    echo "<p>Bonjour je m'appelle $personne->prenom $personne->nom et j'ai $personne->age ans.</p>";
    }
}*/

// personne1 et personne2 sont des objets (ou instances) de la classe Personne
/*$personne1 = new Personne();

$personne1->prenom = "Lior";
$personne1->nom = "Chamla";
$personne1->age = "31";


$personne2 = new Personne();

$personne2->prenom = "Magali";
$personne2->nom = "Pernin";
$personne2->age = "31";*/

 // ETAPE 1
/*$prenom1 = "Lior";
$nom1 = "Chamla";
$age1 = 31;

$prenom2 = "Magali";
$nom2 = "Pernin";
$age2 = 31;*/


/*function presentation($prenom, $nom, $age){
    echo "<p>Bonjour je m'appelle $prenom $nom et j'ai $age ans.</p>";
}*/

//presentation($prenom1, $nom1, $age1);
//presentation($prenom2, $nom2, $age2);


// ETAPE 2 
/*function presentation($personne){
    echo "<p>Bonjour je m'appelle $personne->prenom $personne->nom et j'ai $personne->age ans.</p>";
}*/

//presentation($personne1->prenom, $personne1->nom, $personne1->age);
//presentation($personne2->prenom, $personne2->nom, $personne2->age);

//presentation($personne1);
//presentation($personne2);

// ETAPE 3
// présentation est rattachée à personne. elle ne devrait pas trainer comme ça.
// Elle devrait être copiée collée dans la classe directement.
/**
 * La fonction est donc déplacée dans la classe
 * La variable $personne1 représente une nouvelle classe
 * cette variable comprend des variables, à savoir des propriétés, des sous variables qui représentent prénom etc..
 * Tu appelles cette grosse variable et appelle la fonction avec une -> qui prend en paramètre cette grosse variable.
 */ 
//$personne1->presentation($personne1);
//$personne2->presentation($personne2);

//ETAPE 4
// on utilise THIS

class Personne {
    public $prenom;
    public $nom;
    public $age;
    
    public function presentation(){
    echo "<p>Bonjour je m'appelle $this->prenom $this->nom et j'ai $this->age ans.</p>";
    }
}

// new Personne() est donc un objet
$personne1 = new Personne();

// prenom est une propriété
$personne1->prenom = "Lior";
$personne1->nom = "Chamla";
$personne1->age = 31;
// presentation est une methode
$personne1->presentation();


$personne2 = new Personne();

$personne2->prenom = "Magali";
$personne2->nom = "Pernin";
$personne2->age = 31;
$personne2->presentation();


// ETAPE SUIVANTE = LE CONSTRUCT pour simplifier encore tout ça :D