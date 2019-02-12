<?php

// Définition de la classe Personne
class Personne {
  
  
  // Propriétés (caractéristiques de l'objet)
  // nouveau par rapport à JS, la visibilité: est ce privé ou public
  // en gros est ce que ça existe en dehors de la classe Personne
  // la visibilité est obligatoire
  
  // public -> la propriété sera accessible partout
   /* Visibilité public */ public $prenom;
   
   
   // private -> la propriété sera accessible UNIQUEMENT à l'intérieur de la classe
   /* Visibilité privée */ private $nom;
  
  // Methodes (actions)
    function setNom($nouveauNom)
    {
        
        // $this représente la personne potentielle, le new Personne()
        // le nom après la -> est en fait le $nom
        $this->nom = $nouveauNom;
    }
    
    
    // Méthode qui retourne le nom et le prénom de la personne
    // "Je m'appelle Alfred Dupont"
    function quelEstVotreNom()
    {
        /**
         * $prenom = // Ici $prenom est une simple variable
         * $this->prenom // Là je fais référence à la propriété 'prenom' de l'objet courant
         */ 
        // Retourner une chaîne de caractères contenant les valeurs des propriétés 'nom' et 'prenom'
        return "Je m'appelle " . $this->prenom . ' ' . $this->nom;
        
    }
    
    // créer une propriété privée 'âge'
    // créer une méthode setAge() pour modifier l'âge de la personne
    // créer une méthode quelEstVotreÂge() qui  retournera "J'ai xx ans"
    
    
    private $âge;
    function setAge($nouvelAge)
    {
        $this->âge = $nouvelAge;
    }
    function quelEstVotreÂge()
    {
        return "J'ai" . $this->âge . " ans.";
        
    }
    
    
    
    // Créer une méthode anniversaire() qui augmente l'âge de la personne d'une année
    function anniversaire()
    {
        $this->age = $this->age + 1;
        // ou $this->age++;
        
        
    }
    
    
    /* CONSTRUCTEUR (méthode appelée lors de la création d'un objet de la classe (new Personne()) */
    
    function __construct()
    {
        // initialiser les propriétés
        $this->age = 0;
        $this->prenom = 'prenom_par_defaut';
        $this->nom = 'nom_par_defaut';
    }
    
    
    
    
}