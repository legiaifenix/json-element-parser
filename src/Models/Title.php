<?php
namespace legiaifenix\jsonParser\Models;


use legiaifenix\jsonParser\Services\Hidrators\HeaderOne;

class Title extends Element
{
    public function __construct(string $text)
    {
        parent::__construct($text, HeaderOne::class);
    }
}