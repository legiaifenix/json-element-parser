<?php
namespace legiaifenix\jsonParser\Models;


class Paragraph extends Element
{
    public function __construct(string $text)
    {
        parent::__construct($text, \legiaifenix\jsonParser\Services\Hidrators\Paragraph::class);
    }
}