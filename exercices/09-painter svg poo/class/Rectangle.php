<?php

// la classe rectangle hérite de la classe Shape grâce au mot clef extends
// on peut dire qu'un rectangle est une forme particulière
// la classe shape est la classe "parent"
// la classe rectangle est la classe "enfant"

class Rectangle extends Shape {
    
    
    // PROPRIETES
    /*private $x;
    private $y;*/ // obsolète car Classe Point
    
    /*private $location;*/ // nouveau qui remplace pour l'emplacement comprenant à la fois x et y 
    protected $width;
    protected $height;
    
    // CONSTRUCTEUR
    public function __construct()
    {
        
        // Appel du constructeur de la classe parent (Shape)
        // Lorsque l'on redéfinit dans la classe Enfant une méthode héritée du parent,
        // celle de l'enfant "écrase" celle du parent. C'est ce qu'on appelle la SURCHARGE
        // Pour cette raison si on souhaite appeller malgré tout la méthode du parent, 
        // il faut le dire explicitement : 
        parent::__construct();
        
        // initialisation des propriétés
        /*$this->x = 0;
        $this->y = 0;*/ // obsolète car classe point
        
        $this->width = 10;
        $this->height = 20;
        
        
    }
    
    
    // AUTRES METHODES
    
    // ici plus besoin de param car déjà présents dans la partie propriétés
    
    
    
    
    function setSize($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    
    
    
    
    
    function draw(SVGRenderer $svgRenderer)
    {
        /**
         * Travail de la fonction : construire une chaîne de caractères avec une balise svg <rect> à l'intérieur
         * dont la valeur des attributs correspond aux valeurs des paramètres de la fonction
         */ 
        //$rectSvg = '<rect x="' . $x . '" y="' . $y . '" fill="' . $color . '" opacity="' . $opacity . '" width="' . $width . '" height="' . $height . '" />';
    
        /*return genTag('rect', [
            /*'x' => $this->x,
            'y' => $this->y,*/
            /*'x' => $this->location->getX(),
            'y' => $this->location->getY(),
            'fill' => $this->color,
            'opacity' => $this->opacity,
            'width' => $this->width,
            'height' => $this->height
        ]);*/
        
        // on fait appel à un objet SVGRenderer récupéré en paramètre
        // pour générer la balise SVG du rectangle
        $svgRenderer->drawRectangle(
                $this->location,
                $this->color,
                $this->width,
                $this->height,
                $this->opacity
            
            );
        
    }
    
    
}