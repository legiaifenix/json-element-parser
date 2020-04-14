<?php
namespace legiaifenix\jsonParser\Utils;


use legiaifenix\jsonParser\Models\Element;

class Draw
{
    public static function drawElement(Element $element)
    {
        $output = ($element->getType())($element);

        if (!empty($element->getChildren())) {
            foreach ($element->getChildren() as $child) {
                $output .= self::drawElement($child);
            }
        }

        return $output;
    }
}