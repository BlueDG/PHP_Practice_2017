<?php
// va juste contenir le code principal avec une méthode pour executer le truc

class App {
    
    
    // Propriétés
    private $renderer;
    
    /**
     * Constructeur
     * 
     * Le constructeur prends en paramètre l'objet $renderer dont la classe App a besoin
     * Le constructeur va stocker ce paramètre dans une propriété
     * 
     * => c'est ce qu'on appelle L'injection de dépendances
     */ 
    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }
    
    
    // méthode run
    public function run()
    {
    $rect1 = new Rectangle();
    
    
    $rect4 = new Rectangle();
    $rect4->setPosition(300,0);
    $rect4->setFill('black');
    $rect4->setSize(100,70);
    
    $square1 = new Square();
    $square1->setPosition(200, 450);
    $square1->setFill('firebrick', 0.5);
    $square1->setSize(50);
    
    $rect3 = new Rectangle();
    $rect3->setPosition(285,50);
    $rect3->setFill('black');
    $rect3->setSize(130,30);
    
    $circle = new Circle();
    $circle->setPosition(350,100);
    $circle->setFill('bisque');
    $circle->setRadius(50);
    
    $rect2 = new Rectangle();
    $rect2->setPosition(300,150);
    $rect2->setFill('brown');
    $rect2->setSize(100,200);
    
    $ell1 = new Ellipse();
    $ell1->setPosition(150,100);
    $ell1->setFill('gold');
    $ell1->setRadius(75, 20);
    
    $triangle1 = new Triangle();
    $triangle1->setPoints(150,80,50,80,100,20);
    $triangle1->setFill('goldenrod');
    
    $polygon1 = new Polygon();
    $polygon1->setCoordinates([310,300,40,300,140,200,40,500]);
    $polygon1->setFill('CadetBlue', 0.3);
    

    
    
    
   // Ajout des objets de forme au "panier" du SVGRenderer 
   // la dernière  ajoutée sera par dessus les autres
    $this->renderer->addShape($rect1);
    $this->renderer->addShape($rect2);
    $this->renderer->addShape($circle);
    $this->renderer->addShape($rect3);
    $this->renderer->addShape($rect4);
    $this->renderer->addShape($square1);
    $this->renderer->addShape($ell1);
    
    $this->renderer->addShape($triangle1);
    $this->renderer->addShape($polygon1);
    
    // Mise en route du moteur de rendu 
    $this->renderer->render();
    
    // On retourne le tableau de formes
    }
}