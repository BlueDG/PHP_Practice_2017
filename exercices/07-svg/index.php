<?php


// Fonctions

/**
 * Rappels en PHP : 
 * -> la concaténation se fait avec le point '.'
 * -> interpolation de variables dans une chaîne de caractères entre double quotes :
 *      "Une chaîne avec une $variable à l'intérieur sans concaténer !"
 */ 


function genTag($tag, array $attributes)
{
    $result = '<' . $tag . ' '; // <rect 
    
    foreach($attributes as $name => $value){
        
        // Tour de boucle 1: x="500"
        $result .= $name . '="' . $value . '" ';
    }
    
    $result .= ' />';          // />
    
    return $result;
}


/**
 * Fonction drawRectangle
 * @param int $x : abscisse du point en haut à gauche du rectangle
 * @param int $y : ordonnée du point en haut à gauche du rectangle
 * @param string $color : couleur de remplissage du rectangle
 * @param float $opacity : opacité du rectangle
 * @param int $width : largeur du rectangle
 * @param int $height : hauteur du rectangle
 * @return string : la chaîne de caractères contenant la balise <svg> 
 */ 
/*function drawRectangle($x, $y, $color, $opacity, $width, $height)
{
    /**
     * Travail de la fonction : construire une chaîne de caractères avec une balise svg <rect> à l'intérieur
     * dont la valeur des attributs correspond aux valeurs des paramètres de la fonction
     */ 
    /*$rectSvg = '<rect x="' . $x . '" y="' . $y . '" fill="' . $color . '" opacity="' . $opacity . '" width="' . $width . '" height="' . $height . '" />';

    // tu choisis le nom que tu veux pour ce qu'il y a en jaune
    // MAIS tu dois RESPECTER ce qu'il y a en BLEU pour faire ta forme SVG et ton format SVG 
    // On fait sortir le résultat de la fonction avec le return
    /*return $rectSvg;
}*/

function drawRectangle($x, $y, $color, $width, $height, $opacity = 1)
{
    
    return genTag('rect', [
        'x' => $x,
        'y' => $y,
        'fill' => $color,
        'opacity' => $opacity,
        'width' => $width,
        'height' => $height
    ]);
}


/**
 * Fonction drawSquare
 * @param int $x : abscisse du point en haut à gauche du carré
 * @param int $y : ordonnée du point en haut à gauche du carré
 * @param string $color : couleur de remplissage du carré
 * @param float $opacity : opacité du carré
 * @param int $size : longueur du côté du carré
 * @return string : la chaîne de caractères contenant la balise svg 
 */ 

/*function drawSquare($x, $y, $color, $size, $opacity = 1)
{
    
    $squareSvg = '<rect x="' . $x . '" y="' . $y . '"fill="' . $color . '"opacity="' . $opacity . '"width="' . $size . '" height="' . $size . '" />';
    
    return $squareSvg;
}*/

function drawSquare($x, $y, $color, $size, $opacity = 1)
{
    return genTag('rect', [
        'x' => $x,
        'y' => $y,
        'fill' => $color,
        'opacity' => $opacity,
        'width' => $size,
        'height' => $size
    ]);
}



/**
 * Fonction drawEllipse
 * @param int $cx : abscisse du centre de l'ellipse
 * @param int $cy : ordonnée du centre de l'ellipse
 * @param string $color : couleur de remplissage de l'ellipse
 * @param float $opacity : opacité de l'ellipse
 * @param int $rx : rayon des abscicces
 * @param int $ry : rayon des ordonnées
 * @return string : la chaîne de caractères contenant la balise svg 
 */
 /*function drawEllipse($cx, $cy, $color, $rx, $ry, $opacity = 1)
 {
    /**
     * Travail de la fonction : construire une chaîne de caractères avec une balise svg <ellipse> à l'intérieur
     * dont la valeur des attributs correspond aux valeurs des paramètres de la fonction
     */  
    /*$ellipseSvg = '<ellipse cx="'.$cx.'" cy="'.$cy.'" rx="'.$rx.'" ry="'.$ry.'" fill="'.$color.'" opacity="'.$opacity.'" />';
    
    return $ellipseSvg;
 }*/

function drawEllipse($cx, $cy, $color, $rx, $ry, $opacity = 1)
 {
    
    return genTag('ellipse', [
        'cx' => $cx,
        'cy' => $cy,
        'fill' => $color,
        'opacity' => $opacity,
        'rx' => $rx,
        'ry' => $ry
    ]);
 }

/**
 * Fonction drawCircle
 * @param int $cx : abscisse du centre du cercle
 * @param int $cy : ordonnée du centre du cercle
 * @param string $color : couleur de remplissage du cercle
 * @param float $opacity : opacité du cercle
 * @param int $r : rayon du cercle
 * @return string : la chaîne de caractères contenant la balise svg 
 */
 
 /*function drawCircle($cx, $cy, $color, $r, $opacity = 1)
 {
     
     $circleSvg = '<circle cx="'.$cx.'" cy="'.$cy.'" fill="'.$color.'" r="'.$r.'" opacity="'.$opacity.'" />';
     
     return $circleSvg;
 }*/
 
 function drawCircle($cx, $cy, $color, $r, $opacity = 1)
 {
    
    return genTag('circle', [
        'cx' => $cx,
        'cy' => $cy,
        'fill' => $color,
        'opacity' => $opacity,
        'r' => $r
    ]);
 }

 
 
 /*function drawTriangle($pt1x, $pt1y, $pt2x, $pt2y, $pt3x, $pt3y, $color, $opacity = 1)
 {
     // ne pas oublier points!
     // les double quote représente un PANIER
     // quand tu dis POINTS tu mets les points dans le même panier
     // avant tu avais cx dans le panier cx etc etc
     $triangleSvg = '<polygon points="'.$pt1x.' '.$pt1y.', '.$pt2x.' '.$pt2y.', '.$pt3x.' '.$pt3y.'", fill="'.$color.'" opacity="'.$opacity.'" />';
     
     return $triangleSvg;
 }*/
 

function drawTriangle($x1, $y1, $x2, $y2, $x3, $y3, $color, $opacity = 1)
 {
    return genTag('polygon', [
        'points' => $x1.' '.$y1.' '.$x2.' '.$y2.' '.$x3.' '.$y3,
        'fill' => $color,
        'opacity' => $opacity
    ]); 
 }





function drawPolygon(array $coords, $color, $opacity = 1)
{
    /**
     * Résultat souhaité avec comme paramètre $coords [300,300,450,280,500,400,600,400,860,240]
     * 
     * <polygon points="300 300 450 280 500 400 600 400 860 240" fill="red" opacity="1" />
     */ 
     
    // Construire le début de la chaîne : <polygon points="
    $polygon = '<polygon points="';
    
    // Construire la liste des coordonnées en parcourant le tableau $coords : 300 300 450 280 500 400 600 400 860 240
    foreach($coords as $coord){
        
        $polygon .= $coord . ' ';
        // Equivalent à : $polygon = $polygon . $coord . ' ';
    }
    
    // Construire la fin de la chaîne :  fill="red" opacity="1" />
    // le .= ajoute des infos en plus de ce qu'il y a avant
    // le premier '" représente la fin du tableau
    $polygon .= '" fill="'.$color.'" opacity="'.$opacity.'" />';
    
    // On retourne le résultat
    return $polygon;
}


/*function drawPolygon2(array $coords, $color, $opacity = 1)
{
    // Construire le début de la chaîne : <polygon points="
    return '<polygon points="' . implode(' ', $coords) . '" fill="'.$color.'" opacity="'.$opacity.'" />';
}$:*/





function drawPolygon2(array $coords, $color, $opacity = 1)
{
    
    return genTag('polygon', [
        'points' => implode(' ', $coords),
        'fill' => $color,
        'opacity' => $opacity
    ]); 
}





include 'index.phtml';