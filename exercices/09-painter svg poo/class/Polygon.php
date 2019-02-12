<?php

class Polygon extends Shape {
    
    // -----------------------------------
    // PROPRIETES (caractéristiques)
    // -----------------------------------
    protected $coordinates; // ex. [015, 78, 94, 50, 64, 104, 54, 63]
    
    // -----------------------------------
    // CONSTRUCTEUR (méthode appelée lors de la création d'un objet de la classe (new Personne())
    // -----------------------------------
    public function __construct()
    {
        // Initialisation des propriétés avec des valeurs par défaut
        $this->coordinates = [];
    }
    
    // -----------------------------------
    // AUTRES METHODES (actions)
    // -----------------------------------
    function setCoordinates(array $coordinates)
    {
        $this->coordinates = $coordinates;
    }
    
    function draw(SVGRenderer $svgRenderer)
    {
        $svgRenderer->drawPolygon($this->coordinates, $this->color, $this->opacity);
    }
}