<?php

class Personne {
    public $prenom;
    public $nom;
    public $age;
    
    public function presentation(){
    echo "<p>Bonjour je m'appelle $this->prenom $this->nom et j'ai $this->age ans.</p>";
    }
    
    // s'applique de base à la naissance de chaque objet issu de cette classe
    public function __construct($prenom, $nom, $age){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
        echo "<p>Je suis né bordel!</p>";
    }
}

// new Personne() est donc un objet issu de la classe Personne
// les paranthèses au bout de Personne représentent en fait la fonction construct
// donc les paramètres de Personne peuvent être les variables présentes dans construct
// WARNING si un construct possède des variables, tu devras les appliquer forcément dans les paramètres de l'objet créé
$personne1 = new Personne("Lior", "Chamla", 31);

/*$personne1->prenom = "Lior";
$personne1->nom = "Chamla";
$personne1->age = "31";*/
$personne1->presentation();


$personne2 = new Personne("Magali", "Pernin", 31);

/*$personne2->prenom = "Magali";
$personne2->nom = "Pernin";
$personne2->age = "31";*/
$personne2->presentation();


$personne3 = new Personne("Guillaume", "Dusseux", 28);
$personne3->presentation();
