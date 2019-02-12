<?php

abstract class Shape {
    
    // -----------------------------------
    // PROPRIETES (caractéristiques)
    // On regroupe les propriétés communes à toutes les formes
    // -----------------------------------
    protected $location; // protected pour que rectangle hérite de ces propriétés
    protected $color;
    protected $opacity;
    
    // Définition d'une méthode abstraite draw()
    // Ici la méthode draw() n'a pas de corps {}
    // Cela oblige les classes ENFANT à implenter (définir) une méthode draw()
    abstract public function draw(SVGRenderer $svgRenderer);
    
    
    public function __construct()
    {
        // Initialisation des propriétés avec des valeurs par défaut
        $this->color = 'black';
        $this->opacity = 1;
        $this->location = new Point(); // nouveau qui remplace
    }
 
    function setPosition($x, $y)
    {
        /*$this->x = $x;
        $this->y = $y;*/
        $this->location->moveTo($x, $y);
    }
 
 
    function setFill($color, $opacity = 1)
    {
        $this->color = $color;
        $this->opacity = $opacity;
    }
    
}