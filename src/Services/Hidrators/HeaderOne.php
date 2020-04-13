<?php


namespace legiaifenix\jsonParser\Services\Hidrators;


use legiaifenix\jsonParser\Models\Element;

class HeaderOne
{
    public function __invoke(Element $element)
    {
        return sprintf('<h1>%s</h1>',
            $element->getText()
        );
    }
}