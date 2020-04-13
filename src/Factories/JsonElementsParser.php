<?php
namespace legiaifenix\jsonParser\Factories;


use legiaifenix\jsonParser\Utils\Files;

class JsonElementsParser
{
    public static function create(string $filePath)
    {
        $content = Files::loadFileContents($filePath);
        print_r($content);
    }
}