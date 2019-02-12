<?php

class Ellipse extends Shape {
    
    // -----------------------------------
    // PROPRIETES (caractéristiques)
    // -----------------------------------
    protected $rx;
    protected $ry;
    
    // -----------------------------------
    // CONSTRUCTEUR (méthode appelée lors de la création d'un objet de la classe (new Ellipse())
    // -----------------------------------
    public function __construct()
    {
        // Appel du constructeur du parent
        parent::__construct();
        
        // Initialisation des propriétés avec des valeurs par défaut
        $this->rx = 10;
        $this->ry = 10;
    }
    
    // -----------------------------------
    // AUTRES METHODES (actions)
    // -----------------------------------
    function setRadius($rx, $ry)
    {
        $this->rx = $rx;
        $this->ry = $ry;
    }
  
    function draw(SVGRenderer $svgRenderer)
    {
       // On fait appel à un objet SVGRenderer récupéré en paramètre
        // pour générer la balise SVG du rectangle
        $svgRenderer->drawEllipse(
            $this->location,
            $this->color,
            $this->rx,
            $this->ry,
            $this->opacity
        );
    }
}