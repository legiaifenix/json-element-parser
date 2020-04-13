<?php
namespace legiaifenix\jsonParser\Models;

use legiaifenix\jsonParser\Services\Hidrators\Paragraph as HParagraph;

class Paragraph extends Element
{
    public function __construct(string $text)
    {
        parent::__construct($text, new HParagraph);
    }
}