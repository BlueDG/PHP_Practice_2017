<?php

/**
 * La classe SVGRenderer va réprésenter un "moteur de rendu" SVG
 * Elle va stocker des objets de formes (rectangles, carrés, cercles, ellipses, triangles, etc...)
 * puis elle va s'occuper de traduire ces objets de formes en balises SVG
 * 
 */ 
class SVGRenderer {
    
    // Propriétés
    
    
    // La propriété $shapes contiendra un tableau d'objets de formes
    private $shapes;
    
    // le récipient qui contiendra un tableau avec les balises SVG des formes géométriques
    private $results;
    
    
    
    public function __construct()
    {
        // initialisation
        $this->shapes = [];
        $this->results = [];
    }
    
    /**
     * Ajute un objet de formes au SVGRenderer
     * @param shape $shape : l'objet forme qu'on souhaite ajouter au renderer
    */
    
    
    public function addShape(Shape $shape)
    {
        
        // On ajoute au tableau de la propriété 'shapes' l'objet de forme passé en paramètre
        // this permet de faire de cette variable une propriété
        // la propriété anciennement une variable contient un tableau nommé shapes[]
        // dedans on ajoute le paramètre shape $shape qui provient de la classe Shape
        // cela permet de préciser ce que l'on insère dans la propriété
        $this->shapes[] = $shape;
    }
    
    
    // générer la balise SVG pour dessiner un rectangle 
    public function drawRectangle(Point $origin, $color, $width, $height, $opacity = 1)
    {
        
        // On prépare un tableau associatif avec la liste des attributs de la balise <rect>
        $attributes = [
            'x' => $origin->getX(),
            'y' => $origin->getY(),
            'fill' => $color,
            'opacity' => $opacity,
            'width' => $width,
            'height' => $height
        ];  
        
        // On génère la balise SVG d'un rectangle et on la range dans le tableau $this->results
        $this->results[] = genTag('rect', $attributes);
    }
    
    
    
    // générer la balise SVG pour dessiner une ellipse 
    public function drawEllipse(Point $center, $color, $rx, $ry, $opacity = 1)
    {
        
        // On prépare un tableau associatif avec la liste des attributs de la balise <ell1>
        $attributes = [
            'cx' => $center->getX(),
            'cy' => $center->getY(),
            'fill' => $color,
            'opacity' => $opacity,
            'rx' => $rx,
            'ry' => $ry
        ];  
        
        // On génère la balise SVG d'une ellipse et on la range dans le tableau $this->results
        $this->results[] = genTag('ellipse', $attributes);
    }
    
    
    public function drawPolygon(array $coordinates, $color, $opacity = 1)
    {
        // On prépare un tableau associatif avec la liste des attributs de la balise <rect>
        $attributes = [
            'points' => implode(' ', $coordinates),
            'fill' => $color,
            'opacity' => $opacity
        ];
        
        // On génère la balise SVG d'un rectangle et on la range dans le tableau $this->results
        $this->results[] = genTag('polygon', $attributes);
    }
    
    
    // cette méthode va faire le rendu, en gros générer pour toutes les formes stockées, les balises SVG correspondantes. le boulot de la boucle qu'on avait mis dans le phtml
    public function render()
    {
       // on parcoure le tableau de formes
       // shapes est l'objet de la classe courante plus en haut
        foreach($this->shapes as $shape){
        
        // Appel de la méthode draw de chaque classe de forme (ex. rectangle)
        // la méthode draw a besoin de fonctionner d'un objet SVGRenderer en paramètre
        // On est ici justement à l'intérieur de la classe SVGRenderer
        // Donc on lui donne en paramètre l'objet courant $this
        $shape->draw($this);
        }
    }
    
    // retourne le résultat du rendu SVG 
    public function getResult()
    {
        return '<svg width="888" height="600">' .  
        implode($this->results)
        .
        '</svg>';
    }
    
    
}