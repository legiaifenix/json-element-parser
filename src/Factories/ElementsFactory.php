<?php
namespace legiaifenix\jsonParser\Factories;


use legiaifenix\jsonParser\Models\Paragraph;
use legiaifenix\jsonParser\Models\Title;

class ElementsFactory
{

    const TITLE_ELEMENT     = 'title';
    const PARAGRAPH_ELEMENT = 'paragraph';

    public static function createParagraph($element)
    {
        return new Paragraph($element);
    }

    public static function createTitle($element)
    {
        return new Title($element);
    }

}