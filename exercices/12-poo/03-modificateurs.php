<?php

// L'ENCAPSULATION DES DONNEES. UNE SECURISATION DES DONNEES.
// tu crées une fonction et l'insère dans le construct sans oublier de rendre private la variable

class Personne {
    public $prenom;
    private $nom;
    private $age; 
    
    public function presentation(){
        echo "<p>Bonjour je m'appelle $this->prenom $this->nom et j'ai $this->age ans.</p>";
    }
    
    
    public function __construct($prenom, $nom, $age){
        $this->prenom = $prenom;
        $this->nom = $nom;
        // $this->age = $age; // on change ça avec $this->setAge
        $this->setAge($age); // ça permet de coller $age avec l'obligation d'un chiffre
        echo "<p>Je suis né bordel!</p>";
        $this->setNom($nom);
    }
    
    public function setAge($age){ // cette fonction public permet de contourner le private sur age
        if(is_int($age) == true && $age > 0 && $age <= 120){ // cette partie là permet d'autoriser le changement d'âge MAIS que avec des chiffres et de 0 à 120.
            $this->age = $age;
        }
    }
    
    public function setNom($nom){
        $this->nom = strtoupper($nom);
    }
    
    public function getNom(){
        return $this->nom;
    }
}


$personne1 = new Personne("Lior", "Chamla", 31);
// $personne1->setNom("chamla");
// $personne1->setAge(20); 
// cette fonction permet de contourner le private
// WARNING à indiquer avant la présentation
$personne1->presentation();
 
// echo "<p>Le nom de la personne1 est $personne->nom</p>"; // le nom est privé donc cette phrase ne marchera pas donc je créé une fonction get
echo "<p>Le nom de la personne1 est {$personne1->getNom()}</p>";

$personne2 = new Personne("Magali", "Pernin", 31);
$personne2->presentation();


$personne3 = new Personne("Guillaume", "Dusseux", 28);
$personne3->presentation();
