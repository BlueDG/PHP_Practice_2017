<?php

// on connait le nom de la classe, mais on a besoin maintenant de trouver le fichier
// en fonction du nom de la classe, va chercher tel ou tel fichier
// le param $classname équivaut à Circle.Php ou Rectangle par exemple, c'est le nom du fichier
    function loadClassFile($className)
    {
        require 'class/'.$className.'.php';
    }
    
    
    // Enregistrement de la fonction loadClassFile comme fonction d'autoload
    spl_autoload_register('loadClassFile');