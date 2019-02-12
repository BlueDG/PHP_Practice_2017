<?php

class Square extends Rectangle {
   
    // -----------------------------------
    // AUTRES METHODES (actions)
    // -----------------------------------
    function setSize($size, $useless = null)
    {
        // Les propriétés width et height sont héritées de la classe Rectangle
        $this->width = $size;
        $this->height = $size;
    }
    
}