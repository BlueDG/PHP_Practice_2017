<?php

class Triangle extends Polygon {
    
    // -----------------------------------
    // AUTRES METHODES (actions)
    // -----------------------------------
    function setPoints($x1, $y1, $x2, $y2, $x3, $y3)
    {
        parent::setCoordinates([$x1, $y1, $x2, $y2, $x3, $y3]);
    }
}