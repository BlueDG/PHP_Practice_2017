<?php

class Point {
    
    // -----------------------------------
    // PROPRIETES (caractéristiques)
    // -----------------------------------
    private $x; // abscisse
    private $y; // ordonnée
    
    // -----------------------------------
    // CONSTRUCTEUR (méthode appelée lors de la création d'un objet de la classe (new Personne())
    // -----------------------------------
    
    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        
    }
    
    
    
    // -----------------------------------
    // AUTRES METHODES (actions)
    // -----------------------------------
    
    // cette fonction va remplacer les simples this x et this y dans set position dans rectangle.php
    public function moveTo($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        
    }
    
    public function getX()
    {
        return $this->x;
    }
    
    public function getY()
    {
        return $this->y;
    }
    
    
}