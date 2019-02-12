<?php

class Circle extends Ellipse {
    
    
    // -----------------------------------
    // AUTRES METHODES (actions)
    // -----------------------------------
    function setRadius($r, $useless = null)
    {
        $this->rx = $r;
        $this->ry = $r;
    }
    
}