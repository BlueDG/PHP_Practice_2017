<?php

/**
 * Fonction genTag : génère une balise à partir de son nom et de ses attributs
 * @param string $tag : le nom de la balise à générer ('ellipse', 'rect', etc)
 * @param array $attributes : liste des attributs sous forme d'un tableau associatif 'nom_attr' => 'valeur_attr'
 * 
 *  Exemple : ['x' => 50, 'y' => 100, 'width' => 200, 'height' => 100] 
 * 
 * @return string : une chaîne de caractères contenant la balise souhaitée avec la liste des attributs
 */ 
 
 
 
 
 // c'est gentag qui réalise n'importe qu'elle balise au choix. ICI on va vouloir du SVG
function genTag($tag, array $attributes)
{
    $result = '<' . $tag . ' '; // <rect 
    
    foreach($attributes as $name => $value){
        
        // Tour de boucle 1: <rect x="50"
        // Tour de boucle 2: <rect x="50" y="100"
        // Tour de boucle 3: <rect x="50" y="100" width="200"
        // etc
        $result .= $name . '="' . $value . '" ';
    }
    
    $result .= ' />';          // />
    
    return $result;
}