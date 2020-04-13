<?php
namespace legiaifenix\jsonParser\Utils;


use legiaifenix\jsonParser\Models\Element;

class Draw
{
    public static function drawElement(Element $element)
    {
        return ($element->getType())($element);
    }
}