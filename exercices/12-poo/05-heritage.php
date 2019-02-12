<?php


abstract class RH { // abstract pour ne pas instancier un objet issu de la classe RH
    public $nom;
    protected $prenom; // comme privé sauf que les objet de la classe y accedent
    private $dateNaissance;
    public $poste = "Inconnu";
    
    public function __construct($prenom, $nom, $dateNaissance){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->dateNaissance = $dateNaissance;
    }
    
    // IMPORTANT DIFFERENCE PROTECTED ET PRIVATE. 
    // date de naissance en private on peut l'avoir car getAge est fait dans RH
    // la classe enfant Employee chope le getAge du RH sans pouvoir neanmoins y toucher lire ou modifier
    
    // prenom en private on ne peut pas avoir car getPrenom n'est pas fait dans RH
    // pour pouvoir créer getPrenom et ainsi contourner le private et le manque de ce truc dans RH
    // on met en protected et on peut ainsi créer getPrenom dans l'objet (enfant) la classe Employee
    
    public function getAge(){
        $dateNaissance = new DateTime($this->dateNaissance);
        $dateNow = new DateTime(); // sans précision, il prends la date d'aujourd'hui
        //var_dump($dateNaissance);
        $intervale = $dateNow->diff($dateNaissance);
        // var_dump($intervale); // on voit ce que fait intervale, à savoir la différence
        
        return $intervale->y;
        
    }
    
    abstract public function travailler(); // toute classe descendante de RH doit avoir la fonction travailler et la DEFINIR. C'est appelé une méthode abstraite
    
    public function getPrenom(){
        return $this->prenom;
    }
}


class Employee extends RH {
    public $poste = "Employee";
    private $responsable;
    
    public getResponsable(){
        return $this->responsable;
    }
    
    public setReponsable($responsable){
        $this->responsable = $responsable;
    }
    
    public function travailler(){
        echo "<p>Je suis un employe et je bosse dur</p>";
    }
    
}

class Responsable extends RH {
    public $poste = "Encadrement";
    
    public function travailler(){
        echo "<p>Je suis un responsable et je tape les employes</p>";
    }
}

class Interimaire extends RH {
    public $poste = "Chair a canon";
    
    public function travailler(){
        echo "<p>Je suis un interim et c'est la m*rde.</p>";
    }
}


$e1 = new Employee("Jacky", "Dufolet", "1976-05-20");
echo "<p>L'employe {$e1->getPrenom()} {$e1->nom} a {$e1->getAge()} ans</p>";

$e2 = new Employee("Manu", "Naurin", "1969-02-15");
echo "<p>L'employe {$e2->getPrenom()} {$e2->nom} a {$e2->getAge()} ans</p>";

$r1 = new Responsable("Ferdinand", "lasfodel", "1988-07-18");

$i1 = new Interimaire("Anne", "Duflan", "1990-02-22");

$e1->travailler();
$e2->travailler();
$r1->travailler();
$i1->travailler();

// var_dump($e1, $r1, $i1);