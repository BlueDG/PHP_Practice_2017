<?php


    //inclusion des dépendances
    require 'autoload.php';
    // require 'class/Point.php'; // en 1er car les autres vont l'utiliser
    loadClassFile('Point');
    include 'class/Shape.php';
    include 'class/Ellipse.php';
    include 'class/Rectangle.php';
    include 'class/Circle.php';
    require 'utilities.php';
    include 'class/Square.php';
    include 'class/Polygon.php';
    include 'class/Triangle.php';
    require 'class/SVGRenderer.php';
    require 'class/App.php'; // en dernier car utilise toutes les autres classes
    
    
    // Création d'un objet SVGRenderer
    $svgRenderer = new SVGRenderer();
    
    // création d'un objet App
    $app = new App($svgRenderer);
    
    // mise en route / execution de l'application
    $app->run();
    
    
    // Code principal
    
    // instanciation (creation d'un objet) de la classe rectangle
    // déplacé dans App.php
    /*$rect1 = new Rectangle();
    
    
    $rect4 = new Rectangle();
    $rect4->setPosition(300,0);
    $rect4->setFill('black');
    $rect4->setSize(100,70);
    
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
    $ell1->setFill('moccasin');
    $ell1->setRadius(75, 20);
    
    $triangle1 = new Triangle();
    $triangle1->setCoordinates(150,80,50,80,100,20);
    $triangle1->setFill('goldenrod');
    
    $polygon1 = new Polygon();
    $polygon1->setCoordinates([310,300,40,300,140,200,40,500]);
    $polygon1->setFill('CadetBlue', 0.3);*/
    
    // var_dump($rect1->draw());
    
    
    
    // Affichage (inclusion du fichier de template)
    include 'index.phtml';