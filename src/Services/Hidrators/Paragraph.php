<?php
namespace legiaifenix\jsonParser\Services\Hidrators;


use legiaifenix\jsonParser\Models\Element;

class Paragraph
{
    public function __invoke(Element $element)
    {
        return sprintf("<p>%s</p>",
            $element->getText()
        );
    }
}