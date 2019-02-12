<?php


// FAIRE UNE EXCEPTION SIGNIFIE DE CRÉÉR UNE ERREUR PHP EN CAS D'ERREUR
// car en cas de non respect d'une fonction de construct on a par défaut un espace vide
// là on veut voir une vraie erreur, un message d'erreur s'afficher devant le codeur

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
        $this->setAge($age); 
        echo "<p>Je suis né bordel!</p>";
        $this->setNom($nom);
    }
    
    public function setAge($age){ 
        if(is_int($age) == true && $age > 0 && $age <= 120){
            $this->age = $age;
        } else {
            $error = new Exception("L'âge que vous avez donné ($age) n'est pas valide. Il doit être un nombre entier entre 1 et 120."); // Majuscule signifie que c'est carrément une classe, pas une fonction. $error est donc ici un objet (instance de la classe Exception).
            throw $error; // on lance le message d'erreur
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
$personne1->presentation();
echo "<p>Le nom de la personne1 est {$personne1->getNom()}</p>";

try {
    $personne1->setAge(2000);
} catch(Exception $erreur){ // On attrape l'erreur et l'insère dans cette variable. cela permet d'éviter le message rouge
    echo "<p><strong>Erreur: </strong> Il y a eu une erreur, veuillez contacter l'administrateur ({$erreur->getMessage()}).</p>"; // avec le getMessage tu controles l'alerte rouge en insèrant le message de l'alerte dans ton propre code erreur
}




$personne2 = new Personne("Magali", "Pernin", 31);
$personne2->presentation();


$personne3 = new Personne("Guillaume", "Dusseux", 28);
$personne3->presentation();
